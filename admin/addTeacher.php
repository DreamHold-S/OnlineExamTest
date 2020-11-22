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
                                        <div class="card-header"><strong> Багшийн мэдээлэл оруулах </strong></div>
                                        <div class="card-body card-block">

                                            <div class="form-group"><label for="company" class=" form-control-label">Багшийн нэр</label>
                                                <input type="text" id="company" placeholder="Багшийн нэр оруулах" class="form-control" name="pTeacherName"  value="" required>
                                            </div>

                                            <div class="form-group"><label for="company" class=" form-control-label">Мэргэжил</label>
                                                <input type="text" id="company" placeholder="Мэргэжил оруулах" class="form-control" name="pProfession"  value="" required>
                                            </div>

                                            <div class="form-group"><label for="company" class=" form-control-label">Ерөнхий мэдээлэл оруулах</label>
                                                <input type="text" id="company" placeholder="Ерөнхий мэдээлэл оруулах" style="height: 50px;" class="form-control" name="pabout"  value="" required>
                                            </div>

                                            <div class="form-group"><label for="company" class=" form-control-label">Зурган файл оруулах</label>
                                                <input type="file"  class="form-control" name="image"  value="" >
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
    mysqli_query($link, "insert into teacher values(NULL, '$_POST[pTeacherName]', '$_POST[pProfession]', '$_POST[pabout]', '$dst_db4')") or die(mysqli_error($link));
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