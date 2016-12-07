
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
protected  $config_validacion=null;

  public function __construct() {

    parent::__construct();
    //cargar modelo
    $this->load->model('usuarios_model');


    $this->config_validacion = array(
                  array(
                    'field' => 'nombre',
                    'label' => 'Nombre',
                    'rules' => 'required|alpha_numeric_spaces'
                  ),
                  array(
                    'field' => 'apellido',
                    'label' => 'Apellido',
                    'rules' => 'required|alpha_numeric_spaces'
                  ),
                  array(
                    'field' => 'dni',
                    'label' => 'DNI',
                    'rules' => 'required|is_natural_no_zero|is_unique[usuarios.dni]'
                  ),

                  array(
                    'field' => 'password',
                    'label' => 'Contraseña',
                    'rules' => 'required'
                  ),

                  array(
                    'field' => 're-password',
                    'label' => 'Reingrese Contraseña',
                    'rules' => 'required|matches[password]'
                  ),

                  array(
                    'field' => 'email',
                    'label' => 'Email',
                    'rules' => 'required|valid_email|is_unique[usuarios.email]'
                  ),
                  array(
                    'field' => 'es_admin',
                    'label' => 'Permisos de Administración',
                    'rules' =>'required'
                  )
                );

  }



  public function index() {
    if ( ! $this->session->userdata('esta_logeado') ) {
      // No esta logeado, mensaje de error
      show_404();
    } else {
      //obtenes datos
      $data = array('usuarios' => $this->usuarios_model->lista(),
      'id_usuario_logueado'=>$this->session->userdata('id_usuario'),
      'es_admin_usuario_logueado'=>$this->session->userdata('es_admin'));

      //paso datos a vista
      $this->load->view('includes/header');
      $this->load->view('pages/usuarios/index', $data);
      $this->load->view('includes/footer');
    }
  }

  public function crear() {
    if ( ! $this->session->userdata('esta_logeado') && $this->session->userdata('es_admin') ) {
      // No esta logeado, mensaje de error
      show_404();
    } else {// esta logeado


            $this->form_validation->set_rules($this->config_validacion);
            //mesajes de validaciones
            $this->form_validation->set_message('required', "<strong>%s</strong> es un campo obligatorio. " );
            $this->form_validation->set_message('alpha_numeric_spaces', "<strong>%s</strong> solo se admite caracteres alfabéticos." );
            $this->form_validation->set_message('valid_email', "<strong>%s</strong> No es un e-mail valido. " );
            $this->form_validation->set_message('is_natural_no_zero', "<strong>%s</strong> es un campo unicamente numérico.");

            $this->form_validation->set_message('is_unique', "<strong>%s</strong> el e-mail ingresado ya esta registrado. " );
            $this->form_validation->set_message('matches', "<strong>%s</strong> las contraseñas no coinciden. " );

            //delimitadores de errores
      $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> ', '</div>');


          if ( $this->form_validation->run() === FALSE ) {
            //llego por primera vez
          $this->load->view('includes/header');
        	$this->load->view('pages/usuarios/crear');
          $this->load->view('includes/footer');
            }
 else {
        // Envié el formulario
        $this->usuarios_model->crear(
          $this->security->xss_clean( $this->input->post('nombre') ),
          $this->security->xss_clean( $this->input->post('apellido') ),
          $this->security->xss_clean( $this->input->post('email') ),
          $this->security->xss_clean( $this->input->post('dni') ),
          $this->input->post('password'),
          $this->security->xss_clean( $this->input->post('es_admin') )
        );
        $permiso = $this->security->xss_clean( $this->input->post('es_admin') ) == "1" ? "Administrador" : "No Administrador";

      $data = array(
      'exito' => TRUE,
      'usuario' => htmlentities($this->input->post('apellido').', '.$this->input->post('nombre') ),
      'permisos' => $permiso );

      $this->load->view('includes/header');
      $this->load->view('pages/usuarios/crear', $data);
      $this->load->view('includes/footer');


      }
}
  }
  public function ver( $id =  0 ) {
  if ( ! $this->session->userdata('esta_logeado') ) {
    // No esta logeado, mensaje de error
    show_404();
  } else {
    //Logeado
    $this->load->view('includes/header');
    if ( $id == 0 ) {
      //No me paso un ID

      $data=array('usuarios'=>$this->usuarios_model->lista(),
                  'mensaje'=>"Esta acción requiere de un usuario válido. Seleccione uno por favor");

    } else {
      //Me paso el ID
      $aux = $this->usuarios_model->leer_por_id( $id );
      //paso datos a vista
      if ( $aux ) {
        $data = array( 'usuario' => $aux );
        $this->load->view('pages/usuarios/ver', $data);
      } else {

        //El usuario que se busca no es valido
        $data=array('usuarios'=>$this->usuarios_model->lista(),
                    'mensaje'=>"El usuario que solicito no existe. Seleccione uno por favor");

        $this->load->view('pages/usuarios/id_no_valido', $data);
      }
    }
    $this->load->view('includes/footer');
  }
}



  public function actualizar( $id =  0 ) {
    if ( ! $this->session->userdata('esta_logeado') && $this->session->userdata('es_admin')) {
      // No esta logeado, mensaje de error
      show_404();



    } else {
      $nueva=$this->config_validacion;
      $nueva[2]['rules'] = 'required|is_natural_no_zero';
      $nueva[5]['rules'] = 'required|valid_email';
      unset($nueva[3]);
      unset($nueva[4]);
      $nueva=array_values($nueva);
      //Logeado

      $this->form_validation->set_rules($nueva);
      //mesajes de validaciones
      $this->form_validation->set_message('required', "<strong>%s</strong> es un campo obligatorio. " );
      $this->form_validation->set_message('alpha_numeric_spaces', "<strong>%s</strong> solo se admite caracteres alfabéticos." );
      $this->form_validation->set_message('valid_email', "<strong>%s</strong> No es un e-mail valido. " );
      $this->form_validation->set_message('is_natural_no_zero', "<strong>%s</strong> es un campo unicamente numérico.");
      $this->form_validation->set_message('is_unique', "<strong>%s</strong> el e-mail ingresado ya esta registrado. " );


      //delimitadores de errores
     $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> ', '</div>');




        //paso por id
        $aux = $this->usuarios_model->leer_por_id( $id );
        if ( $this->form_validation->run() === FALSE ) {

          //paso datos a vista
          $this->load->view('includes/header');
          if ( $aux ) {
            $data = array( 'usuario' => $aux );
            $this->load->view('pages/usuarios/actualizar', $data);
          } else {
            //El usuario que se busca no es valido
            $this->load->view('pages/usuarios/usuario_no_encontrado');
          }
          $this->load->view('includes/footer');
          }

          else{
            //tengo el id
            //me envio el formulario
            // Envié el formulario

            $aux['nombre']=$this->security->xss_clean( $this->input->post('nombre') );
            $aux['apellido']=$this->security->xss_clean( $this->input->post('apellido') );
            $aux['email']=$this->security->xss_clean( $this->input->post('email') );
            $aux['dni']=$this->security->xss_clean( $this->input->post('dni') );

            $aux['es_admin']=$this->security->xss_clean( $this->input->post('es_admin') );

            $this->usuarios_model->actualizar(

              $aux['id_usuario'],
              $aux['nombre'],
              $aux['apellido'],
              $aux['email'],
              $aux['dni'],
              $aux['es_admin']
            );


          $data = array(
          'exito' => TRUE,
          'usuario' => $aux )
           ;

          $this->load->view('includes/header');
          $this->load->view('pages/usuarios/actualizar', $data);
          $this->load->view('includes/footer');
          }

      }
    }


  public function eliminar( $id =  0 ) {
    if ( ! $this->session->userdata('esta_logeado') && $this->session->userdata('es_admin') ) {
      // No esta logeado, mensaje de error
      show_404();
    } else {
      //Logeado
      if ( $id == 0 ) {
        //No me paso un ID

      } else {
        //Me paso el ID
        $aux = $this->usuarios_model->leer_por_id( $id );
        //paso datos a vista
        $this->load->view('includes/header');
        if ( $aux ) {
          $data = array( 'usuario' => $aux );
          $this->load->view('pages/usuarios/eliminar', $data);
        } else {
          //El usuario que se busca no es valido
          $this->load->view('pages/usuarios/usuario_no_encontrado');
        }
        $this->load->view('includes/footer');
      }
    }
    }
}
