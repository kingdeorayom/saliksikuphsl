-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2021 at 08:42 AM
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
(89, 12, 'Machine Problem #2M.pdf', '../uploads/theses/619ef1e7e935c6.01070736.pdf', 'Marc Menguito', 'pending'),
(89, 41, 'Assignment #11 - System Project Development Life Cycle - Menguito.pdf', '../uploads/journals/619f3e18538cf6.22180114.pdf', 'Marc Menguito', 'pending');

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

--
-- Dumping data for table `journal_information`
--

INSERT INTO `journal_information` (`file_ref_id`, `journal_id`, `journal_title`, `journal_subtitle`, `department`, `volume_number`, `serial_issue_number`, `ISSN`, `journal_description`, `chief_editor_first_name`, `chief_editor_middle_initial`, `chief_editor_last_name`, `chief_editor_name_ext`, `chief_editor_email`) VALUES
(41, 1, 'TitleText', 'SubTitle', 'Arts and Sciences', 16, 37, '56ABC', 'desc1', 'Lorenzo', 'Y', 'Menguito', 'exten', 'lorenzo.menguito@yahoo.com');

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
  `research_fields` varchar(255) NOT NULL,
  `publication_month` int(11) NOT NULL,
  `publication_day` int(11) NOT NULL,
  `publication_year` int(11) NOT NULL,
  `coAuthors_count` int(11) NOT NULL,
  `author_first_name` varchar(255) NOT NULL,
  `author_middle_initial` varchar(255) NOT NULL,
  `author_surname` varchar(255) NOT NULL,
  `author_name_ext` varchar(255) NOT NULL,
  `author_email` varchar(255) NOT NULL,
  `coauthor1_first_name` varchar(255) NOT NULL,
  `coauthor1_middle_initial` varchar(255) NOT NULL,
  `coauthor1_surname` varchar(255) NOT NULL,
  `coauthor1_name_ext` varchar(255) NOT NULL,
  `coauthor1_email` varchar(255) NOT NULL,
  `coauthor2_first_name` varchar(11) NOT NULL,
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
  `coauthor4_middile_initial` varchar(255) NOT NULL,
  `coauthor4_surname` varchar(255) NOT NULL,
  `coauthor4_name_ext` varchar(255) NOT NULL,
  `coauthor4_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `research_information`
--

INSERT INTO `research_information` (`file_ref_id`, `research_id`, `resource_type`, `researchers_category`, `research_unit`, `research_title`, `research_fields`, `publication_month`, `publication_day`, `publication_year`, `coAuthors_count`, `author_first_name`, `author_middle_initial`, `author_surname`, `author_name_ext`, `author_email`, `coauthor1_first_name`, `coauthor1_middle_initial`, `coauthor1_surname`, `coauthor1_name_ext`, `coauthor1_email`, `coauthor2_first_name`, `coauthor2_middle_initial`, `coauthor2_surname`, `coauthor2_name_ext`, `coauthor2_email`, `coauthor3_first_name`, `coauthor3_middle_initial`, `coauthor3_surname`, `coauthor3_name_ext`, `coauthor3_email`, `coauthor4_first_name`, `coauthor4_middile_initial`, `coauthor4_surname`, `coauthor4_name_ext`, `coauthor4_email`) VALUES
(12, 10, 'capstone', 'faculty', 'Law', 'Research Title', 'Accountancy and Marketing, Educational Management, IT and Engineering', 6, 16, 2021, 0, 'Marc', 'C.', 'Menguito', '', 'lloydmenguito@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

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
-- Indexes for table `file_information`
--
ALTER TABLE `file_information`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `journal_information`
--
ALTER TABLE `journal_information`
  ADD PRIMARY KEY (`journal_id`);

--
-- Indexes for table `research_information`
--
ALTER TABLE `research_information`
  ADD PRIMARY KEY (`research_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file_information`
--
ALTER TABLE `file_information`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `journal_information`
--
ALTER TABLE `journal_information`
  MODIFY `journal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `research_information`
--
ALTER TABLE `research_information`
  MODIFY `research_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
