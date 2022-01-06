<?php
    require "php/dbconn.php";
    $hall_id = $_GET['hall_id'];
    $user_id = $_SESSION['user_id'];

    $data = $conn->query("SELECT * FROM hall where id = '$hall_id'");
    $today = date('Y-m-d');
    $active_date = $conn->query("SELECT * FROM customer_order WHERE end_date >= '$today' AND hall_id = '$hall_id' AND cust_id != '$user_id' ORDER BY start_date");
    $total_dates = mysqli_num_rows($active_date);

    $my_orders = $conn->query("SELECT * FROM customer_order WHERE end_date >= '$today' AND hall_id = '$hall_id' AND cust_id = '$user_id' ORDER BY start_date");
    $total_my_orders = mysqli_num_rows($my_orders);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="refresh" content="1"> -->
    <title>Event Hall</title>
    <link rel="stylesheet" href="css/default/awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/default.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .other-images img {
            width: 100%;
            height: 200px;
        }
        .other-images {
            width: 100%;
        }
    </style>
</head>

<body>
    <header class="pad-15 underline">
        <h2>Event Hall</h2>
    </header>
    <?php require "intro.php"; ?>
    <main class="flow-y-auto order-page manager-page">
        <div class="hall-frame pad-15">
            <?php foreach ($data as $row) { ?>
            <div class="img">
                <img src="image/hall/<?=$row['hall_picture']?>">
            </div>
            <br>
            <div>
                
                <div class="desc">
                    <?=$row['description']?>
                </div>
            </div>
            <h3>Other Hall Images</h3>
            <div class="grid-auto other-images">
                <?php
                $hall_id = $row['id']; 
                    $otherIMG = $conn->query(("SELECT * FROM related_hall WHERE hall_id = '$hall_id'"));
                    foreach($otherIMG as $result){
                ?>
                <div class="pad-5"><img src="image/hall/<?=$result['filename']?>"></div>
                <?php } ?>
            </div>
            <h3>Hall Decription</h3>
            <div class="hall-button fle">
                <div class="flex-1">
                    <div class="txt-blue flex underline pad-8"><span class="flex-1">Hall name:</span> <span class="bold flex-1"><?=$row['hall_name']?></span></div>
                    <div class="txt-blue flex underline pad-8"><span class="flex-1">Capacity:</span> <span class="bold flex-1"><?=$row['capacity']?> People</span></div>
                    <div class="txt-blue flex underline pad-8"><span class="flex-1">Price:</span> <span class="bold flex-1"><?=number_format($row['price'], 2)?> Tshs</span>
                    </div>
                </div>
                <br>
            </div>
            

            <?php } ?>
            <div class="ordered-date">
                <h3>Other orders</h3><br>
                <?php if ($total_dates > 0) { ?>
                <table class="wt-100" cellspacing=0>
                    <tr class="bg-333 txt-ddd">
                        <th>#</th>
                        <th>Starting Date</th>
                        <th>Ending Date</th>
                    </tr>
                    <?php $i=1; foreach($active_date as $row) { ?>

                    <tr>
                        <td align=center><?=$i?></td>
                        <td align=center><?=$row['start_date']?></td>
                        <td align=center><?=$row['end_date']?></td>
                    </tr>
                    <?php $i++; } ?>
                </table>
                <?php } else { ?>
                <div class="alert-danger pad-15">No order found</div>
                <?php } ?>
                    <br>
                <?php require "alert.php"; ?>
            </div>
            <br><br>

            <div class="ordered-date">
                <h3>My Order(s)</h3><br>
                <?php if ($total_my_orders > 0) { ?>
                <table class="wt-100" cellspacing=0>
                    <tr class="bg-333 txt-ddd">
                        <th>#</th>
                        <th>Starting Date</th>
                        <th>Ending Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php $i=1; foreach($my_orders as $row) { ?>

                    <tr>
                        <td align=center><?=$i?></td>
                        <td align=center><?=$row['start_date']?></td>
                        <td align=center><?=$row['end_date']?></td>
                        <td align=center><?=$row['status']?></a></td>
                        <td align=center><a href="delete-order.php?orderId=<?=$row['id']?>&hall_id=<?=$hall_id?>"><span class="fa fa-times-circle txt-red"></span></a></td>
                    </tr>
                    <?php $i++; } ?>
                </table>
                <?php } else { ?>
                <div class="alert-danger pad-15">No order found</div>
                <?php } ?>
                    <br>
                <?php require "alert.php"; ?>
            </div>
            <br><br>
            <form action="php/make-order.php?total_order=<?=$total_dates?>" method="post">
                <div>
                    <h3>Enter order date</h3>
                    <input type="hidden" name="hall_id" value="<?=$hall_id?>">
                    <div class="flex">
                        <div class="flex-1"><label for="form" class="flex-left flex-1">From</label></div>
                        <div class="flex-1"><input type="date" name="from" min="<?=date('Y-m-d')?>" id="from" required></div>
                    </div><br>
                    <div class="flex">
                        <div class="flex-1"><label for="form" class="flex-left flex-1">To</label></div>
                        <div class="flex-1"><input type="date" name="to" min="<?=date('Y-m-d')?>" id="to" required></div>
                    </div><br>
                </div>
                <div class="flex-center">
                    <button class="btn btn-blue round-5 wt-100 flex-center">Order Now</button>
                </div>
                
                <br>
            </form>
        </div><br><br>
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