<?php

class Cuentas extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'uri',
            'twitteroauth',
            'instagram_api'
        ));
        $this->load->model(array(
            'twitter_model',
            'instagram_model'
        ));
        $this->load->helper(array(
            'url'
        ));
        $this->load->config('twitter');
        
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
        
        $connection = $this->twitteroauth->create($this->config->item('consumer_key'), $this->config->item('consumer_secret'));
        
        $request_token = $this->twitteroauth->getRequestToken($this->config->item('callback'));
        $url = $this->twitteroauth->getAuthorizeURL($request_token);
        $data['twitter_url'] = $url;
        
        /*
         *  Twitter
         */
        $datos = array(
            'idusuario' => $session['SID']
        );
        $data['twitters'] = $this->twitter_model->gets_where($datos);
        foreach ($data['twitters'] as $key => $value) {
            $connection = $this->twitteroauth->create($this->config->item('consumer_key'), $this->config->item('consumer_secret'), $value['key'], $value['secret']);
            $account = $connection->get('account/verify_credentials');
            $data['twitters'][$key]['followers'] = $account->followers_count;
            $data['twitters'][$key]['twitter'] = $account->screen_name;
            $data['twitters'][$key]['tweets'] = $account->statuses_count;
            $data['twitters'][$key]['imagen'] = $account->profile_image_url;
        }
        
        
        /*
         *  Obtencion de url para instagram
         */
        $data['instagram_url'] = $this->instagram_api->instagramLogin();
        
        /*
         *  Instagram
         */
        $datos = array(
            'idusuario' => $session['SID']
        );
        $data['instagram'] = $this->instagram_model->gets_where($datos);
        foreach ($data['instagram'] as $key => $value) {
            $this->instagram_api->access_token = $value['token'];
            $authorize = $this->instagram_api->getUser($value['idexterno']);
            $data['instagram'][$key]['imagen'] = $authorize->data->profile_picture;
            $data['instagram'][$key]['usuario'] = $authorize->data->username;
            $data['instagram'][$key]['followers'] = $authorize->data->counts->followed_by;
            $data['instagram'][$key]['posts'] = $authorize->data->counts->media;
        }
        
        $this->load->view('layout/header');
        $this->load->view('layout/menu', $data);
        $this->load->view('cuentas/index');
        $this->load->view('layout/footer');
    }
    
}
?>