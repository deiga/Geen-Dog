<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	require_once "php/functions.php";
	require_once('php/recaptchalib.php');
	$publickey = "6LdZQQQAAAAAAHm66YKZX86nHz6V_XpL9VbWtLKm";
	
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fi" lang="fi">
	<head>
		<title>Roydon - Palautelomake</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="author" content="Roydon Ky" />
		<meta name="description" content="Näyttelyitä kiertävä kenneltarvikeliike." />
		<meta name="keywords" content=" roydon, kennel tarvikkeet, koira tarvikkeet" />
		<link rel="stylesheet" type="text/css" href="css/roydon.css" media="all" />
		<link rel="icon" type="image/ico" href="images/favicon.ico" />
		<link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />
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
		<script>
			var RecaptchaOptions = {
 			  theme : 'white',
 			  tabindex : 2
			};
		</script>
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
					<div id="captcha">
						<fieldset>
							<legend>Palautelomake</legend>
							<form method="post" action="php/mail.php">
								Aihe: 
								<input type="text" name="subject" /><br />
								Lähettäjä: 
								<input type="text" name="email" /><br />
								Viesti: 
								<textarea name="message" rows="7" cols="50"></textarea><br />
								<?php echo recaptcha_get_html($publickey); ?>
								<input type="submit" value="Lähetä" /> 
								<input type="reset" value="Tyhjennä lomake" />
							</form>
						</fieldset>
					</div>
					
				</div>
			</div>
			<?php printFoot();?>
		</div>
	</body>
</html>