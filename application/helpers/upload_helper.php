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
    
     private function generateName() {
        do {
            $name = uniqid('upload');
        } while (is_file($this->dir . DIRECTORY_SEPARATOR . $name));
        return $name;
    }
    
    // Key = HTML name for the file input
    public function getAllUploads($key, $generate_name = false) {
        $result = array();
        
        if ($this->checkFilesExist($key, true)) {
            $count = sizeof($_FILES[$key]['name']);
            for ($i = 0; $i < $count; $i++) {
                $result[] = $this ->getUpload($_FILES[$key], $i, $generate_name);
            }
            
        }
        
        return $result;   // Always return array, even if no files found
    }
    
    // Format single upload to match the weird nested arrays used for multiple
    // $_FILES uploads to resuse getUpload function... because PHP
    public function getSingleUpload($key, $generate_name = false) {
        
        if ($this->checkFilesExist($key)) {
            $arr = array();
            foreach($_FILES[$key] as $key => $meta) {
                $arr[$key] = array($meta);
            }
        
            return $this->getUpload($arr, 0, $generate_name);
        }
        else {
            return false;
        }
        
    }
    
     // Don't call directly, call the getAllUploads for multiple or getSingleUploads for single
    public function getUpload($files = null, $key = 0, $generate_name = false) {
        if (isset($files)) {
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
    
    // Set $arr flag for checking multiple file uploads
    private function checkFilesExist($key, $arr = false) {
        
        if (empty($_FILES)) {
            return false;   // First check for empty superglobal before trying to use it
        }
        
        $file = $_FILES[$key];
        
        // If multiple files
        if ($arr) {
            if (!file_exists($file['tmp_name'][0]) || !is_uploaded_file($file['tmp_name'][0])) {
                return false;
            }
        }
        else {
            if (!file_exists($file['tmp_name']) || !is_uploaded_file($file['tmp_name'])) {
                return false;
            }
        }

        return true;
        
        // NOTE: The $_FILES array will always contain only 1 element, even for 
        // multiple uploads. For some reason PHP then nests metadata arrays inside of that 
        // single element for multiple uploads so this code is kind of gross...
    }
}