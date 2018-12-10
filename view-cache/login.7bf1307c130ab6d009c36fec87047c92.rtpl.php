<?php if(!class_exists('Rain\Tpl')){exit;}?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Template de login, usando Bootstrap.</title>

    <!-- Principal CSS do Bootstrap -->
    <link href="node_modules/bootstrap/compiler/bootstrap.css" rel="stylesheet">

    <!-- Estilos customizados para esse template -->
    <link href="node_modules/bootstrape/compiler/signin.css" rel="stylesheet">
  </head>

  <body class="text-center" style="background-color: #0f3d5e;">
<center>
    <form class="form-signin col-4 text-light" method="post" action="acesso">
      <img class="mb-4 my-3" src="img/brasao.png">
      <h1 class="h3 mb-3 font-weight-normal text-light">Login <b>PortalAPS</b></h1>
      <label for="inputEmail" class="sr-only">Endereço de email</label>
      <input name="inputEmail" type="email" id="inputEmail" class="form-control mb-3" placeholder="Seu email" required autofocus>
      <label for="inputPassword" class="sr-only">Senha</label>
      <input type="password" id="inputPassword" class="form-control mb-3" placeholder="Senha" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Lembrar de mim
        </label>
      </div>
      <div class="row">
        <div class="col-6">
            <button name="login" id="login" class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        </div>
        <div class="col-6">
            <button name="cadastro" id="cadastro" class="btn btn-lg btn-success btn-block" type="submit">Cadastre-se</button>
        </div>
      </div>
      <p class="mt-5 mb-3 text-muted">&copy; 2019, Lula Freire</p>
    </form>
</center>
  </body>
</html>
