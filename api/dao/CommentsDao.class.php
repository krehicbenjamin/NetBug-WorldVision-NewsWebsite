<?php 

require_once dirname(__FILE__)."/BaseDao.class.php";

class CommentsDao extends BaseDao{

    public function __construct(){
        parent::__construct("comments");
    }

    public function get_art_comments($article_id){
        query("SELECT * FROM comments WHERE article_id = :article_id LIMIT 10 OFFSET 0", ["article_id" => $article_id]);
    }
}

?>