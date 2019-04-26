<?php
	include ('includes/login_check.php');
	include ('conn.php');
	$q=$_REQUEST['q'];
	if($q==1){
		$s_query=mysql_query("select distinct major_head_name from haq_major_head where major_head_status='active' order by major_head_name ");
		echo "<select name='head_name'>";
		while($r_query=mysql_fetch_array($s_query)){
		echo "<option value='".$r_query['major_head_name']."'>" . $r_query['major_head_name'] . "</option>";
		}
		echo "</select>";
	} else	if($q==2){
		$s_query=mysql_query("select distinct sub_major_head_name from haq_sub_major_head where sub_major_head_status='active' order by sub_major_head_name ");
		echo "<select name='head_name'>";
		while($r_query=mysql_fetch_array($s_query)){
		echo "<option value='".$r_query['sub_major_head_name']."'>" . $r_query['sub_major_head_name'] . "</option>";
		}
		echo "</select>";
	} else	if($q==3){
		$s_query=mysql_query("select distinct minor_head_name from haq_minor_head where minor_head_status='active' order by minor_head_name ");
		echo "<select name='head_name'>";
		while($r_query=mysql_fetch_array($s_query)){
		echo "<option value='".$r_query['minor_head_name']."'>" . $r_query['minor_head_name'] . "</option>";
		}
		echo "</select>";
	} else if ($q==4){
		$s_query=mysql_query("select distinct sub_head_name from haq_sub_head where sub_head_status='active' order by sub_head_name ");
		echo "<select name='head_name'>";
		while($r_query=mysql_fetch_array($s_query)){
		echo "<option value='".$r_query['sub_head_name']."'>" . $r_query['sub_head_name'] . "</option>";
		}
		echo "</select>";
	} else if ($q==5){
		$s_query=mysql_query("select distinct detail_head_name from haq_detail_head where detail_head_status='active' order by detail_head_name ");
		//echo "select distinct detail_head_name from haq_detail_head where detail_head_status='active' order by detail_head_name ";
		//exit;
		echo "<select name='head_name'>";
		while($r_query=mysql_fetch_array($s_query)){
		echo "<option value='".$r_query['detail_head_name']."'>" . $r_query['detail_head_name'] . "</option>";
		}
		echo "</select>";
	} else if ($q==6){
		$s_query=mysql_query("select distinct object_head_name from haq_object_head where object_head_status='active' order by object_head_name ");
		echo "<select name='head_name'>";
		while($r_query=mysql_fetch_array($s_query)){
		echo "<option value='".$r_query['object_head_name']."'>" . $r_query['object_head_name'] . "</option>";
		}
		echo "</select>";
	} else if ($q==7){
		$s_query=mysql_query("select distinct other_head_name from haq_other_head where other_head_status='active' order by other_head_name ");
		echo "<select name='head_name'>";
		while($r_query=mysql_fetch_array($s_query)){
		echo "<option value='".$r_query['other_head_name']."'>" . $r_query['other_head_name'] . "</option>";
		}
		echo "</select>";
	}



?>