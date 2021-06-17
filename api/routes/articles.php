<?php 
    Flight::route('GET /user/articles',function(){
        $offset = Flight::query_param('offset', 0);
        $limit = Flight::query_param('limit', 10);
        $search = Flight::query_param('search');
        $order = Flight::query_param('order', '-id');
        Flight::json(Flight::articleService()->get_articles($search, $offset, $limit, $order)); 
    });

/**
 * @OA\Get(path="/user/articles/{id}", tags={"x-user", "articles"}, security={{"ApiKeyAuth": {}}},
 *     @OA\Parameter(type="integer", in="path", name="id", default=1, description="id of the article"),
 *     @OA\Response(response="200", description="Fetch individual articles")
 * )
 */
    Flight::route('GET /user/articles/@id',function($id){
        $articles = Flight::articleService()->get_article_by_id($id);
            Flight::json($articles);
    });

    Flight::route('GET /user/articles/cat/@category',function($category){
        $articles = Flight::articleService()->get_article_by_category($category);
        Flight::json($articles);
    });

    Flight::route('POST /admin/articles',function(){
        $request = Flight::request();
        $data = $request->data->getData();
        $article = Flight::articleService()->add($data); 
        Flight::json ($article); 
    });

    Flight::route('PUT /admin/articles/@id',function($id){
        $request = Flight::request();
        $data = $request->data->getData();
        $article = Flight::articleService()->update($id, $data);
        Flight::json ($article); 
    });

    Flight::route('DELETE /admin/articles/@id',function($id){
        $articles = Flight::articleService()->delete_article($id);
        Flight::json($articles);
    });

?>