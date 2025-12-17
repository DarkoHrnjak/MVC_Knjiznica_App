<?php

namespace Core;
use PDO;
use PDOException;
use Dotenv\Dotenv;

class Database{

    private static ?PDO $instance = null;

    public static function getInstance(): PDO{
        if(self::$instance===null){
            $dotenv = Dotenv::createImmutable(__DIR__.'/../');
            $dotenv->load();

            $dsn="mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']};charset=utf8mb4";

            try{
                self::$instance = new PDO(
                    $dsn,
                    $_ENV["DB_USER"],
                    $_ENV["DB_PASS"],
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
        return self::$instance;
    }
}