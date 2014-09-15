<?php

class Cuentas_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    /*
     *  twitter/callback
     */
    public function get_where($datos) {
        $query = $this->db->get_where('cuentas', $datos);
        
        return $query->row_array();
    }
    
    /*
     *  twitter/callback
     */
    public function gets_where($datos) {
        $query = $this->db->get_where('cuentas', $datos);
        
        return $query->result_array();
    }
    
    /*
     *  twitter/callback
     */
    public function set($datos) {
        $this->db->insert('cuentas', $datos);
    }
    
    public function delete($idcuenta) {
        $datos = array(
            'idcuenta' => $idcuenta
        );
        $this->db->delete('cuentas', $datos);
    }
}
?>