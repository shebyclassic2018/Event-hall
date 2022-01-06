
<?php session_start(); ?>
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
    <?php require "intro.php" ?>
    <main class="flow-y-auto pad-15 upload-page manager-page">
          <?php require "alert.php"; ?>
        <h3 class="underline pad-tb-15">Upload</h3><br>
        <form action="php/upload-hall.php" method="post" class="upload-form" enctype="multipart/form-data">
        <div class="">
                <label for="name">Hall name</label><br>
                <input type="text" name="hall_name" style="width: calc(100% - 15px)" >
            </div><br>
            <div class="">
                <label for="">Hall Description</label><br>
                <textarea name="hall_desc" id="" cols="30" rows="5" class="wt-100" ></textarea>
            </div><br>
            <div class="flex">
                <div class="flex-1 ">
                    <label for="">Hall Capacity</label><br>
                    <input type="number" name="capacity" >
                </div>
                <div class="flex-1 padl-15">
                    <label for="">Hall Price (Tshs)</label><br>
                    <input type="number" name="price">
                </div>
            </div><br>
            <div class="flex">
                <div class="flex-1"></div>
                <div> <label for="upload" class="wt-100 btn btn-green round-">Choose file</label>
                <input type="file" name="file" id="upload" ></div>
            </div><br>
            <div class="hall-frame shadow-000-5 image-preview">
                <div class="ht-100">
                    <img class="screen">
                </div>
            </div><br>
            <div class="flex">
                <div class="flex-1 pad-5 flex-center">
                    <select name="other_image" id="">
                        <option value="none">-- Choose --</option>
                        <?php 
                        require "php/dbconn.php";
                        $mng = $_SESSION['user_id'];
                        $hall = $conn->query("SELECT * FROM hall WHERE manager_id = '$mng'");
                        foreach ($hall as $row){?>
                        <option value="<?=$row['id']?>"><?=$row['hall_name']?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="flex-center"> <button class="btn btn-blue round-5">Upload</button></div>
            </div><br>
           
        </form>
        
    </main>
    <script src="js/default/jquery-3.3.1.min.js"></script>
    <script src="js/default/classicQuery.js"></script>
    <script src="js/main.js"></script>
    <script>
        $(document).ready(() => {
            previewFileDetails('#upload', 'image-preview', '.screen');
        });
    </script>
</body>
</html>