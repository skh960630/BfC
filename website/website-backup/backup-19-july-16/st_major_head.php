<?php
	include ('includes/login_check.php');
	include ('conn.php');
		$level=$_REQUEST['level'];
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

	$s_query=mysql_query("select * from haq_st_major_head where 1=1 $sub_query order by major_head_id desc, state_id, sector_id, major_head_name");
	if(isset($_REQUEST['action'])){
		if($_REQUEST['action']=="delete"){
			$del_query="delete from haq_st_major_head where major_head_id=".$_REQUEST['delcode'];
			$del_result=mysql_query($del_query);		
			$del_sub_major="delete from haq_st_sub_major_head where major_head_id=".$_REQUEST['delcode'];
			$del_result1=mysql_query($del_sub_major);
			$del_minor="delete from haq_st_minor_head where major_head_id=".$_REQUEST['delcode'];
			$del_result2=mysql_query($del_minor);
			$del_gen="delete from haq_st_gen_head where major_head_id=".$_REQUEST['delcode'];
			$del_result3=mysql_query($del_gen);
			$del_sub="delete from haq_st_sub_head where major_head_id=".$_REQUEST['delcode'];
			$del_result4=mysql_query($del_sub);
			$del_detail="delete from haq_st_detail_head where major_head_id=".$_REQUEST['delcode'];
			$del_result5=mysql_query($del_detail);
			$del_object="delete from haq_st_object_head where major_head_id=".$_REQUEST['delcode'];
			$del_result6=mysql_query($del_object);
			$del_other="delete from haq_st_other_head where major_head_id=".$_REQUEST['delcode'];
			$del_result7=mysql_query($del_other);
			$del_data="delete from haq_head_expend_state where major_head_id=".$_REQUEST['delcode'];
			$del_data_result=mysql_query($del_data);

//			$del_report=mysql_query("delete from haq_head_expend_state where major_head_id='".$_REQUEST['delcode']."'");
			//$msg="Record Deleted Successfully";	
			echo "<meta http-equiv='Refresh' content='0; url=st_major_head.php'>";
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
			$upd_query="update  haq_st_major_head set major_head_status='".$chstatus."' where major_head_id=".$_REQUEST['statusid'];
			mysql_query($upd_query);
			$upd_query1="update  haq_st_sub_major_head set sub_major_head_status='".$chstatus."' where major_head_id=".$_REQUEST['statusid'];
			mysql_query($upd_query1);
			$upd_query2="update haq_st_minor_head set minor_head_status='".$chstatus."' where  major_head_id=".$_REQUEST['statusid'];
			mysql_query($upd_query2);
			$upd_query3="update haq_st_gen_head set gen_head_status='".$chstatus."' where major_head_id=".$_REQUEST['statusid'];
			mysql_query($upd_query3);
			$upd_query4="update haq_st_sub_head set sub_head_status='".$chstatus."' where major_head_id=".$_REQUEST['statusid'];
			mysql_query($upd_query4);
			$upd_query5="update haq_st_detail_head set detail_head_status='".$chstatus."' where major_head_id=".$_REQUEST['statusid'];
			mysql_query($upd_query5);
			$upd_query6="update haq_st_object_head set object_head_status='".$chstatus."' where major_head_id=".$_REQUEST['statusid'];
			mysql_query($upd_query6);
			$upd_query7="update haq_st_other_head set other_head_status='".$chstatus."' where major_head_id=".$_REQUEST['statusid'];
			mysql_query($upd_query7);
			
			$update_report=mysql_query("update  haq_head_expend_state set expend_status='".$chstatus."' where  major_head_id='".$_REQUEST['statusid']."'");
			echo "<meta http-equiv='Refresh' content='0; url=st_major_head.php'>";
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
			  <td colspan="6" align="center" nowrap class="backheads">Major Head</td>
			  <td colspan="4" align="right" nowrap class="backheads"><a href="main_state.php?page=entry" class="back_menu"><strong>Data Entry </strong></a>&nbsp;&nbsp;<a href="home.php" class="back_menu"><strong>Home Page</strong></a>&nbsp;&nbsp;<a href="st_add_major_head.php?level=<?php echo $level ; ?>" class="back_menu"><strong>Add Major Head</strong></a>&nbsp;&nbsp;&nbsp;</td>
			  </tr>
			<tr>
			  <td colspan="2">&nbsp;&nbsp;&nbsp;</td>
			  <td>&nbsp;&nbsp;&nbsp;Select State :</td>
			  <td colspan="2" align="left">
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
			  <td colspan="4">&nbsp;&nbsp;&nbsp;</td>
  </tr>
			  
			<tr bgcolor="#BCCAD8">
			  <td width="12%" nowrap><div align="left"><strong>Name</strong></div></td>
			  <td width="10%" nowrap><div align="left"><strong>Code</strong></div></td>
			  <td width="12%" nowrap><div align="left"><strong>State</strong></div></td>
			  <td width="12%" nowrap><div align="left"><strong>Sector</strong></div></td>
			  <td width="12%" nowrap><div align="left"><strong>Programme</strong></div></td>
			  <td width="12%" nowrap><div align="left"><strong>Department</strong></div></td>
			  <td colspan="4" align="center" nowrap bgcolor="#BCCAD8"><strong>Action</strong></td>
			</tr>
			<?php
				while($r_query=mysql_fetch_array($s_query)){
			?>
			<tr bgcolor="#F1F4F7">
			  <td><div align="left">&nbsp;<?php echo $r_query['major_head_name'] ; ?></div></td>
			  <td><div align="left">&nbsp;&nbsp;<?php echo $r_query['major_head_code'] ; ?></div></td>
			  <td><div align="left">&nbsp;&nbsp;
			  	<?php 
					$sec_query=mysql_query("select state_name from haq_state where state_id='".$r_query['state_id']."' and state_status='active'");
					$sec_result=mysql_fetch_array($sec_query);
					echo $sec_result['state_name'] ; ?>
			  </div></td>
			  <td><div align="left">&nbsp;&nbsp;
                    <?php 
					$sec_query=mysql_query("select sector_name from haq_sector where sector_id='".$r_query['sector_id']."' and sector_status='active'");
					$sec_result=mysql_fetch_array($sec_query);
					echo $sec_result['sector_name'] ; ?>
              </div></td>
			  <td><div align="left">&nbsp;&nbsp;
                    <?php 
					$sec_query=mysql_query("select program_name from haq_st_program where program_id='".$r_query['program_id']."' and program_status='active'");
					$sec_result=mysql_fetch_array($sec_query);
					echo $sec_result['program_name'] ; ?>
              </div></td>
			  <td><div align="left">&nbsp;&nbsp;
                    <?php 
					$sec_query=mysql_query("select department_name from haq_st_department where department_id='".$r_query['department_id']."' and department_status='active'");
					$sec_result=mysql_fetch_array($sec_query);
					echo $sec_result['department_name'] ; ?>
              </div></td>
			  <td width="5%" align="center" bgcolor="#F1F4F7"><a href="st_edit_major_head.php?majorheadid=<?php echo $r_query['major_head_id'] ; ?>"><img src="images/edit.gif" alt="Edit" width="16" height="16" border="0"></a></td>
			  <td width="5%" align="center" bgcolor="#F1F4F7"><a href="st_major_head.php?action=delete&delcode=<?php echo $r_query['major_head_id'] ; ?>"><img src="images/delete.gif" alt="Delete" width="16" height="16" border="0"></a></td>
			  <td width="5%" align="center" bgcolor="#F1F4F7"><a href="st_major_head.php?action=status&statuscode=<?php echo $r_query['major_head_status'] ; ?>&statusid=<?php echo $r_query['major_head_id'] ; ?>"><?php echo $r_query['major_head_status']?></a></td>
			  <td width="15%" align="center" bgcolor="#F1F4F7"><a href="st_add_sub_major_head.php?major_headid=<?php echo $r_query['major_head_id'] ; ?>">Add Sub Major Head</a></td>
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