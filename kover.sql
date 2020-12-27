-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : Dim 27 déc. 2020 à 17:52
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `kover`
--

-- --------------------------------------------------------

--
-- Structure de la table `letters`
--

CREATE TABLE `letters` (
  `user_id` int(11) NOT NULL,
  `proj_name` varchar(30) NOT NULL,
  `letter_id` int(11) NOT NULL,
  `letter_status` varchar(30) NOT NULL,
  `letter_title` varchar(50) NOT NULL,
  `letter_content` longtext NOT NULL,
  `letter_creation` varchar(255) NOT NULL,
  `letter_lastedit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_status` varchar(255) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `lang_code` varchar(10) NOT NULL,
  `creation_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `user_status`, `user_name`, `passwd`, `lang_code`, `creation_date`) VALUES
(7, 'user', 'Testeur01', '616b77c9cb113a5df23097d1d31528787dbe9119bc6c1021b5d9bfbf99f38360645cc8e366117f78f60bcca72e1c5b6a59139ce7d012ff9bc308c5162c8c5680', 'FR', '2020-12-27 17:50:56');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `letters`
--
ALTER TABLE `letters`
  ADD PRIMARY KEY (`letter_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `letters`
--
ALTER TABLE `letters`
  MODIFY `letter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
