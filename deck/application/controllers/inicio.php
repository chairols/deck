<?php

class Inicio extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'form_validation',
            'email'
        ));
        $this->load->model(array(
            'usuarios_model'
        ));
        $this->load->helper(array(
            'url'
        ));
    }
    
    public function index() {
        
        $data['alerta'] = '';
        
        if($this->input->post('tipo') == 'registrar') {
            $this->form_validation->set_rules('usuario', 'Usuario', 'required');
            $this->form_validation->set_rules('password1', 'Contraseña', 'required|matches[password2]');
            $this->form_validation->set_rules('email1', 'Email', 'required|matches[email2]');
            
            if($this->form_validation->run() == FALSE) {
                $data['alerta'] = "<div class='alert alert-danger'>Complete todos los campos correctamente.</div>";
            } else {
                $usuario = $this->usuarios_model->get_where(array('usuario' => $this->input->post('usuario')));
                if(empty($usuario)) {
                    $datos = array(
                        'usuario' => $this->input->post('usuario'),
                        'password' => $this->input->post('password1'),
                        'email' => $this->input->post('email1'),
                        'hash' => sha1($this->input->post('usuario').'+'.$this->input->post('password1').'@'.$this->input->post('email1'))
                    );
                    $idusuario = $this->usuarios_model->set($datos);
                    
                    $this->email->from('no-responder@');
                    $this->email->to($this->input->post('email1'));
                    $this->email->subject('Verificar cuenta');
                    $url = base_url().'usuarios/verificar/'.sha1($this->input->post('usuario').'+'.$this->input->post('password1').'@'.$this->input->post('email1'));
                    $this->email->message('Para verificar debe entrar al siguiente link '.$url);
                    if($this->email->send()) {
                        $data['alerta'] = "<div class='alert alert-success'>Se envió un correo para la verificación de la cuenta.</div>";
                    } else {
                        $this->db->delete($idusuario);
                        $data['alerta'] = "<div class='alert alert-danger'>No se pudo enviar el correo de verificación. Vuelva a registrarse.</div>";
                    }
                }
            }
        } elseif($this->input->post('tipo') == 'login') {
            
        }
        
        $this->load->view('layout/header');
        $this->load->view('layout/left');
        $this->load->view('inicio/index', $data);
        $this->load->view('layout/footer');
    }
}

?>