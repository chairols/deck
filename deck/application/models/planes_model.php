<?php
class Planes_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
        
    public function get($idusuario) {
        $query = $this->db->query("SELECT p.*
                                    FROM
                                        planes p,
                                        usuarios u
                                    WHERE
                                        u.idusuario = $idusuario AND
                                        u.plan = p.idplan");
        return $query->row_array();
    }
}
?>