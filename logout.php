<?php
session_start();
session_destroy();
unset($_SESSION["id"]);
unset($_SESSION["name"]);
unset($_SESSION["answer"]);
header("Location:index.php");
?>