<?php 

require_once("vendor/autoload.php");

use \Slim\Slim;
use \Lula\Page;
use \Lula\PageAdmin;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function() {
    
	$page = new Page([

		"header"=>false,
		"footer"=>false
		
	]);
	
	$page->setTpl("login");

});

$app->get('/admin', function() {
    
	$page = new PageAdmin();
	
	$page->setTpl("index");

});

$app->run();

 ?>