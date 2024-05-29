<?php 
include 'session.php';
include 'connection/conn.php';

$result = $con->query("Select c.name,c.email,c.contact,c.address,c.create_date,
                        oi.pname,oi.quantity,oi.price from order_items oi
                        inner join orders o on o.order_id = oi.order_id
                        inner join customer c.customer_id = o.customer_id");

?>
<html>
<head>
    <title>RMS - Book Order List</title>
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
                    <!-- Page Heading -->
                    <!-- DataTales Example -->
                    <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Today Order List - </h6>
                        </div>
                    <?php 
                    $order_list = $con->query("Select * from orders order by order_id asc ");
                    while ($order_list_row = $order_list->fetch_object()){
                   ?>
                    <div class="card shadow mb-4">
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Address</th>
                                            <th>Food</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $order_item_list = $con->query("Select c.name,c.email,c.contact,c.address,c.create_date,
                                    oi.pname,oi.quantity,oi.price from order_items oi
                                    inner join orders o on o.order_id = oi.order_id
                                    inner join customer c on c.customer_id = o.customer_id
                                    where o.order_id = '$order_list_row->order_id' ");
                                    $i = 0;
                                    while($order_item_list_row = $order_item_list->fetch_object()){ 
                                      $i++;                   
                                   ?>
                                   <tr>
                                    <th><?php echo $i ?></th>
                                    <th><?php echo $order_item_list_row->name ?></th>
                                    <th><?php echo $order_item_list_row->email ?></th>
                                    <th><?php echo $order_item_list_row->contact ?></th>
                                    <th><?php echo $order_item_list_row->address ?></th>
                                    <th><?php echo $order_item_list_row->pname ?></th>
                                    <th><?php echo $order_item_list_row->quantity ?></th>
                                    <th><?php echo $order_item_list_row->price ?></th>
                                  </tr>
                                   <?php } ?>                                         
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php } ?> 
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

    <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form role="form" method="POST" action="">
            <div class="form-group">
                <label class="control-label">Category Name</label>
                <div>
                    <input type="email" class="form-control input-lg" name="Category Name" placeholder="Category Name">
                </div>
            </div>
            <button type="submit" class="btn btn-success" style="float: right;">Submit</button>
        </form>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
    <!-- Bootstrap core JavaScript-->
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