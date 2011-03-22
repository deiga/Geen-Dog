<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
  require_once($_SERVER['DOCUMENT_ROOT']."/php/functions.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Roydon - Yhteystiedot</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="author" content="Roydon Ky" />
    <meta name="language" content="fi" />
    <meta name="description" content="Näyttelyitä kiertävä kenneltarvikeliike. Ohjeet meidän kiinnisaamiseksi." />
    <meta name="keywords" content=" roydon, kennel tarvikkeet, koira tarvikkeet" />
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
      <div id="otsake" class="shadow">
        <?php langLink(0); ?>
        <div id="otsikko">
          <h1>roydon</h1>
          <p>Kenneltarvikkeet</p>
        </div>
        <?php printMenu(0);?>
      </div>
      <div id="sivusisalto" class="shadow">
        <section id="content">
          <div>
            <fieldset class="contentfield">
              <legend>Meihin saat yhteyden:</legend>
              <address>
                Yleiset kysymykset: <a href="mailto:&#114;&#111;&#121;&#100;&#111;&#110;&#064;&#114;&#111;&#121;&#100;&#111;&#110;&#046;&#102;&#105;">&#114;&#111;&#121;&#100;&#111;&#110;&#064;&#114;&#111;&#121;&#100;&#111;&#110;&#046;&#102;&#105;</a> <br />
                Tuote-, saatavuus- ja hintakyselyt: <a href="mailto:&#109;&#121;&#121;&#110;&#116;&#105;&#064;&#114;&#111;&#121;&#100;&#111;&#110;&#046;&#102;&#105;">&#109;&#121;&#121;&#110;&#116;&#105;&#064;&#114;&#111;&#121;&#100;&#111;&#110;&#046;&#102;&#105;</a> <br />
                Sivuihin liittyvät kysymykset ja kommentit: <a href="mailto:&#119;&#101;&#098;&#109;&#097;&#115;&#116;&#101;&#114;&#064;&#114;&#111;&#121;&#100;&#111;&#110;&#046;&#102;&#105;">&#119;&#101;&#098;&#109;&#097;&#115;&#116;&#101;&#114;&#064;&#114;&#111;&#121;&#100;&#111;&#110;&#046;&#102;&#105;</a> <br />
                                                Postitse: <span>Roydon, Kuninkaantie 752, 07110 HINTHAARA</span> <br />
                                                Puhelimella: <span>+358 (0)40 020 0521</span> <br />
              </address>
            </fieldset>
          </div>
        </div>
      </div>
      <?php printFoot();?>
    </div>
  </body>
</html>