<?php
	require_once "php/functions.php";
	
	echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fi" lang="fi">
	<head>
		<title></title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta name="author" content="Roydon Ky" />
		<meta name="language" content="fi" />
		<meta name="description" content="N&auml;yttelyit&auml; kiert&auml;v&auml; kenneltarvikeliike." />
		<meta name="keywords" content=" roydon, kennel tarvikkeet, koira tarvikkeet" />
		<link rel="stylesheet" type="text/css" href="css/roydon.css" media="all" />
		<link rel="icon" type="image/ico" href="images/favicon.ico" />
		<link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />
		<!--[if IE 6]>
			<link rel="stylesheet" type="text/css" href="css/roydon_ie6.css" />
		<![endif]-->
		<!--[if IE 7]>
			<link rel="stylesheet" type="text/css" href="css/roydon_ie7.css" />
		<![endif]-->
		<!--[if lte IE 6]>
			<link rel="stylesheet" type="text/css" href="css/roydon_ie5.css" />
		<![endif]-->
	</head>
	<body>
		<div id="takala">
			<?php oldBrowse(); ?>
			<div id="otsake">
				<div id="lang">
					<a href="http://roydon.fi/en" title="In English" target="_top">In English</a>
				</div>
				<div id="otsikko">
					<h1>roydon</h1>
					<p>Kenneltarvikkeet</p>
				</div>
				<?php printMenu(0);?>
			</div>
			<div id="sivusisalto">
				<div class="content">
				</div>
			</div>
			<?php printFoot();?>
		</div>
	</body>
</html>