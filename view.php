<?php
include 'connection.php';
session_start();
$from = $_GET['ID'];
$EMAIL = $_SESSION['EMAIL'];
$sql = "SELECT * FROM `advocate` WHERE `EMAIL` = '$EMAIL'";
$result = mysqli_query($con,$sql);
$num = mysqli_num_rows($result);
if($num> 0){
    $row= mysqli_fetch_assoc($result);
}
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
  <body>
<nav aria-label="breadcrumb">
        <ol class="breadcrumb py-2">
            <li class="breadcrumb-item">
                <a href="dashboard.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Invoice Management
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                View Invoice
            </li>
        </ol>
    </nav></div>
 

<h2 id="invo">Invoice</h2><br>
    <div class="container" id="invoices">
    <style>
        *{
            font-family: "Times New Roman", Times, serif;  
        }
        #invo{
            color:cornflowerblue;
            text-align:center;
            font-family: "Times New Roman", Times, serif;
            font-weight: bold;
            text-align:center;
        }
        body{
            background-color: #F6F6F6; 
            margin: 0;
            padding: 0;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 80%;
            margin-right: auto;
            margin-left: auto;
        }
        .brand-section{
           background-color: #0d1033;
           padding: 10px 40px;
        }
        .logo{
            width: 50%;
        }

        .row{
            display: flex;
            flex-wrap: wrap;
        }
        .col-6{
            width: 50%;
            flex: 0 0 auto;
        }
        .text-white{
            color: #fff;
        }
        .company-details{
            float: right;
            text-align: right;
        }
        .body-section{
            padding: 16px;
            border: 1px solid gray;
        }
        .heading{
            font-size: 20px;
            margin-bottom: 08px;
        }
        .sub-heading{
            color: #262626;
            margin-bottom: 05px;
        }
        table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px gray;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right{
            text-align: end;
        }
        .w-20{
            width: 20%;
        }
        .float-right{
            float: right;
        }
    </style>
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <h1 class="text-white"><?php echo $row[NAME]; ?></h1>
                </div>
                <div class="col-6">
                    <div class="company-details">
                        <p class="text-white"><?php echo $row[MOBILE]; ?></p>
                        <p class="text-white"><?php echo $row[EMAIL]; ?></p>
                        
                    </div>
                </div>
            </div>
        </div>
        <?php
$sql2 = "SELECT * FROM `invoice` WHERE INVOICE_NO = $from";
$result2 = mysqli_query($con,$sql2);
$num2 = mysqli_num_rows($result2);
if($num2> 0){
    $row2= mysqli_fetch_assoc($result2);
}
 ?>
        <div class="body-section">
            <div class="row">
                <div class="col-6">
                    <h2 class="heading">Invoice No:<?php echo $row2[INVOICE_NO]; ?></h2>
                    <h2 class="heading">Case No:<?php echo $row2[CASE_NO]; ?></h2>
                    <p class="sub-heading">Date:<?php echo $row2[DATE]; ?> </p>
                </div>
                <div class="col-6">
                    <p class="sub-heading">Client Name:<?php echo $row2[C_NAME]; ?> </p>
                    <p class="sub-heading">Client Address:<?php echo $row2[C_ADD]; ?>  </p>
                    <p class="sub-heading">Phone Number:<?php echo $row2[C_NO]; ?> </p>
                    <p class="sub-heading">City's Pincode:<?php echo $row2[CITY]; ?>  </p>
                </div>
            </div>
        </div>

        <div class="body-section">
            <h3 class="heading"></h3>
            <br>
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th>Service/Case Details</th>
                        <th class="w-20">Date</th>
                        <th class="w-20">Charges</th>
                        <th class="w-20">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $row2[SERVICE]; ?> </td>
                        <td><?php echo $row2[S_DATE]; ?> </td>
                        <td><?php echo $row2[RATE]; ?> </td>
                        <td><?php echo $row2[TOTAL]; ?> </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Tax(GST-18%)</td>
                        <td><?php echo $row2[GST]; ?></td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Grand Total</td>
                        <td><?php echo $row2[AMOUNT]; ?></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <h3 class="heading">Payment Status: <?php echo $row2[STATUS]; ?></h3>
        </div>
    </div> 
    <p align="center"><input type="button" onclick="myPrint('invoices')" value="Print Invoice"></p>
    <script>
        function myPrint(invoices) {
            var printdata = document.getElementById(invoices);
            newwin = window.open("invoices");
            newwin.document.write(printdata.outerHTML);
            newwin.print();
            newwin.close();
        }
    </script>
    <a href="invoice.php"><button type="submit" class="btn btn-primary">Back To Invoice</button></a>