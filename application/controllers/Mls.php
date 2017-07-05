<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mls extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('SimplyRets');
        $this->load->model('listing');
    }
 
    public function listings() {
        $api = new SimplyRets();
        $keyword = $this->input->post('search');
        $params = array(
            'limit' => '5',
        );
        
        $response = $api ->keywordSearch($keyword, $params, true);
        $json = $response['json'];
        $totalCount = $api ->getTotalCount();
        //$link = $api ->getResponseLink($headers);
        
        $data = array(
            'active' => 'listings',
            'search' => $keyword,
            'listings' => $json,
            'count' => $totalCount,
            'page' => 1
        );
        
        $this->load->view('mls_listings_view', $data);
    }
    
    private function search() {
        
    }
}
