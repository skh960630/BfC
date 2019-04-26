<?php 
	include ('includes/login_check.php');
	include ('includes/admin_check.php');
	include ('conn.php');
	if(isset($_REQUEST['submit'])){


		$user_check = mysql_query("SELECT * FROM haq_admin_user WHERE admin_user_id = '".$_REQUEST['user_id']."' or admin_state_id= '".$_REQUEST['state_id']."'");
		$check = mysql_num_rows($user_check);
			$select_state=mysql_query("select * from haq_state where state_id='".$_REQUEST['state_id']."'");
			$result_state=mysql_fetch_array($select_state);
		if ($check != 0) {
			$error="Sorry, the User ID '".$_REQUEST['user_id']. "' or User ID for the State '".$result_state['state_name']."' is already created.";
		} else{
			$insert_query="INSERT INTO haq_admin_user (admin_name, admin_user_id, admin_password, admin_level, admin_state_id, admin_state_name, admin_status) VALUES ('".$_REQUEST['user_name']."', '".$_REQUEST['user_id']."', '".$_REQUEST['user_password']."', 'sub', '".$_REQUEST['state_id']."', '".$result_state['state_name']."', 'active')";
			$insert_result=mysql_query($insert_query);
			echo "<meta http-equiv='Refresh' content='0; url=user.php'>";
			exit;
		}
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><html>
<head>
	<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" background="images/Picture1.jpg">
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
		<tr>
			<td colspan="2" align="center"><?php include('includes/header.php') ; ?></td>
		</tr>
		<tr>
			<td colspan="2" class="text12"><table width="100%"  border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
				<tr>
					<td align="right" valign="top" height="10" ><a href="main_union.php?page=admin" class="back_menu"><strong>Admin Page</strong></a>&nbsp;|| &nbsp;<a href="home.php" class="back_menu"><strong>Home Page </strong></a>&nbsp;&nbsp;&nbsp;</td>
				</tr>
				<tr>
					<td align="left" valign="top" height="10"> </td>
				</tr>
				<tr>
					<td align="left" valign="top" ><form name="form1" method="post" action=""><table width="50%" align="center" border="0" cellspacing="2" cellpadding="1" bgcolor="#F1F4F7">
						<tr>
							<td width="24%">&nbsp;</td>
							<td width="34%" align="center" class="backheads"><strong>Add State User </strong></td>
							<td width="42%" align="right"><a href="user.php" class="back_menu">View State User </a>&nbsp;&nbsp;</td>
						</tr>
						<tr>
							<td colspan="3" align="center" class="error"><?php echo $error ; ?></td>
						</tr>
						<tr>
							<td>&nbsp;&nbsp;&nbsp;<strong>State :</strong></td>
							<td colspan="2" align="left"><select name="state_id">
							<option value="" selected>Select</option>
							<?php
								$sel_state="select * from haq_state where state_status='active' order by state_name";
								$res_state=mysql_query($sel_state);
								while($fetch_state = mysql_fetch_array($res_state)){ ?>
							<option value="<?php echo $fetch_state['state_id']; ?>" ><?php echo $fetch_state['state_name'];?></option> 
							<?php
								 }
							?>
							</select></td>
						</tr>
						<tr>
							<td>&nbsp;&nbsp;&nbsp;<strong>User ID:</strong></td>
							<td colspan="2" align="left"><input name="user_id" type="text" value="" size="20"></td>
						</tr>
						<tr>
							<td>&nbsp;&nbsp;&nbsp;<strong>User Name :</strong></td>
							<td colspan="2" align="left"><input name="user_name" type="text" value="" size="20"></td>
						</tr>
						<tr>
							<td>&nbsp;&nbsp;&nbsp;<strong>Password :</strong></td>
							<td colspan="2" align="left"><input name="user_password" type="password" value="" size="20"></td>
						</tr>
						<tr>
							<td>&nbsp;&nbsp;&nbsp;<strong>Confirm Password :</strong></td>
							<td colspan="2" align="left"><input name="confirm_password" type="password" value="" size="20"></td>
						</tr>
						<tr>
							<td>&nbsp; </td>
							<td colspan="2" align="left">&nbsp; </td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td colspan="2" align="left"><input type="submit" name="submit" value="Submit"><input type="reset" name="reset" value="Reset"></td>
						</tr>
					</table></form> </td>
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
			<td colspan="2"><?php include ('includes/footer.php') ; ?></td>
		</tr>
	</table>
</body>
</html>
<script language="JavaScript" type="text/javascript">
	var frmvalidator = new Validator("form1");
	frmvalidator.addValidation("state_id","req","Please select State");
	frmvalidator.addValidation("user_id","req","Please Enter User ID");
	frmvalidator.addValidation("user_name","req","Please Enter User Name");
	frmvalidator.addValidation("user_password","req","Please Enter User Password");
	frmvalidator.addValidation("confirm_password","req","Please Enter User Confirm Password");
	frmvalidator.setAddnlValidationFunction("DoCustomValidation"); 

	function DoCustomValidation(){
		var frm = document.forms["form1"];
		if(frm.user_password.value != frm.confirm_password.value){
			alert('The Password and Confirm password do not match!');
			return false;
		} else {
			return true;
		}
	}
</script>