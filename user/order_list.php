<?php 
session_start();

include 'connection/conn.php';

if(!isset($_SESSION['customer_id'])){
  header("location:logout.php");
}

$userid = $_SESSION['customer_id'];

$order_list = $con->query("Select * from orders where customer_id = '$userid'");

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
        <h3>My Order List</h3>
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
            <?php while($order_list_row = $order_list->fetch_object()) {  ?>
              <div class="card ">
                <div class="card-header bg-danger text-white">Order Date : <?php echo $order_list_row->date ?></div>
                  <div class="card-body">
                  <table class="table table-bordered">
                  <tr>
                    <th>Sr No</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total Price</th>
                  </tr>
                  <?php 
                    $order_item_list = $con->query("Select * from order_items where order_id = '$order_list_row->order_id'");
                    $i = 0;
                    while($order_item_list_row = $order_item_list->fetch_object()){ 
                      $i++;                   
                   ?>
                   <tr>
                    <th><?php echo $i ?></th>
                    <th><?php echo $order_item_list_row->pname ?></th>
                    <th><?php echo $order_item_list_row->price / $order_item_list_row->quantity  ?></th>
                    <th><?php echo $order_item_list_row->quantity ?></th>
                    <th><?php echo $order_item_list_row->price ?></th>
                  </tr>
                   <?php } ?>  
                </table>
              </div>
            </div> 
            <?php } ?>      
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
</body>
</html>