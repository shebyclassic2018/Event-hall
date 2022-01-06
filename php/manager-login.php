<?php
    require "dbconn.php";

    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    $stmt = "SELECT * FROM manager WHERE email = '$email' AND password = '$pwd'";
    $select = $conn->query($stmt);

    $found = mysqli_num_rows($select);

    if ($found == 1) {
        foreach($select as $key => $row) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['fullname'];
        }
        header('location: ../manager.php');
    } else {
        $_SESSION['alert_fail'] = "Either email or password is incorrect";
        header('location: ../manager-login.php');
    }

    