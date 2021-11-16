<?php
    session_start();
    $message="";
    if(count($_POST)>0) {
        $con = mysqli_connect('localhost','root','rootroot','user_db') or die('Unable To connect');
        $result = mysqli_query($con,"SELECT user_id,user_name FROM user_table WHERE user_name= '" . $_POST["uname"] ."' and user_password = '". $_POST["psw"]."'");
        $row  = mysqli_fetch_array($result);
        if(is_array($row)) {
        $_SESSION["id"] = $row['user_id'];
        $_SESSION["name"] = $row['user_name'];
        $_SESSION["password"] = $_POST["psw"];
        $_SESSION['uname'] = $_POST['uname'];
        } else {
         $message = "Invalid Username or Password!";
        }
    }
    if(isset($_SESSION["id"])) {
    header("Location:login.php");
    }
?>




<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>進入商城</title>
<style >
body {
  font-family: Arial, Helvetica, sans-serif; 
}

form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}


.container {
  padding: 16px;
  background-color: #FFFFFF;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body style="background-image: url(logins.jpg);background-size: contain  ; ">



<form action="" method="post">


  <div class="container">
    <center><h2>歡迎來到商城</h2></center>
    <label for="uname"><b>轉生者</b></label>
    <input type="text" placeholder="轉生者名字" name="uname" required>

    <label for="psw"><b>通行證</b></label>
    <input type="password" placeholder="你的通行證是???" name="psw" required>
        
    <button type="submit">轉生</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> 溝了會??
    </label>
  </div>

  
</form>

</body>
</html>
