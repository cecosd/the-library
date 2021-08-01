<?php 

namespace App\Services;

use PDO;

class AuthorBookSearchService {

    protected $connection;


    public function __construct($connection) {
        $this->connection = $connection;
    }

    private function baseQuery()
    {
        return "SELECT 
            * 
            FROM authors 
            INNER JOIN author_books 
            ON author_books.author_id = authors.author_id
            INNER JOIN books
            ON books.book_id = author_books.book_id";
    }

    public function getAll()
    {
        $getAll = $this->connection->prepare($this->baseQuery());
        $getAll->execute();
        return $getAll->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAuthor(string $authorName)
    {
        $whereStatement = "WHERE LOWER(authors.author_name) LIKE '%" . strtolower($authorName) . "%'";
        
        $searchAuthor = $this->connection->prepare($this->baseQuery() . ' ' . $whereStatement);
        $searchAuthor->execute();
        return $searchAuthor->fetchAll(PDO::FETCH_ASSOC);
    }

}