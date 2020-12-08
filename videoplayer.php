<?php
include "header.php";
include "connection.php";
$id = $_GET["id"];
?>
<main id="main">
    <!-- ======= Cource Details Section ======= -->
    <section id="course-details" class="course-details">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-8">
                    <h3>Таньд амжилт хүсье</h3>
                    <?php
                    $fetchVideos = mysqli_query($link, "SELECT location FROM videos  where courseId = '$id'  ORDER BY id DESC");
                    $countUserRole = mysqli_num_rows($fetchVideos);
                    if($countUserRole > 0)
                    {

                        $count = 0;
                    while($row = mysqli_fetch_assoc($fetchVideos)){
                        $count++;
                        $location = $row['location'];
                        $image = str_replace("../","",$location);

                        echo "<div >";
                        echo "<video src='".$image."' controls controlsList='nodownload' width='800px' height='400px'  >";
                        echo "</div>";
                        echo $count;
                    }
                    }

                    else
                    {
                         echo  "Уучларай админ video хичээл хараахан оруулаагүй байна";
                    }
                    ?>
                </div>
            </div>

        </div>
    </section><!-- End Cource Details Section -->
</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="container d-md-flex py-4">
        <div class="mr-md-auto text-center text-md-left">
            <div class="mr-md-auto text-center text-md-left">
                <div class="copyright">
                    <strong><span>Сургалт-Амжилт</span></strong> Development Contact Me : 88994908
                </div>
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