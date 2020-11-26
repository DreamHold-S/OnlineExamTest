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

    <div class="col-lg-12  col-lg-push-3 "  style="min-height: 500px;  background-color: whitesmoke; margin: auto;  margin-top: 10px;">

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <p style="font-size: 16px; color: red" > 1) Энэ хэсэгт шалгалтын ерөнхий мэдээлэл харуулна </p>


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
                                $count = 0;
                                $correct = 0;
                                $userId = $_SESSION["name"];
                                $res = mysqli_query($link,"select * from exam_result where user_name = '$userId'") or die(mysqli_error($link));
                                while ($row = mysqli_fetch_array($res))
                                {
                                    $correct = $row["wrong"];
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

                            <p style="font-size: 16px; color: red " > 2) Доорх хэсэгт шалгалтын дэлгэрэнгүй мэдээлэл харуулах ба зөвхөн алдсан хэсгийн асуултууд харуулна  </p>

                            <table class="table table-bordered">
                                <tbody>
                                <?php
                                $count = 0;
                                $userId = $_SESSION["name"];
                                $arr = explode(',', $correct);
                                $random = rand(1,4);
                                $sql = 'SELECT * 
                                        FROM questions 
                                        WHERE question_no IN (' . implode(',', array_map('intval', $arr)) . ')';
                                $res = mysqli_query($link,$sql) or die(mysqli_error($link));
                                while ($row = mysqli_fetch_array($res))
                                {
                                    $random = rand(1,4);
                                    $count = $count+1;
                                    ?>
                                <thead>
                                <tr>
                                    <td colspan = "4" style="font-weight: bold"><?php echo  $row["question"] ?></td>
                                </tr>
                                </thead>
                                     <tr>
                                         <td colspan = "4" style="background-color: #90EE90" >Зөв Хариулт: <?php echo $row["answer"] ?></td>
                                     </tr>
                                <tbody>
                                <tr>
                                    <?php
                                    if($random == 1) {
                                    ?>
                                    <td style="background-color: red">A) <?php echo $row["opt1"] ?></td>
                                    <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <td>A) <?php echo $row["opt1"] ?></td>
                                        <?php
                                    }
                                    ?>

                                    <?php
                                    if($random == 2) {
                                        ?>
                                        <td style="background-color: red">A) <?php echo $row["opt2"] ?></td>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <td>A) <?php echo $row["opt2"] ?></td>
                                        <?php
                                    }
                                    ?>

                                    <?php
                                    if($random == 3) {
                                        ?>
                                        <td style="background-color: red">A) <?php echo $row["opt3"] ?></td>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <td>A) <?php echo $row["opt3"] ?></td>
                                        <?php
                                    }
                                    ?>

                                    <?php
                                    if($random == 4) {
                                        ?>
                                        <td style="background-color: red">A) <?php echo $row["opt4"] ?></td>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <td>A) <?php echo $row["opt4"] ?></td>
                                        <?php
                                    }
                                    ?>
                                </tr>
                                </tbody>
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

