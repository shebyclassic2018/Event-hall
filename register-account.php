
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="refresh" content="1"> -->
    <title>Event Hall</title>
    <link rel="stylesheet" href="css/default.min.css">
    <link rel="stylesheet" href="css/style1.css">
</head>
<body>
    <header class="pad-15 underline">
        <h2>Event Hall</h2>
    </header>
    <main class="flow-y-auto create-acc-page">
    <br><br>
        <form action="php/register-account.php" method="post" class="create-form">
            <div class="pad-15">
                <?php require "alert.php"; ?>   
            </div>
            <h3 class="pad-15">Register account</h3>
            <div class="pad-15"><input type="text" placeholder="Fullname" name="fname" required=""></div>
            <div class="pad-15"><input type="text"  placeholder="Phone" name="phone" required=""></div>
            <div class="pad-15"><input type="email"  placeholder="Email" name="email" required=""></div>
            <div class="pad-15">
                <select name="sex">
                    <option disabled value>-- Choose sex --</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>
            </div>
            <div class="pad-15"><input type="text"  placeholder="Address" name="address" required=""></div>
            <div class="pad-15"><input type="password"  placeholder="Password" name="pwd" required=""></div>
            <div class="pad-15"><input type="password"  placeholder="Confirm assword" name="cpwd" required=""></div>
            <input type="hidden"  value="<?=$_GET['hall_id']?>" name="hall_id" required="">
            <div class="pad-15">Do you have account? <a href="login.php?hall_id=<?=$_GET['hall_id']?>" class="txt-blue bold"> login</a></div>
            <div class="pad-15"><button class="btn btn-blue round-5 create-acc-btn" >Create account</button></div>
        </form>
    </main>
</body>
</html>
