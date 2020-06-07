<?php
	// Extra session label, include this to prevent session error
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
		if(!isset($_SESSION['login']))
    	{
      		// not logged in
      		header('Location: login.php');
      		exit();
    	}
	}
?>