<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TomTroc</title>
    <link rel="stylesheet" href="./assets/css/style.css?v=<?= filemtime('./assets/css/style.css'); ?>">
    <?php if ($css !== null) { ?>
        <link rel="stylesheet" href="<?= $css ?>?v=<?= filemtime($css); ?>">
    <?php } ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Playfair+Display:wght@400..900&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="main-menu">
            <div class="main-menu-left">
                <a href="index.php?action=home">
                    <img src="./assets/images/logo/logo.svg" alt="Accueil"> </a>
                <a class="<?= ($currentPage === 'home') ? 'menu-active' : '' ?>" href="index.php?action=home">
                    Accueil
                </a>
                <a class="<?= ($currentPage === 'books') ? 'menu-active' : '' ?>" href="index.php?action=books">
                    Nos livres à l'échange
                </a>
            </div>

            <div class="main-menu-right">
                <?php 
                if (isset($_SESSION['user_id'])) { ?>
                    <a class="<?= ($currentPage === 'chat') ? 'menu-active' : '' ?>" href="index.php?action=chat">
                        <img src="./assets/icons/chat.png" alt="Messagerie">
                        Messagerie
                        <span class="message-count">
                            <?= (int) ($unreadMessageCount ?? 0); ?>
                        </span>
                    </a>

                    <a class="<?= ($currentPage === 'myAccount') ? 'menu-active' : '' ?>" href="index.php?action=myAccount">
                        <img src="./assets/icons/myAccount.png" alt="Mon compte">
                        Mon compte
                    </a>

                    <a href="index.php?action=logout">
                        Déconnexion
                    </a>
                <?php } 
                else { ?>
                    <?php 
                    if ($currentPage === 'registerForm') { ?>
                        <a class="menu-active" href="index.php?action=registerForm">
                            Inscription
                        </a>
                    <?php } else { ?>
                        <a class="<?= ($currentPage === 'loginForm') ? 'menu-active' : '' ?>" href="index.php?action=loginForm">
                            Connexion
                        </a>
                    <?php } ?>
                <?php } ?>
            </div>
        </nav>

    </header>

    <main>    
        <?= $content /* Ici est affiché le contenu réel de la page. */ ?>
    </main>
    
    <footer>
        <nav class="footer-menu">
            <a href="#">Politique de confidentialité</a>
            <a href="#">Mentions légales</a>
            <a href="#">Tom Troc©</a>
            <a href="#">
                <img src="./assets/images/logo/logo2.svg" alt="Retour à l'accueil">
            </a>
        </nav>
    </footer>
    <script src="./assets/js/app.js"></script>
    <?php if ($js !== null) { ?>
        <script src="<?= $js ?>?v=1"></script>
    <?php } ?>
</body>
</html>