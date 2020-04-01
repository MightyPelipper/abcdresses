-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2020 at 03:08 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abcdresses_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `dresses`
--

CREATE TABLE `dresses` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `did_you_know` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'regional, religious, people, dresses, festivals, other',
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'boys, girls, men, women, other',
  `state_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key_words` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'any key words separate by comma',
  `dress_image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `final_design` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'proposed' COMMENT 'proposed, approved, writeup_done, art_work_done, designed, completed',
  `notes` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dresses`
--

INSERT INTO `dresses` (`id`, `name`, `description`, `did_you_know`, `category`, `type`, `state_name`, `key_words`, `dress_image`, `final_design`, `status`, `notes`) VALUES
(1, 'Adul Kalam Dress', 'This suit is worn by missile scientist and former president of India Abdul Kalam', 'He is known as \"missile man of India\"', 'people', 'men', 'NA', 'people, suit', 'adul_kalam_dress.jpg', NULL, 'art_work_done', ''),
(2, 'Amul Girl', 'amul girl', 'amul girl', 'other', 'girl', 'NA', '', 'amul_girl.jpg', NULL, 'proposed', ''),
(3, 'Arunachal Pradesh', 'Arunachal Pradesh', 'Arunachal Pradesh', 'regiona', 'women', '', '', 'arunachal_pradesh.jpg', NULL, 'art_work_done', ''),
(4, 'Assam', 'Assam', 'Assam', 'regiona', 'women', '', '', 'assam.jpg', NULL, 'art_work_done', ''),
(5, 'Bharath Mata', 'Bharath Mata', 'Bharath Mata', 'regiona', 'women', '', '', 'bharath_mata.jpg', NULL, 'art_work_done', ''),
(6, 'Boy Shorts', 'Boy Shorts', 'Boy Shorts', 'regiona', 'boy', '', '', 'boy_shorts.jpg', NULL, 'art_work_done', ''),
(7, 'Chudidar', 'Chudidar', 'Chudidar', 'regiona', 'women', '', '', 'chudidar.jpg', NULL, 'art_work_done', ''),
(8, 'Crop Top', 'Crop Top', 'Crop Top', 'regiona', 'women', '', '', 'crop_top.jpg', NULL, 'art_work_done', ''),
(9, 'Crop Top Girl', 'Crop Top Girl', 'Crop Top Girl', 'regiona', 'women', '', '', 'crop_top_girl.jpg', NULL, 'art_work_done', ''),
(10, 'Dabba Wala', 'Dabba Wala', 'Dabba Wala', 'regiona', 'men', '', '', 'dabba_wala.jpg', NULL, 'art_work_done', ''),
(11, 'Dance Bhangra Boy', 'Dance Bhangra Boy', 'Dance Bhangra Boy', 'dance', 'men', '', 'dance', 'dance_bhangra_boy.jpg', NULL, 'art_work_done', ''),
(12, 'Dance Bhangra Girl', 'Dance Bhangra Girl', 'Dance Bhangra Girl', 'dance', 'women', '', 'dance', 'dance_bhangra_girl.jpg', NULL, 'art_work_done', ''),
(13, 'Dance Bharata Natyam', 'Dance Bharata Natyam', 'Dance Bharata Natyam', 'dance', 'women', '', 'dance', 'dance_bharata_natyam.jpg', NULL, 'art_work_done', ''),
(14, 'Dance Bihu', 'Dance Bihu', 'Dance Bihu', 'dance', 'women', '', 'dance', 'dance_bihu.jpg', NULL, 'art_work_done', ''),
(15, 'Dance Kathak', 'Dance Kathak', 'Dance Kathak', 'dance', 'women', '', 'dance', 'dance_kathak.jpg', NULL, 'art_work_done', ''),
(16, 'Dance Kathakali', 'Dance Kathakali', 'Dance Kathakali', 'dance', 'women', '', 'dance', 'dance_kathakali.jpg', NULL, 'art_work_done', ''),
(17, 'Dance Kuchipudi', 'Dance Kuchipudi', 'Dance Kuchipudi', 'dance', 'women', '', 'dance', 'dance_kuchipudi.jpg', NULL, 'art_work_done', ''),
(18, 'Dance Mohiniyattam', 'Dance Mohiniyattam', 'Dance Mohiniyattam', 'dance', 'women', '', 'dance', 'dance_mohiniyattam.jpg', NULL, 'art_work_done', ''),
(19, 'Dance Odissi', 'Dance Odissi', 'Dance Odissi', 'dance', 'women', '', 'dance', 'dance_odissi.jpg', NULL, 'art_work_done', ''),
(20, 'Dhoti Lalchi', 'Dhoti Lalchi', 'Dhoti Lalchi', 'regiona', 'men', '', '', 'dhoti_lalchi.jpg', NULL, 'art_work_done', ''),
(21, 'Gaghra Choli', 'Gaghra Choli', 'Gaghra Choli', 'regiona', 'women', '', '', 'gaghra_choli.jpg', NULL, 'art_work_done', ''),
(22, 'Gandhi Dress', 'Gandhi Dress', 'Gandhi Dress', 'regiona', 'men', '', '', 'gandhi_dress.jpg', NULL, 'art_work_done', ''),
(23, 'Garbha Ras Gujarath', 'Garbha Ras Gujarath', 'Garbha Ras Gujarath', 'dance', 'women', '', '', 'garbha_ras_gujarath.jpg', NULL, 'art_work_done', ''),
(24, 'Goa Koli', 'Goa Koli', 'Goa Koli', 'regiona', 'women', '', '', 'goa_koli.jpg', NULL, 'art_work_done', ''),
(25, 'Gujarathi', 'Gujarathi', 'Gujarathi', 'regiona', 'women', '', '', 'gujarathi.jpg', NULL, 'art_work_done', ''),
(26, 'Himachal Pradesh Girl', 'Himachal Pradesh Girl', 'Himachal Pradesh Girl', 'regiona', 'women', '', '', 'himachal_pradesh_girl.jpg', NULL, 'art_work_done', ''),
(27, 'I Love Silc Boy', 'I Love Silc Boy', 'I Love Silc Boy', 'regiona', 'boy', '', '', 'i_love_silc_boy.jpg', NULL, 'art_work_done', ''),
(28, 'I Love Silc Girl', 'I Love Silc Girl', 'I Love Silc Girl', 'regiona', 'girl', '', '', 'i_love_silc_girl.jpg', NULL, 'art_work_done', ''),
(29, 'Jaisalmar Boy', 'Jaisalmar Boy', 'Jaisalmar Boy', 'regiona', 'men', '', '', 'jaisalmar_boy.jpg', NULL, 'art_work_done', ''),
(30, 'Jhansi Lakshmi Bai', 'Jhansi Lakshmi Bai', 'Jhansi Lakshmi Bai', 'regiona', 'women', '', '', 'jhansi_lakshmi_bai.jpg', NULL, 'art_work_done', ''),
(31, 'Kannada Saree', 'Kannada Saree', 'Kannada Saree', 'regiona', 'women', '', '', 'kannada_saree.jpg', NULL, 'art_work_done', ''),
(32, 'King Dress', 'King Dress', 'King Dress', 'regiona', 'men', '', '', 'king_dress.jpg', NULL, 'art_work_done', ''),
(33, 'Kreala', 'Kreala', 'Kreala', 'regiona', 'women', '', '', 'kreala.jpg', NULL, 'art_work_done', ''),
(34, 'Kurta Boy', 'Kurta Boy', 'Kurta Boy', 'regiona', 'men', '', '', 'kurta_boy.jpg', NULL, 'art_work_done', ''),
(35, 'Langa Jacket', 'Langa Jacket', 'Langa Jacket', 'regiona', 'girl', '', '', 'langa_jacket.jpg', NULL, 'art_work_done', ''),
(36, 'Langa Voni', 'Langa Voni', 'Langa Voni', 'regiona', 'girl', '', '', 'langa_voni.jpg', NULL, 'art_work_done', ''),
(37, 'Lungi', 'Lungi', 'Lungi', 'regiona', 'men', '', '', 'lungi.jpg', NULL, 'art_work_done', ''),
(38, 'Manipur', 'Manipur', 'Manipur', 'regiona', 'women', '', '', 'manipur.jpg', NULL, 'art_work_done', ''),
(39, 'Marathi', 'Marathi', 'Marathi', 'regiona', 'women', '', '', 'marathi.jpg', NULL, 'art_work_done', ''),
(40, 'Megalaya', 'Megalaya', 'Megalaya', 'regiona', 'women', '', '', 'megalaya.jpg', NULL, 'art_work_done', ''),
(41, 'Mizoram', 'Mizoram', 'Mizoram', 'regiona', 'women', '', '', 'mizoram.jpg', NULL, 'art_work_done', ''),
(42, 'Nagalad', 'Nagalad', 'Nagalad', 'regiona', 'women', '', '', 'nagalad.jpg', NULL, 'art_work_done', ''),
(43, 'Panjabi', 'Panjabi', 'Panjabi', 'regiona', 'women', '', '', 'panjabi.jpg', NULL, 'art_work_done', ''),
(44, 'Pathan Dress', 'Pathan Dress', 'Pathan Dress', 'regiona', 'men', '', '', 'pathan_dress.jpg', NULL, 'art_work_done', ''),
(45, 'Rajastan', 'Rajastan', 'Rajastan', 'regiona', 'women', '', '', 'rajastan.jpg', NULL, 'art_work_done', ''),
(46, 'Saree Dress', 'Saree Dress', 'Saree Dress', 'regiona', 'women', '', '', 'saree_dress.jpg', NULL, 'art_work_done', ''),
(47, 'Tamilnadu', 'Tamilnadu', 'Tamilnadu', 'regiona', 'women', '', '', 'tamilnadu.jpg', NULL, 'art_work_done', ''),
(48, 'Tribal Dress', 'Tribal Dress', 'Tribal Dress', 'regiona', 'women', '', '', 'tribal_dress.jpg', NULL, 'art_work_done', ''),
(49, 'Tripura', 'Tripura', 'Tripura', 'regiona', 'women', '', '', 'tripura.jpg', NULL, 'art_work_done', ''),
(50, 'West Bengal', 'West Bengal', 'West Bengal', 'regiona', 'women', '', '', 'west_bengal.jpg', NULL, 'art_work_done', '');

-- --------------------------------------------------------

--
-- Table structure for table `preferences`
--

CREATE TABLE `preferences` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `value` int(11) NOT NULL,
  `comments` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `preferences`
--

INSERT INTO `preferences` (`id`, `name`, `value`, `comments`) VALUES
(1, 'NO_OF_DRESSES_PER_ROW', 3, 'This is the number of topics, per row, on home page'),
(2, 'NO_OF_DRESSES_TO_SHOW', 12, 'The number of Question per quiz'),
(3, 'NAME_OF_FAVORITE_DRESS', 0, 'Crop Top'),
(4, 'DEFAULT_VIEW_FOR_HOME_PAGE', 0, 'Grid'),
(5, 'IMAGE_HEIGHT_IN_GRID', 0, 'the height'),
(6, 'IMAGE_WIDTH_IN_GRID', 0, 'the width'),
(7, 'IMAGE_HEIGHT_IN_CAROUSAL', 0, 'carosual height'),
(8, 'IMAGE_WIDTH_IN_CAROUSAL', 0, 'width of carousal');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(75) NOT NULL,
  `hash` varchar(200) NOT NULL,
  `active` varchar(10) NOT NULL,
  `role` varchar(20) NOT NULL,
  `modified_time` date NOT NULL,
  `created_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `hash`, `active`, `role`, `modified_time`, `created_time`) VALUES
(1, 'Siva', 'Jasthi', 'siva@silcmn.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'yes', 'admin', '0000-00-00', '0000-00-00'),
(2, 'Mahesh', 'Sunkara', 'mahesh@silcmn.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'yes', 'admin', '0000-00-00', '0000-00-00'),
(3, 'SILC', 'Tester', 'test@silcmn.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'yes', 'admin', '0000-00-00', '0000-00-00'),
(4, 'SILC', 'CS320', 'cs320@silcmn.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'yes', 'admin', '0000-00-00', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dresses`
--
ALTER TABLE `dresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `preferences`
--
ALTER TABLE `preferences`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dresses`
--
ALTER TABLE `dresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
