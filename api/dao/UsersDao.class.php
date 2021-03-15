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
    
        $sql = "INSERT INTO users (username, password, email, added_at) VALUES (:username, :password, :email, :added_at)";
        $stmt= $this->connection->prepare($sql);  //$pdo is $this->connection
        $stmt->execute($user);

        // Getting the last added users id and returning it 

        $user['id'] = $this->connection->lastInsertId();
        return $user;

    }

    public function update_user($id, $user){


    }

    
}

?>