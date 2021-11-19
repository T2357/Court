<?php
session_start();
$EMAIL = $_SESSION['EMAIL'];
require_once "db.php";

$title = isset($_POST['title']) ? $_POST['title'] : "";
$start = isset($_POST['start']) ? $_POST['start'] : "";
$end = isset($_POST['end']) ? $_POST['end'] : "";
$EMAIL = isset($_POST['EMAIL']) ? $_POST['EMAIL'] : "";
$sqlInsert = "INSERT INTO tbl_events (title,start,end,EMAIL) VALUES ('".$title."','".$start."','".$end ."','".$EMAIL ."')";

$result = mysqli_query($conn, $sqlInsert);

if (! $result) {
    $result = mysqli_error($conn);
}
?>