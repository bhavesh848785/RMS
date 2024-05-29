<?php
session_start();
include 'connection/conn.php';

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userType = $_POST['userType'];
    
    $result = $con->query("Select * from registration where emailid = '$email'");

    $row_count = $result->num_rows;
    //echo "Count ".$row_count;
    if($row_count == 1){
        $row = $result->fetch_object();    
        if($row->user_type == $userType){
            if($row->password == $password){
                $loginId = $row->registration_id;
                $_SESSION['user_type'] = $row->user_type;
                $_SESSION['name'] = $row->first_name." ".$row->last_name;
                $_SESSION['login_id'] = $loginId;
                date_default_timezone_set('Asia/kolkata');
                $start_date_time = date('Y:m:d H:i:s');
                $login_history = $con->query("insert into login_history (login_id,start_date_time,logout_date_time) values ('$loginId','$start_date_time','')");
                //$_SESSION['login_id'] = $con->insert_id;
                header("location:home.php");
            }else{
                echo "<script>alert('Password is incorrect');</script>";    
            }
        }else{
            echo "<script>alert('Select User type is incorrect');</script>";    
        }
    }else{
        echo "<script>alert('User does not exists');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row" style="background-color: white;">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <select name="userType" style="width: 100%;padding: 10px 10px;border-radius: 10rem;" >
                                                <option value="">Select</option>
                                                <option value="Admin" selected="selected" >Admin</option>
                                                <option value="Executive">Executive</option>
                                            </select>
                                        </div> 
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="email" name="email" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" name="password" placeholder="Password">
                                        </div>
                                        <input type="submit" name="submit" value="Login"  class="btn btn-primary btn-user btn-block" >
                                        <hr>
                                    </form>
                                    <hr>
                                    <!-- <div class="text-center">
                                        <a class="small" href="forgot-password.php">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
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

</body>

</html>