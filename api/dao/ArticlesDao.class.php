<?php 

require_once dirname(__FILE__)."/BaseDao.class.php";

class ArticlesDao extends BaseDao{

    public function get_article_by_id($article_id){
        return $this->query_unique("SELECT * FROM articles WHERE article_id = :article_id", ["article_id" => $article_id]);
    }

    public function get_user_by_title($title){
        return $this->query_unique("SELECT * FROM articles WHERE title = :title", ["title" => $title]);
     }

    public function add_article($article){

        $this->insert("articles", $article);
        /*
        $sql = "INSERT INTO articles (title, body, picture64, added_at,) VALUES (:title, :body, :picture64, :added_at)";
        $stmt= $this->connection->prepare($sql);  //$pdo is $this->connection
        $stmt->execute($article);

        // Getting the last added artiles id and returning it 

        $article['article_id'] = $this->connection->lastInsertId();
        return $article;
        */

    }


    public function edit_article($id, $article){

        $this->update("articles", $id, $article, "article_id");

        /*
        $sql = "UPDATE articles SET ";
        foreach($article as $title => $value){
            $sql .= $title ."= :".$title. ", ";
        } 
        $sql = substr($sql, 0, -2);
        $sql .= "WHERE article_id = :article_id";

        
        $stmt= $this->connection->prepare($sql);  //$pdo is $this->connection
        $article['article_id'] = $article_id;
        $stmt->execute($article);
        */

    }

    


    public function delete_article($article_id){
        $stmt = $this->conncetion->prepare("DELETE FROM articles WHERE article_id = :article_id");
        $stmt->execute([$article_id]);

    }

    
}

?>