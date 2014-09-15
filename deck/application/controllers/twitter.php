<?php

class Twitter extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session'
        ));
        $this->load->model(array(
            'cuentas_model',
            'planes_model'
        ));
        $this->load->helper(array(
            'url'
        ));
        
        $session = $this->session->all_userdata();
        if(is_null($session['SID'])) {
            redirect('/usuarios/logout/', 'refresh');
        }
    }
    
    public function callback() {
        define('TWITTER_CONSUMER_KEY', 'M35kBucVDfpQ9AxOc5azYczE4');
        define('TWITTER_CONSUMER_SECRET', 'HT2UIlEoYNQzmQXF1uwyDiMISN2M1CPLsD7iLqARPenVtpFZgc');

        $session = $this->session->all_userdata();
        
        $token = $this->input->get('oauth_token');
        $verifier = $this->input->get('oauth_verifier');
        
        $this->load->library(array(
            'twitteroauth'
        ));
        
        $connection = $this->twitteroauth->create(TWITTER_CONSUMER_KEY, TWITTER_CONSUMER_SECRET, $token, $verifier);
        $access_token = $connection->getAccessToken($verifier);
        $connection = $this->twitteroauth->create(TWITTER_CONSUMER_KEY, TWITTER_CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
        $connection = $this->twitteroauth->create(TWITTER_CONSUMER_KEY, TWITTER_CONSUMER_SECRET, $connection->token->key, $connection->token->secret);
        
        $settings = $connection->get('account/settings');
        
        $datos = array(
            'key' => $connection->token->key,
            'secret' => $connection->token->secret
        );
        
        $cuenta = $this->cuentas_model->get_where($datos);
        if(empty($cuenta)) {
            $plan = $this->planes_model->get($session['SID']);
            $datos = array(
                'idusuario' => $session['SID']
            );
            $cuentas = $this->cuentas_model->gets_where($datos);
            // Chequeo que se puedan agregar cuentas segun plan
            
            
            if(count($cuentas) < intval($plan['cuentas'])) { 
                $datos = array(
                    'cuenta' => $settings->screen_name,
                    'key' => $connection->token->key,
                    'secret' => $connection->token->secret,
                    'idusuario' => $session['SID'],
                    'red_social' => 'twitter',
                    'activo' => 1
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
}
?>