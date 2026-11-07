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
                    <a href="">الوضع الليلي</a>

                </nav>
                <div id="logoTitle">
                    <img src="logo/logo.svg" alt="Saudi Arabia Map Logo" id="logo">
                    <p><b>أستكشف السعودية</b></p>
                </div>
            </div>
        </header>



        <main>
            <div class="details-container tablecontentP">
                <a class="addcontentbtn" href="addContent.php">اضافة</a>
                <table class="tablecontent">
                    <thead>
                    <tr><th id="tccode">الرمز</th> <th id="tccity">المنطقة</th> <th id="tcdesc">الوصف</th> <th class="actions" id="tcact">الإجراءات</th></tr>
                    </thead>

                    <?php
                        include("connection.php");

                        $sql = "SELECT * FROM cities";
                        $result=mysqli_query($conn, $sql);

                        if(!$result){
                            die("لاتوجد نتائج");
                        }
                    ?>
                    <?php foreach ($result as $row): ?>

                            <tr>
                                <td> <?php echo htmlspecialchars($row['id'])?> </td>
                                <td> <?php echo htmlspecialchars($row['name'])?> </td>
                                <td class="dashboarddescription"> <?php echo htmlspecialchars($row['description'])?> </td>
                                <td class="actions">
                                    <a class="editdash" href="updateContent.php?id=<?php echo htmlspecialchars($row['id']) ?>">تعديل</a>
                                    <a class="deletedash" href="deleteEntry.php?id=<?php echo htmlspecialchars($row['id']) ?>" onclick="return confirm('متأكد من حذف <?php echo htmlspecialchars($row['name'])?>؟');" >حذف</a>
                                </td>
                            </tr>

                    <?php endforeach; ?>

                </table>
            </div>
        </main>


        <footer>
            <p><small>تم تصميم الموقع من قبل طلاب جامعة الملك سعود &copy;<br>الوليد المطيري , البراء الموصللي </small></p>
        </footer>
    </body>
</html>
