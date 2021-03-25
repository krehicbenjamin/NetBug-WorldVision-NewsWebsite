 <?php
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);

   require dirname(__FILE__)."/../vendor/autoload.php";
   require_once dirname(__FILE__)."/dao/ArticlesDao.class.php";
  
   Flight::route('/',function(){
     echo("Hello route!");
   });

   Flight::register("articleDao", "ArticlesDao");

   Flight::route('GET /articles',function(){
      $articles = Flight::articleDao()->get_all(0,10);
      Flight::json($articles);
  });

  Flight::route('GET /articles/@id',function($id){
    $dao = new ArticlesDao();
    $articles = $dao->get_by_id($id);
    Flight::json($articles);
});

  Flight::route('POST /articles',function(){
    $request = Flight::request();
    $data = $request->data->getData();
    $article = Flight::articleDao()->add($data); 
    Flight::json ($article); 
  });

  Flight::route('PUT /articles/@id',function($id){
    $request = Flight::request();
    $data = $request->data->getData();
    $article = Flight::articleDao()->update($id, $data);
    $article = Flight::articleDao()->get_by_id($id);  
    Flight::json ($article); 
  });

   Flight::start();
?>