<?php
defined('BASEPATH') OR exit('No direct script access allowed');  ?>


<div class="col-xm-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 well">

  <?php if ( isset($exito) and $exito ) {
      echo '
      <div class="alert alert-block alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
              <h4>Genial!</h4>
              Se a editado exitosamente el usuario de <strong>'.$usuario['nombre'].' '.$usuario['apellido'].'</strong>.
          </div>';
    }
    echo form_open('/usuarios/actualizar/' . $usuario['id_usuario']); ?>

<div class="form-group">
<label for="nombre">Nombre: <?php echo form_error('nombre')?>  </label>
<input class="form-control" type="text" class='form-control' name="nombre" value="<?php echo $usuario['nombre'];?>">

<label for="apellido">Apellido: <?php echo form_error('apellido');?> </label>
<input class="form-control" type="text" class='form-control' name="apellido" value="<?php echo $usuario['apellido'];?>">

<label for="DNI">DNI: <?php echo form_error('dni');?> </label>
<input class="form-control" type="text" class='form-control' name="dni" value="<?php echo $usuario['dni'];?>">

<label for="mail">Mail: <?php echo form_error('email');?> </label>
<input class="form-control" type="text" class='form-control' name="email" value="<?php echo $usuario['email'];?>">

<?php echo form_error('es_admin');?>

<div class="radio">
    <label>
<input type="radio" name="es_admin" id="optionsRadios1" value="0" <?php if(!$usuario['es_admin']) echo " checked"; ?>>
No Administrador
</label>
</div>
<div class="radio">
    <label>
<input type="radio" name="es_admin" id="optionsRadios2" value="1"<?php if($usuario['es_admin']) echo " checked"; ?>>
Administrador
</label>
</div>
<label for="apellido">Empleado desde: </label>
<input class="form-control" type="text" class='form-control' value="<?php echo $usuario['fecha_inicio']  ?> " readonly >



<?php if ( $usuario['fecha_fin'] ):?>
<label for="fecha_fin">Empleado hasta...</label>
<input type="text" name="fecha_fin" value="<?php echo $usuario['fecha_fin']?>" readonly>
<?php endif;?>

</div>
<input type="submit" class="btn btn-default" name="submit" value="Enviar">

</form>
</div>
