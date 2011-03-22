<?php
  setcookie("testCookie", "1", time()+(60*60*2));
  require($_SERVER['DOCUMENT_ROOT'].'/php/functions.php');
  $link = connect();
  not_connected($link);
  
  $year = date('Y');
  
  $db = 'roydonf_roydon';
  $showquery = 'SELECT * FROM `shows` ORDER BY aika ASC';
  $newsquery = 'SELECT * FROM `news` WHERE date >= DATE_SUB(CURDATE(), INTERVAL 3 MONTH) ORDER BY date DESC';
  
  inv_db($db);
  
  $showresult = mysql_query($showquery);
  $newsresult = mysql_query($newsquery);

  inv_query($showresult, $newsresult);
  echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Roydon - Homepage</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="language" content="en" />
    <meta name="author" content="Roydon Ky" />
    <meta name="description" content="We tour dog shows in Finland, selling kennelaccessories" />
    <meta name="keywords" content="roydon, kennel supplies, dog supplies, kennel accessories, kennel accessory, rajala, touring, porvoo" />
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
      <div id="otsake" class="shadow">
        <?php langLink(1); ?>
        <div id="otsikko">
          <h1>roydon</h1>
          <p>Kennelaccessories</p>
        </div>
        <?php printMenu(1);?>
      </div>
      <div id="mainsisalto" class="shadow">
        <div id="vasen">
          <div class="sisalto">
              <div id="lyhes">
                <h2>Welcome</h2>
                This is the homepage of Roydon Ky, a company, selling kennelaccessories, from porvoo. Here you can find information about our company, about some of the products we sell and which dog shows we will be attending.
              </div>
              <?php
               if (mysql_num_rows($newsresult) > 0) {
                  echo '<div id="uutiset">
                  <fieldset class="contentfield">
                  <legend>Uutiset</legend>';
                  while ($row = mysql_fetch_row($newsresult)) {
                    echo "<p class='uutinen'>\n".date_conv_short($row[0])." - $row[3] <br />\n$row[4]\n</p>";
                  }
                  echo '</fieldset>
                  <a href="news.php" title="More news">More...</a>\n
                  </div>';
                }; 
              ?> 
          </div>
        </div>
        <div id="oikea">
          <div class="sisalto">
            <div id="nayttely">
              <h3>You can find us next in:</h3>
              <span>
              <?php
              if (mysql_num_rows($showresult)) {
                while ($row = mysql_fetch_row($showresult)) {
                  /* row has 5 fields, 0 = Paikkakunta, 1 = date, 2 = length of show, 3 = Name of the show, 4 = link to homepage of show */
                  if (soonShow($row[1],$row[2])) {
                    echo date_conv($row[1], $row[2])." ".$row[0]."<br /><a href='$row[4]' >$row[3]</a><br />\n";
                    break;
                  }
                }
              } else {
                echo "No upcoming shows at this time.";
              }
              ?>
              </span>
              <p>
                <a href="shows.php?year=<?php echo $year ?>" title="Attending dogshows">More dog shows...</a>
              </p>
            </div>
            <div id="links" class="robots-nocontent">
              <h4>Links</h4>
              <ul>
                <li><a href="http://www.kennelliitto.fi/fi" title="Suomen Kennelliitto" >Finnish Kennel Club</a></li>
                <li><a href="http://www.airedalenterrieri.fi/" title="SATY Ry" >Finnish Airedale Terrier association</a></li>
                <li><a href="http://www.terrierijarjesto.fi/" title="STJ Ry" >Finlands Terrierorganization</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <?php printFoot(1);?>
    </div>
  </body>
</html>
