<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $db_name = "exploresaudi";
    $conn = new mysqli($servername, $username, $password, $db_name, 3306);
    if($conn->connect_error){
        echo "Connection faild";
        die("Connection faild".$conn->connect_error);
    }


?>