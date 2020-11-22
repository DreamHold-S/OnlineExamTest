<?php
include "header.php";
include  "../connection.php";
$id = $_GET["id"];
$res = mysqli_query($link,"select * from exam_category where id = $id");
while ($row= mysqli_fetch_array($res)) {
    $category_name = $row["category"];
    $category_time = $row["exam_time"];
}
?>
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1> Онлайн тест платформ</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <form  action="" method="post"  name="form1" >
                            <div class="card-body">

                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header"><strong> Тест ангилал оруулах </strong></div>
                                        <div class="card-body card-block">
                                            <div class="form-group"><label for="company" class=" form-control-label">Ангилал</label>
                                                <input type="text" id="company" placeholder="ангилал оруулах" class="form-control" name="category"  value="<?php echo $category_name?>" required>
                                            </div>
                                            <div class="form-group"><label for="vat" class=" form-control-label">Хугацаа</label>
                                                <input type="text" id="vat" placeholder="минут секунд " value="<?php echo $category_time?>" class="form-control"  name="exam_time"   required>
                                            </div>
                                            <div class="form-group">
                                                <input  type="submit"  name="submit1" value="Хадгалах" class="btn btn-success">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div> <!-- .card -->
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

<?php
if(isset($_POST["submit1"])){
    //Angilal solih uyd ene angilal deer asuultuudiig solison angilald shiljuuleh
    mysqli_query($link,"update questions set category = '$_POST[category]' where category = '$category_name'") or die(mysqli_error($link));

    //Хэрэглэгчийн ангилал тохируулах
    mysqli_query($link,"update userrole set category_name = '$_POST[category]' where category_name = '$category_name'") or die(mysqli_error($link));

    mysqli_query($link, "update exam_category set category = '$_POST[category]', exam_time = '$_POST[exam_time]' where id = $id") or die( mysqli_query($link));
    ?>
    <script type="text/javascript">
        window.location = "exam_category.php";
    </script>
    <?php
}
?>
<?php
include "footer.php"
?>