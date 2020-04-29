-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2020 at 03:57 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

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
(1, 'Abdul Kalam Dress', 'This suit is worn by missile scientist and former president of India Abdul Kalam', 'He is known as', 'men', 'men', 'NA', 'Suit', 'abdul_kalam_dress.jpg', 'abdul_kalam_dress.jpg', 'art_work_done', 'change me '),
(2, 'Amul Girl', 'amul girl', 'amul girl', 'other', 'NA', 'NA', 'Dress', 'amul_girl.jpg', 'amul_girl.jpg', 'proposed', ''),
(3, 'Arunachal Pradesh', 'Arunachal Pradesh', 'Arunachal Pradesh', 'women', 'women', 'Mumbai', 'Dress', 'arunachal_pradesh.jpg', 'arunachal_pradesh.jpg', 'art_work_done', ''),
(4, 'Assam', 'Assam', 'Assam', 'regiona', 'women', 'Mumbai', 'Dress', 'assam.jpg', 'assam.jpg', 'art_work_done', ''),
(5, 'Bharath Mata\n', 'Bharath Mata', 'Bharath Mata', 'regiona', 'women', 'Mumbai', 'Traditional', 'bharath_mata_.jpg', 'bharath_mata_.jpg', 'art_work_done', ''),
(6, 'Boy Shorts', 'Boy Shorts', 'Boy Shorts', 'regiona', 'boy', 'Mumbai', 'Casual', 'boy_shorts.jpg', 'boy_shorts.jpg', 'art_work_done', ''),
(7, 'Chudidar', 'Chudidar', 'Chudidar', 'regiona', 'women', 'Mumbai', 'Casual', 'chudidar.jpg', 'chudidar.jpg', 'art_work_done', ''),
(8, 'Crop Top', 'Crop Top', 'Crop Top', 'regiona', 'women', 'Mumbai', 'Traditional', 'crop_top.jpg', 'crop_top.jpg', 'art_work_done', ''),
(9, 'Crop Top Girl', 'Crop Top Girl', 'Crop Top Girl', 'regiona', 'women', 'Kolkata', 'Dress', 'crop_top_girl.jpg', 'crop_top_girl.jpg', 'art_work_done', ''),
(10, 'Dabba Wala', 'Dabba Wala', 'Dabba Wala', 'regiona', 'men', 'Kolkata', 'Suit', 'dabba_wala.jpg', 'dabba_wala.jpg', 'art_work_done', ''),
(11, 'Dance Bhangra Boy', 'Dance Bhangra Boy', 'Dance Bhangra Boy', 'dance', 'men', 'Delhi', 'dance', 'dance_bhangra_boy.jpg', 'dance_bhangra_boy.jpg', 'art_work_done', ''),
(12, 'Dance Bhangra Girl', 'Dance Bhangra Girl', 'Dance Bhangra Girl', 'dance', 'women', 'Delhi', 'dance', 'dance_bhangra_girl.jpg', 'dance_bhangra_girl.jpg', 'art_work_done', ''),
(13, 'Dance Bharata Natyam', 'Dance Bharata Natyam', 'Dance Bharata Natyam', 'dance', 'women', 'Delhi', 'dance', 'dance_bharata_natyam.jpg', 'dance_bharata_natyam.jpg', 'art_work_done', ''),
(14, 'Dance Bihu', 'Dance Bihu', 'Dance Bihu', 'dance', 'women', 'Delhi', 'dance', 'dance_bihu.jpg', 'dance_bihu.jpg', 'art_work_done', ''),
(15, 'Dance Kathak', 'Dance Kathak', 'Dance Kathak', 'dance', 'women', 'Delhi', 'dance', 'dance_kathak.jpg', 'dance_kathak.jpg', 'art_work_done', ''),
(16, 'Dance Kathakali', 'Dance Kathakali', 'Dance Kathakali', 'dance', 'women', 'Kolkata', 'dance', 'dance_kathakali.jpg', 'dance_kathakali.jpg', 'art_work_done', ''),
(17, 'Dance Kuchipudi', 'Dance Kuchipudi', 'Dance Kuchipudi', 'dance', 'women', 'Kolkata', 'dance', 'dance_kuchipudi.jpg', 'dance_kuchipudi.jpg', 'art_work_done', ''),
(18, 'Dance Mohiniyattam', 'Dance Mohiniyattam', 'Dance Mohiniyattam', 'dance', 'women', 'New Delhi', 'dance', 'dance_mohiniyattam.jpg', 'dance_mohiniyattam.jpg', 'art_work_done', ''),
(19, 'Dance Odissi', 'Dance Odissi', 'Dance Odissi', 'dance', 'women', 'New Delhi', 'dance', 'dance_odissi.jpg', 'dance_odissi.jpg', 'art_work_done', ''),
(20, 'Dhoti Lalchi', 'Dhoti Lalchi', 'Dhoti Lalchi', 'regiona', 'men', 'New Delhi', 'Casual', 'dhoti_lalchi.jpg', 'dhoti_lalchi.jpg', 'art_work_done', ''),
(21, 'Gaghra Choli', 'Gaghra Choli', 'Gaghra Choli', 'regiona', 'women', 'New Delhi', 'Traditional', 'gaghra_choli.jpg', 'gaghra_choli.jpg', 'art_work_done', ''),
(22, 'Gandhi Dress', 'Gandhi Dress', 'Gandhi Dress', 'regiona', 'men', 'New Delhi', 'Traditional', 'gandhi_dress.jpg', 'gandhi_dress.jpg', 'art_work_done', ''),
(23, 'Garbha Ras Gujarath', 'Garbha Ras Gujarath', 'Garbha Ras Gujarath', 'dance', 'women', 'New Delhi', 'Traditional', 'garbha_ras_gujarath.jpg', 'garbha_ras_gujarath.jpg', 'art_work_done', ''),
(24, 'Goa Koli', 'Goa Koli', 'Goa Koli', 'regiona', 'women', 'New Delhi', 'Dress', 'goa_koli.jpg', 'goa_koli.jpg', 'art_work_done', ''),
(25, 'Gujarathi', 'Gujarathi', 'Gujarathi', 'regiona', 'women', 'Chennai', 'Dress', 'gujarathi.jpg', 'gujarathi.jpg', 'art_work_done', ''),
(26, 'Himachal Pradesh Girl', 'Himachal Pradesh Girl', 'Himachal Pradesh Girl', 'regiona', 'women', 'Chennai', 'Dress', 'himachal_pradesh_girl.jpg', 'himachal_pradesh_girl.jpg', 'art_work_done', ''),
(27, 'I Love Silc Boy', 'I Love Silc Boy', 'I Love Silc Boy', 'regiona', 'boy', 'Chennai', 'Casual', 'i_love_silc_boy.jpg', 'i_love_silc_boy.jpg', 'art_work_done', ''),
(28, 'I Love Silc Girl', 'I Love Silc Girl', 'I Love Silc Girl', 'regiona', 'girl', 'Chennai', 'Casual', 'i_love_silc_girl.jpg', 'i_love_silc_girl.jpg', 'art_work_done', ''),
(29, 'Jaisalmar Boy', 'Jaisalmar Boy', 'Jaisalmar Boy', 'regiona', 'men', 'Chennai', 'Traditional', 'jaisalmar_boy.jpg', 'jaisalmar_boy.jpg', 'art_work_done', ''),
(30, 'Jhansi Lakshmi Bai', 'Jhansi Lakshmi Bai', 'Jhansi Lakshmi Bai', 'regiona', 'women', 'Chennai', 'Traditional', 'jhansi_lakshmi_bai.jpg', 'jhansi_lakshmi_bai.jpg', 'art_work_done', ''),
(31, 'Kannada Saree', 'Kannada Saree', 'Kannada Saree', 'regiona', 'women', 'Chennai', 'Dress', 'kannada_saree.jpg', 'kannada_saree.jpg', 'art_work_done', ''),
(32, 'King Dress', 'King Dress', 'King Dress', 'regiona', 'men', 'Mumbai', 'Traditional', 'king_dress.jpg', 'king_dress.jpg', 'art_work_done', ''),
(33, 'Kreala', 'Kreala', 'Kreala', 'regiona', 'women', 'Mumbai', 'Dress', 'kreala.jpg', 'kreala.jpg', 'art_work_done', ''),
(34, 'Kurta Boy', 'Kurta Boy', 'Kurta Boy', 'regiona', 'men', 'Mumbai', 'Casual', 'kurta_boy.jpg', 'kurta_boy.jpg', 'art_work_done', ''),
(35, 'Langa Jacket', 'Langa Jacket', 'Langa Jacket', 'regiona', 'girl', 'Mumbai', 'Traditional', 'langa_jacket.jpg', 'langa_jacket.jpg', 'art_work_done', ''),
(36, 'Langa Voni', 'Langa Voni', 'Langa Voni', 'regiona', 'girl', 'Mumbai', 'Traditional', 'langa_voni.jpg', 'langa_voni.jpg', 'art_work_done', ''),
(37, 'Lungi', 'Lungi', 'Lungi', 'regiona', 'men', 'Delhi', 'Casual', 'lungi.jpg', 'lungi.jpg', 'art_work_done', ''),
(38, 'Manipur', 'Manipur', 'Manipur', 'regiona', 'women', 'Delhi', 'Casual', 'manipur.jpg', 'manipur.jpg', 'art_work_done', ''),
(39, 'Marathi', 'Marathi', 'Marathi', 'regiona', 'women', 'Delhi', 'Dress', 'marathi.jpg', 'marathi.jpg', 'art_work_done', ''),
(40, 'Megalaya', 'Megalaya', 'Megalaya', 'regiona', 'women', 'Delhi', 'Casual', 'megalaya.jpg', 'megalaya.jpg', 'art_work_done', ''),
(41, 'Mizoram', 'Mizoram', 'Mizoram', 'regiona', 'women', 'Delhi', 'Traditional', 'mizoram.jpg', 'mizoram.jpg', 'art_work_done', ''),
(42, 'Nagalad', 'Nagalad', 'Nagalad', 'regiona', 'women', 'Delhi', 'Traditional', 'nagalad.jpg', 'nagalad.jpg', 'art_work_done', ''),
(43, 'Panjabi', 'Panjabi', 'Panjabi', 'regiona', 'women', 'Hyderabad', 'Casual', 'panjabi.jpg', 'panjabi.jpg', 'art_work_done', ''),
(44, 'Pathan Dress', 'Pathan Dress', 'Pathan Dress', 'regiona', 'men', 'Hyderabad', 'Casual', 'pathan_dress.jpg', 'pathan_dress.jpg', 'art_work_done', ''),
(45, 'Rajastan', 'Rajastan', 'Rajastan', 'regiona', 'women', 'Hyderabad', 'Traditional', 'rajastan.jpg', 'rajastan.jpg', 'art_work_done', ''),
(46, 'Saree Dress', 'Saree Dress', 'Saree Dress', 'regiona', 'women', 'Hyderabad', 'Dress', 'saree_dress.jpg', 'saree_dress.jpg', 'art_work_done', ''),
(47, 'Tamilnadu', 'Tamilnadu', 'Tamilnadu', 'regiona', 'women', 'Hyderabad', 'Dress', 'tamilnadu.jpg', 'tamilnadu.jpg', 'art_work_done', ''),
(48, 'Tribal Dress', 'Tribal Dress', 'Tribal Dress', 'regiona', 'women', 'Hyderabad', 'Traditional', 'tribal_dress.jpg', 'tribal_dress.jpg', 'art_work_done', ''),
(49, 'Tripura', 'Tripura', 'Tripura', 'regiona', 'women', 'Hyderabad', 'Dress', 'tripura.jpg', 'tripura.jpg', 'art_work_done', ''),
(50, 'West Bengal', 'West Bengal', 'West Bengal', 'regiona', 'women', 'Hyderabad', 'Traditional', 'west_bengal.jpg', 'west_bengal.jpg', 'art_work_done', '');

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
(1, 'NO_OF_DRESSES_PER_ROW', 3, 'This is the number of Dresses, per row, on home page'),
(2, 'NO_OF_DRESSES_TO_SHOW', 50, 'The number of Dresses'),
(3, 'NAME_OF_FAVORITE_DRESS', 0, 'Abdul Kalam Dress'),
(4, 'DEFAULT_VIEW_FOR_HOME_PAGE', 0, 'Grid'),
(5, 'IMAGE_HEIGHT_IN_GRID', 200, 'the height'),
(6, 'IMAGE_WIDTH_IN_GRID', 200, 'the width'),
(7, 'IMAGE_HEIGHT_IN_CAROUSAL', 400, 'carousal height'),
(8, 'IMAGE_WIDTH_IN_CAROUSAL', 400, 'width of carousal');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
