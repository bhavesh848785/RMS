<?php 
session_start();
include 'connection/conn.php';

$category_id = $_GET['category_id'];
$query = "select * from food where category_id = '$category_id' order by food_id desc ";
$result = $con->query("$query");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>RMS | RESTAURANT MANAGEMENT SYSTEM</title>
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
        <h3>Food</h3>
      </div>
    </div>
  </div>
  <!-- Container End -->
</section>
<section class=" section">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="row">
					<?php while($row = $result->fetch_object()){ ?>
					<div class="col-lg-4 offset-lg-0 col-md-5 offset-md-1 col-sm-6">
						<div class="category-block">
							<div class="header">
								<img src="../admin/upload/<?php echo $row->image; ?>" style="width:300px; height: 300px;" />
								
								<h4 style="position: relative;top:15px;"><b style="float: left"><?php echo $row->dish_name; ?></b><b style="float: right;"> <?php echo $row->price ?> Rs.</b></h4>
							</div>
							
							<ul class="category-list">
								<li>
									<span>
									<?php if(isset($row->cart_id)){ ?>
										<a href="index.php?remove_food_id=<?php echo $row->food_id; ?>"><button type="button" class="button" name="addCart" value="Add to cart">Remove Cart</button></a>
									<?php } else { ?>
									
                                   </li>
							</ul>
							<a href="add_cart.php?food_id=<?php echo $row->food_id; ?>" class="btn btn-danger">Add to Cart</a>
                                	<?php } ?>
						</div>
					</div> 
				<?php } ?>
					<!-- Category list -->
				</div>
			</div>
		</div>
	</div>
	<!-- Container End -->
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


<!-- Mirrored from demo.themefisher.com/classimax/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Aug 2021 17:32:52 GMT -->
</html>



