<?php 
	include ('includes/login_check.php');
	include ('includes/admin_check.php');
	include ('conn.php');
	$fetch_query=mysql_query("select * from haq_ministry where ministry_id='".$_REQUEST['mcode']."'");
	$fetch_result=mysql_fetch_array($fetch_query);
	if(isset($_REQUEST['submit'])){
		$s_query=mysql_query("select * from haq_ministry where  ministry_id !='".$_REQUEST['mcode']."' and ministry_name='".$_REQUEST['min_name']."' and ministry_code='".$_REQUEST['min_code']."'");
		$f_query=mysql_num_rows($s_query);
		if($f_query !=0){
				$error= "Sorry, The Ministry " . $_REQUEST['min_name'] . " or Code " .$_REQUEST['min_code'] . " is already in use.";
		} else {
			$update_ministry=mysql_query("update haq_ministry set ministry_name='".$_REQUEST['min_name']."', ministry_code='".$_REQUEST['min_code']."' where ministry_id='".$_REQUEST['mcode']. "'");
			if($update_ministry){
				echo "<meta http-equiv='Refresh' content='0; url=ministry.php'>";
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
		  <td align="right" valign="top" height="10" ><a href="main_union.php?page=entry" class="back_menu"><strong>Data Entry </strong></a>&nbsp;|| &nbsp;<a href="home.php" class="back_menu"><strong>Home Page </strong></a>&nbsp;&nbsp;&nbsp;</td>
		</tr>
		<tr>
		  <td align="left" valign="top" height="10"> </td>
		</tr>
		<tr>
		  <td align="left" valign="top" >
		  <form name="form1" method="post" action="">
		  <table width="50%" align="center" border="0" cellspacing="2" cellpadding="1" bgcolor="#F1F4F7">
			<tr>
			  <td width="26%">&nbsp;</td>
			  <td width="32%" align="center" class="backheads"><strong>Update Ministry </strong></td>
			  <td width="42%" align="right"><a href="ministry.php" class="back_menu">View Ministry</a>&nbsp;&nbsp;</td>
			</tr>
			<tr>
			  <td>&nbsp; </td>
			  <td colspan="2" align="left" class="error"><?php echo $error ; ?></td>
			</tr>
			<tr>
			  <td>&nbsp;&nbsp;&nbsp;<strong>Ministry Name :</strong></td>
			  <td colspan="2" align="left"><input name="min_name" type="text" value="<?php echo $fetch_result['ministry_name'] ; ?>" size="20"></td>
			</tr>
			<tr>
			  <td>&nbsp;&nbsp;&nbsp;<strong>Code : </strong></td>
			  <td colspan="2" align="left"><input name="min_code" type="text" value="<?php echo $fetch_result['ministry_code'] ; ?>" size="20"></td>
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
frmvalidator.addValidation("min_name","req","Please enter Ministry Name");
//frmvalidator.addValidation("min_code","req","Please enter Ministry Code");
//frmvalidator.addValidation("min_code","numeric", "Please Enter Numeric value in the Code");
</script>