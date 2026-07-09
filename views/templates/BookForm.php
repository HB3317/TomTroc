<?php $isEdit = isset($book) && $book !== null; ?>
<div class="book-form-view">
    <a class="back-button" href="index.php?action=myAccount"> ← Retour</a> 
    <h1><?= $isEdit ? 'Modifier les informations' : 'Ajouter un livre'; ?></h1>
    <form action="index.php?action=<?= $isEdit ? 'editBook&id=' . $book->getId() : 'addBook'; ?>" method="post" enctype="multipart/form-data" class="bookForm">
        <div class="image">
            <p class="image-label">Photo</p>
            <img id="book-preview" src="<?= $isEdit ? htmlspecialchars($book->getImage()) : './assets/images/books/default_book_image.jpg'; ?>" alt="Image du livre">
            <input type="file" name="bookImage" id="bookImage" accept=".jpg,.jpeg,.png" hidden>
            <label for="bookImage" class="change-image-btn">Modifier la photo</label>
        </div>
        <div class="form">
            <div class="form-grid">
                <label for="title">Titre</label>
                <input type="text" name="title" id="title" value="<?= $isEdit ? htmlspecialchars($book->getTitle()) : ''; ?>" required>
                <label for="author">Auteur</label>
                <input type="text" name="author" id="author" value="<?= $isEdit ? htmlspecialchars($book->getAuthor()) : ''; ?>" required>
                <label for="description">Commentaire</label>
                <textarea class="textarea" name="description" id="description" required><?= $isEdit ? htmlspecialchars($book->getDescription()) : ''; ?></textarea>
                <label for="status">Disponibilité</label>
                <select class="availability" name="status" id="status" required>
                    <option value="1" <?= $isEdit && $book->getStatus() ? 'selected' : ''; ?>>Disponible</option>
                    <option value="0" <?= $isEdit && !$book->getStatus() ? 'selected' : ''; ?>>Non disponible</option>
                </select>
            </div>
            <button type="submit" class="primaryBtn"><?= $isEdit ? 'Valider' : 'Ajouter'; ?></button>
        </div>
    </form>
</div>