<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'Model.php';

class Listing extends Model {
    protected $address;
    protected $neighborhood;
    protected $price;
    protected $sq_ft;
    protected $bedrooms;
    protected $bathrooms;
    protected $additional;
    protected $featured_image;
    
    public function __construct($array = array()) {
        parent::__construct(safeGet($array, 'id', null));
        $this->setAddress(safeGet($array, 'address', null));
        $this->setNeighborhood(safeGet($array, 'neighborhood', null));
        $this->setPrice(safeGet($array, 'price', null));
        $this->setSq_ft(safeGet($array, 'sq_ft', null));
        $this->setBedrooms(safeGet($array, 'bedrooms', null));
        $this->setBathrooms(safeGet($array, 'bathrooms', null));
        $this->additional = (safeGet($array, 'additional', null));
        $this->setFeaturedImage(safeGet($array, 'featured_image', null));
    }
    
    public function getAddress() {
        return $this->address;
    }
    public function setAddress($addy) {
        $this->address =$addy;
    }

    public function getNeighborhood() {
        return $this->neighborhood;
    }
    public function setNeighborhood($neigh) {
        $this->neighborhood = $neigh;
    }
    
    public function getPrice() {
        return $this->price;
    }
    public function setPrice($price) {
        $this->price = $price;
    }
    
    public function getSq_ft() {
        return $this->sq_ft;
    }
    public function setSq_ft($sqft) {
        $this->sq_ft = $sqft;
    }
    
    public function getBedrooms() {
        return $this->bedrooms;
    }
    public function setBedrooms($bed) {
        $this->bedrooms = $bed;
    }
    
    public function getBathrooms() {
        return $this->bathrooms;
    }
    public function setBathrooms($bath) {
        $this->bathrooms = $bath;
    }
    
    public function getAdditional() {
        return $this->additional;
    }
    public function setAdditional($add) {
        $this->additional = $add;
    }
    
    public function getFeaturedImage() {
        return $this->featured_image;
    }
    public function setFeaturedImage($image) {
        $this->featured_image = $image;
    }
    
    public function insert() {
           
        $sql = "INSERT INTO listings (address, neighborhood, price, sq_ft, bedrooms, bathrooms, additional, featured_image) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $binds = array(
            $this->getAddress(),
            $this->getNeighborhood(),
            $this->getPrice(),
            $this->getSq_ft(),
            $this->getBedrooms(),
            $this->getBathrooms(),
            $this->getAdditional(),
            $this->getFeaturedImage()
        );
        $this->db->query($sql, $binds);
    }
}