fetch(urlAPI)
  .then((res) => res.json())
  .then((books) => displayBooks(books))
  .catch(() =>
    displayError("An error occured, please check your internet connexion")
  );

const displayBooks = (books) => {
  const booksHTML = books.map((book) => {
    let status = book.status ? "Read" : "Not Read yet";
    let html = '<div class="col-10 col-md-6 col-lg-4 my-3">';
    html += '<div class="card my-3" style="width: 20rem;">';
    html += '<div class="">';
    html += `<h4 class='card-title'>Title : ${book.title}</h5>`;
    html += `<h5 class='card-title'>Author : ${book.author}</h5>`;
    html += `<h5 class='card-title'>Status : ${status}</h5>`;
    html += `<a href="editBook.php?id=${book.id_books}" class="btn btn-primary">Edit</a>`;
    html += " </div></div></div>";
    return html;
  });

  const books_div = document.getElementById("books");

  for (const book of booksHTML) {
    books_div.innerHTML += book;
  }
};
