<?php 
	include ('includes/login_check.php');
	include ('conn.php');
	if(isset($_REQUEST['submit'])){
			$select_detail_head=mysql_query("select * from haq_detail_head where detail_head_id='".$_REQUEST['detail_headid']."'");
			$fetch_detail_head=mysql_fetch_array($select_detail_head);

		$s_query=mysql_query("select * from haq_object_head where detail_head_id='".$fetch_detail_head['detail_head_id']."' and major_head_id='".$fetch_detail_head['major_head_id']."' and sub_major_head_id='".$fetch_detail_head['sub_major_head_id']."' and minor_head_id='".$fetch_detail_head['minor_head_id']."' and sub_head_id='".$fetch_detail_head['sub_head_id']."' and object_head_name='".$_REQUEST['object_head_name']."' and object_head_code='".$_REQUEST['object_head_code']."'");
		$f_query=mysql_num_rows($s_query);
		if($f_query !=0){
			$error= "Sorry, The Object Head " . $_REQUEST['object_head_name'] . " or Code " .$_REQUEST['object_head_code'] . " is already in use.";
		} else {
			$i_query="INSERT INTO haq_object_head (object_head_name, object_head_code, ministry_id, sector_id, department_id, major_head_id, sub_major_head_id, minor_head_id, sub_head_id, detail_head_id, budget_type) VALUES ('".$_REQUEST['object_head_name']."', '".$_REQUEST['object_head_code']."', '".$fetch_detail_head['ministry_id']."', '".$fetch_detail_head['sector_id']."', '".$fetch_detail_head['department_id']."', '".$fetch_detail_head['major_head_id']."', '".$fetch_detail_head['sub_major_head_id']."', '".$fetch_detail_head['minor_head_id']."', '".$fetch_detail_head['sub_head_id']."', '".$fetch_detail_head['detail_head_id']."', '".$fetch_detail_head['budget_type']."')";
			$i_result=mysql_query($i_query);
			$latest_object_head_id=mysql_insert_id();
			if($i_result){
				echo "<meta http-equiv='Refresh' content='0; url=add_other_head.php?object_headid=".$latest_object_head_id."&level=".$_REQUEST['level']."'>";
				exit;
			} else { 
				$error= "Record could not be added" ;
			}
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
			  <td width="29%" align="center" class="backheads"><strong>Add Object Head </strong></td>
			  <td width="45%" align="right"><a href="detail_head_entry.php?detail_headid=<?php echo $_REQUEST['detail_headid'] ; ?>" class="back_menu">Data Entry</a>&nbsp;&nbsp;<a href="object_head.php" class="back_menu">View Object Head</a>&nbsp;&nbsp;</td>
			</tr>
			<tr>
			  <td>&nbsp; </td>
			  <td colspan="2" align="left" class="error"><?php echo $error ; ?></td>
			</tr>
			<tr>
			  <td>&nbsp;&nbsp;&nbsp;<strong>Object Head Name :</strong></td>
			  <td colspan="2" align="left"><input name="object_head_name" type="text" value="" size="20"></td>
			</tr>
			<tr>
			  <td>&nbsp;&nbsp;&nbsp;<strong>Code. : </strong></td>
			  <td colspan="2" align="left"><input name="object_head_code" type="text" value="" size="20"></td>
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
frmvalidator.addValidation("object_head_name","req","Please enter Object Head Name");
frmvalidator.addValidation("object_head_code","req","Please enter Object Head Code");
frmvalidator.addValidation("object_head_code","numeric");
</script>