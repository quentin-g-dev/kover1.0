-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 22 jan. 2021 à 10:06
-- Version du serveur :  8.0.22-0ubuntu0.20.04.3
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `user_id` int NOT NULL,
  `proj_name` varchar(30) NOT NULL,
  `letter_id` int NOT NULL,
  `letter_status` varchar(30) NOT NULL,
  `letter_title` varchar(50) NOT NULL,
  `letter_content` longtext NOT NULL,
  `letter_creation` varchar(255) NOT NULL,
  `letter_lastedit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `letters`
--

INSERT INTO `letters` (`user_id`, `proj_name`, `letter_id`, `letter_status`, `letter_title`, `letter_content`, `letter_creation`, `letter_lastedit`) VALUES
(0, '', 6, 'version', '1611051678119', '\n &lt;p&gt;//Prénom NOM//&lt;/p&gt;\n &lt;p&gt;//Adresse postale 1//&lt;/p&gt;\n &lt;p&gt;//Code postal 1 COMMUNE 1//&lt;/p&gt;\n &lt;p&gt;// 33(0) 6 00 00 00 00//&lt;/p&gt;\n &lt;p&gt;//moi@mondomaine.com//&lt;/p&gt;\n &lt;br&gt;\n &lt;p class=&quot;text-right&quot;&gt;//Employeur//&lt;/p&gt;\n &lt;p class=&quot;text-right&quot;&gt;//Adresse postale 2//&lt;/p&gt;\n &lt;p class=&quot;text-right&quot;&gt;//Code postal 2 COMMUNE 2//&lt;/p&gt;\n &lt;br&gt;\n &lt;p class=&quot;text-right&quot;&gt;//COMMUNE 1, le Date//&lt;/p&gt;\n &lt;br&gt;\n &lt;p&gt;Objet : Candidature au poste de //EMPLOI//&lt;/p&gt;\n &lt;br&gt;\n &lt;p&gt;//Madame, Monsieur,// &lt;/p&gt;\n &lt;br&gt;\n &lt;p class=&quot;text-justify&quot;&gt;Etant actuellement à la recherche d’un emploi, je me permets de vous proposer ma candidature au poste de //emploi//.&lt;/p&gt;\n &lt;p class=&quot;text-justify&quot;&gt;Mon profil correspond en effet à l’offre d’emploi //Référence de l\'offre// diffusée par //Source de l\'offre//. Ma formation // Mon expérience dans le domaine de //l\'activité concernée// m\'a permis d\'acquérir les connaissances et les savoir-faire indispensables pour assurer cette mission.&lt;/p&gt;\n &lt;p class=&quot;text-justify&quot;&gt;//Décrire en quelques phrases ses atouts en lien avec le poste visé : par exemple une formation spécialisée ou très avancée, un domaine de prédilection, une expérience significative et probante, ...//&lt;/p&gt;\n &lt;p class=&quot;text-justify&quot;&gt;Rigoureux, attentif et conscient des aléas du métier, je suis capable de répondre aux imprévus de façon responsable et en toute autonomie.&lt;/p&gt;\n &lt;p class=&quot;text-justify&quot;&gt;Intégrer votre équipe serait pour ma carrière professionnelle une belle opportunité, qui me permettrait d\'exprimer pleinement mon potentiel.&lt;/p&gt;\n &lt;p class=&quot;text-justify&quot;&gt;Je suis actuellement disponible pour une nouvelle collaboration : je me tiens donc à votre disposition pour organiser une rencontre et discuter de votre projet de recrutement. Pour toute information complémentaire quant à mon parcours, n\'hésitez pas à m\'adresser un e-mail ou à m\'appeler directement.&lt;/p&gt;\n &lt;p class=&quot;text-justify&quot;&gt;Vous remerciant de l\'attention portée à ma demande, je vous prie d\'agréer, //Madame, Monsieur,// l’expression de mes salutations respectueuses.&lt;/p&gt;\n &lt;br&gt;\n &lt;p class=&quot;text-right&quot;&gt;Signature&lt;/p&gt;\n', '19.01.21', '19.01.21'),
(64, '', 7, 'version', '1611065025392', '\n &lt;p&gt;//Prénom NOM//&lt;/p&gt;\n &lt;p&gt;//Adresse postale 1//&lt;/p&gt;\n &lt;p&gt;//Code postal 1 COMMUNE 1//&lt;/p&gt;\n &lt;p&gt;// 33(0) 6 00 00 00 00//&lt;/p&gt;\n &lt;p&gt;//moi@mondomaine.com//&lt;/p&gt;\n &lt;br&gt;\n &lt;p class=&quot;text-right&quot;&gt;//Employeur//&lt;/p&gt;\n &lt;p class=&quot;text-right&quot;&gt;//Adresse postale 2//&lt;/p&gt;\n &lt;p class=&quot;text-right&quot;&gt;//Code postal 2 COMMUNE 2//&lt;/p&gt;\n &lt;br&gt;\n &lt;p class=&quot;text-right&quot;&gt;//COMMUNE 1, le Date//&lt;/p&gt;\n &lt;br&gt;\n &lt;p&gt;Objet : Candidature au poste de //EMPLOI//&lt;/p&gt;\n &lt;br&gt;\n &lt;p&gt;//Madame, Monsieur,// &lt;/p&gt;\n &lt;br&gt;\n &lt;p class=&quot;text-justify&quot;&gt;Etant actuellement à la recherche d’un emploi, je me permets de vous proposer ma candidature au poste de //emploi//.&lt;/p&gt;\n &lt;p class=&quot;text-justify&quot;&gt;Mon profil correspond en effet à l’offre d’emploi //Référence de l\'offre// diffusée par //Source de l\'offre//. Ma formation // Mon expérience dans le domaine de //l\'activité concernée// m\'a permis d\'acquérir les connaissances et les savoir-faire indispensables pour assurer cette mission.&lt;/p&gt;\n &lt;p class=&quot;text-justify&quot;&gt;//Décrire en quelques phrases ses atouts en lien avec le poste visé : par exemple une formation spécialisée ou très avancée, un domaine de prédilection, une expérience significative et probante, ...//&lt;/p&gt;\n &lt;p class=&quot;text-justify&quot;&gt;Rigoureux, attentif et conscient des aléas du métier, je suis capable de répondre aux imprévus de façon responsable et en toute autonomie.&lt;/p&gt;\n &lt;p class=&quot;text-justify&quot;&gt;Intégrer votre équipe serait pour ma carrière professionnelle une belle opportunité, qui me permettrait d\'exprimer pleinement mon potentiel.&lt;/p&gt;\n &lt;p class=&quot;text-justify&quot;&gt;Je suis actuellement disponible pour une nouvelle collaboration : je me tiens donc à votre disposition pour organiser une rencontre et discuter de votre projet de recrutement. Pour toute information complémentaire quant à mon parcours, n\'hésitez pas à m\'adresser un e-mail ou à m\'appeler directement.&lt;/p&gt;\n &lt;p class=&quot;text-justify&quot;&gt;Vous remerciant de l\'attention portée à ma demande, je vous prie d\'agréer, //Madame, Monsieur,// l’expression de mes salutations respectueuses.&lt;/p&gt;\n &lt;br&gt;\n &lt;p class=&quot;text-right&quot;&gt;Signature&lt;/p&gt;\n', '19.01.21', '19.01.21'),
(64, '', 8, 'version', '1611065194689', '', '19.01.21', '19.01.21'),
(0, '', 9, 'version', '1611065226914', '\n &lt;p&gt;//Prénom NOM//&lt;/p&gt;\n &lt;p&gt;//Adresse postale 1//&lt;/p&gt;\n &lt;p&gt;//Code postal 1 COMMUNE 1//&lt;/p&gt;\n &lt;p&gt;// 33(0) 6 00 00 00 00//&lt;/p&gt;\n &lt;p&gt;//moi@mondomaine.com//&lt;/p&gt;\n &lt;br&gt;\n &lt;p class=&quot;text-right&quot;&gt;//Employeur//&lt;/p&gt;\n &lt;p class=&quot;text-right&quot;&gt;//Adresse postale 2//&lt;/p&gt;\n &lt;p class=&quot;text-right&quot;&gt;//Code postal 2 COMMUNE 2//&lt;/p&gt;\n &lt;br&gt;\n &lt;p class=&quot;text-right&quot;&gt;//COMMUNE 1, le Date//&lt;/p&gt;\n &lt;br&gt;\n &lt;p&gt;Objet : Candidature au poste de //EMPLOI//&lt;/p&gt;\n &lt;br&gt;\n &lt;p&gt;//Madame, Monsieur,// &lt;/p&gt;\n &lt;br&gt;\n &lt;p class=&quot;text-justify&quot;&gt;Etant actuellement à la recherche d’un emploi, je me permets de vous proposer ma candidature au poste de //emploi//.&lt;/p&gt;\n &lt;p class=&quot;text-justify&quot;&gt;Mon profil correspond en effet à l’offre d’emploi //Référence de l\'offre// diffusée par //Source de l\'offre//. Ma formation // Mon expérience dans le domaine de //l\'activité concernée// m\'a permis d\'acquérir les connaissances et les savoir-faire indispensables pour assurer cette mission.&lt;/p&gt;\n &lt;p class=&quot;text-justify&quot;&gt;//Décrire en quelques phrases ses atouts en lien avec le poste visé : par exemple une formation spécialisée ou très avancée, un domaine de prédilection, une expérience significative et probante, ...//&lt;/p&gt;\n &lt;p class=&quot;text-justify&quot;&gt;Rigoureux, attentif et conscient des aléas du métier, je suis capable de répondre aux imprévus de façon responsable et en toute autonomie.&lt;/p&gt;\n &lt;p class=&quot;text-justify&quot;&gt;Intégrer votre équipe serait pour ma carrière professionnelle une belle opportunité, qui me permettrait d\'exprimer pleinement mon potentiel.&lt;/p&gt;\n &lt;p class=&quot;text-justify&quot;&gt;Je suis actuellement disponible pour une nouvelle collaboration : je me tiens donc à votre disposition pour organiser une rencontre et discuter de votre projet de recrutement. Pour toute information complémentaire quant à mon parcours, n\'hésitez pas à m\'adresser un e-mail ou à m\'appeler directement.&lt;/p&gt;\n &lt;p class=&quot;text-justify&quot;&gt;Vous remerciant de l\'attention portée à ma demande, je vous prie d\'agréer, //Madame, Monsieur,// l’expression de mes salutations respectueuses.&lt;/p&gt;\n &lt;br&gt;\n &lt;p class=&quot;text-right&quot;&gt;Signature&lt;/p&gt;\n', '19.01.21', '19.01.21'),
(0, '1611138554813', 10, 'version', 'Original', '\n &lt;p&gt;//Prénom NOM//&lt;/p&gt;\n &lt;p&gt;//Adresse postale 1//&lt;/p&gt;\n &lt;p&gt;//Code postal 1 COMMUNE 1//&lt;/p&gt;\n &lt;p&gt;// 33(0) 6 00 00 00 00//&lt;/p&gt;\n &lt;p&gt;//moi@mondomaine.com//&lt;/p&gt;\n &lt;br&gt;\n &lt;p class=&quot;text-right&quot;&gt;//Employeur//&lt;/p&gt;\n &lt;p class=&quot;text-right&quot;&gt;//Adresse postale 2//&lt;/p&gt;\n &lt;p class=&quot;text-right&quot;&gt;//Code postal 2 COMMUNE 2//&lt;/p&gt;\n &lt;br&gt;\n &lt;p class=&quot;text-right&quot;&gt;//COMMUNE 1, le Date//&lt;/p&gt;\n &lt;br&gt;\n &lt;p&gt;Objet : Candidature au poste de //EMPLOI//&lt;/p&gt;\n &lt;br&gt;\n &lt;p&gt;//Madame, Monsieur,// &lt;/p&gt;\n &lt;br&gt;\n &lt;p class=&quot;text-justify&quot;&gt;Etant actuellement à la recherche d’un emploi, je me permets de vous proposer ma candidature au poste de //emploi//.&lt;/p&gt;\n &lt;p class=&quot;text-justify&quot;&gt;Mon profil correspond en effet à l’offre d’emploi //Référence de l\'offre// diffusée par //Source de l\'offre//. Ma formation // Mon expérience dans le domaine de //l\'activité concernée// m\'a permis d\'acquérir les connaissances et les savoir-faire indispensables pour assurer cette mission.&lt;/p&gt;\n &lt;p class=&quot;text-justify&quot;&gt;//Décrire en quelques phrases ses atouts en lien avec le poste visé : par exemple une formation spécialisée ou très avancée, un domaine de prédilection, une expérience significative et probante, ...//&lt;/p&gt;\n &lt;p class=&quot;text-justify&quot;&gt;Rigoureux, attentif et conscient des aléas du métier, je suis capable de répondre aux imprévus de façon responsable et en toute autonomie.&lt;/p&gt;\n &lt;p class=&quot;text-justify&quot;&gt;Intégrer votre équipe serait pour ma carrière professionnelle une belle opportunité, qui me permettrait d\'exprimer pleinement mon potentiel.&lt;/p&gt;\n &lt;p class=&quot;text-justify&quot;&gt;Je suis actuellement disponible pour une nouvelle collaboration : je me tiens donc à votre disposition pour organiser une rencontre et discuter de votre projet de recrutement. Pour toute information complémentaire quant à mon parcours, n\'hésitez pas à m\'adresser un e-mail ou à m\'appeler directement.&lt;/p&gt;\n &lt;p class=&quot;text-justify&quot;&gt;Vous remerciant de l\'attention portée à ma demande, je vous prie d\'agréer, //Madame, Monsieur,// l’expression de mes salutations respectueuses.&lt;/p&gt;\n &lt;br&gt;\n &lt;p class=&quot;text-right&quot;&gt;Signature&lt;/p&gt;\n', '20.01.21', '20.01.21'),
(0, '1611138554813', 11, 'version', 'Version2', '\n &lt;p&gt;//Prénom NOM//&lt;/p&gt;\n &lt;p&gt;//Adresse postale 1//&lt;/p&gt;\n &lt;p&gt;//Code postal 1 COMMUNE 1//&lt;/p&gt;\n &lt;p&gt;// 33(0) 6 00 00 00 00//&lt;/p&gt;\n &lt;p&gt;//moi@mondomaine.com//&lt;/p&gt;\n &lt;br&gt;\n &lt;p class=&quot;text-right&quot;&gt;/McDonald\'s&lt;/p&gt;\n &lt;p class=&quot;text-right&quot;&gt;//ARue de la liberté//&lt;/p&gt;\n &lt;p class=&quot;text-right&quot;&gt;//Code postal 2 COMMUNE 2//&lt;/p&gt;\n &lt;br&gt;\n &lt;p class=&quot;text-right&quot;&gt;//COMMUNE 1, le Date//&lt;/p&gt;\n &lt;br&gt;\n &lt;p&gt;Objet : Candidature au poste de //EMPLOI//&lt;/p&gt;\n &lt;br&gt;\n &lt;p&gt;//Madame, Monsieur,// &lt;/p&gt;\n &lt;br&gt;\n &lt;p class=&quot;text-justify&quot;&gt;Etant actuellement à la recherche d’un emploi, je me permets de vous proposer ma candidature au poste de //emploi//.&lt;/p&gt;\n &lt;p class=&quot;text-justify&quot;&gt;Mon profil correspond en effet à l’offre d’emploi //Référence de l\'offre// diffusée par //Source de l\'offre//. Ma formation // Mon expérience dans le domaine de //l\'activité concernée// m\'a permis d\'acquérir les connaissances et les savoir-faire indispensables pour assurer cette mission.&lt;/p&gt;\n &lt;p class=&quot;text-justify&quot;&gt;//Décrire en quelques phrases ses atouts en lien avec le poste visé : par exemple une formation spécialisée ou très avancée, un domaine de prédilection, une expérience significative et probante, ...//&lt;/p&gt;\n &lt;p class=&quot;text-justify&quot;&gt;Rigoureux, attentif et conscient des aléas du métier, je suis capable de répondre aux imprévus de façon responsable et en toute autonomie.&lt;/p&gt;\n &lt;p class=&quot;text-justify&quot;&gt;Intégrer votre équipe serait pour ma carrière professionnelle une belle opportunité, qui me permettrait d\'exprimer pleinement mon potentiel.&lt;/p&gt;\n &lt;p class=&quot;text-justify&quot;&gt;Je suis actuellement disponible pour une nouvelle collaboration : je me tiens donc à votre disposition pour organiser une rencontre et discuter de votre projet de recrutement. Pour toute information complémentaire quant à mon parcours, n\'hésitez pas à m\'adresser un e-mail ou à m\'appeler directement.&lt;/p&gt;\n &lt;p class=&quot;text-justify&quot;&gt;Vous remerciant de l\'attention portée à ma demande, je vous prie d\'agréer, //Madame, Monsieur,// l’expression de mes salutations respectueuses.&lt;/p&gt;\n &lt;br&gt;\n &lt;p class=&quot;text-right&quot;&gt;Signature&lt;/p&gt;\n', '20.01.21', '20.01.21'),
(0, '1611138554813', 12, 'version', 'Version3', '\n &lt;p&gt;//Prénom NOM//&lt;/p&gt;\n &lt;p&gt;//Adresse postale 1//&lt;/p&gt;\n &lt;p&gt;//Code postal 1 COMMUNE 1//&lt;/p&gt;\n &lt;p&gt;// 33(0) 6 00 00 00 00//&lt;/p&gt;\n &lt;p&gt;//moi@mondomaine.com//&lt;/p&gt;\n &lt;br&gt;\n &lt;p class=&quot;text-right&quot;&gt;/Quick&lt;/p&gt;\n &lt;p class=&quot;text-right&quot;&gt;//Arue de la libération//&lt;/p&gt;\n &lt;p class=&quot;text-right&quot;&gt;//Code postal 2 COMMUNE 2//&lt;/p&gt;\n &lt;br&gt;\n &lt;p class=&quot;text-right&quot;&gt;//COMMUNE 1, le Date//&lt;/p&gt;\n &lt;br&gt;\n &lt;p&gt;Objet : Candidature au poste de //EMPLOI//&lt;/p&gt;\n &lt;br&gt;\n &lt;p&gt;//Madame, Monsieur,// &lt;/p&gt;\n &lt;br&gt;\n &lt;p class=&quot;text-justify&quot;&gt;Etant actuellement à la recherche d’un emploi, je me permets de vous proposer ma candidature au poste de //emploi//.&lt;/p&gt;\n &lt;p class=&quot;text-justify&quot;&gt;Mon profil correspond en effet à l’offre d’emploi //Référence de l\'offre// diffusée par //Source de l\'offre//. Ma formation // Mon expérience dans le domaine de //l\'activité concernée// m\'a permis d\'acquérir les connaissances et les savoir-faire indispensables pour assurer cette mission.&lt;/p&gt;\n &lt;p class=&quot;text-justify&quot;&gt;//Décrire en quelques phrases ses atouts en lien avec le poste visé : par exemple une formation spécialisée ou très avancée, un domaine de prédilection, une expérience significative et probante, ...//&lt;/p&gt;\n &lt;p class=&quot;text-justify&quot;&gt;Rigoureux, attentif et conscient des aléas du métier, je suis capable de répondre aux imprévus de façon responsable et en toute autonomie.&lt;/p&gt;\n &lt;p class=&quot;text-justify&quot;&gt;Intégrer votre équipe serait pour ma carrière professionnelle une belle opportunité, qui me permettrait d\'exprimer pleinement mon potentiel.&lt;/p&gt;\n &lt;p class=&quot;text-justify&quot;&gt;Je suis actuellement disponible pour une nouvelle collaboration : je me tiens donc à votre disposition pour organiser une rencontre et discuter de votre projet de recrutement. Pour toute information complémentaire quant à mon parcours, n\'hésitez pas à m\'adresser un e-mail ou à m\'appeler directement.&lt;/p&gt;\n &lt;p class=&quot;text-justify&quot;&gt;Vous remerciant de l\'attention portée à ma demande, je vous prie d\'agréer, //Madame, Monsieur,// l’expression de mes salutations respectueuses.&lt;/p&gt;\n &lt;br&gt;\n &lt;p class=&quot;text-right&quot;&gt;Signature&lt;/p&gt;\n', '20.01.21', '20.01.21');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
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
(8, 'user', 'Testeur10', '27ac2beeeb657eeeb4392d23554915b771d5b9445baf9e374a8e17ba8f1415074228b8f7f9613f3e516545d1fb00670fb297cd3b3ce122ac3b208abd3da75849', 'FR', '2021-01-10 14:10:35'),
(63, 'user', 'Testeur2021', '3f3265aa5a50835612418c9e1d8893350405d5bd77210768985a691cda13ecb83e88b09fc1910af89437399a7c2c485ae472d79f4c132544aadb0cae9870156d', 'FR', '2021-01-19 11:18:37'),
(64, 'user', 'Testeur13000', 'dd5c606b29464219255bca57e47db77e225d1df3b55c64ab0b118273633fae7dd5818817b6016560901f1b34f344c8919e808fb03c4853bba56478e50525d6be', 'FR', '2021-01-19 11:19:57'),
(65, 'user', 'Nouveau01', 'cd1a410acfb0241ab6d75e6ec95af08d87171cd4c359161065ba060b41563bb1fdb95cc4aed8045408b6d12a58bbac486b1325d30244adf8a0cd765c52283e19', 'FR', '2021-01-19 15:07:36'),
(66, 'user', 'Nouveau007', 'ee53d71cdc6967f6068ce790c1696457f130496b8dfbaaac5cace67c64ebf4139b21311c619647d8b99aa225920b6f727a6b985b16032fa9452e346bb105fc4e', 'FR', '2021-01-19 17:31:56'),
(69, 'user', 'Testeur13', '1f6733b2e32b83c27ac5feae52f0e7e73a04788ec3e03573d1fc48f3d8375eca59c6163454a99c596a6f7ebbc342300407fcecf5f1659874bd3e627cf0f3127f', 'FR', '2021-01-20 11:28:46');

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
  MODIFY `letter_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
