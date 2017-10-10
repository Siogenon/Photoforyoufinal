-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 27 Novembre 2016 à 12:58
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `genonpfu`
--

DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `InitCap` ()  BEGIN

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Moyenne_Credit` ()  BEGIN
 insert into statistique values(NOW(), "Moyenne crédit photographe", (select AVG(credits) from users where type_connection = 0));
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `new_procedure` ()  BEGIN

END$$

--
-- Fonctions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `client_sans_credit` (`letype` INT) RETURNS INT(4) BEGIN
declare nbclient integer;
Set nbclient = (Select count(nom) From users Where credits = 0 and type_connection = letype);
RETURN nbclient;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `client_sans_credits` () RETURNS INT(11) BEGIN
declare nbClients int;
set NbClients = (Select count(*) from users where credit = 0);
RETURN NbClients;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `InitCap` (`ligne` VARCHAR(30)) RETURNS VARCHAR(30) CHARSET latin1 BEGIN
set ligne = concat(upper(substr(ligne, 1, 1)), lower(substr(ligne, 2, length(ligne))));
RETURN ligne;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `InitCap2` (`chaine` VARCHAR(20)) RETURNS VARCHAR(20) CHARSET utf8 BEGIN 
declare machaine varchar(20);
set machaine=concat(upper(substring(chaine,1,1)),lower(substring(chaine,2,length(chaine)-1)));
Return machaine;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `nbrphoto` (`id` INT) RETURNS INT(11) BEGIN
declare res int;
if (select idusers from users where users.idusers=id and type_connection=1) is null then return -1;
end if;
Select count(*) into res from users,photos where users.idusers=photos.id_users and users.idusers=id;
RETURN res;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `total_poids` () RETURNS INT(11) BEGIN

RETURN 1;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `idMenu` int(11) NOT NULL,
  `NomMenu` varchar(45) NOT NULL,
  `Lien` varchar(45) NOT NULL,
  `Type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `menu`
--

INSERT INTO `menu` (`idMenu`, `NomMenu`, `Lien`, `Type`) VALUES
(1, 'Acheter des crédits', 'achatcredits.php', 'all'),
(2, 'Acheter des images', 'achatimages.php', 'all'),
(3, 'Nous contacter', 'contacts.php', 'all'),
(4, 'Connexion', 'connexion.php', 'disconnect'),
(5, 'S’inscrire', 'inscription.php', 'disconnect'),
(6, 'Deconnexion', 'logout.php', 'connect');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idusers` int(11) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `pseudo` varchar(45) NOT NULL,
  `type` int(1) NOT NULL,
  `mail` varchar(45) NOT NULL,
  `pass` varchar(45) NOT NULL,
  `credits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`idusers`, `prenom`, `nom`, `pseudo`, `type`, `mail`, `pass`, `credits`) VALUES
(1, 'Thomas', 'Genon', 'Toto', 1, 'toto@toto.fr', 'genon', 0),
(2, 'Clientgenon', 'Genon', 'Genon', 0, 'genon@genon.fr', 'genon', 244);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idMenu`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD KEY `id_users` (`idusers`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `idMenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idusers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
