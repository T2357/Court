<?php
session_start();
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
$sql = "SELECT * FROM files";
$result = mysqli_query($con, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_POST['save'])) { // if save button on the form is clicked
  // name of the uploaded file
  $filename = $_FILES['myfile']['name'];

  // destination of the file on the server
  $destination = 'uploads/' . $filename;

  // get the file extension
  $extension = pathinfo($filename, PATHINFO_EXTENSION);

  // the physical file on a temporary uploads directory on the server
  $file = $_FILES['myfile']['tmp_name'];
  $size = $_FILES['myfile']['size'];
  $EMAIL = $_POST["EMAIL"];

  if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
      echo "You file extension must be .zip, .pdf or .docx";
  } elseif ($_FILES['myfile']['size'] > 10000000) { // file shouldn't be larger than 1Megabyte
      echo "File too large!";
  } else {
      // move the uploaded (temporary) file to the specified destination
      if (move_uploaded_file($file, $destination)) {
          $sql2 = "INSERT INTO files (`name`, size, downloads,`EMAIL`) VALUES ('$filename', '$size', 0,'$EMAIL')";
          if (mysqli_query($con, $sql2)) {
            header("location:doc.php");
          }
      } else {
          echo "Check File Size.";
      }
  }
}
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM files WHERE id=$id";
    $result = mysqli_query($con, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['name']));
        readfile('uploads/' . $file['name']);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($con, $updateQuery);
        exit;
    }

}
?>