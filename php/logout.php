<?php
    session_start();
    $_SESSION['userName'] = "NOT LOGGED IN";
	$_SESSION['loggedIn'] = 0;
	
	$_SESSION = array();
	
    session_regenerate_id();
	session_destroy();
	header("Location: http://roydon.fi/login/");
?>