-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 06 mai 2022 à 12:40
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog_islande`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url_image` varchar(255) NOT NULL,
  `alt_image` varchar(255) NOT NULL,
  `accroche` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `id_category` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `url_image`, `alt_image`, `accroche`, `content`, `id_category`, `created_at`) VALUES
(34, 'Randonnées au cœur de L\'Islande', 'app/Public/images/6270316ceb2244.99290253.webp', 'Les montagnes de Landmannalaugar dans le centre de l\'Islande', 'Bienvenue à Landmannalaugar!', 'Nulla porttitor accumsan tincidunt. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Nulla quis lorem ut libero malesuada feugiat. Donec sollicitudin molestie malesuada.\r\n\r\nPellentesque in ipsum id orci porta dapibus. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.', 0, '2022-05-02 21:30:52'),
(35, 'A la découverte de la Route N°1', 'app/Public/images/route-n°1_islande.webp', 'route principale de l\'Islande, qui fait le tour de l\'île', 'Voici la route N°1 islandaise qui fait le tour de l\'Île', 'Nulla porttitor accumsan tincidunt. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Nulla quis lorem ut libero malesuada feugiat. Donec sollicitudin molestie malesuada.\r\n\r\nPellentesque in ipsum id orci porta dapibus. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.', 0, '2022-05-02 21:38:25'),
(36, 'Le Macareux, l\'emblème de l\'Islande!', 'app/Public/images/macareux-islandais.webp', 'le macareux est un petit oiseau islandais', 'Le macareux est l\'oiseau de mer préféré des humains!', 'Quisque velit nisi, pretium ut lacinia in, elementum id enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\n\r\nProin eget tortor risus. Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta. Donec rutrum congue leo eget malesuada.', 0, '2022-05-02 22:09:25'),
(37, 'La nuit tombe, les Aurores Boréales sont de sorties', 'app/Public/images/aurores-boreales_islande.webp', 'aurores boréales magnifiques!', 'Vite, Elles arrivent!', 'Quisque velit nisi, pretium ut lacinia in, elementum id enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\n\r\nProin eget tortor risus. Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta. Donec rutrum congue leo eget malesuada.', 0, '2022-05-02 22:09:25'),
(38, 'Cascade en pagaille !', 'app/Public/images/cascade_islande.webp', 'cascades de seljalandsfoss', 'Voici la chute d\'eau de seljalandsfoss dans le sud du pays', 'Quisque velit nisi, pretium ut lacinia in, elementum id enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\n\r\nProin eget tortor risus. Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta. Donec rutrum congue leo eget malesuada.', 0, '2022-05-02 22:09:25'),
(39, 'Vous avez dit des Poneys?', 'app/Public/images/chevaux-islandais.webp', 'chevaux islandais en hiver', 'Non, ce sont bien des chevaux mais de petites tailles', 'Quisque velit nisi, pretium ut lacinia in, elementum id enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\n\r\nProin eget tortor risus. Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta. Donec rutrum congue leo eget malesuada.', 0, '2022-05-02 22:09:25'),
(40, 'Marche sous une chute d\'eau', 'app/Public/images/chutes-eau_Seljalandsfoss.webp', 'marche sous une impressionnante cascade islandaise', 'marche sous une impressionnante cascade islandaise', 'Quisque velit nisi, pretium ut lacinia in, elementum id enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\n\r\nProin eget tortor risus. Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta. Donec rutrum congue leo eget malesuada.', 0, '2022-05-02 22:09:25'),
(41, 'Oui, le paradis existe!', 'app/Public/images/jokulsarlon-glaciers_islande.webp', 'glaciers de Jokulsarlon', 'Bienvenue à Jokulsarlon, lieu de tournage de James Bond!', 'Quisque velit nisi, pretium ut lacinia in, elementum id enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\n\r\nProin eget tortor risus. Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta. Donec rutrum congue leo eget malesuada.', 0, '2022-05-02 22:09:25'),
(42, 'Randonnées dans les montagnes de Kirkjufell', 'app/Public/images/montagne_kirkjufell_islande.webp', 'Randonnées dans les montagnes de Kirkjufell', 'Voici la très photogénique Kirkjufell, à l\'ouest de l\'Islande', 'Quisque velit nisi, pretium ut lacinia in, elementum id enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\n\r\nProin eget tortor risus. Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta. Donec rutrum congue leo eget malesuada.', 0, '2022-05-02 22:09:25'),
(43, 'L\' attachement de la population envers les moutons islandais', 'app/Public/images/moutons-islandais.webp', 'troupeau de moutons islandais', 'Ne les approchez pas de trop près...', 'Quisque velit nisi, pretium ut lacinia in, elementum id enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\n\r\nProin eget tortor risus. Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta. Donec rutrum congue leo eget malesuada.', 0, '2022-05-02 22:09:25'),
(44, 'Magnifiques paysages à l\'est de l\'Île', 'app/Public/images/paysages-verdoyants_islande.webp', 'paysages verdoyants, est de l\'Islande', 'Pause méritée avec cette vue qui amène à un peu de méditation', 'Quisque velit nisi, pretium ut lacinia in, elementum id enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\n\r\nProin eget tortor risus. Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta. Donec rutrum congue leo eget malesuada.', 0, '2022-05-02 22:09:25'),
(45, 'Le Volcan Eyjafjoll en Eruption!', 'app/Public/images/volcan-Eyjafjallajökull_islande.webp', 'Le Volcan Eyjafjoll en Eruption!', 'Voici le responsable qui a paralysé l\'Europe en 2010', 'Quisque velit nisi, pretium ut lacinia in, elementum id enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\n\r\nProin eget tortor risus. Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta. Donec rutrum congue leo eget malesuada.', 0, '2022-05-02 22:09:25');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name_Cat` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name_Cat`, `slug`) VALUES
(1, 'cuisine', 'cuisine'),
(2, 'voyage', 'voyage'),
(3, 'randonnée', 'randonnée');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` bigint(20) NOT NULL,
  `commentaire` text NOT NULL,
  `id_article` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_article`, `id_user`, `created_at`) VALUES
(1, 'mon premier commentaire', 5, 1, '2022-04-13 06:45:11'),
(2, 'mon second commentaire', 30, 1, '2022-04-13 06:49:52'),
(3, 'troisiseme comment', 30, 1, '2022-04-13 06:50:02'),
(4, 'test', 30, 2, '2022-04-13 06:49:58'),
(5, 'fdsdfds', 31, 2, '2022-04-13 09:01:38'),
(6, 'test 2!', 31, 2, '2022-04-13 09:01:51'),
(7, 'test 3', 31, 2, '2022-04-13 09:50:07'),
(8, 'Bonjour!!', 27, 1, '2022-04-14 08:05:50'),
(9, 'test', 27, 1, '2022-04-14 08:15:54'),
(10, 'Hello', 26, 1, '2022-04-14 08:18:44'),
(13, 'test', 26, 1, '0000-00-00 00:00:00'),
(15, 'test<br />\r\n', 26, 1, '2022-04-14 08:37:11'),
(16, 'test', 27, 2, '2022-04-14 13:48:56'),
(17, 'bonjour, c\'est toto!<br />\r\n', 27, 3, '2022-04-14 15:42:31'),
(18, 'fdfsfs', 27, 2, '2022-04-15 10:17:05'),
(19, 'fdsfss', 1, 1, '2022-05-01 13:00:40'),
(20, 'fds', 24, 1, '2022-05-01 13:29:16'),
(29, 'Ah les Macareux!<br />\r\nBravo pour les photos!', 36, 2, '2022-05-02 20:14:06'),
(30, 'Top!', 36, 2, '2022-05-02 20:22:10'),
(32, 'Vive l\'Islande!', 41, 18, '2022-05-05 20:30:48'),
(33, 'Le Volcan est encore chaud!!', 45, 18, '2022-05-05 20:31:12'),
(34, 'Magnifiques Aurores Boréales!!', 37, 18, '2022-05-05 20:53:36'),
(39, 'Impressionnant!', 40, 18, '2022-05-05 21:26:36');

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `objet` text NOT NULL,
  `msg` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`id`, `lastname`, `firstname`, `mail`, `phone`, `objet`, `msg`, `created_at`) VALUES
(10, 'fr', 'fr', 'lolo@gmail.com', '0607080900', 'fr', 'fr', '2022-05-02 19:02:45'),
(11, 'lala', 'lala', 'lala@gmail.com', '0607080900', 'test contact', 'Bonjour à vous', '2022-05-06 09:26:18'),
(12, 'bob', 'bob', 'bob@gmail.com', '0607080900', 'testcreation', 'hello', '2022-05-06 10:27:59');

-- --------------------------------------------------------

--
-- Structure de la table `presentation`
--

CREATE TABLE `presentation` (
  `id` int(11) NOT NULL,
  `url_image` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `alt_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `presentation`
--

INSERT INTO `presentation` (`id`, `url_image`, `content`, `alt_image`) VALUES
(1, 'app/Public/images/aurores-boreales_Islande.webp', 'Je m\'appelle John, je suis passionné de voyage et après vécu dans plusieurs pays, il y en a un qui a retenu particulièrement mon attention: L\'Islande!\r\n<nl2br>\r\nJ\'ai donc décidé de créer mon propre Blog de voyage, spécialisé sur cette magnifique Île qu\'est l\'Islande afin de t\'orienter au mieux pour que ton voyage se passe dans de bonnes conditions.\r\n\r\nViens faire un tour sur les nombreux articles en lien avec les paysages, la culture ou les habitants de ce pays qui ne te laissera pas indifférent!', 'Magnifiques Aurores Boréales en Islande');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `mail`, `password`, `role`, `created_at`) VALUES
(1, 'Paulo', 'paulo@gmail.com', '$2y$10$ElKzotWvQUFvIWTdLIk5uur2E1jlNNl4DHfPpJqQqn2/2GT.mml/y', 1, NULL),
(2, 'lolo', 'lolo@gmail.com', '$2y$10$dA7gm9gZH/STcvUp0zttfObffomNbwyjHHpAPtv.4DgrrWg/cJk6W', 0, NULL),
(3, 'toto', 'toto@gmail.com', '$2y$10$KvgoOtA1clXwLlmeSI1XFOo0k80.LJKj9XQH5wB3rWJEd/8OpbKX6', 0, NULL),
(9, 'momo', 'momo@gmail.com', 'momo', 0, '2022-04-18 09:45:05'),
(10, 'roro', 'roro@gmail.com', '$2y$10$vBrY9QQIfsLs2AOzwVKYLOfPWvrgWfFqu2YduLhfJK6bUAzxlkpd6', 0, '2022-04-19 07:35:15'),
(11, 'nono', 'nono@gmail.com', '$2y$10$dNw8wHbb7go9U.vezXkb.OI5thXqZzASKytIDXCQtmSi8ZInhQPZe', 0, '2022-04-19 07:37:07'),
(12, 'yoyo', 'yoyo@gmail.com', '$2y$10$qgiQmqm2pdu1Ts5CJp6jh..7kc6zaAmNtVrvHv6qIvfbkwjSPjwGm', 0, '2022-04-21 08:43:25'),
(13, 'coco', 'coco@gmail.com', '$2y$10$XdlM0faKQpZGPELZHL34MeSFTew13AmQstIBMZOJiWW9lFfLD5hgG', 0, '2022-04-21 08:45:45'),
(14, 'zozo', 'zozo@gmail.com', '$2y$10$DVoQMEeeKBBi/ugLGzsRFu/gFU3ewnJohLJIK2fZHaCDTAeLT73Zu', 0, '2022-04-20 22:00:00'),
(15, 'xoxo', 'xoxo@gmail.com', '$2y$10$ZrSRJ2K.s7lDjUR4ymD/W.sPxz8JVClLOh7bGuh2YYejvcCigHhnK', 0, '2022-04-20 22:00:00'),
(17, 'gogo', 'gogo@gmail.com', '$2y$10$R405JxTLuqVJNW4o3s8jZe/7Asog7WA1r1EDz4dgvmFJdUefPV5eK', 0, '2022-05-01 16:25:42'),
(18, 'lala', 'lala@gmail.com', '$2y$10$WJa.cPB7y/jVKOcGFAMBoObMKPpKh2nUFPGOxmXbKgEhre5Q58m82', 0, '2022-05-04 20:27:02'),
(19, 'do', 'do@gmail.com', '$2y$10$DEGmjj00.3GfjxZuI1QOt.24.DLZXD9FygKl7BnumxTTNKvOgwpQm', 0, '2022-05-06 10:30:52');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat` (`id_category`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_article` (`id_article`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `presentation`
--
ALTER TABLE `presentation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `presentation`
--
ALTER TABLE `presentation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
