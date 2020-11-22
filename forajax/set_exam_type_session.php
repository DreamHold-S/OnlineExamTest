<?php
session_start();
include "../connection.php";
$exam_category= $_GET["exam_category"];
$_SESSION["exam_category"] = $exam_category;
$userName = $_SESSION["name"];
$userCount = 0;
$questionsCount = 0;


$resultQuestions = mysqli_query($link,"select * from questions where category = '$exam_category'") or die (mysqli_error($link));
$questionsCount = mysqli_num_rows($resultQuestions);
if($questionsCount == 0){
    echo "unQuestions";
}
else
{

    $result = mysqli_query($link,"select * from exam_result where user_name = '$userName'  && exam_type = '$exam_category'") or die (mysqli_error($link));
    $userCount = mysqli_num_rows($result);


    if($userCount == 0)
    {
        $res = mysqli_query($link,"select * from exam_category where category = '$exam_category'") or die (mysqli_error($link));
        while ($row=mysqli_fetch_array($res)) {
            $_SESSION["exam_time"] = $row["exam_time"];
        }
        $date= date("Y-m-d H:i:s");
        $_SESSION["end_time"] = date("Y-m-d H:i:s", strtotime($date."+$_SESSION[exam_time] minutes"));
        $_SESSION["exam_start"] = "yes";
    }
    else
    {
        echo "unFailed";
    }

}




?>