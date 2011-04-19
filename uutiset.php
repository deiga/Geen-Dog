<?php
  echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<!DOCTYPE html>
<?php
  require_once $_SERVER['DOCUMENT_ROOT']."/php/functions.php";
  locale($_GET['lang']);
  // $link = connect();
  // not_connected($link);
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
  </head>
 <body onload="curpage()">
    <div id="takala">
      <?php oldBrowse(); ?>
      <div id="otsake" class="shadow">
        <?php langLink($_GET['lang']); ?>
        <div id="otsikko">
          <h1>roydon</h1>
          <p>Kenneltarvikkeet</p>
        </div>
        <?php printMenu();?>
      </div>
      <div id="sivusisalto" class="shadow">
        <section id="content">
            <?php
              echo '<div id="uutiset">
                <fieldset class="contentfield">
                <legend>Uutiset</legend>';
              $news = $roydon->news()->order('date DESC');
              foreach ( $news as $new) {
                echo "<p class='uutinen'>\n".date_conv_short($new['date'])." - $new[head] <br />\n$new[content]\n</p>";
              }
                echo '</fieldset>
              </div>';
            ?>
          </section>
        </div>
      </div>
      <?php printFoot();?>
    </div>
  </body>
</html>
