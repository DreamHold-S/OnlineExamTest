<?php
include "header.php";
include "../connection.php";
$id = $_GET["id"];
$id1 = $_GET["id1"];
$question = "";
$opt1 = "";
$opt2 = "";
$opt3 = "";
$opt4 = "";
$answer = "";
$score = "";
$res = mysqli_query($link,"select * from questions where id=$id");
while ($row = mysqli_fetch_array($res)){
    $question = $row["question"];
    $opt1 = $row["opt1"];
    $opt2 = $row["opt2"];
    $opt3 = $row["opt3"];
    $opt4 = $row["opt4"];
    $answer = $row["answer"];
    $score = $row["score"];
}

?>
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Асуулт Шинчлэх</h1>
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
                                        <div class="card-header"><strong> Асуулт Шинчлэх </strong></div>
                                        <div class="card-body card-block">
                                            <div class="form-group"><label for="company" class=" form-control-label">Асуулт</label>
                                                <input type="text" id="company" placeholder="Асуулт оруулах" class="form-control" name="question"  value="<?php echo $question?>" required>
                                            </div>
                                            <div class="form-group"><label for="company" class=" form-control-label">Хариулт 1</label>
                                                <input type="text" id="company" placeholder="Хариулт 1" class="form-control" name="opt1" value="<?php echo $opt1?>"  required>
                                            </div>
                                            <div class="form-group"><label for="company" class=" form-control-label">Хариулт 2</label>
                                                <input type="text" id="company" placeholder="Хариулт 2" class="form-control" name="opt2"   value="<?php echo $opt2?>" required>
                                            </div>
                                            <div class="form-group"><label for="company" class=" form-control-label">Хариулт 3</label>
                                                <input type="text" id="company" placeholder="Хариулт 3" class="form-control" name="opt3"   value="<?php echo $opt3?>" required>
                                            </div>
                                            <div class="form-group"><label for="company" class=" form-control-label">Хариулт 4</label>
                                                <input type="text" id="company" placeholder="Хариулт 4" class="form-control" name="opt4"   value="<?php echo $opt4?>" required>
                                            </div>
                                            <div class="form-group"><label for="company" class=" form-control-label">Зөв Хариулт</label>
                                                <input type="text" id="company" placeholder="Зөв Хариулт" class="form-control" name="answer"   value="<?php echo $answer?>" required>
                                            </div>
                                            <div class="form-group"><label for="company" class=" form-control-label">Зөв Хариулт</label>
                                                <input type="text" id="company" placeholder="Оноо" class="form-control" name="score"   value="<?php echo $score?>" required>
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
if(isset($_POST["submit1"])) {
    mysqli_query($link, "update questions set question = '$_POST[question]', opt1 = '$_POST[opt1]', opt2 = '$_POST[opt2]', opt3 = '$_POST[opt3]', opt4 = '$_POST[opt4]', answer = '$_POST[answer]', score = '$_POST[score]' where id = $id") or die( mysqli_query($link));

   ?>
    <script type="text/javascript">
        alert("Амжилттай хадгаллаа");    </script>
    window.location.href = "add_edit_questions.php?id=<?php echo $id1?>";


    <?php
}
?>

<?php
include "footer.php"
?>