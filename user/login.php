<?php
session_start();
include 'connection/conn.php';

if(isset($_POST['Login'])){
  $email = $_POST['email'];
  $password = $_POST['password'];

  $loginRow = $con->query("Select * from customer where email = '$email' ");
  echo "Select * from customer where email = '$email' ";
  $row_count = $loginRow->num_rows;
  if($row_count == 1){
    $row = $loginRow->fetch_object();
    if($row->password == $password){
      if(isset($_POST['chk']))
      {
        setcookie("email",$email,time()+3600*24*1);
        setcookie("password",$password,time()+3600*24*1);
      }
      $_SESSION['email'] = $row->email;
      $_SESSION['name'] = $row->name;
      $_SESSION['contact'] = $row->contact;
      $_SESSION['customer_id'] = $row->customer_id;
      header("location:index.php");
    }else{
      echo "<script>alert('Password does not match.');</script>";
      //header("location:login.php");  
    }
  }else{
    echo "<script>alert('User not exists so please check.');</script>";
    //header("location:login.php");
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
  .comment{
    box-shadow: none !important;
  }
</style>
<body class="body-wrapper">
<?php include 'header.php' ?>
<section class="page-title">
  <!-- Container Start -->
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2 text-center">
        <!-- Title text -->
        <h3>SIGN IN</h3>
      </div>
    </div>
  </div>
  <!-- Container End -->
</section>
<section class="login py-5 border-top-1">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-7 col-md-8 align-item-center">
        <div class="border">
          <h3 class="bg-gray p-4">Login Now</h3>
          <form method="post">
            <fieldset class="p-4">
              <input class="form-control mb-3" type="text" name="email" id="email" placeholder="EmailId" required value="<?php if(isset($_COOKIE['email']))echo $_COOKIE['email'];?>">
              <input class="form-control mb-3" type="password" name="password" placeholder="Password" required value="<?php if(isset($_COOKIE['password']))echo $_COOKIE['password'];?>">
              <div class="loggedin-forgot">
                <input type="checkbox" name="chk" id="keep-me-logged-in" <?php if(isset($_COOKIE['password'])) echo 'checked';?> >
                <label for="keep-me-logged-in" class="pt-3 pb-2">Keep me logged in</label>
              </div>
              <input type="submit" class="btn btn-primary font-weight-bold mt-3" name="Login" id="Login" />
              <a class="mt-3 d-block text-primary" href="register.php">Register Now</a>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'footer.php' ?>
<script src="plugins/jquery/jquery.min.html"></script>
<script src="plugins/bootstrap/popper.min.js"></script>
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<script src="plugins/bootstrap/bootstrap-slider.js"></script>
<script src="plugins/tether/js/tether.min.js"></script>
<script src="plugins/raty/jquery.raty-fa.js"></script>
<script src="plugins/slick/slick.min.js"></script>
<script src="plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
<script src="plugins/google-map/map.js" defer></script>
<script src="js/script.js"></script>
</body>
</html>