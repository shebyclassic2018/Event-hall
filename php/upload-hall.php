<?php
require "dbconn.php";
$desc = @$_POST['hall_desc'];
$capacity = $_POST['capacity'];
$price = $_POST['price'];
$hall_name = $_POST['hall_name'];
$user_id = $_SESSION['user_id'];
$hall_id = $_POST['other_image'];



// FILES POSTED

$filename = $_FILES['file']['name'];

$target = "../image/hall/" . basename($filename);

if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
    if ($hall_id == 'none') {
    $stmt = "INSERT INTO hall VALUES (null, '$hall_name', '$capacity', '$price', '$desc', '$filename', '$user_id')";
    } else {
        $stmt = "INSERT INTO related_hall VALUES (null, '$filename', '$hall_id')";
    }
    $insert = $conn->query($stmt);

    if ($insert == true) {
        $_SESSION['alert_ok'] = "Hall added successfully";
    } else {
        $_SESSION['alert_fail'] = "Process failed - " . mysqli_error($conn);
    }
} else {
    $_SESSION['alert_fail'] = "Upload failed";
}


header('location: ../upload-hall.php');