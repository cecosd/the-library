<?php

require '../app/bootstrap.php';

$searchService = new \App\Services\AuthorBookSearchService($db->getConnection());
$validSearch = isset($_GET['s']) && $_GET['s'] != '';

$result = $validSearch ? $searchService->getAuthor($_GET['s']) : [];

echo json_encode($result);