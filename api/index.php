 <?php
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);

   require dirname(__FILE__)."/../vendor/autoload.php";

   /* require services */
   require_once dirname(__FILE__)."/services/ArticleService.class.php";   
   require_once dirname(__FILE__)."./services/UserService.class.php";

   /* Utility function */ 

  Flight::map('query_param', function($name, $default_value = 0){
    $request = Flight::request();
    $query_param = @$request->query->getData()[$name];
    $query_param = $query_param ? $query_param : $default_value; 
    return $query_param;  
  });

  /* require routes */
  require_once dirname(__FILE__)."/routes/articles.php";
  require_once dirname(__FILE__)."/routes/users.php";

  /* require BLL */
  Flight::register("articleService", "ArticleService");
  Flight::register("userService", "UserService");
  Flight::start();
?>