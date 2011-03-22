<?php
  echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<!DOCTYPE html>
<?php
  require_once($_SERVER['DOCUMENT_ROOT']."/php/functions.php");
  
  $link = connect();
  not_connected($link);
  $year = date('Y');

  $db = 'roydonf_roydon';
  $newsquery = 'SELECT * FROM `news` ORDER BY date DESC';
  
  $db_selected = mysql_select_db($db);
  inv_db($db, $db_selected);
  
  $newsresult = mysql_query($newsquery);
  inv_query($newsresult);
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fi" lang="fi">
  <head>
    <title>Uutiset - Roydon</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="UTF-8" />
    <meta name="language" content="fi" />
    <meta name="author" content="Roydon Ky" />
    <meta name="description" content="Listaus kaikista sivuston uutisista." />
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
      <div id="otsake">
        <?php langLink(0); ?>
        <div id="otsikko">
          <h1>roydon</h1>
          <p>Kenneltarvikkeet</p>
        </div>
        <?php printMenu(0);?>
      </div>
      <div id="sivusisalto" class="shadow">
        <section id="content">
            <?php
              echo '<div id="uutiset">
                <fieldset class="contentfield">
                <legend>Uutiset</legend>';
                  while ($row = mysql_fetch_row($newsresult)) {
            
                    echo "<p class='uutinen'>\n".date_conv_short($row[0])." - $row[1] <br />\n$row[2]\n</p>";
                  }
                echo '</fieldset>
              </div>';
            ?>
          </div>
        </div>
      </div>
      <?php printFoot();?>
    </div>
  </body>
</html>
