 <?php
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);

   require dirname(__FILE__)."/../vendor/autoload.php";
   require_once dirname(__FILE__)."/dao/ArticlesDao.class.php";
  
   Flight::route('/',function(){
     echo("Hello route!");
   });
   Flight::route('GET /articles',function(){
      $dao = new ArticlesDao();
      $articles = $dao->get_all(0,10);
      Flight::json($articles);
  });
  
  Flight::route('GET /articles/@id',function($id){
    $dao = new ArticlesDao();
    $articles = $dao->get_by_id($id);
    Flight::json($articles);
});

   Flight::start();
?>