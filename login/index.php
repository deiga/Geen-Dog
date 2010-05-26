<?php
    session_start();
	
	if ($_SESSION['loggedIn'] != 1) {
	   $_SESSION['loggedIn'] = 0;
	}
	
	if($_SESSION['loggedIn'] == 1) {
	   header('Location: http://roydon.fi/login/home.php');
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	require('../php/functions.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fi" lang="fi">
	<head>
		<title>Roydon - Yll&auml;pito - Sis&auml;&auml;nkirjaus</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="author" content="Roydon Ky" />
		<meta name="language" content="fi" />
		<link rel="stylesheet" type="text/css" href="http://roydon.fi/css/roydon.css" media="all" />
		<link rel="icon" type="image/ico" href="http://roydon.fi/images/favicon.ico" />
		<link rel="shortcut icon" type="image/ico" href="http://roydon.fi/images/favicon.ico" />
		<!--[if IE 6]>
			<link rel="stylesheet" type="text/css" href="http://roydon.fi/css/roydon_ie6.css" />
		<![endif]-->
		<!--[if IE 7]>
			<link rel="stylesheet" type="text/css" href="http://roydon.fi/css/roydon_ie7.css" />
		<![endif]-->
		<!--[if lte IE 6]>
			<link rel="stylesheet" type="text/css" href="http://roydon.fi/css/roydon_ie5.css" />
		<![endif]-->
    <script type="text/javascript" src="/js/roydon.js"></script>
	</head>
	<body >
		<div id="takala">
			<div id="otsake">
				<div id="otsikko">
					<h1>roydon</h1>
					<p>Kenneltarvikkeet</p>
				</div>
				<?php printMenu(0);?>
			</div>
			<div id="login">
				<div class="content">
						<div id="logTex">
							<h2>Yll&auml;pito</h2>
							<p>Jos haluat yll&auml;pit&auml;&auml; sivuston sis&auml;lt&ouml;&auml; kirjaudu omilla tunnuksillasi t&auml;nne.
							 <br />Jos taasen et tied&auml; tunnuksia ota yhteytt&auml; yll&auml;pitoon. 
							 <br />Jos sinulla ei ole tunnuksia, eik&auml; kuuluisi ollakkaan, sitten ehdotan siirtym&auml;&auml;n meid&auml;n etusivulle.
				            </p>
						</div>
						<form id="loginform" action="http://roydon.fi/php/login.php" method="post">
							<fieldset class="contentfield">
								<legend>Login</legend>
								<table id="logintbl">
									<tr>
									   <td>
									       <label for="user">Tunnus:</label>
									       <input type="text" value="Username" size="15" id="user" name="user" onfocus="this.value=''" />
									   </td>
								    </tr>
									<tr>
									   <td>
									       <label for="passwd">Salasana:</label>
									       <input type="password" value="Password" size="15" id="passwd" name="passwd" onfocus="this.value=''" />
									   </td>
								    </tr>
									<tr>
									   <td align='right'><input type="submit" value="OK" /></td>
									   </tr>
								</table>
							</fieldset>
						</form>
						
				</div>
			</div>
			<?php printFoot();?>
		</div>
	</body>
</html>