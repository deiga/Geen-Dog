<?php
    session_start();
    
	require('functions.php');
	$link = connect();
	if (!$link) {
    		die('Could not connect: ' . mysql_error());
	}

	$user = $_POST['user'];
	$pass = $_POST['passwd'];
	$tbl = 'user';
	
	$db = 'roydonf_roydon';
	$query = "SELECT * FROM $tbl WHERE username = '$user' AND password = md5('$pass')";
	
	$db_selected = mysql_select_db($db);
	if (!$db_selected) {
  	  die ("Can\'t use '$db' : " . mysql_error());
	}
	
	$result = mysql_query($query);
	if (!$result) {
  	  die('Invalid query: ' . mysql_error());
	}

    /*
while($row = mysql_fetch_row($result)){ 
        print_r($row);
    }
    
*/ 
	$_SESSION['userName'] = mysql_result($result, 0, 2);
	$_SESSION['loggedIn'] = 1;
	
	if (mysql_num_rows($result) == 1) {
		header('Location: http://roydon.fi/login/home.php');
		echo "Login OK!";
	}
	
	else {
		header('Location: http://roydon.fi/login'); 
		echo " Login Failed!";
	}
		

?>