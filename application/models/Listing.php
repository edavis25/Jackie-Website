<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'Model.php';

class Listing extends Model {
    private static $db;
    protected $address;
    protected $neighborhood;
    protected $price;
    protected $sq_ft;
    protected $bedrooms;
    protected $bathrooms;
    protected $additional;
    protected $featured_image;
    protected $listing_type;
    
    public function __construct($array = array()) {
        parent::__construct(safeGet($array, 'id', null));
        self::$db = &get_instance()->db;
        $this->setAddress(safeGet($array, 'address', null));
        $this->setNeighborhood(safeGet($array, 'neighborhood', null));
        $this->setPrice(safeGet($array, 'price', null));
        $this->setSq_ft(safeGet($array, 'sq_ft', null));
        $this->setBedrooms(safeGet($array, 'bedrooms', null));
        $this->setBathrooms(safeGet($array, 'bathrooms', null));
        $this->setAdditional(safeGet($array, 'additional', null));
        $this->setFeaturedImage(safeGet($array, 'featured_image', null));
        $this->setListingType(safeGet($array, 'listing_type', null));
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
    
    public function getListingType() {
        return $this->listing_type;
    }
    public function setListingType($type) {
        $this->listing_type = $type;
    }
    
    public function insert() {
        $data = array(
            'address' => $this->getAddress(),
            'neighborhood' => $this->getNeighborhood(),
            'price' => $this->getPrice(),
            'sq_ft' => $this->getSq_ft(),
            'bedrooms' => $this->getBedrooms(),
            'bathrooms' => $this->getBathrooms(),
            'additional' => $this->getAdditional(),
            'featured_image' => $this->getFeaturedImage(),
            'listing_type' => $this->getListingType()
        );
        
        $this->db->insert('listings', $data);
        return $this->db->insert_id();
    }
    
    public static function getAllListings() {
        $rows = self::$db->get('listings')->result_array();
        return self::makeObjectsFromRows($rows, self::class);
    }
    
    public static function getListingsByType($type) {
        
    }
}
