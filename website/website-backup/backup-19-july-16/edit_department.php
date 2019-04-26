<?php 
	include ('includes/login_check.php');
	include ('conn.php');
	$fetch_query=mysql_query("select * from haq_department where department_id='".$_REQUEST['departid']."'");
	$fetch_result=mysql_fetch_array($fetch_query);
	if(isset($_REQUEST['submit'])){
		$s_query=mysql_query("select * from haq_department where  department_id !='".$_REQUEST['departid']."' and department_name='".$_REQUEST['depart_name']."' and department_demand='".$_REQUEST['depart_code']."'");
		$f_query=mysql_num_rows($s_query);
		if($f_query !=0){
				$error= "Sorry, The Department " . $_REQUEST['depart_name'] . " or Demand No. " .$_REQUEST['depart_code'] . " is already in use.";
		} else {
			$update_depart=mysql_query("update haq_department set department_name='".$_REQUEST['depart_name']."', department_demand='".$_REQUEST['depart_code']."', ministry_id='".$_REQUEST['ministry_id']."' where department_id='".$_REQUEST['departid']. "'");
			if($update_depart){
				echo "<meta http-equiv='Refresh' content='0; url=department.php'>";
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
			  <td width="36%" align="center" class="backheads"><strong>Update Department </strong></td>
			  <td width="38%" align="right"><a href="department.php" class="back_menu">View Department</a>&nbsp;&nbsp;</td>
			</tr>
			<tr>
			  <td>&nbsp; </td>
			  <td colspan="2" align="left" class="error"><?php echo $error ; ?></td>
			</tr>
			<tr>
			  <td>&nbsp;&nbsp;&nbsp;<strong>Ministry: </strong></td>
			  <td colspan="2" align="left"><select name="ministry_id">
				<option value="">Select</option>
				<?
					$sel_ministry="select * from haq_ministry where ministry_status='active' order by ministry_name";
					$res_ministry=mysql_query($sel_ministry);
					while($fetch_ministry = mysql_fetch_array($res_ministry)){ ?>
				<option value="<?php echo $fetch_ministry['ministry_id']; ?>" <?php if($fetch_ministry['ministry_id']==$fetch_result['ministry_id']){ echo "selected" ; }?> ><?php echo $fetch_ministry['ministry_name'];?></option> 
				<? }?>
			  </select></td>
			</tr>
			<tr>
			  <td>&nbsp;&nbsp;&nbsp;<strong>Department Name :</strong></td>
			  <td colspan="2" align="left"><input name="depart_name" type="text" value="<?php echo $fetch_result['department_name'] ; ?>" size="20"></td>
			</tr>
			<tr>
			  <td>&nbsp;&nbsp;&nbsp;<strong>Code : </strong></td>
			  <td colspan="2" align="left"><input name="depart_code" type="text" value="<?php echo $fetch_result['department_demand'] ; ?>" size="20"></td>
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
frmvalidator.addValidation("depart_name","req","Please enter Department Name");
</script>