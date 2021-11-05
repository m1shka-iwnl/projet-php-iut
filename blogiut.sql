-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 01 oct. 2021 à 18:27
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blogiut`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `texte` text NOT NULL,
  `date` date NOT NULL,
  `publie` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `texte`, `date`, `publie`) VALUES
(1, 'Article 1 : une voiture', 'Batnae municipium in Anthemusia conditum Macedonum manu priscorum ab Euphrate flumine brevi spatio disparatur, refertum mercatoribus opulentis, ubi annua sollemnitate prope Septembris initium mensis ad nundinas magna promiscuae fortunae convenit multitudo ad commercanda quae Indi mittunt et Seres aliaque plurima vehi terra marique consueta.', '2021-09-07', 0),
(2, 'Article 2 : un avion', 'Dumque ibi diu moratur commeatus opperiens, quorum translationem ex Aquitania verni imbres solito crebriores prohibebant auctique torrentes, Herculanus advenit protector domesticus, Hermogenis ex magistro equitum filius, apud Constantinopolim, ut supra rettulimus, populari quondam turbela discerpti. quo verissime referente quae Gallus egerat, damnis super praeteritis maerens et futurorum timore suspensus angorem animi quam diu potuit emendabat.', '2021-09-07', 0),
(3, 'Article 3 : un bateau', 'Etenim si attendere diligenter, existimare vere de omni hac causa volueritis, sic constituetis, iudices, nec descensurum quemquam ad hanc accusationem fuisse, cui, utrum vellet, liceret, nec, cum descendisset, quicquam habiturum spei fuisse, nisi alicuius intolerabili libidine et nimis acerbo odio niteretur. Sed ego Atratino, humanissimo atque optimo adulescenti meo necessario, ignosco, qui habet excusationem vel pietatis vel necessitatis vel aetatis. Si voluit accusare, pietati tribuo, si iussus est, necessitati, si speravit aliquid, pueritiae. Ceteris non modo nihil ignoscendum, sed etiam acriter est resistendum.', '2021-09-07', 1),
(4, 'fdsfds', 'fff', '2021-09-23', 0),
(5, 'fdsfds', 'fff', '2021-09-23', 0),
(6, 'fdsfds', 'fff', '2021-09-23', 0),
(7, 'fdsfds', 'fff', '2021-09-23', 0),
(8, 'bonjourfds', 'artjiogsjkls', '2021-09-23', 0),
(9, 'ouai OUAI', 'dfss', '2021-09-23', 0),
(10, 'bah ouai', 'fdshjkfhskfhs', '2021-09-23', 0),
(11, 'jtyt', 'dfssgf', '2021-09-23', 0),
(12, 'fdfsfds', 'fsdlhngjhsdkhskjhgksj', '2021-09-23', 0),
(13, 'ikd', 'fsdfsdfsdf', '2021-09-30', 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `sid` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `mdp`, `sid`) VALUES
(1, 'lemaitre', 'marian', 'marian.lemaitre@live.fr', '0', NULL),
(2, 'test', 'test', 'gzsdfgkzj@,fsndjfhs', '0', NULL),
(3, 'Batiste', 'test ', 'ngfskis@fsdjfhsj', 'opo', NULL),
(4, 'User', 'test', 'test', '91c6969748311db99e74d691ea075f96df628eec', NULL),
(5, 'ouep', 'oeup2', 'oeup2@gmail.com', '446aae6be397dfa90566016b2b4280af2d44c520', NULL),
(6, 'fdszfskjo', 'hfszjkhfiozj', 'nfsdjkfnjkzsnfkz@fsds', '227d6a63dfece38e0c80c31ba5c0812e9a216d3a', NULL),
(20, 'papa', 'papa', 'papa@papa.fr', '$2y$10$Va7ewfdjNFSW7vL7IQz9YeVku/Nz2dEb7WRNusgWAr5nMLestu5ne', 'c8d3c7b918eccae09958f0baac085836');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
