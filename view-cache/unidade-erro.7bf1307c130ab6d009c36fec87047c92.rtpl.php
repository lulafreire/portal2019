<?php if(!class_exists('Rain\Tpl')){exit;}?><!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>PortalAPS:Login</title>

    <!-- Principal CSS do Bootstrap -->
    <link href="node_modules/bootstrap/compiler/bootstrap.css" rel="stylesheet">

    <!-- Fonts Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!-- Estilos customizados para esse template -->
    <link href="node_modules/bootstrape/compiler/signin.css" rel="stylesheet">

    <?php require $this->checkTemplate("mascara_data");?>

</head>

  <body class="text-center" style="background-color: #0f3d5e;">
<center>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Sua unidade ainda não foi cadastrada no Portal<strong>APS</strong>.</strong> Solicite o cadastro ao administrador do sistema.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>

    <form class="form-signin col-4 text-light" method="post" action="acesso">
      <img class="mb-4 my-3" src="img/brasao.png">
      <h1 class="h3 mb-3 font-weight-normal text-light">Login <b>PortalAPS</b></h1>
      <label for="matricula" class="sr-only">Matrícula</label>
      <input name="matricula" type="text" class="form-control mb-3" placeholder="Sua matrícula" required autofocus>
      <label for="password" class="sr-only">Senha</label>
      <input name="password" type="password" class="form-control mb-3" placeholder="Senha" required>
      <a href="recuperar-senha"><span class="text-light link mb-3">Recuperar senha.</span></a>
      <div class="row">
        <div class="col-6 mt-2">
            <button name="login" id="login" class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        </div>
      </form>
        <div class="col-6 mt-2">
            <button data-toggle="modal" data-target="#modalCadastro" name="cadastro" id="cadastro" class="btn btn-lg btn-success btn-block" type="button">Cadastre-se</button>
        </div>
      </div>
      <p class="mt-3 mb-3 text-muted">&copy; 2019, Lula Freire (luiz.aoliveira)</p>
</center>

<!-- Modal Cadastre-se -->
<div class="modal" id="modalCadastro">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-user-plus"></i> Cadastre-se</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="cadastro" method="POST">
                    <div class="container-fluid text-left">
                        <div class="row">
                            <div class="col-3">
                                <img class="img-fluid" id="image-preview" src="img/users/anonimo.jpg">
                            </div>
                            <div class="col-9">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="modal-title mb-2"><i class="fas fa-camera"></i> Escolher imagem</h5></h4>
                                        <input type="file" class="form-control-file" id="file">
                                        <small class="form-text text-muted">Utilize imagens com extensão JPG, com no máximo 2Mb.</small>
                                        <hr class="text-muted">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label class="mb-0" for="nome">Nome</label>
                                        <input type="text" value="" class="form-control mb-1" name="nome" id="nome" placeholder="Seu nome completo">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="mb-0" for="matricula">Matrícula</label>
                                        <input type="text" value="" class="form-control mb-1" name="matricula" id="matricula" placeholder="Matrícula">
                                    </div>
                                    <div class="col-6">
                                        <label class="mb-0" for="cpf">CPF</label>
                                        <input type="text" value="" class="form-control mb-1" id="cpf" maxlength='14' onkeypress="formatar_mascara(this, '###.###.###-##')" placeholder="CPF">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="mb-0" for="email">E-mail</label>
                                        <input type="text" value="" class="form-control mb-1" id="email" placeholder="Seu e-mail">
                                    </div>
                                    <div class="col-6">
                                        <label class="mb-0" for="cargo">Cargo</label>
                                        <select class="form-control" id="cargo">
                                            <option value="Técnico do Seguro Social" >Técnico do Seguro Social</option>
                                            <option value="Analista do Seguro Social" >Analista do Seguro Social</option>
                                            <option value="Médico Perito" >Médico Perito</option>
                                        </select>
                                    </div>
                                </div>            
                                <div class="row">
                                    <div class="col-6">
                                        <label class="mb-0" for="lotacao">Lotação</label>
                                        <input type="text" value="" class="form-control mb-1" id="lotacao" placeholder="Código da Unidade">
                                    </div>
                                    <div class="col-6">
                                        <label class="mb-0" for="dtIngresso">Data de Ingresso</label>
                                        <input type="text" value="" class="form-control mb-1" id="dtIngresso" maxlength='10' onkeypress="formatar_mascara(this, '##/##/####')" placeholder="Data de Ingresso">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="mb-0" for="telefone">Telefone</label>
                                        <input type="text" value="" class="form-control mb-0" id="telefone" maxlength='13' onkeypress="formatar_mascara(this, '##.#####-####')" placeholder="Telefone">
                                        <small class="text-muted"><input type="checkbox" id="publicTelefone"> Deixar oculto para outros usuários*</small>
                                    </div>
                                    <div class="col-6">
                                        <label class="mb-0" for="dtNascimento">Data de Nascimento</label>
                                        <input type="text" value="" class="form-control mb-1" id="dtNascimento" maxlength='10' onkeypress="formatar_mascara(this, '##/##/####')" placeholder="Data de Nascimento">
                                        <small class="text-muted"><input type="checkbox" id="publicDtNascimento"> Deixar oculto para outros usuários*</small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label class="mb-0" for="endereco">Endereço completo</label>
                                        <input type="text" value="" class="form-control mb-1" id="endereco" placeholder="Endereço completo">
                                    </div>
                                </div>                                
                                <div class="row">
                                    <div class="col">
                                        <label class="mb-0" for="senha">Senha</label>
                                        <input type="password" value="" class="form-control mb-1" id="senha" placeholder="Sua senha">
                                    </div>
                                </div>
                                <hr class="text-muted mb-0">
                                <small class="text-muted"><i>(*) Apenas usuários com perfil de gestor visualizarão os dados ocultos.</i></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="Cadastrar"><button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                </div>
                
                </form>
        </div>
    </div>
</div>
<script>
    document.querySelector('#file').addEventListener('change', function(){
      
      var file = new FileReader();
    
      file.onload = function() {
        
        document.querySelector('#image-preview').src = file.result;
    
      }
    
      file.readAsDataURL(this.files[0]);
    
    });
</script>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="js/main.js"></script>

    <script src="js/app.js"></script>
    <script src="js/app.min.js"></script>
    <script src="js/demo.js"></script>
</body>
</html>