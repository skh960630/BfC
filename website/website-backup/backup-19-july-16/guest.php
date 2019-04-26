<?php
	include ('includes/login_check.php');
	include ('includes/admin_check.php');
	include ('conn.php');
	$s_query=mysql_query("select * from haq_admin_user where admin_level='guest' order by admin_user_id");
	if(isset($_REQUEST['action'])){
///////////////////for Update status ///////////////////////////
		if($_GET['action']=="status"){
			if($_REQUEST['statuscode']=="active"){
				$chstatus="inactive";
			}
			if($_REQUEST['statuscode']=="inactive"){
				$chstatus="active";
			}
			$upd_query="update  haq_admin_user set admin_status='".$chstatus."' where  admin_id=".$_REQUEST['statusid'];
			mysql_query($upd_query);
			echo "<meta http-equiv='Refresh' content='0; url=guest.php'>";
			exit;
		}
////////////////////////////////////////////////////////////////////
	}
	
	
 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd"><html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="stylesheet/main.css"></head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" background="images/Picture1.jpg">
  <form name="form1" method="post" action=""><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
    <tr>
	  <td colspan="2" align="center">  <?php include('includes/header.php') ; ?>
</td>
	</tr>        
	<tr>
	  <td colspan="2" class="text12"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
		<tr>
		  <td width="50%" align="left" valign="top" bgcolor="#FFFFFF" class="justify"><table width="100%"  border="0" cellpadding="5" cellspacing="1" class="border1">
			<tr bgcolor="#BCCAD8">
			  <td colspan="4" align="center" nowrap class="backheads">Guest User Detail </td>
			  <td colspan="3" align="right" nowrap><a href="main_union.php?page=admin" class="back_menu"><strong>Admin Page</strong></a>&nbsp;&nbsp;<a href="home.php" class="back_menu"s><strong>Home Page</strong></a>&nbsp;&nbsp;<a href="add_guest.php" class="back_menu"s><strong>Add Guest User</strong></a>&nbsp;&nbsp;&nbsp;</td>
			</tr>
			<tr bgcolor="#BCCAD8">
			  <td width="15%" nowrap><div align="left"><strong>User Name</strong></div></td>
			  <td width="15%" nowrap><div align="left"><strong>User ID </strong></div></td>
			  <td width="21%" nowrap><div align="left"><strong>Password</strong></div></td>
			  <td colspan="3" align="center" nowrap bgcolor="#BCCAD8"><strong>Action</strong></td>
			  </tr>
			<?php
				while($r_query=mysql_fetch_array($s_query)){
			?>
			<tr bgcolor="#F1F4F7">
			  <td><div align="left">&nbsp;<?php echo $r_query['admin_name'] ; ?></div></td>
			  <td><div align="left">&nbsp;<?php echo $r_query['admin_user_id'] ; ?></div></td>
			  <td><div align="left">&nbsp;<?php echo $r_query['admin_password'] ; ?></div></td>
			  <td width="14%" align="center" bgcolor="#F1F4F7"><a href="edit_guest.php?userid=<?php echo $r_query['admin_id'] ; ?>"><img src="images/edit.gif" alt="Edit" width="16" height="16" border="0"></a></td>
			  <td width="14%" colspan="2" align="center" bgcolor="#F1F4F7"><a href="guest.php?action=status&statuscode=<?php echo $r_query['admin_status'] ; ?>&statusid=<?php echo $r_query['admin_id'] ; ?>"><?php echo $r_query['admin_status']?></a></td>
			</tr> 
			<?php } ?>
		  </table></td>
		</tr>
	  </table></td>
	</tr>
	<tr>
	  <td height="1" colspan="2" bgcolor="#B4AF9D"></td>
	</tr>
	<tr>
	  <td colspan="2"><?php include ('includes/footer.php') ; ?></td>
	</tr>
  </table></form>
</body>
</html>