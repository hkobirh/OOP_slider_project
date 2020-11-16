<?php

require_once '../vendor/autoload.php';

use App\Classes\Auth;

$auth = new Auth();

// if($auth->loginis()){
// header('location: dashboard.php');
// }
$auth->loginis() ? false: header('location: login.php');

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/css/datepicker.css">
    <link rel="stylesheet" href="../assets/css/toastr.min.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/brands.min.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../assets/css/admin/style.css">


    <link rel="icon" href="../img/icon/favicon.png" type="image/gif" sizes="20x20">

    <title>
        <?= ucfirst(basename($_SERVER['PHP_SELF'], '.php')) ?> | MD Sofiul Bashar</title>
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark  bg-dark">
            <div class="container">
                <a class="navbar-brand" href="dashboard.php">Sofiul New Ssit</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item  <?= (basename($_SERVER['PHP_SELF']) === 'dashboard.php' ? 'active' : '') ?> ">
                            <a class="nav-link" href="dashboard.php"> <i class="fa fa-home"></i> Dashboard</a>
                        </li>
                        <li class="nav-item  <?= (basename($_SERVER['PHP_SELF']) === 'sliders.php' ? 'active' : '') ?> ">
                            <a class="nav-link" href="sliders.php"> <i class="fa fa-sliders-h"></i> Sliders</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hi <?= stristr( $_SESSION['user_name'] , ' ' , true ) ?></a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="#">
                                    <?= $_SESSION['user_username']?>
                                </a>
                                <a class="dropdown-item" href="logout.php">Logout</a>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </div>