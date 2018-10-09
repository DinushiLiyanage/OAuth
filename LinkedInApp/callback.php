<!-- IT15018960 - D.U. Liyanage -->
<!-- SSD Assignment 2 - OAuth -->

<?php
	require_once "init.php";
	//retreive from OAuth resource server
	$user = getCallback(); 
	$_SESSION['user'] = $user;
	//redirecct to profile page upon profile data retrieval
	header("location: profile.php");
?>