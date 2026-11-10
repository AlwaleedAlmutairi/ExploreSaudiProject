<?php include "auth.php"; ?>

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
                    <a href="gallery.php">معرض المناطق</a>
                    <a href="logout.php">تسجيل الخروج</a>
                    <a id="theme-toggle">الوضع الليلي</a>

                </nav>
                <div id="logoTitle">
                    <img src="logo/logo.svg" alt="Saudi Arabia Map Logo" id="logo">
                    <p><b>أستكشف السعودية</b></p>
                </div>
            </div>
        </header>



        <main>
            <div class="details-container loginbox">
                <form action="updateContentHandler.php" method="POST" enctype="multipart/form-data" id="Updatecontform">
                <?php
                        include("connection.php");

                        $row = ($conn->execute_query('SELECT * FROM cities WHERE id = ?', [$_GET['id']]))->fetch_object();
                ?>

                    <h2>تعديل المحتوى</h2>
                    <br>
                    <hr>
                    <br>
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($row->id) ?>">
                    <table id="loginTable" class="tableaddcontent">

                        <tr>
                            <th><label for="cityn"><b>المدينة</b></label></th>
                            <th><input name="cityname" type="text" id="cityn" value="<?php echo htmlspecialchars($row->name) ?>"></th>
                        </tr>
                        <tr>
                            <th><label for="passw"><b>الوصف</b></label></th>
                            <th><textarea name="description" rows="5" cols="21" id="cityd"> <?php echo htmlspecialchars($row->description) ?> </textarea></th>
                        </tr>
                        <!--- Don't change php placement to prevent extra whitespace --->
                        <tr>
                            <th><label for="ginfo"><b>معلومات عامة</b></label></th>
                            <th><textarea name="generalinfo" rows="10" cols="42" id="ginfo" placeholder="ضع فاصلة بين العناصر (أ,ب)"><?php
                                $info = array_column(($conn->execute_query('SELECT info FROM general WHERE city_id = ?', [$_GET['id']]))->fetch_all(), 0);
                                echo '(' . implode(',', $info) . ')';?></textarea></th>
                        </tr>
                        <tr>
                            <th><label for="famousplac"><b>أبرز المعالم</b></label></th>
                            <th><textarea name="famousplaces" type="text" id="famousplac" rows="10" cols="42" placeholder="ضع فاصلة بين العناصر (أ,ب)"><?php
                                $info = array_column(($conn->execute_query('SELECT name FROM famous WHERE city_id = ?', [$_GET['id']]))->fetch_all(), 0);
                                echo '(' . implode(',', $info) . ')';?></textarea></th>
                        </tr>
                        <tr>
                            <th><label for="mainimg"><b>الصورة الرئيسية (لا تدخل شيئًا للإبقاء على الصورة)</b></label></th>
                            <th><input type="file" id="mainimg" name="mainimage"></th>
                        </tr>
                        <tr>
                            <th><label for="gallerym"><b>تغيير الصور في معرض الصور (لا تدخل شيئًا للإبقاء على الصور)</b></label></th>
                            <!--- [] to make php see it as an array --->
                            <th><input type="file" id="gallerym" name="galleryimages[]" multiple></th>
                        </tr>
                        <tr><th colspan="2"><button type="submit" value="تعديل" id="updatebtn">تعديل</button></th></tr>
                    </table>
                </form>
            </div>
        </main>


        <footer id="footerhome">
            <p><small>تم تصميم الموقع من قبل طلاب جامعة الملك سعود &copy;<br>الوليد المطيري , البراء الموصللي </small></p>
        </footer>
        <script src="scripts.js"></script>
    </body>
</html>
