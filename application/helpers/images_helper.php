<?php

// Note: You must load image model in the controller for most of these functions to work

require 'upload_helper.php';

function remove_images($ids) {
    $error = false;
    $status = '';
    
    foreach ($ids as $id) {
        $img = Image::getImageById($id);
        $filename = $img->getFilename();

        $path = FCPATH . "img/uploads/$filename";
        
        if (is_writable($path) && file_exists($path)) {
            $img->delete();
            unlink($path);
            $status .= "Image $filename removed successfully!<br />";
        } else {
            $status .= "Error: $filename does not exist or does not have permission to delete.<br />";
            $error = true;
        }
    }

    // Return array for setting flash data
    return array(
        'error' => $error,
        'status' => $status
    );
}


function uploadFeaturedImage($input_name) {
    $upload = new UploadDir('./img/uploads');

    $featuredImg = $upload->getSingleUpload($input_name, true);         // returns false if upload fails
    if ($featuredImg) {                                                 // only create image if upload success
        $imgArr = createImageArray($featuredImg);
        $img = new Image($imgArr);
        return $img->insert();                                          // Insert returns image id
    }
    
    return null;
}

function uploadGalleryImages($listing_id, $input_name) {
    $upload = new UploadDir('./img/uploads');

    $files = $upload->getAllUploads($input_name, true);

    foreach ($files as $file) {
        $imgArr = createImageArray($file);
        $imgArr['listing_id'] = $listing_id;
        $img = new Image($imgArr);
        $img->insert();
    }
}


function createImageArray($arr) {
    $result = array();
    $result['original_filename'] = $arr['origName'];
    $result['filename'] = $arr['nameOnDisk'];
    $result['extension'] = $arr['type'];
    $result['size'] = $arr['size'];
    return $result;
}
