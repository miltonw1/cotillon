<?php
defined('BASEPATH') OR exit('No direct script access allowed');  ?>
<div class="alert alert-warning alert-dismissible" role="alert">   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>   </button>   <strong>Advertencia!</strong> <?php echo $mensaje ?> </div>

<div>
<input class="form-control" type="text" placeholder="Filtro">
<div id="contenedor">

  <ul>
  <?php foreach ($usuarios as $user) {
    $innerHTML = $user['nombre']." ".$user['apellido']." DNI: ".$user['dni'];
    $title = "Ver usuario ".$user['nombre']." ".$user['apellido'];
    echo '<div>' . anchor(base_url("usuario/ver/".$user['id_usuario']), $innerHTML , $title).'</div>';

  } ?>

</ul>

<div>
<script src="http://localhost/assets/js/finder.js"> <script>
