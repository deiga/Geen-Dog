<?php
    session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/php/functions.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fi" lang="fi">
	<head>
		<title>403 - Forbidden page - Roydon</title>
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
			<div id="otsake" class="shadow">
				<div id="otsikko">
					<h1>roydon</h1>
					<p>Kenneltarvikkeet</p>
				</div>
				<?php printMenu(0);?>
			</div>
			<div id="sivusisalto" class="shadow">
				<section id="content">
					<h2>Pääsy sivulle estetty</h2>
					<p class="error">Sivua jolle yrititte on salattu, tai kyseiseen kansioon ei ole pääsyä.<br />

Olkaa hyvä ja koittakaa uudestaan, varmistakaa että sivun osoite on
kirjoitettu oikein. Jos päädyitte tälle sivulle painettuanne jotakin
meidän linkeistä, niin olkaa hyvä ja ottakaa yhteys ylläpitoon.</p>
				</div>
			</div>
			<?php printFoot();?>
		</div>
	</body>
</html>