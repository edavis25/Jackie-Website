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

    public function search_term($offset = 0) {
        //$this->load->library('pagination');
        $data = array();
        $data['active'] = null;

        $api = new SimplyRets();
        $response = $api->adHocQuery('https://api.simplyrets.com/properties?q=texas&limit=1', true);
        $json = $response['json'];
        $headers = $response['headers'];
        //$link 
        //var_dump($response); die;

        $this->load->library("pagination");  // Load the pagination library in controller
        $data['alldata'] = $json; // fetch data from database
        $quantity = 10;  // no of records which are to be shown
        $data['listings'] = array_slice($data["alldata"], $offset, $quantity);
        $config['base_url'] = base_url('search/search_term'); //set the url
        $config['uri_segment'] = 3;
        $config['total_rows'] = count($data["alldata"]);
        $config['per_page'] = $quantity;
        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();

        $this->load->view('mls_listings_view-OLD', $data);
    }

}
