<?php 
    require_once dirname(__FILE__)."/BaseService.class.php";
    require_once dirname(__FILE__)."/../dao/ImagesDao.class.php";

    class ImagesService extends BaseService{
       
        public function __construct(){
            $this->dao = new ImagesDao(); 
        }
        public function get_images($offset, $limit, $order){
            return ($this->dao->get_all($offset, $limit, $order));
        }
        public function get_article_images($id){
            return($this->dao->get_art_images($id));
        }
    }
?>