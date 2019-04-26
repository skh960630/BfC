<?php
	include ('includes/login_check.php');
	include ('conn.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd"><html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="stylesheet/main.css">
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" background="images/Picture1.jpg">
  <form name="form1" method="post" action=""><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
    <tr>
	  <td colspan="2" align="center">  <?php include('includes/header.php') ; ?>
</td>
	</tr>        
	<tr>
	  <td colspan="2" class="text12"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
		<tr>
		  <td width="50%" align="left" valign="top" bgcolor="#FFFFFF" class="justify"><table width="100%"  border="0" cellpadding="5" cellspacing="1" class="border1">
			<tr bgcolor="#BCCAD8">
			  <td align="right" nowrap class="backheads"><a href="bfc_union.php" class="back_menu"><strong>Report </strong></a>&nbsp;|| &nbsp;<a href="home.php" class="back_menu"><strong>Home Page</strong></a>&nbsp;&nbsp;&nbsp;</td>
			  </tr>
			<tr bgcolor="#BCCAD8">
			  <td nowrap>&nbsp;</td>
			  </tr>
			<tr bgcolor="#F1F4F7">
			  <td class="backheads"><a href="bfc_total.php?level=union">Budget Estimate, Revised Estimate and Actual Expenditure of Budget for Children</a></td>
		    </tr> 
			<tr bgcolor="#F1F4F7">
			  <td class="backheads"><a href="bfc_sectorwise.php?level=union">Budget Estimate, Revised Estimate and Actual Expenditure in Different Sectors of Budget for Children</a></td>
		    </tr> 
			<tr bgcolor="#F1F4F7">
			  <td class="backheads"><a href="bfc_percentage.php?level=union">Different Sectors as Percentage of Budget for Children</a></td>
		    </tr> 
			<tr bgcolor="#F1F4F7">
			  <td class="backheads"><a href="bfc_per_union.php?level=union">Budget for Children as Percentage of Union Budget</a></td>
		    </tr> 
			<tr bgcolor="#F1F4F7">
			  <td class="backheads"><a href="bfc_programme.php?level=union">Budget Estimate, Revised Estimate and Actual Expenditure in Different Programmes of Budget for Children</a></td>
		    </tr> 
			<tr bgcolor="#F1F4F7">
			  <td class="backheads"><a href="bfc_allocation.php?level=union">Allocation for Social Sector, Union Budget and Budget for Children</a></td>
		    </tr> 
			<tr bgcolor="#F1F4F7">
			  <td class="backheads"><a href="soc_all_ub.php?level=union">Share of Social Sector Allocation in Union Budget</a></td>
		    </tr> 
			<tr bgcolor="#F1F4F7">
			  <td class="backheads"><a href="bfc_all_soc.php?level=union">Share of Budget for Children in Social Sector Allocation</a></td>
		    </tr> 
			<tr bgcolor="#F1F4F7">
			  <td class="backheads"><a href="soc_expn_ub.php?level=union">Share of Social Sector Expenditure in Union Budget</a></td>
		    </tr> 
			<tr bgcolor="#F1F4F7">
			  <td class="backheads"><a href="bfc_expn_soc.php?level=union">Share of Budget for Children in Social Sector Expenditure</a></td>
		    </tr> 
			<tr bgcolor="#F1F4F7">
			  <td class="backheads"><a href="bfc_all_ub.php?level=union">Sectoral Allocation within Budget for Children, as percentage of the Union Budget</a></td>
		    </tr> 
			<tr bgcolor="#F1F4F7">
			  <td class="backheads"><a href="bfc_exp_ub.php?level=union">Sectoral Expenditure within Budget for Children, as percentage of the Union Budget</a></td>
		    </tr> 
			<tr bgcolor="#F1F4F7">
			  <td class="backheads"><a href="sector_compare.php?level=union">Average Sectoral difference in Budget Estimates, Revised Estimates and Actual Expenditure within the Budget for Children</a></td>
		    </tr> 
			<tr bgcolor="#F1F4F7">
			  <td class="backheads"><a href="bfc_sector_compare.php?level=union">Difference in Budget Estimates, Revised Estimates and Actual Expenditure on Different Sectors of Budget for Children</a></td>
		    </tr> 
			<tr bgcolor="#F1F4F7">
			  <td class="backheads"><a href="bfc_annual_change.php?level=union">Annual Rate of Change in Budget Estimates, Revised Estimates and Actual Expenditure in the Budget for Children</a></td>
		    </tr> 
			<tr bgcolor="#F1F4F7">
			  <td class="backheads"><a href="bfc_sector_change.php?level=union">Annual Rate of Change in Sectoral Allocation within the Budget for Children</a></td>
		    </tr> 
		  </table></td>
		</tr>
	  </table></td>
	</tr>
	<tr>
	  <td height="1" colspan="2" bgcolor="#B4AF9D"></td>
	</tr>
	<tr>
	  <td colspan="2"><?php include ('includes/footer.php') ; ?></td>
	</tr>
  </table></form>
</body>
</html>