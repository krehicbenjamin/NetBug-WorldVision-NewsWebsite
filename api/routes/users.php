<?php  
/* Swagger documentation */

/**
 * @OA\Info(title="NetBug API", version="0.2")
 * @OA\OpenApi(
 *    @OA\Server(url="http://localhost:8082/BenjaminKrehicProjectWeb/api/", description="Development Environment" ),
 *    @OA\Server(url="#", description="Production Environment" )
 * ),
 * @OA\SecurityScheme(securityScheme="ApiKeyAuth", type="apiKey", in="header", name="Authentication" )
 */

/**
 * @OA\Post(path="/login", tags={"login"},
 *   @OA\RequestBody(description="Basic user info", required=true,
 *       @OA\MediaType(mediaType="application/json",
 *    			@OA\Schema(
 *    				 @OA\Property(property="email", required="true", type="string", example="myemail@gmail.com",	description="User's email address" ),
 *                   @OA\Property(property="password", required="true", type="string", example="12345",	description="Password" )
 *          )
 *       )
 *     ),
 *  @OA\Response(response="200", description="Message that user has been logged in.")
 * )
 */

    Flight::route('POST /login', function(){
        Flight::json(Flight::jwt(Flight::userService()->login(Flight::request()->data->getData())));
    });

/**
 * @OA\Post(path="/register", tags={"login"},
 *   @OA\RequestBody(description="Basic user info", required=true,
 *       @OA\MediaType(mediaType="application/json",
 *    			@OA\Schema(
 *     				 @OA\Property(property="username", required="true", type="string", example="First Last Name",	description="Name of the user`" ),
 *    				 @OA\Property(property="email", required="true", type="string", example="myemail@gmail.com",	description="User's email address" ),
 *             @OA\Property(property="password", required="true", type="string", example="12345",	description="Password" )
 *          )
 *       )
 *     ),
 *  @OA\Response(response="200", description="Message that acount has been created.")
 * )
 */
    Flight::route('POST /register', function(){
        $request = Flight::request();
        $data = $request->data->getData();
        Flight::userService()->register($data);
        Flight::json(["message" => "Account created."]);
    });


    Flight::route('GET /admin/users', function(){
        $offset = Flight::query_param('offset', 0);
        $limit = Flight::query_param('limit', 10);
        $users = Flight::userService()->get_all($offset, $limit);
        Flight::json($users);
    });

/**
 * @OA\Post(path="/reset", tags={"login"}, description="Reset users password using recovery token",
 *   @OA\RequestBody(description="Basic user info", required=true,
 *       @OA\MediaType(mediaType="application/json",
 *    			@OA\Schema(
 *    				 @OA\Property(property="token", required="true", type="string", example="123",	description="Recovery token" ),
 *    				 @OA\Property(property="password", required="true", type="string", example="123",	description="New password" )
 *          )
 *       )
 *     ),
 *  @OA\Response(response="200", description="Message that user has changed password.")
 * )
 */

    Flight::route('POST /reset', function(){
        Flight::json(Flight::jwt(Flight::userService()->reset(Flight::request()->data->getData())));
    });

    Flight::route('PUT /admin/users/@id', function($id){
         Flight::userService()->ban($id);
        
    });
    /**
 * @OA\Get(path="/user/users/{id}", tags={"x-user", "user"}, security={{"ApiKeyAuth": {}}},
 *     @OA\Parameter(type="integer", in="path", name="id", default=1, description="id of the user"),
 *     @OA\Response(response="200", description="Fetch individual user by ID")
 * )
 */
    Flight::route('GET /user/users/@id', function($id){
        $users = Flight::userService()->get_by_id($id);
        Flight::json($users);
    });
    
    Flight::route('POST /users', function(){
        $request = Flight::request();
        $data = $request->data->getData();
        $user = Flight::userService()->add($data); 
        Flight::json($user); 
    });
    
    Flight::route('PUT /admin/users/@id', function($id){
        $request = Flight::request();
        $data = $request->data->getData();
        $user = Flight::userService()->update($id, $data);
    });

    Flight::route('GET /confirm/@token', function($token){
        Flight::json(Flight::jwt(Flight::userService()->confirm($token)));
    });

?>