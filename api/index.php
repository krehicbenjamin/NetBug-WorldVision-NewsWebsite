 <?php
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);

   require dirname(__FILE__)."/../vendor/autoload.php";

   /* require services */
   require_once dirname(__FILE__)."/services/ArticleService.class.php";   
   require_once dirname(__FILE__)."/services/UserService.class.php";

   /* Utility function */  
  Flight::map('query_param', function($name, $default_value = 0){
    $request = Flight::request();
    $query_param = @$request->query->getData()[$name];
    $query_param = $query_param ? $query_param : $default_value; 
    return $query_param;  
  });
  /* utility function for getting header parameters */
Flight::map('header', function($name){
  $headers = getallheaders();
  return @$headers[$name];
});

/* utility function for generating JWT token */
Flight::map('jwt', function($user){
  $jwt = \Firebase\JWT\JWT::encode(["exp" => (time() + Config::JWT_TOKEN_TIME), "id" => $user["id"], "aid" => $user["account_id"], "r" => $user["role"]], Config::JWT_SECRET);
  return ["token" => $jwt];
});

Flight::route('GET /swagger', function(){
  $openapi = @\OpenApi\scan(dirname(__FILE__)."/routes");
  header('Content-Type: application/json');
  echo $openapi->toJson();
});

Flight::route('GET /', function(){
  Flight::redirect('/docs');
});


  /* require routes */
  require_once dirname(__FILE__)."/routes/articles.php";
  require_once dirname(__FILE__)."/routes/users.php";
  require_once dirname(__FILE__)."/routes/middleware.php";

  /* require BLL */
  Flight::register("articleService", "ArticleService");
  Flight::register("userService", "UserService");

  
  Flight::start();
?>