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

    public function addBook(Book $book) : int
    {
        $defaultImagePath = './assets/images/books/default_book_image.jpg';
        $sql = "INSERT INTO books (user_id, title, author, image, description, status) 
                VALUES (:user_id, :title, :author, :image, :description, :status)";
        $this->db->query($sql, [
            'user_id'       => $book->getUserId(),
            'title'         => $book->getTitle(),
            'author'        => $book->getAuthor(),
            'image'         => $defaultImagePath,
            'description'   => $book->getDescription(),
            'status'        => $book->getStatus()
        ]);
        $bookId = (int)$this->db->lastInsertId();
        return $bookId;
    }

    public function updateBook(int $bookId, int $userId, string $title, string $author, string $description, bool $status) : void
    {
        $sql = "UPDATE books 
                SET user_id = :user_id, title = :title, author = :author, description = :description, status = :status 
                WHERE id = :id";
        $this->db->query($sql, [
            'id'            => $bookId,
            'user_id'       => $userId,
            'title'         => $title,
            'author'        => $author,
            'description'   => $description,
            'status'        => $status
        ]);
    }

    public function changeBookImage(int $bookId, string $imagePath) : void
    {
        $sql = "UPDATE books SET image = :image WHERE id = :id";
        $this->db->query($sql, [
            'id' => $bookId,
            'image' => $imagePath
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