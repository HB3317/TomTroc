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
        $otherUserId = Utils::request('user');
        $conversationList = $messageManager->getConversationList($currentUserId);    
        if ($otherUserId === null) {
            $latestMessage = $conversationList[0];
            $otherUserId = $latestMessage->getOtherUserId();
        };
        $messages = $messageManager->getMessagesBetweenUsers($currentUserId, $otherUserId);
        $conversationUnreadMessageCount = $messageManager->getConversationUnreadMessageCount($currentUserId, $otherUserId);
        $unreadMessageCount = $messageManager->getUnreadMessageCount($currentUserId);
        $messageManager->markConversationAsRead($currentUserId, $otherUserId);
        $view = new View("Messagerie");
        $view->render('chat', [
            'currentUserId' => $currentUserId,
            'otherUserId' => $otherUserId,
            'messages' => $messages,
            'conversationUnreadMessageCount' => $conversationUnreadMessageCount,
            'conversations' => $conversationList,
            'otherUser' => (new UserManager())->getUserById($otherUserId),
            'unreadMessageCount' => $unreadMessageCount,
            'selectedConversationId' => $otherUserId
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

        if ($senderId === null || $receiverId === null || $content === null || trim($content) === '') {
            throw new Exception("Tous les champs sont requis pour envoyer un message.");
        }

        $senderId = (int) $senderId;
        $receiverId = (int) $receiverId;
        $content = trim($content);
        $dateTime = date('Y-m-d H:i:s');
        $isRead = 0;

        $messageManager = new MessageManager();
        $messageManager->addMessage($senderId, $receiverId, $content, $dateTime, $isRead);

        header("Location: index.php?action=chat&user=$receiverId");
        exit();
    }

}