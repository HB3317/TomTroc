<?php
class UserController
{
    public function login(): void
    {
        $view = new View("Connexion");
        $view->render('login');
    }

    public function logout(): void
    {
        session_destroy();
        header("Location: index.php?action=login");
        exit();
    }

    public function register(): void
    {
        $view = new View("Inscription");
        $view->render('register');
    }

    public function myAccount(): void
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit();
        }

        $userId = $_SESSION['user_id'];
        $userManager = new UserManager();
        $user = $userManager->getUserById($userId);

        if ($user === null) {
            throw new Exception("Utilisateur non trouvé.");
        }

        $view = new View("Mon compte");
        $view->render('myAccount', [
            'user' => $user
        ]);
    }

    public function userProfile(): void
    {
        $id = Utils::request('id');

        if ($id === null) {
            throw new Exception("Utilisateur non trouvé.");
        }

        $userManager = new UserManager();
        $user = $userManager->getUserById((int) $id);

        if ($user === null) {
            throw new Exception("Utilisateur non trouvé.");
        }

        $view = new View("Profil utilisateur");
        $view->render('userProfile', [
            'user' => $user
        ]);
    }
}