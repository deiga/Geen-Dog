<?php
  require_once $_SERVER['DOCUMENT_ROOT']."/php/functions.php";

  initSession('login');
  locale($_GET['lang']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fi" lang="fi">
  <head>
    <title>Roydon - Ylläpito - Sisäänkirjaus</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="author" content="Roydon Ky" />
    <meta name="language" content="fi" />
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
    <script type="text/javascript" src="/js/roydon.js"></script>
  </head>
  <body >
    <div id="takala">
      <div id="otsake" class="shadow">
        <div id="otsikko">
          <h1>roydon</h1>
          <p>Kenneltarvikkeet</p>
        </div>
        <?php printMenu();?>
      </div>
      <div id="login">
        <section id="content">
            <div id="logTex">
              <h2>Ylläpito</h2>
              <p>Jos haluat ylläpitää sivuston sisältöä kirjaudu omilla tunnuksillasi tänne.
               <br />Jos taasen et tiedä tunnuksia ota yhteyttä ylläpitoon.
               <br />Jos sinulla ei ole tunnuksia, eikä kuuluisi ollakkaan, sitten ehdotan siirtymään meidän etusivulle.
                    </p>
            </div>
            <form id="loginform" action="http://roydon.fi/php/login.php" method="post">
              <fieldset class="contentfield">
                <legend>Login</legend>
                <table id="logintbl">
                  <tr>
                     <td>
                         <label for="user">Tunnus:</label>
                         <input type="text" value="Username" size="15" id="user" name="user" onfocus="this.value=''" />
                     </td>
                    </tr>
                  <tr>
                     <td>
                         <label for="passwd">Salasana:</label>
                         <input type="password" value="Password" size="15" id="passwd" name="passwd" onfocus="this.value=''" />
                     </td>
                    </tr>
                  <tr>
                     <td align='right'><input type="submit" value="OK" /></td>
                     </tr>
                </table>
              </fieldset>
            </form>

        </section>
      </div>
      <?php printFoot();?>
    </div>
  </body>
</html>