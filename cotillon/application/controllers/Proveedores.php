<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedores extends CI_Controller {
protected  $config_validacion=null;

function __construct(){
parent::__construct();
//cargar modelo

$this->load->model('proveedores_model');
$this->config_validacion = [
[
'field'=>'nombre',
'label'=>'Nombre',
'rules'=>'required|alpha_numeric_spaces',

],
[
'field'=>'id_localidad',
'label'=>'id',
'rules'=>'required|numeric',
],
[
'field'=>'contacto',
'label'=>'Contacto',
'rules'=>'required',

],

];
}


public function index(){
if ( ! $this->session->userdata('esta_logeado') ) {
// No esta logeado, mensaje de error
show_404();
} else {
    $data = array ('proveedores'=>$this->proveedores_model->lista(),
    'id_usuario_logueado'=>$this->session->userdata('id_usuario'),
    'es_admin_usuario_logueado'=>$this->session->userdata('es_admin'));

      $this->load->view('includes/header');
      $this->load->view('pages/proveedores/index', $data);
      $this->load->view('includes/footer');

}}

public function ver($id){

}

public function crear(){
if ( ! $this->session->userdata('esta_logeado') && $this->session->userdata('es_admin') ) {
// No esta logeado, mensaje de error
show_404();
}
else {// esta logeado


    $this->form_validation->set_rules($this->config_validacion);
    //mesajes de validaciones
    $this->form_validation->set_message('required', "<strong>%s</strong> es un campo obligatorio. " );
    $this->form_validation->set_message('alpha_numeric_spaces', "<strong>%s</strong> solo se admite caracteres alfabéticos." );
    $this->form_validation->set_message('numeric', "<strong>%s</strong> es un campo unicamente numérico.");



//delimitadores de errores
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> ', '</div>');

    $this->load->model('localidades_model');
    $data=[
      'localidades' => $this->localidades_model->lista()
    ];
if ( $this->form_validation->run() === FALSE ) {
//llego por primera vez
    $this->load->view('includes/header');
    $this->load->view('pages/proveedores/crear' , $data );
    $this->load->view('includes/footer');
}
else {
// Envié el formulario
    $this->proveedores_model->crear(
    $this->security->xss_clean( $this->input->post('nombre_proveedor') ),
    $this->security->xss_clean( $this->input->post('contacto') ),
    $this->security->xss_clean( $this->input->post('id_localidad') )
);

    $data['exito']=TRUE;
    $data['proveedor']=htmlentities($this->input->post(nombre_proveedor));


    $this->load->view('includes/header');
    $this->load->view('pages/proveedores/crear', $data);
    $this->load->view('includes/footer');


}
}

}

public function actualizar($id ){

}

public function eliminar($id){

}
}
