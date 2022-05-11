IDbook = extractParamsFromUrl("id");

if (!IDbook) {
  displayError("Book not found");
}

fetch(urlAPI + "single.php?id=" + IDbook)
  .then((reponse) => reponse.json())
  .then((response) => putValueInput(response[0]));

const putValueInput = (book) => {
  const author_input = document.getElementById("author");
  author_input.value = book.author;

  const title_input = document.getElementById("title");
  title_input.value = book.title;
};

const editBook_form = document.getElementById("editBook");

editBook_form.addEventListener("submit", function (event) {
  event.preventDefault();
  const dataForm = getValue();
  dataForm.idBook = IDbook;
  console.log(dataForm);
  postData(dataForm, "update.php");
  //postData(dataForm);
});

const formDelete = document.getElementById("deleteBook");

formDelete.addEventListener("submit", function (event) {
  event.preventDefault();

  if (confirm("Are you sure ?")) {
    console.log("ojk");
    const data = {
      idBook: IDbook,
    };
    postData(data, "delete.php");
  }
});
