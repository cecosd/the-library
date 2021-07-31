<?php 

$create_authors_table = "CREATE TABLE authors (
	author_id serial PRIMARY KEY,
	author_name VARCHAR ( 255 ) UNIQUE NOT NULL
);";

return $create_authors_table;