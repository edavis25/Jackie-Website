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
            'limit' => $params['limit'],
            'page' => 1
        );
        
        $this->load->view('mls_listings_view', $data);
    }
    
    
    public function ajax_search($search, $last_mls_id, $offset, $limit) {
        $api = new SimplyRets();
        $params = array(
            'limit' => $limit,
            //'lastId' => $last_mls_id
            'offset' => $offset
        );
        $response = $api->keywordSearch($search, $params, true);
        $json = $response['json'];
        $totalCount = $api->getTotalCount();
        
        $data = array(
            'search' => $search,
            'listings' => $json,
            'count' => $totalCount,
            'limit' => $limit,
            //'page' => $offset+1
            'page' => ($offset < 1) ? 1 : $offset +1
        );
        
        $this->load->view('includes/mls-listings-preview', $data);
    }
    
}
