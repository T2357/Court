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

 $query1 = "INSERT INTO `case_info` ( `CASE_NO`, `TYPE`, `DETAIL`, `C_DATE`, `N_DATE`,`ACT`,`FIL`,`FILD`,`REG`,`POLICE`,`FIR`, `STATUS`, `EMAIL`) VALUES ('$CASE_NO', '$TYPE', '$DETAIL', '$C_DATE', '$N_DATE','$ACT','$FIL','$FILD','$REG','$POLICE','$FIR', '$STATUS', '$EMAIL')";
 $sql1 = mysqli_query($con,$query1);
 If($sql1){
     echo "Success";
 }
 else{
     echo "Fail";
     echo "Select your correct Registered Email ID & Case Number ";
 }
 header("location:case.php");
?>