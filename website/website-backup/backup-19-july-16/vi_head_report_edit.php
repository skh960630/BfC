<?php
	include ('includes/login_check.php');
	include ('conn.php');
//	$fetch_query=mysql_query("select * from haq_budget_report_union where main_budget_id='".$_REQUEST['main_budget_id']."'");
//	$fetch_result=mysql_fetch_array($fetch_query);
		$select_expend=mysql_query("select * from haq_head_expend_state where expend_id='".$_REQUEST['expend_id']."' and expend_status='active'");
		$result_expend=mysql_fetch_array($select_expend);
	if (isset($_REQUEST['submit'])){ 

		$be_rev_plan= $_REQUEST['rev_gen_be_plan'] + $_REQUEST['rev_vi_be_plan'];
		$be_rev_non_plan= $_REQUEST['rev_gen_be_nplan'] + $_REQUEST['rev_vi_be_nplan'];
		$be_cap_plan= $_REQUEST['cap_gen_be_plan'] + $_REQUEST['cap_vi_be_plan'];
		$be_cap_non_plan= $_REQUEST['cap_gen_be_nplan'] + $_REQUEST['cap_vi_be_nplan'];
		$be_rev_total= $be_rev_plan + $be_rev_non_plan;
		$be_cap_total= $be_cap_plan + $be_cap_non_plan; 
		$be_plan_total= $be_rev_plan + $be_cap_plan;
		$be_nplan_total= $be_rev_non_plan + $be_cap_non_plan;
		$be_grnd_total= $be_rev_total + $be_cap_total;

		$re_rev_plan= $_REQUEST['rev_gen_re_plan'] + $_REQUEST['rev_vi_re_plan'];
		$re_rev_non_plan= $_REQUEST['rev_gen_re_nplan'] + $_REQUEST['rev_vi_re_nplan'];
		$re_cap_plan= $_REQUEST['cap_gen_re_plan'] + $_REQUEST['cap_vi_re_plan'];
		$re_cap_non_plan= $_REQUEST['cap_gen_re_nplan'] + $_REQUEST['cap_vi_re_nplan'];
		$re_rev_total= $re_rev_plan + $re_rev_non_plan;
		$re_cap_total= $re_cap_plan + $re_cap_non_plan; 
		$re_plan_total= $re_rev_plan + $re_cap_plan;
		$re_nplan_total= $re_rev_non_plan + $re_cap_non_plan;
		$re_grnd_total= $re_rev_total + $re_cap_total;

		$ae_rev_plan= $_REQUEST['rev_gen_ae_plan'] + $_REQUEST['rev_vi_ae_plan'];
		$ae_rev_non_plan= $_REQUEST['rev_gen_ae_nplan'] + $_REQUEST['rev_vi_ae_nplan'];
		$ae_cap_plan= $_REQUEST['cap_gen_ae_plan'] + $_REQUEST['cap_vi_ae_plan'];
		$ae_cap_non_plan= $_REQUEST['cap_gen_ae_nplan'] + $_REQUEST['cap_vi_ae_nplan'];
		$ae_rev_total= $ae_rev_plan + $ae_rev_non_plan;
		$ae_cap_total= $ae_cap_plan + $ae_cap_non_plan; 
		$ae_plan_total= $ae_rev_plan + $ae_cap_plan;
		$ae_nplan_total= $ae_rev_non_plan + $ae_cap_non_plan;
		$ae_grnd_total= $ae_rev_total + $ae_cap_total;

		
		
	$update_budget="
		Update haq_head_expend_state set 
		be_rev_gen_p='".$_REQUEST['rev_gen_be_plan']."', be_rev_gen_n_p='".$_REQUEST['rev_gen_be_nplan']."', be_rev_vi_p='".$_REQUEST['rev_vi_be_plan']."', be_rev_vi_n_p='".$_REQUEST['rev_vi_be_nplan']."',	be_cap_gen_p='".$_REQUEST['cap_gen_be_plan']."', be_cap_gen_n_p='".$_REQUEST['cap_gen_be_nplan']."', be_cap_vi_p='".$_REQUEST['cap_vi_be_plan']."', be_cap_vi_n_p='".$_REQUEST['cap_vi_be_nplan']."',
		be_rev_plan='".$be_rev_plan."', be_rev_non_plan='".$be_rev_non_plan."', be_rev_total='".$be_rev_total."', be_cap_plan='".$be_cap_plan."', be_cap_non_plan='".$be_cap_non_plan."', be_cap_total='".$be_cap_total."', be_plan_total='".$be_plan_total."', be_non_plan_total='".$be_nplan_total."', be_grand_total='".$be_grnd_total."',
		re_rev_gen_p='".$_REQUEST['rev_gen_re_plan']."', re_rev_gen_n_p='".$_REQUEST['rev_gen_re_nplan']."', re_rev_vi_p='".$_REQUEST['rev_vi_re_plan']."', re_rev_vi_n_p='".$_REQUEST['rev_vi_re_nplan']."',	re_cap_gen_p='".$_REQUEST['cap_gen_re_plan']."', re_cap_gen_n_p='".$_REQUEST['cap_gen_re_nplan']."', re_cap_vi_p='".$_REQUEST['cap_vi_re_plan']."', re_cap_vi_n_p='".$_REQUEST['cap_vi_re_nplan']."',
		re_rev_plan='".$re_rev_plan."', re_rev_non_plan='".$re_rev_non_plan."', re_rev_total='".$re_rev_total."', re_cap_plan='".$re_cap_plan."', re_cap_non_plan='".$re_cap_non_plan."', re_cap_total='".$re_cap_total."', re_plan_total='".$re_plan_total."', re_non_plan_total='".$re_nplan_total."', re_grand_total='".$re_grnd_total."', 
		ae_rev_gen_p='".$_REQUEST['rev_gen_ae_plan']."', ae_rev_gen_n_p='".$_REQUEST['rev_gen_ae_nplan']."', ae_rev_vi_p='".$_REQUEST['rev_vi_ae_plan']."', ae_rev_vi_n_p='".$_REQUEST['rev_vi_ae_nplan']."',	ae_cap_gen_p='".$_REQUEST['cap_gen_ae_plan']."', ae_cap_gen_n_p='".$_REQUEST['cap_gen_ae_nplan']."', ae_cap_vi_p='".$_REQUEST['cap_vi_ae_plan']."', ae_cap_vi_n_p='".$_REQUEST['cap_vi_ae_nplan']."',
		ae_rev_plan='".$ae_rev_plan."', ae_rev_non_plan='".$ae_rev_non_plan."', ae_rev_total='".$ae_rev_total."', ae_cap_plan='".$ae_cap_plan."', ae_cap_non_plan='".$ae_cap_non_plan."', ae_cap_total='".$ae_cap_total."', ae_plan_total='".$ae_plan_total."', ae_non_plan_total='".$ae_nplan_total."', ae_grand_total='".$ae_grnd_total."' where expend_id='".$_REQUEST['expend_id']."'";
		$result_budget=mysql_query($update_budget);
			if($result_budget){
			echo "<meta http-equiv='Refresh' content='0; url=st_head_report_search.php'>";
			exit;
			}else{ 
				$error= "Record could not be added" ; 
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
		  <td align="right" valign="top" height="10" ><a href="main_state.php?page=entry" class="back_menu"><strong>Data Entry </strong></a>&nbsp; || &nbsp;<a href="home.php" class="back_menu">Home Page </a>&nbsp;&nbsp;&nbsp;</td>
		</tr>
		<tr>
		  <td align="left" valign="top" height="10"> </td>
		</tr>
		<tr>
		  <td align="left" valign="top" >
		  <form name="form1" method="post" action="">
		  <table width="62%" align="center" border="0" cellspacing="2" cellpadding="1" bgcolor="#F1F4F7">
			<tr>
			  <td colspan="3">&nbsp; </td>
			</tr>
			<tr>
			  <td width="25%">&nbsp;</td>
			  <td width="43%" align="center" class="backheads">Edit Head Expenditure </td>
			  <td width="32%" align="right">&nbsp;&nbsp;</td>
			</tr>
			<tr>
			  <td colspan="3" align="right">(Figures are in Thousands)&nbsp; </td>
			</tr>
			<tr>
			  <td colspan="3"><table width="100%" align="center" border="1" cellspacing="2" cellpadding="1" bgcolor="#F1F4F7">
			<tr>
			  <td colspan="6" align="center" class="Error">&nbsp;<?php echo $error; ?></td>
			</tr>
			<tr>
			  <td colspan="3">&nbsp;&nbsp;&nbsp;Year :</td>
			  <td colspan="3" align="left"><?php echo $result_expend['expend_year'] ; ?></td>
			</tr>
			<tr>
			  <td colspan="3">&nbsp;&nbsp;&nbsp;Budget Type :</td>
			  <td width="20%" align="left"><div align="center"><span class="txt"><strong>Budget Estimate</strong></span></div></td>
			  <td width="20%" align="left"><div align="center"><span class="txt"><strong>Revised Estimate</strong></span></div></td>
			  <td width="20%" align="left"><div align="center"><span class="txt"><strong>Actual Expenditure</strong></span></div></td>
			</tr>
			<tr>
			  <td width="11%" rowspan="4">&nbsp;&nbsp;&nbsp;Revenue</td>
			  <td width="12%" rowspan="2">General</td>
			  <td width="17%">&nbsp;Plan :</td>
			  <td align="left"><input name="rev_gen_be_plan" type="text" id="rev_gen_be_plan" value="<?php echo $result_expend['be_rev_gen_p'] ; ?>" size="20"></td>
			  <td align="left"><input name="rev_gen_re_plan" type="text" id="rev_gen_re_plan" value="<?php echo $result_expend['re_rev_gen_p'] ; ?>" size="20"></td>
			  <td align="left"><input name="rev_gen_ae_plan" type="text" id="rev_gen_ae_plan" value="<?php echo $result_expend['ae_rev_gen_p'] ; ?>" size="20"></td>
			</tr>
			<tr>
			  <td>&nbsp;Non Plan :</td>
			  <td align="left"><input name="rev_gen_be_nplan" type="text" id="rev_gen_be_nplan" value="<?php echo $result_expend['be_rev_gen_n_p'] ; ?>" size="20"></td>
			  <td align="left"><input name="rev_gen_re_nplan" type="text" id="rev_gen_re_nplan" value="<?php echo $result_expend['re_rev_gen_n_p'] ; ?>" size="20"></td>
			  <td align="left"><input name="rev_gen_ae_nplan" type="text" id="rev_gen_ae_nplan" value="<?php echo $result_expend['ae_rev_gen_n_p'] ; ?>" size="20"></td>
			</tr>
			<tr>
			  <td width="12%" rowspan="2">VI Schedule </td>
			  <td>&nbsp;Plan :</td>
			  <td align="left"><input name="rev_vi_be_plan" type="text" id="rev_vi_be_plan" value="<?php echo $result_expend['be_rev_vi_p'] ; ?>" size="20"></td>
			  <td align="left"><input name="rev_vi_re_plan" type="text" id="rev_vi_re_plan" value="<?php echo $result_expend['re_rev_vi_p'] ; ?>" size="20"></td>
			  <td align="left"><input name="rev_vi_ae_plan" type="text" id="rev_vi_ae_plan" value="<?php echo $result_expend['ae_rev_vi_p'] ; ?>" size="20"></td>
			</tr>
			<tr>
			  <td>&nbsp;Non Plan :</td>
			  <td align="left"><input name="rev_vi_be_nplan" type="text" id="rev_vi_be_nplan" value="<?php echo $result_expend['be_rev_vi_n_p'] ; ?>" size="20"></td>
			  <td align="left"><input name="rev_vi_re_nplan" type="text" id="rev_vi_re_nplan" value="<?php echo $result_expend['re_rev_vi_n_p'] ; ?>" size="20"></td>
			  <td align="left"><input name="rev_vi_ae_nplan" type="text" id="rev_vi_ae_nplan" value="<?php echo $result_expend['ae_rev_vi_n_p'] ; ?>" size="20"></td>
			</tr>
			<tr>
			  <td rowspan="4">&nbsp;&nbsp;&nbsp;Capital</td>
			  <td rowspan="2">General</td>
			  <td>&nbsp;Plan :</td>
			  <td align="left"><input name="cap_gen_be_plan" type="text" id="cap_gen_be_plan" value="<?php echo $result_expend['be_cap_gen_p'] ; ?>" size="20"></td>
			  <td align="left"><input name="cap_gen_re_plan" type="text" id="cap_gen_re_plan" value="<?php echo $result_expend['re_cap_gen_p'] ; ?>" size="20"></td>
			  <td align="left"><input name="cap_gen_ae_plan" type="text" id="cap_gen_ae_plan" value="<?php echo $result_expend['ae_cap_gen_p'] ; ?>" size="20"></td>
			</tr>
			<tr>
			  <td>&nbsp;Non Plan :</td>
			  <td align="left"><input name="cap_gen_be_nplan" type="text" id="cap_gen_be_nplan" value="<?php echo $result_expend['be_cap_gen_n_p'] ; ?>" size="20"></td>
			  <td align="left"><input name="cap_gen_re_nplan" type="text" id="cap_gen_re_nplan" value="<?php echo $result_expend['re_cap_gen_n_p'] ; ?>" size="20"></td>
			  <td align="left"><input name="cap_gen_ae_nplan" type="text" id="cap_gen_ae_nplan" value="<?php echo $result_expend['ae_cap_gen_n_p'] ; ?>" size="20"></td>
			</tr>
			<tr>
			  <td rowspan="2">VI Schedule</td>
			  <td>&nbsp;Plan :&nbsp;</td>
			  <td align="left"><input name="cap_vi_be_plan" type="text" id="cap_vi_be_plan" value="<?php echo $result_expend['be_cap_vi_p'] ; ?>" size="20"></td>
			  <td align="left"><input name="cap_vi_re_plan" type="text" id="cap_vi_re_plan" value="<?php echo $result_expend['re_cap_vi_p'] ; ?>" size="20"></td>
			  <td align="left"><input name="cap_vi_ae_plan" type="text" id="cap_vi_ae_plan" value="<?php echo $result_expend['ae_cap_vi_p'] ; ?>" size="20"></td>
			</tr>
			<tr>
			  <td>&nbsp;Non Plan :</td>
			  <td align="left"><input name="cap_vi_be_nplan" type="text" id="cap_vi_be_nplan" value="<?php echo $result_expend['be_cap_vi_n_p'] ; ?>" size="20"></td>
			  <td align="left"><input name="cap_vi_re_nplan" type="text" id="cap_vi_re_nplan" value="<?php echo $result_expend['re_cap_vi_n_p'] ; ?>" size="20"></td>
			  <td align="left"><input name="cap_vi_ae_nplan" type="text" id="cap_vi_ae_nplan" value="<?php echo $result_expend['ae_cap_vi_n_p'] ; ?>" size="20"></td>
			</tr>
			<tr>
			  <td colspan="6" align="center">
			    <input type="submit" id="submit" name="submit" value="Submit">			    
			    <input type="reset" name="Submit2" value="Reset">			  </td>
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