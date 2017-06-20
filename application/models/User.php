<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Model.php';

class User extends Model {
    private static $db;
    
    public function __construct() {
        parent::__construct();
        self::$db = &get_instance()->db;
    }
    
    // TODO: Add password hashing
    public static function isValidUser($username, $pass) {
        $user = self::$db->where('username', $username)->get('users')->row_array();
        
        if ($user) {
            if ($user['password'] == $pass) {
                return true;
            }
        }
        return false;
    }
}