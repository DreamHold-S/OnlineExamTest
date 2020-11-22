<?php
session_start();
include "connection.php";
if(!isset($_SESSION["name"])){
    ?>
    <!--suppress JSAnnotator -->
    <script  type="text/javascript">
        window.location = "index.php"
    </script>
    <?php
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>


<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <h1 class="logo mr-auto" style="color:red" ><a href="index.html" id="countdowntimer" ></a> Цаг явж байна</h1>
        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="active"><a href="">Нүүр</a></li>
                <li><a href="old_results.php">Шалгалт</a></li>
                <li class="drop-down">  <a href=""  style="color: green" > Сайн Байна уу <?php echo $_SESSION["name"]; ?></a>
                    <ul>
                        <li>
                            <a href="logout.php" tite="Logout">Гарах</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav><!-- .nav-menu -->

    </div>
</header><!-- End Header -->


<main id="main">

    <div class="col-lg-8  col-lg-3 "  style="min-height: 300px;  background-color: white; margin: auto;  margin-top: 30px;">
         <br>
              <br>
              <div class="col-lg-12  col-lg-10"  style="background-color: #4CAF50;" >
                  <div  id="current_que" style="float:right;">0</div>
                  <div style="float:right">/</div>
                  <div  id="total_que" style="float:right">0</div>
                  <div  id="all" style="float:right; margin-right: 5px">Нийт: </div>

              </div>

              <div class="row" style="margin-top: 30px;  border: 2px solid royalblue; background-color:  "  >
                  <div class="row">
                      <div class="col-lg-10 col-lg-1"  style="min-height: 300px; width: 800px;" id="load_questions">
                      </div>
                  </div>
              </div>

              <div class="row"  style="margin-top: 10px;">

            <div class="col-lg-12 col-lgp-push-3"  style="min-height: 50px; >
                      <div class="col-lg-12 text-center">
            <input  type="button"  class="btn  btn-warning"  value="Өмнөх хуудас"  onclick="load_previous()">&nbsp;
            <input  type="button"  class="btn  btn-success"  value="Дараах хуудас"  onclick="load_next()">
            <input  type="button"  class="btn  btn-danger"  value="Шалгалт дуусгах"  onclick="exit_exam()">

        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col" style="min-width:900px">Бөглөгдсөн дугаар</th>
                        </tr>
                        </thead>
                        <tbody>
                        <td  id="demo" >

                        </td>
                        </tbody>
                    </table>
                </div> <!-- .card -->
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col" style="min-width:900px">Бөглөгдөөгүй дугаар</th>
                        </tr>
                        </thead>
                        <tbody>
                        <td  id="unchecked" >

                        </td>
                        </tbody>
                    </table>
                </div> <!-- .card -->
            </div>

        </div>


    </div>
    </div>


</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="container d-md-flex py-4">
        <div class="mr-md-auto text-center text-md-left">
            <div class="copyright">
                &copy; 2020 <strong><span>Он</span></strong> Бүх эрх хуулиар хамгаалагдав
            </div>
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="assets/vendor/counterup/counterup.min.js"></script>
<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
</body>
</html>
</html>

<script  type="text/javascript">
    setInterval(function () {
        timer();
    }, 1000);

    function timer()
    {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function ()
        {
            if(xmlhttp.readyState == 4 &&  xmlhttp.status == 200)
            {
                if(xmlhttp.responseText =="00:00:01"){
                    window.location="result.php";
                }
                document.getElementById("countdowntimer").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","forajax/load_timer.php",true);
        xmlhttp.send(null);
    }
</script>


<script  type="text/javascript">

    var checkedArrayValues =  [];
    var filterdArrayValues = [];
    var unCheckedArrayValues = [];

    function load_total_que()
    {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function ()
        {
            if(xmlhttp.readyState == 4 &&  xmlhttp.status == 200)
            {
                document.getElementById("total_que").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","forajax/load_total_que.php", true);
        xmlhttp.send(null);
    }

    var questionno = "1";
    load_questions(questionno);

    function load_questions(questionno) {
        document.getElementById("current_que").innerHTML = questionno;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function ()
        {
            if(xmlhttp.readyState == 4 &&  xmlhttp.status == 200)
            {
                if(xmlhttp.responseText =="over")
                {
                    if (confirm('Та үнэхээр итгэлтэй байна уу? Шалгалтын цаг дуусахаас өмнө шалгалтыг зогсоох гэж байна !!!! '))
                    {
                        window.location = "result.php";
                    }
                    else
                    {
                        load_previous();
                    }
                }
                else
                {
                    document.getElementById("load_questions").innerHTML = xmlhttp.responseText;
                    load_total_que();
                }
            }
        };
        xmlhttp.open("GET","forajax/load_questions.php?questionno="+ questionno,true);
        xmlhttp.send(null);
    }

     function radioclick(radiovalue, questionno)
     {
         var xmlhttp = new XMLHttpRequest();
         xmlhttp.onreadystatechange = function ()
         {
             if(xmlhttp.readyState == 4 &&  xmlhttp.status == 200)
             {
                  checkedValueAll(questionno);
             }
         };
         xmlhttp.open("GET","forajax/save_answer_in_session.php?questionno="+ questionno +"&value1="+radiovalue, true);
         xmlhttp.send(null);
     }

    function load_previous() {
        if(questionno=="1"){
            load_questions(questionno);
        }
        else
        {
            questionno = eval(questionno) -1;
            load_questions(questionno);
        }
    }

    function  load_next()
    {
        questionno = eval(questionno) +1;
        load_questions(questionno);
    }

    function  exit_exam()
    {
        var totalQty = document.getElementById("total_que").innerHTML;
        questionno = eval(totalQty)+1;
        load_questions(questionno);
    }

     function checkedValueAll(value)
     {
          checkedArrayValues.push(value);
          filterdArrayValues = checkedArrayValues.filter((data,index)=>{
             return checkedArrayValues.indexOf(data) === index;
         })
         var x = filterdArrayValues.toString();
         document.getElementById("demo").innerHTML = x;

         var totalQty = document.getElementById("total_que").innerHTML;

         if(filterdArrayValues.length > 0)
         {
             unCheckedArrayValues = [];
             for(var b = 1; b <= totalQty; b ++)
             {
                 var found = filterdArrayValues.find(function (element) {
                     return element == b;
                 });

                 if(found == undefined) {
                     unCheckedArrayValues.push(b);
                 }
             }
         }

         if(filterdArrayValues.length == document.getElementById("total_que").innerHTML )
             document.getElementById("unchecked").innerHTML = "";

         if(unCheckedArrayValues.length > 0){
             var k = unCheckedArrayValues.toString();
             document.getElementById("unchecked").innerHTML = k;
         }
     }

</script>

