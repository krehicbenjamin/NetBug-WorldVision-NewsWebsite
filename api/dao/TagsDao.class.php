<?php 

require_once dirname(__FILE__)."/BaseDao.class.php";

class TagsDao extends BaseDao{

    public function __construct(){
        parent::__construct("tags");
    }
    public function getTags($article_id){
        return $this->query("SELECT * FROM tags WHERE article_id = :article_id LIMIT 10 OFFSET 0", ["article_id" => $article_id]);
    }
}

?>