<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div id="root">

  <select name="productos" class="form-control" v-model="producto_seleccionado">
    <option v-for="opc in productos" v-bind:value="{text: opc.text, id: opc.id, precio: opc.precio}">{{opc.text}}</option>
  </select>

  <input type="text" name="cantidad" v-model="cantidad" class="form_control" v-on:keyup.enter="agregarProducto">

  <button type="button" name="button" v-on:click="agregarProducto">agregar</button>

<div v-show="errors.length" class="alert alert-danger" role="alert">
<ul>
  <li v-for="error in errors" >{{error}}</li>
</ul>
</div>

<ul>
    <li v-for="prod in productos_agregados" v-on:dblclick="eliminarDeLista">
      {{prod.text}} - cantidad: {{prod.cantidad}}
    </li>
  </ul>
  <p v-if="totalDeVentas"> subtotal: <strong> {{ totalDeVentas}} </strong> </p>
  <p v-else>Agregue productos al listado</p>
</div>
