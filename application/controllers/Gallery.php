<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('listing');
        $this->load->model('image');
    }
    
    public function index() {
        $listing_id = $this->input->get('listing-id');
        $data['images'] = Image::getImagesByListingId($listing_id);
        
        $this->load->view('gallery_view', $data);
    }
    
}
    