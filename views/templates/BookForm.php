<?php $isEdit = isset($book) && $book !== null; ?>
<form action="index.php?action=<?= $isEdit ? 'editBook&id=' . $book->getId() : 'addBook'; ?>" method="post" enctype="multipart/form-data" class="bookForm">
    <div class="image">
        <h1><?= $isEdit ? 'Modifier le livre' : 'Ajouter un livre'; ?></h1>
        <p>Photo</p>
        <img id="book-preview" src="<?= $isEdit ? htmlspecialchars($book->getImage()) : './assets/images/books/default_book_image.jpg'; ?>" alt="Image du livre">
        <input type="file" name="bookImage" id="bookImage" accept=".jpg,.jpeg,.png" hidden>
        <label for="bookImage" class="change-image-btn">Modifier la photo</label>
    </div>
    <div class="form">
        <div class="formGrid">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" value="<?= $isEdit ? htmlspecialchars($book->getTitle()) : ''; ?>" required>
            <label for="author">Auteur</label>
            <input type="text" name="author" id="author" value="<?= $isEdit ? htmlspecialchars($book->getAuthor()) : ''; ?>" required>
            <label for="description">Commentaire</label>
            <textarea name="description" id="description" required><?= $isEdit ? htmlspecialchars($book->getDescription()) : ''; ?></textarea>
            <label for="status">Disponibilité</label>
            <select name="status" id="status" required>
                <option value="1" <?= $isEdit && $book->getStatus() ? 'selected' : ''; ?>>Disponible</option>
                <option value="0" <?= $isEdit && !$book->getStatus() ? 'selected' : ''; ?>>Non disponible</option>
            </select>
        </div>
        <button type="submit" class="primaryBtn"><?= $isEdit ? 'Valider' : 'Ajouter'; ?></button>
    </div>
</form>