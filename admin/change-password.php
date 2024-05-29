<?php
include 'session.php';
include 'connection/conn.php';

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
                    $password_change_id = $_SESSION['login_id']; 
                    if(isset($_POST['submit'])){
                        $old_password = $_POST['old_password'];
                        $new_password = $_POST['new_password'];
                        $re_new_password = $_POST['re_new_password'];

                        $result = $con->query("Select * from registration where registration_id = '$password_change_id' ");

                        $row = $result->fetch_object();

                        if($row->password == $old_password){
                            if($new_password == $re_new_password){
                                $exe = $con->query("update registration set password = '$new_password' where registration_id = '$password_change_id'");
                                if($exe){
                                    echo "<script> alert('Password changed successfully.') </script>";
                                    session_destroy();
                                    header("location:logout.php");
                                }else{
                                    echo "<script> alert('Due to some error please try again.')</script>";
                                    //header("location:change_password.php");
                                }           
                            }else{
                                echo "<script> alert('New Password and Re-Enter new password does not match.')</script>";
                                //header("location:change_password.php");
                            }
                        }else{
                            echo "<script> alert('Enter Old password does not match with your profile password.') </script>";
                        }
                    }

                ?>
                <!-- Begin Page Content -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                 <form class="user" method="post">
                        <div class="form-group row">
                            <div class="col-sm-3">
                                Old Password : 
                            </div>
                        <div class="col-sm-3">    
                                <input type="password" class="form-control form-control-user" name="old_password" id="old_password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                New Password :
                            </div>
                        <div class="col-sm-3">
                              <input type="password" class="form-control form-control-user" name="new_password" id="new_password">
                            </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-3">
                            Re-enter New Password :
                        </div>
                        <div class="col-sm-3">
                            <input type="password" class="form-control form-control-user" name="re_new_password" id="re_new_password">
                              </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-3"></div>
                          <div class="col-sm-3">
                            <input type="submit" name="submit" value="Update Password" class="btn btn-primary btn-user btn-block" >
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