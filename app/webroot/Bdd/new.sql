-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 27 Août 2013 à 23:17
-- Version du serveur: 5.5.25
-- Version de PHP: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `new`
--

-- --------------------------------------------------------

--
-- Structure de la table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `groups`
--

INSERT INTO `groups` (`id`, `name`, `level`, `created`) VALUES
(1, 'admin', 10, '0000-00-00 00:00:00'),
(2, 'user', 5, '0000-00-00 00:00:00'),
(3, 'noob', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `medias`
--

CREATE TABLE `medias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `ref_id` int(11) NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=59 ;

--
-- Contenu de la table `medias`
--

INSERT INTO `medias` (`id`, `ref`, `ref_id`, `file`, `position`) VALUES
(46, 'Post', 36, '/uploads/Posts/36/wallpaper_2008551.jpg', 0),
(47, 'Post', 37, '/uploads/Posts/37/wallpaper_1642736.jpg', 0),
(49, 'Post', 50, '/uploads/Posts/50/wallpaper_1486486.jpg', 0),
(57, 'User', 23, '/uploads/User/23/wallpaper_1642736.jpg', 0),
(58, 'User', 1, '/uploads/User/1/gosling.jpg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8_unicode_ci,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `media_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=51 ;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created`, `modified`, `media_id`, `user_id`, `active`) VALUES
(36, 'Voiture', '<p>blalv</p>\r\n', '2013-08-25 22:05:31', '2013-08-25 22:06:04', 46, 1, 1),
(37, 'dqsdqd', '<p>dqdq</p>\r\n', '2013-08-25 22:07:51', '2013-08-25 22:08:13', 47, 23, 1),
(50, 'test', '<p>test</p>\r\n', '2013-08-27 21:52:11', '2013-08-27 21:52:49', 49, 23, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `tags`
--

INSERT INTO `tags` (`id`, `name`, `post_id`) VALUES
(1, 'fruit', 1),
(2, 'legume', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group_id` int(11) NOT NULL DEFAULT '5',
  `media_id` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `lastlogin` datetime NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `mail`, `password`, `group_id`, `media_id`, `firstname`, `lastname`, `created`, `modified`, `lastlogin`, `active`) VALUES
(1, 'admin', 'kadridge@yopmail.com', 'ed6cc70e392916e05049f3d7c3bd00e3e8f69974', 1, 58, 'admin', 'admin', '2013-08-17 20:00:26', '2013-08-27 22:45:20', '2013-08-27 19:55:57', 1),
(23, 'kadridge', 'chomel.nicolas@gmail.com', 'e8c44de787da2421072499948cfe243d258da114', 1, 57, 'Kadridge', 'kadridge', '2013-08-26 19:04:44', '2013-08-27 22:45:00', '2013-08-27 21:13:27', 1),
(24, 'test', 'test@test.com', '4d5fb6ee9957ff46f092733f7dc181c72b56f4c1', 3, 0, 'test', 'test', '2013-08-26 19:04:44', '2013-08-27 19:48:21', '2013-08-27 19:48:21', 1);
