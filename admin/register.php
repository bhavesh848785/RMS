<?php 
include 'session.php';
include 'connection/conn.php';
if(isset($_POST['submit'])){
    $firstName= $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeatPassword = $_POST['repeatPassword'];
    $userType = $_POST['userType'];
        
    if($password == $repeatPassword){
        $row = $con->query("Insert into registration (first_name,last_name,emailid,password,user_type)values ('$firstName','$lastName','$email','$password','$userType')");
        //$last_id = $con->insert_id;
        //echo "<script> alert('Thank you.: $last_id'); </script>";
        header("location:login.php");
    }else{
        echo "<script> alert('Password and Repeart Password does not match.'); </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>RESTAURANT MANAGEMENT SYSTEM - Register</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style type="text/css">
        body {
          background: url("img/bg-5.png") !important;
        }
    </style>
    <script type="text/javascript">
        
    </script>
</head>
<body class="bg-gradient-primary">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="firstName" id="firstName"
                                            placeholder="First Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="lastName" id="lastName"
                                            placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email" id="email"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group">
                                    <select name="userType" >
                                        <option value="">Select</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Executive">Executive</option>
                                    </select>
                                </div>                                
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name="password"
                                            id="password" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" name="repeatPassword"
                                            id="repeatPassword" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <input type="submit" name="submit" value="Register Account" class="btn btn-primary btn-user btn-block" >
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.php">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
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