<?php 

require_once dirname(__FILE__)."/BaseDao.class.php";

class ArticleDao{

    public function add_article($article){

        $sql = "INSERT INTO articles (title, body, picture64, editor, added_at, category) VALUES (:title, :body, :picture64, :editor, :added_at, :category)";
        $stmt= $this->connection->prepare($sql);  //$pdo is $this->connection
        $stmt->execute($article);

        // Getting the last added artiles id and returning it 

        $article['article_id'] = $this->connection->lastInsertId();
        return $article;


    }


    public function edit_article($article_id, $article){

        $this->update("articles", $article_id, $article);

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