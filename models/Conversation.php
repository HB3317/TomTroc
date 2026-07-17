<?php
class Conversation 
{
    private int $otherUserId;
    private string $otherUserNickname;
    private string $otherUserImage;
    private Message $lastMessage;
    private int $conversationUnreadMessageCount;

    public function __construct(
        int $otherUserId, 
        string $otherUserNickname, 
        string $otherUserImage, 
        Message $lastMessage, 
        int $conversationUnreadMessageCount
    ) 
    {
        $this->otherUserId = $otherUserId;
        $this->otherUserNickname = $otherUserNickname;
        $this->otherUserImage = $otherUserImage;
        $this->lastMessage = $lastMessage;
        $this->conversationUnreadMessageCount = $conversationUnreadMessageCount;
    }

    public function getOtherUserId(): int 
    {
        return $this->otherUserId;
    }

    public function getOtherUserNickname(): string 
    {
        return $this->otherUserNickname;
    }

    public function getOtherUserImage(): string 
    {
        return $this->otherUserImage;
    }

    public function getMessageDate(): string 
    {
        return $this->lastMessage->getMessageDate();
    }

    public function getContent(): string 
    {
        return $this->lastMessage->getContent();
    }

    public function getConversationUnreadMessageCount(): int 
    {
        return $this->conversationUnreadMessageCount;
    }

    public function getLastMessage(): Message 
    {
        return $this->lastMessage;
    }
}