<?php session_start(); 

#### Roshan's very simple code to export data to excel   
#### Copyright reserved to Roshan Bhattarai - nepaliboy007@yahoo.com
#### if you have any problem contact me at http://roshanbh.com.np
#### fell free to visit my blog http://php-ajax-guru.blogspot.com
	
	//first of all unset these variables
	unset($_SESSION['report_header']);
	unset($_SESSION['report_values']);
	//note that the header contain the three columns and its a array
	$_SESSION['report_header']=array("Name","Email","Country","age"); 
	
   // now the excel data field should be two dimentational array with three column
//   for($i=0;$i<=2;$i++) //loop through the needed cycle
   $i=0;
   {
   		echo $_SESSION['report_values'][$i][0]="Michael"." ";
		echo $_SESSION['report_values'][$i][1]="michael@yahoo.com"." ";
		echo $_SESSION['report_values'][$i][2]="Nepal"." ";
		echo $_SESSION['report_values'][$i][3]="25"." ";
		echo "<br>";
  }
   $i=1;
   {
   		echo $_SESSION['report_values'][$i][0]="Michael_!"." ";
		echo $_SESSION['report_values'][$i][1]="michael@yahoo.com_1"." ";
		echo $_SESSION['report_values'][$i][2]="Nepal_!"." ";
		echo $_SESSION['report_values'][$i][3]="25_1"." ";
		echo "<br>";
  }
   $i=2;
   {
   		echo $_SESSION['report_values'][$i][0]="Michael_2"." ";
		echo $_SESSION['report_values'][$i][1]="michael@yahoo.com_2"." ";
		echo $_SESSION['report_values'][$i][2]="Nepal_2"." ";
		echo $_SESSION['report_values'][$i][3]="25_2"." ";
		echo "<br>";
  }
  
  ?>
<a href="export_report.php?fn=test">Click here to generate report</a>
<!--the export_report.php takes one variable called fn as GET parameter which is name of the file to be generated, if you pass member_report as a value, then the name of the generated file would be member_report.php
 -->