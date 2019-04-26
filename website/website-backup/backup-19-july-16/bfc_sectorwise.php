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
		  <table width="70%" align="center" border="0" cellspacing="2" cellpadding="1" bgcolor="#F1F4F7">
			<tr>
			  <td>&nbsp; </td>
			</tr>
			<tr>
			  <td class="backheads" align="center">Budget Estimate, Revised Estimate and Actual Expenditure in Different Sectors of Budget for Children</td>
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
			  </tr>
			<tr>
			  <td colspan="2">&nbsp;&nbsp;&nbsp;Select Sector :</td>
			  <td colspan="2" align="left"><select name="sector_id">
                <option value="" selected>Select</option>
                <?
					$sel_query="select * from haq_sector where sector_status='active' order by sector_name";
					$res_query=mysql_query($sel_query);
					while($fetch_query = mysql_fetch_array($res_query)){ ?>
                <option value="<?php echo $fetch_query['sector_id']; ?>" ><?php echo $fetch_query['sector_name'];?></option>
                <? }?>
              </select></td>
			  <td colspan="2" align="left"><input name="submit" type="submit" id="submit" value="Search">&nbsp;</td>
			  </tr>
				<tr>
				  <td height="25" colspan="6" class="txt" align="right">(Figures are in Crores)</td>
				</tr>
				<tr>
				  <td height="25" colspan="6" class="txt"><strong><?php 
				  	
					$sec_search=mysql_fetch_array(mysql_query("select sector_name from haq_sector where sector_id='".$_REQUEST['sector_id']."'"));
					if($sec_search['sector_name'] !=''){
					  echo "Search Result for : Sector >>" .$sec_search['sector_name'] ; 
					  }
					?></strong></td>
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
			

			$select_budget_report="select sum(a.be_grand_total) as be_total, sum(a.re_grand_total) as re_total, sum(a.ae_grand_total) as ae_total, a.expend_year from haq_head_expend_union a LEFT JOIN haq_major_head b ON a.major_head_id=b.major_head_id where b.major_head_status='active' and a.expend_year_code between '".$_REQUEST['year_from']."' and '".$_REQUEST['year_to']."' and b.sector_id='".$_REQUEST['sector_id']."' and a.expend_type='".$_REQUEST['level']."' group by a.expend_year";
			
			$result_budget_report=mysql_query($select_budget_report);
// For Excel File Generation
			unset($_SESSION['report_header']);
			unset($_SESSION['report_values']);
			$_SESSION['report_header']=array("Budget Estimate, Revised Estimate and Actual Expenditure in Different Sectors of Budget for Children"," "," "," "); 
				$i=0;
				$_SESSION['report_values'][$i][0]=Sector."-".$sec_search['sector_name'];
				$_SESSION['report_values'][$i][1]=" ";
				$_SESSION['report_values'][$i][2]=" ";
				$_SESSION['report_values'][$i][3]=" ";
				$i=1;
				$_SESSION['report_values'][$i][0]=Year."  ";
				$_SESSION['report_values'][$i][1]=Budget." ".Estimate." ";
				$_SESSION['report_values'][$i][2]=Revised." ".Estimate." ";
				$_SESSION['report_values'][$i][3]=Actual." ".Expenditure." ";
				$i=2;
			while($fetch_budget_report=mysql_fetch_array($result_budget_report)){

			
			$sum_be_grand= $fetch_budget_report['be_total']/10000 ;
			$sum_re_grand= $fetch_budget_report['re_total']/10000 ;
			$sum_ae_grand= $fetch_budget_report['ae_total']/10000 ;
				$_SESSION['report_values'][$i][0]=$fetch_budget_report['expend_year']."  ";
				$_SESSION['report_values'][$i][1]=round($sum_be_grand, 3)."  ";
				$_SESSION['report_values'][$i][2]=round($sum_re_grand, 3)."  ";
				$_SESSION['report_values'][$i][3]=round($sum_ae_grand, 3)."  ";
			
?>	
	
				<tr>
				  <td class="txt"><strong><?php echo $fetch_budget_report['expend_year'] ; ?></strong></td>
				  <td colspan="2" class="txt" align="center"><?php echo round($sum_be_grand, 3) ; ?></td>
				  <td colspan="2" class="txt" align="center"><?php echo round($sum_re_grand, 3) ; ?></td>
				  <td class="txt" align="center"><?php echo round($sum_ae_grand, 3) ; ?></td>
				</tr>
<?php
				$i=$i+1;
}
}	
}
?>			
				<tr>
				  <td height="30" colspan="6" align="center">&nbsp;<a href="export_report.php?fn=UB_sectorwise_bfc">Download in Excel</a></td>
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
frmvalidator.addValidation("sector_id","req","Please Select Sector");
frmvalidator.addValidation("year_from","req","Please Select Year From");
frmvalidator.addValidation("year_to","req","Please Select Year To");
</script>