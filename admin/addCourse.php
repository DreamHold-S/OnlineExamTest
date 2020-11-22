<?php
include "header.php";
include "../connection.php";
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
                                        <div class="card-header"><strong> Хичээл мэдээлэл оруулах </strong></div>
                                        <div class="card-body card-block">

                                            <div class="form-group"><label for="company" class=" form-control-label">Бүлгийн нэр</label>
                                                <input type="text" id="company" placeholder="Бүлгийн нэр" class="form-control" name="pGroupName"  value="" required>
                                            </div>

                                            <div class="form-group"><label for="company" class=" form-control-label">Гарчиг</label>
                                                <input type="text" id="company" placeholder="Гарчиг оруулах" class="form-control" name="pTitle"  value="" required>
                                            </div>

                                            <div class="form-group"><label for="company" class=" form-control-label">Үнэ</label>
                                                <input type="text" id="company" placeholder=" Үнэ оруулах" style="height: 50px;" class="form-control" name="pPrice"  value="" required>
                                            </div>

                                            <div class="form-group"><label for="company" class=" form-control-label">Мэдээлэл</label>
                                                <input type="text" id="company" placeholder="Мэдээлэл оруулах" style="height: 50px;" class="form-control" name="pabout"  value="" required>
                                            </div>

                                            <div class="form-group"><label for="company" class=" form-control-label">Зурган файл оруулах</label>
                                                <input type="file"  class="form-control" name="image"  value="" >
                                            </div>

                                            <div class="form-group"><label for="company" class=" form-control-label">Заах багш нэр</label>
                                                <input type="text" id="company" placeholder="багш нэр оруулах" style="height: 50px;" class="form-control" name="pTeacherName"  value="" required>
                                            </div>

                                            <div class="form-group"><label for="company" class=" form-control-label">Утасны дугаар</label>
                                                <input type="text" id="company" placeholder="Утас дугаар" style="height: 50px;" class="form-control" name="pPhone"  value="" required>
                                            </div>

                                            <div class="form-group"><label for="company" class=" form-control-label">Зурган файл багш</label>
                                                <input type="file"  class="form-control" name="imageT"  value="" >
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
        </div><!-- .animated -->
    </div><!-- .content -->

<?php
if(isset($_POST["submit1"]))
{
    $tm=md5(time());
    $fnm4=$_FILES["image"]["name"];
    $dst4="../images/".$tm.$fnm4;
    $dst_db4="images/".$tm.$fnm4;
    move_uploaded_file($_FILES["image"]["tmp_name"], $dst4);

    $tm=md5(time());
    $fnm5=$_FILES["image"]["name"];
    $dst5="../images/".$tm.$fnm5;
    $dst_db5="images/".$tm.$fnm5;
    move_uploaded_file($_FILES["image"]["tmp_name"], $dst5);


    mysqli_query($link, "insert into courses values(NULL, '$_POST[pGroupName]', '$_POST[pTitle]', '$_POST[pPrice]', '$_POST[pabout]', '$dst_db4', '$_POST[pTeacherName]', '$dst_db5','$_POST[pPhone]')") or die(mysqli_error($link));
    ?>
    <script type="text/javascript">
        alert("Амжилттай нэмлээ");
    </script>
    <?php
}
?>


<?php
include "footer.php"
?>