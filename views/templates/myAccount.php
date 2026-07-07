<div class="my-account-view">
    <h1>Mon compte</h1>
    <div class="user-info">
        <div class="infos">
            <div class="image-info">
                <img src="./assets/images/user/du php" alt="default user image">
            </div>
            <div class="text-info">
                <h2><?= $user->getNickname(); ?></h2>
                <p class="member-since">Membre depuis  <?= $user->getRegisteredSince(); ?> an(s)</p>
                <p>BIBLIOTHÈQUE</p>
                <p class="books-owned"><?= $booksOwnedCount; ?> livres</p>
            </div>
        </div>
        <div class="edit-user-form">
            <form action="index.php?action=modifyUser" method="post" class="form-grid">
                <label for="email">Adresse email</label>
                <input type="email" name="email" id="email" required>
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" required>
                <button type="submit" class="primary-btn">Enregistrer</button>
            </form>
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
                    <th>DISPONIBILITÉ</th>
                    <th>ACTION</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($userBooks as $book) { ?>
                    <tr>
                        <td><img src="<?= $book->getImage(); ?>" alt="<?= $book->getTitle(); ?>"></td>
                        <td><?= $book->getTitle(); ?></td>
                        <td><?= $book->getAuthor(); ?></td>
                        <td><?= $book->getDescription(); ?></td>
                        <td class="book-availability">
                            <span class="<?= $book->getStatus() ? 'available' : 'unavailable'; ?>">
                                <?= $book->getStatus() ? 'Disponible' : 'Non disponible'; ?>
                            </span>
                        </td>
                        <td>
                            <a class="edit-book-btn" href="index.php?action=modifyBook&id=<?= $book->getId(); ?>">Éditer</a>
                            <a class="delete-book-btn" href="index.php?action=deleteBook&id=<?= $book->getId(); ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <a class="add-book-btn" href="index.php?action=addBookForm">Ajouter un livre</a>
</div>