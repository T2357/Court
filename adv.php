<?php
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
$NAME = $_POST['NAME'];
$MOBILE = $_POST['MOBILE'];
$EMAIL = $_POST['EMAIL'];


$query1 ="INSERT INTO `advocate` ( `NAME`, `MOBILE`, `EMAIL`) VALUES ( '$NAME', '$MOBILE', '$EMAIL')";

$sql=mysqli_query($con,$query1);

header('location:create.php');

?>
