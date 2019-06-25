<?php
  $username = $_POST['username'];
  $password = $_POST['password'];

  $username = stripcslashes($username);
  $password = stripcslashes($password);

  mysqli_connect("localhost", "root", "");
  mysql_select_db("ISYS_HAQ");

  $result = mysql_query("SELECT admin_user_id, admin_password from haq_admin_user where admin_user_id='$username' AND admin_password='$password'")
            or die("Failed to query database ".mysql_error());
  $row = mysql_fetch_array($result);
  if($row['admin_user_id'] == $username && $row['admin_password'] == $password){
    echo "Login Success, welcome ".$row['username'];
  }else{
    echo "Failed to login";
  }

?>
