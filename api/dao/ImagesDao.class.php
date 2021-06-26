<?php 

require_once dirname(__FILE__)."/BaseDao.class.php";

class ImagesDao extends BaseDao{

    public function __construct(){
        parent::__construct("images");
    }

    public function get_art_images($article_id){
        return $this->query("SELECT * FROM images WHERE article_id = :article_id LIMIT 10 OFFSET 0", ["article_id" => $article_id]);
    }
}

?>