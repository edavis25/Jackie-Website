<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
    }
    
    public function index() {
        $this->load->view('login_view');
    }
    
    public function login () {
        $data = array('active' => '');
        
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|callback_validate_login');
        
        if ($this->form_validation->run() != FALSE) {
            log_message('debug', "*** SUCCESSFUL LOGIN *** From IP: {$this->input->ip_address()}", false);
            $this->session->loggedin = true;
            redirect(base_url('admin'));
        } 
        else {
            log_message('error', "*** FAILED LOGIN ATTEMPT *** From IP: {$this->input->ip_address()}", false);
            $this->load->view('login_view', $data);
        }
    }
    
    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url());
    }
    
    public function validate_login() {       
        $user = $this->input->post('username', true);
        $pass = $this->input->post('password', true);
        
        $this->load->model('User');
        $validUser = User::isValidUser($user, $pass);
        
        if ($validUser) {
            return true;
        }
        
        // Invalid user - set error message/return false
        $this->form_validation->set_message('validate_login', 'Invalid Login Credentials.');
        return false;
    }
}