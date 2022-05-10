fetch(urlAPI)
  .then((res) => res.json())
  .then((books) => displayBooks(books))
  .catch((err) => displayError());

const displayBooks = (books) => {
  const booksHTML = books.map((book) => {
    let isRead = "";
    isRead = book.isRead ? "Terminé" : "Pas terminé";
    let html = "";
    html += '<div class="card" style="width: 18rem;">';
    html += '<div class="card-body">';
    html += `<h4 class='card-title'>Titre : ${book.title}</h5>`;
    html += `<h5 class='card-title'>Author : ${book.author}</h5>`;
    html += ' <a href="#" class="btn btn-primary">See details</a>';
    html += `<h5 class='card-title'>${isRead}</h5>`;
    html += " </div></div>";

    return html;
  });

  let books_div = document.getElementById("books");

  for (let book of booksHTML) {
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
