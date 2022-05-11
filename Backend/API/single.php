<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require("../vendor/autoload.php");

use App\Models\Book;

$errorMesg = array('message' => "Error, book not found");
$data = json_decode(file_get_contents("php://input"));

if (empty($data->idBook) || !isset($data->idBook) || !is_numeric($data->idBook)) {
    echo json_encode($errorMesg);
    return;
}

$idBook = $data->idBook;
$book = new Book();
$singleBook = $book->getOneBook($idBook);

if (!$singleBook) {
    echo json_encode($errorMesg);
    return;
}

$singleBookJSON = json_encode($singleBook);
echo $singleBookJSON;
