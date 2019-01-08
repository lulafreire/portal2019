<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container-fluid my-2 mx-2">
    <div class="row">
        <div class="col-10 my-2">
            <h6 class="text-dark"><i class="fa fa-fw fa-hotel"></i> Unidades <small class="text-muted"> <i>Visualize e cadastre novas Unidades de Atendimento</i></small><span class="float-right"><?php echo htmlspecialchars( $registros, ENT_COMPAT, 'UTF-8', FALSE ); ?> Unidades Cadastradas</span></h6>
        </div>
        <div class="col-2">
        <button class="btn btn-success btn-sm float-right mr-3" data-toggle="modal" data-target="#modalNovaUnidade"><i class="fas fa-file"></i> Nova Unidade</button>                   
        </div>
    </div>
    <div class="row">
        <table class="table mb-1 table-sm table-hover">
        <thead>
            <tr>              
            <th>Código</th>
            <th>Nome</th>
            <th>Endereço</th>            
            <th>Telefone</th>                             
            <th class="text-center">Opções</th>
            </tr>
        </thead>
        <tbody>
            <?php $counter1=-1;  if( isset($unidades) && ( is_array($unidades) || $unidades instanceof Traversable ) && sizeof($unidades) ) foreach( $unidades as $key1 => $value1 ){ $counter1++; ?>
            <tr>            
            <td><?php echo htmlspecialchars( $value1["codigo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["endereco"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["telefone"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>            
            <td class="text-center">                                
                <a href="#" data-toggle="modal" data-target="#modalEditarUnidade-<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar </a>
                <a href="unidades/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete/<?php $counter2=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key2 => $value2 ){ $counter2++; ?><?php if( $value2["i"] == $value2["page"] ){ ?><?php echo htmlspecialchars( $value2["i"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?><?php } ?>" class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir a Unidade <?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?')"><i class="fa fa-trash"></i> Excluir</a>                
            </td>
            </tr>
            <?php } ?>
        </tbody>
        </table>
    </div>                
    <div class="row">
        <div class="col-6">
            <nav aria-label="Navegação de página exemplo" class="mt-2 mx-2">
                <ul class="pagination pagination-sm">
                    
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
<!-- Modal Nova Unidade-->
<div class="modal" id="modalNovaUnidade" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-fw fa-hotel"></i> Cadastre uma nova Unidade</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form autocomplete="off" role="form" action="unidades" method="POST" enctype="multipart/form-data">
                    <div class="container-fluid text-left">
                        <div class="row">                            
                            <div class="col-12">                                
                                <div class="row">
                                    <div class="col">
                                        <label class="mb-0" for="nome">Nome</label>
                                        <input type="text" value="" class="form-control mb-1" name="nome" id="nome" placeholder="Nome da Unidade" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="mb-0" for="codigo">Código OL</label>
                                        <input type="text" value="" class="form-control mb-1" name="codigo" id="codigo" placeholder="Código OL" required>
                                    </div>
                                    <div class="col-6">
                                        <label class="mb-0" for="telefone">Telefone</label>
                                        <input type="text" value="" class="form-control mb-0" name="telefone" id="telefone" maxlength='13' onkeypress="formatar_mascara(this, '##.####-####')" placeholder="Telefone">                                
                                    </div>
                                </div>                                
                                <div class="row">
                                    <div class="col">
                                        <label class="mb-0" for="endereco">Endereço completo</label>
                                        <input type="text" value="" class="form-control mb-1" name="endereco" id="endereco" placeholder="Endereço completo">
                                    </div>
                                </div>
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