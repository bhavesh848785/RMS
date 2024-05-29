<?php
include 'session.php';
include 'connection/conn.php';

if(isset($_POST['submit'])){
    $firstName= $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $registration_id = $_POST['registration_id'];
        
     $row = $con->query("update registration set first_name = '$firstName',last_name = '$lastName',emailid = '$email' where registration_id = '$registration_id' ");
     if($row){
        echo "<script> alert('Profile is successfully updated.'); </script>";
        header("location:logout.php");
     }else{
        echo "<script> alert('Profile is not updated so please try again.'); </script>";
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
                <?php 

                $result = $con->query("Select * from registration where registration_id = '$loginId' ");

                $row = $result->fetch_object();

                ?>
                <!-- Begin Page Content -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                 <form class="user" method="post">
                        <div class="form-group row">
                            <div class="col-sm-2">First Name : </div>
                            <div class="col-sm-5">
                                <input type="text" class="form-control form-control-user" name="firstName" id="firstName"
                                    value="<?php echo $row->first_name ?>">
                                <input type="hidden" name="registration_id" id="registration_id" value="<?php echo $loginId ?>" >
                            </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">Last Name : </div>
                            <div class="col-sm-5">
                              <input type="text" class="form-control form-control-user" name="lastName" id="lastName"
                                   value="<?php echo $row->last_name ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">Email : </div>
                          <div class="col-sm-5">
                            <input type="email" class="form-control form-control-user" name="email" id="email" value="<?php echo $row->emailid ?>">
                              </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-3">
                            <input type="submit" name="submit" value="Update" class="btn btn-primary btn-user btn-block" >
                              </div>
                        </div>
                        
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