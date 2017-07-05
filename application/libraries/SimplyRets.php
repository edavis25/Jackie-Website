<?php

class SimplyRets {
    
    private $api_user = 'simplyrets';
    private $api_pass = 'simplyrets';
    private $base_url = 'https://api.simplyrets.com/';
    
    public $last_url;
    public $total_count;

    public function __construct() {
        
    }
    
    public function test() {
        $url = $this->base_url . 'properties?q=texas';
        $json = $this->get($url, true);
        $headers = $json['headers'];
        $link = $this->getResponseLink($headers[7]);
        return $json;
    }
    
    // Textual keyword search
    // Searches for: listingId, streen #, street name, city, subdivision, ZIP
    public function keywordSearch($keyword, $params = array(), $includeHeaders = false) {        
        $url  = $this->base_url . 'properties?q=';
        $url .= urlencode($keyword);
        if (!empty($params)) {
            $url .= '&' . http_build_query($params);
        }
        return $this->get($url, $includeHeaders);
    }
    
    // Run direct query for a given full, paramerized url
    public function adHocQuery($url, $includeHeaders = false) {
        return $this->get($url, $includeHeaders);
    }

    // Retrieve JSON data from the API
    private function get($url, $includeHeaders = false) {
        $http_opts = array(
            'method' => 'GET',
            'timeout' => 10,
            'header' => "Accept: application/vnd.simplyrets-v0.1+json",
            'header'  => 'Authorization: Basic ' . base64_encode("{$this->api_user}:{$this->api_pass}")
        );
        
        $context_opts = array(
            'http' => $http_opts
         );
        
        $context = stream_context_create($context_opts);
        $feed = file_get_contents($url, false, $context);
        $json = json_decode($feed, true);
        $headers = $http_response_header;
        
        $this->last_url = $url;
        $this->total_count = $this->findTotalCount($headers);
        
         // If headers wanted return array w/ both json data and headers
         if ($includeHeaders) {
             $data = array(
                 'json' => $json,
                 'headers' => $headers
             );
             return $data;
         }       
        return $json;
    }

    public function getResponseLink($headers) {
        // 7 = array index for link
        $str = '';
        foreach ($headers as $header) {
            if (strpos($header, 'Link:') !== false) {
                $first = strrpos($headers[7], '<') + 1;
                $last = strrpos($headers[7], '>');
                $str = substr($headers[7], $first, $last-$first);
            }
        }
        return $str;
    }
    
    public function findTotalCount($headers) {
        //return $headers[11];
        $count = 0;
        foreach ($headers as $header) {
            if (strpos($header, 'X-Total-Count:') !== false) {
                $idx = strpos($header, ':') + 1;
                $count = substr($header, $idx);
            }
        }
        return $count;
    }
    
    function getBaseUrl() {
        return $this->base_url;
    }
    function getLastUrl() {
        return $this->last_url;
    }
    function getTotalCount() {
        return $this->total_count;
    }
}
