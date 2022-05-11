<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-requested-With');
require("../vendor/autoload.php");

use App\Models\Book;

$book = new Book();

$data = json_decode(file_get_contents("php://input"));
$errorMesg = array('message' => "Error, book not deleted");


if (empty($data->idBook) || !is_numeric($data->idBook)) {
    echo json_encode($errorMesg);
    return;
}

if ($book->deleteBook($data->idBook)) {
    echo json_encode(array(
        'message' => 'Book deleted',
    ));
} else {
    echo json_encode($errorMesg);
}
