<?php
include 'session.php';
include 'connection/conn.php';
$edit_food_id = $_GET['food_id'];

$result = $con->query('Select category_id,name from category');

$edit_result = $con->query("Select f.food_id,f.dish_name,f.description,f.image,f.price,c.category_id,c.name from food f inner join category c on f.category_id = c.category_id where f.food_id = $edit_food_id ");
$edit_result_row = $edit_result->fetch_object();

if(isset($_POST['submit'])){
  $cat_id = $_POST['category_id'];
  $dish_name = $_POST['dish_name'];
  $description = $_POST['description'];
  $price = $_POST['price'];
    
  $update_query = $con->query("update food set category_id = '$cat_id',dish_name = '$dish_name',description = '$description',price = '$price' where food_id = '$edit_food_id'");
  header("location:add-food-list.php");
  if($update_query){
      echo "<script> alert('Food is updated successfully.'); </script>";
  }else{
    echo "<script> alert('Getting error so please try again.'); </script>";
  }
}

?>
<html>
<head>
    <title>RMS - Add Food</title>
    <?php include 'link.php' ?>
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include 'leftbar.php' ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php include "header.php" ?>
                <!-- Begin Page Content -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                 <form method="post" enctype="multipart/form-data" >               
                   <section>
                    <div class="container">
                      <div class="row">
                        <div class="col-12 col-md-8 col-lg-8 col-xl-6">
                          <div class="row align-items-center">
                            <div class="col mt-4">Select Food Category</div>
                            <div class="col mt-4">
                              <select class="form-control" name="category_id" id= "category_id" >
                                  <option value="0" >Select</option>
                                  <?php while($row = $result->fetch_object()) { ?>
                                    <option <?php if($edit_result_row->category_id == $row->category_id) echo 'selected' ?> value="<?php echo $row->category_id; ?>" ><?php echo $row->name; ?></option>
                                  <?php } ?>
                              </select>
                            </div>
                          </div>
                          <div class="row align-items-center">
                            <div class="col mt-4">Dish Name</div>
                            <div class="col mt-4">
                              <input type="text" id="dish_name" name="dish_name" class="form-control" value="<?php echo $edit_result_row->dish_name; ?>" placeholder="Food Name">
                            </div>
                          </div>
                          <div class="row align-items-center">
                            <div class="col mt-4">Description</div>
                            <div class="col mt-4">
                              <textarea class="form-control" id="description" name="description"><?php echo $edit_result_row->description; ?></textarea>
                            </div>
                          </div>

                          <div class="row align-items-center">
                            <div class="col mt-4">Image</div>
                            <div class="col mt-4">
                              <!-- <input type="file" class="form-control" name="image"  id="image" /> -->
                              <img src="upload/<?php echo $edit_result_row->image; ?>" height="100" width="100" >
                            </div>
                          </div>

                          <div class="row align-items-center">
                            <div class="col mt-4">Price</div>
                            <div class="col mt-4">
                              <input type="number" id="price" name="price" class="form-control" value="<?php echo $edit_result_row->price; ?>" >
                            </div>
                          </div>
                          <div class="row justify-content-center mt-4">
                            <div class="col" >
                              <input type="submit" name="submit" class="btn btn-primary mt-4" value="Submit" >
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
                </form>
                </div>
                <!-- /.container-fluid -->
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>