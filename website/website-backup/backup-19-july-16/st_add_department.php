<?php 
	include ('includes/login_check.php');
	include ('conn.php');
	if(isset($_REQUEST['submit'])){
		$s_query=mysql_query("select * from haq_st_department where department_name='".$_REQUEST['depart_name']."' and department_demand='".$_REQUEST['depart_code']."' and department_state_id='".$_REQUEST['state_id']."' and sector_id='".$_REQUEST['sector_id']."'");
		$f_query=mysql_num_rows($s_query);
		if($f_query !=0){
			$error= "Sorry, The Department " . $_REQUEST['depart_name'] . " or Demand No. " .$_REQUEST['depart_code'] . " is already in use.";
		} else {
			$i_query="INSERT INTO haq_st_department (department_name, department_demand, department_state_id) VALUES ('".$_REQUEST['depart_name']."', '".$_REQUEST['depart_code']."', '".$_REQUEST['state_id']."')";
			$i_result=mysql_query($i_query);
			if($i_result){
				echo "<meta http-equiv='Refresh' content='0; url=st_department.php'>";
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
			  <td width="18%">&nbsp;</td>
			  <td width="40%" align="center" class="backheads"><strong>Add Department </strong></td>
			  <td width="42%" align="right"><a href="st_department.php" class="back_menu">View Department</a>&nbsp;&nbsp;</td>
			</tr>
			<tr>
			  <td>&nbsp; </td>
			  <td colspan="2" align="left" class="error"><?php echo $error ; ?></td>
			</tr>
			<tr>
			  <td>&nbsp;&nbsp;&nbsp;<strong>State :</strong></td>
			  <td colspan="2" align="left"><select name="state_id">
				<option value="" selected>Select</option>
				<?php
					if($admin_level=='sub'){
						$sub_query="and state_id='".$user_state_id."'";
					}else if($admin_level=='super'){
						$sub_query=" ";
					}
					$sel_state="select * from haq_state where state_status='active' $sub_query order by state_name";
					$res_state=mysql_query($sel_state);
					while($fetch_state = mysql_fetch_array($res_state)){ ?>
				<option value="<?php echo $fetch_state['state_id']; ?>" ><?php echo $fetch_state['state_name'];?></option> 
				<? }?>
			  </select></td>
			</tr>
			<tr>
			  <td>&nbsp;&nbsp;&nbsp;<strong>Name :</strong></td>
			  <td colspan="2" align="left"><input name="depart_name" type="text" value="" size="20"></td>
			</tr>
			<tr>
			  <td>&nbsp;&nbsp;&nbsp;<strong>Demand No. : </strong></td>
			  <td colspan="2" align="left"><input name="depart_code" type="text" value="" size="20"></td>
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
frmvalidator.addValidation("state_id","req","Please select State");
</script>