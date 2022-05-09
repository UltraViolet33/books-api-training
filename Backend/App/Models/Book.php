<?php

namespace App\Models;

use App\config\Database;

class Book
{
    private $db;
    private  string  $title;
    private string $author;
    private bool $isRead;
    private array $categories;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getAllBooks()
    {
        $query = "SELECT * FROM books INNER JOIN books_categories ON books.id_books = books_categories.id_books INNER JOIN categories ON books_categories.id_categories = categories.id_categories";
        // $query = "SELECT * FROM books";
        $books = $this->db->read($query);

        $booksArray = [];
        //   var_dump($books);


        $id = -1;
        foreach ($books as $book) {
            extract($book);
            if ($id === $id_books) {
                $key = array_search($id, array_column($booksArray, 'id_book'));
                $booksArray[$key]['categories'][] = $name;
            } else {
                $bookArray = [];
                $bookArray['id_book'] = $id_books;
                $bookArray['title'] = $title;
                $bookArray['author'] = $author;
                $bookArray['idRead'] = $isRead;
                $bookArray['categories'] = [$name];
                array_push($booksArray, $bookArray);
            }

            $id = $id_books;
        }
        return $booksArray;
    }
}
