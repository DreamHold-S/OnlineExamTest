<?php
session_start();
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Сургалт Амжилт</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
        <h1 class="logo mr-auto"><a href="index.php"  style="font-size: 21px">Сургалт-Амжилт</a></h1>
        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="active"><a href="index.php" style="font-family: 'Open Sans',sans-serif ">НҮҮР</a></li>
                <li><a href="courses.php"  style="font-family: 'Open Sans',sans-serif ">СУРГАЛТУУД</a></li>
                <li><a href="trainers.php"  style="font-family: 'Open Sans',sans-serif ">БАГШ НАР</a></li>
                <li><a href="login.php"  style="font-family: 'Open Sans',sans-serif ">ОНЛАЙН ТЕСТ</a></li>
                <li><a href="contact.php"  style="font-family: 'Open Sans',sans-serif ">ХОЛБОО БАРИХ</a></li>

                <?php
                if(isset($_SESSION['name']))
                {
                    ?>
                    <li class="drop-down" style="font-family: 'Open Sans',sans-serif " ><a href=""> Сайн Байна уу <?php echo $_SESSION["name"]; ?></a>
                        <ul>
                            <li><a href="userlogout.php">Гарах</a></li>
                        </ul>
                    </li>

                    <?php
                }
                else
                {
                    ?>
                    <li><a href="loginuser.php"  style="font-family: 'Open Sans',sans-serif ">НЭВТРЭХs</a></li>
                   <?php
                }
                ?>
            </ul>
        </nav><!-- .nav-menu -->
    </div>
</header><!-- End Header -->