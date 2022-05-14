const addBook_form = document.getElementById("formAddBook");

addBook_form.addEventListener("submit", function (event) {
  event.preventDefault();
  const dataForm = getValue();
  postData(dataForm, "create.php");
});

