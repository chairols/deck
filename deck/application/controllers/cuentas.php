<?php

class Cuentas extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'uri',
            'twitteroauth'
        ));
        $this->load->model(array(
            'cuentas_model'
        ));
        $this->load->helper(array(
            'url'
        ));
        
        $session = $this->session->all_userdata();
        if(is_null($session['SID'])) {
            redirect('/usuarios/logout/', 'refresh');
        }
    }
    
    public function index() {
        $data['segment'] = $this->uri->segment(1);
        $session = $this->session->all_userdata();
        /*
         *  Obtencion del URL para twitter
         */
        $consumer_key = 'M35kBucVDfpQ9AxOc5azYczE4';
        $consumer_secret = 'HT2UIlEoYNQzmQXF1uwyDiMISN2M1CPLsD7iLqARPenVtpFZgc';
        $callback = 'http://deck.local/twitter/callback/';
        
        $connection = $this->twitteroauth->create($consumer_key, $consumer_secret);
        
        $request_token = $this->twitteroauth->getRequestToken($callback);
        $url = $this->twitteroauth->getAuthorizeURL($request_token);
        $data['twitter_url'] = $url;
        $datos = array(
            'idusuario' => $session['SID']
        );
        $data['cuentas'] = $this->cuentas_model->gets_where($datos);
        
        $this->load->view('layout/header');
        $this->load->view('layout/menu', $data);
        $this->load->view('cuentas/index');
        $this->load->view('layout/footer');
    }
    
}
?>