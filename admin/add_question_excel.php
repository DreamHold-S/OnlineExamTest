<?php
include "header.php";
include "../connection.php";
?>

    <div class="breadcrumbs">
        <div class="col-sm-8">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1  style="color:#0d152a">Excel-с асуулт оруулахдаа жишээ template дагуу өгөгдөл оруулна уу !! Category баганд заавал үүссэн ангилал оруулахыг анхаарна уу </h1>
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
                            <form enctype="multipart/form-data" method="post" role="form">
                                <div class="form-group">
                                    <label for="exampleInputFile">File Upload</label>
                                    <input type="file" name="excel"  size="150" >
                                    <p style="color: red" class="help-block">Та зөвхөн/xlsx File файл импорт хийнэ үү.</p>
                                </div>
                                <button type="submit" class="btn btn-danger" name="Import" value="Import">Хадгалах</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
if(isset($_POST["Import"]))
{
    $success ="";
    if($_FILES["excel"]["size"] > 0)
    {
        if($_FILES['excel']['name']) {
            $arrFileName = explode('.', $_FILES['excel']['name']);
            print_r($arrFileName);
            if ($arrFileName[1] == 'xlsx' || $arrFileName[2] == 'xlsx' ) {
                include "xlsx.php";
                if($link){
                    $excel=SimpleXLSX::parse($_FILES['excel']['tmp_name']);
                    for ($sheet=0; $sheet < sizeof($excel->sheetNames()) ; $sheet++) {
                        $rowcol=$excel->dimension($sheet);
                        $i=0;
                        if($rowcol[0]!=1 &&$rowcol[1]!=1){
                            foreach ($excel->rows($sheet) as $key => $row) {
                                $q="";
                                foreach ($row as $key => $cell) {
                                    if($i==0){
                                        //    unComment hiiiw
                                    }else
                                    {
                                        $q.="'".$cell. "',";
                                    }
                                }
                                if($i==0){
                                //     unComment hiiiw
                                }
                                else{
                                    $query="INSERT INTO ".$excel->sheetName($sheet)." values (".rtrim($q,",").");";
                                   // echo $query;
                                    $success = mysqli_query($link,$query) or die(mysqli_error($link));
                                }
                                $i++;
                            }
                        }
                    }
                }
                if($success) {
                    ?>
                     <script  type="text/javascript">
                         alert("Амжилттай Хадгаллаа");
                     </script>
                    <?php
                }
                else
                {
                    ?>
                    <script  type="text/javascript">
                        alert("Алдаа гарсан тул хадгалах боломжгүй байна.");
                    </script>-->
                    <?php
                }
             }
             else
             {
                 ?>
                 <script type="text/javascript">
                     alert("Та оруулах файлаа буруу файл сонгосон байна. xlsx төрөлтэй байх ёстой анхаарна уу");
                 </script>
                 <?php
             }
        }
    }
    else
    {
        ?>
        <script type="text/javascript">
            alert("Та оруулах файлаа сонгоно уу");
        </script>
        <?php
    }



  //Angilal bureer asuultuudiin questionNo updatehiih
   //  baihgui angilal uusgen bwal ustgah
    $result = mysqli_query($link,"select * from exam_category ");
    while ($row = $result->fetch_assoc()){
        $exam_category = $row["category"];

        $loop=0;
        $count = 0;
        $res = mysqli_query($link,"select * from questions where  category = '$exam_category'  order by id asc") or die(mysqli_error($link));
        $count = mysqli_num_rows($res);
        if($count == 0)
        {

        }
        else
        {
            while ($row = mysqli_fetch_array($res))
            {
                $loop =  $loop + 1;
                $rowId = $row["id"];
                mysqli_query($link,"UPDATE questions SET question_no = '$loop' WHERE ID='$rowId'") or die(mysqli_error($link));
            }
        }
     }

    $delete_query = "DELETE questions 
            FROM questions
            LEFT JOIN
            exam_category ON questions.category = exam_category.category 
            WHERE exam_category.category IS NULL;";

    $run=mysqli_query($link,$delete_query) or die(mysqli_errno($link));
    if($run)
    {
        ?>
          <script  type="text/javascript">
              alert("Та Байхгүй ангилалаар асуулт оруулсан тохиолдолд устах тул анхаарна уу.");
          </script>
        <?php
    }
}
?>

<?php
include "footer.php"
?>