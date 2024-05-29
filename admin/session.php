<?php 
session_start();
if(!isset($_SESSION['login_id'])){
    header("location:login.php");
}
$name = $_SESSION['name'];
$loginId = $_SESSION['login_id'];
?>