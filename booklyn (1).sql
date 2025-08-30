-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2025 at 06:49 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booklyn`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `author_id` int(11) NOT NULL,
  `author_name` varchar(50) NOT NULL,
  `pen_name` varchar(20) NOT NULL,
  `email` varchar(35) NOT NULL,
  `pic_path` varchar(50) DEFAULT NULL,
  `bio` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`author_id`, `author_name`, `pen_name`, `email`, `pic_path`, `bio`) VALUES
(7, 'Smiley', 'JSmile', 'smile@gmail.com', 'author_pics/image8.jpg', ''),
(8, 'Author', 'ZeAuthor', 'author@gmail.com', 'author_pics/moneymaze image.jpg', 'I like to call myself zeauthor'),
(9, 'Samuel101', 'Samie101', 'samuel101@gmail.com', 'author_pics/moneymaze image.jpg', ''),
(10, 'sami101', 'sami101', 'sami101@gmail.com', 'author_pics/image8.jpg', ''),
(11, 'Smiley', 'Smiley', 'njuhsamuelrichmond@gmail.com', 'author_pics/elon.jpeg', ''),
(13, 'Smile25', 'DaBabySmile', 'smile25@gmail.com', 'author_pics/elon.jpeg', '');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `book_title` varchar(150) NOT NULL,
  `author` varchar(100) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `book_url` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `published_year` year(4) DEFAULT NULL,
  `price` varchar(20) NOT NULL,
  `pages` int(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `author_id`, `book_title`, `author`, `genre`, `cover_image`, `book_url`, `description`, `published_year`, `price`, `pages`, `created_at`) VALUES
(27, 13, 'The Clock Shifter', 'DaBabySmile', 'Mythic', 'book-covers/clockshifter.jpg', 'book-pdfs/photo.pdf', 'Nice and short book', 2020, '12000', 245, '2025-08-29 18:18:09'),
(28, 13, 'The Garden of Ashes', 'DaBabySmile', 'Horror', 'book-covers/gardenofashes.jpg', 'book-pdfs/myCV.pdf', 'fkfikrihrr eiirifsf edsd sdidjdi dsd did dididieied dididiihdoihdsoioewouide id dsoidied ue e eie ee', 2020, '13000', 250, '2025-08-29 18:21:25'),
(29, 13, 'Immortalys', 'DaBabySmile', 'Horror', 'book-covers/immortals.jpg', 'book-pdfs/Photo to PDF.pdf', 'iioueue e eieihoehopi eie eiehue0eupweoi8e eee eouioeoehesu ee', 2020, '13000', 250, '2025-08-29 18:43:44'),
(30, 8, 'Power Within', 'ZeAuthor', 'Motivation', 'book-covers/powerwithin.jpg', 'book-pdfs/photo.pdf', 'Best book online for motivation and self development', 2021, '6000', 350, '2025-08-30 00:51:50');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `book_title` varchar(20) NOT NULL,
  `author_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `useremail` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `useremail`, `password`, `user_type`, `created_at`) VALUES
(40, 'John Doe', 'ritad@gmail.com', '$2y$10$eyM1vjuwpSnSMSwEZ6th8.sFjgNag3YMLYUPYLJi.F8ZNjsGIWori', 'reader', '2025-08-18 21:38:19'),
(41, 'John Doe', 'ritad@gmail.com', '$2y$10$ZjqCQXWLX7WdPyw.VRg.8eX87G82BXENbbgZznV5Lq44t6e7ZDqVe', 'reader', '2025-08-18 21:45:49'),
(56, 'samuelnjuh@gmail.com', 'njuhsamuelrichmond@gmail.com', '$2y$10$LkFKezwWrTteWOhvdKbW5eN1v1o6SdQ77n00KaI4Z84WYfx9u6DLG', 'reader', '2025-08-18 23:31:47'),
(57, 'samuelnjuh@gmail.com', 'njuhsamuelrichmond@gmail.com', '$2y$10$7KBj9OU4tKSLQbzeO2vm6up28uMi/pXwXKftihCvfBbbcanemhy7C', 'reader', '2025-08-19 00:11:28'),
(58, 'Sami', 'njuhsamuelrichmond@gmail.com', '$2y$10$y8b0CfAYvfWpoQU0sLcJB.sjMPhTLVLe0iQURCFB3F09iYLAvv25K', 'reader', '2025-08-19 01:03:37'),
(59, 'Njuh Samuel', 'vladimir@gmail.com', '$2y$10$fg5B3h3ADamtcg4bXFDgAuZ5rAbYhXSB3YlKHyNFuj3KFxPJSyM1G', 'author', '2025-08-19 13:13:18'),
(60, 'ZeElon', 'vladimir@gmail.com', '$2y$10$nrU3ls/YbUnMgagVlx5gfuNeYHfsNZ8VtypwMwKBkYPODTcb..r76', 'author', '2025-08-19 13:20:26'),
(61, 'Goddy Glide', 'njuhsamuelrichmond@gmail.com', '$2y$10$dSsXIusJ.bmTdwoJoz1Nku2E5jPsyM.aYDP5PfNGYcVQ9UeWShjAC', 'reader', '2025-08-19 13:21:19'),
(62, 'Samuel', 'njuhsamuelrichmond@gmail.com', '$2y$10$0yvycN4QMKKTfyK.46s2duygt/.iqSLnkySP3LzNsEP0Nqv3TLYuW', 'reader', '2025-08-19 13:24:31'),
(63, 'Pinko', 'pinko@gmail.com', '$2y$10$0tktz0RMbgiVJOld2DjbQ.QPFd7/sYOIZME8GAyh4dudwTu1guU9K', 'reader', '2025-08-19 13:29:30'),
(64, 'Gracie', 'groovesammie@gmail.com', '$2y$10$ZXFT.L/d4qNMUgV39YchUutAGt2yDsRIZdIPIG2Z0J0ePKpVWNo56', 'author', '2025-08-19 13:35:15'),
(65, 'Smiley', 'smile@gmail.com', '$2y$10$l0d39mNLr6sjyA9sECv4bO19Kb.W4EvlH5KBZLzfoztqDMrQTiUFW', 'author', '2025-08-19 15:33:18'),
(66, 'Sammie_123', 'sammie@gmail.com', '$2y$10$0WHK/S2.81eWKCViswbNVuvdcFTfNDgwR2PhehopcFWyooPpAdLV.', 'reader', '2025-08-22 19:55:49'),
(67, 'Groovy_ESR', 'groovy@gmail.com', '$2y$10$QMzthsOOrPd9r3VR7l4NJOZwZFmahFYpdL17o.UWKdmBX4uzO8AY2', 'reader', '2025-08-22 19:57:12'),
(68, 'Samuel_R4', 'samuel@gmail.com', '$2y$10$sXNiK2xT/M/nX3iZ/KxkIO3sWxGjfdDtlkGZbuS37cqzuG83KId1K', 'reader', '2025-08-22 20:45:13'),
(69, 'Sami', 'sami@gmail.com', '$2y$10$XlGkmHA.thd8yPHp.gcvouyFEnA0H9wQsSD3J1KXSDo8mweLSDP6a', 'reader', '2025-08-22 21:09:42'),
(70, 'Samuel', 'njuhsamuelrichmond@gmail.com', '$2y$10$h0HAO/cibZRVR.x4.kzCZeL2MPpsfFlVMGJbkd7ASE.J1g/Wbawpq', 'reader', '2025-08-23 17:39:32'),
(71, 'Sammie', 'sammie123@gmail.com', '$2y$10$L4W1WBuwurXcSr6KMHxcjuOLkf9fqPJIQJMWJE6OsGfo9TeeZV3Qi', 'reader', '2025-08-23 17:43:14'),
(72, 'Sam', 'sam123@gmail.com', '$2y$10$liaOt2/YJzQh6OWpP1AGtu89.q.igMkUuKvFcR5iaVZ5xWMJCgJzu', 'reader', '2025-08-23 17:45:22'),
(73, 'SammieGroove123', 'sammiegroove123@gmail.com', '$2y$10$feCAFZe9YvfvTMHHG0RBpOy5KIwsnEB4JYXwkJjlN5cYacfls9Qiy', 'reader', '2025-08-23 17:55:46'),
(74, 'Author', 'author@gmail.com', '$2y$10$cxyUpTZhvmG19afsTrB5xeI8TX9dpJtDsQtJNRIZ/.bkzo1iMruxu', 'author', '2025-08-23 17:58:22'),
(75, 'Samuel101', 'samuel101@gmail.com', '$2y$10$8yeq3MfNDxv5Iciet3a0xeA0qxZwPC8Dso/e.qUl3wnn/9ascg6Q.', 'author', '2025-08-23 18:18:50'),
(76, 'sami101', 'sami101@gmail.com', '$2y$10$F/0ubFFtdRH3lmNOxjqv4.EBODPXTlFJ.sb9RPmuAHW.ZLYh4T5n.', 'author', '2025-08-23 18:23:06'),
(77, 'SammieGroove1234', 'sammiegroove1234@gmail.com', '$2y$10$DMuzkusTaWphQa9/yuRoiOF1U0QZDkJhZ.F4.gyhrjmFcOWSqgFpO', 'reader', '2025-08-23 18:35:02'),
(78, 'Smiley', 'njuhsamuelrichmond@gmail.com', '$2y$10$VsmcZsfidNirly99d7y7C.hm8br1PDoaEIqKukCNzPQhZOB.Q8.G2', 'author', '2025-08-26 18:54:23'),
(79, 'Smiley_25', 'smile@gmail.com', '$2y$10$AX0HfM9LuKheY1vvQO8NlueGgXxZU063wgb0psS9NmXJ5DdrMPXtG', 'author', '2025-08-26 18:56:51'),
(80, 'Smile25', 'smile25@gmail.com', '$2y$10$eG5OYhWxL06j5SY88ATypeNdhWKoR8DVzzxsPba8BCfnhn09Ugr/a', 'author', '2025-08-26 19:01:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `books_author_fk` (`author_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_author_fk` FOREIGN KEY (`author_id`) REFERENCES `authors` (`author_id`) ON DELETE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`);

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
