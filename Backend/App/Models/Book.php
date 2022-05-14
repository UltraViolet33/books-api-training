<?php

namespace App\Models;

use App\config\Database;

class Book
{
    private Database $db;

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
        $query = "SELECT * FROM books 
        INNER JOIN books_categories ON books.id_books = books_categories.id_books 
        INNER JOIN categories ON books_categories.id_categories = categories.id_categories";
        $books = $this->db->read($query);
        $booksArray = [];

        $ids = [];

        foreach ($books as $book) {
            extract($book);
            if (array_search($id_books, $ids)) {
                $key = array_search($id_books, array_column($booksArray, 'id_book'));
                $booksArray[$key]['categories'][] = $name;
            } else {
                $bookArray = [];
                $bookArray['id_book'] = $id_books;
                $bookArray['title'] = $title;
                $bookArray['author'] = $author;
                $bookArray['isRead'] = $isRead;
                $bookArray['categories'] = [$name];
                array_push($booksArray, $bookArray);
            }

            $ids[] = $id_books;
        }
        return $booksArray;
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
        if (!is_string($author) && !is_string($title)) {
            return false;
        }

        $query = "INSERT INTO books SET title = :title, author = :author";
        $data['title'] = $title;
        $data['author'] = $author;
        $this->db->write($query, $data);
        $bookId = $this->db->getLastInsertId();

        $query = "INSERT INTO books_categories SET id_books = $bookId, id_categories = 1";
        return $this->db->write($query);
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
