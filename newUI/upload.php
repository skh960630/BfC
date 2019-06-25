<?php

if(isset($_POST['SubmitButton'])){ //check if form was submitted
$csv_file = $_FILES['filepath']['name'];
$message = $_FILES['filepath']['name'];
echo "<script type='text/javascript'>alert('$message');</script>";

// if ( !is_file( $csv_file ) ){
//     exit('File not found.');
// }else{
//   $message = $_FILES["filepath"]["name"];
//   echo "<script type='text/javascript'>alert('$message');</script>";
// }
$target_dir = 'uploads/';
$target_file = $target_dir . basename($_FILES["filepath"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

move_uploaded_file($_FILES["filepath"]["name"], $target_file);

$mysqli = new mysqli("localhost", "root", "", "ISYS_HAQ");

require_once dirname(__FILE__) . '/Includes/Classes/PHPExcel/IOFactory.php';

$inputFileType = PHPExcel_IOFactory::identify($target_file);

$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcel = $objReader->load($target_file);

$i=2;
$val=array();
$count=0;
for($i=2;$i<34;$i++)
{
$val[$count++]=$objPHPExcel->getActiveSheet()->getCell('C'.$i)->getValue();
}
}
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
      <div class="dropdowncontainer">
        <div class"dropdowncontainer" style="margin-bottom: 5px;">
          <select name="category" id="dropdown">
            <option value="">Select Level</option>
            <option value="state">State</option>
            <option value="union">Union</option>
          </select>
        </div>
        <select name="category" id="dropdown">
          <option value="">Select Year</option>
          <option value="2015">2015</option>
          <option value="2016">2016</option>
          <option value="2017">2017</option>
          <option value="2018">2018</option>
        </select>
      </div>
      <form class="uploadform" action = "" method="post" enctype="multipart/form-data">
        <input type="file" name="filepath" id = "filepath" multiple />
        <button class="uploadbutton" name="SubmitButton" id="SubmitButton">
          <img src="images/upload.png" style="width="80px" height="80px""/>
        </button>
      </form>
    </div>
  </div>
  <div id="footer"></div>
</body>
</html>
