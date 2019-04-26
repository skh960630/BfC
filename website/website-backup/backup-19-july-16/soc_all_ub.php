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
		  <td align="right" valign="top" height="10" ><a href="acronyms.php" class="back_menu" target="_blank">Acronyms</a>&nbsp;|| &nbsp;<a href="bfc_union.php" class="back_menu"><strong>Report </strong></a>&nbsp;|| &nbsp;<a href="home.php" class="back_menu"><strong>Home Page</strong></a>&nbsp;&nbsp;&nbsp;</td>
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
			  <td class="backheads" align="center">Share of Social Sector Allocation in Union Budget  </td>
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
			  <td width="132" colspan="2" align="left">&nbsp;To : &nbsp;&nbsp;
                <select name="year_to">
                  <option value="" selected>Select</option>
                  <?php
					$sel_year="select * from haq_year where year_status='active' order by year_code";
					$res_year=mysql_query($sel_year);
					while($fetch_year = mysql_fetch_array($res_year)){ ?>
                  <option value="<?php echo $fetch_year['year_code']; ?>" ><?php echo $fetch_year['year_name'];?></option>
                  <? }?>
                </select></td>
			  <td width="134" align="left"><input name="submit" type="submit" id="submit" value="Search">&nbsp;</td>
				</tr>
				<tr>
				  <td height="25" colspan="7" class="txt">&nbsp;</td>
				  </tr>
					<tr>
					  <td height="25" colspan="3" class="txt"><strong>Year </strong></td>
					  <td height="25" colspan="4" align="center" class="txt"><strong>Share of Social Sector Allocation in Union Budget </strong></td>
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
			$_SESSION['report_header']=array("Share of Social Sector Allocation in Union Budget"," "); 
				$i=0;
				$_SESSION['report_values'][$i][0]=Year."  ";
				$_SESSION['report_values'][$i][1]=Share." ".of." ".Social." ".Sector." ".Allocation." ".in." ".Union." ".Budget." ";
				$i=1;
			while($fetch_year=mysql_fetch_array($result_year)){


			$select_union_budget="select budget_be_grand_total, budget_year from haq_budget_report_union where budget_type='".$_REQUEST['level']."' and social_sector_type='na' and budget_status='active' and budget_year='".$fetch_year['year_name']."'";
			$result_union_budget=mysql_query($select_union_budget);
			$fetch_union_budget=mysql_fetch_array($result_union_budget);

			$select_social_budget="select budget_be_grand_total, budget_year from haq_budget_report_union where budget_type='social_sec' and social_sector_type='".$_REQUEST['level']."' and budget_year='".$fetch_year['year_name']."'";
			$result_social_budget=mysql_query($select_social_budget);
			$fetch_social_budget=mysql_fetch_array($result_social_budget);

			if($fetch_union_budget['budget_year'] !=0 && $fetch_social_budget['budget_year'] !=0){
			$sec_all= $fetch_social_budget['budget_be_grand_total']/$fetch_union_budget['budget_be_grand_total']*100;
				$_SESSION['report_values'][$i][0]=$fetch_union_budget['budget_year']."  ";
				$_SESSION['report_values'][$i][1]=round($sec_all, 3)."% ";
?>	
	
				<tr>
				  <td colspan="3" class="txt"><strong><?php echo $fetch_union_budget['budget_year'] ; ?></strong></td>
				  <td colspan="4" align="center" class="txt"><?php echo round($sec_all, 3)."%" ; ?></td>
				  </tr>
<?php
				$i=$i+1;
}	}
////////////////// A V E R A G E /////////////////////

/*			$select_union_total="select sum(budget_be_grand_total) as be_total from haq_budget_report_union where budget_type='".$_REQUEST['level']."' and social_sector_type='na' and budget_year_code between '".$_REQUEST['year_from']."' and '".$_REQUEST['year_to']."' and budget_status='active'";
			$result_union_total=mysql_query($select_union_total);
			$fetch_union_total=mysql_fetch_array($result_union_total);

			$select_social_total="select sum(budget_be_grand_total) as soc_total from haq_budget_report_union where budget_type='social_sec' and budget_year_code between '".$_REQUEST['year_from']."' and '".$_REQUEST['year_to']."' and social_sector_type='".$_REQUEST['level']."'";
			$result_social_total=mysql_query($select_social_total);
			$fetch_social_total=mysql_fetch_array($result_social_total);
			if($fetch_union_total['be_total'] !=0){
			$sec_total= $fetch_social_total['soc_total']/$fetch_union_total['be_total']*100;

				$_SESSION['report_values'][$i][0]=Average."  ";
				$_SESSION['report_values'][$i][1]=round($sec_total, 3)."% ";
*/
?>			
				<!--tr>
				  <td colspan="3" class="txt"><strong>Average</strong></td>
				  <td colspan="4" align="center" class="txt"><?php // echo round($sec_total, 3)."%"; ?></td>
				  </tr-->
<?php 

//} 

////////////////// A V E R A G E /////////////////////
 } }?>
				<tr>
				  <td height="30" colspan="7" align="center">&nbsp;<a href="export_report.php?fn=UB_allocation_sectorwise">Download in Excel</a></td>
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
frmvalidator.addValidation("year_from","req","Please Select Year From");
frmvalidator.addValidation("year_to","req","Please Select Year To");
</script>