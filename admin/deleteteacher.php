
<?php
include  "../connection.php";
$teacher_id = $_GET["id"];
mysqli_query($link,"delete from teacher where  teacher_id = $teacher_id ") or die(mysqli_error($link));
?>
<script type="text/javascript">
    window.location = "editTeacher.php"
</script>
