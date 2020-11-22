<?php
include "header.php";
include "../connection.php";
$userId = $_GET["id"];
?>
    <div class="breadcrumbs">
        <div class="col-sm-12">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Хэрэглэгчийн ангилалын тохиргоо оруулах !</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <form  action="" method="post"  name="form1" >
                        <div class="card-body">

                            <table class="table table-bordered" id="Table1">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Ангилал Дугаар</th>
                                    <th scope="col">Ангилал Нэр</th>
                                    <th scope="col">Хэрэглэгч Дугаар</th>

                                    <th scope="col">Сонгох</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $count = 0;
                                $countUserRole =0;
                                $res = mysqli_query($link,"select * from  exam_category ");
                                while ($row = mysqli_fetch_array($res))
                                {
                                    $pcategoryId = $row["id"];
                                    $puserId = $userId;
                                    $result = mysqli_query($link, "select * from userrole where user_id = '$puserId' && category_id = '$pcategoryId'") or die(mysqli_error($link));
                                    $countUserRole = mysqli_num_rows($result);

                                    echo $countUserRole;
                                    $count = $count+1;
                                    ?>
                                    <tr>
                                        <th scope="row"> <?php echo $count ?> </th>
                                        <td><?php echo $row["id"]?></td>
                                        <td><?php echo $row["category"]?></td>
                                        <td><?php echo  $userId ?></td>
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
            var categgory_id = new Array();
            var categgory_name = new Array();
            var user_id = new Array();

            for (var i = 0; i < checkBoxes.length; i++) {
                if (checkBoxes[i].checked) {
                     var row = checkBoxes[i].parentNode.parentNode;
                     categgory_id.push(row.cells[1].innerHTML);
                     categgory_name.push(row.cells[2].innerHTML);
                    user_id.push(row.cells[3].innerHTML);
                }
            }

            var categoryId = JSON.stringify(categgory_id);
            var categoryName = JSON.stringify(categgory_name);
            var userId =  JSON.stringify(user_id);
            $.ajax({
                url: "save.php",
                type: "post",
                data: {categoryId : categoryId , categoryName : categoryName, userId:userId, deleteId:deleteUserId},
                success : function(data)
                {
                   // alert(data);
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