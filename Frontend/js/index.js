fetch("http://api-php.test/")
  .then(function (res) {
    if (res.ok) {
      return res.json();
    }
  })
  .then(function (value) {
    booksHTML = displayBooks(value);
  })
  .catch(function (err) {
    // Une erreur est survenue
  });

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
