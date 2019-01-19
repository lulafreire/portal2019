<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container-fluid my-2 mx-2">
    <div class="row">
        <div class="col-11 my-2">
            <h6 class="text-dark"><i class="fas fa-box-open"></i> Arquivos <small class="text-muted"> <i>Disponibiliza os processos arquivados</i></small><span class="float-right"><?php echo htmlspecialchars( $registros, ENT_COMPAT, 'UTF-8', FALSE ); ?> Processos Cadastrados</span></h6>
        </div>
        <div class="col-1">
        <?php if( $user["status"]==1 OR $user["status"]==3 ){ ?><button class="btn btn-success btn-sm float-right mr-3" data-toggle="modal" data-target="#modalNovoArquivo"><i class="fas fa-file"></i> Novo</button><?php } ?>                   
        </div>
    </div>
    <div class="row" style="min-height: 320px;">
        <table class="table mb-1 table-sm table-hover">
        <thead>
            <tr>              
            <th>Número</th>
            <th>Titular</th>
            <th class="text-center">Origem</th>
            <th class="text-center">Caixa</th>
            <th class="text-center">Cadastrado em</th>
            <th class="text-center">Atualizado em</th>             
            <th class="text-center">Opções</th>
            </tr>
        </thead>
        <tbody>
            <?php $counter1=-1;  if( isset($arquivos["data"]) && ( is_array($arquivos["data"]) || $arquivos["data"] instanceof Traversable ) && sizeof($arquivos["data"]) ) foreach( $arquivos["data"] as $key1 => $value1 ){ $counter1++; ?>
            <tr>    
            <td><?php echo formataNumero($value1["numero"], $value1["origem"]); ?></td>
            <td><?php echo htmlspecialchars( $value1["titular"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>            
            <td class="text-center"><?php echo htmlspecialchars( $value1["origem"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td class="text-center"><?php echo htmlspecialchars( $value1["caixa"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td class="text-center"><?php echo converteData($value1["dt_cadastro"]); ?></td>
            <td class="text-center"><?php echo converteData($value1["dt_atualizacao"]); ?></td>
            <td class="text-center">
                <a href="download/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-toggle="tooltip" data-placement="top" title="Baixar o anexo principal com <?php echo htmlspecialchars( $value1["tam"], ENT_COMPAT, 'UTF-8', FALSE ); ?> Mb. Para baixar outros anexos, detalhe o registro." class="btn btn-secondary btn-sm <?php if( $value1["url"]=='' ){ ?>disabled<?php } ?>"><i class="fas fa-download"></i> Baixar </a>
                <a href="#" data-toggle="modal" data-target="#modalDetalhaArquivo-<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-info btn-sm"><i class="fas fa-asterisk"></i> Detalhar </a>
                <?php if( $user["status"]==1 or $user["status"]==3 ){ ?>
                <a href="#" data-toggle="modal" data-target="#modalEditarArquivo-<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar </a>
                <a href="arquivos/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete/<?php $counter2=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key2 => $value2 ){ $counter2++; ?><?php if( $value2["i"] == $value2["page"] ){ ?><?php echo htmlspecialchars( $value2["i"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?><?php } ?>" class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir <?php echo htmlspecialchars( $value1["titular"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?')"><i class="fa fa-trash"></i> Excluir</a>
                <?php } ?>
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
<!-- Modal Novo Arquivo-->
<div class="modal" id="modalNovoArquivo" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-box-open"></i> Cadastre um novo Processo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <span>&times;</span>
                </button>
            </div>
            <form autocomplete="off" role="form" action="novo-arquivo" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="numero" class="mb-0">Número do Processo</label>
                                <input type="text" class="form-control mb-1" id="numero" name="numero" placeholder="Número do processo" required>
                            </div>
                            <div class="col-6">
                                <label for="numero" class="mb-0">Nome do Titular</label>
                                <input type="text" class="form-control mb-1" id="titular" name="titular" placeholder="Nome do titular" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="instituidor" class="mb-0">Instituidor</label>
                                <input type="text" class="form-control mb-1" id="instituidor" name="instituidor" placeholder="Nome do Instituidor">
                            </div>
                            <div class="col-6">
                                <label for="representante" class="mb-0">Representante Legal</label>
                                <input type="text" class="form-control mb-1" id="representante" name="representante" placeholder="Nome do RL, caso exista" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="caixa" class="mb-0">Caixa</label>
                                <input type="text" class="form-control mb-1" id="caixa" name="caixa" placeholder="Número Alternativo de Arquivamento">
                            </div>
                            <div class="col-6">
                                <label for="origem" class="mb-0">Origem</label>
                                <select name="origem" class="form-control mb-1">
                                    <option value="TBM">TBM - Benefícios transferidos de outro OL</option>
                                    <option value="REQ">Requerimentos Diversos</option>
                                    <option value="ATU">Atualizações de Benefícios</option>
                                    <option value="CNIS">Acertos de Vínculos e Remunerações</option>
                                    <option value="SABI">SABI</option>
                                    <option value="AP">Autorizações de Pagamento - AP</option>
                                    <option value="ID">INSS Digital</option>
                                    <option value="DIG">Cópias Digitalizadas</option>
                                    <option value="CTC">Certidões de Tempo de Contribuição - CTC</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="anexo" class="mb-0">Anexo</label>
                                <input type="file" class="form-control-file" name="file" id="file">
                            </div>
                            <div class="col-6">
                                <label for="descricao" class="mb-0">Descrição do Anexo</label>
                                <input type="text" class="form-control mb-1" id="descricao" name="descricao" placeholder="Concessório, dossiê, recurso, etc">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <span class="text-muted">Outros anexos podem ser adicionados utilizando-se a opção "Editar".</span>
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
