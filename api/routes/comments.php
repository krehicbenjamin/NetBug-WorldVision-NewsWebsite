<?php 
/**
 * @OA\Get(path="/user/images/{id}", tags={"x-user", "images"}, security={{"ApiKeyAuth": {}}},
 *     @OA\Parameter(type="integer", in="path", name="id", default=1, description="id of the images"),
 *     @OA\Response(response="200", description="Fetch individual images")
 * )
 */
    Flight::route('GET /user/comments/@id',function($id){
        $comments = Flight::commentsService()->get_article_comments($id); 
        Flight::json($comments);
    });

    Flight::route('POST /user/comments',function(){
        $request = Flight::request();
        $data = $request->data->getData();
        $category = Flight::commentsService()->add($data); 
        Flight::json ($category); 
    });

    

?>