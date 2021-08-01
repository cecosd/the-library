<?php

require './app/bootstrap.php';

$xmlScanner = new \App\Utils\XmlScanner(dirname(__FILE__) . '/books-library');

$xmlScanner->scanAll($xmlScanner->getBasePath());

$xmlParser = new \App\Utils\XmlBooksParser($xmlScanner->getXmlFiles());

foreach ($xmlParser->parseFiles() as $authorName => $authorBooks) {

    $searchAuthor = $db->getConnection()->prepare("SELECT * FROM authors WHERE author_name = '$authorName'");
    $searchAuthor->execute();
    $authorResult = $searchAuthor->fetchAll(PDO::FETCH_ASSOC);

    if(count($authorResult) == 0) {
        $authorId = rand(1, 1000000);

        $addAuthorQuery = $db->getConnection()->prepare("INSERT INTO authors (author_id, author_name) VALUES ($authorId, '$authorName')");
        $addAuthorQuery->execute();
    } else {
        $authorId = $authorResult[0]['author_id'];
    }

    foreach ($authorBooks as $authorBook) {

        $searchBook = $db->getConnection()->prepare("SELECT * FROM books WHERE book_name = '$authorBook'");
        $searchBook->execute();
        $bookResult = $searchBook->fetchAll(PDO::FETCH_ASSOC);

        if(count($bookResult) == 0) {
            $bookId = rand(1, 1000000);
    
            $addBookQuery = $db->getConnection()->prepare("INSERT INTO books (book_id, book_name) VALUES ($bookId, '$authorBook')");
            $addBookQuery->execute();

            $stmt = $db->getConnection()->prepare("INSERT INTO author_books (author_id, book_id) VALUES ($authorId, $bookId)");
            $stmt->execute();
        } else {
            $bookId = $bookResult[0]['book_id'];
        }

    }

}



