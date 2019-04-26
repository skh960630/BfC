<?php
	include ('conn.php');
	$q=$_REQUEST['q'];
		$s_query=mysql_query("select * from haq_program where program_status='active' and sector_id='".$q."' order by program_name");
//		echo "select * from haq_program where program_status='active' and sector_id='".$q."' order by program_name";
//		exit;
		echo "<select name='program_id'>";
		while($r_query=mysql_fetch_array($s_query)){
		echo "<option value='".$r_query['program_id']."'>" . $r_query['program_name'] . " </option>";
		}
		echo "</select>";
?>