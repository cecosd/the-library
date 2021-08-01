<?php 

namespace App\Services;

class AuthorBookSearchService {

    protected $connection;


    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function getAll()
    {
        $allResultsQuery = $this->connection->prepare(
            "SELECT 
            * 
            FROM authors 
            INNER JOIN author_books 
            ON author_books.author_id = authors.author_id
            INNER JOIN books
            ON books.book_id = author_books.book_id");
        $allResultsQuery->execute();
        return $allResultsQuery->fetchAll();
    }

    public function getAuthor(string $authorName)
    {
        $searchTerm = strtolower($authorName);
        
        $searchAuthorQuery = $this->connection->prepare(
            "SELECT 
            * 
            FROM authors 
            INNER JOIN author_books 
            ON author_books.author_id = authors.author_id
            INNER JOIN books
            ON books.book_id = author_books.book_id
            WHERE LOWER(authors.author_name) LIKE '%{$searchTerm}%'");
        $searchAuthorQuery->execute();
        return $searchAuthorQuery->fetchAll();
    }

}