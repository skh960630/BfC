<?php
	include ('conn.php');
	if(isset($_REQUEST['submit'])){
		$login_check = mysql_query("SELECT * FROM haq_admin_user WHERE admin_user_id= '".$_REQUEST['admin_user']."' && admin_password='".$_POST['admin_password']."' && admin_status='active'");
		if(@mysql_num_rows($login_check)>0){
			$user_details=mysql_fetch_array($login_check);
			session_start();
			$_SESSION['admin_user'] = $user_details['admin_user_id'];
			$_SESSION['admin_name'] = $user_details['admin_name'];
			$_SESSION['admin_level'] = $user_details['admin_level'];
			$_SESSION['user_state_id'] = $user_details['admin_state_id'];
			$_SESSION['user_state_name'] = $user_details['admin_state_name'];
			
			echo "<meta http-equiv='Refresh' content='0; url=home.php'>";
			exit;
		} else {
			$error="Invalid Username/Password";
		}

	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><html>
<head>
	<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="stylesheet/main.css"></head>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" >
	<table width="80%" border="10" align="center" cellpadding="0" cellspacing="0" bgcolor="FFFFFF">
		<tr>
			<td colspan="2" align="center"><? include('includes/header_index.php'); ?></td>
		</tr>
		<tr>
			<td colspan="2" class="text12"><table width="100%" height="100%"  border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
				<tr>
					<td align="left" valign="top"><form name="form1" method="post" action="" ><table width="250"  border="0" align="center" cellpadding="3" cellspacing="1">
						<tr>
							<td width="40%" align="right"></td>
							<td width="60%" align="left"></td>
						</tr>
						<tr>
							<td colspan="2" align="center" class="error"><strong><?php echo $error ; ?></strong></td>
						</tr>
						<tr>
							<td width="40%" align="right">Username :</td>
							<td width="60%" align="left"><input name="admin_user" type="text" class="formelement"></td>
						</tr>
						<tr>
							<td align="right">Password : </td>
							<td align="left"><input name="admin_password" type="password" class="formelement"></td>
						</tr>
						<tr align="center">
							<td align="left">&nbsp;</td>
							<td align="left"><input name="submit" type="submit" class="formbutton" value="Submit">&nbsp;<input name="Submit2" type="reset" class="formInputButton" value="Reset"></td>
						</tr>
					</table></form></td>
				</tr>
			</table></td>
		</tr>
	</table></td>
</body>
</html>
<script language="JavaScript" type="text/javascript">
var frmvalidator = new Validator("form1");
frmvalidator.addValidation("admin_user","req","Please Enter User Name");
frmvalidator.addValidation("admin_password","req","Please Enter Password");
</script>
