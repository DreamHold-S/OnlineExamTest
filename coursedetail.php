<?php
include "connection.php";
include "header.php";
$id = $_GET["id"];
$userId = $_SESSION["id"];
if(!isset($_SESSION["name"])){
    ?>
    <!--suppress JSAnnotator -->
    <script  type="text/javascript">
        window.location = "loginuser.php"
    </script>
    <?php
}
?>
?>
<main id="main">
 </br>
    </br>
    <!-- ======= Cource Details Section ======= -->
    <section id="course-details" class="course-details">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-8">
                    <?php
                    $count = 0;
                    $res = mysqli_query($link,"select * from courses where course_id = '$id'");
                    while ($row = mysqli_fetch_array($res))
                    {
                        $image = $row["image"];
                        $count = $count+1;
                        $imageT = $row["image"];
                        ?>
                    <img src="<?php  echo $imageT;?>" class="img-fluid" alt="" style="width: 700px; height: 400px;">

                    <p>
                    <h3> Сургалтын төлбөр <?php echo $row["price"]?></h3>
                    </p>
                    <form action="" method="post"  name="form1">

                        <ol class="custom" style="margin-left: 0px;">
                            <li data-bullet="-">Хаан Банк <span style="font-weight:bold;color: #18829c;">5006661980</span>,   Амаржаргал
                                данс руу <span style="font-weight:bold;color: #18829c;">240,000 ₮</span>
                                шилжүүлнэ</li>
                            <li data-bullet="-">Гүйлгээний утганд та <span style="color: red;font-weight:bold;">88880000 ӨӨРИЙН УТАСНЫ ДУГААР</span> -аа бичнэ.</li>
                            <li data-bullet="-">Шилжүүлсэний дараа <span style="font-weight:bold;color: #18829c;">9400-6880
								</span> утсанд дугаар руу <span style="color: red;font-weight:bold;">412_94 </span> кодыг өөрийн <span style="color: red;font-weight:bold;">нэвтэрдэг утасны дугаарын</span> хамт бичиж мэссэжээр <br>илгээгээрэй. Ингэснээр бид таныг шилжүүлэг хийснийг шуурхай мэдэх юм.</li>

                            <!-- <li data-bullet="-">Мэссэж илгээсний дараа <a style="" href="" target="_blank"><strong>ЭНД  ДАРЖ</strong></a> манай чатботод бүртгүүлээд бидэнд худалдан авсан сургалтаа чатботод зааж өгнө үү.</li>
         -->
                            <li data-bullet="-">Бид сургалтыг нээж өгөөд таны утсанд <span style="font-weight:bold;color: #18829c;">МЭССЭЖ</span> илгээж мэдэгдэх болно.</li>

                            <li data-bullet="-">Мэссэж хүлээн авсны дараа доорх <span style="font-weight:bold;color: #18829c;">СУРГАЛТЫГ ҮЗЭХ</span> товчийг дарна уу.

                                <br><br>Дэлгэрэнгүйг <span style="font-weight:bold;color: #18829c;">9400-6880, 9199-1383</span> утсаар лавлаж болно.</li>
                        </ol>


                        <input type="text" class="form-control" name="promoCode" placeholder="Таны утсанд ирсэн код оруулна уу"  required/>
                     </br>
                    <button type="submit" name="submit"  class="btn btn-success btn-flat m-b-30 m-t-30">Сургалт Үзэх</button>
                    </form>
                </div>
                <div class="col-lg-4">

                    <div class="course-info d-flex justify-content-between align-items-center">
                        <h5>Гарчиг</h5>
                        <p><a href="#"><?php echo $row["title"]?></a></p>
                    </div>


                    <div class="course-info d-flex justify-content-between align-items-center">
                        <h5>Багш</h5>
                        <p><a href="#"><?php echo $row["teacherName"]?></a></p>
                    </div>

                    <div class="course-info d-flex justify-content-between align-items-center">
                        <h5>Үнэ</h5>
                        <p><?php echo $row["price"]?></p>
                    </div>

                    <div class="course-info d-flex justify-content-between align-items-center">
                        <h5>Бүлэг</h5>
                        <p><?php echo $row["groupName"]?></p>
                    </div>

                    <div class="course-info d-flex justify-content-between align-items-center">
                        <h5>Нийт цаг</h5>
                        <p>2 цаг</p>
                    </div>

                </div>
                <?php
                }
                    ?>
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

<?php
if(isset($_POST["submit"]))
{
    $promoCode = $_POST['promoCode'];
    $result = mysqli_query($link, "select * from course_role  where course_id = '$id' && user_id = '$userId' && promo_code = '$promoCode' ");
    $row  = mysqli_fetch_array($result);
    if(is_array($row))
    {
        ?>
        <script type="text/javascript">
            window.location.href = "videoplayer.php?id=<?php echo $id?>";
        </script>
        <?php
    }
    else
    {
        ?>
        <script type="text/javascript">
          alert("Таны оруулсан код буруу эсвэл хугацаа нь дууссан байна...")
        </script>
        <?php
    }
}