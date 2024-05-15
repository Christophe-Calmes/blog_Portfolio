-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 15 mai 2024 à 14:48
-- Version du serveur : 8.0.36-0ubuntu0.22.04.1
-- Version de PHP : 8.1.2-1ubuntu2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `xgyd0647_grainestech`
--

-- --------------------------------------------------------

--
-- Structure de la table `banIP`
--

CREATE TABLE `banIP` (
  `id` int NOT NULL,
  `BanIP` varchar(60) NOT NULL,
  `dateCreat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `dataSite`
--

CREATE TABLE `dataSite` (
  `idDataSite` int NOT NULL,
  `titre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `sousTitre` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `titreHTML` varchar(120) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `dataSite`
--

INSERT INTO `dataSite` (`idDataSite`, `titre`, `sousTitre`, `description`, `titreHTML`) VALUES
(1, 'Graines-Local', 'Graines Projet', 'Projet graines', 'Graines-Local');

-- --------------------------------------------------------

--
-- Structure de la table `journaux`
--

CREATE TABLE `journaux` (
  `idConnexion` int NOT NULL,
  `ipUser` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `idUser` int NOT NULL DEFAULT '0',
  `login` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `mdpHacker` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `dateHeure` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `okConnexion` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `journaux`
--

INSERT INTO `journaux` (`idConnexion`, `ipUser`, `idUser`, `login`, `mdpHacker`, `dateHeure`, `okConnexion`) VALUES
(1, '::1', 1, 'Admin', '0', '2024-05-13 16:16:17', 1),
(2, '::1', 1, 'Admin', '0', '2024-05-15 11:15:26', 1),
(3, '::1', 1, 'Admin', '0', '2024-05-15 13:05:41', 1),
(4, '::1', 0, 'Membre', 'christophe', '2024-05-15 14:32:16', 0),
(5, '::1', 0, 'Membres', 'Christophe', '2024-05-15 14:32:29', 0),
(6, '::1', 57, 'Membre', '0', '2024-05-15 14:33:21', 1),
(7, '::1', 0, 'Membre', 'cristophe', '2024-05-15 14:34:42', 0),
(8, '::1', 57, 'Membre', '0', '2024-05-15 14:34:51', 1),
(9, '::1', 1, 'Admin', '0', '2024-05-15 14:38:09', 1);

-- --------------------------------------------------------

--
-- Structure de la table `menuNav`
--

CREATE TABLE `menuNav` (
  `idMenuDeroulant` int NOT NULL,
  `titreMenu` varchar(80) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `menuNav`
--

INSERT INTO `menuNav` (`idMenuDeroulant`, `titreMenu`) VALUES
(1, 'Administration du site'),
(6, 'Administration User'),
(12, 'News'),
(13, 'Admin Evenements'),
(15, 'Evenements'),
(16, 'Admin Réserver tables'),
(17, 'Reservations'),
(20, 'Firewall');

-- --------------------------------------------------------

--
-- Structure de la table `modules`
--

CREATE TABLE `modules` (
  `id` int NOT NULL,
  `module` varchar(30) NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `modules`
--

INSERT INTO `modules` (`id`, `module`, `valide`) VALUES
(1, 'Graines', 1);

-- --------------------------------------------------------

--
-- Structure de la table `navigation`
--

CREATE TABLE `navigation` (
  `idNav` int NOT NULL,
  `nomNav` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `cheminNav` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `menuVisible` tinyint(1) NOT NULL,
  `zoneMenu` int NOT NULL,
  `ordre` tinyint NOT NULL,
  `niveau` tinyint(1) NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT '1',
  `deroulant` tinyint NOT NULL DEFAULT '0',
  `targetRoute` varchar(22) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `idModule` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `navigation`
--

INSERT INTO `navigation` (`idNav`, `nomNav`, `cheminNav`, `menuVisible`, `zoneMenu`, `ordre`, `niveau`, `valide`, `deroulant`, `targetRoute`, `idModule`) VALUES
(72, 'connexion', 'modules/connexion/connexion.php', 1, 0, 10, 0, 1, 0, '924163255021', 1),
(73, 'inscription', 'modules/users/inscription.php', 0, 0, 0, 0, 1, 0, '3936150651845', 1),
(74, 'Deconnexion', 'modules/securiter/deconnexion.php', 1, 0, 20, 2, 1, 1, '855837861495', 1),
(75, 'Deconnexion', 'modules/securiter/deconnexion.php', 1, 0, 20, 1, 1, 0, '8085475761', 1),
(76, 'Administration du site', 'modules/navigation/erreurNav.php', 1, 0, 1, 2, 1, 1, '22416555867', 1),
(77, 'Ajout lien de nav', 'modules/navigation/menuAdmin/creationNouveuMenu.php', 1, 1, 1, 2, 1, 0, '5541000556918843', 1),
(78, 'Titres et SEO', 'modules/dataSite/titreInfo.php', 1, 1, 2, 2, 1, 0, '20604900566599', 1),
(81, 'Brassage des liens', 'modules/navigation/menuAdmin/dynamique.php', 1, 1, 2, 2, 1, 0, '9616455148404562', 1),
(82, 'Ajout menu dÃ©roulant', 'modules/navigation/menuAdmin/ajoutMenuDeroulant.php', 1, 1, 2, 2, 0, 1, '47566064824355818252', 1),
(85, 'Administration User', 'modules/navigation/erreurNav.php', 1, 0, 1, 2, 1, 6, '59863564585357959520', 1),
(86, 'Users Actif', 'modules/users/administration/droitUser.php', 1, 6, 1, 2, 1, 6, '7099416997', 1),
(87, 'Route Form', 'modules/navigation/menuAdmin/ajoutRouteForm.php', 1, 1, 2, 2, 1, 0, '64965184445975', 1),
(88, 'Users Anciens ', 'modules/users/administration/droitUserNonValide.php', 1, 6, 2, 2, 1, 0, '93444679269', 1),
(89, 'Profil', 'modules/users/administration/profilUser.php', 1, 0, 19, 1, 1, 0, '6741415776754629', 1),
(90, 'Profil', 'modules/users/administration/profilUser.php', 1, 0, 1, 2, 1, 0, '56411654249', 1),
(91, 'Journeaux de log', 'modules/journaux/journaux.php', 1, 20, 1, 2, 1, 0, '0943236086', 1),
(92, 'Admin nav', 'modules/navigation/menuAdmin/adminMenu.php', 1, 1, 2, 2, 1, 0, '60328665852993', 1),
(93, 'modification lien nav', 'modules/navigation/menuAdmin/modificationNav.php', 0, 0, 0, 2, 1, 0, '65966851133', 1),
(95, 'Admin modules', 'modules/navigation/menuAdmin/administrationModules.php', 0, 1, 7, 2, 1, 1, '59673567026', 1),
(99, 'Add roles', 'modules/users/administration/addRole.php', 1, 6, 3, 2, 0, 0, '07235456649081059126', 1),
(100, 'Deco', 'modules/securiter/deconnexion.php', 1, 0, 20, 3, 1, 0, '64550679919', 1),
(101, 'Profil', 'modules/users/administration/profilUser.php', 1, 0, 19, 3, 1, 0, '766233770410', 1),
(104, 'cgu', 'modules/cgu/cgu.php', 0, 0, 0, 1, 1, 0, '8136843676556156', 1),
(136, 'cgu', 'modules/cgu/cgu.php', 0, 0, 0, 0, 1, 0, '81368436765', 1),
(137, 'cguUser', 'modules/cgu/cgu.php', 0, 0, 0, 1, 1, 0, '05454952064666', 1),
(138, 'cguUser', 'modules/cgu/cgu.php', 0, 0, 0, 3, 1, 0, '1866765962915445', 1),
(140, 'Lost Password', 'modules/users/administration/lostPassword.php', 0, 0, 0, 0, 1, 0, '65670654491780', 1),
(141, 'Inscription', 'modules/users/inscription.php', 1, 0, 1, 0, 1, 0, '44415246762', 1),
(148, 'Firewall', 'modules/navigation/erreurNav.php', 1, 0, 2, 2, 1, 20, '86369125662566764069', 1),
(150, 'IP ban panel', 'modules/journaux/ipBanPanel.php', 1, 20, 2, 2, 1, 0, '517485373345237', 1),
(151, 'Accueil', 'modules/navigation/pageGeneral.php', 1, 0, 0, 0, 1, 0, '5078449774944231', 1),
(152, 'Accueil', 'modules/navigation/pageGeneral.php', 1, 0, 0, 1, 1, 0, '4985074639116634', 1),
(153, 'Accueil', 'modules/navigation/pageGeneral.php', 1, 0, 0, 2, 1, 0, '1688252268455738', 1);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `idRole` int NOT NULL,
  `typeRole` varchar(15) NOT NULL,
  `accreditation` tinyint DEFAULT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`idRole`, `typeRole`, `accreditation`, `valide`) VALUES
(1, 'Visiteur', 0, 1),
(4, 'Membre', 1, 1),
(6, 'Administrateur', 2, 1),
(9, 'Gestionnaire', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `routageForm`
--

CREATE TABLE `routageForm` (
  `idForm` int NOT NULL,
  `chemin` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `securiter` tinyint(1) NOT NULL DEFAULT '0',
  `valide` tinyint(1) NOT NULL DEFAULT '1',
  `route` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `idModule` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `routageForm`
--

INSERT INTO `routageForm` (`idForm`, `chemin`, `securiter`, `valide`, `route`, `idModule`) VALUES
(1, 'modules/users/CUD/Create/inscriptionUser.php', 0, 1, '551408341877136', 1),
(2, 'modules/securiter/connexionUser.php', 0, 1, '66954651663687', 1),
(3, 'modules/users/CUD/Update/activationUser.php', 0, 1, '48618046044649533', 1),
(4, 'modules/navigation/CUD/Create/addLien.php', 2, 1, '5716669697473965', 1),
(5, 'modules/dataSite/CUD/Update/updateDataSite.php', 2, 1, '64156369456621144', 1),
(6, 'modules/navigation/CUD/Create/addMenusDeroulant.php', 2, 1, '545161771236409', 1),
(7, 'modules/navigation/CUD/Create/addRouteForm.php', 2, 1, '5891138947360204015', 1),
(14, 'modules/users/CUD/Update/modAdminUser.php', 2, 1, '342087460506643463', 1),
(16, 'modules/users/CUD/Update/emailUser.php', 1, 1, '89817559008601452638', 1),
(17, 'modules/users/CUD/Update/loginUser.php', 1, 1, '95594386253466414', 1),
(18, 'modules/users/CUD/Update/mdpUser.php', 1, 1, '788450930591896', 1),
(19, 'modules/journaux/deleteLog.php', 2, 1, '61006592866856742', 1),
(20, 'modules/navigation/CUD/update/updateLienNav.php', 2, 1, '2864450747859992', 1),
(21, 'modules/navigation/CUD/Delete/deleteLienNav.php', 2, 1, '48405524725496210664', 1),
(22, 'modules/users/CUD/Update/desincriptionUser.php', 1, 1, '1564599553267671966', 1),
(23, 'modules/navigation/CUD/update/updateModule.php', 2, 1, '05673826948244028140', 1),
(25, 'modules/navigation/CUD/Create/addModule.php', 2, 1, '451244597442559258', 1),
(29, 'modules/users/CUD/Create/addRoles.php', 2, 1, '48824432643482466', 1),
(56, 'modules/users/CUD/Update/sendToken.php', 0, 1, '6603744474165316', 1),
(57, 'modules/users/CUD/Update/updatePassword.php', 0, 1, '428548561797064', 1),
(63, 'modules/journaux/CD/Delete/deleteBanIP.php', 2, 1, '40556485748456469226', 1),
(64, 'modules/journaux/CD/Creat/addIPBAN.php', 2, 1, '69928516356494449456', 1),
(65, 'modules/journaux/CD/Creat/addIPBANfromJounaux.php', 2, 1, '12985096637550135515', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUser` int NOT NULL,
  `token` varchar(16) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `login` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `mdp` varchar(120) COLLATE utf8mb4_general_ci NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT '1',
  `role` tinyint(1) NOT NULL DEFAULT '1',
  `dateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `token`, `email`, `prenom`, `nom`, `login`, `mdp`, `valide`, `role`, `dateCreation`) VALUES
(1, 'RtN7kFSX0cubMRSQ', 'christophe.calmes2020@laposte.net', 'Christophe', 'Calmes', 'Admin', '$2y$10$oADkGPsXhTD1m1.vawEEJevfSC1BwODMOuCHCntUrBQgpV5TmLy6S', 1, 2, '2022-06-12 14:26:13'),
(57, 'w2jbaXpwin', 'christophe.calmes22@gmail.com', 'Christophe', 'Calmes', 'Membre', '$2y$10$XyTgD4YJUyRXmYb5rJ7IGeCw5c..lxXVGNCEw2XdpS6GOtOfzvGfW', 1, 1, '2024-05-15 14:33:10');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `banIP`
--
ALTER TABLE `banIP`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `dataSite`
--
ALTER TABLE `dataSite`
  ADD PRIMARY KEY (`idDataSite`);

--
-- Index pour la table `journaux`
--
ALTER TABLE `journaux`
  ADD PRIMARY KEY (`idConnexion`);

--
-- Index pour la table `menuNav`
--
ALTER TABLE `menuNav`
  ADD PRIMARY KEY (`idMenuDeroulant`);

--
-- Index pour la table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `navigation`
--
ALTER TABLE `navigation`
  ADD PRIMARY KEY (`idNav`),
  ADD KEY `lierModule` (`idModule`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRole`);

--
-- Index pour la table `routageForm`
--
ALTER TABLE `routageForm`
  ADD PRIMARY KEY (`idForm`),
  ADD KEY `lienModule` (`idModule`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `banIP`
--
ALTER TABLE `banIP`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `dataSite`
--
ALTER TABLE `dataSite`
  MODIFY `idDataSite` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `journaux`
--
ALTER TABLE `journaux`
  MODIFY `idConnexion` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `menuNav`
--
ALTER TABLE `menuNav`
  MODIFY `idMenuDeroulant` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `navigation`
--
ALTER TABLE `navigation`
  MODIFY `idNav` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `idRole` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `routageForm`
--
ALTER TABLE `routageForm`
  MODIFY `idForm` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `navigation`
--
ALTER TABLE `navigation`
  ADD CONSTRAINT `lierModule` FOREIGN KEY (`idModule`) REFERENCES `modules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `routageForm`
--
ALTER TABLE `routageForm`
  ADD CONSTRAINT `lienModule` FOREIGN KEY (`idModule`) REFERENCES `modules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
