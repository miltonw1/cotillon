<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Productos_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

  public function crear($nombre,$precio,$id_proveedor,$categoria,$descripcion){

    $precio=floatval($precio);
    $id_proveedor=htmlentities($id_proveedor);
    $categoria=htmlentities($categoria);
    $descripcion=htmlentities($descripcion);


$data=array("id_proveedor"=>$id_proveedor
            "id_categoria"=>$categoria,
            "descripcion"=>$descripcion,
              "precio"=>$precio)

    $this->db->insert('productos',$data)
  }

  public function leer($id){
      $id=intval($id);
  }

  public function lista(){
      return $this->db->get('productos')->result_array();
  }

  public function actualizar($id,$precio,$id_proveedor,$categoria,$descripcion){
    $id=intval($id);
    $precio=floatval($precio);
    $id_proveedor=htmlentities($id_proveedor);
    $categoria=htmlentities($categoria);
    $descripcion=htmlentities($descripcion);



    $data=array("id_proveedor"=>$id_proveedor,
                "id_categoria"=>$categoria,
                "descripcion"=>$descripcion,
                "precio"=>$precio)
$this->db->where('id',$id);
$this->db->update('productos',$data);
return boolval( $this->db->affected_rows() );
  }


  public function eliminar($id){
      $id=intval($id);
      $this->db->where('id',$id);
      $this->db->delete('productos');
      return boolval( $this->db->affected_rows() );

  }
