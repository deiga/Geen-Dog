<?php 
  require_once $_SERVER['DOCUMENT_ROOT']."/php/functions.php";
  initSession();
  
  $link = connect();
  not_connected($link);
  $db = 'roydonf_roydon';
  inv_db($db);
  if (loggedIn() && isset($_POST['del'])) {
    deleteRow($_REQUEST['del']); 
  }
?>