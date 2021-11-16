<?php
session_start();
?>
<html>
<head>
<title>商城</title>
</head>
<body>
  <style>
.container {
  padding: 16px;
  background-color: #FFFFFF;
}
  </style>


</body>
</html>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <style></style>
  </head>
  <body  style="background-image: url(login2.jpg);background-size: cover  ;">
  <div class="container"> 
  <?php
  if($_SESSION["name"]) {
  ?>
    轉生者 <?php echo $_SESSION["name"]; ?>你好<br> 按按看 <a href="logout.php" tite="Logout">回大廳</a>
  <?php
  }else echo "<h1>Please login first .</h1>";
  ?>
    <form action="store.php" method="post">
      武器id?  ： <input type="text" name="id"> <br>
      <input type="submit" value="問老闆">
    </form>
  </div>
  </body>
</html>