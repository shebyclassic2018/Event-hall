<?php
include "dbconn.php";
$total_orders = $_GET['total_order'];
$fromDate = $_POST['from'];
$toDate = $_POST['to'];
$hall_id = $_POST['hall_id'];
$user_id = $_SESSION['user_id'];


if ($total_orders == 0) {
    $stmt = "INSERT INTO customer_order VALUES (null,'$hall_id', '$user_id', '$fromDate', '$toDate', now(), 'Pending')";
    $insert = $conn->query($stmt);
    if ($insert) {
        $_SESSION['alert_ok'] = "Order delivered";
    } else {
        $_SESSION['alert_fail'] = "Order not delivered";
    }
} else {
    // check if date is in between of available orders
    $select = $conn->query("SELECT * FROM customer_order WHERE hall_id = '$hall_id' AND start_date <= '$fromDate' AND end_date >= '$fromDate'");
    $matches_fromDate = mysqli_num_rows($select);

    $select1 = $conn->query("SELECT * FROM customer_order WHERE hall_id = '$hall_id' AND start_date <= '$toDate' AND end_date >= '$toDate'");
    $matches_toDate = mysqli_num_rows($select1);
    $matches_toDate; 


    if ($matches_fromDate == 0 && $matches_toDate == 0) {
        $stmt = "INSERT INTO customer_order VALUES (null,'$hall_id', '$user_id', '$fromDate', '$toDate', now(), 'Pending')";
        $insert = $conn->query($stmt);
        if ($insert) {
            $_SESSION['alert_ok'] = "Order delivered";
        } else {
            $_SESSION['alert_fail'] = "Order not delivered";
        } 
    } else {
        $_SESSION['alert_fail'] = "Hall is in use";
    }
}

header("location: ../order-details.php?hall_id=" . $hall_id);