
<?php
include  "../connection.php";
$course_id = $_GET["id"];
mysqli_query($link,"delete from courses where  course_id  = $course_id ") or die(mysqli_error($link));
?>
<script type="text/javascript">
    window.location = "editCourse.php"
</script>
