<?php
include "header.php";
include "../connection.php";
$userId = $_GET["id"];
?>
    <div class="breadcrumbs">
        <div class="col-sm-12">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Хэрэглэгчийн промо код оруулах !</h1>
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

                                <table class="table table-bordered" id="Table1">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Хичээл Дугаар</th>
                                        <th scope="col">Хичээл Гарчиг </th>
                                        <th scope="col">Хэрэглэгч Дугаар</th>
                                        <th scope="col">Промо Код Оруулах</th>
                                        <th scope="col">Сонгох</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $count = 0;
                                    $countUserRole =0;
                                    $promoCode = 0;
                                    $res = mysqli_query($link,"select * from  courses ");
                                    while ($row = mysqli_fetch_array($res))
                                    {
                                         $randomToo = rand(1000,9999);
                                         $pcourseId = $row["course_id"];
                                         $puserId = $userId;
                                         $result = mysqli_query($link, "select * from course_role where course_id = '$pcourseId' && user_id = '$puserId'") or die(mysqli_error($link));
                                        $countUserRole = mysqli_num_rows($result);
                                         if($countUserRole > 0)
                                         {
                                             while ($rows = mysqli_fetch_array($result))
                                             {
                                                 $promoCode =$rows["promo_code"];
                                             }
                                         }
                                         $count = $count+1;
                                        ?>
                                        <tr>
                                            <th scope="row"> <?php echo $count ?> </th>
                                            <td><?php echo $row["course_id"]?></td>
                                            <td><?php echo $row["title"]?></td>
                                            <td><?php echo  $userId ?></td>
                                            <td>
                                                <?php
                                                if($countUserRole == 1)
                                                echo $promoCode;
                                                else echo $randomToo;
                                                ?>
                                            </td>
                                            <td>
                                                <input  type="checkbox" value ="" name="techno[]" <?php
                                                if($countUserRole == 1) {
                                                    echo "checked";
                                                }
                                                ?> >
                                            </td>

                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>

                                </table>

                                <div class="form-group">
                                    <input  type="submit"  name="submit1" value="Хадгалах" class="btn btn-success"  onclick="GetSelected()">
                                </div>
                            </div>
                        </form>
                    </div> <!-- .card -->
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

    <script type="text/javascript">
        function GetSelected() {

            var table = document.getElementsByTagName("table")[0];
            var userTr = table.rows[1];
            var userTd = userTr.cells[3];
            var deleteUserId = userTd.innerHTML;

            var grid = document.getElementById("Table1");
            var checkBoxes = grid.getElementsByTagName("INPUT");
            var course_id = new Array();
            var course_name = new Array();
            var promo_code =  new Array();
            var user_id = new Array();

            for (var i = 0; i < checkBoxes.length; i++) {
                if (checkBoxes[i].checked) {
                    var row = checkBoxes[i].parentNode.parentNode;
                    course_id.push(row.cells[1].innerHTML.trim());
                    course_name.push(row.cells[2].innerHTML.trim());
                    user_id.push(row.cells[3].innerHTML.trim());
                    promo_code.push(row.cells[4].innerHTML.trim());
                }
            }

            var courseId = JSON.stringify(course_id);
            var courseName = JSON.stringify(course_name);
            var userId =  JSON.stringify(user_id);
            var promoCode = JSON.stringify(promo_code);
            $.ajax({
                url: "savecourse.php",
                type: "post",
                data: {courseId : courseId , courseName : courseName, userId:userId, promoCode:promoCode, deleteId:deleteUserId},
                success : function(data)
                {
                     //alert(data);
                }
            });
            reload();
        }

        function reload() {
            window.location.reload(true);
            alert("Амжилттай хадгаллаа");
        }

    </script>
<?php include "footer.php" ?>