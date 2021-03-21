<?php 

require_once dirname(__FILE__)."/BaseDao.class.php";

class ArticlesDao extends BaseDao{

    public function __construct(){
        parent::__construct("articles");
    }

    public function get_article_by_title($title){
        return $this->query_unique("SELECT * FROM articles WHERE title = :title", ["title" => $title]);
     }

    public function delete_article($article_id){
        $stmt = $this->conncetion->prepare("DELETE FROM articles WHERE article_id = :article_id");
        $stmt->execute([$article_id]);

    }

    
}

?>