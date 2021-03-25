 <?php
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);

   require dirname(__FILE__)."/../vendor/autoload.php";
   require_once dirname(__FILE__)."/dao/ArticlesDao.class.php";
   require_once dirname(__FILE__)."/routes/articles.php";
   Flight::register("articleDao", "ArticlesDao");

   Flight::start();
?>