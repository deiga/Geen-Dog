<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php	
	require_once "php/functions.php";
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
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fi" lang="fi">
	<head>
		<title>Roydon - Näyttelyt - <?php echo $year; ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="author" content="Roydon Ky" />
		<meta name="description" content="Näyttelyt, joissa olemme paikalla myymässä kenneltarvikkeita vuonna <?php echo $year; ?>." />
		<meta name="keywords" content=" roydon, kennel tarvikkeet, koira tarvikkeet, koira näyttely" />
		<link rel="stylesheet" type="text/css" href="css/roydon.css" media="all" />
		<link rel="icon" type="image/ico" href="images/favicon.ico" />
		<link rel="shortcut icon" type="image/ico" href="http://roydon.fi/images/favicon.ico" />
		<script type="text/javascript" src="/js/roydon.js"></script>
		<!--[if IE 6]>
			<link rel="stylesheet" type="text/css" href="css/roydon_ie6.css" />
		<![endif]-->
		<!--[if IE 7]>
			<link rel="stylesheet" type="text/css" href="css/roydon_ie7.css" />
		<![endif]-->
		<!--[if lte IE 6]>
			<link rel="stylesheet" type="text/css" href="css/roydon_ie5.css" />
		<![endif]-->
	</head>
	<body onload="curpage()">
		<div id="takala">
			<?php oldBrowse(); ?>
			<div id="otsake">
				<div id="lang">
					<a href="http://roydon.fi/en" title="In English" target="_top">In English</a>
				</div>
				<div id="otsikko">
					<h1>roydon</h1>
					<p>Kenneltarvikkeet</p>
				</div>
				<?php printMenu(0);?>
			</div>
			<div id="sivusisalto">
				<div id="content">
				  <?php if (isset($year)) { ?>
						<table class="pretty-tbl" summary="Taulukko näkymä tulevista näyttelyistä.">
							<caption>Seuraavista näyttelyistä löydät meidät vuonna 
							<?php
							 if ($year == date('Y') ) {
							   if ( date('m') >= 8 ) {
							     echo ($year." - ".($year+1)); 
							   } else echo $year;
							 } else echo $year;  
						  ?>
							:</caption>
							<tr>
								<th scope="col" id="tblTime">Aika</th>
								<th scope="col" id="tblName">Nimi</th>
								<th scope="col" id="tblPlace">Paikka</th>
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
						          	echo "<tr><td headers='tblTime'>".date_conv($row[1], $row[2])."</td>\n<td headers='tblName'><a href='$row[4]'>$row[3]</a></td>\n<td headers='tblPlace'>$row[0]</td></tr>\n";
						    	} else {
						    		echo "<tr class='odd'><td headers='tblTime'>".date_conv($row[1], $row[2])."</td><td headers='tblName'><a href='$row[4]' >$row[3]</a></td><td headers='tblPlace'>$row[0]</td></tr>\n";
						    	}
						    	$even++;
						      }
						      if ($year == date('Y') && date('m') >= 06) {
						     ?>
						     <tr <?php if (!($even % 2)) echo 'class="odd"';$even++; ?>><td headers="tblName" colspan="3"><strong>Menneet näyttelyt tältä vuodelta</strong></td></tr>
						     <?php
						       $result = mysql_query($q2);
        	                   if (!$result) {
                                    die('Invalid query: ' . mysql_error());
	                           }
						          while ($row = mysql_fetch_row($result)) {
						    	   	if ($even % 2) {
						    	   		echo "<tr><td headers='tblTime'>".date_conv($row[1], $row[2])."</td>\n<td headers='tblName'><a href='$row[4]'>$row[3]</a></td>\n<td headers='tblPlace'>$row[0]</td></tr>\n";
						    		} else {
						    			echo "<tr class='odd'><td headers='tblTime'>".date_conv($row[1], $row[2])."</td><td headers='tblName'><a href='$row[4]' >$row[3]</a></td><td headers='tblPlace'>$row[0]</td></tr>\n";
						    	   	}
						    	   	$even++;
						    	  }
						    	  $even = 1;
						      }
						    ?>
						</table>
						<?php } ?>
						<div id="years">
						  <?php yearList(); ?>
						<p>Suomen koiranäyttelyiden ajankohtia ja pitopaikan löydätte <a href="http://www.kennelliitto.fi/FI/toiminta/nayttelyt/kvkr2008/" title="Suomen kennelliiton koiranäyttelysivusto">Suomen kennelliiton</a> sivuilta.</p>
					</div>

				</div>
			</div>
			<?php printFoot();?>
		</div>
	</body>
</html>
<?php
	mysql_close($link);
?>