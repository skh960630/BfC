<?php 
	include ('includes/login_check.php');
	include ('conn.php');
	if(isset($_REQUEST['submit'])){
		$s_query=mysql_query("select * from haq_st_major_head where state_id='".$_REQUEST['state_id']."' and sector_id='".$_REQUEST['sector_id']."' and program_id='".$_REQUEST['program_id']."' and major_head_name='".$_REQUEST['major_head_name']."' and major_head_code='".$_REQUEST['major_head_code']."'");
		
		$f_query=mysql_num_rows($s_query);
		if($f_query !=0){
			$error= "Sorry, The Major Head " . $_REQUEST['major_head_name'] . " or Code " .$_REQUEST['major_head_code'] . " is already in use.";
		} else {
			$i_query="INSERT INTO haq_st_major_head (major_head_name, major_head_code, state_id, sector_id, department_id) VALUES ('".$_REQUEST['major_head_name']."', '".$_REQUEST['major_head_code']."', '".$_REQUEST['state_id']."', '".$_REQUEST['sector_id']."', '".$_REQUEST['department_id']."')";
			$i_result=mysql_query($i_query);
			$latest_major_head_id=mysql_insert_id();
			if($i_result){
				echo "<meta http-equiv='Refresh' content='0; url=st_add_sub_major_head.php?major_headid=".$latest_major_head_id."&level=".$_REQUEST['level']."'>";
				exit;
			} else { 
				$error= "Record could not be added" ; }
			}
		}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><html>
<head>
<script src="department_sel.js"></script>
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
		  <td align="right" valign="top" height="10" ><a href="main_state.php?page=entry" class="back_menu"><strong>State Entry </strong></a>&nbsp; || &nbsp;<a href="home.php" class="back_menu">Home Page </a>&nbsp;&nbsp;&nbsp;</td>
		</tr>
		<tr>
		  <td align="left" valign="top" height="10"> </td>
		</tr>
		<tr>
		  <td align="left" valign="top" >
		  <form name="form1" method="post" action="">
		  <table width="50%" align="center" border="0" cellspacing="2" cellpadding="1" bgcolor="#F1F4F7">
			<tr>
			  <td width="31%">&nbsp;</td>
			  <td width="32%" align="center" class="backheads"><strong>Add Major Head </strong></td>
			  <td width="37%" align="right"><a href="st_major_head.php?leval=<?php echo $_REQUEST['level'] ; ?>" class="back_menu">View Major Head</a>&nbsp;&nbsp;</td>
			</tr>
			<tr>
			  <td>&nbsp; </td>
			  <td colspan="2" align="left" class="error"><?php echo $error ; ?></td>
			</tr>
			<tr>
			  <td>&nbsp;&nbsp;&nbsp;<strong>State: </strong></td>
			  <td colspan="2" align="left"><select name="state_id" onChange="showUser(this.value)">
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
			  <td>&nbsp;&nbsp;&nbsp;<strong>Department: </strong></td>
			  <td colspan="2" align="left" id="txtHint1">
			  <select name="department_id">
                <option value="" >Select</option>
              </select>
</td>
			</tr>
			<tr>
			  <td>&nbsp;&nbsp;&nbsp;<strong>Sector : </strong></td>
			  <td colspan="2" align="left" ><select name="sector_id" >
				<option value="" selected>Select</option>
				<?
					$sel_sector="select * from haq_sector where sector_status='active' order by sector_name";
					$res_sector=mysql_query($sel_sector);
					while($fetch_sector = mysql_fetch_array($res_sector)){ ?>
				<option value="<?php echo $fetch_sector['sector_id']; ?>" ><?php echo $fetch_sector['sector_name'];?></option> 
				<? }?>
			  </select></td>
			</tr>
			<tr>
			  <td>&nbsp;&nbsp;&nbsp;<strong>Major Head Name :</strong></td>
			  <td colspan="2" align="left"><input name="major_head_name" type="text" value="" size="20"></td>
			</tr>
			<tr>
			  <td>&nbsp;&nbsp;&nbsp;<strong>Code. : </strong></td>
			  <td colspan="2" align="left"><input name="major_head_code" type="text" value="" size="20"></td>
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
frmvalidator.addValidation("state_id","req","Please select State");
frmvalidator.addValidation("sector_id","req","Please select Sector");
frmvalidator.addValidation("major_head_code","numeric");
</script>