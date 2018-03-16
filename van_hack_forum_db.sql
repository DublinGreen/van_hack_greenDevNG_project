-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 16, 2018 at 01:44 
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `van_hack_forum_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `van_categories`
--

CREATE TABLE IF NOT EXISTS `van_categories` (
`id` int(10) unsigned NOT NULL,
  `status` enum('ACTIVE','NOT ACTIVE') NOT NULL DEFAULT 'NOT ACTIVE',
  `name` char(250) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `van_categories`
--

INSERT INTO `van_categories` (`id`, `status`, `name`, `time_added`) VALUES
(1, 'ACTIVE', 'JAVA', '2018-02-23 01:19:25'),
(2, 'ACTIVE', 'PHP', '2018-02-23 01:19:25'),
(3, 'ACTIVE', 'JQUERY', '2018-02-23 01:19:32'),
(4, 'ACTIVE', 'CSS', '2018-03-14 16:22:27'),
(5, 'ACTIVE', 'HTML', '2018-03-14 16:22:57');

-- --------------------------------------------------------

--
-- Table structure for table `van_comments`
--

CREATE TABLE IF NOT EXISTS `van_comments` (
`id` bigint(20) unsigned NOT NULL,
  `post_id` bigint(20) unsigned NOT NULL,
  `status` enum('PUBLISH','NOT PUBLISHED') NOT NULL DEFAULT 'NOT PUBLISHED',
  `comment` text NOT NULL,
  `name` char(255) NOT NULL,
  `email` char(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `van_comments`
--

INSERT INTO `van_comments` (`id`, `post_id`, `status`, `comment`, `name`, `email`, `time_added`) VALUES
(1, 1, 'PUBLISH', 'Testing', 'Dublin Green Bernard Idisimagha', 'greendublin007@gmail.com', '2018-02-24 12:41:04'),
(2, 1, 'PUBLISH', 'Testing', 'Dublin Green Bernard Idisimagha', 'greendublin007@gmail.com', '2018-02-24 12:42:27'),
(3, 1, 'PUBLISH', 'Final test', 'bernard', 'greendublin007@gmail.com', '2018-02-25 07:52:10'),
(4, 2, 'PUBLISH', 'Hello', 'bernard', 'greendublin007@gmail.com', '2018-02-25 07:54:09'),
(5, 2, 'PUBLISH', 'Hello', 'bernard', 'greendublin007@gmail.com', '2018-02-25 07:57:14'),
(6, 2, 'PUBLISH', 'JAVA IS COOL', 'Tobi', 'tobi@gmail.com', '2018-02-25 08:13:32');

-- --------------------------------------------------------

--
-- Table structure for table `van_posts`
--

CREATE TABLE IF NOT EXISTS `van_posts` (
`id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `category` char(255) NOT NULL,
  `title` char(250) NOT NULL,
  `content` char(250) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `van_posts`
--

INSERT INTO `van_posts` (`id`, `user_id`, `category`, `title`, `content`, `time_added`) VALUES
(1, 1, 'PHP', 'PHP ob_start()', 'Can someone please explain how ob_start() works in PHP', '2018-02-23 01:36:32'),
(2, 2, 'JAVA', 'InputStream for file downloding', 'Hello guys, how do i download a file in JAVA. Thanks in advance.', '2018-02-23 10:53:53'),
(3, 2, 'PHP', 'VanHack', 'Oh yeah. Done. This project was fun....', '2018-02-25 22:37:08'),
(4, 2, 'HTML', 'HTML VIDEO', 'How do i add a video to my webpage. Thanks guyz', '2018-03-14 16:10:34'),
(5, 2, 'CSS', 'BORDER RADIUS', 'How to do border radius with CSS', '2018-03-14 16:12:28'),
(6, 2, 'CSS', 'CSS OPACITY', 'How to add opacity in CSS.', '2018-03-14 16:15:28'),
(7, 2, 'CSS', 'UNIT IN CSS', 'Best unit for layout', '2018-03-14 16:22:27'),
(8, 2, 'HTML', 'HTML AUDIO', 'How to play music HTML...', '2018-03-14 16:22:57');

-- --------------------------------------------------------

--
-- Table structure for table `van_survey`
--

CREATE TABLE IF NOT EXISTS `van_survey` (
`id` bigint(20) unsigned NOT NULL,
  `type` enum('Q_AND_A','OPINION') NOT NULL DEFAULT 'Q_AND_A',
  `question` text NOT NULL,
  `region` char(255) NOT NULL,
  `expire` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `van_survey`
--

INSERT INTO `van_survey` (`id`, `type`, `question`, `region`, `expire`, `time_added`) VALUES
(1, 'OPINION', 'What do you think about c++ in 2018', 'nigeria', '2018-05-26 11:52:51', '2018-01-29 12:54:52'),
(2, 'OPINION', 'Java vs C#', 'nigeria', '2018-05-05 11:53:07', '2018-01-30 12:54:52'),
(3, 'Q_AND_A', 'Favorite PHP framework', 'ondo', '2018-07-19 12:01:30', '2018-01-30 13:53:34'),
(4, 'Q_AND_A', 'Favorite programming language in 2018', 'nigeria', '2018-06-28 11:58:39', '2018-01-07 14:01:20');

-- --------------------------------------------------------

--
-- Table structure for table `van_survey_answers`
--

CREATE TABLE IF NOT EXISTS `van_survey_answers` (
`id` bigint(20) unsigned NOT NULL,
  `user_ip` char(255) NOT NULL,
  `survey_id` bigint(20) unsigned NOT NULL,
  `survey_options_id` bigint(20) unsigned NOT NULL,
  `survey_option_choice` char(10) NOT NULL,
  `answer` text NOT NULL,
  `name` char(255) NOT NULL,
  `email` char(255) NOT NULL,
  `telephone` char(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `van_survey_answers`
--

INSERT INTO `van_survey_answers` (`id`, `user_ip`, `survey_id`, `survey_options_id`, `survey_option_choice`, `answer`, `name`, `email`, `telephone`, `time_added`) VALUES
(1, '::1', 3, 1, 'A', '', '', '', '', '2018-01-22 16:21:13'),
(2, '::2', 3, 2, 'B', '', '', '', '', '2018-01-22 16:28:55'),
(3, '::3', 3, 1, 'A', '', '', '', '', '2018-01-23 10:25:35'),
(4, '::1', 3, 2, 'B', '', '', '', '', '2018-01-24 12:28:38'),
(5, '::1', 3, 3, 'C', '', '', '', '', '2018-01-24 12:28:44'),
(6, '::1', 3, 4, 'D', '', '', '', '', '2018-01-24 12:28:47'),
(7, '::1', 3, 1, 'A', '', '', '', '', '2018-01-24 12:28:51'),
(8, '::1', 3, 1, 'A', '', '', '', '', '2018-01-24 12:28:53'),
(9, '::1', 3, 1, 'A', '', '', '', '', '2018-01-24 12:28:56'),
(10, '::1', 3, 1, 'A', '', '', '', '', '2018-01-24 12:28:59'),
(11, '::1', 3, 3, 'C', '', '', '', '', '2018-01-24 12:29:03'),
(12, '::1', 3, 2, 'B', '', '', '', '', '2018-01-24 12:29:06'),
(13, '::1', 3, 1, 'A', '', '', '', '', '2018-01-24 12:34:35'),
(14, '::1', 3, 4, 'D', '', '', '', '', '2018-01-24 12:59:47'),
(15, '::1', 3, 2, 'B', '', '', '', '', '2018-01-24 12:59:57'),
(16, '::1', 3, 3, 'C', '', '', '', '', '2018-01-24 13:00:01'),
(17, '::1', 3, 3, 'C', '', '', '', '', '2018-01-24 13:00:46'),
(18, '::1', 3, 2, 'B', '', '', '', '', '2018-01-24 13:00:50'),
(19, '::1', 3, 1, 'A', '', '', '', '', '2018-01-24 13:00:55'),
(20, '::1', 3, 2, 'B', '', '', '', '', '2018-01-24 13:14:55'),
(21, '::1', 3, 3, 'C', '', '', '', '', '2018-01-24 13:18:51'),
(22, '::1', 3, 1, 'A', '', '', '', '', '2018-01-24 13:19:09'),
(23, '::1', 3, 1, 'A', '', '', '', '', '2018-01-24 13:30:57'),
(24, '::1', 3, 1, 'A', '', '', '', '', '2018-01-24 13:32:28'),
(25, '::1', 3, 3, 'C', '', '', '', '', '2018-01-24 13:33:47'),
(26, '::1', 3, 4, 'D', '', '', '', '', '2018-01-24 13:37:46'),
(27, '::1', 3, 1, 'A', '', '', '', '', '2018-01-24 13:40:37'),
(28, '::1', 3, 4, 'D', '', '', '', '', '2018-01-24 13:41:28'),
(29, '::1', 3, 1, 'A', '', '', '', '', '2018-01-24 13:44:21'),
(30, '::1', 3, 1, 'A', '', '', '', '', '2018-01-24 13:47:35'),
(31, '::1', 3, 1, 'A', '', '', '', '', '2018-01-24 13:51:27'),
(32, '::1', 3, 1, 'A', '', '', '', '', '2018-01-24 13:52:38'),
(33, '::1', 3, 1, 'A', '', '', '', '', '2018-01-24 13:53:53'),
(34, '::1', 3, 1, 'A', '', '', '', '', '2018-01-24 14:00:14'),
(35, '::1', 3, 1, 'A', '', '', '', '', '2018-01-24 14:05:09'),
(36, '::1', 4, 5, 'A', '', '', '', '', '2018-01-24 14:06:41'),
(37, '127.0.0.1', 4, 6, 'B', '', '', '', '', '2018-01-24 14:07:24'),
(38, '127.0.0.1', 3, 2, 'B', '', '', '', '', '2018-01-24 14:10:21'),
(39, '::1', 4, 5, 'A', '', '', '', '', '2018-01-25 08:49:38'),
(40, '::1', 3, 1, 'A', '', '', '', '', '2018-01-25 08:49:48'),
(41, '::1', 4, 7, 'C', '', '', '', '', '2018-01-25 22:34:35'),
(42, '::1', 3, 2, 'B', '', '', '', '', '2018-01-25 22:34:42'),
(43, '', 2, 0, '', 'Testing', 'bernard', 'greendublin007@gmail.com', '+2347032090809', '2018-01-26 08:26:32'),
(44, '', 2, 0, '', 'Testing', 'bernard', 'greendublin007@gmail.com', '+2347032090809', '2018-01-26 08:32:27'),
(45, '', 2, 0, '', 'This is another test', 'taiwo', 'taiwo@gmail.com', '', '2018-01-26 08:51:40'),
(46, '', 1, 0, '', 'Test 123', 'tonye', 'tonye@gmail.com', '', '2018-01-26 08:57:01'),
(47, '', 2, 0, '', 'This is a tobi test', 'tobi', 'tobi@yahoo.com', '+2347032090809', '2018-01-26 11:43:41'),
(48, '::1', 4, 8, 'D', '', '', '', '', '2018-01-26 12:08:29'),
(49, '::1', 3, 2, 'B', '', '', '', '', '2018-01-26 12:08:37'),
(50, '::1', 4, 6, 'B', '', '', '', '', '2018-01-31 08:33:45'),
(51, '::1', 3, 2, 'B', '', '', '', '', '2018-01-31 08:33:53'),
(52, '::1', 4, 6, 'B', '', '', '', '', '2018-02-23 18:48:09'),
(53, '', 2, 0, '', 'Testing again', 'bernard', 'greendublin007@gmail.com', '+2347032090809', '2018-02-24 12:28:04'),
(54, '', 1, 0, '', 'Final testing', 'bernard', 'greendublin007@gmail.com', '+2347032090809', '2018-02-25 11:55:51'),
(55, '', 1, 0, '', 'Micheal test', 'micheal', 'micheal@hakkteam.com', '+2347032090809', '2018-02-25 11:57:13');

-- --------------------------------------------------------

--
-- Table structure for table `van_survey_options`
--

CREATE TABLE IF NOT EXISTS `van_survey_options` (
`id` bigint(20) unsigned NOT NULL,
  `survery_id` bigint(20) unsigned NOT NULL,
  `options_slot` enum('A','B','C','D') NOT NULL DEFAULT 'A',
  `option` mediumtext NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `van_survey_options`
--

INSERT INTO `van_survey_options` (`id`, `survery_id`, `options_slot`, `option`, `time_added`) VALUES
(1, 3, 'A', 'YII', '2018-01-22 13:55:39'),
(2, 3, 'B', 'Code Igniter', '2018-01-22 13:55:39'),
(3, 3, 'C', 'Cake PHP', '2018-01-22 13:56:31'),
(4, 3, 'D', 'Laravel', '2018-01-22 13:56:31'),
(5, 4, 'A', 'C++', '2018-01-24 14:01:45'),
(6, 4, 'B', 'JAVA', '2018-01-24 14:01:45'),
(7, 4, 'C', 'PYTHON', '2018-01-24 14:02:02'),
(8, 4, 'D', 'PHP', '2018-01-24 14:02:02');

-- --------------------------------------------------------

--
-- Table structure for table `van_survey_q_and_a_results`
--

CREATE TABLE IF NOT EXISTS `van_survey_q_and_a_results` (
`id` bigint(20) unsigned NOT NULL,
  `survey_id` bigint(20) unsigned NOT NULL,
  `survey_question` text NOT NULL,
  `survey_option_a_per` char(255) NOT NULL,
  `survey_option_b_per` char(255) NOT NULL,
  `survey_option_c_per` char(255) NOT NULL,
  `survey_option_d_per` char(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `van_survey_q_and_a_results`
--

INSERT INTO `van_survey_q_and_a_results` (`id`, `survey_id`, `survey_question`, `survey_option_a_per`, `survey_option_b_per`, `survey_option_c_per`, `survey_option_d_per`, `time_added`) VALUES
(2, 3, 'Favorite PHP framework', '50', '25', '15', '10', '2018-01-24 12:59:23'),
(3, 4, 'Favorite programming language in 2018', '29', '43', '14', '14', '2018-01-24 14:02:04');

-- --------------------------------------------------------

--
-- Table structure for table `van_users`
--

CREATE TABLE IF NOT EXISTS `van_users` (
`id` bigint(20) unsigned NOT NULL,
  `status` enum('ACTIVE','NOT ACTIVE') NOT NULL DEFAULT 'NOT ACTIVE',
  `username` char(100) NOT NULL,
  `email` char(255) NOT NULL,
  `password` char(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `van_users`
--

INSERT INTO `van_users` (`id`, `status`, `username`, `email`, `password`, `time_added`) VALUES
(1, 'ACTIVE', 'greenDevNG', 'greendublin007@gmail.com', 'da61c35d15adf1ae727a0b0f8c25bbddb3b3143ede1c0c5cbdb636087f1467169e60f784d0eacf75655c7cf0adb788cef420b99cd2635fffb1f952db0e96e2fd', '2018-02-23 01:32:52'),
(2, 'ACTIVE', 'vanhack', 'vanhack@gmail.com', 'da61c35d15adf1ae727a0b0f8c25bbddb3b3143ede1c0c5cbdb636087f1467169e60f784d0eacf75655c7cf0adb788cef420b99cd2635fffb1f952db0e96e2fd', '2018-02-23 01:35:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `van_categories`
--
ALTER TABLE `van_categories`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `van_comments`
--
ALTER TABLE `van_comments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `van_posts`
--
ALTER TABLE `van_posts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `van_survey`
--
ALTER TABLE `van_survey`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `van_survey_answers`
--
ALTER TABLE `van_survey_answers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `van_survey_options`
--
ALTER TABLE `van_survey_options`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `van_survey_q_and_a_results`
--
ALTER TABLE `van_survey_q_and_a_results`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `van_users`
--
ALTER TABLE `van_users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`,`email`), ADD KEY `username_2` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `van_categories`
--
ALTER TABLE `van_categories`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `van_comments`
--
ALTER TABLE `van_comments`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `van_posts`
--
ALTER TABLE `van_posts`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `van_survey`
--
ALTER TABLE `van_survey`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `van_survey_answers`
--
ALTER TABLE `van_survey_answers`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `van_survey_options`
--
ALTER TABLE `van_survey_options`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `van_survey_q_and_a_results`
--
ALTER TABLE `van_survey_q_and_a_results`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `van_users`
--
ALTER TABLE `van_users`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
