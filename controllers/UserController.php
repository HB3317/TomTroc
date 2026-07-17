<?php

class UserController
{
    public function loginForm(): void
    {
        if (isset($_SESSION['user_id'])) {
            throw new Exception("Vous êtes déjà connecté.");
        }
        $view = new View("Connexion");
        $view->render('loginForm', [
            'currentPage' => 'loginForm'
        ]);
    }

    public function login(): void
    {
        if (isset($_SESSION['user_id'])) {
            throw new Exception("Vous êtes déjà connecté.");
        }
        $email = trim(Utils::request('email') ?? '');
        $password = Utils::request('password') ?? '';
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
        Utils::redirect('myAccount');
    }

    public function logout(): void
    {
        $_SESSION = [];
        session_destroy();
        Utils::redirect('loginForm');
    }

    public function registerForm(): void
    {
        if (isset($_SESSION['user_id'])) {
            throw new Exception("Vous êtes déjà connecté.");
        }
        $view = new View("Inscription");
        $view->render('registerForm', [
            'currentPage' => 'registerForm',
        ]);
    }

    public function register(): void
    {
        if (isset($_SESSION['user_id'])) {
            throw new Exception("Vous êtes déjà connecté.");
        }
        $nickname = trim(Utils::request('nickname') ?? '');
        $email = trim(Utils::request('email') ?? '');
        $password = Utils::request('password') ?? '';
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
        $userId = $userManager->createUser($nickname, $email, $passwordHash);
        $messageManager = new MessageManager();
        $messageManager->addMessage(
            1,
            $userId,
            "Bienvenue sur TomTroc !",
            date('Y-m-d H:i:s'),
            0
        );
        Utils::redirect('loginForm');
    }

    public function myAccount(): void
    {
        $this->redirectIfNotConnected();
        $userId = $_SESSION['user_id'];
        $data = $this->getUserProfileData((int) $userId);
        $data['currentPage'] = 'myAccount';
        $view = new View("Mon compte");
        $view->render('myAccount', $data);
    }

    public function publicAccount(): void
    {
        $userId = Utils::request('id');
        if ($userId === null || $userId === false || $userId <= 0) {
            throw new PageNotFoundException("L'utilisateur n'a pas été trouvé.");
        }
        $userManager = new UserManager();
        $user = $userManager->getUserById((int) $userId);
        if ($user === null) {
            throw new PageNotFoundException("L'utilisateur n'a pas été trouvé.");
        }
        $bookManager = new BookManager();
        $userBooks = $bookManager->getBooksByUserId((int) $userId);
        $view = new View("Profil public");
        $view->render('publicAccount', [
            'user' => $user,
            'booksOwnedCount' => count($userBooks),
            'userBooks' => $userBooks,
        ]);
    }

    public function modifyUser(): void
    {
        $this->redirectIfNotConnected();
        $userId = $_SESSION['user_id'];
        $email = trim(Utils::request('email') ?? '');
        $password = Utils::request('password') ?? '';
        $nickname = trim(Utils::request('nickname') ?? '');
        if ($email === '' || $nickname === '') {
            throw new Exception("Les champs email et pseudo sont requis pour modifier l'utilisateur.");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("L'adresse email n'est pas valide.");
        }
        $userManager = new UserManager();
        $user = $userManager->getUserById($userId);
        if ($user === null) {
            throw new Exception("Utilisateur non trouvé.");
        }
        $existingUserByEmail = $userManager->getUserByEmail($email);
        if ($existingUserByEmail !== null && $existingUserByEmail->getId() !== $userId) {
            throw new Exception("Un utilisateur avec cet email existe déjà.");
        }
        $existingUserByNickname = $userManager->getUserByNickname($nickname);
        if ($existingUserByNickname !== null && $existingUserByNickname->getId() !== $userId) {
            throw new Exception("Un utilisateur avec ce pseudo existe déjà.");
        }

        if ($password !== '') {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        } else {
            throw new Exception("Un mot de passe est requis pour modifier l'utilisateur.");
        }
        $userManager->updateUser($userId, $nickname, $email, $passwordHash);
        Utils::redirect('myAccount');
    }

    public function changeUserImage(): void
    {
        $this->redirectIfNotConnected();
        if (!isset($_FILES['userImage']) || $_FILES['userImage']['error'] !== UPLOAD_ERR_OK) {
            throw new Exception("Erreur lors du téléchargement de l'image.");
        }
        $destination = './assets/images/users/' . $_SESSION['user_id'] . '.jpg';
        ImageService::saveUploadedImageAsSquareJpeg($_FILES['userImage']['tmp_name'], $destination, 500);
        $userManager = new UserManager();
        $userManager->updateUserImage($_SESSION['user_id'], $destination);
        Utils::redirect('myAccount');
    }

    private function redirectIfNotConnected(): void
    {
        if (!isset($_SESSION['user_id'])) {
            Utils::redirect('loginForm');
        }
    }

    private function getUserProfileData(int $userId): array
    {
        $userManager = new UserManager();
        $bookManager = new BookManager();
        $user = $userManager->getUserById($userId);
        if ($user === null) {
            throw new Exception("Utilisateur non trouvé.");
        }
        $userBooks = $bookManager->getBooksByUserId($userId);
        return [
            'user' => $user,
            'booksOwnedCount' => count($userBooks),
            'userBooks' => $userBooks
        ];
    }
}
