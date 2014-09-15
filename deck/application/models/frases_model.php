<?php

class Frases_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function set($datos) {
        $this->db->insert('frases', $datos);
    }
    
    public function gets() {
        $query = $this->db->query("SELECT * FROM frases");
        return $query->result_array();
    }
}

?>