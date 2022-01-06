<?php if (isset($_SESSION['alert_ok'])) {?>
    <div class="alert-info pad-15"><?=$_SESSION['alert_ok']?></div>
<?php $_SESSION['alert_ok'] = null; } else if (isset($_SESSION['alert_fail'])) {?>
    <div class="alert-danger pad-15"><?=$_SESSION['alert_fail']?></div>
<?php $_SESSION['alert_fail'] = null; } ?>