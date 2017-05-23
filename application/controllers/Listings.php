<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Listings extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('listing');
        $this->load->model('image');
        $this->load->model('listing_type');
    }
    
    public function index() {
        $data = array();
        $data['active'] = 'listings';
        
        $this->load->view('listings_view', $data); 
    }
    
    public function add_listing() {
        // TODO: Add validation. Also, fix logic to deal with images that were not added.
        // Perhaps use a stock photo for image coming soon or something
        
        $this->load->helper('upload');
        
        $listing_data = $this->input->post();
        
        // Get listing type
        $type = Listing_type::getTypeByName($listing_data['listing-type']);
        $listing_data['listing_type'] = $type->getId();
  
        // Upload featured image file (if exists)
        $upload = new UploadDir('./img/uploads');
        
        $featuredImg = $upload->getSingleUpload('featured-image');  // returns false if upload fails
        if ($featuredImg) {                                         // only create image if upload success
            $imgArr = $this->createImageArray($featuredImg);
            $img = new Image($imgArr);
            $listing_data['featured_image'] = $img->insert();       // Insert returns image id
        }

        // Insert listing and find the new listing id
        $listing = new Listing($listing_data);
        $id = $listing->insert();
        
        // Update featured image to add new listing id (if exists)
        if (isset($img)) {
            $img->setListingId($id);
            $img->update();
        }
        
        // Insert gallery images
        $this->uploadGalleryImages($id);
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
    
    // Upload gallery images (not including featured image)
    private function uploadGalleryImages($listing_id) {
        $upload = new UploadDir('./img/uploads');
        
        $files = $upload->getAllUploads('gallery-images');
        
        foreach ($files as $file) {
            $imgArr = $this->createImageArray($file);
            $imgArr['listing_id'] = $listing_id;
            $img = new Image($imgArr);
            $img->insert();
        }
    }
    
}
