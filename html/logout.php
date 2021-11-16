<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["name"]);
unset($_SESSION["uname"]);
unset($_SESSION["password"]);
header("Location:index.php");
?>
