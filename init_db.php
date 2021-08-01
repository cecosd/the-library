<?php 

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/database.php';

// Create a database connection
$db = new \App\Utils\Database\DbConnect(
    $dbConnectCredentials["host"],
    $dbConnectCredentials["port"],
    $dbConnectCredentials["database"],
    $dbConnectCredentials["username"],
    $dbConnectCredentials["password"]
);

// List of all possible tables
$mandatoryTables = [
    'authors',
    'books',
    'author_books'
];

foreach($mandatoryTables as $mandatoryTable) {

    try {
        
        require_once __DIR__ . "/migrations/create_{$mandatoryTable}_table.php";

        $tableFullName = "create_{$mandatoryTable}_table";
    
        $stmt = $db->getConnection()->prepare($$tableFullName);
    
        $stmt->execute();
    } catch (\Exception $e) {
        // silence is golden
        // just kidding
        // otherwise the new tables will not be created if such exist
    }


}
