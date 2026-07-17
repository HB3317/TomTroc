<?php
require_once 'config/config.php';
require_once 'config/autoload.php';

$action = Utils::request('action', 'home');

$routes = [
    'home'              => [BookController::class,      'home'],
    'books'             => [BookController::class,      'showBooks'],
    'addBookForm'       => [BookController::class,      'addBookForm'],
    'editBookForm'      => [BookController::class,      'editBookForm'],
    'bookDetails'       => [BookController::class,      'bookDetails'],
    'addBook'           => [BookController::class,      'addBook'],
    'editBook'          => [BookController::class,      'editBook'],
    'deleteBook'        => [BookController::class,      'deleteBook'],
    'loginForm'         => [UserController::class,      'loginForm'],
    'logout'            => [UserController::class,      'logout'],
    'registerForm'      => [UserController::class,      'registerForm'],
    'myAccount'         => [UserController::class,      'myAccount'],
    'publicAccount'     => [UserController::class,      'publicAccount'],
    'login'             => [UserController::class,      'login'],
    'register'          => [UserController::class,      'register'],
    'modifyUser'        => [UserController::class,      'modifyUser'],
    'changeUserImage'   => [UserController::class,      'changeUserImage'],
    'chat'              => [MessageController::class,   'chat'],
    'sendMessage'       => [MessageController::class,   'sendMessage'],
];

try {
    if (!isset($routes[$action])) {
        throw new Exception("La page demandée n'existe pas.");
    }
    $controllerName = $routes[$action][0];
    $methodName = $routes[$action][1];
    $controller = new $controllerName();
    $controller->$methodName();
} catch (Exception $e) {
    $errorView = new View('Erreur');
    $errorView->render('errorPage', ['errorMessage' => $e->getMessage()]);
}