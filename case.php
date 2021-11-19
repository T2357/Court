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
      color: #AF002A;
      font-weight: bold;
      padding: 4px;
      text-transform: uppercase;
      font-family: Verdana;
    }

    h3 {
      color: #AF002A;
    }
    td {
  padding: 5px;
}
    p {
      color: #AF002A;
    }
    </style>
<?php include 'connection.php';?>
<nav aria-label="breadcrumb">
        <ol class="breadcrumb py-2">
            <li class="breadcrumb-item">
                <a href="dashboard.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Case Management
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
     <legend> <h3>Add a New Case</h3></legend>
      <form action="case_submit.php" method="POST">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="input">Case Number</label>
            <input type="number" class="form-control" id="input" placeholder="Case Number" name="CASE_NO">
          </div>
          <div class="form-group col-md-6">
            <label for="input">Type of Case</label>
            <input type="text" class="form-control" id="input" placeholder="Civil/Criminal/Other" name="TYPE">
          </div>
       
       <div class="form-group col-md-12">
          <label for="input">Details of Case</label>
          <input type="text" class="form-control" id="inputAddress" placeholder="Details related to case" name="DETAIL">
        </div>
       <div class="form-group col-md-4">
          <label for="input">Current Hearing Date</label>
          <input type="date" class="form-control" placeholder="Current Hearing Date" name="C_DATE">
        </div>
       <div class="form-group col-md-4">
          <label for="input">Next Hearing Date</label>
          <input type="date" class="form-control" placeholder="Next Hearing Date" name="N_DATE">
        </div>
       <div class="form-group col-md-4">
          <label for="input">ACT</label>
          <input type="varchar" class="form-control" placeholder="Which all Act can be Applied" name="ACT">
        </div>
       <div class="form-group col-md-4">
          <label for="input">Filing Number</label>
          <input type="numeric" class="form-control" placeholder="Filing Number" name="FIL">
        </div>
       <div class="form-group col-md-4">
          <label for="input">Filing Date</label>
          <input type="date" class="form-control" name="FILD">
        </div>
       <div class="form-group col-md-4">
          <label for="input">Registration Number</label>
          <input type="varchar" class="form-control" placeholder="Registration Number" name="REG">
        </div>
       <div class="form-group col-md-4">
          <label for="input">Police Station</label>
          <input type="varchar" class="form-control" placeholder="Police Station Name" name="POLICE">
        </div>
       <div class="form-group col-md-4">
          <label for="input">FIR Number</label>
          <input type="numberic" class="form-control" placeholder="FIR Number" name="FIR">
        </div>
       <div class="form-group col-md-6">
          <label for="input">STATUS</label>
          <input type="varchar" class="form-control" placeholder="OPEN/CLOSE" name="STATUS">
        </div>
       <div class="form-group col-md-4">
          <label for="input">Your Email ID to confirm</label>
          <input type="varchar" class="form-control" placeholder="Registered Email ID" name="EMAIL" value="<?php echo $EMAIL; ?>">
        </div>
        <button type="submit" class="btn btn-primary">ADD</button>
      </form>
    </div>
    <br>
  <div style="color:darkblue">
    <h1><b>View Cases</h1>
  <?php
  $sql = "SELECT * FROM `case_info` WHERE EMAIL = '$EMAIL'";
  $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result) > 0) {
 ?>
 
      <table id="mytable"  style="background-color:whitesmoke;color:blueviolet; border: 3px solid  #1273;">

      <tr style="border: 3px solid  #1273;">

        <td style="border: 3px solid  #1273;"><b> Case No.</b></td>
        <td style="border: 3px solid  #1273;"><b>Type</b></td>
        <td style="border: 3px solid  #1273; text-align:center; font-size:25px"><b> Case Details</b> </td>
        <td style="border: 3px solid  #1273;"><b> Current Hearing Date</b> </td>
        <td style="border: 3px solid  #1273;"><b> Next Hearing Date</b> </td>
        <td style="border: 3px solid  #1273;"><b> ACT</b> </td>
        <td style="border: 3px solid  #1273;"><b> Filing Numer</b> </td>
        <td style="border: 3px solid  #1273;"><b> Filing Date</b> </td>
        <td style="border: 3px solid  #1273;"><b> Registration Number</b> </td>
        <td style="border: 3px solid  #1273;"><b> Police Station</b> </td>
        <td style="border: 3px solid  #1273;"><b> FIR Number</b> </td>
        <td style="border: 3px solid  #1273;"><b> Status of Case</b> </td>
        <td style="border: 3px solid  #1273;"><b> Edit Case</b> </td>
      </tr>
    <?php
    $i=0;
    while($row = mysqli_fetch_array($result)) {
    ?>
    <tr style="color:cornflowerblue;">

        <td style="border: 3px solid  #1273;font-size:20px;"><b><?php echo $row["CASE_NO"]; ?></b></td>
        <td style="border: 3px solid  #1273;font-size:20px;"><b><?php echo $row["TYPE"]; ?></b></td>
        <td style="border: 3px solid  #1273;font-size:20px;"><b><?php echo $row["DETAIL"]; ?></b></td>
        <td style="border: 3px solid  #1273;font-size:20px;"><b><?php echo $row["C_DATE"]; ?></b></td>
        <td style="border: 3px solid  #1273;font-size:20px;"><b><?php echo $row["N_DATE"]; ?></b></td>
        <td style="border: 3px solid  #1273;font-size:20px;"><b><?php echo $row["ACT"]; ?></b></td>
        <td style="border: 3px solid  #1273;font-size:20px;"><b><?php echo $row["FIL"]; ?></b></td>
        <td style="border: 3px solid  #1273;font-size:20px;"><b><?php echo $row["FILD"]; ?></b></td>
        <td style="border: 3px solid  #1273;font-size:20px;"><b><?php echo $row["REG"]; ?></b></td>
        <td style="border: 3px solid  #1273;font-size:20px;"><b><?php echo $row["POLICE"]; ?></b></td>
        <td style="border: 3px solid  #1273;font-size:20px;"><b><?php echo $row["FIR"]; ?></b></td>
        <td style="border: 3px solid  #1273;font-size:20px;"><b><?php echo $row["STATUS"]; ?></b></td>
        <td style="border: 3px solid  #1273;font-size:20px;"><b><a href="edit.php?ID= <?php echo $row['CASE_NO'] ;?>">EDIT</a></b></td>
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
  </div> <br>
  <?php include 'footer.php';?>
</body>

  </html>