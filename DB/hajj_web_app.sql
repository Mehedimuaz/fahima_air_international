-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2017 at 11:46 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hajj_web_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `grp_id` int(11) NOT NULL,
  `management` varchar(255) DEFAULT NULL,
  `grp_name` varchar(255) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `leader` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`grp_id`, `management`, `grp_name`, `details`, `leader`) VALUES
(2, '2', 'Group of Y', 'Group of Y', 161),
(5, 'Private', 'Group of Nick Daloisio', 'Group of Nick Daloisio', 66),
(7, 'Government', 'Group of Tushar', 'Group of Tushar', 128),
(8, 'Government', 'Hajji Group', 'Hajji Group', 156),
(9, 'Private', 'Group Tulin', 'Group Tulin', 147),
(11, 'Government', 'Group of Mahir Ashbab', 'Group of Mahir Ashbab', 152),
(13, 'Government', 'Group of Shushmoy', 'Group of Shushmoy', 162),
(17, 'Government', 'Group of Mark', 'Group of Mark', 164),
(18, 'Government', 'Group of Abdur Rahman', 'Group of Abdur Rahman', 169);

-- --------------------------------------------------------

--
-- Table structure for table `priligrim_info`
--

CREATE TABLE `priligrim_info` (
  `id` int(11) NOT NULL,
  `nid` varchar(50) DEFAULT NULL,
  `bc` varchar(30) DEFAULT NULL,
  `residence` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `grp_id` int(11) DEFAULT NULL,
  `management` varchar(20) DEFAULT NULL,
  `identity` varchar(10) DEFAULT NULL,
  `full_name_ban` varchar(255) DEFAULT NULL,
  `full_name_eng` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `depends_on` varchar(255) DEFAULT NULL,
  `mobile` varchar(30) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `marital_status` varchar(30) DEFAULT NULL,
  `curr_district` varchar(100) DEFAULT NULL,
  `curr_division` varchar(100) DEFAULT NULL,
  `curr_police_station` varchar(100) DEFAULT NULL,
  `curr_address` text,
  `curr_post_code` varchar(100) DEFAULT NULL,
  `per_district` varchar(100) DEFAULT NULL,
  `per_division` varchar(100) DEFAULT NULL,
  `per_police_station` varchar(100) DEFAULT NULL,
  `per_address` text,
  `per_post_code` varchar(100) DEFAULT NULL,
  `passport_no` varchar(100) DEFAULT NULL,
  `passport_type` varchar(255) DEFAULT NULL,
  `date_of_issues` date DEFAULT NULL,
  `date_of_expiry` date DEFAULT NULL,
  `place_of_issuing_authority` varchar(255) DEFAULT NULL,
  `pass_district` varchar(100) DEFAULT NULL,
  `pass_police_station` varchar(100) DEFAULT NULL,
  `pass_address` text,
  `pass_post_code` varchar(100) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `image_type` varchar(100) DEFAULT NULL,
  `image_size` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `priligrim_info`
--

INSERT INTO `priligrim_info` (`id`, `nid`, `bc`, `residence`, `dob`, `gender`, `type`, `grp_id`, `management`, `identity`, `full_name_ban`, `full_name_eng`, `father_name`, `depends_on`, `mobile`, `occupation`, `marital_status`, `curr_district`, `curr_division`, `curr_police_station`, `curr_address`, `curr_post_code`, `per_district`, `per_division`, `per_police_station`, `per_address`, `per_post_code`, `passport_no`, `passport_type`, `date_of_issues`, `date_of_expiry`, `place_of_issuing_authority`, `pass_district`, `pass_police_station`, `pass_address`, `pass_post_code`, `image_name`, `image_type`, `image_size`) VALUES
(2, '201414015', NULL, 'bd', '1994-03-27', 'male', 'individual', 0, 'female', 'nid', 'à¦¨à§à¦¸à¦°à¦¾à¦¤ à¦ªà¦¾à¦°à¦­à§‡à¦œ à¦ªà§à¦²à¦¾à¦¬à¦¿à¦¤à¦¾', 'Nusrat Parvez Plabita', '', '', '01689583182', '', '', '', NULL, '', 'Dhaka', '1234', '', NULL, '', 'Bogra', '1230', '123456789', '', '2017-01-19', NULL, 'Dhaka', '', '', 'Dhaka', '12345', NULL, NULL, NULL),
(20, '201414081', '', NULL, '2017-01-13', NULL, NULL, 5, NULL, 'nid', '', 'baal', 'Anwar Pasha', '', '01556322887', '', '', 'Rajshahi', NULL, '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', NULL, '', '', '', '', '', NULL, NULL, NULL),
(23, '201414020', '', NULL, '2017-01-14', NULL, NULL, NULL, NULL, 'nid', 'Jahidul Islam', 'Jahidul Islam', 'Jahidul Islam Sr', '201414044', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', NULL, '', '', '', '', '', NULL, NULL, NULL),
(25, '201414023', '', NULL, '2017-01-05', NULL, NULL, 9, NULL, 'nid', 'à¦‡à¦«à¦«à¦¾à¦¤ à¦¤à¦¾à¦®à¦¾à¦¨à§à¦¨à¦¾ à¦¤à§à¦²à¦¿à¦¨', 'Iffat Tamanna Tulin', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', 'tulin propic.jpg', 'image/jpeg', 39747),
(26, '201414026', '', NULL, '2017-01-14', NULL, NULL, 5, NULL, 'nid', '', 'Fariha Ahmed', 'à¦«à¦¾à¦°à¦¿à¦¹à¦¾ à¦†à¦¹à¦®à§‡à¦¦', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', NULL, '', '', '', '', '', NULL, NULL, NULL),
(28, '201414032', '', NULL, '2017-01-14', NULL, NULL, 5, NULL, 'nid', 'à¦¨à¦“à¦¶à§€à¦¨ à¦°à¦¾à¦¶à§€à¦¦à¦¿ à¦à¦¶à§€', 'nawsheen rashidi oyshee', '', '', '01689583182', '', '', 'Chittagang', NULL, 'Baridhara', '', '', '', NULL, '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', 'oyshee propic1.jpg', 'image/jpeg', 67239),
(30, '201414044', '', NULL, '2017-01-06', NULL, NULL, 5, NULL, 'nid', 'à¦®à§‹à¦¸à¦¾à¦¦à§à¦¦à§‡à¦• à¦¹à§‹à¦¸à§‡à¦‡à¦¨', 'Mosaddek Hossain', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', NULL, '', '', '', '', '', NULL, NULL, NULL),
(42, '201414027', '', NULL, '2017-01-19', NULL, NULL, 3, NULL, 'nid', 'à¦¸à¦¾à¦®à¦¿à§Ÿà¦¾ à¦°à¦¶à¦¿à¦¦', 'Samia Rashid', '', '', '01689583182', '', '', 'Rajshahi', NULL, 'Baridhara', 'Dhaka', '1234', 'Chittagang', NULL, 'Uttara', 'Mohammadpur', '12345', '1234567890', 'Passport3', '2017-01-06', '0000-00-00', 'Dhaka', 'Dhaka', 'Uttara', 'Dhaka', '1230', 'saima.PNG', 'image/png', 64645),
(43, '201414100', '', NULL, '2017-01-05', NULL, NULL, 2, NULL, 'nid', 'à¦¶à¦¹à¦¿à¦¦à§à¦° à¦°à¦¹à¦®à¦¾à¦¨ à¦¹à¦¿à¦®à§‡à¦²', 'MD. Shahidur Rahman Himel', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', 'Dhaka', 'Dhanmondi', 'Dhaka', '1230', 'bithy.jpg', 'image/jpeg', 53888),
(44, '201414053', '', NULL, '2017-01-20', NULL, NULL, NULL, NULL, 'nid', '', 'Shadman Faysal', '', '', '', 'Business', 'Unmarried', '', NULL, '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', NULL, '', '', '', '', '', NULL, NULL, NULL),
(46, '201414056', '', NULL, '2017-01-04', NULL, 'group', 2, 'Government', 'nid', '', 'Shifat Zaman Mayem', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '', 'Passport3', '0000-00-00', NULL, '', '', '', '', '', NULL, NULL, NULL),
(47, '201414098', '', NULL, '2017-01-12', NULL, 'individual', 0, 'Private', 'nid', '', 'Muaz', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', 'muaz propic.jpg', 'image/jpeg', 50978),
(50, '201414030', '', NULL, '2017-01-07', NULL, 'group', 5, '', 'nid', 'à¦°à¦¾à¦«à¦¿à¦‰à¦² à¦‡à¦¸à¦²à¦¾à¦®', 'Rafiul Islam', '', '201414032', '01556322887', 'Teacher', 'Unmarried', 'Dhaka', NULL, 'Baridhara', 'Sector-11', '12345', 'Dhaka', NULL, 'Uttara', 'Sector-11', '', '', '', '0000-00-00', NULL, '', '', '', '', '', NULL, NULL, NULL),
(55, '201414029', '', NULL, '2017-01-06', NULL, 'individual', 3, 'Government', 'nid', '', 'Shithi', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', NULL, '', '', '', '', '', NULL, NULL, NULL),
(65, '', '111222333', NULL, '2017-01-05', NULL, NULL, 3, NULL, 'bc', '', 'Mofiz Uddin', '', '', '', '', '', 'Rajshahi', NULL, 'Dhanmondi', '', '', '', NULL, '', '', '', '', '', '0000-00-00', NULL, '', '', '', '', '', NULL, NULL, NULL),
(66, '', '1111222223333', NULL, '1995-02-01', NULL, 'group', 5, '', 'bc', '', 'Nick Daloisio', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '250X250.jpg', 'image/jpeg', 28674),
(68, '', '9857', NULL, '2017-01-26', NULL, NULL, 5, NULL, 'bc', '', 'Nafiza Mahmud', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', NULL, '', '', '', '', '', NULL, NULL, NULL),
(70, '', '2683', NULL, '2017-01-31', NULL, NULL, NULL, NULL, 'bc', '', 'Lisa ', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', NULL, '', '', '', '', '', NULL, NULL, NULL),
(71, '201414101', '', 'Australia', '1987-03-12', 'male', NULL, NULL, NULL, 'nid', '', 'Sheikh Faysal Avash', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', 'avash propic.jpg', 'image/jpeg', 210442),
(72, '201414110', '', 'America', '2002-03-27', 'male', NULL, NULL, NULL, 'nid', '', 'Asif Shoummo', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', NULL, '', '', '', '', '', NULL, NULL, NULL),
(75, '20135789', '', 'Australia', '2017-01-05', 'female', NULL, 5, NULL, 'nid', '', 'Arnab Debnath', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', NULL, '', '', '', '', '', NULL, NULL, NULL),
(87, '201414598', NULL, 'Australia', '2017-01-05', 'female', NULL, 2, NULL, 'nid', '', 'Saifur Rahman', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', 'saiful.jpg', 'image/jpeg', 119302),
(88, '201313011', NULL, 'Australia', '1976-03-27', 'male', NULL, NULL, NULL, 'nid', '', 'Alam', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', NULL, '', '', '', '', '', NULL, NULL, NULL),
(89, '201414000', NULL, 'Australia', '2017-01-13', 'male', NULL, 2, NULL, 'nid', '', 'Sheikh Avash', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', NULL, '', '', '', '', '', NULL, NULL, NULL),
(90, '', '201414075', 'Pakistan', '2017-01-20', 'female', NULL, 2, NULL, 'bc', '', 'Angona', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', NULL, '', '', '', '', '', NULL, NULL, NULL),
(91, '', '201313300', 'Australia', '2017-01-07', 'female', NULL, 3, NULL, 'bc', '', 'Pramit Saha', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', NULL, '', '', '', '', '', NULL, NULL, NULL),
(92, '', '8456896', NULL, '2017-01-07', NULL, NULL, 5, NULL, 'bc', '', 'Mehedi Afzal', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', NULL, '', '', '', '', '', NULL, NULL, NULL),
(93, '', '23588', NULL, '2017-01-26', NULL, NULL, 5, NULL, 'bc', '', 'Rakib Hasan', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', NULL, '', '', '', '', '', NULL, NULL, NULL),
(94, '201414164', '', NULL, '2017-01-21', NULL, NULL, 2, NULL, 'nid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, '', '125457', NULL, '2017-01-28', NULL, NULL, 3, NULL, 'bc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(97, '', '6486398216', NULL, '2017-01-06', 'Female', NULL, 0, NULL, 'bc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, '', '1658036', NULL, '1956-06-06', NULL, 'group', 0, '', 'bc', '', 'Shihab', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', NULL, '', '', '', '', '', NULL, NULL, NULL),
(99, '201414073', '', NULL, '1985-02-05', NULL, 'individual', 0, 'Private', 'nid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, '2014140001', '', NULL, '1965-03-10', NULL, 'individual', 0, 'Government', 'nid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, '', '20723678', NULL, '1979-02-22', 'Male', 'group', 0, '', 'bc', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', NULL, '', '', '', '', '', NULL, NULL, NULL),
(103, '', '826186', NULL, '2017-01-19', 'Male', 'group', 3, '', 'bc', '', 'Evana Jahan', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', NULL, NULL, NULL),
(104, '271247', '', NULL, '2017-01-05', 'Male', 'group', 0, '', 'nid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, '', '158289', NULL, '2017-01-19', 'Male', NULL, NULL, NULL, 'bc', '', 'Mahir Faisal', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', 'rafi and mahir.jpg', 'image/jpeg', 57010),
(106, '1285689', '', NULL, '2017-01-04', 'Male', NULL, 0, NULL, 'nid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, '', '7235970', NULL, '2017-01-27', 'Female', NULL, 5, NULL, 'bc', '', 'Jenny', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', NULL, '', '', '', '', '', NULL, NULL, NULL),
(108, '', '2497', NULL, '2017-01-27', 'Male', NULL, 5, NULL, 'bc', '', 'Harry', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', NULL, '', '', '', '', '', NULL, NULL, NULL),
(109, '35972', '', NULL, '2017-01-21', 'Male', NULL, 2, NULL, 'nid', '', 'Niaz Maruf', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', 'niaz.jpg', 'image/jpeg', 49652),
(110, '', '6126', NULL, '2017-01-19', 'Male', NULL, 8, NULL, 'bc', '', 'Mafuzul Haque', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', 'accept the pain and get ready for success.jpg', 'image/jpeg', 65615),
(111, '', '35270923', NULL, '2017-01-20', 'Male', NULL, 2, NULL, 'bc', '', '', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', NULL, '', '', '', '', '', NULL, NULL, NULL),
(112, '', '271487', NULL, '2017-01-27', 'Female', NULL, 0, NULL, 'bc', '', 'Rebeka', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', NULL, '', '', '', '', '', NULL, NULL, NULL),
(113, '', '7325987', NULL, '2017-01-20', 'Female', NULL, NULL, NULL, 'bc', '', 'Rebeka', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', NULL, '', '', '', '', '', NULL, NULL, NULL),
(114, '6382569', '', 'Australia', '2017-01-05', 'female', NULL, NULL, NULL, 'nid', '', 'Pratik', '', '', '', 'Doctor', '', '', NULL, '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', NULL, '', '', '', '', '', NULL, NULL, NULL),
(116, '34634', '', NULL, '2017-01-21', 'Male', 'individual', 0, 'Private', 'nid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(117, '12648961', '', NULL, '2017-01-28', 'Male', 'group', 0, '', 'nid', '', 'Shihab Mahmood', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', NULL, '', '', '', '', '', NULL, NULL, NULL),
(118, '', '623565782', NULL, '2017-01-28', 'Male', 'group', 7, '', 'bc', '', 'Tushar', 'Tushar Jr', '', '', 'Teacher', '', '', '', '', '', '', '', '', '', '', '', '', 'Passport1', '0000-00-00', '0000-00-00', '', '', '', '', '', 'tushar propic.jpg', 'image/jpeg', 172746),
(119, '', '365786', NULL, '1995-02-01', 'Male', 'individual', 0, 'Private', 'bc', '', 'Ashik Iqbal', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', NULL, NULL, NULL),
(120, '201414052', '', NULL, '2017-01-14', 'Male', 'group', 3, '', 'nid', '', 'Rafi', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', NULL, '', '', '', '', '', NULL, NULL, NULL),
(121, '', '5987', NULL, '2017-01-20', 'Male', 'group', 3, '', 'bc', '', 'Maria', '', '30', '', '', '', 'Dhaka', NULL, 'Uttara', '', '', '', NULL, '', '', '', '', '', '0000-00-00', NULL, '', '', '', '', '', NULL, NULL, NULL),
(122, '', '2357978', NULL, '2017-01-20', 'Male', 'individual', 0, 'Government', 'bc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(123, '201414097', '', NULL, '2017-01-14', 'Male', NULL, 3, NULL, 'nid', '', 'Shihab Hossain', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', NULL, '', '', '', '', '', NULL, NULL, NULL),
(124, '', '263489', NULL, '2017-01-14', 'Male', 'individual', 0, 'Private', 'bc', '', 'Shihab Kabir', '', '', '', 'Doctor', '', '', NULL, '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', NULL, '', '', '', '', '', NULL, NULL, NULL),
(125, '201414050', '', NULL, '2017-01-05', 'Male', 'individual', 0, 'Private', 'nid', '', 'Tarikul Islam', '', '', '', 'Teacher', '', '', NULL, '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', NULL, '', '', '', '', '', NULL, NULL, NULL),
(126, '', '325896', NULL, '2017-01-27', 'Male', 'group', NULL, '', 'bc', '', 'Meftahul Islam', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', 'turag propic.jpg', 'image/jpeg', 20803),
(127, '', '846289', NULL, '2017-01-28', 'Male', NULL, 5, NULL, 'bc', '', 'Tahiat', '', '', '', '', '', 'Dinajpur', 'Rangpur', '', '', '', 'Barguna', 'Barisal', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', 'avash propic.jpg', 'image/jpeg', 210442),
(128, '20141401111', '', NULL, '2017-01-14', 'Female', NULL, 7, NULL, 'nid', '', 'Moumita', '', '2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', 'moumita propic.jpg', 'image/jpeg', 65505),
(129, '', '535232', 'America', '2017-01-14', 'male', NULL, 0, NULL, 'bc', '', 'Sean Belneck', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', 'shihab propic.jpg', 'image/jpeg', 56474),
(130, '', '23589789', 'America', '1995-04-06', 'female', NULL, NULL, NULL, 'bc', '', 'Andrew', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '', '', '2017-01-20', '2017-01-19', '', '', '', '', '', NULL, NULL, NULL),
(131, '', '236586', NULL, '2017-01-21', 'Male', 'individual', 0, 'Private', 'bc', '', 'Sadrul', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', NULL, NULL, NULL),
(132, '20141516', '', NULL, '2017-01-20', 'Male', 'group', 5, '', 'nid', '', 'Sadikul Islam', '', '50', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', 'during my struggle.jpg', 'image/jpeg', 30401),
(134, '201313017', '', NULL, '2017-01-28', 'Male', 'individual', 0, 'Private', 'nid', '', 'MD. Abdullah Al Mamun', '', '', '', '', '', '', NULL, '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', 'mamun1.jpg', 'image/jpeg', 123589),
(135, '201313093', '', NULL, '2017-01-21', 'Male', 'individual', 0, 'Private', 'nid', '', 'Ratul Hasan', '', '', '01689583182', 'Teacher', 'Unmarried', 'Patuakhali', NULL, 'Bauphal', '', '', 'Barisal', NULL, 'Agailjhara', '', '', '', 'Passport1', '2017-01-05', '2017-01-12', '', 'Rajshahi', 'Baridhara', '', '', 'ratul madrid.jpg', 'image/jpeg', 28452),
(141, '201414021', '', NULL, '1995-03-27', 'Female', NULL, 7, NULL, 'nid', 'à¦¸à¦¾à¦¨à¦œà¦¿à¦¦à¦¾ à¦¸à§à¦¬à¦°à§à¦£à¦¾', 'Sanjida Sharna', 'à¦†à¦¬à§à¦¦à§à¦² à¦•à¦¾à¦²à¦¾à¦®', '118', 'à§¦à§§à§¬à§®à§¯à§«à§®à§©à§§à§®', 'Teacher', 'Unmarried', 'Bogra', 'Rajshahi', 'Bogra Police Station', 'House-44,Road-03,Sector-11', '1230', 'Dhaka', 'Dhaka', 'Dhaka Police Station', 'House-44,Road-03,Sector-11', '1230', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', 'sharna.jpg', 'image/jpeg', 139471),
(142, '20141407878', '', NULL, '1994-02-08', 'Male', 'group', 7, '', 'nid', '', 'Boss', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', 'porte bosho.jpg', 'image/jpeg', 7065),
(143, '', '5382698', NULL, '2017-01-14', 'Male', 'individual', 0, 'Private', 'bc', '', 'Affan', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', 'affan propic.jpg', 'image/jpeg', 78163),
(146, '201515015', '', 'Pakistan', '2017-01-14', 'female', NULL, 5, NULL, 'nid', '', 'Koyel', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', 'koyel propic.jpg', 'image/jpeg', 106785),
(147, '2013130924', '', NULL, '1995-01-31', 'Male', 'group', 9, '', 'nid', '', 'M Shahriar Kabir Sourav', '', '', '', 'Service Holder', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', 'sourav propic.jpg', 'image/jpeg', 98495),
(148, '201616086', '', NULL, '2017-01-09', 'Male', NULL, 7, NULL, 'nid', '', 'Imtiaz Ahmed', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', 'imtiaz ahmed.jpg', 'image/jpeg', 63862),
(149, '', '253546', 'America', '2017-01-21', 'male', NULL, 9, NULL, 'bc', '', 'Nurul Karim Rafi', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', 'nurul karim rafi propic.jpg', 'image/jpeg', 75218),
(150, '201515008', '', NULL, '2017-01-07', 'Female', NULL, 9, NULL, 'nid', '', 'Sumaiya Ananna', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2017-04-12', '2017-04-28', '', '', '', '', '', 'sumaiya ananna propic.jpg', 'image/jpeg', 202614),
(151, '204127124', '', NULL, '2017-01-14', 'Male', 'group', 7, '', 'nid', '', 'Unknown', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', 0),
(152, '20424124', '', NULL, '2017-01-14', 'Male', NULL, 11, NULL, 'nid', '', 'Mahir Ashbab', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', 'accept pain and get ready for success.jpg', 'image/jpeg', 25177),
(153, '20141423532', '', NULL, '2017-01-14', 'Male', NULL, 3, NULL, 'nid', '', 'Ashraf Mia', '', '', '01689583182', '', '', 'Bandarban', 'Chittagong', 'Bandarban Police Station', '', '', 'Comilla', 'Chittagong', 'Comilla Police Station', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', 0),
(154, '201441452', '', NULL, '2017-01-06', 'Male', NULL, 2, NULL, 'nid', '', 'Fazar Mia', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', 'always knew i was going to be rich.jpg', 'image/jpeg', 56299),
(155, '282491427', '', NULL, '2017-01-21', 'Male', NULL, NULL, NULL, 'nid', '', 'Lamia Tasnim', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', 0),
(156, '', '264861289', NULL, '2017-01-19', 'Male', 'group', 8, NULL, 'bc', '', 'Mario Balotelli', '', '', '', '', '', 'Barisal', 'Barisal', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', 'at the age of 25.jpg', 'image/jpeg', 24997),
(157, '', '36492863', NULL, '1988-07-06', 'Female', 'group', 7, NULL, 'bc', '', 'Namrata Saha', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', 'entrepreneurship.png', 'image/png', 939357),
(158, '', '353263264', 'Afghanistan', '2017-01-06', 'female', 'group', 2, NULL, 'bc', '', 'Afgan Jalebi', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', 'best revenge.jpg', 'image/jpeg', 89872),
(159, '', '325235', 'United Arab Emirates (UAE)', '2017-01-06', 'male', 'group', 2, NULL, 'bc', 'à¦°à§‡ à¦«à§à¦¯à¦¾à¦™', 'Ray Fang', '', '', '', 'Lawyer', '', 'Pabna', 'Rajshahi', 'Faridpur Police Station', 'House-44,Road-03,Sector-11', '1230', 'Barguna', 'Barisal', 'Uttara', 'House-44,Road-03,Sector-11', '1230', '36236346', 'Passport2', '2017-01-19', '2017-08-25', 'London', 'Dhaka', 'Uttara', 'House-44,Road-03,Sector-11', '1230', 'i can do everything.jpg', 'image/jpeg', 44604),
(161, '201414043', '', NULL, '2017-04-14', 'Male', 'group', 2, NULL, 'nid', '', 'Mehedi Farazi', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', 'billionaires.jpg', 'image/jpeg', 29956),
(162, '201414072', '', NULL, '1996-07-17', 'Male', 'group', 13, '', 'nid', '', 'Shushmoy Kundu', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', 'block me from facebook today get ready to search me on google later.jpg', 'image/jpeg', 31394),
(163, '', '238568923', 'Algeria', '2017-04-19', 'male', 'group', 18, NULL, 'bc', '', 'Masrafee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', 'confuse them with your silence and amaze them with your actions.jpg', 'image/jpeg', 31523),
(164, '201414096', '', NULL, '1990-01-30', 'Male', 'group', 17, 'Government', 'nid', '', 'Mark Zuckerberg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', 'failure is success if you learn from it.jpg', 'image/jpeg', 35844),
(165, '201414017', '', NULL, '1992-07-08', 'Male', 'group', 17, '', 'nid', '', 'Zisan', '', '', '', '', '', 'Barguna', 'Barisal', '', '', '', 'Barisal', 'Barisal', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', 'comeback is always greater than the setback.jpg', 'image/jpeg', 80525),
(167, '', '2365826389', 'Armenia', '2002-02-06', 'male', 'group', 17, NULL, 'bc', '', 'Brad Hussy', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', 'goals are more important.jpg', 'image/jpeg', 38289),
(169, '', '753487', NULL, '1978-02-22', 'Male', 'group', 18, 'Government', 'bc', '', 'Abdur Rahman', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', 'goku.jpg', 'image/jpeg', 134555),
(170, '', '3758237', NULL, '2017-04-20', 'Male', 'group', 5, NULL, 'bc', '', 'Tahiat', '', '', '', '', '', 'Bogra', 'Rajshahi', '', '', '', 'Chittagong', 'Chittagong', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', 'i am an entrepreneur1.jpg', 'image/jpeg', 68901),
(171, '201313008', '', NULL, '2017-04-20', 'Female', 'group', 18, NULL, 'nid', '', 'Kamrun Nahar', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', 'i will.jpg', 'image/jpeg', 59200);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`grp_id`);

--
-- Indexes for table `priligrim_info`
--
ALTER TABLE `priligrim_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `grp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `priligrim_info`
--
ALTER TABLE `priligrim_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
