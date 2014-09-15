<?php

class Planes extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->load->view('layout/header');
        $this->load->view('layout/left');
        $this->load->view('planes/index');
        $this->load->view('layout/footer');
    }
}
?>