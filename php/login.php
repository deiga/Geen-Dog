<?php
  session_start();

	require_once $_SERVER['DOCUMENT_ROOT']."/php/functions.php";
  // $link = connect();
  // not_connected($link);

  try {
      $connection = new PDO("mysql:dbname=roydonf_roydon", getUN(), getPWD());
      $roydon = new NotORM($connection);
  } catch (PDOException $e) {
      echo 'Connection failed: ' . $e->getMessage();
  }

	$user = $_POST['user'];
	$pass = $_POST['passwd'];

  $users = $roydon->user()
    ->select('name')
    ->where('username = ?', $user)
    ->where("password = MD5(?)", $pass);

	if (count($users) == 1) {
	  $row = $users->fetch;
	  $_SESSION['userName'] = $row['name'];
  	$_SESSION['loggedIn'] = 1;
		header('Location: http://roydon.fi/login/home.php');
		echo "Login OK!";
	}

	else {
	  $_SESSION['loggedIn'] = -1;
    header('Location: http://roydon.fi/login');
		echo " Login Failed! ";
	}


?>