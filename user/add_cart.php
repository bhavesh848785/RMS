<?php
session_start();
include 'connection/conn.php';

if(!isset($_SESSION['customer_id']))
{
  header("location:login.php");
}


$customer_id = $_SESSION['customer_id'];
$food_id = $_GET['food_id'];

$result = $con->query("Select * from food where food_id = '$food_id'");
$cart_food_row = $result->fetch_object();

$price = $cart_food_row->price;
$pimg  = $cart_food_row->image;
$pname = $cart_food_row->dish_name;

$r = $con->query("insert into cart(product_id,pname,price,qty,pimg,customer_id) values 
		('$food_id','$pname','$price','1','$pimg','$customer_id')");
if($r)
{
    echo"<script>alert('Added to Cart');document.location='index.php';</script>";
}
else
{
    header('location:index.php');
}	

?>