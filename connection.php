<?php
    $servername = "sql113.infinityfree.com";
    $username = "if0_42856981";
    $password = "VpJ1iVx4B4po";
    $db_name = "if0_42856981_sa";
    $conn = new mysqli($servername, $username, $password, $db_name, 3306);
    if($conn->connect_error){
        echo "Connection faild";
        die("Connection faild".$conn->connect_error);
    }

    $conn->set_charset("utf8mb4");

?>