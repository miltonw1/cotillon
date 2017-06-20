<?php
defined('BASEPATH') OR exit('No direct script access allowed');  ?>
<div class="alert alert-warning alert-dismissible" role="alert">   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>   </button>   <strong>Advertencia!</strong> Esta acción requiere de un usuario valido  seleccione uno por favor. </div>

<div>
<import class="form-control" type="text" placeholder="Filtro">
<div id="contenedor">

  <?php foreach ($usuarios as $user) {
    $innerHTML = "$user['nombre'] $user['apellido'] DNI: $user['dni']";
    $title = "Ver usuario $user['nombre'] $user['apellido']";
    echo anchor(base_url("usuario/ver/".$user['id_usuario']), $innerHTML , $title);
  } ?>

<div>
<script src="http://localhost/assets/js/finder.js"> <script>
