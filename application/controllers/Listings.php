<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Listings extends CI_Controller {
    
    public function index() {
        $data = array();
        $data['active'] = 'listings';
        
        $this->load->view('listings_view', $data);
        
    }
    
}
