<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'Model.php';

class Listing_type extends Model {
    protected $type;
    private static $db;
    
    public function __construct($array = array()) {
        parent::__construct(safeGet($array, 'id', null));
        self::$db = &get_instance()->db;
        $this->setType(safeGet($array, 'type', null));
    }
    
    public function getType() {
        return $this->type;
    }
    public function setType($type) {
        $this->type = $type;
    }
    
    public static function getTypeByName($name) {
        $row = self::$db->where('type', $name)->get('listing_types')->row_array();
        return self::makeObjectFromRow($row, self::class);
    }
}