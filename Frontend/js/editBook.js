IDbook = extractParamsFromUrl("id");

if (!IDbook) {
  document.location.href = "index.php";
}

fetch(urlAPI + "single.php?id=" + IDbook)
  .then((reponse) => reponse.json())
  .then((response) => putValueInput(response));

const putValueInput = (book) => {
  const author_input = document.getElementById("author");
  author_input.value = book.author;

  const title_input = document.getElementById("title");
  title_input.value = book.title;

  const status_input = document.getElementById("status");
  book.isRead ? (status_input.checked = true) : null;
};

const editBook_form = document.getElementById("editBook");

editBook_form.addEventListener("submit", function (event) {
  event.preventDefault();
  const dataForm = getValueEditForm();
  dataForm.idBook = IDbook;
  postData(dataForm, "update.php");
});

const getValueEditForm = () => {
  clearMessage();
  title = document.getElementById("title").value;
  author = document.getElementById("author").value;
  isRead = document.getElementById("status").checked;

  if (title == "" || author == "") {
    displayError("Please fill all the inputs");
    return false;
  }

  data = {
    title: title,
    author: author,
    isRead: isRead,
  };

  console.log(data);

  return data;
};

const formDelete = document.getElementById("deleteBook");

formDelete.addEventListener("submit", function (event) {
  event.preventDefault();

  if (confirm("Are you sure ?")) {
    const data = {
      idBook: IDbook,
    };
    postData(data, "delete.php");
  }
});
