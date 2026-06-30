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

    public function createBook(): void
    {
        $view = new View("Nouveau livre");
        $view->render('bookForm');
    }

    public function editBook(): void
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
        $view = new View("Modifier livre");
        $view->render('bookForm' , [
            'book' => $book
        ]);
    }

    public function deleteBook(): void
    {
        $bookId = Utils::request('id');

        if ($bookId === null){
            throw new Exception ("Aucun identifiant de livre fourni.");
        }
        $bookManager = new BookManager();
        $bookManager->deleteBook($bookId);
        Utils::redirect('myAccount');
    }
}