<?php 
/**
 * @OA\Get(path="/user/images/{id}", tags={"x-user", "images"}, security={{"ApiKeyAuth": {}}},
 *     @OA\Parameter(type="integer", in="path", name="id", default=1, description="id of the images"),
 *     @OA\Response(response="200", description="Fetch individual images")
 * )
 */
    Flight::route('GET /user/images/@id',function($id){
        $images = Flight::imagesService()->get_article_images($id);  
        Flight::json($images);
    });

     /**
 * @OA\Post(path="/admin/images", tags={"x-admin", "images"}, security={{"ApiKeyAuth": {}}},
 *   @OA\RequestBody(description="Basic article info", required=true,
 *       @OA\MediaType(mediaType="application/json",
 *    			@OA\Schema(
 *    				 @OA\Property(property="article_id", required="true", type="integer", example="1",	description="article id of the article we want to add a message to" ),
 *    				 @OA\Property(property="picture64", required="true", type="string", example="subject",	description="article image" ),
 *    				 
 *          )
 *       )
 *     ),
 *  @OA\Response(response="200", description="Image added to article")
 * )
 */
    Flight::route('POST /admin/images',function(){
        $request = Flight::request();
        $data = $request->data->getData();
        $image = Flight::imagesService()->add($data); 
        Flight::json ($image); 
    });

?>