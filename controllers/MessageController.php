<?php

class MessageController
{
    public function chat(): void
    {
        $currentUserId = $_SESSION['user_id'] ?? null;
        if ($currentUserId === null) {
            throw new Exception("Vous devez être connecté pour accéder à la messagerie.");
        }
        $currentUserId = (int) $currentUserId;
        $messageManager = new MessageManager();
        $userManager = new UserManager();
        $conversationManager = new ConversationManager();
        $otherUserId = Utils::request('user');
        if ($otherUserId !== null) {
            $otherUserId = filter_var($otherUserId, FILTER_VALIDATE_INT);
            if ($otherUserId === false || $otherUserId <= 0) {
                throw new PageNotFoundException("Identifiant d'utilisateur invalide.");
            }
            $otherUser = $userManager->getUserById($otherUserId);
            if ($otherUser === null) {
                throw new PageNotFoundException("L'utilisateur n'existe pas.");
            }
            if ($otherUserId === $currentUserId) {
                throw new Exception("Vous ne pouvez pas envoyer de messages à vous-même.");
            }
        }
        $conversations = $conversationManager->getConversationList($currentUserId);
        if ($otherUserId === null) {
            if (empty($conversations)) {
                throw new Exception("Aucune conversation trouvée.");
            }
            $latestConversation = $conversations[0];
            $otherUserId = $latestConversation->getOtherUserId();
            $otherUser = $userManager->getUserById($otherUserId);
        }
        $conversationManager->markConversationAsRead($currentUserId, $otherUserId);
        $conversations = $conversationManager->getConversationList($currentUserId);
        $messages = $messageManager->getMessagesBetweenUsers($currentUserId, $otherUserId);
        $unreadMessageCount = $messageManager->getUnreadMessageCount($currentUserId);
        $view = new View("Messagerie");
        $view->render('chat', [
            'currentUserId' => $currentUserId,
            'otherUserId' => $otherUserId,
            'messages' => $messages,
            'conversations' => $conversations,
            'otherUser' => $otherUser,
            'unreadMessageCount' => $unreadMessageCount,
            'selectedConversationId' => $otherUserId,
            'currentPage' => 'chat',
        ]);
    }

    public function sendMessage(): void
    {
        $senderId = $_SESSION['user_id'] ?? null;
        if ($senderId === null) {
            throw new Exception("Vous devez être connecté pour envoyer un message.");
        }
        $receiverId = Utils::request('receiver_id');
        $content = Utils::request('content');
        if ($receiverId === null || $content === null || trim($content) === '') {
            throw new Exception("Tous les champs sont requis pour envoyer un message.");
        }
        $senderId = (int) $senderId;
        $receiverId = (int) $receiverId;
        $receiver = (new UserManager())->getUserById($receiverId);
        if ($receiver === null) {
            throw new Exception("Le destinataire n'existe pas.");
        }
        if ($senderId === $receiverId) {
            Utils::redirect('chat');
        }
        $content = trim($content);
        $dateTime = date('Y-m-d H:i:s');
        $isRead = 0;

        $messageManager = new MessageManager();
        $messageManager->addMessage(
            $senderId,
            $receiverId,
            $content,
            $dateTime,
            $isRead
        );
        Utils::redirect('chat', [
            'user' => $receiverId,
        ]);
    }
}
