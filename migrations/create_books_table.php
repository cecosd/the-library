<?php 

$create_books_table = "CREATE TABLE books (
	book_id serial PRIMARY KEY,
	book_name VARCHAR ( 255 ) UNIQUE NOT NULL
);";

return $create_books_table;