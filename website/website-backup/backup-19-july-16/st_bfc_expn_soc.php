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
		  <table width="50%" align="center" border="0" cellspacing="2" cellpadding="1" bgcolor="#F1F4F7">
			<tr>
			  <td>&nbsp; </td>
			</tr>
			<tr>
			  <td class="backheads" align="center">Share of Budget for Children in State Social Sector Expenditure </td>
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
			  <td width="147" align="left"><input name="submit" type="submit" id="submit" value="Search">&nbsp;</td>
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
				  <td height="25" colspan="7" class="txt">&nbsp;</td>
				  </tr>
					<tr>
					  <td height="25" class="txt" colspan="3"><strong>Year </strong></td>
					  <td height="25" align="center" class="txt" colspan="4"><strong>Share of Budget for Children in Social Sector Expenditure </strong></td>
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

			$select_year="select * from haq_year where year_status='active' and year_code between '".$_REQUEST['year_from']."' and '".$_REQUEST['year_to']."' order by year_id";
			$result_year=mysql_query($select_year);
// For Excel File Generation
			unset($_SESSION['report_header']);
			unset($_SESSION['report_values']);
			$_SESSION['report_header']=array("Share of Budget for Children in State Social Sector Expenditure"," "); 
				$i=0;
				$_SESSION['report_values'][$i][0]=State." >> ".$fetch_state['state_name'];
				$_SESSION['report_values'][$i][1]=" ";
				$i=1;
				$_SESSION['report_values'][$i][0]=Year."  ";
				$_SESSION['report_values'][$i][1]=Share." ".of." ".Budget." "."for"." ".Children." ".in." ".State." ".Social." ".Sector." ".Expenditure." ";
				$i=2;
			while($fetch_year=mysql_fetch_array($result_year)){


			$select_social_budget="select budget_ae_grand_total, budget_year from haq_budget_report_union where budget_type='social_sec' and budget_status='active' and social_sector_type='".$_REQUEST['level']."' and state_id='".$_REQUEST['state_id']."' and budget_year='".$fetch_year['year_name']."'";
			$result_social_budget=mysql_query($select_social_budget);
			$fetch_social_budget=mysql_fetch_array($result_social_budget);

			$select_ae="select sum(ae_grand_total) as ae_total, expend_year from haq_head_expend_state where expend_type='".$_REQUEST['level']."' and expend_status='active' and state_id='".$_REQUEST['state_id']."' and expend_year='".$fetch_year['year_name']."' group by expend_year";
			$result_ae=mysql_query($select_ae);
			$fetch_ae=mysql_fetch_array($result_ae);
			$ae_cro=$fetch_ae['ae_total']/10000;
			if($fetch_social_budget['budget_year'] !=0 && $fetch_ae['expend_year'] !=0){
			if ($fetch_social_budget['budget_ae_grand_total'] !=0)
			{
			$ae_bfc= $ae_cro/$fetch_social_budget['budget_ae_grand_total']*100;
			} else {
			$ae_bfc = 0 ;
			}
				$_SESSION['report_values'][$i][0]=$fetch_social_budget['budget_year']."  ";
				$_SESSION['report_values'][$i][1]=round($ae_bfc, 3)."% ";
?>	
				
				<tr>
				  <td class="txt" colspan="3"><strong><?php echo $fetch_social_budget['budget_year'] ; ?></strong></td>
				  <td align="center" class="txt" colspan="4"><?php echo round($ae_bfc, 3)."%" ; ?></td>
				  </tr>
<?php
				$i=$i+1;
}	}

///////AVERAGE CALCULATION STARTS////////////////
/*

			$select_soc_all="select sum(budget_ae_grand_total) as soc_total from haq_budget_report_union where budget_type='social_sec' and budget_year_code between '".$_REQUEST['year_from']."' and '".$_REQUEST['year_to']."' and social_sector_type='".$_REQUEST['level']."' and state_id='".$_REQUEST['state_id']."' and budget_status='active'";
			$result_soc_all=mysql_query($select_soc_all);
			$fetch_soc_all=mysql_fetch_array($result_soc_all);

			$select_bfc_all="select sum(ae_grand_total) as ae_total from haq_head_expend_state where expend_type='".$_REQUEST['level']."' and expend_year_code between '".$_REQUEST['year_from']."' and '".$_REQUEST['year_to']."' and state_id='".$_REQUEST['state_id']."' and expend_status='active'";
			$result_bfc_all=mysql_query($select_bfc_all);
			$fetch_bfc_all=mysql_fetch_array($result_bfc_all);
			$bfc_cro_total=$fetch_bfc_all['ae_total']/10000;

			if($fetch_soc_all['soc_total'] !=0){
			$sec_total= $bfc_cro_total/$fetch_soc_all['soc_total']*100;
				$_SESSION['report_values'][$i][0]=Average."  ";
				$_SESSION['report_values'][$i][1]=round($sec_total, 3)."% ";

*/
?>			
				<!--tr>
				  <td class="txt" colspan="3"><strong>Average</strong></td>
				  <td align="center" class="txt" colspan="4"><?php // echo round($sec_total, 3)."%"; ?></td>
				  </tr-->
<?php   
//} 

///////AVERAGE CALCULATION ENDS////////////////

} }?>

				<tr>
				  <td height="30" colspan="7" align="center">&nbsp;<a href="export_report.php?fn=ST_share_BFC_SS_exp">Download in Excel</a></td>
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