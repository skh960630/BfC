<?php
	include ('includes/login_check.php');
	include ('conn.php');
	if($_REQUEST['q']!=""){
		$s_query=mysql_query("select * from haq_sub_major_head where major_head_id='".$_REQUEST['q']."' and sub_major_head_status='active' order by sub_major_head_name ");
		echo "<select name='sub_major_id' onChange='showUser2(this.value)'>";
		echo "<option value=''> Select</option>";
		while($r_query=mysql_fetch_array($s_query)){
		echo "<option value='".$r_query['sub_major_head_id']."'>" . $r_query['sub_major_head_name'] . " ( ".$r_query['sub_major_head_code']. " )</option>";
		}
		echo "</select>";
	} else if ($_REQUEST['r']!=""){
		$s_query=mysql_query("select * from haq_minor_head where sub_major_head_id='".$_REQUEST['r']."' and minor_head_status='active' order by minor_head_name ");
		echo "<select name='minor_id' onChange='showUser3(this.value)'>";
		echo "<option value=''> Select</option>";
		while($r_query=mysql_fetch_array($s_query)){
		echo "<option value='".$r_query['minor_head_id']."'>" . $r_query['minor_head_name'] . " ( ".$r_query['minor_head_code']. " )</option>";
		}
		echo "</select>";
	} else if ($_REQUEST['s']!=""){
		$s_query=mysql_query("select * from haq_sub_head where minor_head_id='".$_REQUEST['s']."' and sub_head_status='active' order by sub_head_name ");
		echo "<select name='sub_id' onChange='showUser4(this.value)'>";
		echo "<option value=''> Select</option>";
		while($r_query=mysql_fetch_array($s_query)){
		echo "<option value='".$r_query['sub_head_id']."'>" . $r_query['sub_head_name'] . " ( ".$r_query['sub_head_code']. " )</option>";
		}
		echo "</select>";
	} else if ($_REQUEST['t']!=""){
		$s_query=mysql_query("select * from haq_detail_head where sub_head_id='".$_REQUEST['t']."' and detail_head_status='active' order by detail_head_name ");
		echo "<select name='detail_id' onChange='showUser5(this.value)'>";
		echo "<option value=''> Select</option>";
		while($r_query=mysql_fetch_array($s_query)){
		echo "<option value='".$r_query['detail_head_id']."'>" . $r_query['detail_head_name'] . " ( ".$r_query['detail_head_code']. " )</option>";
		}
		echo "</select>";
	} else if ($_REQUEST['u']!=""){
		$s_query=mysql_query("select * from haq_object_head where detail_head_id='".$_REQUEST['u']."' and object_head_status='active' order by object_head_name ");
		echo "<select name='object_id' onChange='showUser6(this.value)'>";
		echo "<option value=''> Select</option>";
		while($r_query=mysql_fetch_array($s_query)){
		echo "<option value='".$r_query['object_head_id']."'>" . $r_query['object_head_name'] . " ( ".$r_query['object_head_code']. " )</option>";
		}
		echo "</select>";
	}else if ($_REQUEST['v']!=""){

		$s_query=mysql_query("select * from haq_other_head where object_head_id='".$_REQUEST['v']."' and other_head_status='active' order by other_head_name ");
		echo "<select name='other_id'>";
		echo "<option value=''> Select</option>";
		while($r_query=mysql_fetch_array($s_query)){
		echo "<option value='".$r_query['other_head_id']."'>" . $r_query['other_head_name'] . " ( ".$r_query['other_head_code']. " )</option>";
		}
		echo "</select>";
		
	}


?>