<?php 

require_once dirname(__FILE__)."/BaseDao.class.php";

class UsersDao extends BaseDao{

    public function get_user_by_email($email){
       return $this->query_unique("SELECT * FROM users WHERE email = :email", ["email" => $email]);
    }

    public function get_user_by_id($user_id){
        return $this->query_unique("SELECT * FROM users WHERE user_id = :user_id", ["user_id" => $id]);
    }

    
}

?>