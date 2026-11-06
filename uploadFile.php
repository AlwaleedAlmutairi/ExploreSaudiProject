<?php

function uploadFile($fileKey, $uploadDir = './regions/') {
    
    
    if (!isset($_FILES[$fileKey]) || $_FILES[$fileKey]['error'] !== UPLOAD_ERR_OK) {
        return false;
    }
    
    $fileTmpPath   = $_FILES[$fileKey]['tmp_name'];
    $fileName      = $_FILES[$fileKey]['name'];
    

    $fileNameCmps  = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }
    

    $newFileName = md5(time() . rand() . $fileName) . '.' . $fileExtension;
    $dest_path   = rtrim($uploadDir, '/') . '/' . $newFileName;
    
    if (move_uploaded_file($fileTmpPath, $dest_path)) {
        return $dest_path;
    }
    
    return false;
}