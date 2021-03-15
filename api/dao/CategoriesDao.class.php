<?php 

require_once dirname(__FILE__)."/BaseDao.class.php";

class CategoriesDao extends BaseDao{

    public function get_category_by_id($category_id){
        return $this->connection->query_unique("SELECT * FROM categories WHERE category_id = $category_id ", ["category_id" => $category_id]);
    }

    public function add_category($category){
        $sql = "INSERT INTO categories (category_name) VALUES (:category_name)";
        $stmt= $this->connection->prepare($sql);
        $stmt->execute($category);


        $category = $this->connection->lastInsertid();
        return $category;
    }
    
    public function update_category($category_id, $category){

        $this->update("categories", $category_id, $category);

        /*
        $sql = "UPDATE categories SET category_name = :category_name WHERE category_id = :category_id";
        $stmt= $this->connection->prepare($sql);
        $stmt->execute($category);
        */
    }


}

?>