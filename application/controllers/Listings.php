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
        $data['active'] = 'listings';   // Active tab in navigation
       
        $data['listings'] = Listing::getListingsByType('sale');
        $listings = Listing::getListingsByType('sale');
        $data['rentals'] = Listing::getListingsByType('rental');
        
        /*
        $data['listings'] = array();
        // Set featured images
        foreach ($listings as &$listing) {
            // Add a new attribute containing the featured image object
            $id = $listing->getFeaturedImage();         
            
            $data['listings'][] = array(
                ['listing'] => $listing,
                ['image'] => Image::getImageById($listing->getFeaturedImage())
            );
            //$data['listings'][] = $listing;
            //$data['listings']['image'] = Image::getImageById($id);
            //$listing = (array)$listing;                                 // Cast object to array
            //$listing['image'] = Image::getImageById($id);               // Add new index for image object
            //$listing = (object)$listing;                                // Cast back to an object
        }
        
        var_dump($data['listings']); die;
         */
        $this->load->view('listings_view', $data); 
    }
    
    
    // Add a new listing
    public function add_listing() {
        
        // TODO: Add validation. Also, fix logic to deal with images that were not added.
        // Perhaps use a stock photo for image coming soon or something

       // $this->load->helper('upload');
        $this->load->helper('images');
        
        $listing_data = $this->input->post();
        
        // If updating info call update method instead
        if ($listing_data['listing-id']) {
            $this->update_listing($listing_data['listing-id'], $listing_data);
        }
        
        // Get listing type
        $type = Listing_type::getTypeByName($listing_data['listing-type']);
        $listing_data['listing_type'] = $type->getId();
  
        
        // Upload featured image file (if exists)
        /*
        $upload = new UploadDir('./img/uploads');
        
        $featuredImg = $upload->getSingleUpload('featured-image', true);    // returns false if upload fails
        if ($featuredImg) {                                                 // only create image if upload success
            $imgArr = $this->createImageArray($featuredImg);
            $img = new Image($imgArr);
            $listing_data['featured_image'] = $img->insert();               // Insert returns image id
        }
         */
        
        $listing_data['featured_image'] = uploadFeaturedImage('featured-image');    // Returns image id
        
        // Insert listing and find the new listing id
        $listing = new Listing($listing_data);
        $id = $listing->insert();
        
        // Update featured image to add new listing id (if exists)
        $img = Image::getImageById($listing_data['featured_image']);
        if (isset($img)) {
            $img->setListingId($id);
            $img->update();
        }
        
        // Insert gallery images
        //$this->uploadGalleryImages($id);
        uploadGalleryImages($id, 'gallery-images');
        
        
        $this->session->set_flashdata('message_type', 'success');
        $this->session->set_flashdata('message_content', 'New listing added!');
        
        redirect(base_url('admin'));
    }
    
    // Update a listing that already exists
    public function update_listing($id, $post_data) {
         
        $listing = Listing::getListingById($id);
        
        $listing->setAddress($post_data['address']);
        $listing->setNeighborhood($post_data['neighborhood']);
        $listing->setPrice($post_data['price']);
        $listing->setSq_ft($post_data['sq_ft']);
        $listing->setBedrooms($post_data['bedrooms']);
        $listing->setBathrooms($post_data['bathrooms']);
        $listing->setAdditional($post_data['additional']);
        
        $type = Listing_type::getTypeByName($post_data['listing-type']);
        $listing->setListingType($type->getId());
        
        $listing->update();
        
        $this->session->set_flashdata('message_type', 'success');
        $this->session->set_flashdata('message_content', 'Listing information updated!');
        
        redirect(base_url('admin'));
        die; // Die to stop rest of the add_listing function called by form submit
    }
    
    
    // Populate and show the edit listing modal
    public function edit_listing() {
        
        // Called from AJAX to edit existing listing
        $id = $this->input->get('listing-id');
        
        $data = array();
        $data['listing'] = Listing::getListingById($id);
        
        $this->load->view('includes/edit-listing-form', $data);
    }
    
    
    public function delete_listing() {

        $listing_id = $this->input->post('delete-id');
        $listing = Listing::getListingById($listing_id);
        
        $image_ids = array();
        $images = Image::getImagesByListingId($listing->getId());
        foreach($images as $image) {
            $image_ids[] = $image->getId();
        }
                
        $this->load->helper('images');
        $flash_info = remove_images($image_ids);     // Remove images from disk
        
        $listing->delete();
        $flash_message = "Listing {$listing->getAddress()} deleted.<br />";
        
        $flash_message .= $flash_info['status'];
        $this->session->set_flashdata('message_type', ($flash_info['error']) ? 'danger' : 'success');
        $this->session->set_flashdata('message_content', $flash_message);
        
        redirect(base_url('admin'));
    }
    
    /*      ****MOVED TO IMAGES HELPER***
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
        
        $files = $upload->getAllUploads('gallery-images', true);
        
        foreach ($files as $file) {
            $imgArr = $this->createImageArray($file);
            $imgArr['listing_id'] = $listing_id;
            $img = new Image($imgArr);
            $img->insert();
        }
    }
    */
}
