<?php

class Cuentas_model extends CI_Model { 
    public function __construct() {
        $this->load->database();
    }
    
    /*
     *  
     */
    public function get_where($datos) {
        $query = $this->db->get_where('cuentas', $datos);
        
        return $query->row_array();
    }
    
    /*
     *  twitter/callback
     *  instagram/callback
     * 
     */
    public function gets_where($datos) {
        $query = $this->db->get_where('cuentas', $datos);
        
        return $query->result_array();
    }
    
    /*
     *  twitter/callback
     *  instagram/callback
     * 
     */
    public function set($datos) {
        $this->db->insert('cuentas', $datos);
    }
    
    /*
     *  twitter/borrar
     *  instagram/borrar
     */
    public function delete($where) {
        $this->db->delete('cuentas', $where);
    }
}
?>