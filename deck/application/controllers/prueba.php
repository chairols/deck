<?php

class Prueba extends CI_Controller {
    public function index() {
        $this->load->library('instagram_api');
        $algo = $this->instagram_api->instagramLogin();
        var_dump($algo);
    }
}

?>
