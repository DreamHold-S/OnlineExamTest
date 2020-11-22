<?php
session_start();
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

<body>
<!-- Left Panel -->

<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./">
                Admin Panel
            </a>
            <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="index.php"> <i class="menu-icon fa fa-dashboard"></i>Нүүр хэсэг</a>
                    <a href="exam_category.php"> <i class="menu-icon fa fa-dashboard"></i>Ангилал Нэмэх & Засах</a>
                    <a href="add_edit_exam_questions.php"> <i class="menu-icon fa fa-dashboard"></i>Acуулт Нэмэх & Засах</a>
                     <a href="add_question_excel.php"> <i class="menu-icon fa fa-dashboard"></i>Acуулт Нэмэх Excel</a>
                    <a href="all_questions.php"> <i class="menu-icon fa fa-dashboard"></i>Шалгалт мэдээлэл</a>
                    <a href="userrole.php"> <i class="menu-icon fa fa-dashboard"></i>Хэрэглэгч Тохиргоо</a>
                    <a href="userprint.php"> <i class="menu-icon fa fa-dashboard"></i>Мэдээлэл хэвлэх</a>
                    <a href="userinfo.php"> <i class="menu-icon fa fa-dashboard"></i>Систем хэрэглэгч</a>
                    <a href="addTeacher.php"> <i class="menu-icon fa fa-dashboard"></i>Багш мэдээлэл оруулах</a>
                    <a href="editTeacher.php"> <i class="menu-icon fa fa-dashboard"></i>Багш мэдээлэл засах</a>
                    <a href="addCourse.php"> <i class="menu-icon fa fa-dashboard"></i>Хичээл мэдээлэл оруулах</a>
                    <a href="editCourse.php"> <i class="menu-icon fa fa-dashboard"></i>Хичээл мэдээлэл засах</a>
                    <a href="logout.php"> <i class="menu-icon fa fa-dashboard"></i>Гарах</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->

<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!-- Header-->
    <header id="header" class="header">

        <div class="header-menu">
            <div class="col-sm-7">
                <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
            </div>

            <div class="col-sm-5">
                <div class="user-area dropdown float-right">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Сайн Байна уу <?php echo $_SESSION["name"]; ?>
                    </a>

                    <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> Гарах </a>
                    </div>
                </div>
            </div>
        </div>

    </header><!-- /header -->
    <!-- Header-->
