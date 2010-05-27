<?php	
    require_once "arka.php";

    function initSession() {
        session_start();
        
        if ($_SESSION['loggedIn'] != 1) {
            $_SESSION['loggedIn'] = 0;
        }
    }
	
	function lengthConv($dur) {
		return ($dur-1) * 86400;
	}

	// Function to convert mysql date's into representation of a duration.
	function date_conv($in, $long) {
		
		if ( $long > 1) {
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
	function printMenu($lang = 0) {
  	$year = date('Y');
  	$month = date('m');
		echo "<hr />\n";
		echo "<div id=\"navi\">\n";
		echo "			<ul id='navilist'>\n";
		if ($lang == 1) {
			echo "				<li id='index' class='navilistitem'><a href=\"index.php\" title=\"Homepage\">Homepage</a></li>\n";
			//echo "				<li id='info' class='navilistitem'><a href=\"info.php\" title=\"About Us\">About Us</a></li>\n";
			//echo "				<li id='products' class='navilistitem'><a href=\"products.php\" title=\"Products\">Products</a></li>\n";
			echo "				<li id='shows' class='navilistitem'><a href=\"shows.php?year=$year\" title=\"Attending dogshows\">Dog shows</a></li>\n";
			echo "				<li id='contact' class='navilistitem'><a href=\"contact.php\" title=\"Contact Us\">Contact Us</a></li>\n";
			if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 1) {
    			echo "              <li id='logout' class='navilistitem'><a href=\"/php/logout.php\" title='Logout'>Logout</a></li>\n";
            }
			
		} else if ($lang == 0) {
			echo "				<li id='index' class='navilistitem'><a href=\"/index.php\" title=\"Homepage\">Etusivu</a></li>\n";
			//echo "				<li id='info' class='navilistitem'><a href=\"/info.php\" title=\"About Us\">Esittely</a></li>\n";
			//echo "				<li id='products' class='navilistitem'><a href=\"/products.php\" title=\"Products\">Tuotteet</a></li>\n";
			echo "				<li id='nayttelyt' class='navilistitem'><a href=\"/nayttelyt.php?year=$year\" title=\"Attending dogshows\">N&auml;yttelyt</a></li>\n";
			echo "				<li id='contact' class='navilistitem'><a href=\"/contact.php\" title=\"Contact Us\">Ota Yhteytt&auml;</a></li>\n";
			if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 1) {
    			echo "              <li id='logout' class='navilistitem'><a href=\"/php/logout.php\" title='Logout'>Logout</a></li>\n";
            }
		} else if ($lang == 2) {
			echo "				<li id='home' class='navilistitem'><a href=\"/index.php\" title=\"Homepage\">Etusivu</a></li>\n";
			//echo "				<li id='info' class='navilistitem'><a href=\"../info.php\" title=\"About Us\">Esittely</a></li>\n";
			//echo "				<li id='products' class='navilistitem'><a href=\"../products.php\" title=\"Products\">Tuotteet</a></li>\n";
			echo "				<li id='nayttelyt' class='navilistitem'><a href=\"/nayttelyt.php?year=$year\" title=\"Attending dogshows\">N&auml;yttelyt</a></li>\n";
			echo "				<li id='contact' class='navilistitem'><a href=\"/contact.php\" title=\"Contact Us\">Ota Yhteytt&auml;</a></li>\n";
			if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 1) {
    			echo "              <li id='logout' class='navilistitem'><a href=\"/php/logout.php\" title='Logout'>Logout</a></li>\n";
            }
		}
		echo "			</ul>\n";
		echo "		</div>\n";
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
		Katselette sivustoa vanhentuneella selaimella, olkaa hyv&auml; ja p&auml;ivitt&auml;k&auml;&auml; selaimenne, oman turvallisuutenne vuoksi! Sivustossa saattaa esiinty&auml; virheit&auml; selaimellanne<![endif]--></div>';
	}	

	// Function to print the pages footers, depending on language.
	function printFoot($lang = 0) {
		echo "<div id=\"footer\">\n";
		if ($lang == 1) {
			echo "\tQuestions or comments regarding the site to &#119;&#101;&#098;&#109;&#097;&#115;&#116;&#101;&#114;&#064;&#114;&#111;&#121;&#100;&#111;&#110;&#046;&#102;&#105;<br />Copyright &copy;2008 roydon.fi \n";
		} else if ($lang == 0) {
			echo "\tSivuihin liittyv&auml;t kysymykset ja kommentit &#119;&#101;&#098;&#109;&#097;&#115;&#116;&#101;&#114;&#064;&#114;&#111;&#121;&#100;&#111;&#110;&#046;&#102;&#105; Yll&auml;pidon <a class=\"robots-nocontent\" href=\"/login\">sis&auml;&auml;nkirjaus</a> <br />Copyright &copy;2008 roydon.fi \n";
		}
		echo "</div>\n";
	}
	
	// Function to print link list fo different years
	function yearList($lang = 0) {
	  echo '<ul id="yearslist">';
	  for ($i = 2008; $i <= date('Y'); $i++) { 
      if ($lang == 0) {
		      echo "<li class='ylistI'><a href=\"nayttelyt.php?year=$i\">$i</a></li>";
      } else if ($lang == 1) {
          echo "<li class='ylistI'><a href=\"shows.php?year=$i\">$i</a></li>";
      }
    }
    echo' </ul>';
	}
?>
