<?php

include 'connection/conn.php';
session_start();
if(!isset($_SESSION['login_id'])){
    header("location:login.php");
}

$login_id = $_SESSION['login_id'];
date_default_timezone_set('Asia/kolkata');
$logout_date_time = date('Y:m:d H:i:s');
$result = $con->query("update login_history set logout_date_time = '$logout_date_time' where login_history_id = '$login_id' ");

session_destroy();

header("location:login.php");

?>