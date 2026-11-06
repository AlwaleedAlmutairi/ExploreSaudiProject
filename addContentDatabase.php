<?php
include("connection.php");
include("uploadFile.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $regionName    = $_POST['cityname'] ?? '';
    $regionDesc    = $_POST['regDesc'] ?? '';
    $generalsOrgin = $_POST['generalinfo'] ?? '';
    $famousesOrgin = $_POST['famousplaces'] ?? '';
    
    $mainImagePath = uploadFile('mainimage');

    $sqlcityins = "INSERT INTO `citys` (`id`, `name`, `description`, `main_image`) VALUES (NULL, '$regionName', '$regionDesc', '$mainImagePath');";

    
    if ($conn->query($sqlcityins) === TRUE) {
        $id = $conn->insert_id;


        #generalinfos
        $generals = explode(',', $generalsOrgin);
        foreach ($generals as $information) {
            $information = trim($information);
            $sqlgenins = "INSERT INTO `general` (`id`, `city_id`, `info`) VALUES (NULL, '$id', '$information');";
            $conn->query($sqlgenins);
        }

        #famousplaces
        $famous = explode(',', $famousesOrgin);
        foreach ($famous as $place) {
            $place = trim($place);
            $sqlfeamousins = "INSERT INTO `famous` (`id`, `city_id`, `name`) VALUES (NULL, '$id', '$place');";
            $conn->query($sqlfeamousins);
        }


        #galleray
        if (isset($_FILES['gallaryimages']) && !empty($_FILES['gallaryimages']['name'][0])) {
            $totalFiles = count($_FILES['gallaryimages']['name']);

            for ($i = 0; $i < $totalFiles; $i++) {
                if ($_FILES['gallaryimages']['error'][$i] === UPLOAD_ERR_OK) {
                    $fileTmpPath   = $_FILES['gallaryimages']['tmp_name'][$i];
                    $fileName      = $_FILES['gallaryimages']['name'][$i];
                    $fileNameCmps  = explode(".", $fileName);
                    $fileExtension = strtolower(end($fileNameCmps));
                    $uploadDir = './regions/';
                    $newFileName = md5(time() . rand() . $fileName) . '.' . $fileExtension;
                    $dest_path   = $uploadDir . $newFileName;

                    if (move_uploaded_file($fileTmpPath, $dest_path)) {
                        $sqlGallery = "INSERT INTO `gallery` (`id`, `city_id`, `image_path`) VALUES (NULL, '$id', '$dest_path');";
                        $conn->query($sqlGallery);
                    }
                }
            }

        }
        echo "تمت الاضافة بنجاح";
    }
    else{
        echo "حدث خطأ في الاضافة حاول مجددا";
    }
}

?>