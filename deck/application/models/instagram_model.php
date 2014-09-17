<?php

class Instagram_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     *  instagram/callback
     *  instagram/borrar
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
     *  instagram/callback
     */
    public function set($datos) {
        $this->db->insert('instagram', $datos);
        return $this->db->insert_id();
    }
    
    /*
     *  instagram/borrar
     */
    public function delete($idinstagram) {
        $datos = array(
            'idinstagram' => $idinstagram
        );
        $this->db->delete('instagram', $datos);
    }
}
?>