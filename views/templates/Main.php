<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TomTroc</title>
    <link rel="stylesheet" href="./css/style.css?v=3">
</head>

<body>
    <header>
        <nav class="mainMenu">
            <div class="mainMenu-left">
                <a href="index.php?action=home">
                    <img src="./assets/images/logo/logo.svg" alt="Accueil"> </a>
                <a href="index.php?action=home">
                    Accueil
                </a>
                <a href="index.php?action=books">
                    Nos livres à l'échange
                </a>
            </div>

            <div class="mainMenu-right">
                <?php if (isset($_SESSION['user'])) { ?>
                    <a href="index.php?action=chat">
                        <img src="./assets/icons/chat.png" alt="Messagerie">
                        Messagerie
                        <span class="messageCount">
                            (<?= $unreadMessagesCount ?? 0; ?>)
                        </span>
                    </a>

                    <a href="index.php?action=myAccount">
                        <img src="./assets/icons/myAccount.png" alt="Mon compte">
                        Mon compte
                    </a>

                    <a href="index.php?action=logout">
                        Déconnexion
                    </a>
                <?php } else { ?>
                    <a href="index.php?action=login">
                        Connexion
                    </a>
                <?php } ?>
            </div>
        </nav>

    </header>

    <main>    
        <?= $content /* Ici est affiché le contenu réel de la page. */ ?>
    </main>
    
    <footer>
        <nav class="footerMenu">
            <a href="#">Politique de confidentialité</a>
            <a href="#">Mentions légales</a>
            <a href="#">Tom Troc©</a>
            <a href="#">
                <img src="./assets/images/logo/logo2.svg" alt="Accueil">
            </a>
        </nav>
    </footer>

</body>
</html>