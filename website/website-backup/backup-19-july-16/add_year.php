<?php 
	include ('includes/login_check.php');
	include ('conn.php');
	if(isset($_REQUEST['submit'])){
		$year_code=substr($_REQUEST['year_name'], 0, 4);
//		echo $year_code;
//		exit;
		
		$s_query=mysql_query("select * from haq_year where year_name='".$_REQUEST['year_name']."'");
		$f_query=mysql_num_rows($s_query);
		if($f_query !=0){
			$error= "Sorry, The Year " . $_REQUEST['year_name'] . " is already in use.";
		} else {
			$i_query="INSERT INTO haq_year (year_name, year_code) VALUES ('".$_REQUEST['year_name']."', '".$year_code."')";
			$i_result=mysql_query($i_query);
			if($i_result){
				echo "<meta http-equiv='Refresh' content='0; url=year.php'>";
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
			  <td width="22%">&nbsp;</td>
			  <td width="36%" align="center" class="backheads"><strong>Add Year </strong></td>
			  <td width="42%" align="right"><a href="year.php" class="back_menu">View Year</a>&nbsp;&nbsp;</td>
			</tr>
			<tr>
			  <td>&nbsp; </td>
			  <td colspan="2" align="left" class="error"><?php echo $error ; ?></td>
			</tr>
			<tr>
			  <td>&nbsp;&nbsp;&nbsp;<strong>Year :</strong></td>
			  <td colspan="2" align="left"><input name="year_name" type="text" value="" size="20">&nbsp;&nbsp;(eg : 2000-2001)</td>
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
frmvalidator.addValidation("year_name","req","Please enter Year Name");
</script>