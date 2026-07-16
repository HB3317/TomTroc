<?php
class MessageManager extends AbstractEntityManager
{
    public function addMessage(int $senderId, int $receiverId, string $content, string $dateTime, int $isRead): void
    {
        $sql = "INSERT INTO messages (sender_id, receiver_id, content, date_time, is_read) 
                VALUES (:sender_id, :receiver_id, :content, :date_time, :is_read)";
        $this->db->query($sql, [
            'sender_id'     => $senderId,
            'receiver_id'   => $receiverId,
            'content'       => $content,
            'date_time'     => $dateTime,
            'is_read'        => $isRead
        ]);
    }

    public function getMessagesBetweenUsers(int $currentUserId, int $otherUserId): array
    {
        $sql = "SELECT * FROM messages 
                WHERE (sender_id = :currentUserId AND receiver_id = :otherUserId) 
                   OR (sender_id = :otherUserId AND receiver_id = :currentUserId)
                ORDER BY date_time ASC";
        $result = $this->db->query($sql, ['currentUserId' => $currentUserId, 'otherUserId' => $otherUserId]);
        $messages = [];
        while ($message = $result->fetch()) {
            $messages[] = new Message($message);
        }
        return $messages;
    }

    public function getConversationList(int $currentUserId): array
    {
        $sql = "SELECT messages.*,
                    users.nickname AS otherUserNickname,
                    users.image AS otherUserImage,
                    users.id AS otherUserId
                FROM messages
                JOIN users 
                    ON users.id = CASE 
                        WHEN messages.sender_id = :currentUserId 
                            THEN messages.receiver_id 
                        ELSE messages.sender_id 
                    END
                WHERE messages.sender_id = :currentUserId
                    OR messages.receiver_id = :currentUserId
                ORDER BY messages.date_time DESC";
        $result = $this->db->query($sql, ['currentUserId' => $currentUserId]);
        $conversations = [];
        while ($message = $result->fetch()) {
            $otherUserId = $message['otherUserId'];
            if (!isset($conversations[$otherUserId])) {
                $conversations[$otherUserId] = new Message($message);
            }
        }
        return array_values($conversations);
    }

    public function markConversationAsRead(int $currentUserId, int $otherUserId): void
    {
        $sql = "UPDATE messages 
                SET is_read = 1 
                WHERE (sender_id = :otherUserId AND receiver_id = :currentUserId)";
        $this->db->query($sql, ['currentUserId' => $currentUserId, 'otherUserId' => $otherUserId]);
    }

    public function getConversationUnreadMessageCount(int $currentUserId, int $otherUserId): int
    {
        $sql = "SELECT COUNT(*) AS unread_count 
                FROM messages 
                WHERE sender_id = :otherUserId 
                  AND receiver_id = :currentUserId 
                  AND is_read = 0";
        $result = $this->db->query($sql, ['currentUserId' => $currentUserId, 'otherUserId' => $otherUserId]);
        $conversationUnreadMessageCount = $result->fetch();
        return (int)$conversationUnreadMessageCount['unread_count'];
    }

    public function getUnreadMessageCount(int $currentUserId): int
    {
        $sql = "SELECT COUNT(*) AS unread_count 
                FROM messages 
                WHERE receiver_id = :currentUserId 
                  AND is_read = 0";
        $result = $this->db->query($sql, ['currentUserId' => $currentUserId]);
        $unreadMessageCount = $result->fetch();
        return (int)$unreadMessageCount['unread_count'];
    }
}