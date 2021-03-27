<?php 

require_once dirname(__FILE__)."/BaseDao.class.php";

class ArticlesDao extends BaseDao{

    public function __construct(){
        parent::__construct("articles");
    }

    public function get_articles($search, $offset, $limit){
        return $this->query("SELECT * FROM articles WHERE title LIKE CONCAT('%', :title, '%') LIMIT ${limit} OFFSET ${offset}", ["title" => $search]);
    }

    public function delete_article($id){
        return $this->query_unique("DELETE FROM articles WHERE id = :id", ["id" => $id]);
    }


    
}

?>