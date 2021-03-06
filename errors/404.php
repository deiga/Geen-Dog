<?php
    session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	require_once $_SERVER['DOCUMENT_ROOT']."/php/functions.php";
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
		<!--[if IE 7]>
			<link rel="stylesheet" type="text/css" href="http://roydon.fi/css/roydon_ie7.css" />
		<![endif]-->
		<script type="text/javascript">

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-22841460-1']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

    </script>
	</head>
	<body >
		<div id="takala">
			<div id="otsake" class="shadow">
				<div id="otsikko">
					<h1>roydon</h1>
					<p>Kenneltarvikkeet</p>
				</div>
				<?php printMenu();?>
			</div>
			<div id="sivusisalto" class="shadow">
				<section id="content">
					<h2>404 - Sivua ei löytynyt</h2>
					<p class="error">
				    Sivua jolle yrititte ei ole olemassa tai sitä ei löydy tällä hetkellä.<br />
				    Olkaa hyvä ja koittakaa uudestaan, varmistakaa että sivun osoite on kirjoitettu oikein. Jos päädyitte tälle sivulle jostain meidän linkeistä, niin olkaa hyvä ja ottakaa yhteys ylläpitoon.
					</p>
				</div>
			</div>
			<?php printFoot();?>
		</div>
	</body>
</html>