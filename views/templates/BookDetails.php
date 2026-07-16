<div class="book-details">
    <nav class="breadcrumb">
        <a href="index.php?action=books">Nos livres</a>
        <span>&gt;</span>
        <span><?= htmlspecialchars($book->getTitle()); ?></span>
    </nav>
    <div class="book-details-content">
        <div class="book-image">
            <img src="<?= htmlspecialchars($book->getImage()); ?>" alt="Couverture de <?= htmlspecialchars($book->getTitle()); ?>">
        </div>
        <div class="book-info">
            <div class="title-and-author">
                <h1><?= htmlspecialchars($book->getTitle()); ?></h1>
                <p>par <?= htmlspecialchars($book->getAuthor()); ?></p>
            </div>
            <hr class="separator">
            <div class="description">
                <h2>DESCRIPTION</h2>
                <div class="description-content">
                    <?= Utils::format($book->getDescription()); ?>
                </div>
            </div>
            <div class="owner">
                <h2>PROPRIÉTAIRE</h2>
                <?php 
                if ($book->getUserId() === $currentUserId): ?>
                    <a class="owner-account" href="index.php?action=myAccount">
                        <img src="<?= htmlspecialchars($book->getUserImage()); ?>" alt="Photo de <?= htmlspecialchars($book->getUserNickname()); ?>">
                        <p><?= htmlspecialchars($book->getUserNickname()); ?></p>
                    </a>
                <?php else: ?>
                    <a class="owner-account" href="index.php?action=publicAccount&id=<?= (int) $book->getUserId(); ?>">
                        <img src="<?= htmlspecialchars($book->getUserImage()); ?>" alt="Photo de <?= htmlspecialchars($book->getUserNickname()); ?>">
                        <p><?= htmlspecialchars($book->getUserNickname()); ?></p>
                    </a>
                <?php endif; ?>
            </div>
            <?php if ($book->getUserId() !== $currentUserId): ?>
                <a href="index.php?action=chat&user=<?= (int) $book->getUserId(); ?>" class="primary-btn">Envoyer un message</a>
            <?php endif; ?>
        </div>
    </div>
</div>