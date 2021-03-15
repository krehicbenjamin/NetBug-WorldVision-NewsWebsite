<?php

require_once dirname (__FILE__)."/../config.php";

class BaseDao{

    protected $connection;

    public function __construct(){

        try {
            $this->connection = new PDO("mysql:host=".Config::DB_HOST.";dbname=".Config::DB_SCHEME, Config::DC_USERNAME, Config::DB_PASSWORD);
            // set the PDO error mode to exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw $e;
        }

    }

    public function insert(){

    }

    public function update($table, $id, $entity){
        $sql = "UPDATE ${table} SET ";
        foreach($entity as $title => $value){
            $sql .= $title ."= :".$title. ", ";
        } 
        $sql = substr($sql, 0, -2);
        $sql .= "WHERE article_id = :article_id";

        
        $stmt= $this->connection->prepare($sql);  //$pdo is $this->connection
        $entity['id'] = $id;
        $stmt->execute($entity);

    }

    public function query($query, $params){
        $stmt = $this->connection->prepare($query);             //so basically we send a query we want to execute to this dao function
        $stmt->execute($params);                                //along with the parameters we want to execute it with
        return  $stmt->fetchAll(PDO::FECTH_ASSOC);
    }

    public function query_unique($query, $params){
        $result = $this->query($query, $params);
        return reset($result);
    }


}
