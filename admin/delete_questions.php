<?php
include  "../connection.php";
$deleteId = $_GET["id"];
$count = 0;
mysqli_query($link,"delete from exam_result where  id = $deleteId ") or die(mysqli_error($link));
?>

<script type="text/javascript">
    window.location = "all_questions.php"
</script>
