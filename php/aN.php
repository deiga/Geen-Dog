<?php
	require_once "functions.php";
	$link = connect();
	if (!$link) {
    		die('Could not connect: ' . mysql_error());
	}

	$ots = $_POST['head'];
	$otsEN = $_POST['headEN'];
	$cont = $_POST['content'];
	$contEN = $_POST['contentEN'];
	$tbl = 'news';
	$db = 'roydonf_roydon';

	$query = "INSERT INTO $db.$tbl(`date` ,`head` ,`content` ,`headEn` ,`contEn`) VALUES ('CURDATE()', '$ots', '$cont', '$otsEN', '$contEN')";
	$db_selected = mysql_select_db($db);
	if (!$db_selected) {
  	  die ("Can\'t use '$db' : " . mysql_error());
	}
	
	$result = mysql_query($query);
	if (!$result) {
  	  die('Invalid query: ' . mysql_error());
	}	

?>