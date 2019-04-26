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
			  <td class="backheads" align="center">Difference in Budget Estimates, Revised Estimates and Actual Expenditure on Different Sectors of State Budget for Children</td>
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
						  <td colspan="3" align="left">&nbsp;To : &nbsp;&nbsp;
							<select name="year_to">
							  <option value="" selected>Select</option>
							  <?php
								$sel_year="select * from haq_year where year_status='active' order by year_code";
								$res_year=mysql_query($sel_year);
								while($fetch_year = mysql_fetch_array($res_year)){ ?>
							  <option value="<?php echo $fetch_year['year_code']; ?>" ><?php echo $fetch_year['year_name'];?></option>
							  <? }?>
							</select></td>
							</tr>			<tr>
			  <td colspan="2">&nbsp;&nbsp;&nbsp;Select Sector :</td>
			  <td colspan="2" align="left"><select name="sector_id">
                <option value="" selected>Select</option>
                <?php
					$sel_query="select * from haq_sector where sector_status='active' order by sector_name";
					$res_query=mysql_query($sel_query);
					while($fetch_query = mysql_fetch_array($res_query)){ ?>
                <option value="<?php echo $fetch_query['sector_id']; ?>" ><?php echo $fetch_query['sector_name'];?></option>
                <? }?>
              </select></td>
			  <td colspan="3" align="left"><input name="submit" type="submit" id="submit" value="Search">&nbsp;</td>
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
				  <td height="25" colspan="7" class="txt" align="right">&nbsp;</td>
				</tr>
				<tr>
				  <td height="25" colspan="7" class="txt"><strong> <?php 
				  	
					$sec_search=mysql_fetch_array(mysql_query("select sector_name from haq_sector where sector_id='".$_REQUEST['sector_id']."'"));
					if($sec_search['sector_name'] !=''){
					  echo "Search Result for :<br>  State >>" .$fetch_state['state_name']. "<br> Sector >>" .$sec_search['sector_name'] ; 
					  }
					?></strong>
				  </td>
				</tr>
				<tr>
				  <td width="122" height="25" class="txt"><strong>Year </strong></td>
				  <td height="25" colspan="2" align="center" class="txt"><strong>Actual Expenditure - Budget Estimate</strong></td>
				  <td colspan="2" class="txt" align="center"><strong>Revised  Estimate - Budget Estimate </strong></td>
				  <td height="25" colspan="2" align="center" class="txt"><strong>Actual Expenditure - Revised  Estimate</strong></td>
			    </tr>
				<tr>
				  <td width="122" height="25" class="txt">&nbsp;</td>
				  <td class="txt" align="center">Rs Crore </td>
				  <td class="txt" align="center">In Percent</td>
				  <td height="25" align="center" class="txt">Rs Crore </td>
				  <td height="25" align="center" class="txt">In Percent </td>
				  <td height="25" class="txt" align="center">Rs Crore </td>
			      <td class="txt" align="center">In Percent </td>
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

			$select_budget_report="select sum(a.be_grand_total) as be_total, sum(a.re_grand_total) as re_total, sum(a.ae_grand_total) as ae_total, a.expend_year from haq_head_expend_state a LEFT JOIN haq_st_major_head b ON a.major_head_id=b.major_head_id where b.major_head_status='active' and a.expend_year_code between '".$_REQUEST['year_from']."' and '".$_REQUEST['year_to']."' and a.state_id='".$_REQUEST['state_id']."' and b.sector_id='".$_REQUEST['sector_id']."' and a.expend_type='".$_REQUEST['level']."' group by a.expend_year";
			
			$result_budget_report=mysql_query($select_budget_report);
			$count=mysql_num_rows($result_budget_report);
// For Excel File Generation
			unset($_SESSION['report_header']);
			unset($_SESSION['report_values']);
			$_SESSION['report_header']=array("Difference in Budget Estimates, Revised Estimates and Actual Expenditure in Different Sectors of State Budget for Children", " ", " ", " ", " ", " ", " "); 
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
			$_SESSION['report_values'][$i][0]=Sector.">>".$sec_search['sector_name'];
			$_SESSION['report_values'][$i][1]=" ";
			$_SESSION['report_values'][$i][2]=" ";
			$_SESSION['report_values'][$i][3]=" ";
			$_SESSION['report_values'][$i][4]=" ";
			$_SESSION['report_values'][$i][5]=" ";
			$_SESSION['report_values'][$i][6]=" ";
			$i=2;
			$_SESSION['report_values'][$i][0]=Year."  ";
			$_SESSION['report_values'][$i][1]=Actual." ".Expenditure." "."-"." ".Budget." ".Estimate." ";
			$_SESSION['report_values'][$i][2]=" ";
			$_SESSION['report_values'][$i][3]=Revised." ".Estimate." "."-"." ".Budget." ".Estimate." ";
			$_SESSION['report_values'][$i][4]=" ";
			$_SESSION['report_values'][$i][5]=Actual." ".Expenditure." "."-"." ".Revised." ".Estimate." ";
			$_SESSION['report_values'][$i][6]=" ";
			$i=3;
			$_SESSION['report_values'][$i][0]="  ";
			$_SESSION['report_values'][$i][1]=Rs." ".Crore." ";
			$_SESSION['report_values'][$i][2]=In." ".Percent." ";
			$_SESSION['report_values'][$i][3]=Rs." ".Crore." ";
			$_SESSION['report_values'][$i][4]=In." ".Percent." ";
			$_SESSION['report_values'][$i][5]=Rs." ".Crore." ";
			$_SESSION['report_values'][$i][6]=In." ".Percent." ";
				$i=4;
			while($fetch_budget_report=mysql_fetch_array($result_budget_report)){

			
			$sum_be_grand= $fetch_budget_report['be_total']/10000 ;
			$sum_re_grand= $fetch_budget_report['re_total']/10000 ;
			$sum_ae_grand= $fetch_budget_report['ae_total']/10000 ;
			if($sum_re_grand !=0 && $sum_be_grand !=0) {
				$diff_re_be= $sum_re_grand - $sum_be_grand ;
				$per_diff_re_be= ($sum_re_grand - $sum_be_grand)/$sum_be_grand*100 ;
				$diff_re_be = round($diff_re_be, 3);
				$per_diff_re_be = round($per_diff_re_be, 3)."%" ;
			} else {
				$diff_re_be= "N/A" ;
				$per_diff_re_be= "N/A" ;
			}								
			if($sum_ae_grand !=0 && $sum_be_grand !=0) {
				$diff_ae_be= $sum_ae_grand - $sum_be_grand ;
				$per_diff_ae_be= ($sum_ae_grand - $sum_be_grand)/$sum_be_grand*100 ;
				$diff_ae_be = round($diff_ae_be, 3);
				$per_diff_ae_be = round($per_diff_ae_be, 3)."%" ;
			} else {
				$diff_ae_be= "N/A" ;
				$per_diff_ae_be= "N/A" ;
			}								
			if($sum_ae_grand !=0 && $sum_re_grand !=0) {
				$diff_ae_re= $sum_ae_grand - $sum_re_grand ;
				$per_diff_ae_re= ($sum_ae_grand - $sum_re_grand)/$sum_re_grand*100 ;
				$diff_ae_re = round($diff_ae_re, 3) ;
				$per_diff_ae_re = round($per_diff_ae_re, 3)."%" ;
			} else {
				$diff_ae_re= "N/A" ;
				$per_diff_ae_re= "N/A" ;
			}
			$_SESSION['report_values'][$i][0]=$fetch_budget_report['expend_year']."  ";
			$_SESSION['report_values'][$i][1]=$diff_ae_be." ";
			$_SESSION['report_values'][$i][2]=$per_diff_ae_be." ";
			$_SESSION['report_values'][$i][3]=$diff_re_be." ";
			$_SESSION['report_values'][$i][4]=$per_diff_re_be." ";
			$_SESSION['report_values'][$i][5]=$diff_ae_re." ";
			$_SESSION['report_values'][$i][6]=$per_diff_ae_re." ";
			?>	
	
				<tr>
				  <td class="txt"><strong><?php echo $fetch_budget_report['expend_year'] ; ?></strong></td>
				  <td class="txt" align="center"><?php echo $diff_ae_be ; ?></td>
				  <td class="txt" align="center"><?php echo $per_diff_ae_be; ?></td>
				  <td class="txt" align="center"><?php echo $diff_re_be ; ?></td>
				  <td class="txt" align="center"><?php echo $per_diff_re_be ; ?></td>
				  <td class="txt" align="center"><?php echo $diff_ae_re ; ?></td>
				  <td class="txt" align="center"><?php echo $per_diff_ae_re ; ?></td>
				</tr>
<?php
									$i=$i+1;
}
///////AVERAGE CALCULATION STARTS////////////////

/*
			$select_budget_avg="select sum(a.be_grand_total) as be_total_avg, sum(a.re_grand_total) as re_total_avg, sum(a.ae_grand_total) as ae_total_avg from haq_head_expend_state a LEFT JOIN haq_st_major_head b ON a.major_head_id=b.major_head_id where b.major_head_status='active' and a.expend_year_code between '".$_REQUEST['year_from']."' and '".$_REQUEST['year_to']."' and a.state_id='".$_REQUEST['state_id']."' and b.sector_id='".$_REQUEST['sector_id']."' and a.expend_type='".$_REQUEST['level']."'";
			
			$result_budget_avg=mysql_query($select_budget_avg);
			while($fetch_budget_avg=mysql_fetch_array($result_budget_avg)){

			
			$sum_be_grand_avg= $fetch_budget_avg['be_total_avg']/10000 ;
			$sum_re_grand_avg= $fetch_budget_avg['re_total_avg']/10000 ;
			$sum_ae_grand_avg= $fetch_budget_avg['ae_total_avg']/10000 ;
			
			if($sum_re_grand_avg !=0 && $sum_be_grand_avg !=0) {
				$diff_re_be_avg= ($sum_re_grand_avg - $sum_be_grand_avg)/$count ;
				$per_diff_re_be_avg= ($sum_re_grand_avg - $sum_be_grand_avg)/$sum_be_grand_avg*100 ;
				$diff_re_be_avg = round($diff_re_be_avg, 3);
				$per_diff_re_be_avg = round($per_diff_re_be_avg, 3)."%" ;
			} else {
				$diff_re_be_avg= "NA" ;
				$per_diff_re_be_avg= "NA" ;
			}								
			if($sum_ae_grand_avg !=0 && $sum_be_grand_avg !=0) {
				$diff_ae_be_avg= ($sum_ae_grand_avg - $sum_be_grand_avg)/$count ;
				$per_diff_ae_be_avg= ($sum_ae_grand_avg - $sum_be_grand_avg)/$sum_be_grand_avg*100 ;
				$diff_ae_be_avg = round($diff_ae_be_avg, 3);
				$per_diff_ae_be_avg = round($per_diff_ae_be_avg, 3)."%" ;
			} else {
				$diff_ae_be_avg= "NA" ;
				$per_diff_ae_be_avg= "NA" ;
			}								
			if($sum_ae_grand_avg !=0 && $sum_re_grand_avg !=0) {
				$diff_ae_re_avg= ($sum_ae_grand_avg - $sum_re_grand_avg)/$count ;
				$per_diff_ae_re_avg= ($sum_ae_grand_avg - $sum_re_grand_avg)/$sum_re_grand_avg*100 ;
				$diff_ae_re_avg = round($diff_ae_re_avg, 3) ;
				$per_diff_ae_re_avg = round($per_diff_ae_re_avg, 3)."%" ;
			} else {
				$diff_ae_re_avg= "NA" ;
				$per_diff_ae_re_avg= "NA" ;
			}								
			$_SESSION['report_values'][$i][0]=Average."  ";
			$_SESSION['report_values'][$i][1]=$diff_ae_be_avg." ";
			$_SESSION['report_values'][$i][2]=$per_diff_ae_be_avg." ";
			$_SESSION['report_values'][$i][3]=$diff_re_be_avg." ";
			$_SESSION['report_values'][$i][4]=$per_diff_re_be_avg." ";
			$_SESSION['report_values'][$i][5]=$diff_ae_re_avg." ";
			$_SESSION['report_values'][$i][6]=$per_diff_ae_re_avg." ";
*/
?>	
	
				<!--tr>
				  <td class="txt"><strong>Average</strong></td>
				  <td class="txt" align="center"><?php echo $diff_ae_be_avg ; ?></td>
				  <td class="txt" align="center"><?php echo $per_diff_ae_be_avg; ?></td>
				  <td class="txt" align="center"><?php echo $diff_re_be_avg ; ?></td>
				  <td class="txt" align="center"><?php echo $per_diff_re_be_avg ; ?></td>
				  <td class="txt" align="center"><?php echo $diff_ae_re_avg ; ?></td>
				  <td class="txt" align="center"><?php echo $per_diff_ae_re_avg ; ?></td>
				</tr-->
<?php
//}
///////AVERAGE CALCULATION ENDS////////////////

}
?>			
				<tr>
				  <td height="30" colspan="7" align="center">&nbsp;<a href="export_report.php?fn=ST_diff_ae_re_be_ss_bfc">Download in Excel</a></td>
				  </tr>
				<?php } ?>
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