<?php
  require_once $_SERVER['DOCUMENT_ROOT']."/php/functions.php";

  initSession();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Ylläpito - Näyttelyn lisääminen</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="author" content="Roydon Ky" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" type="text/css" href="http://roydon.fi/css/roydon.css" media="all" />
    <link rel="icon" type="image/ico" href="http://roydon.fi/images/favicon.ico" />
    <link rel="shortcut icon" type="image/ico" href="http://roydon.fi/images/favicon.ico" />
    <!--[if IE 7]>
      <link rel="stylesheet" type="text/css" href="http://roydon.fi/css/roydon_ie7.css" />
    <![endif]-->
  </head>
  <body>
    <div id="takala">
      <!-- !HEADER -->
      <div id="otsake" class="shadow">
        <div>
          <h1>roydon <br /> <span>Kenneltarvikkeet</span></h1>
        </div>
        <?php printMenu();?>
      </div>
      <!-- !END HEADER -->
      <!-- !SIVUSISALTO -->
      <div id="sivusisalto" class="shadow">
        <!-- !CONTENT -->
        <section id="content">
          <div class="add">
            <form method="post" action="http://roydon.fi/login/addNews.php">
              <fieldset>
                <legend>Uutisen lisääminen</legend>
                <fieldset>
                  <legend>Suomeksi</legend>
                  <label for="head">Uutisen otsikko:</label><input type="text" value="" name="head" id="head" />
                  <label for="content">Uutisen sisältö:</label><input type="text" value="" id="content" name="content"  />

                </fieldset>
                <fieldset>
                  <legend>Englanniksi</legend>
                  <label for="headEN">Uutisen otsikko:</label><input type="text" value=" " name="headEN" id="headEN" />
                  <label for="contentEN">Uutisen sisältö:</label><input type="text" value=" " name="contentEN" id="contentEN" />
                </fieldset>
                <div id="buttons">
                    <input class="button" type="submit" value="Lähetä" />
                </div>
              </fieldset>
            </form>
            <?php
               $link = connect();
               if (!$link) {
                    $errmsg = 'Could not connect: ' . mysql_error();
                    die($errmsg);
                    error_log($errmsg);
               }

               $topic = mysql_real_escape_string($_POST['head']);
               $topicEN = mysql_real_escape_string($_POST['headEN']);
               $cont = mysql_real_escape_string($_POST['content']);
               $contEN = mysql_real_escape_string($_POST['contentEN']);
               $tbl = 'news';
               $db = 'roydonf_roydon';
               $aika = date("Y-m-d");

               inv_db($db);

               if (isset($topic, $cont) && !empty($topic) && !empty($cont)) {
                    $query = "INSERT INTO $db.$tbl(`date` ,`head` ,`content` ,`headEn` ,`contEn`) VALUES ('$aika', '$topic', '$cont', '$topicEN', '$contEN')";
                    $result = mysql_query($query);
               }

               if (!$result && isset($result)) {
                 $errmsg = 'Invalid query: ' . mysql_error();
      die($errmsg);
      error_log($errmsg);
               } else if ($result ) {
                 $_SESSION['msg'] = "Lisäys onnistui!";
                 echo "Lisäys onnistui!";
               }
            ?>
          </div>
          <p id="back">
           <a href="/login" title="Back">&lt;&lt; Takaisin</a>
          </p>
        </section> <!-- !END CONTENT -->
      </div> <!-- !END SIVUSISALTO -->
      <?php printFoot();?>
    </div>
  </body>
</html>