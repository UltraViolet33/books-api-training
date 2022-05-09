CREATE TABLE books(
    id_books INT AUTO_INCREMENT NOT NULL,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    isRead TINYINT NOT NULL,
    PRIMARY KEY(id_books)
);

CREATE TABLE categories(
    id_categories INT AUTO_INCREMENT NOT NULL,
    name VARCHAR(255) NOT NULL,
    PRIMARY KEY(id_categories)
);

CREATE TABLE books_categories(
    id_books INT NOT NULL,
    id_categories INT NOT NULL,
    PRIMARY KEY(id_books, id_categories),
    FOREIGN KEY(id_books) REFERENCES books(id_books),
    FOREIGN KEY(id_categories) REFERENCES categories(id_categories)
);