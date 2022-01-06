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
        <div class="flex-1 flex-center"><a href="manager.php" class="txt-fff bold">Home</a></div>
        <div class="flex-1 flex-center"><a href="order-list.php" class="txt-fff bold">Order List</a></div>
        <div class="flex-1 flex-center"><a href="upload-hall.php" class="txt-red bold">Upload</a></div>
    </nav>
    <?php require "intro.php"?>
    <main class="flow-y-auto manager-page">
        <?php require "alert.php"; ?>
        <br>
        <?php foreach ($data as $row) { ?>
        <div class="hall-frame shadow-000-5">
            <div class="img">
                <img src="image/hall/<?=$row['hall_picture']?>">
            </div>
            <div class="hall-button pad-15 flex">
                <div class="flex-1">
                    <div class="flex">
                        <div class="flex-1">Hall Name</div>
                        <div class="flex-1"><?=$row['hall_name']?></div>
                    </div>
                    <div class="flex">
                        <div class="flex-1">Capacity</div>
                        <div class="flex-1"><?=$row['capacity']?> People</div>
                    </div>
                    <div class="flex">
                        <div class="flex-1">Price</div>
                        <div class="flex-1"><?=number_format($row['price'], 2)?> Tshs</div>
                    </div>
                    <div class="flex pad-10">
                        <a href="edit.php?hall_id=<?=$row['id']?>" class="btn btn-blue"><span class="fa fa-pencil"></span> Edit</a> &nbsp;      
                        <a href="php/delete.php?hall_id=<?=$row['id']?>" class="btn btn-red"><span class="fa fa-trash-o"></span> Delete</a>
                    </div>
                </div>
            </div>
            
        </div><br><br><br><br><br><br>

        <?php } ?>
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