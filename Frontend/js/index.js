fetch(urlAPI)
  .then((res) => res.json())
  .then((books) => displayBooks(books))
  .catch(() => displayError());

const displayBooks = (books) => {
  const booksHTML = books.map((book) => {
    let isRead = book.isRead ? "Terminé" : "Pas terminé";
    let html = '<div class="col-10 col-md-6 col-lg-4 my-3">';
    html += '<div class="card my-3" style="width: 20rem;">';
    html += '<div class="card-body">';
    html += `<h4 class='card-title'>Titre : ${book.title}</h5>`;
    html += `<h5 class='card-title'>Author : ${book.author}</h5>`;
    html += `<h5 class='card-title'>Status : ${isRead}</h5>`;
    html += " </div></div></div>";
    return html;
  });

  const books_div = document.getElementById("books");

  for (const book of booksHTML) {
    books_div.innerHTML += book;
  }
};

const displayError = () => {
  const danger_div = document.getElementById("error");
  danger_div.classList.add("p-3");
  const error_para = document.getElementById("error_text");
  error_para.textContent =
    "An error occured, please check your internet connexion";
};
