<?php
	echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
  require_once $_SERVER['DOCUMENT_ROOT']."/php/functions.php";
  locale($_GET['lang']);
	// $link = connect();
	//   not_connected($link);
	$year = date('Y');

	try {
      $connection = new PDO("mysql:dbname=roydonf_roydon", getUN(), getPWD());
      $roydon = new NotORM($connection);
  } catch (PDOException $e) {
      echo 'Connection failed: ' . $e->getMessage();
  }
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
	<body onload="curpage()">
		<div id="takala">
			<?php oldBrowse(); ?>
			<div id="otsake" class="shadow">
				<?php langLink($_GET['lang']); ?>
				<div id="otsikko">
					<h1>roydon</h1>
					<p><?php echo _('header.subtitle'); ?></p>
				</div>
				<?php printMenu();?>
			</div>
			<div id="mainsisalto" class="shadow">
				<div id="vasen">
					<section class="sisalto">
							<section id="lyhes">
								<h2><?php echo _('welcome.heading'); ?>!</h2>
								<?php echo _('welcome.text'); ?>
							</section>
							<?php
              // SELECT * FROM `news` WHERE date >= DATE_SUB(CURDATE(), INTERVAL 3 MONTH) ORDER BY date DESC
                $news = $roydon->news()
							              ->where('date >= DATE_SUB(CURDATE(), INTERVAL 3 MONTH)')
							              ->order('date DESC');
                if (count($news) > 0) {
                  echo '<div id="uutiset">
                    <fieldset class="contentfield">
                    <legend>_("news.title")</legend>';
                  foreach ($news as $new) {
                    echo "<p class='uutinen'>\n".date_conv_short($new['date'])." - $new[head] <br />\n$new[content]\n</p>";
									}
                  echo '</fieldset>\n
                    <a href="/uutiset.php" title="Lisää uutisia">_("news.more")...</a>\n
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
							$shows = $roydon->shows()
							              ->where("ADDDATE(aika, kesto) > CURDATE()")
							              ->order('aika ASC')
							              ->limit(1);

              foreach($shows as $show) {
							  if (count($shows) > 0 ) {
                  echo date_conv($show['aika'], $show['kesto'])." ".$show['paikka']."<br /><a href='$show[link]' >$show[nimi]</a><br />\n";
                } else {
                  echo _('show.next.negative')  . '.';
                }
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
								<li><a href="http://www.kennelliitto.fi/fi" rel="external" title="Suomen Kennelliitto"><?php echo _('links.kennelclub'); ?></a></li>
								<li><a href="http://www.airedalenterrieri.fi/" rel="external" title="SATY Ry"><?php echo _('links.airedale'); ?></a></li>
								<li><a href="http://www.terrierijarjesto.fi/" rel="external" title="STJ Ry"><?php echo _('links.terriers'); ?></a></li>
								<li><a href="http://www.lakelandinterrierit.net/" rel="external" title="Lakelandinterrierit ry"><?php echo _('links.lakeland'); ?></a></li>
							</ul>
						</section>
					</aside>
				</div>
			</div>
			<?php printFoot();?>
		</div>
	</body>
</html>