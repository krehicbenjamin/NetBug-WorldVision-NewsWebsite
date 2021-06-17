<?php 

require_once dirname(__FILE__)."/BaseDao.class.php";

class ArticlesDao extends BaseDao{

    public function __construct(){
        parent::__construct("articles");
    }

    public function get_articles($search, $offset, $limit, $order = "-id"){
        list($order_column, $order_direction) = self::parse_order($order);
        return $this->query("SELECT *
                             FROM articles
                             WHERE LOWER(title) LIKE CONCAT('%', :title, '%')
                             ORDER BY ${order_column} ${order_direction}
                             LIMIT ${limit} OFFSET ${offset}",
                             ["title" => strtolower($search)]);
      }

    public function delete_article($id){
        return $this->query_unique("DELETE FROM articles WHERE id = :id", ["id" => $id]);
    }
    public function get_by_category($category){
        return $this->query("SELECT * FROM articles WHERE category = :category LIMIT 9 OFFSET 0", ["category" => $category]);
    }


    
}

?>