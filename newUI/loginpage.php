<?php
// session_start();
// $error = '';
//
// if(isset($_POST['loginbutton'])){
//   if(empty($_POST['username']) || empty($_POST['password'])){
//     $error = "Username or Password is invalid";
//   }else{
//     $username = $_POST('username');
//     $password = $_POST('password');
//
//     $conn = mysqli_connect("localhost", "root", "", "ISYS_HAQ");
//     $query = "SELECT admin_user_id, admin_password from haq_admin_user where admin_user_id=? AND admin_password=? LIMIT 1";
//
//     $stmt = $conn->prepare($query);
//     $stmt->bind_param("ss", $username, $password);
//     $stmt->execute();
//     $stmt->bind_result($username, $password);
//     $stmt->store_result();
//
//     if($stmt->fetch()){
//       $_SESSION['login_user'] = $username;
//       header("location: profile.php");
//     }else{
//       $error = "Username or Password is invalid";
//     }
//     mysqli_close($conn);
//   }
// }
?>

<html>
<head>
  <script type="text/javascript" src="javascript/jquery-3.3.1.js" ></script>
  <link href="stylesheet/headstyle.css" rel="stylesheet" type="text/css">
  <link href="stylesheet/mainstyle.css" rel="stylesheet" type="text/css">
  <link href="stylesheet/loginstyle.css" rel="stylesheet" type="text/css">
  <link href="stylesheet/footstyle.css" rel="stylesheet" type="text/css">
  <script>
  $(function(){
    $("#header").load("header.php");
    $("#footer").load("footer.php");
  });
  </script>
</head>
<body>
  <div id="header"></div>
  <div class="midbackground" style="display:inline-block;">
    <hr></hr>
    <form action = "loginprocess.php" method="POST">
      <center><h3>Staff Login</h3></center>
      <div class="midcontainer">
        <input type="username" name="username" placeholder="Username" required>
      </div>
      <div class="midcontainer">
        <input type="password" name="password" placeholder="Password" required>
      </div>
      <div class="midcontainer">
        <button class="loginbutton">Log in</button>
      </div>
    </form>
  </div>
  <div id="footer"></div>
</body>
</html>
