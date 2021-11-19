<?php
include 'connection.php';
session_start();
$EMAIL = $_SESSION['EMAIL'];
$a =0;
$b =$a++;
?>
<?php
$sql2 = "SELECT * FROM `profile` WHERE `EMAIL` = '$EMAIL'";
$result2 = mysqli_query($con,$sql2);
$num2 = mysqli_num_rows($result2);
if($num2> 0){
    $row2= mysqli_fetch_assoc($result2);
}
 ?>
<div class="container">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-3"
                    width="100px" src="images/profile.jpg"><span class="font-weight-bold"></span><span
                    class="text-black-50" </span><span>
                    </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="text-right">Profile(Displayed to Client's)</h3>
                </div>
                <form action="profile_submit.php" method="POST">
                    <div class="col-md-12"><label class="labels" style="font-size:20px;">Full Name</label><input
                            type="text" class="form-control" name="NAME" placeholder="Full Name"
                            value="<?php echo $row2[NAME]; ?>">
                    </div>

                    <div class="col-md-12">
                        <label class="labels" style="font-size:20px;">Mobile Number</label><input type="text"
                            class="form-control" name="MOBILE" placeholder="enter phone number"
                            value="<?php echo $row2[MOBILE]; ?>">
                    </div>
                    <div class="col-md-12">
                        <label class="labels" style="font-size:20px;">Address Line </label><input type="text"
                            class="form-control" name="ADDRESS" placeholder="enter address"
                            value="<?php echo $row2[ADDRESS]; ?>">
                    </div>

                    <div class="col-md-12">
                        <label class="labels" style="font-size:20px;">Experience</label><input type="text"
                            class="form-control" name="EXP" placeholder="Enter your Experience (in Years)"
                            value="<?php echo $row2[EXP]; ?>">
                    </div>
                    <div class="col-md-12">
                        <label class="labels" style="font-size:20px;">DETAIL</label><input type="text"
                            class="form-control" name="DETAIL" placeholder="Tell us about your Yourself/Firm"
                            value="<?php echo $row2[DETAIL]; ?>">
                    </div>
                    <div class="col-md-12">
                        <label class="labels" style="font-size:20px;">JOB Type</label><input type="text"
                            class="form-control" name="JOB"
                            placeholder="Work Profile , what kind of work you speciliase in"
                            value="<?php echo $row2[JOB]; ?>">
                    </div>
                    <div class="col-md-12">
                        <label class="labels" style="font-size:20px;">FEE</label><input type="text" class="form-control"
                            name="FEE" placeholder="Your Consultancy FEEs" value="<?php echo $row2[FEE]; ?>">
                    </div>
                    <div class="col-md-12">
                        <label class="labels" style="font-size:20px;">Email ID</label><input type="text"
                            class="form-control" name="EMAIL" placeholder="Registred EMAIL ID"
                            value="<?php echo $row2[EMAIL]; ?>">
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary" type="submit">Save
                            Profile</button>
                    </div>
                </form>
            </div>
        </div>
        <div><br>
            <h3 style="align:center;">View your Propositions</h3>
            <?php
            $sql3 = "SELECT * FROM `proposition` WHERE `EMAILID`='$EMAIL' ";
            $result3 = mysqli_query($con,$sql3);
            $num3 = mysqli_num_rows($result3);
            if($num3> 0){
    
            ?>
            <table id="mytable" style="background-color:whitesmoke;color:blueviolet; border: 3px solid  #1273;">

                <tr style="border: 3px solid  #1273;">
                    <td style="border: 1px   #1273;"><b>S No.</b></td>
                    <td style="border: 1px   #1273;"><b>Cleint Name</b></td>
                    <td style="border: 1px   #1273;"><b> Mobile</b></td>
                    <td style="border: 1px   #1273;"><b> Address</b></td>
                    <td style="border: 1px   #1273;"><b>Case Title</b></td>
                    <td style="border: 1px   #1273;"><b> Description</b> </td>
                    <td style="border: 1px  #1273;"><b>Expected Solution</b> </td>
                </tr>
                <?php
                  $i=0;
                  while($row3 = mysqli_fetch_array($result3)) {
                ?>
                <tr style="color:cornflowerblue;">

                    <td style="border: 1px  #1273;font-size:20px;"><b>
                            <?php echo $a ?>
                        </b></td>
                    <td style="border: 1px  #1273;font-size:20px;"><b>
                            <?php echo $row3["NAME"]; ?>
                        </b></td>
                    <td style="border: 1px  #1273;font-size:20px;"><b>
                            <?php echo $row3["MOBILE"]; ?>
                        </b></td>
                    <td style="border: 1px  #1273;font-size:20px;"><b>
                            <?php echo $row3["ADDRESS"]; ?>
                        </b></td>
                    <td style="border: 1px  #1273;font-size:20px;"><b>
                            <?php echo $row3["TITLE"]; ?>
                        </b></td>
                    <td style="border: 1px  #1273;font-size:20px;"><b>
                            <?php echo $row3["DETAIL"]; ?>
                        </b></td>
                    <td style="border: 1px  #1273;font-size:20px;"><b>
                            <?php echo $row3["SOL"]; ?>
                        </b></td>           
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
    </div>
</div>
</div>
</div>
</div>
<style>
    body {
        background: whitesmoke;
        font-size: 20px;
    }

    label {
        font-size: 25px;
    }

    .form-control: {
        box-shadow: none;
        border-color: #BA68C8;
        font-size: 20px;
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