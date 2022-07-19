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
     * @return bool|array
     */
    public function getOneBook(int $idBook): bool|array
    {
        $query = "SELECT * FROM books 
        INNER JOIN books_categories 
        ON books.id_books = books_categories.id_books 
        INNER JOIN categories 
        ON books_categories.id_categories = categories.id_categories 
        WHERE books.id_books = :idBook LIMIT 1";

        $data['idBook'] = $idBook;
        $book =  $this->db->read($query, $data);

        return $book;
    }

    /**
     * updateBook
     *
     * @param  string $title
     * @param  string $author
     * @param  int $idBook
     * @return bool
     */
    public function updateBook(string $title, string $author, int $idBook): bool
    {
        $query  = "UPDATE books SET title = :title, author = :author WHERE id_books = :idBook";
        $data['idBook'] = $idBook;
        $data['title'] = $title;
        $data['author'] = $author;
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
