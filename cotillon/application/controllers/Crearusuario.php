
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class crearusuario extends CI_Controller{

	public function __construct() {
		parent::__construct();
	}

  public function index(){
		$titulo='titulo';
		$mensaje='mensaje';
    $data = array('titulo'=>$titulo, 'mensaje'=>$mensaje);
    $this->load->view("pages/inicio/crearusuario",$data);
  }
}




?>
