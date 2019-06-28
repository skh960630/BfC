<?php
error_reporting(0);
$conn = mysqli_connect("localhost","root","bulgogi123","ISYS_HAQ");

$query = "Select Year from haq_report_count Where Level = 'State' Order by Year ASC;";
$result = mysqli_query($conn, $query);
$state_list = array();

while($row = mysqli_fetch_assoc($result)){
  $state_list[] = $row['Year'];
}
?>

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
      <h2>State Budget Report</h2>
      <form action = "statereport.php" method="post" enctype="">
        <select name="stateData" id="yeardropdown">
          <option value="" disabled selected value>Select Year</option>
          <?php
          foreach($state_list as $list) { ?>
              <option value="<?= $list ?>"><?= $list ?></option>
          <?php
          }?>
        </select>
        <button type="submit" class="selectbt"><b>Select</b></button>
      </form>
    </div>
  </div>
  <div id="footer"></div>
</body>
</html>
