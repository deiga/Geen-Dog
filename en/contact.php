<?php 
  require($_SERVER['DOCUMENT_ROOT'].'/php/functions.php');
  echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Roydon - Contact information</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="author" content="Roydon Ky" />
    <meta name="description" content="Contact information for the company, please don't hesitate to contact us." />
    <meta name="keywords" content="roydon, kennel tarvikkeet, koira tarvikkeet" />
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
        <?php langLink(1); ?>
        <div id="otsikko">
          <h1>roydon</h1>
          <p>Kennelaccessories</p>
        </div>
        <?php printMenu(1);?>
      </div>
      <div id="sivusisalto">
        <section id="content">
          <div>
            <fieldset class="contentfield">
              <legend>Our contact information:</legend>
              <div>
                For general questions: <a href="mailto:&#114;&#111;&#121;&#100;&#111;&#110;&#064;&#114;&#111;&#121;&#100;&#111;&#110;&#046;&#102;&#105;">&#114;&#111;&#121;&#100;&#111;&#110;&#064;&#114;&#111;&#121;&#100;&#111;&#110;&#046;&#102;&#105;</a> <br />
                Product, availability and price questions: <a href="mailto:&#109;&#121;&#121;&#110;&#116;&#105;&#064;&#114;&#111;&#121;&#100;&#111;&#110;&#046;&#102;&#105;">&#109;&#121;&#121;&#110;&#116;&#105;&#064;&#114;&#111;&#121;&#100;&#111;&#110;&#046;&#102;&#105;</a> <br />
                Questions and comments regarding the web page: <a href="mailto:&#119;&#101;&#098;&#109;&#097;&#115;&#116;&#101;&#114;&#064;&#114;&#111;&#121;&#100;&#111;&#110;&#046;&#102;&#105;">&#119;&#101;&#098;&#109;&#097;&#115;&#116;&#101;&#114;&#064;&#114;&#111;&#121;&#100;&#111;&#110;&#046;&#102;&#105;</a> <br />
                By mail: <span>Roydon, Kuninkaantie 752, 07110 HINTHAARA</span> <br />
                By phone or Fax: <span>Tel/Fax: +358 (0)19 54 5304, GSM: +358 (0)400 20 0521</span> <br />
              </div>
            </fieldset>
          </div>
        </div>
      </div>
      <?php printFoot(1);?>
    </div>
  </body>
</html>