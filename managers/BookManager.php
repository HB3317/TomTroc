<?php
class BookManager extends AbstractEntityManager
{
    public function getAllBooks() : array
    {
        $sql = "SELECT * FROM books";
        $result = $this->db->query($sql);
        $books = [];

        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }
        return $books;
    }

    public function getBookById(int $id) : ?Book
    {
        $sql = "SELECT * FROM books WHERE id = :id";
        $result = $this->db->query($sql, ['id' => $id]);
        $book = $result->fetch();
        if ($book) {
            return new Book($book);
        }
        return null;
    }

    public function addOrUpdateBook(Book $book) : void 
    {
        if ($book->getId() == -1) {
            $this->addBook($book);
        } else {
            $this->updateBook($book);
        }
    }

    
    public function addBook(Book $book) : void
    {
        $sql = "INSERT INTO books (user_id, title, author, image, description, status) 
                VALUES (:user_id, :title, :author, :image, :description, :status)";
        $this->db->query($sql, [
            'user_id'       => $book->getUserId(),
            'title'         => $book->getTitle(),
            'author'        => $book->getAuthor(),
            'image'         => $book->getImage(),
            'description'   => $book->getDescription(),
            'status'        => $book->getStatus()
        ]);
    }

    public function updateBook(Book $book) : void
    {
        $sql = "UPDATE books 
                SET user_id = :user_id, title = :title, author = :author, image = :image, description = :description, status = :status 
                WHERE id = :id";
        $this->db->query($sql, [
            'id'            => $book->getId(),
            'user_id'       => $book->getUserId(),
            'title'         => $book->getTitle(),
            'author'        => $book->getAuthor(),
            'image'         => $book->getImage(),
            'description'   => $book->getDescription(),
            'status'        => $book->getStatus()
        ]);
    }

    public function deleteBook(int $id) : void
    {
        $sql = "DELETE FROM books WHERE id = :id";
        $this->db->query($sql, ['id' => $id]);
    }

    public function getBooksByUserId(int $userId) : array
    {
        $sql = "SELECT * FROM books WHERE user_id = :user_id";
        $result = $this->db->query($sql, ['user_id' => $userId]);
        $books = [];

        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }
        return $books;
    }

    public function getBooksCountByUserId(int $userId) : int
    {
        $sql = "SELECT COUNT(*) FROM books WHERE user_id = :user_id";
        $result = $this->db->query($sql, ['user_id' => $userId]);
        return (int)$result->fetchColumn();
    }
}