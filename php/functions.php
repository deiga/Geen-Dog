<?php
  require_once "arka.php";
  require_once "NotORM.php";

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
  function date_conv($in, $length) {

    if ( $length > 1 ) {
      // $date = new DateTime($in);
      //       $interval = new DateInterval('P' . $length . 'D');
      //       $out = $date->format('d.') . '-';
      //       $out .= $date->add($interval)->format('d.m.');
      $out = date('d.', (strtotime($in)))."-".date('d.m.', (strtotime($in))+lengthConv($length));
    } else {
      //$out = new DateTime($in)->format('d.m.');
      $out = date('d.m.', (strtotime($in)));
    }

    return $out;
  }

  // Function to convert mysql date's into a normal representation.
  function date_conv_short($in) {

    //$out = new DateTime($in)->format('d.m.Y');
    $out = date('d.m.Y', (strtotime($in)));
    return $out;
  }

  // Function to print out the menu of a page. Languages are 0 = Finnish, 1 = English
  function printMenu() {
    $year = date('Y');
    $month = date('m');
    echo "<nav id='navi'>\n";
    echo "      <ul id='navilist'>\n";
      echo "        <li id='index' class='rounded-top'><a href='/index.php' title='Homepage'>" . _('navi.home') . "</a></li>\n";
      //echo "        <li id='info' class='rounded-top'><a href='/info.php' title='About Us'>Esittely</a></li>\n";
      echo "        <li id='products' class='rounded-top'><a href='/products.php' title='Products'>" . _('navi.products') . "</a></li>\n";
      echo "        <li id='nayttelyt' class='rounded-top'><a href='/nayttelyt.php?year=$year' title='Attending dogshows'>" . _('navi.shows') . "</a></li>\n";
      echo "        <li id='contact' class='rounded-top'><a href='/contact.php' title='Contact Us'>" . _('navi.contact') . "</a></li>\n";

    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 1) {
      echo "              <li id='logout' class='rounded-top'><a href='/php/logout.php' title='Logout'>Logout</a></li>\n";
    }
    echo "      </ul>\n";
    echo "</nav>\n";
  }

  // Function to determine if the upcoming show has alreadu begun, if yes display the next show.
  function soonShow($date, $long) {

    // $date = new DateTime($date)->add(new DateInteral('P' . $long . 'D'));
    // $today = $date->format('Y-m-d');
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
  function printFoot() {
    echo "<footer>\n";
    echo "\t" . _('contact.web') . " &#119;&#101;&#098;&#109;&#097;&#115;&#116;&#101;&#114;&#064;&#114;&#111;&#121;&#100;&#111;&#110;&#046;&#102;&#105; <a class='robots-nocontent' href='/login'>" . _('footer.admin') . "</a>";
    echo "<address>";
    echo "Kuninkaantie 752 <br /> FI 07110 HINTHAARA\n <br />";
    echo "+358 (0)40 020 0521";
    echo "</address>";
    echo "Copyright &copy;" . date('Y') . " Roydon Ky \n</footer>\n";
  }

  // Function to print link list fo different years
  function yearList() {
    echo '<ul id="yearslist">';
    $year = date('Y');
    for ($i = 2008; $i <= $year; $i++) {
      echo "<li class='yearLink ylistI";
      if ($i < $year-2) {
        echo " hidden";
      }
      echo "'><a href='nayttelyt.php?year=$i' title='$i'>$i</a></li>" . PHP_EOL;
    }
    echo' </ul>';
  }

  function printTbody($year, $db) {
    if ($year == date('Y') && date('m') >= 06) {
      printUpcomingShows($db);
      echo "<tr>\n";
      echo "\t<td headers='show_name' colspan='4'>\n";
      echo "\t\t<strong>" . _('show.past') . "</strong>\n";
      echo "\t</td>\n";
      echo "</tr>\n";
      printPastShows($db);
    } else {
      printYearsShows($year, $db);
    }
  }

  function printUpcomingShows($db) {
    $year = date('Y');
    $month = date('m');
    $day = date('d');
    $shows = $db->shows()
                ->where("aika > ?", "$year-$month-$day")
                ->order("aika ASC");

    foreach ($shows as $show) {
      printShowRow($show);
    }
  }

  // Function to print shows from the beginning of the year
  function printPastShows($db) {
    $year = date('Y');
    $month = date('m');
    $day = date('d');
    $shows = $db->shows()
                ->where("aika < ?", "$year-$month-$day")
                ->where("aika > ?", "$year-00-00")
                ->order("aika ASC");

    foreach ($shows as $show) {
      printShowRow($show);
    }
  }

  function printYearsShows($year, $db) {
    // echo "<span style='display: none;'>$db</span>";
      $shows = $db->shows()
                  ->where("aika > ?", $year . '-00-00')
                  ->where("aika < ?", $year+1 . '-00-00')
                  ->order("aika ASC");

    foreach ($shows as $show) {
      printShowRow($show);
    }
  }

  // Function to print table rows for shows
  function printShowRow($row) {
    echo "<tr id='$row[aika]'><td headers='show_time'>".date_conv($row['aika'], $row['kesto'])."</td>\n";
    echo "<td headers='show_name'><a href='$row[link]'>$row[nimi]</a></td>\n";
    echo "<td headers='show_place'>$row[paikka]</td>";
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
          echo "  <a href='?lang=fi' rel='alternate' title='" . _('lang.text') . "'>" . _('lang.text') . "</a>\n";
          break;

        default:
          echo "  <a href='?lang=en' rel='alternate' title='" . _('lang.text') . "'>" . _('lang.text') . "</a>\n";
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
