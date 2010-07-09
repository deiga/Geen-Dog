<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php	
	require_once($_SERVER['DOCUMENT_ROOT']."/php/functions.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fi" lang="fi">
	<head>
		<title>Roydon - Esittely</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="language" content="fi" />
		<meta name="author" content="Roydon Ky" />
		<meta name="description" content="Näyttelyitä kiertävä kenneltarvikeliike. Tieto meistä ja firmastamme." />
		<meta name="keywords" content=" roydon, kennel tarvikkeet, koira tarvikkeet" />
		<link rel="stylesheet" type="text/css" href="css/roydon.css" media="all" />
		<link rel="icon" type="image/ico" href="images/favicon.ico" />
		<link rel="shortcut icon" type="image/ico" href="http://roydon.fi/images/favicon.ico" />
		<script type="text/javascript" src="/js/roydon.js"></script>
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
	<body onload="curpage()">
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
				<div id="content">
					<div>
						Sivun sis&#228;lt&#246; tulee olemaan kertomus roydonin historiasta 
					</div>
				
				</div>
			</div>
			<?php printFoot();?>
		</div>
	</body>
</html>