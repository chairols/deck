<?php

class Instagram extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function callback() {
        var_dump($_REQUEST['code']);
        $this->load->library('instagram_api');
        
        $authorize = $this->instagram_api->authorize($_GET['code']);
        
        echo "<pre>";
        print_r($authorize);
        echo "</pre>";
    }
}
?>