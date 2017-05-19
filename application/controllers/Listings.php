<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Listings extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('listing');
        $this->load->model('image');
    }
    
    public function index() {
        $data = array();
        $data['active'] = 'listings';
        
        $this->load->view('listings_view', $data); 
    }
    
    public function add_listing() {
        $this->load->helper('upload');
        
        $post = $this->input->post();
        // Unset post values not used in object creation
        unset($post['featured-image']);
        unset($post['gallery-images']);
        unset($post['listing-type']);
  
        $upload = new UploadDir('./uploads');
        $featuredImg = $upload->getSingleUpload('featured-image');
        $imgArr = $this->createImageArray($featuredImg);

        $img = new Image($imgArr);
        $post['featured_image'] = $img->insert();
        
        $listing = new Listing($post);
        $listing->insert();
        var_dump($post);
        die;
    }
    
    // Convert returned metadata to image object creation array
    private function createImageArray($arr) {
        $result = array();
        $result['original_filename'] = $arr['origName'];
        $result['filename'] = $arr['nameOnDisk'];
        $result['extension'] = $arr['type'];
        $result['size'] = $arr['size'];
        return $result;
    }
    
}
