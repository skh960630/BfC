<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['login_user'])){
  header("location: index.php");
}

$conn = mysqli_connect("localhost","root","bulgogi123","ISYS_HAQ");

$query = "Select Name from haq_report_count Order by Name ASC;";
$result = mysqli_query($conn, $query);
$name_list = array();

while($row = mysqli_fetch_assoc($result)){
  $name_list[] = $row['Name'];
}

//.xls,.xlsx,
?>

<html>
<head>
  <script type="text/javascript" src="javascript/jquery-3.3.1.js" ></script>
  <link href="stylesheet/headstyle.css" rel="stylesheet" type="text/css">
  <link href="stylesheet/mainstyle.css" rel="stylesheet" type="text/css">
  <link href="stylesheet/uploadstyle.css" rel="stylesheet" type="text/css">
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
    <div class="midcontainer">
      <h2>Upload Excel File</h2>
    </div>
    <div class="midcontainer">
      <form action = "importfile.php" method="post" enctype="multipart/form-data">
        <div class="uploadcontainer">
          <input type="text" class="selectBox" name="level" maxlength="30" placeholder="Select Level" required />
          <input type="text" class="selectBox" name="year" maxlength="20" placeholder="Select Year (Ex.2008-09)" required />
        </div>
        <div class="uploadform">
          <input type="file" name="file" accept=".csv" required />
          <button class="uploadbutton" name="SubmitButton">
            <img src="images/upload.png" style="width="80px" height="80px""/>
          </button>
        </div>
      </form>
    </div>
    <hr></hr>
    <div class="midcontainer">
      <h2>Delete Excel File</h2>
    </div>
    <div class="midcontainer">
      <form action = "deletefile.php" method="post" enctype="">
        <div class="dropdowncontainer">
          <select name="deleteReport" class="deleteBox" id="yeardropdown">
            <option value="" disabled selected value>Select Report</option>
            <?php
            foreach($name_list as $list) { ?>
                <option value="<?= $list ?>"><?= $list ?></option>
            <?php
            }?>
          </select>
        </div>
        <div class="uploadform">
          <button class="deletebutton" name="DeleteButton">
            <img src="images/delete.png" style="width="80px" height="80px""/>
          </button>
        </div>
      </form>
    </div>
  </div>
  <div id="footer"></div>
</body>
</html>
