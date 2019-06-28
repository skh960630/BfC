<?php
error_reporting(0);
$conn = mysqli_connect("localhost","root","bulgogi123","ISYS_HAQ");
$query = "Select Name from `haq_report_count`;";
$reports = mysqli_query($conn, $query);
$results = array();
?>


<html>
<head>
  <script type="text/javascript" src="javascript/jquery-3.3.1.js" ></script>
  <link href="stylesheet/headstyle.css" rel="stylesheet" type="text/css">
  <link href="stylesheet/mainstyle.css" rel="stylesheet" type="text/css">
  <link href="stylesheet/searchstyle.css" rel="stylesheet" type="text/css">
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
      <h2>Search Tool</h2>
      <form class="searchbox" action="" method="post" enctype="">
        <?php
        if(isset($_POST['searchtext'])){
          $nextvalue = $_POST['searchtext'];
          echo '<input type="text" placeholder="Search" name="searchtext" value = '.$nextvalue.' required />';
        }else{
          echo '<input type="text" placeholder="Search" name="searchtext" required />';
        }
        ?>
        <button type="submit"><img src="images/search.png" class = "search"></button>
      </form>
      <div class="datasearch">
        <table align="center">
          <?php
          if(isset($_POST['searchtext'])){
            $searchText = $_POST['searchtext'];

            foreach ($reports as $each) {
                $eachName = $each['Name'];
                $query = "Select * from `$eachName` WHERE `column1` LIKE '%$searchText%'
                 OR `column2` LIKE '%$searchText%'
                 OR `column3` LIKE '%$searchText%'
                 OR `column4` LIKE '%$searchText%'
                 OR `column5` LIKE '%$searchText%'
                 OR `column6` LIKE '%$searchText%'";
                $eachResult = mysqli_query($conn, $query);
                While($row = $eachResult->fetch_assoc()) {
                  echo "<tr>
                  <td>".$eachName." </td>
                  <td>". $row['column1'] . "</td>
                  <td>". $row['column2'] . "</td>
                  <td>". $row['column3'] . "</td>
                  <td>". $row['column4'] . "</td>
                  <td>". $row['column5'] . "</td>
                  <td>". $row['column6'] . "</td></tr>";
                }
              }
            }
          ?>
        </table>
      </div>
    </div>
  </div>
  <div id="footer"></div>
</body>
</html>
