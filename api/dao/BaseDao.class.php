<?php

require_once dirname (__FILE__)."/../config.php";

class BaseDao{

    public function __construct(){

        try {
            $conn = new PDO("mysql:host=".Config::DB_HOST.";dbname=".Config::DB_SCHEME, Config::DC_USERNAME, Config::DB_PASSWORD);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function insert(){
    }

    public function update(){
    }

    public function query(){
    }

    public function query_unique(){
    }
}
