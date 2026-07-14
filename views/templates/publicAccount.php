<div class="public-account"> 
    <div class="infos">
        <div class="image-info">
            <img class = "user-image" src="<?= htmlspecialchars($user->getImage()); ?>" alt="Photo de <?= htmlspecialchars($user->getNickname()); ?>">
        </div>
        <hr class="separator">
        <div class="text-info">
            <h2><?= htmlspecialchars($user->getNickname()); ?></h2>
            <p class="member-since">Membre depuis  <?= $user->getRegisteredSince(); ?> an(s)</p>
            <p class="library-title">BIBLIOTHÈQUE</p>
            <div class="library-info">
                <img src="./assets/icons/library.svg" alt="Icône de livre">
                <span class="books-owned"><?= $booksOwnedCount; ?> livres</span>
            </div>
            <a class="chat-btn" href="index.php?action=conversation&receiverId=<?= (int) $user->getId(); ?>">Écrire un message</a>
        </div>
    </div>
    <div class="books-list">
        <table>
            <thead>
                <tr>
                    <th>PHOTO</th>
                    <th>TITRE</th>
                    <th>AUTEUR</th>
                    <th>DESCRIPTION</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($userBooks as $book) { ?>
                    <tr>
                        <td><img class="book-list-image" src="<?= htmlspecialchars($book->getImage()); ?>" alt="Couverture de <?= htmlspecialchars($book->getTitle()); ?>"></td>
                        <td><?= htmlspecialchars($book->getTitle()); ?></td>
                        <td><?= htmlspecialchars($book->getAuthor()); ?></td>
                        <td><?= htmlspecialchars(mb_strimwidth($book->getDescription(), 0, 70, '...')); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>