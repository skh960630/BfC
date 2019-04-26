<?php
	include ('includes/login_check.php');
	include ('conn.php');
		$s_query=mysql_query("select * from haq_st_department where department_state_id='".$_REQUEST['q']."' and department_status='active' order by department_name ");
		echo "<select name='department_id' >";
		echo "<option value=''> Select</option>";
		while($r_query=mysql_fetch_array($s_query)){
		echo "<option value='".$r_query['department_id']."'>" . $r_query['department_name'] . " </option>";
		}
		echo "</select>";

?>

