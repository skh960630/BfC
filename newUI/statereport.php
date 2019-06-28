<?php
error_reporting(0);
$conn = mysqli_connect("localhost","root","bulgogi123","ISYS_HAQ");

if(isset($_POST['downloadButton'])){
  $exportFile = 'state_'.$_POST['downloadButton'];
  $query = "Select * from `$exportFile`;";
  $result = mysqli_query($conn, $query);

  $filename = "$exportFile.xls";
  header("Content-Type: application/vnd.ms-excel");
  header("Content-Disposition: attachment; filename=\"$filename\"");

  $isPrintHeader = false;
  if (! empty($result)) {
    foreach ($result as $row) {
      if (! $isPrintHeader) {
        echo implode("\t", array_keys($row)) . "\n";
        $isPrintHeader = true;
      }
      echo implode("\t", array_values($row)) . "\n";
    }
  }
}else if(!isset($_POST['stateData'])){
  header("Location: state.php");
}

$stateData = $_POST['stateData'];
$query = "Select * from `state_$stateData`;";
$result = mysqli_query($conn, $query);
?>

<html>
<head>
  <script type="text/javascript" src="javascript/jquery-3.3.1.js" ></script>
  <link href="stylesheet/headstyle.css" rel="stylesheet" type="text/css">
  <link href="stylesheet/mainstyle.css" rel="stylesheet" type="text/css">
  <link href="stylesheet/datastyle.css" rel="stylesheet" type="text/css">
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
    <div class="datareport">
      <table align="center">
        <div class="midcontainer" style="display: inline-block; margin-left: 10px;">
          <h2>State <?php echo $stateData;?> Report</h2>
        </div>
        <div class="midcontainer" style="display: inline-block; margin-left: 120px;">
          <form action="" method="post" enctype="">
            <button class="downloadbutton" type="submit" name="downloadButton" value="<?php echo $stateData; ?>">
              <img src="images/download.png" style="width="60px" height="60px""/>
            </button>
          </form>
        </div>
        <?php
        while($row = mysqli_fetch_assoc($result)) {
          if(count(array_filter($row)) != 0){
            echo "<tr>
            <td>". $row["column1"]. "</td>
            <td>". $row["column2"]. "</td>
            <td>". $row["column3"]. "</td>
            <td>". $row["column4"]. "</td>
            <td>". $row["column5"]. "</td>
            <td>". $row["column6"]. "</td>
            </tr>";
          }
        }
        ?>
      </table>
    </div>
  </div>
  <div id="footer"></div>
</body>
</html>
