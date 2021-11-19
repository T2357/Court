<?php
include 'connection.php';
session_start();
$EMAIL = $_SESSION['EMAIL'];
?>
                <?php
$sql2 = "SELECT * FROM `proposition` WHERE `EMAIL` = '$EMAIL'";
$result2 = mysqli_query($con,$sql2);
$num2 = mysqli_num_rows($result2);
if($num2> 0){
    $row2= mysqli_fetch_assoc($result2);
}
 ?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
  <title>Dashboard</title>
  <link rel="stylesheet" type="text/css" href="feature.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
</head>
  <div class="main-content">
    <header style="background-color:whitesmoke;">
      <h2 style="color: #AF002A;">
        <label for="nav-toggle">
          <span class="las la-bars"></span>
        </label>
        Dashboard
      </h2>
      <div class="user-wrapper">
        <img src="images/law10.jpg" width="40px" height="40px" alt="">
        <div>
          <h4 class="text-right" style="font-size:20px; color:blue"> Welcome User
            <?php echo $_SESSION['EMAIL']; ?>
          </h4>
          <p><a href="logout.php">Logout</a></p>
        </div>
      </div>
    </header>
  <body>
  <style>
    *{
      background-color:whitesmoke;
    }
     label {
      color: #AF002A;
      font-weight: bold;
      padding: 4px;
      text-transform: uppercase;
      font-family: Verdana;
    }

    h3 {
      color: #AF002A;
      font-size:30px;
    }
    td {
  padding: 0px;
}
    p {
      color: #AF002A;
    }
  </style>
<div class="w3-sidebar w3-bar-block w3-card" style="width:15%; height:25%; right:2; background-color:whitesmoke">
  <h3 class="w3-bar-item" ">Features</h3>
  <ul style="color:#AF002A;">
     <li>
       <a href="lawyer.php"><span><img src="images/law8.png" width="30px"></span>
         <span>View Lawyers</span></a>
     </li><br>
   <li>
    <a  href="#proposition"><span> <img src="images/law9.png" width="30px"></span>
     <span>Propsotions</span></a>
  </li>
  

 </ul>
 </div>
<div class="container">
        <div class="col-md-5">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="text-right">Create a Proposition</h3>
                </div>
                <form  id="proposition" action="prop.php" method="POST">
                    <div class="col-md-12"><label class="labels" style="font-size:20px;">Full Name</label><input type="text" class="form-control" name="NAME"
                            placeholder="Full Name" value="<?php echo $row2[NAME]; ?>" >
                        </div>
               
                    <div class="col-md-12">
                        <label class="labels" style="font-size:20px;">Mobile Number</label><input type="text"
                            class="form-control" name="MOBILE" placeholder="enter phone number" value="<?php echo $row2[MOBILE]; ?>">
                        </div>
                    <div class="col-md-12">
                        <label class="labels" style="font-size:20px;">Address </label><input type="text"
                            class="form-control" name="ADDRESS" placeholder="enter address" value="<?php echo $row2[ADDRESS]; ?>" >
                        </div>
                    
                    <div class="col-md-12">
                    <label class="labels" style="font-size:20px;">Title </label><input type="text"
                            class="form-control" name="TITLE" placeholder="Title of Proposition"  value="<?php echo $row2[TITLE]; ?>">
                        </div>
                    <div class="col-md-12">
                        <label class="labels" style="font-size:20px;">DETAIL</label><input type="text" class="form-control" name="DETAIL"  placeholder="Tell us about your case"  value="<?php echo $row2[DETAIL]; ?>">
                        </div>
                    <div class="col-md-12">
                        <label class="labels" style="font-size:20px;">Resoultion</label><input type="text" class="form-control" name="SOL"
                            placeholder="How do you wish to resolve the case" value="<?php echo $row2[SOL]; ?>" >
                        </div>
    
                    <div class="col-md-12">
                        <label class="labels" style="font-size:20px;">Email ID to confirm</label><input type="text" class="form-control" name="EMAIL" placeholder="Registred EMAIL ID" value="<?php echo $row2[EMAIL]; ?>">
                    </div>
                <div class="mt-5 text-center"><button class="btn btn-primary" type="submit">Save
                        Proposition</button>
                    </div>
                </form>    
            </div>
        </div>
</div>
</div>
</div>
<style>
    body {
        background: whitesmoke;
        font-size:20px;
    }
label{
    font-size:25px;
}
    .form-control: {
        box-shadow: none;
        border-color: #BA68C8;
        font-size:20px;
    }

    .profile-button {
        background: rgb(99, 39, 120);
        box-shadow: none;
        border: none;
    }

    .profile-button:hover {
        background: #682773;
    }

    .profile-button:focus {
        background: #682773;
        box-shadow: none;
    }

    .profile-button:active {
        background: #682773;
        box-shadow: none;
    }

    .back:hover {
        color: #682773;
        cursor: pointer;
    }

    .labels {
        font-size: 11px;
    }

</style>
  </div>
</body>

</html>