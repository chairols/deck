<?php

class Usuarios_model extends CI_Model {
    
    public function __construct() {
        $this->load->database();
    }
    
    /*
     *  inicio/index
     */
    public function get_where($array) {
        $query = $this->db->get_where('usuarios', $array);
        return $query->row_array();
    }
    
    /*
     *  inicio/index
     */
    public function set($array) {
        $query = $this->db->insert('usuarios', $array);
        return $this->db->insert_id();
    }
    
    public function delete($id) {
        $this->db->delete('usuarios', array('idusuario' => $id));
    }
}

?>