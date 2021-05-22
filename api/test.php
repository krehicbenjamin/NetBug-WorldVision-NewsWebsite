<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/*
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/api/dao/ArticlesDao.class.php');
 */

require_once dirname(__FILE__)."/dao/UsersDao.class.php";
require_once dirname(__FILE__) . "/dao/ArticlesDao.class.php";

//$dao = new UsersDao();
$dao = new ArticlesDao();

$usertest = [
    "username" => "test",
    "password" => "12",
    "email" => "bnh@mail.com",
    "added_at" => "234324324",
];

$testedit = [
    "editor_name" => "test",
    "editor_email" => "bnh@mail.com",
    "editor_pw" => "12",
];

$testart = [
    "title" => "dummy title",
    "body" => "dummy text",
    "picture64" => "test test",
    "added_at" => "234324324",

];

$article = $dao->get_article_by_id(1);

print_r($article);
