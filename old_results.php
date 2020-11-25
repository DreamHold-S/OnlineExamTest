<?php
session_start();
include "connection.php";
if(!isset($_SESSION["name"])){
    ?>
    <script  type="text/javascript">
        window.location = "index.php"
    </script>
    <?php
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
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

        <h1 class="logo mr-auto"><a href="index.html"> Онлайн Тест</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="active"><a href="">Нүүр</a></li>
                <li><a href="old_results.php">Шалгалт</a></li>
                <li class="drop-down">  <a href=""  style="color: green" > Сайн Байна уу <?php echo $_SESSION["name"]; ?></a>
                    <ul>
                        <li>
                            <a href="logout.php" tite="Logout">Гарах</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav><!-- .nav-menu -->

    </div>
</header><!-- End Header -->


<main id="main">

    <section id="counts" class="counts section-bg" style="margin-top: 20px;" >
        <div class="container">


        </div>
    </section>
    <div class="col-lg-8  col-lg-push-3 "  style="min-height: 500px;  background-color: whitesmoke; margin: auto;  margin-top: 10px;  margin-bottom: 10px;">
        <div class="section-title">
            <h2 style="color: red">Шалгалтын тухай мэдээлэл</h2>
              </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">Дугаар</th>
                                    <th scope="col">Нэр</th>
                                    <th scope="col">Ангилал</th>
                                    <th scope="col">Нийт Асуулт</th>
                                    <th scope="col">Зөв Хариулт</th>
                                    <th scope="col">Буруу Хариулт</th>
                                    <th scope="col">Огноо</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $correctArray = array();
                                $wrongArray = array();

                                $count = 0;
                                $userId = $_SESSION["name"];
                                $res = mysqli_query($link,"select * from exam_result where user_name = '$userId'") or die(mysqli_error($link));
                                while ($row = mysqli_fetch_array($res))
                                {
                                    $correctArray = $row["correct"];
                                    $wrongArray = $row["wrong"];;
                                    $count = $count+1;
                                    ?>
                                    <tr>
                                        <th scope="row"> <?php echo $count ?> </th>
                                        <td><?php echo $row["user_name"]?></td>
                                        <td><?php echo $row["exam_type"]?></td>
                                        <td><?php echo $row["total_question"]?></td>
                                        <td><?php echo $row["correct_answer"]?></td>
                                        <td><?php echo $row["wrong_answer"]?></td>
                                        <td><?php echo $row["exam_time"]?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                                             </table>
                </div> <!-- .card -->
            </div>

                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

        <div class="section-title">
            <h2 style="color: red; margin-top: 10px">Шалгалтын тухай мэдээлэл</h2>

            <?php


            ?>
        </div>


    </div>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="container d-md-flex py-4">

        <div class="mr-md-auto text-center text-md-left">
            <div class="copyright">
                &copy; 2020 <strong><span>Он</span></strong> Бүх эрх хуулиар хамгаалагдав
            </div>
        </div>

    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="assets/vendor/counterup/counterup.min.js"></script>
<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>
</html>

