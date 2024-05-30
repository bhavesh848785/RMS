<?php 
session_start();
include 'connection/conn.php';
$query = "Select f.*,c.name,crt.cart_id 
		from food f 
		inner join category c on f.category_id = c.category_id
		left join cart crt on crt.product_id = f.food_id ";

// To Fetch All Categories
$categories = $con->query("select * from category");
// Search Using Category
if(isset($_POST['category_id']))
{
	$category_id = $_POST['category_id'];
	$query = "select * from food where category_id = '$category_id' order by food_id desc ";	
}
else
{
	$query = "select * from food order by food_id desc limit 6";
}

$result = $con->query("$query");

if(isset($_GET['remove_food_id'])){
	$cart_remove_id = $_GET['remove_food_id'];
	$d = $con->query("delete from cart where product_id = '$cart_remove_id' and customer_id = '$customer_id'");
	if ($d)
    {
        echo"<script>alert('Food remove from cart');document.location='index.php';</script>";
    }
    else
    {
        header('location:index.php');
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>RMS | RESTAURANT MANAGEMENT SYSTEM</title>
  <?php include 'link.php' ?>
</head>
<body class="body-wrapper">
<?php include 'header.php' ?>
<section class="hero-area bg-1 text-center overly" style="height: 500px;">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Header Contetnt -->
				<div class="content-block">
					<div class="short-popular-category-list text-center">			
					</div>
				</div>
				<!-- Advance Search -->
				<div class="advance-search" style="margin-top: 240px !important;">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-12 col-md-12 align-content-center">
								<form method="post">
									<div class="form-row">
										<div class="form-group col-lg-3 col-md-6"></div>
										<div class="form-group col-lg-4 col-md-6">
											<select class="w-100 form-control mt-lg-1 mt-md-2" id="category_id" name="category_id">
											<option>Category</option>
											<?php while($row_cat=$categories->fetch_object()){  ?>
												<option value="<?php echo $row_cat->category_id ?>" <?php if( isset($_POST['category_id']) && $row_cat->category_id == $_POST['category_id']) echo 'Selected' ?> ><?php echo $row_cat->name ?></option>	
											<?php } ?>
											</select>
										</div>
										<div class="form-group col-xl-2 col-lg-3 col-md-6 align-self-center">
											<button type="submit" class="btn btn-primary active w-100">Search Food</button>
										</div>
										<div class="form-group col-lg-3 col-md-6"></div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
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
				<!-- Section title -->
				<br/><br/>
				<div class="section-title">
					<h2>All Food</h2>
				</div>
				<form method="post">
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
				</form>
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



