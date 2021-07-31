<?php

require './app/bootstrap.php';

$xmlScanner = new \App\Utils\XmlScanner(dirname(__FILE__) . '/books-library');

$xmlScanner->scanAll($xmlScanner->getBasePath());

$xmlParser = new \App\Utils\XmlBooksParser($xmlScanner->getXmlFiles());

// echo json_encode($xmlParser->parseFiles());

foreach ($xmlParser->parseFiles() as $authorName => $authorBooks) {

    $authorId = rand(1, 1000000);

    $addAuthorQuery->execute();

    $addAuthorQuery = $db->getConnection()->prepare("INSERT INTO authors (author_id, author_name) VALUES ($authorId, '$authorName')");
    $addAuthorQuery->execute();

    foreach ($authorBooks as $authorBook) {

        $bookId = rand(1, 1000000);

        $stmt = $db->getConnection()->prepare("INSERT INTO books (book_id, book_name) VALUES ($bookId, '$authorBook')");
        $stmt->execute();

        $stmt = $db->getConnection()->prepare("INSERT INTO author_books (author_id, book_id) VALUES ($authorId, $bookId)");
        $stmt->execute();

    }

}



