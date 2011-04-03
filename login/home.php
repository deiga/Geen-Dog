<?php
 	require_once $_SERVER['DOCUMENT_ROOT']."/php/functions.php";

 	initSession();
 	echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>Ylläpito - Valikko</title>
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
			<div id="otsake" class="shadow">
				<div id="otsikko">
					<h1>roydon</h1>
					<p>Kenneltarvikkeet</p>
				</div>
				<?php printMenu();?>
			</div>
			<div id="sivusisalto" class="shadow">
				<section id="content" class="admin">
				    <h3>Hei <?php echo $_SESSION['userName'];?></h3>
				    <?php
				      if (isset($_SESSION['msg']) && empty($_SESSION['msg']) ) {
				        echo ("<p>". $_SESSION['msg'] ."</p>");
				      }
            ?>
				    <p>
				    Täältä pääset muokkaamaan sivujen sisältöä!
				    </p>
				    <ul>
				      <li><a href="addShow.php">Näyttelyn lisääminen</a></li>
				      <li><a href="/nayttelyt.php">Näyttelyn poistaminen</a></li>
				      <li><a href="addNews.php">Uutisen lisääminen</a></li>
				      <li><a href="/uutiset.php">Uutisen poistaminen</a></li>
				    </ul>
				</section>
			</div>
			<?php printFoot();?>
		</div>
	</body>
</html>