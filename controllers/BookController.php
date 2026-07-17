<?php

class BookController
{
    public function bookDetails(): void
    {
        $currentUserId = $_SESSION['user_id'] ?? null;
        $bookId = filter_var(
            Utils::request('id'),
            FILTER_VALIDATE_INT,
            ['options' => ['min_range' => 1]]
        );
        if ($bookId === false) {
            throw new PageNotFoundException("Le livre n'a pas été trouvé.");
        }
        $bookManager = new BookManager();
        $book = $bookManager->getBookById($bookId);
        if ($book === null) {
            throw new PageNotFoundException("Le livre n'a pas été trouvé.");
        }
        $view = new View("Livre");
        $view->render('bookDetails', [
            'book' => $book,
            'currentUserId' => $currentUserId,
        ]);
    }

    public function addBookForm(): void
    {
        if (!isset($_SESSION['user_id'])) {
            throw new Exception("Vous devez être connecté pour ajouter un livre.");
        }
        $view = new View("Nouveau livre");
        $view->render('bookForm');
    }

    public function addBook(): void
    {
        $title = Utils::request('title');
        $author = Utils::request('author');
        $description = Utils::request('description');
        $userId = $_SESSION['user_id'] ?? null;
        $status = Utils::request('status') === '1';
        if ($userId === null) {
            throw new Exception("Vous devez être connecté pour ajouter un livre.");
        }
        $book = new Book([
            'user_id' => $userId,
            'title' => $title,
            'author' => $author,
            'description' => $description,
            'status' => $status,
        ]);
        $bookManager = new BookManager();
        $bookId = $bookManager->addBook($book);
        if (isset($_FILES['bookImage']) && $_FILES['bookImage']['error'] === UPLOAD_ERR_OK) {
            $tmpPath = $_FILES['bookImage']['tmp_name'];
            $destination = './assets/images/books/' . $bookId . '.jpg';
            ImageService::saveUploadedImageAsSquareJpeg($tmpPath, $destination, 500);
            $bookManager->changeBookImage($bookId, $destination);
        }
        Utils::redirect('myAccount');
    }

    public function editBookForm(): void
    {
        if (!isset($_SESSION['user_id'])) {
            throw new Exception("Vous devez être connecté pour modifier un livre.");
        }
        $bookId = filter_var(
            Utils::request('id'),
            FILTER_VALIDATE_INT,
            ['options' => ['min_range' => 1]]
        );
        if ($bookId === false) {
            throw new PageNotFoundException("Le livre n'a pas été trouvé.");
        }
        $bookManager = new BookManager();
        $book = $bookManager->getBookById($bookId);
        if ($book === null) {
            throw new PageNotFoundException("Le livre n'a pas été trouvé.");
        }
        if ($book->getUserId() !== $_SESSION['user_id']) {
            throw new Exception("Vous ne pouvez pas modifier ce livre.");
        }
        $view = new View("Modifier livre");
        $view->render('bookForm', [
            'book' => $book
        ]);
    }

    public function editBook(): void
    {
        $userId = $_SESSION['user_id'] ?? null;
        if ($userId === null) {
            throw new Exception("Vous devez être connecté pour modifier un livre.");
        }
        $bookId = filter_var(
            Utils::request('id'),
            FILTER_VALIDATE_INT,
            ['options' => ['min_range' => 1]]
        );
        if ($bookId === false) {
            throw new PageNotFoundException("Le livre n'a pas été trouvé.");
        }
        $title = Utils::request('title');
        $author = Utils::request('author');
        $description = Utils::request('description');
        $status = Utils::request('status') === '1';
        $bookManager = new BookManager();
        $book = $bookManager->getBookById($bookId);
        if ($book === null) {
            throw new PageNotFoundException("Le livre n'a pas été trouvé.");
        }
        if ($book->getUserId() !== $_SESSION['user_id']) {
            throw new Exception("Vous ne pouvez pas modifier ce livre.");
        }
        $bookManager->updateBook(
            $bookId,
            $userId,
            $title,
            $author,
            $description,
            $status,
        );
        if (isset($_FILES['bookImage']) && $_FILES['bookImage']['error'] === UPLOAD_ERR_OK) {
            $tmpPath = $_FILES['bookImage']['tmp_name'];
            $destination = './assets/images/books/' . $book->getId() . '.jpg';
            ImageService::saveUploadedImageAsSquareJpeg($tmpPath, $destination, 500);
            $bookManager->changeBookImage($book->getId(), $destination);
        }
        Utils::redirect('myAccount');
    }

    public function deleteBook(): void
    {
        $userId = $_SESSION['user_id'] ?? null;
        if ($userId === null) {
            throw new Exception("Vous devez être connecté pour supprimer un livre.");
        }
        $bookId = filter_var(
            Utils::request('id'),
            FILTER_VALIDATE_INT,
            ['options' => ['min_range' => 1]]
        );
        if ($bookId === false) {
            throw new PageNotFoundException("Le livre n'a pas été trouvé.");
        }
        $bookManager = new BookManager();
        $book = $bookManager->getBookById($bookId);
        if ($book === null) {
            throw new PageNotFoundException("Le livre n'a pas été trouvé.");
        }
        if ($book->getUserId() !== $_SESSION['user_id']) {
            throw new Exception("Vous ne pouvez pas supprimer ce livre.");
        }
        $bookManager->deleteBook($bookId);
        Utils::redirect('myAccount');
    }

    public function home(): void
    {
        $bookManager = new BookManager();
        $books = $bookManager->getLatestBooks();
        $view = new View("Accueil");
        $view->render('home', [
            'books' => $books,
            'currentPage' => 'home',
        ]);
    }

    public function showBooks(): void
    {
        $search = trim(Utils::request('search', ''));
        $bookManager = new BookManager();
        if ($search === '') {
            $books = $bookManager->getLatestBooks(null);
        } else {
            $books = $bookManager->searchBooks($search);
        }
        $view = new View("Nos livres à l'échange");
        $view->render('books', [
            'books' => $books,
            'search' => $search,
            'currentPage' => 'books',
        ]);
    }
}
