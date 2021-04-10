<?php  
/* 
    Flight::route('POST /login', function(){
        Flight::json(Flight::jwt(Flight::userService()->login(Flight::request()->data->getData())));
    });
*/
    Flight::route('POST /register', function(){
        $data = Flight::request()->data->getData();
        Flight::userService()->register($data);
        Flight::json(["message" => "Account created."]);
    });

    Flight::route('GET /users', function(){
        $offset = Flight::query_param('offset', 0);
        $limit = Flight::query_param('limit', 10);
        $users = Flight::userService()->get_all($offset, $limit);
        Flight::json($users);
    });

    Flight::route('POST /reset', function(){
        Flight::json(Flight::jwt(Flight::userService()->reset(Flight::request()->data->getData())));
    });
    
    Flight::route('GET /users/@id', function($id){
        $users = Flight::userService()->get_by_id($id);
        Flight::json($users);
    });
    
    Flight::route('POST /users', function(){
        $request = Flight::request();
        $data = $request->data->getData();
        $user = Flight::userService()->add($data); 
        Flight::json ($user); 
    });
    
    Flight::route('PUT /users/@id', function($id){
        $request = Flight::request();
        $data = $request->data->getData();
        $user = Flight::userService()->update($id, $data);
        $user = Flight::userService()->get_by_id($id);
        Flight::json($user);
    });

    Flight::route('POST /register', function(){
        $data = Flight::request()->data->getData();
        Flight::userService()->register($data);
        Flight::json(["message" => "Account created."]);
    });

    Flight::route('GET /confirm/@token', function($token){
        Flight::json(Flight::jwt(Flight::userService()->confirm($token)));
    });

?>