<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<h1>Bienvenido al sistema</h1>
<?php
    echo anchor( base_url("categorias/"), "Categorias", "Categorias");
    echo '<br>';
    echo anchor( base_url("localidades/"), "Localidades", "Localidades");
    echo '<br>';
    echo anchor( base_url("proveedores/"), "Proveedores", "Proveedores");
    echo '<br>';
    echo anchor( base_url("usuarios/"), "Usuarios", "Usuarios");
    echo '<br>';
    echo anchor( base_url("productos/"), "Productos", "Productos");
    echo '<br><hr>';
    echo anchor( base_url("inicio/salir"), "Salir", "Salir del sistema");
?>
