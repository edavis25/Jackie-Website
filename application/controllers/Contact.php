<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function request_info() {
        $data = $this->input->post();
        
        /* EXAMPLE. SET UP SMTP ADDRESS
        $this->load->library('email');
        $this->email->from('your@example.com', 'Your Name');
        $this->email->to('someone@example.com');
        $this->email->cc('another@another-example.com');
        $this->email->bcc('them@their-example.com');
    
        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');

        $this->email->send();
         */
    }
    
    public function show_request_form() {
        $this->load->view('includes/request-info-form');
    }
}