<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container-fluid">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header mx-2 my-2">
  <h3>
    Equipe
  </h3>
</section>

<!-- Main content -->
<section class="content mx-2 my-2">

  <div class="row">
  	<div class="col-12">
  		<div class="box box-primary">
            
            <div class="box-header">
              <a href="users-create" class="btn btn-success">Cadastrar Usuário</a>
            </div>

            <div class="box-body no-padding mx-2">
              <table class="table table-striped">
                <thead>
                  <tr>              
                    <th>Nome</th>
                    <th>Matrícula</th>
                    <th>E-mail</th>
                    <th>Telefone</th>                     
                    <th>CPF</th>
                    <th class="text-center">Opções</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $counter1=-1;  if( isset($users) && ( is_array($users) || $users instanceof Traversable ) && sizeof($users) ) foreach( $users as $key1 => $value1 ){ $counter1++; ?>
                  <tr>                    
                    <td><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["matricula"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["telefone"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["cpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td class="text-center">
                      <a href="#" data-toggle="modal" data-target="#modalDetalhaUsuario-<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="text-link text-dark"><i class="fas fa-asterisk"></i> Detalhar </a>&nbsp;|&nbsp;
                      <a href="users/update/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="text-link text-dark"><i class="fa fa-edit"></i> Editar </a>&nbsp;|&nbsp;
                      <a href="users/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" class="text-link text-dark" onclick="return confirm('Deseja realmente excluir este registro?')"><i class="fa fa-trash"></i> Excluir</a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>