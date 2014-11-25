-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 24 Novembre 2014 à 17:55
-- Version du serveur: 5.5.37-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `type`, `libelle`) VALUES
(1, 1, 'Culture'),
(2, 2, 'Sport'),
(3, 3, 'Politique'),
(4, 4, 'Livre'),
(5, 5, 'Economie'),
(6, 6, 'Loisir'),
(7, 7, 'Restaurant'),
(8, 2, 'Philosophie');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_news` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `commentaire` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `id_news`, `nom`, `prenom`, `commentaire`) VALUES
(4, 99, 'Dupont', 'Robert', 'Oui bien sûr.'),
(5, 99, 'Marx', 'Karl', 'je suis désolée, je ne comprends pas bien ta question...'),
(6, 99, 'Daniel', 'Jean', 'Sens 2 Style architectural précédent le style gothique [Architecture].'),
(7, 118, 'Néruda', 'Pablo', 'C''est une bonne question.'),
(8, 110, 'Dérida', 'Jaques', 'Il faut savoir philosopher!'),
(9, 121, 'Nancy', 'Luc', 'C''est un bon article'),
(10, 99, 'Badiou', 'Alain', 'L''idée du communisme! \r\nC''est ça qui compte.'),
(11, 99, 'Hugo', 'Victor', 'Un bon article.'),
(12, 101, 'Rousseau', 'Jean jacques', 'Oui c''est bon');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `id_auteur` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `contenu` varchar(500) NOT NULL,
  `categorie` int(11) DEFAULT NULL,
  `image` varchar(50) NOT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateModif` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=122 ;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`id`, `id_auteur`, `titre`, `contenu`, `categorie`, `image`, `dateAjout`, `dateModif`) VALUES
(99, 1, 'une phrase par "Que" ?', 'Bonjour,\r\nest-ce qu''il est admis de commencer une phrase par "Que" ?\r\nJe pose cette question parce que j''ai entendu dans nos médias que la chanson "Que je t''aime" de Johnny comportait une grosse faute dans son refrain.\r\nMerci de votre éclairage !\r\n', 1, 'index.jpeg', '2014-11-23 18:49:42', '2014-11-23 18:49:42'),
(100, 1, 'Est ce que selon vous  le nom du "roman" est utilisé délibérément  à contresens?', 'Bonjour, \r\nJ''ai une question est ce que selon vous  le nom du "roman" est utilisé délibérément  à contresens? je ne sais pas trop dans quel sens le prendre. pouvez vous éclairer ma lanterne\r\nmerci d''avance', 1, '', '2014-11-23 19:07:43', '2014-11-23 19:07:43'),
(101, 1, 'la différence entre les mots "faux-sens" et "contresens".', 'Bonjour,\r\n\r\nJe souhaiterais connaître la différence entre les mots "faux-sens" et "contresens". Dans le dictionnaire on donne pratiquement la même définition = sens erroné.\r\nDe plus, il me semble qu''un contresens, dans une analyse de texte ou traduction, ne veut pas dire nécessairement que le sens compris est contraire ou opposé à celui exprimé.\r\nEt pourquoi est-ce qu''un contresens est davantage sanctionné qu''un faux-sens ?\r\n\r\nMerci pour votre aide\r\n', 4, '', '2014-11-23 21:41:50', '2014-11-23 21:41:50'),
(102, 1, 'Le loisir est l''activité que l''on effectue durant le temps', 'Le loisir est l''activité que l''on effectue durant le temps libre dont on peut disposer. Ce temps libre s''oppose au temps prescrit, c''est-à-dire contraint par les occupations habituelles (emploi, activités domestiques, éducation des enfants...) ou les servitudes qu’elles imposent (transports, par exemple).\r\n', 6, '', '2014-11-23 21:44:25', '2014-11-23 21:44:25'),
(103, 1, 'Le philosophe Bertrand Russell a abordé', 'Le philosophe Bertrand Russell a abordé cette question dans deux de ses ouvrages : Essais sceptiques et un ouvrage de jeunesse, Le monde qui pourrait être (avec lequel il prit quelque distance par la suite).', 3, '', '2014-11-23 21:45:15', '2014-11-23 21:45:15'),
(104, 1, 'Un auteur comme Jeremy Rifkin estime une société sans travail.', 'Un auteur comme Jeremy Rifkin estime que nous nous acheminons à terme vers une société sans travail. Avant qu’une telle situation n’émerge, si elle le fait un jour, il faudra améliorer les points suivants.', 5, '', '2014-11-23 21:46:34', '2014-11-23 21:46:34'),
(105, 1, 'Ce temps libre permet de participer à plusieurs activités', 'Ce temps libre permet de participer à plusieurs activités autres que celles dédiées à la « survie » ou à la « reproduction ». Ainsi s’investir dans des associations, développer ses compétences ou exercer une activité différente ( culture, peinture, jardinage, sport...).', 2, '', '2014-11-23 21:47:29', '2014-11-23 21:47:29'),
(106, 1, 'Complexité administrative souvent accrue', 'Mécanisation et informatisation libèrent progressivement l’homme de nombreux travaux physiques pénibles, dans le même temps il est vrai qu’il charge son mental : transports domicile-travail, complexité administrative souvent accrue, difficultés liées à une mauvaise ergonomie en informatique, travaux nerveusement pénibles, etc. Ainsi, le temps de travail « comptabilisé » diminue globalement et la réduction du temps de travail dégage pour chacun plus de « temps libre ».', 7, '', '2014-11-23 21:48:44', '2014-11-23 21:48:44'),
(107, 1, 'Un « violon d''Ingres » désigne un loisir', 'Un « violon d''Ingres » désigne un loisir, par analogie avec la carrière de Jean-Auguste-Dominique Ingres comme deuxième violon à l’orchestre national du Capitole de Toulouse', 6, '', '2014-11-23 21:49:36', '2014-11-23 21:49:36'),
(108, 1, 'Loisir et loisirs : glissement sémantique', 'On qualifie également le loisir de « temps libre », soit un temps usuellement consacré à des activités essentiellement non productives d’un point de vue macroéconomique, activités souvent ludiques ou culturelles : bricolage, jardinage, sports, divertissements... Cela a entraîné par la suite un glissement sémantique du terme « loisir » (temps libre) vers celui de « loisirs » (divertissements et sports).', 6, '', '2014-11-23 21:50:49', '2014-11-23 21:50:49'),
(109, 1, 'Moyen Âge et époque moderne', 'Louis XIV, le Roi-Soleil, désire voir la monarchie rayonner à partir d''un lieu d''où il peut gouverner : ce sera Versailles. Les travaux débutent en 1669 mais ils sont encore inachevés lorsque la Cour et le gouvernement s''installent en 1682. Plusieurs architectes de renom comme Louis Le Vau y travaillent, ainsi que le jardinier ', 3, '', '2014-11-23 21:53:00', '2014-11-23 21:53:00'),
(110, 1, 'Selon M.-Th. Join-Lambert', 'Selon M.-Th. Join-Lambert 1, les politiques sociales sont une invention nécessaire pour rendre gouvernable une société organisée autour de principes de solidarités ; elles constituent un ensemble d’actions mises en œuvre progressivement par les pouvoirs publics pour parvenir à transformer les conditions de vie d’abord des ouvriers puis des salariés et éviter les explosions sociales, la désagrégation des liens sociaux2.', 3, '', '2014-11-23 21:54:20', '2014-11-23 21:54:20'),
(111, 1, 'Préambule de la charte de l''ONU', 'Les politiques sociales ont comme cadre idéologique et fondateur les droits économiques, sociaux et culturels présents dans la déclaration universelle des droits de l''homme de 19485 (à partir de l''article 22). C''est pour cette raison que les enjeux des politiques sociales sont le droit au travail, à l’orientation, à la formation, des conditions de travail justes et favorables, droit à la syndicalisation, droit à un niveau de vie suffisant, droit de jouir d’un bon état de santé, droit à l’éducati', 3, '', '2014-11-23 21:54:59', '2014-11-23 21:54:59'),
(112, 1, 'les politiques en directions des personnes.', 'les politiques en directions des personnes handicapées et des personnes âgées6.', 3, '', '2014-11-23 21:55:37', '2014-11-23 21:55:37'),
(113, 1, 'On parle de plus en plus d''une territorialisation', 'On parle de plus en plus d''une territorialisation des politiques sociales. En effet les dépenses dans le domaine du social, comme le revenu de solidarité active, ex RMI, sont conséquentes pour le département. Cela pose problème car les départements sont inégaux face aux problèmes sociaux', 3, '', '2014-11-23 21:56:33', '2014-11-23 21:56:33'),
(114, 1, 'On parle de plus en plus d''une territorialisation', 'On parle de plus en plus d''une territorialisation', 3, '', '2014-11-23 21:56:47', '2014-11-23 21:56:47'),
(115, 1, 'Aide sociale', 'À côté de politiques sociales générales, en lien avec la sécurité sociale, un certain ', 4, '', '2014-11-23 21:57:21', '2014-11-23 21:57:21'),
(116, 1, 'Emmanuel Aubin, L''essentiel du droit des politiques sociales, Gualino', 'Les politiques sociales ont comme cadre idéologique et fondateur les droits économiques, sociaux et culturels présents dans la déclaration universelle des droits de l''homme de 19485 (à partir de l''article 22). ', 7, '', '2014-11-23 21:58:19', '2014-11-23 21:58:19'),
(117, 1, 'Les recettes de plats.', 'Les recettes de plats, ce n’est pas toujours de la tarte : qui va aimer ? Léger ou gourmand ? Etranger ou classique ? Pour vous aider, vous trouverez ici les plats. ', 7, '', '2014-11-23 22:00:31', '2014-11-23 22:00:31'),
(118, 1, 'Lasagne à la bolognaise facile', 'Ingrédients: - 8 plaques de lasagnes - 800 g de pulpes de tomate en conserve - 300 g viande de bœuf hachée - 1 oignon - 1 gousse d''ail - 2 c.', 7, 'lasagne.jpeg', '2014-11-23 22:01:18', '2014-11-23 22:01:18'),
(121, 1, 'Lettre de motivation générale', ' Voici un exemple de lettre de motivation généraliste à télécharger gratuitement. A vous de compléter ce modèle afin de l''adapter à votre situation personnelle et professionnelle. N''hésitez pas à prendre connaissance de nos conseils pour savoir comment faire une lettre de motivation convaincante.', 1, 'lettre_motivation.jpeg', '2014-11-24 11:37:58', '2014-11-24 14:15:09');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_nom` varchar(250) NOT NULL,
  `user_prenom` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_pass` varchar(250) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`user_id`, `user_nom`, `user_prenom`, `user_email`, `user_pass`) VALUES
(1, 'vassigh', 'chidan', 'cvassigh@wanadoo.fr', 'vach'),
(11, 'vassigh', 'lila', 'lila@wanadoo.fr', 'lila');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
