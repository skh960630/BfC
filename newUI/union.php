<html>
<head>
  <script type="text/javascript" src="javascript/jquery-3.3.1.js" ></script>
  <link href="stylesheet/headstyle.css" rel="stylesheet" type="text/css">
  <link href="stylesheet/mainstyle.css" rel="stylesheet" type="text/css">
  <link href="stylesheet/reportstyle.css" rel="stylesheet" type="text/css">
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
  <div class="midbackground" style="display: inline-block;">
    <hr></hr>
    <div class="midcontainer">
      <h2>Union Budget Report</h2>
      <form class="searchbox" action="index.php">
        <input type="text" placeholder="Search" name="searchtext">
        <button type="submit"><img src="images/search.png" class = "search"></button>
      </form>
      <h3>or</h3>
      <select name="category" id="yeardropdown">
        <option value="">Select Year</option>
        <option value="2015">2015</option>
        <option value="2016">2016</option>
        <option value="2017">2017</option>
        <option value="2018">2018</option>
      </select>
      <button type="submit" class="selectbt"><b>Select</b></button>
    </div>
  </div>
  <div id="footer"></div>
</body>
</html>
