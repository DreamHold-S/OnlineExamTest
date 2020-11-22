<?php
include "header.php";
include "../connection.php";
?>
    <div class="breadcrumbs">
        <div class="col-sm-12">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Асуулт нэмэхийн өмнө ангилал буюу бүлгийг сонгоно уу !</h1>
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

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Ангилал</th>
                                    <th scope="col">Хугацаа</th>
                                    <th scope="col">Сонгох</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $count = 0;
                                $res = mysqli_query($link,"select * from exam_category");
                                while ($row = mysqli_fetch_array($res))
                                {
                                    $count = $count+1;
                                    ?>
                                    <tr>
                                        <th scope="row"> <?php echo $count ?> </th>
                                        <td><?php echo $row["category"]?></td>
                                        <td><?php echo $row["exam_time"]?></td>
                                        <td><a href="add_edit_questions.php?id=<?php echo $row["id"]; ?>" >Сонгох </a></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- .card -->
                </div>

            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

<?php
include "footer.php"
?>