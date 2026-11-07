<?php

include("auth.php");
include("connection.php");


//trim inputs
$id = $_POST['id'];
$cityname = trim($_POST['cityname'] ?? '');
$description = trim($_POST['description'] ?? '');
$generalinfo = substr(trim($_POST['generalinfo'] ?? ''), 1, -1);
$famousplaces = substr(trim($_POST['famousplaces'] ?? ''), 1, -1);

//nonempty
if (empty($id) || empty($cityname) || empty($description) || empty($generalinfo) || empty($famousplaces)) {
    exit("لا تترك حقول فارغة.");
}

//original main image
$currentCity = ($conn->execute_query('SELECT * FROM cities WHERE id = ?', [$id]))->fetch_object();
if (!$currentCity) {
    exit("المدينة غير موجودة.");
}
$main_image_name = $currentCity->main_image;

//new main image
if (isset($_FILES['mainimage']) && !empty($_FILES['mainimage']['name'])) {//only change if new image uploaded

    if($_FILES['mainimage']['error'] != 0){
        exit('حدث خطأ أثناء رفع الصورة الرئيسية.');
    }

    $temp_path = $_FILES['mainimage']['tmp_name'];
    $org_name = $_FILES['mainimage']['name'];
    $ext = pathinfo($org_name, PATHINFO_EXTENSION);

    $new_main_image_name = 'images/' . $cityname . 'HEAD.' . $ext;

    if (!empty($currentCity->main_image)) {
        unlink($currentCity->main_image);//delete file
    }

    move_uploaded_file($temp_path, $new_main_image_name);
    $main_image_name = $new_main_image_name;
}
else{//no new main image (city name might have changed)
    $ext = pathinfo($currentCity->main_image, PATHINFO_EXTENSION);
    $new_main_image_name = 'images/' . $cityname . 'HEAD.' . $ext;
    $main_image_name = $new_main_image_name;
    rename($currentCity->main_image, $new_main_image_name);
}

//change gallery dir if new city name
if($currentCity->name != $cityname){
    rename('images/' . $currentCity->name, 'images/' . $cityname);
    $conn->execute_query(
    "UPDATE gallery SET image_path = REPLACE(image_path, ?, ?) WHERE city_id = ?",
    ['images/' . $currentCity->name, 'images/' . $cityname, $id]);
}

//update in cities
$conn->execute_query(
    'UPDATE cities SET name = ?, description = ?, main_image = ? WHERE id = ?',
    [$cityname, $description, $main_image_name, $id]
);

//general info
$conn->execute_query('DELETE FROM general WHERE city_id = ?', [$id]);
$generalArray = explode(',', $generalinfo);
foreach ($generalArray as $item) {
    $item = trim($item);
    if ($item != '') {//skip empty and trailing values
        $conn->execute_query('INSERT INTO general (city_id, info) VALUES (?, ?)', [$id, $item]);
    }
}

//landmarks
$conn->execute_query('DELETE FROM famous WHERE city_id = ?', [$id]);
$famousArray = explode(',', $famousplaces);
foreach ($famousArray as $item) {
    $item = trim($item);
    if ($item != '') {
        $conn->execute_query('INSERT INTO famous (city_id, name) VALUES (?, ?)', [$id, $item]);
    }
}

//gallery
if (isset($_FILES['galleryimages']) && !empty($_FILES['galleryimages']['name'][0])){

    $conn->execute_query('DELETE FROM gallery WHERE city_id = ?', [$id]);

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
}

header("Location: adminDashboard.php");
exit();

?>
