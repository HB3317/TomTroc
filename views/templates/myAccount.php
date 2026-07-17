<div class="my-account-view">
    <h1>Mon compte</h1>
    <div class="user-info">
        <div class="infos">
            <div class="image-info">
                <img class = "user-image" src="./assets/images/users/<?= htmlspecialchars($user->getId()); ?>.jpg?v=" alt="Photo de profil">
                <button class="change-image-btn" type="button">Modifier</button>
            </div>
            <div class="text-info">
                <h2><?= htmlspecialchars($user->getNickname()); ?></h2>
                <p class="member-since">Membre depuis  <?= $user->getRegisteredSince(); ?> an(s)</p>
                <p>BIBLIOTHÈQUE</p>
                <p class="books-owned"><?= $booksOwnedCount; ?> livres</p>
                <a class="add-book-btn" href="index.php?action=addBookForm">Ajouter un livre</a>
            </div>
        </div>
        <div class="edit-user-form">
            <form action="index.php?action=modifyUser" method="post" class="form-grid">
                <label for="email">Adresse email</label>
                <input class="form-input" type="email" name="email" id="email" value="<?= htmlspecialchars($user->getEmail()); ?>" required>
                <label for="password">Mot de passe</label>
                <input class="form-input" type="password" name="password" id="password">
                <label for="nickname">Pseudo</label>
                <input class="form-input" type="text" name="nickname" id="nickname" value="<?= htmlspecialchars($user->getNickname()); ?>" required>
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
                        <td><img class="book-form-image" src="<?= htmlspecialchars($book->getImage()); ?>" alt="<?= htmlspecialchars($book->getTitle()); ?>"></td>
                        <td><?= htmlspecialchars($book->getTitle()); ?></td>
                        <td><?= htmlspecialchars($book->getAuthor()); ?></td>
                        <td><?= htmlspecialchars($book->getDescription()); ?></td>
                        <td class="book-availability">
                            <span class="<?= $book->getStatus() ? 'available' : 'unavailable'; ?>">
                                <?= $book->getStatus() ? 'disponible' : 'non dispo.'; ?>
                            </span>
                        </td>
                        <td>
                            <a class="edit-book-btn" href="index.php?action=editBookForm&id=<?= $book->getId(); ?>">Éditer</a>
                            <a class="delete-book-btn" href="index.php?action=deleteBook&id=<?= $book->getId(); ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="modal hidden" id="change-image-modal">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-header-title">Modifier votre photo</p>
                <button type="button" class="close-modal">X</button>
            </div>
            <form class="modal-form" action="index.php?action=changeUserImage" method="post" enctype="multipart/form-data">
                <label for="userImage" class="visually-hidden">Choisissez une nouvelle photo de profil :</label>
                <input class="input-file" type="file" name="userImage" id="userImage" accept=".jpg,.jpeg,.png" required>
                <div class="modal-buttons">
                    <button class="modal-save-btn" type="submit" >Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>