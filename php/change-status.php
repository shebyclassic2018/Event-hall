<?php
require "dbconn.php";
$id = $_GET['order_id'];
echo $status = $_GET['status'];

$update = $conn->query("UPDATE customer_order SET status='$status' WHERE id = '$id'");
if ($update) {
    $_SESSION['alert_ok'] = "status changed";
} else {
    $_SESSION['alert_fail'] = "process failed";
}

header("location: ../order-list.php");