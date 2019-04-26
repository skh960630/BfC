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
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
		<tr>
			<td colspan="2" align="center">  <?php include('includes/header.php') ; ?></td>
		</tr>        
		<tr>
			<td colspan="2" class="text12"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="50%" align="left" valign="top" bgcolor="#FFFFFF" class="justify"><table width="100%"  border="0" cellpadding="5" cellspacing="1" class="border1">
						<tr bgcolor="#BCCAD8">
							<td colspan="3" align="right" nowrap class="backheads"><a href="main_state.php?page=report" class="back_menu"><strong>Report Page</strong></a>&nbsp;|| &nbsp;<a href="home.php" class="back_menu"><strong>Home Page</strong></a>&nbsp;&nbsp;&nbsp;</td>
						</tr>
						<tr>
							<td height="22" colspan="3" align="left" bgcolor="#DFE6EE">&nbsp;</td>
						</tr>
						<tr bgcolor="#F1F4F7">
							<td colspan="2" align="center" class="backheads"><a href="st_head_report.php?level=state"><strong>Head Wise Report</strong></a></td>
						    <td width="49%" align="center" class="backheads"><a href="st_bfc_programme.php?level=state"><strong>Programme Wise Report</strong></a></td>
					    </tr> 
						<tr>
							<td height="22" colspan="3" align="left" bgcolor="#DFE6EE" style="font-size:14px"><strong>Allocation and Expenditure (State)</strong></td>
						</tr>
						<tr bgcolor="#F1F4F7">
							<td width="2%" align="right"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
							<td colspan="2" class="backheads"><a href="st_bfc_union_all_exp.php?level=state">State Budget</a></td>
						</tr> 
						<tr bgcolor="#F1F4F7">
							<td align="right"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
							<td colspan="2" class="backheads"><a href="st_bfc_soc_sec_all_exp.php?level=state">Social Sector Budget</a></td>
						</tr> 
						<tr bgcolor="#F1F4F7">
							<td align="right"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
							<td colspan="2" class="backheads"><a href="st_bfc_total.php?level=state">Budget for Children</a></td>
						</tr> 
						<!--tr bgcolor="#F1F4F7">
							<td align="right"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
							<td colspan="2" class="backheads"><a href="bfc_allocation.php?level=state">Social Sector, Union Budget and Budget for Children</a></td>
						</tr-->
						<tr bgcolor="#F1F4F7">
							<td align="right"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
							<td colspan="2" class="backheads"><a href="st_bfc_sectorwise.php?level=state">Sector wise</a></td>
						</tr> 
						<tr>
							<td height="22" colspan="3" align="left" bgcolor="#DFE6EE" style="font-size:14px"><strong>Share of Allocation & Expenditure (State)</strong></td>
						</tr>
						<tr bgcolor="#F1F4F7">
							<td align="right"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
							<td colspan="2" class="backheads"><a href="st_soc_all_ub.php?level=state">Social Sector Allocation out of State </a></td>
						</tr> 
						<tr bgcolor="#F1F4F7">
							<td align="right"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
							<td colspan="2" class="backheads"><a href="st_soc_expn_ub.php?level=state">Social Sector Expenditure out of State </a></td>
						</tr> 
						<tr bgcolor="#F1F4F7">
							<td align="right"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
							<td colspan="2" class="backheads"><a href="st_bfc_per_union.php?level=state">Budget for Children out of State </a></td>
						</tr> 
						<tr bgcolor="#F1F4F7">
							<td align="right"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
							<td colspan="2" class="backheads"><a href="st_bfc_all_soc.php?level=state">Budget for Children out of Social Sector Allocation</a></td>
						</tr> 
						<tr bgcolor="#F1F4F7">
							<td align="right"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
							<td colspan="2" class="backheads"><a href="st_bfc_expn_soc.php?level=state">Budget for Children out of Social Sector Expenditure</a></td>
						</tr> 
						<tr bgcolor="#F1F4F7">
							<td align="right"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
							<td colspan="2" class="backheads"><a href="st_bfc_all_ub.php?level=state">Sectorwise Allocation in State </a></td>
						</tr> 
						<tr bgcolor="#F1F4F7">
							<td align="right"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
							<td colspan="2" class="backheads"><a href="st_bfc_exp_ub.php?level=state">Sectorwise Expenditure in State </a></td>
						</tr> 
						<tr bgcolor="#F1F4F7">
							<td align="right"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
							<td colspan="2" class="backheads"><a href="st_socsec_alloc_ub.php?level=state">Sectorwise Allocation in Social Sector</a></td>
						</tr> 
						<tr bgcolor="#F1F4F7">
							<td align="right"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
							<td colspan="2" class="backheads"><a href="st_socsec_exp_ub.php?level=state">Sectorwise Expenditure in Social Sector</a></td>
						</tr> 
						<tr bgcolor="#F1F4F7">
							<td align="right"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
							<td colspan="2" class="backheads"><a href="st_bfc_percentage.php?level=state">Sectorwise in Budget for Children</a></td>
						</tr> 
						<tr>
							<td height="22" colspan="3" align="left" bgcolor="#DFE6EE" style="font-size:14px"><strong>Allocation Expenditure Gaps (State)</strong></td>
						</tr>
						<tr bgcolor="#F1F4F7">
							<td align="right"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
							<td colspan="2" class="backheads"><a href="st_ub_compare.php?level=state">State Budget</a></td>
						</tr> 
						<tr bgcolor="#F1F4F7">
							<td align="right"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
							<td colspan="2" class="backheads"><a href="st_ss_compare.php?level=state">Social Sector</a></td>
						</tr> 
						<tr bgcolor="#F1F4F7">
							<td align="right"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
							<td colspan="2" class="backheads"><a href="st_sector_compare.php?level=state">Budget for Children</a></td>
						</tr> 
						<tr bgcolor="#F1F4F7">
							<td align="right"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
							<td colspan="2" class="backheads"><a href="st_bfc_sector_compare.php?level=state">Sectorwise</a></td>
						</tr> 
						<tr>
							<td height="22" colspan="3" align="left" bgcolor="#DFE6EE" style="font-size:14px"><strong>Annual Rate of Change (State)</strong></td>
						</tr>
						<tr bgcolor="#F1F4F7">
							<td align="right"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
							<td colspan="2" class="backheads"><a href="st_annual_change_ub.php?level=state">State Budget</a></td>
						</tr> 
						<tr bgcolor="#F1F4F7">
							<td align="right"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
							<td colspan="2" class="backheads"><a href="st_annual_change_ss.php?level=state">Social Sector</a></td>
						</tr> 
						<tr bgcolor="#F1F4F7">
							<td align="right"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
							<td colspan="2" class="backheads"><a href="st_bfc_annual_change.php?level=state">Budget for Children</a></td>
						</tr> 
						<tr bgcolor="#F1F4F7">
							<td align="right"><img src="images/arrow_backend.gif" width="5" height="9" vspace="8" /></td>
							<td colspan="2" class="backheads"><a href="st_bfc_sector_change.php?level=state">Sectorwise</a></td>
						</tr> 
						<tr bgcolor="#F1F4F7">
							<td colspan="3" class="backheads"></td>
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
	</table>
</body>
</html>