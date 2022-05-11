<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-requested-With');
require("../vendor/autoload.php");

use App\Models\Book;

$book = new Book();
$data = json_decode(file_get_contents("php://input"));
$errorMesg = array('message' => "Error, book not updated");

if (empty($data->author) || empty($data->title) || !is_numeric($data->idBook)) {
    echo json_encode($errorMesg);
    return;
}

if ($book->updateBook($data->title, $data->author, $data->idBook)) {
    echo json_encode(array(
        'message' => 'Book updated',
    ));
} else {
    echo json_encode(array(
        'message' => "Error, book not updated",
    ));
}
