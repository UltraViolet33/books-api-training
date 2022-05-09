<?php
require("../vendor/autoload.php");


use App\Models\Book;

$book = new Book();

var_dump($book->getAllBooks());


echo 'test';
