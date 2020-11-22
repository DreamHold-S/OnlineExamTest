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

        <h1 class="logo mr-auto"><a href="index.html">Амжилт Хүсье</a></h1>
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

    <div class="col-lg-6  col-lg-push-3 "  style="min-height: 500px;  background-color: whitesmoke; margin: auto;  margin-top: 10px;  margin-bottom: 10px;">
        <?php

         $count =0;
         $userId = $_SESSION["id"];
         $userRole_query = "SELECT  exam_category.category, exam_category.id
            FROM exam_category 
            INNER JOIN userrole ON exam_category.id = userrole.category_id 
            where userrole.user_id = '$userId' ";

        $res = mysqli_query($link,$userRole_query) or die(mysqli_error($link));
        $count = mysqli_num_rows($res);

        if($count == 0)
        {
            ?>
            <div class="section-title">
                <h2>Мэдээлэл</h2>
                <p style="font-size: 20px;">Уучлаарай таньд шалгалт өгөх ангилал үүсээгүй байна. Админ хэрэглэгчид хандаж ангилалын тохиргоо хийлгэнэ үү !!!!   </p>
            </div>

            <?php

        }
        else
        {
            while ($row = mysqli_fetch_array($res))
            {
                ?>
                <input  type="button"   class="btn btn-success  form-control" value="<?php  echo $row["category"]; ?>" style="margin-top: 10px;
               background-color: blue; color: white"  onclick="set_exam_type_session(this.value);">
                <?php
            }
        }

        ?>
    </div>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="container d-md-flex py-4">

        <div class="mr-md-auto text-center text-md-left">
            <div class="copyright">
                &copy; 2020 <strong><span>Он</span></strong> Бүх эрх хуулийх
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


<script  type="text/javascript">
    function set_exam_type_session(exam_category)
    {
       var  $currString = exam_category;
        window.location = "start_exam.php?category_name="+$currString;
    }
</script>