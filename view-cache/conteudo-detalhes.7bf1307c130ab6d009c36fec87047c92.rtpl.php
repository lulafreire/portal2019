<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container-fluid">

    <div class="row mt-2">
        <div class="col-8 mx-0">            
            <div class="card border-warning mb-3" style="height: 410px;">
                <div class="card-header bg-warning text-light"> <i class="fas fa-desktop"></i> 
                    Conteúdo
                </div>
                <div class="card-body text-dark">
                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>                        
                        <th scope="col">Nome</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Origem</th>
                        <th scope="col"><i class="far fa-file-alt"></i></th>
                        <th scope="col"><i class="far fa-trash-alt"></i></th>
                        </tr>
                    </thead>
                    <tbody>                                    
                        <?php $counter1=-1;  if( isset($selFav) && ( is_array($selFav) || $selFav instanceof Traversable ) && sizeof($selFav) ) foreach( $selFav as $key1 => $value1 ){ $counter1++; ?>
                            <tr>
                            <td><i class="<?php echo htmlspecialchars( $value1["icone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i></td>
                            <td><small><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></small></td>
                            <td><small><?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></small></td>
                            <td><small><?php echo htmlspecialchars( $value1["origem"], ENT_COMPAT, 'UTF-8', FALSE ); ?></small></td>
                            <td><a class="far fa-file-alt text-secondary text-center" title="Detalhar/Editar" href="conteudo/<?php echo htmlspecialchars( $value1["origem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></a></td>
                            <td><a class="far fa-trash-alt text-secondary text-center" title="Excluir" href="detalhar-arquivo/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></td>
                            </tr>
                        <?php } ?>                                                                
                    </tbody>
                    </table>
                    
                </div>
            </div>            
        </div>
       
        <div class="col-4 mx-0">            
            <div class="card border-info mb-3" style="height: 410px;">
                <div class="card-header bg-info text-light"> <i class="fas fa-file-alt"></i> 
                    Detalhes
                </div>
                <div class="card-body text-dark">
                    Form Detalhes
                </div>
            </div>            
        </div>
        
    </div>
</div>