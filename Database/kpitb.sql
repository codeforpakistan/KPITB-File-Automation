-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2016 at 09:01 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kpitb`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(10) UNSIGNED NOT NULL,
  `from` varchar(255) NOT NULL DEFAULT '',
  `to` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `sent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recd` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `signature` tinyint(2) NOT NULL,
  `document_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `staff_id`, `text`, `time_stamp`, `signature`, `document_id`) VALUES
(1, 10, 'MA comment wako ow oss ye print kom :-)\n', '2016-01-27 03:31:58', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment_notes`
--

CREATE TABLE `comment_notes` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `text` longtext NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `signature` tinyint(2) NOT NULL,
  `document_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `intial_note`
--

CREATE TABLE `intial_note` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `subject` varchar(60) NOT NULL,
  `detail` text NOT NULL,
  `attachment` varchar(100) NOT NULL,
  `signature` varchar(100) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sendto` int(11) NOT NULL,
  `approval` tinyint(3) NOT NULL,
  `archieve` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `letter`
--

CREATE TABLE `letter` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `subject` varchar(60) NOT NULL,
  `attachment` varchar(100) NOT NULL,
  `detail` text NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `signature` tinyint(2) NOT NULL,
  `sendto` int(11) NOT NULL,
  `approval` tinyint(4) NOT NULL,
  `archieve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `letter`
--

INSERT INTO `letter` (`id`, `staff_id`, `subject`, `attachment`, `detail`, `time_stamp`, `signature`, `sendto`, `approval`, `archieve`) VALUES
(1, 1, 'Welcome', '', 'ljdhlfjadjslfkdjso', '2016-01-27 03:27:08', 1, 10, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `letter_log`
--

CREATE TABLE `letter_log` (
  `id` int(11) NOT NULL,
  `letter_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciver_id` int(11) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `received` tinyint(2) NOT NULL,
  `sent` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `letter_log`
--

INSERT INTO `letter_log` (`id`, `letter_id`, `sender_id`, `reciver_id`, `time_stamp`, `received`, `sent`) VALUES
(1, 1, 1, 10, '2016-01-27 07:27:08', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `letter_status`
--

CREATE TABLE `letter_status` (
  `status_id` int(11) NOT NULL,
  `letter_id` int(11) NOT NULL,
  `value` tinyint(4) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_status`
--

CREATE TABLE `login_status` (
  `login_id` int(11) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `time_in` time NOT NULL,
  `date` date NOT NULL,
  `time_out` time NOT NULL,
  `staff_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_status`
--

INSERT INTO `login_status` (`login_id`, `ip_address`, `time_in`, `date`, `time_out`, `staff_id`, `status`) VALUES
(95, '127.0.0.1', '09:02:27', '2016-01-20', '00:00:00', 1, 0),
(96, '127.0.0.1', '08:26:38', '2016-01-27', '08:27:49', 1, 1),
(97, '127.0.0.1', '08:29:32', '2016-01-27', '00:00:00', 10, 0),
(98, '127.0.0.1', '08:30:09', '2016-01-27', '00:00:00', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `note_log`
--

CREATE TABLE `note_log` (
  `id` int(11) NOT NULL,
  `note_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciver_id` int(11) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `received` tinyint(4) NOT NULL,
  `sent` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `letter_id` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `value` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permission_allocated`
--

CREATE TABLE `permission_allocated` (
  `id` int(11) NOT NULL,
  `right_id` int(11) NOT NULL,
  `time_stamp` date NOT NULL,
  `staff_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `setting_name` varchar(20) NOT NULL,
  `value` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `cnic` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `father_name` varchar(20) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `signature` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `online` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `first_name`, `last_name`, `cnic`, `email`, `father_name`, `designation`, `signature`, `password`, `picture`, `time_stamp`, `online`) VALUES
(1, 'Asim', 'Javeed', '-2312321-2', 'Asim@kpitb.com', 'Asim Khan', 'MD', 'Imagination', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'img.jpg', '0000-00-00 00:00:00', 0),
(9, 'Mohammad', 'Bilal', '15702-1248768-9', 'Bilal@kpitb.com', 'Mohammad Bilal', 'Manager Operations', 'IMG_1161.JPG', 'b803dda39ec7688d084519334d7609344b049301698384bd755b1a6fbde0d979', 'IMG_11611.JPG', '2016-01-19 06:31:56', 0),
(10, 'Allauddin', 'Yousafxai', '42401-4988299-9', 'allauddin@kpitb.com', 'M.Jalil', 'Civic Hacker', 'IMG_1015.JPG', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'IMG_11612.JPG', '2016-01-19 06:41:35', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_id_idx` (`staff_id`);

--
-- Indexes for table `comment_notes`
--
ALTER TABLE `comment_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intial_note`
--
ALTER TABLE `intial_note`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `letter`
--
ALTER TABLE `letter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `letter_log`
--
ALTER TABLE `letter_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `letter_status`
--
ALTER TABLE `letter_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `login_status`
--
ALTER TABLE `login_status`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `note_log`
--
ALTER TABLE `note_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_allocated`
--
ALTER TABLE `permission_allocated`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `comment_notes`
--
ALTER TABLE `comment_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `intial_note`
--
ALTER TABLE `intial_note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `letter`
--
ALTER TABLE `letter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `letter_log`
--
ALTER TABLE `letter_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `letter_status`
--
ALTER TABLE `letter_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login_status`
--
ALTER TABLE `login_status`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `note_log`
--
ALTER TABLE `note_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permission_allocated`
--
ALTER TABLE `permission_allocated`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `staff_id` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
