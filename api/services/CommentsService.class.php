<?php 
    require_once dirname(__FILE__)."/BaseService.class.php";
    require_once dirname(__FILE__)."/../dao/CommentsDao.class.php";

    class CommentsService extends BaseService{
       
        public function __construct(){
            $this->dao = new CommentsDao(); 
        }

        public function get_article_comments($id){
            return($this->dao->get_art_comments($id));
        }

    }
?>