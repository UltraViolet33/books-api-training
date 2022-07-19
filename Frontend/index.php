<?php require_once "./inc/header.php";
$script = 'index.js';
?>
<div class="container my-3">
    <div class="row">
        <div class="col-12 my-3">
            <h1 class="text-center">My Books</h1>
        </div>
    </div>
    <div class="row justify-content-around" id="books">
    </div>
    <div class="row justify-content-center">
        <div class="col-10 col-md-4">
            <div class="bg-danger" id="error">
                <p class="text-center fs-4" id="error_text"></p>
            </div>
        </div>
    </div>
</div>
<?php require_once("./inc/footer.php") ?>