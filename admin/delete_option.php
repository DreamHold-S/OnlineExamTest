<?php
include  "../connection.php";
$id = $_GET["id"];
$id1 = $_GET["id1"];
$category = $_GET["category"];
mysqli_query($link,"delete from questions where  id = $id ");

?>
<script  type="text/javascript">
    alert("Амжилттай устлаа");
</script>
<?php

$loop=0;
$count = 0;
$res = mysqli_query($link,"select * from questions where  category = '$category'  order by id asc") or die(mysqli_error($link));
$count = mysqli_num_rows($res);
if($count == 0)
{
    //
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


?>
<script  type="text/javascript">
    window.location = "add_edit_questions.php?id=<?php echo $id1 ?>"
</script>
<?php

?>
