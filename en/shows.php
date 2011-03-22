<?php
  require_once($_SERVER['DOCUMENT_ROOT']."/php/functions.php");
  initSession('shows');
  echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<!DOCTYPE html>
<?php
  
  $link = connect();
  not_connected($link);
  $year = $_REQUEST['year'];
  $db = 'roydonf_roydon';
  $q = date_query($year);
  
  inv_db($db); 
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Roydon - Attending dog shows - <?php echo $year; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="author" content="Roydon Ky" />
    <meta name="description" content="Which dogshows we will be attending in finland in the year <?php echo $year; ?>" />
    <meta name="keywords" content="roydon, kennel tarvikkeet, koira tarvikkeet, koira näyttely" />
    <link rel="stylesheet" type="text/css" href="http://roydon.fi/css/roydon.css" media="all" />
    <link rel="icon" type="image/ico" href="http://roydon.fi/images/favicon.ico" />
    <link rel="shortcut icon" type="image/ico" href="http://roydon.fi/images/favicon.ico" />
    <script type="text/javascript" src="/js/roydon.js"></script>
    <!--[if IE 6]>
      <link rel="stylesheet" type="text/css" href="http://roydon.fi/css/roydon_ie6.css" />
    <![endif]-->
    <!--[if IE 7]>
      <link rel="stylesheet" type="text/css" href="http://roydon.fi/css/roydon_ie7.css" />
    <![endif]-->
    <!--[if lte IE 6]>
      <link rel="stylesheet" type="text/css" href="http://roydon.fi/css/roydon_ie5.css" />
    <![endif]-->
  </head>
  <body onload="curpage()">
    <div id="takala">
      <?php oldBrowse(); ?>
      <div id="otsake">
<?php langLink(1); ?>
        <div id="otsikko">
          <h1>roydon</h1>
          <p>Kennelaccessories</p>
        </div>
        <?php printMenu(1);?>
      </div>
      <div id="sivusisalto">
        <section id="content">
            <table class="pretty-tbl" summary="Taulukko näkymä tulevista näyttelyistä.">
              <caption>You can find us at these dow shows in 
              <?php
               if ($year == date('Y') ) {
                 if ( date('m') >= 8 ) {
                   echo ($year." - ".($year+1)); 
                 } else echo $year;
               } else echo $year;  
              ?>
              :</caption>
              <thead>
                <th scope="col" id="show_time">Time</th>
                <th scope="col" id="show_name">Name</th>
                <th scope="col" id="show_place">Place</th>
                <?php
                  if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 1) {
                    echo "  <th scope='col' id='show_admin'>Admin</th>\n";
                  }         
                ?>
              </thead>
              <tbody>
            <?php
              printTbody($year, $q, 1);
            ?>
              </tbody>
            </table>
            <div id="years">
              <?php yearList(1); ?>
              <p>You can find the information of all dog shows in Finnland at the page <a href="http://www.kennelliitto.fi/EN/events/shows/shows2008/" title="Finnish Kennel Club shows">Finnish Kennel Club</a></p>
            </div>
        </div>
      </div>
      <?php printFoot(1);?>
    </div>
  </body>
</html>
<?php
  mysql_close($link);
?>