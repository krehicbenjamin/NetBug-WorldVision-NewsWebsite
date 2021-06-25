<?php 
/**
 * @OA\Get(path="/user/images/{id}", tags={"x-user", "images"}, security={{"ApiKeyAuth": {}}},
 *     @OA\Parameter(type="integer", in="path", name="id", default=1, description="id of the images"),
 *     @OA\Response(response="200", description="Fetch individual images")
 * )
 */
    Flight::route('GET /user/images/@id',function($id){
        $images = Flight::commentsService()->get_article_images($id);  //images dao function for searching images by article ID is needed
        Flight::json($images);
    });

    Flight::route('POST /user/comments',function(){
        $request = Flight::request();
        $data = $request->data->getData();
        $category = Flight::commentsService()->add($data); 
        Flight::json ($category); 
    });

    

?>