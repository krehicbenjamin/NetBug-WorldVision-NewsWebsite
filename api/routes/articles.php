<?php 
    Flight::route('GET /user/articles',function(){
        $search = Flight::query_param('search');
        $offset = Flight::query_param('offset', 0);
        $limit = Flight::query_param('limit', 50);
        $order = Flight::query_param('order', '+id');
        Flight::json(Flight::articleService()->get_articles($search, $offset, $limit, $order)); 
    });

/**
 * @OA\Get(path="/user/email_templates", tags={"x-user", "email-templates"}, security={{"ApiKeyAuth": {}}},
 *     @OA\Parameter(type="integer", in="query", name="offset", default=0, description="Offset for pagination"),
 *     @OA\Parameter(type="integer", in="query", name="limit", default=25, description="Limit for pagination"),
 *     @OA\Parameter(type="string", in="query", name="search", description="Search string for accounts. Case insensitive search."),
 *     @OA\Parameter(type="string", in="query", name="order", default="-id", description="Sorting for return elements. -column_name ascending order by column_name or +column_name descending order by column_name"),
 *     @OA\Response(response="200", description="List articles for user")
 * )
 */
    Flight::route('GET /admin/articles',function(){
        $search = Flight::query_param('search');
        $offset = Flight::query_param('offset', 0);
        $limit = Flight::query_param('limit', 10);
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
/**
 * @OA\Get(path="/user/articles/{category}", tags={"x-user", "articles"}, security={{"ApiKeyAuth": {}}},
 *     @OA\Parameter(type="string", in="path", name="category", default=NEWS, description="cetegory of the articles"),
 *     @OA\Response(response="200", description="Fetch articles by category")
 * )
 */
    Flight::route('GET /user/articles/cat/@category',function($category){
        $articles = Flight::articleService()->get_article_by_category($category);
        Flight::json($articles);
    });
/**
 * @OA\Get(path="/user/articles/search/{search}", tags={"x-user", "articles"}, security={{"ApiKeyAuth": {}}},
 *     @OA\Parameter(type="string", in="path", name="category", default=title, description="search parameter"),
 *     @OA\Response(response="200", description="Fetch articles by search parameter")
 * )
 */
    Flight::route('GET /user/articles/search/@search',function($search){
        $articles = Flight::articleService()->get_articles($search, 0, 10, '-id');
        Flight::json($search);
    });

    /**
 * @OA\Post(path="/admin/articles", tags={"x-admin", "articles"}, security={{"ApiKeyAuth": {}}},
 *   @OA\RequestBody(description="Basic article info", required=true,
 *       @OA\MediaType(mediaType="application/json",
 *    			@OA\Schema(
 *    				 @OA\Property(property="title", required="true", type="string", example="name",	description="article title" ),
 *    				 @OA\Property(property="body", required="true", type="string", example="subject",	description="article body" ),
 *    				 @OA\Property(property="picture64", type="string", example="body",	description="picture in base 64" )
 *                   @OA\Property(property="added_at", required="true", type="string", example="subject",	description="time at which it was added" ),
 *    				 @OA\Property(property="category", type="string", example="body",	description="category of the article" )
 *          )
 *       )
 *     ),
 *  @OA\Response(response="200", description="Article added")
 * )
 */

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
/**
 * @OA\Delete(path="/admin/articles/{id}", tags={"x-user", "articles"}, security={{"ApiKeyAuth": {}}},
 *     @OA\Parameter(type="string", in="path", name="category", default=title, description="id of the article we want to delete"),
 *     @OA\Response(response="200", description="deleting article by id")
 * )
 */
    Flight::route('DELETE /admin/articles/@id',function($id){
        $articles = Flight::articleService()->delete_article($id);
        Flight::json($articles);
    });

?>