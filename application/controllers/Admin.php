<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function __construct() {
        
        parent::__construct();
        $this->load->model('listing');
        $this->load->model('image');
    }
    
    
    public function index() {
        $data = array();
        
        $data['listings'] = Listing::getAllListings();
        
        // Flag to show the image uploading buttons for new listing add form
        $data['new_listing_flag'] = true;
        
        $this->load->view('admin_view', $data);
    }
    
    
}