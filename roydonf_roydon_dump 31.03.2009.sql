# Sequel Pro dump
# Version 392
# http://code.google.com/p/sequel-pro
#
# Host: deigaserv (MySQL 5.1.31)
# Database: roydonf_roydon
# Generation Time: 2009-03-31 17:23:53 +0300
# ************************************************************

# Dump of table news
# ------------------------------------------------------------

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `date` date NOT NULL DEFAULT '0000-00-00',
  `head` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `headEn` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `contEn` text CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `news` (`date`,`head`,`content`,`headEn`,`contEn`)
VALUES
	('2009-02-04','Sivut ovat valmiit','Tarkempaa tietoa yrityksestä lisätään sivuille ajan saatossa.','The page is ready','We will add more information to the page from time to time'),
	('2008-10-16',' Sivut verkossa','Sivujen sisältö vielä kesken, valmistuminen mahdollisimman pian.',' Pages up','Contents are still under construction. ');



# Dump of table shows
# ------------------------------------------------------------

DROP TABLE IF EXISTS `shows`;

CREATE TABLE `shows` (
  `paikka` varchar(20) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL DEFAULT '',
  `aika` date NOT NULL DEFAULT '0000-00-00',
  `kesto` int(11) NOT NULL DEFAULT '1',
  `nimi` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL DEFAULT '',
  `link` varchar(100) CHARACTER SET utf8 COLLATE utf8_swedish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `shows` (`paikka`,`aika`,`kesto`,`nimi`,`link`)
VALUES
	('Helsinki','2008-08-09',2,'Helsingin Kesänäyttely 2008','http://www.showlink.fi/hkikesanayttely08/'),
	('Kouvola','2008-08-16',1,'Kouvolan kansallinen koiranäyttely','http://personal.inet.fi/yritys/tmi.bebops/kouvola/'),
	('Heinola','2008-08-17',1,'Heinolan kansallinen koiranäyttely','http://personal.inet.fi/yritys/tmi.bebops/heinola/'),
	('Hämeenlinna','2008-08-23',2,'Hämeenlinnan KV','http://www.flatpower.fi/hameenlinnakv08/'),
	('Helsinki','2008-08-30',1,'STJ:n Päänäyttely','http://www.terrierijarjesto.fi/'),
	('Helsinki','2008-09-06',2,'Mastery Syysnäyttely 2008','http://www.showlink.fi/mastery08/'),
	('Porvoo','2008-09-13',2,'Porvoon kansallinen koiranäyttely','http://www.porvoonkoiranayttely.com/'),
	('Hyvinkää','2008-09-20',1,'Hyvinkään ryhmät 1,4-8','http://www.pon.fi/hyvinkaa/index.htm'),
	('Salo','2008-09-28',1,'Salon ryhmät 1, 5','http://tassut.net/ryhmanly.htm'),
	('Hämeenlinna','2008-10-18',2,'Hämeenlinnan ryhmät 1-3,9','http://www.elisanet.fi/~y639322/Nayttelyt/Hameenlinna/'),
	('Helsinki','2008-11-16',1,'Helsingin pentunäyttely','http://www.showringnews.com/umtpentunayttely08.html'),
	('Jyväskylä','2008-11-22',2,'Jyväskylän KV','http://www.jkldogshow.com/'),
	('Helsinki','2008-12-07',1,'Helsingin pentunäyttely','http://www.saunalahti.fi/cockerit/pentunayttely/etusivu.htm'),
	('Helsinki','2008-12-13',2,'Voittaja 2008','http://voittaja.kennelliitto.fi/FI/voittaja2008/etusivu.htm'),
	('Lahti','2008-10-26',1,'Lahden pentunäyttely','http://www.lahdenkayttokoira.fi/'),
	('Helsinki','2008-11-30',1,'Helsingin pentunäyttely','http://www.kiinanharjakoirat.fi/pentunayttely/'),
	(' Turku','2009-01-24',2,'Top Dog Show 2009 ','http://www.saunalahti.fi/~lskp/tds/index.html'),
	('Tampere','2009-03-14',2,'Tampereen KV','http://www.tamperekv.fi/main_fin.html'),
	('Lappeenranta','2009-04-11',3,' Lappeenrannan KV','http://www.pasada.fi/lappeenranta2009/index.htm'),
	('Tampere','2009-02-15',1,'Tampereen ryhmä 2','http://www.showlink.fi/umt_tampere09/'),
	(' Helsinki','2009-02-07',2,'Kaapelitehtaan Pentunäyttely',' http://kotisivuni.org/sites/pentu/index.php?pid=1'),
	(' Lahti','2009-04-25',2,' Lahti KV',' http://www.saunalahti.fi/sskpiiri/kv2009/lahtigroups.htm'),
	(' Helsinki','2009-05-23',2,' Aptus Show','http://www.showlink.fi/aptus09/index.html'),
	('Salo','2009-06-06',2,'Salon koiranäyttely','http://www.showlink.fi/salo09/'),
	('Kotka','2009-06-13',2,'Kotkan Ruusu','http://www.showlink.fi/kotka09/'),
	('Hämeenlinna','2009-06-27',2,'Hämeenlinnan kansallinen koiranäyttely','http://www.elisanet.fi/~y639322/Nayttelyt/Hameenlinna/'),
	('Somero','2009-05-02',1,'Somero Eukanuba Show','http://www.pomppu.com/2009/'),
	('Salo','2009-05-17',1,'Salon ryhmät 1, 3','http://www.tassut.net/ryhmanly.htm'),
	('Helsinki','2009-05-31',1,'Helsingin pentunäyttely','http://kotisivuni.org/sites/pennut/index.php?pid=1');



# Dump of table tuote
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tuote`;

CREATE TABLE `tuote` (
  `nimi` varchar(20) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL DEFAULT '',
  `selite` text CHARACTER SET utf8 COLLATE utf8_swedish_ci,
  `count` int(200) DEFAULT NULL,
  `saatavuus` tinyint(1) DEFAULT NULL,
  `hinta` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL DEFAULT '',
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL DEFAULT '',
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_swedish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `user` (`username`,`password`,`name`)
VALUES
	('loemra','a0b66689cb4a6f74fb79f39e3b802611','Lotta');



