<?php 
    require_once dirname(__FILE__)."/BaseService.class.php";
    require_once dirname(__FILE__)."/../dao/TagsDao.class.php";

    class TagsService extends BaseService{
       
        public function __construct(){
            $this->dao = new TagsDao(); 
        }

    }
?>