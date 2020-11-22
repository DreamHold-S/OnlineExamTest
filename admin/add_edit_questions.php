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
                    <h1>Асуулт Нэмэх Текс төрлийн утга ашиглах <?php echo "<font color='red'>" .$exam_category. "</font>"  ?>  </h1>
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
                                <form name="form1" action=""  method="post">
                                <div class="card">
                                    <div class="card-header"><strong> Шинэ асуул бүртгэх </strong></div>
                                    <div class="card-body card-block">
                                        <div class="form-group"><label for="company" class=" form-control-label">Асуулт</label>
                                            <input type="text" id="company" placeholder="Асуулт оруулах" class="form-control" name="question"  value="" required>
                                        </div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Хариулт 1</label>
                                            <input type="text" id="company" placeholder="Хариулт 1" class="form-control" name="opt1"  value="" required>
                                        </div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Хариулт 2</label>
                                            <input type="text" id="company" placeholder="Хариулт 2" class="form-control" name="opt2"  value="" required>
                                        </div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Хариулт 3</label>
                                            <input type="text" id="company" placeholder="Хариулт 3" class="form-control" name="opt3"  value="" required>
                                        </div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Хариулт 4</label>
                                            <input type="text" id="company" placeholder="Хариулт 4" class="form-control" name="opt4"  value="" required>
                                        </div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Зөв Хариулт</label>
                                            <input type="text" id="company" placeholder="Зөв Хариулт" class="form-control" name="answer"  value="" required>
                                        </div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Оноо</label>
                                            <input type="text" id="company" placeholder="Оноо" class="form-control" name="score"  value="" required>
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

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table  class="table table-bordered" >
                            <tr>
                                <th>Дугаар</th>
                                <th>Асуулт</th>
                                <th>Хариулт 1</th>
                                <th>Хариулт 2</th>
                                <th>Хариулт 3</th>
                                <th>Хариулт 4</th>
                                <th>Оноо</th>
                                <th>Засах</th>
                                <th>Устгах</th>
                            </tr>

                        <?php
                        $res = mysqli_query($link,"select * from questions where  category = '$exam_category'  order by question_no");
                         while ($row = mysqli_fetch_array($res))
                         {
                             echo "<tr>";
                             echo  "<td>"; echo $row["question_no"]; echo "</td>";
                             echo  "<td>"; echo $row["question"]; echo "</td>";
                             echo  "<td>";
                                 echo $row["opt1"];
                             echo "</td>";
                             echo  "<td>";
                                 echo $row["opt2"];
                             echo "</td>";
                             echo  "<td>";
                                echo $row["opt3"];
                             echo "</td>";

                             echo  "<td>";
                                 echo $row["opt4"];
                             echo "</td>";

                             echo  "<td>";
                             echo $row["score"];
                             echo "</td>";

                             echo "<td>";
                                 ?>
                                 <a href="edit_option.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id; ?>">Засах</a>
                                  <?php

                             echo "</td>";


                             echo "<td>";
                               ?>
                              <a href="delete_option.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id; ?>&category=<?php echo $exam_category; ?>">Устгах</a>
                            <?php
                             echo "</td>";


                             echo  "</tr>";
                         }
                        ?>
                        </table>
                    </div>

                </div> <!-- .card -->
            </div>

        </div>


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
    mysqli_query($link, "insert into  questions values(NULL, $loop, '$_POST[question]', '$_POST[opt1]', '$_POST[opt2]', '$_POST[opt3]','$_POST[opt4]' ,'$_POST[answer]','$exam_category','$_POST[score]')") or die(mysqli_error($link));
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