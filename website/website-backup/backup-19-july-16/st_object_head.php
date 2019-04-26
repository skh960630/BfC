<?php
	include ('includes/login_check.php');
	include ('conn.php');
	if($admin_level=='sub'){
		$sub_query="and state_id='".$user_state_id."'";
	}else if($admin_level=='super'){
		$sub_query=" ";
	}
			if (isset($_REQUEST['submit'])){ 
				$sub_query="and state_id='".$_REQUEST['state_id']."'";
}
			if (isset($_REQUEST['submit']) and $_REQUEST['state_id']==''){ 
				$sub_query=" ";
}
	$s_query=mysql_query("select * from haq_st_object_head where 1=1 $sub_query order by object_head_id desc, state_id, sector_id, object_head_name");
	if(isset($_REQUEST['action'])){
		if($_REQUEST['action']=="delete"){
			$del_query="delete from haq_st_object_head where object_head_id=".$_REQUEST['delcode'];
			$del_result=mysql_query($del_query);		
			$del_other="delete from haq_st_other_head where object_head_id=".$_REQUEST['delcode'];
			$del_result7=mysql_query($del_other);
			$del_data="delete from haq_head_expend_state where object_head_id=".$_REQUEST['delcode'];
			$del_data_result=mysql_query($del_data);

//			$del_report=mysql_query("delete from haq_head_expend_union where object_head_id='".$_REQUEST['delcode']."'");
			//$msg="Record Deleted Successfully";	
			echo "<meta http-equiv='Refresh' content='0; url=st_object_head.php'>";
			exit;
		}
///////////////////for Update status ///////////////////////////
		if($_GET['action']=="status"){
			if($_REQUEST['statuscode']=="active"){
				$chstatus="inactive";
			}
			if($_REQUEST['statuscode']=="inactive"){
				$chstatus="active";
			}
			$upd_query="update  haq_st_object_head set object_head_status='".$chstatus."' where  object_head_id=".$_REQUEST['statusid'];
			mysql_query($upd_query);
			$upd_query7="update  haq_st_other_head set other_head_status='".$chstatus."' where  object_head_id=".$_REQUEST['statusid'];
			mysql_query($upd_query7);

			$update_report=mysql_query("update  haq_head_expend_union set expend_status='".$chstatus."' where  object_head_id='".$_REQUEST['statusid']."'");
			echo "<meta http-equiv='Refresh' content='0; url=st_object_head.php'>";
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
<link rel="stylesheet" type="text/css" href="stylesheet/main.css">
</head>
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
			  <td colspan="5" align="center" class="backheads">Object Head</td>
			  <td colspan="4" align="right" class="backheads"><a href="main_state.php?page=entry" class="back_menu"><strong>Data Entry </strong></a>&nbsp;&nbsp;<a href="home.php" class="back_menu"s><strong>Home Page</strong></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			  </tr>
			<tr>
			  <td colspan="2">&nbsp;&nbsp;&nbsp;</td>
			  <td>&nbsp;&nbsp;&nbsp;Select State :</td>
			  <td align="left">
			  <select name="state_id">
				<option value="" selected="selected">Select</option>
				<?php
					$sel_state="select * from haq_state where state_status='active' order by state_name";
					$res_state=mysql_query($sel_state);
					while($fetch_state = mysql_fetch_array($res_state)){ ?>
				<option value="<?php echo $fetch_state['state_id']; ?>" ><?php echo $fetch_state['state_name'];?></option> 
				<? }?>
				  </select>&nbsp;</td>
			  <td align="left"><input name="submit" type="submit" id="submit" value="Search">&nbsp;</td>
			  <td colspan="5">&nbsp;&nbsp;&nbsp;</td>
  </tr>
			<tr bgcolor="#BCCAD8">
			  <td width="16%" ><div align="left"><strong>Name</strong></div></td>
			  <td width="8%"><div align="left"><strong>Code</strong></div></td>
			  <td width="17%"><div align="left"><strong>State</strong></div></td>
			  <td width="12%"><div align="left"><strong>Sector</strong></div></td>
			  <td width="19%" ><div align="left"><strong>Detail Head</strong></div></td>
			  <td colspan="4" align="center" ><strong>Action</strong></td>
			  </tr>
			<?php
				while($r_query=mysql_fetch_array($s_query)){
			?>
			<tr bgcolor="#F1F4F7">
			  <td><div align="left">&nbsp;<?php echo $r_query['object_head_name'] ; ?></div></td>
			  <td><div align="left">&nbsp;&nbsp;<?php echo $r_query['object_head_code'] ; ?></div></td>
			  <td><div align="left">&nbsp;&nbsp;
			  	<?php 
					$sec_query=mysql_query("select state_name from haq_state where state_id='".$r_query['state_id']."' and state_status='active'");
					$sec_result=mysql_fetch_array($sec_query);
					echo $sec_result['state_name'] ; ?>
			  </div></td>
			  <td><div align="left">&nbsp;&nbsp;
                    <?php 
					$sector_query=mysql_query("select sector_name from haq_sector where sector_id='".$r_query['sector_id']."' and sector_status='active'");
					$sector_result=mysql_fetch_array($sector_query);
					echo $sector_result['sector_name'] ; ?>
              </div></td>
			  <td><div align="left">&nbsp;&nbsp;
                    <?php 
					$sec_query=mysql_query("select detail_head_name from haq_st_detail_head where detail_head_id='".$r_query['detail_head_id']."' and detail_head_status='active'");
					$sec_result=mysql_fetch_array($sec_query);
					echo $sec_result['detail_head_name'] ; ?>
              </div></td>
			  <td width="5%" align="center"><a href="st_edit_object_head.php?objectheadid=<?php echo $r_query['object_head_id'] ; ?>"><img src="images/edit.gif" alt="Edit" width="16" height="16" border="0"></a></td>
			  <td width="7%" align="center" bgcolor="#F1F4F7"><a href="st_object_head.php?action=delete&delcode=<?php echo $r_query['object_head_id'] ; ?>"><img src="images/delete.gif" alt="Delete" width="16" height="16" border="0"></a></td>
			  <td width="6%" align="center" bgcolor="#F1F4F7"><a href="st_object_head.php?action=status&statuscode=<?php echo $r_query['object_head_status'] ; ?>&statusid=<?php echo $r_query['object_head_id'] ; ?>"><?php echo $r_query['object_head_status']?></a></td>
			  <td width="10%" align="center" bgcolor="#F1F4F7"><a href="st_add_other_head.php?object_headid=<?php echo $r_query['object_head_id'] ; ?>">Add Other Head</a></td>
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