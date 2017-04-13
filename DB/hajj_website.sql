-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2017 at 07:25 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hajj_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `about` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `about`) VALUES
(2, 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'Pratik', 'acec8d4569c0f534245da103122432f7');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `q_name` varchar(255) DEFAULT NULL,
  `q_email` varchar(255) DEFAULT NULL,
  `question` text,
  `q_date` date DEFAULT NULL,
  `a_name` varchar(255) DEFAULT NULL,
  `answer` text,
  `a_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `q_name`, `q_email`, `question`, `q_date`, `a_name`, `answer`, `a_date`) VALUES
(1, 'Saadat Anwar', 'saadat.anwar@gmail.com', 'Can a woman cover her face in Hajj?', '2017-03-03', 'Pratik', 'It is agreed by scholars that a woman should not cover her face (or wear gloves for that matter) during Hajj. The Prophet said, ?The Muhrimah (a woman in Ihram) should not cover her face, nor should she wear gloves.? If a woman is in need of covering her face (i.e. if she fears the gaze of non-Mahram men on her) then it is permissible for her to cover her face.', '2017-03-23'),
(5, 'Gigi Buffon', 'gigi@gmail.com', 'What type of Hajj we shall be performing with you?', '2017-03-24', 'Pratik', 'Hajj al-Tamattu''. It involves performing Umrah and then Hajj, with one Ihram for each.\r\nThis form of Hajj is considered the best of three forms of Hajj. It is the one that the Prophet Muhammad (peace be upon him) urged his followers to perform and is the one adopted by most pilgrims from overseas.', '2017-03-25'),
(6, 'Intiser Zaman', 'intiser.zaman@gmail.com', 'How is the Hajj performed?', '2017-03-24', '', 'There are three ways of performing the Hajj\r\nHajj al-Tamattu''\r\nHajj al-Ifrad\r\nHajj al-Qiran', '2017-03-25'),
(7, 'Affan', 'fr.affan@gmail.com', 'Anything else I should know about Hajj?', '2017-03-24', 'Pratik', 'Answer', '2017-03-28'),
(8, 'Sadia Reni', 'sadia.reni@gmail.com', 'Does a woman need a Mahram to travel to Hajj?', '2017-03-24', 'Pratik', 'Love You ! <3 <3 <3', '2017-03-25'),
(9, 'test name', 'test@gmail.com', 'test question', '2017-03-31', 'Pratik', 'answer', '2017-04-01'),
(10, 'demo Name', 'demo@gmail.com', 'demo question', '2017-03-31', 'Pratik', 'demo answer', '2017-04-08');

-- --------------------------------------------------------

--
-- Table structure for table `hajj_rules`
--

CREATE TABLE `hajj_rules` (
  `id` int(11) NOT NULL,
  `rules` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hajj_rules`
--

INSERT INTO `hajj_rules` (`id`, `rules`) VALUES
(1, 'That one has the provisions and all that is required in the journey, the means of the necessary transportation for the journey or the money enabling one to enjoy these things.'),
(2, 'That the way be devoid of obstacles and (that there be a) lack of fear of danger or harm to oneself or his goods or his property. Therefore, if the way is blocked or one fears a (particular) danger, the (obligation of the) pilgrimage is dropped. However, when there is another way more remote, it is obligatory that one take it to the pilgrimage, and (the obligation is not dropped).'),
(3, 'That one be physically able to (perform) the pilgrimage.'),
(4, 'That the time is sufficient to reach Makkah and perform the rites.'),
(5, 'That one has the (resources by) which he maintains those whose maintenance is obligatory upon him, legally and customarily.'),
(6, 'That one has the money or the (means) of earning or work enabling him to manage his life after returning from the pilgrimage.'),
(7, 'When one does not possess the expenses for the pilgrimage, however, someone expends (the expenses) for him or he gives money in order that he can perform the pilgrimage and bears the expenses of his wife''s and his children maintenance throughout this period, the pilgrimage is obligatory upon him, although he becomes indebted and is not able, by himself, to manage his life after returning. Accepting this gift is an obligatory matter, except that it be associated with a favor or harm or unbearable difficulty, this pilgrimage will suffice for a obligatory pilgrimage.'),
(8, 'That one has the provisions and all that is required in the journey, the means of the necessary transportation for the journey or the money enabling one to enjoy these things.'),
(9, 'When one does not possess the expenses for the pilgrimage, however, someone expends (the expenses) for him or he gives money in order that he can perform the pilgrimage and bears the expenses of his wife''s and his children maintenance throughout this period, the pilgrimage is obligatory upon him, although he becomes indebted and is not able, by himself, to manage his life after returning. Accepting this gift is an obligatory matter, except that it be associated with a favor or harm or unbearable difficulty, this pilgrimage will suffice for a obligatory pilgrimage.'),
(10, 'That the way be devoid of obstacles and (that there be a) lack of fear of danger or harm to oneself or his goods or his property. Therefore, if the way is blocked or one fears a (particular) danger, the (obligation of the) pilgrimage is dropped. However, when there is another way more remote, it is obligatory that one take it to the pilgrimage, and (the obligation is not dropped). '),
(11, 'That one has the money or the (means) of earning or work enabling him to manage his life after returning from the pilgrimage.'),
(15, 'That one has the provisions and all that is required in the journey, the means of the necessary transportation for the journey or the money enabling one to enjoy these things.');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `summary` text,
  `price` float DEFAULT NULL,
  `details` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `title`, `summary`, `price`, `details`) VALUES
(8, 'Deluxe Green Package', 'Deluxe Green Package planned for 35 â€“ 42 Days. Exclusive Regular Hajj Package.\r\nStay : +/-5 Weeks (Non-Shifting)', 370000, ''),
(9, 'Economy Regular Package', 'Economy Regular Package planned for 35 â€“ 42 Days. Very Cost effective Hajj package.\nStay : +/-5 Weeks (Non Shifting)', 4200000, 'Day-1: (17/08/2017)- 25th Dhul Quidah â€“ Meet at Dhaka Airport flight to Jeddah Meet and assist at Dhaka Airport to Depart for Jeddah Airport throughout the journey for your benefit there will be ground staff to help and guide you with any queries you have from Bangladesh till you return back home. Arrive at Saudi Terminal. Please note during Hajj there can be a waiting time of over six hours. Once clearing customs and then the group make way to Makkah, following check-in to Hotel in Makkah and leave to perform Umrah\nDay : 2 â€“ 9 : (18/08/2017 â€“ 28/08/2017) [ 26th â€“ 06 Dhul Hijjah ] â€“ Rest day at Hotel. Spend the first 9/10 days of your Hajj package 2017 resting in Makkah.\n\nDay â€“ 10 : (29/08/2017) â€“ 7th Dhul Hijjah â€“ At night the Group will leave Aziziyah and go to Mina at Midnight.\n\nDay â€“ 11: (30/08/2017) â€“ 8th Dhul Hijjah â€“ Rest in Mina : This will be our first day in Mina. You will be able to enjoy the atmosphere in Mina and can participate in lectures and advice sessions in the days to come.\n\nDay-12 : (31/08/2017) â€“ 9th Dhul Hijjah â€“ Leave for Arafat : Weâ€™ll leave shortly after Fajr (approximately 8:00am) and will leave for Arafat where we will spend the entire day. Enjoy advice and lectures until Maghrib time. We will leave for Muzdalifah shortly after.\n\nDay â€“ 13 : (01/09/2017) â€“ 10th Dhul Hijjah â€“ Leave Mizdalifah and return to Mina\n\nFrom Mina we will leave as a group for Jamarat (Stoning). After Jamarat we will leave for Makkah to complete Tawaf Al ziarah and await news for the completion of the Qurbani. We will then return back to the Mina Tents.\n\nNote: On this day we will be walking a distance of anywhere around 10-15 miles.\n\nDay â€“ 14 : (02/09/2017) â€“ 11th Dhul Hijjah â€“ Second day of Stoning : This will be the second day of stoning, on this day we as a group will stone all three Jamarats. Then the group will return back to Mina.\n\nDay â€“ 15 : (03/09/2017) â€“ 12th Dhul Hijjah â€“ Third day of Stoning : This will be the third day of stoning. Once we have stoned all the three Jamarats, we can then head back to our Hotel. You could stay in Mina to do another day of stoning.\n\nDay â€“ 16 â€“ 26 : (04 â€“ 14/09/2017) â€“ 13 â€“ 23 Dhul Hijjah â€“ Rest in Makkah and focus on your prayers and ibada. 26th Day the group will leave for Madinah.\n\nDay â€“ 27 : (15/09/2017) 24 Dhul Hijjah â€“ Journey to Madinah : The group will check out of our hotel in Makkah at 2pm and journey to Madinah.\n\nNote: The journey time to Madinah by coach can be over 10 hours including breaks at service stations.\n\nPlease be aware, you may be seated for anything up to 2 hours until the Hajj Ministry authorise release from Makkah.\n\nDay â€“ 28 â€“ 35 : (16/09/2017 â€“ 23/09/2017) â€“ [ 25 â€“ 02nd Muharram ] â€“ Rest day in Madinah.\n\nDay â€“ 36 : (24/09/2017) â€“ 03 Muharram â€“The group will leave Madinah and go to Jeddah Airport and they will fly back to Dhaka, Bangladesh, In Sha Allah.'),
(10, 'Super Deluxe Silver Package', 'Super Deluxe Package planned for 30 â€“ 32 Days. Exclusive Hajj Package.\r\nStay : +/-4 Weeks (Shifting)', 470000, 'Day-1: (08/08/2017)- 16th Dhul Quidah â€“ Meet at Dhaka Airport flight to Jeddah Meet and assist at Dhaka Airport to Depart for Jeddah Airport throughout the journey for your benefit there will be ground staff to help and guide you with any queries you have from Bangladesh till you return back home. Arrive at Saudi Terminal. Please note during Hajj there can be a waiting time of over six hours. Once clearing customs and then the group make way to Makkah, following check-in to GRAND ZAMZAM / HILTON in Makkah and leave to perform Umrah.\r\nDay : 2 â€“ 10 : (09/08/2017 â€“ 16/08/2017) [ 16th â€“ 24 Dhul Quidah ] â€“ Rest day at Hotel GRAND ZAMZAM / HILTON Spend the first 9/10 days of your Hajj package 2017 resting in Mecca.\r\n\r\nDay : 11 (17/08/2017) [ 25 Dhul Quidah ] â€“ Check out your HOTEL In Makkah. The group will leave Makkah and go to Madinah. Check in your HOTEL In Madinah.\r\n\r\nDay : 12 â€“ 19 : (18/08/2017 â€“ 26/08/2017) [ 26 Dhul Quidah â€“ 4 Dhul Hijjah ] â€“ Rest day at FIVE STAR HOTEL in Madinah and focus on your prayers and ibadah. 4 Dhul Hijjah Check out you Madina Hotel, going to Mecca and Check in to Aziziyah Apartment NEAR JAMARAT.\r\n\r\nDay â€“ 20 â€“ 22: (26/08/2017 â€“ 28/08/2017) â€“ [ 4 â€“ 6 Dhul Hijjah ] â€“ The Group Stay in Aziziayh Apartment and focus on their regular prayers and ibadah.\r\n\r\nDay â€“ 23: (29/08/2017) â€“ 7th Dhul Hijjah â€“ At night the Group will leave Aziziyah and go to Mina at Midnight.\r\n\r\nDay â€“ 24: (30/08/2017) â€“ 8th Dhul Hijjah â€“ Rest in Mina : This will be our first day in Mina. You will be able to enjoy the atmosphere in Mina and can participate in lectures and advice sessions in the days to come.\r\n\r\nDay â€“ 25: (31/08/2017) â€“ 9th Dhul Hijjah â€“ Leave for Arafat : Weâ€™ll leave shortly after Fajr (approximately 8:00am) and will leave for Arafat where we will spend the entire day. Enjoy advice and lectures until Maghrib time. We will leave for Muzdalifah shortly after.\r\n\r\nDay â€“ 26: (01/09/2017) â€“ 10th Dhul Hijjah â€“ Leave Mizdalifah and return to Mina\r\n\r\nFrom Mina we will leave as a group for Jamarat (Stoning). After Jamarat we will leave for Makkah to complete Tawaf Al ziarah and await news for the completion of the Qurbani. We will then return back to the Mina Tents.\r\n\r\nNote: On this day we will be walking a distance of anywhere around 10-15 miles. [ We have Transport for Elite Package pilgrims, depend on Muzdalifa Traffic Condition ]\r\n\r\nDay â€“ 27: (02/09/2017) â€“ 11th Dhul Hijjah â€“ Second day of Stoning : This will be the second day of stoning, on this day we as a group will stone all three Jamarats. Then the group will return back to Mina.\r\n\r\nDay â€“ 28: (03/09/2017) â€“ 12th Dhul Hijjah â€“ Third day of Stoning : This will be the third day of stoning. Once we have stoned all the three jamarats, we can then head back to our Hotel. You could stay in Mina to do another day of stoning.\r\n\r\nDay â€“ 29: (04/09/2017) â€“ 13th Dhul Hijjah â€“Rest day in Aziziah you will be free to rest in Aziziyah and focus on your prayers and ibada.\r\n\r\nDay â€“ 30: (05/09/2017 â€“ 06/09/2017) â€“ [ 14 â€“ 15th Dhul Hijjah ] â€“ Rest day in Aziziyah Hotel.\r\n\r\nDay â€“ 31: (07/09/2017) â€“ 16 Dhul Hijjah â€“The group will leave Makkah and go to Jeddah Airport and they will fly back to Dhaka Airport, Bangladesh, In Sha Allah.');

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `id` int(11) NOT NULL,
  `p_m` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`id`, `p_m`) VALUES
(1, 'The present Terms and Conditions (called hereinafter the “Terms”) set forth the provisions that govern the use of the website (called hereinafter “the Website”), in order to ensure its smooth operation. Please read carefully the Terms before using the Website. If you do not agree with these Terms, do not use the Website.'),
(2, 'Your access to this Website confirms that you have fully understood all provisions that are mentioned hereinafter and that you totally agree with these Terms.'),
(3, 'The Terms can be amended at any time, without prior notice and by publication herein, the amended terms will be applicable to all users. Thus, it is advised that you frequently review these Terms and Conditions.'),
(4, 'All information and data that are included in this Website in respect of pharmaceutical products or diseases are provided and are intended for general information purposes only and do not substitute the advice of your doctor or your pharmacist.'),
(6, 'If you suffer from any disease, look for medical advice promptly. There is no medical diagnosis or specific medical advice provided through the Website. You must always have complete medical information regarding the pharmaceutical product that has been prescribed to you (including beneficial medical uses and possible adverse side effects), by discussing the appropriate use of any pharmaceutical product with the prescribing physician.'),
(7, 'Greek Legislation prohibits the ability to inform directly the general public or the communication with the pharmaceutical companies regarding prescription pharmaceutical products, except of information that is provided on the Patient Information Leaflet (PIL).'),
(8, 'For access to information which is addressed to qualified Health Professionals, the Website requires registration and the use of this specific section (domain) of the Website demands the use of a unique password. In case a user uses a false identity, he shall indemnify and hold the Company harmless for any damage that it may suffer due to such misrepresentation.'),
(9, 'He who cannot eliminate his need without the seizure of (his) owned house, the pilgrimage is not obligatory upon him, except at the time when he has the cost of the house also. As for when it is possible to live in a rented house or a donated house and whatever is similar to that, he is capable (of performing the pilgrimage).'),
(11, 'In some countries, for security reasons, the holder of the credit card used to book a ticket or group of tickets must be one of the travellers on that itinerary, and will be required to show the credit card at the airport check-in counter prior to receiving boarding passes. In other countries, the card holder does not have to be one of the travellers. See our Online Booking Basics FAQs for information on how to find out which countries allow this.'),
(14, 'Please note that since Emirates is based in Dubai, UAE, it is possible that for your online transaction, your credit card issuing bank will charge a fee for usage of the card in a foreign country. For further information, please contact your credit card issuing bank.'),
(15, 'Emirates will charge your credit card in the currency that is given on the booking confirmation. If you are are not using a credit card based in the country of departure of the ticket, your card issuer may apply charge a fee for transactions in a foreign currency, and also apply different exchange rates compared to those given by the Currency Converter on our site. Please check with your credit card issuer for any fees and their applicable exchange rates.'),
(16, 'Greek Legislation prohibits the ability to inform directly the general public or the communication with the pharmaceutical companies regarding prescription pharmaceutical products, except of information that is provided on the Patient Information Leaflet (PIL).'),
(17, 'f you suffer from any disease, look for medical advice promptly. There is no medical diagnosis or specific medical advice provided through the Website. You must always have complete medical information regarding the pharmaceutical product that has been prescribed to you (including beneficial medical uses and possible adverse side effects), by discussing the appropriate use of any pharmaceutical product with the prescribing physician.'),
(18, 'The Terms can be amended at any time, without prior notice and by publication herein, the amended terms will be applicable to all users. Thus, it is advised that you frequently review these Terms and Conditions.'),
(19, 'The present Terms and Conditions (called hereinafter the ï¿½Termsï¿½) set forth the provisions that govern the use of the website (called hereinafter ï¿½the Websiteï¿½), in order to ensure its smooth operation. Please read carefully the Terms before using the Website. If you do not agree with these Terms, do not use the Website.');

-- --------------------------------------------------------

--
-- Table structure for table `question_answer`
--

CREATE TABLE `question_answer` (
  `id` int(11) NOT NULL,
  `q_name` varchar(255) DEFAULT NULL,
  `q_email` varchar(255) DEFAULT NULL,
  `question` text,
  `q_date` date DEFAULT NULL,
  `a_name` varchar(255) DEFAULT NULL,
  `answer` text,
  `a_date` date DEFAULT NULL,
  `faq` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question_answer`
--

INSERT INTO `question_answer` (`id`, `q_name`, `q_email`, `question`, `q_date`, `a_name`, `answer`, `a_date`, `faq`) VALUES
(2, 'Saadat Anwar', 'saadat.anwar@gmail.com', 'Can a woman cover her face in Hajj?', '2017-03-03', 'Pratik', 'It is agreed by scholars that a woman should not cover her face (or wear gloves for that matter) during Hajj. The Prophet said, �The Muhrimah (a woman in Ihram) should not cover her face, nor should she wear gloves.� If a woman is in need of covering her face (i.e. if she fears the gaze of non-Mahram men on her) then it is permissible for her to cover her face.', '2017-03-23', 'published'),
(8, 'Sadia Reni', 'sadia.reni@gmail.com', 'Does a woman need a Mahram to travel to Hajj?', '2017-03-24', 'Pratik', 'Love You ! <3 <3 <3', '2017-03-25', 'published'),
(9, 'Affan', 'fr.affan@gmail.com', 'Anything else I should know about Hajj?', '2017-03-24', 'Pratik', 'Answer', '2017-03-28', 'published'),
(10, 'Shihab Mahmood', 'shihab.mahmood@gmail.com', 'Do you provide religious guidance during the Hajj?', '2017-03-24', NULL, NULL, NULL, NULL),
(11, 'Intiser Zaman', 'intiser.zaman@gmail.com', 'How is the Hajj performed?', '2017-03-24', '', 'There are three ways of performing the Hajj\r\nHajj al-Tamattu''\r\nHajj al-Ifrad\r\nHajj al-Qiran', '2017-03-25', 'published'),
(28, 'Maruf Niaz', 'maruf.niaz@gmai.com', 'What type of Hajj we shall be performing with you?', '2017-03-24', NULL, NULL, NULL, NULL),
(29, 'Maruf Niaz', 'maruf.niaz@gmai.com', 'Do you provide religious guidance during the Hajj?', '2017-03-24', NULL, NULL, NULL, NULL),
(30, 'Maruf Niaz', 'maruf.niaz@gmai.com', 'Do you provide religious guidance during the Hajj?', '2017-03-24', '', 'Yes we do!', '2017-03-31', NULL),
(32, 'Ishraq', 'ishraq@gmail.com', 'How is the Hajj performed?', '2017-03-24', NULL, NULL, NULL, NULL),
(33, 'Gigi Buffon', 'gigi@gmail.com', 'What type of Hajj we shall be performing with you?', '2017-03-24', 'Pratik', 'Hajj al-Tamattu''. It involves performing Umrah and then Hajj, with one Ihram for each.\r\nThis form of Hajj is considered the best of three forms of Hajj. It is the one that the Prophet Muhammad (peace be upon him) urged his followers to perform and is the one adopted by most pilgrims from overseas.', '2017-03-25', 'published'),
(34, 'Gigi Buffon', 'gigi@gmail.com', 'What type of Hajj we shall be performing with you?', '2017-03-24', NULL, NULL, NULL, NULL),
(35, 'Muaz', 'muaz@gmail.com', 'How can I offer Qurbani (sacrifice)?', '2017-03-24', NULL, NULL, NULL, NULL),
(36, 'Affan', 'fr.affan@gmail.com', 'How can I offer Qurbani (sacrifice)?', '2017-03-24', NULL, NULL, NULL, NULL),
(37, 'Ratul Hasan', 'ratul@gmail.com', 'Where will our luggage be kept during the Hajj days?', '2017-03-24', NULL, NULL, NULL, NULL),
(40, 'Sheikh Avash Faisal', 'avash@gmail.com', 'How much money should I take with me?', '2017-03-24', NULL, NULL, NULL, NULL),
(50, 'Mark Zuckerberg', 'mark.zuckerberg@gmail.com', 'What type of Hajj we shall be performing with you?', '2017-03-25', 'Pratik', 'Hajj al-Tamattu''. It involves performing Umrah and then Hajj, with one Ihram for each.\r\nThis form of Hajj is considered the best of three forms of Hajj. It is the one that the Prophet Muhammad (peace be upon him) urged his followers to perform and is the one adopted by most pilgrims from overseas.', '2017-03-25', NULL),
(51, 'Pratik', 'pratik.anwar@gmail.com', 'lorem ipsum', '2017-03-28', 'Pratik', 'lorem ipsum.', '2017-03-31', NULL),
(52, 'Shihab Mahmood', 'shihab.mahmood@gmail.com', 'Demos does not warrant that the functions contained in the material contained in this site will be uninterrupted or error free, that defects will be corrected, or that this site or the server that makes it available are free of viruses or bugs or represents the full functionality, accuracy and reliability of the materials.', '2017-03-28', NULL, NULL, NULL, NULL),
(53, 'Affan', 'avsha@gmail.com', 'This site and the information, names, images, pictures, logos regarding or relating to Demos are provided ï¿½as isï¿½ without any representation or endorsement made and without warranty of any kind whether express or implied. In no event will Demos be liable for any damages including, without limitation, indirect or consequential damages, or any damages whatsoever arising from the use or in connection with such use or loss of use of the site, whether in contract or in negligence.', '2017-03-28', NULL, NULL, NULL, NULL),
(54, 'Turag', 'turag@gmail.com', 'How are you?', '2017-03-31', NULL, NULL, NULL, NULL),
(55, 'pratik', 'pratik.anwar@gmail.com', 'what is this?', '2017-03-31', NULL, NULL, NULL, NULL),
(56, 'Asif', 'asif@gmail.com', 'How is that?', '2017-03-31', NULL, NULL, NULL, NULL),
(61, 'McDonald', 'mcdonald@gmail.com', 'Nice Question', '2017-03-31', NULL, NULL, NULL, NULL),
(62, 'lamia', 'lamia@gmail.com', 'Question', '2017-03-31', NULL, NULL, NULL, NULL),
(63, 'affan', 'affan@gmail.com', 'This is a question', '2017-03-31', NULL, NULL, NULL, NULL),
(68, 'sample name', 'sample@gmail.com', 'This is a question', '2017-03-31', NULL, NULL, NULL, NULL),
(69, 'Pratik', 'pratik.anwar@gmail.com', 'this is a demo question', '2017-03-31', NULL, NULL, NULL, NULL),
(70, 'moumita', 'moumita@gmail.com', 'This is a test question', '2017-03-31', NULL, NULL, NULL, NULL),
(71, 'Maruf Niaz', 'maruf.niaz@gmai.com', 'this is a question from maruf', '2017-03-31', NULL, NULL, NULL, NULL),
(72, 'Pratik', 'pratik.anwar@gmail.com', 'this is a demo question', '2017-03-31', NULL, NULL, NULL, NULL),
(73, 'hajji', 'hajji@gmail.com', 'hajj related to question', '2017-03-31', NULL, NULL, NULL, NULL),
(74, 'demo Name', 'demo@gmail.com', 'demo question', '2017-03-31', 'Pratik', 'demo answer', '2017-04-08', 'published'),
(75, 'test name', 'test@gmail.com', 'test question', '2017-03-31', 'Pratik', 'answer', '2017-04-01', 'published');

-- --------------------------------------------------------

--
-- Table structure for table `recent_news`
--

CREATE TABLE `recent_news` (
  `id` int(11) NOT NULL,
  `heading` text,
  `body` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recent_news`
--

INSERT INTO `recent_news` (`id`, `heading`, `body`) VALUES
(10, 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.\r\nbut also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(11, 'Why do we use it?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here''.\r\nmaking it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy.\r\nVarious versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).'),
(12, 'Where can I get some?', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum. \r\nyou need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.'),
(13, ' Where does it come from?', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.'),
(14, 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.'),
(15, 'Where can I get some?', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc');

-- --------------------------------------------------------

--
-- Table structure for table `terms_conditions`
--

CREATE TABLE `terms_conditions` (
  `id` int(11) NOT NULL,
  `t_c` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `terms_conditions`
--

INSERT INTO `terms_conditions` (`id`, `t_c`) VALUES
(1, 'Your use constitutes acceptance of these Terms and Conditions as at the date of your first use of the site.'),
(3, 'You agree to use this site only for lawful purposes, and in a manner which does not infringe the rights, or restrict, or inhibit the use and enjoyment of the site by any third party.'),
(4, 'This site and the information, names, images, pictures, logos regarding or relating to Demos are provided “as is” without any representation or endorsement made and without warranty of any kind whether express or implied. In no event will Demos be liable for any damages including, without limitation, indirect or consequential damages, or any damages whatsoever arising from the use or in connection with such use or loss of use of the site, whether in contract or in negligence.'),
(5, 'Demos does not warrant that the functions contained in the material contained in this site will be uninterrupted or error free, that defects will be corrected, or that this site or the server that makes it available are free of viruses or bugs or represents the full functionality, accuracy and reliability of the materials.'),
(6, 'Copyright restrictions: please refer to our Creative Commons license terms governing the use of material on this site.'),
(7, 'Demos takes no responsibility for the content of external Internet Sites.'),
(10, 'Any communication or material that you transmit to, or post on, any public area of the site including any data, questions, comments, suggestions, or the like, is, and will be treated as, non-confidential and non-proprietary information.'),
(11, 'If there''s any conflict between these Terms and Conditions and rules and/or specific terms of use appearing on this site relating to specific material then the latter shall prevail.'),
(34, 'These terms and conditions shall be governed and construed in accordance with the laws of England and Wales. Any disputes shall be subject to the exclusive jurisdiction of the Courts of England and Wales.'),
(35, 'If these Terms and Conditions are not accepted in full, the use of this site must be terminated immediately.'),
(37, 'These terms and conditions shall be governed and construed in accordance with the laws of England and Wales. Any disputes shall be subject to the exclusive jurisdiction of the Courts of England and Wales.'),
(39, 'These terms and conditions shall be governed and construed in accordance with the laws of England and Wales. Any disputes shall be subject to the exclusive jurisdiction of the Courts of England and Wales.'),
(40, 'Any communication or material that you transmit to, or post on, any public area of the site including any data, questions, comments, suggestions, or the like, is, and will be treated as, non-confidential and non-proprietary information.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hajj_rules`
--
ALTER TABLE `hajj_rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_answer`
--
ALTER TABLE `question_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recent_news`
--
ALTER TABLE `recent_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `hajj_rules`
--
ALTER TABLE `hajj_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `question_answer`
--
ALTER TABLE `question_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `recent_news`
--
ALTER TABLE `recent_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
