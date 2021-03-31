<?php   
    Flight::route('GET /users', function(){
        $offset = Flight::query_param('offset', 0);
        $limit = Flight::query_param('limit', 10);
        $users = Flight::userDao()->get_all($offset, $limit);
        Flight::json($users);
    });
    
    Flight::route('GET /users/@id', function($id){
        $users = Flight::userDao()->get_by_id($id);
        Flight::json($users);
    });
    
    Flight::route('POST /users', function(){
        $request = Flight::request();
        $data = $request->data->getData();
        $user = Flight::userDao()->add($data); 
        Flight::json ($user); 
    });
    
    Flight::route('PUT /users/@id', function($id){
        $request = Flight::request();
        $data = $request->data->getData();
        $user = Flight::userDao()->update($id, $data);
        $user = Flight::userDao()->get_by_id($id);
        Flight::json($user);
    });

?>