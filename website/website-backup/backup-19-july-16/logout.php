<?php
	@$log=$_GET['mode'];
	if ($log=="logout") {
		@session_start();
		session_unset();
		session_destroy();
		header("Location: index.php");
	}
?>