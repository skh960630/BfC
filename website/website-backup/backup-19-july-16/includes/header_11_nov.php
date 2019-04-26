<?php
	include ('includes/login_check.php');
?>

<link rel="stylesheet" type="text/css" href="stylesheet/main.css">
<script language="JavaScript" src="javascript/gen_validatorv2.js" type="text/javascript"></script>
	  <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#006699" >
		<tr>
	  	  <td colspan="2" bgcolor="#165F8B">&nbsp;</td>
	  	  <td colspan="2" bgcolor="#165F8B">&nbsp;</td>
		</tr>
		<tr>
	  	  <td width="1%" align="center" bgcolor="#165F8B">&nbsp;</td>
	  	  <td width="14%" align="left" bgcolor="#165F8B" ><img src="images/haq_logo.jpg" width="135" height="108" border="0" /></td>
	  	  <td width="70%" align="right" valign="top" bgcolor="#165F8B" class="head">&nbsp;</td>
	  	  <td width="15%" align="right" valign="top" bgcolor="#165F8B" class="head">Admin Panel&nbsp;&nbsp;</td>
		</tr>
		<tr>
		  <td height="32" colspan="4" bgcolor="#165F8B" >&nbsp;</td>
		</tr>
		<tr bgcolor="FFFFFF">
		  <td colspan="2" align="left" bgcolor="#333333" class="head"></td>
		  <td height="29" align="right" valign="middle" bgcolor="#333333" ></td>
		  <td height="29" align="right" valign="middle" bgcolor="#333333" ><?php echo $_SESSION['log_status'] ; ?></td>
		</tr>
	  </table>
	  