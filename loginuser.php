<?php
session_start();
include "connection.php"
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<link rel="stylesheet" href="style.css">
<div class="login">
    <h2>Нэвтрэх Хэсэг Сургалт Амжилт</h2>
    <form action="" method="post"  name="form1">
        <div class="imgcontainer">
            <img src="image/avatar.png" alt="Avatar" class="avatar">
        </div>

        <div class="container">
            <label for="uname"><b>Нэвтрэх нэр</b></label>
            <input type="text" placeholder="Нэвтрэх нэр" name="username" required>

            <label for="psw"><b>Нууц үг</b></label>
            <input type="password" placeholder="Нууц үг" name="password" required>

            <button type="submit"  name="login" >Нэвтрэх</button>
            <button onclick="window.location.href='registeruser.php'">Бүртгүүлэх</button>

            <div class="alert alert-danger"  id="failed" style="display: none">
                <strong >Нууц үг буруу байна !</strong>
            </div>
        </div>
    </form>
</div>

<?php
if(isset($_POST["login"]))
{
    $result = mysqli_query($link, "select * from register where username = '$_POST[username]' && password = '$_POST[password]'");
    $row  = mysqli_fetch_array($result);
    if(is_array($row))
    {
        $_SESSION["id"] = $row['id'];
        $_SESSION["name"] = $row['username'];

    if(isset($_SESSION["id"]))
    {
        ?>
        <script type="text/javascript">
            window.location.href = "courses.php";
        </script>
    <?php

    exit();
    }
    }
    else
    {
    ?>
        <script type="text/javascript">
            document.getElementById("failed").style.display = "block";
        </script>
        <?php
    }
}
?>
</body>
</html>
