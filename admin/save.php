<?php

include   "../connection.php";
$categoryId = json_decode($_POST["categoryId"]);
$categoryName = json_decode($_POST["categoryName"]);
$userId = json_decode($_POST["userId"]);
$deletUserId = json_decode($_POST["deleteId"]);
mysqli_query($link,"delete from userrole where  user_id = $deletUserId ") or die(mysqli_error($link));

if(count($categoryId) > 0){
    for ($i = 0; $i < count($categoryId); $i++) {

        if(($categoryId[$i] != ""))
        {
            $sql="INSERT INTO userrole (user_id, category_id, category_name) VALUES ('$userId[$i]','$categoryId[$i]','$categoryName[$i]')";
            if (!mysqli_query($link,$sql))
            {
                die('Error: ' . mysqli_error($link));
            }
        }
    }
}
?>