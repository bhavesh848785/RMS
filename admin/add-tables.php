<?php
include 'session.php';
include 'connection/conn.php';

if(isset($_POST['submit'])){
  $table_no = $_POST['table_no'];
  $capecity = $_POST['capecity'];
  $insert_row = $con->query("insert into tables(table_no,capacity) values('$table_no','$capecity')");
    
  if($insert_row){
      echo "<script> alert('Tables is inserted successfully.'); </script>";
      header("location:tables.php");
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
                            <div class="col mt-4">Table Number</div>
                            <div class="col mt-4">
                              <input type="number" id="table_no" name="table_no" class="form-control" placeholder="Table No">
                            </div>
                          </div>
                          <div class="row align-items-center">
                            <div class="col mt-4">Capecity</div>
                            <div class="col mt-4">
                              <input type="number" id="capecity" name="capecity" class="form-control" placeholder="Capecity">
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