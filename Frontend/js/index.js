fetch(urlAPI)
  .then((res) => res.json())
  .then((books) => displayBooks(books))
  .catch(() =>
    displayError("An error occured, please check your internet connexion")
  );

const displayBooks = (books) => {
  const booksHTML = books.map((book) => {
    let isRead = book.isRead ? "Terminé" : "Pas terminé";
    let html = '<div class="col-10 col-md-6 col-lg-4 my-3">';
    html += '<div class="card my-3" style="width: 20rem;">';
    html += '<div class="card-body">';
    html += `<h4 class='card-title'>Titre : ${book.title}</h5>`;
    html += `<h5 class='card-title'>Author : ${book.author}</h5>`;
    html += `<a href="editBook.html?id=${book.id_book}" class="btn btn-primary">Edit</a>`;
    html += " </div></div></div>";
    return html;
  });

  const books_div = document.getElementById("books");

  for (const book of booksHTML) {
    books_div.innerHTML += book;
  }
};
