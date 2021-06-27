<?php 

Flight::route('GET /user/tags',function(){
    $offset = Flight::query_param('offset', 0);
    $limit = Flight::query_param('limit', 10);
    $search = Flight::query_param('search');
    $order = Flight::query_param('order');
    Flight::json(Flight::tagsService()->get_tags($search, $offset, $limit, $order)); 
});

Flight::route('GET /user/tags/@id',function($id){
    $tag = Flight::tagsService()->get_article_tags($id);
    Flight::json($tag);
});

Flight::route('POST /admin/tags',function(){
    $request = Flight::request();
    $data = $request->data->getData();
    $tag = Flight::tagsService()->add($data); 
    Flight::json ($tag); 
});

Flight::route('PUT /admin/tags/@id',function($id){
    $request = Flight::request();
    $data = $request->data->getData();
    $tag = Flight::tagsService()->update($id, $data);
    Flight::json ($tag); 
});

?>