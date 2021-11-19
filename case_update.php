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

 $CASE_NO = $_POST['CASE_NO'];
 $TYPE   = $_POST['TYPE'];
 $DETAIL = $_POST['DETAIL'];
 $C_DATE = $_POST['C_DATE'];
 $N_DATE = $_POST['N_DATE'];
 $ACT = $_POST['ACT'];
 $FIL = $_POST['FIL'];
 $FILD = $_POST['FILD'];
 $REG = $_POST['REG'];
 $POLICE = $_POST['POLICE'];
 $FIR = $_POST['FIR'];
 $STATUS = $_POST['STATUS'];
 $EMAIL = $_POST['EMAIL'];

 $query1 = "UPDATE `case_info` SET `CASE_NO`= '$CASE_NO',`TYPE`= '$TYPE',`DETAIL`='$DETAIL',`C_DATE`='$C_DATE',`N_DATE`='$N_DATE',`ACT`='$ACT',`FIL`='$FIL',`FILD`='$FILD',`REG`='$REG',`POLICE`='$POLICE',`FIR`='$FIR',`STATUS`='$STATUS',`EMAIL`='$EMAIL' WHERE `CASE_NO` = '$CASE_NO'";
 $sql1 = mysqli_query($con,$query1);
 If($sql1){
     echo "Success";
 }
 else{
     echo "Fail";
     echo "Select your correct Registered Email ID & Case Number ";
     echo $query1;
 }
 header("location:case.php");
?>