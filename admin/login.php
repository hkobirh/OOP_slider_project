<?php

require_once '../vendor/autoload.php';

use App\Classes\Auth;

$auth = new Auth();

// if($auth->loginis()){
// header('location: dashboard.php');
// }
$auth->loginis() ? header('location: dashboard.php'): false;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Panel</title>
    <link rel="stylesheet" href="../assets/css/admin/login.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/fontawesome.min.css">

    <link rel="icon" href="../img/icon/favicon.png" type="image/gif" sizes="20x20">


</head>

<body>
    <div class="container">
        <!-- Start  Admin Login Form -->
        <div class="row justify-content-center h-100vh" id="login-form-box">
            <div class="col-lg-10 my-auto">
                <div class="card-group">
                    <div class="card p-4">
                        <h2 class="text-center text-primary font-weight-bold">Login to your account</h2>
                        <hr class="my-3">
                        <div id="loginError"></div>
                        <form action="#" method="post" class="px-3" id="login-form">
                            <div class="input-group input-group-lg form-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                </div>
                                <input type="email" class="form-control" name="l_email" id="l_email" placeholder="Enter your email " minlength="8" value="<?= isset($_COOKIE['user_email']) ? $_COOKIE['user_email']: '' ?>">
                                <div class="invalid-feedback pl-5">This email filed is required!</div>

                            </div>
                            <div class="input-group input-group-lg form-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-key"></i>
                                    </span>
                                </div>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password " minlength="8" value="<?= isset($_COOKIE['user_password']) ? $_COOKIE['user_password']: ''?>">
                                <div class="invalid-feedback pl-5">This password filed is required!</div>
                            </div>
                            <div class="form-group">
                                <div class="float-left custom-checkbox custom-control">
                                    <input type="checkbox" name="rememberMe" <?= isset($_COOKIE['user_password']) ? 'checked': '' ?>  class="custom-control-input" id="rememberMe" value="1" >
                                    <label for="rememberMe"  class="custom-control-label"> Remember me</label>
                                </div>
                                <div class="float-right">
                                    <a href="javascript:" id="showforgetform" class="text-decoration-none"> Forget password ?</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Sign In" id="loginBtn" class="btn btn-block btn-primary">
                            </div>
                        </form>
                    </div>
                    <div class="card p-4 justify-content-center" style="background: #363c43;">
                        <h2 class="text-center text-white font-weight-bold">Welcome back!</h2>
                        <hr class="my-3 bg-light">
                        <p class="text-center text-light lead">Please log in using your email and password. If you haven't registered yet, you can register for free.</p>
                        <button class="btn btn-outline-light  btn-lg align-self-center mt-4" id="showsignupform"> Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End  Admin Login Form -->

        <!-- Start  Admin Register/Create new account Form -->
        <div class="row justify-content-center h-100vh" id="register-form-box" style="display:none;">
            <div class="col-lg-10 my-auto">
                <div class="card-group">
                    <div class="card p-4">
                        <h2 class="text-center text-primary font-weight-bold">Create new account</h2>
                        <hr class="my-3">
                        <div id="registerError"></div>
                        <form action="#" method="post" class="px-3" id="register-form">
                            <div class="input-group input-group-lg form-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="far fa-user"></i>
                                    </span>
                                </div>
                                <input type="name" class="form-control " name="name" id="name" placeholder="Enter your name " minlength="4">
                                <div class="invalid-feedback pl-5">This name filed is required!</div>
                            </div>
                            <div class="input-group input-group-lg form-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div>
                                <input type="name" class="form-control" name="username" id="username" placeholder="Enter your username " minlength="4">
                                <div class="invalid-feedback pl-5">This username filed is required!</div>
                            </div>
                            <div class="input-group input-group-lg form-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                </div>
                                <input type="email" class="form-control " name="r_email" id="r_email" placeholder="Enter your email " minlength="8">
                                <div class="invalid-feedback pl-5">This email filed is required!</div>
                            </div>
                            <div class="input-group input-group-lg form-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-key"></i>
                                    </span>
                                </div>
                                <input type="password" class="form-control" name="r_password" id="r_password" placeholder="Enter your password " minlength="8">
                                <div class="invalid-feedback pl-5">This password filed is required!</div>
                            </div>
                            <div class="input-group input-group-lg form-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-key"></i>
                                    </span>
                                </div>
                                <input type="password" class="form-control" name="c_password" id="c_password" placeholder="Enter your Confirm password " minlength="8">
                                <div class="invalid-feedback pl-5">The Confirm password desnot mcah !</div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Register" id="registerUser" class="btn btn-block btn-primary">
                            </div>
                        </form>
                    </div>
                    <div class="card p-4 justify-content-center" style="background: #363c43;">
                        <h2 class="text-center text-white font-weight-bold">Welcome back!</h2>
                        <hr class="my-3 bg-light">
                        <p class="text-center text-light lead">Please log in using your email and password. If you haven't registered yet, you can register for free.</p>
                        <button class="btn btn-outline-light  btn-lg align-self-center mt-4" id="showsigninform"> Sign In</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End  Admin Register/Create new account Form -->

        <!-- Start Admin Forget/Reset your password Form -->
        <div class="row justify-content-center h-100vh" id="forget-form-box" style="display: none;">
            <div class="col-lg-10 my-auto">
                <div class="card-group">
                    <div class="card p-4">
                        <h2 class="text-center text-primary font-weight-bold">Reset your password</h2>
                        <hr class="my-3">
                        <div id="forgetPasswordError"></div>

                        <form action="#" method="post" class="px-3" id="forget-form">
                            <div class="input-group input-group-lg form-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                </div>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email ">
                                <div class="invalid-feedback pl-5">This email filed is required!</div>

                            </div>
                            <div class="form-group">
                                <input type="submit" value="Reset password" id="forget-btn" class="btn btn-block btn-primary">
                            </div>
                        </form>
                    </div>
                    <div class="card p-4 justify-content-center" style="background: #363c43;">
                        <h3 class="text-center text-white font-weight-bold">No worries. Let's get you a new one quickly!</h3>
                        <hr class="my-3 bg-light">
                        <p class="text-center text-light lead"> Enter your email and check your inbox for instructions. Please also check your spam folder.</p>
                        <button class="btn btn-outline-light  btn-lg align-self-center mt-4" id="showsignbackform"> Back</button>
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