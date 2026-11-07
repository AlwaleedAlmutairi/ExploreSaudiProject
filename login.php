<?php

session_start();

include "connection.php";


$db = $conn;

$username = $_POST['username'];
$password = $_POST['password'];

if(isset($username, $password)){

    if(empty($username)){
        exit('الرجاء إدخال اسم المستخدم');
    }
    if(empty($password)){
        exit('الرجاء إدخال كلمة المرور');
    }

    //alphanumeric and numbers only + pwd length
    if(!preg_match('/^[a-zA-Z0-9_]{5,15}$/', $_POST['username']) || strlen($password) < 8){
        exit('غير مسموح');
    }

    //check password
    //mysqli execute_query to prevent SQL injection
    $pwd = ($db->execute_query('SELECT password FROM admins WHERE username = ?', [$username]))->fetch_column();


    //username exists and password is correct
    if(!empty($pwd) && password_verify($password, $pwd)){
        $_SESSION['access'] = true;
        header("Location: adminDashboard.php");
        exit();
    }
    else{
        echo 'اسم المستخدم أو كلمة المرور غير صالحة';
    }



}
else{
    exit('حدث خطأ أثناء محاولة تسجل الدخول.');
}


?>
