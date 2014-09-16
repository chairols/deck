<?php

class Instagram_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     *  
     */
    public function get_where($datos) {
        $query = $this->db->get_where('instagram', $datos);
        
        return $query->row_array();
    }
    
    /*
     *  
     */
    public function gets_where($datos) {
        $query = $this->db->get_where('instagram', $datos);
        
        return $query->result_array();
    }
    
    /*
     *  
     */
    public function set($datos) {
        $this->db->insert('instagram', $datos);
    }
    
    public function delete($idinstagram) {
        $datos = array(
            'idinstagram' => $idinstagram
        );
        $this->db->delete('instagram', $datos);
    }
}
?>