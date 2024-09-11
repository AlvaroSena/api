<?php
namespace Professor\AulaN\Database;

use PDO;

class Database {
    // private $host = '127.0.0.1';
    // private $db = 'my_database';
    // private $user = 'root';
    // private $pass = 'root';
    // private $charset = 'utf8mb4';
    private $path = 'banco_de_dados.sqlite';

    public function connect() {
        // $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";

        try {
            // $pdo = new PDO($dsn, $this->user, $this->pass, [
            //     // PDO::ATTR_ERRMODE => PDO::ERMODE_EXCEPTION,
            //     // PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            //     PDO::ATTR_EMULATE_PREPARES => false,
            // ]);

            $pdo = new PDO("sqlite:$this->path"); 

            // echo "Successfully connected!";
            return $pdo;
        } catch (PDOException $e) {
            echo "Cannot connect with DB: ".$e->getMessage();
        }
    } 

}