<?php 
	session_start();
	$_SESSION["user_logged_in"] = false;
	session_destroy();
	header("Location: index.php");
?>