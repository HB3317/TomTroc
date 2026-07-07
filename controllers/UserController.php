<?php
class UserController
{
    public function loginForm(): void
    {
        $view = new View("Connexion");
        $view->render('loginForm');
    }

    public function login(): void
    {
        $email = trim(Utils::request('email')??'');
        $password = (Utils::request('password')??'');

        if ($email === '' || $password === '') {
            throw new Exception("Tous les champs sont requis pour se connecter.");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("L'adresse email n'est pas valide.");
        }

        $userManager = new UserManager();
        $user = $userManager->getUserByEmail($email);

        if ($user === null || !password_verify($password, $user->getPasswordHash())) {
            throw new Exception("Identifiants invalides.");
        }

        $_SESSION['user_id'] = (int) $user->getId();
        header("Location: index.php?action=home");
        exit();
    }

    public function logout(): void
    {
        $_SESSION = [];
        session_destroy();
        header("Location: index.php?action=loginForm");
        exit();
    }

    public function registerForm(): void
    {
        $view = new View("Inscription");
        $view->render('registerForm');
    }

    public function register(): void
    {
        $nickname = trim(Utils::request('nickname')??'');
        $email = trim(Utils::request('email')??'');
        $password = (Utils::request('password')??'');

        if ($nickname === '' || $email === '' || $password === '') {
            throw new Exception("Tous les champs sont requis pour s'inscrire.");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("L'adresse email n'est pas valide.");
        }

        $userManager = new UserManager();
        if ($userManager->getUserByEmail($email) !== null) {
            throw new Exception("Un utilisateur avec cet email existe déjà.");
        }
        if ($userManager->getUserByNickname($nickname) !== null) {
            throw new Exception("Un utilisateur avec ce pseudo existe déjà.");
        }

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $userManager->createUser($nickname, $email, $passwordHash);

        header("Location: index.php?action=loginForm");
        exit();
    }

    public function myAccount(): void
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=loginForm");
            exit();
        }

        $userId = $_SESSION['user_id'];

        $userManager = new UserManager();
        $bookManager = new BookManager();

        $user = $userManager->getUserById($userId);

        if ($user === null) {
            throw new Exception("Utilisateur non trouvé.");
        }

        $userBooks = $bookManager->getBooksByUserId($userId);
        $booksOwnedCount = count($userBooks);

        $view = new View("Mon compte");
        $view->render('myAccount', [
            'user' => $user,
            'booksOwnedCount' => $booksOwnedCount,
            'userBooks' => $userBooks
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