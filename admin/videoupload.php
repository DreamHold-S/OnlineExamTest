<?php
include "header.php";
$id = $_GET["id"];
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
                        <div class="card-body">
                            <head>
                                <?php
                                include("../connection.php");

                                if(isset($_POST['but_upload'])){
                                    $maxsize = 5242880; // 5MB
                                    $maxsize = 52428800; // 50MB

                                    $name = $_FILES['file']['name'];
                                    $target_dir = "../video/";
                                    $target_file = $target_dir . $_FILES["file"]["name"];

                                    // Select file type
                                    $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                                    // Valid file extensions
                                    $extensions_arr = array("mp4","avi","3gp","mov","mpeg");

                                    // Check extension
                                    if( in_array($videoFileType,$extensions_arr) ){

                                        // Check file size
                                        if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
                                            echo "File too large. File must be less than 5MB.";
                                        }else{
                                            // Upload
                                            if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
                                                // Insert record
                                                $query = "INSERT INTO videos(name,location,courseId) VALUES('".$name."','".$target_file."','$id')";

                                                mysqli_query($link,$query) or die(mysqli_error());
                                                echo "Амжилттай хадгаллаа.";
                                            }
                                        }

                                    }else{
                                        echo "Оруулах гэж байгаа файл буруу байна.";
                                    }

                                }
                                ?>
                            </head>
                            <body>
                            <form method="post" action="" enctype='multipart/form-data'>
                                <input type='file' name='file' />
                                <input type='submit' value='Upload' name='but_upload'>
                            </form>

                            </body>
                        </div>
                    </div> <!-- .card -->

                </div>

            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

<?php
include "footer.php"
?>