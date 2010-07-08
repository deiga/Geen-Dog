<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php	
	require($_SERVER['DOCUMENT_ROOT'].'/php/functions.php');
	$link = connect();
	if (!$link) {
    		die('Could not connect: ' . mysql_error());
	}
	$year = $_REQUEST['year'];
	$db = 'roydonf_roydon';
	$q = date_query($year);
	$q1 = $q[1];
    $q2 = $q[2];
	
	$db_selected = mysql_select_db($db);
	if (!$db_selected) {
  	  die ("Can\'t use '$db' : " . mysql_error());
	}	
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
				<div id="lang">
					<a href="http://roydon.fi/" title="Suomeksi" target="_top">Suomeksi</a>
				</div>
				<div id="otsikko">
					<h1>roydon</h1>
					<p>Kennelaccessories</p>
				</div>
				<?php printMenu(1);?>
			</div>
			<div id="sivusisalto">
				<div id="content">
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
							<tr>
								<th scope="col" id="tblTime">Time</th>
								<th scope="col" id="tblName">Name</th>
								<th scope="col" id="tblPlace">Place</th>
							</tr>
						<?php
						  
						  if ($year == date('Y') && date('m') >= 06) {
						    $result = mysql_query($q1);
						  } else $result = mysql_query($q);
						  
	            if (!$result) {
              	  die('Invalid query: ' . mysql_error());
	            }

							$even = 1;
							while ($row = mysql_fetch_row($result)) {
								if ($even % 2) {
									/*
echo "<tr><td>".date_conv($row[1], $row[2])."</td><td><a href='$row[4]'>$row[3]</a></td><td>$row[0]</td></tr>\n";
								} else {
									echo "<tr class='odd'><td>".date_conv($row[1], $row[2])."</td><td><a href='$row[4]' >$row[3]</a></td><td>$row[0]</td></tr>\n";
*/echo "<tr><td headers='tblTime'>".date_conv($row[1], $row[2])."</td>\n<td headers='tblName'><a href='$row[4]'>$row[3]</a></td>\n<td headers='tblPlace'>$row[0]</td></tr>\n";
						    		} else {
						    			echo "<tr class='odd'><td headers='tblTime'>".date_conv($row[1], $row[2])."</td><td headers='tblName'><a href='$row[4]' >$row[3]</a></td><td headers='tblPlace'>$row[0]</td></tr>\n";
								}
								$even++;
							}
							$even = 1;
							
							if ($year == date('Y') && date('m') >= 06) {
						?>
						  <tr <?php if (!($even % 2)) echo 'class="odd"';$even++; ?>><td headers="tblName" colspan="3"><strong>Past shows this year</strong></td></tr>
						<?php
						  $result = mysql_query($q2);
	            if (!$result) {
              	  die('Invalid query: ' . mysql_error());
	            }
							   while ($row = mysql_fetch_row($result)) {
							   	if ($even % 2) {
							   		/*
echo "<tr><td>".date_conv($row[1], $row[2])."</td><td><a href='$row[4]'>$row[3]</a></td><td>$row[0]</td></tr>\n";
							   	} else {
							   		echo "<tr class='odd'><td>".date_conv($row[1], $row[2])."</td><td><a href='$row[4]' >$row[3]</a></td><td>$row[0]</td></tr>\n";
*/echo "<tr><td headers='tblTime'>".date_conv($row[1], $row[2])."</td>\n<td headers='tblName'><a href='$row[4]'>$row[3]</a></td>\n<td headers='tblPlace'>$row[0]</td></tr>\n";
						    		} else {
						    			echo "<tr class='odd'><td headers='tblTime'>".date_conv($row[1], $row[2])."</td><td headers='tblName'><a href='$row[4]' >$row[3]</a></td><td headers='tblPlace'>$row[0]</td></tr>\n";
							   	}
							   	$even++;
							   }
							   $even = 1;
						  }
						?>
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