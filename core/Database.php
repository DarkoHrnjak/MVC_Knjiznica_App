<?php

namespace Core;
use PDO;
use PDOException;
use Dotenv\Dotenv;

class Database{

    private PDO $pdo;

    private static ?Database $instance = null;

    private function __construct(){
        $dsn="mysql:host=".Config::get('DB_HOST').";dbname=".Config::get('DB_HOST').";charset=utf8mb4";

        try{
            $this->pdo = new PDO(
                $dsn,
                Config::get("DB_USER"),
                Config::get("DB_PASS"),
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_CURSOR_NAME => PDO::FETCH_ASSOC
                ]
            );
        }
        catch(PDOException $e){
            die("DB error: ".$e->getMessage());
        }
    }

    public static function getInstance(): PDO{
       if(self::$instance===null){
        self::$instance = new self();
       }
        
        return self::$instance->pdo;
    }
}