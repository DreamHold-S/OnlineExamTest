<?php
session_start();
$date = date("Y-m-d H:i:s");
$_SESSION["end_time"] = date("Y-m-d H:i:s", strtotime($date."+ $_SESSION[exam_time] minutes"));

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

    <title>Mentor Bootstrap Template - Index</title>
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

        <h1 class="logo mr-auto"><a href="index.html">Mentor</a></h1>
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
    <div class="col-lg-6  col-lg-push-3 "  style="min-height: 500px;  background-color: whitesmoke; margin: auto;  margin-top: 90px;  margin-bottom: 10px;">
        <div class="section-title">
            <h2 style="color: red">Шалгалтын тухай мэдээлэл</h2>
        </div>
        <?php
        $wrong =0;
        $countCorrect =0;
        $sumscore =0;
        $score30 = 0; // 30 hurtelh
        $score50 = 0; // 30deesh hurtelh
        $correctArray = array();
        $wrongArray = array();
        if(isset($_SESSION["answer"]))
        {
            foreach($_SESSION["answer"] as $key => $value)
            {
                $answer = "";
                $sesss = $_SESSION["exam_category"];
                $score =0;
                $res = mysqli_query($link,"select * from questions where category = '$sesss' && question_no = '$key'") or die(mysqli_error($link));
                while ($row = mysqli_fetch_array($res))
                {
                    $answer = trim($row["answer"]);
                    $score = trim($row["score"]);
                }
                if(isset($_SESSION["answer"][$key]))
                {
                    if($answer==$_SESSION["answer"][$key])
                    {

                        $sumscore = $sumscore+$score;
                        if($key <= 30)
                        {
                            $score30 = $score30 + $score;
                            array_push($correctArray,$key);
                        }
                        else
                        {
                            $score50 = $score50 + $score;
                            array_push($correctArray,$key);
                        }
                    }
                    else
                    {
                        $wrong = $wrong+1;
                        array_push($wrongArray,$key);
                    }
                }
                else
                {
                    $wrong =$wrong+1;
                    array_push($wrongArray,$key);
                }
            }
        }
        $sum = 0;
        $result = mysqli_query($link,"select SUM(score) AS value_sum from questions where category = '$_SESSION[exam_category]'");
        $row = mysqli_fetch_assoc($result);
        $sum = $row['value_sum'];
        echo "<br>"; echo "<br>";
        echo "<center>";
        echo "Нийт Асуулт Оноо=".$sum;
        echo "<br>";
        echo "Нийт Авсан оноо=".$sumscore;
        echo "</center>";
        ?>
    </div>
</main><!-- End #main -->

<?php

if(isset($_SESSION["exam_start"]))
{
    $correctAr = json_encode($correctArray);
     $wrongAr  = json_encode($wrongArray);
    $date = date("Y-m-d");
   mysqli_query($link,"insert into exam_result(id,user_name,exam_type,total_question,correct_answer,wrong_answer,exam_time, scoreA, scoreB, correct, wrong)values(NULL ,'$_SESSION[name]','$_SESSION[exam_category]','$sum','$sumscore','$wrong','$date','$score30','$score50', '$correctAr', '$wrongAr' )") or die(mysqli_error($link));
}

if(isset($_SESSION["exam_start"])){
    unset($_SESSION[exam_start]);
    ?>
    <script  type="text/javascript">
        window.location.href = window.location.href;
    </script>
    <?php
}
?>

<footer id="footer">

    <div class="container d-md-flex py-4">

        <div class="mr-md-auto text-center text-md-left">
            <div class="copyright">
                &copy; 2020 <strong><span>Он</span></strong> Бүх эрх хуулиар хамгаалагдав
            </div>
        </div>


        <div class="social-links text-center text-md-right pt-3 pt-md-0">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
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


