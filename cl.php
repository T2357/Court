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
$PASSWORD = $_POST['PASSWORD'];
$EMAIL = $_POST['EMAIL'];


$query1 ="INSERT INTO `client` ( `NAME`, `PASSWORD`, `EMAIL`) VALUES ( '$NAME', '$PASSWORD', '$EMAIL')";

$sql=mysqli_query($con,$query1);

header('location:create.php');

?>
