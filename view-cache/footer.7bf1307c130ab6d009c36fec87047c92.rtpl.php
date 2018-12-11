<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Navbar bottom -->
<nav class="navbar fixed-bottom navbar-expand-lg navbar-light" style="background-color: #adc8e6cb">
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item dropup">
            <a class="ml-auto nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <small><i class="fas fa-user"></i> <?php echo htmlspecialchars( $usuario, ENT_COMPAT, 'UTF-8', FALSE ); ?></small>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalMeusFavoritos"><i class="far fa-star text-primary"></i> Meus Favoritos</a>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalMeusDados"><i class="fas fa-user-cog text-primary"></i> Meus Dados</a>
            <a class="dropdown-item" href="logout"><i class="far fa-times-circle text-danger"></i> Sair</a>
            </div>
        </li>
        </ul>
    </div>
    <div class="nav-item ml-auto">
        <span class="nav-item text-muted"><small>Lotação: <?php echo htmlspecialchars( $lotacao, ENT_COMPAT, 'UTF-8', FALSE ); ?> <i class="fas fa-desktop"></i> IP <?php echo htmlspecialchars( $ip, ENT_COMPAT, 'UTF-8', FALSE ); ?></small></span>
    </div>
</nav>

<!-- Modal Meus Dados -->
<div class="modal" id="modalMeusDados" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-user-cog text-primary"></i> Meus Dados</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>x</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-3 border">Foto</div>
                        <div class="col-9 border">Formulário</div>
                    </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Meus Favoritos -->
<div class="modal" id="modalMeusFavoritos" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="far fa-star text-primary"></i> Meus Favoritos</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="border">Favoritos</div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
  </body>
</html>