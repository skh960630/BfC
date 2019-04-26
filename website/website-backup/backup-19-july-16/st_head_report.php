<?php
	include ('includes/login_check.php');
	include ('conn.php');
	$level=$_REQUEST['level'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><html><head>
<script src="st_get_head_name.js"></script>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" background="images/Picture1.jpg">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
  <tr>
	<td colspan="2" align="center"><?php include('includes/header.php') ; ?></td>
  </tr>
  <tr>
	<td colspan="2" class="text12"><table width="100%"  border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
	  <tr>
		<td align="right" valign="top" height="10" ><a href="acronyms.php" class="back_menu" target="_blank">Acronyms</a>&nbsp;|| &nbsp;<a href="bfc_state.php" class="back_menu"><strong>Report </strong></a>&nbsp;|| &nbsp;<a href="home.php" class="back_menu"><strong>Home Page</strong></a>&nbsp;&nbsp;&nbsp;</td>
	  </tr>
	  <tr>
		<td align="left" valign="top" height="10"> </td>
	  </tr>
	  <tr>
		<td align="left" valign="top" ><form name="form1" method="post" action=""><table width="70%" align="center" border="0" cellspacing="2" cellpadding="1" bgcolor="#F1F4F7">
		  <tr>
			<td colspan="3">&nbsp; </td>
		  </tr>
		  <tr>
			<td width="31%">&nbsp;</td>
			<td width="36%" align="center" class="backheads"><strong>Head Data Search</strong></td>
			<td width="33%" align="right">&nbsp;&nbsp;</td>
		  </tr>
		  <tr>
			<td colspan="3">&nbsp; </td>
		  </tr>
		  <tr>
			<td colspan="3"><table width="100%" align="center" border="1" cellspacing="2" cellpadding="1" bgcolor="#F1F4F7">
		  	  <tr>
				<td height="25" colspan="8" class="txt" align="right">(Figures are in Thousands)</td>
			  </tr>
			  <tr>
				<td >&nbsp;&nbsp;&nbsp;Select State :</td>
				<td colspan="7">&nbsp;<select name="state_id"  onChange="showUser(this.value)"><option value="" selected>Select</option>
				<?php
					$sel_state="select * from haq_state where state_status='active' order by state_name";
					$res_state=mysql_query($sel_state);
					while($fetch_state = mysql_fetch_array($res_state)){ ?>
					<option value="<?php echo $fetch_state['state_id']; ?>" ><?php echo $fetch_state['state_name'];?></option> 
				<? }?>
				</select>&nbsp;</td>
			  </tr>
			  <tr>
				<td width="130" height="30">&nbsp;&nbsp;&nbsp;Select Head :</td>
				<td colspan="3"  id="txtHint"><select name="head_id"  onChange="showUser1(this.value)"><option value="" selected>Select</option>
				</select></td>
				<td colspan="4" align="left">&nbsp;</td>
			  </tr>
			  <tr>
				<td>&nbsp;&nbsp;&nbsp;Select Head Name:</td>
				<td colspan="3" id="txtHint1">
				  <select name="head_name"><option value="" >Select</option></select>
				</td>
				<td colspan="4" align="left">&nbsp;</td>
			  </tr>
			  <tr>
				<td>&nbsp;&nbsp;&nbsp;Select Year :</td>
				<td colspan="3"><select name="bud_year"><option value="" selected>Select</option>
				<?
					$sel_year="select * from haq_year where year_status='active' order by year_id";
					$res_year=mysql_query($sel_year);
					while($fetch_year = mysql_fetch_array($res_year)){ ?>
					<option value="<?php echo $fetch_year['year_name']; ?>" ><?php echo $fetch_year['year_name'];?></option>
				<? }?>
				</select></td>
				<td colspan="4" align="left"><input name="submit" type="submit" id="submit" value="Search">			    &nbsp;</td>
			  </tr>
				<?php
				if (isset($_REQUEST['submit'])){ 
		$select_tempid=mysql_query("select count(temp_id) as temp_id from haq_head_id");
		$result_tempid=mysql_fetch_array($select_tempid);
		if($result_tempid['temp_id'] >=5){
			$update_showid=mysql_query("delete from haq_head_id");
		}

					if($_REQUEST['head_id']==1){
						$s_minh="select * from haq_st_major_head where major_head_name='".$_REQUEST['head_name']."' and major_head_status='active'";
						$s_q_minh=mysql_query($s_minh);
						while($r_minh=mysql_fetch_array($s_q_minh)){
							$select_head_report="select * from haq_head_expend_state where expend_year='".$_REQUEST['bud_year']."' and expend_type='".$level."'and expend_status='active' and state_id='".$_REQUEST['state_id']."' and major_head_id='".$r_minh['major_head_id']."'";
							$fetch_head_report=mysql_query($select_head_report);
							while($result_head_report=mysql_fetch_array($fetch_head_report)){
								$sum_be_rev_plan += $result_head_report['be_rev_plan'];
								$sum_be_rev_non_plan += $result_head_report['be_rev_non_plan'];
								$sum_be_rev_total += $result_head_report['be_rev_total'];
								$sum_be_grand_total += $result_head_report['be_grand_total'];
								$sum_be_cap_plan += $result_head_report['be_cap_plan'];
								$sum_be_cap_non_plan += $result_head_report['be_cap_non_plan'];
								$sum_be_cap_total += $result_head_report['be_cap_total'];
								$sum_be_plan_total += $result_head_report['be_plan_total'];
								$sum_be_non_plan_total += $result_head_report['be_non_plan_total'];
								$sum_re_rev_plan += $result_head_report['re_rev_plan'];
								$sum_re_rev_non_plan += $result_head_report['re_rev_non_plan'];
								$sum_re_rev_total += $result_head_report['re_rev_total'];
								$sum_re_grand_total += $result_head_report['re_grand_total'];
								$sum_re_cap_plan += $result_head_report['re_cap_plan'];
								$sum_re_cap_non_plan += $result_head_report['re_cap_non_plan'];
								$sum_re_cap_total += $result_head_report['re_cap_total'];
								$sum_re_plan_total += $result_head_report['re_plan_total'];
								$sum_re_non_plan_total += $result_head_report['re_non_plan_total'];
								$sum_ae_rev_plan += $result_head_report['ae_rev_plan'];
								$sum_ae_rev_non_plan += $result_head_report['ae_rev_non_plan'];
								$sum_ae_rev_total += $result_head_report['ae_rev_total'];
								$sum_ae_grand_total += $result_head_report['ae_grand_total'];
								$sum_ae_cap_plan += $result_head_report['ae_cap_plan'];
								$sum_ae_cap_non_plan += $result_head_report['ae_cap_non_plan'];
								$sum_ae_cap_total += $result_head_report['ae_cap_total'];
								$sum_ae_plan_total += $result_head_report['ae_plan_total'];
								$sum_ae_non_plan_total += $result_head_report['ae_non_plan_total'];
							}
						}
					} else if($_REQUEST['head_id']==2){
						$s_minh="select * from haq_st_sub_major_head where sub_major_head_name='".$_REQUEST['head_name']."' and sub_major_head_status='active'";
						$s_q_minh=mysql_query($s_minh);
						while($r_minh=mysql_fetch_array($s_q_minh)){
							$select_head_report="select * from haq_head_expend_state where expend_year='".$_REQUEST['bud_year']."' and expend_type='".$level."'and expend_status='active' and state_id='".$_REQUEST['state_id']."' and sub_major_head_id='".$r_minh['sub_major_head_id']."'";
							$fetch_head_report=mysql_query($select_head_report);
							while($result_head_report=mysql_fetch_array($fetch_head_report)){
								$sum_be_rev_plan += $result_head_report['be_rev_plan'];
								$sum_be_rev_non_plan += $result_head_report['be_rev_non_plan'];
								$sum_be_rev_total += $result_head_report['be_rev_total'];
								$sum_be_grand_total += $result_head_report['be_grand_total'];
								$sum_be_cap_plan += $result_head_report['be_cap_plan'];
								$sum_be_cap_non_plan += $result_head_report['be_cap_non_plan'];
								$sum_be_cap_total += $result_head_report['be_cap_total'];
								$sum_be_plan_total += $result_head_report['be_plan_total'];
								$sum_be_non_plan_total += $result_head_report['be_non_plan_total'];
								$sum_re_rev_plan += $result_head_report['re_rev_plan'];
								$sum_re_rev_non_plan += $result_head_report['re_rev_non_plan'];
								$sum_re_rev_total += $result_head_report['re_rev_total'];
								$sum_re_grand_total += $result_head_report['re_grand_total'];
								$sum_re_cap_plan += $result_head_report['re_cap_plan'];
								$sum_re_cap_non_plan += $result_head_report['re_cap_non_plan'];
								$sum_re_cap_total += $result_head_report['re_cap_total'];
								$sum_re_plan_total += $result_head_report['re_plan_total'];
								$sum_re_non_plan_total += $result_head_report['re_non_plan_total'];
								$sum_ae_rev_plan += $result_head_report['ae_rev_plan'];
								$sum_ae_rev_non_plan += $result_head_report['ae_rev_non_plan'];
								$sum_ae_rev_total += $result_head_report['ae_rev_total'];
								$sum_ae_grand_total += $result_head_report['ae_grand_total'];
								$sum_ae_cap_plan += $result_head_report['ae_cap_plan'];
								$sum_ae_cap_non_plan += $result_head_report['ae_cap_non_plan'];
								$sum_ae_cap_total += $result_head_report['ae_cap_total'];
								$sum_ae_plan_total += $result_head_report['ae_plan_total'];
								$sum_ae_non_plan_total += $result_head_report['ae_non_plan_total'];
							}
						}
					} else if($_REQUEST['head_id']==3){
						$s_minh="select * from haq_st_minor_head where minor_head_name='".$_REQUEST['head_name']."' and minor_head_status='active'";
						$s_q_minh=mysql_query($s_minh);
						while($r_minh=mysql_fetch_array($s_q_minh)){
							$select_head_report="select * from haq_head_expend_state where expend_year='".$_REQUEST['bud_year']."' and expend_type='".$level."'and expend_status='active' and state_id='".$_REQUEST['state_id']."' and minor_head_id='".$r_minh['minor_head_id']."'";
							$fetch_head_report=mysql_query($select_head_report);
							while($result_head_report=mysql_fetch_array($fetch_head_report)){
								$sum_be_rev_plan += $result_head_report['be_rev_plan'];
								$sum_be_rev_non_plan += $result_head_report['be_rev_non_plan'];
								$sum_be_rev_total += $result_head_report['be_rev_total'];
								$sum_be_grand_total += $result_head_report['be_grand_total'];
								$sum_be_cap_plan += $result_head_report['be_cap_plan'];
								$sum_be_cap_non_plan += $result_head_report['be_cap_non_plan'];
								$sum_be_cap_total += $result_head_report['be_cap_total'];
								$sum_be_plan_total += $result_head_report['be_plan_total'];
								$sum_be_non_plan_total += $result_head_report['be_non_plan_total'];
								$sum_re_rev_plan += $result_head_report['re_rev_plan'];
								$sum_re_rev_non_plan += $result_head_report['re_rev_non_plan'];
								$sum_re_rev_total += $result_head_report['re_rev_total'];
								$sum_re_grand_total += $result_head_report['re_grand_total'];
								$sum_re_cap_plan += $result_head_report['re_cap_plan'];
								$sum_re_cap_non_plan += $result_head_report['re_cap_non_plan'];
								$sum_re_cap_total += $result_head_report['re_cap_total'];
								$sum_re_plan_total += $result_head_report['re_plan_total'];
								$sum_re_non_plan_total += $result_head_report['re_non_plan_total'];
								$sum_ae_rev_plan += $result_head_report['ae_rev_plan'];
								$sum_ae_rev_non_plan += $result_head_report['ae_rev_non_plan'];
								$sum_ae_rev_total += $result_head_report['ae_rev_total'];
								$sum_ae_grand_total += $result_head_report['ae_grand_total'];
								$sum_ae_cap_plan += $result_head_report['ae_cap_plan'];
								$sum_ae_cap_non_plan += $result_head_report['ae_cap_non_plan'];
								$sum_ae_cap_total += $result_head_report['ae_cap_total'];
								$sum_ae_plan_total += $result_head_report['ae_plan_total'];
								$sum_ae_non_plan_total += $result_head_report['ae_non_plan_total'];
							}
						}
					} else if($_REQUEST['head_id']==4){
						$s_minh="select * from haq_st_gen_head where gen_head_name='".$_REQUEST['head_name']."' and gen_head_status='active'";
						$s_q_minh=mysql_query($s_minh);
						while($r_minh=mysql_fetch_array($s_q_minh)){
							$select_head_report="select * from haq_head_expend_state where expend_year='".$_REQUEST['bud_year']."' and expend_type='".$level."'and expend_status='active' and state_id='".$_REQUEST['state_id']."' and gen_head_id='".$r_minh['gen_head_id']."'";
							$fetch_head_report=mysql_query($select_head_report);
							while($result_head_report=mysql_fetch_array($fetch_head_report)){
								$sum_be_rev_plan += $result_head_report['be_rev_plan'];
								$sum_be_rev_non_plan += $result_head_report['be_rev_non_plan'];
								$sum_be_rev_total += $result_head_report['be_rev_total'];
								$sum_be_grand_total += $result_head_report['be_grand_total'];
								$sum_be_cap_plan += $result_head_report['be_cap_plan'];
								$sum_be_cap_non_plan += $result_head_report['be_cap_non_plan'];
								$sum_be_cap_total += $result_head_report['be_cap_total'];
								$sum_be_plan_total += $result_head_report['be_plan_total'];
								$sum_be_non_plan_total += $result_head_report['be_non_plan_total'];
								$sum_re_rev_plan += $result_head_report['re_rev_plan'];
								$sum_re_rev_non_plan += $result_head_report['re_rev_non_plan'];
								$sum_re_rev_total += $result_head_report['re_rev_total'];
								$sum_re_grand_total += $result_head_report['re_grand_total'];
								$sum_re_cap_plan += $result_head_report['re_cap_plan'];
								$sum_re_cap_non_plan += $result_head_report['re_cap_non_plan'];
								$sum_re_cap_total += $result_head_report['re_cap_total'];
								$sum_re_plan_total += $result_head_report['re_plan_total'];
								$sum_re_non_plan_total += $result_head_report['re_non_plan_total'];
								$sum_ae_rev_plan += $result_head_report['ae_rev_plan'];
								$sum_ae_rev_non_plan += $result_head_report['ae_rev_non_plan'];
								$sum_ae_rev_total += $result_head_report['ae_rev_total'];
								$sum_ae_grand_total += $result_head_report['ae_grand_total'];
								$sum_ae_cap_plan += $result_head_report['ae_cap_plan'];
								$sum_ae_cap_non_plan += $result_head_report['ae_cap_non_plan'];
								$sum_ae_cap_total += $result_head_report['ae_cap_total'];
								$sum_ae_plan_total += $result_head_report['ae_plan_total'];
								$sum_ae_non_plan_total += $result_head_report['ae_non_plan_total'];
							}
						}
					} else if ($_REQUEST['head_id']==5) {
						$s_subh=mysql_query("select * from haq_st_sub_head where sub_head_name='".$_REQUEST['head_name']."' and sub_head_status='active'");
						while($r_subh=mysql_fetch_array($s_subh)){
							$select_head_report="select * from haq_head_expend_state where expend_year='".$_REQUEST['bud_year']."' and expend_type='".$level."'and expend_status='active' and state_id='".$_REQUEST['state_id']."' and sub_head_id='".$r_subh['sub_head_id']."'";
							$fetch_head_report=mysql_query($select_head_report);
							while($result_head_report=mysql_fetch_array($fetch_head_report)){
								$sum_be_rev_plan += $result_head_report['be_rev_plan'];
								$sum_be_rev_non_plan += $result_head_report['be_rev_non_plan'];
								$sum_be_rev_total += $result_head_report['be_rev_total'];
								$sum_be_grand_total += $result_head_report['be_grand_total'];
								$sum_be_cap_plan += $result_head_report['be_cap_plan'];
								$sum_be_cap_non_plan += $result_head_report['be_cap_non_plan'];
								$sum_be_cap_total += $result_head_report['be_cap_total'];
								$sum_be_plan_total += $result_head_report['be_plan_total'];
								$sum_be_non_plan_total += $result_head_report['be_non_plan_total'];
								$sum_re_rev_plan += $result_head_report['re_rev_plan'];
								$sum_re_rev_non_plan += $result_head_report['re_rev_non_plan'];
								$sum_re_rev_total += $result_head_report['re_rev_total'];
								$sum_re_grand_total += $result_head_report['re_grand_total'];
								$sum_re_cap_plan += $result_head_report['re_cap_plan'];
								$sum_re_cap_non_plan += $result_head_report['re_cap_non_plan'];
								$sum_re_cap_total += $result_head_report['re_cap_total'];
								$sum_re_plan_total += $result_head_report['re_plan_total'];
								$sum_re_non_plan_total += $result_head_report['re_non_plan_total'];
								$sum_ae_rev_plan += $result_head_report['ae_rev_plan'];
								$sum_ae_rev_non_plan += $result_head_report['ae_rev_non_plan'];
								$sum_ae_rev_total += $result_head_report['ae_rev_total'];
								$sum_ae_grand_total += $result_head_report['ae_grand_total'];
								$sum_ae_cap_plan += $result_head_report['ae_cap_plan'];
								$sum_ae_cap_non_plan += $result_head_report['ae_cap_non_plan'];
								$sum_ae_cap_total += $result_head_report['ae_cap_total'];
								$sum_ae_plan_total += $result_head_report['ae_plan_total'];
								$sum_ae_non_plan_total += $result_head_report['ae_non_plan_total'];
							}
						}
					} else if ($_REQUEST['head_id']==6) {
						$s_deth=mysql_query("select * from haq_st_detail_head where detail_head_name='".$_REQUEST['head_name']."' and detail_head_status='active'");
						while($r_deth=mysql_fetch_array($s_deth)){
							$select_head_report="select * from haq_head_expend_state where expend_year='".$_REQUEST['bud_year']."' and expend_type='".$level."'and expend_status='active' and state_id='".$_REQUEST['state_id']."' and detail_head_id='".$r_deth['detail_head_id']."'";
							$fetch_head_report=mysql_query($select_head_report);
							while($result_head_report=mysql_fetch_array($fetch_head_report)){
								$sum_be_rev_plan += $result_head_report['be_rev_plan'];
								$sum_be_rev_non_plan += $result_head_report['be_rev_non_plan'];
								$sum_be_rev_total += $result_head_report['be_rev_total'];
								$sum_be_grand_total += $result_head_report['be_grand_total'];
								$sum_be_cap_plan += $result_head_report['be_cap_plan'];
								$sum_be_cap_non_plan += $result_head_report['be_cap_non_plan'];
								$sum_be_cap_total += $result_head_report['be_cap_total'];
								$sum_be_plan_total += $result_head_report['be_plan_total'];
								$sum_be_non_plan_total += $result_head_report['be_non_plan_total'];
								$sum_re_rev_plan += $result_head_report['re_rev_plan'];
								$sum_re_rev_non_plan += $result_head_report['re_rev_non_plan'];
								$sum_re_rev_total += $result_head_report['re_rev_total'];
								$sum_re_grand_total += $result_head_report['re_grand_total'];
								$sum_re_cap_plan += $result_head_report['re_cap_plan'];
								$sum_re_cap_non_plan += $result_head_report['re_cap_non_plan'];
								$sum_re_cap_total += $result_head_report['re_cap_total'];
								$sum_re_plan_total += $result_head_report['re_plan_total'];
								$sum_re_non_plan_total += $result_head_report['re_non_plan_total'];
								$sum_ae_rev_plan += $result_head_report['ae_rev_plan'];
								$sum_ae_rev_non_plan += $result_head_report['ae_rev_non_plan'];
								$sum_ae_rev_total += $result_head_report['ae_rev_total'];
								$sum_ae_grand_total += $result_head_report['ae_grand_total'];
								$sum_ae_cap_plan += $result_head_report['ae_cap_plan'];
								$sum_ae_cap_non_plan += $result_head_report['ae_cap_non_plan'];
								$sum_ae_cap_total += $result_head_report['ae_cap_total'];
								$sum_ae_plan_total += $result_head_report['ae_plan_total'];
								$sum_ae_non_plan_total += $result_head_report['ae_non_plan_total'];
							}
						}
					} else if ($_REQUEST['head_id']==7) {
						$s_objh=mysql_query("select * from haq_st_object_head where object_head_name='".$_REQUEST['head_name']."' and object_head_status='active'");
						while($r_objh=mysql_fetch_array($s_objh)){
							$select_head_report="select * from haq_head_expend_state where expend_year='".$_REQUEST['bud_year']."' and expend_type='".$level."'and expend_status='active' and state_id='".$_REQUEST['state_id']."' and object_head_id='".$r_objh['object_head_id']."'";
							$fetch_head_report=mysql_query($select_head_report);
							while($result_head_report=mysql_fetch_array($fetch_head_report)){
								$sum_be_rev_plan += $result_head_report['be_rev_plan'];
								$sum_be_rev_non_plan += $result_head_report['be_rev_non_plan'];
								$sum_be_rev_total += $result_head_report['be_rev_total'];
								$sum_be_grand_total += $result_head_report['be_grand_total'];
								$sum_be_cap_plan += $result_head_report['be_cap_plan'];
								$sum_be_cap_non_plan += $result_head_report['be_cap_non_plan'];
								$sum_be_cap_total += $result_head_report['be_cap_total'];
								$sum_be_plan_total += $result_head_report['be_plan_total'];
								$sum_be_non_plan_total += $result_head_report['be_non_plan_total'];
								$sum_re_rev_plan += $result_head_report['re_rev_plan'];
								$sum_re_rev_non_plan += $result_head_report['re_rev_non_plan'];
								$sum_re_rev_total += $result_head_report['re_rev_total'];
								$sum_re_grand_total += $result_head_report['re_grand_total'];
								$sum_re_cap_plan += $result_head_report['re_cap_plan'];
								$sum_re_cap_non_plan += $result_head_report['re_cap_non_plan'];
								$sum_re_cap_total += $result_head_report['re_cap_total'];
								$sum_re_plan_total += $result_head_report['re_plan_total'];
								$sum_re_non_plan_total += $result_head_report['re_non_plan_total'];
								$sum_ae_rev_plan += $result_head_report['ae_rev_plan'];
								$sum_ae_rev_non_plan += $result_head_report['ae_rev_non_plan'];
								$sum_ae_rev_total += $result_head_report['ae_rev_total'];
								$sum_ae_grand_total += $result_head_report['ae_grand_total'];
								$sum_ae_cap_plan += $result_head_report['ae_cap_plan'];
								$sum_ae_cap_non_plan += $result_head_report['ae_cap_non_plan'];
								$sum_ae_cap_total += $result_head_report['ae_cap_total'];
								$sum_ae_plan_total += $result_head_report['ae_plan_total'];
								$sum_ae_non_plan_total += $result_head_report['ae_non_plan_total'];
							}
						}					
					} else if ($_REQUEST['head_id']==8) {
						$s_otrh=mysql_query("select * from haq_st_other_head where other_head_name='".$_REQUEST['head_name']."' and other_head_status='active'");
						while($r_otrh=mysql_fetch_array($s_otrh)){
							$select_head_report="select * from haq_head_expend_state where expend_year='".$_REQUEST['bud_year']."' and expend_type='".$level."'and expend_status='active' and state_id='".$_REQUEST['state_id']."' and other_head_id='".$r_minh['other_head_id']."'";
							$fetch_head_report=mysql_query($select_head_report);
							while($result_head_report=mysql_fetch_array($fetch_head_report)){
								$sum_be_rev_plan += $result_head_report['be_rev_plan'];
								$sum_be_rev_non_plan += $result_head_report['be_rev_non_plan'];
								$sum_be_rev_total += $result_head_report['be_rev_total'];
								$sum_be_grand_total += $result_head_report['be_grand_total'];
								$sum_be_cap_plan += $result_head_report['be_cap_plan'];
								$sum_be_cap_non_plan += $result_head_report['be_cap_non_plan'];
								$sum_be_cap_total += $result_head_report['be_cap_total'];
								$sum_be_plan_total += $result_head_report['be_plan_total'];
								$sum_be_non_plan_total += $result_head_report['be_non_plan_total'];
								$sum_re_rev_plan += $result_head_report['re_rev_plan'];
								$sum_re_rev_non_plan += $result_head_report['re_rev_non_plan'];
								$sum_re_rev_total += $result_head_report['re_rev_total'];
								$sum_re_grand_total += $result_head_report['re_grand_total'];
								$sum_re_cap_plan += $result_head_report['re_cap_plan'];
								$sum_re_cap_non_plan += $result_head_report['re_cap_non_plan'];
								$sum_re_cap_total += $result_head_report['re_cap_total'];
								$sum_re_plan_total += $result_head_report['re_plan_total'];
								$sum_re_non_plan_total += $result_head_report['re_non_plan_total'];
								$sum_ae_rev_plan += $result_head_report['ae_rev_plan'];
								$sum_ae_rev_non_plan += $result_head_report['ae_rev_non_plan'];
								$sum_ae_rev_total += $result_head_report['ae_rev_total'];
								$sum_ae_grand_total += $result_head_report['ae_grand_total'];
								$sum_ae_cap_plan += $result_head_report['ae_cap_plan'];
								$sum_ae_cap_non_plan += $result_head_report['ae_cap_non_plan'];
								$sum_ae_cap_total += $result_head_report['ae_cap_total'];
								$sum_ae_plan_total += $result_head_report['ae_plan_total'];
								$sum_ae_non_plan_total += $result_head_report['ae_non_plan_total'];
							}
						}
					}
					
					$sel_state="select * from haq_state where state_id='".$_REQUEST['state_id']."' and state_status='active' order by state_name";
					$res_state=mysql_query($sel_state);
					$fetch_state = mysql_fetch_array($res_state);

				$sel_value=mysql_query("select * from haq_head where head_id='".$_REQUEST['head_id']."'");
				$rel_value=mysql_fetch_array($sel_value);
// For Excel File Generation
			unset($_SESSION['report_header']);
			unset($_SESSION['report_values']);
			$_SESSION['report_header']=array("State Head Data Search"," "," "," "," "," "); 
				$i=0;
				$_SESSION['report_values'][$i][0]=State."-".$fetch_state['state_name']." ";
				$_SESSION['report_values'][$i][1]=" ";
				$_SESSION['report_values'][$i][2]=Search." ".Result." ";
				$_SESSION['report_values'][$i][3]=$rel_value['head_name'] ." >> ". $_REQUEST['head_name'] ." >> ". $_REQUEST['bud_year']." ";
				$_SESSION['report_values'][$i][4]=" ";
				$_SESSION['report_values'][$i][5]=" ";
				$i=1;
				$_SESSION['report_values'][$i][0]=Investment."  ";
				$_SESSION['report_values'][$i][1]=" ";
				$_SESSION['report_values'][$i][2]=Plan." ";
				$_SESSION['report_values'][$i][3]=Non." ".Plan." ";
				$_SESSION['report_values'][$i][4]=Total." ";
				$_SESSION['report_values'][$i][5]=Grand." ".Total." ";
				$i=2;
				$_SESSION['report_values'][$i][0]=Budget." ".Estimate." ";
				$_SESSION['report_values'][$i][1]=Revenue." ";
				$_SESSION['report_values'][$i][2]=$sum_be_rev_plan." ";
				$_SESSION['report_values'][$i][3]=$sum_be_rev_non_plan." ";
				$_SESSION['report_values'][$i][4]=$sum_be_rev_total." ";
				$_SESSION['report_values'][$i][5]=$sum_be_grand_total." ";
				$i=3;
				$_SESSION['report_values'][$i][0]="  ";
				$_SESSION['report_values'][$i][1]=Capital." ";
				$_SESSION['report_values'][$i][2]=$sum_be_cap_plan." ";
				$_SESSION['report_values'][$i][3]=$sum_be_cap_non_plan." ";
				$_SESSION['report_values'][$i][4]=$sum_be_cap_total." ";
				$_SESSION['report_values'][$i][5]=" ";
				$i=4;
				$_SESSION['report_values'][$i][0]=Total."  ";
				$_SESSION['report_values'][$i][1]=" ";
				$_SESSION['report_values'][$i][2]=$sum_be_plan_total." ";
				$_SESSION['report_values'][$i][3]=$sum_be_non_plan_total." ";
				$_SESSION['report_values'][$i][4]=" ";
				$_SESSION['report_values'][$i][5]=" ";
				$i=5;
				$_SESSION['report_values'][$i][0]=Revised." ".Estimate." ";
				$_SESSION['report_values'][$i][1]=Revenue." ";
				$_SESSION['report_values'][$i][2]=$sum_re_rev_plan." ";
				$_SESSION['report_values'][$i][3]=$sum_re_rev_non_plan." ";
				$_SESSION['report_values'][$i][4]=$sum_re_rev_total." ";
				$_SESSION['report_values'][$i][5]=$sum_re_grand_total." ";
				$i=6;
				$_SESSION['report_values'][$i][0]="  ";
				$_SESSION['report_values'][$i][1]=Capital." ";
				$_SESSION['report_values'][$i][2]=$sum_re_cap_plan." ";
				$_SESSION['report_values'][$i][3]=$sum_re_cap_non_plan." ";
				$_SESSION['report_values'][$i][4]=$sum_re_cap_total." ";
				$_SESSION['report_values'][$i][5]=" ";
				$i=7;
				$_SESSION['report_values'][$i][0]=Total."  ";
				$_SESSION['report_values'][$i][1]=" ";
				$_SESSION['report_values'][$i][2]=$sum_re_plan_total." ";
				$_SESSION['report_values'][$i][3]=$sum_re_non_plan_total." ";
				$_SESSION['report_values'][$i][4]=" ";
				$_SESSION['report_values'][$i][5]=" ";
				$i=8;
				$_SESSION['report_values'][$i][0]=Actual." ".Expenditure." ";
				$_SESSION['report_values'][$i][1]=Revenue." ";
				$_SESSION['report_values'][$i][2]=$sum_ae_rev_plan." ";
				$_SESSION['report_values'][$i][3]=$sum_ae_rev_non_plan." ";
				$_SESSION['report_values'][$i][4]=$sum_ae_rev_total." ";
				$_SESSION['report_values'][$i][5]=$sum_ae_grand_total." ";
				$i=9;
				$_SESSION['report_values'][$i][0]="  ";
				$_SESSION['report_values'][$i][1]=Capital." ";
				$_SESSION['report_values'][$i][2]=$sum_ae_cap_plan." ";
				$_SESSION['report_values'][$i][3]=$sum_ae_cap_non_plan." ";
				$_SESSION['report_values'][$i][4]=$sum_ae_cap_total." ";
				$_SESSION['report_values'][$i][5]=" ";
				$i=10;
				$_SESSION['report_values'][$i][0]=Total."  ";
				$_SESSION['report_values'][$i][1]=" ";
				$_SESSION['report_values'][$i][2]=$sum_ae_plan_total." ";
				$_SESSION['report_values'][$i][3]=$sum_ae_non_plan_total." ";
				$_SESSION['report_values'][$i][4]=" ";
				$_SESSION['report_values'][$i][5]=" ";
				$i=11;
					
				?>	
		  	  <tr>
				<td colspan="8"><strong>&nbsp;&nbsp;&nbsp;State :&nbsp;&nbsp;&nbsp;<?php
					echo $fetch_state['state_name']; ?>
				</strong></td>
			  </tr>
				<td height="25" colspan="8" class="txt"><strong> Search Result = 
				<?php 
				echo  $rel_value['head_name'] ." >> ". $_REQUEST['head_name'] ." >> ". $_REQUEST['bud_year'] ;
				?>
				</strong></td>
			  </tr>
			  <tr>
				<td height="25" colspan="2" class="txt"><strong>Year </strong></td>
				<td colspan="2" class="txt"><strong>Investment</strong></td>
				<td width="81" height="25" class="txt"><strong>Plan</strong></td>
				<td width="107" height="25" class="txt"><strong>Non Plan </strong></td>
				<td width="78" height="25" class="txt"><strong>Total</strong></td>
				<td width="157" height="25" class="txt"><strong>GT</strong></td>
			  </tr>
			  <tr>
				<td colspan="2" rowspan="9" class="txt"><strong><?php echo $_REQUEST['bud_year'] ; ?></strong></td>
				<td width="147" rowspan="2" class="txt"><strong>Budget Estimate</strong></td>
				<td width="106" class="txt">Revenue</td>
				<td height="25" class="txt"><?php echo $sum_be_rev_plan ;?></td>
				<td height="25" class="txt"><?php echo $sum_be_rev_non_plan ;?></td>
				<td height="25" class="txt"><?php echo $sum_be_rev_total ;?></td>
				<td rowspan="2" class="txt"><strong><?php echo $sum_be_grand_total ;?></strong></td>
			  </tr>
			  <tr>
				<td class="txt">Capital</td>
				<td height="9" class="txt"><?php echo $sum_be_cap_plan ;?></td>
				<td height="9" class="txt"><?php echo $sum_be_cap_non_plan ;?></td>
				<td height="9" class="txt"><?php echo $sum_be_cap_total ;?></td>
			  </tr>
			  <tr>
				<td colspan="2" class="txt"><strong>Total</strong></td>
				<td height="12" class="txt"><strong><?php echo $sum_be_plan_total ;?></strong></td>
				<td height="12" class="txt"><strong><?php echo $sum_be_non_plan_total ;?></strong></td>
				<td height="12" colspan="2" class="txt">&nbsp;</td>
			  </tr>
			  <tr>
				<td rowspan="2" class="txt"><strong>Revised Estimate</strong></td>
				<td class="txt">Revenue</td>
				<td height="25" class="txt"><?php echo $sum_re_rev_plan ;?></td>
				<td height="25" class="txt"><?php echo $sum_re_rev_non_plan ;?></td>
				<td height="25" class="txt"><?php echo $sum_re_rev_total ;?></td>
				<td rowspan="2" class="txt"><strong><?php echo $sum_re_grand_total ;?></strong></td>
			  </tr>
			  <tr>
				<td class="txt">Capital</td>
				<td height="9" class="txt"><?php echo $sum_re_cap_plan ;?></td>
				<td height="9" class="txt"><?php echo $sum_re_cap_non_plan ;?></td>
				<td height="9" class="txt"><?php echo $sum_re_cap_total ;?></td>
			  </tr>
			  <tr>
				<td colspan="2" class="txt"><strong>Total</strong></td>
				<td height="12" class="txt"><strong><?php echo $sum_re_plan_total ;?></strong></td>
				<td height="12" class="txt"><strong><?php echo $sum_re_non_plan_total ;?></strong></td>
				<td height="6" colspan="2" class="txt">&nbsp;</td>
			  </tr>
			  <tr>
				<td rowspan="2" class="txt"><strong>Actual Expenditure</strong></td>
				<td class="txt">Revenue</td>
				<td height="25" class="txt"><?php echo $sum_ae_rev_plan ;?></td>
				<td height="25" class="txt"><?php echo $sum_ae_rev_non_plan ;?></td>
				<td height="25" class="txt"><?php echo $sum_ae_rev_total ;?></td>
				<td rowspan="2" class="txt"><strong><?php echo $sum_ae_grand_total ;?></strong></td>
			  </tr>
			  <tr>
				<td class="txt">Capital</td>
				<td height="9" class="txt"><?php echo $sum_ae_cap_plan ;?></td>
				<td height="9" class="txt"><?php echo $sum_ae_cap_non_plan ;?></td>
				<td height="9" class="txt"><?php echo $sum_ae_cap_total ;?></td>
			  </tr>
			  <tr>
				<td height="30" colspan="2" class="txt"><strong>Total</strong></td>
				<td height="12" class="txt"><strong><?php echo $sum_ae_plan_total ;?></strong></td>
				<td height="12" class="txt"><strong><?php echo $sum_ae_non_plan_total ;?></strong></td>
				<td height="30" colspan="2">&nbsp;</td>
			  </tr>
			  <tr>
				<td height="30" colspan="8" align="center">&nbsp;&nbsp;<a href="export_report.php?fn=State Head Data Search">Download in Excel</a></td>
			</tr>
				<?php } ?>
			</table></td>
		  </tr>
		  <tr>
			<td colspan="3">&nbsp; </td>
		  </tr>
		</table></form> </td>
	  </tr>
	  <tr>
		<td align="left" valign="top" height="10"> </td>
	  </tr>
	  <tr>
		<td align="left" valign="top"></td>
	  </tr> 
	</table></td>
  </tr>
  <tr>
	<td colspan="2"><?php include ('includes/footer.php') ; ?></td>
  </tr>
</table>
</body>
</html>
<script language="JavaScript" type="text/javascript">
	var frmvalidator = new Validator("form1");
	frmvalidator.addValidation("state_id","req","Please Select State");
	frmvalidator.addValidation("bud_year","req","Please Select Year");
	frmvalidator.addValidation("head_id","req","Please Select Head");
	frmvalidator.addValidation("head_name","req","Please Select Head Name");
</script>