<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<h2 class="text-center">Clientes</h2>
<hr>
<div class="row">
  <a href="<?php echo base_url('/clientes/crear');?>" class="btn btn-primary pull-right" title="Agregar un nuevo proveedor"><i class="fa fa-plus"></i></a>
</div>
<table class="table table-striped">
  <thead>
    <th>#</th>
    <th>Nombre de cliente</th>
    <th>Localidad</th>
    <th>Contacto</th>
    <th>Tipo de cliente</th>
    <th>Opciones</th>
  </thead>
  <tbody>
    <?php foreach ($clientes as $c):?>
    <tr>
      <td><?php echo $c['id_cliente'];?></td>
      <td><?php echo $c['nombre_cliente'];?></td>
      <td><?php echo $c['nombre_localidad'];?></td>
      <td><?php echo $c['contacto'];?></td>
      <td><?php echo $c['tipo_cliente'];?></td>
      <td>
        <div class="btn-group">
          <a href="<?php echo base_url("clientes/ver/".$c['id_cliente']); ?>" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
          <a href="<?php echo base_url("clientes/actualizar/".$c['id_cliente']); ?>" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
          <button type="button" data-toggle="modal" data-target="#modal-eliminar-<?php echo $c['id_cliente']; ?>" class="btn btn-primary"><i class="fa fa-trash" aria-hidden="true"></i></button>
        </div>
      </td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>
<?php foreach( $clientes as $c):?>
  <div class="modal fade" id="modal-eliminar-<?php echo $c['id_cliente']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3>Confirmación</h3>
        </div>
        <div class="modal-body">
          ¿Desea eliminar este cliente `<?php echo $c['nombre_cliente']; ?>`?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">No</span></button>
          <a href="<?php echo base_url("clientes/eliminar/".$c['id_cliente']); ?>" class="btn btn-danger">Sí</a>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>
