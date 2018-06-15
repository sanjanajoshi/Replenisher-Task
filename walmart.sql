-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2018 at 10:39 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `walmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `member_login`
--

CREATE TABLE `member_login` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_login`
--

INSERT INTO `member_login` (`id`, `first_name`, `last_name`, `email`, `username`, `password`, `role`) VALUES
(1, 'Sanjana', 'joshi', 'sj@sj.com', 'sanjana', 'sanjana', 'manager'),
(2, 'saif', 'ahmed', 'sa@sj.com', 'saif', 'saif', 'employee'),
(3, 'Snigdha', 'Reddy', 'snig@sj.com', 'snigs', 'snigs', 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `task_name` varchar(255) DEFAULT NULL,
  `task_description` varchar(255) DEFAULT NULL,
  `recurrence` varchar(255) DEFAULT NULL,
  `priority` varchar(255) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `tasks_last_recurred` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `manager_id`, `task_name`, `task_description`, `recurrence`, `priority`, `emp_id`, `tasks_last_recurred`, `status`) VALUES
(1, 1, 'replenish', 'replenish the items', 'daily', '0', 2, '2018-06-13 02:37:00', 'pending'),
(2, 1, 'work', 'work on this task', 'hourly', '2', 2, '2018-06-13 03:00:00', 'pending'),
(3, 1, 'task', 'immediately', 'daily', '1', 2, '2018-06-14 15:11:52', 'pending'),
(4, 1, 'once task', 'once task example', 'once', '1', 3, '2018-06-14 15:20:30', 'pending'),
(5, 1, 'once task', 'once task example 1', 'once', '1', 2, '2018-06-14 15:22:22', 'pending'),
(6, 1, 'task', 'once task example 2', 'once', '1', 2, '2018-06-14 15:28:46', 'pending'),
(7, 1, 'do this', 'daily check', 'daily', '1', 2, '2018-06-14 16:10:35', 'pending'),
(8, 1, 'daily check', 'daily check', 'hourly', '1', 2, '2018-06-14 16:12:56', 'pending'),
(9, 1, 'once task part 2', 'once task examplle part 2', 'once', '2', 2, '2018-06-14 16:32:14', 'pending'),
(10, 1, 'daily check', 'daily check 113', 'daily', '1', 3, '2018-06-14 16:38:18', 'pending'),
(11, 1, 'hourly check', 'check every hour', 'hourly', '2', 3, '2018-06-14 16:42:06', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `task_notes`
--

CREATE TABLE `task_notes` (
  `task_id` int(11) NOT NULL,
  `task_notes_last_recurred` datetime NOT NULL,
  `notes` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_notes`
--

INSERT INTO `task_notes` (`task_id`, `task_notes_last_recurred`, `notes`) VALUES
(1, '2018-06-13 02:37:00', 'Check note'),
(1, '2018-06-13 02:37:00', 'do it'),
(10, '2018-06-14 16:38:18', 'Hello'),
(10, '2018-06-14 16:38:18', 'Hello there'),
(10, '2018-06-14 16:38:18', 'Hi Hello heloo'),
(10, '2018-06-14 16:38:18', 'Is this complete yet?'),
(10, '2018-06-14 16:38:18', 'The');

-- --------------------------------------------------------

--
-- Table structure for table `task_status`
--

CREATE TABLE `task_status` (
  `task_status_task_id` int(11) NOT NULL,
  `task_status_last_recurred` datetime NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_status`
--

INSERT INTO `task_status` (`task_status_task_id`, `task_status_last_recurred`, `status`) VALUES
(1, '2018-06-13 02:37:00', 'completed'),
(6, '2018-06-14 15:28:46', 'pending'),
(7, '2018-06-14 16:10:35', 'pending'),
(7, '2018-06-15 16:10:35', 'pending'),
(7, '2018-06-16 16:10:35', 'pending'),
(7, '2018-06-17 16:10:35', 'pending'),
(7, '2018-06-18 16:10:35', 'pending'),
(7, '2018-06-19 16:10:35', 'pending'),
(7, '2018-06-20 16:10:35', 'pending'),
(7, '2018-06-21 16:10:35', 'pending'),
(8, '2018-06-14 16:12:56', 'pending'),
(8, '2018-06-14 17:12:56', 'pending'),
(8, '2018-06-14 18:12:56', 'pending'),
(8, '2018-06-14 19:12:56', 'pending'),
(8, '2018-06-14 20:12:56', 'pending'),
(8, '2018-06-14 21:12:56', 'completed'),
(8, '2018-06-14 22:12:56', 'pending'),
(8, '2018-06-14 23:12:56', 'pending'),
(8, '2018-06-15 00:12:56', 'pending'),
(8, '2018-06-15 01:12:56', 'pending'),
(8, '2018-06-15 02:12:56', 'pending'),
(8, '2018-06-15 03:12:56', 'pending'),
(8, '2018-06-15 04:12:56', 'pending'),
(8, '2018-06-15 05:12:56', 'pending'),
(8, '2018-06-15 06:12:56', 'pending'),
(8, '2018-06-15 07:12:56', 'pending'),
(8, '2018-06-15 08:12:56', 'pending'),
(8, '2018-06-15 09:12:56', 'pending'),
(8, '2018-06-15 10:12:56', 'pending'),
(8, '2018-06-15 11:12:56', 'pending'),
(8, '2018-06-15 12:12:56', 'pending'),
(8, '2018-06-15 13:12:56', 'pending'),
(8, '2018-06-15 14:12:56', 'pending'),
(8, '2018-06-15 15:12:56', 'pending'),
(8, '2018-06-15 16:12:56', 'pending'),
(9, '2018-06-14 16:32:14', 'pending'),
(10, '2018-06-14 16:38:18', 'completed'),
(10, '2018-06-15 16:38:18', 'pending'),
(10, '2018-06-16 16:38:18', 'pending'),
(10, '2018-06-17 16:38:18', 'pending'),
(10, '2018-06-18 16:38:18', 'pending'),
(10, '2018-06-19 16:38:18', 'pending'),
(10, '2018-06-20 16:38:18', 'pending'),
(11, '2018-06-14 16:42:06', 'pending'),
(11, '2018-06-14 17:42:06', 'pending'),
(11, '2018-06-14 18:42:06', 'pending'),
(11, '2018-06-14 19:42:06', 'pending'),
(11, '2018-06-14 20:42:06', 'pending'),
(11, '2018-06-14 21:42:06', 'pending'),
(11, '2018-06-14 22:42:06', 'pending'),
(11, '2018-06-14 23:42:06', 'pending'),
(11, '2018-06-15 00:42:06', 'pending'),
(11, '2018-06-15 01:42:06', 'pending'),
(11, '2018-06-15 02:42:06', 'pending'),
(11, '2018-06-15 03:42:06', 'pending'),
(11, '2018-06-15 04:42:06', 'pending'),
(11, '2018-06-15 05:42:06', 'pending'),
(11, '2018-06-15 06:42:06', 'pending'),
(11, '2018-06-15 07:42:06', 'pending'),
(11, '2018-06-15 08:42:06', 'pending'),
(11, '2018-06-15 09:42:06', 'pending'),
(11, '2018-06-15 10:42:06', 'pending'),
(11, '2018-06-15 11:42:06', 'pending'),
(11, '2018-06-15 12:42:06', 'pending'),
(11, '2018-06-15 13:42:06', 'pending'),
(11, '2018-06-15 14:42:06', 'pending'),
(11, '2018-06-15 15:42:06', 'pending'),
(11, '2018-06-15 16:42:06', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `task_track`
--

CREATE TABLE `task_track` (
  `task_id` int(11) NOT NULL,
  `task_track_last_recurred` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  `feedback` varchar(255) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_track`
--

INSERT INTO `task_track` (`task_id`, `task_track_last_recurred`, `status`, `feedback`, `change_time`) VALUES
(1, '2018-06-13 02:37:00', 'in progress', 'doing it', '2018-06-13 03:00:00'),
(2, '2018-06-13 03:00:00', 'pending', NULL, '2018-06-13 03:00:00'),
(1, '2018-06-13 02:37:00', 'completed', 'done', '2018-06-13 03:00:00'),
(9, '2018-06-14 16:32:14', 'pending', NULL, '2018-06-14 16:32:14'),
(10, '2018-06-14 16:38:18', 'pending', NULL, '2018-06-14 16:38:18'),
(10, '2018-06-15 16:38:18', 'pending', NULL, '2018-06-15 16:38:18'),
(10, '2018-06-16 16:38:18', 'pending', NULL, '2018-06-16 16:38:18'),
(10, '2018-06-17 16:38:18', 'pending', NULL, '2018-06-17 16:38:18'),
(10, '2018-06-18 16:38:18', 'pending', NULL, '2018-06-18 16:38:18'),
(10, '2018-06-19 16:38:18', 'pending', NULL, '2018-06-19 16:38:18'),
(10, '2018-06-20 16:38:18', 'pending', NULL, '2018-06-20 16:38:18'),
(11, '2018-06-14 16:42:06', 'pending', NULL, '2018-06-14 16:42:06'),
(11, '2018-06-14 17:42:06', 'pending', NULL, '2018-06-14 17:42:06'),
(11, '2018-06-14 18:42:06', 'pending', NULL, '2018-06-14 18:42:06'),
(11, '2018-06-14 19:42:06', 'pending', NULL, '2018-06-14 19:42:06'),
(11, '2018-06-14 20:42:06', 'pending', NULL, '2018-06-14 20:42:06'),
(11, '2018-06-14 21:42:06', 'pending', NULL, '2018-06-14 21:42:06'),
(11, '2018-06-14 22:42:06', 'pending', NULL, '2018-06-14 22:42:06'),
(11, '2018-06-14 23:42:06', 'pending', NULL, '2018-06-14 23:42:06'),
(11, '2018-06-15 00:42:06', 'pending', NULL, '2018-06-15 00:42:06'),
(11, '2018-06-15 01:42:06', 'pending', NULL, '2018-06-15 01:42:06'),
(11, '2018-06-15 02:42:06', 'pending', NULL, '2018-06-15 02:42:06'),
(11, '2018-06-15 03:42:06', 'pending', NULL, '2018-06-15 03:42:06'),
(11, '2018-06-15 04:42:06', 'pending', NULL, '2018-06-15 04:42:06'),
(11, '2018-06-15 05:42:06', 'pending', NULL, '2018-06-15 05:42:06'),
(11, '2018-06-15 06:42:06', 'pending', NULL, '2018-06-15 06:42:06'),
(11, '2018-06-15 07:42:06', 'pending', NULL, '2018-06-15 07:42:06'),
(11, '2018-06-15 08:42:06', 'pending', NULL, '2018-06-15 08:42:06'),
(11, '2018-06-15 09:42:06', 'pending', NULL, '2018-06-15 09:42:06'),
(11, '2018-06-15 10:42:06', 'pending', NULL, '2018-06-15 10:42:06'),
(11, '2018-06-15 11:42:06', 'pending', NULL, '2018-06-15 11:42:06'),
(11, '2018-06-15 12:42:06', 'pending', NULL, '2018-06-15 12:42:06'),
(11, '2018-06-15 13:42:06', 'pending', NULL, '2018-06-15 13:42:06'),
(11, '2018-06-15 14:42:06', 'pending', NULL, '2018-06-15 14:42:06'),
(11, '2018-06-15 15:42:06', 'pending', NULL, '2018-06-15 15:42:06'),
(11, '2018-06-15 16:42:06', 'pending', NULL, '2018-06-15 16:42:06'),
(10, '2018-06-14 16:38:18', 'in progress', NULL, '2018-06-14 17:48:38'),
(10, '2018-06-14 16:38:18', 'completed', NULL, '2018-06-14 20:38:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member_login`
--
ALTER TABLE `member_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `fk_emp_id` (`emp_id`);

--
-- Indexes for table `task_notes`
--
ALTER TABLE `task_notes`
  ADD PRIMARY KEY (`task_id`,`task_notes_last_recurred`,`notes`);

--
-- Indexes for table `task_status`
--
ALTER TABLE `task_status`
  ADD PRIMARY KEY (`task_status_task_id`,`task_status_last_recurred`);

--
-- Indexes for table `task_track`
--
ALTER TABLE `task_track`
  ADD PRIMARY KEY (`task_id`,`task_track_last_recurred`,`status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member_login`
--
ALTER TABLE `member_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
