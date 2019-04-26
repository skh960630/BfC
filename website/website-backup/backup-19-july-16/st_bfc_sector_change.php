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
			  <td class="backheads" align="center">Annual Rate of Change in Sectoral Allocation within the State Budget for Children</td>
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
						  <td colspan="3" align="left">From : &nbsp;&nbsp; 
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
							</tr>
				<tr>
			  <td colspan="2">&nbsp;&nbsp;&nbsp;Select Sector :</td>
			  <td colspan="3" align="left"><select name="sector_id">
                <option value="" selected>Select</option>
                <?
					$sel_query="select * from haq_sector where sector_status='active' order by sector_name";
					$res_query=mysql_query($sel_query);
					while($fetch_query = mysql_fetch_array($res_query)){ ?>
                <option value="<?php echo $fetch_query['sector_id']; ?>" ><?php echo $fetch_query['sector_name'];?></option>
                <? }?>
              </select></td>
			  <td width="304" colspan="2" align="left"><input name="submit" type="submit" id="submit" value="Search">&nbsp;</td>
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
			  <td colspan="7" align="right" class="txt"><strong>Percent</strong>&nbsp;</td>
			  </tr>
				<tr>
				  <td height="25" colspan="7" class="txt"></td>
				  </tr>
				<tr>
				  <td width="128" height="25" class="txt"><strong>Year </strong></td>
				  <td height="25" align="center" class="txt" colspan="3"><strong>Rate of Change in Child <?php 
				  	$sel_sector_disp=mysql_query("select * from haq_sector where sector_id='".$_REQUEST['sector_id']."' and sector_status='active'") ;
					$res_sector_disp=mysql_fetch_array($sel_sector_disp);
				  echo $res_sector_disp['sector_name'] ; ?> </strong></td>
				  <td align="center" class="txt" colspan="3"><strong>Rate of Change in Budget for Children </strong></td>
				</tr>
			<tr>
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




			$select_budget_report="select sum(a.be_grand_total) as be_total, a.expend_year from haq_head_expend_state a LEFT JOIN haq_st_major_head b ON a.major_head_id=b.major_head_id where b.major_head_status='active' and a.expend_year_code between '".$_REQUEST['year_from']."' and '".$_REQUEST['year_to']."' and b.sector_id='".$_REQUEST['sector_id']."' and a.state_id='".$_REQUEST['state_id']."' and a.expend_type='".$_REQUEST['level']."' and a.expend_status='active' group by a.expend_year";
			$result_budget_report=mysql_query($select_budget_report);
			$count_record=mysql_num_rows($result_budget_report);
			$count_record=$count_record-1;
// For Excel File Generation
			unset($_SESSION['report_header']);
			unset($_SESSION['report_values']);
			$_SESSION['report_header']=array("Annual Rate of Change in Sectoral Allocation within the State Budget for Children", " ", " "); 
//			$_SESSION['report_header']=array(" ", "AE-BE", " ", "RE-BE", " ", "AE-RE", " "); 
//			$_SESSION['report_header']=array("Year", "Rs Crore", "In Percent", "Rs Crore", "In Percent", "Rs Crore", "In Percent"); 
			$i=0;
			$_SESSION['report_values'][$i][0]=State." >> ".$fetch_state['state_name'];
			$_SESSION['report_values'][$i][1]=" ";
			$_SESSION['report_values'][$i][2]=" ";
			$i=1;
			$_SESSION['report_values'][$i][0]=Sector." >> ".$res_sector_disp['sector_name']." ";
			$_SESSION['report_values'][$i][1]=" ";
			$_SESSION['report_values'][$i][2]=" ";
			$i=2;
			$_SESSION['report_values'][$i][0]=Year."  ";
			$_SESSION['report_values'][$i][1]=Rate." ".of." ".Change." ".in." ".Child." ".$res_sector_disp['sector_name']." ";
			$_SESSION['report_values'][$i][2]=Rate." ".of." ".Change." ".in." ".Budget." "."for"." ".Children." ";
			$i=3;
			while($fetch_budget_report=mysql_fetch_array($result_budget_report)){



			$sum_be_cro= $fetch_budget_report['be_total']/10000 ;


			$select_budget_bfc="select sum(a.be_grand_total) as be_bfc_total, a.expend_year from haq_head_expend_state a LEFT JOIN haq_st_major_head b ON a.major_head_id=b.major_head_id where b.major_head_status='active' and a.expend_year='".$fetch_budget_report['expend_year']."' and a.expend_type='".$_REQUEST['level']."' and a.state_id='".$_REQUEST['state_id']."' and a.expend_status='active' group by a.expend_year";
			$res_budget_bfc=mysql_query($select_budget_bfc);
			$fetch_budget_bfc=mysql_fetch_array($res_budget_bfc);

			$sum_be_bfc= $fetch_budget_bfc['be_bfc_total']/10000 ;


			if(substr($fetch_budget_bfc['expend_year'], 0, 4)==$bfc_str_year){
			if($sum_be_bfc !=0 && $sum_be_bfc_grand !=0){
				$rate_of_change_be_bfc= ($sum_be_bfc - $sum_be_bfc_grand)/$sum_be_bfc_grand*100 ; 
				$rate_of_change_be_bfc = round($rate_of_change_be_bfc, 3). "%";
			} else {
				$rate_of_change_be = "NA";
			}

				}


			if(substr($fetch_budget_report['expend_year'], 0, 4)==$str_year){
			if($sum_be_cro !=0 && $sum_be_grand !=0){
				$rate_of_change_be= ($sum_be_cro - $sum_be_grand)/$sum_be_grand*100 ; 
				$rate_of_change_be = round($rate_of_change_be, 3). "%";
			} else {
				$rate_of_change_be = 'NA';
			}

				}

			$sum_be_grand= $sum_be_cro ;
			$sum_be_bfc_grand= $sum_be_bfc;
			
/*			$tavg_rate_be += $rate_of_change_be;
			$tavg_rate_be_bfc += $rate_of_change_be_bfc;
			
			if($count_record!=0){
			
			$avg_rate_be = $tavg_rate_be/$count_record;
			$avg_rate_be_bfc = $tavg_rate_be_bfc/$count_record;
			}else{
			$avg_rate_be = "NA";
			$avg_rate_be_bfc = "NA";
			}
*/
			$bfc_str_year=substr($fetch_budget_bfc['expend_year'], 5);
			$str_year=substr($fetch_budget_report['expend_year'], 5);
			$_SESSION['report_values'][$i][0]=$fetch_budget_report['expend_year']."  ";
			$_SESSION['report_values'][$i][1]=$rate_of_change_be." ";
			$_SESSION['report_values'][$i][2]=$rate_of_change_be_bfc." ";
?>	
	
				<tr>
				  <td class="txt"><strong><?php echo $fetch_budget_report['expend_year'] ; ?></strong></td>
				  <td class="txt" align="center" colspan="3"><?php echo $rate_of_change_be ; ?></td>
				  <td align="center" class="txt" colspan="3"><?php echo $rate_of_change_be_bfc ; ?></td>
				</tr>
<?php 		
									$i=$i+1;
/*			$_SESSION['report_values'][$i][0]=Average."  ";
			$_SESSION['report_values'][$i][1]=round($avg_rate_be, 3)."% ";
			$_SESSION['report_values'][$i][2]=round($avg_rate_be_bfc, 3)."% ";

*/
}?>				
				<!--tr>
				  <td align="left" class="txt"><strong>Average</strong></td>
				  <td align="center" class="txt" colspan="3"><?php // echo round($avg_rate_be, 3)."%" ; ?></td>
				  <td align="center" class="txt" colspan="3"><?php // echo round($avg_rate_be_bfc, 3)."%" ; ?></td>
				</tr-->
<?php } }?>
				<tr>
				  <td height="30" colspan="7" align="center">&nbsp;<a href="export_report.php?fn=ST_arc_SA_BFC">Download in Excel</a></td>
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
frmvalidator.addValidation("sector_id","req","Please Select Sector");
frmvalidator.addValidation("year_from","req","Please Select Year From");
frmvalidator.addValidation("year_to","req","Please Select Year To");
</script>