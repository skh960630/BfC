<?php 
	include ('includes/login_check.php');
	include ('conn.php');
	if(isset($_REQUEST['submit'])){
		$s_query=mysql_query("select * from haq_program where program_name='".$_REQUEST['program_name']."'");
		$f_query=mysql_num_rows($s_query);
		if($f_query !=0){
			$error= "Sorry, The Programme " . $_REQUEST['program_name'] . " is already in use.";
		} else {
			$i_query="INSERT INTO haq_program (program_name, sector_id) VALUES ('".$_REQUEST['program_name']."', '".$_REQUEST['sector_id']."')";
			$i_result=mysql_query($i_query);
			if($i_result){
				echo "<meta http-equiv='Refresh' content='0; url=programme.php'>";
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
			  <td width="24%">&nbsp;</td>
			  <td width="34%" align="center" class="backheads"><strong>Add Programme </strong></td>
			  <td width="42%" align="right"><a href="programme.php" class="back_menu">View Programme</a>&nbsp;&nbsp;</td>
			</tr>
			<tr>
			  <td>&nbsp; </td>
			  <td colspan="2" align="left" class="error"><?php echo $error ; ?></td>
			</tr>
			<tr>
			  <td>&nbsp;&nbsp;&nbsp;<strong>Sector :</strong></td>
			  <td colspan="2" align="left"><select name="sector_id">
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
			  <td>&nbsp;&nbsp;&nbsp;<strong>Programme Name :</strong></td>
			  <td colspan="2" align="left"><input name="program_name" type="text" value="" size="20"></td>
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
frmvalidator.addValidation("sector_id","req","Please select Sector");
frmvalidator.addValidation("program_name","req","Please enter Programme Name");
</script>