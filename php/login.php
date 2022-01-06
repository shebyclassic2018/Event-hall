<?php
    require "dbconn.php";

    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $hall_id = $_POST['hall_id'];

    $stmt = "SELECT u.id as id, fullname, role_id, name FROM user u, role r WHERE u.role_id = r.id AND email = '$email' AND password = '$pwd'";
    $select = $conn->query($stmt);

    $found = mysqli_num_rows($select);

    if ($found == 1) {
        foreach($select as $key => $row) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['fullname'];
            $_SESSION['role'] = $row['role_id'];
            $role = $row['name'];
        }
        if($role == 'customer') {
            header('location: ../order-details.php?hall_id=' . $hall_id);
        } else if ($role == 'manager') {
            header('location: ../manager.php');
        } else {
            header('location: ../admin.php');
        }
    //     echo '
    //     <script>
    //         var hall_id = "' . $hall_id. '"
    //         window.open("../order-details.php?hall_id="+hall_id)
    //     </script>
    // ';
    } else {
        $_SESSION['alert_fail'] = "Either email or password is incorrect";
        header('location: ../login.php?hall_id=' . $hall_id);
    }

    