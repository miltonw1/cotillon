<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Clientes_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

public function crear($nombre, $contacto, $localidad, $tipo_cliente){
//sanitizacion
$nombre=htmlentities($nombre);
$contacto=htmlentities($contacto);
$localidad=intval($localidad);
$tipo_cliente=htmlentities($tipo_cliente);

  $data = array(
    'nombre_cliente'=>$nombre,
    'contacto'=>$contacto,
    'id_localidad'=>$localidad,
    'tipo_cliente'=>$tipo_cliente.


  );

  $this->db->insert('clientes', $data);
}

public function leer($id){
  $id=intval($id);
$this->db->where('id',$id);
return $this->db->get(clientes)->result_array();
}

public function actualizar($id){
// sanitizacion
$id=intval($id);
$nombre=htmlentities($nombre);
$contacto=htmlentities($contacto);
$localidad=intval($localidad);
$tipo_cliente=htmlentities($tipo_cliente);

$data = array(
  'nombre_cliente'=>$nombre,
  'contacto'=>$contacto,
  'id_localidad'=>$localidad,
  'tipo_cliente'=>$tipo_cliente.


);
$this->db->where('id', $id);
$this->db->update('clientes', $data);
return boolval( $this->db->affected_rows() );
}


public function lista(){
  return $this->db->get('clientes')->result_array();

}


public function eliminar($id){
  $id=intval($id);

$this->db->where('id',$id);
$this->db->delete('clientes');
return boolval( $this->db->affected_rows() );
}
