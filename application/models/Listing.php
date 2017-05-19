<?php

defined('BASEPATH') OR exit('No direct script access allowed');

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
        parent::__construct(safeParam($array, 'id', null));
        $this->setAddress(safeParam($array, 'address', null));
        $this->setNeighborhood(safeParam($array, 'neighborhood', null));
        $this->setPrice(safeParam($array, 'price', null));
        $this->setSq_ft(safeParam($array, 'sq_ft', null));
        $this->setBedrooms(safeParam($array, 'bedrooms', null));
        $this->setBathrooms(safeParam($array, 'bathrooms', null));
        $this->setAdditional(safeParam($array, 'additional', null));
        $this->setFeaturedImage(safeParam($array, 'featured_image', null));
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
    
}