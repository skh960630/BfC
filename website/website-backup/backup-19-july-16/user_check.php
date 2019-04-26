<?php
	session_start();
//	   echo  "HTTP/1.0 200 OK\n";
//	   echo "Content-Type: text/html\n\n\n";
	include('../../conn.php');
	if($_REQUEST['login']=='admin'){
		$sql="select * from tbl_admin where LoginId='".$_POST['login']."' and Password='".$_POST['pwd']."' and status='active'";
		$rs=mysql_query($sql) or die("error in query");
		$rscount=mysql_num_rows($rs);
	}else{
		$sql="select * from tbl_admin where LoginId='".$_POST['login']."' and Password='".$_POST['pwd']."' and status='active'";
		$rs=mysql_query($sql) or die("error in query");
		$rscount=mysql_num_rows($rs);
	}
	if($rscount >= 1){
		$_SESSION['id']=$_POST['login'];
		print "<script language=\"javascript\">document.location.href='"."main.php?pg=Admin Home"."';</script>";
	}else{
		print "<script language=\"javascript\">document.location.href='"."index.php?error=yes"."';</script>";
	}
?>