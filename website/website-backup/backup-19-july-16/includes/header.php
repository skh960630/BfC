<?php
	include ('includes/login_check.php');
?>

<link rel="stylesheet" type="text/css" href="stylesheet/main.css">
<script language="JavaScript" src="javascript/gen_validatorv2.js" type="text/javascript"></script>
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
	  	  <td colspan="4" width="14%" align="center"><img src="images/header2.jpg" width="1000" height="175" border="0" /></td>
		</tr>
		<tr>
		  <td height="32" colspan="4" >&nbsp;</td>
		</tr>
		<tr bgcolor="FFFFFF">
		  <td colspan="2" align="left" bgcolor="#333333" class="head"></td>
		  <td height="29" align="right" valign="middle" bgcolor="#333333" ></td>
		  <td height="29" align="right" valign="middle" bgcolor="#333333" ><?php echo $_SESSION['log_status'] ; ?></td>
		</tr>
	  </table>
	  