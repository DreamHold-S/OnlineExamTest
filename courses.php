<?php
include "connection.php";
include "header.php";
?>
<main id="main" data-aos="fade-in">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">
            <h2>Сургалтууд</h2>
            <p>
                Медиа салбарын хамгийн эрэлттэй мэргэжил болох График дизайныг та богино хугацаанд бүрэн эзэмшмээр байна уу? Тэгвэл бид танд мэргэжлийн график дизайны түвшинд очих боломжтой сургалтыг санал болгож байна.
            </p>
        </div>
    </div><!-- End Breadcrumbs -->
    <!-- ======= Courses Section ======= -->
    <section id="courses" class="courses">
        <div class="container" data-aos="fade-up">

            <div class="row" data-aos="zoom-in" data-aos-delay="100">

                <?php
                $count = 0;
                $res = mysqli_query($link,"select * from courses");
                while ($row = mysqli_fetch_array($res))
                {
                    $image = $row["image"];
                    $imageT = $row["imageT"];
                    $count = $count+1;
                    ?>
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" style="margin-top: 5px;">
                        <div class="course-item">
                            <img src="<?php  echo $image;?>"  class="img-fluid" alt="...">
                            <div class="course-content">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4><?php echo $row["groupName"]?></h4>
                                    <p class="price"><?php echo $row["price"]?></p>
                                </div>
                                <h3>
                                    <a href="coursedetail.php?id=<?php echo $row["course_id"]; ?>" ><?php echo $row["title"]?> </a>
                                </h3>
                                <p><?php echo $row["about"]?></p>
                                <div class="trainer d-flex justify-content-between align-items-center">
                                    <div class="trainer-profile d-flex align-items-center">
                                        <img src="<?php  echo $imageT;?>" class="img-fluid" alt="">
                                        <span><?php echo $row["teacherName"]?></span>
                                    </div>
                                    <div class="trainer-rank d-flex align-items-center">
                                        <i class="bx bx-phone"></i>&nbsp 94111976
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Course Item-->
                    <?php
                }
                ?>
            </div>

        </div>
    </section><!-- End Courses Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="container d-md-flex py-4">

        <div class="mr-md-auto text-center text-md-left">
            <div class="copyright">
                <strong><span>Сургалт-Амжилт</span></strong> Development Contact Me : 88994908
            </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
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