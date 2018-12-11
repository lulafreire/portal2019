<?php 
session_start();

require_once("vendor/autoload.php");

use \Slim\Slim;
use \Lula\Page;
use \Lula\PageAdmin;
use \Lula\User;
use \Lula\Indicators;

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
	$favoritos = User::favoritos();
	$fav = $favoritos[0];

	// Variáveis do usuário logado
	$usuario = $_SESSION[User::SESSION]['nome'];
	$lotacao = $_SESSION[User::SESSION]['lotacao'];
	$ip      = $_SERVER['REMOTE_ADDR'];

	// Indicador IMA-GDASS
	$currImaGdass  = Indicators::currentImaGdass();
	$imaGdass = $currImaGdass[0]['indicador'];
	$prevImagdass = Indicators::previewImaGdass();
    $imaGdassAnt = $prevImagdass[0]['indicador'];
	$iconeImaGdass = Indicators::compareImaGdass();

	// Indicador IIB
	$curriib  = Indicators::currentiib();
	$iib = $curriib[0]['indicador'];
	$previib = Indicators::previewiib();
    $iibAnt = $previib[0]['indicador'];
	$iconeiib = Indicators::compareiib();

	// Tarefas Concluídas
	$currTarefas  = Indicators::currentTarefas();
	$tarefasConcluidas = $currTarefas[0]['concluidas'];
	$prevTarefas = Indicators::previewTarefas();
    $tarefasConcluidasAnt = $prevTarefas[0]['concluidas'];
	$iconeTarefasConcluidas = Indicators::compareTarefasConcluidas();

	// Tarefas Pendentes
	$currTarefas  = Indicators::currentTarefas();
	$tarefasPendentes = $currTarefas[0]['pendentes'];
	$prevTarefas = Indicators::previewTarefas();
    $tarefasPendentesAnt = $prevTarefas[0]['pendentes'];
	$iconeTarefasPendentes = Indicators::compareTarefasPendentes();
	
	$page = new PageAdmin();
	
	$page->setTpl("index", array(
		"usuario"=>$usuario,
		"lotacao"=>$lotacao,
		"ip"=>$ip,
		"fav"=>$fav,
		"imaGdass"=>$imaGdass,
		"imaGdassAnt"=>$imaGdassAnt,
		"iconeImaGdass"=>$iconeImaGdass,
		"iib"=>$iib,
		"iibAnt"=>$iibAnt,
		"iconeiib"=>$iconeiib,
		"tarefasConcluidas"=>$tarefasConcluidas,
		"tarefasConcluidasAnt"=>$tarefasConcluidasAnt,
		"iconeTarefasConcluidas"=>$iconeTarefasConcluidas,
		"tarefasPendentes"=>$tarefasPendentes,
		"tarefasPendentesAnt"=>$tarefasPendentesAnt,
		"iconeTarefasPendentes"=>$iconeTarefasPendentes		
	));

});

$app->get('/equipe', function() {
    
	User::verifyLogin();
	
	$users = User::listAll();
	// Variáveis do usuário logado
	$usuario = $_SESSION[User::SESSION]['nome'];
	$lotacao = $_SESSION[User::SESSION]['lotacao'];
	$ip      = $_SERVER['REMOTE_ADDR'];

	$page = new PageAdmin();

	$page->setTpl("equipe", array(

		"users"=>$users,
		"usuario"=>$usuario,
		"lotacao"=>$lotacao,
		"ip"=>$ip

	));

});

$app->get('/users-create', function() {
    
	User::verifyLogin();

	// Variáveis do usuário logado
	$usuario = $_SESSION[User::SESSION]['nome'];
	$lotacao = $_SESSION[User::SESSION]['lotacao'];
	$ip      = $_SERVER['REMOTE_ADDR'];
	
	$page = new PageAdmin();
	
	$page->setTpl("users-create", array(

		"usuario"=>$usuario,
		"lotacao"=>$lotacao,
		"ip"=>$ip

	));

});

$app->post('/users/create', function() {
    
	User::verifyLogin();
	
	$page = new PageAdmin();
	
	$page->setTpl("users-create");

});

$app->post('/users/update', function() {
    
	User::verifyLogin();
	
	$page = new PageAdmin();
	
	$page->setTpl("users-update");

});

$app->get('/users/update/:iduser', function() {
    
	User::verifyLogin();
	
	$page = new PageAdmin();
	
	$page->setTpl("users-update");

});

$app->get('/users/details/:iduser', function() {
    
	User::verifyLogin();
	
	$page = new PageAdmin();
	
	$page->setTpl("users-details");

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