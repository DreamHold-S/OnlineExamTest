<?php
include  "connection.php" ?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<link rel="stylesheet" href="style.css">

<div class="login">
    <h2>Бүртгүүлэх Хэсэг</h2>
    <form action="" method="post">
        <div class="imgcontainer">
            <img src="image/avatar.png" alt="Avatar" class="avatar">
        </div>

        <div class="container">
            <label for="uname"><b>Овог нэр</b></label>
            <input type="text" placeholder="Овог Нэр" name="firstname"  required >

            <label for="psw"><b> Өөрийн нэр</b></label>
            <input type="text" placeholder="Өөрийн Нэр" name="lastname"   required >

            <label for="psw"><b> Утасны дугаар</b></label>
            <input type="text" placeholder="Утасны дугаар" name="phonenumber"  required >


            <label for="psw"><b> Нэвтрэх нэр</b></label>
            <input type="text" placeholder="Нэвтрэх нэр" name="username" required >


            <label for="psw"><b> Нууц үг</b></label>
            <input type="password" placeholder="Нууц Үг" name="password" required >

            <button type="submit"   name="submit1">Хадгалах</button>
            <button onclick="window.location.href='/onlinequiz/index.php'">Буцах</button>

            <div class="alert alert-success"  id="success" style="display: none">
                <strong >Амжилттай бүртгүүллээ !</strong>
            </div>

            <div class="alert alert-danger"  id="failed" style="display: none">
                <strong > Энэ хэрэглэгч бүртгүүлсэн байна !</strong>
            </div>

        </div>
    </form>
</div>
</body>
</html>

<?php
if(isset($_POST["submit1"])){
  $count = 0;
  $res = mysqli_query($link,"select * from  register where username = '$_POST[username]'") or die (mysql_error());
  $count =  mysqli_num_rows($res);
  if($count > 0){
      ?>
      <script type="text/javascript">
          document.getElementById("success").style.display = "none";
          document.getElementById("failed").style.display = "block";

      </script>
      <?php
  }
  else
  {
      mysqli_query($link, "insert into  register values(NULL , '$_POST[firstname]', '$_POST[lastname]', '$_POST[phonenumber]', '$_POST[password]','$_POST[username]')");
      ?>
      <script type="text/javascript">
          document.getElementById("success").style.display = "block";
          document.getElementById("failed").style.display = "none";
      </script>
      <?php
  }
}
?>
