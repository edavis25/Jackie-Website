<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
    }

    public function index() {
        $this->load->view('upload_view', array('error' => ' '));
    }

    public function do_upload() {
        $this->load->library('upload');
        $this->load->helper('upload');
        
        $upload = new UploadDir('./uploads');
        //$data = $upload->getAllUploads('userfiles');
        $data = $upload->getSingleUpload('userfiles');
        
    }

}
