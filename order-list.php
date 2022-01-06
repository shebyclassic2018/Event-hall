<?php require "php/dbconn.php";?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="refresh" content="1"> -->
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
        <div class="flex-1 flex-center"><a href="manager.php" class="txt-fff bold">Home</a></div>
        <div class="flex-1 flex-center"><a href="order-list.php" class="txt-fff bold">Order List</a></div>
        <div class="flex-1 flex-center"><a href="upload-hall.php" class="txt-red bold">Upload</a></div>
    </nav>
    <?php require "intro.php" ?>
    <main class="flex-cente flow-y-auto pad-15 upload-page">
        <?php require "alert.php"; ?>
        <h3 class="underline pad-tb-15">Order List</h3><br>
        <table class="wt-100" cellspacing=0>
            <tr class="bg-333 txt-ddd">
                <th>#</th>
                <th>Customer Name</th>
                <th>Phone</th>
                <th>Hall name</th>
                <th>Starting Date</th>
                <th>Ending Date</th>
                <th>Status</th>
            </tr>
            <?php   
                    $mgr_id = $_SESSION['user_id'];
                    $i=1;
                    $list = $conn->query("SELECT u.phone, hall_name, u.fullname, start_date, end_date, status, co.id as id FROM user u, customer_order co, hall h WHERE u.id = co.cust_id AND h.id = co.hall_id AND h.manager_id = (SELECT id FROM user u WHERE u.id = '$mgr_id')");
                    foreach($list as $row) { ?>
            <tr>
                <td align=center><?=$i++?></td>
                <td align=center><?=$row['fullname']?></td>
                <td align=center><?=$row['phone']?></td>
                <td align=center><?=$row['hall_name']?></td>
                <td align=center><?=$row['start_date']?></td>
                <td align=center><?=$row['end_date']?></td>
                <td align=center>
                    <?php if ($row['status'] == 'confirmed') {?>
                        <a href="php/change-status.php?status=cancelled&order_id=<?=$row['id']?>">Cancel</a>
                    <?php } else if($row['status'] == 'cancelled'){ ?>
                        <a href="php/change-status.php?status=confirmed&order_id=<?=$row['id']?>">Confirm</a>
                    <?php } else {?>
                        <a href="php/change-status.php?status=cancelled&order_id=<?=$row['id']?>">Cancel</a>
                        <a href="php/change-status.php?status=confirmed&order_id=<?=$row['id']?>">Confirm</a>
                    <?php } ?>
                </td>
            </tr>
            <?php } ?>
        </table>

    </main>
    <script src="js/default/jquery-3.3.1.min.js"></script>
    <script src="js/default/classicQuery.js"></script>
    <script src="js/main.js"></script>
</body>

</html>