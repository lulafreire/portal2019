<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Limpeza de chache -->
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1997 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css">
    <link rel="stylesheet" href="node_modules/bootstrap/compiler/style.css">

    <!-- Calendar.css -->
    <link rel="stylesheet" href="css/calendar.css">
    
    <!-- Fonts Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/fontawesome-free-5.6.3-web/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/fontawesome-free-5.6.3-web/css/all.css">

    <!-- Charts.js -->
    <script src="node_modules/chart.js/dist/Chart.min.js"></script>
  
    <title>PortalAPS</title>

    <!-- Abertura dos aplicativos em abas próprias -->
    <script>
    function abreArquivos() {
        window.open ('http://10.48.124.182/arquivos','Arquivos','toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=250,height=200');
    }
    </script>

    <script>
    function abreEntidades() {
        window.open ('http://10.48.124.182/entidades','Entidades','toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=250,height=200');
    }
    </script>

    <script>
    function abreExpediente() {
        window.open ('http://10.48.124.182/expediente','Expediente','toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=250,height=200');
    }
    </script>

    <script>
    function abreFazendas() {
        window.open ('http://10.48.124.182/fazendas','Fazendas','toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=250,height=200');
    }
    </script>

    <script>
    function abreRepresados() {
        window.open ('http://10.48.124.182/represados','Represados','toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=250,height=200');
    }
    </script>

    <script>
    function abreMob() {
        window.open ('http://10.48.124.182/mob','MOB','toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=250,height=200');
    }
    </script>

  </head>
  <body>

    <!-- Menu do topo com links e data -->
    <nav class="navbar p-0 navbar-expand-lg navbar-light" style="background-color: #adc8e6cb">
        <div class="navbar-collapse" id="menu-top">
            <ul class="navbar-nav">
                <li class="nav-item ml-2">
                    <small><a href="http://www-gexjuaz/" class="nav-link">GEX Juazeiro</a></small>
                </li>

                <li class="nav-item">
                    <small><a href="http://www-srnordeste/" class="nav-link">SR Nordeste</a></small>
                </li>

                <li class="nav-item ml-2">
                    <small><a href="http://www-inss/" class="nav-link">INSS Intraprev</a></small>
                </li>                  

                <li class="nav-item ml-2">
                    <small><a href="http://www.inss.gov.br/" class="nav-link">INSS Internet</a></small>
                </li>
            
                <li class="nav-item ml-2">
                        <small><a href="http://www-mds.gov.br" class="nav-link">MDS</a></small>
                </li>

                <li class="nav-item ml-2">
                        <small><a href="https://www.inss.gov.br/ouvidoria/" class="nav-link">Ouvidoria</a></small>
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
                    
                    <a class="nav-link" href="dashboard"><i class="fas fa-home"></i> Início</a>
                </li>
                
                <li class="nav-item">
                    
                    <a class="nav-link" href="equipe"><i class="fas fa-users"></i> Equipe</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fab fa-medapps"></i> Aplicativos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="arquivos"><i class="fas fa-folder-open"></i> Arquivos</a>
                        <a class="dropdown-item" href="desempenho"><i class="fas fa-chart-line"></i> Desempenho</a>
                        <a class="dropdown-item" href="javascript:abreEntidades();"><i class="fas fa-building"></i> Entidades</a>
                        <a class="dropdown-item" href="javascript:abreExpediente();"><i class="fas fa-file-alt"></i> Expediente</a>
                        <a class="dropdown-item" href="javascript:abreFazendas();"><i class="fas fa-tractor"></i> Fazendas</a>
                        <a class="dropdown-item" href="javascript:abreRepresados();"><i class="fas fa-box-open"></i> Represados</a>
                        <a class="dropdown-item" href="javascript:abreMob();"><i class="fas fa-search"></i> MOB</a>
                    </div>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-cog"></i> Gestão
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="conteudo"><i class="fas fa-desktop"></i> Conteúdo</a>
                        <a class="dropdown-item" href="unidades"><i class="fa fa-fw fa-hotel"></i> Unidades</a>
                        <a class="dropdown-item" href="admin-avisos"><i class="fa fa-fw fa-bullhorn"></i> Avisos</a>
                    </div>
                </li>

                <li class="nav-item">                    
                    <a class="nav-link" href="inssdigital"><i class="fas fa-cloud-download-alt"></i> INSS Digital</a>
                </li>
                
            </ul>

            <!-- Busca -->            
            <div class="ui-widget"></div>
                <form class="form-inline ml-auto" action="arquivos" method="POST">
                    <input id="q" size="60" name="q" type="search" class="form-control ml-2 mr-2" placeholder="Pesquisar Processos">
                    <button class="btn btn-warning" type="submit">Ok</button>        
                </form>
            </div>
        </div>

    </nav>

    <?php require $this->checkTemplate("mascara_data");?>