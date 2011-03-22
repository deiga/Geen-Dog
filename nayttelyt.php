<?php
  require_once($_SERVER['DOCUMENT_ROOT']."/php/functions.php");
  initSession('shows');
  locale($_GET['lang']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
  $link = connect();
  not_connected($link);
  $year = $_REQUEST['year'];
  if ($year == '') {
    $year = date('Y');
  }

  $db = 'roydonf_roydon';
  inv_db($db);
  $q = date_query($year);

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
     <!--[if IE 6]>
      <link rel="stylesheet" type="text/css" href="css/roydon_ie6.css" />
    <![endif]-->
    <!--[if IE 7]>
      <link rel="stylesheet" type="text/css" href="css/roydon_ie7.css" />
    <![endif]-->
    <!--[if lte IE 6]>
      <link rel="stylesheet" type="text/css" href="css/roydon_ie5.css" />
    <![endif]-->
    <script type="text/javascript" src="/js/roydon.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('a.delete').click(function(e) {
          e.preventDefault();
          var parent = $(this).parent().parent();
          $.post("php/delShow.php", { del: parent.attr("id") },
            function() {
              parent.fadeOut("fast");
            });
        });
        $('.yearLink').click(function() {
          $('pretty-tbl').load('nayttelyt.php','year=' . $('yearLink').text())
        });
      });
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
            <table class="pretty-tbl" summary="Taulukko näkymä tulevista näyttelyistä.">
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
                  printTbody($year, $q, 0);
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
  mysql_close($link);
?>