<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="refresh" content="1"> -->
    <title>Event Hall</title>
    <link rel="stylesheet" href="css/default.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="pad-15 underline">
        <h2>Event Hall</h2>
    </header>
    <main class="flex-center flow-y-auto create-acc-page manager-page">
        <form action="php/manager-login.php" method="post" class="login-form">
            <div class="pad-15">
                <?php require "alert.php"; ?>
            </div>    
            <h3 class="pad-15 flex">
                <div class="flex-1">Login</div>
                <div>Manager</div>
            </h3>
            <div class="pad-15"><input type="email" placeholder="Email" name="email" required=""></div>
            <input type="hidden"  value="<?=$_GET['hall_id']?>" name="hall_id" required="">
            <div class="pad-15"><input type="password" placeholder="Password" name="pwd" required=""></div>
            <div class="pad-15">
                <div class="flex">
                    <div class="flex-1"><a href="register-account.php?hall_id=<?=$_GET['hall_id']?>" class="txt-blue bold"> Don't have account</a> </div>
                    <div><a href="forgot-password.php" class="txt-red bold"> Forgot password</a> </div>
                </div>
            </div>
            <div class="pad-15"><button class="btn btn-blue round-5 create-acc-btn">Login</button></div>
        </form>
    </main>
</body>
</html>