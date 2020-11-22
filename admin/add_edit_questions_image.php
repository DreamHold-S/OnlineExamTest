<?php
include "header.php";
include "../connection.php";
$id =  $_GET["id"];
$res = mysqli_query($link,"select * from exam_category where id = $id");
while ($row = mysqli_fetch_array($res)){
    $exam_category = $row["category"];
}
?>
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Асуулт Нэмэх Сонгосон бүлэг =>   <?php echo "<font color='red'>" .$exam_category. "</font>"  ?>  </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-lg-12">
                                <form name="form1" action=""  method="post" enctype="multipart/form-data">
                                    <div class="card">
                                        <div class="card-header"><strong> Шинэ Асуулт Нэмэх Зураг ашиглах </strong></div>
                                        <div class="card-body card-block">

                                            <div class="form-group"><label for="company" class=" form-control-label">Асуулт</label>
                                                <input type="text" id="company" placeholder="Асуулт оруулах" class="form-control" name="fquestion"  value="" required>
                                            </div>
                                            <div class="form-group"><label for="company" class=" form-control-label">Хариулт 1</label>
                                                <input type="file"  class="form-control" name="fopt1"  value="" >
                                            </div>
                                            <div class="form-group"><label for="company" class=" form-control-label">Хариулт 2</label>
                                                <input type="file"  class="form-control" name="fopt2"  value="">
                                            </div>
                                            <div class="form-group"><label for="company" class=" form-control-label">Хариулт 3</label>
                                                <input type="file"  class="form-control" name="fopt3"  value="" >
                                            </div>
                                            <div class="form-group"><label for="company" class=" form-control-label">Хариулт 4</label>
                                                <input type="file"  class="form-control" name="fopt4"  value="" >
                                            </div>
                                            <div class="form-group"><label for="company" class=" form-control-label">Зөв Хариулт</label>
                                                <input type="file"  class="form-control" name="fanswer"  value="">
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

if(isset($_POST["submit1"])){
    $loop=0;
    $count = 0;
    $res = mysqli_query($link,"select * from questions where  category = '$exam_category'  order by id asc") or die(mysqli_error($link));
    $count = mysqli_num_rows($res);
    if($count == 0)
    {
        //
    }
    else
    {
        while ($row = mysqli_fetch_array($res))
        {
            $loop =  $loop + 1;
            $rowId = $row["id"];
            mysqli_query($link,"UPDATE questions SET question_no = '$loop' WHERE ID='$rowId'") or die(mysqli_error($link));
        }
    }


    $loop = $loop+1;
    $tm=md5(time());

    $fnm1=$_FILES["fopt1"]["name"];
    $dst1="./opt_images/".$tm.$fnm1;
    $dst_db1="opt_images/".$tm.$fnm1;
    move_uploaded_file($_FILES["fopt1"]["tmp_name"], $dst1);

    $fnm2=$_FILES["fopt2"]["name"];
    $dst2="./opt_images/".$tm.$fnm2;
    $dst_db2="opt_images/".$tm.$fnm2;
    move_uploaded_file($_FILES["fopt2"]["tmp_name"], $dst2);

    $fnm3=$_FILES["fopt3"]["name"];
    $dst3="./opt_images/".$tm.$fnm3;
    $dst_db3="opt_images/".$tm.$fnm3;
    move_uploaded_file($_FILES["fopt3"]["tmp_name"], $dst3);


    $fnm4=$_FILES["fopt4"]["name"];
    $dst4="./opt_images/".$tm.$fnm4;
    $dst_db4="opt_images/".$tm.$fnm4;
    move_uploaded_file($_FILES["fopt4"]["tmp_name"], $dst4);



    $fnm5=$_FILES["fanswer"]["name"];
    $dst5="./opt_images/".$tm.$fnm5;
    $dst_db5="opt_images/".$tm.$fnm5;
    move_uploaded_file($_FILES["fanswer"]["tmp_name"], $dst5);


    mysqli_query($link, "insert into  questions values(NULL, $loop, '$_POST[fquestion]', '$dst_db1', '$dst_db2', '$dst_db3','$dst_db4' ,'$dst_db5','$exam_category')") or die(mysqli_error($link));
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