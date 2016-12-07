<?php
defined('BASEPATH') OR exit('No direct script access allowed');  ?>


<div class="col-xm-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 well">


<div class="form-group">
<label for="nombre">Nombre: </label>
<input class="form-control" type="text" class='form-control' value=" <?php echo $usuario['nombre']  ?>"  readonly>
<label for="apellido">Apellido: </label>
<input class="form-control" type="text" class='form-control' value="<?php echo $usuario['apellido']  ?> "  readonly>
<label for="DNI">DNI: </label>
<input class="form-control" type="text" class='form-control' value="<?php echo $usuario['dni']  ?> "  readonly>
<label for="mail">Mail: </label>
<input class="form-control" type="text" class='form-control' value="<?php echo $usuario['email']  ?> "  readonly>
<label for="apellido">Empleado desde: </label>
<input class="form-control" type="text" class='form-control' value="<?php echo $usuario['fecha_inicio']  ?> "  readonly>


<?php if ( $usuario['fecha_fin'] ):?>
<label for="fecha_fin">Empleado hasta...</label>
<input type="text" name="fecha_fin" value="<?php echo $usuario['fecha_fin']?>" readonly>
<?php endif;?>

</div>
</div>
