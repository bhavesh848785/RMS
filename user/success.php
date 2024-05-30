<?php
session_start();
include 'connection/conn.php';

if(!isset($_SESSION['customer_id'])){
  header("location:logout.php");
}

$order_id = $_SESSION['order_id'];
$con->query("update orders set status='completed' where order_id = '$order_id'");


$customer_id = $_SESSION['customer_id'];
$con->query("delete from cart where customer_id='$customer_id'");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>RMS | Payment</title>
  <?php include 'link.php' ?>
</head>
<style type="text/css">
  
</style>
<body class="body-wrapper">
<?php include 'header.php' ?>
<section class="page-title">
  <!-- Container Start -->
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2 text-center">
        <!-- Title text -->
        <h3>Success Payment</h3>
      </div>
    </div>
  </div>
  <!-- Container End -->
</section>


<section  class="login py-5 border-top-1">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-7 col-md-8 align-item-center">
        <div class="block comment">
          <form method="post" >
            <div class="form-group mb-3">
              <div class="form-group mb-3">
                  <h1 style="color: green; font-style: italic; text-align: center;" >Your Order has been Placed Successfully</h1><br/>
                </div>
            </div>
            <div class="form-group mb-3">
              <div class="form-group mb-3">
                 <h3>Want to continue shopping ? <a href="index.php"> Click Here </a></h3>
                </div>
            </div>
          </form>
        </div>   
      </div>
    </div>
  </div>
</section>
<?php include 'footer.php' ?>
<!-- 
Essential Scripts
=====================================-->
<script src="plugins/jquery/jquery.min.html"></script>
<script src="plugins/bootstrap/popper.min.js"></script>
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<script src="plugins/bootstrap/bootstrap-slider.js"></script>
<script src="plugins/tether/js/tether.min.js"></script>
<script src="plugins/raty/jquery.raty-fa.js"></script>
<script src="plugins/slick/slick.min.js"></script>
<script src="plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
<script src="plugins/google-map/map.js" defer></script>
<script src="js/script.js"></script>
</body>
</html>