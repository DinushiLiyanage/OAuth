<!-- IT15018960 - D.U. Liyanage -->
<!-- SSD Assignment 2 - OAuth -->

<!-- destroy the session and remove stored cookies -->

<?php
	require "init.php";
	//destroy the session
	session_start();
	session_unset(); 
	session_destroy();	
	//remove cookies
	unset($_COOKIE['session_cookie']);
	setcookie('session_cookie', '', time() - (86400 * 30), '/');

	//forward to index page
	header("Location: index.php");
?>