<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('listing');
        $this->load->model('image');
    }
    
    public function index() {
        $data = array();
        $data['active'] = 'home';
        
        $data['listings'] = Listing::getAllListings();
        
        $this->load->view('homepage_view', $data);
    }
    
}
