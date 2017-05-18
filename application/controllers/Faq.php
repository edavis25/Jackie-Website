<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {
    
    public function buyers() {
        $data = array();
        $data['active'] = 'buyers';
        
        $this->load->view('buyers_view', $data);
    }
    
    public function sellers() {
        $data = array();
        $data['active'] = 'sellers';
        
        $this->load->view('sellers_view', $data);
    }
    
}
