<?php
defined('BASEPATH') OR exit('No direct script access allowed');  ?>
<div id="root">
<select name="productos">
<option v-for="opc in productos" v-dind:value="opc.id">{{opc.text}}</option>
</select>
<input type="text" name="cantidad" v-model="cantidad">
<button type="button" name="button" v-onclick="agregarProducto">Agregar</button>

<ul>
<li v-for="prod in productos_agregados" v-on:click="eliminarDeLista">{{prod.text}}</li>
<ul>
</div>
