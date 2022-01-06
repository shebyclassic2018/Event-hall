<?php

require "dbconn.php";
$hall_name = $_POST['content'];

if (isset($_SESSION['user_id'])) {
    $link = "order-details.php";
} else {
    $link = "login.php";
}

$data = $conn->query("SELECT * FROM hall WHERE hall_name LIKE '%$hall_name%'");
$arr = array();
$found = mysqli_num_rows($data);
if ($found > 0) {
    foreach ($data as $row) {
        $arr['hall_name'][] = $row['hall_name'];    
        $arr['price'][] = $row['price'];
        $arr['capacity'][] = $row['capacity'];
        $arr['hall_picture'][] = $row['hall_picture'];
        $arr['id'][] = $row['id'];
        $arr['link'] = $link;
    }
    echo json_encode($arr);
} else {
    echo "null";
}