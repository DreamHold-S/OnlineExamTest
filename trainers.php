<?php
include "connection.php";
include  "header.php";
?>
<main id="main" data-aos="fade-in">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">
            <h2>Багш нар</h2>
            <p> Шалгарсан заах арга зүй буюу Blended Learning Method нь гадаад хэл сурахад ашигладаг олон аргуудын давуу талуудыг өөртөө тусгасан байдаг. Энэхүү сургалтын заах арга зүйг ашиглан Англи хэлийг сурснаар та илүү хурдан, үр дүн сайтай сурах нөхцөл бүрдэнэ гэдэгт итгэж болно. </p>
        </div>
    </div><!-- End Breadcrumbs -->


    <!-- ======= Trainers Section ======= -->
    <section id="trainers" class="trainers">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Багш нар</h2>
            </div>

            <div class="row" data-aos="zoom-in" data-aos-delay="100">


                <?php
                $count = 0;
                $res = mysqli_query($link,"select * from teacher");
                while ($row = mysqli_fetch_array($res))
                {
                    $image = $row["image"];
                    $count = $count+1;
                    ?>
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="member">
                            <img src="<?php  echo $image;?>" class="img-fluid" alt="" style="height:300px;" >
                            <div class="member-content">
                                <h4><?php echo $row["teacherName"]?></h4>
                                <span><?php echo $row["teacherProfession"]?></span>
                                <p>
                                    <?php echo $row["teacherAbout"]?>
                                </p>
                                <div class="social">
                                    <a href=""><i class="icofont-twitter"></i></a>
                                    <a href=""><i class="icofont-facebook"></i></a>
                                    <a href=""><i class="icofont-instagram"></i></a>
                                    <a href=""><i class="icofont-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                }
                ?>
            </div>
        </div>
    </section><!-- End Trainers Section -->

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
<script src="assets/js/main.js">
</script>

</body>

</html>