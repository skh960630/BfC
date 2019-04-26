<?php
	include ('includes/login_check.php');
	include ('conn.php');
	if (isset($_REQUEST['submit'])){ 
		$select_year=mysql_query("select * from haq_year where year_name='".$_REQUEST['bud_year']."'");
		$result_year=mysql_fetch_array($select_year);
		$s_query=mysql_query("select * from haq_budget_report_union where budget_year='".$_REQUEST['bud_year']."' and budget_status='active' and budget_type='social_sec' and social_sector_type='state' and state_id='".$_REQUEST['state_id']."'");
		$f_query=mysql_num_rows($s_query);
		if($f_query !=0){
			$sel_state=mysql_fetch_array(mysql_query("select * from haq_state where state_id='".$_REQUEST['state_id']."'"));
			$error= "Sorry, The Social Sector Budget for " .$sel_state['state_name']. " for Year ' " . $_REQUEST['bud_year'] . " ' already exist.";
		} else {
		
		$be_rev_total= $_REQUEST['rev_be_plan'] + $_REQUEST['rev_be_nplan'];
		$be_cap_total= $_REQUEST['cap_be_plan'] + $_REQUEST['cap_be_nplan']; 
		$be_grnd_total= $be_rev_total + $be_cap_total;
		$re_rev_total= $_REQUEST['rev_re_plan'] + $_REQUEST['rev_re_nplan'];   
		$re_cap_total= $_REQUEST['cap_re_plan'] + $_REQUEST['cap_re_nplan']; 
		$re_grnd_total= $re_rev_total + $re_cap_total;
		$ae_rev_total= $_REQUEST['rev_ae_plan'] + $_REQUEST['rev_ae_nplan']; 
		$ae_cap_total= $_REQUEST['cap_ae_plan'] + $_REQUEST['cap_ae_nplan']; 
		$ae_grnd_total= $ae_rev_total + $ae_cap_total;
		$be_plan_total= $_REQUEST['rev_be_plan'] + $_REQUEST['cap_be_plan'];
		$be_nplan_total= $_REQUEST['rev_be_nplan'] + $_REQUEST['cap_be_nplan'];
		$re_plan_total= $_REQUEST['rev_re_plan'] + $_REQUEST['cap_re_plan'];
		$re_nplan_total= $_REQUEST['rev_re_nplan'] + $_REQUEST['cap_re_nplan'];
		$ae_plan_total= $_REQUEST['rev_ae_plan'] + $_REQUEST['cap_ae_plan'];
		$ae_nplan_total= $_REQUEST['rev_ae_nplan'] + $_REQUEST['cap_ae_nplan'];
		
		
		$insert_budget="INSERT INTO haq_budget_report_union(
		budget_status, budget_year, budget_year_code, budget_type, social_sector_type, state_id, 
		budget_be_revenue_plan, budget_be_revenue_non_plan, budget_be_revenue_total, 
		budget_be_capital_plan, budget_be_capital_non_plan, budget_be_capital_total, 
		budget_be_plan_total, budget_be_non_plan_total, budget_be_grand_total, 
		budget_re_revenue_plan, budget_re_revenue_non_plan, budget_re_revenue_total, 
		budget_re_capital_plan, budget_re_capital_non_plan, budget_re_capital_total, 
		budget_re_plan_total, budget_re_non_plan_total, budget_re_grand_total, 
		budget_ae_revenue_plan, budget_ae_revenue_non_plan, budget_ae_revenue_total, 
		budget_ae_capital_plan, budget_ae_capital_non_plan, budget_ae_capital_total, 
		budget_ae_plan_total, budget_ae_non_plan_total, budget_ae_grand_total) 
		VALUES(
		'active', '".$_REQUEST['bud_year']."', '".$result_year['year_code']."', 'social_sec', 'state', '".$_REQUEST['state_id']."',  
		'".$_REQUEST['rev_be_plan']."', '".$_REQUEST['rev_be_nplan']."', '".$be_rev_total."', 
		'".$_REQUEST['cap_be_plan']."', '".$_REQUEST['cap_be_nplan']."', '".$be_cap_total."', 
		'".$be_plan_total."', '".$be_nplan_total."', '".$be_grnd_total."', 
		'".$_REQUEST['rev_re_plan']."', '".$_REQUEST['rev_re_nplan']."', '".$re_rev_total."', 
		'".$_REQUEST['cap_re_plan']."', '".$_REQUEST['cap_re_nplan']."', '".$re_cap_total."', 
		'".$re_plan_total."', '".$re_nplan_total."', '".$re_grnd_total."', 
		'".$_REQUEST['rev_ae_plan']."', '".$_REQUEST['rev_ae_nplan']."', '".$ae_rev_total."', 
		'".$_REQUEST['cap_ae_plan']."', '".$_REQUEST['cap_ae_nplan']."', '".$ae_cap_total."', 
		'".$ae_plan_total."', '".$ae_nplan_total."', '".$ae_grnd_total."')";
		$result_budget=mysql_query($insert_budget);
			if($result_budget){
			echo "<meta http-equiv='Refresh' content='0; url=st_sector.php'>";
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
		  <td align="right" valign="top" height="10" ><a href="main_state.php?page=report" class="back_menu"><strong>Report Page </strong></a>&nbsp; || &nbsp;<a href="home.php" class="back_menu">Home Page </a>&nbsp;&nbsp;&nbsp;</td>
		</tr>
		<tr>
		  <td align="left" valign="top" height="10"> </td>
		</tr>
		<tr>
		  <td align="left" valign="top" >
		  <form name="form1" method="post" action="">
		  <table width="50%" align="center" border="0" cellspacing="2" cellpadding="1" bgcolor="#F1F4F7">
			<tr>
			  <td colspan="3">&nbsp; </td>
			</tr>
			<tr>
			  <td width="25%">&nbsp;</td>
			  <td width="34%" align="center" class="backheads"><strong>Social Sector Entry (State) </strong></td>
			  <td width="41%" align="right"><a href="st_sector.php" class="back_menu">View Social Sector </a>&nbsp;&nbsp;</td>
			</tr>
			<tr>
			  <td colspan="3" align="right">(Figures are in Crores)&nbsp; </td>
			</tr>
			<tr>
			  <td colspan="3"><table width="100%" align="center" border="1" cellspacing="2" cellpadding="1" bgcolor="#F1F4F7">
			<tr>
			  <td colspan="5" align="center" class="Error">&nbsp;<?php echo $error; ?></td>
			</tr>
			<tr>
			  <td colspan="2">&nbsp;&nbsp;&nbsp;State :</td>
			  <td colspan="3" align="left">
			  <select name="state_id">
				<option value="" selected>Select</option>
				<?php
					if($admin_level=='sub'){
						$sub_query="and state_id='".$user_state_id."'";
					}else if($admin_level=='super'){
						$sub_query=" ";
					}
					$sel_state="select * from haq_state where state_status='active' $sub_query order by state_name";
					$res_state=mysql_query($sel_state);
					while($fetch_state = mysql_fetch_array($res_state)){ ?>
				<option value="<?php echo $fetch_state['state_id']; ?>" ><?php echo $fetch_state['state_name'];?></option> 
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
			  <td width="20%" align="left"><div align="center"><span class="txt"><strong>Budget Estimate</strong></span></div></td>
			  <td width="22%" align="left"><div align="center"><span class="txt"><strong>Revised Estimate</strong></span></div></td>
			  <td width="22%" align="left"><div align="center"><span class="txt"><strong>Actual Expenditure</strong></span></div></td>
			</tr>
			<tr>
			  <td width="17%" rowspan="2">&nbsp;&nbsp;&nbsp;Revenue</td>
			  <td width="19%">&nbsp;Plan :</td>
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
frmvalidator.addValidation("state_id","req","Please Select State");
</script>