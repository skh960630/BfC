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
			  <td class="backheads" align="center">Budget for Children as Percentage of State Budget </td>
			  </tr>
			<tr>
			  <td align="right">&nbsp; </td>
			</tr>
			<tr>
			  <td><table width="100%" align="center" border="1" cellspacing="2" cellpadding="1" bgcolor="#F1F4F7">
						<tr>
			  <td colspan="2">&nbsp;&nbsp;&nbsp;Select State :</td>
			  <td colspan="4">&nbsp;
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
			  <td >&nbsp;&nbsp;&nbsp;Select Year :</td>
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
			  <td width="218" align="left"><input name="submit" type="submit" id="submit" value="Search">&nbsp;</td>
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
				  <td height="25" colspan="6" class="txt">&nbsp;</td>
				  </tr>
				<tr>
				  <td width="122" height="25" class="txt"><strong>Year </strong></td>
				  <td colspan="2" class="txt" align="center"><strong>Budget Estimate</strong></td>
				  <td height="25" colspan="2" align="center" class="txt"><strong>Revised Estimate</strong></td>
				  <td height="25" class="txt" align="center"><strong>Actual Expenditure</strong></td>
			    </tr>

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
			$_SESSION['report_header']=array("Budget for Children as Percentage of State Budget"," "," "," "); 
				$i=0;
				$_SESSION['report_values'][$i][0]=State." >> ".$fetch_state['state_name'];
				$_SESSION['report_values'][$i][1]=" ";
				$_SESSION['report_values'][$i][2]=" ";
				$_SESSION['report_values'][$i][3]=" ";
				$i=1;
				$_SESSION['report_values'][$i][0]=Year."  ";
				$_SESSION['report_values'][$i][1]=Budget." ".Estimate." ";
				$_SESSION['report_values'][$i][2]=Revised." ".Estimate." ";
				$_SESSION['report_values'][$i][3]=Actual." ".Expenditure." ";
				$i=2;
			while($fetch_year=mysql_fetch_array($result_year)){

				$select_bfc="select sum(a.be_grand_total) as be_total, sum(a.re_grand_total) as re_total, sum(a.ae_grand_total) as ae_total, a.expend_year from haq_head_expend_state a LEFT JOIN haq_st_major_head b ON a.major_head_id=b.major_head_id where b.major_head_status='active' and a.expend_type='".$_REQUEST['level']."' and a.state_id='".$_REQUEST['state_id']."' and a.expend_status='active' and a.expend_year='".$fetch_year['year_name']."' group by a.expend_year";
				$result_bfc=mysql_query($select_bfc);
				$fetch_bfc=mysql_fetch_array($result_bfc);
				$sum_be_bfc= $fetch_bfc['be_total']/10000 ;
				$sum_re_bfc= $fetch_bfc['re_total']/10000 ;
				$sum_ae_bfc= $fetch_bfc['ae_total']/10000 ;
			$select_union_budget="select budget_be_grand_total, budget_re_grand_total, budget_ae_grand_total, budget_year from haq_budget_report_union where budget_type='".$_REQUEST['level']."' and state_id='".$_REQUEST['state_id']."' and social_sector_type='na' and budget_year='".$fetch_year['year_name']."'";

			$result_union_budget=mysql_query($select_union_budget);
			$fetch_union_budget=mysql_fetch_array($result_union_budget);
				$sum_be_union=$fetch_union_budget['budget_be_grand_total'];
				$sum_re_union=$fetch_union_budget['budget_re_grand_total'];
				$sum_ae_union=$fetch_union_budget['budget_ae_grand_total'];

			if($fetch_union_budget['budget_year'] !=0 && $fetch_bfc['expend_year'] !=0){
if ($sum_be_union != 0){
			$be_per_bfc= $sum_be_bfc/$sum_be_union*100;
} else { 			
			$be_per_bfc= 0;
			}
if ($sum_re_union != 0){
			$re_per_bfc= $sum_re_bfc/$sum_re_union*100;
} else { 			
			$re_per_bfc= 0;
			}
if ($sum_ae_union != 0){
			$ae_per_bfc= $sum_ae_bfc/$sum_ae_union*100;
} else { 			
			$ae_per_bfc= 0;
			}
			
				$_SESSION['report_values'][$i][0]=$fetch_union_budget['budget_year']."  ";
				$_SESSION['report_values'][$i][1]=round($be_per_bfc, 3)."%  ";
				$_SESSION['report_values'][$i][2]=round($re_per_bfc, 3)."%  ";
				$_SESSION['report_values'][$i][3]=round($ae_per_bfc, 3)."%  ";
?>	
	
				<tr>
				  <td class="txt"><strong><?php echo $fetch_union_budget['budget_year'] ; ?></strong></td>
				  <td colspan="2" class="txt" align="center"><?php echo round($be_per_bfc, 3)."%" ; ?></td>
				  <td colspan="2" class="txt" align="center"><?php echo round($re_per_bfc, 3)."%" ; ?></td>
				  <td class="txt" align="center"><?php echo round($ae_per_bfc, 3)."%" ; ?></td>
				</tr>
<?php
				$i=$i+1;
}	}

///////AVERAGE CALCULATION STARTS////////////////
/*
				$total_budget=mysql_query("select sum(a.be_grand_total) as be_total, sum(a.re_grand_total) as re_total, sum(a.ae_grand_total) as ae_total from haq_head_expend_state a LEFT JOIN haq_st_major_head b ON a.major_head_id=b.major_head_id where b.major_head_status='active' and a.expend_year_code between '".$_REQUEST['year_from']."' and '".$_REQUEST['year_to']."' and a.expend_type='".$_REQUEST['level']."' and a.state_id='".$_REQUEST['state_id']."' and a.expend_status='active'");
				$result_budget=mysql_fetch_array($total_budget);
				$per_be= $result_budget['be_total']/10000 ;
				$per_re= $result_budget['re_total']/10000 ;
				$per_ae= $result_budget['ae_total']/10000 ;


			$select_union_budget="select sum(budget_be_grand_total) as be_grand, sum(budget_re_grand_total) as re_grand, sum(budget_ae_grand_total) as ae_grand from haq_budget_report_union where budget_type='".$_REQUEST['level']."' and social_sector_type='na' and budget_year_code between '".$_REQUEST['year_from']."' and '".$_REQUEST['year_to']."' and budget_status='active'";
			$result_union_budget=mysql_query($select_union_budget);
			$fetch_union_budget=mysql_fetch_array($result_union_budget);



			$be_total= $fetch_union_budget['be_grand'];
			$re_total= $fetch_union_budget['re_grand'];
			$ae_total= $fetch_union_budget['ae_grand'];
			$avg_be=$per_be/$be_total*100;
			$avg_re=$per_re/$re_total*100;
			$avg_ae=$per_ae/$ae_total*100;
				$_SESSION['report_values'][$i][0]=Average."  ";
				$_SESSION['report_values'][$i][1]=round($avg_be, 3)."% ";
				$_SESSION['report_values'][$i][2]=round($avg_re, 3)."%  ";
				$_SESSION['report_values'][$i][3]=round($avg_ae, 3)."%  ";
*/
?>			
				<!--tr>
				  <td class="txt"><strong>Average</strong></td>
				  <td colspan="2" class="txt" align="center"><?php // echo round($avg_be, 3)."%" ; ?></td>
				  <td colspan="2" class="txt" align="center"><?php // echo round($avg_re, 3)."%" ; ?></td>
				  <td class="txt" align="center"><?php // echo round($avg_ae, 3)."%" ; ?></td>
				</tr-->

				<tr>
<?php 

///////AVERAGE CALCULATION ENDS////////////////

} } ?>
				  <td height="30" colspan="6" align="center">&nbsp;<a href="export_report.php?fn=ST_BFC_out_State">Download in Excel</a></td>
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