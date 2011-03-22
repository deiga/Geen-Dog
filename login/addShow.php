<?php
  require_once($_SERVER['DOCUMENT_ROOT']."/php/functions.php");
  
  initSession();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fi" lang="fi">
  <head>
    <title>Ylläpito - Näyttelyn lisääminen</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="author" content="Roydon Ky" />
    <meta name="language" content="fi" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" type="text/css" href="http://roydon.fi/css/roydon.css" media="all" />
    <link rel="icon" type="image/ico" href="http://roydon.fi/images/favicon.ico" />
    <link rel="shortcut icon" type="image/ico" href="http://roydon.fi/images/favicon.ico" />
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
  <body>
    <div id="takala">
      <div id="otsake">
        <div>
          <h1>roydon <br /> <span>Kenneltarvikkeet</span></h1>
        </div>
        <?php printMenu(0);?>
      </div>
      <div id="sivusisalto">
        <section id="content">
          <div class="add">
            <form method="post" action="http://www.roydon.fi/login/addShow.php">
              <fieldset>
                <legend>Näyttelyn lisääminen</legend>
                <label for="nimi">Näyttelyn nimi:</label><input type="text" value="" id="nimi" name="nimi" />
                <label for="paiva">Näyttelyn alkamispäivä:</label><input class="time" type="text" value="Päivä" id="paiva" name="paiva" onfocus="value=''" />
                  <input class="time" type="text" value="<?php echo date('m')?>" name="kk" id="kk" />
                  <input class="time" type="text" id="vuosi" value="<?php echo date('Y')?>"  name="vuosi" />
                <label for="kesto">Näyttelyn kesto:</label><input type="text" value="1" name="kesto" id="kesto" />
                <label for="link">Linkki näyttelyn kotisivuille:</label><input type="text" value="" name="link" id="link" />
                <label for="paikka">Näyttelyn paikkakunta:</label><input type="text" value="" name="paikka" id="paikka" />
                <div id="buttons">
                  <input class="button" type="submit" value="Lähetä" />
                </div>
                <label class="hiddenLabel" for="kk">Kuukausi</label>
                <label class="hiddenLabel" for="vuosi">Vuosi</label>
              </fieldset>
            </form>
            <?php
              $link = connect();
              if (!$link) {
                    $errmsg = 'Could not connect: ' . mysql_error();
                    die($errmsg);
                    error_log($errmsg);
              }
              
              $nimi = $_POST['nimi'];
              $paiva = $_POST['paiva'];
              $kk = $_POST['kk'];
              $vuosi = $_POST['vuosi'];
              $paikka = $_POST['paikka'];
              $link = $_POST['link'];
              $kesto = $_POST['kesto'];
              $tbl = 'shows';
              $db = 'roydonf_roydon';
              $aika = date("Y-m-d", mktime(0,0,0,$kk,$paiva,$vuosi));
              
              inv_db($db);
              
              if (isset($nimi) && isset($paiva) && isset($kesto)) {
                $query = "INSERT INTO $db.$tbl(`paikka` ,`aika` ,`kesto` ,`nimi` ,`link`) VALUES ('$paikka', '$aika', '$kesto', '$nimi', '$link')";
                $result = mysql_query($query);
              }
              if (!$result && isset($result)) {
                 $errmsg = 'Invalid query: ' . mysql_error();
      die($errmsg);
      error_log($errmsg);
              } else if ($result) {
                $_SESSION['msg'] = "Lisäys onnistui!";
                echo "Lisäys onnistui!";
              }             
            ?>
          </div>
          <p id="back">
            <a href="/login" title="Back">&lt;&lt; Takaisin</a>
          </p>
        </div>
      </div>
      <?php printFoot();?>
    </div>
  </body>
</html>