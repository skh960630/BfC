<?php
session_start();
if(isset($_POST['loginbutton'])){
  $connection = new mysqli("localhost", "root", "bulgogi123", "ISYS_HAQ") or die ("Cannot connect tot he database");
  $username = $_POST['username'];
  $password = $_POST['password'];

  $data = $connection -> query("SELECT admin_user_id, admin_password from haq_admin_user where admin_user_id='$username' AND admin_password='$password'");
  $data = $data->fetch_assoc();
  if($data['admin_user_id'] == $username && $data['admin_password'] == $password){
    $_SESSION['login_user'] = $username;
    header("Location: index.php");
  }else{
    header("Location: loginpage.php");
  }
}

?>
