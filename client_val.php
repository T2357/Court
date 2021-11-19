<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "12345678";
$db_name = "court";
// Create connection
$con = mysqli_connect($servername, $username, $password, $db_name);

if($con){
  echo "connection successful";
}else {
  echo "no connection";
}

mysqli_select_db($con,'court');

$EMAIL = $_POST["EMAIL"];
$PASSWORD = $_POST["PASSWORD"];

$query="SELECT * FROM `client` WHERE `EMAIL`='$EMAIL' && `PASSWORD`='$PASSWORD'";
$result = mysqli_query($con,$query);
$num = mysqli_num_rows($result);
if($num==1){
  $_SESSION['EMAIL'] = $EMAIL;
  header("location:client_dash.php");
}
else{
  echo mysqli_error($con);
  echo "<br>login fail";
  
}
?>
