 <?php
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);

   require dirname(__FILE__)."/../vendor/autoload.php";
   require_once dirname(__FILE__)."/dao/ArticlesDao.class.php";
   require_once dirname(__FILE__)."/dao/UsersDao.class.php";

   /* Utility function */ 
  Flight::map('query_param', function($name, $default_value = 0){
    $request = Flight::request();
    $query_param = @$request->query->getData()[$name];
    $query_param = $query_param ? $query_param : $default_value; 
    return $query_param;  
  });


   require_once dirname(__FILE__)."/routes/articles.php";
   require_once dirname(__FILE__)."/routes/users.php";

   Flight::register("articleDao", "ArticlesDao");
   Flight::register("userDao", "UsersDao");


   Flight::start();
?>