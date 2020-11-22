
<?php
include  "../connection.php";
$category_id = $_GET["id"];
$category_name = $_GET["category_name"];
$count = 0;

//Herwee ene angilal deer asuult nemsen bol ustgah bolomjgui get tsootsow
$res = mysqli_query($link,"select * from userrole where category_name = '$category_name'") or die(mysqli_error($link));
$count =  mysqli_num_rows($res);
if($count ==0)
{
    //Herwee ene angilal deer asuult nemsen bol ustgah bolomjgui get tsootsow
    $result = mysqli_query($link,"select * from questions where category = '$category_name'") or die(mysqli_error($link));
    $counts =  mysqli_num_rows($result);
    if($counts ==0){
        mysqli_query($link,"delete from exam_category where  id = $category_id ") or die(mysqli_error($link));
    }
    else
    {
        ?>
        <script  type="text/javascript">
            alert("Энэ ангилал дээр асуулт бүртгэсэн тул устгах боломжгүй байна");
        </script>
        <?php
    }
}
else
{
    ?>
    <script  type="text/javascript">
        alert("Энэ ангилал дээр  хэрэглэгч тохируулсан тул устгах боломжгүй байна, Та эхлээд тохируулсан хэрэглэгчээ устгана уу. ");
    </script>
    <?php
}




?>

<script type="text/javascript">
        window.location = "exam_category.php"
</script>
