<?php
class UserController
{
    public function loginForm(): void
    {
        $view = new View("Connexion");
        $view->render('login');
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
        session_destroy();
        header("Location: index.php?action=loginForm");
        exit();
    }

    public function registerForm(): void
    {
        $view = new View("Inscription");
        $view->render('register');
    }

    public function register(): void
    {
        $firstName = trim(Utils::request('firstName')??'');
        $lastName = trim(Utils::request('lastName')??'');
        $nickname = trim(Utils::request('nickname')??'');
        $email = trim(Utils::request('email')??'');
        $password = (Utils::request('password')??'');
        $confirmPassword = (Utils::request('confirmPassword')??'');
        $image = Utils::request('image');

        if ($firstName === '' || $lastName === '' || $nickname === '' || $email === '' || $password === '' || $confirmPassword === '') {
            throw new Exception("Tous les champs sont requis pour s'inscrire, l'image reste optionnelle.");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("L'adresse email n'est pas valide.");
        }

        if ($password !== $confirmPassword) {
            throw new Exception("Les mots de passe ne correspondent pas.");
        }

        $userManager = new UserManager();
        if ($userManager->getUserByEmail($email) !== null) {
            throw new Exception("Un utilisateur avec cet email existe déjà.");
        }

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $userManager->createUser($firstName, $lastName, $nickname, $email, $passwordHash, $image);

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