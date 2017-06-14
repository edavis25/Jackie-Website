<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function request_info() {
        
    }
    
    public function show_request_form($listing_id) {
        $listing_id = $this->security->xss_clean($listing_id);
        $this->load->model('Listing');

        $data = array();
        // Flag for different action when submitting from modal
        $data['modal'] = true;

        $data['listing'] = Listing::getListingById($listing_id);
        $this->load->view('includes/request-info-form', $data);
    }

    public function send_email() {
        $post_data = $this->input->post();
        
        // Setup mail config
        $user = '';                             // !!! Enter mailer login info here
        $pass = '';
        $config = array(
            'protocol' => 'smtp',
            //'smtp_host' => 'smtp.bizmail.yahoo.com',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => $user,
            'smtp_pass' => $pass,
            'newline' => "\r\n",
            'crlf' => "\r\n",
            'mailtype'  => 'html',
            'validate' => true
        );
        $this->load->library('email');
        $this->email->initialize($config);

        // Create email
        $this->email->from($user, 'Mailer');
        $this->email->to('davis.25811@gmail.com', 'Jackie');                // Change email to Jackie/Drew addy
        $this->email->subject('User Request For Property Information');
        
        //Create message
        $message = "A user has requested information for a property!<br />";
        $message .= "<ul><li><b>Message:</b> " . $post_data['message'] . "</li>";
        $message .= "<li><b>Contact Information:</b> ";
        $message .= "<ul><li><b>Name:</b> " . $post_data['first-name'] . ' ' . $post_data['last-name'] . "</li>";
        $message .= "<li><b>Email:</b> " . $post_data['email'] . "</li>";
        $message .= "<li><b>Phone:</b> " . $post_data['phone'] . "</li></ul>";
        $message .= "</ul>";

        $this->email->message($message);
        $status = $this->email->send();

        $data = array();
        if ($status) {
            $data['status'] = 'success';    // Send Bootstrap class
            $data['message'] = 'Success! Your inquiry for more information has been sent and we will contact you shortly!';
        }
        else {
            $data['status'] = 'danger';
            $data['message'] = 'Error! There was a problem with your message. Please refresh and try again later or email us directly at jackie@jackieplank.com';
        }

        // Check modal action flag (redirect if form submit from modal)
        if ($post_data['modal']) {
            $this->session->set_flashdata('message_type', $data['status']);
            $this->session->set_flashdata('message_content', $data['message']);
            redirect(base_url('listings'));
        }
        else {
            $this->load->view('includes/request-info-status', $data);
        }
    }
}