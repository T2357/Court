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
 $EXP = $_POST['EXP'];
 $DETAIL = $_POST['DETAIL'];
 $JOB = $_POST['JOB'];
 $FEE = $_POST['FEE'];
 $EMAIL = $_POST['EMAIL'];
$query =  "INSERT INTO `profile` ( `NAME`, `MOBILE`, `ADDRESS`, `EXP`, `DETAIL`,`JOB`,`FEE`,`EMAIL`) VALUES ('$NAME', '$MOBILE', '$ADDRESS', '$EXP', '$DETAIL','$JOB','$FEE','$EMAIL')";
 $query1 = "UPDATE `profile` SET `NAME`= '$NAME',`MOBILE`= '$MOBILE',`ADDRESS`='$ADDRESS',`EXP`='$EXP', `DETAIL`='$DETAIL', `JOB`='$JOB', `FEE`='$FEE' , `EMAIL`='$EMAIL' WHERE `EMAIL` = '$EMAIL'";
 $sql1 = mysqli_query($con,$query);
 If($sql1){   
    echo "query is success";
 }
 else{
  $sql2 = mysqli_query($con,$query1);
  echo $query1;
  echo "query 2 is success";
 }
 header("location:dashboard.php");
?>