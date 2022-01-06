<?php

    require "php/dbconn.php";
    $mng_id = $_SESSION['user_id'];
    // get halls
    $stmt = "SELECT * FROM hall WHERE manager_id = '$mng_id' ORDER BY id DESC";
    $data = $conn->query($stmt);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Event Hall</title>
    <link rel="stylesheet" href="css/default/awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/default.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header class="pad-15 underline">
        <h2>Event Hall</h2>
    </header>
    <nav class="flex pad-15 bg-333 txt-fff">
        <div class="flex-1 flex-center"><a href="manager-list.php" class="txt-fff bold">Managers List</a></div>
        <div class="flex-1 flex-center"><a href="admin.php" class="txt-red bold">Add Manager</a></div>
    </nav>
    <?php require "intro.php"?>
    <main class="flow-y-auto">
    <table class="wt-100" cellspacing=0>
            <tr class="bg-333 txt-ddd">
                <th>#</th>
                <th>Manager Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Gender</th>
                <th>Total Hall</th>
            </tr>
            <?php   
                    $mgr_id = $_SESSION['user_id'];
                    $i=1;
                    $list = $conn->query("SELECT fullname, phone, email, address, sex, count(manager_id) as total_halls FROM user u, hall h WHERE U.id = h.manager_id GROUP BY manager_id");
                    foreach($list as $row) { ?>
            <tr>
                <td align=center><?=$i++?></td>
                <td align=center><?=$row['fullname']?></td>
                <td align=center><?=$row['phone']?></td>
                <td align=center><?=$row['email']?></td>
                <td align=center><?=$row['address']?></td>
                <td align=center><?=$row['sex']?></td>
                <td align=center><?=$row['total_halls']?></td>
                
            </tr>
            <?php } ?>
        </table>
    </main>
    <script src="js/default/jquery-3.3.1.min.js"></script>
    <script src="js/default/classicQuery.js"></script>
    <script src="js/main.js"></script>
    <script>
        $(document).ready(() => {
           $("#from") . change(() => {
               var fromDate = $("#from") . val();
                $("#to") . attr("min", fromDate);
           })
        });
    </script>
</body>
</html>