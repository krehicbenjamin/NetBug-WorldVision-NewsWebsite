<?php 
    require_once dirname(__FILE__)."./BaseService.class.php";
    require_once dirname(__FILE__)."/../dao/ArticlesDao.class.php";

    class ArticleService extends BaseService{
       
        public function __construct(){
            $this->dao = new ArticlesDao(); 
        }

        public function get_articles($search, $offset, $limit, $order){
            if($search){
                return ($this->dao->get_articles($search, $offset, $limit, $order));
            } else {
                return ($this->dao->get_all($offset, $limit, $order));
            } 
        }

        public function delete_article($id){
            $this->dao->delete_article($id);
       }
   

    }
?>