<?php
require "php/dbconn.php";
    // setcookie('user', 1, time() + 60 * 60 * 24 * 365);
    
    if(isset($_SESSION['user_id'])) {
        $link = "order-details.php";
    } else {
        $link = "login.php";
    }
    setcookie('user', 1, time() - 60 * 60 * 24 * 365);
    
    // get halls
    $stmt = "SELECT * FROM hall ORDER BY id DESC";
    $data = $conn->query($stmt);

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
    .order-btn {
        padding: 8px;
        background: rgb(217, 83, 79);
        color: #ddd;
    }
    </style>
</head>

<body>
    <header class="pad-15 underline">
        <h2>Event Hall</h2>
    </header>
    <div class="manager-page">
    <?php if (isset($_SESSION['username'])) { ?>
        <?php require "intro.php"; ?>
    <?php } else {?>
        <div class="pad-15 underline txt-blue ">Please select a Hall then login to make order</div>
    <?php } ?>
    <div class="pad-15">
        <input type="search" name="" id="search-field" class="wt-100 round-5 pad-8" style="border: 1px solid #ddd" placeholder="Search Hall ...">
    </div>
    <main class="flow-y-auto" style="padding: 5px">
        <div class="direct-fetch">
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
                    </div>
                </div>
                <div class="flex-center">
                        <a href="<?=$link?>?hall_id=<?=$row['id']?>" class="order-btn round-5 wt-100 flex-center">Order Now</a>
                    </div>
            </div><br><br><br><br><br>
        <?php } ?>
        </div>

        <div class="searched-item">
        </div>
        <input type="hidden" id="hall_name">
        <input type="hidden" id="price">
        <input type="hidden" id="capacity">
        <input type="hidden" id="hall_id">
        <input type="hidden" id="hall_picture">
        <input type="hidden" id="link">
    </main>
    </div>

    <script src="js/default/jquery-3.3.1.min.js"></script>
    <script src="js/default/classicQuery.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
