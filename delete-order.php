<?php
require "php/dbconn.php";
$orderId = $_GET['orderId'];
$hall_id = $_GET['hall_id'];

$delete = $conn->query("DELETE FROM customer_order WHERE id = '$orderId'");
if ($delete) {
    $_SESSION['alert_ok'] = "Order deleted";
} else {
    $_SESSION['alert_fail'] = "Order not deleted";
}

header("location: order-details.php?hall_id=".$hall_id);