<?php
	include ('includes/login_check.php');
	include ('conn.php');
	$level=$_REQUEST['level'];
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
		  <td align="right" valign="top" height="10" ><a href="acronyms.php" class="back_menu" target="_blank">Acronyms</a>&nbsp;|| &nbsp;<a href="bfc_state.php" class="back_menu"><strong>Report </strong></a>&nbsp;|| &nbsp;<a href="home.php" class="back_menu"><strong>Home Page</strong></a>&nbsp;&nbsp;&nbsp;</td>
		</tr>
		<tr>
		  <td align="left" valign="top" height="10"> </td>
		</tr>
		<tr>
		  <td align="left" valign="top" >
		  <form name="form1" method="post" action="">
		  <table width="70%" align="center" border="0" cellspacing="2" cellpadding="1" bgcolor="#F1F4F7">
			<tr>
			  <td>&nbsp; </td>
			</tr>
			<tr>
			  <td class="backheads" align="center">Annual Rate of Change in Budget Estimate, Revised Estimate and Actual Expenditure in State Social Sector</td>
			  </tr>
			<tr>
			  <td align="right">&nbsp; </td>
			</tr>
			<tr>
			  <td><table width="100%" align="center" border="1" cellspacing="2" cellpadding="1" bgcolor="#F1F4F7">
						<tr>
			  <td colspan="2">&nbsp;&nbsp;&nbsp;Select State :</td>
			  <td colspan="5">&nbsp;
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
						  <td colspan="2" align="left">From : &nbsp;&nbsp; 
							<select name="year_from">
							<option value="" selected>Select</option>
							<?php
								$sel_year="select * from haq_year where year_status='active' order by year_code";
								$res_year=mysql_query($sel_year);
								while($fetch_year = mysql_fetch_array($res_year)){ ?>
							<option value="<?php echo $fetch_year['year_code']; ?>" ><?php echo $fetch_year['year_name'];?></option> 
							<? }?>
							  </select></td>
						  <td colspan="2" align="left">&nbsp;To : &nbsp;&nbsp;
							<select name="year_to">
							  <option value="" selected>Select</option>
							  <?php
								$sel_year="select * from haq_year where year_status='active' order by year_code";
								$res_year=mysql_query($sel_year);
								while($fetch_year = mysql_fetch_array($res_year)){ ?>
							  <option value="<?php echo $fetch_year['year_code']; ?>" ><?php echo $fetch_year['year_name'];?></option>
							  <? }?>
							</select></td>
						  <td align="left"><input name="submit" type="submit" id="submit" value="Search">&nbsp;</td>
							</tr>
				<?php if (isset($_REQUEST['submit'])){ ?>

							<tr>
			  <td colspan="2">&nbsp;&nbsp;&nbsp;State :</td>
			  <td colspan="5"><?php
					$sel_state="select * from haq_state where state_id='".$_REQUEST['state_id']."' and state_status='active' order by state_name";
					$res_state=mysql_query($sel_state);
					$fetch_state = mysql_fetch_array($res_state);
					echo $fetch_state['state_name']; ?>
</td>
			  </tr>
			  <?php } ?>
							<tr>
			  <td colspan="7">&nbsp;</td>
			  </tr>
				<tr>
				  <td height="25" class="txt">&nbsp;</td>
				  <td height="25" colspan="3" class="txt" align="center"><strong>Rs. Crore</strong></td>
				  <td height="25" colspan="3" class="txt" align="center"><strong>Percent</strong></td>
				  </tr>
				<tr>
				  <td width="76" height="25" class="txt"><strong>Year </strong></td>
				  <td width="75" align="center" class="txt"><strong>Budget Estimate</strong></td>
				  <td width="79" height="25" align="center" class="txt"><strong>Revised Estimate</strong></td>
				  <td width="90" height="25" align="center" class="txt"><strong>Actual Expenditure</strong></td>
				  <td width="108" align="center" class="txt"><strong>Annual Rate of Change - Budget Estimate </strong></td>
				  <td width="97" align="center" class="txt"><strong>Annual Rate of Change - Revised Estimate </strong></td>
				  <td width="120" align="center" class="txt"><strong>Annual Rate of Change - Actual Expenditure</strong></td>
				</tr>
<?php 
									if (isset($_REQUEST['submit'])){
									if($_REQUEST['year_from'] > $_REQUEST['year_to']){
										$error="Invalid Year Range Selected";
									
						?>
										<tr>
										  <td height="25" align="center" colspan="7" class="error"><?php echo $error ; ?></td>
										  </tr>
						<?php
									}else {

			$select_budget_report="select sum(budget_be_grand_total) as be_total, sum(budget_re_grand_total) as re_total, sum(budget_ae_grand_total) as ae_total, budget_year from haq_budget_report_union where budget_year_code between '".$_REQUEST['year_from']."' and '".$_REQUEST['year_to']."' 	and budget_type='social_sec' and budget_status='active' and social_sector_type='".$_REQUEST['level']."' and state_id='".$_REQUEST['state_id']."' group by budget_year";
 
			$result_budget_report=mysql_query($select_budget_report);
			$count_record=mysql_num_rows($result_budget_report);
			$count_record_per=$count_record-1;
// For Excel File Generation
			unset($_SESSION['report_header']);
			unset($_SESSION['report_values']);
			$_SESSION['report_header']=array("Annual Rate of Change in Budget Estimates, Revised Estimates and Actual Expenditure in State Social Sector", " ", " ", " ", " ", " ", " "); 
//			$_SESSION['report_header']=array(" ", "AE-BE", " ", "RE-BE", " ", "AE-RE", " "); 
//			$_SESSION['report_header']=array("Year", "Rs Crore", "In Percent", "Rs Crore", "In Percent", "Rs Crore", "In Percent"); 
			$i=0;
			$_SESSION['report_values'][$i][0]=State." >> ".$fetch_state['state_name'];
			$_SESSION['report_values'][$i][1]=" ";
			$_SESSION['report_values'][$i][2]=" ";
			$_SESSION['report_values'][$i][3]=" ";
			$_SESSION['report_values'][$i][4]=" ";
			$_SESSION['report_values'][$i][5]=" ";
			$_SESSION['report_values'][$i][6]=" ";
			$i=1;
			$_SESSION['report_values'][$i][0]=" ";
			$_SESSION['report_values'][$i][1]=Rs.". ".Crore." ";
			$_SESSION['report_values'][$i][2]=" ";
			$_SESSION['report_values'][$i][3]=" ";
			$_SESSION['report_values'][$i][4]=Percent." ";
			$_SESSION['report_values'][$i][5]=" ";
			$_SESSION['report_values'][$i][6]=" ";
			$i=2;
			$_SESSION['report_values'][$i][0]=Year."  ";
			$_SESSION['report_values'][$i][1]=Budget." ".Estimate." ";
			$_SESSION['report_values'][$i][2]=Revised." ".Estimate." ";
			$_SESSION['report_values'][$i][3]=Actual." ".Expenditure." ";
			$_SESSION['report_values'][$i][4]=Annual." ".Rate." ".of." ".Change."-".Budget." ".Estimate." ";
			$_SESSION['report_values'][$i][5]=Annual." ".Rate." ".of." ".Change."-".Revised." ".Estimate." ";
			$_SESSION['report_values'][$i][6]=Annual." ".Rate." ".of." ".Change."-".Actual." ".Expenditure." ";
			$i=3;
			while($fetch_budget_report=mysql_fetch_array($result_budget_report)){

			$sum_be_cro= $fetch_budget_report['be_total'] ;
			$sum_re_cro= $fetch_budget_report['re_total'] ;
			$sum_ae_cro= $fetch_budget_report['ae_total'] ;

			if(substr($fetch_budget_report['expend_year'], 0, 4)==$str_year){
			if($sum_be_cro !=0 && $sum_be_grand !=0){
				$rate_of_change_be= ($sum_be_cro - $sum_be_grand)/$sum_be_grand*100 ; 
				$rate_of_change_be = round($rate_of_change_be, 3). "%";
			} else {
				$rate_of_change_be = "N/A";
			}
			if($sum_re_cro !=0 && $sum_re_grand !=0){
				$rate_of_change_re= ($sum_re_cro - $sum_re_grand)/$sum_re_grand*100 ; 
				$rate_of_change_re = round($rate_of_change_re, 3). "%";
			} else {
				$rate_of_change_re = "N/A";
			}
			if($sum_ae_cro !=0 && $sum_ae_grand !=0){
			$rate_of_change_ae= ($sum_ae_cro - $sum_ae_grand)/$sum_ae_grand*100 ; 
				$rate_of_change_ae = round($rate_of_change_ae, 3). "%";
			} else {
				$rate_of_change_ae = "N/A";
			}

				}


			$sum_be_grand= $sum_be_cro ;
			$sum_re_grand= $sum_re_cro ;
			$sum_ae_grand= $sum_ae_cro ;
			
/*			$tavg_rate_be += $rate_of_change_be;
			$tavg_rate_re += $rate_of_change_re;
			$tavg_rate_ae += $rate_of_change_ae;
			$total_be += $sum_be_cro ;
			$total_re += $sum_re_cro ;
			$total_ae += $sum_ae_cro ;
			$avg_be = $total_be/$count_record ;
			$avg_re = $total_re/$count_record ;
			$avg_ae = $total_ae/$count_record ;
			if($count_record_per!=0){
			$avg_rate_be = $tavg_rate_be/$count_record_per;
			$avg_rate_re = $tavg_rate_re/$count_record_per;
			$avg_rate_ae = $tavg_rate_ae/$count_record_per;
			}else{
			$avg_rate_be = "NA";
			$avg_rate_re = "NA";
			$avg_rate_ae = "NA";
			}			

*/			
			$str_year=substr($fetch_budget_report['expend_year'], 5);
			$_SESSION['report_values'][$i][0]=$fetch_budget_report['budget_year']."  ";
			$_SESSION['report_values'][$i][1]=round($sum_be_cro, 3)." ";
			$_SESSION['report_values'][$i][2]=round($sum_re_cro, 3)." ";
			$_SESSION['report_values'][$i][3]=round($sum_ae_cro, 3)." ";
			$_SESSION['report_values'][$i][4]=$rate_of_change_be." ";
			$_SESSION['report_values'][$i][5]=$rate_of_change_re." ";
			$_SESSION['report_values'][$i][6]=$rate_of_change_ae." ";
?>	
				<tr>
				  <td class="txt"><strong><?php echo $fetch_budget_report['budget_year'] ; ?></strong></td>
				  <td class="txt" align="center"><?php echo round($sum_be_cro, 3) ; ?></td>
				  <td class="txt" align="center"><?php echo round($sum_re_cro, 3) ; ?></td>
				  <td align="center" class="txt"><?php echo round($sum_ae_cro, 3) ; ?></td>
				  <td align="center" class="txt"><?php echo $rate_of_change_be ; ?></td>
				  <td align="center" class="txt"><?php echo $rate_of_change_re ; ?></td>
				  <td align="center" class="txt"><?php echo $rate_of_change_ae ; ?></td>
				</tr>
<?php 		
									$i=$i+1;
}
/*			$_SESSION['report_values'][$i][0]=Average."  ";
			$_SESSION['report_values'][$i][1]=round($avg_be, 3)." ";
			$_SESSION['report_values'][$i][2]=round($avg_re, 3)." ";
			$_SESSION['report_values'][$i][3]=round($avg_ae, 3)." ";
			$_SESSION['report_values'][$i][4]=round($avg_rate_be, 3)."% ";
			$_SESSION['report_values'][$i][5]=round($avg_rate_re, 3)."% ";
			$_SESSION['report_values'][$i][6]=round($avg_rate_ae, 3)."% ";
*/?>				
				<!--tr>
				  <td align="center" class="txt">Average</td>
				  <td align="center" class="txt"><?php //echo round($avg_be, 3) ; ?></td>
				  <td align="center" class="txt"><?php ///echo round($avg_re, 3) ; ?></td>
				  <td align="center" class="txt"><?php //echo round($avg_ae, 3) ; ?></td>
				  <td align="center" class="txt"><?php //echo round($avg_rate_be, 3)."%" ; ?></td>
				  <td align="center" class="txt"><?php //echo round($avg_rate_re, 3)."%" ; ?></td>
				  <td align="center" class="txt"><?php //echo round($avg_rate_ae, 3)."%" ; ?></td>
				</tr-->
<?php } }?>				<tr>
				  <td height="30" colspan="7" align="center">&nbsp;<a href="export_report.php?fn=ST_arc_be_re_ae_SST">Download in Excel</a></td>
				  </tr>
		  </table></td>
			</tr>
			<tr>
			  <td>&nbsp; </td>
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
frmvalidator.addValidation("state_id","req","Please Select State");
frmvalidator.addValidation("year_from","req","Please Select Year From");
frmvalidator.addValidation("year_to","req","Please Select Year To");
</script>