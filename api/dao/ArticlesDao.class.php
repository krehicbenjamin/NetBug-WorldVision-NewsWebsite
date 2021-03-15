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

    }


    public function delete_article($article_id){

    }

    
}

?>