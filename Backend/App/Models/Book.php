<?php

namespace App\Models;

use App\config\Database;

class Book
{
    private Database $db;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->db = Database::getInstance();
    }


    /**
     * getAllBooks
     *
     * @return array
     */
    public function getAllBooks(): array
    {
        $query = "SELECT * FROM books";
        return $this->db->read($query);
    }

    /**
     * createBook
     *
     * @param  string $title
     * @param  string $author
     * @return bool
     */
    public function createBook(string $title, string $author): bool
    {
        $query = "INSERT INTO books SET title = :title, author = :author";
        $data['title'] = htmlspecialchars($title);
        $data['author'] = htmlspecialchars($author);
        return $this->db->write($query, $data);
    }


    /**
     * getOneBook
     *
     * @param  int $idBook
     * @return bool|object
     */
    public function getOneBook(int $idBook): bool|object
    {
        $query = "SELECT * FROM books WHERE id_books = :idBook LIMIT 1";
        $book =  $this->db->readOneRow($query, ["idBook" => $idBook]);
        return $book;
    }

    /**
     * updateBook
     *
     * @param  object $book
     * @return bool
     */
    public function updateBook(object $book): bool
    {
        $query  = "UPDATE books SET title = :title, author = :author, isRead = :isRead WHERE id_books = :idBook";
        $data['idBook'] = htmlspecialchars($book->idBook);
        $data['title'] = htmlspecialchars($book->title);
        $data['author'] = htmlspecialchars($book->author);
        $data['isRead'] =  $book->isRead ? 1 : 0;
        $result = $this->db->write($query, $data);
        return $result;
    }


    /**
     * deleteBook
     *
     * @param  int $idBook
     * @return bool
     */
    public function deleteBook(int $idBook): bool
    {
        $query = "DELETE FROM books WHERE id_books = :idBook";
        $data['idBook'] = $idBook;
        return $this->db->write($query, $data);
    }
}
