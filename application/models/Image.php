<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Image extends Model {
    private static $db;
    protected $original_filename;
    protected $filename;
    protected $extension;
    protected $size;
    protected $listing_id;
    
    public function __construct($array = array()) {
        parent::__construct(safeGet($array, 'id', null));
        self::$db = &get_instance()->db;
        $this->setOriginalFilename(safeGet($array, 'original_filename', null));
        $this->setFilename(safeGet($array, 'filename', null));
        $this->setExtension(safeGet($array, 'extension', null));
        $this->setSize(safeGet($array, 'size', null));
        $this->setListingId(safeGet($array, 'listing_id', null));
    }
    
    public function getOriginalFilename() {
        return $this->original_filename;
    }
    public function setOriginalFilename($name) {
        $this->original_filename = $name;
    }
    
    public function getFilename() {
        return $this->filename;
    }
    public function setFilename($name) {
        $this->filename = $name;
    }
    
    public function getExtension() {
        return $this->extension;
    }
    public function setExtension($ext) {
        $this->extension = $ext;
    }
    
    public function getSize() {
        return $this->size;
    }
    public function setSize($size) {
        $this->size = $size;
    }
    
    public function getListingId() {
        return $this->listing_id;
    }
    public function setListingId($id) {
        $this->listing_id = $id;
    }
    
    public function insert() {
        $data = array(
            'original_filename' => $this->getOriginalFilename(),
            'filename' => $this->getFilename(),
            'extension' => $this->getExtension(),
            'size' => $this->getSize(),
            'listing_id' => $this->getListingId()
        );
        
        $this->db->insert('images', $data);
        
        // Set objects ID
        $id = $this->db->insert_id();
        $this->setId($id);
        return $id;
    }
    
    public function update() {
        $data = array(
            'original_filename' => $this->getOriginalFilename(),
            'filename' => $this->getFilename(),
            'extension' => $this->getExtension(),
            'size' => $this->getSize(),
            'listing_id' => $this->getListingId()
        );
        
        $this->db->where('id', $this->getId());
        $this->db->update('images', $data);
    }
    
    public function delete() {
        $this->db->where('id', $this->getId());
        $this->db->delete('images');
    }
    
    public static function getImageById($id) {
        $row = self::$db->where('id', $id)->get('images')->row_array();
        return self::makeObjectFromRow($row, self::class);
    }
    
    public static function getImagesByListingId($id) {
        $rows = self::$db->where('listing_id', $id)->get('images')->result_array();
        return self::makeObjectsFromRows($rows, self::class);
    }
}