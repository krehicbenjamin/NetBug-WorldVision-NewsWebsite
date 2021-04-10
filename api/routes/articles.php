<?php 
    Flight::route('GET /articles',function(){
        $offset = Flight::query_param('offset', 0);
        $limit = Flight::query_param('limit', 10);
        $search = Flight::query_param('search');
        $order = Flight::query_param('order');
        Flight::json(Flight::articleService()->get_articles($search, $offset, $limit, $order)); 
    });

    Flight::route('GET /articles/@id',function($id){
        $articles = Flight::articleService()->get_by_id($id);
        Flight::json($articles);
    });

    Flight::route('POST /articles',function(){
        $request = Flight::request();
        $data = $request->data->getData();
        $article = Flight::articleService()->add($data); 
        Flight::json ($article); 
    });

    Flight::route('PUT /articles/@id',function($id){
        $request = Flight::request();
        $data = $request->data->getData();
        $article = Flight::articleService()->update($id, $data);
        Flight::json ($article); 
    });

    Flight::route('DELETE /articles/@id',function($id){
        $articles = Flight::articleService()->delete_article($id);
        Flight::json($articles);
    });

?>