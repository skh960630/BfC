<?php 
	include ('includes/login_check.php');
	include ('conn.php');
	$fetch_query=mysql_query("select * from haq_st_minor_head where minor_head_id='".$_REQUEST['minorheadid']."'");
	$fetch_result=mysql_fetch_array($fetch_query);
	if(isset($_REQUEST['submit'])){
		$s_query=mysql_query("select * from haq_st_minor_head where  minor_head_id !='".$_REQUEST['minorheadid']."' and state_id='".$fetch_result['state_id']."' and sector_id='".$fetch_result['sector_id']."' and program_id='".$fetch_result['program_id']."' and major_head_id ='".$fetch_result['major_head_id']."' and sub_major_head_id ='".$fetch_result['sub_major_head_id']."' and minor_head_name='".$_REQUEST['minor_head_name']."' and minor_head_code='".$_REQUEST['minor_head_code']."'");
		$f_query=mysql_num_rows($s_query);
		if($f_query !=0){
				$error= "Sorry, The Minor Head " . $_REQUEST['minor_head_name'] . " and Code " .$_REQUEST['minor_head_code'] . " is already in use.";
		} else {
			$update_depart=mysql_query("update haq_st_minor_head set minor_head_name='".$_REQUEST['minor_head_name']."', minor_head_code='".$_REQUEST['minor_head_code']."' where minor_head_id='".$_REQUEST['minorheadid']. "'");
			if($update_depart){
				echo "<meta http-equiv='Refresh' content='0; url=st_minor_head.php'>";
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
		  <td align="right" valign="top" height="10" ><a href="main_state.php?page=entry" class="back_menu"><strong>Data Entry </strong></a>&nbsp; || &nbsp;<a href="home.php" class="back_menu">Home Page </a>&nbsp;&nbsp;&nbsp;</td>
		</tr>
		<tr>
		  <td align="left" valign="top" height="10"> </td>
		</tr>
		<tr>
		  <td align="left" valign="top" >
		  <form name="form1" method="post" action="">
		  <table width="50%" align="center" border="0" cellspacing="2" cellpadding="1" bgcolor="#F1F4F7">
			<tr>
			  <td width="27%">&nbsp;</td>
			  <td width="32%" align="center" class="backheads"><strong>Update Minor Head </strong></td>
			  <td width="41%" align="right"><a href="st_minor_head.php" class="back_menu">View Minor Head</a>&nbsp;&nbsp;</td>
			</tr>
			<tr>
			  <td>&nbsp; </td>
			  <td colspan="2" align="left" class="error"><?php echo $error ; ?></td>
			</tr>
			<tr>
			  <td>&nbsp;&nbsp;&nbsp;<strong>Minor Head Name :</strong></td>
			  <td colspan="2" align="left"><input name="minor_head_name" type="text" value="<?php echo $fetch_result['minor_head_name'] ; ?>" size="20"></td>
			</tr>
			<tr>
			  <td>&nbsp;&nbsp;&nbsp;<strong>Code : </strong></td>
			  <td colspan="2" align="left"><input name="minor_head_code" type="text" value="<?php echo $fetch_result['minor_head_code'] ; ?>" size="20"></td>
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
frmvalidator.addValidation("minor_head_name","req","Please enter Minor Head Name");
frmvalidator.addValidation("minor_head_code","req","Please enter Minor Head Code");
frmvalidator.addValidation("minor_head_code","numeric");
</script>