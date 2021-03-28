-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2021 at 06:44 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plaxer`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `post_comment_id` int(11) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `user_comment_image` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_heading` varchar(255) NOT NULL,
  `post_content` text NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `post_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_author`, `post_heading`, `post_content`, `post_image`, `post_date`) VALUES
(41, 'test_user', 'Half life alyx : Game changer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sollicitudin eros vel tristique fringilla. Proin semper nunc sit amet fringilla consequat. Vestibulum nec condimentum augue, at consequat dolor. Donec suscipit, ligula sit amet convallis hendrerit, massa arcu venenatis erat, eget posuere magna magna vitae massa. Curabitur consequat, odio vehicula dignissim malesuada, nunc dui suscipit nulla, ac fringilla mauris massa in tellus. Nulla rutrum magna neque, in eleifend dui vehicula vel. Aenean bibendum lorem turpis, a consequat dui interdum vitae. Morbi dignissim laoreet lectus sit amet posuere.', 'half-life-alyx.jpg', '2021-03-28 18:27:58'),
(42, 'test_user', 'world of warcraft : shadowland - Realese', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sollicitudin eros vel tristique fringilla. Proin semper nunc sit amet fringilla consequat. Vestibulum nec condimentum augue, at consequat dolor. Donec suscipit, ligula sit amet convallis hendrerit, massa arcu venenatis erat, eget posuere magna magna vitae massa. Curabitur consequat, odio vehicula dignissim malesuada, nunc dui suscipit nulla, ac fringilla mauris massa in tellus. Nulla rutrum magna neque, in eleifend dui vehicula vel. Aenean bibendum lorem turpis, a consequat dui interdum vitae. Morbi dignissim laoreet lectus sit amet posuere.', 'word-of-warcraft.jpg', '2021-03-28 18:29:13'),
(43, 'test_user', 'Two Years with God of War', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sollicitudin eros vel tristique fringilla. Proin semper nunc sit amet fringilla consequat. Vestibulum nec condimentum augue, at consequat dolor. Donec suscipit, ligula sit amet convallis hendrerit, massa arcu venenatis erat, eget posuere magna magna vitae massa. Curabitur consequat, odio vehicula dignissim malesuada, nunc dui suscipit nulla, ac fringilla mauris massa in tellus. Nulla rutrum magna neque, in eleifend dui vehicula vel. Aenean bibendum lorem turpis, a consequat dui interdum vitae. Morbi dignissim laoreet lectus sit amet posuere.', 'gof-of-war.png', '2021-03-28 18:36:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `avatar_image` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `date_register` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_email`, `avatar_image`, `user_role`, `date_register`) VALUES
(9, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'admin@admin.com', '14.jpg', 'admin', '2021-02-13 13:54:35'),
(11, 'test_user', '81dc9bdb52d04dc20036dbd8313ed055', 'test@abv.bg', 'bg2.jpg', 'default', '2021-03-28 18:25:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
