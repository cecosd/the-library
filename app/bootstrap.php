<?php 

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';

$db = new \App\Utils\Database\DbConnect(
    $dbConnectCredentials["host"],
    $dbConnectCredentials["port"],
    $dbConnectCredentials["database"],
    $dbConnectCredentials["username"],
    $dbConnectCredentials["password"]
);