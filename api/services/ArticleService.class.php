<?php 
    require_once dirname(__FILE__)."/BaseService.class.php";
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
        public function get_article_by_id($id){
                return ($this->dao->get_by_id($id));
        }

        public function get_article_by_category($category){
            return ($this->dao->get_by_category($category));
        }
        public function get_articles_by_search($search){
            return ($this->dao->get_by_search($search));
        }

        public function delete_article($id){
            $this->dao->delete_article($id);
       }
       public function add_article($article){
        $article_add['title'] = $article['title'];
        $article_add['body'] = $article['body'];
        $article_add['picture64'] = $article['picture64'];
        $article_add['added_at'] = date(Config::DATE_FORMAT);
        return parent::add($article_add);
      
    }
  
    public function update_articles($id, $article){
      $article = $this->dao->get_by_id($id);
      return $this->update($id, $article);
    }
   

    }
?>