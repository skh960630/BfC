<?php
	include ('includes/login_check.php');
	include ('conn.php');
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
		  <td align="right" valign="top" height="10" ><a href="main_state.php?page=report" class="back_menu"><strong>Report Page </strong></a>&nbsp; || &nbsp;<a href="home.php" class="back_menu">Home Page </a>&nbsp;&nbsp;&nbsp;</td>
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
			  <td width="36%" align="center" class="backheads">View State Budget</td>
			  <td width="33%" align="right"><a href="state_budget_entry.php" class="back_menu">Add State Budget</a>&nbsp;&nbsp;</td>
			</tr>
			<tr>
			  <td colspan="3" align="right">(Figures are in Crores)&nbsp; </td>
			</tr>
			<tr>
			  <td colspan="3"><table width="100%" align="center" border="1" cellspacing="2" cellpadding="1" bgcolor="#F1F4F7">
			<tr>
			  <td colspan="2">&nbsp;&nbsp;&nbsp;Select State :</td>
			  <td colspan="5" align="left">
			  <select name="state_id">
				<option value="" selected>Select</option>
				<?php
					$sel_state="select * from haq_state where state_status='active' order by state_name";
					$res_state=mysql_query($sel_state);
					while($fetch_state = mysql_fetch_array($res_state)){ ?>
				<option value="<?php echo $fetch_state['state_id']; ?>" ><?php echo $fetch_state['state_name'];?></option> 
				<? }?>
				  </select>&nbsp;</td>
			  </tr>
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
			$select_budget_report=mysql_query("select * from haq_budget_report_union where budget_year='".$_REQUEST['bud_year']."' and state_id='".$_REQUEST['state_id']."' and budget_type='state' and budget_status='active'");
			$result_budget_report=mysql_fetch_array($select_budget_report);

					$disp_state="select state_name from haq_state where state_status='active' and state_id='".$_REQUEST['state_id']."'";
					$disp_state_name=mysql_query($disp_state);
					$fetch_state_name = mysql_fetch_array($disp_state_name);
					
			
// For Excel File Generation
			unset($_SESSION['report_header']);
			unset($_SESSION['report_values']);
			$_SESSION['report_header']=array("State Budget"," "," "," "," "," "); 
				$i=0;
				$_SESSION['report_values'][$i][0]=Year."-".$result_budget_report['budget_year'];
				$_SESSION['report_values'][$i][1]=" ";
				$_SESSION['report_values'][$i][2]=State."-".$fetch_state_name['state_name'];
				$_SESSION['report_values'][$i][3]=" ";
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
				$_SESSION['report_values'][$i][2]=$result_budget_report['budget_be_revenue_plan']." ";
				$_SESSION['report_values'][$i][3]=$result_budget_report['budget_be_revenue_non_plan']." ";
				$_SESSION['report_values'][$i][4]=$result_budget_report['budget_be_revenue_total']." ";
				$_SESSION['report_values'][$i][5]=$result_budget_report['budget_be_grand_total']." ";
				$i=3;
				$_SESSION['report_values'][$i][0]="  ";
				$_SESSION['report_values'][$i][1]=Capital." ";
				$_SESSION['report_values'][$i][2]=$result_budget_report['budget_be_capital_plan']." ";
				$_SESSION['report_values'][$i][3]=$result_budget_report['budget_be_capital_non_plan']." ";
				$_SESSION['report_values'][$i][4]=$result_budget_report['budget_be_capital_total']." ";
				$_SESSION['report_values'][$i][5]=" ";
				$i=4;
				$_SESSION['report_values'][$i][0]=Total."  ";
				$_SESSION['report_values'][$i][1]=" ";
				$_SESSION['report_values'][$i][2]=$result_budget_report['budget_be_plan_total']." ";
				$_SESSION['report_values'][$i][3]=$result_budget_report['budget_be_non_plan_total']." ";
				$_SESSION['report_values'][$i][4]=" ";
				$_SESSION['report_values'][$i][5]=" ";
				$i=5;
				$_SESSION['report_values'][$i][0]=Revised." ".Estimate." ";
				$_SESSION['report_values'][$i][1]=Revenue." ";
				$_SESSION['report_values'][$i][2]=$result_budget_report['budget_re_revenue_plan']." ";
				$_SESSION['report_values'][$i][3]=$result_budget_report['budget_re_revenue_non_plan']." ";
				$_SESSION['report_values'][$i][4]=$result_budget_report['budget_re_revenue_total']." ";
				$_SESSION['report_values'][$i][5]=$result_budget_report['budget_re_grand_total']." ";
				$i=6;
				$_SESSION['report_values'][$i][0]="  ";
				$_SESSION['report_values'][$i][1]=Capital." ";
				$_SESSION['report_values'][$i][2]=$result_budget_report['budget_re_capital_plan']." ";
				$_SESSION['report_values'][$i][3]=$result_budget_report['budget_re_capital_non_plan']." ";
				$_SESSION['report_values'][$i][4]=$result_budget_report['budget_re_capital_total']." ";
				$_SESSION['report_values'][$i][5]=" ";
				$i=7;
				$_SESSION['report_values'][$i][0]=Total."  ";
				$_SESSION['report_values'][$i][1]=" ";
				$_SESSION['report_values'][$i][2]=$result_budget_report['budget_re_plan_total']." ";
				$_SESSION['report_values'][$i][3]=$result_budget_report['budget_re_non_plan_total']." ";
				$_SESSION['report_values'][$i][4]=" ";
				$_SESSION['report_values'][$i][5]=" ";
				$i=8;
				$_SESSION['report_values'][$i][0]=Actual." ".Expenditure." ";
				$_SESSION['report_values'][$i][1]=Revenue." ";
				$_SESSION['report_values'][$i][2]=$result_budget_report['budget_ae_revenue_plan']." ";
				$_SESSION['report_values'][$i][3]=$result_budget_report['budget_ae_revenue_non_plan']." ";
				$_SESSION['report_values'][$i][4]=$result_budget_report['budget_ae_revenue_total']." ";
				$_SESSION['report_values'][$i][5]=$result_budget_report['budget_ae_grand_total']." ";
				$i=9;
				$_SESSION['report_values'][$i][0]="  ";
				$_SESSION['report_values'][$i][1]=Capital." ";
				$_SESSION['report_values'][$i][2]=$result_budget_report['budget_ae_capital_plan']." ";
				$_SESSION['report_values'][$i][3]=$result_budget_report['budget_ae_capital_non_plan']." ";
				$_SESSION['report_values'][$i][4]=$result_budget_report['budget_ae_capital_total']." ";
				$_SESSION['report_values'][$i][5]=" ";
				$i=10;
				$_SESSION['report_values'][$i][0]=Total."  ";
				$_SESSION['report_values'][$i][1]=" ";
				$_SESSION['report_values'][$i][2]=$result_budget_report['budget_ae_plan_total']." ";
				$_SESSION['report_values'][$i][3]=$result_budget_report['budget_ae_non_plan_total']." ";
				$_SESSION['report_values'][$i][4]=" ";
				$_SESSION['report_values'][$i][5]=" ";
				$i=11;
//
			
?>	
	
				<tr>
				  <td height="25" colspan="7" class="txt">&nbsp;&nbsp;&nbsp; State : <?php echo $fetch_state_name['state_name'] ; ?></td>
				</tr>
				<tr>
				  <td width="122" height="25" class="txt"><strong>Year </strong></td>
				  <td colspan="2" class="txt"><strong>Investment</strong></td>
				  <td width="93" height="25" class="txt"><strong>Plan</strong></td>
				  <td width="100" height="25" class="txt"><strong>Non Plan </strong></td>
				  <td width="121" height="25" class="txt"><strong>Total</strong></td>
				  <td width="180" height="25" class="txt"><strong>GT</strong></td>
				</tr>
				<tr>
				  <td rowspan="12" class="txt"><strong><?php echo $result_budget_report['budget_year'] ; ?></strong></td>
				  <td width="122" rowspan="3" class="txt"><strong>Budget Estimate</strong></td>
				  <td width="86" class="txt">Revenue</td>
				  <td height="25" class="txt"><?php echo $result_budget_report['budget_be_revenue_plan'] ;?></td>
				  <td height="25" class="txt"><?php echo $result_budget_report['budget_be_revenue_non_plan'] ;?></td>
				  <td height="25" class="txt"><?php echo $result_budget_report['budget_be_revenue_total'] ;?></td>
				  <td rowspan="3" class="txt"><strong><?php echo $result_budget_report['budget_be_grand_total'] ;?></strong></td>
				</tr>
				<tr>
				  <td class="txt">Capital</td>
				  <td height="3" class="txt"><?php echo $result_budget_report['budget_be_capital_plan'] ;?></td>
				  <td height="3" class="txt"><?php echo $result_budget_report['budget_be_capital_non_plan'] ;?></td>
				  <td height="3" class="txt"><?php echo $result_budget_report['budget_be_capital_total'] ;?></td>
				  </tr>
				<tr>
				  <td class="txt">Debt Expenditure </td>
				  <td height="4" class="txt"><?php echo $result_budget_report['budget_be_debt_plan'] ;?></td>
				  <td height="4" class="txt"><?php echo $result_budget_report['budget_be_debt_non_plan'] ;?></td>
				  <td height="4" class="txt"><?php echo $result_budget_report['budget_be_debt_total'] ;?></td>
				</tr>
				<tr>
				  <td colspan="2" class="txt"><strong>Total</strong></td>
				  <td height="12" class="txt"><strong><?php echo $result_budget_report['budget_be_plan_total'] ;?></strong></td>
				  <td height="12" class="txt"><strong><?php echo $result_budget_report['budget_be_non_plan_total'] ;?></strong></td>
				  <td height="12" colspan="2" class="txt">&nbsp;</td>
				  </tr>
				<tr>
				  <td rowspan="3" class="txt"><strong>Revised Estimate</strong></td>
				  <td class="txt">Revenue</td>
				  <td height="25" class="txt"><?php echo $result_budget_report['budget_re_revenue_plan'] ;?></td>
				  <td height="25" class="txt"><?php echo $result_budget_report['budget_re_revenue_non_plan'] ;?></td>
				  <td height="25" class="txt"><?php echo $result_budget_report['budget_re_revenue_total'] ;?></td>
				  <td rowspan="3" class="txt"><strong><?php echo $result_budget_report['budget_re_grand_total'] ;?></strong></td>
				</tr>
				<tr>
				  <td class="txt">Capital</td>
				  <td height="3" class="txt"><?php echo $result_budget_report['budget_re_capital_plan'] ;?></td>
				  <td height="3" class="txt"><?php echo $result_budget_report['budget_re_capital_non_plan'] ;?></td>
				  <td height="3" class="txt"><?php echo $result_budget_report['budget_re_capital_total'] ;?></td>
				  </tr>
				<tr>
				  <td class="txt">Debt Expenditure </td>
				  <td height="4" class="txt"><?php echo $result_budget_report['budget_re_debt_plan'] ;?></td>
				  <td height="4" class="txt"><?php echo $result_budget_report['budget_re_debt_non_plan'] ;?></td>
				  <td height="4" class="txt"><?php echo $result_budget_report['budget_re_debt_total'] ;?></td>
				</tr>
				<tr>
				  <td colspan="2" class="txt"><strong>Total</strong></td>
				  <td height="12" class="txt"><strong><?php echo $result_budget_report['budget_re_plan_total'] ;?></strong></td>
				  <td height="12" class="txt"><strong><?php echo $result_budget_report['budget_re_non_plan_total'] ;?></strong></td>
				  <td height="6" colspan="2" class="txt">&nbsp;</td>
				  </tr>
				<tr>
				  <td rowspan="3" class="txt"><strong>Actual Expenditure</strong></td>
				  <td class="txt">Revenue</td>
				  <td height="25" class="txt"><?php echo $result_budget_report['budget_ae_revenue_plan'] ;?></td>
				  <td height="25" class="txt"><?php echo $result_budget_report['budget_ae_revenue_non_plan'] ;?></td>
				  <td height="25" class="txt"><?php echo $result_budget_report['budget_ae_revenue_total'] ;?></td>
				  <td rowspan="3" class="txt"><strong><?php echo $result_budget_report['budget_ae_grand_total'] ;?></strong></td>
				</tr>
				<tr>
				  <td class="txt">Capital</td>
				  <td height="3" class="txt"><?php echo $result_budget_report['budget_ae_capital_plan'] ;?></td>
				  <td height="3" class="txt"><?php echo $result_budget_report['budget_ae_capital_non_plan'] ;?></td>
				  <td height="3" class="txt"><?php echo $result_budget_report['budget_ae_capital_total'] ;?></td>
				  </tr>
				<tr>
				  <td class="txt">Debt Expenditure </td>
				  <td height="4" class="txt"><?php echo $result_budget_report['budget_ae_debt_plan'] ;?></td>
				  <td height="4" class="txt"><?php echo $result_budget_report['budget_ae_debt_non_plan'] ;?></td>
				  <td height="4" class="txt"><?php echo $result_budget_report['budget_ae_debt_total'] ;?></td>
				</tr>
				<tr>
				  <td height="30" colspan="2" class="txt"><strong>Total</strong></td>
				  <td height="12" class="txt"><strong><?php echo $result_budget_report['budget_ae_plan_total'] ;?></strong></td>
				  <td height="12" class="txt"><strong><?php echo $result_budget_report['budget_ae_non_plan_total'] ;?></strong></td>
				  <td height="30" colspan="2">&nbsp;</td>
				  </tr>
				<tr>
				  <td height="30" colspan="6" align="center">&nbsp;&nbsp;<a href="export_report.php?fn=State Budget">Download in Excel</a></td>
				  <td height="30">&nbsp;&nbsp;&nbsp;<?php if($admin_level =='super' or ($admin_level =='sub' && $user_state_id==$result_budget_report['state_id'] )){ ?><a href="state_budget_edit.php?main_budget_id=<?php echo $result_budget_report['main_budget_id'] ; ?>"  class="back_menu">Edit</a><?php }?></td>
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
frmvalidator.addValidation("state_id","req","Please Select State");
</script>