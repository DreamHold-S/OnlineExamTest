<?php
include "header.php";
include  "../connection.php";
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
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong class="card-title">Хичээллийн Мэдээлэл</strong>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Бүлэг</th>
                                                    <th scope="col">Гарчиг</th>
                                                    <th scope="col">Тухай</th>
                                                    <th scope="col">Үнэ</th>
                                                    <th scope="col">Засах</th>
                                                    <th scope="col">Устгах</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php
                                                $count = 0;
                                                $res = mysqli_query($link,"select * from courses");
                                                while ($row = mysqli_fetch_array($res))
                                                {
                                                    $count = $count+1;
                                                    ?>
                                                    <tr>
                                                        <th scope="row"> <?php echo $count ?> </th>
                                                        <td><?php echo $row["groupName"]?></td>
                                                        <td><?php echo $row["title"]?></td>
                                                        <td><?php echo $row["about"]?></td>
                                                        <td><?php echo $row["price"]?></td>
                                                        <td><a href="editCourseT.php?id=<?php echo $row["course_id"]; ?>" >Edit </a></td>
                                                        <td><a href="deletecourse.php?id=<?php echo $row["course_id"];?>" >Delete </a></td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                                </tbody>
                                            </table>
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
    $count = 0;
    $res = mysqli_query($link,"select * from  exam_category where category = '$_POST[category]'") or die (mysql_error());
    $count =  mysqli_num_rows($res);
    if($count > 0){
        ?>
        <script type="text/javascript">
            alert("Энэ ангилал үүссэн байна");
        </script>
        <?php
    }
    else
    {
        mysqli_query($link, "insert into  exam_category values(NULL, '$_POST[category]', '$_POST[exam_time]')");
        ?>
        <script type="text/javascript">
            alert("Амжилттай үүслээ");
            window.location.href = window.location.href;
        </script>
        <?php
    }
}
?>
<?php
include "footer.php"
?>