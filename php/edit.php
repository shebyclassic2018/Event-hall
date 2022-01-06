<?php
require "dbconn.php";
$desc = @$_POST['hall_desc'];
$capacity = $_POST['capacity'];
$price = $_POST['price'];
$hall_name = $_POST['hall_name'];
$hall_id = $_GET['hall_id'];



    $stmt = "UPDATE hall SET hall_name = '$hall_name', capacity = '$capacity', price = '$price', description = '$desc' WHERE id = '$hall_id'";
    $insert = $conn->query($stmt);

    if ($insert == true) {
        $_SESSION['alert_ok'] = "Info updated";
    } else {
        $_SESSION['alert_fail'] = "Process failed ";
    }

header('location: ../manager.php');