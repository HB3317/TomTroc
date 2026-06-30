<?php

require_once 'config/config.php';
require_once 'config/autoload.php';

// On récupère l'action demandée par l'utilisateur.
// Si aucune action n'est demandée, on affiche la page d'accueil.
$action = Utils::request('action', 'home');

//Déclaration des routes
$routes = [
    'home'          => [HomeController::class,      'showHome'],

    'books'         => [BookController::class,      'showBooks'],
    'bookDetails'   => [BookController::class,      'showBookDetails'],
    'createBook'    => [BookController::class,      'createBook'],
    'editBook'      => [BookController::class,      'editBook'],
    'deleteBook'    => [BookController::class,      'deleteBook'],

    'login'         => [UserController::class,      'displayConnectionForm'],
    'logout'        => [UserController::class,      'logout'],
    'register'      => [UserController::class,      'displayRegistrationForm'],
    'myAccount'     => [UserController::class,      'showMyAccount'],
    'userProfile'   => [UserController::class,      'showUserProfile'],

    'chat'          => [MessageController::class,   'showChat'],
    'sendMessage'   => [MessageController::class,   'sendMessage'],
];

// Si l'action existe dans les routes, on appelle le contrôleur et la méthode associés.
// Sinon, on affiche une page d'erreur.
try {
    if (!isset($routes[$action])) {
        throw new Exception("La page demandée n'existe pas.");
    }
    [$controllerName, $methodName] = $routes[$action];

    $controller = new $controllerName();
    $controller->$methodName();
} catch (Exception $e) {
    $errorView = new View('Erreur');
    $errorView->render('errorPage', ['errorMessage' => $e->getMessage()]);
}