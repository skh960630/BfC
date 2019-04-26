<?php
	include ('conn.php');
	$q=$_REQUEST['q'];
	$r=$_REQUEST['r'];
		if($q!=""){
		$insert_id=mysql_query("INSERT INTO haq_state_id (program_state_id) VALUES ('".$q."')");
		$s_query=mysql_query("select * from haq_sector where sector_status='active' order by sector_name ");
		echo "<select name='sector_id' onChange='showUser1(this.value)'>";
		echo "<option value=''> Select</option>";
		while($r_query=mysql_fetch_array($s_query)){
		echo "<option value='".$r_query['sector_id']."'>" . $r_query['sector_name'] . " </option>";
		}
		echo "</select>";
	} if($r!=""){
		$select_id=mysql_query("select * from haq_state_id order by temp_id desc limit 0,1");
		$result_id=mysql_fetch_array($select_id);
		$s_query=mysql_query("select * from haq_st_program where program_status='active' and program_state_id='".$result_id['program_state_id']."' and sector_id='".$r."' order by program_name");
		echo "<select name='program_id'>";
		while($r_query=mysql_fetch_array($s_query)){
		echo "<option value='".$r_query['program_id']."'>" . $r_query['program_name'] . " </option>";
		}
		echo "</select>";
	}	
?>