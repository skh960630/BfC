<?php
	include ('includes/login_check.php');
	include ('conn.php');
	$s_query=mysql_query("select * from haq_minor_head order by sector_id, minor_head_name");
	if(isset($_REQUEST['action'])){
		if($_REQUEST['action']=="delete"){
			$del_query="delete from haq_minor_head where minor_head_id=".$_REQUEST['delcode'];
			$del_result=mysql_query($del_query);		
			$del_sub="delete from haq_sub_head where minor_head_id=".$_REQUEST['delcode'];
			$del_result4=mysql_query($del_sub);
			$del_detail="delete from haq_detail_head where minor_head_id=".$_REQUEST['delcode'];
			$del_result5=mysql_query($del_detail);
			$del_object="delete from haq_object_head where minor_head_id=".$_REQUEST['delcode'];
			$del_result6=mysql_query($del_object);
			$del_other="delete from haq_other_head where minor_head_id=".$_REQUEST['delcode'];
			$del_result7=mysql_query($del_other);

			$del_report=mysql_query("delete from haq_head_expend_union where minor_head_id='".$_REQUEST['delcode']."'");
			//$msg="Record Deleted Successfully";	
			echo "<meta http-equiv='Refresh' content='0; url=minor_head.php'>";
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
			$upd_query="update  haq_minor_head set minor_head_status='".$chstatus."' where  minor_head_id=".$_REQUEST['statusid'];
			mysql_query($upd_query);
			$upd_query4="update haq_sub_head set sub_head_status='".$chstatus."' where minor_head_id=".$_REQUEST['statusid'];
			mysql_query($upd_query4);
			$upd_query5="update haq_detail_head set detail_head_status='".$chstatus."' where minor_head_id=".$_REQUEST['statusid'];
			mysql_query($upd_query5);
			$upd_query6="update haq_object_head set object_head_status='".$chstatus."' where minor_head_id=".$_REQUEST['statusid'];
			mysql_query($upd_query6);
			$upd_query7="update haq_other_head set other_head_status='".$chstatus."' where minor_head_id=".$_REQUEST['statusid'];
			mysql_query($upd_query7);

			$update_report=mysql_query("update  haq_head_expend_union set expend_status='".$chstatus."' where  minor_head_id='".$_REQUEST['statusid']."'");
			echo "<meta http-equiv='Refresh' content='0; url=minor_head.php'>";
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
			  <td colspan="5" class="backheads" align="center">Minor Head</td>
			  <td colspan="4" align="right" ><a href="main_union.php?page=entry" class="back_menu"><strong>Data Entry </strong></a>&nbsp;&nbsp;<a href="home.php" class="back_menu"s><strong>Home Page</strong></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			</tr>
			<tr bgcolor="#BCCAD8">
			  <td width="17%" ><div align="left"><strong>Name</strong></div></td>
			  <td width="12%"><div align="left"><strong>Code</strong></div></td>
			  <td width="14%"><div align="left"><strong>Ministry</strong></div></td>
			  <td width="12%"><div align="left"><strong>Sector</strong></div></td>
			  <td width="19%" ><div align="left"><strong>Sub Major Head</strong></div></td>
			  <td colspan="4" align="center" ><strong>Action</strong></td>
			  </tr>
			<?php
				while($r_query=mysql_fetch_array($s_query)){
			?>
			<tr bgcolor="#F1F4F7">
			  <td><div align="left">&nbsp;<?php echo $r_query['minor_head_name'] ; ?></div></td>
			  <td><div align="left">&nbsp;&nbsp;<?php echo $r_query['minor_head_code'] ; ?></div></td>
			  <td><div align="left">&nbsp;&nbsp;
			  	<?php 
					$min_query=mysql_query("select ministry_name from haq_ministry where ministry_id='".$r_query['ministry_id']."' and ministry_status='active'");
					$min_result=mysql_fetch_array($min_query);
					echo $min_result['ministry_name'] ; ?>
			  </div></td>
			  <td><div align="left">&nbsp;&nbsp;
                    <?php 
					$sector_query=mysql_query("select sector_name from haq_sector where sector_id='".$r_query['sector_id']."' and sector_status='active'");
					$sector_result=mysql_fetch_array($sector_query);
					echo $sector_result['sector_name'] ; ?>
              </div></td>
			  <td><div align="left">&nbsp;&nbsp;
			    <?php 
					$sec_query=mysql_query("select sub_major_head_name from haq_sub_major_head where sub_major_head_id='".$r_query['sub_major_head_id']."' and sub_major_head_status='active'");
					$sec_result=mysql_fetch_array($sec_query);
					echo $sec_result['sub_major_head_name'] ; ?>
			    </div></td>
			  <td width="6%" align="center" bgcolor="#F1F4F7"><a href="edit_minor_head.php?minorheadid=<?php echo $r_query['minor_head_id'] ; ?>"><img src="images/edit.gif" alt="Edit" width="16" height="16" border="0"></a></td>
			  <td width="6%" align="center" bgcolor="#F1F4F7"><a href="minor_head.php?action=delete&delcode=<?php echo $r_query['minor_head_id'] ; ?>"><img src="images/delete.gif" alt="Delete" width="16" height="16" border="0"></a></td>
			  <td width="6%" align="center" bgcolor="#F1F4F7"><a href="minor_head.php?action=status&statuscode=<?php echo $r_query['minor_head_status'] ; ?>&statusid=<?php echo $r_query['minor_head_id'] ; ?>"><?php echo $r_query['minor_head_status']?></a></td>
			  <td width="8%" align="center" bgcolor="#F1F4F7"><a href="add_sub_head.php?minor_headid=<?php echo $r_query['minor_head_id'] ; ?>">Add Sub Head</a></td>
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