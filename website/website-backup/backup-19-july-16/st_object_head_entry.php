<?php
	include ('includes/login_check.php');
	include ('conn.php');
		if($admin_level=='sub'){
			$sub_query="and state_id='".$user_state_id."'";
		}else if($admin_level=='super'){
			$sub_query=" ";
		}

		$select_object_head=mysql_query("select * from haq_st_object_head where object_head_id='".$_REQUEST['object_headid']."' $sub_query");
		$fetch_object_head=mysql_fetch_array($select_object_head);

	if (isset($_REQUEST['submit'])){ 

		$select_year=mysql_query("select * from haq_year where year_name='".$_REQUEST['bud_year']."'");
		$result_year=mysql_fetch_array($select_year);


		$s_query=mysql_query("select * from haq_head_expend_state where expend_year='".$_REQUEST['bud_year']."' and expend_status='active' and major_head_id='".$fetch_object_head['major_head_id']."' and sub_major_head_id='".$fetch_object_head['sub_major_head_id']."' and minor_head_id='".$fetch_object_head['minor_head_id']."' and gen_head_id='".$fetch_object_head['gen_head_id']."' and sub_head_id='".$fetch_object_head['sub_head_id']."' and detail_head_id='".$fetch_object_head['detail_head_id']."' and object_head_id='".$fetch_object_head['object_head_id']."'");
		$f_query=mysql_num_rows($s_query);
		if($f_query !=0){
			$error= "Sorry, Entry for same Object Head for Year ' " . $_REQUEST['bud_year'] . " ' already exist.";
		} else {
		
		$be_rev_total= $_REQUEST['rev_be_plan'] + $_REQUEST['rev_be_nplan'];
		$be_cap_total= $_REQUEST['cap_be_plan'] + $_REQUEST['cap_be_nplan']; 
		$be_debt_total= $_REQUEST['debt_be_plan'] + $_REQUEST['debt_be_nplan']; 
		$be_grnd_total= $be_rev_total + $be_cap_total + $be_debt_total;
		$re_rev_total= $_REQUEST['rev_re_plan'] + $_REQUEST['rev_re_nplan'];   
		$re_cap_total= $_REQUEST['cap_re_plan'] + $_REQUEST['cap_re_nplan']; 
		$re_debt_total= $_REQUEST['debt_re_plan'] + $_REQUEST['debt_re_nplan']; 
		$re_grnd_total= $re_rev_total + $re_cap_total + $re_debt_total;
		$ae_rev_total= $_REQUEST['rev_ae_plan'] + $_REQUEST['rev_ae_nplan']; 
		$ae_cap_total= $_REQUEST['cap_ae_plan'] + $_REQUEST['cap_ae_nplan']; 
		$ae_debt_total= $_REQUEST['debt_ae_plan'] + $_REQUEST['debt_ae_nplan']; 
		$ae_grnd_total= $ae_rev_total + $ae_cap_total + $ae_debt_total;
		$be_plan_total= $_REQUEST['rev_be_plan'] + $_REQUEST['cap_be_plan'] + $_REQUEST['debt_be_plan'];
		$be_nplan_total= $_REQUEST['rev_be_nplan'] + $_REQUEST['cap_be_nplan'] + $_REQUEST['debt_be_nplan'];
		$re_plan_total= $_REQUEST['rev_re_plan'] + $_REQUEST['cap_re_plan'] + $_REQUEST['debt_re_plan'];
		$re_nplan_total= $_REQUEST['rev_re_nplan'] + $_REQUEST['cap_re_nplan'] + $_REQUEST['debt_re_nplan'];
		$ae_plan_total= $_REQUEST['rev_ae_plan'] + $_REQUEST['cap_ae_plan'] + $_REQUEST['debt_ae_plan'];
		$ae_nplan_total= $_REQUEST['rev_ae_nplan'] + $_REQUEST['cap_ae_nplan'] + $_REQUEST['debt_ae_nplan'];

		
		
		$insert_budget="INSERT INTO haq_head_expend_state(
		expend_status, expend_year, expend_year_code,  
		be_rev_plan, be_rev_non_plan, be_rev_total,
		be_cap_plan, be_cap_non_plan, be_cap_total, 
		be_debt_plan, be_debt_non_plan, be_debt_total,
		be_plan_total, be_non_plan_total, be_grand_total, 
		re_rev_plan, re_rev_non_plan, re_rev_total, 
		re_cap_plan, re_cap_non_plan, re_cap_total, 
		re_debt_plan, re_debt_non_plan, re_debt_total, 
		re_plan_total, re_non_plan_total, re_grand_total, 
		ae_rev_plan, ae_rev_non_plan, ae_rev_total, 
		ae_cap_plan, ae_cap_non_plan, ae_cap_total, 
		ae_debt_plan, ae_debt_non_plan, ae_debt_total, 
		ae_plan_total, ae_non_plan_total, ae_grand_total, 
		major_head_id, sub_major_head_id, minor_head_id, gen_head_id, sub_head_id, detail_head_id, object_head_id, program_id, sector_id, state_id) 
		VALUES(
		'active', '".$_REQUEST['bud_year']."', '".$result_year['year_code']."', 
		'".$_REQUEST['rev_be_plan']."', '".$_REQUEST['rev_be_nplan']."', '".$be_rev_total."', 
		'".$_REQUEST['cap_be_plan']."', '".$_REQUEST['cap_be_nplan']."', '".$be_cap_total."', 
		'".$_REQUEST['debt_be_plan']."', '".$_REQUEST['debt_be_nplan']."', '".$be_debt_total."', 
		'".$be_plan_total."', '".$be_nplan_total."', '".$be_grnd_total."', 
		'".$_REQUEST['rev_re_plan']."', '".$_REQUEST['rev_re_nplan']."', '".$re_rev_total."', 
		'".$_REQUEST['cap_re_plan']."', '".$_REQUEST['cap_re_nplan']."', '".$re_cap_total."', 
		'".$_REQUEST['debt_re_plan']."', '".$_REQUEST['debt_re_nplan']."', '".$re_debt_total."', 
		'".$re_plan_total."', '".$re_nplan_total."', '".$re_grnd_total."', 
		'".$_REQUEST['rev_ae_plan']."', '".$_REQUEST['rev_ae_nplan']."', '".$ae_rev_total."', 
		'".$_REQUEST['cap_ae_plan']."', '".$_REQUEST['cap_ae_nplan']."', '".$ae_cap_total."', 
		'".$_REQUEST['debt_ae_plan']."', '".$_REQUEST['debt_ae_nplan']."', '".$ae_debt_total."', 
		'".$ae_plan_total."', '".$ae_nplan_total."', '".$ae_grnd_total."', 
		'".$fetch_object_head['major_head_id']."', '".$fetch_object_head['sub_major_head_id']."', '".$fetch_object_head['minor_head_id']."', '".$fetch_object_head['gen_head_id']."', '".$fetch_object_head['sub_head_id']."', '".$fetch_object_head['detail_head_id']."', '".$fetch_object_head['object_head_id']."', '".$_REQUEST['program_name']."', '".$fetch_object_head['sector_id']."', '".$fetch_object_head['state_id']."')";
		$result_budget=mysql_query($insert_budget);
		$update_program=mysql_query("update haq_st_major_head set program_id='".$_REQUEST['program_name']."' where major_head_id='".$fetch_object_head['major_head_id']."'");
			if($result_budget){
			echo "<meta http-equiv='Refresh' content='0; url=st_object_head.php?level=state'>";
			exit;
			}else{ 
				$error= "Record could not be added" ; }
			}

	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="stylesheet/main.css">

</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" background="images/Picture1.jpg">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
	<tr>
	  <td colspan="2" align="center"><?php include('includes/header.php') ; ?>
      </td>
	</tr>
	<tr>
	  <td colspan="2" class="text12">
	  <table width="100%"  border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
		<tr>
		  <td align="right" valign="top" height="10" ><a href="acronyms.php" class="back_menu" target="_blank"><strong>Acronyms</strong></a>&nbsp; || &nbsp;<a href="main_state.php?page=entry" class="back_menu"><strong>Data Entry </strong></a>&nbsp; || &nbsp;<a href="home.php" class="back_menu">Home Page </a>&nbsp;&nbsp;&nbsp;</td>
		</tr>
		<tr>
		  <td align="left" valign="top" height="10"> </td>
		</tr>
		<tr>
		  <td align="left" valign="top" >
		  <form name="form1" method="post" action="">
		  <table width="56%" align="center" border="0" cellspacing="2" cellpadding="1" bgcolor="#F1F4F7">
			<tr>
			  <td colspan="3">&nbsp; </td>
			</tr>
			<tr>
			  <td width="29%">&nbsp;</td>
			  <td width="34%" align="center" class="backheads">Object  Head Entry </td>
			  <td width="37%" align="right"><a href="vi_object_head_entry.php?object_headid=<?php echo $_REQUEST['object_headid'] ; ?>" class="back_menu">VI Schedule Entry</a>&nbsp;&nbsp;<a href="st_object_head.php" class="back_menu">View Object Head</a>&nbsp;&nbsp;</td>
			</tr>
			<tr>
			  <td colspan="3" align="right">(Figures are in Thousands)&nbsp; </td>
			</tr>
			<tr>
			  <td colspan="3"><table width="100%" align="center" border="1" cellspacing="2" cellpadding="1" bgcolor="#F1F4F7">
			<tr>
			  <td colspan="5" align="center" class="Error">&nbsp;<?php echo $error; ?></td>
			</tr>
			<tr>
			  <td colspan="2">&nbsp;&nbsp;&nbsp;Programme Name :</td>
			  <td colspan="3" align="left"><select name="program_name">
				<option value="" selected>Select</option>
				<?
					$sel_prog="select * from haq_st_program where program_status='active' and sector_id='".$fetch_object_head['sector_id']."' and program_state_id='".$fetch_object_head['state_id']."' order by program_id";
					$res_prog=mysql_query($sel_prog);
					while($fetch_prog = mysql_fetch_array($res_prog)){ ?>
				<option value="<?php echo $fetch_prog['program_id']; ?>" ><?php echo $fetch_prog['program_name'];?></option> 
				<? }?>
				  </select></td>
			</tr>
			<tr>
			  <td colspan="2">&nbsp;&nbsp;&nbsp;Year :</td>
			  <td colspan="3" align="left">
			  <select name="bud_year">
				<option value="" selected>Select</option>
				<?
					$sel_year="select * from haq_year where year_status='active' order by year_id";
					$res_year=mysql_query($sel_year);
					while($fetch_year = mysql_fetch_array($res_year)){ ?>
				<option value="<?php echo $fetch_year['year_name']; ?>" ><?php echo $fetch_year['year_name'];?></option> 
				<? }?>
				  </select></td>
			</tr>
			<tr>
			  <td colspan="2">&nbsp;&nbsp;&nbsp;Budget Type :</td>
			  <td width="22%" align="left"><div align="center"><span class="txt"><strong>Budget Estimate</strong></span></div></td>
			  <td width="22%" align="left"><div align="center"><span class="txt"><strong>Revised Estimate</strong></span></div></td>
			  <td width="21%" align="left"><div align="center"><span class="txt"><strong>Actual Expenditure</strong></span></div></td>
			</tr>
			<tr>
			  <td width="20%" rowspan="2">&nbsp;&nbsp;&nbsp;Revenue</td>
			  <td width="15%">&nbsp;Plan :</td>
			  <td align="left"><input name="rev_be_plan" type="text" value="" size="20"></td>
			  <td align="left"><input name="rev_re_plan" type="text" value="" size="20"></td>
			  <td align="left"><input name="rev_ae_plan" type="text" value="" size="20"></td>
			</tr>
			<tr>
			  <td>&nbsp;Non Plan :</td>
			  <td align="left"><input name="rev_be_nplan" type="text" value="" size="20"></td>
			  <td align="left"><input name="rev_re_nplan" type="text" value="" size="20"></td>
			  <td align="left"><input name="rev_ae_nplan" type="text" value="" size="20"></td>
			</tr>
			<tr>
			  <td rowspan="2">&nbsp;&nbsp;&nbsp;Capital</td>
			  <td>&nbsp;Plan :</td>
			  <td align="left"><input name="cap_be_plan" type="text" value="" size="20"></td>
			  <td align="left"><input name="cap_re_plan" type="text" value="" size="20"></td>
			  <td align="left"><input name="cap_ae_plan" type="text" value="" size="20"></td>
			</tr>
			<tr>
			  <td>&nbsp;Non Plan :</td>
			  <td align="left"><input name="cap_be_nplan" type="text" value="" size="20"></td>
			  <td align="left"><input name="cap_re_nplan" type="text" value="" size="20"></td>
			  <td align="left"><input name="cap_ae_nplan" type="text" value="" size="20"></td>
			</tr>
			<tr>
			  <td rowspan="2">&nbsp;&nbsp;&nbsp;Debt Expenditure</td>
			  <td>&nbsp;Plan :</td>
			  <td align="left"><input name="debt_be_plan" type="text" value="" size="20"></td>
			  <td align="left"><input name="debt_re_plan" type="text" value="" size="20"></td>
			  <td align="left"><input name="debt_ae_plan" type="text" value="" size="20"></td>
			</tr>
			<tr>
			  <td>&nbsp;Non Plan :</td>
			  <td align="left"><input name="debt_be_nplan" type="text" value="" size="20"></td>
			  <td align="left"><input name="debt_re_nplan" type="text" value="" size="20"></td>
			  <td align="left"><input name="debt_ae_nplan" type="text" value="" size="20"></td>
			</tr>
			<tr>
			  <td colspan="5" align="center">
			    <input type="submit" id="submit" name="submit" value="Submit">			    
			    <input type="reset" name="Submit2" value="Reset">
			  </td>
			  </tr>
		  </table></td>
			</tr>
			<tr>
			  <td colspan="3">&nbsp; </td>
			</tr>
		  </table>
		  </form> </td>
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
	  <td colspan="2"><?php include ('includes/footer.php') ; ?>
	  </td>
    </tr>
  </table>
</body>
</html>
<script language="JavaScript" type="text/javascript">
var frmvalidator = new Validator("form1");
frmvalidator.addValidation("bud_year","req","Please Select Year");
frmvalidator.addValidation("program_name","req","Please enter Programme Name");
</script>