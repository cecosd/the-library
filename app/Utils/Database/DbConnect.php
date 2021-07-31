<?php 

namespace App\Utils\Database;

use PDO;
use PDOException;

class DbConnect {

    private $host;
    private $port;
    private $database;
    private $username;
    private $password;

    private $pdo;

    public function __construct(
        string $host,
        string $port = '5432',
        string $database,
        string $username,
        string $password
    ) {
        $this->host = $host;
        $this->port = $port;
        $this->database = $database;
        $this->username = $username;
        $this->password = $password;

        $this->init();
    }

    public function init() {

        try {
            $dsn = "pgsql:host={$this->host};port={$this->port};dbname={$this->database};";
            // make a database connection
            $this->pdo = new PDO(
                $dsn, 
                $this->username, 
                $this->password, 
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );

        } catch (PDOException $e) {
            die($e->getMessage());
        }

        return $this->pdo;

    }

    public function getConnection() {
        return $this->pdo;
    }
}