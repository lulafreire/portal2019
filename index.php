<?php 
session_start();

require_once("vendor/autoload.php");

use \Slim\Slim;
use \Lula\Page;
use \Lula\PageAdmin;
use \Lula\User;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function() {
    
	$page = new Page([

		"header"=>false,
		"footer"=>false

	]);
	
	$page->setTpl("login");

});

$app->get('/login', function() {
    
	$page = new Page([

		"header"=>false,
		"footer"=>false

	]);
	
	$page->setTpl("login");

});

$app->get('/dashboard', function() {
	
	User::verifyLogin();

	$page = new PageAdmin();
	
	$page->setTpl("index");

});

$app->get('/equipe', function() {
    
	$page = new PageAdmin();
	
	$page->setTpl("equipe");

});


$app->post('/acesso', function() {
    
	User::login($_POST["matricula"], $_POST["password"]);
	
	header ("Location: dashboard");
	exit;

});

$app->get('/logout', function() {
    
	User::logout();
	
	header ("Location: login");
	exit;

});

$app->run();

 ?>