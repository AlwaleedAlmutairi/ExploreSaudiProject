<?php

include("auth.php");
include("connection.php");


//trim inputs
$cityname = trim($_POST['cityname'] ?? '');
$description = trim($_POST['description'] ?? '');
$generalinfo = substr(trim($_POST['generalinfo'] ?? ''), 1, -1);
$famousplaces = substr(trim($_POST['famousplaces'] ?? ''), 1, -1);

//nonempty
if (empty($cityname) || empty($description) || empty($generalinfo) || empty($famousplaces) || empty($_FILES['mainimage']['name'] || empty($_FILES['galleryimages']['name'][0]))) {
    exit("لا تترك حقول فارغة.");
}

//new main image
if($_FILES['mainimage']['error'] != 0){
    exit('حدث خطأ أثناء رفع الصورة الرئيسية.');
}

$temp_path = $_FILES['mainimage']['tmp_name'];
$org_name = $_FILES['mainimage']['name'];
$ext = pathinfo($org_name, PATHINFO_EXTENSION);

$new_main_image_name = 'images/' . $cityname . 'HEAD.' . $ext;

move_uploaded_file($temp_path, $new_main_image_name);

$main_image_name = $new_main_image_name;

//new city
$conn->execute_query(
    'INSERT INTO cities (name, description, main_image) VALUES(?, ?, ?);',
    [$cityname, $description, $main_image_name]
);

//new city id
$id = $conn->insert_id;

//general info
$generalArray = explode(',', $generalinfo);
foreach ($generalArray as $item) {
    $item = trim($item);
    if ($item != '') {//skip empty and trailing values
        $conn->execute_query('INSERT INTO general (city_id, info) VALUES (?, ?)', [$id, $item]);
    }
}

//landmarks
$famousArray = explode(',', $famousplaces);
foreach ($famousArray as $item) {
    $item = trim($item);
    if ($item != '') {
        $conn->execute_query('INSERT INTO famous (city_id, name) VALUES (?, ?)', [$id, $item]);
    }
}


//gallery

//new gallery dir
mkdir('images/' . $cityname);

//$_FILES['galleryimages'] = ['name' => [...], 'tmp_name' => [...], 'error' => [...]]
$fileCount = count($_FILES['galleryimages']['name']);

$gallery_dir = 'images/' . $cityname . '/';

for ($i = 0; $i < $fileCount; $i++) {
    $temp_path = $_FILES['galleryimages']['tmp_name'][$i];
    $org_name = $_FILES['galleryimages']['name'][$i];
    $ext = pathinfo($org_name, PATHINFO_EXTENSION);

    $err = $_FILES['galleryimages']['error'][$i];
    if($err != 0){
        exit('حدث خطأ في رفع صورة المعرض: ' . $org_name);
    }

    $new_path = $gallery_dir . $org_name . '.' . $ext;

    move_uploaded_file($temp_path, $new_path);
    $conn->execute_query('INSERT INTO gallery (city_id, image_path) VALUES (?, ?)', [$id, $new_path]);
}

header("Location: adminDashboard.php");
exit();

?>
