<?php
$conn = mysqli_connect("localhost", "root", "", "ISYS_HAQ");

session_start();

$user_check = $_SESSION['login_user'];

$query = "SELECT admin_user_id from haq_admin_user where admin_user_id='$user_check'";
$ses_sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['admin_user_id'];
?>
