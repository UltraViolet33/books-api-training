<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require("../vendor/autoload.php");

use App\Models\Book;

$book = new Book();
$books = $book->getAllBooks();
$booksJSON = json_encode($books);

echo $booksJSON;
