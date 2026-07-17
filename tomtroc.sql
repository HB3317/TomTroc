-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 17 juil. 2026 à 20:22
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tomtroc`
--

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`id`, `user_id`, `title`, `author`, `image`, `description`, `status`) VALUES
(3, 3, 'arezfrf', 'arezfree', './assets/images/books/3.jpg', 'earferferfe', 0),
(4, 3, 'uouho', 'oiuhoiuhoiuhoiho', './assets/images/books/4.jpg', 'oiuhoiuhoiuholiho', 1),
(5, 4, 'The kinfolk Table', 'Nathan Williams', './assets/images/books/5.jpg', 'J\'ai récemment plongé dans les pages de \'The Kinfolk Table\' et j\'ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d\'une simple collection de recettes ; il célèbre l\'art de partager des moments authentiques autour de la table. \r\n\r\nLes photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité. \r\n\r\nChaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers. \r\n\r\n\'The Kinfolk Table\' incarne parfaitement l\'esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.', 1),
(6, 4, 'Wabi Sabi', 'Beth Kampton', './assets/images/books/6.jpg', 'J\'ai récemment plongé dans les pages de \'The Kinfolk Table\' et j\'ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d\'une simple collection de recettes ; il célèbre l\'art de partager des moments authentiques autour de la table. \r\n\r\nLes photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité. \r\n\r\nChaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers. \r\n\r\n\'The Kinfolk Table\' incarne parfaitement l\'esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.', 1),
(7, 4, 'Milk & honey', 'Rupi Kaur', './assets/images/books/7.jpg', 'J\'ai récemment plongé dans les pages de \'The Kinfolk Table\' et j\'ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d\'une simple collection de recettes ; il célèbre l\'art de partager des moments authentiques autour de la table. \r\n\r\nLes photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité. \r\n\r\nChaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers. \r\n\r\n\'The Kinfolk Table\' incarne parfaitement l\'esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.', 1),
(8, 4, 'Esther', 'Alabaster', './assets/images/books/8.jpg', 'J\'ai récemment plongé dans les pages de \'The Kinfolk Table\' et j\'ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d\'une simple collection de recettes ; il célèbre l\'art de partager des moments authentiques autour de la table. \r\n\r\nLes photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité. \r\n\r\nChaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers. \r\n\r\n\'The Kinfolk Table\' incarne parfaitement l\'esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.', 1),
(9, 4, 'Delight!', 'Justin Rosso', './assets/images/books/9.jpg', 'J\'ai récemment plongé dans les pages de \'The Kinfolk Table\' et j\'ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d\'une simple collection de recettes ; il célèbre l\'art de partager des moments authentiques autour de la table. \r\n\r\nLes photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité. \r\n\r\nChaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers. \r\n\r\n\'The Kinfolk Table\' incarne parfaitement l\'esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.', 1),
(10, 4, 'Milwaukee Mission', 'Elder Cooper Low', './assets/images/books/10.jpg', 'J\'ai récemment plongé dans les pages de \'The Kinfolk Table\' et j\'ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d\'une simple collection de recettes ; il célèbre l\'art de partager des moments authentiques autour de la table. \r\n\r\nLes photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité. \r\n\r\nChaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers. \r\n\r\n\'The Kinfolk Table\' incarne parfaitement l\'esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.', 1),
(11, 5, 'Minimalist Graphics', 'Julia Schonlau', './assets/images/books/11.jpg', 'J\'ai récemment plongé dans les pages de \'The Kinfolk Table\' et j\'ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d\'une simple collection de recettes ; il célèbre l\'art de partager des moments authentiques autour de la table. \r\n\r\nLes photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité. \r\n\r\nChaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers. \r\n\r\n\'The Kinfolk Table\' incarne parfaitement l\'esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.', 1),
(12, 5, 'Hygge', 'Meik Wiking', './assets/images/books/12.jpg', 'J\'ai récemment plongé dans les pages de \'The Kinfolk Table\' et j\'ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d\'une simple collection de recettes ; il célèbre l\'art de partager des moments authentiques autour de la table. \r\n\r\nLes photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité. \r\n\r\nChaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers. \r\n\r\n\'The Kinfolk Table\' incarne parfaitement l\'esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.', 1),
(13, 5, 'Innovation', 'Matt Rydley', './assets/images/books/13.jpg', 'J\'ai récemment plongé dans les pages de \'The Kinfolk Table\' et j\'ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d\'une simple collection de recettes ; il célèbre l\'art de partager des moments authentiques autour de la table. \r\n\r\nLes photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité. \r\n\r\nChaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers. \r\n\r\n\'The Kinfolk Table\' incarne parfaitement l\'esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.', 1),
(14, 5, 'Psalms', 'Justin Rossow', './assets/images/books/14.jpg', 'J\'ai récemment plongé dans les pages de \'The Kinfolk Table\' et j\'ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d\'une simple collection de recettes ; il célèbre l\'art de partager des moments authentiques autour de la table. \r\n\r\nLes photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité. \r\n\r\nChaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers. \r\n\r\n\'The Kinfolk Table\' incarne parfaitement l\'esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.', 1),
(15, 5, 'Thinking, Fast & Slow', 'Daniel Kaheman', './assets/images/books/15.jpg', 'J\'ai récemment plongé dans les pages de \'The Kinfolk Table\' et j\'ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d\'une simple collection de recettes ; il célèbre l\'art de partager des moments authentiques autour de la table. \r\n\r\nLes photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité. \r\n\r\nChaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers. \r\n\r\n\'The Kinfolk Table\' incarne parfaitement l\'esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.', 1),
(16, 6, 'A Book Full Of Hope', 'Rupi Kaur', './assets/images/books/16.jpg', 'J\'ai récemment plongé dans les pages de \'The Kinfolk Table\' et j\'ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d\'une simple collection de recettes ; il célèbre l\'art de partager des moments authentiques autour de la table. \r\n\r\nLes photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité. \r\n\r\nChaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers. \r\n\r\n\'The Kinfolk Table\' incarne parfaitement l\'esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.', 1),
(17, 6, 'The Subtle Art Of', 'Mark Manson', './assets/images/books/17.jpg', 'J\'ai récemment plongé dans les pages de \'The Kinfolk Table\' et j\'ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d\'une simple collection de recettes ; il célèbre l\'art de partager des moments authentiques autour de la table. \r\n\r\nLes photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité. \r\n\r\nChaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers. \r\n\r\n\'The Kinfolk Table\' incarne parfaitement l\'esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.', 1),
(18, 6, 'Narnia', 'C.S Lewis', './assets/images/books/18.jpg', 'J\'ai récemment plongé dans les pages de \'The Kinfolk Table\' et j\'ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d\'une simple collection de recettes ; il célèbre l\'art de partager des moments authentiques autour de la table. \r\n\r\nLes photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité. \r\n\r\nChaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers. \r\n\r\n\'The Kinfolk Table\' incarne parfaitement l\'esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.', 1),
(19, 6, 'Company Of One', 'Paul Jarvis', './assets/images/books/19.jpg', 'J\'ai récemment plongé dans les pages de \'The Kinfolk Table\' et j\'ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d\'une simple collection de recettes ; il célèbre l\'art de partager des moments authentiques autour de la table. \r\n\r\nLes photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité. \r\n\r\nChaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers. \r\n\r\n\'The Kinfolk Table\' incarne parfaitement l\'esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.', 1),
(20, 6, 'The Two Towers', 'J.R.R Tolkien', './assets/images/books/20.jpg', 'J\'ai récemment plongé dans les pages de \'The Kinfolk Table\' et j\'ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d\'une simple collection de recettes ; il célèbre l\'art de partager des moments authentiques autour de la table. \r\n\r\nLes photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité. \r\n\r\nChaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers. \r\n\r\n\'The Kinfolk Table\' incarne parfaitement l\'esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.', 1),
(22, 10, 'zerzer', 'EZRFZFq', './assets/images/books/default_book_image.jpg', 'efzef', 1);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date_time` datetime NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `content`, `date_time`, `is_read`) VALUES
(1, 4, 6, 'bonjour', '2026-07-15 12:46:43', 1),
(2, 4, 6, 'ca va?', '2026-07-15 12:48:34', 1),
(3, 6, 4, 'oui merci', '2026-07-15 12:49:14', 1),
(4, 4, 6, 'et toi?', '2026-07-15 13:02:14', 1),
(5, 4, 6, 'bien?', '2026-07-15 13:02:21', 1),
(6, 6, 5, 'hello', '2026-07-15 13:12:57', 1),
(7, 4, 6, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2026-07-16 01:04:15', 1),
(8, 4, 6, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2026-07-16 01:05:14', 1),
(9, 4, 5, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2026-07-16 01:18:14', 1),
(10, 4, 6, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2026-07-16 01:43:50', 1),
(11, 4, 6, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2026-07-16 01:44:04', 1),
(12, 4, 6, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2026-07-16 01:44:09', 1),
(13, 4, 6, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2026-07-16 01:44:15', 1),
(14, 1, 8, 'Bienvenue sur TomTroc !', '2026-07-16 02:19:47', 1),
(15, 5, 4, '<img class=\"other-user-avatar\" src=\"<?= htmlspecialchars($otherUser->getImage()) ?>\" alt=\"Avatar de <?= htmlspecialchars($otherUser->getNickname()) ?>\">\r\n            <span class=\"other-user-nickname\"><?= htmlspecialchars($otherUser->getNickname()) ?></span>', '2026-07-16 12:02:33', 1),
(16, 5, 5, 'salut', '2026-07-16 12:03:21', 1),
(17, 5, 5, 'ho', '2026-07-16 12:04:01', 1),
(18, 6, 5, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2026-07-16 12:12:25', 1),
(19, 6, 5, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2026-07-16 12:12:39', 1),
(20, 5, 6, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2026-07-16 12:13:53', 1),
(21, 5, 6, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2026-07-16 12:13:56', 1),
(22, 4, 6, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2026-07-16 12:14:13', 1),
(23, 6, 5, 'eh\r\noh', '2026-07-16 12:36:52', 1),
(24, 6, 5, 'ici', '2026-07-16 12:37:07', 1),
(25, 5, 4, 'lolo', '2026-07-16 12:39:19', 1),
(26, 5, 6, 'hey', '2026-07-16 12:39:40', 1),
(27, 4, 6, 'ho', '2026-07-16 12:40:13', 1),
(28, 6, 4, 'ici', '2026-07-16 13:02:13', 1),
(29, 6, 4, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2026-07-16 13:14:17', 1),
(30, 6, 4, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2026-07-16 13:16:23', 1),
(31, 6, 4, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2026-07-16 13:16:24', 1),
(32, 6, 4, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2026-07-16 13:16:25', 1),
(33, 6, 4, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2026-07-16 13:16:52', 1),
(34, 6, 4, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2026-07-16 13:16:53', 1),
(35, 6, 4, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2026-07-16 13:16:53', 1),
(36, 5, 4, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2026-07-16 13:17:35', 1),
(37, 5, 4, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2026-07-16 13:17:35', 1),
(38, 5, 4, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2026-07-16 13:17:36', 1),
(39, 5, 4, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2026-07-16 13:17:36', 1),
(40, 8, 4, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2026-07-16 13:17:56', 1),
(41, 8, 4, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2026-07-16 13:17:57', 1),
(42, 8, 4, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2026-07-16 13:17:57', 1),
(43, 4, 4, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2026-07-16 13:18:45', 1),
(44, 4, 4, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2026-07-16 13:18:45', 1),
(45, 4, 4, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2026-07-16 13:18:49', 1),
(46, 4, 6, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2026-07-16 13:20:07', 0),
(47, 4, 6, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2026-07-16 13:20:07', 0),
(48, 4, 6, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2026-07-16 13:20:07', 0),
(49, 4, 5, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2026-07-16 13:20:20', 0),
(50, 4, 5, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2026-07-16 13:20:21', 0),
(51, 4, 5, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2026-07-16 13:20:21', 0),
(53, 1, 10, 'Bienvenue sur TomTroc !', '2026-07-17 06:01:31', 1),
(54, 10, 6, 'wdbdfb', '2026-07-17 06:15:30', 0),
(55, 10, 6, 'fytjfyj', '2026-07-17 06:15:54', 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `registration_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `nickname`, `password_hash`, `image`, `registration_date`) VALUES
(1, 'tomtroc@tomtroc.tomtroc', 'TomTroc', '$2y$10$.co6X3C2YLWA2Lxoz.QsfOKyU8PD57U7GdBBrkPYnzN8nVjwvxLDi', './assets/images/users/7.jpg', '2026-07-15'),
(3, 'test@test.test', 'test', '$2y$10$VITSMlb4WZUcDTXsmPItP.65.Rv7llD8HkGemHAXK2qM1eny2VCRK', './assets/images/users/3.jpg', '2024-07-08'),
(4, 'Alexlecture@Alexlecture.Alexlecture', 'Alexlecture', '$2y$10$U7xENd7zqoj.dUlCHbbkLug4t3G76EgHClGCDjh9gUBm/4K1ofJYO', './assets/images/users/4.jpg', '2026-07-10'),
(5, 'Sas634@Sas634.Sas634', 'Sas634', '$2y$10$0/i8q06sjGpngMMLmxTlT.SCc4SJC9fPq9zGa373n8hTnYOdGfi.u', './assets/images/users/5.jpg', '2026-07-10'),
(6, 'Nathalire@Nathalire.Nathalire', 'Nathalire', '$2y$10$MztDD2xhXyp8K/2CMNuN0.oO49Y5BxFTAJca/xVKOm6HnQEvGs9O2', './assets/images/users/6.jpg', '2026-07-10'),
(8, 'lolo.lolo@lolo.lolo', 'lolo', '$2y$10$lat939EvbI07eN/P5e8bluPGopH.rq/7Jr4fSfSD3LV2FXy2.4bVm', './assets/images/users/8.jpg', '2026-07-16'),
(10, 'hella.hella@hella.hella', 'hella', '$2y$10$i5IfVYkdqcemzddEEzBafujEYiNpUeIiDvYMLsqI2Mfkng0/V3XFm', './assets/images/users/10.jpg', '2026-07-17');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_books_user` (`user_id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_messages_sender` (`sender_id`),
  ADD KEY `fk_messages_receiver` (`receiver_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nickname` (`nickname`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `fk_books_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `fk_messages_receiver` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_messages_sender` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
