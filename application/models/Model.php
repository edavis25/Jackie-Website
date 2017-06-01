<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {
    protected $id;
    
    public function __construct($id = null) {
        $this->setId($id);
        // Need to turn on foreign key support with every connectin in SQLite
        $this->db->simple_query('PRAGMA foreign_keys = on');
    }
    
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    
    public static function makeObjectFromRow($row, $objType) {
        $obj = new $objType($row);
        return $obj;
    }
    
    public static function makeObjectsFromRows($rows, $objType) {
        $objs = array();
        foreach ($rows as $row) {
            $objs[] = self::makeObjectFromRow($row, $objType);
        }
        return $objs;
    }
}