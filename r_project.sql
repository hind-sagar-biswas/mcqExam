-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2022 at 01:50 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `r_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `option_id` int(11) NOT NULL,
  `option_a_img` varchar(255) DEFAULT NULL,
  `option_b_img` varchar(255) DEFAULT NULL,
  `option_c_img` varchar(255) DEFAULT NULL,
  `option_d_img` varchar(255) DEFAULT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) NOT NULL,
  `option_d` varchar(255) NOT NULL,
  `option_ns` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`option_id`, `option_a_img`, `option_b_img`, `option_c_img`, `option_d_img`, `option_a`, `option_b`, `option_c`, `option_d`, `option_ns`) VALUES
(1, '', '5.png', '', '4.png', 'dont know', '', 'wtf', 'tuu', ' on'),
(2, '', '5.png', '', '4.png', 'dont know', '', 'wtf', 'tuu', ' on'),
(3, '20220902112722_', '20220902112722_5.png', '20220902112722_', '20220902112722_4.png', 'dont know', '', 'wtf', 'tuu', ' on'),
(4, '20220902115041_', '20220902115041_5.png', '20220902115041_', '20220902115041_4.png', 'dont know', '', 'wtf', 'tuu', 'on'),
(5, '20220902115735_', '20220902115735_5.png', '20220902115735_', '20220902115735_4.png', 'dont know', '', 'wtf', 'tuu', 'on'),
(6, '20220902014433_', '20220902014433_', '20220902014433_', '20220902014433_', 'gt', 'sd', 'hn', 'k', ''),
(7, '20220902014543_', '20220902014543_', '20220902014543_', '20220902014543_', 'gt', 'sd', 'hn', 'k', ''),
(8, '20220902014634_', '20220902014634_', '20220902014634_', '20220902014634_', 'gt', 'sd', 'hn', 'k', ''),
(9, '20220902014655_', '20220902014655_', '20220902014655_', '20220902014655_', 'gt', 'sd', 'hn', 'k', '');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `q_id` int(11) NOT NULL,
  `class` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `chapter` varchar(255) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `sub_topic_id` int(11) DEFAULT NULL,
  `q_image` varchar(255) DEFAULT NULL,
  `q_text` varchar(1000) NOT NULL,
  `q_answer` varchar(255) NOT NULL,
  `option_id` int(11) NOT NULL,
  `ref_image` varchar(255) DEFAULT NULL,
  `ref_text` varchar(500) DEFAULT NULL,
  `ref_link` varchar(255) DEFAULT NULL,
  `create_time` datetime NOT NULL DEFAULT current_timestamp(),
  `update_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`q_id`, `class`, `subject`, `chapter`, `topic_id`, `sub_topic_id`, `q_image`, `q_text`, `q_answer`, `option_id`, `ref_image`, `ref_text`, `ref_link`, `create_time`, `update_time`) VALUES
(24, 'five', 'chemistry', 'org', 0, 0, '20220902112218_1download.jpg', '\r\n      what is your name?', 'b', 0, '20220902112218_1.jpg', '', NULL, '2022-09-02 15:22:18', '2022-09-02 15:22:18'),
(25, 'five', 'chemistry', 'org', 0, 0, '20220902112549_1download.jpg', '\r\n      what is your name?', 'b', 2, '20220902112549_1.jpg', '', NULL, '2022-09-02 15:25:49', '2022-09-02 15:25:49'),
(26, 'five', 'chemistry', 'org', 0, 0, '20220902112722_1download.jpg', '\r\n      what is your name?', 'b', 3, '20220902112722_1.jpg', '', NULL, '2022-09-02 15:27:22', '2022-09-02 15:27:22'),
(27, 'five', 'chemistry', 'org', 0, 0, '20220902115041_1download.jpg', '\r\n      what is your name?', 'b', 0, '20220902115041_1.jpg', '', 'http://localhost/phpmyadmin/index.php?route=/sql&db=r_project&table=questions&pos=0', '2022-09-02 15:50:41', '2022-09-02 15:50:41'),
(28, 'five', 'chemistry', 'org', 4, 5, '20220902115735_1download.jpg', '\r\n      what is your name?', 'b', 5, '20220902115735_1.jpg', '', 'http://localhost/phpmyadmin/index.php?route=/sql&db=r_project&table=questions&pos=0', '2022-09-02 15:57:35', '2022-09-02 15:57:35'),
(29, 'five', 'sdfgdfg', 'sdfgfsd', 6, 7, '20220902014433_5.png', '\r\n      gyuoip[]', 'a', 6, '20220902014433_', 'gnj', '', '2022-09-02 17:44:33', '2022-09-02 17:44:33'),
(30, 'five', 'sdfgdfg', 'sdfgfsd', 8, 9, '20220902014543_5.png', '\r\n      gyuoip[]', 'a', 7, '20220902014543_', 'gnj', '', '2022-09-02 17:45:44', '2022-09-02 17:45:44'),
(31, 'five', 'sdfgdfg', 'sdfgfsd', 10, 11, '20220902014634_5.png', '\r\n      gyuoip[]', 'a', 8, '20220902014634_', 'gnj', '', '2022-09-02 17:46:34', '2022-09-02 17:46:34'),
(32, 'five', 'sdfgdfg', 'sdfgfsd', 12, 13, '20220902014655_5.png', '\r\n      gyuoip[]', 'a', 9, '20220902014655_', 'gnj', '', '2022-09-02 17:46:55', '2022-09-02 17:46:55');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `test_id` int(255) NOT NULL,
  `test_title` varchar(100) NOT NULL,
  `test_description` varchar(255) DEFAULT NULL,
  `test_class` varchar(100) DEFAULT NULL,
  `test_subject` varchar(100) DEFAULT NULL,
  `test_topic` int(255) DEFAULT NULL,
  `unattended_mark` int(10) NOT NULL DEFAULT 0,
  `correct_mark` int(10) NOT NULL DEFAULT 1,
  `wrong_mark` int(10) NOT NULL DEFAULT 0,
  `ns_enabled` varchar(255) NOT NULL DEFAULT 'off',
  `create_time` datetime NOT NULL DEFAULT current_timestamp(),
  `update_type` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `topic_name` varchar(255) NOT NULL,
  `topic_type` varchar(255) NOT NULL DEFAULT 'main'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `topic_name`, `topic_type`) VALUES
(1, 'isomerism', 'main'),
(2, 'isomerism', 'main'),
(3, 'isomerism', 'sub'),
(4, 'isomerism', 'main'),
(5, 'isomerism', 'sub'),
(6, 'isomerism', 'main'),
(7, 'isomerism', 'sub'),
(8, 'isomerism', 'main'),
(9, 'isomerism', 'sub'),
(10, 'isomerism', 'main'),
(11, 'dty7u', 'sub'),
(12, 'isomerism', 'main'),
(13, '', 'sub');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`option_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `test_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
