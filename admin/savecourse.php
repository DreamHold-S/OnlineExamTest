<?php

include   "../connection.php";
$courseId = json_decode($_POST["courseId"]);
$courseName = json_decode($_POST["courseName"]);
$userId = json_decode($_POST["userId"]);
$promoCode = json_decode($_POST["promoCode"]);

$deletUserId = json_decode($_POST["deleteId"]);
mysqli_query($link,"delete from course_role where  user_id = $deletUserId ") or die(mysqli_error($link));

if(count($courseId) > 0){
    for ($i = 0; $i < count($courseId); $i++) {

        if(($courseId[$i] != ""))
        {
            $sql="INSERT INTO course_role (course_id, course_name, user_id, promo_code) VALUES ('$courseId[$i]','$courseName[$i]','$userId[$i]','$promoCode[$i]')";
            if (!mysqli_query($link,$sql))
            {
                die('Error: ' . mysqli_error($link));
            }
        }
    }
}
?>