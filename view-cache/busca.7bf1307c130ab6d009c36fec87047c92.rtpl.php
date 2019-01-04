<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container-fluid">
       
    <h5 class="mt-2"><i class="fas fa-search"></i> Resultado da busca por <strong><font class="text-primary"><?php echo htmlspecialchars( $q, ENT_COMPAT, 'UTF-8', FALSE ); ?></font></strong></h5>        

    <div class="row">
        <div class="col-6 mx-0">
           
                <div class="card border-warning mb-3" style="height: 390px;">
                    <div class="card-header bg-warning text-light"> <i class="fas fa-folder-open"></i> Processos Administrativos</div>
                        <div class="card-body text-dark">
                            <?php if( !$qProcessos ){ ?>
                                <p class="text-muted text-center">Nenhum processo administrativo localizado com o termo <strong><?php echo htmlspecialchars( $q, ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></p>                    
                            <?php }else{ ?>  
                                <table class="table">
                                <thead>
                                    <tr>                        
                                    <th scope="col">Número</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Origem</th>
                                    <th scope="col">Caixa</th>
                                    <th scope="col"><i class="fas fa-file-download"></i></th>
                                    <th scope="col"><i class="fas fa-file-alt"></i></th>
                                    </tr>
                                </thead>
                                <tbody>                                    
                                    <?php $counter1=-1;  if( isset($qProcessos) && ( is_array($qProcessos) || $qProcessos instanceof Traversable ) && sizeof($qProcessos) ) foreach( $qProcessos as $key1 => $value1 ){ $counter1++; ?>
                                        <tr>
                                        <td><small><?php echo formataNumero($value1["numero"], $value1["origem"]); ?></small></td>
                                        <td><small><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></small></td>
                                        <td><small><?php echo htmlspecialchars( $value1["origem"], ENT_COMPAT, 'UTF-8', FALSE ); ?></small></td>
                                        <td><small><?php echo htmlspecialchars( $value1["caixa"], ENT_COMPAT, 'UTF-8', FALSE ); ?></small></td>
                                        <td><a class="fas fa-file-download text-secondary text-center" title="Download" href="download/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></a></td>
                                        <td><a class="fas fa-file-alt text-secondary text-center" title="Detalhar" href="detalhar-arquivo/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></td>
                                        </tr>
                                    <?php } ?>                                                                
                                </tbody>
                                </table>
                            <?php } ?>
                        </div>
                </div>
                
        </div>
        <div class="col-2 mx-0">
           
            <div class="card border-primary mb-3" style="height: 390px;">
                <div class="card-header bg-primary text-light"> 
                    <i class="fas fa-desktop"></i> Sistemas
                </div>
                <div class="card-body text-dark">                       
                    <?php if( !$qSistemas ){ ?>
                        <p class="text-muted text-center">Nenhum sistema localizado com o termo <strong><?php echo htmlspecialchars( $q, ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></p>                    
                    <?php }else{ ?>    
                    <?php $counter1=-1;  if( isset($qSistemas) && ( is_array($qSistemas) || $qSistemas instanceof Traversable ) && sizeof($qSistemas) ) foreach( $qSistemas as $key1 => $value1 ){ $counter1++; ?>
                        <small><i class="fas fa-desktop text-primary"></i>&nbsp;&nbsp;<a class="text-primary link" title="<?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" href="sistemas/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></small>
                        <hr class="my-1 text-secondary">
                    <?php } ?>
                    <?php } ?>            
                        
                </div>
            </div>

        </div>
        <div class="col-2 mx-0">

            <div class="card border-success mb-3" style="height: 390px;">
                <div class="card-header bg-success text-light"> <i class="fas fa-mouse-pointer"></i> Links</div>
                    <div class="card-body text-dark">
                        <?php if( !$qLinks ){ ?>
                            <p class="text-muted text-center">Nenhum link localizado com o termo <strong><?php echo htmlspecialchars( $q, ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></p>                    
                        <?php }else{ ?>    
                        <?php $counter1=-1;  if( isset($qLinks) && ( is_array($qLinks) || $qLinks instanceof Traversable ) && sizeof($qLinks) ) foreach( $qLinks as $key1 => $value1 ){ $counter1++; ?>
                            <small><i class="fas fa-mouse-pointer text-success"></i>&nbsp;&nbsp;<a class="text-success link" title="<?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" href="links/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></small>
                            <hr class="my-1 text-secondary">
                        <?php } ?> 
                        <?php } ?>
                    </div>
            </div>

        </div>
        <div class="col-2 mx-0">
           
            <div class="card border-info mb-3" style="height: 390px;">
                <div class="card-header bg-info text-light"> <i class="far fa-file-alt"></i> Formulários</div>
                    <div class="card-body text-dark">
                        <?php if( !$qFormularios ){ ?>
                            <p class="text-muted text-center">Nenhum formulário localizado com o termo <strong><?php echo htmlspecialchars( $q, ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></p>                    
                        <?php }else{ ?>  
                        <?php $counter1=-1;  if( isset($qFormularios) && ( is_array($qFormularios) || $qFormularios instanceof Traversable ) && sizeof($qFormularios) ) foreach( $qFormularios as $key1 => $value1 ){ $counter1++; ?>
                            <small><i class="far fa-file-alt text-info"></i>&nbsp;&nbsp;<a class="text-info link" title="<?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" href="formularios/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></small>
                            <hr class="my-1 text-secondary">
                        <?php } ?>
                        <?php } ?>
                    </div>
            </div>

        </div>
    </div>
</div>