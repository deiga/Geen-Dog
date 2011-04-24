<?php
  require_once $_SERVER['DOCUMENT_ROOT']."/php/functions.php";
  initSession('shows');
  locale($_GET['lang']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
  // $link = connect();
  //   not_connected($link);
  $year = $_REQUEST['year'];
  if ($year == '') {
    $year = date('Y');
  }

  try {
      $connection = new PDO("mysql:dbname=roydonf_roydon", getUN(), getPWD());
      $roydon = new NotORM($connection);
  } catch (PDOException $e) {
      echo 'Connection failed: ' . $e->getMessage();
  }

?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fi" lang="fi">
  <head>
    <title>Roydon - Näyttelyt - <?php echo $year; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="author" content="Roydon Ky" />
    <meta name="description" content="Näyttelyt, joissa olemme paikalla myymässä kenneltarvikkeita vuonna <?php echo $year; ?>." />
    <meta name="keywords" content=" roydon, kennel tarvikkeet, koira tarvikkeet, koira näyttely" />
    <link rel="icon" type="image/ico" href="images/favicon.ico" />
    <link rel="shortcut icon" type="image/ico" href="http://roydon.fi/images/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="css/roydon.css" media="all" />
    <!--[if IE 7]>
      <link rel="stylesheet" type="text/css" href="css/roydon_ie7.css" />
    <![endif]-->
    <script type="text/javascript" src="/js/roydon.js"></script>
    <script type="text/javascript" src="/js/shows.js"></script>
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
      <div id="sivusisalto" class="shadow">
        <section id="content">
            <table id="shows-tbl" class="pretty-tbl" summary="Taulukko näkymä tulevista näyttelyistä.">
              <caption><?php echo _('show.title'); ?>
              <?php
               if ($year == date('Y') ) {
                 if ( date('m') >= 8 ) {
                   echo ($year." - ".($year+1));
                 } else echo $year;
               } else echo $year;
              ?>
              :</caption>
              <thead>
                <tr>
                  <th scope="col" id="show_time"><?php echo _('show.time'); ?></th>
                  <th scope="col" id="show_name"><?php echo _('show.name'); ?></th>
                  <th scope="col" id="show_place"><?php echo _('show.location'); ?></th>
                  <?php
                    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 1) {
                     echo "  <th scope='col' id='show_admin'>Ylläpito</th>\n";
                    }
                  ?>
                </tr>
              </thead>
              <tbody>
                <?php
                  printTbody($year, $roydon);
                ?>
              </tbody>
            </table>
            <div id="years">
              <?php yearList(); ?>
              <p>
                <?php echo _('show.more.info'); ?>:
                <a href="http://www.kennelliitto.fi/FI/toiminta/nayttelyt/kvkr2008/" title="SKL näyttelysivusto"><?php echo _('links.kennelclub'); ?></a>
              </p>
          </div>

        </section>
      </div>
      <?php printFoot();?>
    </div>
  </body>
</html>
<?php
  // mysql_close($link);
?>