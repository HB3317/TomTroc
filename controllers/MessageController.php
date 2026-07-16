<?php
class MessageController
{
    public function chat(): void
    {
        $currentUserId = $_SESSION['user_id'] ?? null;
        if ($currentUserId === null) {
            throw new Exception("Vous devez être connecté pour accéder à la messagerie.");
        }
        $messageManager = new MessageManager();
        $conversationManager = new ConversationManager();
        $otherUserId = Utils::request('user');
        if ($otherUserId !== null && (int)$otherUserId === (int)$currentUserId) {
            header('Location: index.php?action=chat');
            exit();
        }
        $conversations = $conversationManager->getConversationList($currentUserId);
        if ($otherUserId === null) {
            $latestConversation = $conversations[0];
            $otherUserId = $latestConversation->getOtherUserId();
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
            'otherUser' => (new UserManager())->getUserById($otherUserId),
            'unreadMessageCount' => $unreadMessageCount,
            'selectedConversationId' => $otherUserId,
            'currentPage' => 'chat'
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
        if ($senderId === $receiverId) {
            header('Location: index.php?action=chat');
            exit();
        }
        $content = trim($content);
        $dateTime = date('Y-m-d H:i:s');
        $isRead = 0;

        $messageManager = new MessageManager();
        $messageManager->addMessage($senderId, $receiverId, $content, $dateTime, $isRead);

        header("Location: index.php?action=chat&user=$receiverId");
        exit();
    }

}