<?php 
	include ('includes/login_check.php');
	include ('includes/admin_check.php');
	include ('conn.php');
	$fetch_query=mysql_query("select * from haq_admin_user where admin_id='1' and admin_level='super'");
	$fetch_result=mysql_fetch_array($fetch_query);
	if(isset($_REQUEST['submit'])){

		$s_query=mysql_query("select * from haq_admin_user where admin_user_id='".$_REQUEST['user_id']."' and admin_id !='1'");
		$f_query=mysql_num_rows($s_query);
		if($f_query !=0){
			$error= "Sorry, The User ID " . $_REQUEST['user_id'] . " is already in use.";
		} else {
			$update_state=mysql_query("update haq_admin_user set admin_name='".$_REQUEST['user_name']."', admin_user_id='".$_REQUEST['user_id']."', admin_password='".$_REQUEST['user_password']."' where admin_id='1' and admin_level='super'");
			if($update_state){
				echo "<meta http-equiv='Refresh' content='0; url=main_union.php?page=admin'>";
				exit;
			} else { 
				$error= "Record could not be added" ; }
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
	  <td colspan="2" align="center"><?php include('includes/header.php') ; ?>
      </td>
	</tr>
	<tr>
	  <td colspan="2" class="text12">
	  <table width="100%"  border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
		<tr>
		  <td align="right" valign="top" height="10" ><a href="main_union.php?page=admin" class="back_menu"><strong>Admin Page</strong></a>&nbsp;|| &nbsp;<a href="home.php" class="back_menu"><strong>Home Page </strong></a>&nbsp;&nbsp;&nbsp;</td>
		</tr>
		<tr>
		  <td align="left" valign="top" height="10"> </td>
		</tr>
		<tr>
		  <td align="left" valign="top" >
		  <form name="form1" method="post" action="">
		  <table width="50%" align="center" border="0" cellspacing="2" cellpadding="1" bgcolor="#F1F4F7">
			<tr>
			  <td width="25%">&nbsp;</td>
			  <td width="33%" align="center" class="backheads"><strong>Edit Admin Detail </strong></td>
			  <td width="42%" align="right"><a href="user.php" class="back_menu"></td>
			</tr>
			<tr>
			  <td colspan="3" align="center" class="error"><?php echo $error ; ?></td>
			</tr>
			<tr>
			  <td>&nbsp;&nbsp;&nbsp;<strong>User ID :</strong></td>
			  <td colspan="2" align="left"><input name="user_id" type="text" value="<?php echo $fetch_result['admin_user_id'] ; ?>" size="20"></td>
			</tr>
			<tr>
			  <td>&nbsp;&nbsp;&nbsp;<strong>User Name :</strong></td>
			  <td colspan="2" align="left"><input name="user_name" type="text" value="<?php echo $fetch_result['admin_name'] ; ?>" size="20"></td>
			</tr>
			<tr>
			  <td>&nbsp;&nbsp;&nbsp;<strong>Old Password :</strong></td>
			  <td colspan="2" align="left"><input name="old_password" type="text" value="<?php echo $fetch_result['admin_password'] ; ?>" disabled="disabled" size="20"></td>
			</tr>
			<tr>
			  <td>&nbsp;&nbsp;&nbsp;<strong>Password :</strong></td>
			  <td colspan="2" align="left"><input name="user_password" type="text" value="" size="20"></td>
			</tr>
			<tr>
			  <td>&nbsp;&nbsp;&nbsp;<strong>Confirm Password :</strong></td>
			  <td colspan="2" align="left"><input name="confirm_password" type="text" value="" size="20"></td>
			</tr>
			<tr>
			  <td>&nbsp; </td>
			  <td colspan="2" align="left">&nbsp; </td>
			</tr>
			<tr>
			  <td>&nbsp;</td>
			  <td colspan="2" align="left"><input type="submit" name="submit" value="Submit"><input type="reset" name="reset" value="Reset"></td>
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
//	frmvalidator.addValidation("state_id","req","Please select State");
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