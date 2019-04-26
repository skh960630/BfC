<?php
	include ('includes/login_check.php');
	include ('conn.php');
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
		  <td align="right" valign="top" height="10" ><a href="main_state.php?page=report" class="back_menu"><strong>Report Page</strong></a>&nbsp; || &nbsp;<a href="home.php" class="back_menu"><strong>Home Page</strong></a>&nbsp;&nbsp;&nbsp;</td>
		</tr>
		<tr>
		  <td align="left" valign="top" height="10"> </td>
		</tr>
		<tr>
		  <td align="left" valign="top" >
		  <form name="form1" method="post" action="">
		  <table width="70%" align="center" border="0" cellspacing="2" cellpadding="1" bgcolor="#F1F4F7">
			<tr>
			  <td colspan="3">&nbsp; </td>
			</tr>
			<tr>
			  <td width="31%">&nbsp;</td>
			  <td width="36%" align="center" class="backheads"><strong>View Social Sector  </strong></td>
			  <td width="33%" align="right"><?php if($admin_level =='super'){ ?><a href="social_sec_entry.php" class="back_menu">Add Social Sector </a>&nbsp;&nbsp;<?php } ?></td>
			</tr>
			<tr>
			  <td colspan="3" align="right">(Figures are in Crores)&nbsp; </td>
			</tr>
			<tr>
			  <td colspan="3"><table width="100%" align="center" border="1" cellspacing="2" cellpadding="1" bgcolor="#F1F4F7">
			<tr>
			  <td colspan="2">&nbsp;&nbsp;&nbsp;Select Year :</td>
			  <td colspan="2" align="left">
			  <select name="bud_year">
				<option value="" selected>Select</option>
				<?
					$sel_year="select * from haq_year where year_status='active' order by year_id";
					$res_year=mysql_query($sel_year);
					while($fetch_year = mysql_fetch_array($res_year)){ ?>
				<option value="<?php echo $fetch_year['year_name']; ?>" ><?php echo $fetch_year['year_name'];?></option> 
				<? }?>
				  </select></td>
			  <td colspan="3" align="left"><input name="submit" type="submit" id="submit" value="Search">&nbsp;</td>
			  </tr>
<?php
			if (isset($_REQUEST['submit'])){ 
			$select_budget_report=mysql_query("select * from haq_budget_report_union where budget_year='".$_REQUEST['bud_year']."' and budget_type='social_sec' and social_sector_type='union' and budget_status='active'");
			
			$result_budget_report=mysql_fetch_array($select_budget_report);
			
?>	
	
				<tr>
				  <td height="25" colspan="7" class="txt"></td>
				</tr>
				<tr>
				  <td width="122" height="25" class="txt"><strong>Year </strong></td>
				  <td colspan="2" class="txt"><strong>Investment</strong></td>
				  <td width="75" height="25" class="txt"><strong>Plan</strong></td>
				  <td width="93" height="25" class="txt"><strong>Non Plan </strong></td>
				  <td width="121" height="25" class="txt"><strong>Total</strong></td>
				  <td width="180" height="25" class="txt"><strong>GT</strong></td>
				</tr>
				<tr>
				  <td rowspan="9" class="txt"><strong><?php echo $result_budget_report['budget_year'] ; ?></strong></td>
				  <td width="128" rowspan="2" class="txt"><strong>Budget Estimate</strong></td>
				  <td width="93" class="txt">Revenue</td>
				  <td height="25" class="txt"><?php echo $result_budget_report['budget_be_revenue_plan'] ;?></td>
				  <td height="25" class="txt"><?php echo $result_budget_report['budget_be_revenue_non_plan'] ;?></td>
				  <td height="25" class="txt"><?php echo $result_budget_report['budget_be_revenue_total'] ;?></td>
				  <td rowspan="2" class="txt"><strong><?php echo $result_budget_report['budget_be_grand_total'] ;?></strong></td>
				</tr>
				<tr>
				  <td class="txt">Capital</td>
				  <td height="9" class="txt"><?php echo $result_budget_report['budget_be_capital_plan'] ;?></td>
				  <td height="9" class="txt"><?php echo $result_budget_report['budget_be_capital_non_plan'] ;?></td>
				  <td height="9" class="txt"><?php echo $result_budget_report['budget_be_capital_total'] ;?></td>
				  </tr>
				<tr>
				  <td colspan="2" class="txt"><strong>Total</strong></td>
				  <td height="12" class="txt"><strong><?php echo $result_budget_report['budget_be_plan_total'] ;?></strong></td>
				  <td height="12" class="txt"><strong><?php echo $result_budget_report['budget_be_non_plan_total'] ;?></strong></td>
				  <td height="12" colspan="2" class="txt">&nbsp;</td>
				  </tr>
				<tr>
				  <td rowspan="2" class="txt"><strong>Revised Estimate</strong></td>
				  <td class="txt">Revenue</td>
				  <td height="25" class="txt"><?php echo $result_budget_report['budget_re_revenue_plan'] ;?></td>
				  <td height="25" class="txt"><?php echo $result_budget_report['budget_re_revenue_non_plan'] ;?></td>
				  <td height="25" class="txt"><?php echo $result_budget_report['budget_re_revenue_total'] ;?></td>
				  <td rowspan="2" class="txt"><strong><?php echo $result_budget_report['budget_re_grand_total'] ;?></strong></td>
				</tr>
				<tr>
				  <td class="txt">Capital</td>
				  <td height="9" class="txt"><?php echo $result_budget_report['budget_re_capital_plan'] ;?></td>
				  <td height="9" class="txt"><?php echo $result_budget_report['budget_re_capital_non_plan'] ;?></td>
				  <td height="9" class="txt"><?php echo $result_budget_report['budget_re_capital_total'] ;?></td>
				  </tr>
				<tr>
				  <td colspan="2" class="txt"><strong>Total</strong></td>
				  <td height="12" class="txt"><strong><?php echo $result_budget_report['budget_re_plan_total'] ;?></strong></td>
				  <td height="12" class="txt"><strong><?php echo $result_budget_report['budget_re_non_plan_total'] ;?></strong></td>
				  <td height="6" colspan="2" class="txt">&nbsp;</td>
				  </tr>
				<tr>
				  <td rowspan="2" class="txt"><strong>Actual Expenditure</strong></td>
				  <td class="txt">Revenue</td>
				  <td height="25" class="txt"><?php echo $result_budget_report['budget_ae_revenue_plan'] ;?></td>
				  <td height="25" class="txt"><?php echo $result_budget_report['budget_ae_revenue_non_plan'] ;?></td>
				  <td height="25" class="txt"><?php echo $result_budget_report['budget_ae_revenue_total'] ;?></td>
				  <td rowspan="2" class="txt"><strong><?php echo $result_budget_report['budget_ae_grand_total'] ;?></strong></td>
				</tr>
				<tr>
				  <td class="txt">Capital</td>
				  <td height="9" class="txt"><?php echo $result_budget_report['budget_ae_capital_plan'] ;?></td>
				  <td height="9" class="txt"><?php echo $result_budget_report['budget_ae_capital_non_plan'] ;?></td>
				  <td height="9" class="txt"><?php echo $result_budget_report['budget_ae_capital_total'] ;?></td>
				  </tr>
				<tr>
				  <td height="30" colspan="2" class="txt"><strong>Total</strong></td>
				  <td height="12" class="txt"><strong><?php echo $result_budget_report['budget_ae_plan_total'] ;?></strong></td>
				  <td height="12" class="txt"><strong><?php echo $result_budget_report['budget_ae_non_plan_total'] ;?></strong></td>
				  <td height="30" colspan="2">&nbsp;</td>
				  </tr>
				<tr>
				  <td height="30" colspan="6">&nbsp;</td>
				  <td height="30"><?php if($admin_level =='super'){ ?>&nbsp;&nbsp;&nbsp;<a href="social_sec_edit.php?main_budget_id=<?php echo $result_budget_report['main_budget_id'] ; ?>"  class="back_menu">Edit</a><?php } ?></td>
				</tr>
				<?php } ?>
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
</script>