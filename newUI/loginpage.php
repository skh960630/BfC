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
        <button class="loginbutton" name="loginbutton">Log in</button>
      </div>
    </form>
  </div>
  <div id="footer"></div>
</body>
</html>
