<?php
	require_once('OLEwriter.php');
	require_once('BIFFwriter.php');
	require_once('Worksheet.php');
	require_once('Workbook.php');function HeaderingExcel($filename) {
	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=$filename" );
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
	header("Pragma: public");
	}// HTTP headers
	HeaderingExcel('test.xls');// Creating a workbook
	$workbook = new Workbook("-");
	// Creating the first worksheet
	$worksheet1 =& $workbook->add_worksheet('First One');
	$worksheet1->write_string(1, 1, "This worksheet's name is ".$worksheet1->get_name());
	 
	// data
	$arrData = array(array('No','Name'),
	array('1','Ilmia'),
	array('2','Aqila'));
	 
	for($i=0;$i<=count($arrData)-1;$i++){
	for($j=0;$j<=count($arrData[$i])-1;$j++){
	$worksheet1->write_string(2+$i, 1+$j,$arrData[$i][$j]);
	}
	}
	 
	$workbook->close();
	?>