-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 16, 2018 at 02:09 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pfa`
--

-- --------------------------------------------------------

--
-- Table structure for table `actualites`
--

DROP TABLE IF EXISTS `actualites`;
CREATE TABLE IF NOT EXISTS `actualites` (
  `idAct` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titreAct` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sujAct` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `corpAct` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ImgAct` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `festivale_idFes` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idAct`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `actualites`
--

INSERT INTO `actualites` (`idAct`, `titreAct`, `sujAct`, `corpAct`, `ImgAct`, `festivale_idFes`, `created_at`, `updated_at`) VALUES
(1, 'Majda el roumi', 'Majda el roumi', '<p>Nous vous proposons une large gamme de produits de communication comme cartes de visite, cr&eacute;ation de logo, cr&eacute;ation des affiches publicitaires, brochures, et la cr&eacute;ation des flyers qui servent de distribuer ou de d&eacute;poser vos publications dans des endroits de passage pour promouvoir un &eacute;v&eacute;nement o&ugrave; les services de votre entreprise qui sont configurables lors du choix de chaque produit tout cela avec un grand panel de qualit&eacute; de papiers, formats et finitions. Nos sp&eacute;cialistes du web design assurent des cr&eacute;ations graphiques &agrave; fort impact visuel.</p>', 'imgbox1_1540809765.jpg', 1, '2018-10-29 09:42:45', '2018-10-29 09:42:45'),
(2, 'Majda el roumi', 'Majda el roumi', '<p>Today we&rsquo;d like to share a Masonry-powered grid layout with you that has a motion hover effect on the items and a content preview that is scrollable. Once a grid item is clicked, we animate the image to the center of the page and scale it up. The background of the item also scales up, filling the whole page and forming the new background of the content preview. The content preview is scrollable, with some more text showing beneath the image. The animations are powered by&nbsp;<a href=\"https://greensock.com/tweenmax\">TweenMax</a>.</p>', 'imgbox3_1540809852.jpg', 1, '2018-10-29 09:44:12', '2018-10-29 09:44:12'),
(4, 'Majda el roumi', 'Majda el roumi', '<p>Today we&rsquo;d like to share a Masonry-powered grid layout with you that has a motion hover effect on the items and a content preview that is scrollable. Once a grid item is clicked, we animate the image to the center of the page and scale it up. The background of the item also scales up, filling the whole page and forming the new background of the content preview. The content preview is scrollable, with some more text showing beneath the image. The animations are powered by&nbsp;<a href=\"https://greensock.com/tweenmax\">TweenMax</a>.</p>', 'imgbox3_1540809874.jpg', 1, '2018-10-29 09:44:34', '2018-10-29 09:44:34');

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

DROP TABLE IF EXISTS `artists`;
CREATE TABLE IF NOT EXISTS `artists` (
  `idArt` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `NomArt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PrenomArt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DesArt` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ImgArt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idArt`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`idArt`, `NomArt`, `PrenomArt`, `DesArt`, `ImgArt`, `created_at`, `updated_at`) VALUES
(1, 'lotfi', 'Lotfi Bouchnak', 'Lotfi Bouchnak également orthographié Lotfi Bouchnaq, né le 18 janvier 1954 à Tunis, est un chanteur, oudiste et compositeurtunisien élève de La Rachidia. Il est également ambassadeur de la paix auprès de l\'ONU depuis le 12 juillet 2004 et ambassadeur honorifique du Festival de la chanson orientale à Sarajevo depuis mars 2004.', '1_1538159587_1540664997.jpg', '2018-10-27 16:29:57', '2018-10-28 10:47:24'),
(2, 'Lamine', 'Nahdi', 'Lamine Nahdi né le 25 avril 1950 au Kef, est un acteur tunisien actif aussi bien au cinéma qu\'au théâtre.Il joue notamment au Théâtre régional du Kef.En mars 2014, il fait la couverture du magazine people Tunivisions.', 'le temps- Lamine Nahdi_1540669553.jpg', '2018-10-27 17:45:53', '2018-10-27 17:45:53'),
(3, 'Samir', 'Loussif', 'Samir Loussif est un chanteur tunisien de variétés qui se spécialise dans la chanson populaire et le Mezzouad,', 'samir-lousssif_1540669742.jpg', '2018-10-27 17:49:02', '2018-10-27 17:49:02'),
(4, 'Hedi', 'Donia', 'Hedi Donia est l’un des piliers de la musique populaire tunisienne. Hady Donia trouve avec ses chansons un grand succès. Parmi ses meilleurs titres : ‘Chilni mel adrak’, ’ Ajjebine assaba’.', 'maxresdefault_1540669859.jpg', '2018-10-27 17:50:59', '2018-10-27 17:50:59'),
(5, 'Cheb', 'salim', 'Cheb salim est un chanteur tunisien du mezoued. Cheb salim est doté d\'une belle voix et propose des tubes de qualité. Cheb salim a gagné une forte notoriété. Parmi les chansons les plus populaires : Ana mardi tawel, El horma w nif et Jibou el hana.', 'CoZF-ZMWcAAb5iv_1540669967.jpg', '2018-10-27 17:52:47', '2018-10-27 17:52:47'),
(6, 'Sami', 'Lajmi', 'Sami Lajmi est compositeur, pianiste, arrangeur, sound designer, enseignant universitaire et musicologue.', '11034363_441463699340385_1288987607859096399_o_1540670602.jpg', '2018-10-27 18:03:22', '2018-10-27 18:03:22'),
(7, 'Nassif', 'Zeitoun', 'galement surnommé « Abou Elias », né le 25 Septembre 1988, est un chanteur syrien. Nassif est un artiste passionné par la musique depuis son enfance. Afin de parfaire son talent, il a fréquenté l’Institut Supérieur de Musique et des Arts.', 'Capture_1540670846.PNG', '2018-10-27 18:07:26', '2018-10-27 18:07:26'),
(8, 'Master', 'Sina', 'un jeune rappeur tunisian qui aura un succés a l\'italie et au tunisie et maghreb arab', 'Capture_1540671119.PNG', '2018-10-27 18:11:59', '2018-10-27 18:11:59'),
(9, 'Ragheb', 'Alama', 'Ragheb Alama né le 7 juin 19621 à Beyrouth2, est un chanteur et compositeur libannais, une personnalité de la télévision, et un philanthrope1. Ragheb Alama a commencé sa carrière dans les années 1980 quand il est apparu à l\'émission télédiffusée Studio El Fan, où il été primé du prix Platinum.', 'RaghebAlama_1540671313.jpg', '2018-10-27 18:15:13', '2018-10-27 18:15:13'),
(10, 'Riyath', 'Chebi', 'un acteur tunisian de sfax spécialisé au art tradutional', 'e77c42b294824a0fd96615ce3f0632e4_XL_1540671518.jpg', '2018-10-27 18:18:38', '2018-10-27 18:18:59'),
(11, 'Yosra', 'Mahnouch', 'Elle participe en 2007 à la quatrième saison de l\'émission SuperStar, diffusée sur la chaîne libanaise Future TV, et termine à la troisième place. Cinq ans plus tard, elle participe à la première saison de l\'émission The Voice Ahla Sawt diffusée sur MBC 1, intégrant l\'équipe de Kadhem Saher et terminant à la deuxième place du concours.', '___www_maghrebspace_net__15062015140202_283Yosra mahnouch_1540671622.jpg', '2018-10-27 18:20:22', '2018-10-27 18:20:22'),
(12, 'Karim', 'Gharbi', 'Karim Gharbi né le 5 Septembre 1990, est un acteur et humoriste tunisien. Il a commencé sa carrière en tant que chroniqueur de l’émission « Labess » de Noufel Ouerteni, sur la chaîne privée El Hiwar Ettounsi, d’où il a fait le buzz avec ses sketchs. Karim a participé à l’animation de l’émission “Oumour Jiddya” et a joué le rôle principal du feuilleton “denia okhra”.', 'photo_6001_20054004_1540671736.jpg', '2018-10-27 18:22:16', '2018-10-27 18:22:16'),
(13, 'Hassen', 'Doss', 'Il est chanteur, acteur, compositeur, parolier, réalisateur, producteur et romancier. Sa carrière artistique a débuté en 2014. Son enthousiasme, son travail acharné et sa passion pour la musique et le jeu d\'acteur ont fait de lui le chanteur le plus prometteur de Tunsia & Africa en 3 ans. Son premier album \"Tayer\" signifie voler. Hassen Doss a écrit toutes ses chansons et il combine\r\nOthenticity créativité et moderne.', 'kkjho_1540729200.jpg', '2018-10-27 18:27:09', '2018-10-28 11:20:00'),
(14, 'Ziad', 'Burji', 'Il a débuté sa carrière en 1996, est diplômé de la Faculté des sciences modernes de Beyrouth et a été le premier à apparaître à l\'écran à la galerie d\'art de la BBC en 1996, où il a reçu la médaille d\'or. C\'est une invitation de Mme Fairouz après avoir écouté sa voix et chanté \"Ihawak sans espoir\".', '6048302_1507217019_1540672133.jpg', '2018-10-27 18:28:53', '2018-10-27 18:28:53'),
(15, 'bashir', 'ahmed bij', 'le leader de Bande chouck salatin el tarab', 'download_1540672509.jpg', '2018-10-27 18:35:09', '2018-10-27 18:35:09'),
(16, 'Mohamed Salah', 'Balti', 'Balti ou Baltiroshima, de son vrai nom Mohamed Salah Balti, né le 10 avril 1980, est un rappeur et compositeur tunisien.', 'maxresdefault_1540672684.jpg', '2018-10-27 18:38:04', '2018-10-27 18:38:04'),
(17, 'hmida', 'jaray', 'le leader de el madha hathret rjel tounis', 'maxresdefault_1540673265.jpg', '2018-10-27 18:47:45', '2018-10-27 18:47:45'),
(18, 'saber', 'rebai', 'Saber Rebaï born 13 March 1967; transliteration: is a Tunisian pan-Arab singer and composer. He is known for his song \"Sidi Mansour\". Some albums carry the variant transliteration  He has been signed since 2004 to the pan-Arab record label Rotana.', 'maxresdefault_1540673356.jpg', '2018-10-27 18:49:16', '2018-10-27 18:49:16');

-- --------------------------------------------------------

--
-- Table structure for table `festivales`
--

DROP TABLE IF EXISTS `festivales`;
CREATE TABLE IF NOT EXISTS `festivales` (
  `idFes` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomFes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tourFes` int(11) NOT NULL,
  `dateDebFes` date NOT NULL,
  `dateFinFes` date NOT NULL,
  `adrFes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telFes` int(255) NOT NULL,
  `mailFes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coverFesImg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logoFesImg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selectedFes` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idFes`),
  UNIQUE KEY `festivales_nomfes_tourfes_unique` (`nomFes`,`tourFes`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `festivales`
--

INSERT INTO `festivales` (`idFes`, `nomFes`, `tourFes`, `dateDebFes`, `dateFinFes`, `adrFes`, `telFes`, `mailFes`, `coverFesImg`, `logoFesImg`, `selectedFes`, `created_at`, `updated_at`) VALUES
(1, 'FESTIVALE DE SFAX', 40, '2018-07-07', '2018-08-16', 'Route Sidi Mansour Km 4.5  ,Sfax', 23180613, 'fest-sfax@gmail.com', 'sd_1540655372.jpg', 'home-logo_1540655372.png', 1, '2018-10-27 13:44:32', '2018-10-27 13:49:32'),
(2, 'FESTIVALE CARTHAGE', 54, '2018-10-17', '2018-11-17', 'carthage  ,tunisie', 23352445, 'fest-cart@gmail.com', '', '', 0, '2018-10-27 13:44:32', '2018-10-27 13:44:32'),
(3, 'FESTIVALE GABES', 33, '2018-11-10', '2018-12-10', 'Gabes', 12345678, 'fes-gabes@gmail.com', 'logo_1541846831.png', 'logo_1541846831.png', 0, '2018-11-10 09:47:11', '2018-11-10 09:47:11');

-- --------------------------------------------------------

--
-- Table structure for table `festivale_music`
--

DROP TABLE IF EXISTS `festivale_music`;
CREATE TABLE IF NOT EXISTS `festivale_music` (
  `idFMu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `festivale_idFes` int(11) NOT NULL,
  `music_idMu` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idFMu`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `festivale_music`
--

INSERT INTO `festivale_music` (`idFMu`, `festivale_idFes`, `music_idMu`, `created_at`, `updated_at`) VALUES
(3, 1, 3, '2018-11-10 13:11:31', '2018-11-10 13:11:31');

-- --------------------------------------------------------

--
-- Table structure for table `festivale_part_media`
--

DROP TABLE IF EXISTS `festivale_part_media`;
CREATE TABLE IF NOT EXISTS `festivale_part_media` (
  `idFp` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `festivale_idFes` int(11) NOT NULL,
  `part_media_idPm` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idFp`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `festivale_part_media`
--

INSERT INTO `festivale_part_media` (`idFp`, `festivale_idFes`, `part_media_idPm`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-10-27 14:32:48', '2018-10-27 14:32:48'),
(2, 1, 2, '2018-10-27 14:32:48', '2018-10-27 14:32:48'),
(3, 1, 3, '2018-10-27 14:32:48', '2018-10-27 14:32:48'),
(4, 1, 4, '2018-10-27 14:43:25', '2018-10-27 14:43:25'),
(5, 1, 5, '2018-10-27 14:43:25', '2018-10-27 14:43:25'),
(6, 1, 6, '2018-10-27 14:43:25', '2018-10-27 14:43:25'),
(7, 1, 7, '2018-10-27 14:43:25', '2018-10-27 14:43:25'),
(8, 1, 8, '2018-10-27 14:43:25', '2018-10-27 14:43:25'),
(9, 1, 9, '2018-10-27 14:43:25', '2018-10-27 14:43:25'),
(10, 1, 10, '2018-10-27 14:43:25', '2018-10-27 14:43:25'),
(11, 1, 11, '2018-10-27 14:43:25', '2018-10-27 14:43:25'),
(12, 1, 12, '2018-10-27 14:43:25', '2018-10-27 14:43:25');

-- --------------------------------------------------------

--
-- Table structure for table `festivale_point_vente`
--

DROP TABLE IF EXISTS `festivale_point_vente`;
CREATE TABLE IF NOT EXISTS `festivale_point_vente` (
  `idFpv` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `festivale_idFes` int(11) NOT NULL,
  `point_vente_idPv` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idFpv`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `festivale_point_vente`
--

INSERT INTO `festivale_point_vente` (`idFpv`, `festivale_idFes`, `point_vente_idPv`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-10-27 15:40:43', '2018-10-27 15:40:43'),
(2, 1, 2, '2018-10-27 15:51:11', '2018-10-27 15:51:11'),
(3, 1, 3, '2018-10-27 15:51:11', '2018-10-27 15:51:11');

-- --------------------------------------------------------

--
-- Table structure for table `festivale_sponseur`
--

DROP TABLE IF EXISTS `festivale_sponseur`;
CREATE TABLE IF NOT EXISTS `festivale_sponseur` (
  `idSa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `festivale_idFes` int(11) NOT NULL,
  `sponseur_idSpon` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idSa`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `festivale_sponseur`
--

INSERT INTO `festivale_sponseur` (`idSa`, `festivale_idFes`, `sponseur_idSpon`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-10-27 13:54:59', '2018-10-27 13:54:59'),
(2, 1, 2, '2018-10-27 14:04:32', '2018-10-27 14:04:32'),
(3, 1, 3, '2018-10-27 14:04:32', '2018-10-27 14:04:32'),
(4, 1, 4, '2018-10-27 14:04:32', '2018-10-27 14:04:32'),
(5, 1, 5, '2018-10-27 14:04:32', '2018-10-27 14:04:32'),
(6, 1, 6, '2018-10-27 14:04:32', '2018-10-27 14:04:32'),
(7, 1, 7, '2018-10-27 14:04:32', '2018-10-27 14:04:32'),
(8, 1, 8, '2018-10-27 14:04:32', '2018-10-27 14:04:32'),
(9, 1, 9, '2018-10-27 14:04:32', '2018-10-27 14:04:32'),
(10, 1, 10, '2018-10-27 14:15:05', '2018-10-27 14:15:05'),
(11, 1, 11, '2018-10-27 14:15:05', '2018-10-27 14:15:05'),
(12, 1, 12, '2018-10-27 14:15:05', '2018-10-27 14:15:05'),
(13, 1, 13, '2018-10-27 14:20:20', '2018-10-27 14:20:20'),
(14, 1, 14, '2018-10-27 14:20:20', '2018-10-27 14:20:20'),
(15, 1, 15, '2018-10-27 14:20:20', '2018-10-27 14:20:20'),
(16, 1, 16, '2018-10-27 14:20:20', '2018-10-27 14:20:20'),
(17, 2, 1, '2018-10-27 14:22:08', '2018-10-27 14:22:08'),
(18, 1, 17, '2018-10-27 14:23:38', '2018-10-27 14:23:38'),
(19, 1, 18, '2018-10-27 14:25:50', '2018-10-27 14:25:50');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `musics`
--

DROP TABLE IF EXISTS `musics`;
CREATE TABLE IF NOT EXISTS `musics` (
  `idMu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libMu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `musicLink` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idMu`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `musics`
--

INSERT INTO `musics` (`idMu`, `libMu`, `musicLink`, `created_at`, `updated_at`) VALUES
(3, 'river flow in you', 'yiruma-river-flows-in-you_1541859085.mp3', '2018-11-10 13:11:25', '2018-11-10 13:11:25');

-- --------------------------------------------------------

--
-- Table structure for table `partmedias`
--

DROP TABLE IF EXISTS `partmedias`;
CREATE TABLE IF NOT EXISTS `partmedias` (
  `idPm` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomPm` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sitePm` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PmImg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idPm`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partmedias`
--

INSERT INTO `partmedias` (`idPm`, `nomPm`, `sitePm`, `PmImg`, `created_at`, `updated_at`) VALUES
(1, 'tv national 1', 'http://www.watania1.tn', '3-1_1540659122.png', '2018-10-27 14:30:27', '2018-10-27 14:52:03'),
(2, 'tv national 2', 'http://www.watania2.tn', '3-2_1540657851.png', '2018-10-27 14:30:51', '2018-10-27 14:30:51'),
(3, 'radio national tunisie', 'http://www.radionationale.tn', '1_1540658057.png', '2018-10-27 14:31:55', '2018-10-27 14:34:17'),
(4, 'tv tunisienne', 'http://www.watania1.tn', '3_1540658113.png', '2018-10-27 14:35:13', '2018-10-27 14:35:13'),
(5, 'Tunivisions', 'https://tunivisions.net', '5_1540658164.png', '2018-10-27 14:36:04', '2018-10-27 14:36:04'),
(6, 'radio sfax', 'http://www.radiosfax.tn', '4-1_1540658236.png', '2018-10-27 14:37:16', '2018-10-27 14:37:16'),
(7, 'diwan fm', 'http://www.diwanfm.net', 'logo_1540658280.png', '2018-10-27 14:38:00', '2018-10-27 14:38:00'),
(8, 'linstant-m', 'http://www.linstant-m.tn', '6_1540658330.png', '2018-10-27 14:38:50', '2018-10-27 14:38:50'),
(9, 'leaders', 'http://www.leaders.com.tn', '8_1540658425.png', '2018-10-27 14:40:25', '2018-10-27 14:40:25'),
(10, 'mosaique', 'https://www.mosaiquefm.net/ar/', '4_1540658487.png', '2018-10-27 14:41:27', '2018-10-27 14:41:27'),
(11, 'elhiwarettounsi', 'http://www.elhiwarettounsi.com', '2_1540658510.png', '2018-10-27 14:41:50', '2018-10-27 14:41:50'),
(12, 'jawharafm', 'https://www.jawharafm.net/ar/', 'logo-jfm_1540658584.png', '2018-10-27 14:43:04', '2018-10-27 14:43:04');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pointventes`
--

DROP TABLE IF EXISTS `pointventes`;
CREATE TABLE IF NOT EXISTS `pointventes` (
  `idPv` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomPv` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adrPv` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telPv` int(11) NOT NULL,
  `faxPv` int(11) NOT NULL,
  `pvMapx` double(10,5) NOT NULL,
  `pvMapy` double(10,5) NOT NULL,
  `pvImg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idPv`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pointventes`
--

INSERT INTO `pointventes` (`idPv`, `nomPv`, `adrPv`, `telPv`, `faxPv`, `pvMapx`, `pvMapy`, `pvImg`, `created_at`, `updated_at`) VALUES
(1, 'Complex Mouhamed el jamoussi', 'Rue Ibn Aljazzar, Sfax 3079', 74408180, 74408180, 34.73677, 10.75068, 'Complexe-culturel-Mohamed-Jamoussi_1538859521_1540661979.jpg', '2018-10-27 15:39:39', '2018-10-27 15:39:39'),
(2, 'Carrefour Nasria', 'Avenue Carthage, Sfax 3027', 76220101, 76220101, 34.74077, 10.75747, 'Capture_1540662492.PNG', '2018-10-27 15:48:12', '2018-10-27 15:48:12'),
(3, 'Monoprix Sfax Centre', 'Avenue de Hedi Chaker', 74228311, 74228311, 34.73231, 10.76442, 'monoprix_07505600_195245735_1538859461_1540148905_1540662663.jpg', '2018-10-27 15:51:03', '2018-10-27 15:51:03');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `idRes` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `soire_idSoi` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `offreTic` int(11) NOT NULL,
  `nbRes` int(11) NOT NULL,
  `qrcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codeRes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idRes`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`idRes`, `soire_idSoi`, `user_id`, `offreTic`, `nbRes`, `qrcode`, `codeRes`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 3, 5, 'storage/qrcode/11068795_1542190140.png', 'SFTtbQtqsqznGXT_11068795_3_7', '2018-11-14 09:09:00', '2018-11-14 09:09:00');

-- --------------------------------------------------------

--
-- Table structure for table `scenes`
--

DROP TABLE IF EXISTS `scenes`;
CREATE TABLE IF NOT EXISTS `scenes` (
  `idScene` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomScene` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adrScene` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capScene` int(11) NOT NULL,
  `ImgScene` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idScene`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scenes`
--

INSERT INTO `scenes` (`idScene`, `nomScene`, `adrScene`, `capScene`, `ImgScene`, `created_at`, `updated_at`) VALUES
(1, 'Le théâtre en plein air de Sfax', 'route sidi mansour sfax km 4', 5000, 'festival-de-sfax-karim-gharbi-2017_1540660730.jpg', '2018-10-27 15:18:50', '2018-10-28 13:09:11'),
(2, 'Le théâtre en plein air de Carthage', 'Carthage ,tunisie', 10000, 'tun-nuits-blanches-au-festival-international-de-carthage-2_1-1024x512_1540660821.jpg', '2018-10-27 15:20:21', '2018-10-28 13:09:18');

-- --------------------------------------------------------

--
-- Table structure for table `soires`
--

DROP TABLE IF EXISTS `soires`;
CREATE TABLE IF NOT EXISTS `soires` (
  `idSoi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomSoi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateSoi` date NOT NULL,
  `desSoi` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ImgSoi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `festivale_idFes` int(11) NOT NULL,
  `scene_idScene` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idSoi`),
  UNIQUE KEY `soires_nomsoi_festivale_idfes_unique` (`nomSoi`,`festivale_idFes`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `soires`
--

INSERT INTO `soires` (`idSoi`, `nomSoi`, `dateSoi`, `desSoi`, `ImgSoi`, `festivale_idFes`, `scene_idScene`, `created_at`, `updated_at`) VALUES
(1, 'Soiré Lotfi Bouchnak', '2018-07-20', 'Lotfi Bouchnek est actuellement le ténor le plus adulé au Maghreb, au Moyen-Orient et dans la région du Golfe. Son timbre de voix a ému également l\'Europe, l\'Asie et tout dernièrement les États-Unis. Lotfi Bouchnek a remporté à Washington le titre du meilleur chanteur arabe 1997.', 'maxresdefault_1540673619.jpg', 1, 1, '2018-10-27 18:53:39', '2018-10-27 18:53:39'),
(2, 'Soiré Lamine Nahdi', '2018-07-21', 'Makki and Zakia est une émission de comédie tunisienne montrant l\'acteur Amin Al Nahdi et dirigée par Moncef Dweib, exposée en 1993.', 'maxresdefault_1540674046.jpg', 1, 1, '2018-10-27 19:00:46', '2018-10-27 19:00:46'),
(3, 'Soiré Art Tunisien Populaire', '2018-07-23', 'une soirée extraordinaire qui joint les poles de musique populaire tunisine', 'DD_1540674880.jpg', 1, 1, '2018-10-27 19:14:40', '2018-10-27 19:14:40'),
(4, 'Soiré El Ziyara', '2018-07-25', 'Il s\'agit d\'un concert tunisien sophie auquel participent environ 100 personnes et qui est distribué par le musicien et pianiste Sami Al-Lajmi, auquel participent plusieurs musiciens internationaux et tunisiens tels que Sakardelli, Goksal Paktagir et le chanteur tunisienne Munir Al-Taroudi.', 'ziara-spectacle-fevrier-theatre_1540680210.jpg', 1, 1, '2018-10-27 20:33:04', '2018-10-27 20:43:30'),
(5, 'Soiré Nassif Zeytoun', '2018-07-26', 'Nassif est un artiste passionné par la musique depuis son enfance. Afin de parfaire son talent, il a fréquenté l’Institut Supérieur de Musique et des Arts, où il s’est spécialisé dans le chant oriental. L’année 2010 a été marquée par un événement majeur pour Nassif Zeytoun : gagnant le titre de « Star Academy » ; ce qui a établit sa popularité et sa renommée dans le monde Arabe.', '1502183947_article_1540681654.jpg', 1, 1, '2018-10-27 21:07:34', '2018-10-27 21:07:34'),
(6, 'Soiré Master Sina', '2018-07-28', 'Master cina est un artiste émergent après le succès de ces dernière chansons, il a former une grande base . commencé son carrière artistique à partir de l’italie .', 'maxresdefault_1540682203.jpg', 1, 1, '2018-10-27 21:16:43', '2018-10-27 21:16:43'),
(7, 'Soiré Ragheb alama', '2018-07-30', 'موعدكم مع راغب علامة في سهرة يوم الاثنين 30 جويلية 2018 على ركح المسرح الصيفي سيدي منصور بصفاقس', 'raghebbb3lammmma2_1540683447.jpg', 1, 1, '2018-10-27 21:31:03', '2018-10-27 21:37:27'),
(8, 'Soiré El Mahfel', '2018-08-01', 'Le spectacle el Mahfel est un spectacle traditionnel tunisian de l\'historique sfaxien et déroule par plus que 45 artistes de toutes les spécialités', 'maxresdefault_1540726565.jpg', 1, 1, '2018-10-28 10:36:05', '2018-10-28 10:36:05'),
(9, 'Soiré Yosra Mahnouch', '2018-08-03', 'Yosra Mahnouch Est l\'une des plus belles voix tunisiennes et Les masses impose une  forte demande pour leurs offres', '1472208259_mediatemp1471779849_1540727569.jpg', 1, 1, '2018-10-28 10:46:46', '2018-10-28 10:52:49'),
(10, 'Soiré karim Gharbi', '2018-08-06', 'Karim Gharbi est devenu l’une des meilleures stars de la comédie en Tunisie et a trouvé les amphie du scene complètes où il s’est rendu', 'karim_0_1540727841.jpg', 1, 1, '2018-10-28 10:57:21', '2018-10-28 10:57:21'),
(11, 'Soiré Ziad Al Burji', '2018-08-07', 'Il a débuté sa carrière en 1996, est diplômé de la Faculté des sciences modernes de Beyrouth et a été le premier à apparaître à l\'écran à la galerie d\'art de la BBC en 1996, où il a reçu la médaille d\'or. C\'est une invitation de Mme Fairouz après avoir écouté sa voix et chanté \"Ihawak sans espoir\".', 'ziyed_1540728602.jpg', 1, 1, '2018-10-28 11:06:08', '2018-10-28 11:10:02'),
(12, 'Soiré Hassan Doss', '2018-08-09', 'Il est chanteur, acteur, compositeur, parolier, réalisateur, producteur et romancier. Sa carrière artistique a débuté en 2014.', 'ddd_1540728970.jpg', 1, 1, '2018-10-28 11:16:10', '2018-10-28 11:16:10'),
(13, 'Soiré Chouyoukh Salatin El Tarab', '2018-08-11', 'Le groupe joue une performance remarquable dans l\'art du patrimoine syrien dirigé par Bashir Ahmed Al-Bejaj', 'salatinou_1540732700.jpg', 1, 1, '2018-10-28 12:18:20', '2018-10-28 12:18:20'),
(14, 'Soiré Balti et Midha', '2018-08-12', 'un soirée extraordinaire avec le rappeur tunisien  no:1 du balti et le spectacle de hathra el Midha', 'nj_1540733441.jpg', 1, 1, '2018-10-28 12:30:41', '2018-10-28 12:30:41'),
(15, 'Soiré Saber Rebaï', '2018-08-15', 'Tous les tunisian connu bien le prince saber . avec son voix extraordinare Résevé des maintenant pour avoir le chance de suivre son spectacle', 'saber-rebai-925x430_1540738737.jpg', 1, 1, '2018-10-28 13:56:33', '2018-10-28 13:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `soire_ticket`
--

DROP TABLE IF EXISTS `soire_ticket`;
CREATE TABLE IF NOT EXISTS `soire_ticket` (
  `idSt` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `soire_idSoi` int(11) NOT NULL,
  `ticket_idTic` int(11) NOT NULL,
  `prixTic` double(8,2) NOT NULL,
  `nbTicDes` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idSt`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `soire_ticket`
--

INSERT INTO `soire_ticket` (`idSt`, `soire_idSoi`, `ticket_idTic`, `prixTic`, `nbTicDes`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 150.00, 100, '2018-10-27 20:22:18', '2018-11-11 14:02:14'),
(2, 3, 2, 50.00, 1500, '2018-10-27 20:24:00', '2018-10-27 20:24:00'),
(4, 3, 3, 30.00, 3400, '2018-10-27 20:26:40', '2018-10-27 20:26:40'),
(5, 1, 1, 100.00, 100, '2018-10-28 12:41:11', '2018-10-28 12:41:11'),
(6, 1, 2, 40.00, 1500, '2018-10-28 12:41:37', '2018-10-28 12:41:37'),
(7, 1, 3, 25.00, 3400, '2018-10-28 12:41:58', '2018-10-28 12:41:58'),
(8, 2, 1, 100.00, 100, '2018-10-28 12:43:20', '2018-10-28 12:43:20'),
(9, 2, 2, 30.00, 1500, '2018-10-28 12:43:33', '2018-11-03 19:27:16'),
(10, 2, 3, 20.00, 3500, '2018-10-28 12:44:05', '2018-11-03 22:14:07'),
(11, 4, 1, 120.00, 100, '2018-10-28 12:44:31', '2018-10-28 12:44:31'),
(12, 4, 2, 60.00, 1500, '2018-10-28 12:45:29', '2018-10-28 12:45:29'),
(13, 4, 3, 35.00, 3400, '2018-10-28 12:45:42', '2018-10-28 12:45:42'),
(44, 15, 1, 150.00, 100, '2018-10-28 14:01:04', '2018-11-04 10:35:44'),
(49, 5, 2, 40.00, 1500, '2018-10-29 09:03:25', '2018-10-29 09:03:25'),
(48, 5, 1, 70.00, 100, '2018-10-29 09:03:09', '2018-10-29 09:03:09'),
(17, 6, 1, 60.00, 100, '2018-10-28 12:48:34', '2018-10-28 12:48:34'),
(18, 6, 2, 40.00, 1500, '2018-10-28 12:49:03', '2018-10-28 12:49:03'),
(19, 6, 3, 15.00, 3400, '2018-10-28 12:49:23', '2018-11-11 12:58:40'),
(20, 7, 1, 150.00, 100, '2018-10-28 12:52:40', '2018-11-03 22:18:45'),
(21, 7, 2, 60.00, 1500, '2018-10-28 12:52:59', '2018-10-28 12:52:59'),
(22, 7, 3, 40.00, 3395, '2018-10-28 12:53:48', '2018-11-14 09:09:00'),
(23, 8, 1, 60.00, 100, '2018-10-28 12:54:11', '2018-10-28 12:54:11'),
(24, 8, 2, 40.00, 1500, '2018-10-28 12:54:31', '2018-10-28 12:54:31'),
(25, 8, 3, 25.00, 3400, '2018-10-28 12:54:53', '2018-10-28 12:54:53'),
(26, 9, 1, 80.00, 100, '2018-10-28 12:55:31', '2018-10-28 12:55:31'),
(27, 9, 2, 45.00, 1497, '2018-10-28 12:55:46', '2018-11-11 20:10:27'),
(28, 9, 3, 40.00, 3395, '2018-10-28 12:56:09', '2018-11-11 16:23:32'),
(29, 10, 1, 90.00, 99, '2018-10-28 12:56:54', '2018-11-06 11:56:26'),
(30, 10, 2, 50.00, 1500, '2018-10-28 12:57:58', '2018-10-28 12:57:58'),
(31, 10, 3, 25.00, 3399, '2018-10-28 12:58:21', '2018-11-08 21:43:24'),
(32, 11, 1, 50.00, 100, '2018-10-28 12:58:38', '2018-10-28 12:58:38'),
(33, 11, 2, 30.00, 1500, '2018-10-28 12:58:59', '2018-10-28 12:58:59'),
(34, 11, 3, 15.00, 3400, '2018-10-28 12:59:14', '2018-10-28 12:59:14'),
(35, 12, 1, 50.00, 100, '2018-10-28 13:00:22', '2018-10-28 13:00:22'),
(36, 12, 2, 30.00, 1500, '2018-10-28 13:01:12', '2018-10-28 13:01:12'),
(37, 12, 3, 15.00, 3400, '2018-10-28 13:01:46', '2018-10-28 13:01:46'),
(38, 13, 1, 100.00, 100, '2018-10-28 13:02:07', '2018-10-28 13:02:07'),
(39, 13, 2, 60.00, 1500, '2018-10-28 13:02:38', '2018-10-28 13:02:38'),
(40, 13, 3, 30.00, 3393, '2018-10-28 13:02:51', '2018-11-11 10:47:02'),
(41, 14, 1, 75.00, 100, '2018-10-28 13:03:05', '2018-10-28 13:03:05'),
(42, 14, 2, 50.00, 1500, '2018-10-28 13:03:20', '2018-10-28 13:03:20'),
(43, 14, 3, 25.00, 3400, '2018-10-28 13:03:31', '2018-10-28 13:03:31'),
(45, 15, 2, 70.00, 1496, '2018-10-28 14:01:28', '2018-11-06 09:58:32'),
(46, 15, 3, 40.00, 3398, '2018-10-28 14:01:49', '2018-11-09 09:03:44'),
(50, 5, 3, 25.00, 3400, '2018-10-29 09:03:41', '2018-10-29 09:03:41'),
(51, 16, 1, 1000.00, 0, '2018-11-11 20:12:20', '2018-11-11 20:12:20'),
(52, 16, 2, 120.00, 0, '2018-11-11 20:12:35', '2018-11-11 20:15:23'),
(53, 16, 3, 10.00, 0, '2018-11-11 20:12:49', '2018-11-11 20:12:49');

-- --------------------------------------------------------

--
-- Table structure for table `spectacles`
--

DROP TABLE IF EXISTS `spectacles`;
CREATE TABLE IF NOT EXISTS `spectacles` (
  `idSpec` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomSpec` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `typeSpec` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempDebSpec` time NOT NULL,
  `tempFinSpec` time NOT NULL,
  `imgSpec` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artist_idArt` int(11) NOT NULL,
  `soire_idSoi` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idSpec`),
  UNIQUE KEY `spectacles_artist_idart_soire_idsoi_unique` (`artist_idArt`,`soire_idSoi`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spectacles`
--

INSERT INTO `spectacles` (`idSpec`, `nomSpec`, `typeSpec`, `tempDebSpec`, `tempFinSpec`, `imgSpec`, `artist_idArt`, `soire_idSoi`, `created_at`, `updated_at`) VALUES
(1, 'Spectacle Samir Loussif', 'Art populaire', '19:00:00', '20:30:00', 'maxresdefault_1540677178.jpg', 3, 3, '2018-10-27 19:52:58', '2018-10-27 19:52:58'),
(3, 'Spectacle Hedi donia', 'Art tradutionel', '21:00:00', '22:30:00', 'images_1540677427.jpg', 4, 3, '2018-10-27 19:57:07', '2018-10-27 19:57:07'),
(4, 'Spectacle Cheb salim', 'Art tradutionel', '23:00:00', '00:30:00', 'hqdefault_1540677817.jpg', 5, 3, '2018-10-27 20:03:37', '2018-10-27 20:03:37'),
(5, 'Spectacle Lotfi bouchnack', 'concert', '19:00:00', '22:00:00', 'lotfi-bouchnak720_1540679689.jpg', 1, 1, '2018-10-27 20:34:49', '2018-10-27 20:34:49'),
(6, 'Spectacle el Maki ou Zakiya', 'one man show', '20:00:00', '22:30:00', 'maxresdefault_1540679929.jpg', 2, 2, '2018-10-27 20:38:49', '2018-10-27 20:38:49'),
(7, 'Spectacle el ziyara', 'Art tradutionel', '20:00:00', '23:00:00', 'Ziara-1200x675_1540680172.jpg', 6, 4, '2018-10-27 20:42:52', '2018-10-27 20:42:52'),
(8, 'Spectacle Nassif Zeytoun', 'concert', '20:00:00', '22:30:00', 'nassif_zeytoun_1540681810.jpg', 7, 5, '2018-10-27 21:10:10', '2018-10-27 21:10:10'),
(9, 'Spectacle Master Sina', 'Rap', '21:00:00', '23:00:00', 'maxresdefault_1540682270.jpg', 8, 6, '2018-10-27 21:17:50', '2018-10-27 21:17:50'),
(10, 'Spectacle Ragheb Alama', 'Concert', '20:00:00', '23:00:00', 'Doc-P-116638-636400241185724119_1540683708.jpg', 9, 7, '2018-10-27 21:41:48', '2018-10-27 21:41:48'),
(11, 'Spectacle El Mahfel', 'Art tradutionel', '20:30:00', '23:00:00', 'maxresdefault_1540726657.jpg', 10, 8, '2018-10-28 10:37:37', '2018-10-28 10:37:37'),
(12, 'Spectacle Yosra Mahnouch', 'Concert', '20:00:00', '22:00:00', 'yosra_1540727403.png', 11, 9, '2018-10-28 10:50:03', '2018-10-28 10:50:03'),
(13, 'Spectacle Karim Gharbi', 'one man show', '21:00:00', '22:00:00', 'maxresdefault_1540727936.jpg', 12, 10, '2018-10-28 10:58:56', '2018-10-28 10:58:56'),
(14, 'Spectacle Ziad Al Burji', 'Concert', '20:00:00', '22:30:00', 'index_1540728687.jpg', 14, 11, '2018-10-28 11:07:15', '2018-10-28 11:11:27'),
(15, 'Spectacle Carnaval Hassen Doss', 'concert', '21:00:00', '23:00:00', 'hassenehammametvcx1_1540729052.jpg', 13, 12, '2018-10-28 11:17:32', '2018-10-28 11:17:32'),
(16, 'Spectacle Chouyoukh Salatin El Tarab', 'Art patrimoine syrien', '20:00:00', '23:00:00', 'd_1540732899.jpg', 15, 13, '2018-10-28 12:20:40', '2018-10-28 12:21:39'),
(17, 'Spectacle Balti', 'Rap', '22:30:00', '23:30:00', 'j_1540733684.jpg', 16, 14, '2018-10-28 12:34:44', '2018-10-28 12:34:44'),
(18, 'El Medha', 'Art patrimoine sfaxien', '20:00:00', '22:00:00', 'dg_1540733924.jpg', 17, 14, '2018-10-28 12:38:44', '2018-10-28 12:38:44'),
(19, 'Spectacle Saber Rebaï', 'Concert', '20:00:00', '23:00:00', 'maxresdefault_1540738817.jpg', 18, 15, '2018-10-28 14:00:17', '2018-10-28 14:00:17');

-- --------------------------------------------------------

--
-- Table structure for table `sponseurs`
--

DROP TABLE IF EXISTS `sponseurs`;
CREATE TABLE IF NOT EXISTS `sponseurs` (
  `idSpon` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomSpon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siteSpon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sponImg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idSpon`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sponseurs`
--

INSERT INTO `sponseurs` (`idSpon`, `nomSpon`, `siteSpon`, `sponImg`, `created_at`, `updated_at`) VALUES
(1, 'star', 'http://www.star.com.tn', 'star_1540655695.png', '2018-10-27 13:54:55', '2018-10-27 13:54:55'),
(2, 'La Poste Tunisienne', 'http://www.poste.tn', 'poste_1540655787.png', '2018-10-27 13:56:27', '2018-10-27 13:56:27'),
(3, 'tunisie telecom', 'https://www.tunisietelecom.tn/Fr', 'TunisieTelecom-LaVieEstEmotions-_1540655834.png', '2018-10-27 13:57:14', '2018-10-27 13:57:14'),
(4, 'Tunisair', 'http://www.tunisair.com', 'tuni_1540655859.png', '2018-10-27 13:57:39', '2018-10-27 13:57:39'),
(5, 'Total', 'http://www.total.tn', 'to_1540655892.png', '2018-10-27 13:58:12', '2018-10-27 13:58:12'),
(6, 'Odv plus', 'http://odvplus.com', 'odv-1_1540655945.png', '2018-10-27 13:59:05', '2018-10-27 13:59:05'),
(7, 'Meuble Mezghani', 'http://www.meublesmezghani.com', 'mez_1540655984.png', '2018-10-27 13:59:44', '2018-10-27 13:59:44'),
(8, 'SAH-Lilas', 'http://lilas.com.tn/Fr/', 'logo-1_1540656027.png', '2018-10-27 14:00:27', '2018-10-27 14:00:27'),
(9, 'bitakagroup', 'http://www.bitakagroup.com.tn', 'fih_sponsor_7_1540656075.png', '2018-10-27 14:01:15', '2018-10-27 14:01:15'),
(10, 'Cafe Ben Yedder', 'http://www.cafesbenyedder.com.tn', 'logo_1540738385.png', '2018-10-27 14:02:15', '2018-10-28 13:53:05'),
(11, 'Carrefour', 'https://www.carrefourtunisie.com/', 'carf_1540656148.png', '2018-10-27 14:02:28', '2018-10-27 14:02:28'),
(12, 'Hayat', 'https://www.huffpostmaghreb.com/2015/09/18/marque-eau-tunisie_n_8159778.html', '26219124_1812258532151597_7647060633203914479_n_1540656202.jpg', '2018-10-27 14:03:22', '2018-10-27 14:03:22'),
(13, 'sherrington', 'http://www.sherrington.com.tn', '1bb87d41d15fe27b500a4bfcde01bb0e_1540656241.png', '2018-10-27 14:04:01', '2018-10-27 14:04:01'),
(14, 'nescafe', 'http://nescafe.tn', '5ae22ce233b73fa43b1a892e_1540656383.png', '2018-10-27 14:06:23', '2018-10-27 14:06:23'),
(15, 'orange tunisie', 'https://www.orange.tn', '300px-Orange_1540656432.png', '2018-10-27 14:07:12', '2018-10-27 14:07:12'),
(16, 'delice', 'http://www.delice.tn/Fr/', 'kk_1540657286.png', '2018-10-27 14:08:41', '2018-10-27 14:21:26'),
(17, 'volkswagen', 'https://www.volkswagen.tn/fr.html', 'Logo_Volkswagen_1540657409.png', '2018-10-27 14:23:29', '2018-10-27 14:23:29'),
(18, 'Ooredoo Tunisie', 'http://www.ooredoo.tn', 'logo_1540657543.png', '2018-10-27 14:25:43', '2018-10-27 14:25:43');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `idTic` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `typeTic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desTic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idTic`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`idTic`, `typeTic`, `desTic`, `created_at`, `updated_at`) VALUES
(1, 'Vip', 'Experience Royale', '2018-10-27 15:59:20', '2018-10-27 15:59:20'),
(2, 'CHAISE', 'Plus de Confortabilité ,Plus de Plaisir', '2018-10-27 16:01:25', '2018-10-27 16:01:25'),
(3, 'GRADIN', 'Vivre le moment', '2018-10-27 16:09:52', '2018-10-27 16:09:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cin` int(11) NOT NULL,
  `tel` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_cin_unique` (`cin`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `prenom`, `cin`, `tel`, `email`, `password`, `admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'boulbeba', 'bouaziz', 11068795, 23180613, 'boulbebazz@yahoo.fr', '$2y$10$MUxLhLQScLRq7Ope36qYD.pgNA363TxvtmEKRYf/swkgKQOCo6s16', 1, 'Z81iafpgEZPlMjDQ4T84qiu3qIxo2eYrI26udm0SiKYOwWoVwosiXeFhhpsf', '2018-10-27 13:45:16', '2018-10-27 13:45:16'),
(5, 'bilel', 'bouaziz', 11065489, 21452147, 'bilelbouaziz@gmail.com', '$2y$10$t6CBnL/fjleq1JnkT0uZJeP1tQkQGeALOBccsrRMbeJz2md1.DgEO', 0, NULL, '2018-11-11 14:01:34', '2018-11-11 14:01:34'),
(4, 'boulbeba', 'bouaziz', 11234569, 12345678, 'aaaaa@yahoo.fr', '$2y$10$oQ3SJXqSkciydRM4LQ8H/uwLpYYem0l5J1kJxqgR.xdgsimWgTuO6', 0, 'ZSsXAw8vub3P40gxaPRRywcvgkQoWVSITsP6KJ1eERmGQOWXITUFfrnC909r', '2018-11-04 10:31:21', '2018-11-04 10:31:21');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
