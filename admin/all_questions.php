<?php
include "header.php";
include  "../connection.php";
?>
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Дугаар</th>
                                <th scope="col">Нэр</th>
                                <th scope="col">Ангилал</th>
                                <th scope="col">Нийт Асуулт</th>
                                <th scope="col">Зөв Хариулт</th>
                                <th scope="col">Буруу Хариулт</th>
                                <th scope="col">Огноо</th>
                                <th scope="col">Устгах</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            $count = 0;
                            $userId = $_SESSION["name"];
                            $res = mysqli_query($link,"select * from exam_result ") or die(mysqli_error($link));
                            while ($row = mysqli_fetch_array($res))
                            {
                                $count = $count+1;
                                ?>
                                <tr>
                                    <th scope="row"> <?php echo $count ?> </th>
                                    <td><?php echo $row["user_name"]?></td>
                                    <td><?php echo $row["exam_type"]?></td>
                                    <td><?php echo $row["total_question"]?></td>
                                    <td><?php echo $row["correct_answer"]?></td>
                                    <td><?php echo $row["wrong_answer"]?></td>
                                    <td><?php echo $row["wrong_answer"]?></td>
                                    <td><a href="delete_questions.php?id=<?php echo $row["id"]; ?>" >Delete </a></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table
                    </div> <!-- .card -->
                </div>

            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

<?php
include "footer.php"
?>