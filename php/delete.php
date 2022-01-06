<?php
require "dbconn.php";
$hall_id = $_GET['hall_id'];

$delete = $conn->query("DELETE FROM hall WHERE id = '$hall_id'");

if ($delete) {
    $_SESSION['alert_ok'] = "Hall deleted";
} else {
    $_SESSION['alert_fail'] = "Process failed";
}

header("location: ../manager.php");