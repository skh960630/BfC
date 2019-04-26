<?php 
	include ('includes/login_check.php');
	include ('conn.php');
	$fetch_query=mysql_query("select * from haq_major_head where major_head_id='".$_REQUEST['majorheadid']."'");
	$fetch_result=mysql_fetch_array($fetch_query);
	if(isset($_REQUEST['submit'])){
		$s_query=mysql_query("select * from haq_major_head where  major_head_id !='".$_REQUEST['majorheadid']."' and ministry_id='".$fetch_result['ministry_id']."' and sector_id='".$fetch_result['sector_id']."' and program_id='".$fetch_result['program_id']."' and major_head_name='".$_REQUEST['major_head_name']."' and major_head_code='".$_REQUEST['major_head_code']."'");
		$f_query=mysql_num_rows($s_query);
		if($f_query !=0){
				$error= "Sorry, The Major Head " . $_REQUEST['major_head_name'] . " or Code " .$_REQUEST['major_head_code'] . " is already in use.";
		} else {
			$update_depart=mysql_query("update haq_major_head set major_head_name='".$_REQUEST['major_head_name']."', major_head_code='".$_REQUEST['major_head_code']."' where major_head_id='".$_REQUEST['majorheadid']. "'");
			if($update_depart){
				echo "<meta http-equiv='Refresh' content='0; url=major_head.php'>";
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
			  <td width="25%">&nbsp;</td>
			  <td width="33%" align="center" class="backheads"><strong>Update Major Head </strong></td>
			  <td width="42%" align="right"><a href="major_head.php" class="back_menu">View Major Head</a>&nbsp;&nbsp;</td>
			</tr>
			<tr>
			  <td>&nbsp; </td>
			  <td colspan="2" align="left" class="error"><?php echo $error ; ?></td>
			</tr>
			<tr>
			  <td>&nbsp;&nbsp;&nbsp;<strong>Major Head Name :</strong></td>
			  <td colspan="2" align="left"><input name="major_head_name" type="text" value="<?php echo $fetch_result['major_head_name'] ; ?>" size="20"></td>
			</tr>
			<tr>
			  <td>&nbsp;&nbsp;&nbsp;<strong>Code : </strong></td>
			  <td colspan="2" align="left"><input name="major_head_code" type="text" value="<?php echo $fetch_result['major_head_code'] ; ?>" size="20"></td>
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
frmvalidator.addValidation("major_head_name","req","Please enter Major Head Name");
frmvalidator.addValidation("major_head_code","req","Please enter Major Head Code");
frmvalidator.addValidation("major_head_code","numeric");
</script>