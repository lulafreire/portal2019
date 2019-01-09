<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Navbar bottom -->
<nav class="border border-secondary navbar fixed-bottom navbar-expand-lg navbar-light p-0" style="background-color: #adc8e6cb">
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-2">
            <li class="nav-item dropup">
            <a class="ml-auto nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <small><i class="fas fa-user"></i> <?php echo htmlspecialchars( $user["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $user["matricula"], ENT_COMPAT, 'UTF-8', FALSE ); ?></small>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalMeusFavoritos"><i class="far fa-star"></i> Meus Favoritos</a>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalMeusDados"><i class="fas fa-user-cog"></i> Meus Dados</a>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalTrocaSenha"><i class="fas fa-key"></i> Troca Senha</a>
            <a class="dropdown-item" href="logout"><i class="far fa-times-circle text-danger"></i> Sair</a>
            </div>
        </li>
        </ul>
    </div>
    <div class="nav-item ml-auto p-0">
        <span class="nav-item text-muted mr-3"><small><i class="fas fa-map-marker-alt"></i> Sua Lotação: <strong><?php echo htmlspecialchars( $user["lotacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $nomeUnidade, ENT_COMPAT, 'UTF-8', FALSE ); ?></strong>&nbsp;&nbsp;<i class="fas fa-desktop"></i> Seu IP: <strong><?php echo htmlspecialchars( $ip, ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></small></span>
    </div>
</nav>

<script>
$(document).ready(function () {
    $('#openBtn').click(function () {
        $('#modalMeusDados').modal()
    });

    $('.modal')
        .on({
            'show.bs.modal': function() {
                var idx = $('.modal:visible').length;
              
                $(this).css('z-index', 1040 + (10 * idx));
                 var url = $(this).find('[data-url]').data('url');
                 if (url != undefined && url != '') {
                       var id = $(this).attr('id');
                      $('#'+id+' .modal-body').load(url);
                  }
            },
            'shown.bs.modal': function() {
                var idx = ($('.modal:visible').length) - 1; // raise backdrop after animation.
                $('.modal-backdrop').not('.stacked')
                .css('z-index', 1039 + (10 * idx))
                .addClass('stacked');
            },
            'hidden.bs.modal': function() {
                if ($('.modal:visible').length > 0) {
                    // restore the modal-open class to the body element, so that scrolling works
                    // properly after de-stacking a modal.
                    setTimeout(function() {
                        $(document.body).addClass('modal-open');
                    }, 0);
                }
            }
        });
});
</script>

<!-- Modal Meus Dados -->
<div class="modal" id="modalMeusDados">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-user-cog"></i> Meus Dados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="users-update/<?php echo htmlspecialchars( $user["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method='POST' enctype="multipart/form-data">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-3">
                                <img class="img-fluid" id="image-preview" src="img/users/<?php echo htmlspecialchars( $user["foto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                            </div>
                            <div class="col-9">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="modal-title mb-2"><i class="fas fa-camera"></i> Alterar imagem</h5></h4>
                                        <input type="file" class="form-control-file" name="file" id="file">
                                        <input type="hidden" class="form-control" name="foto" value="<?php echo htmlspecialchars( $user["foto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                        <small class="form-text text-muted">Utilize imagens com extensão JPG, com no máximo 2Mb.</small>
                                        <hr class="text-muted">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label class="mb-0" for="nome">Nome</label>
                                        <input type="text" value="<?php echo htmlspecialchars( $user["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control mb-1" name="nome" id="nome" placeholder="Seu nome completo">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="mb-0" for="matricula">Matrícula</label>
                                        <input type="text" value="<?php echo htmlspecialchars( $user["matricula"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control mb-1" name="matricula" id="matricula" placeholder="Matrícula">
                                    </div>
                                    <div class="col-6">
                                        <label class="mb-0" for="cpf">CPF</label>
                                        <input type="text" value="<?php echo htmlspecialchars( $user["cpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control mb-1" name="cpf" id="cpf" maxlength='14' onkeypress="formatar_mascara(this, '###.###.###-##')" placeholder="CPF">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="mb-0" for="email">E-mail</label>
                                        <input type="text" value="<?php echo htmlspecialchars( $user["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control mb-1" name="email" id="email" placeholder="Seu e-mail">
                                    </div>
                                    <div class="col-6">
                                        <label class="mb-0" for="cargo">Cargo</label>
                                        <select class="form-control" name="cargo" id="cargo">
                                            <option value="Técnico do Seguro Social" <?php if( $user["cargo"]=='Técnico do Seguro Social' ){ ?> selected <?php } ?>>Técnico do Seguro Social</option>
                                            <option value="Analista do Seguro Social" <?php if( $user["cargo"]=='Analista do Seguro Social' ){ ?> selected <?php } ?>>Analista do Seguro Social</option>
                                            <option value="Médico Perito" <?php if( $user["cargo"]=='Médico Perito' ){ ?> selected <?php } ?>>Médico Perito</option>
                                            <option value="Estagiário"  <?php if( $user["cargo"]=='Estagiário' ){ ?> selected <?php } ?>>Estagiário</option>
                                        </select>
                                    </div>
                                </div>            
                                <div class="row">
                                    <div class="col-6">
                                        <label class="mb-0" for="lotacao">Lotação</label>
                                        <input type="text" value="<?php echo htmlspecialchars( $user["lotacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $user["status"]!=1 ){ ?>readonly="readonly"<?php } ?> class="form-control mb-1" name="lotacao" id="lotacao" placeholder="Código da Unidade">
                                    </div>
                                    <div class="col-6">
                                        <label class="mb-0" for="dtIngresso">Data de Ingresso</label>
                                        <input type="text" value="<?php echo converteData($user["dt_ingresso"]); ?>" class="form-control mb-1" name="dt_ingresso" id="dt_ingresso" maxlength='10' onkeypress="formatar_mascara(this, '##/##/####')" placeholder="Data de Ingresso">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="mb-0" for="telefone">Telefone</label>
                                        <input type="text" value="<?php echo htmlspecialchars( $user["telefone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control mb-0" name="telefone" id="telefone" maxlength='13' onkeypress="formatar_mascara(this, '##.#####-####')" placeholder="Telefone">
                                        <small class="text-muted"><input type="checkbox" value="1" name="publicTelefone" id="publicTelefone" <?php if( $user["publicTelefone"]==1 ){ ?>checked<?php } ?>> Deixar oculto para outros usuários*</small>
                                    </div>
                                    <div class="col-6">
                                        <label class="mb-0" for="dtNascimento">Data de Nascimento</label>
                                        <input type="text" value="<?php echo converteData($user["dt_nascimento"]); ?>" class="form-control mb-1" name="dt_nascimento" id="dt_nascimento" maxlength='10' onkeypress="formatar_mascara(this, '##/##/####')" placeholder="Data de Nascimento">
                                        <small class="text-muted"><input type="checkbox" value="1" name="publicDtNascimento" id="publicDtNascimento" <?php if( $user["publicDtNascimento"]==1 ){ ?>checked<?php } ?>> Deixar oculto para outros usuários*</small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label class="mb-0" for="endereco">Endereço completo</label>
                                        <input type="text" value="<?php echo htmlspecialchars( $user["endereco"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control mb-1" name="endereco" id="endereco" placeholder="Endereço completo">
                                    </div>
                                </div>                                
                                <hr class="text-muted mb-0">
                                <small class="text-muted"><i>(*) Apenas para os usuários com perfil de gestor visualizarão os dados ocultos.</i></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="Salvar Alterações"><button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                </div>
                
                </form>
        </div>
    </div>
</div>

<!-- Modal Troca Senha -->
<div class="modal" id="modalTrocaSenha" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-key"></i> Troca Senha</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="trocasenha" method="POST">
                    <div class="row">
                        <div class="col-6">
                            <label class="mb-0" for="senha">Senha</label>
                            <input type="password" value="" class="form-control mb-1" name="newPassword" id="newPassword" placeholder="Informe sua nova senha" required>
                            <input type="hidden" name="iduser" id="iduser" value="<?php echo htmlspecialchars( $user["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success mx-2" value="Atualizar"><button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            </div></form>
        </div>
    </div>
</div>

<!-- Modal Meus Favoritos -->
<div class="modal" id="modalMeusFavoritos" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="far fa-star"></i> Meus Favoritos</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="update-favoritos" method="POST">
                    <div class="row">                   
                        
                        <div class="col mt-2 align-middle border border-secondary rounded mx-1" align="center">
                            <div class="row">
                                <div class="col-3 bg-secondary">
                                    <h1 class="text-light">1</h1>
                                </div>
                                <div class="col">
                                    <a href="<?php echo htmlspecialchars( $fav["url01"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" title="<?php echo htmlspecialchars( $fav["desc01"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><h1 class="text-secondary"><i class="<?php echo htmlspecialchars( $fav["icone01"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i></h1></a>
                                    <p style="font-size: 12px;"><?php echo htmlspecialchars( $fav["fav01"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                                    <select class="mb-2" id="1" name="1" style="font-size: 12px;">
                                        <?php $counter1=-1;  if( isset($selFav) && ( is_array($selFav) || $selFav instanceof Traversable ) && sizeof($selFav) ) foreach( $selFav as $key1 => $value1 ){ $counter1++; ?>
                                        <option value="01|<?php echo htmlspecialchars( $value1["origem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>|<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $fav["fav01"]==$value1["nome"] ){ ?>selected<?php } ?>><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?> [ <?php echo htmlspecialchars( $value1["origem"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ]</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col mt-2 align-middle border border-secondary rounded mx-1" align="center">
                            <div class="row">
                                <div class="col-3 bg-secondary">
                                    <h1 class="text-light">2</h1>
                                </div>
                                <div class="col">
                                    <a href="<?php echo htmlspecialchars( $fav["url02"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" title="<?php echo htmlspecialchars( $fav["desc02"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><h1 class="text-secondary"><i class="<?php echo htmlspecialchars( $fav["icone02"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i></h1></a>
                                    <p style="font-size: 12px;"><?php echo htmlspecialchars( $fav["fav02"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                                    <select class="mb-2" id="2" name="2" style="font-size: 12px;">
                                        <?php $counter1=-1;  if( isset($selFav) && ( is_array($selFav) || $selFav instanceof Traversable ) && sizeof($selFav) ) foreach( $selFav as $key1 => $value1 ){ $counter1++; ?>
                                        <option value="02|<?php echo htmlspecialchars( $value1["origem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>|<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $fav["fav02"]==$value1["nome"] ){ ?>selected<?php } ?>><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?> [ <?php echo htmlspecialchars( $value1["origem"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ]</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        
                        <div class="col mt-2 align-middle border border-secondary rounded mx-1" align="center">
                            <div class="row">
                                <div class="col-3 bg-secondary">
                                    <h1 class="text-light">3</h1>
                                </div>
                                <div class="col">
                                    <a href="<?php echo htmlspecialchars( $fav["url03"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" title="<?php echo htmlspecialchars( $fav["desc03"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><h1 class="text-secondary"><i class="<?php echo htmlspecialchars( $fav["icone03"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i></h1></a>
                                    <p style="font-size: 12px;"><?php echo htmlspecialchars( $fav["fav03"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                                    <select class="mb-2" id="3" name="3" style="font-size: 12px;">
                                        <?php $counter1=-1;  if( isset($selFav) && ( is_array($selFav) || $selFav instanceof Traversable ) && sizeof($selFav) ) foreach( $selFav as $key1 => $value1 ){ $counter1++; ?>
                                        <option value="03|<?php echo htmlspecialchars( $value1["origem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>|<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $fav["fav03"]==$value1["nome"] ){ ?>selected<?php } ?>><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?> [ <?php echo htmlspecialchars( $value1["origem"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ]</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col mt-2 align-middle border border-secondary rounded mx-1" align="center">
                            <div class="row">
                                <div class="col-3 bg-secondary">
                                    <h1 class="text-light">4</h1>
                                </div>
                                <div class="col">
                                    <a href="<?php echo htmlspecialchars( $fav["url04"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" title="<?php echo htmlspecialchars( $fav["desc04"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><h1 class="text-secondary"><i class="<?php echo htmlspecialchars( $fav["icone04"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i></h1></a>
                                    <p style="font-size: 12px;"><?php echo htmlspecialchars( $fav["fav04"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                                    <select class="mb-2" id="4" name="4" style="font-size: 12px;">
                                        <?php $counter1=-1;  if( isset($selFav) && ( is_array($selFav) || $selFav instanceof Traversable ) && sizeof($selFav) ) foreach( $selFav as $key1 => $value1 ){ $counter1++; ?>
                                        <option value="04|<?php echo htmlspecialchars( $value1["origem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>|<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $fav["fav04"]==$value1["nome"] ){ ?>selected<?php } ?>><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?> [ <?php echo htmlspecialchars( $value1["origem"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ]</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        
                        <div class="col mt-2 align-middle border border-secondary rounded mx-1" align="center">
                            <div class="row">
                                <div class="col-3 bg-secondary">
                                    <h1 class="text-light">5</h1>
                                </div>
                                <div class="col">
                                    <a href="<?php echo htmlspecialchars( $fav["url05"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" title="<?php echo htmlspecialchars( $fav["desc05"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><h1 class="text-secondary"><i class="<?php echo htmlspecialchars( $fav["icone05"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i></h1></a>
                                    <p style="font-size: 12px;"><?php echo htmlspecialchars( $fav["fav05"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                                    <select class="mb-2" id="5" name="5" style="font-size: 12px;">
                                        <?php $counter1=-1;  if( isset($selFav) && ( is_array($selFav) || $selFav instanceof Traversable ) && sizeof($selFav) ) foreach( $selFav as $key1 => $value1 ){ $counter1++; ?>
                                        <option value="05|<?php echo htmlspecialchars( $value1["origem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>|<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $fav["fav05"]==$value1["nome"] ){ ?>selected<?php } ?>><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?> [ <?php echo htmlspecialchars( $value1["origem"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ]</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col mt-2 align-middle border border-secondary rounded mx-1" align="center">
                            <div class="row">
                                <div class="col-3 bg-secondary">
                                    <h1 class="text-light">6</h1>
                                </div>
                                <div class="col">
                                    <a href="<?php echo htmlspecialchars( $fav["url06"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" title="<?php echo htmlspecialchars( $fav["desc06"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><h1 class="text-secondary"><i class="<?php echo htmlspecialchars( $fav["icone06"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i></h1></a>
                                    <p style="font-size: 12px;"><?php echo htmlspecialchars( $fav["fav06"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                                    <select class="mb-2" id="6" name="6" style="font-size: 12px;">
                                        <?php $counter1=-1;  if( isset($selFav) && ( is_array($selFav) || $selFav instanceof Traversable ) && sizeof($selFav) ) foreach( $selFav as $key1 => $value1 ){ $counter1++; ?>
                                        <option value="06|<?php echo htmlspecialchars( $value1["origem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>|<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $fav["fav06"]==$value1["nome"] ){ ?>selected<?php } ?>><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?> [ <?php echo htmlspecialchars( $value1["origem"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ]</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>                        

                    </div>

                    <div class="row">
                        
                        <div class="col mt-2 align-middle border border-secondary rounded mx-1" align="center">
                            <div class="row">
                                <div class="col-3 bg-secondary">
                                    <h1 class="text-light">7</h1>
                                </div>
                                <div class="col">
                                    <a href="<?php echo htmlspecialchars( $fav["url07"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" title="<?php echo htmlspecialchars( $fav["desc07"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><h1 class="text-secondary"><i class="<?php echo htmlspecialchars( $fav["icone07"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i></h1></a>
                                    <p style="font-size: 12px;"><?php echo htmlspecialchars( $fav["fav07"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                                    <select class="mb-2" id="7" name="7" style="font-size: 12px;">
                                        <?php $counter1=-1;  if( isset($selFav) && ( is_array($selFav) || $selFav instanceof Traversable ) && sizeof($selFav) ) foreach( $selFav as $key1 => $value1 ){ $counter1++; ?>
                                        <option value="07|<?php echo htmlspecialchars( $value1["origem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>|<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $fav["fav07"]==$value1["nome"] ){ ?>selected<?php } ?>><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?> [ <?php echo htmlspecialchars( $value1["origem"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ]</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col mt-2 align-middle border border-secondary rounded mx-1" align="center">
                            <div class="row">
                                <div class="col-3 bg-secondary">
                                    <h1 class="text-light">8</h1>
                                </div>
                                <div class="col">
                                    <a href="<?php echo htmlspecialchars( $fav["url08"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" title="<?php echo htmlspecialchars( $fav["desc08"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><h1 class="text-secondary"><i class="<?php echo htmlspecialchars( $fav["icone08"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i></h1></a>
                                    <p style="font-size: 12px;"><?php echo htmlspecialchars( $fav["fav08"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                                    <select class="mb-2" id="8" name="8" style="font-size: 12px;">
                                        <?php $counter1=-1;  if( isset($selFav) && ( is_array($selFav) || $selFav instanceof Traversable ) && sizeof($selFav) ) foreach( $selFav as $key1 => $value1 ){ $counter1++; ?>
                                        <option value="08|<?php echo htmlspecialchars( $value1["origem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>|<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $fav["fav08"]==$value1["nome"] ){ ?>selected<?php } ?>><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?> [ <?php echo htmlspecialchars( $value1["origem"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ]</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col mt-2 align-middle border border-secondary rounded mx-1" align="center">
                            <div class="row">
                                <div class="col-3 bg-secondary">
                                    <h1 class="text-light">9</h1>
                                </div>
                                <div class="col">
                                    <a href="<?php echo htmlspecialchars( $fav["url09"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" title="<?php echo htmlspecialchars( $fav["desc09"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><h1 class="text-secondary"><i class="<?php echo htmlspecialchars( $fav["icone09"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i></h1></a>
                                    <p style="font-size: 12px;"><?php echo htmlspecialchars( $fav["fav09"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                                    <select class="mb-2" id="9" name="9" style="font-size: 12px;">
                                        <?php $counter1=-1;  if( isset($selFav) && ( is_array($selFav) || $selFav instanceof Traversable ) && sizeof($selFav) ) foreach( $selFav as $key1 => $value1 ){ $counter1++; ?>
                                        <option value="09|<?php echo htmlspecialchars( $value1["origem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>|<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $fav["fav09"]==$value1["nome"] ){ ?>selected<?php } ?>><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?> [ <?php echo htmlspecialchars( $value1["origem"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ]</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col mt-2 align-middle border border-secondary rounded mx-1" align="center">
                            <div class="row">
                                <div class="col-3 bg-secondary">
                                    <h1 class="text-light">10</h1>
                                </div>
                                <div class="col">
                                    <a href="<?php echo htmlspecialchars( $fav["url10"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" title="<?php echo htmlspecialchars( $fav["desc10"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><h1 class="text-secondary"><i class="<?php echo htmlspecialchars( $fav["icone10"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i></h1></a>
                                    <p style="font-size: 12px;"><?php echo htmlspecialchars( $fav["fav10"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                                    <select class="mb-2" id="10" name="10" style="font-size: 12px;">
                                        <?php $counter1=-1;  if( isset($selFav) && ( is_array($selFav) || $selFav instanceof Traversable ) && sizeof($selFav) ) foreach( $selFav as $key1 => $value1 ){ $counter1++; ?>
                                        <option value="10|<?php echo htmlspecialchars( $value1["origem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>|<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $fav["fav10"]==$value1["nome"] ){ ?>selected<?php } ?>><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?> [ <?php echo htmlspecialchars( $value1["origem"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ]</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col mt-2 align-middle border border-secondary rounded mx-1" align="center">
                            <div class="row">
                                <div class="col-3 bg-secondary">
                                    <h1 class="text-light">11</h1>
                                </div>
                                <div class="col">
                                    <a href="<?php echo htmlspecialchars( $fav["url11"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" title="<?php echo htmlspecialchars( $fav["desc11"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><h1 class="text-secondary"><i class="<?php echo htmlspecialchars( $fav["icone11"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i></h1></a>
                                    <p style="font-size: 12px;"><?php echo htmlspecialchars( $fav["fav11"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                                    <select class="mb-2" id="11" name="11" style="font-size: 12px;">
                                        <?php $counter1=-1;  if( isset($selFav) && ( is_array($selFav) || $selFav instanceof Traversable ) && sizeof($selFav) ) foreach( $selFav as $key1 => $value1 ){ $counter1++; ?>
                                        <option value="11|<?php echo htmlspecialchars( $value1["origem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>|<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $fav["fav11"]==$value1["nome"] ){ ?>selected<?php } ?>><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?> [ <?php echo htmlspecialchars( $value1["origem"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ]</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col mt-2 align-middle border border-secondary rounded mx-1" align="center">
                            <div class="row">
                                <div class="col-3 bg-secondary text-center mx-0">
                                    <h1 class="text-light mx-0">12</h1>
                                </div>
                                <div class="col">
                                    <a href="<?php echo htmlspecialchars( $fav["url12"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" title="<?php echo htmlspecialchars( $fav["desc12"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><h1 class="text-secondary"><i class="<?php echo htmlspecialchars( $fav["icone12"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i></h1></a>
                                    <p style="font-size: 12px;"><?php echo htmlspecialchars( $fav["fav12"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                                    <select class="mb-2" id="12" name="12" style="font-size: 12px;">
                                        <?php $counter1=-1;  if( isset($selFav) && ( is_array($selFav) || $selFav instanceof Traversable ) && sizeof($selFav) ) foreach( $selFav as $key1 => $value1 ){ $counter1++; ?>
                                        <option value="12|<?php echo htmlspecialchars( $value1["origem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>|<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $fav["fav12"]==$value1["nome"] ){ ?>selected<?php } ?>><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?> [ <?php echo htmlspecialchars( $value1["origem"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ]</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success mx-2" value="Atualizar"><button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            </div></form>
        </div>
    </div>
</div>

<?php $counter1=-1;  if( isset($users["data"]) && ( is_array($users["data"]) || $users["data"] instanceof Traversable ) && sizeof($users["data"]) ) foreach( $users["data"] as $key1 => $value1 ){ $counter1++; ?>
<!-- Modal Detalhar Usuário -->
<div class="modal" id="modalDetalhaUsuario-<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="far fa-user text-primary"></i> Detalhes do Usuário</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-4"><img class="img-fluid" src="img/users/<?php echo htmlspecialchars( $value1["foto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></div>
                        <div class="col-8">
                            <h5><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&nbsp;&nbsp;<small><font class="text-secondary"><i><?php echo htmlspecialchars( $value1["matricula"], ENT_COMPAT, 'UTF-8', FALSE ); ?></i></font></small></h5>
                            <P class="card-text mb-1"><strong>Cargo: </strong><?php echo htmlspecialchars( $value1["cargo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></P>
                            <P class="card-text mb-1"><strong>E-mail: </strong><?php echo htmlspecialchars( $value1["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?></P>
                            <p class="card-text mb-1"><strong>Telefone: </strong><?php if( $value1["publicTelefone"]==1 ){ ?><?php if( $user["status"]!=1 ){ ?><span class="text-muted">Não disponível</span><?php }else{ ?><?php echo htmlspecialchars( $value1["telefone"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?><?php }else{ ?><?php echo htmlspecialchars( $value1["telefone"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?></p>
                            <P class="card-text mb-1"><strong>Endereço: </strong><?php echo htmlspecialchars( $value1["endereco"], ENT_COMPAT, 'UTF-8', FALSE ); ?></P>
                            <p class="card-text mb-1"><strong>Data de Nascimento: </strong><?php if( $value1["publicDtNascimento"]==1 ){ ?><?php if( $user["status"]!=1 ){ ?><span class="text-muted">Não disponível</span><?php }else{ ?><?php echo converteData($value1["dt_nascimento"]); ?><?php } ?><?php }else{ ?><?php echo converteData($value1["dt_nascimento"]); ?><?php } ?></p>
                            <P class="card-text mb-1"><strong>Ingresso: </strong><?php echo converteData($value1["dt_ingresso"]); ?></P>
                            <P class="card-text mb-1"><strong>CPF: </strong><?php echo htmlspecialchars( $value1["cpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?></P>
                            <P class="card-text mb-1"><strong>NIT: </strong><?php echo htmlspecialchars( $value1["nit"], ENT_COMPAT, 'UTF-8', FALSE ); ?></P>
                            <P class="card-text mb-1"><strong>Equipe: </strong><?php echo nomeEquipe($value1["equipe"]); ?></P>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php $counter1=-1;  if( isset($users["data"]) && ( is_array($users["data"]) || $users["data"] instanceof Traversable ) && sizeof($users["data"]) ) foreach( $users["data"] as $key1 => $value1 ){ $counter1++; ?>
<!-- Modal Editar Usuário -->
<div class="modal" id="modalEditarUsuario-<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="far fa-user text-primary"></i> Detalhes do Usuário</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-3"><img class="img-fluid" src="img/users/<?php echo htmlspecialchars( $value1["foto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></div>
                        <div class="col-9">
                            <form autocomplete="off" role="form" action="usuarios/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="POST" enctype="multipart/form-data">                                            
                            <div class="row">
                                <div class="col">
                                    <label class="mb-0" for="nome">Nome</label>
                                    <input type="text" value="<?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control mb-1" name="nome" id="nome" placeholder="Nome completo" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label class="mb-0" for="matricula">Matrícula</label>
                                    <input type="text" value="<?php echo htmlspecialchars( $value1["matricula"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control mb-1" name="matricula" id="matricula" placeholder="Matrícula" required>
                                </div>
                                <div class="col-6">
                                    <label class="mb-0" for="cpf">CPF</label>
                                    <input type="text" value="<?php echo htmlspecialchars( $value1["cpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control mb-1" name="cpf" id="cpf" maxlength='14' onkeypress="formatar_mascara(this, '###.###.###-##')" placeholder="CPF">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label class="mb-0" for="email">E-mail</label>
                                    <input type="text" value="<?php echo htmlspecialchars( $value1["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control mb-1" name="email" id="email" placeholder="Seu e-mail">
                                </div>
                                <div class="col-6">
                                    <label class="mb-0" for="cargo">Cargo</label>
                                    <select class="form-control" name="cargo" id="cargo">
                                        <option value="Técnico do Seguro Social" <?php if( $value1["cargo"]=='Técnico do Seguro Social' ){ ?> selected <?php } ?> >Técnico do Seguro Social</option>
                                        <option value="Analista do Seguro Social" <?php if( $value1["cargo"]=='Analista do Seguro Social' ){ ?> selected <?php } ?> >Analista do Seguro Social</option>
                                        <option value="Médico Perito"  <?php if( $value1["cargo"]=='Médico Perito' ){ ?> selected <?php } ?>>Médico Perito</option>
                                        <option value="Estagiário"  <?php if( $value1["cargo"]=='Estagiário' ){ ?> selected <?php } ?>>Estagiário</option>
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
                                    <input type="text" value="<?php echo converteData($value1["dt_ingresso"]); ?>" class="form-control mb-1" name="dt_ingresso" id="dt_ingresso" maxlength='10' onkeypress="formatar_mascara(this, '##/##/####')" placeholder="Data de Ingresso">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label class="mb-0" for="telefone">Telefone</label>
                                    <input type="text" value="<?php echo htmlspecialchars( $value1["telefone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control mb-0" name="telefone" id="telefone" maxlength='13' onkeypress="formatar_mascara(this, '##.#####-####')" placeholder="Telefone">
                                    <small class="text-muted"><input type="checkbox" name="publicTelefone" id="publicTelefone" value="1" <?php if( $value1["publicTelefone"]==1 ){ ?>checked<?php } ?>> Deixar oculto para outros usuários*</small>
                                </div>
                                <div class="col-6">
                                    <label class="mb-0" for="dt_nascimento">Data de Nascimento</label>
                                    <input type="text" value="<?php echo converteData($value1["dt_nascimento"]); ?>" class="form-control mb-1" name="dt_nascimento" id="dt_nascimento" maxlength='10' onkeypress="formatar_mascara(this, '##/##/####')" placeholder="Data de Nascimento">
                                    <small class="text-muted"><input type="checkbox" name="publicDtNascimento" id="publicDtNascimento" value="1" <?php if( $value1["publicDtNascimento"]==1 ){ ?>checked<?php } ?>> Deixar oculto para outros usuários*</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label class="mb-0" for="nit">NIT</label>
                                    <input type="text" value="<?php echo htmlspecialchars( $value1["nit"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control mb-1" name="nit" id="nit" placeholder="NIT/PIS/PASEP">
                                </div>
                                <div class="col-6">
                                    <label class="mb-0" for="equipe">EQUIPE</label>
                                    <select name="equipe" class="form-control">
                                    <option value="A-Assistentes Sociais" <?php if( $value1["equipe"]=='A-Assistentes Sociais' ){ ?> selected <?php } ?>>Assistentes Sociais</option>
                                    <option value="D-INSS Digital" <?php if( $value1["equipe"]=='D-INSS Digital' ){ ?> selected <?php } ?>>INSS Digital (Protocolo)</option>
                                    <option value="T-Análise de Tarefas" <?php if( $value1["equipe"]=='T-Análise de Tarefas' ){ ?> selected <?php } ?>>Análise de Tarefas</option>
                                    <option value="E-Estagiários" <?php if( $value1["equipe"]=='E-Estagiários' ){ ?> selected <?php } ?>>Estagiários</option>                                        
                                    <option value="G-Gestores" <?php if( $value1["equipe"]=='G-Gestores' ){ ?> selected <?php } ?>>Gestores</option>
                                    <option value="O-OI/Manutenção" <?php if( $value1["equipe"]=='O-OI/Manutenção' ){ ?> selected <?php } ?>>OI/Manutenção</option>
                                    <option value="R-Retaguarda" <?php if( $value1["equipe"]=='R-Retaguarda' ){ ?> selected <?php } ?>>Retaguarda</option>
                                    <option value="M-MOB" <?php if( $value1["equipe"]=='M-MOB' ){ ?> selected <?php } ?>>MOB</option>
                                    <option value="P-Perícia Médica" <?php if( $value1["equipe"]=='P-Perícia Médica' ){ ?> selected <?php } ?>>Perícia Médica</option>
                                    </select>                                       
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col">
                                    <label class="mb-0" for="endereco">Endereço completo</label>
                                    <input type="text" value="<?php echo htmlspecialchars( $value1["endereco"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control mb-1" name="endereco" id="endereco" placeholder="Endereço completo">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="mb-0" for="status">Status: </label>
                                    <input type="radio" name="status" value="1" <?php if( $value1["status"]==1 ){ ?>checked<?php } ?>> Administrador &nbsp;&nbsp;<input type="radio" name="status" value="2" <?php if( $value1["status"]==2 ){ ?>checked<?php } ?>> Usuário Comum &nbsp;&nbsp;<input type="radio" name="status" value="3" <?php if( $value1["status"]==3 ){ ?>checked<?php } ?>> Atualiza Conteúdo &nbsp;&nbsp;
                                </div>
                            </div>                                            
                            <hr class="text-muted mb-0">
                            <small class="text-muted"><i>(*) Apenas usuários com perfil de gestor visualizarão os dados ocultos.</i></small>                                                                                                           
                            </div>                                                        
                        </div>
                    </div>
                </div>            
            <div class="modal-footer">
                <input type="hidden" name="foto" value="<?php echo htmlspecialchars( $value1["foto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php $counter2=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key2 => $value2 ){ $counter2++; ?><?php if( $value2["i"] == $value2["page"] ){ ?><input type="hidden" name="page" value="<?php echo htmlspecialchars( $value2["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php } ?><?php } ?><input type="hidden" value="<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="iduser"><input type="submit" class="btn btn-success" value="Atualizar"><button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>

<script>
    document.querySelector('#file').addEventListener('change', function(){
      
      var file = new FileReader();
    
      file.onload = function() {
        
        document.querySelector('#image-preview').src = file.result;
    
      }
    
      file.readAsDataURL(this.files[0]);
    
    });
</script>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="js/main.js"></script>

    <!-- Calendar.js -->
    <script src="/js/calendar.js"></script>

    <script src="js/app.js"></script>
    <script src="js/app.min.js"></script>
    <script src="js/demo.js"></script>
    
  </body>
</html>