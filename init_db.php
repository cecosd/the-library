<?php 

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/database.php';

$db = new \App\Utils\Database\DbConnect(
    $dbConnectCredentials["host"],
    $dbConnectCredentials["port"],
    $dbConnectCredentials["database"],
    $dbConnectCredentials["username"],
    $dbConnectCredentials["password"]
);

$mandatoryTables = [
    'authors',
    'books',
    'author_books'
];

foreach($mandatoryTables as $mandatoryTable) {

    require_once __DIR__ . "/migrations/create_{$mandatoryTable}_table.php";

    $tableFullName = "create_{$mandatoryTable}_table";

    $stmt = $db->getConnection()->prepare($$tableFullName);

    $stmt->execute();

}
