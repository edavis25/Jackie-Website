<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Image extends Model {
    protected $original_filename;
    protected $filename;
    protected $extension;
    protected $size;
    
    public function __construct($array = array()) {
        parent::__construct(safeParam($array, 'id', null));
        $this->setOriginalFilename(safeParam($array, 'original_filename', null));
        $this->setFilename(safeParam($array, 'filename', null));
        $this->setExtension(safeParam($array, 'extension', null));
        $this->setSize(safeParam($array, 'size', null));
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
    public function setExtension($extension) {
        $this->extenstion = $extension;
    }
    
    public function getSize() {
        return $this->size;
    }
    public function setSize($size) {
        $this->size = $size;
    }
    
}