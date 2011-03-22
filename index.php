<?php
	echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
  require_once($_SERVER['DOCUMENT_ROOT']."/php/functions.php");
  locale($_GET['lang']);
	$link = connect();
	not_connected($link);
	$year = date('Y');

	$db = 'roydonf_roydon';
	$showquery = 'SELECT * FROM `shows` ORDER BY aika ASC';
	$newsquery = 'SELECT * FROM `news` WHERE date >= DATE_SUB(CURDATE(), INTERVAL 3 MONTH) ORDER BY date DESC';

	$db_selected = mysql_select_db($db);
	inv_db($db, $db_selected);

	$showresult = mysql_query($showquery);
	$newsresult = mysql_query($newsquery);
	inv_query($showresult, $newsresult);
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fi" lang="fi">
	<head>
		<title>Roydon - Etusivu</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="language" content="fi" />
		<meta name="author" content="Roydon Ky" />
		<meta name="description" content="Näyttelyitä kiertävä kenneltarvikeliike. Täältä löydät tiedot meistä ja mistä meidät löytää." />
		<meta name="keywords" content="roydon, kennel tarvikkeet, koira tarvikkeet, rajala, kennel tarvike, kiertävä, porvoo, roidon" />
    <link rel="stylesheet" type="text/css" href="/css/roydon.css" media="all" />
		<link rel="icon" type="image/ico" href="/images/favicon.ico" />
		<link rel="shortcut icon" type="image/ico" href="/images/favicon.ico" />
		<script type="text/javascript" src="/js/roydon.js"></script>
		<!--[if IE 7]>
			<link rel="stylesheet" type="text/css" href="/css/roydon_ie7.css" />
		<![endif]-->
		<!--[if IE 6]>
			<link rel="stylesheet" type="text/css" href="/css/roydon_ie6.css" />
		<![endif]-->
		<!--[if lt IE 6]>
			<link rel="stylesheet" type="text/css" href="/css/roydon_ie5.css" />
		<![endif]-->
	</head>
	<body onload="curpage()">
		<div id="takala">
			<?php oldBrowse(); ?>
			<div id="otsake" class="shadow">
				<?php langLink(0); ?>
				<div id="otsikko">
					<h1>roydon</h1>
					<p><?php echo _('header.subtitle'); ?></p>
				</div>
				<?php printMenu(0);?>
			</div>
			<div id="mainsisalto" class="shadow">
				<div id="vasen">
					<section class="sisalto">
							<section id="lyhes">
								<h2>Tervetuloa Roydon Ky:n kotisivuille</h2>
								Roydon on koiranäyttelyitä kiertävä kenneltarvikeliike. Sivuiltamme löydät tiedot näyttelyistä, joissa käymme, ja myös tiedot miten meihin saa yhteyden.
							</section>
							<?php
							 if (mysql_num_rows($newsresult) > 0) {
							   echo '<div id="uutiset">
								  <fieldset class="contentfield">
									<legend>_("news.title")</legend>';
										while ($row = mysql_fetch_row($newsresult)) {

											echo "<p class='uutinen'>\n".date_conv_short($row[0])." - $row[1] <br />\n$row[2]\n</p>";
										}
								  echo '</fieldset>\n
								  <a href="/uutiset.php" title="Lisää uutisia">_("news.more")</a>\n
							   </div>';
                };
                ?>
					</section>
				</div>
				<div id="oikea">
					<aside class="sisalto">
						<section id="nayttely">
							<h3><?php echo _('show.next.title'); ?></h3>
							<span>
							<?php
							if (mysql_num_rows($showresult) > 0 ) {
								while ($row = mysql_fetch_row($showresult)) {
								  /* row has 5 fields, 0 = Paikkakunta, 1 = date, 2 = length of show, 3 = Name of the show, 4 = link to homepage of show */
									if (soonShow($row[1],$row[2])) {
										echo date_conv($row[1], $row[2])." ".$row[0]."<br /><a href='$row[4]' >$row[3]</a><br />\n";
										break;
									}
								}
						  } else {
						    echo "<?php echo _('show.next.negative'); ?>.";
						  }
							?>
							</span>
							<p>
								<a href="nayttelyt.php?year=<?php echo $year ?>" title="Attending dogshows"><?php echo _('show.next.more'); ?>...</a>
							</p>
						</section>
						<section id="links" class="robots-nocontent">
							<h4><?php echo _('links.title'); ?></h4>
							<ul>
								<li><a href="http://www.kennelliitto.fi/fi" title="Suomen Kennelliitto">Suomen Kennelliitto</a></li>
								<li><a href="http://www.airedalenterrieri.fi/" title="SATY Ry">Suomen Airedalenterrieriyhdistys</a></li>
								<li><a href="http://www.terrierijarjesto.fi/" title="STJ Ry">Suomen Terrierijärjestö Ry</a></li>
								<li><a href="http://www.lakelandinterrierit.net/" title="Lakelandinterrierit ry">Lakelandinterrierit Ry</a></li>
							</ul>
						</section>
					</aside>
				</div>
			</div>
			<?php printFoot();?>
		</div>
	</body>
</html>