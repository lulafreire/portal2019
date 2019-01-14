<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container-fluid my-2 mx-2">
    <div class="row">
        <div class="col-10 my-2">
            <h6 class="text-dark"><i class="fa fa-fw fa-bullhorn"></i> Avisos <small class="text-muted"> <i>Cadastro e edição de avisos</i></small><span class="float-right"><?php echo htmlspecialchars( $registros, ENT_COMPAT, 'UTF-8', FALSE ); ?> Avisos Cadastrados</span></h6>
        </div>
        <div class="col-2">
        <button class="btn btn-success btn-sm float-right mr-3" data-toggle="modal" data-target="#modalNovoAviso"><i class="fas fa-file"></i> Novo Aviso</button>                   
        </div>
    </div>
    <div class="row" style="min-height: 320px;">
        <table class="table mb-1 table-sm table-hover">
        <thead>
            <tr>                          
            <th width="15%">Título</th>                      
            <th>Texto</th>                             
            <th width="15%" class="text-center">Opções</th>
            </tr>
        </thead>
        <tbody>
            <?php $counter1=-1;  if( isset($avisos) && ( is_array($avisos) || $avisos instanceof Traversable ) && sizeof($avisos) ) foreach( $avisos as $key1 => $value1 ){ $counter1++; ?>
            <tr>                        
            <td width="15%"><strong><?php echo htmlspecialchars( $value1["titulo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></td>            
            <td><?php echo htmlspecialchars( $value1["texto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                <p><small><i class="fas fa-user text-muted"></i> <?php echo htmlspecialchars( $value1["autor"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, em <?php echo converteData($value1["data"]); ?></small></p>
            </td>            
            <td width="15%" class="text-center">                                
                <a href="#" data-toggle="modal" data-target="#modalEditarAviso-<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar </a>
                <a href="admin-avisos/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete/<?php $counter2=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key2 => $value2 ){ $counter2++; ?><?php if( $value2["i"] == $value2["page"] ){ ?><?php echo htmlspecialchars( $value2["i"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?><?php } ?>" class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir este aviso?')"><i class="fa fa-trash"></i> Excluir</a>                
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
    
<!-- Modal Editar Aviso-->
<?php $counter1=-1;  if( isset($avisos) && ( is_array($avisos) || $avisos instanceof Traversable ) && sizeof($avisos) ) foreach( $avisos as $key1 => $value1 ){ $counter1++; ?>
<script>
    function limite_textarea<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>(valor) {
        quant = 280;
        total = valor.length;
        if(total <= quant) {
            resto = quant - total;
            document.getElementById('cont-<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>').innerHTML = resto;
        } else {
            document.getElementById('texto-<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>').value = valor.substr(0,quant);
        }
    }
</script>

<div class="modal" id="modalEditarAviso-<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-fw fa-bullhorn"></i> Editar Aviso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form autocomplete="off" role="form" action="admin-avisos/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php $counter2=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key2 => $value2 ){ $counter2++; ?><?php if( $value2["i"] == $value2["page"] ){ ?><?php echo htmlspecialchars( $value2["i"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?><?php } ?>" method="POST" enctype="multipart/form-data">
                    <div class="container-fluid text-left">
                        <div class="row">                            
                            <div class="col-12">                                
                                <div class="row">
                                    <div class="col">
                                        <label class="mb-0" for="titulo">Título</label>
                                        <input type="text" value="<?php echo htmlspecialchars( $value1["titulo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control mb-1" name="titulo" id="titulo" placeholder="Título do aviso" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label class="mb-0" for="codigo">Texto</label>
                                        <textarea name="texto" rows="5" class="form-control mb-1" onkeyup="limite_textarea<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>(this.value)" id="texto-<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="Digite o texto com até 300 caracteres" maxlength="280" required><?php echo htmlspecialchars( $value1["texto"], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea>
                                        <p class="text-muted"><small><span id="cont-<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo contarCaracteres($value1["texto"]); ?></span></small> caracteres restantes</p>
                                    </div>                                    
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label class="mb-0" for="url">URL</label>
                                        <input type="text" value="<?php echo htmlspecialchars( $value1["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control mb-0" name="url" id="url" placeholder="Link para mais informações">                                
                                    </div>                                                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="Atualizar"><button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                </div>                
                </form>
        </div>
    </div>
</div>
<?php } ?>

