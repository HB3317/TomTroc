<div class="home-content">
    <div class="join-us">
        <div class="join-us-text">
            <h1>Rejoignez nos lecteurs passionnés </h1>
            <p>Donnez une nouvelle vie à vos livres en les échangeant avec d'autres amoureux de la lecture. Nous croyons en la magie du partage de connaissances et d'histoires à travers les livres. </p>
            <a href="index.php?action=books" class="primary-btn">Découvrir</a>
        </div>
        <div class="join-us-image">
            <img src="./assets/images/pages/home/home1.jpg" alt="Image">
            <p>Hamza</p>
        </div>
    </div>
    <div class="last-books">
        <h1>Les derniers livres ajoutés</h1>
        <div class="books-grid">
            <?php foreach ($books as $book) : ?>
                <div class="book-card">
                    <img src="<?= htmlspecialchars($book->getImage()); ?>" alt="Image du livre">
                    <p class="book-title"><?= htmlspecialchars($book->getTitle()); ?></p>
                    <p class="book-author"><?= htmlspecialchars($book->getAuthor()); ?></p>
                    <p class="book-user-id">Vendu par : <?= htmlspecialchars($book->getUserNickname()); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <a href="index.php?action=books" class="primary-btn">Voir tous les livres</a>
    </div>
    <div class="how-it-works">
        <h1>Comment ça marche ?</h1>
        <p>Échanger des livres avec TomTroc c'est simple et amusant ! Suivez ces étapes pour commencer :</p>   
        <div class="steps">
            <p>Inscrivez-vous gratuitement sur notre plateforme.</p>
            <p>Ajoutez les livres que vous souhaitez échanger à votre profil.</p>
            <p>Parcourez les livres disponibles chez d'autres membres.</p>
            <p>Proposez un échange et discutez avec d'autres passionnés de lecture.</p>   
        </div>
        <a href="index.php?action=books" class="secondary-btn">Voir tous les livres</a>
    </div>
    <img class="banner" src="./assets/images/pages/home/home2.jpg" alt="Image">
    <div class="our-values">
        <h1>Nos valeurs</h1>
        <p>Chez Tom Troc, nous mettons l'accent sur le partage, la découverte et la communauté. Nos valeurs sont ancrées dans notre passion pour les livres et notre désir de créer des liens entre les lecteurs. Nous croyons en la puissance des histoires pour rassembler les gens et inspirer des conversations enrichissantes.<br><br>
            Notre association a été fondée avec une conviction profonde : chaque livre mérite d'être lu et partagé.<br><br>
            Nous sommes passionnés par la création d'une plateforme conviviale qui permet aux lecteurs de se connecter, de partager leurs découvertes littéraires et d'échanger des livres qui attendent patiemment sur les étagères.
        </p>
        <div class="signature">
            <p>L'équipe de TomTroc</p>
            <img src="./assets/images/pages/home/vector2.svg" alt="Signature">
        </div>
    </div>
</div>