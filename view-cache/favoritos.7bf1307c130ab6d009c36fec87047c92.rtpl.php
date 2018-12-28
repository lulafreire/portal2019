<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
    <div class="row">
        <div class="text-secondary">
            <h1>Alterar Favoritos</h1>
            <form action="test" method="POST">
                <select name="fav">
                    <?php $counter1=-1;  if( isset($s) && ( is_array($s) || $s instanceof Traversable ) && sizeof($s) ) foreach( $s as $key1 => $value1 ){ $counter1++; ?>
                    <option value="01|<?php echo htmlspecialchars( $value1["origem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>|<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["origem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>: <?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                    <?php } ?>
                </select>
                <input type="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $("#modalMeusFavoritos").modal('show');
    });
</script>