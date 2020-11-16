<?php

require_once '../vendor/autoload.php';

use App\Classes\Auth;

$auth = new Auth();

$auth->loginis() ? header('location: dashboard.php'): false;

if (isset($_GET['email']) && isset($_GET['token'])){
    $email = $_GET['email'];
    $token = $_GET['token'];
    $result = $auth->chackemailtikenvalid($email,$token);
    if($result->num_rows !== 1){
        header("location: login.php");
    }
}else{
    header("location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password </title>
    <link rel="stylesheet" href="../assets/css/admin/login.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/fontawesome.min.css">

</head>

<body>
    <div class="container">
                <!-- Start Admin Forget/Reset your password Form -->

        <div class="row justify-content-center h-100vh" id="reset-form-box">
            <div class="col-lg-10 my-auto">
                <div class="card-group">
                    <div class="card p-4" style="flex-grow: 1.5;">
                        <h2 class="text-center text-primary font-weight-bold">Reset Your password</h2>
                        <hr class="my-3">
                        <div id="resetpasswordError"></div>
                        <form action="#" method="post" class="px-3" id="reset-form">
                            <input type="hidden" value="<?= $email ?>" name="email">
                            <div class="input-group input-group-lg form-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-key"></i>
                                    </span>
                                </div>
                                <input type="password" class="form-control" name="reset_password" id="reset_password" placeholder="Reset your new password " minlength="8" >
                                <div class="invalid-feedback pl-5">This password filed is required!</div>
                            </div>
                            <div class="input-group input-group-lg form-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-key"></i>
                                    </span>
                                </div>
                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Reset your confirm password " minlength="8" >
                                <div class="invalid-feedback pl-5">This confirm password do not match!</div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Reset password" id="resetpassword" class="btn btn-block btn-primary">
                            </div>
                        </form>
                    </div>
                    <div class="card p-4 justify-content-center" style="background: #363c43;">
                        <h2 class="text-center text-white font-weight-bold">Welcome back!</h2>
                        <hr class="my-3 bg-light">
                        <p class="text-center text-light lead">Please log in using your email and password. If you haven't registered yet, you can register for free.</p>
                    </div>
                </div>
            </div>
        </div>
                <!-- End Admin Forget/Reset your password Form -->




    </div>







    <script src="../assets/js/jquery-3.5.1.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/admin/login.js"></script>


</body>

</html>