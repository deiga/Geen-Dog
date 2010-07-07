<?php
   	require_once "../php/functions.php";
   	
   	initSession();
	
	if($_SESSION['loggedIn'] == 0) {
	   header('Location: http://roydon.fi/login/');
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
   	require_once "../php/functions.php";
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>Yll&auml;pito - Valikko</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="author" content="Roydon Ky" />
		<meta name="description" content="Ylläpitosivusto" />
		<meta name="keywords" content=" roydon, kennel tarvikkeet, koira tarvikkeet" />
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
	</head>
	<body>
		<div id="takala">
			<div id="otsake">
				<div>
					<h1>roydon <br /> <span>Kenneltarvikkeet</span></h1>
				</div>
				<?php printMenu(0);?>
			</div>
			<div id="sivusisalto">
				<div class="content">
				    <h3>Hei <?php echo $_SESSION['userName'];?></h3>
				    <p>
				    Täältä pääset muokkaamaan sivujen sisältöä!
				    </p>
				    <ul>
				      <li><a href="addShow.php">Näyttelyitten lisääminen</a></li>
				      <li><a href="#">Näytteliden poistaminen</a></li>
				      <li><a href="addNews.php">Uutisten lisääminen</a></li>
				      <li><a href="#">Uutisten poistaminen</a></li>
				    </ul>
				</div>
			</div>
			<?php printFoot();?>
		</div>
	</body>
</html>