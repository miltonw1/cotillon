<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="col-xm-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 well">
<?php if ( isset($exito) and $exito ) {
echo '
<div class="alert alert-block alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4>Genial!</h4>
        Se ha modificado exitosamente el producto <strong>'.$producto['nombre'].
    '</div>';
}
echo form_open("/productos/actualizar/". $producto['id_producto'] )?>


  <div class="form-group">

      <label for="nombre">Nombre<?php echo form_error("nombre");?></label>
      <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php echo $producto['nombre'];?>">

      <label for="precio">Precio<?php echo form_error("precio");?></label>
      <input type="text" class="form-control" name="precio" placeholder="Precio" value="<?php echo $producto['precio'];?>" >

      <label for="id_proveedor">Proveedores<?php echo form_error("id_proveedor");?></label>
      <select name='id_proveedor' class='form-control' placeholder="Seleccionar un proveedor">
         <?php foreach ($proveedores as $prov){
           $aux = '<option value="' . $prov['id_proveedor'];
           $aux .= ( $producto['id_proveedor'] == $prov['id_proveedor'] ) ? '" selected>' : '">';
           $aux .= $prov['nombre_proveedor'] . "</option>\n";
           echo $aux;
       } ?>
      </select>
      <label for="categoria">Categorias<?php echo form_error("proveedor");?></label>
      <select name='id_categoria' class='form-control' placeholder="Seleccionar una categoria">
         <?php foreach ($categorias as $cat){
         $aux = '<option value="' . $cat['id_categoria'];
         $aux .= ( $producto['id_categoria'] == $cat['id_categoria'] ) ? '" selected>' : '">';
         $aux .= $cat['nombre_categoria'] . "</option>\n";
         echo $aux;
       } ?>
      </select>
       <label for="descripcion">Descripcion<?php echo form_error("descripcion");?></label>
       <textarea name="descripcion" class="form-control" maxlength=255 placeholder="Descripcion"><?php echo $producto['descripcion'];?></textarea>

  <input type="submit" class="btn btn-default" name="submit" value="Enviar">
  </div>

<?php echo form_close() ?>
</div>
