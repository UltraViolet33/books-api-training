<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require "../vendor/autoload.php";

use App\Models\Book;

$errorMesg = array('message' => "Error, book not found");

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idBook = $_GET['id'];
} else {
    echo json_encode($errorMesg);
    return;
}

$book = new Book();
$singleBook = $book->getOneBook($idBook);

if (!$singleBook) {
    echo json_encode($errorMesg);
    return;
}

$singleBookJSON = json_encode($singleBook);
echo $singleBookJSON;
