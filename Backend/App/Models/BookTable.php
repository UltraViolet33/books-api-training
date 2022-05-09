<?php

namespace App\Models;

use App\config\Database;

class BookTable
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
        $books = $this->db->read($query, 'Book');


        var_dump($books);
        die;

       

        return $books;
    }
}
