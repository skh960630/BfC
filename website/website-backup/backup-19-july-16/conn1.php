<?php
//For local server connection string

//$dbh=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error());
//mysql_select_db ("haq_on21"); 


//$dbh=mysql_connect ("localhost", "haqcrcor_haqbudg", "MyeS)S-56L4-") or die ('I cannot connect to the database because: ' . mysql_error());
//mysql_select_db ("haqcrcor_budgetprogram"); 
//mysql_select_db ("budgetprogram"); 

$dbh=mysql_connect ("localhost", "haqbudge_buget", "haqbuget2174") or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ("haqbudge_buget"); 



$today=getdate();
	$year = $today['year'];
	$month= $today['mon'];
	$day = $today['mday'];
?>