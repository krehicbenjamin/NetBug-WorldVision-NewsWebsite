<?php

require_once dirname (__FILE__)."/../config.php";

class BaseDao{

        protected $connection;
        private $table;

        public function __construct($table){
        $this->table = $table;

        try{
            $this->connection = new PDO("mysql:host=".Config::DB_HOST.";dbname=".Config::DB_SCHEME, Config::DC_USERNAME, Config::DB_PASSWORD);
            // set the PDO error mode to exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw $e;
        }

    }

    protected function insert($table, $entity){
        $query = "INSERT INTO ${table} (";
        foreach ($entity as $column => $value) {
          $query .= $column.", ";
        }
        $query = substr($query, 0, -2);
        $query .= ") VALUES (";
        foreach ($entity as $column => $value) {
          $query .= ":".$column.", ";
        }
        $query = substr($query, 0, -2);
        $query .= ")";
    
        $stmt= $this->connection->prepare($query);
        $stmt->execute($entity);                                     // sql injection prevention
        $entity['id'] = $this->connection->lastInsertId();
        return $entity;
      }

    protected function execute_update($table, $id, $entity, $id_column = "id"){
        $query = "UPDATE ${table} SET ";
        foreach($entity as $name => $value){
          $query .= $name ."= :". $name. ", ";
        }
        $query = substr($query, 0, -2);
        $query .= " WHERE ${id_column} = :id";
    
        $stmt= $this->connection->prepare($query);
        $entity['id'] = $id;
        $stmt->execute($entity);
    }

    /*    
        public function update($table, $id, $entity, $id_column = "id"){
        $sql = "UPDATE ${table} SET ";
        foreach($entity as $title => $value){
            $sql .= $title ."= :".$title. ", ";
        } 
        $sql = substr($sql, 0, -2);
        $sql .= "WHERE {$id_column} = :id";

        
        $stmt= $this->connection->prepare($sql);  //$pdo is $this->connection
        $entity['id'] = $id;
        $stmt->execute($entity);

        }
    */

    protected function query($query, $params){
        $stmt = $this->connection->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    protected function query_unique($query, $params){
        $results = $this->query($query, $params);
        return reset($results);
    }
/*
    public function query($query, $params){
        $stmt = $this->connection->prepare($query);             //so basically we send a query we want to execute to this dao function
        $stmt->execute($params);                                //along with the parameters we want to execute it with
        return  $stmt->fetchAll(PDO::FECTH_ASSOC);
    }

    public function query_unique($query, $params){
        $result = $this->query($query, $params);
        return reset($result);
    }
*/  

    public function add($entity){
        return $this->insert($this->table, $entity);
    }

    public function update($id, $entity){
        $this->execute_update($this->table, $id, $entity);
    }

    public function get_by_id($id){
        return $this->query_unique("SELECT * FROM ".$this->table." WHERE id = :id", ["id" => $id]);
    }

    public function get_all($offset = 0, $limit = 25){
        return $this->query("SELECT * FROM ".$this->table." LIMIT ${limit} OFFSET {$offset}", []);
    }
}
