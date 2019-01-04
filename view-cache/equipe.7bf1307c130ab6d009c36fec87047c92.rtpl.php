<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container-fluid my-2 mx-2">
    <div class="row">
        <div class="col-6 my-2">
            <h6 class="text-dark"><i class="fas fa-users"></i> Equipe <small class="text-muted"> <i>Detalha os servidores da Unidade e permite edição e exclusão pelos gestores</i></small></h6>
        </div>
        <div class="col-6">
        <?php if( $user["status"]==1 ){ ?><button class="btn btn-success btn-sm float-right mr-3" data-toggle="modal" data-target="#modalNovoUsuario"><i class="fas fa-file"></i> Novo</button><?php } ?>                   
        </div>
    </div>
    <div class="row">
        <table class="table mb-1 table-sm table-hover">
        <thead>
            <tr>              
            <th>Equipe</th>
            <th>Nome</th>
            <th>Matrícula</th>
            <th>E-mail</th>
            <th>Telefone</th>                     
            <th>CPF</th>
            <th class="text-center">Opções</th>
            </tr>
        </thead>
        <tbody>
            <?php $counter1=-1;  if( isset($users["data"]) && ( is_array($users["data"]) || $users["data"] instanceof Traversable ) && sizeof($users["data"]) ) foreach( $users["data"] as $key1 => $value1 ){ $counter1++; ?>
            <tr>
            <td class="text-center"><a title="<?php echo nomeEquipe($value1["equipe"]); ?>" class="btn btn-secondary btn-sm text-light"><strong><?php echo siglaEquipe($value1["equipe"]); ?></strong></a></td>                    
            <td><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["matricula"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php if( $value1["publicTelefone"]!=1 ){ ?><?php echo htmlspecialchars( $value1["telefone"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?><span class="text-muted">Não disponível</span><?php } ?></td>
            <td><?php echo htmlspecialchars( $value1["cpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td class="text-center">
                <a href="#" data-toggle="modal" data-target="#modalDetalhaUsuario-<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-info btn-sm"><i class="fas fa-asterisk"></i> Detalhar </a>
                <?php if( $user["status"]==1 ){ ?>
                <a href="users/update/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar </a>
                <a href="users/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir este registro?')"><i class="fa fa-trash"></i> Excluir</a>
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
<!-- Modal Novo Usuário-->
<div class="modal" id="modalNovoUsuario" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-user-plus"></i> Cadastre um novo usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form autocomplete="off" role="form" action="cadastro" method="POST" enctype="multipart/form-data">
                    <div class="container-fluid text-left">
                        <div class="row">
                            <div class="col-3">
                                <img class="img-fluid" id="image-preview" src="img/users/anonimo.jpg">
                            </div>
                            <div class="col-9">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="modal-title mb-2"><i class="fas fa-camera"></i> Escolher imagem</h5></h4>
                                        <input type="file" accept="image/*" class="form-control-file" name="file" id="file">
                                        <small class="form-text text-muted">Utilize imagens com extensão JPG, com no máximo 2Mb.</small>
                                        <hr class="text-muted">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label class="mb-0" for="nome">Nome</label>
                                        <input type="text" value="" class="form-control mb-1" name="nome" id="nome" placeholder="Nome completo" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="mb-0" for="matricula">Matrícula</label>
                                        <input type="text" value="" class="form-control mb-1" name="matricula" id="matricula" placeholder="Matrícula" required>
                                    </div>
                                    <div class="col-6">
                                        <label class="mb-0" for="cpf">CPF</label>
                                        <input type="text" value="" class="form-control mb-1" name="cpf" id="cpf" maxlength='14' onkeypress="formatar_mascara(this, '###.###.###-##')" placeholder="CPF">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="mb-0" for="email">E-mail</label>
                                        <input type="text" value="" class="form-control mb-1" name="email" id="email" placeholder="Seu e-mail">
                                    </div>
                                    <div class="col-6">
                                        <label class="mb-0" for="cargo">Cargo</label>
                                        <select class="form-control" name="cargo" id="cargo">
                                            <option value="Técnico do Seguro Social" >Técnico do Seguro Social</option>
                                            <option value="Analista do Seguro Social" >Analista do Seguro Social</option>
                                            <option value="Médico Perito" >Médico Perito</option>
                                        </select>
                                    </div>
                                </div>            
                                <div class="row">
                                    <div class="col-6">
                                        <label class="mb-0" for="lotacao">Lotação</label>
                                        <input type="text" readonly="readonly" value="<?php echo htmlspecialchars( $user["lotacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control mb-1" name="lotacao" id="lotacao" placeholder="Código da Unidade" required>
                                    </div>
                                    <div class="col-6">
                                        <label class="mb-0" for="dt_ingresso">Data de Ingresso</label>
                                        <input type="text" value="" class="form-control mb-1" name="dt_ingresso" id="dt_ingresso" maxlength='10' onkeypress="formatar_mascara(this, '##/##/####')" placeholder="Data de Ingresso">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="mb-0" for="telefone">Telefone</label>
                                        <input type="text" value="" class="form-control mb-0" name="telefone" id="telefone" maxlength='13' onkeypress="formatar_mascara(this, '##.#####-####')" placeholder="Telefone">
                                        <small class="text-muted"><input type="checkbox" name="publicTelefone" id="publicTelefone" value="1"> Deixar oculto para outros usuários*</small>
                                    </div>
                                    <div class="col-6">
                                        <label class="mb-0" for="dt_nascimento">Data de Nascimento</label>
                                        <input type="text" value="" class="form-control mb-1" name="dt_nascimento" id="dt_nascimento" maxlength='10' onkeypress="formatar_mascara(this, '##/##/####')" placeholder="Data de Nascimento">
                                        <small class="text-muted"><input type="checkbox" name="publicDtNascimento" id="publicDtNascimento" value="1"> Deixar oculto para outros usuários*</small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="mb-0" for="nit">NIT</label>
                                        <input type="text" value="" class="form-control mb-1" name="nit" id="nit" placeholder="NIT/PIS/PASEP">
                                    </div>
                                    <div class="col-6">
                                      <label class="mb-0" for="nit">EQUIPE</label>
                                      <select name="equipe" class="form-control">
                                        <option value="A-Assistentes Sociais">Assistentes Sociais</option>
                                        <option value="D-INSS Digital">INSS Digital (Protocolo)</option>
                                        <option value="T-Análise de Tarefas">Análise de Tarefas</option>
                                        <option value="E-Estagiários">Estagiários</option>                                        
                                        <option value="G-Gestores">Gestores</option>
                                        <option value="O-OI/Manutenção">OI/Manutenção</option>
                                        <option value="R-Retaguarda">Retaguarda</option>
                                        <option value="M-MOB">MOB</option>
                                        <option value="P-Perícia Médica">Perícia Médica</option>
                                      </select>                                       
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col">
                                        <label class="mb-0" for="endereco">Endereço completo</label>
                                        <input type="text" value="" class="form-control mb-1" name="endereco" id="endereco" placeholder="Endereço completo">
                                    </div>
                                </div>                                
                                
                                <hr class="text-muted mb-0">
                                <small class="text-muted"><i>(*) Apenas usuários com perfil de gestor visualizarão os dados ocultos.</i></small>
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