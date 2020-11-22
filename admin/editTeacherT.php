<?php
include "header.php";
include "../connection.php";
$id = $_GET["id"];
$teacher_id  = "";
$teacherName = "";
$teacherProfession = "";
$teacherAbout = "";
$image = "";
$images = "";
$res = mysqli_query($link,"select * from teacher where teacher_id=$id");
while ($row = mysqli_fetch_array($res))
{
    $teacherName = $row["teacherName"];
    $teacherProfession = $row["teacherProfession"];
    $teacherAbout = $row["teacherAbout"];
    $image = $row["image"];
    $image = str_replace("images","../images",$image);
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
                                        <div class="card-header"><strong> Багшийн мэдээлэл шинчлэх </strong></div>
                                        <div class="card-body card-block">

                                            <div class="form-group"><label for="company" class=" form-control-label">Багшийн нэр</label>
                                                <input type="text" placeholder="Нэр оруулах" class="form-control" name="pTeacherName"  value="<?php echo $teacherName ?>" required>
                                            </div>

                                            <div class="form-group"><label for="company" class=" form-control-label">Мэргэжил</label>
                                                <input type="text" placeholder="Мэргэжил оруулах" class="form-control" name="pTeacherProfession"  value="<?php echo $teacherProfession ?>" required>
                                            </div>

                                            <div class="form-group"><label for="company" class=" form-control-label">Мэдээлэл</label>
                                                <input type="text" placeholder="Мэдээлэл оруулах" class="form-control" name="pAbout"  value="<?php echo $teacherAbout ?>" required>
                                            </div>


                                            <div class="form-group">
                                                <img src="<?php  echo $image;?>"  height="250" width="250"> <br>
                                                <label for="company" class=" form-control-label">Зөв Хариулт Нэмэх</label>
                                                <input type="file"  class="form-control" name="fimage"  value="">
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
    $answer=$_FILES["fimage"]["name"];
    $tm=md5(time());

    if($answer!=""){
        $dst5="../images/".$tm .$answer;
        $dst_db5="images/".$tm .$answer;
        move_uploaded_file($_FILES["fimage"]["tmp_name"], $dst5);
        mysqli_query($link, "update teacher set image= '$dst_db5' where teacher_id =$id") or die(mysqli_query($link));
    }

    mysqli_query($link, "update teacher set teacherName = '$_POST[pTeacherName]', teacherProfession = '$_POST[pTeacherProfession]', teacherAbout = '$_POST[pAbout]'  where teacher_id =$id") or die(mysqli_query($link));

    ?>
    <script type="text/javascript">
        alert("Амжилттай хадгаллаа");
        window.location.href = "editTeacher.php";
    </script>
    <?php
}
?>

<?php
include "footer.php"
?>