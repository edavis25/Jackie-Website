<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'Model.php';

class MLS_listing extends Model {
    private $beds;
    private $full_baths;
    private $half_baths;
    
    
    public function __construct($properties = array()) {
        parent::__construct(safeGet($properties, 'id', null));
        
    }
}