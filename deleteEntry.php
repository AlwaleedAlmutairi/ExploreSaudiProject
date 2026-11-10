<?php

require "auth.php";
include "connection.php";

$db = $conn;

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $db->prepare("DELETE FROM cities WHERE id = ?");
    $stmt->execute([$id]);

    header("Location: ". $_SERVER['HTTP_REFERER']);
    exit();
}

?>
