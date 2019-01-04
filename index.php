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

		if(!isset($_POST['senha'])) // Caso tenha sido cadastrado pelo gestor
		{
			$date = date('Ymdhis');
			$code = $matricula.$date;
			$s = password_hash($code, PASSWORD_DEFAULT);
			$senha = substr(preg_replace("/[^0-9]/", "", $s), 3, 6);

			User::sentPassword($email, $nome, $senha);
		}
		else
		{
			$senha = $_POST['senha'];
		}

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
	
	if(isset($_POST['equipe']))
	{
		$equipe = $_POST['equipe'];
	}
	else
	{
		$equipe = "";
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
		"equipe"=>$equipe,
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

		if(empty($_POST['senha']))
		{
			// Verifica se o usuário está logado
			User::verifyLogin();

			// Favoritos do usuário logado
			$favoritos = User::favoritos();
			$fav = $favoritos[0];

			// Permite a Edição de Favoritos
			$selFav = User::selectFavoritos();

			// Variáveis do usuário logado
			$user = $_SESSION[User::SESSION];

			// Nome da Unidade
			$nomeUnidade = User::nomeUnidade($_SESSION[User::SESSION]['lotacao']);
			
			// IP
			$ip      = $_SERVER['REMOTE_ADDR'];

			// Pesquisa os usuários do mesmo OL
			$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
			$users = User::getUsers($_SESSION[User::SESSION]['lotacao'], $page, 7);
			$max_links = 10;
			$pages = [];
			$links_laterais = ceil($max_links / 2);
			$inicio = $page - $links_laterais;
			if($inicio<1)
			{
				$inicio = 1;
			}
			$limite = $page + $links_laterais;

			for ($i = $inicio; $i <= $limite; $i++)
			{
				array_push($pages, [
					'link'=>'equipe?page='.$i,
					'page'=>$page,
					'i'=>$i,
					'total'=>$users['pages']
				]);
			}

			$page = new Page();

			$page->setTpl("equipe", array(
				"user"=>$user,
				"nomeUnidade"=>$nomeUnidade,
				"ip"=>$ip,
				"fav"=>$fav,
				"selFav"=>$selFav,
				"users"=>$users,
				"pages"=>$pages
			));
		} 
		else
		{
			if($v==0)
			{
				$tpl = "cadastro-sucesso";
			
			}
			else
			{
				$tpl = "cadastro-erro";
			}
		
			$page = new Page([

				"header"=>false,
				"footer"=>false
		
			]);
			
			$page->setTpl("$tpl", array(
				"q"=>$q
			));
		}	
	}	
	
});

$app->get('/dashboard', function() {
	
	// Verifica se o usuário está logado
	User::verifyLogin();

	// Favoritos do usuário logado
	$favoritos = User::favoritos();
	$fav = $favoritos[0];

	// Permite a Edição de Favoritos
	$selFav = User::selectFavoritos();

	// Variáveis do usuário logado
	$user = $_SESSION[User::SESSION];

	// Nome da Unidade
	$nomeUnidade = User::nomeUnidade($_SESSION[User::SESSION]['lotacao']);
	
	// IP
	$ip      = $_SERVER['REMOTE_ADDR'];

	// Indicadores
	$imaGdass   = Indicators::imaGdass();
	$iib        = Indicators::iib();
	$tarefas    = Indicators::tarefas();
	$represados = Indicators::represados();

	// Conteudo mais acessado
	$maisAcessados = Query::maisAcessados();

	$page = new Page();
	
	$page->setTpl("index", array(
		"user"=>$user,
		"imaGdass"=>$imaGdass,
		"iib"=>$iib,
		"tarefas"=>$tarefas,
		"represados"=>$represados,
		"nomeUnidade"=>$nomeUnidade,
		"ip"=>$ip,
		"fav"=>$fav,
		"selFav"=>$selFav,
		"maisAcessados"=>$maisAcessados
	));

});

$app->get('/equipe', function() {
    
	// Verifica se o usuário está logado
	User::verifyLogin();

	// Favoritos do usuário logado
	$favoritos = User::favoritos();
	$fav = $favoritos[0];

	// Permite a Edição de Favoritos
	$selFav = User::selectFavoritos();

	// Variáveis do usuário logado
	$user = $_SESSION[User::SESSION];

	// Nome da Unidade
	$nomeUnidade = User::nomeUnidade($_SESSION[User::SESSION]['lotacao']);
	
	// IP
	$ip      = $_SERVER['REMOTE_ADDR'];

	// Pesquisa os usuários do mesmo OL
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
	$users = User::getUsers($_SESSION[User::SESSION]['lotacao'], $page, 7);
	$max_links = 10;
	$pages = [];
	$links_laterais = ceil($max_links / 2);
	$inicio = $page - $links_laterais;
	if($inicio<1)
	{
		$inicio = 1;
	}
	$limite = $page + $links_laterais;

	for ($i = $inicio; $i <= $limite; $i++)
	{
		array_push($pages, [
			'link'=>'equipe?page='.$i,
			'page'=>$page,
			'i'=>$i,
			'total'=>$users['pages']
		]);
	}

	$page = new PageAdmin();

	$page->setTpl("equipe", array(
		"user"=>$user,
		"nomeUnidade"=>$nomeUnidade,
		"ip"=>$ip,
		"fav"=>$fav,
		"selFav"=>$selFav,
		"users"=>$users,
		"pages"=>$pages
	));

});


$app->post('/users/create', function() {
    
	User::verifyLogin();
	
	$page = new PageAdmin();
	
	$page->setTpl("users-create");

});

$app->post('/users-update/:iduser', function($iduser) {
    
	User::verifyLogin();
	
	if(isset($_POST))
	{
		$nome = $_POST['nome'];
		$matricula = $_POST['matricula'];
		$cargo = $_POST['cargo'];
		$foto = $_POST['foto'];
		$cpf = $_POST['cpf'];
		$email = $_POST['email'];
		$lotacao = $_POST['lotacao'];
		$telefone = $_POST['telefone'];
		$dt_nascimento = $_POST['dt_nascimento'];
		$dt_ingresso = $_POST['dt_ingresso'];
		$endereco = $_POST['endereco'];
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

	if(!empty($_FILES['file']['name']))
	{
		// Apaga a foto atual
		$ext = strtolower(substr($_FILES['file']['name'],-4)); //Pegando extensão do arquivo
		$foto = $matricula.$ext; //Definindo um novo nome para o arquivo
		$dir = 'img/users/'; //Diretório para uploads 
		move_uploaded_file($_FILES['file']['tmp_name'], $dir.$foto); //Fazer upload do arquivo
	} 
	else
	{
		$foto = $_POST['foto'];
	}

	$dados = array(
		"matricula"=>"$matricula", 
		"nome"=>"$nome", 
		"cpf"=>"$cpf", 
		"email"=>$email,
		"foto"=>$foto,
		"cargo"=>$cargo,
		"lotacao"=>$lotacao,
		"dt_ingresso"=>converteData($dt_ingresso),
		"telefone"=>$telefone,
		"dt_nascimento"=>converteData($dt_nascimento),
		"endereco"=>$endereco,
		"publicTelefone"=>$publicTelefone,
		"publicDtNascimento"=>$publicDtNascimento
	);
	
	User::updateUser($iduser, $dados);
	
	
	header("Pragma: no-cache");
    header("Cache: no-cache");
    header("Cache-Control: no-cache, must-revalidate");
    header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	header ("Location: ../dashboard");
	exit;

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
		$nOrigem = "origem".$n;
		$nID = "idFav".$n;
		
		$defineFavoritos = User::defineFavoritos($tb_origem, $idFav, $nFav, $nUrl, $nIcone, $nDesc, $nOrigem, $nID);
	}

	header ("Location: dashboard");
	exit;	
	
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

	$msg = User::trocaSenha($_POST['newPassword'], $_POST['iduser']);

	User::logout();

	$page = new PageAdmin([

		"header"=>false,
		"footer"=>false

	]);

	$page->setTpl("trocasenha-msg", array(
		"msg"=>$msg
	));

});

$app->post('/busca', function(){

	// Verifica se o usuário está logado
	User::verifyLogin();

	// Favoritos do usuário logado
	$favoritos = User::favoritos();
	$fav = $favoritos[0];

	// Permite a Edição de Favoritos
	$selFav = User::selectFavoritos();

	// Variáveis do usuário logado
	$user = $_SESSION[User::SESSION];

	// Nome da Unidade
	$nomeUnidade = User::nomeUnidade($_SESSION[User::SESSION]['lotacao']);
	
	// IP
	$ip      = $_SERVER['REMOTE_ADDR'];

	// Retira pontos, traços e barras para a pesquisa por número
	$q = limpaPesquisa($_POST['q']);

	// Buscas
	$qProcessos = Query::buscaProcessos($q);
	$qSistemas = Query::buscaSistemas($q);
	$qFormularios = Query::buscaFormularios($q);
	$qLinks = Query::buscaLinks($q);

	$page = new Page([

	]);

	$page->setTpl("busca", array(
		"q"=>$_POST['q'],
		"qProcessos"=>$qProcessos,
		"qSistemas"=>$qSistemas,
		"qLinks"=>$qLinks,
		"qFormularios"=>$qFormularios,
		"user"=>$user,
		"nomeUnidade"=>$nomeUnidade,
		"ip"=>$ip,
		"fav"=>$fav,
		"selFav"=>$selFav
	));

});

$app->get('/links/:id', function($id){

	$origem = "tb_links";
	$url = Query::getURL($origem, $id);
	$hits = Query::hits($origem, $id);
	$janela = date('Ymdhis');

	echo "
	<script>

		window.open ('$url','$janela','toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=250,height=200');

	</script>
	
	<script language='JavaScript'>
		window.location.href='../dashboard';
	</script>";

	

});

$app->get('/sistemas/:id', function($id){

	$origem = "tb_sistemas";
	$url = Query::getURL($origem, $id);
	$hits = Query::hits($origem, $id);
	$janela = date('Ymdhis');

	echo "
	<script>

		window.open ('$url','$janela','toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=250,height=200');

	</script>
	
	<script language='JavaScript'>
		window.location.href='../dashboard';
	</script>";

});

$app->get('/formularios/:id', function($id){

	$origem = "tb_formularios";
	$formulario = Query::getData($origem, $id);
	$hits = Query::hits($origem, $id);
	$nomeArquivo = $formulario[0]['nome'];
	$url = $formulario[0]['url'];
	
	//Download
	Query::download($nomeArquivo, $url);

	echo "
	<script language='JavaScript'>
		window.location.href='../dashboard';
	</script>";
	

});

$app->get('/download/:id', function($id){

	$origem = "tb_archives";
	$processo = Query::getData($origem, $id);
	$nome = $processo[0]['nome'];
	$numero = $processo[0]['numero'];
	$origem = $processo[0]['origem'];
	$numero = formataNumero($numero, $origem);
	$nomeArquivo = $origem." ".$numero." - ".$nome;
	$url = $processo[0]['url'];

	//Download
	Query::download($nomeArquivo, $url);

});

$app->post('/conteudo', function(){

	// Verifica se o usuário está logado
	User::verifyLogin();

	// Favoritos do usuário logado
	$favoritos = User::favoritos();
	$fav = $favoritos[0];

	// Permite a Edição de Favoritos
	$selFav = User::selectFavoritos();

	// Variáveis do usuário logado
	$user = $_SESSION[User::SESSION];

	// Nome da Unidade
	$nomeUnidade = User::nomeUnidade($_SESSION[User::SESSION]['lotacao']);
	
	// IP
	$ip      = $_SERVER['REMOTE_ADDR'];

	if(isset($_POST))
	{
		$origem = $_POST['origem'];
		$id     = $_POST['id'];
	}
		
	$tabela = "tb_".strtolower($origem);
	$detalhes = Query::detalhaConteudo($tabela, $id);

	$iduser = $_SESSION[User::SESSION]['iduser'];
	$status = User::verificaStatus($iduser);

	$page = new Page([

	]);

	$page->setTpl("conteudo", array(
		"user"=>$user,
		"nomeUnidade"=>$nomeUnidade,
		"ip"=>$ip,
		"fav"=>$fav,
		"selFav"=>$selFav,
		"detalhes"=>$detalhes
	));


});

$app->get('/conteudo', function(){
	
	// Verifica se o usuário está logado
	User::verifyLogin();

	// Favoritos do usuário logado
	$favoritos = User::favoritos();
	$fav = $favoritos[0];

	// Permite a Edição de Favoritos
	$selFav = User::selectFavoritos();

	// Variáveis do usuário logado
	$user = $_SESSION[User::SESSION];

	// Nome da Unidade
	$nomeUnidade = User::nomeUnidade($_SESSION[User::SESSION]['lotacao']);
	
	// IP
	$ip      = $_SERVER['REMOTE_ADDR'];
	
	// Verifica o status do usuário
	$iduser = $_SESSION[User::SESSION]['iduser'];
	$status = User::verificaStatus($iduser);

	if($status!='1')
	{
		$tpl = "conteudo-erro";
	}
	else
	{
		$tpl = "conteudo";
	}

	// Pesquisa os ícones disponíveis
	$icons = Query::getIcons();

	// Pesquisa o conteúdo cadastrado
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
	$conteudo = Query::conteudoPaginacao($page, 7);
	$max_links = 10;
	$pages = [];
	$links_laterais = ceil($max_links / 2);
	$inicio = $page - $links_laterais;
	if($inicio<1)
	{
		$inicio = 1;
	}
	$limite = $page + $links_laterais;

	for ($i = $inicio; $i <= $limite; $i++)
	{
		array_push($pages, [
			'link'=>'conteudo?page='.$i,
			'page'=>$page,
			'i'=>$i,
			'total'=>$conteudo['pages']
		]);
	}

	$page = new Page([

	]);

	$page->setTpl("$tpl", array(
		"conteudo"=>$conteudo['data'],
		"icons"=>$icons,
		"pages"=>$pages,
		"user"=>$user,
		"nomeUnidade"=>$nomeUnidade,
		"ip"=>$ip,
		"fav"=>$fav,
		"selFav"=>$selFav,
	));

});

$app->post('/conteudo/novo', function(){

	if(isset($_POST))
	{
		$nome = $_POST['nome'];
		$descricao = $_POST['descricao'];
		$origem = $_POST['origem'];
		$icone = $_POST['icon'];
		$tags = $_POST['tags'];
	}
	
	// Caso o conteúdo seja um formulário
	// Exige o preenchimento do campo FILE
	if($origem == "Formularios" && empty($_FILES['file']['name']))
	{
		echo  "<script>alert('É necessário anexar o formulário'); location.href=\"../conteudo\";</script>";
		exit;
	}

	if(!empty($_FILES['file']['name']))
 	{
		$ext = strtolower(substr($_FILES['file']['name'],-4)); //Pegando extensão do arquivo
		$url = date('Ymdhis').$ext; //Definindo um novo nome para o arquivo
		$dir = 'anexos/'; //Diretório para uploads 
		move_uploaded_file($_FILES['file']['tmp_name'], $dir.$url); //Fazer upload do arquivo
	} 
	else
	{
		$url = $_POST['url'];
	}
	
	
	
	$tabela = "tb_".strtolower($origem);

	Query::novoConteudo($tabela, $nome, $descricao, $url, $origem, $icone, $tags);

	header("Location: ../conteudo");
	exit;
});

$app->get("/excluir-conteudo/:origem/:id", function($origem, $id){

	Query::excluirConteudo($origem, $id);
	
	header("Location: ../../conteudo");
	exit;

});

$app->post("/editar-conteudo/:origem/:id", function($origem, $id){

	if(isset($_POST))
	{
		$nome = $_POST['nome'];
		$descricao = $_POST['descricao'];
		$origem = $_POST['origem'];
		$icone = $_POST['icon'];
		$tags = $_POST['tags'];
		$page = $_POST['page'];
	}
	
	// Caso seja um formulário e o arquivo ou url estejam vazios
	if($origem == "Formularios" && empty($_FILES['file']['name']) && empty($_POST['url']))
	{
		echo  "<script>alert('É necessário anexar o formulário'); location.href=\"../../conteudo?page=$page\";</script>";
		exit;
	}

	// Caso o conteúdo seja um formulário
	if(!empty($_FILES['file']['name']))
 	{
		$ext = strtolower(substr($_FILES['file']['name'],-4)); //Pegando extensão do arquivo
		$url = date('Ymdhis').$ext; //Definindo um novo nome para o arquivo
		$dir = 'anexos/'; //Diretório para uploads 
		move_uploaded_file($_FILES['file']['tmp_name'], $dir.$url); //Fazer upload do arquivo
	} 
	else
	{
		$url = $_POST['url'];
	}
	
	$tabela = "tb_".strtolower($origem);

	$update = Query::updateConteudo($id, $tabela, $nome, $descricao, $url, $origem, $icone, $tags);

	header("Location: ../../conteudo?page=$page");
	exit;

});

$app->get('/:indicador', function($indicador){
	
	// Verifica se o usuário está logado
	User::verifyLogin();

	// Favoritos do usuário logado
	$favoritos = User::favoritos();
	$fav = $favoritos[0];

	// Permite a Edição de Favoritos
	$selFav = User::selectFavoritos();

	// Variáveis do usuário logado
	$user = $_SESSION[User::SESSION];

	// Nome da Unidade
	$nomeUnidade = User::nomeUnidade($_SESSION[User::SESSION]['lotacao']);
	
	// IP
	$ip      = $_SERVER['REMOTE_ADDR'];
	
	if(isset($_GET['indicador']))
	{
		$indicador = $_GET['indicador'];
	}
	
	$ind = [];
	$valores = [];
	$data = Indicators::$indicador();
	$titulo = strtoupper($indicador);
	$ind12 = $data[$indicador.'12'];
	array_push($ind, [
		"titulo"=>$titulo,
		"indicador"=>$indicador,
		"mensal"=>$indicador."12"
	]);

	$page = new Page([

	]);

	$page->setTpl("desempenho", array(
		"ind"=>$ind,
		"valores"=>$data,
		"ind12"=>$ind12,
		"user"=>$user,		
		"ip"=>$ip,
		"fav"=>$fav,
		"selFav"=>$selFav,
		"nomeUnidade"=>$nomeUnidade		
	));

});

$app->post('/:indicador', function($indicador){
	
	// Verifica se o usuário está logado
	User::verifyLogin();

	// Favoritos do usuário logado
	$favoritos = User::favoritos();
	$fav = $favoritos[0];

	// Permite a Edição de Favoritos
	$selFav = User::selectFavoritos();

	// Variáveis do usuário logado
	$user = $_SESSION[User::SESSION];

	// Nome da Unidade
	$nomeUnidade = User::nomeUnidade($_SESSION[User::SESSION]['lotacao']);
	
	// IP
	$ip      = $_SERVER['REMOTE_ADDR'];
	
	if(isset($_POST['indicador']))
	{	
		$indicador = $_POST['indicador'];
	}

	switch($indicador)
	{
		case 'represados':
			
			Indicators::atualizaRepresados($_POST['data'], $_POST['adm'], $_POST['pm_as'], $user['lotacao']);
			header('Location: represados');
			exit;

		break;

		case 'tarefas':

			Indicators::atualizaTarefas($_POST['competencia'], $_POST['concluidas'], $_POST['pendentes'], $user['lotacao']);
			header('Location: tarefas');
			exit;

		break;

		case 'iib':

			Indicators::atualizaiib($_POST['competencia'], decimal($_POST['indice']), $user['lotacao']);
			header('Location: iib');
			exit;

		break;
		
		case 'imaGdass':

			Indicators::atualizaImaGdass($_POST['competencia'], $_POST['indicador'], $user['lotacao']);
			header('Location: imaGdass');
			exit;

		break;
	}

});

$app->run();

 ?>