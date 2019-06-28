<?php
if(isset($_POST['deleteReport'])){
  $deleteFile = $_POST['deleteReport'];
  $conn = mysqli_connect("localhost","root","bulgogi123","ISYS_HAQ");

  $query = "Drop table `$deleteFile`;";
  $conn->query($query);

  $query = "Delete from haq_report_count Where Name='$deleteFile' limit 1;";
  $conn->query($query);
}

header("Location: upload.php");
?>
