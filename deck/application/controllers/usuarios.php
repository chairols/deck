<?php

class Usuarios extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'form_validation',
            'session'
        ));
        $this->load->model(array(
            'usuarios_model'
        ));
        $this->load->helper(array(
            'url'
        ));
    }
    
    public function login() {
        
        $this->form_validation->set_rules('usuario', 'Usuario', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $datos = array(
                'usuario' => $this->input->post('usuario'),
                'password' => $this->input->post('password'),
                'activo' => 1
            );
            
            $usuario = $this->usuarios_model->get_where($datos);
            
            if(!empty($usuario)) {
                $datos = array(
                    'SID' => $usuario['idusuario']
                );
                $this->session->set_userdata($datos);
                
                redirect('/cuentas/', 'refresh');
            }
        }
                
        $this->load->view('layout/header');
        $this->load->view('layout/left');
        $this->load->view('usuarios/login');
        $this->load->view('layout/footer');
    }
    
    public function logout() {
        $this->session->sess_destroy();
        redirect('/usuarios/login/', 'refresh');
    }
    
    public function prueba() {
        $this->load->library(array(
            'twitteroauth'
        ));
        $consumer_key = 'wUhvp9NkRHeSPuh189v4Swj8l';
        $consumer_secret = 'QEPeS3LQMB4jclceCTa3JX0YLNEylxUMEWftxuMoV7NmtMSMkA';
        $callback = 'http://localhost/prueba/twitter/callback.php';
        
        $connection = $this->twitteroauth->create($consumer_key, $consumer_secret);
        var_dump($connection);
        
        $request_token = $this->twitteroauth->getRequestToken($callback);
        $url = $this->twitteroauth->getAuthorizeURL($request_token);
        var_dump($url);
        /*
         * Una vez que autoriza, devuelve los datos
         */
        
        $token = "42560000-TEN1ejVIblETKOkUOwdd9eurbaKOUel3R7Z6vCkM3";
        $verifier = "BvjaLlw5W1Jo9YdRMqlRZYLVCAsUj7YPJ2sGr7yT3n90l";
        
        $connection = $this->twitteroauth->create($consumer_key, $consumer_secret, $token, $verifier);
        $friends = $connection->get('friends/list');
        foreach($friends->users as $friend) {
            echo $friend->name;
            echo "<br>";
            echo "<img src='".$friend->profile_image_url."'>";
            echo "<br><br><br>";
        }
        var_dump($friends);
    }
}
?>