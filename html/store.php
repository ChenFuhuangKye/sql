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
    <title>老闆家</title>
    <style >
    </style>
  </head>
  <body style="background-image: url(login2.jpg);background-size: cover  ;background-repeat: no-repeat; ">
  <div class="container"> 
  按按看 <a href="logout.php" tite="Logout">回大廳</a><br>
  按按看 <a href="index.php" tite="Back">回商城</a><br>

<?php
//connect to databse
$con = mysqli_connect("localhost","root","rootroot","user_db");
if (mysqli_connect_errno($con)){
  echo "連接資料庫失敗" . mysqli_connect_errno();
}

$select_id = $_REQUEST[ 'id' ];
//filter  
$filter = "/&&/is";


if ( preg_match($filter,$select_id) ){ 
  echo"<center><h1>COMMAND REFUSE</h1></center>";
}else{                      


  $query  = "SELECT * FROM item WHERE id = '$select_id';" ;
  $result = mysqli_query($con, $query );

  if($result){  
      // Get results
      
    while( $row = mysqli_fetch_assoc( $result ) ) {
      // Get values
  
      $name    = $row["name"];
      $attack  = $row["attack"];
      $defense = $row["defense"];

      // Feedback for end user
      echo "<center><h2>ID: {$select_id} 武器名稱 {$name} 攻擊 {$attack} 防禦 {$defense}</h2></center>";

    }//end while

    if(mysqli_num_rows($result) == 0){
        echo "<center><h1>WEAPON_ID NOT FOUND</h1></center>";
      }
  
  }


}

mysqli_close($con);

?>

    
  



</div>
  </body>
</html>

