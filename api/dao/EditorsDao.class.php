<?php 

require_once dirname(__FILE__)."/BaseDao.class.php";

class EditorsDao extends BaseDao{

    public function get_editor_by_email($editor_email){
        return $this->query_unique("SELECT * FROM editors WHERE editor_email = :editor_email", ["editor_email" => $editor_email]);
     }
 
     public function get_editor_by_id($editor_id){
         return $this->query_unique("SELECT * FROM editors WHERE editor_id = :editor_id", ["editor_id" => $editor_id]);
     }
 
     public function add_editor($editor){
     
         $sql = "INSERT INTO editors (editor_name, editor_pw, editor_email,) VALUES (:editor_name, :editor_pw, :editor_email)";
         $stmt= $this->connection->prepare($sql);  //$pdo is $this->connection
         $stmt->execute($editor);
 
         // Getting the last added users id and returning it 
 
         $editor['id'] = $this->connection->lastInsertId();
         return $editor;
 
     }
    
}

?>