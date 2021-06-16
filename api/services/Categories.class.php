<?php 
    require_once dirname(__FILE__)."/BaseService.class.php";
    require_once dirname(__FILE__)."/../dao/CategoriesDao.class.php";

    class CategoriesService extends BaseService{
       
        public function __construct(){
            $this->dao = new CategoriesDao(); 
        }

        public function get_categories($search, $offset, $limit, $order){
                return ($this->dao->get_all($offset, $limit, $order));
        }

        

    }

?>