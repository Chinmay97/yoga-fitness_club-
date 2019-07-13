-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2018 at 05:49 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_netyoga`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_members`
--

CREATE TABLE IF NOT EXISTS `tbl_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_name` varchar(100) NOT NULL,
  `member_dob` date NOT NULL,
  `member_email` varchar(200) NOT NULL,
  `member_dp` varchar(200) NOT NULL,
  `member_phone` varchar(20) NOT NULL,
  `member_city` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_members`
--

INSERT INTO `tbl_members` (`id`, `member_name`, `member_dob`, `member_email`, `member_dp`, `member_phone`, `member_city`) VALUES
(6, 'Delin', '0000-00-00', 'delin@', '', '1234', 'kochi'),
(7, 'Admin', '0000-00-00', 'admin', '', '', ''),
(8, 'Anu Joy', '2011-02-08', 'anu@', '', '11112222', 'aafvd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tutor`
--

CREATE TABLE IF NOT EXISTS `tbl_tutor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tutor_name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `number_of_videos` int(11) NOT NULL,
  `city` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_tutor`
--

INSERT INTO `tbl_tutor` (`id`, `tutor_name`, `email`, `phone`, `number_of_videos`, `city`) VALUES
(3, 'Arun', 'arun@', '234567', 0, 'ekm'),
(4, 'Anu', 'anu@', '45678', 0, 'pala');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_types_ofyoga`
--

CREATE TABLE IF NOT EXISTS `tbl_types_ofyoga` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(50) NOT NULL,
  `cat_desc` varchar(200) NOT NULL,
  `benifits` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_types_ofyoga`
--

INSERT INTO `tbl_types_ofyoga` (`id`, `cat_name`, `cat_desc`, `benifits`) VALUES
(3, 'Vinyasa Yoga111', 'Vinyasa yoga is popular and is taught at most studios and gyms. “Vinyasa” means linking breath with movement. The postures are usually done in a flowing sequence, or "vinyasa flow." The fluid movement', ''),
(4, 'Ashtanga Yoga', 'Ashtanga means “eight limbs” and encompasses a yogic lifestyle. Most people identify Ashtanga as traditional Indian yoga. Like Vinyasa yoga, the Ashtanga yoga asanas (postures) synchronize breath with', ''),
(5, 'sevsfdvsfvs', 'fbvsrv', 'sdrgv');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `passwd` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `user_id`, `user_type`, `user_name`, `passwd`, `status`) VALUES
(2, 6, 2, 'delin@', 'delin', 0),
(3, 7, 1, 'admin', 'admin', 0),
(4, 8, 2, 'anu@', '1', 0),
(7, 3, 3, 'arun@', 'arun', 1),
(8, 4, 3, 'anu@', 'anu', 1),
(9, 5, 3, '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_videos`
--

CREATE TABLE IF NOT EXISTS `tbl_videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `video` varchar(200) NOT NULL,
  `prefered` varchar(200) NOT NULL,
  `v_length` int(11) NOT NULL,
  `date` date NOT NULL,
  `tutor_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_videos`
--

INSERT INTO `tbl_videos` (`id`, `cat_id`, `title`, `description`, `video`, `prefered`, `v_length`, `date`, `tutor_id`) VALUES
(11, 4, 'awefaerf', 'sefser', 'Cool_-_funny_Ringtone_Pick_Up_Da_Phone_FOO!!!1.mp4', 'dfsvsbgvsrgb', 22, '2018-10-21', 7);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
