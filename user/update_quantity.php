<?php
session_start();
include 'connection/conn.php';
if(!isset($_SESSION['customer_id'])){
  header("location:logout.php");
}
$cart_id = $_POST["cart_id"];
$quantity = $_POST["quantity"];
$price = $_POST["price"];
$userid= $_SESSION['customer_id'];
$total_amout = $quantity * $price;
$exe = $con->query("update cart set qty='$quantity' , price = '$total_amout' where cart_id='$cart_id' and customer_id='$userid' ");
if($exe)
{
	echo 1;
}
else
{
	echo 0;
}
?>