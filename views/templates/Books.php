<div class="books">
    <div class="title-and-search">
        <h1>Nos livres à l'échange </h1>
        <form action="index.php" method="GET" class="search-bar">
            <label for="search" class="visually-hidden">Rechercher un livre</label>
            <input type="hidden" name="action" value="books">
            <img src="./assets/icons/search.svg" alt="Rechercher" class="search-icon">
            <input
                type="search"
                name="search"
                id="search"
                placeholder="Rechercher un livre"
                value="<?= htmlspecialchars($search ?? '') ?>"
            >
        </form>
    </div>
    <div class="books-list">
        <?php foreach ($books as $book) : ?>
            <a
                href="index.php?action=bookDetails&id=<?= $book->getId(); ?>"
                class="book-card"
            >
                <img
                    src="<?= htmlspecialchars($book->getImage()); ?>"
                    alt="Couverture de <?= htmlspecialchars($book->getTitle()); ?>"
                >
                <p class="book-title"><?= htmlspecialchars($book->getTitle()); ?></p>
                <p class="book-author"><?= htmlspecialchars($book->getAuthor()); ?></p>
                <p class="book-owner">Vendu par : <?= htmlspecialchars($book->getUserNickname()); ?></p>
            </a>
        <?php endforeach; ?>
    </div>
</div>
