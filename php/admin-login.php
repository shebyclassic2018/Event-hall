<?php
    require "dbconn.php";

    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    $stmt = "SELECT * FROM admin WHERE email = '$email' AND password = '$pwd'";
    $select = $conn->query($stmt);

    $found = mysqli_num_rows($select);

    if ($found == 1) {
        foreach($select as $key => $row) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['fullname'];
        }
        header('location: ../admin-home.php');
    } else {
        $_SESSION['alert_fail'] = "Either email or password is incorrect";
        header('location: ../admin-login.php');
    }

    