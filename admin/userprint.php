<?php
include "header.php";
include "../connection.php";
?>
    <div class="breadcrumbs">
        <div class="col-sm-12">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Хэрэглэгчийн шалгалтын дүнгийн хуудас хэвлэх !</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Нэр</th>
                                    <th scope="col">Хэвлэх</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $count = 0;
                                $res = mysqli_query($link,"select * from register");
                                while ($row = mysqli_fetch_array($res))
                                {
                                    $count = $count+1;
                                    ?>
                                    <tr>
                                        <th scope="row"> <?php echo $count ?> </th>
                                        <td><?php echo $row["lastname"]?></td>
                                        <td><a href="print.php?id=<?php echo $row["username"]; ?>" >Шалгалтын хуудас хэвлэх </a></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <button onclick="window.location.href='printalluser.php'">Бүгдийн хэвлэх</button>
                    </div> <!-- .card -->
                </div>

            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

<?php
include "footer.php"
?>