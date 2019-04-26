<?php
	include ('includes/login_check.php');
	include ('conn.php');
	$level=$_REQUEST['level'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><html>
<head>
<script src="st_get_program.js"></script>
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
			  <td class="backheads" align="center">Budget Estimate, Revised Estimate and Actual Expenditure in Different Programmes of State Budget for Children</td>
			  </tr>
			<tr>
			  <td align="right">&nbsp; </td>
			</tr>
			<tr>
			  <td><table width="100%" align="center" border="1" cellspacing="2" cellpadding="1" bgcolor="#F1F4F7">
						<tr>
			  <td colspan="2" >&nbsp;&nbsp;&nbsp;Select State :</td>
			  <td colspan="4">
			  			  <select name="state_id" onChange="showUser(this.value)">
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
			  <td colspan="2">&nbsp;&nbsp;&nbsp;Select Sector :</td>
			  <td colspan="4" align="left" id="txtHint"><select name="sector_id" onChange="showUser1(this.value)">
			      <option value="" selected>Select</option>
			      </select></td>
			  </tr>
			<tr>
			  <td colspan="2">&nbsp;&nbsp;&nbsp;Select Programme :</td>
			  <td colspan="2" align="left" id="txtHint1"><select name="program_id">
				<option value="" selected>Select</option>
			  </select></td>
			  <td colspan="2" align="left"><input name="submit" type="submit" id="submit" value="Search">&nbsp;</td>
			  </tr>
				<tr>
				  <td height="25" colspan="6" class="txt" align="right">(Figures are in Crores)</td>
				</tr>
				<tr>
				  <td height="25" colspan="6" class="txt"><strong><?php 
					$sel_state=mysql_fetch_array(mysql_query("select * from haq_state where state_id='".$_REQUEST['state_id']."' and state_status='active' order by state_name"));
					$sec_search=mysql_fetch_array(mysql_query("select sector_name from haq_sector where sector_id='".$_REQUEST['sector_id']."'"));
					$pro_search=mysql_fetch_array(mysql_query("select program_name from haq_st_program where program_id='".$_REQUEST['program_id']."'"));
					if($sec_search['sector_name'] !='' && $pro_search['program_name'] !=''){
					  echo "Search Result for : " .$sel_state['state_name'] ." >> " .$sec_search['sector_name'] ." >> " .$pro_search['program_name'] ; 
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


		$select_tempid=mysql_query("select count(temp_id) as temp_id from haq_state_id");
		$result_tempid=mysql_fetch_array($select_tempid);
		if($result_tempid['temp_id'] >=5){
			$update_showid=mysql_query("delete from haq_state_id");
		}
			
			
			$select_budget_report="select sum(a.be_grand_total) as be_total, sum(a.re_grand_total) as re_total, sum(a.ae_grand_total) as ae_total, a.expend_year from haq_head_expend_state a LEFT JOIN haq_st_major_head b ON a.major_head_id=b.major_head_id where a.expend_status='active' and a.program_id='".$_REQUEST['program_id']."' and a.sector_id='".$_REQUEST['sector_id']."' and a.expend_type='".$_REQUEST['level']."' and a.state_id='".$_REQUEST['state_id']."' group by a.expend_year";
			$result_budget_report=mysql_query($select_budget_report);
			
// For Excel File Generation
			unset($_SESSION['report_header']);
			unset($_SESSION['report_values']);
			$_SESSION['report_header']=array("Budget Estimate, Revised Estimate and Actual Expenditure in Different Programmes of State Budget for Children"," "," "," "); 
				$i=0;
				$_SESSION['report_values'][$i][0]=$sel_state['state_name'] ." >> " .$sec_search['sector_name'] ." >> " .$pro_search['program_name'];
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
	
?>			
				<tr>
				  <td height="30" colspan="6" align="center">&nbsp;<a href="export_report.php?fn=ST_Programme_bfc">Download in Excel</a></td>
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
</script>