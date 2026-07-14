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
        $this->redirectIfNotConnected();
        $userId = $_SESSION['user_id'];
        $data = $this->getUserProfileData((int)$userId);
        $view = new View("Mon compte");
        $view->render('myAccount', $data);
    }

    public function publicAccount(): void
    {
        $userId = Utils::request('id');
        if ($userId === null) {
            throw new Exception("Utilisateur non trouvé.");
        }
        $data = $this->getUserProfileData((int)$userId);
        $view = new View("Profil public");
        $view->render('publicAccount', $data);
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

    public function modifyUser(): void
    {
        $this->redirectIfNotConnected();
        $userId = $_SESSION['user_id'];
        $email = trim(Utils::request('email')??'');
        $password = trim(Utils::request('password')??'');
        $nickname = trim(Utils::request('nickname')??'');
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
        // Vérifier si l'email ou le pseudo est déjà utilisé par un autre utilisateur
        $existingUserByEmail = $userManager->getUserByEmail($email);
        if ($existingUserByEmail !== null && $existingUserByEmail->getId() !== $userId) {
            throw new Exception("Un utilisateur avec cet email existe déjà.");
        }
        $existingUserByNickname = $userManager->getUserByNickname($nickname);
        if ($existingUserByNickname !== null && $existingUserByNickname->getId() !== $userId) {
            throw new Exception("Un utilisateur avec ce pseudo existe déjà.");
        }

        // Mettre à jour les informations de l'utilisateur
        if ($password !== '') {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        } else {
            $passwordHash = $user->getPasswordHash(); // Conserver l'ancien mot de passe si aucun nouveau n'est fourni
        }
        $userManager->updateUser($userId, $nickname, $email, $passwordHash);

        header("Location: index.php?action=myAccount");
        exit();
    }

    public function changeUserImage(): void
    {
        $this->redirectIfNotConnected();
        if (!isset($_FILES['userImage']) || $_FILES['userImage']['error'] !== UPLOAD_ERR_OK) {
            throw new Exception("Erreur lors du téléchargement de l'image.");
        }
        $destination = './assets/images/users/' . $_SESSION['user_id'] . '.jpg';
        ImageService::saveUploadedImageAsSquareJpeg($_FILES['userImage']['tmp_name'], $destination, 500);
        $UserManager= new UserManager();
        $UserManager->updateUserImage($_SESSION['user_id'], $destination);
        header('Location: index.php?action=myAccount');
        exit();
    }

    private function redirectIfNotConnected(): void
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=loginForm");
            exit();
        }
    }
}