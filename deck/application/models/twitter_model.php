<?php

class Twitter_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     *  twitter/callback
     */
    public function get_where($datos) {
        $query = $this->db->get_where('twitter', $datos);
        
        return $query->row_array();
    }
    
    /*
     *  twitter/callback
     */
    public function gets_where($datos) {
        $query = $this->db->get_where('twitter', $datos);
        
        return $query->result_array();
    }
    
    /*
     *  twitter/callback
     */
    public function set($datos) {
        $this->db->insert('twitter', $datos);
    }
    
    public function delete($idtwitter) {
        $datos = array(
            'idtwitter' => $idtwitter
        );
        $this->db->delete('twitter', $datos);
    }
}
?>