-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2021 at 05:26 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saliksik_uphsl`
--

-- --------------------------------------------------------

--
-- Table structure for table `coauthors_information`
--

CREATE TABLE `coauthors_information` (
  `group_id` int(11) NOT NULL,
  `coauthor1_first_name` varchar(255) NOT NULL,
  `coauthor1_middle_initial` varchar(255) NOT NULL,
  `coauthor1_surname` varchar(255) NOT NULL,
  `coauthor1_name_ext` varchar(255) NOT NULL,
  `coauthor1_email` varchar(255) NOT NULL,
  `coauthor2_first_name` varchar(255) NOT NULL,
  `coauthor2_middle_initial` varchar(255) NOT NULL,
  `coauthor2_surname` varchar(255) NOT NULL,
  `coauthor2_name_ext` varchar(255) NOT NULL,
  `coauthor2_email` varchar(255) NOT NULL,
  `coauthor3_first_name` varchar(255) NOT NULL,
  `coauthor3_middle_initial` varchar(255) NOT NULL,
  `coauthor3_surname` varchar(255) NOT NULL,
  `coauthor3_name_ext` varchar(255) NOT NULL,
  `coauthor3_email` varchar(255) NOT NULL,
  `coauthor4_first_name` varchar(255) NOT NULL,
  `coauthor4_middle_initial` varchar(255) NOT NULL,
  `coauthor4_surname` varchar(255) NOT NULL,
  `coauthor4_name_ext` varchar(255) NOT NULL,
  `coauthor4_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coauthors_information`
--

INSERT INTO `coauthors_information` (`group_id`, `coauthor1_first_name`, `coauthor1_middle_initial`, `coauthor1_surname`, `coauthor1_name_ext`, `coauthor1_email`, `coauthor2_first_name`, `coauthor2_middle_initial`, `coauthor2_surname`, `coauthor2_name_ext`, `coauthor2_email`, `coauthor3_first_name`, `coauthor3_middle_initial`, `coauthor3_surname`, `coauthor3_name_ext`, `coauthor3_email`, `coauthor4_first_name`, `coauthor4_middle_initial`, `coauthor4_surname`, `coauthor4_name_ext`, `coauthor4_email`) VALUES
(42, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(43, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `file_information`
--

CREATE TABLE `file_information` (
  `user_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_dir` varchar(255) NOT NULL,
  `file_uploader` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `file_information`
--

INSERT INTO `file_information` (`user_id`, `file_id`, `file_name`, `file_dir`, `file_uploader`, `status`) VALUES
(89, 124, 'Increase Decrease 2019.pdf', '../uploads/theses/61a6f42412d5a6.17224454.pdf', 'Marc Menguito', 'pending'),
(89, 125, 'vaccination_certificate.pdf', '../uploads/theses/61a6f476717ec8.27609926.pdf', 'Marc Menguito', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `infographic_information`
--

CREATE TABLE `infographic_information` (
  `file_ref_id` int(11) NOT NULL,
  `infographic_id` int(11) NOT NULL,
  `infographic_research_unit` varchar(255) NOT NULL,
  `infographic_researcher_category` varchar(255) NOT NULL,
  `infographic_publication_month` int(11) NOT NULL,
  `infographic_publication_day` int(11) NOT NULL,
  `infographic_publication_year` int(11) NOT NULL,
  `infographic_title` varchar(255) NOT NULL,
  `infographic_description` varchar(255) NOT NULL,
  `author_first_name` varchar(255) NOT NULL,
  `author_middle_initial` varchar(255) NOT NULL,
  `author_surname` varchar(255) NOT NULL,
  `author_ext` varchar(255) NOT NULL,
  `author_email` varchar(255) NOT NULL,
  `editor_first_name` varchar(255) NOT NULL,
  `editor_middle_initial` varchar(255) NOT NULL,
  `editor_surname` varchar(255) NOT NULL,
  `editor_ext` varchar(255) NOT NULL,
  `editor_email` varchar(255) NOT NULL,
  `coauthors_count` int(11) NOT NULL,
  `coauthor_group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `journal_information`
--

CREATE TABLE `journal_information` (
  `file_ref_id` int(11) NOT NULL,
  `journal_id` int(11) NOT NULL,
  `journal_title` varchar(255) NOT NULL,
  `journal_subtitle` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `volume_number` int(11) NOT NULL,
  `serial_issue_number` int(11) NOT NULL,
  `ISSN` varchar(255) NOT NULL,
  `journal_description` varchar(255) NOT NULL,
  `chief_editor_first_name` varchar(255) NOT NULL,
  `chief_editor_middle_initial` varchar(255) NOT NULL,
  `chief_editor_last_name` varchar(255) NOT NULL,
  `chief_editor_name_ext` varchar(255) NOT NULL,
  `chief_editor_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `research_information`
--

CREATE TABLE `research_information` (
  `file_ref_id` int(11) NOT NULL,
  `research_id` int(11) NOT NULL,
  `resource_type` varchar(255) NOT NULL,
  `researchers_category` varchar(255) NOT NULL,
  `research_unit` varchar(255) NOT NULL,
  `research_title` varchar(255) NOT NULL,
  `research_abstract` varchar(255) NOT NULL,
  `research_fields` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `publication_month` int(11) NOT NULL,
  `publication_day` int(11) NOT NULL,
  `publication_year` int(11) NOT NULL,
  `coauthors_count` int(11) NOT NULL,
  `author_first_name` varchar(255) NOT NULL,
  `author_middle_initial` varchar(255) NOT NULL,
  `author_surname` varchar(255) NOT NULL,
  `author_name_ext` varchar(255) NOT NULL,
  `author_email` varchar(255) NOT NULL,
  `coauthor_group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `research_information`
--

INSERT INTO `research_information` (`file_ref_id`, `research_id`, `resource_type`, `researchers_category`, `research_unit`, `research_title`, `research_abstract`, `research_fields`, `keywords`, `publication_month`, `publication_day`, `publication_year`, `coauthors_count`, `author_first_name`, `author_middle_initial`, `author_surname`, `author_name_ext`, `author_email`, `coauthor_group_id`) VALUES
(124, 40, 'capstone', 'undergraduate', 'Basic Education', 'Research Title', 'abscra', 'Accountancy and Marketing, Educational Management, IT and Engineering, Tourism and Hospitality', 'key, key21, key234', 1, 1, 2021, 0, '0', 'C.', 'Menguito', '', 'lloydmenguito@gmail.com', 42),
(125, 41, 'capstone', 'undergraduate', 'Basic Education', 'Research Title', 'abscra', 'Accountancy and Marketing, Educational Management, IT and Engineering, Tourism and Hospitality', 'key, key21, key234', 1, 1, 2021, 0, 'Marc', 'C.', 'Menguito', '', 'lloydmenguito@gmail.com', 43);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `department`, `email`, `password`, `user_type`) VALUES
(87, 'Serking', 'De Orayom', 'Computer Studies', 'c16-0648-209@uphsl.edu.ph', '$2y$10$d1eXV3lqDQ/jPUJAER.32uPGA79t3.PyzPzOlZQM9MyNf3ukwvVWW', 'admin'),
(89, 'Marc', 'Menguito', 'Computer Studies', 'c18-2173-281@uphsl.edu.ph', '$2y$10$DB2iACJjdLBWYC.3bOnGTOVuybaVDUPPgN6ggXi4Y5UKPialdWOhq', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coauthors_information`
--
ALTER TABLE `coauthors_information`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `file_information`
--
ALTER TABLE `file_information`
  ADD PRIMARY KEY (`file_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `infographic_information`
--
ALTER TABLE `infographic_information`
  ADD PRIMARY KEY (`infographic_id`),
  ADD KEY `file_ref_id` (`file_ref_id`);

--
-- Indexes for table `journal_information`
--
ALTER TABLE `journal_information`
  ADD PRIMARY KEY (`journal_id`),
  ADD KEY `file_ref_id` (`file_ref_id`);

--
-- Indexes for table `research_information`
--
ALTER TABLE `research_information`
  ADD PRIMARY KEY (`research_id`),
  ADD KEY `coauthors_count` (`coauthors_count`),
  ADD KEY `file_ref_id` (`file_ref_id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coauthors_information`
--
ALTER TABLE `coauthors_information`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `file_information`
--
ALTER TABLE `file_information`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `infographic_information`
--
ALTER TABLE `infographic_information`
  MODIFY `infographic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `journal_information`
--
ALTER TABLE `journal_information`
  MODIFY `journal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `research_information`
--
ALTER TABLE `research_information`
  MODIFY `research_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `file_information`
--
ALTER TABLE `file_information`
  ADD CONSTRAINT `file_information_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `infographic_information`
--
ALTER TABLE `infographic_information`
  ADD CONSTRAINT `infographic_information_ibfk_1` FOREIGN KEY (`file_ref_id`) REFERENCES `file_information` (`file_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `journal_information`
--
ALTER TABLE `journal_information`
  ADD CONSTRAINT `journal_information_ibfk_1` FOREIGN KEY (`file_ref_id`) REFERENCES `file_information` (`file_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `research_information`
--
ALTER TABLE `research_information`
  ADD CONSTRAINT `research_information_ibfk_1` FOREIGN KEY (`file_ref_id`) REFERENCES `file_information` (`file_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
