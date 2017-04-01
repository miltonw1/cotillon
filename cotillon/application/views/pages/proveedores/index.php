<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<h2 class="text-center">Proveedores</h2>
<hr>
    <table class="table table-striped">

        <thead>
            <tbody>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Localidad</th>
                    <th>Contacto</th>

                      <th>Opciones</th> 

              </thead>
            </tbody>
            <?php
            foreach($proveedores as $prov):  ?>
                <tr>
                    <td>
                        <?php echo $prov['id_proveedor']; ?> </td>
                    <td>
                        <?php echo $prov['nombre_proveedor'] ?> </td>
                    <td>
                        <?php echo $prov['nombre_localidad']; ?> </td>
                    <td>
                        <?php echo $prov['contacto']; ?> </td>







                    <td>

                        <a href="<?php echo base_url("proveedores/ver/".$prov['id_proveedor'] ); ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <?php if($es_admin_usuario_logueado): ?>
                        <a href="<?php echo base_url("proveedores/actualizar/".$prov['id_proveedor'] ); ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                        <?php endif; ?>
                    </td>
                </tr>
                <?php    endforeach;  ?>
    </table>
