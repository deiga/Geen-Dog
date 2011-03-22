<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
  require_once($_SERVER['DOCUMENT_ROOT']."/php/functions.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fi" lang="fi">
  <head>
    <title>Roydon - Tuotteet</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="author" content="Roydon Ky" />
    <meta name="language" content="fi" />
    <meta name="description" content="Listaus osasta kenneltarvikkeista, joita myymme. Varastotilanteita ei ilmoiteta, ottakaa yhteyttä ja kysykää" />
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
        <section id="content" class="products">
          <header>
            <h2>Tuotteet</h2>
            <nav>
              <ul id="prod-navi">
                <li><a href="">Turkinhoitoaineet</a></li>
                <li><a href="">Turkinhoitotarvikkeet</a></li>
                <li><a href="">Koulutus</a></li>
                <li><a href="">Syötävät</a></li>
                <li><a href="">Makupalat</a></li>
                <li><a href="">Taluttimet,&nbsp;pannat&nbsp;ja&nbsp;valjaat</a></li>
                <li><a href="">Häkit&nbsp;ja&nbsp;makuualustat,&nbsp;trimmauspöydät</a></li>
                <li><a href="">Lelut</a></li>
                <li><a href="">Muut&nbsp;tuotteet</a></li>
              </ul>
            </nav>
          </header>
          <section>
            <h3>Turkinhoitoaineet</h3>
            <ul>
              <li>Kelco</li>
              <li>Bio Groom</li>
              <li>Ring 5</li>
              <li>#1 All systems</li>
              <li>Wild Animal</li>
              <li>Groomer</li>
              <li>Vellus</li>
              <li>Chris Christensen</li>
              <li>Kotimainen Turvashampoo</li>
              <li>KW</li>
              <li>Coat Handler</li>
              <li>Groomer's Edge</li>
              <li>(Pet Silk, Gottlieb)</li>
              <li>Leewards</li>
            </ul>
          </section>
          <section>
            <h3>Turkinhoitotarvikkeet</h3>
            <ul>
              <li>Mars trimmipuukot</li>
              <li>Pearson trimmipuukot</li>
              <li>Mack Knife trimmipuukot</li>
              <li>Mc Clellan  trimmipuukot</li>
              <li>Mikki trimmipuukot</li>
              <li>Laaja valikoima harjoja, kampoja, karstoja, haroja ja skrapoja</li>
              <li>Madan harjat</li>
              <li>Eicker, Rose Line,</li>
              <li>Furminator-pohjavillapoistaja</li>
              <li>Trimmikivet ja trimmiraspit</li>
              <li>Moser-trimmikoneet</li>
            </ul>
          </section>
          <section>
            <h3>Koulutus</h3>
            <ul>
              <li>Laadukkaat dummyt (250g-2,5 kg), vesidummyt</li>
              <li>Gappayn patukat, purutyynyt ja narupallot</li>
              <li>Kaninkarvadamit, -vuodat, -kiekot</li>
              <li>Laadukkaat tavi- ja sorsadamit noutajille</li>
              <li>Jälkivaljaat, jälkiliinat (nahka, grip, nylon, kelluva, muovitettu)</li>
              <li>Hakurullat, esineet</li>
              <li>Pillit</li>
              <li>Puiset ja metalliset noutokapulat</li>
            </ul>
          </section>
          <section>
            <h3>Syötävät</h3>
            <ul>
              <li>Naudan ja possun puruluut</li>
              <li>Kotimaiset Ariston hirviluut</li>
              <li>Kotimaiset Ariston puruluut</li>
              <li>Kotimaiset paistetut naudan, possun ja poron luut</li>
              <li>Kasvisluut</li>
              <li>Naudan kuivaliha</li>
              <li>Monenlaiset keksit, myös vehnättömät</li>
              <li>Kuivattu maha ja keuhko</li>
              <li>Possunkorvat</li>
              <li>Siansaparot</li>
            </ul>
          </section>
          <section>
            <h3>Makupalat</h3>
            <ul>
              <li>Frolic</li>
              <li>Natural Menu</li>
              <li>Dogman makupalat</li>
              <li>Racinel-täyterullat</li>
              <li>Snackie</li>
              <li>Maksapalat</li>
              <li>Maksaherkku</li>
              <li>Coachies</li>
              <li>Bogados</li>
              <li>Vitacraft-lihatikut</li>
              <li>Racinel makupalat</li>
            </ul>
          </section>

          <section>
            <h3>Taluttimet, pannat ja valjaat</h3>
            <ul>
              <li>Itse valmistetut nahkahihnat, 1- ja 2-lukkoiset</li>
              <li>Erittäin laaja valikoima itse valmistettuja nylonhihnoja näyttelyihin ja kotikäyttöön
                <ul>
                  <li>useita eri värejä, pituuksia, leveyksiä/paksuuksia, myös heijastimella</li>
                </ul></li>
              <li>Eripaksuiset ja -väriset noutajahihnat</li>
              <li>Resco-näyttelytaluttimet</li>
              <li>Jakajat</li>
              <li>Flexit</li>
              <li>Solkipannat</li>
              <li>Täyskuristavat pannat</li>
              <li>Puolikuristavat pannat</li>
              <li>Klipsipannat</li>
              <li>Fleecepannat</li>
              <li>Erilaiset ketjut</li>
              <li>Snake-ketjupannat näyttelyyn</li>
              <li>Vinttikoirapannat</li>
              <li>Laadukkaat Handler's näyttelyhihnat</li>
            </ul>
          </section>
          <section>
            <h3>Häkit ja makuualustat, trimmauspöydät</h3>
            <ul>
              <li>Savic metallihäkit, myös automalli</li>
              <li>Laadukkaat kevythäkit</li>
              <li>Quiet Time pedit</li>
              <li>Kumi- ja liimapohjaiset karva-alustat</li>
              <li>Vetoalustat</li>
              <li>Erikokoiset trimmauspöydät, trimmaustelineet</li>
            </ul>
          </section>
          <section>
            <h3>Lelut</h3>
            <ul>
              <li>Puuhapallot</li>
              <li>Kestävät everlastingpallot</li>
              <li>Kestävät Romp n' roll ja ?? pallot</li>
              <li>Hyvä valikoima lateksi-, pehmo-, vinyyli- ja kumileluja</li>
              <li>Vesilelut</li>
              <li>Vinkuvat karvahiiret</li>
              <li>PIenet kehälelut</li>
              <li>Laaja valikoima punottuja köysileluja ja erilaisia narupalloja</li>
            </ul>
          </section>
          <section>
            <h3>Muut tuotteet</h3>
            <ul>
              <li>Metalliset ruokakupit reunalla ja ilman</li>
              <li>Metalliset pentubaarit</li>
              <li>Mason Cash keraamiset kupit (myös spanielimalli)</li>
              <li>Kuviolliset keraamiset kupit</li>
              <li>Muoviset kupit</li>
              <li>Waterwell kipot</li>
              <li>Häkkikipot, koukku-/ruuvikiinnitys</li>
              <li>Juomaämpärit</li>
              <li>Juoksupöksyt</li>
              <li>Turvavyövaljaat</li>
              <li>Hiihtovyöt</li>
              <li>Heijastinliivit</li>
              <li>Huomiotuotteet</li>
              <li>Pelastusliivit</li>
              <li>Numerolappupidikkeet</li>
              <li>Makupalapussit</li>
              <li>Haukunestopannat</li>
              <li>Kuonokopat ja kuonopannat</li>
            </ul>
          </section>
        </section>
      </div>
      <?php printFoot();?>
    </div>
  </body>
</html>