<?php
	include ('includes/login_check.php');
	include ('includes/admin_check.php');
	include ('conn.php');
	$fetch_query=mysql_query("select * from haq_budget_report_union where main_budget_id='".$_REQUEST['main_budget_id']."' and budget_type='union' and social_sector_type='na'");
	$fetch_result=mysql_fetch_array($fetch_query);
	$fetch_year=$_REQUEST['budget_year'];

	if (isset($_REQUEST['submit'])){ 
	
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
		
		
		$update_budget="
		Update haq_budget_report_union set 
		budget_be_revenue_plan='".$_REQUEST['rev_be_plan']."', budget_be_revenue_non_plan='".$_REQUEST['rev_be_nplan']."', 
		budget_be_revenue_total='".$be_rev_total."', budget_be_capital_plan='".$_REQUEST['cap_be_plan']."', 
		budget_be_capital_non_plan='".$_REQUEST['cap_be_nplan']."', budget_be_capital_total='".$be_cap_total."', 
		budget_be_plan_total='".$be_plan_total."', budget_be_non_plan_total='".$be_nplan_total."', 
		budget_be_grand_total='".$be_grnd_total."', budget_re_revenue_plan='".$_REQUEST['rev_re_plan']."', 
		budget_re_revenue_non_plan='".$_REQUEST['rev_re_nplan']."', budget_re_revenue_total='".$re_rev_total."', 
		budget_re_capital_plan='".$_REQUEST['cap_re_plan']."', budget_re_capital_non_plan='".$_REQUEST['cap_re_nplan']."', 
		budget_re_capital_total='".$re_cap_total."', budget_re_plan_total='".$re_plan_total."', 
		budget_re_non_plan_total='".$re_nplan_total."', budget_re_grand_total='".$re_grnd_total."', 
		budget_ae_revenue_plan='".$_REQUEST['rev_ae_plan']."', budget_ae_revenue_non_plan='".$_REQUEST['rev_ae_nplan']."', 
		budget_ae_revenue_total='".$ae_rev_total."', budget_ae_capital_plan='".$_REQUEST['cap_ae_plan']."', 
		budget_ae_capital_non_plan='".$_REQUEST['cap_ae_nplan']."', budget_ae_capital_total='".$ae_cap_total."', 
		budget_ae_plan_total='".$ae_plan_total."', budget_ae_non_plan_total='".$ae_nplan_total."', 
		budget_ae_grand_total='".$ae_grnd_total."' where main_budget_id='".$_REQUEST['main_budget_id']."'";
		$result_budget=mysql_query($update_budget);
			if($result_budget){
			echo "<meta http-equiv='Refresh' content='0; url=union_budget.php'>";
			exit;
			}else{ 
				$error= "Record could not be added" ; }
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
		  <td align="right" valign="top" height="10" ><a href="main_union.php?page=report" class="back_menu"><strong>Report Page </strong></a>&nbsp; || &nbsp;<a href="home.php" class="back_menu">Home Page </a>&nbsp;&nbsp;&nbsp;</td>
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
			  <td width="34%" align="center" class="backheads"><strong>Edit Union Budget</strong></td>
			  <td width="41%" align="right"><a href="union_budget.php" class="back_menu">View Union Budget</a>&nbsp;&nbsp;</td>
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
			  <td colspan="2">&nbsp;&nbsp;&nbsp;Year :</td>
			  <td colspan="3" align="left"><?php echo $fetch_result['budget_year'] ; ?></td>
			</tr>
			<tr>
			  <td colspan="2">&nbsp;&nbsp;&nbsp;Budget Type :</td>
			  <td width="21%" align="left"><div align="center"><span class="txt"><strong>Budget Estimate</strong></span></div></td>
			  <td width="20%" align="left"><div align="center"><span class="txt"><strong>Revised Estimate</strong></span></div></td>
			  <td width="22%" align="left"><div align="center"><span class="txt"><strong>Actual Expenditure</strong></span></div></td>
			</tr>
			<tr>
			  <td width="17%" rowspan="2">&nbsp;&nbsp;&nbsp;Revenue</td>
			  <td width="20%">&nbsp;Plan :</td>
			  <td align="left"><input name="rev_be_plan" type="text" value="<?php echo $fetch_result['budget_be_revenue_plan'] ; ?>" size="20"></td>
			  <td align="left"><input name="rev_re_plan" type="text" value="<?php echo $fetch_result['budget_re_revenue_plan'] ; ?>" size="20"></td>
			  <td align="left"><input name="rev_ae_plan" type="text" value="<?php echo $fetch_result['budget_ae_revenue_plan'] ; ?>" size="20"></td>
			</tr>
			<tr>
			  <td>&nbsp;Non Plan :</td>
			  <td align="left"><input name="rev_be_nplan" type="text" value="<?php echo $fetch_result['budget_be_revenue_non_plan'] ; ?>" size="20"></td>
			  <td align="left"><input name="rev_re_nplan" type="text" value="<?php echo $fetch_result['budget_re_revenue_non_plan'] ; ?>" size="20"></td>
			  <td align="left"><input name="rev_ae_nplan" type="text" value="<?php echo $fetch_result['budget_ae_revenue_non_plan'] ; ?>" size="20"></td>
			</tr>
			<tr>
			  <td rowspan="2">&nbsp;&nbsp;&nbsp;Capital</td>
			  <td>&nbsp;Plan :</td>
			  <td align="left"><input name="cap_be_plan" type="text" value="<?php echo $fetch_result['budget_be_capital_plan'] ; ?>" size="20"></td>
			  <td align="left"><input name="cap_re_plan" type="text" value="<?php echo $fetch_result['budget_re_capital_plan'] ; ?>" size="20"></td>
			  <td align="left"><input name="cap_ae_plan" type="text" value="<?php echo $fetch_result['budget_ae_capital_plan'] ; ?>" size="20"></td>
			</tr>
			<tr>
			  <td>&nbsp;Non Plan :</td>
			  <td align="left"><input name="cap_be_nplan" type="text" value="<?php echo $fetch_result['budget_be_capital_non_plan'] ; ?>" size="20"></td>
			  <td align="left"><input name="cap_re_nplan" type="text" value="<?php echo $fetch_result['budget_re_capital_non_plan'] ; ?>" size="20"></td>
			  <td align="left"><input name="cap_ae_nplan" type="text" value="<?php echo $fetch_result['budget_ae_capital_non_plan'] ; ?>" size="20"></td>
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