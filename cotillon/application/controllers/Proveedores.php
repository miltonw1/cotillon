<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedores extends CI_Controller
{

  protected $config_validacion = null;

  function __construct()
  {
    parent::__construct();
    $this->load->model('proveedores_model');

    $this->config_validacion = [
      [
        'field' => 'nombre_proveedor',
        'label' => 'Nombre del proveedor',
        'rules' => 'required|alpha_numeric_spaces'
      ], [
        'field' => 'localidad',
        'label' => 'Localidad',
        'rules' => 'required|numeric'
      ], [
        'field' => 'contacto',
        'label' => 'Contacto',
        'rules' => 'required'
      ]
    ];
  }

  public function index()
  {
    if ( ! $this->session->userdata('esta_logeado') ) {
      // No esta logeado, mensaje de error
      show_404();
    } else {
      $data = [
        'proveedores' => $this->proveedores_model->lista(),
        'es_admin_usuario_logueado' => $this->session->userdata('es_admin'),
      ];

      $this->load->view('includes/header');
      $this->load->view('pages/proveedores/index', $data);
      $this->load->view('includes/footer');
    }
  }

  public function crear()
{
  if ( ! $this->session->userdata('esta_logeado') && $this->session->userdata('es_admin') ) {
    // No esta logeado, mensaje de error
    show_404();
  } else {
    $this->form_validation->set_rules($this->config_validacion);

    //mensajes de validaciones
    $this->form_validation->set_message('required', "<strong>%s</strong> es un campo obligatorio.");
    $this->form_validation->set_message('alpha_numeric_spaces', "<strong>%s</strong> solo admite caracteres alfabéticos.");
    $this->form_validation->set_message('numeric', "<strong>%s</strong> es un campo unicamente numérico.");
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');

    $this->load->model('localidades_model');
    $data = [
      'localidades' => $this->localidades_model->lista()
    ];

    if ( $this->form_validation->run() === FALSE ) {
      $this->load->view('includes/header');
      $this->load->view('pages/proveedores/crear', $data);
      $this->load->view('includes/footer');
    } else {

      $this->proveedores_model->crear(
        $this->security->xss_clean( $this->input->post('nombre_proveedor')),
        $this->security->xss_clean( $this->input->post('contacto')),
        $this->security->xss_clean( $this->input->post('localidad'))
      );

      $data['exito'] = TRUE;
      $data['proveedor'] = htmlentities($this->input->post('nombre_proveedor'));


      $this->load->view('includes/header');
              $this->load->view('pages/proveedores/crear', $data);
              $this->load->view('includes/footer');
    }

  }
}

public function ver( $id )
  {
    if ( ! $this->session->userdata('esta_logeado') ) {
      // No esta logeado, mensaje de error
      show_404();
    } else {
      //Logeado
      $this->load->view('includes/header');

      $data=array('proveedores'=>$this->proveedores_model->lista(),
      'mensaje'=>"El proveedor que solicito no existe. Seleccione uno por favor");

    //  public function lista() {
      //      $this->db->join('localidades', 'localidades.id_localidad = proveedores.id_localidad');
        //    return $this->db->get('proveedores')->result_array();
        // }

      if ( $id == 0 ) {
        //No me paso un ID


      } else {
        //Me paso el ID
        $aux = $this->proveedores_model->leer( $id );
        //paso datos a vista

        if ( $aux ) {

        $data = array( 'proveedor' => $aux );

          //  $auxl = $this->localidades_model->$leer($proveedor['id_localidad']);
            // $locdata =array('localidad' => $auxl);


        $this->load->view('pages/proveedores/ver', $data);
        }

         else {

          //El proveedor que se busca no es valido


          $this->load->view('pages/proveedores/id_no_valido', $data);
        }
      }
      $this->load->view('includes/footer');
    }

    }


  public function actualizar( $id )
  {
    if ( ! $this->session->userdata('esta_logeado') ) {
      // No esta logeado, mensaje de error

      show_404();
    } else {
      $this->form_validation->set_rules($this->config_validacion);

      //mensajes de validaciones
      $this->form_validation->set_message('required', "<strong>%s</strong> es un campo obligatorio.");
      $this->form_validation->set_message('alpha_numeric_spaces', "<strong>%s</strong> solo admite caracteres alfabéticos.");
      $this->form_validation->set_message('numeric', "<strong>%s</strong> es un campo unicamente numérico.");
      $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');

      $this->load->model('localidades_model');
      $data = [
        'localidades' => $this->localidades_model->lista(),
        'proveedor' =>$this->proveedores_model->leer($id) ];
      if ( $this->form_validation->run() === FALSE ){

      $this->load->view('includes/header');
      $this->load->view('pages/proveedores/actualizar', $data);
      $this->load->view('includes/footer');
    }


      else {

        $data['proveedor']['id_proveedor']=$this->security->xss_clean($id);
        $data['proveedor']['nombre_proveedor']= $this->security->xss_clean( $this->input->post('nombre_proveedor'));
        $data['proveedor']['contacto']=$this->security->xss_clean( $this->input->post('contacto'));
        $data['proveedor']['id_localidad']=  $this->security->xss_clean( $this->input->post('localidad')) ;

        $data['exito'] = $this->proveedores_model->actualizar(
          $data['proveedor']['id_proveedor'],
          $data['proveedor']['nombre_proveedor'],
          $data['proveedor']['contacto'],
          $data['proveedor']['id_localidad']

        );





                $this->load->view('includes/header');
                $this->load->view('pages/proveedores/actualizar', $data);
                $this->load->view('includes/footer');

      }
    }

  }

  public function eliminar( $id )
  {
    if ( ! $this->session->userdata('esta_logeado') ) {
      // No esta logeado, mensaje de error
      show_404();
    } else {

    }
  }
  
}
