-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2016 at 04:23 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qurbani`
--

-- --------------------------------------------------------

--
-- Table structure for table `auction_info`
--

CREATE TABLE `auction_info` (
  `auction_id` int(30) NOT NULL,
  `customer_username` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `owner_username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `owner_price` int(30) NOT NULL,
  `customer_price` int(30) DEFAULT NULL,
  `sold_price` int(30) DEFAULT NULL,
  `auction_status` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auction_info`
--

INSERT INTO `auction_info` (`auction_id`, `customer_username`, `owner_username`, `owner_price`, `customer_price`, `sold_price`, `auction_status`) VALUES
(11, NULL, 'ihc', 5000000, NULL, NULL, 'Unsold'),
(10, NULL, 'ihc', 80000, NULL, NULL, 'Unsold'),
(9, NULL, 'ihc', 80000, NULL, NULL, 'Unsold'),
(8, 'fzn', 'ihc', 150000, 60000, NULL, 'Unsold'),
(7, 'fzn', 'ihc', 100000, 50000, NULL, 'Unsold'),
(12, NULL, 'ihc', 5000000, NULL, NULL, 'Unsold');

-- --------------------------------------------------------

--
-- Table structure for table `available_time_info`
--

CREATE TABLE `available_time_info` (
  `available_time_id` int(30) NOT NULL,
  `time_slote_1` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_slote_2` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_slote_3` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_slote_4` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `butcher_info`
--

CREATE TABLE `butcher_info` (
  `butcher_username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `butcher_password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `personal_id` int(30) NOT NULL,
  `service_id` int(30) NOT NULL,
  `hiring_customer_username` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `butcher_info`
--

INSERT INTO `butcher_info` (`butcher_username`, `butcher_password`, `personal_id`, `service_id`, `hiring_customer_username`) VALUES
('anis', 'anis', 51, 9, 'fzn');

-- --------------------------------------------------------

--
-- Table structure for table `cow_info`
--

CREATE TABLE `cow_info` (
  `cow_id` int(30) NOT NULL,
  `owner_username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `attented_doctor_username` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `treatment_id` int(30) DEFAULT NULL,
  `breed` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `birth_place` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `weight` int(30) NOT NULL,
  `height` int(30) NOT NULL,
  `auction_id` int(30) NOT NULL,
  `image` mediumblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cow_info`
--

INSERT INTO `cow_info` (`cow_id`, `owner_username`, `attented_doctor_username`, `treatment_id`, `breed`, `color`, `birth_place`, `weight`, `height`, `auction_id`, `image`) VALUES
(12, 'ihc', 'zahid', NULL, 'Australian', 'Black and white', 'Bangladesh', 250, 180, 7, NULL),
(13, 'ihc', 'zahid', NULL, 'Indian', 'Black', 'Bangladesh', 150, 120, 8, NULL),
(14, 'ihc', 'zahid', NULL, 'Bangladeshi', 'Red', 'Bangladesh', 220, 160, 9, NULL),
(15, 'ihc', 'zahid', NULL, 'Bangladeshi', 'Red', 'Bangladesh', 220, 160, 10, NULL),
(16, 'ihc', 'zahid', NULL, 'hybredd', 'blue', 'Bangladesh', 100, 160, 11, NULL),
(17, 'ihc', 'zahid', NULL, 'hybredd', 'blue', 'Bangladesh', 100, 160, 12, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `customer_username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `customer_password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `personal_id` int(30) NOT NULL,
  `location_id` int(30) NOT NULL,
  `hired_butcher_username` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hired_doctor_username` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`customer_username`, `customer_password`, `personal_id`, `location_id`, `hired_butcher_username`, `hired_doctor_username`) VALUES
('fzn', 'fzn', 48, 49, 'anis', 'zahid');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_degree`
--

CREATE TABLE `doctor_degree` (
  `doctor_username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `passing_year` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `institution_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctor_degree`
--

INSERT INTO `doctor_degree` (`doctor_username`, `passing_year`, `institution_name`) VALUES
('zahid', '1990', 'Dhaka Medical College');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_designation`
--

CREATE TABLE `doctor_designation` (
  `doctor_username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `degree_1` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `degree_2` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `degree_3` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_info`
--

CREATE TABLE `doctor_info` (
  `doctor_username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `doctor_password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `personal_id` int(30) NOT NULL,
  `service_id` int(30) NOT NULL,
  `hiring_customer_username` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hiring_owner_username` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctor_info`
--

INSERT INTO `doctor_info` (`doctor_username`, `doctor_password`, `personal_id`, `service_id`, `hiring_customer_username`, `hiring_owner_username`) VALUES
('zahid', 'zahid', 50, 8, 'fzn', 'ihc');

-- --------------------------------------------------------

--
-- Table structure for table `location_info`
--

CREATE TABLE `location_info` (
  `loaction_id` int(30) NOT NULL,
  `village_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_code` int(30) DEFAULT NULL,
  `district_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `location_info`
--

INSERT INTO `location_info` (`loaction_id`, `village_name`, `post_code`, `district_name`, `phone_number`) VALUES
(52, 'Sheorapara', 1718, 'Dhaka', '369852147'),
(51, 'Airport', 1921, 'Dhaka', '654987321'),
(50, 'Malibag', 1219, 'Dhaka', '123456789'),
(47, 'Malibag', 1219, 'Dhaka', '123456789'),
(48, 'Malibag', 1219, 'Dhaka', '123456789'),
(49, 'Malibag', 1219, 'Dhaka', '123456789'),
(46, 'Rampura', 1219, 'Dhaka', '01689443975');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_info`
--

CREATE TABLE `medicine_info` (
  `medicine_id` int(30) NOT NULL,
  `medicine_1` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `medicine_2` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `medicine_3` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `owner_info`
--

CREATE TABLE `owner_info` (
  `owner_username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `owner_password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `personal_id` int(30) NOT NULL,
  `location_id` int(30) NOT NULL,
  `hired_doctor_username` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `owner_ranking` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `owner_info`
--

INSERT INTO `owner_info` (`owner_username`, `owner_password`, `personal_id`, `location_id`, `hired_doctor_username`, `owner_ranking`) VALUES
('ihc', '111', 45, 46, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_info`
--

CREATE TABLE `personal_info` (
  `personal_id` int(30) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `birth_day` date DEFAULT NULL,
  `location_id` int(30) NOT NULL,
  `image` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `personal_info`
--

INSERT INTO `personal_info` (`personal_id`, `name`, `birth_day`, `location_id`, `image`) VALUES
(45, 'Ibrahim Chowdhury', '1995-12-30', 46, NULL),
(46, 'Farzana Akther', '2011-02-15', 47, NULL),
(47, 'Farzana Akther', '2011-02-15', 48, NULL),
(48, 'Farzana Akther', '2011-02-15', 49, NULL),
(49, 'Farzana Akther', '2011-02-15', 50, NULL),
(50, 'DR. Zahid Hasan', '1996-02-20', 51, NULL),
(51, 'Anis Zubaer', '1976-11-26', 52, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_office_info`
--

CREATE TABLE `post_office_info` (
  `post_code` int(30) NOT NULL,
  `post_office_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post_office_info`
--

INSERT INTO `post_office_info` (`post_code`, `post_office_name`) VALUES
(1219, 'Khilgaon'),
(1718, '\r\nMirpur'),
(1921, 'Uttara');

-- --------------------------------------------------------

--
-- Table structure for table `service_info`
--

CREATE TABLE `service_info` (
  `service_id` int(30) NOT NULL,
  `service_fee` int(30) NOT NULL,
  `year_of_experience` int(30) NOT NULL,
  `location_id` int(30) NOT NULL,
  `available_time_id` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `service_info`
--

INSERT INTO `service_info` (`service_id`, `service_fee`, `year_of_experience`, `location_id`, `available_time_id`) VALUES
(8, 1000, 10, 51, NULL),
(9, 8000, 25, 52, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `treatment_info`
--

CREATE TABLE `treatment_info` (
  `treatment_id` int(30) NOT NULL,
  `doctor_username` int(30) NOT NULL,
  `madicine_id` int(30) NOT NULL,
  `cow_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_feedback`
--

CREATE TABLE `user_feedback` (
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `website_ranking` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `user_status` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auction_info`
--
ALTER TABLE `auction_info`
  ADD PRIMARY KEY (`auction_id`);

--
-- Indexes for table `available_time_info`
--
ALTER TABLE `available_time_info`
  ADD PRIMARY KEY (`available_time_id`);

--
-- Indexes for table `butcher_info`
--
ALTER TABLE `butcher_info`
  ADD PRIMARY KEY (`butcher_username`);

--
-- Indexes for table `cow_info`
--
ALTER TABLE `cow_info`
  ADD PRIMARY KEY (`cow_id`);

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`customer_username`);

--
-- Indexes for table `doctor_degree`
--
ALTER TABLE `doctor_degree`
  ADD PRIMARY KEY (`doctor_username`);

--
-- Indexes for table `doctor_designation`
--
ALTER TABLE `doctor_designation`
  ADD PRIMARY KEY (`doctor_username`);

--
-- Indexes for table `doctor_info`
--
ALTER TABLE `doctor_info`
  ADD PRIMARY KEY (`doctor_username`);

--
-- Indexes for table `location_info`
--
ALTER TABLE `location_info`
  ADD PRIMARY KEY (`loaction_id`);

--
-- Indexes for table `medicine_info`
--
ALTER TABLE `medicine_info`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indexes for table `owner_info`
--
ALTER TABLE `owner_info`
  ADD PRIMARY KEY (`owner_username`);

--
-- Indexes for table `personal_info`
--
ALTER TABLE `personal_info`
  ADD PRIMARY KEY (`personal_id`);

--
-- Indexes for table `post_office_info`
--
ALTER TABLE `post_office_info`
  ADD PRIMARY KEY (`post_code`);

--
-- Indexes for table `service_info`
--
ALTER TABLE `service_info`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `treatment_info`
--
ALTER TABLE `treatment_info`
  ADD PRIMARY KEY (`treatment_id`);

--
-- Indexes for table `user_feedback`
--
ALTER TABLE `user_feedback`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auction_info`
--
ALTER TABLE `auction_info`
  MODIFY `auction_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `available_time_info`
--
ALTER TABLE `available_time_info`
  MODIFY `available_time_id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cow_info`
--
ALTER TABLE `cow_info`
  MODIFY `cow_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `location_info`
--
ALTER TABLE `location_info`
  MODIFY `loaction_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `medicine_info`
--
ALTER TABLE `medicine_info`
  MODIFY `medicine_id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `personal_info`
--
ALTER TABLE `personal_info`
  MODIFY `personal_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `service_info`
--
ALTER TABLE `service_info`
  MODIFY `service_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `treatment_info`
--
ALTER TABLE `treatment_info`
  MODIFY `treatment_id` int(30) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
