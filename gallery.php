

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
            <div class="cards-container">
                <?php
                    include("connection.php");
                    
                    $sql = "SELECT * FROM cities";
                    $result=mysqli_query($conn, $sql);

                    if(!$result){
                        die("لاتوجد نتائج");
                    }

                    while($row = $result->fetch_assoc()){
                        echo '
                        <a href=details.php?id=' . $row['id'] . '>
                            <div class="card"><img src="' . $row['main_image'] . '" alt="' . $row['name'] .'">
                                <br>
                                <h2>' . $row['name'] . '</h2>
                                <p><b>' . $row['description'] . '</b></p>
                            </div>
                        </a>
                        ';
                    }
                ?>
            </div>
        </main>

        <footer>
            <p><small>تم تصميم الموقع من قبل طلاب جامعة الملك سعود &copy;<br>الوليد المطيري , البراء الموصللي </small></p>
        </footer>
    </body>
</html>
