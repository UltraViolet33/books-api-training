const addBook_form = document.getElementById("formAddBook");

addBook_form.addEventListener("submit", function (event) {
  event.preventDefault();
  const dataForm = getValue();
  postData(dataForm, "create.php");
  window.location.replace("http://127.0.0.1:5500/Frontend/index.html");
});