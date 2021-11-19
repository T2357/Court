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
 $ADDRESS = $_POST['ADDRESS'];
 $TITLE = $_POST['TITLE'];
 $DETAIL = $_POST['DETAIL'];
 $SOL = $_POST['SOL'];
 $EMAIL = $_POST['EMAIL'];

 $query = "INSERT INTO `proposition`(`NAME`, `MOBILE`, `ADDRESS`, `TITLE`, `DETAIL`, `SOL`, `EMAIL`) VALUES ('$NAME','$MOBILE','$ADDRESS','$TITLE','$DETAIL','$SOL','$EMAIL')";
 $query1 = "UPDATE `proposition` SET `NAME`= '$NAME',`MOBILE`= '$MOBILE',`ADDRESS`='$ADDRESS', `DETAIL`='$DETAIL', `SOL`='$SOL',  `EMAIL`='$EMAIL' WHERE `EMAIL` = '$EMAIL'";
 $sql1 = mysqli_query($con,$query);
 If($sql1){
     echo "Success";
 }
 else{
    $sql2 = mysqli_query($con,$query1);
     echo "Please check your Email Id and Case Number";
 header("location:client_dash.php");
 }
?>