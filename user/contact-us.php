<!DOCTYPE html>
<html lang="en">
<head>
  <title>RMS | About us</title>
  <?php include 'link.php' ?>
</head>
<body class="body-wrapper">
<?php include 'header.php' ?>
<!--=================================
=            Single Blog            =
==================================-->
<section class="blog single-blog section">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<article class="single-post">
					<h2>RESTAURANT MANAGEMENT SYSTEM</h2>
					<img src="images/blog/post-4.jpg" alt="article-01">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmod tempor incididunt labore et dolore
						magna aliqua. Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip.ex ea
						commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
						nulla pariatur. Excepteur sint occaecat cupidatat non proident.
						sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem
						aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
						Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.</p>

					<p>sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est,
						qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora
						incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
				</article>
				
			</div>
			<div class="col-lg-6">
        <div class="block comment">
          <h4>Contact</h4>
          <form action="#">
            <div class="form-group mb-30">
              <div class="form-group mb-30">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" required>
                </div>
            </div>
            <div class="form-group mb-30">
              <div class="form-group mb-30">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" required>
                </div>
            </div>
            <div class="form-group mb-30">
              <div class="form-group mb-30">
                  <label for="email">Mobile No</label>
                  <input type="number" class="form-control" id="mobile-no" required>
                </div>
            </div>
            <!-- Message -->
            <div class="form-group mb-30">
              <label for="message">Message</label>
              <textarea class="form-control" id="message" rows="8" required></textarea>
            </div>
            <input type="submit" id="submit" name="submit" class="btn btn-transparent" value="Submit" />
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