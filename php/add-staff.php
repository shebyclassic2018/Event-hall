<?php
require "dbconn.php";

$name = $_POST['fname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];
$sex = $_POST['sex'];
$pwd = $_POST['pwd'];
$cpwd = $_POST['cpwd'];
$hall_id = $_POST['hall_id'];
$role = $_POST['role'];

if ($pwd == $cpwd) {
    $stmt = "INSERT INTO user VALUES (null, '$name', '$phone', '$email','$address', '$sex', '$pwd', '$role')";
    $insert = $conn->query($stmt);

    if ($insert == true) {
        $_SESSION['alert_ok'] = "Registration complete";
    } else {
        $_SESSION['alert_fail'] = "Registration not complete";
    }
} else {
    $_SESSION['alert_fail'] = "Password do not match";
}

header('location: ../admin.php?');