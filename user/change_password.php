<?php 

include 'connection/conn.php';

session_start();

if(!isset($_SESSION['customer_id'])){
  header("location:login.php");
}

if(isset($_POST['submit'])){

  $old_password = $_POST['old_password'];
  $new_password = $_POST['new_password'];
  $re_new_password = $_POST['re_new_password'];

  $customer_id = $_SESSION['customer_id'];
  $result = $con->query("Select * from customer where customer_id = '$customer_id' ");
  $register_result = $result->fetch_object();
  $password = $register_result->password;
  
  if($password == $old_password){
    if($new_password == $re_new_password){
      $updateRecord = $con->query("update customer set password = '$new_password' where customer_id = '$customer_id' ");
      if($updateRecord){
        echo "<script>alert('Password is sucessfully updated.'); document.location='index.php';</script>";
      }else{
        echo "<script>alert('Due to error so please try again.'); document.location='change_password.php';</script>";
      }
    }else{
      echo "<script>alert('New Password and Re enter new password is not match.');</script>";
    }    
  }else{
    echo "<script>alert('Old Password is not match.');</script>";
  }  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>RMS | Change Password</title>
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
        <h3>Change Password</h3>
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
          <h4 class="bg-gray p-4">Change Password</h4>
          <form method="post" >
            <div class="form-group mb-3">
              <div class="form-group mb-3">
                  <label for="name">Old Password</label>
                  <input type="password" class="form-control mb-3" id="old_password" name="old_password" >
                </div>
            </div>

            <div class="form-group mb-3">
              <div class="form-group mb-3">
                  <label for="name">New Password</label>
                  <input type="password" class="form-control mb-3" id="new_password" name="new_password" >
                </div>
            </div>

            <div class="form-group mb-3">
              <div class="form-group mb-3">
                  <label for="name">Re-Enter New Password</label>
                  <input type="password" class="form-control mb-3" id="re_new_password" name="re_new_password" >
                </div>
            </div>
            <input type="submit" id="submit" name="submit" class="btn btn-transparent" value="Change Password" />
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