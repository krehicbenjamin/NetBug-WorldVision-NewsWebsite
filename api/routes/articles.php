<?php 

    Flight::route('GET /articles',function(){
        $articles = Flight::articleDao()->get_all(0,10);
        Flight::json($articles);
    });

    Flight::route('GET /articles/@id',function($id){
        $articles = Flight::articleDao()->get_by_id($id);
        Flight::json($articles);
    });

    Flight::route('POST /articles',function(){
        $request = Flight::request();
        $data = $request->data->getData();
        $article = Flight::articleDao()->add($data); 
        Flight::json ($article); 
    });

    Flight::route('PUT /articles/@id',function($id){
        $request = Flight::request();
        $data = $request->data->getData();
        $article = Flight::articleDao()->update($id, $data);
        $article = Flight::articleDao()->get_by_id($id);  
        Flight::json ($article); 
    });

    Flight::route('DELETE /articles/@id',function($id){
        $articles = Flight::articleDao()->delete_article($id);
        Flight::json($articles);
    });

?>