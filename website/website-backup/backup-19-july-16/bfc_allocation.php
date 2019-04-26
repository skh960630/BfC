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
		  <td align="right" valign="top" height="10" ><a href="bfc_union.php" class="back_menu"><strong>Report </strong></a>&nbsp;|| &nbsp;<a href="home.php" class="back_menu"><strong>Home Page</strong></a>&nbsp;&nbsp;&nbsp;</td>
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
			  <td class="backheads" align="center">Allocation for Social Sector, Union Budget and Budget for Children </td>
			  </tr>
			<tr>
			  <td align="right">&nbsp; </td>
			</tr>
			<tr>
			  <td><table width="100%" align="center" border="1" cellspacing="2" cellpadding="1" bgcolor="#F1F4F7">
			<tr>
			  <td colspan="6">&nbsp;</td>
			  </tr>
				<tr>
				  <td height="25" colspan="6" class="txt" align="right">(Figures are in Crores)</td>
				</tr>
				<tr>
				  <td height="25" colspan="6" class="txt">&nbsp;</td>
				  </tr>
				<tr>
				  <td width="122" height="25" class="txt"><strong>Year </strong></td>
				  <td colspan="2" class="txt" align="center"><strong>Union Budget (Budget Estimate)</strong></td>
				  <td height="25" colspan="2" align="center" class="txt"><strong>Social Sector  (Budget Estimate)</strong></td>
				  <td height="25" class="txt" align="center"><strong>Budget for Children  (Budget Estimate)</strong></td>
			    </tr>

<?php
			$select_year="select * from haq_year where year_status='active' order by year_id";
			$result_year=mysql_query($select_year);
			while($fetch_year=mysql_fetch_array($result_year)){

				$select_bfc="select sum(a.be_grand_total) as be_total, sum(a.re_grand_total) as re_total, sum(a.ae_grand_total) as ae_total, a.expend_year from haq_head_expend_union a LEFT JOIN haq_major_head b ON a.major_head_id=b.major_head_id where b.major_head_status='active' and a.expend_type='".$_REQUEST['level']."' and a.expend_status='active' and a.expend_year='".$fetch_year['year_name']."' group by a.expend_year";
				$result_bfc=mysql_query($select_bfc);
				$fetch_bfc=mysql_fetch_array($result_bfc);
				$sum_be_bfc= $fetch_bfc['be_total']/10000 ;
				$sum_re_bfc= $fetch_bfc['re_total']/10000 ;
				$sum_ae_bfc= $fetch_bfc['ae_total']/10000 ;

			$select_union_budget="select budget_be_grand_total, budget_re_grand_total, budget_ae_grand_total, budget_year from haq_budget_report_union where budget_type='".$_REQUEST['level']."' and social_sector_type='na' and budget_status='active' and budget_year='".$fetch_year['year_name']."'";
			$result_union_budget=mysql_query($select_union_budget);
			$fetch_union_budget=mysql_fetch_array($result_union_budget);

			$select_social_budget="select budget_be_grand_total, budget_re_grand_total, budget_ae_grand_total, budget_year from haq_budget_report_union where budget_type='social_sec' and social_sector_type='".$_REQUEST['level']."' and budget_year='".$fetch_year['year_name']."'";
			$result_social_budget=mysql_query($select_social_budget);
			$fetch_social_budget=mysql_fetch_array($result_social_budget);
			if($fetch_union_budget['budget_year'] !=0 && $fetch_social_budget['budget_year'] !=0){					

?>	
	
				<tr>
				  <td class="txt"><strong><?php echo $fetch_bfc['expend_year'] ; ?></strong></td>
				  <td colspan="2" class="txt" align="center"><?php echo round($fetch_union_budget['budget_be_grand_total'], 2) ; ?></td>
				  <td colspan="2" class="txt" align="center"><?php echo round($fetch_social_budget['budget_be_grand_total'], 2) ; ?></td>
				  <td class="txt" align="center"><?php echo round($sum_be_bfc, 2) ; ?></td>
				</tr>
<?php
}	}
?>			
				<tr>
				  <td height="30" colspan="6">&nbsp;</td>
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
