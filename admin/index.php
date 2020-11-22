<?php
  session_start();
  include  "../connection.php"
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Login</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark">
<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-logo">
                <a href="index.html"  style="color: white"  >
                    Admin Login
                </a>
            </div>
            <div class="login-form" >
                <form name="form1" action="" method="post">
                    <div class="form-group">
                        <label>Хэрэглэгчийн Нэр</label>
                        <input type="text" class="form-control" placeholder="username"  name="username"  required  >
                    </div>
                    <div class="form-group">
                        <label>Нууц үг</label>
                        <input type="password" class="form-control" placeholder="password"  name="password"  re>
                    </div>
                    <button type="submit" name="submit1" class="btn btn-success btn-flat m-b-30 m-t-30">Нэвтрэх</button>

                    <div class="alert alert-danger"  id="failed" style="margin-top: 10px; display: none">
                        <strong>Нууц үг нэг л буруу байна даа </strong>
                    </div>
                </form>

                <?php
                if(isset($_POST["submit1"])){

                    $result = mysqli_query($link, "select * from admin_login where username = '$_POST[username]' && password = '$_POST[password]'");
                    $row  = mysqli_fetch_array($result);
                if(is_array($row)) {
                    $_SESSION["id"] = $row['id'];
                    $_SESSION["name"] = $row['username'];
                    if(isset($_SESSION["id"])) {

                    ?>
                    <script type="text/javascript">
                        window.location.href = "demo.php";
                    </script>
                     <?php
                    }
                }
                else
                {
                    ?>
                    <script type="text/javascript">
                        document.getElementById("failed").style.display = "block";
                    </script>
                <?php
                }} ?>
            </div>
        </div>
    </div>
</div>
<script src="vendors/jquery/dist/jquery.min.js"></script>
<script src="vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>

