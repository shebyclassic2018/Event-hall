<?php
session_start();

session_destroy();

session_start();
if (!isset($_SESSION['user_id'])) {
    header("location: index.php");
}
