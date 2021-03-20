<?php 

require_once dirname(__FILE__)."/BaseDao.class.php";

class UsersDao extends BaseDao{

    public function get_user_by_email($email){
       return $this->query_unique("SELECT * FROM users WHERE email = :email", ["email" => $email]);
    }

    public function get_user_by_id($user_id){
        return $this->query_unique("SELECT * FROM users WHERE user_id = :user_id", ["user_id" => $user_id]);
    }

    public function add_user($user){
    
        $this->insert("users", $user);

        /*
        $sql = "INSERT INTO users (username, password, email, added_at) VALUES (:username, :password, :email, :added_at)";
        $stmt= $this->connection->prepare($sql);  //$pdo is $this->connection
        $stmt->execute($user);

        // Getting the last added users id and returning it 

        $user['user_id'] = $this->connection->lastInsertId();
        return $user;
    */
    }

    public function update_user($id, $user){

        $this->update("users", $id, $user, "user_id");

        /*
        $sql = "UPDATE users SET ";
        foreach($user as $name => $value){
            $sql .= $name ."= :".$name. ", ";
        } 
        $sql = substr($sql, 0, -2);
        $sql .= "WHERE user_id = :user_id";

        
        $stmt= $this->connection->prepare($sql);  //$pdo is $this->connection
        $user['user_id'] = $user_id;
        $stmt->execute($user);
        */
    }

    
}

?>