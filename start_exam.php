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
$category_name = $_GET["category_name"];

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
            <p style="font-size: 15px; color: #0e90d2 " >Та шалгалт эхлүүлэх товч дарсанаар шалгалтын хугацаа явж эхлэх тул, шалгалт өгч буй хугацаандаа гарах эсвэл web browser
            хаасан тохиолдолд, web browser-r өөр хуудасруу орох үед таны өгсөн шалгалт хүчингүй болохыг анхаарна уу !!!!!!!!!!!!!!!!!!!!!!. </p>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <input  type="button"  class="btn  btn-danger"  value="Шалгалт эхлүүлэх бол энд дарна уу"  onclick="start_exam();">
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

<script  type="text/javascript">
    var str = "<?php echo $category_name ?>"; // "A string here"

    function start_exam() {


        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function ()
        {
            if(xmlhttp.readyState == 4 &&  xmlhttp.status == 200)
            {
                if(xmlhttp.responseText == "unFailed")
                {
                    alert("Уучлаарай та шалгалтыг өгсөн байна");
                }
                else if(xmlhttp.responseText == "unQuestions")
                {
                    alert("Уучлаарай энэ ангилалд шалгалт үүсээгүй байна");
                }
                else
                {
                    window.location = "dashboard.php";
                }
            }
        };
        xmlhttp.open("GET","forajax/set_exam_type_session.php?exam_category="+ str,true);
        xmlhttp.send(null);
    }

</script>



