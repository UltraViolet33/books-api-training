<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-requested-With');
require("../vendor/autoload.php");

use App\Models\Book;

$book = new Book();
$data = json_decode(file_get_contents("php://input"));
$errorMesg = array('message' => "Error, book not created");
$successMsg = array('message' => "Book creaded");

if (empty($data->author) || empty($data->title)) {
    echo json_encode($errorMesg);
    return;
}

if ($book->createBook($data->title, $data->author)) {
    echo json_encode($successMsg);
} else {
    echo json_encode($errorMesg);
}
