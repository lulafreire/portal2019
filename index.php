<?php 
session_start();

require_once("vendor/autoload.php");
require("functions.php");

use \Slim\Slim;
use \Lula\Page;
use \Lula\PageAdmin;
use \Lula\User;
use \Lula\Indicators;
use \Lula\Query;

// Função converteData
function converteData($data)
{
	if(strstr($data, "/"))
	{
		$d = explode("/", $data);
		$r = "$d[2]-$d[1]-$d[0]";
	}
	else
	{
		$d = explode("-", $data);
		$r = "$d[2]/$d[1]/$d[0]";

	}

	return $r;
}

$app = new Slim();

$app->config('debug', true);

$app->get('/', function() {
    
	$q = Query::listUnidades();
	
	$page = new Page([

		"header"=>false,
		"footer"=>false

	]);
	
	$page->setTpl("login", array(
		"q"=>$q
	));

});

$app->get('/login', function() {
    
	$q = Query::listUnidades();
	
	$page = new Page([

		"header"=>false,
		"footer"=>false

	]);
	
	$page->setTpl("login", array(
		"q"=>$q
	));

});

$app->post('/cadastro', function(){
	
	$q = Query::listUnidades();
	
	if(isset($_POST))
	{
		$matricula = $_POST['matricula'];
		$nome  = $_POST['nome'];
		$cpf = $_POST['cpf'];
		$email = $_POST['email'];
		$cargo = $_POST['cargo'];
		$lotacao = $_POST['lotacao'];
		$dt_ingresso = converteData($_POST['dt_ingresso']);
		$telefone = $_POST['telefone'];
		$dt_nascimento = converteData($_POST['dt_nascimento']);
		$nit = $_POST['nit'];
		$endereco = $_POST['endereco'];
		$senha = $_POST['senha'];

		//Encripta a senha
		$senha = password_hash($senha, PASSWORD_DEFAULT);

		// Deixa a lotação apenas com os números
		$lotacao = preg_replace("/[^0-9]/", "", $lotacao);

	}

	// Opção por dados públicos ou ocultos (telefone e data de nascimento)
	if(isset($_POST['publicTelefone']))
	{
		$publicTelefone = $_POST['publicTelefone'];
	}
	else
	{
		$publicTelefone = 0;
	}
	if(isset($_POST['publicDtNascimento']))
	{
		$publicDtNascimento = $_POST['publicDtNascimento'];
	}
	else
	{
		$publicDtNascimento = 0;
	}
	
	// Foto
	if(!empty($_FILES['file']['name']))
 	{
		$ext = strtolower(substr($_FILES['file']['name'],-4)); //Pegando extensão do arquivo
		$foto = $matricula.$ext; //Definindo um novo nome para o arquivo
		$dir = 'img/users/'; //Diretório para uploads 
		move_uploaded_file($_FILES['file']['tmp_name'], $dir.$foto); //Fazer upload do arquivo
	} 
	else
	{
		$origem = "img/users/anonimo.jpg";
		$destino = "img/users/".$matricula.".jpg";
		copy($origem, $destino);
		$foto = $matricula.".jpg";

	}	 
	
	// Envio de dados para a classe User
	$dados = array(
		"matricula"=>"$matricula", 
		"nome"=>"$nome", 
		"cpf"=>"$cpf", 
		"foto"=>$foto,
		"email"=>$email,
		"cargo"=>$cargo,
		"lotacao"=>$lotacao,
		"dt_ingresso"=>$dt_ingresso,
		"telefone"=>$telefone,
		"dt_nascimento"=>$dt_nascimento,
		"nit"=>$nit,
		"endereco"=>$endereco,
		"senha"=>$senha,
		"publicTelefone"=>$publicTelefone,
		"publicDtNascimento"=>$publicDtNascimento
	);

	$u = User::verificaUnidade($lotacao);

	if($u==0)
	{
		$tpl = "unidade-erro";
	}
	else
	{
		$v = User::verificaUsuario($dados);


		if($v==0)
		{
			$tpl = "cadastro-sucesso";
		
		}
		else
		{
			$tpl = "cadastro-erro";
		}
	}

	$page = new Page([

		"header"=>false,
		"footer"=>false

	]);
	
	$page->setTpl("$tpl", array(
		"q"=>$q
	));
	
	
});



$app->get('/dashboard', function() {
	
	User::verifyLogin();
	$favoritos = User::favoritos();
	$fav = $favoritos[0];

	// Edição de Favoritos
	$selFav = User::selectFavoritos();

	// Variáveis do usuário logado
	$userNome       = $_SESSION[User::SESSION]['nome'];
	$userLotacao    = $_SESSION[User::SESSION]['lotacao'];
	$userMatricula  = $_SESSION[User::SESSION]['matricula'];
	$userCpf        = $_SESSION[User::SESSION]['cpf'];
	$userNit        = $_SESSION[User::SESSION]['nit'];
	$userEmail      = $_SESSION[User::SESSION]['email'];
	$userCargo      = $_SESSION[User::SESSION]['cargo'];
	$userDtIngresso = converteData($_SESSION[User::SESSION]['dt_ingresso']);
	$userDtNasc     = converteData($_SESSION[User::SESSION]['dt_nascimento']);
	$publicDtNascimento = $_SESSION[User::SESSION]['publicDtNascimento'];
	$userTelefone   = $_SESSION[User::SESSION]['telefone'];
	$publicTelefone = $_SESSION[User::SESSION]['publicTelefone'];
	$userEndereco   = $_SESSION[User::SESSION]['endereco'];
	$userFoto       = $_SESSION[User::SESSION]['foto'];

	// Nome da Unidade
	$nomeUnidade = User::nomeUnidade($userLotacao);
	
	// IP
	$ip      = $_SERVER['REMOTE_ADDR'];

	// Indicador IMA-GDASS
	$ima = Indicators::imaGdassAtual();
	$currImaGdass  = Indicators::currentImaGdass();
	$imaGdass = $currImaGdass[0]['indicador'];
	$mesImaGdass = $currImaGdass[0]['mes'];
	$prevImagdass = Indicators::previewImaGdass();
	$imaGdassAnt = $prevImagdass[0]['indicador'];
	$mesImaGdassAnt = $prevImagdass[0]['mes'];
	$iconeImaGdass = Indicators::compareImaGdass();
	$imaAnoAtual = Indicators::imaGdassAtual();
	$imaAnoAnterior = Indicators::imaGdassAnterior();

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

	// Represados
	$currRepresados  = Indicators::currentRepresados();
	$represados = $currRepresados[0]['indicador'];
	$dtRepresados = converteData($currRepresados[0]['data']);
	$prevRepresados = Indicators::previewRepresados();
	$represadosAnt = $prevRepresados[0]['indicador'];
	$dtRepresadosAnt = converteData($prevRepresados[0]['data']);
	$iconeRepresados = Indicators::compareRepresados();
	
	$page = new PageAdmin();
	
	$page->setTpl("index", array(
		"userNome"=>$userNome,
		"userLotacao"=>$userLotacao,
		"nomeUnidade"=>$nomeUnidade,
		"userMatricula"=>$userMatricula,
		"userCpf"=>$userCpf,
		"userEmail"=>$userEmail,
		"userTelefone"=>$userTelefone,
		"publicTelefone"=>$publicTelefone,
		"userEndereco"=>$userEndereco,
		"userCargo"=>$userCargo,
		"userNit"=>$userNit,
		"userDtIngresso"=>$userDtIngresso,
		"userDtNasc"=>$userDtNasc,
		"userFoto"=>$userFoto,
		"publicDtNascimento"=>$publicDtNascimento,
		"ip"=>$ip,
		"fav"=>$fav,
		"selFav"=>$selFav,
		"imaGdass"=>$imaGdass,
		"imaGdassAnt"=>$imaGdassAnt,
		"iconeImaGdass"=>$iconeImaGdass,
		"mesImaGdass"=>$mesImaGdass,
		"mesImaGdassAnt"=>$mesImaGdassAnt,
		"iib"=>$iib,
		"iibAnt"=>$iibAnt,
		"iconeiib"=>$iconeiib,
		"tarefasConcluidas"=>$tarefasConcluidas,
		"tarefasConcluidasAnt"=>$tarefasConcluidasAnt,
		"iconeTarefasConcluidas"=>$iconeTarefasConcluidas,
		"tarefasPendentes"=>$tarefasPendentes,
		"tarefasPendentesAnt"=>$tarefasPendentesAnt,
		"iconeTarefasPendentes"=>$iconeTarefasPendentes,
		"represados"=>$represados,
		"dtRepresados"=>$dtRepresados,
		"represadosAnt"=>$represadosAnt,
		"dtRepresadosAnt"=>$dtRepresadosAnt,
		"iconeRepresados"=>$iconeRepresados,
		"imaAnoAtual"=>$imaAnoAtual,
		"imaAnoAnterior"=>$imaAnoAnterior,
		"ima"=>$ima
	));

});

$app->get('/equipe', function() {
    
	User::verifyLogin();
	$favoritos = User::favoritos();
	$fav = $favoritos[0];

	// Edição de Favoritos
	$selFav = User::selectFavoritos();
	
	// Variáveis do usuário logado
	$userNome       = $_SESSION[User::SESSION]['nome'];
	$userLotacao    = $_SESSION[User::SESSION]['lotacao'];
	$userMatricula  = $_SESSION[User::SESSION]['matricula'];
	$userCpf        = $_SESSION[User::SESSION]['cpf'];
	$userNit        = $_SESSION[User::SESSION]['nit'];
	$userEmail      = $_SESSION[User::SESSION]['email'];
	$userCargo      = $_SESSION[User::SESSION]['cargo'];
	$userDtIngresso = converteData($_SESSION[User::SESSION]['dt_ingresso']);
	$userDtNasc     = converteData($_SESSION[User::SESSION]['dt_nascimento']);
	$publicDtNascimento = $_SESSION[User::SESSION]['publicDtNascimento'];
	$userTelefone   = $_SESSION[User::SESSION]['telefone'];
	$publicTelefone = $_SESSION[User::SESSION]['publicTelefone'];
	$userEndereco   = $_SESSION[User::SESSION]['endereco'];
	$userFoto       = $_SESSION[User::SESSION]['foto'];

	// Nome da Unidade
	$nomeUnidade = User::nomeUnidade($userLotacao);

	// Pesquisa os usuários do mesmo OL
	$users = User::listAll($userLotacao);

	// IP
	$ip      = $_SERVER['REMOTE_ADDR'];

	$page = new PageAdmin();

	$page->setTpl("equipe", array(

		"users"=>$users,
		"userNome"=>$userNome,
		"userLotacao"=>$userLotacao,
		"nomeUnidade"=>$nomeUnidade,
		"userMatricula"=>$userMatricula,
		"userCpf"=>$userCpf,
		"userEmail"=>$userEmail,
		"userTelefone"=>$userTelefone,
		"publicTelefone"=>$publicTelefone,
		"userEndereco"=>$userEndereco,
		"userCargo"=>$userCargo,
		"userNit"=>$userNit,
		"userDtIngresso"=>$userDtIngresso,
		"userDtNasc"=>$userDtNasc,
		"userFoto"=>$userFoto,
		"publicDtNascimento"=>$publicDtNascimento,
		"ip"=>$ip,
		"fav"=>$fav,
		"selFav"=>$selFav

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
		"matricula"=>$matricula,
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

$app->post('/update-favoritos', function(){

	for ($i=1; $i < 13; $i++) { 
		
		// Recupera os dados do formulário
		$fav[$i] = $_POST[$i];
			
		// Explode
		$e = explode("|", $fav[$i]);
		$n = $e[0];
		$origem = strtolower($e[1]);
		$idFav  = $e[2];

		// Define as variáveis para manipular o banco de dados
		$tb_origem = "tb_".$origem;
		$nFav = "fav".$n;
		$nUrl = "url".$n;
		$nIcone = "icone".$n;
		$nDesc = "desc".$n;
		
		$defineFavoritos = User::defineFavoritos($tb_origem, $idFav, $nFav, $nUrl, $nIcone, $nDesc);
	}

	header ("Location: dashboard");
	exit;	
	
});

$app->get('/autocomplete', function(){

	// Autocomplete para o formulário de busca
	$q = Query::listUnidades();
	
	$page = new Page([

		"footer"=>false,
		"header"=>false
		
	]);
	
	$page->setTpl("autocomplete", array(

		"q"=>$q
	));

});

$app->get('/test', function(){

	$page = new Page([

		"footer"=>false,
		
	]);
	
	$page->setTpl("modal");

});

$app->post('/test', function(){

	if(!empty($_POST['tags']))
	{
		echo $tags;
	}
	else
	{
		echo "No words";
	}

});

$app->get("/recuperar-senha", function() {

	$page = new PageAdmin([

		"header"=>false,
		"footer"=>false

	]);

	$page->setTpl("forgot");

});

$app->post("/recuperar-senha", function(){

	if(isset($_POST['matricula']))
	{
		$matricula = $_POST['matricula'];
	}

	$user = User::getForgot($matricula);

	header("Location: sent");
	exit;

});

$app->get("/sent", function() {

	$page = new PageAdmin([

		"header"=>false,
		"footer"=>false

	]);

	$page->setTpl("forgot-sent");

});

$app->post('/trocasenha', function(){

	$msg = User::setPassword($_POST['password']);
	$logout = User::logout();

	$page = new PageAdmin([

		"header"=>false,
		"footer"=>false

	]);

	$page->setTpl("trocasenha-msg", array(
		"msg"=>$msg
	));

});

$app->post('/busca', function(){

	User::verifyLogin();
	$favoritos = User::favoritos();
	$fav = $favoritos[0];

	// Edição de Favoritos
	$selFav = User::selectFavoritos();

	// Variáveis do usuário logado
	$userNome       = $_SESSION[User::SESSION]['nome'];
	$userLotacao    = $_SESSION[User::SESSION]['lotacao'];
	$userMatricula  = $_SESSION[User::SESSION]['matricula'];
	$userCpf        = $_SESSION[User::SESSION]['cpf'];
	$userNit        = $_SESSION[User::SESSION]['nit'];
	$userEmail      = $_SESSION[User::SESSION]['email'];
	$userCargo      = $_SESSION[User::SESSION]['cargo'];
	$userDtIngresso = converteData($_SESSION[User::SESSION]['dt_ingresso']);
	$userDtNasc     = converteData($_SESSION[User::SESSION]['dt_nascimento']);
	$publicDtNascimento = $_SESSION[User::SESSION]['publicDtNascimento'];
	$userTelefone   = $_SESSION[User::SESSION]['telefone'];
	$publicTelefone = $_SESSION[User::SESSION]['publicTelefone'];
	$userEndereco   = $_SESSION[User::SESSION]['endereco'];
	$userFoto       = $_SESSION[User::SESSION]['foto'];

	// Nome da Unidade
	$nomeUnidade = User::nomeUnidade($userLotacao);
	
	// IP
	$ip  = $_SERVER['REMOTE_ADDR'];

	// Buscas
	$qProcessos = Query::buscaProcessos($_POST['q']);
	$qSistemas = Query::buscaSistemas($_POST['q']);
	$qFormularios = Query::buscaFormularios($_POST['q']);
	$qLinks = Query::buscaLinks($_POST['q']);

	$page = new Page([

	]);

	$page->setTpl("busca", array(
		"q"=>$_POST['q'],
		"qProcessos"=>$qProcessos,
		"qSistemas"=>$qSistemas,
		"qLinks"=>$qLinks,
		"qFormularios"=>$qFormularios,
		"userNome"=>$userNome,
		"userLotacao"=>$userLotacao,
		"nomeUnidade"=>$nomeUnidade,
		"userMatricula"=>$userMatricula,
		"userCpf"=>$userCpf,
		"userEmail"=>$userEmail,
		"userTelefone"=>$userTelefone,
		"publicTelefone"=>$publicTelefone,
		"userEndereco"=>$userEndereco,
		"userCargo"=>$userCargo,
		"userNit"=>$userNit,
		"userDtIngresso"=>$userDtIngresso,
		"userDtNasc"=>$userDtNasc,
		"userFoto"=>$userFoto,
		"publicDtNascimento"=>$publicDtNascimento,
		"ip"=>$ip,
		"fav"=>$fav,
		"selFav"=>$selFav
	));

});

$app->run();

 ?>