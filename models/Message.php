<?php
class Message
{
    private int $id;
    private int $senderId;
    private int $receiverId;
    private string $content;
    private string $dateTime;
    private int $isRead;

    public function __construct(array $data)
    {
        $this->id = (int) $data['id'];
        $this->senderId = (int) $data['sender_id'];
        $this->receiverId = (int) $data['receiver_id'];
        $this->content = $data['content'];
        $this->dateTime = $data['date_time'];
        $this->isRead = (int) $data['is_read'];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getSenderId(): int
    {
        return $this->senderId;
    }

    public function getReceiverId(): int
    {
        return $this->receiverId;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getDateTime(): string
    {
        return $this->dateTime;
    }

    public function getIsRead(): bool
    {
        return (bool) $this->isRead;
    }

    public function getMessageDate(): string
    {
        $timestamp = strtotime($this->dateTime);
        $messageDate = date('Y-m-d', $timestamp);
        $today = date('Y-m-d');
        $oneWeekAgo = date('Y-m-d', strtotime('-7 days'));
        $oneYearAgo = date('Y-m-d', strtotime('-1 year'));
        if ($messageDate === $today) {
            return date('H:i', $timestamp);
        }
        if ($messageDate >= $oneWeekAgo) {
            $days = [
                'Mon' => 'lun',
                'Tue' => 'mar',
                'Wed' => 'mer',
                'Thu' => 'jeu',
                'Fri' => 'ven',
                'Sat' => 'sam',
                'Sun' => 'dim',
            ];
            $day = $days[date('D', $timestamp)];
            return $day . ' ' . date('H:i', $timestamp);
        }
        if ($messageDate >= $oneYearAgo) {
            return date('d/m H:i', $timestamp);
        }
        return date('d/m/y H:i', $timestamp);
    }
}