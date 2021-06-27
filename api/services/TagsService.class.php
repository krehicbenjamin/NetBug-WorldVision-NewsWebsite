<?php 
    require_once dirname(__FILE__)."/BaseService.class.php";
    require_once dirname(__FILE__)."/../dao/TagsDao.class.php";

    class TagsService extends BaseService{
       
        public function __construct(){
            $this->dao = new TagsDao(); 
        }
        public function get_tags($search, $offset, $limit, $order){
            return ($this->dao->get_all($offset, $limit, $order));
        }
        public function get_article_tags($id){
            return ($this->dao->get_tags($id));
        }

    }
?>