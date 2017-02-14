<?php
defined('BASEPATH') OR exit('No direct script access allowed');  ?>


<div class="col-xm-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 well">


<div class="form-group">

<label for="nombre_proveedor">Proveedor: </label>
<input class="form-control" type="text" class='form-control' value=" <?php echo $proveedor['nombre_proveedor']  ?>"  readonly>

<label for="localidad">Localidad: </label>
<input class="form-control" type="text" class='form-control' value="<?php echo $proveedor['nombre_localidad']  ?> "  readonly>



<label for="contacto">Contacto: </label>
<input class="form-control" type="text" class='form-control' value="<?php echo $proveedor['contacto']  ?> "  readonly>




</div>
</div>
