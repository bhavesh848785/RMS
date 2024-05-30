<?php 

include 'connection/conn.php';
if(isset($_POST['submit'])){

  $name = $_POST['name'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $mobileno = $_POST['mobileno'];
  $address = $_POST['address'];

  $insertRecord = $con->query("Insert into customer(name,gender,email,password,contact,address) values ('$name','$gender','$email','$password','$mobileno','$address')");

  if($insertRecord){
    echo "<script>alert('You have sucessfully registered.');</script>";
    //header("location:login.php");
  }else{
    echo "<script>alert('Due to error so please try again.');</script>";
    //header("location:register.php");
  }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>RMS | Register</title>
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
        <h3>SIGN UP</h3>
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
          <h4 class="bg-gray p-4">Register</h4>
          <form method="post" >
            <div class="form-group mb-3">
              <div class="form-group mb-3">
                  <label for="name">Name</label>
                  <input type="text" class="form-control mb-3" id="name" name="name" required>
                </div>
            </div>
            <div class="form-group mb-3">
              <div class="form-group mb-3">
                  <label for="email">Gender</label>
                  <br/>
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="radio" name="gender" value="male" id="gender"> &nbsp;&nbsp;&nbsp;&nbsp;Male&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="radio" name="gender" id="gender" value="female">&nbsp;&nbsp;&nbsp;&nbsp;FeMale
                </div>
            </div>
            <div class="form-group mb-3">
              <div class="form-group mb-3">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>
            <div class="form-group mb-3">
              <div class="form-group mb-3">
                  <label for="email">Password</label>
                  <input type="password" class="form-control"  name="password" id="password" required>
                </div>
            </div>
            <div class="form-group mb-3">
              <div class="form-group mb-3">
                  <label for="email">Mobile No</label>
                  <input type="number" class="form-control" id="mobileno" name="mobileno" required>
                </div>
            </div>
            <!-- Message -->
            <div class="form-group mb-3">
              <label for="message">Address</label>
              <textarea class="form-control" name="address" id="address" rows="5" required></textarea>
            </div>
            <input type="submit" id="submit" name="submit" class="btn btn-transparent" value="Register" />
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