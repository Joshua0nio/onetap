<?php
session_start();
if (!isset($_COOKIE['user_id'])) {
  header("location:index.php");
  die();
}
$_SESSION['user_id'] = $_COOKIE['user_id'];


?>
<?php
include('db.php');
$id = $_SESSION['user_id'];
$conn = mysqli_connect("sql312.epizy.com", "epiz_32045753", "HsJBYjdevR3ic", "epiz_32045753_onetap_db");

if (isset($_FILES["webcam"]["tmp_name"])) {
  $tmpName = $_FILES["webcam"]["tmp_name"];
  $imageName = date("Y.m.d") . " - " . date("h.i.sa") . ' .jpeg';
  move_uploaded_file($tmpName, 'responder/img/' . $imageName);

  $date = date("Y/m/d") . " & " . date("h:i:sa");
  $query = "INSERT INTO images VALUES('','$id','$date','$imageName')";
  mysqli_query($conn, $query);
}
?>