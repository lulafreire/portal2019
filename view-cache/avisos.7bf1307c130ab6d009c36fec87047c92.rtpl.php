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
    

        <div class="card border-muted mb-3 h-100">
            <div class="card-header bg-muted text-dark"> 
                <i class="fas fa-fw fa-bullhorn text-secondary"></i> Quadro de Avisos
            </div>
            <div class="card-body text-dark" style="min-height: 200px;">                           
                <?php $counter1=-1;  if( isset($avisos["data"]) && ( is_array($avisos["data"]) || $avisos["data"] instanceof Traversable ) && sizeof($avisos["data"]) ) foreach( $avisos["data"] as $key1 => $value1 ){ $counter1++; ?>                        
                <h5 class="card-title"><?php echo htmlspecialchars( $value1["titulo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h5>
                <p class="mb-0"><?php echo htmlspecialchars( $value1["texto"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php if( $value1["url"]!='' ){ ?><a href="<?php echo htmlspecialchars( $value1["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="text-primary link">[ + ]</a><?php } ?></p>                                                                                
            </div>
            <div class="card-footer bg-muted border-muted text-muted text-light p-0">
                <div class="row">
                    <div class="col-8">
                        <small class="text-muted align-text-middle ml-2"><i class="far fa-calendar-alt"></i> <?php echo converteData($value1["data"]); ?> <i class="fas fa-user"></i> <?php echo htmlspecialchars( $value1["autor"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </small>
                    </div>
                    <?php } ?>
                    <div class="col-4">
                        <nav class="navbar">
                            <ul class="pagination pagination-sm mb-0">
                                
                                <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>
                                <?php if( $value1["i"] == $value1["page"] ){ ?>
                                <li class="page-item active"><a class="page-link" href="<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                                <?php }else{ ?>
                                    <?php if( $value1["i"] >= 1 && $value1["i"] <= $value1["total"] ){ ?>
                                    <li class="page-item"><a class="page-link" href="<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["i"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                                    <?php } ?>
                                <?php } ?>                        
                                <?php } ?>            
                            </ul>                                    
                        </nav>
                    </div>
                </div>                            
            </div>
        </div>
