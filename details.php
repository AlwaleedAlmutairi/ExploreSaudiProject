<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>أستكشف السعودية</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "icon" href = "logo/logo.svg">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <div id="inlinetop">
                <nav>
                    <a href="index.html">الرئيسية</a>
                    <a href="gallary.php">معرض المناطق</a>
                    <a href="login.html">دخول المشرف</a>
                    <a href="">الوضع الليلي</a>

                </nav>
                <div id="logoTitle">
                    <img src="logo/logo.svg" alt="Saudi Arabia Map Logo" id="logo">
                    <p><b>أستكشف السعودية</b></p>
                </div>
            </div>
        </header>



        <main>
            <div class="details-container">
                <?php 
                if (isset($_GET['id'])){
                    $id= $_GET['id'];
                    include("connection.php");
                    $sql = "SELECT c.id, c.name, c.description, c.main_image, (SELECT GROUP_CONCAT(name SEPARATOR ',') FROM famous WHERE city_id = c.id) AS famous_list, (SELECT GROUP_CONCAT(info SEPARATOR ',') FROM general WHERE city_id = c.id) AS general_list, (SELECT GROUP_CONCAT(image_path SEPARATOR ',') FROM gallery WHERE city_id = c.id) AS gallery_images FROM citys c WHERE c.id =$id;";

                    $result=mysqli_query($conn, $sql);

                    if ($result->num_rows === 0 || !$result) {
                        echo "<h2>يوجد خطا الرجاء التوجه الى معرض المناطق واختيار المنطقة التي تريدها</h2>";
                    }

                    while($row = $result->fetch_assoc()){
                        echo '
                        <img src="' . $row['main_image'] . '" alt="' . $row['name'] . '">
                        <br>
                        <h1>' . $row['name'] . '</h1>
                        <p class="descdetail"><b>الوصف : </b>' . $row['description'] . '</p>
                        <br>
                        ';
                        $generals = explode(',', $row['general_list']);
                        echo '
                        <section class="greendetails">
                        <p><b>: معلومات سريعة</b></p>
                            <ul class="rtl-list">
                        ';
                        foreach ($generals as $information) {
                            echo '<li>' . $information .'</li>';
                        }
                        echo '
                            </ul>
                        </section>
                        <br>
                        ';
                        $famous = explode(',', $row['famous_list']);
                        echo '
                        <section class="places">
                        <p><b>: أبرز المعالم</b></p>
                            <ul class="rtl-list">
                        ';
                        foreach ($famous as $place) {
                            echo '<li>' . $place .'</li>';
                        }
                        echo '
                            </ul>
                        </section>
                        <br>
                        ';
                        $images = explode(',', $row['gallery_images']);
                        echo '
                        <section class="imagesgalary-details">
                        <p><b>: معرض الصور</b></p>
                            <div class="gallery-grid">
                        ';
                        foreach ($images as $image) {
                            echo '
                            <div class="img-box">
                                <img src="' . $image . '" alt="' . $row['name'] . '">
                            </div>
                            ';
                        }
                        echo '
                            </div>
                        </section>
                        ';
                    }

                }
                ?>
            </div>
        </main>


        <footer>
            <p><small>تم تصميم الموقع من قبل طلاب جامعة الملك سعود &copy;<br>الوليد المطيري , البراء الموصللي </small></p>
        </footer>
    </body>
</html>