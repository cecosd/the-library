<?php 

$create_author_books_table = "CREATE TABLE author_books (
  author_id INT NOT NULL,
  book_id INT NOT NULL,
  PRIMARY KEY (author_id, book_id),
  FOREIGN KEY (book_id)
      REFERENCES books (book_id),
  FOREIGN KEY (author_id)
      REFERENCES authors (author_id)
);";

return $create_author_books_table;