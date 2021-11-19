<?php
session_start();
$EMAIL = $_SESSION['EMAIL'];
 ?>
<DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Court Case Management</title>
    <link rel="stylesheet" type="text/css" href="feature.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="Dashboard.css">
  </head>

<body style="background-color:whitesmoke">
  <style>
    label {
      color: blueviolet;
      font-weight: bold;
      padding: 4px;
      text-transform: uppercase;
      
    }

    h3 {
      color: blueviolet;
    }
    td {
  padding: 5px;
}
    p {
      color: blueviolet;
    }
    </style>
<?php include 'connection.php';?>
<nav aria-label="breadcrumb">
        <ol class="breadcrumb py-2">
            <li class="breadcrumb-item">
                <a href="dashboard.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Notes Management
            </li>
        </ol>
    </nav>
<div class="w3-sidebar w3-bar-block w3-card" style="width:20%; height:56%; right:0; background-color:whitesmoke">
  <h3 class="w3-bar-item" ">Features</h3>
  <ul style="color:#AF002A;">
     <li>
       <a href="case.php"><span><img src="https://img.icons8.com/office/30/000000/law.png"/></span>
         <span>Case Management</span></a>
     </li><br>
   <li>
    <a href="doc.php"><span> <img src="https://img.icons8.com/external-vitaliy-gorbachev-blue-vitaly-gorbachev/30/000000/external-document-business-vitaliy-gorbachev-blue-vitaly-gorbachev-4.png"/></span>
     <span>Document Management</span></a>
  </li>
   <br>
  <li>
   <a href="hearing.php"><span><img src="https://img.icons8.com/doodle/30/000000/court.png"/></span>
    <span>Hearing Dates</span></a>
  </li>
<br>
<li>
   <a href="customer.php"><span><img src="https://img.icons8.com/material-rounded/24/000000/gender-neutral-user.png"/></span>
    <span>Client Management</span></a>
  </li>
  <br>
  <li>
   <a href="invoice.php"><span> <img src="https://img.icons8.com/material-two-tone/30/000000/bill-copy.png"/></span>
    <span>Invoice Management</span></a>
  </li>
<br>
  <li>
  <a href="notes.php"><img src="https://img.icons8.com/doodle/30/000000/apple-notes.png"/></span>
    <span>Notes Management</span></a>
  </li><br>
  <li>
   <a href="task.php"><span> <img src="https://img.icons8.com/external-justicon-flat-justicon/30/000000/external-to-do-list-working-from-home-justicon-flat-justicon.png"/></span>
    <span>Task Management</span></a>
  </li>
 </ul>
</div>
<div id="ads" class="container">
     <legend> <h3><b>Add Notes</h3></legend>
      <form action="create_notes.php" method="POST">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="input">Select Case</label>
            <select name="CASES" class="form-control" required>
                <option value="" disabled selected>Choose</option>
                <?php
                include 'connection.php';
                $sql = "SELECT * FROM `case_info` where `EMAIL`='$EMAIL'";
                $result=mysqli_query($con,$sql);
                if(!$result)
                {
                    echo $sql;
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['CASE_NO'];?>">

                    <?php echo $rows['CASE_NO'] ;?> 
                    <?php echo $rows['TYPE'] ;?> 
                    <?php echo $rows['DETAIL'] ;?> 

                </option>
                <?php
                }
            ?>
                <div>
            </select>
          </div><?php
$sql2 = "SELECT * FROM `case_info` WHERE `EMAIL` = '$EMAIL'";
$result2 = mysqli_query($con,$sql2);
$num2 = mysqli_num_rows($result2);
if($num2> 0){
    $row2= mysqli_fetch_assoc($result2);
}
 ?>
          <div class="form-group col-md-6">
            <label for="input">Heading</label>
            <input type="text" class="form-control" id="inputPassword4" placeholder="GIVE A TITLE" name="TITLE">
          </div>
       
       <div class="form-group col-md-12">
          <label for="input">Description</label>
          <input type="text" class="form-control" id="inputAddress" placeholder="WRITE YOUR NOTE" name="DETAIL">
        </div>
        <div class="form-group col-md-4">
          <label for="input">Your Email ID to confirm</label>
          <input type="text" class="form-control" value="<?php echo $row2[EMAIL]; ?>" name="EMAIL">
        </div>
        </div>
        <button type="submit" class="btn btn-primary">ADD</button>
      </form>
    </div>
    <?php
$sql3 = "SELECT * FROM `notes` WHERE `EMAIL`='$EMAIL' ";
$result3 = mysqli_query($con,$sql3);
$num3 = mysqli_num_rows($result3);
if($num3> 0){
    
 ?>
 <table id="mytable"  style="background-color:whitesmoke;color:blueviolet; border: 3px solid  #1273;">

<tr style="border: 3px solid  #1273;">

  <td style="border: 1px   #1273;"><b>Case Number</b></td>
  <td style="border: 1px   #1273;"><b>Title</b></td>
  <td style="border: 1px   #1273;"><b> Description</b> </td>
  <td style="border: 1px  #1273;"><b>Delete Note</b> </td>
</tr>
<?php
$i=0;
while($row3 = mysqli_fetch_array($result3)) {
?>
<tr style="color:cornflowerblue;">

  <td style="border: 1px  #1273;font-size:20px;"><b><?php echo $row3["CASES"]; ?></b></td>
  <td style="border: 1px  #1273;font-size:20px;"><b><?php echo $row3["TITLE"]; ?></b></td>
  <td style="border: 1px  #1273;font-size:20px;"><b><?php echo $row3["DETAIL"]; ?></b></td>
  <td style="border: 1px  #1273;font-size:20px;"><b> <a href="delete_notes.php?ID= <?php echo $row3['CASES'] ;?>"><p>Click Here</p></a></b></td>
</tr>
<?php
$i++;
}
?>
</table>
<?php
}
else{
  echo "No result found";
}
?>
</div>
        <div class="body-section">
            <div class="row">
                <div class="col-6">
                    <h3 class="heading"><?php echo $row3[CASES]; ?></h3>
                    <h3 class="heading">:<?php echo $row3[TITLE]; ?></h3>
                    <h3 class="sub-heading">:<?php echo $row3[DETAIL]; ?> </h3>
                    <a href="delete.php?ID= <?php echo $row3['CASES'] ;?>"><p></p></a>
                </div>
            </div>
        </div> 
    
    <?php include 'footer.php';?>  
</body>
</html>