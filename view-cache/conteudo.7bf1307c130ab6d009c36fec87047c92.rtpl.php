<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container-fluid my-2 mx-2">
    <div class="row">
        <div class="col-6 my-2">
            <h6 class="text-dark"><i class="fas fa-desktop"></i> Gerenciar Conteúdo <small class="text-muted"> <i>Cadastrar, editar e excluir formulários, sistemas e links</i></small></h6>
        </div>
        <div class="col-6">
            <button class="btn btn-success btn-sm float-right mr-3" data-toggle="modal" data-target="#modalNovoConteudo"><i class="fas fa-file"></i> Novo</button>                   
        </div>
    </div>
    <div class="row">
        <table class="table mb-1 table-sm table-hover">
        <thead>
            <tr>
                <th scope="col" class="text-center">#</th>                        
                <th scope="col">Nome</th>
                <th scope="col">Descrição</th>
                <th scope="col">Origem</th>
                <th scope="col">URL/Anexo</th>
                <th scope="col" class="text-center">OPÇÕES</th>                        
            </tr>
        </thead>
        <tbody>                                    
            <?php $counter1=-1;  if( isset($conteudo) && ( is_array($conteudo) || $conteudo instanceof Traversable ) && sizeof($conteudo) ) foreach( $conteudo as $key1 => $value1 ){ $counter1++; ?>
                <tr>
                    <td class="text-center"><i class="<?php echo htmlspecialchars( $value1["icone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="font-size: 20px;"></i></td>
                    <td><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["origem"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td class="text-center"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detalhar<?php echo htmlspecialchars( $value1["origem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>-<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class="far fa-edit"></i> Editar</button>&nbsp;&nbsp;<a href="excluir-conteudo/<?php echo htmlspecialchars( $value1["origem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> Excluir</i></a></td>
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
       

<!-- Modal Novo Conteudo -->
<div class="modal" id="modalNovoConteudo" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-file"></i> Novo Conteúdo</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    
                    <form action='conteudo/novo' method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-7">
                                <div class="form-group">
                                    <label for="nome">Título do Conteúdo</label>
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Título">
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="origem">Tipo de Conteúdo</label>
                                    <select name="origem" class="form-control">
                                        <option value="Links">Link Externo</option>
                                        <option value="Formularios">Formulário</option>
                                        <option value="Sistemas">Sistema Corporativo</option>
                                    </select>
                                </div>
                            </div>                            
                        </div>                        
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição suscinta do conteúdo">
                        </div>
                        <div class="form-group">
                            <label for="descricao">Tags</label>
                            <input type="text" class="form-control" id="tags" name="tags" placeholder="Palavras-chave relacionadas ao conteúdo">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="descricao">URL (Sistema ou Links Externo)</label>
                                    <input type="text" class="form-control" id="url" name="url" placeholder="Endereço do link ou sistema corporativo">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="descricao">Anexo (Formulário)</label>
                                    <input type="file" class="form-control-file" name="file" id="file">
                                </div>
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                <hr class="text-muted my-1">
                                <span class="text-muted">Escolha um ícone para representar o conteúdo</span>
                                <hr class="text-muted my-1">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group form-inline">
                                    <?php $counter1=-1;  if( isset($icons) && ( is_array($icons) || $icons instanceof Traversable ) && sizeof($icons) ) foreach( $icons as $key1 => $value1 ){ $counter1++; ?>
                                    <div class="col mx-1 my-1 text-center border">
                                        <div class="row text-center">
                                            <a title="<?php echo htmlspecialchars( $value1["class"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class="<?php echo htmlspecialchars( $value1["class"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i></a>
                                        </div>
                                        <div class="row text-center">
                                            <input type="radio" class="form-control text-center" id="icon" name="icon" value="<?php echo htmlspecialchars( $value1["class"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                        </div>            
                                    </div>                                    
                                    <?php } ?>
                                </div>                                                               
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success mx-2" value="Gravar"><button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            </div></form>
        </div>
    </div>
</div>

<!-- Modal Detalhar / Editar conteúdo -->
<?php $counter1=-1;  if( isset($conteudo) && ( is_array($conteudo) || $conteudo instanceof Traversable ) && sizeof($conteudo) ) foreach( $conteudo as $key1 => $value1 ){ $counter1++; ?>
<div class="modal" id="detalhar<?php echo htmlspecialchars( $value1["origem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>-<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-edit"></i> Editar Conteúdo</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">                    
                    <form action='editar-conteudo/<?php echo htmlspecialchars( $value1["origem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>' method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-7">
                                <div class="form-group">
                                    <label for="nome">Título do Conteúdo</label>
                                    <input type="text" value="<?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control" id="nome" name="nome" placeholder="Título">
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="origem">Tipo de Conteúdo</label>
                                    <select name="origem" class="form-control">
                                        <option value="Links" <?php if( $value1["origem"]=='Links' ){ ?> selected <?php } ?>>Link Externo</option>
                                        <option value="Formularios" <?php if( $value1["origem"]=='Formularios' ){ ?> selected <?php } ?>>Formulário</option>
                                        <option value="Sistemas" <?php if( $value1["origem"]=='Sistemas' ){ ?> selected <?php } ?>>Sistema Corporativo</option>
                                    </select>
                                </div>
                            </div>                            
                        </div>                        
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <input type="text" value="<?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control" id="descricao" name="descricao" placeholder="Descrição suscinta do conteúdo">
                        </div>
                        <div class="form-group">
                            <label for="descricao">Tags</label>
                            <input type="text" value="<?php echo htmlspecialchars( $value1["tags"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control" id="tags" name="tags" placeholder="Palavras-chave relacionadas ao conteúdo">
                        </div>
                        <div class="form-group">
                            <label for="descricao">URL/Anexo</label>
                            <input type="text" value="<?php echo htmlspecialchars( $value1["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control" id="url" name="url" placeholder="Endereço do link ou sistema corporativo">
                        </div>
                        <div class="form-group">
                            <label for="descricao">Substituir Anexo (Formulário)</label>
                            <input type="file" class="form-control-file" name="file" id="file">
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                <hr class="text-muted my-1">
                                <span class="text-muted"></i>Escolha um ícone para representar o conteúdo</span>
                                <hr class="text-muted my-1">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group form-inline">
                                    <div class="col mx-1 my-1 text-center border">
                                        <div class="row text-center">
                                            <a title="<?php echo htmlspecialchars( $value1["icone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class="<?php echo htmlspecialchars( $value1["icone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i></a>
                                        </div>
                                        <div class="row text-center">
                                            <input type="radio" class="form-control text-center" id="icon" name="icon" value="<?php echo htmlspecialchars( $value1["icone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" checked>
                                        </div>            
                                    </div>
                                    <?php $counter2=-1;  if( isset($icons) && ( is_array($icons) || $icons instanceof Traversable ) && sizeof($icons) ) foreach( $icons as $key2 => $value2 ){ $counter2++; ?>
                                    <div class="col mx-1 my-1 text-center border">
                                        <div class="row text-center">
                                            <a title="<?php echo htmlspecialchars( $value2["class"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class="<?php echo htmlspecialchars( $value2["class"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i></a>
                                        </div>
                                        <div class="row text-center">
                                            <input type="radio" class="form-control text-center" id="icon" name="icon" value="<?php echo htmlspecialchars( $value2["class"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                        </div>            
                                    </div>                                    
                                    <?php } ?>
                                </div>                                                               
                            </div>
                        </div>                    
                    </div>
                </div>
            <div class="modal-footer">
                <?php $counter2=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key2 => $value2 ){ $counter2++; ?>
                <input type="hidden" name="page" value="<?php echo htmlspecialchars( $value2["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                <?php } ?>
                <input type="submit" class="btn btn-success mx-2" value="Gravar"><button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            </div></form>
        </div>
    </div>
</div>
<?php } ?>