<?php 
/**
 * @OA\Get(path="/user/comments/{id}", tags={"x-user", "comments"}, security={{"ApiKeyAuth": {}}},
 *     @OA\Parameter(type="integer", in="path", name="id", default=1, description="id of the comments"),
 *     @OA\Response(response="200", description="Fetch individual comments")
 * )
 */
    Flight::route('GET /user/comments/@id',function($id){
        $comments = Flight::commentsService()->get_article_comments($id); 
        Flight::json($comments);
    });

      /**
 * @OA\Post(path="/user/comments", tags={"x-user", "comments"}, security={{"ApiKeyAuth": {}}},
 *   @OA\RequestBody(description="Basic article info", required=true,
 *       @OA\MediaType(mediaType="application/json",
 *    			@OA\Schema(
 *    				 @OA\Property(property="user_id", required="true", type="string", example="1",	description="user id" ),
 *    				 @OA\Property(property="article_id", required="true", type="string", example="1",	description="article id" ),
 *    				 @OA\Property(property="comment_text", type="string", example="Lorem",	description="comment" )
 *                   @OA\Property(property="added_at", required="true", type="string", example="324234324",	description="time at which it was added" ),
 *    				 @OA\Property(property="username", type="string", example="Benjamin",	description="username" )
 *          )
 *       )
 *     ),
 *  @OA\Response(response="200", description="Article added")
 * )
 */

    Flight::route('POST /user/comments',function(){
        $request = Flight::request();
        $data = $request->data->getData();
        $category = Flight::commentsService()->add($data); 
        Flight::json ($category); 
    });

    

?>