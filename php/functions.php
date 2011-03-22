<?php
  require_once "arka.php";

  /* date_default_timezone_set('Europe/Helsinki'); */

  function initSession($login = '') {
    session_start();

    if ($_SESSION['loggedIn'] != 1) {
      $_SESSION['loggedIn'] = 0;
    }

    if($_SESSION['loggedIn'] == 0 && $login == '') {
      header('Location: http://roydon.fi/login/');
    } else if ($_SESSION['loggedIn'] == 1 && $login == 'login') {
      header('Location: http://roydon.fi/login/home.php');
    }
  }

  function locale($code = 'fi') {
    switch ($code) {
      case 'en':
        setlocale(LC_MESSAGES, 'en_US.UTF-8');
        break;

      case 'se':
        setlocale(LC_MESSAGES, 'sv_SE.UTF-8');
        break;

      default:
        setlocale(LC_MESSAGES, 'fi_FI.UTF-8');
        break;
    }
    bindtextdomain('roydon', '/home/roydonf/public_html/locale');
    textdomain('roydon');
    bind_textdomain_codeset('roydon', 'UTF-8');
  }

  // Function to convert days into seconds
  function lengthConv($dur) {
    return ($dur-1) * 86400;
  }

  // Function to convert mysql date's into representation of a duration.
  function date_conv($in, $long) {

    if ( $long > 1 ) {
      $out = date('d.', (strtotime($in)))."-".date('d.m.', (strtotime($in))+lengthConv($long));
      return $out;
    }
    $out = date('d.m.', (strtotime($in)));
    return $out;
  }

  // Function to convert mysql date's into a normal representation.
  function date_conv_short($in) {

    $out = date('d.m.Y', (strtotime($in)));
    return $out;
  }

  // Function to determine query statement by date
  function date_query($year) {

    $month = 0;
    $year1 = $year + 1;

    if ($year == date('Y')) {
      $month = date('m');
      $day = date('d');
    } else {
      $qer = "SELECT * FROM `shows` WHERE aika > '$year-00-00' AND aika < '$year1-00-00' ORDER BY aika ASC";
      return $qer;
    }

    $qer2 = "SELECT * FROM `shows` WHERE aika > '$year-00-00' ORDER BY aika ASC";
    $qer[1] = "SELECT * FROM `shows` WHERE aika > '$year-$month-$day' ORDER BY aika ASC";
    $qer[2] = "SELECT * FROM `shows` WHERE aika > '$year-00-00' AND aika <= '$year-$month-$day' ORDER BY aika ASC";

    if ( $month < 06 ) {
      return $qer2;
    } else return $qer;
  }

  // Function to print out the menu of a page. Languages are 0 = Finnish, 1 = English
  function printMenu() {
    $year = date('Y');
    $month = date('m');
    echo "<navi id='navi'>\n";
    echo "      <ul id='navilist'>\n";
      echo "        <li id='index' class='rounded-top'><a href='/index.php' title='Homepage'>" . _('navi.home') . "</a></li>\n";
      //echo "        <li id='info' class='rounded-top'><a href='/info.php' title='About Us'>Esittely</a></li>\n";
      //echo "        <li id='products' class='rounded-top'><a href='/products.php' title='Products'>" . _('navi.products') . "</a></li>\n";
      echo "        <li id='nayttelyt' class='rounded-top'><a href='/nayttelyt.php?year=$year' title='Attending dogshows'>" . _('navi.shows') . "</a></li>\n";
      echo "        <li id='contact' class='rounded-top'><a href='/contact.php' title='Contact Us'>" . _('navi.contact') . "</a></li>\n";

    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 1) {
      echo "              <li id='logout' class='rounded-top'><a href='/php/logout.php' title='Logout'>Logout</a></li>\n";
    }
    echo "      </ul>\n";
    echo "</navi>\n";
  }

  // Function to determine if the upcoming show has alreadu begun, if yes display the next show.
  function soonShow($date, $long) {

    $date = strtotime($date) + lengthConv($long);
    $today = strtotime(date('Y-m-d'));

    if (date('H:i') > '14:00') {
      if ($date > $today) {
        return true;
      }
    } else {
      if ($date >= $today) {
        return true;
      }
    }

    return false;
  }

  // Function to print warning messages to users of ie 6 and under.
  function oldBrowse() {
    echo '<div id="error"><!--[if lte IE 6]>You are viewing this page with an outdated browser, I recommend you to update it immediately for your own safety! The page may not function properly with this browser.<br />
    Katselette sivustoa vanhentuneella selaimella, olkaa hyvä ja päivittäkää selaimenne, oman turvallisuutenne vuoksi! Sivustossa saattaa esiintyä virheitä selaimellanne<![endif]--></div>';
  }

  // Function to print the pages footers, depending on language.
  function printFoot($lang = 0) {
    echo "<footer>\n";
    if ($lang == 1) {
      echo "\tQuestions or comments regarding the site to &#119;&#101;&#098;&#109;&#097;&#115;&#116;&#101;&#114;&#064;&#114;&#111;&#121;&#100;&#111;&#110;&#046;&#102;&#105;";
    } else if ($lang == 0) {
      echo "\t" . _('contact.web') . " &#119;&#101;&#098;&#109;&#097;&#115;&#116;&#101;&#114;&#064;&#114;&#111;&#121;&#100;&#111;&#110;&#046;&#102;&#105; <a class='robots-nocontent' href='/login'>Ylläpito</a>";
    }
    echo "<address>";
    echo "Kuninkaantie 752 <br /> FI 07110 HINTHAARA\n <br />";
    echo "+358 (0)40 020 0521";
    echo "</address>";
    echo "Copyright &copy;" . date('Y') . " Roydon Ky \n</footer>\n";
  }

  // Function to print link list fo different years
  function yearList($lang = 0) {
    echo '<ul id="yearslist">';
    for ($i = 2008; $i <= date('Y'); $i++) {
      if ($lang == 0) {
         $langTxt = 'nayttelyt.php';
      } else if ($lang == 1) {
          $langTxt='shows.php';
      }
      echo "<li id='yearLink' class='ylistI'><a href='$langTxt?year=$i'>$i</a></li>" . PHP_EOL;
    }
    echo' </ul>';
  }

  // Function to print table body for shows
  function printTbody($year, $q, $lang = 0) {

   printNewShows($year, $q);
    if ($year == date('Y') && date('m') >= 06) {
      echo "<tr>\n";
      echo "\t<td headers='show_name' colspan='4'>\n";
      if ($lang == 0) {
        echo "\t\t<strong>Menneet näyttelyt tältä vuodelta</strong>\n";
      } else if ($lang == 1) {
        echo "\t\t<strong>Past shows this year</strong>\n";
      }
      echo "\t</td>\n";
      echo "</tr>\n";
      printPastShows($q[2]);
    }
  }

  // Function to print upcoming shows
  function printNewShows($year, $query) {
    if ($year == date('Y') && date('m') >= 06) {
      $result = mysql_query($query[1]);
    } else $result = mysql_query($query);

    inv_query($result);

    while ($row = mysql_fetch_row($result)) {
      printShowRow($row);
    }
  }

  // Function to print shows from the beginning of the year
  function printPastShows($query) {
    $result = mysql_query($query);
    inv_query($result);
    while ($row = mysql_fetch_row($result)) {
      printShowRow($row);
    }
  }

  // Function to print table rows for shows
  function printShowRow($row) {
    echo "<tr id='$row[1]'><td headers='show_time'>".date_conv($row[1], $row[2])."</td>\n";
    echo "<td headers='show_name'><a href='$row[4]'>$row[3]</a></td>\n";
    echo "<td headers='show_place'>$row[0]</td>";
    if (loggedIn()) {
      echo "<td header='show_admin'><a href='' class='delete'>Poista</a></td>";
    }
    echo "\n</tr>\n";
  }

  // Function for invalid queries
  function inv_query($res, $res2 = true) {
    if (!$res || !$res2) {
      $errmsg = 'Invalid query: ' . mysql_error();
      die($errmsg);
      error_log($errmsg);
    }
  }

  // Function for dead connections
  function not_connected($conn) {
    if (!$conn) {
      $errmsg = 'Could not connect: ' . mysql_error();
                    die($errmsg);
                    error_log($errmsg);
    }
  }

  // Function for printing language link
  function langLink($lang = 'fi') {
      echo "<div id='lang'>\n";
      switch ($lang) {
        case 'en':
          echo "  <a href='?lang=fi' title='" . _('lang.text') . "'>" . _('lang.text') . "</a>\n";
          break;

        default:
          echo "  <a href='?lang=en' title='" . _('lang.text') . "'>" . _('lang.text') . "</a>\n";
          break;
      }

      echo "</div>";
  }

  // Function for unusable db's
  function inv_db($db) {
    if (!mysql_select_db($db)) {
      $errmsg = "Can\'t use '$db' : " . mysql_error();
      die($errmsg);
      error_log($errmsg);
    }
  }

  // Function to test if logged in
  function loggedIn() {
    return (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 1);
  }

  // Function to delete rows from shows
  function deleteRow($date) {
    $query = sprintf("DELETE FROM shows WHERE aika = '%s'", mysql_real_escape_string($date));
    $result = mysql_query($query);
    inv_query($result);
  }
?>
