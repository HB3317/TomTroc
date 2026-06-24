<?php

require_once 'config/config.php';
require_once 'config/autoload.php';

// On récupère l'action demandée par l'utilisateur.
// Si aucune action n'est demandée, on affiche la page d'accueil.
$action = Utils::request('action', 'home');

// Try catch global pour gérer les erreurs
try {
    // Pour chaque action, on appelle le bon contrôleur et la bonne méthode.
    switch ($action) {
        // Pages accessibles à tous.
        case 'home':
            $homeController = new HomeController();
            $homeController->showHome();
            break;

        case 'books':
            $bookController = new BookController();
            $bookController->showBooks();
            break;
        
        case 'bookDetails': 
            $bookController = new BookController();
            $bookController->showBookDetails();
            break;

        case 'createBook':
            $bookController = new BookController();
            $bookController->createBook();
            break;

        case 'editBook':
            $bookController = new BookController();
            $bookController->editBook();
            break;
 
        case 'deleteBook': 
            $bookController = new BookController();
            $bookController->deleteBook();
            break;

        case 'login':
            $userController = new UserController();
            $userController->displayConnectionForm();
            break;

        case 'logout': 
            $userController = new UserController();
            $userController->logout();
            break;

        case 'register':
            $userController = new UserController();
            $userController->displayRegistrationForm();
            break;

        case 'myAccount':
            $userController = new UserController();
            $userController->showMyAccount();
            break;

        case 'userProfile':
            $userController = new UserController();
            $userController->showUserProfile();
            break;

        case 'chat': 
            $messageController = new MessageController();
            $messageController->showChat();
            break;

        case 'sendMessage':
            $messageController = new MessageController();
            $messageController->sendMessage();
            break;

        default:
            throw new Exception("La page demandée n'existe pas.");
    }
} catch (Exception $e) {
    $errorView = new View('Erreur');
    $errorView->render('errorPage', ['errorMessage' => $e->getMessage()]);
}