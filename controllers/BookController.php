<?php

class BookController
{
    public function showBooks(): void
    {
        $bookManager = new BookManager();
        $books = $bookManager->getAllBooks();
        $view = new View("Nos livres à l'échange");
        $view->render('books' , [
            'books' => $books
        ]);
    }

    public function showBookDetails(): void
    {
        $bookId = Utils::request('id');
        if ($bookId === null){
            throw new Exception ("Aucun identifiant de livre fourni.");
        }
        $bookManager = new BookManager();
        $book = $bookManager->getBookById($bookId);
        if ($book === null) {
            throw new Exception("Le livre n'a pas été trouvé.");
        }
        $view = new View("Livre");
        $view->render('bookDetails' , [
            'book' => $book
        ]);
    }

    public function addBookForm(): void
    {
        $view = new View("Nouveau livre");
        $view->render('bookForm');
    }

    public function addBook(): void
    {
        $title = Utils::request('title');
        $author = Utils::request('author');
        $description = Utils::request('description');
        $userId = $_SESSION['user_id'] ?? null;
        $status = Utils::request('status') === '1' ? true : false;
        if ($userId === null) {
            throw new Exception("Vous devez être connecté pour ajouter un livre.");
        }
        $book = new Book(['user_id' => $userId,'title' => $title,'author' => $author,'description' => $description,'status' => $status]);
        $bookManager = new BookManager();
        $bookId = $bookManager->addBook($book);
        // Gestion de l'image
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
        $view = new View("Modifier livre");
        $bookId = Utils::request('id');
        $bookManager = new BookManager();
        $book = $bookManager->getBookById($bookId);
        if ($book === null) {
            throw new Exception("Le livre n'a pas été trouvé.");
        }
        if ($book->getUserId() !== $_SESSION['user_id']) {
            throw new Exception("Vous ne pouvez pas modifier ce livre.");
        }
        $view->render('bookForm' , [
            'book' => $book
        ]);
    }

    public function editBook(): void
    {   
        $bookId = Utils::request('id');
        $title = Utils::request('title');
        $author = Utils::request('author');
        $description = Utils::request('description');
        $status = Utils::request('status') === '1' ? true : false;
        $userId = $_SESSION['user_id'];
        $bookManager = new BookManager();
        $book = $bookManager->getBookById($bookId);
        if ($book === null) {
            throw new Exception("Le livre n'a pas été trouvé.");
        }
        if ($book->getUserId() !== $_SESSION['user_id']) {
            throw new Exception("Vous ne pouvez pas modifier ce livre.");
        }
        $bookManager->updateBook($bookId, $userId, $title, $author, $description, $status);

        // Gestion de l'image
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
        $bookId = Utils::request('id');
        if ($bookId === null){
            throw new Exception ("Aucun identifiant de livre fourni.");
        }
        $bookManager = new BookManager();
        $book = $bookManager->getBookById($bookId);
        if ($book === null){
            throw new Exception ("Le livre n'a pas été trouvé.");
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
        $view->render('home', ['books' => $books]);
    }
}