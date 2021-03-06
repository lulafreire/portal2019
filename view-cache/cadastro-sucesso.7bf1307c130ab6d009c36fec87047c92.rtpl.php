<?php if(!class_exists('Rain\Tpl')){exit;}?>
<!doctype html>
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

    <!-- Autocomplete -->
    <style>
    * {
        box-sizing: border-box;
    }
    
   
    
    /*the container must be positioned relative:*/
    .autocomplete {
        position: relative;
        display: inline-block;
    }
    
    input {
        border: 1px solid transparent;
        background-color: #ffffff;
        padding: 10px;
        font-size: 16px;
    }
    
    input[type=text] {
        background-color: #ffffff;
        width: 100%;
    }
    
    input[type=submit] {
        background-color: DodgerBlue;
        color: #fff;
        cursor: pointer;
    }
    
    .autocomplete-items {
        position: absolute;
        border: 1px solid #d4d4d4;
        border-bottom: none;
        border-top: none;
        z-index: 99;
        /*position the autocomplete items to be the same width as the container:*/
        top: 100%;
        left: 0;
        right: 0;
    }
    
    .autocomplete-items div {
        padding: 10px;
        cursor: pointer;
        background-color: #fff; 
        border-top: 1px solid #d4d4d4;
        border-bottom: 1px solid #d4d4d4; 
    }
    
    /*when hovering an item:*/
    .autocomplete-items div:hover {
        background-color: #e9e9e9; 
    }
    
    /*when navigating through the items using the arrow keys:*/
    .autocomplete-active {
        background-color: DodgerBlue !important; 
        color: #ffffff; 
    }
    </style>

    <?php require $this->checkTemplate("mascara_data");?>


</script>

</head>

  <body class="text-center" style="background-color: #0f3d5e;">
<center>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Cadastro efetuado com sucesso!</strong> Utilize o formulário para acessar o portal.
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
<div class="modal" id="modalCadastro" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-user-plus"></i> Cadastre-se</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form autocomplete="off" role="form" action="cadastro" method="POST" enctype="multipart/form-data">
                    <div class="container-fluid text-left">
                        <div class="row">
                            <div class="col-3">
                                <img class="img-fluid" id="image-preview" src="img/users/anonimo.jpg">
                            </div>
                            <div class="col-9">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="modal-title mb-2"><i class="fas fa-camera"></i> Escolher imagem</h5></h4>
                                        <input type="file" accept="image/*" class="form-control-file" name="file" id="file">
                                        <small class="form-text text-muted">Utilize imagens com extensão JPG, com no máximo 2Mb.</small>
                                        <hr class="text-muted">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label class="mb-0" for="nome">Nome</label>
                                        <input type="text" value="" class="form-control mb-1" name="nome" id="nome" placeholder="Seu nome completo" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="mb-0" for="matricula">Matrícula</label>
                                        <input type="text" value="" class="form-control mb-1" name="matricula" id="matricula" placeholder="Matrícula" required>
                                    </div>
                                    <div class="col-6">
                                        <label class="mb-0" for="cpf">CPF</label>
                                        <input type="text" value="" class="form-control mb-1" name="cpf" id="cpf" maxlength='14' onkeypress="formatar_mascara(this, '###.###.###-##')" placeholder="CPF">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="mb-0" for="email">E-mail</label>
                                        <input type="text" value="" class="form-control mb-1" name="email" id="email" placeholder="Seu e-mail">
                                    </div>
                                    <div class="col-6">
                                        <label class="mb-0" for="cargo">Cargo</label>
                                        <select class="form-control" name="cargo" id="cargo">
                                            <option value="Técnico do Seguro Social" >Técnico do Seguro Social</option>
                                            <option value="Analista do Seguro Social" >Analista do Seguro Social</option>
                                            <option value="Médico Perito" >Médico Perito</option>
                                        </select>
                                    </div>
                                </div>            
                                <div class="row">
                                    <div class="col-6">
                                        <label class="mb-0" for="lotacao">Lotação</label>
                                        <input type="text" value="" class="form-control mb-1" name="lotacao" id="lotacao" placeholder="Código da Unidade" required>
                                    </div>
                                    <div class="col-6">
                                        <label class="mb-0" for="dt_ingresso">Data de Ingresso</label>
                                        <input type="text" value="" class="form-control mb-1" name="dt_ingresso" id="dt_ingresso" maxlength='10' onkeypress="formatar_mascara(this, '##/##/####')" placeholder="Data de Ingresso">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="mb-0" for="telefone">Telefone</label>
                                        <input type="text" value="" class="form-control mb-0" name="telefone" id="telefone" maxlength='13' onkeypress="formatar_mascara(this, '##.#####-####')" placeholder="Telefone">
                                        <small class="text-muted"><input type="checkbox" name="publicTelefone" id="publicTelefone" value="1"> Deixar oculto para outros usuários*</small>
                                    </div>
                                    <div class="col-6">
                                        <label class="mb-0" for="dt_nascimento">Data de Nascimento</label>
                                        <input type="text" value="" class="form-control mb-1" name="dt_nascimento" id="dt_nascimento" maxlength='10' onkeypress="formatar_mascara(this, '##/##/####')" placeholder="Data de Nascimento">
                                        <small class="text-muted"><input type="checkbox" name="publicDtNascimento" id="publicDtNascimento" value="1"> Deixar oculto para outros usuários*</small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label class="mb-0" for="nit">NIT</label>
                                        <input type="text" value="" class="form-control mb-1" name="nit" id="nit" placeholder="NIT/PIS/PASEP">
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col">
                                        <label class="mb-0" for="endereco">Endereço completo</label>
                                        <input type="text" value="" class="form-control mb-1" name="endereco" id="endereco" placeholder="Endereço completo">
                                    </div>
                                </div>                                
                                <div class="row">
                                    <div class="col">
                                        <label class="mb-0" for="senha">Senha</label>
                                        <input type="password" value="" class="form-control mb-1" name="senha" id="senha" placeholder="Sua senha" required>
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

<script>
function autocomplete(inp, arr) {
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    var currentFocus;
    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value;
        /*close any already open lists of autocompleted values*/
        closeAllLists();
        if (!val) { return false;}
        currentFocus = -1;
        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);
        /*for each item in the array...*/
        for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
            /*create a DIV element for each matching element:*/
            b = document.createElement("DIV");
            /*make the matching letters bold:*/
            b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
            b.innerHTML += arr[i].substr(val.length);
            /*insert a input field that will hold the current array item's value:*/
            b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
            /*execute a function when someone clicks on the item value (DIV element):*/
            b.addEventListener("click", function(e) {
                /*insert the value for the autocomplete text field:*/
                inp.value = this.getElementsByTagName("input")[0].value;
                /*close the list of autocompleted values,
                (or any other open lists of autocompleted values:*/
                closeAllLists();
            });
            a.appendChild(b);
        }
        }
    });
    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function(e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
        } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
        } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
            /*and simulate a click on the "active" item:*/
            if (x) x[currentFocus].click();
        }
        }
    });
    function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
    }
    function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
        x[i].classList.remove("autocomplete-active");
    }
    }
    function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
        if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
        }
    }
    }
    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", function (e) {
        closeAllLists(e.target);
    });
}

/*An array containing all the country names in the world:*/
var countries = [<?php $counter1=-1;  if( isset($q) && ( is_array($q) || $q instanceof Traversable ) && sizeof($q) ) foreach( $q as $key1 => $value1 ){ $counter1++; ?>"<?php echo htmlspecialchars( $value1["codigo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>-<?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>",<?php } ?>];

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("lotacao"), countries);
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