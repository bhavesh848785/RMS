<?php 
session_start();

include 'connection/conn.php';

if(!isset($_SESSION['customer_id'])){
  header("location:logout.php");
}

$userid = $_SESSION['customer_id'];

if (isset($_GET['delete_cart_id'])) {
  $delete_id = $_GET['delete_cart_id'];
  $delete = $con->query("delete from cart where cart_id = '$delete_id'");
  header("location:cart_list.php");
}

$cart_list = $con->query("Select c.cart_id, f.price, c.qty, c.pimg, c.customer_id, f.dish_name from cart c inner join food f on f.food_id = c.product_id where customer_id = '$userid'");


if(isset($_POST['submit'])){
  $userid = $_SESSION['customer_id'];
  $message = $_POST['message'];
  $feedback_row = $con->query("insert into feedback (user_id,message) values ('$userid','$message')");

  if($feedback_row){
    echo "<script>alert('Thank you for your feedback.');</script>";
  }else{
    echo "<script>alert('Due to some error so please try again.');</script>";
  }
}
$bill_amount = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>RMS | Feedback</title>
  <?php include 'link.php' ?>
</head>
<body class="body-wrapper">
<?php include 'header.php' ?>
<section class="page-title">
  <!-- Container Start -->
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2 text-center">
        <!-- Title text -->
        <h3>My Cart</h3>
      </div>
    </div>
  </div>
  <!-- Container End -->
</section>
<section class="blog single-blog section">
	<div class="container">
		<div class="row">
			
			<div class="col-lg-12">
       
          
          <form method="post">
             
              
               <div class="card ">
  <div class="card-header bg-danger text-white">My Shopping Cart</div>
  <div class="card-body">
     <table class="table table-bordered">
                  <tr>
                    <th>Sr No</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Delete</th>
                  </tr>
                  <?php $i = 0; 
                  $_SESSION['amount'] = 0;
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
                      <input maxlength="12" type="text" value="<?php echo $cart_list_row->qty ;?>" name="quantity" id="quantity"        onchange="return updateQuantity(this.value, <?php echo $cart_list_row->cart_id ?> , <?php echo $cart_list_row->price ?>)" /></label></td>
                    <td><label for="name"><a href="cart_list.php?delete_cart_id=<?php echo $cart_list_row->cart_id ?>"><input type="button" name="Delete" value="Remove" class="btn btn-danger"></a></label></td>
                  </tr>
                  <?php } ?>
                  <tr>
                    <td>Total Amount : </td>
                    <td colspan="2"><?php echo $bill_amount; ?> Rs.</td>
                    <td colspan="2"><a href="checkout.php"><input type="button" id="submit" name="checkout" class="btn btn-transparent" value="Procced to checkout" /></a></td>
                  </tr>
                </table>
  </div>
 <!--  <div class="card-footer">Footer</div> -->
</div>
               
                         
          </form>
        
      </div>
      <div class="col-lg-2">
      </div>
		</div>
	</div>
</section>

<?php include 'footer.php' ?>
<!-- 
Essential Scripts
=====================================-->
<script src="plugins/jquery/jquery-1.11.3.min.js"></script>
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
<script type="text/javascript">
    function updateQuantity(quantity, pid, price)
    {
        $.ajax({
            type:"POST",
            url:'update_quantity.php',
            data : { quantity : quantity, cart_id : pid, price : price },
            success:function(result)
            {
                document.location='cart_list.php';
            }
        });
    }
</script>
</body>
</html>