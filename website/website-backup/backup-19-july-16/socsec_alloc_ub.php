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
		<td colspan="2" class="text12"><table width="100%"  border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
			<tr>
				<td align="right" valign="top" height="10" ><a href="acronyms.php" class="back_menu" target="_blank">Acronyms</a>&nbsp;|| &nbsp;<a href="bfc_union.php" class="back_menu"><strong>Report </strong></a>&nbsp;|| &nbsp;<a href="home.php" class="back_menu"><strong>Home Page</strong></a>&nbsp;&nbsp;&nbsp;</td>
			</tr>
			<tr>
				<td align="left" valign="top" height="10"> </td>
			</tr>
			<tr>
				<td align="left" valign="top" ><form name="form1" method="post" action=""><table width="50%" align="center" border="0" cellspacing="2" cellpadding="1" bgcolor="#F1F4F7">
					<tr>
							<td>&nbsp; </td>
					</tr>
					<tr>
						<td class="backheads" align="center">Sectoral Allocation within Budget for Children, as percentage of the Social Sector </td>
					</tr>
					<tr>
						<td align="right">&nbsp; </td>
					</tr>
					<tr>
						<td><table width="100%" align="center" border="1" cellspacing="2" cellpadding="1" bgcolor="#F1F4F7">
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
							</tr>							<tr>
								<td colspan="2" >&nbsp;&nbsp;&nbsp;Select Sector :</td>
								<td  align="left" colspan="2"><select name="sector_id"><option value="" selected>Select</option>
									<?php
										$sel_query="select * from haq_sector where sector_status='active' order by sector_name";
										$res_query=mysql_query($sel_query);
										while($fetch_query = mysql_fetch_array($res_query)){ ?>
									<option value="<?php echo $fetch_query['sector_id']; ?>" ><?php echo $fetch_query['sector_name'];?></option>
									<?php } ?>
								</select></td>
								<td colspan="2"  align="left"><input name="submit" type="submit" id="submit" value="Search">			    &nbsp;</td>
							</tr>
							<tr>
								<td height="25" colspan="6" class="txt">&nbsp;</td>
							</tr>
<?php
			if (isset($_REQUEST['submit'])){
					$sec_disp="select * from haq_sector where sector_id='".$_REQUEST['sector_id']."' and sector_status='active'";
					$res_disp=mysql_query($sec_disp);
					$fetch_disp = mysql_fetch_array($res_disp); ?>
				<tr>
				  <td height="25" align="left" colspan="6" >&nbsp;&nbsp;<strong>Sector >> <?php echo $fetch_disp['sector_name'] ; ?></strong></td>
			  </tr>
<?php } ?>							<tr>
								<td height="25" colspan="2" class="txt"><strong>Year </strong></td>
									<?php
										$sel_query="select * from haq_sector where sector_status='active' and sector_id='".$_REQUEST['sector_id']."' order by sector_name";
										$res_query=mysql_query($sel_query);
										$fetch_query = mysql_fetch_array($res_query) ; ?>
								<td height="25" colspan="4" align="center" class="txt"><strong><?php if($fetch_query['sector_name'] !=''){ echo $fetch_query['sector_name'] ;} else { echo 'Sector' ; } ?></strong></td>
<!--								<td width="39%" height="25" class="txt" colspan="2" align="center"><strong>Budget for Children</strong></td>
-->							</tr>
								<?php
									if (isset($_REQUEST['submit'])){
									if($_REQUEST['year_from'] > $_REQUEST['year_to']){
										$error="Invalid Year Range Selected";
									
						?>
										<tr>
										  <td height="25" align="center" colspan="6" class="error"><?php echo $error ; ?></td>
										  </tr>
						<?php
									}else {


									$select_year="select * from haq_year where year_status='active' and year_code between '".$_REQUEST['year_from']."' and '".$_REQUEST['year_to']."' order by year_id";
									$result_year=mysql_query($select_year);
						// For Excel File Generation
									unset($_SESSION['report_header']);
									unset($_SESSION['report_values']);
									$_SESSION['report_header']=array("Sectoral Allocation within Budget for Children, as percentage of the Social Sector", " "); 
									$i=0;
									$_SESSION['report_values'][$i][0]=Sector.">>".$fetch_disp['sector_name'];
									$_SESSION['report_values'][$i][1]=" ";
									$i=1;
									$sector=$fetch_query['sector_name'];
									$_SESSION['report_values'][$i][0]="Year";
									$_SESSION['report_values'][$i][1]=$sector;
										$i=2;
									while($fetch_year=mysql_fetch_array($result_year)){	

									$select_sector_report="select sum(a.be_grand_total) as be_total, a.expend_year as year from haq_head_expend_union a LEFT JOIN haq_major_head b ON a.major_head_id=b.major_head_id where b.major_head_status='active' and b.sector_id='".$fetch_query['sector_id']."' and a.expend_type='".$_REQUEST['level']."' and a.expend_year='".$fetch_year['year_name']."' group by a.expend_year";
									$result_sector_report=mysql_query($select_sector_report);
									$fetch_sector_report=mysql_fetch_array($result_sector_report);
									$be_cro=$fetch_sector_report['be_total']/10000;

									$select_union_budget="select budget_be_grand_total, budget_year from haq_budget_report_union where budget_type='social_sec' and budget_status='active' and social_sector_type='".$_REQUEST['level']."' and budget_year='".$fetch_year['year_name']."'";
									$result_union_budget=mysql_query($select_union_budget);
									$fetch_union_budget=mysql_fetch_array($result_union_budget);
									if($fetch_union_budget['budget_year'] !=0 && $fetch_sector_report['year'] !=0){
									if ($fetch_union_budget['budget_be_grand_total'] !=0) {
									$be_bfc= $be_cro/$fetch_union_budget['budget_be_grand_total']*100;
									} else {
									$be_bfc = "N/A" ;
									}
									$_SESSION['report_values'][$i][0]=$fetch_sector_report['year']."  ";
									$_SESSION['report_values'][$i][1]=round($be_bfc, 3)."% ";
								?>
							<tr>
								<td class="txt" colspan="2"><strong><?php echo $fetch_sector_report['year'] ; ?></strong></td>
								<td colspan="4" align="center" class="txt"><?php echo round($be_bfc, 3)."%" ; ?></td>
							</tr>
								<?php
									$i=$i+1;
									}	}
			////////////////// A V E R A G E /////////////////////
								?>
							<!--tr>
								<td class="txt" colspan="2"><strong>Average</strong></td-->
								<?php

/*								$select_sector_avg="select sum(a.be_grand_total) as be_total from haq_head_expend_union a LEFT JOIN haq_major_head b ON a.major_head_id=b.major_head_id where b.major_head_status='active' and a.expend_year_code between '".$_REQUEST['year_from']."' and '".$_REQUEST['year_to']."' and b.sector_id='".$fetch_query['sector_id']."' and a.expend_type='".$_REQUEST['level']."' and expend_status='active'";
								$result_sector_avg=mysql_query($select_sector_avg);
								$fetch_sector_avg=mysql_fetch_array($result_sector_avg);
								$be_avg=$fetch_sector_avg['be_total']/10000;
									
								
								$select_union_avg="select sum(budget_be_grand_total) as gr_be_total from haq_budget_report_union where budget_type='social_sec' and budget_status='active' and budget_year_code between '".$_REQUEST['year_from']."' and '".$_REQUEST['year_to']."' and social_sector_type='".$_REQUEST['level']."'";
								$result_union_avg=mysql_query($select_union_avg);
								$fetch_union_avg=mysql_fetch_array($result_union_avg);
								
								if($fetch_union_avg['gr_be_total'] !=0){
								$be_bfc_avg= $be_avg/$fetch_union_avg['gr_be_total']*100;
									$_SESSION['report_values'][$i][0]=Average."  ";
									$_SESSION['report_values'][$i][1]=round($be_bfc_avg, 3)."% ";
*/
								?>
								<!--td align="center" class="txt" colspan="4"><?php // echo round($be_bfc_avg, 3)."%" ; ?></td-->
								<?php
//								}else {
								?>
								<!--td align="center" class="txt" colspan="4"></td-->
								<?php
//								}

								?>
							<!--/tr-->
							<?php							
			////////////////// A V E R A G E /////////////////////
							  } }?>
							<tr>
								<td height="30" colspan="6" align="center">&nbsp;<a href="export_report.php?fn=UB_sec_all_bfc_SS">Download in Excel</a></td>
							</tr>
						</table></td>
					</tr>
					<tr>
						<td>&nbsp; </td>
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
frmvalidator.addValidation("sector_id","req","Please Select Sector");
frmvalidator.addValidation("year_from","req","Please Select Year From");
frmvalidator.addValidation("year_to","req","Please Select Year To");
</script>