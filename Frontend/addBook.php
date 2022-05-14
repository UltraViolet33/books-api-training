<?php require_once("./inc/header.php"); 
$script="addBook.js";
?>
        <div class="container my-5">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center">Add a Book</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-10 col-md-6">
                    <form id="formAddBook">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title : *</label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>
                        <div class="mb-3">
                            <label for="author" class="form-label">Author : *</label>
                            <input type="text" class="form-control" name="author" id="author">
                        </div>
                        <button id="btnAddBook" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-10 col-md-4">
                    <div class="bg-danger" id="error">
                        <p class="text-center fs-4" id="error_text"></p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-10 col-md-4">
                    <div class="" id="success">
                        <p class="text-center fs-4" id="success_text"></p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require_once("./inc/footer.php") ?>