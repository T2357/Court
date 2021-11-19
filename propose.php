<?php 
session_start();
$EMAIL = $_SESSION['EMAIL'];
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
 $fr = $_GET['ID'];
 $query1 = "UPDATE `proposition` SET  `EMAILID`= '$fr' WHERE `proposition`.`EMAIL` = '$EMAIL'";
 $sql1 = mysqli_query($con,$query1);
 If($sql1){
     echo "<h1>Succesfully Proposed Case</h1>";

 }
 else{
   echo $query1;
 }
 
?>