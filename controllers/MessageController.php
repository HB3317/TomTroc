<?php
class MessageController
{
    public function showChat(): void
    {
        $messageManager = new MessageManager();
        $messages = $messageManager->getAllMessages();
        $view = new View("Messagerie");
        $view->render('chat', [
            'messages' => $messages
        ]);
    }

    public function sendMessage(): void
    {
        $senderId = Utils::request('sender_id');
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

        header("Location: index.php?action=showChat");
        exit();
    }

    public function showConversation(): void
    {
        $otherUserId = Utils::request('user2');


        if ($otherUserId === null) {
            throw new Exception("Identifiants d'utilisateur invalides.");
        }

        $currentUserId = (int) $_SESSION['user_id'];
        $otherUserId = (int) $otherUserId;

        $messageManager = new MessageManager();
        $messages = $messageManager->getMessagesBetweenUsers($currentUserId, $otherUserId);

        $view = new View("Messagerie");
        $view->render('chat', [
            'messages' => $messages,
            'otherUserId' => $otherUserId
        ]);
    }
}