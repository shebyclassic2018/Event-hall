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
    <main class="flow-y-auto manager-page pad-5">
        <br>
        <h2>Add new manager</h2>
        <hr>
        <form action="php/add-staff.php" method="post" class="create-form">
            <div class="pad-15">
                <?php require "alert.php"; ?>   
            </div>
            <h3 class="pad-15">Register account</h3>
            <div class="pad-15"><input type="text" placeholder="Fullname" name="fname" required=""></div>
            <div class="pad-15"><input type="text"  placeholder="Phone" name="phone" required=""></div>
            <div class="pad-15"><input type="email"  placeholder="Email" name="email" required=""></div>
            <div class="pad-15">
                <select name="sex">
                    <option value>-- Choose sex --</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>
            </div>
            <div class="pad-15"><input type="text"  placeholder="Address" name="address" required=""></div>
            <div class="pad-15"><input type="password"  placeholder="Password" name="pwd" required=""></div>
            <div class="pad-15"><input type="password"  placeholder="Confirm assword" name="cpwd" required=""></div>
            <div class="pad-15">
                <select name="role" id="">
                    <option value="none">-- Choose role --</option>
                    <option value="2">Manager</option>
                    <option value="3">Administrator</option>
                </select>
            </div>
            <input type="hidden"  value="<?=$_GET['hall_id']?>" name="hall_id" required="">
            <div class="pad-15"><button class="btn btn-blue round-5 create-acc-btn" >Create account</button></div>
        </form>
    </main>
    <script src="js/default/jquery-3.3.1.min.js"></script>
    <script src="js/default/classicQuery.js"></script>
    <script src="js/main.js"></script>
    <script>
    $(document).ready(() => {
        $("#from").change(() => {
            var fromDate = $("#from").val();
            $("#to").attr("min", fromDate);
        })
    });
    </script>
</body>

</html>