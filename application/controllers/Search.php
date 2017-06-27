<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('SimplyRets');
        $this->load->model('listing');
    }
    
    public function index() {
       
    }
    
    public function search_term() {
        $data = array();
        $data['active'] = null;
        $api = new SimplyRets();
        $json = $api -> keywordSearch('texas');
        
        //$data = array();
        $data['listings'] = $json;
        //foreach ($json as $row) {
         //   $arr = array(
          //      'id' => $json['listingId']
           // );
            //$data['listings'] = 
        //}
        
        $this->load->view('mls_listings_view', $data);
    }
    
}