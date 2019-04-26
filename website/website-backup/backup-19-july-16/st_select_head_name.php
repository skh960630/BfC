<?php
	include ('includes/login_check.php');
	include ('conn.php');
	$q=$_REQUEST['q'];
	$r=$_REQUEST['r'];
	if($q!=""){
		$insert_id=mysql_query("INSERT INTO haq_head_id (temp_state_id) VALUES ('".$q."')");
		$s_query=mysql_query("select * from haq_st_head where head_status='active' order by head_id");
		echo "<select name='head_id' onChange='showUser1(this.value)'>";
		echo "<option value=''> Select</option>";
		while($r_query=mysql_fetch_array($s_query)){
		echo "<option value='".$r_query['head_id']."'>" . $r_query['head_name'] . " </option>";
		}
		echo "</select>";
	}
	
		if($r==1){
		$select_id=mysql_query("select * from haq_head_id order by temp_id desc limit 0,1");
		$result_id=mysql_fetch_array($select_id);
		$s_query=mysql_query("select distinct major_head_name from haq_st_major_head where major_head_status='active' and state_id='".$result_id['temp_state_id']."' order by major_head_name ");
		echo "<select name='head_name'>";
		while($r_query=mysql_fetch_array($s_query)){
		echo "<option value='".$r_query['major_head_name']."'>" . $r_query['major_head_name'] . "</option>";
		}
		echo "</select>";
	} else	if($r==2){
		$select_id=mysql_query("select * from haq_head_id order by temp_id desc limit 0,1");
		$result_id=mysql_fetch_array($select_id);
		$s_query=mysql_query("select distinct sub_major_head_name from haq_st_sub_major_head where sub_major_head_status='active' and state_id='".$result_id['temp_state_id']."' order by sub_major_head_name ");
		echo "<select name='head_name'>";
		while($r_query=mysql_fetch_array($s_query)){
		echo "<option value='".$r_query['sub_major_head_name']."'>" . $r_query['sub_major_head_name'] . "</option>";
		}
		echo "</select>";
	} else	if($r==3){
		$select_id=mysql_query("select * from haq_head_id order by temp_id desc limit 0,1");
		$result_id=mysql_fetch_array($select_id);
		$s_query=mysql_query("select distinct minor_head_name from haq_st_minor_head where minor_head_status='active' and state_id='".$result_id['temp_state_id']."' order by minor_head_name ");
		echo "<select name='head_name'>";
		while($r_query=mysql_fetch_array($s_query)){
		echo "<option value='".$r_query['minor_head_name']."'>" . $r_query['minor_head_name'] . "</option>";
		}
		echo "</select>";
	} else	if($r==4){
		$select_id=mysql_query("select * from haq_head_id order by temp_id desc limit 0,1");
		$result_id=mysql_fetch_array($select_id);
		$s_query=mysql_query("select distinct gen_head_name from haq_st_gen_head where gen_head_status='active' and state_id='".$result_id['temp_state_id']."' order by gen_head_name ");
		echo "<select name='head_name'>";
		while($r_query=mysql_fetch_array($s_query)){
		echo "<option value='".$r_query['gen_head_name']."'>" . $r_query['gen_head_name'] . "</option>";
		}
		echo "</select>";
	} else if ($r==5){
		$select_id=mysql_query("select * from haq_head_id order by temp_id desc limit 0,1");
		$result_id=mysql_fetch_array($select_id);
		$s_query=mysql_query("select distinct sub_head_name from haq_st_sub_head where sub_head_status='active' and state_id='".$result_id['temp_state_id']."' order by sub_head_name ");
		echo "<select name='head_name'>";
		while($r_query=mysql_fetch_array($s_query)){
		echo "<option value='".$r_query['sub_head_name']."'>" . $r_query['sub_head_name'] . "</option>";
		}
		echo "</select>";
	} else if ($r==6){
		$select_id=mysql_query("select * from haq_head_id order by temp_id desc limit 0,1");
		$result_id=mysql_fetch_array($select_id);
		$s_query=mysql_query("select distinct detail_head_name from haq_st_detail_head where detail_head_status='active' and state_id='".$result_id['temp_state_id']."' order by detail_head_name ");
		//echo "select distinct detail_head_name from haq_detail_head where detail_head_status='active' order by detail_head_name ";
		//exit;
		echo "<select name='head_name'>";
		while($r_query=mysql_fetch_array($s_query)){
		echo "<option value='".$r_query['detail_head_name']."'>" . $r_query['detail_head_name'] . "</option>";
		}
		echo "</select>";
	} else if ($r==7){
		$select_id=mysql_query("select * from haq_head_id order by temp_id desc limit 0,1");
		$result_id=mysql_fetch_array($select_id);
		$s_query=mysql_query("select distinct object_head_name from haq_st_object_head where object_head_status='active' and state_id='".$result_id['temp_state_id']."' order by object_head_name ");
		echo "<select name='head_name'>";
		while($r_query=mysql_fetch_array($s_query)){
		echo "<option value='".$r_query['object_head_name']."'>" . $r_query['object_head_name'] . "</option>";
		}
		echo "</select>";
	} else if ($r==8){
		$select_id=mysql_query("select * from haq_head_id order by temp_id desc limit 0,1");
		$result_id=mysql_fetch_array($select_id);
		$s_query=mysql_query("select distinct other_head_name from haq_st_other_head where other_head_status='active' and state_id='".$result_id['temp_state_id']."' order by other_head_name ");
		echo "<select name='head_name'>";
		while($r_query=mysql_fetch_array($s_query)){
		echo "<option value='".$r_query['other_head_name']."'>" . $r_query['other_head_name'] . "</option>";
		}
		echo "</select>";
	}
?>