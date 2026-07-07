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
    
    public function markAsRead(int $id): void
    {
        $sql = "UPDATE messages 
                SET is_read = 1 
                WHERE id = :id
                AND is_read = 0";

        $this->db->query($sql, ['id' => $id]);
    }
}