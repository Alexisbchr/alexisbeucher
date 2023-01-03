-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 03 jan. 2023 à 12:20
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `alexisbeucher`
--

-- --------------------------------------------------------

--
-- Structure de la table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `image_id` (`image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `blog`
--

INSERT INTO `blog` (`id`, `title`, `content`, `timestamp`, `image_id`) VALUES
(3, 'Obtention du diplôme RNCP5!', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. In vel optio iste, quaerat, quos facere veritatis voluptatem vero deleniti, corporis quod. Explicabo ratione dolore, quam itaque voluptate dignissimos sed voluptas magni ad eius, possimus facilis a pariatur quidem saepe quaerat nemo. Voluptate, quae pariatur fugiat magni consectetur officia ipsa accusantium, officiis quisquam reprehenderit, nam accusamus. Facilis debitis recusandae nesciunt quo.', '2022-12-14', 3);

-- --------------------------------------------------------

--
-- Structure de la table `category_works`
--

DROP TABLE IF EXISTS `category_works`;
CREATE TABLE IF NOT EXISTS `category_works` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category_works`
--

INSERT INTO `category_works` (`id`, `category_name`) VALUES
(1, 'Full Stack'),
(2, 'Front End'),
(3, 'Back End');

-- --------------------------------------------------------

--
-- Structure de la table `image_blog`
--

DROP TABLE IF EXISTS `image_blog`;
CREATE TABLE IF NOT EXISTS `image_blog` (
  `id` int NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `image_blog`
--

INSERT INTO `image_blog` (`id`, `file_name`, `url`, `alt`) VALUES
(1, 'belleepoque', '/alexisbeucher/assets/uploads/2003f46d1c5a16234a18.webp', 'image'),
(2, 'dcaac6ebfbe868a92e8a', '/alexisbeucher/assets/uploads/dcaac6ebfbe868a92e8a.jpg', '&amp;'),
(3, 'b5939a8363620c8af9cf', '/alexisbeucher/assets/uploads/b5939a8363620c8af9cf.webp', 'Photo d\'illustration');

-- --------------------------------------------------------

--
-- Structure de la table `image_works`
--

DROP TABLE IF EXISTS `image_works`;
CREATE TABLE IF NOT EXISTS `image_works` (
  `id` int NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `image_works`
--

INSERT INTO `image_works` (`id`, `file_name`, `url`, `alt`) VALUES
(1, 'belleepoque', '/alexisbeucher/assets/public/images/belleepoque', 'Image du site belle epoque'),
(11, '600f555dea98bfdb8284', '/alexisbeucher/assets/uploads/600f555dea98bfdb8284.webp', 'Capture d\'écran du site internet'),
(12, 'af8d863587879e893d58', '/alexisbeucher/assets/uploads/af8d863587879e893d58.webp', 'Capture d\'écran du site internet'),
(13, '89c2393c9bfd8b181d4f', '/alexisbeucher/assets/uploads/89c2393c9bfd8b181d4f.webp', 'z'),
(14, '4b458b390e0f974f5e76', '/alexisbeucher/assets/uploads/4b458b390e0f974f5e76.webp', 'z'),
(15, 'bd5f091beafa2c18ce21', '/alexisbeucher/assets/uploads/bd5f091beafa2c18ce21.webp', 'az'),
(16, '3b71e492759c062ce44b', '/alexisbeucher/assets/uploads/3b71e492759c062ce44b.webp', 'Capture d\'écran du site internet'),
(17, '2003f46d1c5a16234a18', '/alexisbeucher/assets/uploads/2003f46d1c5a16234a18.webp', 'Capture d\'écran du site internet');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Structure de la table `works`
--

DROP TABLE IF EXISTS `works`;
CREATE TABLE IF NOT EXISTS `works` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `languages` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_id` int NOT NULL,
  `realisation` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `information` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `image_id` (`image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `works`
--

INSERT INTO `works` (`id`, `name`, `customer`, `languages`, `website`, `category_id`, `description`, `image_id`, `realisation`, `information`) VALUES
(2, 'Belle Epoquer', 'ASSOCIATION COUNTRY BELLE EPOQUE', 'HTML CSS JAVASCRIPT PHP MySQL', 'https://beucheralexis.sites.3wa.io/BelleEpoque/', 1, 'Le but du site internet est de présenter l\'association et permettre aux adhérent d\'avoir accès aux détails des danses enseignées lors des cours.', 1, 'test', 'test'),
(8, 'alexisbeucher.fr', 'Alexis Beucher', 'HTML SCSS PHP', 'https://alexisbeucher.fr/', 2, 'Portfolio responsive basique réalisé lors de ma formation RNCP5 (niveau BTS)', 17, 'J\'ai réalisé ce portfolio lors de ma formation pour consolider les notions apprises en html et css. J\'ai aussi utilisé sass car cette technologie m\'a beaucoup plu dès la première utilisation. En ce qui concerne la page contact elle contient une fonction php : mail(). Je n\'avais aucune notion en php lors de la réalisation de cette page.', 'Ce projet a abouti en 1 mois en travaillant dessus quelques heures par soir après les cours.');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`image_id`) REFERENCES `image_blog` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `works`
--
ALTER TABLE `works`
  ADD CONSTRAINT `works_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category_works` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `works_ibfk_2` FOREIGN KEY (`image_id`) REFERENCES `image_works` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
