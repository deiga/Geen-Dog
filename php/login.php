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
    ->where('username = ?', $user)
    ->where('password = MD5(' . $pass . ')');
  // $db = 'roydonf_roydon';
  // $query = "SELECT * FROM user WHERE username = '$user' AND password = md5('$pass')";
  //
  // $db_selected = mysql_select_db($db);
  // inv_db($db, $db_selected);
  //
  // $result = mysql_query($query);
  // inv_query($result);

    /*
while($row = mysql_fetch_row($result)){
        print_r($row);
    }

*/
echo (string)$users;
echo "Pre:" . count($users);
echo "Post:" . $users->count('*');

	if (count($users) == 1) {
	  $user = $users->fetch;
	  $_SESSION['userName'] = $user['name'];
  	$_SESSION['loggedIn'] = 1;
		header('Location: http://roydon.fi/login/home.php');
		echo "Login OK!";
	}

	else {
	  $_SESSION['loggedIn'] = -1;
		header('Location: http://roydon.fi/login');
		echo " Login Failed!";
	}


?>