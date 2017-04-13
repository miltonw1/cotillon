<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<h2 class="text-center">Categorías</h2>

<div class="row">
 <a href="<?php echo base_url('/categorias/crear');?>" class="btn btn-primary pull-right" title="Agregar una nueva categoria"><i class="fa fa-plus"></i></a>
</div>

<hr>
    <table class="table table-striped">

        <thead>
            <tbody>
                    <th>#</th>
                    <th>Categoría</th>


                   <th>Opciones</th>

              </thead>

            </tbody>
            <?php
            foreach($categorias as $cat):  ?>
                <tr>
                    <td>
                        <?php echo $cat['id_categoria']; ?> </td>
                    <td>
                        <?php echo $cat['nombre_categoria'] ?> </td>



                    <td>

                      <a href="<?php echo base_url("categorias/ver_productos/".$cat['id_categoria']); ?>" class="btn btn-primary" title="Ver los productos correspondientes a esta categoría">Productos <i class="fa fa-eye" aria-hidden="true"></i></a>

                      <?php if( $es_admin_usuario_logueado ): ?>
                      <a href="<?php echo base_url("categorias/actualizar/".$cat['id_categoria']); ?>" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                      <?php endif; ?>
                    </td>
                </tr>
                <?php    endforeach;  ?>
    </table>
