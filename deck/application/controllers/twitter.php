<?php

class Twitter extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'uri'
        ));
        $this->load->model(array(
            'twitter_model',
            'planes_model',
            'cuentas_model'
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
        $session = $this->session->all_userdata();
        $data['segment'] = $this->uri->segment(1);
        
        $datos = array(
            'idusuario' => $session['SID']
        );
        
        $data['twitter'] = $this->twitter_model->gets_where($datos);
        
        
        $this->load->library(array(
            'twitteroauth'
        ));
        $connection = $this->twitteroauth->create($this->config->item('consumer_key'), $this->config->item('consumer_secret'), $data['twitter']['0']['key'], $data['twitter'][0]['secret']);
        
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
        
        $this->load->view('layout/header');
        $this->load->view('layout/menu', $data);
        $this->load->view('twitter/index');
        $this->load->view('layout/footer');
    }
    
    public function callback() {
        $session = $this->session->all_userdata();
        
        $token = $this->input->get('oauth_token');
        $verifier = $this->input->get('oauth_verifier');
        
        $this->load->library(array(
            'twitteroauth'
        ));
        
        $connection = $this->twitteroauth->create($this->config->item('consumer_key'), $this->config->item('consumer_secret'), $token, $verifier);
        $access_token = $connection->getAccessToken($verifier);
        $connection = $this->twitteroauth->create($this->config->item('consumer_key'), $this->config->item('consumer_secret'), $access_token['oauth_token'], $access_token['oauth_token_secret']);
        $connection = $this->twitteroauth->create($this->config->item('consumer_key'), $this->config->item('consumer_secret'), $connection->token->key, $connection->token->secret);
        
        $settings = $connection->get('account/settings');
        
        $datos = array(
            'key' => $connection->token->key,
            'secret' => $connection->token->secret
        );
        
        $cuenta = $this->twitter_model->get_where($datos);
        if(empty($cuenta)) {
            $plan = $this->planes_model->get($session['SID']);
            $datos = array(
                'idusuario' => $session['SID']
            );
            $cuentas = $this->cuentas_model->gets_where($datos);
            // Chequeo que se puedan agregar cuentas segun plan
            
            
            if(count($cuentas) < intval($plan['cuentas'])) { 
                $datos = array(
                    'twitter' => $settings->screen_name,
                    'key' => $connection->token->key,
                    'secret' => $connection->token->secret,
                    'idusuario' => $session['SID'],
                    'activo' => 1
                );
                $id = $this->twitter_model->set($datos);
                
                $datos = array(
                    'tabla' => 'twitter',
                    'idtabla' => $id,
                    'idusuario' => $session['SID']
                );
                $this->cuentas_model->set($datos);
            }
        }

        /*
        $friends = $connection->get('friends/list');
        
        //var_dump($friends);
        foreach($friends->users as $friend) {
            echo $friend->name;
            echo "<br>";
            echo "<img src='".$friend->profile_image_url."'>";
            echo "<br><br><br>";
        }*/
        redirect('/cuentas/', 'refresh');
    }
    
    public function borrar($idtwitter) {
        $session = $this->session->all_userdata();
        
        $datos = array(
            'idtwitter' => $idtwitter,
            'idusuario' => $session['SID']
        );
        
        $cuenta = $this->twitter_model->get_where($datos);
        
        if(!empty($cuenta)) {
            $this->twitter_model->delete($idtwitter);
            $datos = array(
                'tabla' => 'twitter',
                'idtabla' => $idtwitter,
                'idusuario' => $session['SID']
            );
            $this->cuentas_model->delete($datos);
        }
        
        redirect('/cuentas/', 'refresh');
    }
}
?>