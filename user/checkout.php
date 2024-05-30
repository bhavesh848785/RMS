<?php 

session_start();

include 'connection/conn.php';

if(!isset($_SESSION['customer_id'])){
  header("location:login.php");
}
$userid = $_SESSION['customer_id'];

$cart_list = $con->query("Select c.cart_id, f.price, c.qty, c.pimg, c.customer_id, f.dish_name from cart c inner join food f on f.food_id = c.product_id where customer_id = '$userid'");

// $tables_row = $con->query("Select * from tables");

// $userid = $_SESSION['customer_id'];
// $cart_list = $con->query("Select c.cart_id, f.price, c.qty, c.pimg, c.customer_id, f.dish_name from cart c inner join food f on f.food_id = c.product_id where customer_id = '$userid'");
// $subTotal = 0;
// while ($cart_list_row = $cart_list->fetch_object()) {
//   $subTotal += $cart_list_row->qty * $cart_list_row->price; 
// }

if(isset($_POST['submit'])){

  // order generate
  $amount =$_SESSION['amount'];
  $order_date  = date("Y-m-d");
  $con->query("insert into orders(date,customer_id,total_amount) values ('$order_date','$userid','$amount')");
  $order_id = $con->insert_id;   // last inserted id(order id)
  $_SESSION['order_id'] = $order_id;
   

    // order items insert
  $cart_info_object =$con->query("select * from cart where customer_id='$userid' "); 

  while ($result1=$cart_info_object->fetch_object())
  {
      $pname = $result1->pname;
      $con->query("insert into order_items(product_id, quantity, order_id, pname, price) VALUES ('$result1->product_id','$result1->qty','$order_id','$pname','$result1->price')");
  }

  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $mobileno = $_POST['mobileno'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $pincode = $_POST['pincode'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $country = $_POST['country'];
  /*$table_id = $_POST['table_id'];*/
  
  $insertRecord = $con->query("Insert into billingaddress(fname,lname,email,contact,address,city,state,country,customer_id,order_id) values ('$first_name','$last_name','$email','$mobileno','$address','$city','$state','$country','$order_id','$userid')");

  $payment_method = $_POST['payment_method'];
    if($payment_method=='cod')
    {  
        echo "<script>alert('Your Order has been Placed Successfully'); document.location='success.php';</script>";
    }
    else
    {
         header('location:payment.php');
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
        <h3>Checkout</h3>
      </div>
    </div>
  </div>
  <!-- Container End -->
</section>


<section  class="login py-5 border-top-1">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5">
         <div class="card ">
            <div class="card-header bg-danger text-white">Your Order Details</div>
            <div class="card-body">
               <table class="table table-bordered">
                  <tr>
                    <th>Sr No</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Qty</th>
                   
                  </tr>
                  <?php $i = 0; 
                  $_SESSION['amount'] = 0;
                  $bill_amount = 0;
                  while($cart_list_row = $cart_list->fetch_object()) { 
                    $i++;
                    $bill_amount += $cart_list_row->qty * $cart_list_row->price; 

                    $_SESSION['amount'] = $_SESSION['amount'] + $bill_amount;
                     ?>
                  <tr>
                    <td><label for="name"><?php echo $i ?></label></td>
                    <td><label for="name"><?php echo $cart_list_row->dish_name ?></label></td>
                    <td><label for="name"><?php echo $cart_list_row->qty * $cart_list_row->price ?> Rs.</label></td>
                    <td>
                      <label for="name">
                       <?php echo $cart_list_row->price ?></label></td>
                   
                  </tr>
                  <?php } ?>
                  <tr>
                    <td>Total Amount</td>
                    <td colspan="3"><?php echo $_SESSION['amount']; ?> Rs.</td>
                   
                  </tr>
          </table>
            </div>
          </div>
         
      </div>
      <div class="col-lg-7 col-md-8 align-item-center">
        <div class="card ">
            <div class="card-header bg-danger text-white">Shipping Address</div>
            <div class="card-body">
              <form method="post" >  

            <div class="form-group mb-30">                
                <div>
                  <div class="form-group mb-30">
                    <div class="form-group mb-30">
                        <label for="email">First Name</label>
                        <input type="text" class="form-control" name="first_name" required>
                    </div>
                  </div>
                  <div class="form-group mb-30">
                    <div class="form-group mb-30">
                        <label for="email">Last Name</label>
                        <input type="text" class="form-control" name="last_name" required>
                    </div>
                  </div>
                  <div class="form-group mb-30">
                    <div class="form-group mb-30">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                  </div>
                  <div class="form-group mb-30">
                    <div class="form-group mb-30">
                        <label for="email">Mobile No</label>
                        <input type="number" class="form-control" name="mobileno" required>
                    </div>
                  </div>
                  <div class="form-group mb-30">
                    <div class="form-group mb-30">
                        <label for="email">Address</label>
                        <textarea class="form-control" name="address" ></textarea>
                    </div>
                  </div>
                  <div class="form-group mb-30">
                    <div class="form-group mb-30">
                        <label for="email">PinCode</label>
                        <input type="number" class="form-control" name="pincode" required>
                    </div>
                  </div>
                  <div class="form-group mb-30">
                    <div class="form-group mb-30">
                        <label for="email">City</label>
                        <input type="text" class="form-control" name="city" required>
                    </div>
                  </div>
                  <div class="form-group mb-30">
                    <div class="form-group mb-30">
                        <label for="email">State</label>
                        <input type="text" class="form-control" name="state" required>
                    </div>
                  </div>

                  <div class="form-group mb-30">
                    <div class="form-group mb-30">
                        <label for="email">Table</label>
                        <select id="country" class="form-control" name="country">
                            <option value="">- -Select Country- -</option>
                            <option value="IN">India</option>
                        </select>
                    </div>
                  </div>

                  <div class="card ">
                      <div class="card-header bg-danger text-white">Payment Methods</div>
                      <div class="card-body">
                        <div class="ship-address">
                            <input type="radio" name="payment_method" id="cash" value="cod">
                            <span>Cash On Delivery</span>
                        </div>
                         <div class="ship-address">
                            <input type="radio" name="payment_method" id="online" value="online">
                            <span>Pay Now</span>
                        </div>
                      </div>
                  </div>
                   
                        
                    
                                    
              </div>
              </div>
            <input type="submit" id="submit" name="submit" class="btn btn-transparent" value="Place Order" />
            <a href="cart_list.php"><input type="button" name="backbtn" class="btn btn-transparent" value="back" /></a>
          </form>
            </div>
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