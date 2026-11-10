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
    <body class="dark-mode">
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
                <form id="addcontform" action="addContentHandler.php" method="POST" enctype="multipart/form-data">
                    <h2>اضافة محتوى</h2>
                    <br>
                    <hr>
                    <br>
                    <table id="loginTable" class="tableaddcontent">

                        <tr>
                            <th><label for="cityn"><b>المدينة</b></label></th>
                            <th><input name="cityname" type="text" id="cityn"></th>
                        </tr>
                        <tr>
                            <th><label for="regDesc2"><b>الوصف</b></label></th>
                            <th><textarea name="description" id="regDesc2" rows="5" cols="21"></textarea></th>
                        </tr>
                        <tr>
                            <th><label for="ginfo"><b>معلومات عامة</b></label></th>
                            <th><textarea name="generalinfo" type="text" id="ginfo" rows="10" cols="42" placeholder="ضع فاصلة بين العناصر (أ,ب)"></textarea></th>
                        </tr>
                        <tr>
                            <th><label for="famousplac"><b>أبرز المعالم</b></label></th>
                            <th><textarea name="famousplaces" type="text" id="famousplac" rows="10" cols="42" placeholder="ضع فاصلة بين العناصر (أ,ب)"></textarea></th>
                        </tr>
                        <tr>
                            <th><label for="mainimg"><b>الصورة الرئيسية</b></label></th>
                            <th><input type="file" id="mainimg" name="mainimage" ></th>
                        </tr>
                        <tr>
                            <th><label for="gallerym"><b>معرض الصور</b></label></th>
                            <th><input type="file" id="gallerym" name="galleryimages[]" multiple></th>
                        </tr>
                        <tr><th colspan="2"><button type="submit" value="اضافة" id="loginbtn">اضافة</button></th></tr>
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
