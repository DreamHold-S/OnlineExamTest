<?php
include "../connection.php";
$userName = $_GET["id"]
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

</html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel</title>
    <meta name="description" content="Admin Panel">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-8" style="margin: auto">

                <div class="page-title" style="text-align: center">
                    <h5>Шалгалтын дүнгийн хуудас</h5>
                </div>
                <br>
                <div class="card">
                    <table class="table table-bordered">
                        <thead>
                        <tr  style="background-color: orange">
                            <th scope="col">Овог</th>
                            <th scope="col">Нэр</th>
                            <th scope="col">Албан тушаал</th>
                            <th scope="col">Шалгалтын Нэр</th>
                            <th scope="col">Шалгалтын оноо</th>
                            <th scope="col">Авсан оноо</th>

                        </tr>



                        </thead>
                        <tbody>

                        <?php

                        $date = new DateTime("now", new DateTimeZone('America/New_York') );
                        $count = 0;
                        $userRole_query = "SELECT  register.lastname, register.firstName, register.phonenumber,  exam_result.total_question,
                                            exam_result.correct_answer, exam_result.scoreA,exam_result.scoreB
                                            FROM exam_result 
                                            INNER JOIN register ON exam_result.user_name = register.username 
                                            where exam_result.user_name = '$userName' ";

                        $res = mysqli_query($link,$userRole_query) or die(mysqli_error($link));
                        $count = mysqli_num_rows($res);

                        if($count == 0)
                        {
                            ?>
                            <script type="text/javascript">
                                alert("Хэвлэх мэдээлэл байхгүй байна");
                                window.location ="userprint.php"
                            </script>
                            <?php
                        }
                        while ($row = mysqli_fetch_array($res))
                        {
                            ?>


                            <tr>
                                <td rowspan = "2"><?php echo $row["firstName"]?></td>
                                <td rowspan = "2"><?php echo $row["lastname"]?></td>
                                <td rowspan = "2"><?php echo $row["phonenumber"]?></td>
                                <td>Хууль Эрх Зүй</td>
                                <td>30</td>
                                <td><?php echo $row["scoreA"]?></td>

                            </tr>
                            <tr>
                                <td>СТОУС</td>
                                <td>
                                    <?php
                                    if($row["total_question"] < 60)
                                    {
                                        echo 24;
                                    }
                                    else
                                    {
                                        echo  30;
                                    }
                                    ?>
                                </td>
                                <td><?php echo $row["scoreB"]?></td>
                            </tr>
                            <tr>
                                <td colspan = "4">Нийт</td>
                                <td>
                                    <?php
                                    if($row["total_question"] < 60)
                                    {
                                        echo 54;
                                    }
                                    else
                                    {
                                        echo  60;
                                    }
                                    ?>
                                </td>
                                <td><?php echo $row["scoreA"] +$row["scoreB"] ?></td>

                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-12 col-lgp-push-3"  style="min-height: 50px; >
                  <div class="col-lg-8 text-center">
                <p  style="float: left;">ШАЛГУУЛАГЧ:</p>
                <p style="float: right">
                    <?php

                    echo $userName;
                    ?>
                </p>
            </div>

            <br>
            <br>
            <div class="col-lg-12 col-lgp-push-3"  style="min-height: 50px; >
                      <div class="col-lg-8 text-center">
            <p  style="float: left">АЖЛЫН ХЭСГИЙН ГИШҮҮД:</p>
        </div>

        <div class="col-lg-12 col-lgp-push-3"  style="min-height: 50px; >
                              <div class="col-lg-8 text-center">
        <p  style="float: left;  width: 300px;">ЗАХИРГАА, ХҮНИЙ НӨӨЦИЙН БОДЛОГЫН ГАЗРЫН ОРЛОГЧ ДАРГА </p>
        <p style="float: right">Н.ЭНХБОЛД
        </p>
    </div>

    <div class="col-lg-12 col-lgp-push-3"  style="min-height: 50px; >
                                  <div class="col-lg-8 text-center">
    <p  style="float: left; width: 300px;">САНХҮҮ, НЯГТЛАН БОДОХ БҮРТГЭЛИЙН ХЭЛТЭСИЙН ДАРГА,ЕРӨНХИЙ НЯГТЛАН БОДОГЧ</p>
    <p style="float: right">Ц.МӨНХБОЛД
    </p>
</div>

<div class="col-lg-12 col-lgp-push-3"  style="min-height: 50px; >
                                                  <div class="col-lg-8 text-center">
<p  style="float: left; width: 300px;">ХУУЛИЙН ХЭЛТЭСИЙН ДАРГА</p>
<p style="float: right">Х.БОЛДБААТАР
</p>
</div>


<div class="col-lg-12 col-lgp-push-3"  style="min-height: 50px; >
                                                                  <div class="col-lg-8 text-center">
<p  style="float: left; width: 300px;">ЕРӨНХИЙ НЯГТЛАН БОДОГЧИЙН ОРЛОГЧ</p>
<p style="float: right">Д.ПҮРЭВСҮРЭН
</p>
</div>



<div class="col-lg-12 col-lgp-push-3"  style="min-height: 50px; >
                                                                  <div class="col-lg-8 text-center">
<p  style="float: left; width: 300px;">НИЙГМИЙН ХАРИЛЦААНЫ ХЭЛТСИЙН СОЦИОЛОГИЧ</p>
<p style="float: right">Т.ДАВААЖАРГАЛ
</p>
</div>



<div class="col-lg-12 col-lgp-push-3"  style="min-height: 50px; >
                                                                  <div class="col-lg-8 text-center">
<p  style="float: left; width: 400px;">МОНГОЛЫН МЭРГЭШСЭН НЯГТЛАН БОДОГЧДЫН ИНСТИТУТ, ТАТВАРЫН МЭРГЭШСЭН ЗӨВЛӨХИЙН НИЙГЭМЛЭГИЙН БАГШ</p>
<p style="float: right; margin-top: 10px;">Ц.ЛХАГВАДУЛАМ
</p>
</div>



<div class="col-lg-12 col-lgp-push-3"  style="min-height: 50px; >
                                                                                  <div class="col-lg-12 text-center">
<p  style="float: left;">---------------------------------------------------------------------------------------------------------------------------------</p>
</p>

<input  type="submit"  name="submit1" value=" <?php
echo $date->format('Y-m-d H:i:s');

?> "  onclick="window.print();" style="border: none" >
</div>

</div>
</div><!-- .animated -->
