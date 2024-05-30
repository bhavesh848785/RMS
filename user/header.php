<?php
include 'connection/conn.php';

$category_row = $con->query("Select * from category");

?>
<header>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-light navigation">
					<a class="navbar-brand" href="index.php">
						<img src="images/logo1.png" style="height: 120px; width: 200px;">
						<!-- <img src="images/logo.png" alt=""> -->
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto main-nav ">
							<li class="nav-item">
								<a class="nav-link" href="index.php">Home</a>
							</li>
							<li class="nav-item dropdown dropdown-slide @@listing">
								<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Food <span><i class="fa fa-angle-down"></i></span>
								</a>
								<!-- Dropdown list -->
								<ul class="dropdown-menu">
									<?php while( $cat_list_row = $category_row->fetch_object() ){ ?>
									<li><a class="dropdown-item @@category" href="food.php?category_id=<?php echo $cat_list_row->category_id; ?>"><?php echo $cat_list_row->name; ?></a></li>
								<?php } ?>
								</ul>
							</li>
							<?php if(isset($_SESSION['name']) && isset($_SESSION['customer_id'])){
								$customer_id = $_SESSION['customer_id'];
								$cat_count_row = $con->query("Select Count(1) as cart_product_count from cart where customer_id = '$customer_id' ");

								$pro_cnt_row = $cat_count_row->fetch_object();
								$cnt = $pro_cnt_row->cart_product_count;

							 ?>
								<li class="nav-item">
									<a class="nav-link" href="book-tables.php">Book Table</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="cart_list.php"><?php echo 
									$cnt ?> Cart</a>
								</li>
								<li class="nav-item dropdown dropdown-slide @@listing">
								<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<?php echo $_SESSION['name'] ?> <span><i class="fa fa-angle-down"></i></span>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a class="dropdown-item @@category" href="edit_profile.php">Edit Profile</a>
									</li>
									<li>
										<a class="dropdown-item @@category" href="change_password.php">Change Pasword</a>
									</li>
									<li>
										<a class="dropdown-item @@category" href="order_list.php">My Orders</a>
									</li>
									<li>
										<a class="dropdown-item @@category" href="feedback.php">Post Feedback</a>
									</li>
									<li class="nav-item">
										<a class="dropdown-item @@category" href="logout.php">Logout</a>
									</li>
								</ul>
							</li>								
							<?php }else{?>
								<li class="nav-item">
									<a class="nav-link" href="about-us.php">About Us</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="login.php">Login</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="register.php">Register</a>
								</li>
							<?php } ?>
						</ul>
						<!-- <ul class="navbar-nav ml-auto mt-10">
							<li class="nav-item">
								<a class="nav-link login-button" href="register.php">Register</a>
							</li>
						</ul> -->
					</div>
				</nav>
			</div>
		</div>
	</div>
</header>
