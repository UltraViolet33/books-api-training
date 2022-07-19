const addBook_form = document.getElementById("formAddBook");

addBook_form.addEventListener("submit", function (event) {
  event.preventDefault();
  const dataForm = getValue();
  if (dataForm) {
    postData(dataForm, "create.php");
  }
});

const getValue = () => {
  clearMessage();
  title = document.getElementById("title").value;
  author = document.getElementById("author").value;

  if (title == "" || author == "") {
    displayError("Please fill all the inputs");
    return false;
  }

  data = {
    title: title,
    author: author,
  };

  return data;
};
