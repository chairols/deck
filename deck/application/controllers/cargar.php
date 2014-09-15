<?php

class Cargar extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model(array(
            'frases_model'
        ));
    }
    
    public function index() {
        $file = fopen('C:\\Users\\Hernan\\Desktop\\frases.txt', 'r') or exit('Error a abrir archivo');
        while(!feof($file)) {
            $texto = fgets($file);
            $texto = substr($texto, 49);
            $texto = substr($texto, 0, strlen($texto)-14);
            $datos = array(
                'frase' => $texto, 
                'idtema' => 1
            );
            $this->frases_model->set($datos);
            var_dump($datos);
        }
        fclose($file);
    }
    
    public function ver() {
        var_dump($this->frases_model->gets());
    }
}
?>