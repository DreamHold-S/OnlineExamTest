<?php
include "header.php";
include "../connection.php";
$id = $_GET["id"];
$course_id   = "";
$groupName = "";
$title = "";
$price = "";
$about = "";
$image = "";
$teacherName = "";
$imageT = "";
$phone = "";
$res = mysqli_query($link,"select * from courses where course_id =$id") or die(mysqli_query($link));
while ($row = mysqli_fetch_array($res))
{
    $course_id = $row["course_id"];
    $groupName = $row["groupName"];
    $title = $row["title"];
    $price = $row["price"];
    $about = $row["about"];
    $image = $row["image"];
    $image = str_replace("images","../images",$image);
    $teacherName = $row["teacherName"];
    $imageT = $row["imageT"];
    $imageT = str_replace("images","../images",$imageT);
    $phone = $row["phone"];
}
?>
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-lg-12">
                                <form name="form1" action=""  method="post" enctype="multipart/form-data">
                                    <div class="card">
                                        <div class="card-header"><strong> Хичээл мэдээлэл шинчлэх </strong></div>
                                        <div class="card-body card-block">

                                            <div class="form-group"><label for="company" class=" form-control-label">Бүлгийн нэр</label>
                                                <input type="text" placeholder="Нэр оруулах" class="form-control" name="groupName"  value="<?php echo $groupName ?>" required>
                                            </div>

                                            <div class="form-group"><label for="company" class=" form-control-label">Гарчиг оруулах</label>
                                                <input type="text" placeholder="Гарчиг оруулах" class="form-control" name="title"  value="<?php echo $title ?>" required>
                                            </div>

                                            <div class="form-group"><label for="company" class=" form-control-label">Үнэ оруулах</label>
                                                <input type="text" placeholder="Үнэ оруулах" class="form-control" name="price"  value="<?php echo $price ?>" required>
                                            </div>

                                            <div class="form-group"><label for="company" class=" form-control-label">Мэдээлэл оруулах</label>
                                                <input type="text" placeholder="Мэдээлэл оруулах" class="form-control" name="about"  value="<?php echo $about ?>" required>
                                            </div>


                                            <div class="form-group">
                                                <img src="<?php  echo $image;?>"  height="250" width="250"> <br>
                                                <label for="company" class=" form-control-label">Зураг оруулах</label>
                                                <input type="file"  class="form-control" name="image"  value="">
                                            </div>

                                            <div class="form-group"><label for="company" class=" form-control-label">Хичээл Заах Багш</label>
                                                <input type="text" placeholder="Мэдээлэл оруулах" class="form-control" name="teacherName"  value="<?php echo $teacherName ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <img src="<?php  echo $imageT;?>"  height="250" width="250"> <br>
                                                <label for="company" class=" form-control-label">Зураг оруулах Багш</label>
                                                <input type="file"  class="form-control" name="imageT"  value="">
                                            </div>


                                            <div class="form-group"><label for="company" class=" form-control-label">Холбоо барих дугаар</label>
                                                <input type="text" placeholder="Мэдээлэл оруулах" class="form-control" name="phone"  value="<?php echo $phone ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <input  type="submit"  name="submit1" value="Хадгалах" class="btn btn-success">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> <!-- .card -->
                </div>
            </div>

        </div>
    </div><!-- .animated -->
    </div><!-- .content -->


<?php

if(isset($_POST["submit1"]))
{
    $image=$_FILES["image"]["name"];
    $imageT=$_FILES["imageT"]["name"];

    $tm=md5(time());

    if($image!=""){
        $dst5="../images/".$tm .$image;
        $dst_db5="images/".$tm .$image;
        move_uploaded_file($_FILES["image"]["tmp_name"], $dst5);
        mysqli_query($link, "update courses set image= '$dst_db5' where course_id =$id") or die(mysqli_query($link));
    }

    if($imageT!=""){
        $dst6="../images/".$tm .$imageT;
        $dst_db6="images/".$tm .$imageT;
        move_uploaded_file($_FILES["imageT"]["tmp_name"], $dst6);
        mysqli_query($link, "update courses set imageT= '$dst_db6' where course_id =$id") or die(mysqli_query($link));
    }

    mysqli_query($link, "update courses set groupName = '$_POST[groupName]', title = '$_POST[title]', price = '$_POST[price]' , teacherName = '$_POST[teacherName]'  , phone = '$_POST[phone]', about = '$_POST[about]'  where course_id  =$id") or die(mysqli_query($link));

    ?>
    <script type="text/javascript">
        alert("Амжилттай хадгаллаа");
        window.location.href = "editCourse.php";
    </script>
    <?php
}
?>

<?php
include "footer.php"
?>