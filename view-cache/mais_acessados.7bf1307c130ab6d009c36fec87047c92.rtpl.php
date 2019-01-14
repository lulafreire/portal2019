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
    <div class="card-header bg-muted text-dark shadow"> 
        <i class="fas fa-plus text-secondary"></i> <?php echo htmlspecialchars( $origem, ENT_COMPAT, 'UTF-8', FALSE ); ?> Mais Acessados
    </div>
    <div class="card-body text-dark" style="min-height: 200px;">                           
        <?php $counter1=-1;  if( isset($maisAcessados) && ( is_array($maisAcessados) || $maisAcessados instanceof Traversable ) && sizeof($maisAcessados) ) foreach( $maisAcessados as $key1 => $value1 ){ $counter1++; ?>
            <a class="text-dark link" title="<?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" href="<?php echo minusculas($value1["origem"]); ?>/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
            <hr class="mb-1 mt-0" style="border: 0.5px dashed rgb(231, 228, 228);">
        <?php } ?>
    </div>
    <div class="card-footer bg-muted border-muted text-muted text-light p-1">
        <a class="btn btn-secondary btn-sm mt-2 mr-2 ml-2" href="mais_acessados?origem=Sistemas">Sistemas</a><a class="btn btn-secondary btn-sm mt-2 mr-2" href="mais_acessados?origem=Links">Links</a><a class="btn btn-secondary btn-sm mt-2" href="mais_acessados?origem=Formularios">Formulários</a>
    </div>                        
</div> 



