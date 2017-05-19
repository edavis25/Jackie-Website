<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Image extends Model {
    protected $original_filename;
    protected $filename;
    protected $extension;
    protected $size;
    
    public function __construct($array = array()) {
        parent::__construct(safeGet($array, 'id', null));
        $this->setOriginalFilename(safeGet($array, 'original_filename', null));
        $this->setFilename(safeGet($array, 'filename', null));
        $this->setExtension(safeGet($array, 'extension', null));
        $this->setSize(safeGet($array, 'size', null));

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
    
    public function insert() {
        $data = array(
            'original_filename' => $this->getOriginalFilename(),
            'filename' => $this->getFilename(),
            'extension' => $this->getExtension(),
            'size' => $this->getSize()
        );
        
        $this->db->insert('images', $data);
        
        return $this->db->insert_id();
    }
}