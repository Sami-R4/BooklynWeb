-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2025 at 02:54 AM
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
(26, 13, 'Black Hearts', 'DaBabySmile', 'Mythic', 'book-covers/blackhearts.jpeg', 'book-pdfs/Private project details (100 images).pdf', 'Mythicc', 2021, '10 000', 250, '2025-08-29 16:47:08'),
(27, 13, 'The Clock Shifter', 'DaBabySmile', 'Mythic', 'book-covers/clockshifter.jpg', 'book-pdfs/photo.pdf', 'Nice and short book', 2020, '12000', 245, '2025-08-29 18:18:09'),
(28, 13, 'The Garden of Ashes', 'DaBabySmile', 'Horror', 'book-covers/gardenofashes.jpg', 'book-pdfs/myCV.pdf', 'fkfikrihrr eiirifsf edsd sdidjdi dsd did dididieied dididiihdoihdsoioewouide id dsoidied ue e eie ee', 2020, '13000', 250, '2025-08-29 18:21:25'),
(29, 13, 'Immortalys', 'DaBabySmile', 'Horror', 'book-covers/immortals.jpg', 'book-pdfs/Photo to PDF.pdf', 'iioueue e eieihoehopi eie eiehue0eupweoi8e eee eouioeoehesu ee', 2020, '13000', 250, '2025-08-29 18:43:44'),
(30, 8, 'Power Within', 'ZeAuthor', 'Motivation', 'book-covers/powerwithin.jpg', 'book-pdfs/photo.pdf', 'Best book online for motivation and self development', 2021, '6000', 350, '2025-08-30 00:51:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `books_author_fk` (`author_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_author_fk` FOREIGN KEY (`author_id`) REFERENCES `authors` (`author_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
