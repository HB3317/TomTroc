<?php
class ConversationManager extends AbstractEntityManager
{
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
            $lastMessage = new Message($message);
            $otherUserId = $message['otherUserId'];
            if (!isset($conversations[$otherUserId])) {
                $conversations[$otherUserId] = new Conversation(
                    $otherUserId, 
                    $message['otherUserNickname'], 
                    $message['otherUserImage'], 
                    $lastMessage, 
                    $this->getConversationUnreadMessageCount($currentUserId, $otherUserId)
                );
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
}