<?php 
    Flight::route('GET /user/categories',function(){
        $offset = Flight::query_param('offset', 0);
        $limit = Flight::query_param('limit', 10);
        $search = Flight::query_param('search');
        $order = Flight::query_param('order');
        Flight::json(Flight::categoriesService()->get_categories($search, $offset, $limit, $order)); 
    });

/**
 * @OA\Get(path="/user/categories/{id}", tags={"x-user", "categories"}, security={{"ApiKeyAuth": {}}},
 *     @OA\Parameter(type="integer", in="path", name="id", default=1, description="id of the category"),
 *     @OA\Response(response="200", description="Fetch individual categories")
 * )
 */
    Flight::route('GET /user/categories/@id',function($id){
        $category = Flight::categoriesService()->get_by_id($id);
        Flight::json($category);
    });

    Flight::route('POST /admin/categories',function(){
        $request = Flight::request();
        $data = $request->data->getData();
        $category = Flight::categoriesService()->add($data); 
        Flight::json ($category); 
    });

    Flight::route('PUT /admin/categories/@id',function($id){
        $request = Flight::request();
        $data = $request->data->getData();
        $category = Flight::categoriesService()->update($id, $data);
        Flight::json ($category); 
    });

?>