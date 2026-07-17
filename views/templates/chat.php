<div class="chat">
    <div class="conversation-list">
        <h1>Messagerie</h1>
        <?php foreach ($conversations as $conversation): ?>
            <a class="conversation-link <?= ($selectedConversationId == $conversation->getOtherUserId()) ? 'active' : '' ?>" href="index.php?action=chat&user=<?= $conversation->getOtherUserId() ?>">
                <img class="other-user-avatar" src="<?= htmlspecialchars($conversation->getOtherUserImage()) ?>" alt="Avatar de <?= htmlspecialchars($conversation->getOtherUserNickname()) ?>">
                <div class="conversation-info">
                    <div class="conversation-header">
                        <span class="other-user-nickname"><?= htmlspecialchars($conversation->getOtherUserNickname()) ?></span>
                        <span class="last-message-time"><?= htmlspecialchars($conversation->getLastMessage()->getMessageDate()) ?></span>
                    </div>
                    <div class="conversation-last-message">
                        <span><?= htmlspecialchars(mb_strimwidth($conversation->getLastMessage()->getContent(), 0, 50, '...')) ?></span>
                    </div>
                    <?php if ($conversation->getConversationUnreadMessageCount() > 0): 
                        if ($conversation->getConversationUnreadMessageCount() == 1):?>
                            <span class="conversation-unread-message-count">
                                <?= $conversation->getConversationUnreadMessageCount() ?>
                                message non lu
                            </span>
                        <?php else: ?>
                            <span class="conversation-unread-message-count">
                                <?= $conversation->getConversationUnreadMessageCount() ?>
                                messages non lus
                            </span>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
    <div class="selected-conversation">
        <div class="other-user-info">
            <img class="other-user-avatar" src="<?= htmlspecialchars($otherUser->getImage()) ?>" alt="Avatar de <?= htmlspecialchars($otherUser->getNickname()) ?>">
            <span class="other-user-nickname"><?= htmlspecialchars($otherUser->getNickname()) ?></span>
        </div>
        <div class="messages">
            <?php foreach ($messages as $message): ?>
                <div class="message <?= $message->getSenderId() === $currentUserId ? 'sent' : 'received' ?>">
                    <span class="message-time">
                        <?php if ($message->getReceiverId() === $currentUserId): ?>
                            <img class="other-user-mini-avatar" src="<?= htmlspecialchars($otherUser->getImage()) ?>" alt="Avatar de <?= htmlspecialchars($otherUser->getNickname()) ?>">
                        <?php endif; ?>  
                        <?= htmlspecialchars($message->getMessageDate()) ?>
                    </span>
                    <span class="message-content"><?= htmlspecialchars($message->getContent()) ?></span>
                </div>
            <?php endforeach; ?>
        </div>
        <form class="send-message-form" action="index.php?action=sendMessage" method="post">
            <label for="content" class="visually-hidden">Tapez votre message ici</label>
            <input type="hidden" name="receiver_id" value="<?= $otherUser->getId() ?>">
            <textarea name="content" id="content" placeholder="Tapez votre message ici" required></textarea>
            <button type="submit">Envoyer</button>
        </form>
    </div>
</div>