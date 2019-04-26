<?
session_start();
	$admin_user=$_SESSION['admin_user'];
	$admin_name=$_SESSION['admin_name'];
	$admin_level=$_SESSION['admin_level'];
	$user_state_id=$_SESSION['user_state_id'];
	$user_state_name=$_SESSION['user_state_name'];
	$user_state_status=$_SESSION['admin_status'];

//	$user_id=$_SESSION['user'];
		if($admin_user=="" || $admin_name==""){
		header("Location: index.php");
			}else{
				$pass="main.php";
			$_SESSION['log_status']= "<div align=\"right\"  class=\"\" style=\"padding-right:20px;font-size:12px\">Welcome <strong>" . $admin_name.'</strong> | <a href="logout.php?mode=logout" class="register" >Logout</a></div>';	
		}
?>