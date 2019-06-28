<?php
$conn = mysqli_connect("localhost","root","bulgogi123","ISYS_HAQ");
$link = mysqli_connect("localhost","root","bulgogi123","ISYS_HAQ");
if (!$link) {
  echo "<p>Could not connect to the server </p>\n";
  echo mysql_error();
}else{
  echo "<p>Successfully connected to the server</p>\n";
}

$query = "CREATE TABLE IF NOT EXISTS `haq_report_count` (`Level` VARCHAR(512) NOT NULL,`Year` VARCHAR(512) NOT NULL,`Name` VARCHAR(512) NOT NULL);";
$conn->query($query);
$level = $_POST['level'];
$year = $_POST['year'];
$tablename = $level.'_'.$year;

$query = "INSERT INTO haq_report_count(level, year, name)
SELECT * FROM (SELECT '$level', '$year', '$tablename') AS tmp
WHERE NOT EXISTS (
    SELECT Name FROM haq_report_count WHERE Name = '$tablename'
) LIMIT 1;";
$conn->query($query);
echo $query;

$query = "CREATE TABLE IF NOT EXISTS `$tablename` (
  `column1` VARCHAR(128) NOT NULL,
  `column2` VARCHAR(128) NOT NULL,
  `column3` VARCHAR(128) NOT NULL,
  `column4` VARCHAR(128) NOT NULL,
  `column5` VARCHAR(128) NOT NULL,
  `column6` VARCHAR(128) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;";
$conn->query($query);

$query = "truncate `$tablename`;";
$conn->query($query);

$file = $_FILES["file"]["tmp_name"];
$file_open = fopen($file,"r");

while(($csv = fgetcsv($file_open, 1000, ",")) != false){
  $column1 = $csv[0];
  $column2 = $csv[1];
  $column3 = $csv[2];
  $column4 = $csv[3];
  $column5 = $csv[4];
  $column6 = $csv[5];
  $query = "INSERT INTO `$tablename` VALUES ('$column1','$column2','$column3','$column4','$column5','$column6');";
  $conn->query($query);
}

header("Location: upload.php");
?>
