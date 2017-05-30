<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Images extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('listing');
        $this->load->model('image');
    }
    
    
    public function edit_images() {
        
        $data = array();
        
        $listingId = $this->input->get('listing-id');
        $listing = Listing::getListingById($listingId);
        
        $data['featured_image'] = Image::getImageById($listing->getFeaturedImage());
        $data['gallery_images'] = Image::getImagesByListingId($listing->getId());
        
        $this->load->view('includes/edit-images-form', $data);
    }
    
    public function delete_images() {
        // Hidden fields created in javascript
        $ids = $this->input->post('delete-ids');
        
        $flash_error = false;
        $flash_content = '';
        
        foreach($ids as $id) {
            $img = Image::getImageById($id);
            $filename = $img->getFilename();
            
            $path = FCPATH . "img/uploads/$filename";
            
            if (is_writable($path)) {
                $img->delete();
                unlink($path);
                $flash_content .= "Image $filename removed successfully!<br />";
            }
            else {
                $flash_content .= "Error: $filename does not exist or does not have permission to delete.<br />";
                $flash_error = true;
            }
        }
        
        $this->session->set_flashdata('message_type', ($flash_error) ? 'danger' : 'success');
        $this->session->set_flashdata('message_content', $flash_content);
        
        redirect(base_url('admin'));
    }
    
}


