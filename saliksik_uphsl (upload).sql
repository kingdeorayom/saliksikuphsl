-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2021 at 10:42 AM
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
(6, '123', '123', '123', '123', '123', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, 'Marc', 'C.', 'Menguito', '2123', 'lloydmenguito@gmail.com', 'Marc', 'C.', 'Menguito', '231', 'lloydmenguito@gmail.com', '', '', '', '', '', '', '', '', '', '');

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
(89, 68, 'Assignment #11 - System Project Development Life Cycle - Menguito.pdf', '../uploads/theses/61a344b61ea902.29102429.pdf', 'Marc Menguito', 'pending'),
(89, 69, 'JFC COOP MPL 2021.pdf', '../uploads/infographics/61a34cbd3b7a55.65417639.pdf', 'Marc Menguito', 'pending');

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
  `coAuthor_count` int(11) NOT NULL,
  `coauthor_group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `infographic_information`
--

INSERT INTO `infographic_information` (`file_ref_id`, `infographic_id`, `infographic_research_unit`, `infographic_researcher_category`, `infographic_publication_month`, `infographic_publication_day`, `infographic_publication_year`, `infographic_title`, `infographic_description`, `author_first_name`, `author_middle_initial`, `author_surname`, `author_ext`, `author_email`, `editor_first_name`, `editor_middle_initial`, `editor_surname`, `editor_ext`, `editor_email`, `coAuthor_count`, `coauthor_group_id`) VALUES
(69, 3, 'Arts and Sciences', 'faculty', 1, 1, 2021, '123', '12345', 'Marc', 'C.', 'Menguito', '123', 'lloydmenguito@gmail.com', 'Marc', 'C.', 'Menguito', '321', 'lloydmenguito@gmail.com', 2, 7);

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
  `coauthor_group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `research_information`
--

INSERT INTO `research_information` (`file_ref_id`, `research_id`, `resource_type`, `researchers_category`, `research_unit`, `research_title`, `research_fields`, `publication_month`, `publication_day`, `publication_year`, `coAuthors_count`, `author_first_name`, `author_middle_initial`, `author_surname`, `author_name_ext`, `author_email`, `coauthor_group_id`) VALUES
(68, 11, 'dissertation', 'undergraduate', 'Basic Education', 'Research Title', 'Accountancy and Marketing, Educational Management, IT and Engineering, Tourism and Hospitality', 1, 1, 2021, 1, 'Marc', 'C.', 'Menguito', '', 'lloydmenguito@gmail.com', 6);

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
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `infographic_information`
--
ALTER TABLE `infographic_information`
  ADD PRIMARY KEY (`infographic_id`);

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
-- AUTO_INCREMENT for table `coauthors_information`
--
ALTER TABLE `coauthors_information`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `file_information`
--
ALTER TABLE `file_information`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `infographic_information`
--
ALTER TABLE `infographic_information`
  MODIFY `infographic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `journal_information`
--
ALTER TABLE `journal_information`
  MODIFY `journal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `research_information`
--
ALTER TABLE `research_information`
  MODIFY `research_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
