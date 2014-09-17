<?php

class Instagram extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session',
            'uri'
        ));
        $this->load->model(array(
            'instagram_model',
            'planes_model',
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
    
    public function callback() {
        $session = $this->session->all_userdata();
        $this->load->library('instagram_api');
        
        $authorize = $this->instagram_api->authorize($_GET['code']);
       
        $datos = array(
            'token' => $authorize->access_token
        );
        $cuenta = $this->instagram_model->get_where($datos);
        if(empty($cuenta)) {
            $plan = $this->planes_model->get($session['SID']);
            $datos = array(
                'idusuario' => $session['SID']
            );
            $cuentas = $this->cuentas_model->gets_where($datos);
            
            if(count($cuentas) < intval($plan['cuentas'])) {
                $datos = array(
                    'instagram' => $authorize->user->username,
                    'token' => $authorize->access_token,
                    'idusuario' => $session['SID'],
                    'idexterno' => $authorize->user->id
                );
                $id = $this->instagram_model->set($datos);
                
                $datos = array(
                    'tabla' => 'instagram',
                    'idtabla' => $id,
                    'idusuario' => $session['SID']
                );
                $this->cuentas_model->set($datos);
            }
        }
        
        redirect('/cuentas/', 'refresh');
    }
    
    public function borrar($idinstagram) {
        $session = $this->session->all_userdata();
        
        $datos = array(
            'idinstagram' => $idinstagram,
            'idusuario' => $session['SID']
        );
        
        $cuenta = $this->instagram_model->get_where($datos);
        
        if(!empty($cuenta)) {
            $this->instagram_model->delete($idinstagram);
            $datos = array(
                'tabla' => 'instagram',
                'idtabla' => $idinstagram,
                'idusuario' => $session['SID']
            );
            $this->cuentas_model->delete($datos);
        }
        
        redirect('/cuentas/', 'refresh');
    }
}
?>