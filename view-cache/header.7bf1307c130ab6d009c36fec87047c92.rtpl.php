<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css">
    <link rel="stylesheet" href="node_modules/bootstrap/compiler/style.css">

    <!-- Fonts Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!-- Charts.js -->
    <script src="node_modules/chart.js/dist/Chart.min.js"></script>

    <!-- Autocomplete -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- Clip CSS -->
    <link rel="stylesheet" href="css/clip.css">
   
    <title>PortalAPS</title>
  </head>
  <body>

    <!-- Menu do topo com links e data -->
    <nav class="navbar p-0 navbar-expand-lg navbar-light" style="background-color: #adc8e6cb">
        <div class="navbar-collapse" id="menu-top">
            <ul class="navbar-nav">
                <li class="nav-item ml-3">
                    <small><a href="www-inss" class="nav-link">INSS</a></small>
                </li>

                <li class="nav-item">
                        <small><a href="www-inss" class="nav-link">SR Nordeste</a></small>
                </li>  

                <li class="nav-item">
                        <small><a href="www-inss" class="nav-link">MDS</a></small>
                </li>

                <li class="nav-item">
                        <small><a href="www-inss" class="nav-link">Ouvidoria</a></small>
                </li>

            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <small><a class="nav-link disabled mr-3" href="#"><i class="far fa-calendar-alt"></i> Hoje é <b><?php echo diaDaSemana('Y-m-d'); ?></b></a></small>
                </li>
            </ul>
        </div>
    </nav>
    
    <!-- Navbar Principal -->
    <nav class="navbar fixed navbar-expand-lg navbar-dark" style="background-color: #0f3d5e;">

        <a class="navbar-brand h1 mb-0" href="dashboard"><img src="img/logo.png" valign="middle" alt="">PortalAPS</a>
        
        <!-- Botão para recolher a navbar -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Conteúdo da navbar -->
        <div class="collapse navbar-collapse" id="navbarSite">
            <ul class="navbar-nav">
                
                <li class="nav-item">
                    
                    <a class="nav-link" href="equipe"><i class="fas fa-users"></i> Equipe</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="arquivos"><i class="fas fa-folder-open"></i> Arquivos</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fab fa-medapps"></i> Aplicativos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="expediente"><i class="fas fa-file-alt"></i> Expediente</a>
                        <a class="dropdown-item" href="mob"><i class="fas fa-search"></i> MOB</a>
                        <a class="dropdown-item" href="entidades"><i class="fas fa-building"></i> Entidades</a>
                        <a class="dropdown-item" href="fazendas"><i class="fas fa-tractor"></i> Fazendas</a>
                        <a class="dropdown-item" href="desempenho"><i class="fas fa-chart-line"></i> Desempenho</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="conteudo"><i class="fas fa-desktop"></i> Gerenciar Conteúdo</a>
                </li>

            </ul>

            <!-- Busca -->            
            <div class="ui-widget"></div>
                <form class="form-inline ml-auto" action="busca" method="POST">
                    <input id="q" size="60" name="q" type="search" class="form-control ml-2 mr-2" placeholder="Pesquisar Sistemas, Links, Formulários e Processos">
                    <button class="btn btn-warning" type="submit">Ok</button>
                </form>
            </div>
        </div>

    </nav>

    <?php require $this->checkTemplate("mascara_data");?>