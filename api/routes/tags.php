<?php 

Flight::route('GET /user/tags',function(){
    $offset = Flight::query_param('offset', 0);
    $limit = Flight::query_param('limit', 10);
    $search = Flight::query_param('search');
    $order = Flight::query_param('order');
    Flight::json(Flight::tagsService()->get_tags($search, $offset, $limit, $order)); 
});
/**
 * @OA\Get(path="/user/articles/search/{id}", tags={"x-user", "tags"}, security={{"ApiKeyAuth": {}}},
 *     @OA\Parameter(type="string", in="path", name="category", default=title, description="get article tags"),
 *     @OA\Response(response="200", description="Fetch articles by tag parameter")
 * )
 */

Flight::route('GET /user/tags/@id',function($id){
    $tag = Flight::tagsService()->get_article_tags($id);
    Flight::json($tag);
});

  /**
 * @OA\Post(path="/admin/tags", tags={"x-admin", "tags"}, security={{"ApiKeyAuth": {}}},
 *   @OA\RequestBody(description="Basic article info", required=true,
 *       @OA\MediaType(mediaType="application/json",
 *    			@OA\Schema(
 *    				 @OA\Property(property="article_id", required="true", type="integer", example="1",	description="article id of the article we want to add a message to" ),
 *    				 @OA\Property(property="tag_name", required="true", type="string", example="sports",	description="article tag" ),
 *    				 
 *          )
 *       )
 *     ),
 *  @OA\Response(response="200", description="tag added to article")
 * )
 */

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