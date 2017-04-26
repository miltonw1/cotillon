<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class stocks_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

public function lista($id){
  $this->db->get('stock')->result_array();
}

public function leer($id){
$id=intval($id);
$this->db->where('id_stock', $id);
$this->db->get('stock')->row_arra();
  }

public function crear($id_producto, $cantidad){
  $id_producto=intval($id_producto);
  $cantidad=floatval($cantidad);
  $cantidad= $cantidad ? $cantidad:0.0;
  $this->db->insert('stock',['id_producto'=>$id_producto]);
}

public function actualizar($id_producto, $cantidad){
  $id_producto=intval($id_producto);
  $this->db->where('id_producto', $id_producto);
  $this->db->update('stock',['id_producto'=>$id_producto, 'cantidad'=>$cantidad] );
}

public function reducir($id_producto, $cantidad){
  $id_producto=intval($id_producto);
  $cantidad=floatval($cantidad);
  $cantidad= $cantidad ? $cantidad:0.0;
  $this->db->where('id_producto', $id_producto);
  $aux->$this->db->get('stock')->row();
  $if ($aux->cantidad >= $cantidad)

}

?>
