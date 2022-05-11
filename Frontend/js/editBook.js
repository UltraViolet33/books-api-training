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
