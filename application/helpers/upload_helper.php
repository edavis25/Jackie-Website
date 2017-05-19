<?php

class UploadDir {
    private $dir;

    function __construct($dir = 'uploads') {
        $this -> dir = getcwd() . DIRECTORY_SEPARATOR . $dir;
        if (!is_dir($this -> dir)) {
            mkdir($this -> dir);
        }
    }

    private static function sanitizeFileName($str) {
        // get rid of consecutive dots
        $str = preg_replace('/\.\.+/', '.', $str);
        // get rid of trailing dots
        $str = preg_replace('/\.+$/', '', $str);
        // get rid of leading dots
        $str = preg_replace('/^\.+/', '', $str);
        // get rid of other nasty characters
        return preg_replace('/[^0-9a-zA-Z_\.-]/', '_', $str);
    }

    public function getUpload($files = null, $key = 0, $generate_name = false) {
        //if (isset($_FILES[$key])) {
        if (isset($files)) {
            //$tmp_name = $_FILES[$key]['tmp_name'];
            $tmp_name = $files['tmp_name'][$key];
            
            $nameOnDisk = ($generate_name) ? $this->generateName() : $files['name'][$key];
            
            $path = $this -> dir . DIRECTORY_SEPARATOR . $nameOnDisk;
            $success = move_uploaded_file($tmp_name, $path);
            if (!$success) {
                throw new Exception("Problem getting uploaded file.");
            }
            // @formatter:off
            $meta = array(
                'dir' => $this->dir,
                'nameOnDisk' => $nameOnDisk,
                'origName' => self::sanitizeFileName($files['name'][$key]),
                'type' => $files['type'][$key],
                'size' => $files['size'][$key],
                'error' => $files['error'][$key]
            );
            // @formatter:on
        }
        return $meta;
    }

    private function generateName() {
        do {
            $name = uniqid('upload');
        } while (is_file($this->dir . DIRECTORY_SEPARATOR . $name));
        return $name;
    }
    
    // Name of file HTML input
    public function getAllUploads($key) {
        $result = array();
        $count = sizeof($_FILES[$key]['name']);
        for ($i = 0; $i < $count; $i++) {
            $result[] = $this ->getUpload($_FILES[$key], $i);
        }
        return $result;
    }
    
    // Format single upload to match the weird nested arrays used for multiple
    // $_FILES uploads to resuse getUpload() function... because PHP
    public function getSingleUpload($key) {
        $arr = array();
        foreach($_FILES[$key] as $key => $meta) {
            $arr[$key] = array($meta);
        }
        
        $this->getUpload($arr);
        
    }
}