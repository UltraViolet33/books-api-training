<?php 
$titlePage = "Edit a Book";
require_once "./inc/header.php";
$script = 'editBook.js';
?>
<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Edit a Book</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-10 col-md-6">
            <form id="editBook">
                <div class="mb-3">
                    <label for="title" class="form-label">Title : *</label>
                    <input type="text" class="form-control" name="title" id="title">
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Author : *</label>
                    <input type="text" class="form-control" name="author" id="author">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="status">
                    <label class="form-check-label" for="flexCheckDefault">
                        Read
                    </label>
                </div>
                <button id="btnAddBook" class="btn btn-primary">Submit</button>
            </form>
            <form id="deleteBook" class="my-3">
                <button class="btn btn-warning">Delete</button>
            </form>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-10 col-md-4">
            <div class="bg-danger" id="error"></div>
        </div>
    </div>
</div>
</main>
<?php require_once("./inc/footer.php") ?>