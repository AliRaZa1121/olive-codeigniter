-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 17, 2022 at 07:00 PM
-- Server version: 10.3.35-MariaDB-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edutrainia_stagging`
--

-- --------------------------------------------------------

--
-- Table structure for table `academies`
--

CREATE TABLE `academies` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promotion_graphics` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promotion_message` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `academy_teachers`
--

CREATE TABLE `academy_teachers` (
  `id` int(11) NOT NULL,
  `academy_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `join_academy` int(11) DEFAULT NULL,
  `quit_academy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academy_teachers`
--

INSERT INTO `academy_teachers` (`id`, `academy_id`, `teacher_id`, `join_academy`, `quit_academy`) VALUES
(1, 67, 59, 1, NULL),
(2, 67, 9, 0, NULL),
(4, 67, 51, 0, NULL),
(5, 105, 66, 1, NULL),
(6, 64, 66, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `addons`
--

CREATE TABLE `addons` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `unique_identifier` varchar(255) NOT NULL,
  `version` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `about` longtext DEFAULT NULL,
  `purchase_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `addons`
--

INSERT INTO `addons` (`id`, `name`, `unique_identifier`, `version`, `status`, `created_at`, `updated_at`, `about`, `purchase_code`) VALUES
(1, 'Live Class', 'live-class', '1.3', 1, 1424581200, NULL, 'Live Class addon adds an essential feature to Academy. Nowadays Live class has become so popular that it becomes necessary. On that note we decided to add Zoom in our application.', '1d7ad429-e190-435e-978d-426fa0bf6ad1'),
(2, 'Jitsi live class', 'jitsi-live-class', '1.0', 1, 1424581200, NULL, 'Jitsi is a set of open-source projects. Jitsi Video bridge passes everyone’s video and audio to all participants, rather than mixing them first.', '8affaff9-7946-4c3f-8aa1-4bbdf937eda3'),
(3, 'Noticeboard', 'noticeboard', '1.0', 1, 1487739600, NULL, 'You can display notifications for students enrolled in your course, and you can also send important notifications to their emails using this add-on.', 'c18a8b71-5b01-41f1-835a-34c5c3507e3b'),
(4, 'Course Analytics', 'course_analytics', '1.0', 1, 1487739600, NULL, 'You will be able to see the course progress for all enrolled students here. Which will help you understand the needs of your students. On the left side of the chart, you will see the range of the top number of students, and on the bottom of the chart, you will see the range of percentage. Also, you will able to see the table of the chart on the right side.', '4e12b4fa-5d66-47f0-aa11-661bc147d84a'),
(5, 'Customer Support', 'customer_support', '1.0', 1, 1487739600, NULL, 'Customer Support allows you to help customer about their issues with your products.', '6d9b8cd7-a4c2-41ff-9be9-43b695594437'),
(6, 'Certificate', 'certificate', '1.0', 1, 1487739600, NULL, 'This addon helps student to get certified. Academy provides a course completion certificate for each student after completing any course', '109eb0d7-c6a6-47c8-ae96-cfc0eaa32541'),
(7, 'Offline Payment Gateway', 'offline_payment', '1.1', 1, 1487739600, NULL, 'Offline payment gateway allows you to take payment through various local payment gateways.', '4a382a1e-d466-45bd-8c4d-0753b5bf792e');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `user_id`, `address`, `phone`, `message`, `document`, `status`) VALUES
(1, 5, 'fbdf fdgvbfdv', '4353453534', 'fdgfdvfdvfdv', 'e2bGo8ZKgEwFic7.pdf', 1),
(2, 9, 'Old saddar mohalla shikarpur sindh Pakistan ', '03337275225', 'Chemistry! No problem now. Come and excel in chemistry for MDCAT and ECAT.', 'Ihvl0HtE9nwoxau.jpg', 1),
(3, 13, 'Nazimabad 2', '03123456789', 'no', NULL, 1),
(4, 20, '2A, 4/33, Nazimabad no.2', '02136600037', 'abc data ', 'xG3rRTWHNobJa8y.jpg', 1),
(5, 21, '2A, 4/33, Nazimabad no.2', '02136600037', 'abc dummy data ', '9lKETGO10oQCqbR.jpg', 1),
(6, 22, 'House no. 2A-4/33, Nazimabad no. 2, opposite Urdu Bazar, near Ameer Hamza mosque, 3rd street on the right hand from the mosque.', '03330304772', 'just insert dummy data ', 'dDn2UsxwqbgQrYC.jpg', 1),
(7, 24, 'House no. 2A-4/33, Nazimabad no. 2, opposite Urdu Bazar, near Ameer Hamza mosque, 3rd street on the right hand from the mosque.', '03330304772', 'Abc ', 'N8Uj1dilBvnqIEO.jpg', 1),
(8, 27, 'House no. 2A-4/33, Nazimabad no. 2, opposite Urdu Bazar, near Ameer Hamza mosque, 3rd street on the right hand from the mosque.', '03330304772', 'ABC', 'mv1giMtzc0dx762.jpg', 1),
(10, 28, 'House no. 2A-4/33, Nazimabad no. 2, opposite Urdu Bazar, near Ameer Hamza mosque, 3rd street on the right hand from the mosque.', '03330304772', 'abc', 'ACNLtUgRqnGsf8v.jpg', 1),
(12, 42, 'Karachi', '0323453354', 'test instructor', NULL, 1),
(13, 43, 'Karachi', '0534354333', 'test ', 'XTE53FOrjo6R1Vq.png', 1),
(14, 44, 'Karachi', '0254252242', 'test', 'xA8cqEaCyhbRYi0.png', 1),
(15, 51, 'karachi', '032424242', 'test', 'sU0JtFqynfvHk1P.png', 1),
(16, NULL, 'qwertyuiop', '1234567890', 'qwertyuiop', 'mY5nBJWI9SCvrsM.png', 0),
(17, 81, 'qwertyuiop', '1234567890', 'qwertyuiop', 'ObFofTGhXmKPSgu.png', 0),
(18, 81, 'qwertyuiop', '1234567890', 'qwertyuiop', 'bw8eBYSLCfxiznj.png', 0),
(19, 81, 'qwertyuiop', '1234567890', 'qwertyuiop', 'zDFyXa9CG1lV0eT.png', 0),
(20, 81, 'qwertyuiop', '1234567890', 'qwertyuiop', 'OcUnSBVbLKitYRD.png', 0),
(21, 81, 'qwertyuiop', '1234567890', 'qwertyuiop', '0Y39FSVoqcDWTHE.png', 0),
(22, 81, 'qwertyuiop', '1234567890', 'qwertyuiop', 'M9dsTXnfiBqNgtI.png', 0),
(23, 81, 'qwertyuiop', '1234567890', 'qwertyuiop', '52rw9GPBtmxUT8z.png', 0),
(24, 81, 'qwertyuiop', '1234567890', 'qwertyuiop', 'UtNG31YpI2A0Hiv.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `course_id`, `qty`, `total_price`) VALUES
(1, 81, 5, 3, 0),
(2, 76, 5, 3, 0),
(3, 81, 6, 3, 0),
(4, 81, 5, 2, 1500),
(5, 81, 5, 2, 0),
(6, 81, 5, 2, 3000),
(7, 81, 5, 3, 4875);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent` int(11) DEFAULT 0,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  `font_awesome_class` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `featured` int(11) DEFAULT 0,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `code`, `name`, `parent`, `slug`, `date_added`, `last_modified`, `font_awesome_class`, `thumbnail`, `featured`, `title`, `description`) VALUES
(1, '3c04b062a1', 'Formal School Education', 0, 'formal-school-education', 1643691600, 1656993600, 'fas fa-building', '5f7efccc80eb0c79111fbb6c64c3412e.jpg', 1, 'Expand your career opportunities with Formal School Education', 'Take one of Udemy’s range of Python courses and learn how to code using this incredibly useful language. Its simple syntax and readability makes Python perfect for Flask, Django, data science, and machine learning. You’ll learn how to build everything fro'),
(7, '2389c81d88', 'mbt ', 0, 'mbt', 1643691600, 1657771200, 'fab fa-accessible-icon', NULL, NULL, 'Expand your career opportunities with mbt ', 'Take one of Udemy’s range of Python courses and learn how to code using this incredibly useful language. Its simple syntax and readability makes Python perfect for Flask, Django, data science, and machine learning. You’ll learn how to build everything fro'),
(10, '2ef17ae55f', 'IT &amp; COMPUTER SCIENCE', 10, 'it-amp-computer-science', 1643864400, 1643864400, 'fas fa-address-card', 'category-thumbnail.png', NULL, NULL, NULL),
(13, '309e9ee781', 'LANGUAGES', 13, 'languages', 1643864400, 1643864400, 'fas fa-chess', 'category-thumbnail.png', NULL, NULL, NULL),
(17, '492b386d25', 'Development', 0, 'development', 1643864400, 1657771200, 'fas fa-code', '03e1298d8c37ae36441133782743613b.jpg', NULL, 'Expand your career opportunities with Development', 'Take one of Udemy’s range of Python courses and learn how to code using this incredibly useful language. Its simple syntax and readability makes Python perfect for Flask, Django, data science, and machine learning. You’ll learn how to build everything fro'),
(18, '85a9476403', 'Designing', 16, 'designing', 1643864400, 1644382800, 'fas fa-crop', NULL, NULL, NULL, NULL),
(19, '5dd95845e5', 'Formal College Education ', 0, 'formal-college-education', 1644382800, 1644469200, 'fas fa-location-arrow', '76b90476b0e273b24ca5d2df3134cfd8.jpg', NULL, NULL, NULL),
(20, 'feea9f1675', 'Mechanical Engineering', 19, 'mechanical-engineering', 1644382800, 1644382800, 'fas fa-cogs', NULL, 1, NULL, NULL),
(21, '700e77a330', 'Electrical Engineering', 19, 'electrical-engineering', 1644382800, 1644382800, 'fas fa-ellipsis-v', NULL, NULL, NULL, NULL),
(22, 'd1d33cae97', 'Pre-Engineering', 19, 'pre-engineering', 1644382800, 1644382800, 'fas fa-cog', NULL, NULL, NULL, NULL),
(23, '2e8b774e9c', 'Algebra', 1, 'algebra', 1644382800, NULL, 'fas fa-bowling-ball', NULL, NULL, NULL, NULL),
(24, '4a5e0709b2', 'Geometry', 1, 'geometry', 1644382800, NULL, 'far fa-address-card', NULL, NULL, NULL, NULL),
(25, '6c9d9b05f1', 'Social Studies', 1, 'social-studies', 1644382800, NULL, 'fab fa-algolia', NULL, NULL, NULL, NULL),
(26, '95ed829b66', 'Mathematics', 1, 'mathematics', 1644382800, NULL, 'fas fa-list-ol', NULL, NULL, NULL, NULL),
(27, 'd31af47d11', 'General Science', 1, 'general-science', 1644382800, NULL, 'fas fa-flask', NULL, NULL, NULL, NULL),
(28, '3dd96841a9', 'Network &amp; Security', 16, 'network-amp-security', 1644382800, NULL, 'fas fa-desktop', NULL, NULL, NULL, NULL),
(29, '4563552f6c', 'Learn Languages ', 0, 'learn-languages', 1644382800, 1657771200, 'fas fa-globe', '83511e27421595565b425b41174c3371.jpg', 1, 'qwertyuiop', 'qwertyuiop'),
(30, '88ae9990d6', 'English', 29, 'english', 1644382800, NULL, 'fas fa-globe', NULL, NULL, NULL, NULL),
(31, '5d3b5dbecb', 'IT Certification', 16, 'it-certification', 1644382800, 1644382800, 'fas fa-plug', NULL, NULL, NULL, NULL),
(32, '2708883d8a', 'Health &amp; Fitness', 0, 'health-amp-fitness', 1644382800, 1657771200, 'fab fa-gratipay', 'a8171ad26862d5900c7c1fccee0a19df.jpg', 1, 'Expand your career opportunities with Formal School Education', 'Take one of Udemy’s range of Python courses and learn how to code using this incredibly useful language. Its simple syntax and readability makes Python perfect for Flask, Django, data science, and machine learning. You’ll learn how to build everything fro'),
(33, '32e52610e3', 'Sports', 32, 'sports', 1644382800, NULL, 'fab fa-accessible-icon', NULL, NULL, NULL, NULL),
(34, '8a8312c337', 'Dance', 32, 'dance', 1644382800, NULL, 'fas fa-angle-double-right', NULL, NULL, NULL, NULL),
(35, '61891d3d6d', 'First Aid', 32, 'first-aid', 1644382800, NULL, 'fas fa-first-aid', NULL, 1, NULL, NULL),
(36, 'b1141ccf1d', 'Diet', 32, 'diet', 1644382800, NULL, 'fas fa-utensils', NULL, NULL, NULL, NULL),
(37, '8c9003dece', 'Self Defense', 32, 'self-defense', 1644382800, NULL, 'fab fa-angellist', NULL, NULL, NULL, NULL),
(38, 'f35abd922c', 'Teachers Training', 0, 'teachers-training', 1644382800, 1644469200, 'fas fa-graduation-cap', 'd2918332e32ebca660529c03848c512a.jpg', 1, NULL, NULL),
(39, 'a4fce32a84', 'Online Course Creation ', 38, 'online-course-creation', 1644382800, NULL, 'fab fa-chrome', NULL, NULL, NULL, NULL),
(40, 'a9d2008490', 'Coaching', 38, 'coaching', 1644382800, NULL, 'fas fa-book', NULL, NULL, NULL, NULL),
(41, 'd57e18ff7f', 'Basics For Teacher', 38, 'basics-for-teacher', 1644382800, NULL, 'fas fa-star-half', NULL, NULL, NULL, NULL),
(42, '4285af03af', 'Accounting &amp; Finance', 0, 'accounting-amp-finance', 1644382800, 1657771200, 'fas fa-calculator', 'e15450f1eac23b54c1463aa46225e00d.jpg', 1, 'ctesting dummy data', 'Take one of Udemy’s range of Python courses and learn how to code using this incredibly useful language. Its simple syntax and readability makes Python perfect for Flask, Django, data science, and machine learning. You’ll learn how to build everything fro'),
(43, '042b1e85bc', 'Trading', 42, 'trading', 1644382800, 1644382800, 'fas fa-fighter-jet', NULL, NULL, NULL, NULL),
(44, 'b16018b8a1', 'Economics', 42, 'economics', 1644382800, 1644382800, 'fas fa-university', NULL, NULL, NULL, NULL),
(45, 'b9541b2405', 'Finance', 42, 'finance', 1644382800, NULL, 'fas fa-chess', NULL, NULL, NULL, NULL),
(46, 'ceb8c85e31', 'Taxes', 42, 'taxes', 1644382800, NULL, 'far fa-money-bill-alt', NULL, NULL, NULL, NULL),
(47, '888b81363e', 'Religious Studies', 0, 'religious-studies', 1644382800, 1644469200, 'fas fa-check', 'd403878f5ff233c26352aafdfd89d14c.jpg', NULL, NULL, NULL),
(48, 'f101e6c178', 'Islam', 47, 'islam', 1644382800, 1644382800, 'fas fa-angle-double-right', NULL, NULL, NULL, NULL),
(49, '4ecf348b66', 'Christianity', 47, 'christianity', 1644382800, 1644382800, 'fas fa-angle-double-right', NULL, NULL, NULL, NULL),
(50, '8ee938e3f8', 'Hinduism', 47, 'hinduism', 1644382800, 1644382800, 'fas fa-angle-double-right', NULL, NULL, NULL, NULL),
(51, '6023d1dfb4', 'Business', 0, 'business', 1644382800, 1644469200, 'fas fa-briefcase', '34b3b341f6d42cbd82a6ce8a876dc3bb.jpg', 1, NULL, NULL),
(52, '46b129656b', 'Management', 51, 'management', 1644382800, NULL, 'fas fa-signal', NULL, NULL, NULL, NULL),
(53, '457a130ee2', 'Communication', 51, 'communication', 1644382800, NULL, 'far fa-comments', NULL, NULL, NULL, NULL),
(54, 'bd4558032a', 'Project Management', 51, 'project-management', 1644382800, NULL, 'fas fa-folder-open', NULL, NULL, NULL, NULL),
(55, '96167c5ffb', 'Entrepreneurship', 51, 'entrepreneurship', 1644382800, NULL, 'far fa-lightbulb', NULL, NULL, NULL, NULL),
(56, '67c3970f37', 'Business Law', 51, 'business-law', 1644382800, NULL, 'fas fa-gavel', NULL, NULL, NULL, NULL),
(57, '2eb04ee8f1', 'Human Resources', 51, 'human-resources', 1644382800, NULL, 'fas fa-male', NULL, NULL, NULL, NULL),
(59, 'da0e6409bc', 'Child Psychology', 38, 'child-psychology', 1644382800, 1644382800, 'fas fa-child', NULL, NULL, NULL, NULL),
(60, '5a4cd1b550', 'Sikhism', 47, 'sikhism', 1644382800, NULL, 'fas fa-angle-double-right', NULL, 1, NULL, NULL),
(61, '577c9d7404', 'Miscellaneous', 0, 'miscellaneous', 1644382800, 1644469200, 'fas fa-eraser', 'fe248a29438083298d98ea52f8a06ff7.jpg', NULL, NULL, NULL),
(62, '41f28d366f', 'Cooking', 61, 'cooking', 1644382800, NULL, 'fas fa-utensils', NULL, NULL, NULL, NULL),
(63, 'b3c3db3f80', 'Music', 61, 'music', 1644382800, NULL, 'fas fa-music', NULL, 1, NULL, NULL),
(64, '524bee05cb', 'Games', 61, 'games', 1644382800, NULL, 'fas fa-gamepad', NULL, NULL, NULL, NULL),
(65, '80060177ff', 'Office Productivity', 16, 'office-productivity', 1644382800, 1644469200, 'fas fa-tv', NULL, NULL, NULL, NULL),
(66, '935f749f94', 'App Development', 16, 'app-development', 1650340800, NULL, 'fab fa-500px', NULL, 0, NULL, NULL),
(67, 'db451d1afc', 'CSS', 67, 'css', 1650513600, 1650513600, 'fas fa-anchor', 'a26202728abba5bbadd582d750fc3e63.jpg', 0, NULL, NULL),
(68, 'd4253b2633', 'Commerce', 42, 'commerce', 1650513600, 1650513600, 'fab fa-500px', NULL, 0, NULL, NULL),
(69, '050baa4a47', 'qwertyuiop', 0, 'qwertyuiop', 1656993600, NULL, 'fab fa-500px', '89a1ffdec22f4f52f780f7b89c873b7e.jpg', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int(11) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `shareable_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `student_id`, `course_id`, `shareable_url`) VALUES
(1, 29, 76, '0b00e5ddb0.jpg'),
(2, 29, 84, '72b77d700e.jpg'),
(3, 68, 86, '8123cd8177.jpg'),
(4, 76, 89, 'f35ca12172.jpg'),
(5, 82, 89, '67fcd8dbd6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('39ac30ef20021c1490c37fdfeb7dd06d2fd4809f', '202.47.37.16', 1660768540, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636303736383534303b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b757365725f69647c733a323a223636223b726f6c655f69647c733a313a2232223b726f6c657c733a343a2255736572223b6e616d657c733a383a22416c697368626120223b69735f696e7374727563746f727c733a313a2231223b69735f6f7267616e697a6174696f6e7c4e3b757365725f6c6f67696e7c733a313a2231223b),
('c62543ef642fd2eb6ee147194e24979a1218792f', '202.47.37.16', 1660769098, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636303736393039383b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b757365725f69647c733a323a223636223b726f6c655f69647c733a313a2232223b726f6c657c733a343a2255736572223b6e616d657c733a383a22416c697368626120223b69735f696e7374727563746f727c733a313a2231223b69735f6f7267616e697a6174696f6e7c4e3b757365725f6c6f67696e7c733a313a2231223b),
('f95537300ff24209554fe78876dcb29cd52a4761', '216.244.66.234', 1660768995, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636303736383939353b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b6572726f725f6d6573736167657c733a34383a22596f7520646f206e6f742068617665207065726d697373696f6e20746f20616363657373207468697320636f75727365223b5f5f63695f766172737c613a313a7b733a31333a226572726f725f6d657373616765223b733a333a226e6577223b7d),
('2a02cd98de6577aa65f2269e963cbffc0f3a053f', '185.191.171.4', 1660769020, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636303736393032303b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b),
('07938555084a26d8fca5dbabb175b6adc5faa778', '202.47.37.16', 1660769623, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636303736393632333b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b69735f6f7267616e697a6174696f6e7c4e3b757365725f69647c733a323a223239223b726f6c655f69647c733a313a2232223b726f6c657c733a343a2255736572223b6e616d657c733a31303a224d61697261204b68616e223b69735f696e7374727563746f727c733a313a2230223b757365725f6c6f67696e7c733a313a2231223b),
('c2f2d267ca5c4a83440a71e0902d4836f860a5ba', '202.47.37.16', 1660770299, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636303737303239393b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b69735f6f7267616e697a6174696f6e7c4e3b757365725f69647c733a333a22313034223b726f6c655f69647c733a313a2232223b726f6c657c733a343a2255736572223b6e616d657c733a393a22686173616e616c6920223b69735f696e7374727563746f727c733a313a2230223b757365725f6c6f67696e7c733a313a2231223b),
('f61623e25497d9d70e5d3c3853d09d46ef871d7e', '202.47.37.16', 1660769939, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636303736393933383b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b69735f6f7267616e697a6174696f6e7c4e3b757365725f69647c733a323a223239223b726f6c655f69647c733a313a2232223b726f6c657c733a343a2255736572223b6e616d657c733a31303a224d61697261204b68616e223b69735f696e7374727563746f727c733a313a2230223b757365725f6c6f67696e7c733a313a2231223b),
('161bf55fa5adc6a30c3ff28af846119ef7c94bf9', '202.47.37.16', 1660770602, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636303737303630323b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b69735f6f7267616e697a6174696f6e7c4e3b757365725f69647c733a323a223239223b726f6c655f69647c733a313a2232223b726f6c657c733a343a2255736572223b6e616d657c733a31303a224d61697261204b68616e223b69735f696e7374727563746f727c733a313a2230223b757365725f6c6f67696e7c733a313a2231223b),
('16a12d3a1e72e6a112faddcef1c10216e22cb6e0', '202.47.37.16', 1660770915, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636303737303931353b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b69735f6f7267616e697a6174696f6e7c4e3b757365725f69647c733a323a223239223b726f6c655f69647c733a313a2232223b726f6c657c733a343a2255736572223b6e616d657c733a31303a224d61697261204b68616e223b69735f696e7374727563746f727c733a313a2230223b757365725f6c6f67696e7c733a313a2231223b6c61796f75747c733a343a226c697374223b),
('405b96de3b3c987ce5309092e8e1757fd011ab7d', '202.47.37.16', 1660771280, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636303737313238303b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b69735f6f7267616e697a6174696f6e7c4e3b757365725f69647c733a323a223239223b726f6c655f69647c733a313a2232223b726f6c657c733a343a2255736572223b6e616d657c733a31303a224d61697261204b68616e223b69735f696e7374727563746f727c733a313a2230223b757365725f6c6f67696e7c733a313a2231223b6c61796f75747c733a343a226c697374223b),
('26a76bb70ecee6a367258ba3deaa31150d575b03', '202.47.37.16', 1660772965, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636303737323936353b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b69735f6f7267616e697a6174696f6e7c4e3b757365725f69647c733a323a223239223b726f6c655f69647c733a313a2232223b726f6c657c733a343a2255736572223b6e616d657c733a31303a224d61697261204b68616e223b69735f696e7374727563746f727c733a313a2230223b757365725f6c6f67696e7c733a313a2231223b6c61796f75747c733a343a226c697374223b),
('85ee0f4d2a8b45a14048e203710d3e3e1465cd35', '216.244.66.234', 1660772396, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636303737323339353b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b),
('40126d40cecb383e43d1b8bb974c0605c3d08ee3', '202.47.37.16', 1660773295, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636303737333239353b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b69735f6f7267616e697a6174696f6e7c4e3b757365725f69647c733a323a223239223b726f6c655f69647c733a313a2232223b726f6c657c733a343a2255736572223b6e616d657c733a31303a224d61697261204b68616e223b69735f696e7374727563746f727c733a313a2230223b757365725f6c6f67696e7c733a313a2231223b6c61796f75747c733a343a226c697374223b),
('0eb929959a5ffd90e3f3121403186f1bf4a72da2', '202.47.37.16', 1660773631, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636303737333633313b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b69735f6f7267616e697a6174696f6e7c4e3b757365725f69647c733a323a223239223b726f6c655f69647c733a313a2232223b726f6c657c733a343a2255736572223b6e616d657c733a31303a224d61697261204b68616e223b69735f696e7374727563746f727c733a313a2230223b757365725f6c6f67696e7c733a313a2231223b6c61796f75747c733a343a226c697374223b),
('652c8628b282bd7d62951499590046e09d6544f3', '202.47.37.16', 1660774176, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636303737343137363b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b69735f6f7267616e697a6174696f6e7c4e3b757365725f69647c733a323a223239223b726f6c655f69647c733a313a2232223b726f6c657c733a343a2255736572223b6e616d657c733a31303a224d61697261204b68616e223b69735f696e7374727563746f727c733a313a2230223b757365725f6c6f67696e7c733a313a2231223b6c61796f75747c733a343a226c697374223b),
('24203cc06cbc529c1e612d2edee3f8d0cabcb69d', '185.191.171.11', 1660774028, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636303737343032383b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b),
('16c8ee0704ce3224fb720627a0fdc68964025187', '202.47.37.16', 1660774578, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636303737343537383b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b69735f6f7267616e697a6174696f6e7c4e3b757365725f69647c733a323a223239223b726f6c655f69647c733a313a2232223b726f6c657c733a343a2255736572223b6e616d657c733a31303a224d61697261204b68616e223b69735f696e7374727563746f727c733a313a2230223b757365725f6c6f67696e7c733a313a2231223b6c61796f75747c733a343a226c697374223b),
('4bedf0ace412d19a435f792b42fb74bf980e56de', '202.47.37.16', 1660775184, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636303737353138343b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b69735f6f7267616e697a6174696f6e7c4e3b757365725f69647c733a323a223239223b726f6c655f69647c733a313a2232223b726f6c657c733a343a2255736572223b6e616d657c733a31303a224d61697261204b68616e223b69735f696e7374727563746f727c733a313a2230223b757365725f6c6f67696e7c733a313a2231223b6c61796f75747c733a343a226c697374223b),
('cff54ce08c780cb3c4959c2051caa0a20ca42a7c', '202.47.37.16', 1660775587, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636303737353538373b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b69735f6f7267616e697a6174696f6e7c4e3b757365725f69647c733a323a223239223b726f6c655f69647c733a313a2232223b726f6c657c733a343a2255736572223b6e616d657c733a31303a224d61697261204b68616e223b69735f696e7374727563746f727c733a313a2230223b757365725f6c6f67696e7c733a313a2231223b6c61796f75747c733a343a226c697374223b),
('9d44adc185b7a5713395c24f3c2ab31172844ab0', '202.47.37.16', 1660775587, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636303737353538373b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b69735f6f7267616e697a6174696f6e7c4e3b6c61796f75747c733a343a226c697374223b),
('605f6d85702fb09108b5f5861aa0859fd3f672ba', '111.88.109.78', 1660777108, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636303737373037313b636172745f6974656d737c613a303a7b7d6c616e67756167657c733a373a22656e676c697368223b72656769737465725f656d61696c7c733a32303a22676964796d406d61696c696e61746f722e636f6d223b);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) UNSIGNED NOT NULL,
  `body` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `commentable_id` int(11) DEFAULT NULL,
  `commentable_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `phone`, `message`) VALUES
(1, 'sufiyan rao', 'sufiyan.digitizal@gmail.com', '37891556', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `discount_percentage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `expiry_date` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `discount_percentage`, `created_at`, `expiry_date`) VALUES
(1, 'JPJC28B', '12', 1643864400, 1643864400),
(2, 'dumy', '2', 1649822400, 1649908800),
(3, '6667755', '10', 1650513600, 1651291200),
(4, '6666', '5', 1651204800, 1651636800),
(5, '234', '5', 1660104000, 1660276800),
(6, '18XIFUT', '10', 1660104000, 1660190400),
(7, 'ABC123', '50', 1660449600, 2147483647),
(8, '456', '50', 1660449600, 1660795200),
(9, 'FXDUAAN', '5', 1660536000, 1660622400),
(10, 'B0VYQBK', '4', 1660708800, 1660881600);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `outcomes` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `section` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `requirements` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `discount_flag` int(11) DEFAULT 0,
  `discounted_price` int(11) DEFAULT NULL,
  `level` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  `course_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_top_course` int(11) DEFAULT 0,
  `is_admin` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_overview_provider` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_free_course` int(11) DEFAULT NULL,
  `multi_instructor` int(11) NOT NULL DEFAULT 0,
  `creator` int(11) DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `title`, `short_description`, `description`, `outcomes`, `language`, `category_id`, `sub_category_id`, `section`, `requirements`, `price`, `discount_flag`, `discounted_price`, `level`, `user_id`, `thumbnail`, `video_url`, `date_added`, `last_modified`, `course_type`, `is_top_course`, `is_admin`, `status`, `course_overview_provider`, `meta_keywords`, `meta_description`, `is_free_course`, `multi_instructor`, `creator`, `type`) VALUES
(5, 'Web Development | Angular', '', '', '[]', 'arabic', 1, 24, '[8]', '[]', 0, NULL, 0, 'beginner', '57,3', NULL, 'google.com', 1644382800, 1659672000, 'general', 0, 1, 'active', 'youtube', '', '', 1, 0, 1, 1),
(6, 'Web Development | PHP', 'PHP is a popular general-purpose scripting language that is especially suited to web development.', '<p xss=removed><span xss=removed><span xss=removed>PHP</span><span xss=removed> is a popular general-purpose scripting language that is especially suited to web development. </span><span xss=removed>PHP is a general-purpose scripting language geared towards web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1994.</span></span><br xss=removed></p>', '[]', 'english', 16, 17, '[]', '[]', 16000, NULL, 150, 'advanced', '1,57', NULL, 'https://www.youtube.com', 1644382800, NULL, 'general', NULL, 1, 'active', 'youtube', '', 'PHP is a popular general-purpose scripting language that is especially suited to web development.', NULL, 0, 1, 1),
(7, 'Web Development | HTML & CSS', 'An internal CSS is used to define a style for a single HTML page', '<p xss=removed><span xss=removed><span xss=removed>An internal </span><span xss=removed>CSS</span><span xss=removed> is used to define a style for a single </span><span xss=removed>HTML</span><span xss=removed> page </span><span xss=removed>Cascading Style Sheets is a style sheet language used for describing the presentation of a document written in a markup language such as HTML</span></span><br xss=removed></p>', '[]', 'english', 1, 23, '[]', '[]', 2200, NULL, 0, 'beginner', '1,70,81', NULL, 'https://www.youtube.com', 1644382800, 1657857600, 'general', 0, 1, 'active', 'youtube', '', 'An internal CSS is used to define a style for a single HTML page', NULL, 1, 1, 1),
(8, 'Photoshop', 'If you can dream it, you can make it with Adobe Photoshop. Create beautiful images, graphics, paintings, and 3D artwork on your desktop or iPad. Join today.', '<p xss=removed><span xss=removed><span xss=removed><span xss=removed>If you can dream it, you can make it with <span xss=removed>Adobe </span></span><span xss=removed>Photoshop</span><span xss=removed>. Create beautiful images, graphics, paintings, and 3D artwork on your desktop or iPad. Join today. </span></span><span xss=removed>Adobe Photoshop is a raster graphics editor developed and published by Adobe Inc. for Windows and macOS</span></span><br xss=removed></p>', '[]', 'english', 16, 18, '[]', '[]', 25000, NULL, 250, 'beginner', '1', NULL, 'https://www.youtube.com', 1644469200, NULL, 'general', NULL, 1, 'active', 'youtube', '', 'Adobe Photoshop is a raster graphics editor developed and published by Adobe Inc. for Windows and macOS', NULL, 0, 1, 1),
(9, 'Adobe Illustrator', 'Adobe Illustrator is vector-based graphics software that lets you scale down your artwork for mobile screens or scale up to billboard size ', '<p xss=removed><span xss=removed><span xss=removed>Adobe Illustrator</span><span xss=removed> is vector-based graphics software that lets you scale down your artwork for mobile screens or scale up to billboard size  </span><span xss=removed>Adobe Illustrator is a vector graphics editor and design program developed and marketed by Adobe Inc. Originally designed for the Apple Macintosh, development of Adobe Illustrator began in 1985.</span><span xss=removed> </span></span><br xss=removed></p>', '[]', 'english', 16, 18, '[]', '[]', 28000, NULL, 0, 'intermediate', '1', NULL, 'https://www.youtube.com', 1644469200, NULL, 'general', NULL, 1, 'active', 'youtube', '', 'Adobe Illustrator is a vector graphics editor and design program developed and marketed by Adobe Inc. Originally designed for the Apple Macintosh, development of Adobe Illustrator began in 1985. ', NULL, 0, 1, 1),
(10, 'AutoCAD', 'AutoCAD is computer-aided design (CAD) software that is used for precise 2D and 3D drafting, design, and modeling with solids, and surfaces', '<p xss=removed><span xss=removed><span xss=removed>AutoCAD</span> is computer-aided design (CAD) software that is used for precise 2D and 3D drafting, design, and modeling with solids, and surfaces </span><span xss=removed>AutoCAD is a commercial computer-aided design and drafting software application.</span><br xss=removed></p>', '[]', 'english', 16, 18, '[]', '[]', 1258, NULL, 81, 'advanced', '1', NULL, 'https://www.youtube.com', 1644469200, NULL, 'general', NULL, 1, 'active', 'youtube', '', 'AutoCAD is a commercial computer-aided design and drafting software application.', NULL, 0, 1, 1),
(11, 'Linear Algebra', 'linear algebra, mathematical discipline that deals with vectors and matrices and, more generally, with vector spaces and linear transformations. ... Its value lies in its many applications, from mathematical physics to modern algebra and coding theory.', '<p xss=removed><span xss=removed><span xss=removed>linear algebra, </span><b xss=removed>mathematical discipline that deals with vectors and matrices</b><span xss=removed> and, more generally, with vector spaces and linear transformations. ... Its value lies in its many applications, from mathematical physics to modern algebra and coding theory.</span></span><br xss=removed></p>', '[]', 'english', 1, 23, '[]', '[]', 1200, NULL, 0, 'beginner', '1', NULL, 'https://www.youtube.com', 1644469200, NULL, 'general', NULL, 1, 'active', 'youtube', '', 'linear algebra, mathematical discipline that deals with vectors and matrices and, more generally, with vector spaces and linear transformations. ... Its value lies in its many applications, from mathematical physics to modern algebra and coding theory.\r\n', NULL, 0, 1, 1),
(12, 'Pre-Algebra Explained', 'Learn pre-algebra for free—all of the basic arithmetic and geometry skills needed for algebra. Full curriculum of exercises and videos.', '<p xss=removed><span xss=removed><span xss=removed>Learn </span><span xss=removed>pre</span><span xss=removed>-</span><span xss=removed>algebra</span><span xss=removed> for free—all of the basic arithmetic and geometry skills needed for </span><span xss=removed>algebra</span><span xss=removed>. Full curriculum of exercises and videos.</span></span><br xss=removed></p>', '[]', 'english', 1, 23, '[]', '[]', 1500, NULL, 0, 'intermediate', '1', NULL, 'https://www.youtube.com', 1644469200, NULL, 'general', NULL, 1, 'active', 'youtube', '', '', NULL, 0, 1, 1),
(13, 'Geometry Basics to Advanced', 'Geometry (from the Ancient Greek: γεωμετρία; geo- &quot;earth&quot;, -metron &quot;measurement&quot;) is, with arithmetic, one of the oldest branches of mathematics', '<p xss=removed><span xss=removed><span xss=removed>Geometry (from the Ancient Greek: γεωμετρία; geo- \"earth\", -metron \"measurement\") is, with </span><b xss=removed>arithmetic</b><span xss=removed>, one of the oldest branches of mathematics</span></span><br xss=removed></p>', '[]', 'english', 1, 24, '[]', '[]', 10000, NULL, 0, 'beginner', '1', NULL, 'https://www.youtube.com', 1644469200, NULL, 'general', NULL, 1, 'active', 'youtube', '', '', NULL, 0, 1, 1),
(14, 'Master Geometry', 'Geometry (from the Ancient Greek: γεωμετρία; geo- &quot;earth&quot;, -metron &quot;measurement&quot;) is, with arithmetic, one of the oldest branches of mathematics', '<p xss=removed><span xss=removed><span xss=removed>Geometry (from the Ancient Greek: γεωμετρία; geo- \"earth\", -metron \"measurement\") is, with </span><b xss=removed>arithmetic</b><span xss=removed>, one of the oldest branches of mathematics</span></span><br xss=removed></p>', '[]', 'english', 1, 24, '[]', '[]', 15000, NULL, 0, 'advanced', '1', NULL, 'https://www.youtube.com/', 1644469200, NULL, 'general', NULL, 1, 'active', 'youtube', '', '', NULL, 0, 1, 1),
(15, 'Social Studies for Kids', 'Social Studies for Kids', '<p xss=removed>Social Studies for KidsSocial Studies for Kids<br xss=removed></p>', '[]', 'english', 1, 25, '[]', '[]', 15600, NULL, 0, 'beginner', '1', NULL, 'https://www.youtube.com', 1644469200, NULL, 'general', NULL, 1, 'active', 'youtube', '', 'Social Studies for Kids', NULL, 0, 1, 1),
(16, 'Introduction to Probability', ' The analysis of events governed by probability is called statistics.', '<p xss=removed><span xss=removed><span xss=removed>Probability is </span><b xss=removed>simply how likely something is to happen</b><span xss=removed>. Whenever we\'re unsure about the outcome of an event, we can talk about the probabilities of certain outcomes—how likely they are. The analysis of events governed by probability is called statistics.</span></span><br xss=removed></p>', '[]', 'english', 1, 26, '[48]', '[\"some\"]', 1650, NULL, 0, 'beginner', '1', NULL, 'https://www.youtube.com', 1644469200, NULL, 'general', NULL, 1, 'active', 'youtube', '', '', NULL, 0, 1, 1),
(17, 'Calculus Basics to Advanced', 'Calculus is the mathematical study of change, in the same way that geometry is the study of shape and algebra is the study of operations and their application to solving equations.', '<p xss=removed><span xss=removed><span xss=removed>Calculus is </span><b xss=removed>the mathematical study of change</b><span xss=removed>, in the same way that geometry is the study of shape and algebra is the study of operations and their application to solving equations. </span><span xss=removed>Calculus, originally called infinitesimal calculus or \"the calculus of infinitesimals\", is the mathematical study of continuous change, in the same way that geometry is the study of shape, and algebra is the study of generalizations of arithmetic operations.</span></span><br xss=removed></p>', '[]', 'english', 1, 26, '[]', '[]', 16000, NULL, 600, 'beginner', '1', NULL, 'https://www.youtube.com', 1644469200, NULL, 'general', NULL, 1, 'active', 'youtube', '', 'Calculus, originally called infinitesimal calculus or \"the calculus of infinitesimals\", is the mathematical study of continuous change, in the same way that geometry is the study of shape, and algebra is the study of generalizations of arithmetic operations.', NULL, 0, 1, 1),
(18, 'Plant Anatomy and Taxonomy', ' Anatomical characters are conserved and stable and thus can be used as a “Taxonomic Character” for Plant Systematics of Plant Taxonomy.', '<p xss=removed><span xss=removed> Anatomical characters are conserved and stable and thus can be used as a “Taxonomic Character” for Plant Systematics of Plant Taxonomy. Ø Anatomical characters of all the plant parts can be used such as the characters of stem, root, leaves, bark, stomata, trichomes, internal parts etc.</span><br xss=removed></p>', '[]', 'english', 1, 27, '[]', '[]', 12000, NULL, 0, 'beginner', '1', NULL, 'https://www.youtube.com', 1644469200, NULL, 'general', NULL, 1, 'active', 'youtube', '', ' Anatomical characters are conserved and stable and thus can be used as a “Taxonomic Character” for Plant Systematics of Plant Taxonomy.', NULL, 0, 1, 1),
(19, 'Diversity And Biology Of Plants', 'Plant diversity refers to the existence of wide variety of plant species in their natural environments. There are around 300,000-500,000 species of vascular plants that exist on earth', '<p xss=removed><span xss=removed><span xss=removed>Plant diversity refers to the existence of wide variety of plant species in their natural environments. There are </span><b xss=removed>around 300,000-500,000 species of vascular plants</b><span xss=removed> that exist on earth </span><span xss=removed>Explain the process of wood formation and transport mechanisms in plants.</span></span><br xss=removed></p>', '[]', 'english', 1, 27, '[]', '[]', 25000, NULL, 0, 'intermediate', '1', NULL, 'https://www.youtube.com', 1644469200, NULL, 'general', NULL, 1, 'active', 'youtube', '', 'Explain the process of wood formation and transport mechanisms in plants.', NULL, 0, 1, 1),
(20, 'Computer Network', 'Computer networking refers to interconnected computing devices that can exchange data and share resources with each other', '<p xss=removed><span xss=removed><span xss=removed>Computer networking refers to </span><b xss=removed>interconnected computing devices that can exchange data and share resources with each other </b><span xss=removed>These networked devices use a system of rules, called communications protocols, to transmit information over physical or wireless technologies.</span></span><br xss=removed></p>', '[]', 'english', 16, 28, '[]', '[]', 8000, NULL, 0, 'beginner', '1', NULL, 'https://www.youtube.com', 1644469200, NULL, 'general', NULL, 1, 'active', 'youtube', 'Networking,network,computer network', '', NULL, 0, 1, 1),
(21, 'Ethical Hacking', 'Ethical hacking is a process of detecting vulnerabilities in an application, system, or organization&#039;s infrastructure that an attacker can use to exploit an individual or organization', '<p xss=removed><span xss=removed><span xss=removed>Ethical hacking is </span><b xss=removed>a process of detecting vulnerabilities in an application, system, or organization\'s infrastructure</b><span xss=removed> that an attacker can use to exploit an individual or organization</span><span xss=removed>They use this process to prevent cyberattacks and security breaches by lawfully hacking into the systems and looking for weak points.</span></span><br xss=removed></p>', '[]', 'english', 16, 28, '[]', '[]', 14000, NULL, 0, 'intermediate', '1', NULL, 'https://www.youtube.com', 1644469200, NULL, 'general', NULL, 1, 'active', 'youtube', 'hacking,ethical hacking', '', NULL, 0, 1, 1),
(22, 'Cyber Security', 'Cyber security is the application of technologies, processes and controls to protect systems, networks, programs, devices and data from cyber attacks.', '<p xss=removed><span xss=removed><span xss=removed>Cyber security is the </span><b xss=removed>application of technologies, processes and controls to protect systems, networks, programs, devices and data from cyber attacks</b><span xss=removed>. </span><span xss=removed>It aims to reduce the risk of cyber attacks and protect against the unauthorised exploitation of systems, networks and technologies.</span></span><br xss=removed></p>', '[]', 'english', 16, 28, '[]', '[]', 19000, NULL, 0, 'advanced', '1', NULL, 'https://www.youtube.com', 1644469200, NULL, 'general', NULL, 1, 'active', 'youtube', 'security,cyber,cyber security', '', NULL, 0, 1, 1),
(23, 'Microsoft Certification', 'Microsoft Learning Partners offer a breadth of solutions to suit your learning needs, empowering you to achieve your training goals. ', '<p xss=removed><span xss=removed>Microsoft Learning Partners offer a breadth of solutions to suit your learning needs, empowering you to achieve your training goals. </span><br xss=removed></p>', '[]', 'english', 16, 31, '[]', '[]', 23000, NULL, 0, 'beginner', '1', NULL, 'https://www.youtube.com/', 1644469200, NULL, 'general', NULL, 1, 'active', 'youtube', 'microsoft,certificates', '', NULL, 0, 1, 1),
(24, 'Amazon AWS', 'Amazon Web Services offers reliable, scalable, and inexpensive cloud computing services. Free to join, pay only for what you use', '<p xss=removed><span xss=removed><span xss=removed>Amazon Web Services</span><span xss=removed> offers reliable, scalable, and inexpensive cloud computing services. Free to join, pay only for what you use</span></span><br xss=removed></p>', '[]', 'english', 16, 31, '[]', '[]', 17000, NULL, 170, 'intermediate', '1', NULL, 'https://www.youtube.com/', 1644469200, NULL, 'general', NULL, 1, 'active', 'youtube', 'amazon,aws,certified,career,use', '', NULL, 0, 1, 1),
(25, 'Microsoft | Excel Formulas and Functions', 'Collaborate for free with an online version of Microsoft Excel. Save spreadsheets in OneDrive. Share them with others and work together at the same time.', '<p xss=removed><span xss=removed><span xss=removed>Collaborate for free with an online version of Microsoft </span><span xss=removed>Excel</span><span xss=removed>. Save spreadsheets in OneDrive. Share them with others and work together at the same time.</span></span><br xss=removed></p>', '[]', 'english', 16, 65, '[]', '[]', 8000, NULL, 10, 'intermediate', '1', NULL, 'https://www.youtube.com', 1644469200, NULL, 'general', NULL, 1, 'active', 'youtube', 'microsoft,excel,Microsoft excel,office', '', NULL, 0, 1, 1),
(26, 'Google | Docs and Sheets', 'Sheets is thoughtfully connected to other Google apps you love, saving you time. Easily analyze Google Forms data in Sheets, or embed Sheets charts in ...\r\n', '<div xss=removed><div data-hveid=\"CBUQAA\" data-ved=\"2ahUKEwjkgqyN4_T1AhVDPBoKHQYTC50QFSgAegQIFRAA\" xss=removed><div class=\"jtfYYd\" data-sokoban-container=\"SOKOBAN_7552265690306943991\" xss=removed><div class=\"NJo7tc Z26q7c uUuwM\" data-content-feature=\"1\" xss=removed><div class=\"VwiC3b yXK7lf MUxGbd yDYNvb lyLwlc lEBKkf\" xss=removed><span xss=removed><span xss=removed>Sheets</span> is thoughtfully connected to other <span xss=removed>Google</span> apps you love, saving you time. Easily analyze <span xss=removed>Google</span> Forms data in <span xss=removed>Sheets</span>, or embed <span xss=removed>Sheets</span> charts in ...</span></div></div></div></div></div><div xss=removed><ul class=\"FxLDp\" xss=removed><li class=\"MYVUIe\" xss=removed><div class=\"XN9cAe\" xss=removed><div data-hveid=\"CBcQAA\" data-ved=\"2ahUKEwjkgqyN4_T1AhVDPBoKHQYTC50QtJkDKAB6BAgXEAA\" xss=removed><div class=\"jtfYYd\" data-sokoban-container=\"SOKOBAN_8441651487145404322\" xss=removed><div class=\"NJo7tc Z26q7c jGGQ5e\" data-header-feature=\"0\" xss=removed></div></div></div></div></li></ul></div>', '[]', 'english', 16, 65, '[]', '[]', 16000, NULL, 0, 'advanced', '1', NULL, 'https://www.youtube.com', 1644469200, NULL, 'general', NULL, 1, 'active', 'youtube', 'google,sheet,docs,slides', '', NULL, 0, 1, 1),
(27, 'Internal Combustion Engine Basics', 'An internal combustion engine (ICE or IC engine) is a heat engine in which the combustion of a fuel occurs with an oxidizer ', '<p xss=removed><span xss=removed><span xss=removed>An </span><span xss=removed>internal combustion</span><span xss=removed> engine (ICE or IC engine) is a heat engine in which the combustion of a fuel occurs with an oxidizer </span></span><br xss=removed></p>', '[]', 'english', 19, 20, '[]', '[]', 17000, NULL, 0, 'beginner', '1', NULL, 'https://www.youtube.com/', 1644469200, NULL, 'general', NULL, 1, 'active', 'youtube', 'engine,mechanical,combustion', '', NULL, 0, 1, 1),
(28, 'Introduction to Mechanical Engineering', 'Mechanical engineering is a stream of engineering which provides solutions to the development of processes and products, ranging from small component design to extremely large plant, machinery, or vehicles.', '<p xss=removed><span xss=removed><span xss=removed>Mechanical engineering is a </span><b xss=removed>stream of engineering which provides solutions to the development of processes and products</b><span xss=removed>, ranging from small component design to extremely large plant, machinery, or vehicles. Mechanical engineers design, develop, build, and test mechanical and thermal sensors and devices.</span></span><br xss=removed></p>', '[]', 'english', 19, 20, '[]', '[]', 17000, NULL, 0, 'beginner', '1', NULL, 'https://www.youtube.com', 1644469200, NULL, 'general', NULL, 1, 'active', 'youtube', 'mechanical,engineering', '', NULL, 0, 1, 1),
(29, 'Electrical Schematics', 'An electrical schematic is a logical representation of the physical connections and layout of an electric circuit.', '<p xss=removed><span xss=removed><span xss=removed>An electrical schematic is </span><b xss=removed>a logical representation of the physical connections and layout of an electric circuit</b><span xss=removed>.</span></span><br xss=removed></p>', '[]', 'english', 19, 21, '[]', '[]', 17800, NULL, 0, 'advanced', '1', NULL, 'https://www.youtube.com', 1644469200, NULL, 'general', NULL, 1, 'active', 'youtube', 'electrical,schematics', '', NULL, 0, 1, 1),
(30, 'Basics of Household Wiring', 'The most common type of wiring in modern homes is in the form of nonmetallic (NM) cable', '<p xss=removed>The most common type of wiring in modern homes is in the form of nonmetallic (NM) cable<br xss=removed></p>', '[]', 'english', 19, 21, '[]', '[]', 15000, NULL, 0, 'intermediate', '1', NULL, 'https://www.youtube.com', 1644469200, NULL, 'general', NULL, 1, 'active', 'youtube', 'house,household,wiring', '', NULL, 0, 1, 1),
(31, 'Logarithm &amp; Its Application', 'In Mathematics, logarithms are the other way of writing the exponents. A logarithm of a number with a base is equal to another number', '<p xss=removed>In Mathematics, logarithms are the other way of writing the exponents. A logarithm of a number with a base is equal to another number<br xss=removed></p>', '[]', 'english', 19, 22, '[]', '[]', 16500, NULL, 0, 'advanced', '1', NULL, 'https://www.youtube.com', 1644469200, NULL, 'general', NULL, 1, 'active', 'youtube', 'log,logarithm,application of logarithm', '', NULL, 0, 1, 1),
(32, 'English For Beginners', 'English For Beginners', '<p xss=removed>English For Beginners<br xss=removed></p>', '[]', 'english', 29, 30, '[]', '[]', 1750, NULL, 0, 'beginner', '1', NULL, 'https://www.youtube.com', 1644469200, NULL, 'general', NULL, 1, 'active', 'youtube', 'english,beginners', '', NULL, 0, 1, 1),
(33, 'English Advanced', 'English Advanced', '<p xss=removed>English Advanced<br xss=removed></p>', '[]', 'english', 29, 30, '[]', '[]', 5000, NULL, 0, 'advanced', '1', NULL, 'https://www.youtube.com', 1644469200, NULL, 'general', NULL, 1, 'active', 'youtube', '', '', NULL, 0, 1, 1),
(34, 'Perfect Golf Swing', 'Perfect Golf Swing', '<p xss=removed>Perfect Golf Swing<br xss=removed></p>', '[]', 'english', 32, 33, '[]', '[]', 16550, NULL, 0, 'intermediate', '1', NULL, 'https://www.youtube.com', 1644469200, NULL, 'general', NULL, 1, 'active', 'youtube', 'golf swing,swing,golf,area', '', NULL, 0, 1, 1),
(35, 'Cricket Batting Course', 'Cricket Batting Course', '<p xss=removed>Cricket Batting Course<br xss=removed></p>', '[]', 'english', 32, 33, '[]', '[]', 3000, NULL, 0, 'beginner', '1', NULL, 'https://www.youtube.com', 1644469200, NULL, 'general', NULL, 1, 'active', 'youtube', 'bat,batsmen,batting,batting course,cricket', '', NULL, 0, 1, 1),
(36, 'Shuffle Dance', 'Dance', '<p xss=removed>Dance<br xss=removed></p>', '[]', 'english', 32, 34, '[]', '[]', 3213, NULL, 0, 'beginner', '1', NULL, 'https://www.youtube.com', 1644469200, NULL, 'general', NULL, 1, 'active', 'youtube', '', '', NULL, 0, 1, 1),
(37, 'First Aid Masterclass', 'First Aid Masterclass', '<p xss=removed>First Aid Masterclass<br xss=removed></p>', '[]', 'english', 32, 34, '[]', '[]', 3000, NULL, 0, 'advanced', '1', NULL, 'https://www.youtube.com', 1644469200, NULL, 'general', NULL, 1, 'active', 'youtube', '', '', NULL, 0, 1, 1),
(38, 'Nutrition Masterclass', 'Nutrition Masterclass', '<p xss=removed>Nutrition Masterclass<br xss=removed></p>', '[]', 'english', 32, 36, '[]', '[]', 2550, NULL, 0, 'beginner', '1', NULL, 'https://www.youtube.com', 1644469200, NULL, 'general', NULL, 1, 'active', 'youtube', 'diet,food', '', NULL, 0, 1, 1),
(39, 'Scientific Self Defense', 'Scientific Self Defense', '<p xss=removed>Scientific Self Defense<br xss=removed></p>', '[]', 'english', 32, 37, '[]', '[]', 5000, NULL, 0, 'advanced', '1', NULL, 'https://www.youtube.com/', 1644469200, NULL, 'general', NULL, 1, 'active', 'youtube', 'self,self protection', '', NULL, 0, 1, 1),
(40, 'Online Course Creation Guide', 'Online Course Creation Guide', '<p xss=removed>Online Course Creation Guide<br xss=removed></p>', '[]', 'english', 38, 39, '[]', '[]', 17800, NULL, 0, 'intermediate', '1', NULL, 'https://www.youtube.com/', 1644555600, NULL, 'general', NULL, 1, 'active', 'youtube', 'courses,learn,online', 'Online Course Creation Guide', NULL, 0, 1, 1),
(41, 'Life Coaching Course Creation (Beginner to Intermediate)', 'Life Coaching Course Creation (Beginner to Intermediate)', '<p xss=removed>Life Coaching Course Creation (Beginner to Intermediate)<br xss=removed></p>', '[]', 'english', 38, 40, '[]', '[]', 12500, NULL, 0, 'beginner', '1', NULL, 'https://www.youtube.com/', 1644555600, NULL, 'general', NULL, 1, 'active', 'youtube', 'coaching,life cycle', '', NULL, 0, 1, 1),
(42, 'Strategies For a Teacher', 'Strategies For a Teacher', '<p xss=removed>Strategies For a Teacher<br xss=removed></p>', '[]', 'english', 38, 41, '[]', '[]', 2100, NULL, 0, 'beginner', '1', NULL, 'https://www.youtube.com', 1644555600, NULL, 'general', NULL, 1, 'active', 'youtube', 'basics,techer,teaching', '', NULL, 0, 1, 1),
(43, 'Child Psychology (Advance)', 'Child Psychology (Advance)', '<p xss=removed>Child Psychology (Advance)<br xss=removed></p>', '[]', 'english', 38, 59, '[]', '[]', 1786, NULL, 0, 'advanced', '1', NULL, 'https://www.youtube.com', 1644555600, NULL, 'general', NULL, 1, 'active', 'youtube', 'psychology,child', '', NULL, 0, 1, 1),
(44, 'Stock Trading Course', 'Stock Trading Course', '<p xss=removed>Stock Trading Course<br xss=removed></p>', '[]', 'english', 42, 43, '[]', '[]', 1560, NULL, 0, 'beginner', '1', NULL, 'https://www.youtube.com', 1644555600, NULL, 'general', NULL, 1, 'active', 'youtube', 'trading,stock', '', NULL, 0, 1, 1),
(45, 'Microeconomics', 'Microeconomics is the branch of economics that considers the behavior of decision takers within the economy, such as individuals, households and firms.', '<p xss=removed>Microeconomics is the branch of economics that considers the behavior of decision takers within the economy, such as individuals, households and firms.<br xss=removed></p>', '[]', 'english', 42, 44, '[]', '[]', 35600, NULL, 0, 'beginner', '1', NULL, 'https://www.youtube.com', 1644555600, NULL, 'general', NULL, 1, 'active', 'youtube', '', '', NULL, 0, 1, 1),
(46, 'Macroeconomics', 'macroeconomics, study of the behaviour of a national or regional economy as a whole.', '<p xss=removed>macroeconomics, study of the behaviour of a national or regional economy as a whole.<br xss=removed></p>', '[]', 'english', 42, 44, '[]', '[]', 19500, NULL, 0, 'beginner', '1', NULL, 'https://www.youtube.com', 1644555600, NULL, 'general', NULL, 1, 'active', 'youtube', 'economics,macroeconomics,economy', '', NULL, 0, 1, 1),
(47, 'Understand Financial Market', 'To maintain national economic and financial stability along a path of sustainable and inclusive growth.', '<p xss=removed>To maintain national economic and financial stability along a path of sustainable and inclusive growth.<br xss=removed></p>', '[]', 'arabic', 42, 45, '[]', '[]', 1850, NULL, 0, 'advanced', '1', NULL, 'https://www.youtube.com', 1644555600, NULL, 'general', NULL, 1, 'active', 'youtube', '', '', NULL, 0, 1, 1),
(48, 'Tax Strategies Of The Wealthy', 'Tax Strategies Of The Wealthy', '<p xss=removed>Tax Strategies Of The Wealthy<br xss=removed></p>', '[]', 'english', 42, 46, '[]', '[]', 25650, NULL, 0, 'advanced', '1', NULL, 'https://www.youtube.com', 1644555600, NULL, 'general', NULL, 1, 'active', 'youtube', 'taxes,tax', '', NULL, 0, 1, 1),
(49, 'Learn About Islam', 'Learn About Islam', '<p xss=removed>Learn About Islam<br xss=removed></p>', '[]', 'english', 47, 48, '[]', '[]', 16540, NULL, 400, 'beginner', '1', NULL, 'https://www.youtube.com', 1644555600, NULL, 'general', NULL, 1, 'active', 'youtube', 'ISLAM,Teaching', '', NULL, 0, 1, 1),
(50, 'Learn About Christianity', 'Learn About Christianity', '<p xss=removed>Learn About Christianity<br xss=removed></p>', '[]', 'english', 47, 49, '[]', '[]', 6590, NULL, 0, 'beginner', '1', NULL, 'https://www.youtube.com', 1644555600, NULL, 'general', NULL, 1, 'active', 'youtube', '', '', NULL, 0, 1, 1),
(51, 'Learn About Hinduism', 'Learn About Hinduism', '<p xss=removed>Learn About Hinduism<br xss=removed></p>', '[]', 'english', 47, 50, '[]', '[]', 1450, NULL, 0, 'beginner', '1', NULL, 'https://www.youtube.com', 1644555600, NULL, 'general', NULL, 1, 'active', 'youtube', '', '', NULL, 0, 1, 1),
(52, 'Learn About Sikhism', 'Learn About Sikhism', '<p xss=removed>Learn About Sikhism<br xss=removed></p>', '[]', 'english', 47, 60, '[]', '[]', 3222, NULL, 0, 'beginner', '1', NULL, '', 1644555600, NULL, 'general', NULL, 1, 'active', '', '', '', NULL, 0, 1, 1),
(53, 'Business Ethics', 'Business Ethics', '<p xss=removed>Business Ethics<br xss=removed></p>', '[]', 'english', 51, 52, '[]', '[]', 65400, NULL, 0, 'beginner', '1', NULL, 'https://www.youtube.com', 1644555600, NULL, 'general', NULL, 1, 'active', 'youtube', '', '', NULL, 0, 1, 1),
(54, 'Speak Clearly &amp; Confidently', 'Speak Clearly &amp; Confidently', '<p xss=removed>Speak Clearly & Confidently<br xss=removed></p>', '[]', 'english', 51, 53, '[]', '[]', 7050, NULL, 0, 'beginner', '1', NULL, '', 1644555600, NULL, 'general', NULL, 1, 'active', '', '', '', NULL, 0, 1, 1),
(55, 'Learn Project Management', 'Learn Project Management', '<p xss=removed>Learn Project Management<br xss=removed></p>', '[]', 'english', 51, 54, '[]', '[]', 65000, NULL, 0, 'beginner', '1', NULL, '', 1644555600, NULL, 'general', NULL, 1, 'active', '', '', '', NULL, 0, 1, 1),
(56, 'Entrepreneurship &amp; Business', 'Entrepreneurship &amp; Business', '<p xss=removed>Entrepreneurship & Business<br xss=removed></p>', '[]', 'english', 51, 55, '[]', '[]', 69800, NULL, 0, 'advanced', '1', NULL, 'https://www.youtube.com', 1644555600, NULL, 'general', NULL, 1, 'active', 'youtube', '', '', NULL, 0, 1, 1),
(57, 'Law Of Contracts', 'Law Of Contracts', '<p xss=removed>Law Of Contracts        <br xss=removed></p>', '[]', 'english', 51, 56, '[]', '[]', 50000, NULL, 0, 'advanced', '1', NULL, 'https://www.youtube.com', 1644555600, NULL, 'general', NULL, 1, 'active', 'youtube', '', '', NULL, 0, 1, 1),
(58, 'Recruitment Interviewing Essentials', 'Recruitment Interviewing Essentials', '<p xss=removed>Recruitment Interviewing Essentials<br xss=removed></p>', '[]', 'english', 51, 57, '[]', '[]', 5980, NULL, 0, 'advanced', '1', NULL, '', 1644555600, NULL, 'general', NULL, 1, 'active', '', '', '', NULL, 0, 1, 1),
(59, 'Cooking Skills', 'Cooking Skills', '<p xss=removed>Cooking Skills    <br xss=removed></p>', '[]', 'english', 61, 62, '[]', '[]', 5250, NULL, 0, 'advanced', '1', NULL, '', 1644555600, NULL, 'general', NULL, 1, 'active', '', '', '', NULL, 0, 1, 1),
(60, 'Music Theory Comprehensive ', 'Music Theory Comprehensive ', '<p xss=removed><b>Music Theory Comprehensive </b><br xss=removed></p>', '[]', 'english', 61, 63, '[]', '[]', 15250, NULL, 0, 'advanced', '1', NULL, '', 1644555600, NULL, 'general', NULL, 1, 'active', '', '', '', NULL, 0, 1, 1),
(61, 'Games People Play ', 'Games People Play ', '<p xss=removed>Games People Play <br xss=removed></p>', '[]', 'english', 61, 64, '[]', '[]', 5500, NULL, 0, 'intermediate', '1', NULL, '', 1644555600, NULL, 'general', NULL, 1, 'active', '', '', '', NULL, 0, 1, 1),
(62, 'Web Development | Angular', 'qwertyuiop', 'qwertyuiop', '[\"fdvfdvdvfd\",\"dvfdvfdvfdv\",\"dvfdvfdv\"]', 'English', 1, 23, '[7]', '[\"dfvfdvfd\",\"vfdvfdvfd\",\"fdvfdvfdv\",\"fdvfdvfdvfd\"]', 1520, NULL, 1450, 'beginner', '5,1', NULL, 'https://www.youtube.com', 1644987600, 1656993600, 'general', 1, 1, 'active', 'youtube', 'qwertyuiop meta keywords', 'qwertyuiop meta', 1, 1, 5, 1),
(63, 'Web Development ', '', '', '[\"You will able to build website \"]', 'english', 16, 17, '[]', '[\"Basic Knowledge of IT and website \"]', 10000, NULL, 0, 'beginner', '13', NULL, '', 1649044800, NULL, 'general', NULL, 0, 'active', '', '', '', NULL, 0, 13, 1),
(64, 'Hfugxjfu', NULL, NULL, '[]', 'arabic', 19, 21, '[]', '[]', 2500, 1, 1800, 'beginner', '1', NULL, NULL, 1649476800, NULL, 'general', 0, 1, 'active', NULL, NULL, NULL, NULL, 0, NULL, 1),
(65, 'Web Development ', '\r\nA web developer&#039;s job is to create websites. While their primary role is to ensure the website is visually appealing and easy to navigate, many web developers are also responsible for the website&#039;s performance and capacity', '', '[\"You will able to build website \"]', 'english', 16, 17, '[]', '[\"Basic Knowledge of IT and website \"]', 10000, NULL, 20, 'beginner', '20', NULL, '', 1649995200, NULL, 'general', NULL, 0, 'pending', '', '', '', NULL, 0, 20, 1),
(66, 'UI/UX', 'Prototyping ', '', '[\"You will able to build website \"]', 'english', 16, 18, '[9]', '[\"Basic Knowledge of IT and website \"]', 5000, NULL, 0, 'beginner', '20', NULL, '', 1649995200, 1649995200, 'general', 0, 0, 'active', '', '', '', NULL, 0, 20, 1),
(67, 'Web Development ', 'Html, CSS, Bootstrap ', '<p>ABC</p>', '[\"You will able to build website \"]', 'english', 16, 17, '[13]', '[\"Basic Knowledge of IT and website \"]', 10000, NULL, 0, 'beginner', '21,13', NULL, '', 1650081600, 1650081600, 'general', 0, 0, 'pending', '', '', '', NULL, 1, 21, 1),
(68, 'Web Development', 'Html , CSS , Jscript', '<p>Abc Data </p>', '[\"You will able to build website \"]', 'english', 16, 17, '[14,15]', '[\"Basic Knowledge of IT and website \"]', 10000, NULL, 0, 'beginner', '24,22', NULL, 'https://youtu.be/l1EssrLxt7E', 1650340800, 1650340800, 'general', 0, 0, 'pending', 'youtube', '', 'abc', NULL, 1, 24, 1),
(69, 'Artifical Intelligence ', 'Intelligence Related Course', 'abc ', '[\"You will able to understand INteeligence\"]', 'english', 19, 20, '[16,17]', '[\"From It Backgroung\"]', 10000, NULL, 0, 'advanced', '22,1', NULL, 'https://youtu.be/l1EssrLxt7E', 1650340800, 1650340800, 'general', 0, 0, 'pending', 'youtube', '', 'abc', NULL, 1, 22, 1),
(70, 'gg', 'hh', '', '[]', 'arabic', 1, 23, '[]', '[\"Basic Knowledge of IT and website \"]', 44, NULL, 0, 'beginner', '22', NULL, 'https://youtu.be/l1EssrLxt7E', 1650340800, NULL, 'general', NULL, 0, 'pending', 'youtube', '', '', NULL, 0, 22, 1),
(71, 'Software Design Architecture ', 'You can design your software ', '<p>Design your project requirement , Plans etc</p>', '[\"You can easily design or manage your software requirement \"]', 'english', 51, 54, '[18]', '[\"Basic Knowledge required for this course \"]', 5000, 1, 0, 'beginner', '1', NULL, 'https://youtu.be/l1EssrLxt7E', 1650513600, 1650513600, 'general', 1, 1, 'active', 'youtube', '', '', NULL, 0, 1, 1),
(72, 'Software Design', 'You can design software ', '<p>abc </p>', '[\"You can easily design or manage your software requirement \"]', 'english', 51, 54, '[19]', '[\"Basic Knowledge required for this course \"]', 6000, NULL, 0, 'beginner', '1', NULL, 'https://youtu.be/l1EssrLxt7E', 1650513600, NULL, 'general', NULL, 1, 'active', 'youtube', '', 'abc', NULL, 0, 1, 1),
(73, 'Economic', 'abc', '<p>abc</p>', '[\"You can understand finanace \"]', 'english', 42, 68, '[20]', '[\"Basic Knowlege\"]', 3000, NULL, 0, 'beginner', '1,2', NULL, 'https://youtu.be/l1EssrLxt7E', 1650513600, 1650513600, 'general', 0, 1, 'active', 'youtube', '', 'sbc', NULL, 1, 1, 1),
(74, 'Organic chemistry ', NULL, NULL, '[]', 'english', 19, 22, '[]', '[]', 5000, 1, 4500, 'beginner', '1', NULL, NULL, 1650945600, NULL, 'general', 0, 1, 'active', NULL, NULL, NULL, NULL, 0, NULL, 1),
(76, 'Application Development', 'Language you learn is Java ', '<p class=\"MsoNormal\" xss=removed><span xss=removed>Android\r\nStudio provides a unified environment where you can </span>build apps for Android phones, tablets,\r\nAndroid Wear, Android TV, and Android Auto. Structured code modules allow you<span xss=removed> to divide your\r\nproject into units of functionality that you can independently build, test, and\r\ndebug</span><o></o></p>', '[\"You will able to build app for both Android and IOS \"]', 'english', 19, 22, '[24,25]', '[\"Knowledge of Java and Kotlin\"]', 15000, NULL, 0, 'beginner', '28,2', NULL, 'https://youtu.be/fis26HvvDII', 1650945600, 1659758400, 'general', 0, 0, 'active', 'youtube', '', 'learn Android Studio', NULL, 1, 28, 1),
(77, 'Gases', NULL, NULL, '[]', 'english', 38, 40, '[]', '[]', 4000, NULL, 3000, 'beginner', '1', NULL, NULL, 1653192000, NULL, 'general', 0, 1, 'active', NULL, NULL, NULL, NULL, 0, NULL, 1),
(78, 'Test', 'test des', '<p>test des</p>', '[\"test\"]', 'english', 1, 25, '[]', '[\"test\"]', 0, NULL, 0, 'beginner', '46', NULL, 'https://edutrainia.com/user/course_form/add_course', 1653364800, NULL, 'general', 1, 0, 'pending', 'youtube', '', 'test', 1, 0, 46, 1),
(79, 'php', 'programming language', '<p>fghr</p>', '[\"v\"]', 'english', 1, 25, '[26]', '[\"sv\"]', 0, NULL, 0, 'beginner', '63,57', NULL, 'https://www.youtube.com/watch?v=yGbojkyu814', 1653537600, NULL, 'general', 1, 0, 'active', 'youtube', '', 'dcv', 1, 0, 53, 1),
(80, 'test12345', 'rgeg', '<p>dfbd</p>', '[]', 'arabic', 1, 24, '[]', '[]', 435, NULL, 4, 'beginner', '63', NULL, '', 1654142400, NULL, 'general', 1, 0, 'pending', '', '', '', NULL, 0, 63, 1),
(81, 'PHP TEST', 'PHP TEST', '<p>PHP TEST<br></p>', '[\"Test outcome\"]', 'arabic', 1, 25, '[28]', '[\"Test\"]', 0, NULL, 0, 'beginner', '57,65', NULL, 'https://edutrainia.com/user/course_form/add_course', 1654488000, NULL, 'general', 1, 0, 'active', 'youtube', '', 'Test', 1, 1, 57, 1),
(82, 'Object Oriented Programming ', 'abc', '<p>abc</p>', '[\"You can understand how to structure website\"]', 'english', 51, 54, '[29]', '[\"Knowledge of  OOP\"]', 5000, NULL, 5000, 'beginner', '59', NULL, 'https://youtu.be/l1EssrLxt7E', 1654574400, NULL, 'general', NULL, 0, 'active', 'youtube', '', '', NULL, 0, 59, 1),
(83, 'Digital Marketing ', 'abc', '<p>abc</p>', '[\"You will able to build to do marketing \"]', 'english', 51, 55, '[30]', '[\"Basic Knowlege of Social Media\"]', 15000, NULL, 15000, 'beginner', '40', NULL, 'https://youtu.be/l1EssrLxt7E', 1654660800, 1654660800, 'general', 0, 0, 'active', 'youtube', '', 'abc', NULL, 0, 40, 1),
(84, 'Data Mining', 'abc', '<p>abc</p>', '[\"gfhfg\"]', 'english', 51, 54, '[31,33,46]', '[\"fdgr\"]', 1000, NULL, 0, 'beginner', '66', NULL, 'https://youtu.be/l1EssrLxt7E', 1654747200, 1656907200, 'general', 0, 0, 'active', 'youtube', '', '', NULL, 0, 66, 1),
(85, '.NET TEST', '.NET TEST', '<p>.NET TEST<br></p>', '[\"Test outcome\"]', 'arabic', 1, 25, '[28]', '[\"Test\"]', 0, NULL, 0, 'beginner', '65', NULL, 'https://edutrainia.com/user/course_form/add_course', 1654488000, NULL, 'general', 1, 0, 'active', 'youtube', '', 'Test', 1, 0, 57, 1),
(88, 'qwertyuiop', 'qwertyuiop', 'qwertyuiop', NULL, 'English', NULL, NULL, NULL, NULL, 1800, NULL, 1520, 'Beigener', NULL, NULL, 'www.youtube.com', NULL, NULL, NULL, 0, 1, NULL, NULL, 'qwertyuiop meta keywords', 'qwertyuiop meta', 1, 0, NULL, 1),
(89, 'Mer Course', '', '', '[]', 'english', 19, 22, '[36,37,38,39,40]', '[]', 0, NULL, 0, 'beginner', '76', NULL, '', 1657252800, 1658289600, 'general', 0, 0, 'active', '', '', '', NULL, 0, 76, 1),
(90, 'Graphic Designing', 'jnj', '<p> nn</p>', '[\"m \"]', 'arabic', 1, 25, '[]', '[\"jmn\"]', 7000, NULL, 0, 'beginner', '67,66', NULL, 'jmnhju', 1657252800, 1659153600, 'general', 0, 0, 'active', 'youtube', '', '', NULL, 1, 67, 1),
(91, 'check', 'check', '<p>check<br></p>', '[\"check\"]', 'arabic', 1, 24, '[51]', '[\"check\"]', 1500, NULL, 1200, 'beginner', '76', NULL, 'https://www.youtube.com/', 1657944000, NULL, 'general', NULL, 0, 'active', 'youtube', 'check', 'check', NULL, 0, 76, 2),
(92, 'test', NULL, NULL, '[]', 'english', 19, 21, '[]', '[]', 0, 0, 0, 'beginner', '66', NULL, NULL, 1658548800, NULL, 'general', 0, 0, 'pending', NULL, NULL, NULL, 1, 0, NULL, 1),
(93, 'Ydzuxf', 'Ufxufxuf', '<p>Xufxufxufxu</p>', '[\"Hf uf ur g\"]', 'arabic', 1, 24, '[]', '[\"U fu jggucu\"]', 0, NULL, 0, 'beginner', '81', NULL, '', 1658721600, NULL, 'general', NULL, 0, 'pending', '', '', '', 1, 0, 81, 1),
(94, 'programs 123 edit', 'programs', '<p>programs<br></p>', '[\"programs\"]', 'english', 1, 23, '[49]', '[\"programs\"]', 0, NULL, 0, 'advanced', '76,5,9', NULL, 'https://www.youtube.com/', 1658808000, 1658808000, 'general', 0, 0, 'active', 'youtube', 'programs', 'programs', 1, 1, 76, 2),
(95, 'testing consultant', 'testing consultant', '<p>testing consultant<br></p>', '[\"testing consultant\"]', 'english', 29, 30, '[]', '[\"testing consultant\"]', 25999, NULL, 22359, 'advanced', '76', NULL, 'https://www.youtube.com/', 1658808000, NULL, 'general', NULL, 0, 'active', 'youtube', 'testing consultant,english', 'testing consultant testing consultant testing consultant ', NULL, 0, 76, 2),
(96, 'Testing course  edit', 'Testing course', '<p>Testing course<br></p>', '[\"Testing course\"]', 'english', 19, 22, '[50]', '[\"Testing course\"]', 35950, NULL, 29500, 'intermediate', '76', NULL, 'https://www.youtube.com/', 1658808000, 1658808000, 'general', 0, 0, 'active', 'youtube', 'Testing course', 'Testing course', NULL, 0, 76, 1),
(97, 'example programs', 'example programs', '<p>example programs<br></p>', '[\"example programs\"]', 'english', 42, 43, '[]', '[\"example programs\"]', 29500, NULL, 26750, 'advanced', '76', NULL, 'https://www.youtube.com/', 1658808000, NULL, 'general', NULL, 0, 'active', 'youtube', 'example programs,programs', 'example programs', NULL, 0, 76, 2),
(98, 'sdasd', 'sdasd', '<p>asdasd</p>', '[\"dasd\"]', 'english', 1, 23, '[]', '[\"sdasd\"]', 1500, NULL, 1200, 'beginner', '76', NULL, 'https://www.youtube.com/', 1658808000, NULL, 'general', NULL, 0, 'active', 'youtube', '', 'sadasd', NULL, 0, 76, 2),
(100, 'asdsad', 'sdasd', '<p>asdasd</p>', '[\"asdasd\"]', 'english', 1, 24, '[]', '[\"asdasd\"]', 2500, NULL, 1500, 'beginner', '76', NULL, 'https://www.youtube.com/', 1658808000, NULL, 'general', NULL, 0, 'active', 'youtube', 'sdsd', 'sadsd', NULL, 0, 76, 1),
(101, 'English', 'dsf', '<p>feg</p>', '[\"dcswf\"]', 'english', 29, 30, '[52]', '[\"Basic Knowlege\"]', 1000, NULL, 0, 'beginner', '66', NULL, 'https://youtu.be/l1EssrLxt7E', 1659067200, 1659067200, 'general', 0, 0, 'pending', 'youtube', '', '', NULL, 0, 66, 1),
(102, 'some', NULL, NULL, '[]', 'arabic', 10, 10, '[]', '[]', 100, 1, 10, 'beginner', '66', NULL, NULL, 1659326400, NULL, 'general', 0, 0, 'pending', NULL, NULL, NULL, 0, 0, NULL, 1),
(103, 'fdfh', 'h', '<p>erh</p>', '[\"ger\"]', 'english', 1, 23, '[53]', '[\"rger\"]', 244, NULL, 0, 'beginner', '66', NULL, 'https://youtu.be/l1EssrLxt7E', 1659412800, 1659412800, 'general', 0, 0, 'pending', 'youtube', '', 'f', NULL, 0, 66, 1),
(104, 'ggg', NULL, NULL, '[]', 'english', 1, 24, '[]', '[]', 0, 0, 0, 'advanced', '59', NULL, NULL, 1659412800, NULL, 'general', 0, 0, 'pending', NULL, NULL, NULL, 1, 0, NULL, 1),
(105, 'Business CoDevelopment', 'abc', '<p>saf</p>', '[\"You can understand finance \"]', 'english', 51, 55, '[]', '[\"Basic Knowlege\"]', 12000, NULL, 0, 'beginner', '66', NULL, 'https://youtu.be/l1EssrLxt7E', 1659758400, 1659758400, 'general', 0, 0, 'active', 'youtube', '', '', NULL, 0, 66, 2),
(106, 'Human Resources', 'dsgew', '<p>esfd</p>', '[\"fdgfdd\"]', 'english', 29, 30, '[]', '[\"Basic Knowlege\"]', 2333, NULL, 0, 'advanced', '67,59', NULL, 'https://youtu.be/l1EssrLxt7E', 1659758400, 1659758400, 'general', 0, 0, 'active', 'youtube', '', '', NULL, 1, 67, 1),
(107, 'Accounts', 'EFEQ', '<p>GRWE</p>', '[]', 'arabic', 42, 44, '[]', '[\"Basic Knowlege\"]', 0, NULL, 0, 'beginner', '67', NULL, '', 1659758400, 1659758400, 'general', 0, 0, 'pending', '', '', '', NULL, 0, 67, 2),
(108, 'Saepe harum earum ut', 'Doloremque eos eu nu', '', '[]', 'sindhi', 19, 22, '[]', '[\"Officiis quam iure d\"]', 0, NULL, 0, 'advanced', '59', NULL, '', 1660449600, NULL, 'general', 1, 0, 'active', '', '', '', NULL, 0, 59, 2),
(109, 'Iure repudiandae qua3533', 'Commodi dolore elige', '', '[]', 'sindhi', 32, 33, '[]', '[]', 0, NULL, 0, 'advanced', '82', NULL, '', 1660449600, NULL, 'general', 1, 0, 'active', '', '', '', NULL, 0, 82, 2),
(110, 'Org Course ', 'ds', '<p>ef</p>', '[\"twry\"]', 'english', 1, 24, '[]', '[\"rtrw\"]', 3000, NULL, 0, 'beginner', '105', NULL, 'https://youtu.be/l1EssrLxt7E', 1660708800, 1660708800, 'general', 0, 0, 'active', 'youtube', '', '', NULL, 0, 105, 1);

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `symbol` varchar(255) DEFAULT NULL,
  `paypal_supported` int(11) DEFAULT NULL,
  `stripe_supported` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `name`, `code`, `symbol`, `paypal_supported`, `stripe_supported`) VALUES
(1, 'Leke', 'ALL', 'Lek', 0, 1),
(2, 'Dollars', 'USD', '$', 1, 1),
(3, 'Afghanis', 'AFN', '؋', 0, 1),
(4, 'Pesos', 'ARS', '$', 0, 1),
(5, 'Guilders', 'AWG', 'ƒ', 0, 1),
(6, 'Dollars', 'AUD', '$', 1, 1),
(7, 'New Manats', 'AZN', 'ман', 0, 1),
(8, 'Dollars', 'BSD', '$', 0, 1),
(9, 'Dollars', 'BBD', '$', 0, 1),
(10, 'Rubles', 'BYR', 'p.', 0, 0),
(11, 'Euro', 'EUR', '€', 1, 1),
(12, 'Dollars', 'BZD', 'BZ$', 0, 1),
(13, 'Dollars', 'BMD', '$', 0, 1),
(14, 'Bolivianos', 'BOB', '$b', 0, 1),
(15, 'Convertible Marka', 'BAM', 'KM', 0, 1),
(16, 'Pula', 'BWP', 'P', 0, 1),
(17, 'Leva', 'BGN', 'лв', 0, 1),
(18, 'Reais', 'BRL', 'R$', 1, 1),
(19, 'Pounds', 'GBP', '£', 1, 1),
(20, 'Dollars', 'BND', '$', 0, 1),
(21, 'Riels', 'KHR', '៛', 0, 1),
(22, 'Dollars', 'CAD', '$', 1, 1),
(23, 'Dollars', 'KYD', '$', 0, 1),
(24, 'Pesos', 'CLP', '$', 0, 1),
(25, 'Yuan Renminbi', 'CNY', '¥', 0, 1),
(26, 'Pesos', 'COP', '$', 0, 1),
(27, 'Colón', 'CRC', '₡', 0, 1),
(28, 'Kuna', 'HRK', 'kn', 0, 1),
(29, 'Pesos', 'CUP', '₱', 0, 0),
(30, 'Koruny', 'CZK', 'Kč', 1, 1),
(31, 'Kroner', 'DKK', 'kr', 1, 1),
(32, 'Pesos', 'DOP ', 'RD$', 0, 1),
(33, 'Dollars', 'XCD', '$', 0, 1),
(34, 'Pounds', 'EGP', '£', 0, 1),
(35, 'Colones', 'SVC', '$', 0, 0),
(36, 'Pounds', 'FKP', '£', 0, 1),
(37, 'Dollars', 'FJD', '$', 0, 1),
(38, 'Cedis', 'GHC', '¢', 0, 0),
(39, 'Pounds', 'GIP', '£', 0, 1),
(40, 'Quetzales', 'GTQ', 'Q', 0, 1),
(41, 'Pounds', 'GGP', '£', 0, 0),
(42, 'Dollars', 'GYD', '$', 0, 1),
(43, 'Lempiras', 'HNL', 'L', 0, 1),
(44, 'Dollars', 'HKD', '$', 1, 1),
(45, 'Forint', 'HUF', 'Ft', 1, 1),
(46, 'Kronur', 'ISK', 'kr', 0, 1),
(47, 'Rupees', 'INR', 'Rp', 1, 1),
(48, 'Rupiahs', 'IDR', 'Rp', 0, 1),
(49, 'Rials', 'IRR', '﷼', 0, 0),
(50, 'Pounds', 'IMP', '£', 0, 0),
(51, 'New Shekels', 'ILS', '₪', 1, 1),
(52, 'Dollars', 'JMD', 'J$', 0, 1),
(53, 'Yen', 'JPY', '¥', 1, 1),
(54, 'Pounds', 'JEP', '£', 0, 0),
(55, 'Tenge', 'KZT', 'лв', 0, 1),
(56, 'Won', 'KPW', '₩', 0, 0),
(57, 'Won', 'KRW', '₩', 0, 1),
(58, 'Soms', 'KGS', 'лв', 0, 1),
(59, 'Kips', 'LAK', '₭', 0, 1),
(60, 'Lati', 'LVL', 'Ls', 0, 0),
(61, 'Pounds', 'LBP', '£', 0, 1),
(62, 'Dollars', 'LRD', '$', 0, 1),
(63, 'Switzerland Francs', 'CHF', 'CHF', 1, 1),
(64, 'Litai', 'LTL', 'Lt', 0, 0),
(65, 'Denars', 'MKD', 'ден', 0, 1),
(66, 'Ringgits', 'MYR', 'RM', 1, 1),
(67, 'Rupees', 'MUR', '₨', 0, 1),
(68, 'Pesos', 'MXN', '$', 1, 1),
(69, 'Tugriks', 'MNT', '₮', 0, 1),
(70, 'Meticais', 'MZN', 'MT', 0, 1),
(71, 'Dollars', 'NAD', '$', 0, 1),
(72, 'Rupees', 'NPR', '₨', 0, 1),
(73, 'Guilders', 'ANG', 'ƒ', 0, 1),
(74, 'Dollars', 'NZD', '$', 1, 1),
(75, 'Cordobas', 'NIO', 'C$', 0, 1),
(76, 'Nairas', 'NGN', '₦', 0, 1),
(77, 'Krone', 'NOK', 'kr', 1, 1),
(78, 'Rials', 'OMR', '﷼', 0, 0),
(79, 'Rupees', 'PKR', '₨', 0, 1),
(80, 'Balboa', 'PAB', 'B/.', 0, 1),
(81, 'Guarani', 'PYG', 'Gs', 0, 1),
(82, 'Nuevos Soles', 'PEN', 'S/.', 0, 1),
(83, 'Pesos', 'PHP', 'Php', 1, 1),
(84, 'Zlotych', 'PLN', 'zł', 1, 1),
(85, 'Rials', 'QAR', '﷼', 0, 1),
(86, 'New Lei', 'RON', 'lei', 0, 1),
(87, 'Rubles', 'RUB', 'руб', 1, 1),
(88, 'Pounds', 'SHP', '£', 0, 1),
(89, 'Riyals', 'SAR', '﷼', 0, 1),
(90, 'Dinars', 'RSD', 'Дин.', 0, 1),
(91, 'Rupees', 'SCR', '₨', 0, 1),
(92, 'Dollars', 'SGD', '$', 1, 1),
(93, 'Dollars', 'SBD', '$', 0, 1),
(94, 'Shillings', 'SOS', 'S', 0, 1),
(95, 'Rand', 'ZAR', 'R', 0, 1),
(96, 'Rupees', 'LKR', '₨', 0, 1),
(97, 'Kronor', 'SEK', 'kr', 1, 1),
(98, 'Dollars', 'SRD', '$', 0, 1),
(99, 'Pounds', 'SYP', '£', 0, 0),
(100, 'New Dollars', 'TWD', 'NT$', 1, 1),
(101, 'Baht', 'THB', '฿', 1, 1),
(102, 'Dollars', 'TTD', 'TT$', 0, 1),
(103, 'Lira', 'TRY', 'TL', 0, 1),
(104, 'Liras', 'TRL', '£', 0, 0),
(105, 'Dollars', 'TVD', '$', 0, 0),
(106, 'Hryvnia', 'UAH', '₴', 0, 1),
(107, 'Pesos', 'UYU', '$U', 0, 1),
(108, 'Sums', 'UZS', 'лв', 0, 1),
(109, 'Bolivares Fuertes', 'VEF', 'Bs', 0, 0),
(110, 'Dong', 'VND', '₫', 0, 1),
(111, 'Rials', 'YER', '﷼', 0, 1),
(112, 'Zimbabwe Dollars', 'ZWD', 'Z$', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `enrol`
--

CREATE TABLE `enrol` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  `programs_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `enrol`
--

INSERT INTO `enrol` (`id`, `user_id`, `course_id`, `date_added`, `last_modified`, `programs_id`) VALUES
(1, 9, 29, 1649995200, NULL, NULL),
(2, 24, 13, 1650340800, NULL, NULL),
(3, 22, 15, 1650340800, NULL, NULL),
(5, 22, 45, 1650600000, NULL, NULL),
(6, 22, 72, 1650600000, NULL, NULL),
(7, 8, 5, 1650686400, NULL, NULL),
(9, 29, 76, 1650945600, NULL, NULL),
(10, 29, 27, 1650945600, NULL, NULL),
(11, 53, 79, 1653537600, NULL, NULL),
(12, 58, 76, 1653537600, NULL, NULL),
(13, 62, 79, 1654142400, NULL, NULL),
(14, 58, 81, 1654488000, NULL, NULL),
(15, 29, 83, 1654660800, NULL, NULL),
(16, 29, 84, 1654747200, NULL, NULL),
(17, 68, 81, 1655265600, NULL, NULL),
(18, 68, 86, 1655265600, NULL, NULL),
(19, 79, 85, 1656561600, NULL, NULL),
(20, 79, 81, 1656561600, NULL, NULL),
(21, 79, 79, 1656561600, NULL, NULL),
(22, 9, 79, 1656648000, NULL, NULL),
(23, 66, 16, 1656993600, NULL, NULL),
(24, 81, 62, 1656993600, NULL, NULL),
(25, 76, 89, 1657857600, NULL, NULL),
(26, 76, 11, 1657857600, NULL, NULL),
(27, 76, 83, 1657857600, NULL, NULL),
(28, 93, 84, 1658289600, NULL, NULL),
(29, 76, 81, 1658462400, NULL, NULL),
(30, 29, 82, 1659326400, NULL, NULL),
(31, 29, 32, 1660104000, NULL, NULL),
(32, 104, 5, 1660190400, NULL, NULL),
(33, 67, 5, 1660363200, NULL, NULL),
(34, 29, 97, 1660708800, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `frontend_settings`
--

CREATE TABLE `frontend_settings` (
  `id` int(11) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `frontend_settings`
--

INSERT INTO `frontend_settings` (`id`, `key`, `value`) VALUES
(1, 'banner_title', 'Learn from the best teachers around the world'),
(2, 'banner_sub_title', 'Study your favourite topics and subjects quickly with your timings.'),
(4, 'about_us', NULL),
(10, 'terms_and_condition', ''),
(11, 'privacy_policy', ''),
(13, 'theme', 'default'),
(14, 'cookie_note', ''),
(15, 'cookie_status', NULL),
(16, 'cookie_policy', ''),
(17, 'banner_image', '0642c3a9c097061904b3d497117a6369.jpg'),
(18, 'light_logo', 'cfe9cb332d89b5475d36d54836684fd2.png'),
(19, 'dark_logo', 'cb241cbf9205986733dcbf4abee34799.png'),
(20, 'small_logo', '6ee0208730157b0b4d5d44705f954895.png'),
(21, 'favicon', '74afde74d35d427c0ba2399670e1cfb1.png'),
(22, 'recaptcha_status', '0'),
(23, 'recaptcha_secretkey', 'Valid-secret-key'),
(24, 'recaptcha_sitekey', 'Valid-site-key'),
(25, 'refund_policy', ''),
(26, 'facebook', ''),
(27, 'twitter', ''),
(28, 'linkedin', ''),
(29, 'mid_sub_title', 'Choose from 183,000 online video courses with new additions published every month'),
(30, 'mid_title', 'A broad selection of courses');

-- --------------------------------------------------------

--
-- Table structure for table `jitsi_live_class`
--

CREATE TABLE `jitsi_live_class` (
  `id` int(11) UNSIGNED NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `time` varchar(100) DEFAULT NULL,
  `jitsi_meeting_id` varchar(255) DEFAULT NULL,
  `jitsi_meeting_password` varchar(255) DEFAULT NULL,
  `note_to_students` longtext DEFAULT NULL,
  `class_topic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jitsi_live_class`
--

INSERT INTO `jitsi_live_class` (`id`, `course_id`, `date`, `time`, `jitsi_meeting_id`, `jitsi_meeting_password`, `note_to_students`, `class_topic`) VALUES
(1, 62, '1644987600', '1645056000', 'FsqjaLc8y5XTzbmUQxfBCJkVKRudG0erp34oiSY2AgDMnNOIE7Edutrainia', 'fdvfdvfdvfdv', 'fvfdvfdvfdvfdv', 'Photoshop'),
(2, 66, '1649995200', '1650063600', NULL, 'Minibig Technologies is inviting you to a meeting.  Join the meeting: https://meet.jit.si/RearRepliesBendUpwards  To join by phone instead, tap this: +1.512.647.1431,,3632760578#  Looking for a different dial-in number? See meeting dial-in numbers: https:', 'Jon Class on Time ', 'Live class'),
(3, 67, '1650081600', '1650150000', NULL, 'https://meet.jit.si/RearRepliesBendUpwards', 'abc ', 'Live class'),
(4, 68, '1650340800', '1650409200', NULL, 'https://meet.jit.si/RearRepliesBendUpwards', 'abc ', 'Live class'),
(5, 69, '1650340800', '1650409200', NULL, 'https://meet.jit.si/RearRepliesBendUpwards', 'abc ', 'Live class'),
(6, 71, '1650513600', '1650582000', NULL, '1111111111112', '', 'Live class'),
(7, 73, '1650513600', '1650582000', NULL, 'bhgjyj', '55', 'Live class'),
(8, 76, '1651291200', '1659823200', NULL, 'https://meet.jit.si/RearRepliesBendUpwards', 'abc', 'Live class'),
(9, 83, '1654660800', '1654729200', NULL, 'https://meet.jit.si/RearRepliesBendUpwards', 'BVC', 'Live class'),
(10, 84, '1654747200', '1656975600', NULL, 'https://meet.jit.si/RearRepliesBendUpwards', 's', 'Live class'),
(11, 86, '1655265600', '1655334000', NULL, '', '', 'Live class'),
(12, 87, '1655524800', '1655593200', NULL, '', '', 'Live class'),
(13, 89, '1657252800', '1657926000', NULL, '', '', 'Live class'),
(14, 90, '1657252800', '1657321200', NULL, '', '', 'Live class'),
(15, 7, '1657857600', '1657926000', NULL, '', '', 'Live class'),
(16, 5, '1659672000', '1659740400', NULL, '', '', 'Live class');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `phrase_id` int(11) NOT NULL,
  `phrase` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `english` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `programs_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `video_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  `lesson_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attachment` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `attachment_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `summary` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_free` int(11) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `video_type_for_mobile_application` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_url_for_mobile_application` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `duration_for_mobile_application` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`id`, `title`, `duration`, `course_id`, `programs_id`, `section_id`, `video_type`, `video_url`, `date_added`, `last_modified`, `lesson_type`, `attachment`, `attachment_type`, `summary`, `is_free`, `order`, `video_type_for_mobile_application`, `video_url_for_mobile_application`, `duration_for_mobile_application`) VALUES
(1, 'dfdsfdfdsfsdf', NULL, 62, NULL, 7, NULL, NULL, 1644987600, NULL, 'other', '4f7f6a4eaa851d1072ef2218193c7de4.jpeg', 'img', 'vdsdvdsvdsvdsv', 0, 0, NULL, NULL, NULL),
(2, 'abc testing test', '00:00:00', 5, NULL, 8, NULL, NULL, 1649736000, 1656561600, 'quiz', NULL, NULL, 'abc testing test', 0, 0, NULL, NULL, NULL),
(3, 'Introduction ', NULL, 66, NULL, 9, NULL, NULL, 1649995200, NULL, 'other', 'e2ca8d96febd7e37c76dfc15c3e481eb.docx', 'doc', '', 0, 0, NULL, NULL, NULL),
(4, 'Quiz 1 ', '00:00:00', 66, NULL, 9, NULL, NULL, 1649995200, NULL, 'quiz', NULL, NULL, 'Review your lectures ', 0, 0, NULL, NULL, NULL),
(7, 'Introduction', NULL, 67, NULL, 13, NULL, NULL, 1650081600, NULL, 'other', 'db9c7646df0ed3b1d99380ddd8b368c5.docx', 'doc', 'abc ', 0, 0, NULL, NULL, NULL),
(8, 'Introduction', NULL, 68, NULL, 14, NULL, NULL, 1650340800, NULL, 'other', '062d3aef017e64a42adb27d5ed600799.docx', 'txt', 'abc ', 0, 0, NULL, NULL, NULL),
(9, 'Quiz 1', '00:00:00', 68, NULL, 14, NULL, NULL, 1650340800, NULL, 'quiz', NULL, NULL, 'Go through your lesson no 1', 0, 0, NULL, NULL, NULL),
(10, 'Introduction ', NULL, 69, NULL, 16, NULL, NULL, 1650340800, NULL, 'other', 'df2da2bb7efc044b55b3b80b3776847f.docx', 'txt', 'abc', 0, 0, NULL, NULL, NULL),
(11, 'Quiz 1', '00:00:00', 69, NULL, 16, NULL, NULL, 1650340800, NULL, 'quiz', NULL, NULL, 'Go through your lesson 1', 0, 0, NULL, NULL, NULL),
(12, 'Intro', NULL, 71, NULL, 18, NULL, NULL, 1650513600, NULL, 'other', 'e225290ed2e0f8306efe2638bdd54636.docx', 'txt', 'abc', 0, 0, NULL, NULL, NULL),
(13, 'Introduction ', NULL, 72, NULL, 19, NULL, NULL, 1650513600, NULL, 'other', 'd48ae7fa8ebd4adcd68616055fdb5b3b.docx', 'txt', 'abc', 0, 0, NULL, NULL, NULL),
(14, 'Quiz 1 ', '00:00:00', 72, NULL, 19, NULL, NULL, 1650513600, NULL, 'quiz', NULL, NULL, 'abc', 0, 0, NULL, NULL, NULL),
(15, 'Intro', NULL, 73, NULL, 20, NULL, NULL, 1650513600, NULL, 'text', '&lt;p&gt;abc&lt;/p&gt;', 'description', 'ab', 0, 0, NULL, NULL, NULL),
(18, 'Hoe to create UI', '00:00:21', 76, NULL, 24, 'system', 'https://edutrainia.com/uploads/lesson_files/videos/f0d111904a955aaccc3e21135cdbf440.mp4', 1651032000, NULL, 'video', NULL, 'file', 'we describe how to build UI of app ', 0, 0, 'html5', 'https://edutrainia.com/uploads/lesson_files/videos/f0d111904a955aaccc3e21135cdbf440.mp4', '00:00:21'),
(19, 'How build apk', '', 76, NULL, 25, '', '', 1651032000, 1653969600, 'other', '7fd5145b2d2ed17afeadf0e0a2ce6e5c.pdf', 'pdf', 'abc', 0, 0, '', '', ''),
(20, 'Quiz 2 ', '00:00:00', 76, NULL, 24, NULL, NULL, 1652068800, NULL, 'quiz', NULL, NULL, 'Attempt quiz to complete your course', 0, 0, NULL, NULL, NULL),
(21, 'dfbgd', '00:00:00', 79, NULL, 26, NULL, 'https://www.youtube.com/watch?v=yGbojkyu814', 1653537600, NULL, 'video', NULL, 'url', 'sd', 1, 0, 'html5', 'https://www.youtube.com/watch?v=yGbojkyu814', '03:20:00'),
(22, 'xcvs', NULL, 79, NULL, 26, NULL, NULL, 1653537600, NULL, 'other', '7437dd81c607c0e4e6f9fe52e7c3139a.jpg', 'img', 'fvbf', 1, 0, NULL, NULL, NULL),
(23, 'test', NULL, 79, NULL, 26, NULL, NULL, 1653537600, NULL, 'other', '9ff6f106b5ea99b6ca60bd5445683b86.pdf', 'pdf', 'sdfged', 1, 0, NULL, NULL, NULL),
(24, 'abc', NULL, 76, NULL, 24, NULL, NULL, 1653969600, NULL, 'other', '38ae403d43b30b1fba1ae213a04cca5b.pdf', 'pdf', 'abc', 1, 0, NULL, NULL, NULL),
(25, 'Test', NULL, 81, NULL, 28, NULL, NULL, 1654488000, NULL, 'other', '4f7f922e31a4eb37d5bf2e81a8f8cb10.pdf', 'pdf', 'Test', 1, 0, NULL, NULL, NULL),
(26, '1st', '00:10:00', 81, NULL, 28, NULL, NULL, 1654488000, NULL, 'quiz', NULL, NULL, 'Test instruction', 0, 0, NULL, NULL, NULL),
(27, 'Video 1', '05:00:00', 82, NULL, 29, NULL, 'https://youtu.be/fis26HvvDII', 1654574400, NULL, 'video', NULL, 'url', '', 0, 0, 'html5', 'https://youtu.be/fis26HvvDII', '00:05:00'),
(28, 'Q1', '00:00:00', 82, NULL, 29, NULL, NULL, 1654574400, 1654574400, 'quiz', NULL, NULL, 'sd', 0, 0, NULL, NULL, NULL),
(29, 'Course Introduction', NULL, 83, NULL, 30, NULL, NULL, 1654660800, NULL, 'other', 'c2aad6edc628c90cce57adeb38a7bc75.pdf', 'pdf', 'avfd', 0, 0, NULL, NULL, NULL),
(30, 'Class 2 ', NULL, 83, NULL, 30, NULL, NULL, 1654660800, NULL, 'other', '08e3e0f3debe2c1ef23995e72ab5e19d.jpg', 'img', 'as b', 0, 0, NULL, NULL, NULL),
(31, 'Quiz 1 ', '00:00:00', 83, NULL, 30, NULL, NULL, 1654660800, NULL, 'quiz', NULL, NULL, 'abc ', 0, 0, NULL, NULL, NULL),
(32, 'Class 1', NULL, 84, NULL, 31, NULL, NULL, 1654747200, NULL, 'other', '57579e2e5d3406e721d66da2a43c9edd.jpg', 'img', 'saa', 0, 0, NULL, NULL, NULL),
(33, 'quiz 1', '00:00:00', 84, NULL, 31, NULL, NULL, 1654747200, 1655438400, 'quiz', NULL, NULL, 'dsfd', 0, 0, NULL, NULL, NULL),
(38, 'Class 2', NULL, 84, NULL, 33, NULL, NULL, 1655438400, NULL, 'other', '68cfe3706d8d1fdf451701d390976c0b.docx', 'pdf', 'hj', 0, 0, NULL, NULL, NULL),
(41, 'Quiz 2', '00:00:00', 84, NULL, 33, NULL, NULL, 1655438400, NULL, 'quiz', NULL, NULL, 'vcb', 0, 0, NULL, NULL, NULL),
(43, 'Quiz 3', '00:00:00', 84, NULL, 33, NULL, NULL, 1656561600, NULL, 'quiz', NULL, NULL, 'this quiz 3', 0, 0, NULL, NULL, NULL),
(44, 'MERN Stack Front To Back: Full Stack React, Redux &amp; Node.js', '00:00:00', 89, NULL, 36, NULL, NULL, 1657252800, 1657252800, 'quiz', NULL, NULL, 'MERN Stack Front To Back: Full Stack React, Redux &amp; Node.js\r\n', 0, 0, NULL, NULL, NULL),
(45, 'What is mern?', '00:00:00', 89, NULL, 36, NULL, NULL, 1657857600, NULL, 'quiz', NULL, NULL, 'What is mern?', 0, 0, NULL, NULL, NULL),
(46, 'qwe', '00:00:00', 89, NULL, 37, NULL, NULL, 1657857600, NULL, 'quiz', NULL, NULL, 'ss', 0, 0, NULL, NULL, NULL),
(47, 'sdsdsd', '00:00:00', 89, NULL, 36, NULL, NULL, 1657857600, NULL, 'quiz', NULL, NULL, 'sdsd', 0, 0, NULL, NULL, NULL),
(48, 'check lesson', NULL, 96, NULL, 50, NULL, NULL, 1658808000, NULL, 'text', '&lt;p&gt;check lesson&lt;br&gt;&lt;/p&gt;', 'description', 'check lesson', 0, 0, NULL, NULL, NULL),
(49, 'Class 1', NULL, 101, NULL, 52, NULL, NULL, 1659067200, NULL, 'other', 'fbd1928b62c1537738ed4421d25d4d0a.docx', 'doc', ' fhm', 0, 0, NULL, NULL, NULL),
(50, 'Lesson 1 Quiz ', '00:00:00', 101, NULL, 52, NULL, NULL, 1659067200, NULL, 'quiz', NULL, NULL, 'dwegt', 0, 0, NULL, NULL, NULL),
(52, 'Test Document', NULL, 76, NULL, 24, NULL, NULL, 1660104000, NULL, 'other', 'c2cb234a26a604164cb432088ebc1b1d.docx', 'doc', 'asdasdasd', 0, 0, NULL, NULL, NULL),
(53, 'Second Quiz', '00:00:00', 5, NULL, 8, NULL, NULL, 1660536000, NULL, 'quiz', NULL, NULL, 'THis is second Quiz\r\n', 0, 0, NULL, NULL, NULL),
(54, 'What is Your name', '00:00:00', 76, NULL, 24, NULL, NULL, 1660536000, NULL, 'quiz', NULL, NULL, '', 0, 0, NULL, NULL, NULL),
(55, '123', '00:00:00', 5, NULL, 8, NULL, NULL, 1660708800, NULL, 'quiz', NULL, NULL, '123', 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `live_class`
--

CREATE TABLE `live_class` (
  `id` int(11) UNSIGNED NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `zoom_meeting_id` varchar(255) DEFAULT NULL,
  `zoom_meeting_password` varchar(255) DEFAULT NULL,
  `zoom_meeting_join_link` text DEFAULT NULL,
  `note_to_students` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `live_class`
--

INSERT INTO `live_class` (`id`, `course_id`, `date`, `time`, `zoom_meeting_id`, `zoom_meeting_password`, `zoom_meeting_join_link`, `note_to_students`) VALUES
(1, 62, 1644987600, 1645056000, 'fgfdgvfdvfd', 'fdvfdvfdv', 'https://us04web.zoom.us/j/73113044729?pwd=o5iyaSwFhtG7CDj57UOLPgR_4_A0cc.1', 'dfvsdsdfvdvfdv'),
(2, 66, 1649995200, 1650063600, '83750641014', 'Jndy5a', 'https://us04web.zoom.us/j/73113044729?pwd=o5iyaSwFhtG7CDj57UOLPgR_4_A0cc.1', 'Join Class on time '),
(3, 67, 1650081600, 1650150000, '83750641014', 'Jndy5a', 'https://us04web.zoom.us/j/73113044729?pwd=o5iyaSwFhtG7CDj57UOLPgR_4_A0cc.1', 'abc '),
(4, 68, 1650340800, 1650409200, '83750641014', 'Jndy5a', 'https://us04web.zoom.us/j/73113044729?pwd=o5iyaSwFhtG7CDj57UOLPgR_4_A0cc.1', 'abc '),
(5, 69, 1650340800, 1650409200, '83750641014', 'Jndy5a', 'https://us04web.zoom.us/j/73113044729?pwd=o5iyaSwFhtG7CDj57UOLPgR_4_A0cc.1', 'Be on time '),
(6, 71, 1650513600, 1650582000, '123345667', 'fffttrrrrr', 'https://us04web.zoom.us/j/73113044729?pwd=o5iyaSwFhtG7CDj57UOLPgR_4_A0cc.1', ''),
(7, 73, 1650513600, 1650582000, '56565', 'ffghguj', 'https://us04web.zoom.us/j/73113044729?pwd=o5iyaSwFhtG7CDj57UOLPgR_4_A0cc.1', ''),
(8, 76, 1651204800, 1659819600, '73113044729', '70hB2D', 'https://us04web.zoom.us/j/73113044729?pwd=o5iyaSwFhtG7CDj57UOLPgR_4_A0cc.1', 'abc'),
(9, 83, 1654660800, 1654729200, '83750641014', 'W17Dhs', 'https://us04web.zoom.us/j/73113044729?pwd=o5iyaSwFhtG7CDj57UOLPgR_4_A0cc.1', 'DV'),
(10, 84, 1656907200, 1656946800, '2835381111', '123', 'https://us04web.zoom.us/j/73113044729?pwd=o5iyaSwFhtG7CDj57UOLPgR_4_A0cc.1', 'abc'),
(11, 87, 1655524800, 1655593200, '455443', '35345435', 'https://us04web.zoom.us/j/73113044729?pwd=o5iyaSwFhtG7CDj57UOLPgR_4_A0cc.1', 'wfdsvfdvfd');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `from` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `message_thread_code` longtext CHARACTER SET latin1 DEFAULT NULL,
  `message` longtext CHARACTER SET latin1 DEFAULT NULL,
  `sender` longtext CHARACTER SET latin1 DEFAULT NULL,
  `timestamp` longtext CHARACTER SET latin1 DEFAULT NULL,
  `read_status` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `message_thread_code`, `message`, `sender`, `timestamp`, `read_status`) VALUES
(1, 'ac871f394b98348', 'CDcdscdsc', '5', '1645072747', 1),
(2, '02486782314935b', 'abc', '1', '1650520747', NULL),
(3, '86dfec657664f33', 'abc', '22', '1650606698', 1),
(4, '51938d0a48f2306', 'abc', '1', '1650606724', NULL),
(5, '51938d0a48f2306', 'abc', '1', '1650696361', NULL),
(6, '59609c74999b6e8', 'abc', '1', '1650696408', NULL),
(7, 'b5fdb4e2122baf7', 'abc', '28', '1650967916', 1),
(8, '3504d8309620793', 'abc ', '28', '1650968012', NULL),
(9, '13a262e3d4ed10b', 'abc ', '28', '1650968119', NULL),
(10, '7198ea384bab4f8', 'abc', '29', '1650972682', NULL),
(11, '7198ea384bab4f8', 'test\r\n', '29', '1654863991', NULL),
(12, '40f692b228d222d', 'avb', '29', '1654864053', NULL),
(13, '40f692b228d222d', 'test&#039;\r\n', '66', '1654864073', NULL),
(14, 'c08587121e5aea5', 'mkj', '59', '1654864395', NULL),
(15, '174a3e48aac0798', 'xyz', '68', '1655370976', 1),
(16, 'eba8d82a061150c', 'qwertyuiop', '76', '1656928924', NULL),
(17, 'eba8d82a061150c', 'qwertyuiop', '76', '1656928945', NULL),
(18, 'eba8d82a061150c', 'qwertyuiop', '76', '1656936043', NULL),
(19, 'eba8d82a061150c', 'Helllo', '76', '1656936054', NULL),
(20, 'f847196841f4d7c', NULL, NULL, '1656936743', NULL),
(21, 'eba8d82a061150c', 'Hello api test ', '81', '1656936845', NULL),
(22, 'cdac5ed3700879e', 'fdsgvbfdb', '66', '1660150139', NULL),
(23, '1ffa80d917d3af7', 'testing', '29', '1660429125', NULL),
(24, '1ffa80d917d3af7', 'adasdasdasdasdasdasdasdasdas', '29', '1660431375', NULL),
(25, '2c19edcfd4ea035', 'testingggg', '29', '1660519431', NULL),
(26, '2c19edcfd4ea035', 'hmbg,jhgbkj', '29', '1660578859', NULL),
(27, '2c19edcfd4ea035', 'mfgjfgvj', '29', '1660578872', NULL),
(28, '40f692b228d222d', 'asdasdasd', '29', '1660599071', NULL),
(29, '4129d1e0bee72c6', 'test', '104', '1660646888', NULL),
(30, '40f692b228d222d', 'testing sss', '29', '1660679752', NULL),
(31, 'c11337a69016915', 'hello', '81', '1660734323', NULL),
(32, '1ffa80d917d3af7', '', '29', '1660747123', NULL),
(33, 'd0b9a86d100b4a8', 'Some', '29', '1660752735', NULL),
(34, 'd0b9a86d100b4a8', 'Dome', '29', '1660752746', NULL),
(35, 'd0b9a86d100b4a8', 'Some', '29', '1660752839', NULL),
(36, 'd0b9a86d100b4a8', 'F', '29', '1660757499', NULL),
(37, 'd0b9a86d100b4a8', 'S', '29', '1660757505', NULL),
(38, 'd0b9a86d100b4a8', 'Send', '29', '1660762553', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `message_thread`
--

CREATE TABLE `message_thread` (
  `message_thread_id` int(11) NOT NULL,
  `message_thread_code` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `sender` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `receiver` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `last_message_timestamp` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `message_thread`
--

INSERT INTO `message_thread` (`message_thread_id`, `message_thread_code`, `sender`, `receiver`, `last_message_timestamp`) VALUES
(1, 'ac871f394b98348', '5', '1', NULL),
(2, '02486782314935b', '1', '13', NULL),
(3, '86dfec657664f33', '22', '1', NULL),
(4, '51938d0a48f2306', '1', '12', NULL),
(5, '59609c74999b6e8', '1', '2', NULL),
(6, 'b5fdb4e2122baf7', '28', '1', NULL),
(7, '3504d8309620793', '28', '5', NULL),
(8, '13a262e3d4ed10b', '28', '13', NULL),
(9, '7198ea384bab4f8', '29', '13', NULL),
(10, '40f692b228d222d', '29', '66', NULL),
(11, 'c08587121e5aea5', '59', '66', NULL),
(12, '174a3e48aac0798', '68', '1', NULL),
(13, 'eba8d82a061150c', '76', '81', NULL),
(14, 'f847196841f4d7c', NULL, NULL, NULL),
(15, 'cdac5ed3700879e', '66', '67', NULL),
(16, '1ffa80d917d3af7', '29', '1', NULL),
(17, '2c19edcfd4ea035', '29', '40', NULL),
(18, '4129d1e0bee72c6', '104', '5', NULL),
(19, 'c11337a69016915', '81', '15', NULL),
(20, 'd0b9a86d100b4a8', '29', '15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `noticeboard`
--

CREATE TABLE `noticeboard` (
  `id` int(11) UNSIGNED NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `programs_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `date_added` varchar(255) DEFAULT NULL,
  `date_updated` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `noticeboard`
--

INSERT INTO `noticeboard` (`id`, `course_id`, `programs_id`, `title`, `description`, `status`, `date_added`, `date_updated`) VALUES
(1, 67, NULL, 'Web Development ', '&lt;p&gt;abc &lt;/p&gt;', 1, '1650088512', NULL),
(2, 68, NULL, 'Web Development ', '&lt;p&gt;abc&lt;/p&gt;', 1, '1650352687', NULL),
(3, 69, NULL, 'Web Development ', '&lt;p&gt;abc&lt;/p&gt;', 1, '1650367954', NULL),
(4, 76, NULL, 'Application Development', '&lt;p&gt;abc&lt;/p&gt;', 1, '1650966517', NULL),
(5, 84, NULL, 'Data Mining ', '&lt;p&gt;gfd&lt;/p&gt;', 1, '1654777516', NULL),
(6, 87, NULL, '54654654654', '&lt;p&gt;sfgfsgfgfdgfdgfd&lt;/p&gt;', 1, '1655557382', NULL),
(7, 0, 1, 'Web Development ', '&lt;p&gt;abc &lt;/p&gt;', 1, '1650088512', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `offline_payment`
--

CREATE TABLE `offline_payment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `document_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `timestamp` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offline_payment`
--

INSERT INTO `offline_payment` (`id`, `user_id`, `amount`, `course_id`, `document_image`, `timestamp`, `status`) VALUES
(1, 9, '17800', '[\"29\"]', '5753310.jpg', '1649656740', 1),
(2, 24, '10000', '[\"13\"]', '2942080.jpg', '1650350220', 1),
(3, 22, '15600', '[\"15\"]', '7395659.jpg', '1650366900', 1),
(4, 22, '35600', '[\"45\"]', '690737.docx', '1650606060', 1),
(5, 22, '6000', '[\"72\"]', '4708325.docx', '1650606300', 1),
(6, 22, '6000', '[]', '9921612.docx', '1650606300', 1),
(8, 29, '15000', '[\"76\"]', '7077557.jpg', '1650971220', 1),
(9, 29, '17000', '[\"27\"]', '3086802.docx', '1650973320', 1),
(10, 58, '15000', '[\"76\"]', '3086802.docx', '1650973320', 1),
(11, 29, '15000', '[\"83\"]', '3469723.docx', '1654677660', 1),
(12, 29, '1000', '[\"84\"]', '3434087.docx', '1654778040', 1),
(13, 66, '1650', '[\"16\"]', '8569762.jpg', '1655557860', 1),
(14, 81, '2500', '[\"62\"]', '5557210.jpg', '1656753780', 1),
(15, 81, '2500', '[\"62\"]', '8701301.jpg', '1656754020', 0),
(16, 81, '2500', '[\"62\"]', '1147929.png', '1656908340', 0),
(17, 81, '2500', '[\"62\"]', '5344737.png', '1656910200', 0),
(18, NULL, NULL, NULL, '7778476.', '1656910680', 0),
(19, 81, NULL, '5', '3946738.', '1656910740', 0),
(20, 81, '4875', '5', '4220072.', '1656910740', 0),
(21, NULL, NULL, NULL, '9637389.', '1656922500', 0),
(22, 81, '2500', '5', '5520945.', '1656922560', 0),
(23, 81, '15000', '[\"83\"]', '4301060.png', '1656925200', 0),
(24, 76, '1200', '[\"11\"]', '7734267.png', '1657263780', 1),
(25, 76, '1500', '[\"89\"]', '9183119.png', '1657267440', 1),
(26, NULL, NULL, NULL, '6822981.', '1657799940', 0),
(27, 76, '1500', '[\"89\"]', '160597.png', '1657859940', 1),
(28, 76, '15000', '[\"83\"]', '4619827.jpg', '1657860120', 1),
(29, 81, '0', '71', '8957446.', '1657908180', 0),
(30, 81, '0', '71', '7094112.', '1657908180', 0),
(31, 81, '0', '71', '5400093.', '1657908360', 0),
(32, 81, '0', '71', '4844310.', '1657908420', 0),
(33, 81, '1000', '84', '5711302.', '1658145420', 0),
(34, 81, '1750', '32', '5474981.', '1658219880', 0),
(35, 93, '1000', '[\"84\"]', '301111.png', '1658315640', 1),
(36, 76, '1000', '[\"84\"]', '3167241.jpg', '1658481120', 1),
(37, 76, '1000', '[\"84\"]', '2389520.jpg', '1658481240', 1),
(38, 76, '1000', '[\"84\"]', '9322688.png', '1658488980', 1),
(39, 76, '1000', '[\"84\"]', '1115725.jpg', '1658489040', 1),
(40, 76, '1000', '[\"84\"]', '3956160.jpg', '1658489100', 1),
(41, 76, '1000', '[\"84\"]', '113366.jpg', '1658489280', 1),
(42, 96, '1000', '[\"84\"]', '7422352.jpg', '1658489400', 1),
(43, 96, '15000', '[\"83\"]', '6986852.jpg', '1658489580', 1),
(44, 96, '15000', '[]', '1415947.jpg', '1658489700', 0),
(45, 76, '1500', '[\"91\"]', '4468419.jpg', '1658821200', 0),
(46, 76, '1500', '[\"98\"]', '8214768.jpg', '1658828520', 0),
(47, 29, '5000', '[\"82\"]', '7950918.jpg', '1659374160', 1),
(48, 29, '0', '71', '3820781.', '1659694980', 1),
(49, 81, '1000', '70', '2287708.', '1659695820', 1),
(50, 81, '2500', '62', '8089920.', '1659695940', 1),
(51, 81, '16000', '6', '8823027.', '1659787320', 0),
(52, 81, '2200', '7', '9532260.', '1659787500', 0),
(53, 81, '15600', '15', '7053050.', '1659787620', 0),
(54, 81, '1650', '16', '9079948.', '1659787680', 0),
(55, 29, '32', '5', '2740483.', '1660055460', 0),
(56, 79, '32', '5', '889599.', '1660059000', 0),
(57, 29, '1750', '[\"32\"]', '3813181.jpg', '1660138740', 1),
(58, 29, '1750', '[]', '6689402.jpg', '1660138740', 0),
(59, 29, '1750', '[]', '7567188.jpg', '1660138740', 0),
(60, 29, '1750', '[]', '8750231.jpg', '1660138740', 0),
(61, 29, '1750', '[]', '5746275.jpg', '1660138740', 0),
(62, 29, '1750', '[]', '4300596.jpg', '1660138740', 0),
(63, 29, '1750', '[]', '3397836.jpg', '1660138740', 0),
(64, 29, '1750', '[]', '8664744.jpg', '1660138740', 0),
(65, 29, 'ree', '62', '2902525.', '1660152420', 0),
(66, 29, '29500', '[\"97\"]', '7424278.jpg', '1660730700', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `payment_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  `admin_revenue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instructor_revenue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instructor_payment_status` int(11) DEFAULT 0,
  `transaction_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `session_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coupon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `user_id`, `payment_type`, `course_id`, `amount`, `date_added`, `last_modified`, `admin_revenue`, `instructor_revenue`, `instructor_payment_status`, `transaction_id`, `session_id`, `coupon`) VALUES
(1, 9, 'offline', 29, 17800, 1649995200, NULL, '17800', '0', 1, NULL, NULL, NULL),
(2, 24, 'offline', 13, 10000, 1650340800, NULL, '10000', '0', 1, NULL, NULL, NULL),
(3, 22, 'offline', 15, 15600, 1650340800, NULL, '15600', '0', 1, NULL, NULL, NULL),
(4, 22, 'offline', 45, 35600, 1650600000, NULL, '35600', '0', 1, NULL, NULL, NULL),
(5, 22, 'offline', 72, 6000, 1650600000, NULL, '6000', '0', 1, NULL, NULL, NULL),
(6, 29, 'offline', 76, 15000, 1650945600, NULL, '4500', '10500', 0, NULL, NULL, NULL),
(7, 29, 'offline', 27, 17000, 1650945600, NULL, '17000', '0', 1, NULL, NULL, NULL),
(8, 58, 'offline', 76, 15000, 1650945600, NULL, '4500', '10500', 0, NULL, NULL, NULL),
(9, 29, 'offline', 83, 15000, 1654660800, NULL, '4500', '10500', 0, NULL, NULL, NULL),
(10, 29, 'offline', 84, 1000, 1654747200, NULL, '300', '700', 0, NULL, NULL, NULL),
(11, 66, 'offline', 16, 1650, 1656993600, NULL, '1650', '0', 1, NULL, NULL, NULL),
(12, 81, 'offline', 62, 1520, 1656993600, NULL, '456', '1064', 0, NULL, NULL, NULL),
(13, 76, 'offline', 89, 1500, 1657857600, NULL, '450', '1050', 0, NULL, NULL, NULL),
(14, 76, 'offline', 11, 1200, 1657857600, NULL, '1200', '0', 1, NULL, NULL, NULL),
(15, 76, 'offline', 83, 15000, 1657857600, NULL, '4500', '10500', 0, NULL, NULL, NULL),
(16, 93, 'offline', 84, 1000, 1658289600, NULL, '300', '700', 1, NULL, NULL, NULL),
(17, 29, 'offline', 82, 5000, 1659326400, NULL, '2000', '3000', 0, NULL, NULL, NULL),
(18, 29, 'offline', 32, 1750, 1660104000, NULL, '1750', '0', 1, NULL, NULL, NULL),
(19, 29, 'offline', 97, 29500, 1660708800, NULL, '11800', '17700', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payout`
--

CREATE TABLE `payout` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payout`
--

INSERT INTO `payout` (`id`, `user_id`, `payment_type`, `amount`, `date_added`, `last_modified`, `status`) VALUES
(3, 28, NULL, 10500, 1651118400, NULL, 0),
(5, 66, NULL, 200, 1658376000, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `permissions` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `admin_id`, `permissions`) VALUES
(1, 25, '[]'),
(2, 26, '[\"course\",\"instructor\",\"student\"]');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `outcomes` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `section` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `requirements` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `discount_flag` int(11) DEFAULT 0,
  `discounted_price` int(11) DEFAULT NULL,
  `level` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  `course_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_top_course` int(11) DEFAULT 0,
  `is_admin` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_overview_provider` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_free_course` int(11) DEFAULT NULL,
  `multi_instructor` int(11) NOT NULL DEFAULT 0,
  `creator` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `title`, `short_description`, `description`, `outcomes`, `language`, `category_id`, `sub_category_id`, `section`, `requirements`, `price`, `discount_flag`, `discounted_price`, `level`, `user_id`, `thumbnail`, `video_url`, `date_added`, `last_modified`, `course_type`, `is_top_course`, `is_admin`, `status`, `course_overview_provider`, `meta_keywords`, `meta_description`, `is_free_course`, `multi_instructor`, `creator`) VALUES
(1001, 'check programs', 'check programs', '<p>check programs<br></p>', '[\"check programs\"]', 'english', 1, 24, '[]', '[\"check programs\"]', 16000, NULL, 12500, 'beginner', '76', NULL, 'https://www.youtube.com/', 1658548800, NULL, 'general', NULL, 0, 'active', 'youtube', 'check programs,programs,check', 'check programs', NULL, 0, 76),
(1002, 'programs', 'programs', '<p>programs<br></p>', '[\"programs\"]', 'english', 1, 23, '[]', '[\"programs\"]', 0, NULL, 0, 'advanced', '76', NULL, 'https://www.youtube.com/', 1658808000, NULL, 'general', NULL, 0, 'pending', 'youtube', 'programs', 'programs', 1, 0, 76);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) UNSIGNED NOT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  `title` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `number_of_options` int(11) DEFAULT NULL,
  `options` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `correct_answers` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `quiz_id`, `title`, `type`, `number_of_options`, `options`, `correct_answers`, `order`) VALUES
(1, 17, 'Android is ', 'multiple_choice', 4, '[\"an operating system\",\" a web browser\",\" a web server \",\"None of the above\"]', '[\"\"]', 0),
(2, 17, 'Under which of the following Android is licensed?', 'multiple_choice', 3, '[\"OSS\",\"Apache\\/MIT \",\"None of the above\"]', '[\"\"]', 0),
(3, 20, 'How many UI you screen you can create ', 'multiple_choice', 3, '[\"as per req\",\"0\",\"1\"]', '[\"\"]', 0),
(4, 20, 'abcd', 'multiple_choice', 4, '[\"a\",\"b\",\"c\",\"c\"]', '[\"\"]', 0),
(5, 26, 'Which animal is known as the &#039;Ship of the Desert&quot;?', 'multiple_choice', 5, '[\"1\",\"2\",\"3\",\"4\",\"5\"]', '[\"1\",\"2\"]', 0),
(6, 26, 'How many days are there in a week? ', 'multiple_choice', 5, '[\"1\",\"2\",\"34\",\"5\",\"7\"]', '[\"1\",\"4\"]', 0),
(7, 28, 'acv', 'multiple_choice', 3, '[\"cc\",\"cc\",\"as per req\"]', '[\"\"]', 0),
(8, 31, 'What does SEO stand for?', 'multiple_choice', 2, '[\"Search Engine Optimisation\",\"NONE OF THE ABOVE\"]', '[\"\"]', 0),
(9, 31, 'What percentage of web traffic originates from organic search?', 'multiple_choice', 2, '[\"111\",\"44\"]', '[\"\"]', 0),
(10, 33, 'check 1', 'multiple_choice', 2, '[\"1\",\"2\"]', '[\"1\"]', 0),
(11, 33, 'Check 2', 'multiple_choice', 3, '[\"1\",\"3\",\"2\"]', '[\"1\"]', 0),
(12, 34, 'What is', 'multiple_choice', 3, '[\"1\",\"2\",\"3\"]', '[\"1\"]', 1),
(13, 34, 'who is', 'multiple_choice', 3, '[\"1\",\"2\",\"3\"]', '[\"1\"]', 2),
(14, 35, 'What is A', 'multiple_choice', 3, '[\"A\",\"B\",\"C\"]', '[\"1\"]', 1),
(15, 35, 'What is B', 'multiple_choice', 3, '[\"A\",\"B\",\"C\"]', '[\"\"]', 2),
(16, 36, 'Which one is A', 'multiple_choice', 3, '[\"A\",\"B\",\"C\"]', '[\"1\"]', 0),
(17, 36, 'Which one is B', 'multiple_choice', 3, '[\"A\",\"B\",\"C\"]', '[\"2\"]', 0),
(18, 41, 'Which of the following refers to the problem of finding abstracted patterns (or structures) in the unlabeled data?', 'multiple_choice', 3, '[\"Supervised Learning \",\"UnSupervised Learning \",\"no of above\"]', '[\"2\"]', 0),
(19, 41, 'Which one of the following refers to querying the unstructured textual data', 'multiple_choice', 2, '[\"a\",\"b\"]', '[\"1\"]', 0),
(20, 2, 'Quiz', 'multiple_choice', 4, '[\"a\",\"b\",\"c\",\"d\"]', '[\"\"]', 0),
(21, 43, 'quiz', 'multiple_choice', 1, '[\"ans\"]', '[\"\"]', 0),
(23, 45, 'testing', 'multiple_choice', 2, '[\"1\",\"2\"]', '[\"1\"]', 0),
(24, 44, 'Checking', 'multiple_choice', 2, '[\"Right\",\"Wrong\"]', '[\"2\"]', 0),
(25, 50, 'xgd', 'multiple_choice', 3, '[\"1\",\"w\",\"w\"]', '[\"\"]', 0),
(26, 53, 'What is your name?', 'multiple_choice', 4, '[\"Khi\",\"zar\",\"sa\",\"mi\"]', '[\"1\",\"2\",\"3\",\"4\"]', 0),
(27, 54, 'How are you?', 'multiple_choice', 4, '[\"1\",\"3\",\"4\",\"5\"]', '[\"1\"]', 0),
(28, 54, 'qwe', 'multiple_choice', 4, '[\"1\",\"2\",\"3\",\"4\"]', '[\"4\"]', 0),
(29, 54, '123', 'multiple_choice', 4, '[\"2\",\"3\",\"4\",\"1\"]', '[\"3\"]', 0);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_answers`
--

CREATE TABLE `quiz_answers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_answers`
--

INSERT INTO `quiz_answers` (`id`, `user_id`, `question_id`, `answer`, `marks`) VALUES
(3, 58, 5, '[\"1\",\"2\"]', 4),
(4, 58, 6, '[\"1\",\"4\"]', NULL),
(5, 60, 5, '[\"1\",\"2\"]', NULL),
(6, 29, 8, '[\"1\"]', NULL),
(7, 29, 9, '[\"2\"]', NULL),
(8, 29, 3, '[\"1\"]', NULL),
(9, 29, 4, '[\"3\"]', NULL),
(10, 29, 10, '[\"1\"]', 1),
(11, 29, 11, '[\"2\"]', 1),
(12, 29, 10, '[\"1\"]', 1),
(13, 29, 11, '[\"3\"]', -1),
(14, 29, 3, '[\"1\",\"3\"]', NULL),
(15, 29, 4, '[\"3\"]', NULL),
(16, 68, 5, '[\"2\"]', NULL),
(17, 68, 6, '[\"2\"]', NULL),
(18, 68, 5, '[\"4\"]', NULL),
(19, 68, 6, '[\"3\"]', NULL),
(20, 68, 5, '[\"1\"]', NULL),
(21, 68, 6, '[\"4\"]', NULL),
(22, 76, 12, '[\"1\"]', 10),
(23, 76, 13, '[\"1\"]', 5),
(24, 68, 12, '[\"1\"]', NULL),
(25, 68, 13, '[\"1\"]', NULL),
(26, 68, 12, '[\"2\"]', NULL),
(27, 68, 13, '[\"1\"]', NULL),
(28, 68, 14, '[\"1\"]', 2),
(29, 68, 15, '[\"2\"]', 1),
(30, 68, 12, '[\"1\"]', NULL),
(31, 68, 13, '[\"1\"]', NULL),
(32, 68, 16, '[\"1\"]', 5),
(33, 68, 17, '[\"2\"]', 5),
(34, 29, 18, '[\"1\"]', -1),
(35, 29, 19, '[\"1\"]', 1),
(36, 29, 18, '[\"1\"]', NULL),
(37, 29, 19, '[\"1\"]', NULL),
(38, 29, 10, '[\"1\"]', 1),
(39, 29, 11, '[\"2\"]', -1),
(40, 29, 10, '[\"1\"]', NULL),
(41, 29, 11, '[\"3\"]', NULL),
(42, 29, 10, '[\"1\"]', NULL),
(43, 29, 11, '[\"2\"]', NULL),
(44, 29, 10, '[\"1\"]', NULL),
(45, 29, 11, '[\"1\"]', NULL),
(46, 29, 10, '[\"1\"]', NULL),
(47, 29, 11, '[\"1\"]', NULL),
(48, 29, 10, '[\"1\"]', NULL),
(49, 29, 11, '[\"1\"]', NULL),
(50, 82, 10, '[\"2\"]', NULL),
(51, 82, 11, '[\"2\"]', NULL),
(52, 76, 8, '[\"1\"]', NULL),
(53, 76, 9, '[\"1\"]', 5),
(54, 76, 22, '[\"1\",\"2\",\"3\"]', 10),
(55, 82, 22, '[\"1\",\"2\",\"3\"]', 10),
(56, 76, 22, '[\"1\",\"2\",\"3\"]', 15),
(57, 76, 22, '[\"1\"]', 10),
(58, 76, 22, '[\"2\"]', 25),
(59, 29, 10, '[\"2\"]', NULL),
(60, 29, 11, '[\"2\"]', NULL),
(61, 76, 23, '[\"2\"]', 10),
(62, 76, 22, '[\"2\"]', 1),
(63, 76, 22, '[\"1\"]', 30),
(64, 76, 22, '[\"1\"]', NULL),
(65, 93, 10, '[\"2\"]', NULL),
(66, 93, 11, '[\"3\"]', NULL),
(67, 83, 23, '[\"1\"]', 20),
(68, 84, 23, '[\"1\"]', 22),
(69, 76, 23, '[\"1\"]', NULL),
(70, 76, 24, '[\"2\"]', NULL),
(71, 76, 24, '[\"2\"]', NULL),
(72, 76, 23, '[\"2\"]', NULL),
(73, 76, 23, '[\"1\"]', NULL),
(74, 76, 24, '[\"2\"]', NULL),
(75, 76, 24, '[\"1\"]', NULL),
(76, 76, 24, '[\"2\"]', NULL),
(77, 76, 24, '[\"1\",\"2\"]', NULL),
(78, 76, 24, '[\"2\"]', NULL),
(79, 76, 24, '[\"2\"]', NULL),
(80, 76, 24, '[\"2\"]', NULL),
(81, 76, 24, '[\"2\"]', NULL),
(82, 76, 24, '[\"2\"]', NULL),
(83, 76, 24, '[\"2\"]', NULL),
(84, 76, 24, '[\"1\"]', NULL),
(85, 76, 24, '[\"2\"]', NULL),
(86, 76, 24, '[\"2\"]', NULL),
(87, 76, 24, '[\"2\"]', NULL),
(88, 76, 24, '[\"1\"]', NULL),
(89, 76, 24, '[\"2\"]', NULL),
(90, 76, 24, '[\"2\"]', NULL),
(91, 76, 24, '[\"2\"]', NULL),
(92, 76, 24, '[\"2\"]', NULL),
(93, 76, 24, '[\"2\"]', NULL),
(94, 76, 23, '[\"2\"]', NULL),
(95, 76, 23, '[\"2\"]', NULL),
(96, 76, 23, '[\"2\"]', NULL),
(97, 76, 23, '[\"2\"]', NULL),
(98, 76, 23, '[\"2\"]', NULL),
(99, 76, 23, '[\"2\"]', NULL),
(100, 76, 23, '[\"2\"]', NULL),
(101, 76, 23, '[\"2\"]', NULL),
(102, 76, 23, '[\"1\"]', NULL),
(103, 76, 23, '[\"2\"]', NULL),
(104, 76, 23, '[\"2\"]', NULL),
(105, 76, 23, '[\"2\"]', NULL),
(106, 76, 23, '[\"2\"]', NULL),
(107, 76, 23, '[\"1\"]', NULL),
(108, 76, 24, '[\"2\"]', NULL),
(109, 76, 24, '[\"2\"]', NULL),
(110, 76, 23, '[\"2\"]', NULL),
(111, 76, 23, '[\"2\"]', NULL),
(112, 76, 24, '[\"2\"]', NULL),
(113, 76, 24, '[\"2\"]', NULL),
(114, 76, 24, '[\"1\"]', NULL),
(115, 76, 24, '[\"2\"]', NULL),
(116, 76, 24, '[\"2\"]', NULL),
(117, 76, 24, '[\"2\"]', NULL),
(118, 76, 24, '[\"2\"]', NULL),
(119, 76, 24, '[\"2\"]', NULL),
(120, 76, 24, '[\"2\"]', NULL),
(121, 76, 24, '[\"1\"]', NULL),
(122, 76, 24, '[\"2\"]', NULL),
(123, 76, 24, '[\"2\"]', NULL),
(124, 76, 24, '[\"2\"]', NULL),
(125, 76, 24, '[\"1\"]', NULL),
(126, 76, 24, '[\"2\"]', NULL),
(127, 76, 24, '[\"2\"]', NULL),
(128, 76, 24, '[\"2\"]', NULL),
(129, 76, 24, '[\"1\"]', NULL),
(130, 76, 24, '[\"2\"]', NULL),
(131, 76, 24, '[\"2\"]', NULL),
(132, 76, 24, '[\"2\"]', NULL),
(133, 76, 24, '[\"2\"]', NULL),
(134, 76, 24, '[\"2\"]', NULL),
(135, 76, 24, '[\"2\"]', NULL),
(136, 76, 24, '[\"1\"]', NULL),
(137, 76, 24, '[\"2\"]', NULL),
(138, 76, 24, '[\"2\"]', NULL),
(139, 76, 24, '[\"2\"]', NULL),
(140, 76, 24, '[\"2\"]', NULL),
(141, 76, 24, '[\"2\"]', NULL),
(142, 76, 23, '[\"2\"]', NULL),
(143, 76, 23, '[\"2\"]', NULL),
(144, 76, 23, '[\"2\"]', NULL),
(145, 76, 24, '[\"2\"]', NULL),
(146, 76, 24, '[\"1\"]', NULL),
(147, 76, 24, '[\"1\"]', NULL),
(148, 76, 24, '[\"1\"]', NULL),
(149, 76, 24, '[\"1\"]', NULL),
(150, 76, 24, '[\"1\"]', NULL),
(151, 76, 24, '[\"1\"]', NULL),
(152, 76, 24, '[\"1\"]', NULL),
(153, 76, 24, '[\"2\"]', NULL),
(154, 76, 24, '[\"2\"]', NULL),
(155, 76, 24, '[\"2\"]', NULL),
(156, 76, 24, '[\"2\"]', NULL),
(157, 76, 24, '[\"2\"]', NULL),
(158, 76, 24, '[\"2\"]', NULL),
(159, 76, 24, '[\"1\"]', NULL),
(160, 76, 24, '[\"2\"]', NULL),
(161, 76, 24, '[\"1\"]', NULL),
(162, 76, 24, '[\"2\"]', NULL),
(163, 76, 24, '[\"2\"]', NULL),
(164, 76, 24, '[\"2\"]', NULL),
(165, 76, 24, '[\"2\"]', NULL),
(166, 76, 24, '[\"2\"]', NULL),
(167, 76, 24, '[\"2\"]', NULL),
(168, 76, 24, '[\"2\"]', NULL),
(169, 76, 24, '[\"2\"]', NULL),
(170, 76, 24, '[\"2\"]', NULL),
(171, 76, 24, '[\"2\"]', NULL),
(172, 76, 24, '[\"2\"]', NULL),
(173, 76, 24, '[\"2\"]', NULL),
(174, 76, 24, '[\"1\",\"2\"]', NULL),
(175, 76, 24, '[\"2\"]', NULL),
(176, 76, 24, '[\"1\"]', NULL),
(177, 76, 23, '[\"2\"]', NULL),
(178, 76, 24, '[\"2\"]', NULL),
(179, 76, 23, '[\"2\"]', NULL),
(180, 76, 23, '[\"2\"]', NULL),
(181, 76, 23, '[\"2\"]', NULL),
(182, 76, 24, '[\"2\"]', NULL),
(183, 76, 23, '[\"2\"]', NULL),
(184, 76, 23, '[\"2\"]', NULL),
(185, 76, 23, '[\"2\"]', NULL),
(186, 76, 23, '[\"2\"]', NULL),
(187, 76, 23, '[\"2\"]', NULL),
(188, 76, 23, '[\"2\"]', NULL),
(189, 76, 23, '[\"1\"]', NULL),
(190, 76, 23, '[\"2\"]', NULL),
(191, 76, 23, '[\"2\"]', NULL),
(192, 76, 23, '[\"2\"]', NULL),
(193, 76, 23, '[\"2\"]', NULL),
(194, 76, 23, '[\"2\"]', NULL),
(195, 76, 23, '[\"2\"]', NULL),
(196, 76, 23, '[\"2\"]', NULL),
(197, 76, 23, '[\"2\"]', NULL),
(198, 76, 23, '[\"2\"]', NULL),
(199, 76, 23, '[\"1\"]', NULL),
(200, 76, 23, '[\"2\"]', NULL),
(201, 82, 23, '[\"1\"]', NULL),
(202, 76, 23, '[\"2\"]', NULL),
(203, 76, 23, '[\"2\"]', NULL),
(204, 76, 23, '[\"1\"]', NULL),
(205, 76, 24, '[\"1\"]', NULL),
(206, 76, 24, '[\"2\"]', NULL),
(207, 76, 23, '[\"1\"]', NULL),
(208, 82, 23, '[\"1\"]', NULL),
(209, 82, 23, '[\"1\"]', NULL),
(210, 82, 23, '[\"1\"]', NULL),
(211, 82, 23, '[\"1\"]', NULL),
(212, 82, 23, '[\"2\"]', NULL),
(213, 29, 10, '[\"2\"]', NULL),
(214, 29, 11, '[\"3\"]', NULL),
(215, 29, 10, '[\"2\"]', NULL),
(216, 29, 11, '[\"3\"]', NULL),
(217, 29, 10, '[\"2\"]', NULL),
(218, 29, 11, '[\"2\"]', NULL),
(219, 29, 10, '[\"2\"]', NULL),
(220, 29, 11, '[\"2\"]', NULL),
(221, 29, 18, '[\"2\"]', NULL),
(222, 29, 19, '[\"1\"]', NULL),
(223, 29, 18, '[\"2\"]', NULL),
(224, 29, 19, '[\"1\"]', NULL),
(225, 29, 18, '[\"2\"]', NULL),
(226, 29, 19, '[\"1\"]', NULL),
(227, 29, 18, '[\"2\"]', NULL),
(228, 29, 19, '[\"1\"]', NULL),
(229, 29, 10, '[\"1\"]', NULL),
(230, 29, 11, '[\"2\"]', NULL),
(231, 29, 10, '[\"1\"]', NULL),
(232, 29, 11, '[\"2\"]', NULL),
(233, 29, 10, '[\"1\"]', NULL),
(234, 29, 11, '[\"1\"]', NULL),
(235, 29, 10, '[\"1\"]', NULL),
(236, 29, 11, '[\"2\"]', NULL),
(237, 29, 10, '[\"1\"]', NULL),
(238, 29, 11, '[\"2\"]', NULL),
(239, 29, 10, '[\"2\"]', NULL),
(240, 29, 11, '[\"2\"]', NULL),
(241, 82, 23, '[\"1\"]', NULL),
(242, 82, 24, '[\"1\"]', NULL),
(243, 82, 23, '[\"1\"]', NULL),
(244, 82, 10, '[\"1\"]', NULL),
(245, 82, 11, '[\"1\"]', NULL),
(246, 76, 24, '[\"2\"]', NULL),
(247, 76, 24, '[\"2\"]', NULL),
(248, 76, 24, '[\"2\"]', NULL),
(249, 76, 23, '[\"1\"]', NULL),
(250, 76, 24, '[\"1\"]', NULL),
(251, 76, 24, '[\"2\"]', NULL),
(252, 76, 23, '[\"2\"]', NULL),
(253, 76, 23, '[\"1\"]', NULL),
(254, 76, 24, '[\"2\"]', NULL),
(255, 76, 23, '[\"2\"]', NULL),
(256, 76, 23, '[\"1\"]', NULL),
(257, 76, 23, '[\"1\"]', NULL),
(258, 76, 24, '[\"2\"]', NULL),
(259, 76, 23, '[\"1\"]', NULL),
(260, 76, 23, '[\"1\"]', NULL),
(261, 76, 23, '[\"1\"]', NULL),
(262, 76, 23, '[\"1\"]', NULL),
(263, 76, 23, '[\"1\"]', NULL),
(264, 76, 23, '[\"1\"]', NULL),
(265, 76, 23, '[\"1\"]', NULL),
(266, 76, 23, '[\"1\"]', NULL),
(267, 76, 23, '[\"1\"]', NULL),
(268, 76, 23, '[\"1\"]', NULL),
(269, 76, 23, '[\"1\"]', NULL),
(270, 76, 23, '[\"1\"]', NULL),
(271, 76, 23, '[\"1\"]', NULL),
(272, 76, 23, '[\"2\"]', NULL),
(273, 76, 23, '[\"1\"]', NULL),
(274, 76, 23, '[\"1\"]', NULL),
(275, 76, 23, '[\"1\"]', NULL),
(276, 76, 23, '[\"1\"]', NULL),
(277, 76, 23, '[\"1\"]', NULL),
(278, 76, 23, '[\"1\"]', NULL),
(279, 76, 23, '[\"1\"]', NULL),
(280, 76, 23, '[\"1\"]', NULL),
(281, 76, 24, '[\"2\"]', NULL),
(282, 76, 5, '[\"4\",\"5\"]', NULL),
(283, 76, 6, '[\"2\",\"3\",\"4\",\"5\"]', NULL),
(284, 76, 24, '[\"2\"]', NULL),
(285, 76, 24, '[\"2\"]', NULL),
(286, 76, 24, '[\"2\"]', NULL),
(287, 76, 24, '[\"2\"]', NULL),
(288, 76, 24, '[\"2\"]', NULL),
(289, 76, 24, '[\"2\"]', NULL),
(290, 76, 24, '[\"2\"]', NULL),
(291, 76, 24, '[\"2\"]', NULL),
(292, 76, 24, '[\"2\"]', NULL),
(293, 76, 24, '[\"2\"]', NULL),
(294, 76, 24, '[\"2\"]', NULL),
(295, 76, 24, '[\"2\"]', NULL),
(296, 76, 24, '[\"2\"]', NULL),
(297, 76, 24, '[\"2\"]', NULL),
(298, 76, 24, '[\"2\"]', NULL),
(299, 76, 24, '[\"2\"]', NULL),
(300, 76, 24, '[\"2\"]', NULL),
(301, 76, 23, '[\"2\"]', NULL),
(302, 76, 23, '[\"1\"]', NULL),
(303, 82, 10, '[\"2\"]', NULL),
(304, 82, 11, '[\"2\",\"3\"]', NULL),
(305, 76, 24, '[\"1\"]', NULL),
(306, 82, 10, '[\"2\"]', NULL),
(307, 82, 11, '[\"2\",\"3\"]', NULL),
(308, 82, 10, '[\"1\"]', NULL),
(309, 82, 11, '[\"1\",\"3\"]', NULL),
(310, 82, 10, '[\"1\"]', NULL),
(311, 82, 11, '[\"3\"]', NULL),
(312, 82, 10, '[\"1\"]', NULL),
(313, 82, 11, '[\"1\"]', NULL),
(314, 82, 10, '[\"2\"]', NULL),
(315, 82, 11, '[\"2\",\"3\"]', NULL),
(316, 76, 24, '[\"2\"]', NULL),
(317, 82, 10, '[\"2\"]', NULL),
(318, 82, 11, '[\"2\"]', NULL),
(319, 82, 10, '[\"2\"]', NULL),
(320, 82, 11, '[\"2\"]', NULL),
(321, 82, 10, '[\"2\"]', NULL),
(322, 82, 11, '[\"2\"]', NULL),
(323, 82, 10, '[\"2\"]', NULL),
(324, 82, 11, '[\"2\"]', NULL),
(325, 82, 10, '[\"1\"]', NULL),
(326, 82, 11, '[\"1\"]', NULL),
(327, 82, 10, '[\"1\"]', NULL),
(328, 82, 11, '[\"3\"]', NULL),
(329, 82, 10, '[\"1\"]', NULL),
(330, 82, 11, '[\"3\"]', NULL),
(331, 82, 10, '[\"1\"]', NULL),
(332, 82, 11, '[\"3\"]', NULL),
(333, 82, 10, '[\"2\"]', NULL),
(334, 82, 11, '[\"3\"]', NULL),
(335, 82, 10, '[\"2\"]', NULL),
(336, 82, 11, '[\"2\"]', NULL),
(337, 82, 10, '[\"2\"]', NULL),
(338, 82, 11, '[\"2\"]', NULL),
(339, 82, 10, '[\"1\"]', NULL),
(340, 82, 11, '[\"1\"]', NULL),
(341, 82, 10, '[\"1\"]', NULL),
(342, 82, 11, '[\"1\"]', NULL),
(343, 82, 10, '[\"1\"]', NULL),
(344, 82, 11, '[\"1\"]', NULL),
(345, 82, 10, '[\"1\"]', NULL),
(346, 82, 11, '[\"1\"]', NULL),
(347, 82, 10, '[\"1\"]', NULL),
(348, 82, 11, '[\"1\"]', NULL),
(349, 82, 10, '[\"1\"]', NULL),
(350, 82, 11, '[\"1\"]', NULL),
(351, 82, 10, '[\"1\"]', NULL),
(352, 82, 11, '[\"1\"]', NULL),
(353, 82, 10, '[\"1\"]', NULL),
(354, 82, 11, '[\"1\"]', NULL),
(355, 82, 10, '[\"1\"]', NULL),
(356, 82, 11, '[\"1\"]', NULL),
(357, 82, 10, '[\"1\"]', NULL),
(358, 82, 11, '[\"1\"]', NULL),
(359, 82, 10, '[\"1\"]', NULL),
(360, 82, 11, '[\"1\"]', NULL),
(361, 82, 10, '[\"2\"]', NULL),
(362, 82, 11, '[\"2\"]', NULL),
(363, 82, 10, '[\"2\"]', NULL),
(364, 82, 11, '[\"2\"]', NULL),
(365, 82, 10, '[\"2\"]', NULL),
(366, 82, 11, '[\"2\"]', NULL),
(367, 82, 10, '[\"1\"]', NULL),
(368, 82, 11, '[\"1\"]', NULL),
(369, 82, 10, '[\"2\"]', NULL),
(370, 82, 11, '[\"2\"]', NULL),
(371, 82, 10, '[\"1\"]', NULL),
(372, 82, 11, '[\"1\"]', NULL),
(373, 82, 10, '[\"1\"]', NULL),
(374, 82, 11, '[\"2\"]', NULL),
(375, 82, 10, '[\"2\"]', NULL),
(376, 82, 11, '[\"2\"]', NULL),
(377, 82, 10, '[\"2\"]', NULL),
(378, 82, 11, '[\"2\"]', NULL),
(379, 82, 10, '[\"2\"]', NULL),
(380, 82, 11, '[\"3\"]', NULL),
(381, 82, 10, '[\"1\"]', NULL),
(382, 82, 11, '[\"1\"]', NULL),
(383, 82, 10, '[\"1\"]', NULL),
(384, 82, 11, '[\"1\"]', NULL),
(385, 82, 10, '[\"2\"]', NULL),
(386, 82, 11, '[\"2\"]', NULL),
(387, 82, 10, '[\"1\"]', NULL),
(388, 82, 11, '[\"1\"]', NULL),
(389, 82, 10, '[\"1\"]', NULL),
(390, 82, 11, '[\"1\"]', NULL),
(391, 82, 10, '[\"1\"]', NULL),
(392, 82, 11, '[\"1\"]', NULL),
(393, 82, 10, '[\"1\"]', NULL),
(394, 82, 11, '[\"1\"]', NULL),
(395, 82, 10, '[\"2\"]', NULL),
(396, 82, 11, '[\"2\"]', NULL),
(397, 82, 10, '[\"1\"]', NULL),
(398, 82, 11, '[\"1\"]', NULL),
(399, 82, 10, '[\"1\"]', NULL),
(400, 82, 11, '[\"1\"]', NULL),
(401, 82, 10, '[\"1\"]', NULL),
(402, 82, 11, '[\"1\"]', NULL),
(403, 76, 24, '[\"1\"]', NULL),
(404, 76, 24, '[\"2\"]', NULL),
(405, 76, 24, '[\"2\"]', NULL),
(406, 76, 24, '[\"2\"]', NULL),
(407, 76, 24, '[\"1\"]', NULL),
(408, 76, 24, '[\"2\"]', NULL),
(409, 76, 24, '[\"1\"]', NULL),
(410, 76, 24, '[\"2\"]', NULL),
(411, 76, 24, '[\"2\"]', NULL),
(412, 76, 24, '[\"2\"]', NULL),
(413, 76, 24, '[\"2\"]', NULL),
(414, 82, 10, '[\"2\"]', NULL),
(415, 82, 11, '[\"2\"]', NULL),
(416, 82, 10, '[\"1\"]', NULL),
(417, 82, 11, '[\"1\"]', NULL),
(418, 82, 10, '[\"1\"]', NULL),
(419, 82, 11, '[\"1\"]', NULL),
(420, 82, 10, '[\"1\"]', NULL),
(421, 82, 11, '[\"1\"]', NULL),
(422, 82, 10, '[\"1\"]', NULL),
(423, 82, 11, '[\"1\"]', NULL),
(424, 82, 10, '[\"1\"]', NULL),
(425, 82, 11, '[\"1\"]', NULL),
(426, 82, 10, '[\"1\"]', NULL),
(427, 82, 11, '[\"1\"]', NULL),
(428, 82, 10, '[\"1\"]', NULL),
(429, 82, 11, '[\"1\"]', NULL),
(430, 82, 10, '[\"1\"]', NULL),
(431, 82, 11, '[\"1\"]', NULL),
(432, 82, 10, '[\"1\"]', NULL),
(433, 82, 11, '[\"1\"]', NULL),
(434, 82, 10, '[\"1\"]', NULL),
(435, 82, 11, '[\"1\"]', NULL),
(436, 82, 10, '[\"2\"]', NULL),
(437, 82, 11, '[\"2\"]', NULL),
(438, 82, 10, '[\"1\"]', NULL),
(439, 82, 11, '[\"1\"]', NULL),
(440, 82, 10, '[\"1\"]', NULL),
(441, 82, 11, '[\"1\"]', NULL),
(442, 76, 24, '[\"2\"]', NULL),
(443, 82, 10, '[\"2\"]', NULL),
(444, 82, 11, '[\"3\"]', NULL),
(445, 82, 10, '[\"2\"]', NULL),
(446, 82, 11, '[\"3\"]', NULL),
(447, 82, 10, '[\"1\"]', NULL),
(448, 82, 11, '[\"2\"]', NULL),
(449, 82, 10, '[\"2\"]', NULL),
(450, 82, 11, '[\"3\"]', NULL),
(451, 82, 10, '[\"2\"]', NULL),
(452, 82, 11, '[\"3\"]', NULL),
(453, 82, 10, '[\"2\"]', NULL),
(454, 82, 11, '[\"3\"]', NULL),
(455, 82, 10, '[\"2\"]', NULL),
(456, 82, 11, '[\"2\",\"3\"]', NULL),
(457, 82, 10, '[\"2\"]', NULL),
(458, 82, 11, '[\"2\",\"3\"]', NULL),
(459, 82, 10, '[\"2\"]', NULL),
(460, 82, 11, '[\"2\",\"3\"]', NULL),
(461, 82, 10, '[\"2\"]', NULL),
(462, 82, 11, '[\"2\",\"3\"]', NULL),
(463, 82, 10, '[\"2\"]', NULL),
(464, 82, 11, '[\"2\",\"3\"]', NULL),
(465, 82, 10, '[\"2\"]', NULL),
(466, 82, 11, '[\"2\"]', NULL),
(467, 82, 10, '[\"2\"]', NULL),
(468, 82, 11, '[\"2\"]', NULL),
(469, 82, 10, '[\"2\"]', NULL),
(470, 82, 11, '[\"2\"]', NULL),
(471, 82, 10, '[\"2\"]', NULL),
(472, 82, 11, '[\"2\"]', NULL),
(473, 82, 10, '[\"2\"]', NULL),
(474, 82, 11, '[\"2\"]', NULL),
(475, 82, 10, '[\"2\"]', NULL),
(476, 82, 11, '[\"2\",\"3\"]', NULL),
(477, 82, 10, '[\"2\"]', NULL),
(478, 82, 11, '[\"2\"]', NULL),
(479, 82, 10, '[\"2\"]', NULL),
(480, 82, 11, '[\"2\"]', NULL),
(481, 82, 10, '[\"2\"]', NULL),
(482, 82, 11, '[\"2\"]', NULL),
(483, 82, 10, '[\"2\"]', NULL),
(484, 82, 11, '[\"2\"]', NULL),
(485, 82, 10, '[\"2\"]', NULL),
(486, 82, 11, '[\"3\"]', NULL),
(487, 82, 10, '[\"2\"]', NULL),
(488, 82, 11, '[\"2\"]', NULL),
(489, 82, 10, '[\"1\"]', NULL),
(490, 82, 11, '[\"1\"]', NULL),
(491, 82, 10, '[\"2\"]', NULL),
(492, 82, 11, '[\"1\"]', NULL),
(493, 82, 10, '[\"2\"]', NULL),
(494, 82, 11, '[\"2\"]', NULL),
(495, 82, 10, '[\"1\"]', NULL),
(496, 82, 11, '[\"1\"]', NULL),
(497, 82, 10, '[\"1\"]', NULL),
(498, 82, 11, '[\"1\"]', NULL),
(499, 82, 10, '[\"2\"]', NULL),
(500, 82, 11, '[\"1\"]', NULL),
(501, 82, 10, '[\"1\"]', NULL),
(502, 82, 11, '[\"1\"]', NULL),
(503, 82, 10, '[\"1\"]', NULL),
(504, 82, 11, '[\"1\"]', NULL),
(505, 82, 10, '[\"2\"]', NULL),
(506, 82, 11, '[\"1\"]', NULL),
(507, 76, 24, '[\"1\"]', NULL),
(508, 76, 24, '[\"2\"]', NULL),
(509, 82, 10, '[\"1\"]', NULL),
(510, 82, 11, '[\"1\"]', NULL),
(511, 82, 10, '[\"1\"]', NULL),
(512, 82, 11, '[\"1\"]', NULL),
(513, 82, 10, '[\"1\"]', NULL),
(514, 82, 11, '[\"1\"]', NULL),
(515, 82, 10, '[\"1\"]', NULL),
(516, 82, 11, '[\"1\"]', NULL),
(517, 82, 10, '[\"1\"]', NULL),
(518, 82, 11, '[\"1\"]', NULL),
(519, 82, 10, '[\"2\"]', NULL),
(520, 82, 11, '[\"2\"]', NULL),
(521, 82, 10, '[\"1\"]', NULL),
(522, 82, 11, '[\"1\"]', NULL),
(523, 82, 10, '[\"1\"]', NULL),
(524, 82, 11, '[\"1\"]', NULL),
(525, 82, 10, '[\"1\"]', NULL),
(526, 82, 11, '[\"1\"]', NULL),
(527, 82, 10, '[\"1\"]', NULL),
(528, 82, 11, '[\"1\"]', NULL),
(529, 82, 10, '[\"1\"]', NULL),
(530, 82, 11, '[\"1\"]', NULL),
(531, 82, 10, '[\"1\"]', NULL),
(532, 82, 11, '[\"1\"]', NULL),
(533, 82, 10, '[\"1\"]', NULL),
(534, 82, 11, '[\"1\"]', NULL),
(535, 82, 10, '[\"1\"]', NULL),
(536, 82, 11, '[\"1\"]', NULL),
(537, 82, 10, '[\"2\"]', NULL),
(538, 82, 11, '[\"2\"]', NULL),
(539, 82, 23, 'null', NULL),
(540, 82, 23, '[\"1\"]', NULL),
(541, 29, 18, '[\"2\"]', NULL),
(542, 29, 19, '[\"1\"]', NULL),
(543, 29, 18, '[\"2\"]', NULL),
(544, 29, 19, '[\"1\"]', NULL),
(545, 29, 18, '[\"2\"]', NULL),
(546, 29, 19, '[\"2\"]', NULL),
(547, 29, 18, '[\"2\"]', NULL),
(548, 29, 19, '[\"1\"]', NULL),
(549, 29, 3, '[\"1\",\"2\"]', NULL),
(550, 29, 4, '[\"1\",\"2\"]', NULL),
(551, 29, 3, '[\"1\"]', NULL),
(552, 29, 4, '[\"3\"]', NULL),
(553, 29, 2, '\"a\"', NULL),
(554, 29, 3, '\"b\"', NULL),
(555, 29, 27, '\"1\"', 1),
(556, 29, 27, '\"1\"', 1),
(557, 29, 20, '\"1\"', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) UNSIGNED NOT NULL,
  `rating` double DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ratable_id` int(11) DEFAULT NULL,
  `ratable_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  `review` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `rating`, `user_id`, `ratable_id`, `ratable_type`, `date_added`, `last_modified`, `review`) VALUES
(1, NULL, NULL, NULL, 'course', 1659931200, NULL, NULL),
(2, 5, NULL, 5, 'course', 1656734400, NULL, 'qwertyuiopssas'),
(3, 4, 81, 5, 'course', 1659758400, NULL, 'Good course'),
(4, 4, 81, 52, 'course', 1659758400, NULL, 'Good course'),
(5, NULL, 81, 62, 'course', 1659844800, NULL, NULL),
(6, NULL, 81, NULL, 'course', 1659844800, NULL, NULL),
(7, NULL, 29, NULL, 'course', 1660708800, NULL, NULL),
(8, 3, 29, 76, 'course', 1660276800, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `object_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `object_id` int(11) DEFAULT NULL,
  `reason` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terminate` int(11) DEFAULT 0,
  `read_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `user_id`, `object_type`, `object_id`, `reason`, `terminate`, `read_status`, `created_at`, `updated_at`) VALUES
(2, 46, 'course', 79, 'test', 1, 1, '2022-05-27 05:46:14', '2022-05-27 05:46:14'),
(3, 46, 'course', 79, 'test', 0, NULL, '2022-05-27 05:50:51', '2022-05-27 05:50:51'),
(4, 6, 'course', 6, 'test report', 1, 1, '2022-05-27 07:29:45', '2022-05-27 07:29:45'),
(5, 48, 'course', 6, 'test ', 0, 1, '2022-05-27 07:31:28', '2022-05-27 07:31:28'),
(6, 48, 'course', 6, 'test', 0, NULL, '2022-05-27 07:31:54', '2022-05-27 07:31:54'),
(7, 48, 'course', 14, 'test report student', 0, NULL, '2022-05-28 05:07:40', '2022-05-28 05:07:40'),
(13, 51, 'course', 6, 'Test Student', 0, 1, '2022-05-28 06:14:52', '2022-05-28 06:14:52'),
(14, 55, 'course', 6, 'test Instructor Report', 0, 1, '2022-05-28 06:16:16', '2022-05-28 06:16:16'),
(19, 1, 'course', 62, 'rthytr', 1, 1, '2022-06-02 10:07:56', '2022-06-02 10:07:56'),
(20, 63, 'course', 79, 'sdvs', 0, NULL, '2022-06-02 10:28:13', '2022-06-02 10:28:13'),
(21, 28, 'course', 76, 'lecture of this course is not understandable ', 1, 1, '2022-06-02 12:25:33', '2022-06-02 12:25:33'),
(22, 57, 'course', 79, 'asca', 1, 1, '2022-06-03 05:09:21', '2022-06-03 05:09:21'),
(23, 40, 'course', 83, 'ffvfdd', 0, 1, '2022-06-09 06:58:04', '2022-06-09 06:58:04'),
(24, 65, 'course', 81, 'test report', 0, 1, '2022-06-14 04:40:02', '2022-06-14 04:40:02'),
(25, 66, 'course', 84, 'vdgfd', 1, 1, '2022-06-14 11:59:26', '2022-06-14 11:59:26'),
(26, 29, 'course', 84, 'VBFDHTRHT', 1, 1, '2022-06-14 12:00:57', '2022-06-14 12:00:57'),
(28, 68, 'course', 86, 'Test', 0, 1, '2022-06-15 10:42:59', '2022-06-15 10:42:59'),
(29, NULL, 'course', NULL, NULL, 0, NULL, '2022-06-19 12:44:55', '2022-06-19 12:44:55'),
(30, 81, 'course', 5, NULL, 0, NULL, '2022-07-02 11:16:45', '2022-07-02 11:16:45'),
(31, 83, 'course', 5, NULL, 0, NULL, '2022-07-02 11:23:01', '2022-07-02 11:23:01'),
(32, 76, 'course', 5, 'qwertyuiop', 0, NULL, '2022-07-02 11:30:45', '2022-07-02 11:30:45'),
(33, 76, 'course', NULL, 'qwertyuiop', 0, NULL, '2022-07-02 11:52:27', '2022-07-02 11:52:27'),
(34, 81, 'course', NULL, 'qwertyuiop', 0, NULL, '2022-07-02 11:53:27', '2022-07-02 11:53:27'),
(35, 82, 'course', NULL, 'qwertyuiop', 0, NULL, '2022-07-02 11:54:40', '2022-07-02 11:54:40'),
(36, 74, 'flag_teacher', NULL, 'qwertyuiop', 0, NULL, '2022-07-02 11:56:32', '2022-07-02 11:56:32'),
(37, 72, 'flag_teacher', 5, 'qwertyuiop', 0, NULL, '2022-07-02 11:56:49', '2022-07-02 11:56:49'),
(38, 72, 'flag_teacher', 5, 'qwertyuiop', 0, NULL, '2022-07-02 11:57:50', '2022-07-02 11:57:50'),
(39, 72, 'flag_organization', 64, 'qwertyuiop', 0, NULL, '2022-07-02 12:05:32', '2022-07-02 12:05:32'),
(40, 76, 'flag_student', NULL, 'qwertyuiop', 0, NULL, '2022-07-02 13:23:14', '2022-07-02 13:23:14'),
(41, 76, 'flag_student', 81, 'qwertyuiop', 0, NULL, '2022-07-02 13:24:14', '2022-07-02 13:24:14'),
(42, 5, 'flag_teacher', 5, 'flag', 0, NULL, '2022-07-15 15:17:49', '2022-07-15 15:17:49'),
(43, 5, 'flag_teacher', 5, 'flag', 0, NULL, '2022-07-15 15:18:04', '2022-07-15 15:18:04'),
(44, 5, 'flag_teacher', NULL, 'vfyvgg', 0, NULL, '2022-07-15 15:20:43', '2022-07-15 15:20:43'),
(45, 59, 'course', 82, 'Gcgcvf', 0, 1, '2022-08-01 17:19:34', '2022-08-01 17:19:34'),
(46, 29, 'flag_teacher', 28, 'reason', 0, NULL, '2022-08-17 07:12:36', '2022-08-17 07:12:36');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `date_added`, `last_modified`) VALUES
(1, 'Admin', 1234567890, 1234567890),
(2, 'User', 1234567890, 1234567890);

-- --------------------------------------------------------

--
-- Table structure for table `sample_videos`
--

CREATE TABLE `sample_videos` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `url` varchar(500) DEFAULT NULL,
  `course_id` varchar(500) DEFAULT NULL,
  `programs_id` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sample_videos`
--

INSERT INTO `sample_videos` (`id`, `title`, `img`, `url`, `course_id`, `programs_id`, `status`) VALUES
(2, 'test', 'uploads/thumbnails/sample_videos/1647073498unnamed.png', 'uploads/videos/sample_videos/1647073498bandicam 2021-10-28 17-22-38-833.mp4', '6', NULL, 'active'),
(3, 'sample video', 'uploads/thumbnails/sample_videos/1647077688unnamed.png', 'uploads/videos/sample_videos/1647077688bandicam 2022-03-04 18-14-51-385.mp4', '19', NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `programs_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `title`, `course_id`, `programs_id`, `order`) VALUES
(7, 'dsvdvdsvdsvfd', 62, NULL, 0),
(8, 'jhgjhk,', 5, NULL, 0),
(9, 'Class 1', 66, NULL, 0),
(13, 'Class 1', 67, NULL, 0),
(14, 'Lesson 1', 68, NULL, 1),
(15, 'Lesson 2', 68, NULL, 2),
(16, 'Lesson 1', 69, NULL, 1),
(17, 'Lesson 2', 69, NULL, 2),
(18, 'Lesson 1', 71, NULL, 0),
(19, 'Lesson 1', 72, NULL, 0),
(20, 'Lesson 1', 73, NULL, 0),
(24, 'Lesson 2', 76, NULL, 0),
(25, 'Lesson 3', 76, NULL, 0),
(26, 'gfbd', 79, NULL, 0),
(28, '1st Test  Section', 81, NULL, 0),
(29, 'Lesson 1', 82, NULL, 0),
(30, 'Introduction ', 83, NULL, 0),
(31, 'Lesson 1', 84, NULL, 0),
(33, 'Lesson 2', 84, NULL, 0),
(36, 'MERN Stack Front To Back: Full Stack React, Redux &amp; Node.js', 89, NULL, 0),
(37, 'qwertyuiop', 89, NULL, 0),
(38, 'sadasdsad', 89, NULL, 0),
(39, 'sdasd', 89, NULL, 0),
(40, 'sdsds', 89, NULL, 0),
(41, 'HEllo', NULL, 1, 0),
(42, 'check', NULL, 1, 0),
(43, 'testing', NULL, 2, 0),
(44, 'dsadsdsdasd', NULL, 1, 0),
(45, 'check', NULL, 1, 0),
(46, 'trst', 84, NULL, 0),
(47, 'asdsads', NULL, 3, 0),
(48, 'sum', 16, NULL, 0),
(49, 'check section', 94, NULL, 0),
(50, 'check section', 96, NULL, 0),
(51, 'asdasdasdsd', 91, NULL, 0),
(52, 'Section 1', 101, NULL, 0),
(53, 'dsg', 103, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`) VALUES
(1, 'language', 'english'),
(2, 'system_name', 'Edutrainia'),
(3, 'system_title', 'Edutrainia'),
(4, 'system_email', 'info@edutrainia.com'),
(5, 'address', 'Pakistan'),
(6, 'phone', '+923330304769'),
(7, 'purchase_code', NULL),
(8, 'paypal', '[{\"active\":\"1\",\"mode\":\"production\",\"sandbox_client_id\":\"ewrewr\",\"sandbox_secret_key\":\"we3e3\",\"production_client_id\":\"asdass\",\"production_secret_key\":\"sdsadas\"}]'),
(9, 'stripe_keys', '[{\"active\":\"1\",\"testmode\":\"on\",\"public_key\":\"pk_test_CAC3cB1mhgkJqXtypYBTGb4f\",\"secret_key\":\"sk_test_iatnshcHhQVRXdygXw3L2Pp2\",\"public_live_key\":\"pk_live_xxxxxxxxxxxxxxxxxxxxxxxx\",\"secret_live_key\":\"sk_live_xxxxxxxxxxxxxxxxxxxxxxxx\"}]'),
(10, 'youtube_api_key', 'youtube-api-key'),
(11, 'vimeo_api_key', 'vimeo-api-key'),
(12, 'slogan', 'A course based video CMS'),
(13, 'text_align', NULL),
(14, 'allow_instructor', '1'),
(15, 'instructor_revenue', '60'),
(16, 'system_currency', 'PKR'),
(17, 'paypal_currency', 'USD'),
(18, 'stripe_currency', 'USD'),
(19, 'author', 'Creativeitem'),
(20, 'currency_position', 'left'),
(21, 'website_description', 'The EDUTRAINIA will contribute to the development by providing online quality education &amp; trainings using global standards.'),
(22, 'website_keywords', 'LMS,Learning Management System,Creativeitem,demo,hello,How are you'),
(23, 'footer_text', 'footer text here'),
(24, 'footer_link', 'https://minibigtech.com'),
(25, 'protocol', 'mail'),
(26, 'smtp_host', 'mail.edutrainia.com'),
(27, 'smtp_port', '465'),
(28, 'smtp_user', 'info@edutrainia.com'),
(29, 'smtp_pass', 'ol^.)~cus+}z'),
(30, 'version', '5.4'),
(31, 'student_email_verification', 'enable'),
(32, 'instructor_application_note', 'Fill all the fields carefully and share if you want to share any document with us it will help us to evaluate you as an instructor.'),
(33, 'razorpay_keys', '[{\"active\":\"0\",\"key\":\"rzp_test_J60bqBOi1z1aF5\",\"secret_key\":\"uk935K7p4j96UCJgHK8kAU4q\",\"theme_color\":\"#c7a600\"}]'),
(34, 'razorpay_currency', 'USD'),
(35, 'fb_app_id', 'App-id'),
(36, 'fb_app_secret', 'App-secret-key'),
(37, 'fb_social_login', '0'),
(38, 'zoom_api_key', '0C_ZeFJYRBy5hrpdkxQk8Q'),
(39, 'zoom_secret_key', 'Zoiz9lFa22D2m8aLbYVFyn4jPmjZwCeuwaC7'),
(40, 'certificate_template', 'This is to certify that Mr. / Ms. {student} successfully completed the course with on certificate for {course}.'),
(41, 'allow_organization', '1'),
(42, 'acinstructor_revenue', '45'),
(43, 'acinstructor_application_note', 'Fill all the fields carefully and share if you want to share any document with us it will help us to evaluate you.'),
(44, 'organization_revenue', '70');

-- --------------------------------------------------------

--
-- Table structure for table `support_category`
--

CREATE TABLE `support_category` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `support_category`
--

INSERT INTO `support_category` (`id`, `title`, `status`) VALUES
(1, 'System Issue', 'active'),
(2, 'Guide', 'active'),
(3, 'Couse issues', 'active'),
(4, 'Crash Issue ', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `support_macro`
--

CREATE TABLE `support_macro` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `support_macro`
--

INSERT INTO `support_macro` (`id`, `title`, `description`) VALUES
(2, 'Steps follow to resolve Issue ', 'Step 1\r\nStep 1\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) UNSIGNED NOT NULL,
  `tag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tagable_id` int(11) DEFAULT NULL,
  `tagable_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `priority` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `title`, `code`, `category_id`, `user_id`, `status`, `priority`, `date`) VALUES
(1, 'Page is not loading', '672803', 1, 20, 'closed', 'high', '1649995200'),
(2, 'Crash Issue', '643006', 1, 22, 'opened', 'medium', '1650340800'),
(3, 'Website Crash Issue', '550927', 1, 22, 'opened', 'medium', '1650340800'),
(4, 'Loading Issue ', '851428', 2, 22, 'opened', 'medium', '1650600000'),
(5, 'Issue', '557889', 1, 28, 'opened', 'medium', '1650945600'),
(6, 'Issue', '808517', 1, 28, 'opened', 'medium', '1650945600'),
(7, 'Issue', '915667', 1, 28, 'opened', 'low', '1650945600'),
(8, 'Loading Issue', '717634', 4, 28, 'opened', 'medium', '1650945600'),
(9, 'sdf', '535091', 3, 79, 'opened', 'low', '1656561600'),
(10, NULL, NULL, NULL, NULL, 'opened', NULL, '1656734400'),
(11, 'qwertyuiop', '8652134', 5, 81, 'opened', 'high', '1656734400'),
(12, 'qwertyuiop', '8652134', 5, 81, 'opened', 'high', '1656734400'),
(13, 'qwertyuiop', '8652134', 5, 81, 'opened', 'high', '1656734400'),
(14, 'qwertyuiop', '8652134', 5, 81, 'opened', 'high', '1656734400'),
(15, 'qwertyuiop', '8652134', 5, 81, 'opened', 'high', '1656734400'),
(16, 'qwertyuiop', '8652134', 5, 81, 'opened', 'high', '1656734400'),
(17, 'qwertyuiop', '8652134', 5, 81, 'opened', 'high', '1656734400'),
(18, 'lOADING ISSUE', '705330', 1, 66, 'opened', 'high', '1658980800');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_description`
--

CREATE TABLE `ticket_description` (
  `id` int(11) UNSIGNED NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `file_name` varchar(50) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ticket_description`
--

INSERT INTO `ticket_description` (`id`, `code`, `user_id`, `description`, `file_name`, `date`) VALUES
(1, '672803', 20, 'I am facing this problem of system', '618954.', '1649995200'),
(2, '672803', 1, 'Hi sahar we are looking into it', '697408.', '1649995200'),
(3, '643006', 22, 'abc', '661733.jpg', '1650340800'),
(4, '550927', 22, 'abc', '553251.docx', '1650340800'),
(5, '550927', 1, 'Okay considered ypur Issue ', '874020.jpg', '1650513600'),
(6, '851428', 22, 'abc', '848688.docx', '1650600000'),
(7, '851428', 1, 'okay Issue resolved', '525220.jpg', '1650600000'),
(8, '851428', 1, 'ok', '606642.', '1650600000'),
(9, '851428', 1, 'anc', '743257.', '1650686400'),
(10, '851428', 1, 'abcn\r\nStep 1\r\nStep 1\r\n', '620130.', '1650686400'),
(11, '557889', 28, '', '913322.jpg', '1650945600'),
(12, '808517', 28, 'Abc', '710736.jpg', '1650945600'),
(13, '915667', 28, 'abc', '752252.docx', '1650945600'),
(14, '717634', 28, 'abc', '595687.docx', '1650945600'),
(15, '535091', 79, 'dsdasdasd', '670938.png', '1656561600'),
(16, NULL, NULL, NULL, '782768.', '1656734400'),
(17, '8652134', 81, NULL, '849544.', '1656734400'),
(18, '8652134', 81, NULL, '851654.', '1656734400'),
(19, '8652134', 81, NULL, '750066.', '1656734400'),
(20, '8652134', 81, 'qwertyuiop', '534294.', '1656734400'),
(21, '8652134', 81, 'qwertyuiop', '678251.', '1656734400'),
(22, '8652134', 81, 'qwertyuiop', '798905.', '1656734400'),
(23, '705330', 66, 'XBGVH', '577563.png', '1658980800');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `skills` longtext COLLATE utf8_unicode_ci NOT NULL,
  `social_links` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `biography` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `last_modified` int(11) DEFAULT NULL,
  `watch_history` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `wishlist` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `paypal_keys` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `stripe_keys` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `verification_code` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `is_instructor` int(11) DEFAULT 0,
  `is_featured_instructor` bit(1) NOT NULL,
  `is_organization` int(11) DEFAULT 0,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `age` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `qualification` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lisenses` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `certification` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `experience` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `postal_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `skills`, `social_links`, `biography`, `role_id`, `date_added`, `last_modified`, `watch_history`, `wishlist`, `title`, `paypal_keys`, `stripe_keys`, `verification_code`, `status`, `is_instructor`, `is_featured_instructor`, `is_organization`, `image`, `phone`, `gender`, `address`, `country`, `age`, `qualification`, `lisenses`, `certification`, `experience`, `postal_address`) VALUES
(1, 'Raheela', 'Farooqui', '', 'humhazir@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '', '{\"facebook\":\"facebook.com\",\"twitter\":\"twitter.com\",\"linkedin\":\"linkedin.com\"}', '<p>abc</p>', 1, NULL, 1651217575, NULL, '[]', 'abc', '[{\"production_client_id\":null,\"production_secret_key\":null}]', '[{\"public_live_key\":null,\"secret_live_key\":null}]', NULL, 1, 1, b'1', NULL, 'c07bb782e43720024a9f7c672c20421b', '', '', '', '', '', '', '', '', '', ''),
(3, 'Ali', 'Raza', '', 'pathanalirazakhan@gmail.com', 'c50ffc648d983b67c0fc36b918ad157c632f083e', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 1, 1644998938, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '104731', 1, 0, b'0', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(4, 'Raheela', 'Farooqui', '', 'humhzir@gmail.com', 'a0cb031b28e2947e20286e8480abae472af142b1', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1645022954, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '154115', 0, 0, b'0', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(5, 'Raheela', 'farooqui', '', 'pkglowyouth@gmail.com', '5362495e0debd6c8620bef106f9ff5a275df4b7d', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1645022981, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '112410', 1, 1, b'0', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(6, 'sajid', 'ahmed', '', 'sajid.msse17@gmai.com', '11c060e95c886b36f956ebe00b70a371a164a7fd', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1645798327, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '181173', 0, 0, b'0', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(7, 'fahad', '123', '', 'fahadmbt404@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1646056680, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '177811', 0, 0, b'0', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(8, 'fahad', '123', '', 'technologiesmbt@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1646057047, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '158578', 1, 0, b'0', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(9, 'Ghulam Muhammad ', 'Pathan ', '', 'gmpathan.shp@gmail.com', 'b9947b94cbe0a2054f209f7e70472e1e9746d646', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', '', 2, 1646148702, 1649656836, '[{\"lesson_id\":\"21\",\"progress\":\"1\"}]', '[\"50\",\"41\"]', '', '[{\"production_client_id\":null,\"production_secret_key\":null}]', '[{\"public_live_key\":null,\"secret_live_key\":null}]', '102038', 1, 1, b'0', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(10, 'admin', 'admin', '', 'admin@gmail.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1646393813, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '183635', 0, 0, b'0', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(12, 'Sahar', 'Muneer', '', 'mbt404@gmail.com', 'cf4c409bc8ddf744a124a7c3c4fb35474964e9fd', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1648101274, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '103916', 0, 0, b'0', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(13, 'Sahar', 'Muneer', '', 'saharsk445@gmail.com', '58fe2a5be8399ff1537b729458826c059270954f', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1648803716, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '171853', 1, 1, b'0', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(15, 'Nadeem', 'Aslam', '', 'nadeemaslam0129@gmail.com', '4794d399f2b4f0e83130cd2b0738e96328d27e57', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1648910495, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '160967', 1, 0, b'0', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(16, 'Sahar', 'Khan', '', 'saharmuneer79@gmail.com', '04d5b8dbcb0b2e317c29bc9a52ad517d79d8acdc', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1649060938, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '153900', 1, 0, b'0', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(17, 'junaid', 'juni', '', 'fitiva5654@procowork.com', '7c222fb2927d828af22f592134e8932480637c0d', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1649658401, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '101274', 1, 0, b'0', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(19, 'Sajid', 'Ahmed', '', 'sajid.msse17@gmail.com', '11c060e95c886b36f956ebe00b70a371a164a7fd', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1649768225, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '132569', 1, 0, b'0', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(24, 'Sahar ', 'Muneer', '', 'lokimi2632@leafzie.com', '04d5b8dbcb0b2e317c29bc9a52ad517d79d8acdc', '', '{\"facebook\":\"facebook.com\",\"twitter\":\"twitter.com\",\"linkedin\":\"linkedin.com\"}', '<p>hdrhgdc tdfhygf tyfhgfc </p>', 2, 1650348363, 1650348677, '[]', '[]', NULL, '[{\"production_client_id\":null,\"production_secret_key\":null}]', '[{\"public_live_key\":null,\"secret_live_key\":null}]', '198561', 1, 1, b'0', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(28, 'Sahar ', 'Muneer', '', 'saharmuneer330@gmail.com', '58fe2a5be8399ff1537b729458826c059270954f', 'Java Developer', '{\"facebook\":\"facebook.com\",\"twitter\":\"twitter.com\",\"linkedin\":\"\"}', '<p>abc</p>', 2, 1650957590, 1650968620, '[]', '[]', 'Software Engineer', '[{\"production_client_id\":null,\"production_secret_key\":null}]', '[{\"public_live_key\":null,\"secret_live_key\":null}]', '141750', 2, 1, b'0', NULL, 'aae2cc97e9de87da551e1730e0cf3317', '', '', '', '', '', '', '', '', '', ''),
(29, 'Maira', 'Khan', '', 'ezanmbt404@gmail.com', '21a2f903885172b4503e6f5eaf6b78880f4712cc', '', '{\"facebook\":\"facebook.com\",\"twitter\":\"twitter.com\",\"linkedin\":\"linkedin.com\"}', 'abcvv', 2, 1650967214, 1650973209, '[{\"lesson_id\":\"16\",\"progress\":\"1\"},{\"lesson_id\":\"18\",\"progress\":\"1\"},{\"lesson_id\":\"17\",\"progress\":\"0\"},{\"lesson_id\":\"19\",\"progress\":\"0\"},{\"lesson_id\":\"24\",\"progress\":\"1\"},{\"lesson_id\":\"20\",\"progress\":\"1\"},{\"lesson_id\":\"33\",\"progress\":\"0\"},{\"lesson_id\":\"32\",\"progress\":\"1\"},{\"lesson_id\":\"38\",\"progress\":\"1\"},{\"lesson_id\":\"43\",\"progress\":\"0\"},{\"lesson_id\":\"41\",\"progress\":\"1\"},{\"lesson_id\":\"52\",\"progress\":\"1\"}]', '[\"32\",\"9\",\"97\",\"5\",\"94\"]', NULL, '[{\"production_client_id\":null,\"production_secret_key\":null}]', '[{\"public_live_key\":null,\"secret_live_key\":null}]', '136051', 1, 0, b'0', NULL, '7820dcff402573402f890bdf04463d29', '', '', '', '', '', '', '', '', '', ''),
(40, 'Sahar ', NULL, 'Muneer', 'nazshafaq760@gmail.com', '504b78af1ee84a1989166271c5d59f5320a1fb9f', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1653118803, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '174595', 1, 1, b'0', NULL, NULL, '03330304772', 'female', '', '', '', '', '', '', '', ''),
(46, 'test', NULL, 'testuser', 'gijehek526@hbehs.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1653393219, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '198584', 2, 1, b'0', NULL, NULL, '032324224252', 'male', '', '', '', '', '', '', '', ''),
(48, 'test student', NULL, 'teststudent', 'teststudent@gmail.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1653483181, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '194953', 0, 0, b'0', NULL, NULL, '03242322422', 'male', '', '', '', '', '', '', '', ''),
(49, 'test', NULL, 'teststudent', 'pasag60816@steamoh.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1653483242, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '144213', 0, 0, b'0', NULL, NULL, '0322324223', 'male', '', '', '', '', '', '', '', ''),
(50, 'test', NULL, 'teststudent', 'mamol99279@sinyago.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1653483384, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '192303', 0, 0, b'0', NULL, NULL, '03242324223', 'male', '', '', '', '', '', '', '', ''),
(51, 'Test Student ', NULL, 'teststudent1', 'joweman861@sinyago.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1653483654, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '108924', 1, 1, b'0', NULL, NULL, '03224322323', 'male', '', '', '', '', '', '', '', ''),
(52, 'test', NULL, 'testteacher', 'rasal15115@steamoh.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1653483811, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '162563', 1, 1, b'0', NULL, NULL, '03223222422', 'male', '', '', '', '', '', '', '', ''),
(55, 'test', NULL, 'TestInstructor', 'radixe5031@sceath.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1653713984, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '182913', 2, 1, b'0', NULL, NULL, '032132324232', 'male', '', '', '', '', '', '', '', ''),
(56, 'test Instructor', NULL, 'testinstructor1', 'sarojox207@runchet.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1653724697, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '132009', 1, 1, b'0', NULL, NULL, '03213232432', 'male', '', '', '', '', '', '', '', ''),
(57, 'test Instructor', NULL, 'testinstructor1', 'lanixe8531@sinyago.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1653725107, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '175337', 1, 1, b'0', NULL, NULL, '032324423232', 'male', '', '', '', '', '', '', '', ''),
(58, 'test Student', NULL, 'TestStudent1', 'yajif76449@steamoh.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1653725377, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '169059', 1, 0, b'0', NULL, NULL, '03232314323', 'male', '', '', '', '', '', '', '', ''),
(59, 'Habiba', NULL, 'Habiba Khan ', 'habibakhan.cress@gmail.com', '58fe2a5be8399ff1537b729458826c059270954f', '', '{\"facebook\":null,\"twitter\":null,\"linkedin\":null}', NULL, 2, 1653982874, 1654591202, '[]', '[]', NULL, '[{\"production_client_id\":null,\"production_secret_key\":null}]', '[{\"public_live_key\":null,\"secret_live_key\":null}]', '188671', 1, 1, b'0', NULL, NULL, '', 'female', 'House no. 2A-4/33, Nazimabad no. 2, opposite Urdu Bazar, near Ameer Hamza mosque, 3rd street on the ', '', '21', 'BS(SE)', '76809', '.', '1', '2A, 4/33, Nazimabad no.2'),
(60, 'Test', NULL, 'Organization', 'fapome3152@steamoh.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1653999587, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '191933', 1, NULL, b'0', 1, NULL, '03232423243', 'male', '', '', '', '', '', '', '', ''),
(61, 'Hafiz Maaz', NULL, 'hafizmaaz62', 'hafizmaaz62@gmail.com', '8b67629a1c62e55944db29a15f37a81ee5b4ccfc', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1654156642, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '158036', 0, 0, b'0', NULL, NULL, '03114868883', 'male', '', '', '', '', '', '', '', ''),
(62, 'Hafiz Maaz', NULL, 'hafizmaaz52', 'hafizmaaz52@gmail.com', 'c50ffc648d983b67c0fc36b918ad157c632f083e', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1654156705, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '175294', 1, 0, b'0', NULL, NULL, '03114868883', 'male', '', '', '', '', '', '', '', ''),
(63, 'maaz', NULL, 'maaz.digitizal', 'maaz.digitizal@gmail.com', 'cb51bcb8cd7ba0c13abccf0f52321ea2b094d853', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1654156861, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '120982', 1, 1, b'0', NULL, NULL, '', 'male', '', '', '', '', '', '', '', ''),
(64, 'Chempoint Academy', NULL, 'Chempoint', 'gmploveu@gmail.com', 'ab8bc2682b6b315d478470af6dcaecc345cb6033', '', '{\"facebook\":null,\"twitter\":null,\"linkedin\":null}', NULL, 2, 1654275941, 1654710515, '[]', '[]', NULL, '[{\"production_client_id\":null,\"production_secret_key\":null}]', '[{\"public_live_key\":null,\"secret_live_key\":null}]', '132602', 1, NULL, b'0', 1, 'decd4df57c450c2c1fb034d601ad7827', '', 'male', 'Shikarpur-Sindh, Pakistan', '', '', '', '', '', '', 'Opposite hassan pharmacy, old saddar mohallah road, shikarpur-78100, Sindh-Pakistan'),
(65, 'Test organization', NULL, 'TestOrganization', 'lekagi4008@musezoo.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1654509040, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '116814', 3, NULL, b'0', 1, NULL, '84593345', 'male', '', '', '', '', '', '', '', ''),
(66, 'Alishba', NULL, 'Alishba', 'alishba.agent@gmail.com', '89bf0574ce85c32125a448436d240cdb40bfaa17', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1654776448, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '102863', 1, 1, b'0', NULL, NULL, '03330304772', 'female', '', '', '', '', '', '', '', ''),
(67, 'MBT', NULL, 'MBT', 'anayambt0000@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1654943302, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '122502', 1, NULL, b'0', 1, NULL, '03330304772', 'female', '', '', '', '', '', '', '', ''),
(68, 'Hashir', NULL, 'hashirali', 'hashir.digitizal@gmail.com', '3044e4b7a7c13b2b09b0e1dfb2c1b3631b5e7099', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1655190891, NULL, '[{\"lesson_id\":\"25\",\"progress\":\"1\"},{\"lesson_id\":\"34\",\"progress\":\"1\"},{\"lesson_id\":\"35\",\"progress\":\"1\"}]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '119993', 1, 0, b'0', 1, NULL, '03358198175', 'male', '', '', '', '', '', '', '', ''),
(69, 'bilal', NULL, 'khurshid', 'bkhurshid45@gmail.com', 'c4de7014f0e5c5f9d9ff4959c579b634f2321b6e', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1655276140, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '162671', 1, 0, b'0', NULL, NULL, '03330630098', 'male', '', '', '', '', '', '', '', ''),
(70, 'Test', 'test', '', 'new@new.com', '7c222fb2927d828af22f592134e8932480637c0d', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', '<p>xyz</p>', 2, 1655360172, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\",\"production_secret_key\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', NULL, 1, 1, b'0', 0, 'f42d347aeda5f9089b17ede24291ad10', '', '', '', '', '', '', '', '', '', ''),
(72, 'Test', 'test', '', 'new@gmail.com', '54e6544cd7277b3b079b325fee045496983f8436', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', '<p>zadasdf</p>', 2, 1655371690, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\",\"production_secret_key\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', NULL, 1, 0, b'0', 1, '4f4caabc8632b1f98f8c93b2979d7518', '', '', '', '', '', '', '', '', '', ''),
(73, 'TechBurner', NULL, 'TechBurner', 'thecresspk@gmail.com', '450dc36386567d8ecb3be0b87e57840ad5ab546e', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1655538746, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '129340', 1, NULL, b'0', 1, '3ffbe6dea663e434eb57aff1e041c558', '03123456789', 'female', '', '', '', '', '', '', '', ''),
(74, 'Faisal', 'Rehman', '', 'faisalarain737@gmail.com', '2a0de520d102ec8a33f1d17287015f7423af8f2e', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1655890607, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '357704', 1, 0, b'0', 0, NULL, '', '', '', '', '', '', '', '', '', ''),
(75, NULL, NULL, '', NULL, 'a8d68ed0367066c0de9e13f8ac71bbb96ca08559', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1656151577, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '214121', 0, 0, b'0', 0, NULL, '', '', '', '', '', '', '', '', '', ''),
(76, 'sufiyan ', NULL, 'sufiyan', 'sufiyan.digitizal@gmail.com', 'b1b72c7d3e73ba587852304f69f061fbf5e1bbf6', '', '{\"facebook\":null,\"twitter\":null,\"linkedin\":null}', NULL, 2, 1656496380, NULL, '[{\"lesson_id\":\"44\",\"progress\":\"1\"},{\"lesson_id\":\"30\",\"progress\":\"0\"},{\"lesson_id\":\"31\",\"progress\":\"1\"},{\"lesson_id\":\"45\",\"progress\":\"1\"},{\"lesson_id\":\"47\",\"progress\":\"1\"}]', '[\"83\",\"84\",\"1\",\"98\"]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '167438', 1, 1, b'0', NULL, NULL, '', 'male', '', '', '', '', '', '', '', ''),
(77, 'Jhon', 'Smith', '', 'jhon@test.com', '7c222fb2927d828af22f592134e8932480637c0d', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1656565467, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '555492', 0, 0, b'0', 0, NULL, '', '', '', '', '', '', '', '', '', ''),
(79, 'Muhammad Sufiyan', 'afsdfasdf', 'sufiyanrao', 'sufiyan@gmail.com', 'e7497845b9b04a88e3cd44a8a5c3098357b8a2ff', '', '{\"facebook\":null,\"twitter\":null,\"linkedin\":null}', '', 2, 1656582348, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '113694', 1, 0, b'0', NULL, NULL, '', 'male', '', '', '', '', '', '', '', ''),
(80, 'Feroz Khan', NULL, 'feroz.khan', 'feroz.fk30@gmail.com', 'e10eae435babd03b7f500e659ada062b52fab6bc', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1656587456, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '185381', 1, 0, b'0', NULL, NULL, '03347788838', 'male', '', '', '', '', '', '', '', ''),
(81, 'Muhammad Sufiyan', 'Rao', '', 'humhazir@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '', '{\"facebook\":null,\"twitter\":null,\"linkedin\":null}', NULL, 2, 1656649235, NULL, '[]', '[\"5\"]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '899249', 1, 1, b'0', 0, NULL, '', '', '', '', '', '', '', '', '', ''),
(82, 'joe', 'clarke', 'joeclarke', 'joeclarke@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 1, 1656649516, NULL, '[{\"lesson_id\":\"41\",\"progress\":\"1\"},{\"lesson_id\":\"43\",\"progress\":\"1\"},{\"lesson_id\":\"33\",\"progress\":\"1\"},{\"lesson_id\":\"38\",\"progress\":\"0\"},{\"lesson_id\":\"44\",\"progress\":\"1\"},{\"lesson_id\":\"46\",\"progress\":\"1\"},{\"lesson_id\":\"32\",\"progress\":\"1\"}]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '594988', 1, 1, b'0', 1, NULL, '', '', '', '', '', '', '', '', '', ''),
(83, 'tony', 'stark', 'tonystark', 'tonystark@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1656649596, NULL, '[]', '[\"65\"]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '824077', 0, 1, b'0', 0, NULL, '', '', '', '', '', '', '', '', '', ''),
(84, 'ahmed', 'ali', '', 'ahmed@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1656909122, NULL, '[]', '[\"65\"]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '519688', 0, 0, b'0', 0, NULL, '', '', '', '', '', '', '', '', '', ''),
(85, NULL, NULL, '', NULL, 'a8d68ed0367066c0de9e13f8ac71bbb96ca08559', '', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL, NULL, NULL, NULL, NULL, 0, b'0', 0, NULL, '', '', '', '', '', '', '', '', '', ''),
(86, NULL, NULL, '', NULL, 'a8d68ed0367066c0de9e13f8ac71bbb96ca08559', '', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL, NULL, NULL, NULL, NULL, 0, b'0', 0, NULL, '', '', '', '', '', '', '', '', '', ''),
(87, NULL, NULL, '', NULL, 'a8d68ed0367066c0de9e13f8ac71bbb96ca08559', '', NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL, NULL, NULL, NULL, NULL, 0, b'0', 0, NULL, '', '', '', '', '', '', '', '', '', ''),
(88, 'anzal', 'khan', '', 'anzal@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1656916855, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '747488', 0, 0, b'0', 0, NULL, '', '', '', '', '', '', '', '', '', ''),
(89, 'Check', 'instructor', '', 'check@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1657001928, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '973026', 1, 0, b'0', 0, NULL, '', '', '', '', '', '', '', '', '', ''),
(90, 'Checks', 'instructors', '', 'checks@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1657001992, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '513946', 1, 1, b'0', 0, NULL, '', '', '', '', '', '', '', '', '', ''),
(91, NULL, NULL, '', 'adsfads@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1657092461, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '405597', 0, 0, b'0', 0, NULL, '', '', '', '', '', '', '', '', '', ''),
(92, 'FAISAL', 'Rehman', '', 'faisalrehmanarain03@gmail.com', '67ef7dc56048b6717953ea324e524d580d24e028', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1657097452, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '134986', 1, 0, b'0', 0, NULL, '', '', '', '', '', '', '', '', '', ''),
(93, 'Uzair', NULL, 'Uzairmbt', 'uzairasifmbt404@gmail.com', '89bf0574ce85c32125a448436d240cdb40bfaa17', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1658315404, NULL, '[{\"lesson_id\":\"32\",\"progress\":\"1\"}]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '195910', 1, 0, b'0', NULL, NULL, '03330304772', 'male', '', '', '', '', '', '', '', ''),
(94, 'Faisal', 'Rehman', 'faisalrehman', 'adfasd@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1658336787, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '701125', 0, 1, b'0', 0, NULL, '', '', '', '', '', '', '', '', '', ''),
(95, 'test', 'test', '', 'test@testuser.com', '841b4f55fe97634f1be00eda25468c986d2f3217', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1658401770, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '336777', 0, 0, b'0', 0, NULL, '', '', '', '', '', '', '', '', '', ''),
(96, 'testing student', NULL, 'testingstudent', 'testingstudent@gmail.com', '21a2f903885172b4503e6f5eaf6b78880f4712cc', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1658489362, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '121569', 1, 0, b'0', NULL, NULL, '', 'male', '', '', '', '', '', '', '', ''),
(97, 'Talha Ansari', NULL, 'talha01', 'talha_ansari@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1658674583, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '181489', 0, 0, b'0', NULL, NULL, '034895632', 'male', '', '', '', '', '', '', '', ''),
(98, 'Minibig Technologies', NULL, 'Minibig Technologies', 'socialminibig@gmail.com', '89bf0574ce85c32125a448436d240cdb40bfaa17', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1659092930, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '152995', 0, NULL, b'0', 1, NULL, '02136600037', 'male', '', '', '', '', '', '', '', ''),
(99, 'Maira Khan', NULL, 'Minibig Technologies', 'socialminibigtech@gmail.com', '89bf0574ce85c32125a448436d240cdb40bfaa17', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1659093038, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '150285', 1, NULL, b'0', 1, NULL, '03330304772', 'male', '', '', '', '', '', '', '', ''),
(100, 'Faisal', 'Rehman', 'FaisalRehman', 'some@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1659463003, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '767958', 0, 1, b'0', 0, NULL, '', '', '', '', '', '', '', '', '', ''),
(101, 'Faisal', 'Rehman', 'FaisalRehman', 'rehman@gmail.com', '89bf0574ce85c32125a448436d240cdb40bfaa17', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1659463033, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '904444', 0, 1, b'0', 0, NULL, '', '', '', '', '', '', '', '', '', ''),
(104, 'hasanali', NULL, 'hasan.ali', 'hasanjafri1991@hotmail.com', '80b9b738be463a2298755020c9a14912b4271a26', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1660251699, NULL, '[{\"lesson_id\":\"53\",\"progress\":\"1\"}]', '[\"5\",\"6\"]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '141281', 1, 0, b'0', NULL, NULL, '023', 'male', '', '', '', '', '', '', '', ''),
(105, 'EduTestOrg ', NULL, 'EduTestOrg', 'tajevo8325@yubua.com', '450dc36386567d8ecb3be0b87e57840ad5ab546e', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1660734330, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '179878', 1, NULL, b'0', 1, NULL, '', 'female', '', '', '', '', '', '', '', ''),
(106, 'Grady Rollins', NULL, 'redom', 'gidym@mailinator.com', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', '', '{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}', NULL, 2, 1660777107, NULL, '[]', '[]', NULL, '[{\"production_client_id\":\"\"}]', '[{\"public_live_key\":\"\",\"secret_live_key\":\"\"}]', '167578', 0, 1, b'0', NULL, NULL, '+1 (474) 973-4131', 'male', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `warnings`
--

CREATE TABLE `warnings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `warning` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `read_status` int(11) DEFAULT NULL,
  `reply` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resolved` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warnings`
--

INSERT INTO `warnings` (`id`, `user_id`, `warning`, `read_status`, `reply`, `resolved`) VALUES
(2, 46, 'test warning', 1, 'test reply', 1),
(6, 51, 'Test Warning', 1, 'Warning Reply', 1),
(7, 46, 'tryr', NULL, NULL, NULL),
(8, 28, 'dfgre', NULL, NULL, NULL),
(9, 40, '.j.kj.kj.jnm.,kj.k/', NULL, NULL, NULL),
(10, 48, 'fdxgcjhbkljl', NULL, NULL, NULL),
(11, 29, 'VGREYFDGVSD', 1, NULL, NULL),
(12, 29, 'dwgregbfdntyklu', 1, 'dxfcWDFDG', 1),
(13, 29, 'ggrhtyjo', 1, 'ok', 1),
(14, 66, 'vsdbd', 1, 'bvbnghm', 1),
(15, 68, 'xyz', 1, NULL, NULL),
(16, 65, '', NULL, NULL, NULL),
(17, 68, 'xyz', 1, NULL, NULL),
(18, 68, 'ccc', 1, NULL, NULL),
(19, 68, 'avx', 1, NULL, NULL),
(20, 68, 'aca', 1, NULL, NULL),
(21, 68, 'aaaa', 1, NULL, NULL),
(22, 68, 'asd', 1, NULL, NULL),
(23, NULL, NULL, NULL, NULL, NULL),
(24, NULL, NULL, NULL, NULL, NULL),
(25, NULL, NULL, NULL, NULL, NULL),
(26, NULL, NULL, NULL, NULL, NULL),
(27, NULL, NULL, NULL, NULL, NULL),
(28, NULL, NULL, NULL, NULL, NULL),
(29, NULL, NULL, NULL, NULL, NULL),
(30, NULL, NULL, NULL, NULL, NULL),
(31, NULL, NULL, NULL, NULL, NULL),
(32, NULL, NULL, NULL, NULL, NULL),
(33, NULL, NULL, NULL, NULL, NULL),
(34, NULL, NULL, NULL, NULL, NULL),
(35, NULL, NULL, NULL, NULL, NULL),
(36, NULL, NULL, NULL, NULL, NULL),
(37, NULL, NULL, NULL, NULL, NULL),
(38, NULL, NULL, NULL, NULL, NULL),
(39, NULL, NULL, NULL, NULL, NULL),
(40, NULL, NULL, NULL, NULL, NULL),
(41, NULL, NULL, NULL, NULL, NULL),
(42, NULL, NULL, NULL, NULL, NULL),
(43, NULL, NULL, NULL, NULL, NULL),
(44, NULL, NULL, NULL, NULL, NULL),
(45, NULL, NULL, NULL, NULL, NULL),
(46, NULL, NULL, NULL, NULL, NULL),
(47, NULL, NULL, NULL, NULL, NULL),
(48, NULL, NULL, NULL, NULL, NULL),
(49, NULL, NULL, NULL, NULL, NULL),
(50, NULL, NULL, NULL, NULL, NULL),
(51, NULL, NULL, NULL, NULL, NULL),
(52, NULL, NULL, NULL, NULL, NULL),
(53, NULL, NULL, NULL, NULL, NULL),
(54, NULL, NULL, NULL, NULL, NULL),
(55, NULL, NULL, NULL, NULL, NULL),
(56, NULL, NULL, NULL, NULL, NULL),
(57, NULL, NULL, NULL, NULL, NULL),
(58, NULL, NULL, NULL, NULL, NULL),
(59, NULL, NULL, NULL, NULL, NULL),
(60, NULL, NULL, NULL, NULL, NULL),
(61, NULL, NULL, NULL, NULL, NULL),
(62, NULL, NULL, NULL, NULL, NULL),
(63, NULL, NULL, NULL, NULL, NULL),
(64, NULL, NULL, NULL, NULL, NULL),
(65, NULL, NULL, NULL, NULL, NULL),
(66, NULL, NULL, NULL, NULL, NULL),
(67, NULL, NULL, NULL, NULL, NULL),
(68, NULL, NULL, NULL, NULL, NULL),
(69, NULL, NULL, NULL, NULL, NULL),
(70, NULL, NULL, NULL, NULL, NULL),
(71, NULL, NULL, NULL, NULL, NULL),
(72, NULL, NULL, NULL, NULL, NULL),
(73, NULL, NULL, NULL, NULL, NULL),
(74, NULL, NULL, NULL, NULL, NULL),
(75, NULL, NULL, NULL, NULL, NULL),
(76, NULL, NULL, NULL, NULL, NULL),
(77, NULL, NULL, NULL, NULL, NULL),
(78, NULL, NULL, NULL, NULL, NULL),
(79, NULL, NULL, NULL, NULL, NULL),
(80, NULL, NULL, NULL, NULL, NULL),
(81, NULL, NULL, NULL, NULL, NULL),
(82, 68, 'asd', 1, NULL, NULL),
(83, NULL, NULL, NULL, NULL, NULL),
(84, NULL, NULL, NULL, NULL, NULL),
(85, NULL, NULL, NULL, NULL, NULL),
(86, NULL, NULL, NULL, NULL, NULL),
(87, NULL, NULL, NULL, NULL, NULL),
(88, NULL, NULL, NULL, NULL, NULL),
(89, NULL, NULL, NULL, NULL, NULL),
(90, NULL, NULL, NULL, NULL, NULL),
(91, NULL, NULL, NULL, NULL, NULL),
(92, NULL, NULL, NULL, NULL, NULL),
(93, NULL, NULL, NULL, NULL, NULL),
(94, NULL, NULL, NULL, NULL, NULL),
(95, NULL, NULL, NULL, NULL, NULL),
(96, NULL, NULL, NULL, NULL, NULL),
(97, NULL, NULL, NULL, NULL, NULL),
(98, NULL, NULL, NULL, NULL, NULL),
(99, NULL, NULL, NULL, NULL, NULL),
(100, NULL, NULL, NULL, NULL, NULL),
(101, NULL, NULL, NULL, NULL, NULL),
(102, NULL, NULL, NULL, NULL, NULL),
(103, NULL, NULL, NULL, NULL, NULL),
(104, NULL, NULL, NULL, NULL, NULL),
(105, NULL, NULL, NULL, NULL, NULL),
(106, NULL, NULL, NULL, NULL, NULL),
(107, NULL, NULL, NULL, NULL, NULL),
(108, NULL, NULL, NULL, NULL, NULL),
(109, NULL, NULL, NULL, NULL, NULL),
(110, NULL, NULL, NULL, NULL, NULL),
(111, NULL, NULL, NULL, NULL, NULL),
(112, NULL, NULL, NULL, NULL, NULL),
(113, 68, 'aaas', 1, NULL, NULL),
(114, NULL, NULL, NULL, NULL, NULL),
(115, NULL, NULL, NULL, NULL, NULL),
(116, NULL, NULL, NULL, NULL, NULL),
(117, NULL, NULL, NULL, NULL, NULL),
(118, NULL, NULL, NULL, NULL, NULL),
(119, NULL, NULL, NULL, NULL, NULL),
(120, NULL, NULL, NULL, NULL, NULL),
(121, NULL, NULL, NULL, NULL, NULL),
(122, NULL, NULL, NULL, NULL, NULL),
(123, NULL, NULL, NULL, NULL, NULL),
(124, NULL, NULL, NULL, NULL, NULL),
(125, NULL, NULL, NULL, NULL, NULL),
(126, NULL, NULL, NULL, NULL, NULL),
(127, NULL, NULL, NULL, NULL, NULL),
(128, NULL, NULL, NULL, NULL, NULL),
(129, NULL, NULL, NULL, NULL, NULL),
(130, NULL, NULL, NULL, NULL, NULL),
(131, NULL, NULL, NULL, NULL, NULL),
(132, NULL, NULL, NULL, NULL, NULL),
(133, NULL, NULL, NULL, NULL, NULL),
(134, NULL, NULL, NULL, NULL, NULL),
(135, NULL, NULL, NULL, NULL, NULL),
(136, NULL, NULL, NULL, NULL, NULL),
(137, NULL, NULL, NULL, NULL, NULL),
(138, 68, 'asasas', 1, NULL, NULL),
(139, 68, '123', 1, NULL, NULL),
(140, 68, 'aa', 1, NULL, NULL),
(141, 68, 'aabbcc', 1, NULL, NULL),
(142, 59, 'Try', 1, 'Ok', 1);

-- --------------------------------------------------------

--
-- Table structure for table `watch_histories`
--

CREATE TABLE `watch_histories` (
  `watch_history_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `watching_lesson_id` int(11) NOT NULL,
  `date_added` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_updated` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `watch_histories`
--

INSERT INTO `watch_histories` (`watch_history_id`, `course_id`, `student_id`, `watching_lesson_id`, `date_added`, `date_updated`) VALUES
(1, 62, 1, 1, '1646400960', '1650348970'),
(2, 72, 22, 13, '1650606359', '1650606394'),
(3, 76, 29, 20, '1650971368', '1660769889'),
(4, 79, 53, 23, '1653543011', '1653544630'),
(5, 76, 58, 24, '1653990638', '1653996716'),
(6, 81, 58, 26, '1654492368', '1654508859'),
(7, 83, 29, 30, '1654677767', '1654678074'),
(8, 84, 29, 38, '1654861324', '1659686534'),
(9, 81, 68, 26, '1655273532', '1655273709'),
(10, 86, 68, 36, '1655275162', '1655284057'),
(11, 81, 79, 25, '1656593697', NULL),
(12, 89, 76, 44, '1657262919', '1658494945'),
(13, 84, 82, 33, '1657859417', '1658495623'),
(14, 83, 76, 31, '1657860205', '1657860212'),
(15, 89, 82, 45, '1657863882', '1658495653'),
(16, 84, 93, 33, '1658317381', NULL),
(17, 84, 76, 34, '1658481118', '1658488983'),
(18, 81, 76, 25, '1658487180', '1658487200'),
(19, 82, 29, 28, '1660769668', NULL),
(20, 82, 104, 28, '1660770299', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academies`
--
ALTER TABLE `academies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `academy_teachers`
--
ALTER TABLE `academy_teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addons`
--
ALTER TABLE `addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrol`
--
ALTER TABLE `enrol`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frontend_settings`
--
ALTER TABLE `frontend_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jitsi_live_class`
--
ALTER TABLE `jitsi_live_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`phrase_id`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `live_class`
--
ALTER TABLE `live_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `message_thread`
--
ALTER TABLE `message_thread`
  ADD PRIMARY KEY (`message_thread_id`);

--
-- Indexes for table `noticeboard`
--
ALTER TABLE `noticeboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offline_payment`
--
ALTER TABLE `offline_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payout`
--
ALTER TABLE `payout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_answers`
--
ALTER TABLE `quiz_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sample_videos`
--
ALTER TABLE `sample_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_category`
--
ALTER TABLE `support_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_macro`
--
ALTER TABLE `support_macro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_description`
--
ALTER TABLE `ticket_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warnings`
--
ALTER TABLE `warnings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `watch_histories`
--
ALTER TABLE `watch_histories`
  ADD PRIMARY KEY (`watch_history_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academies`
--
ALTER TABLE `academies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `academy_teachers`
--
ALTER TABLE `academy_teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `addons`
--
ALTER TABLE `addons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `enrol`
--
ALTER TABLE `enrol`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `frontend_settings`
--
ALTER TABLE `frontend_settings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `jitsi_live_class`
--
ALTER TABLE `jitsi_live_class`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `phrase_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `live_class`
--
ALTER TABLE `live_class`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `message_thread`
--
ALTER TABLE `message_thread`
  MODIFY `message_thread_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `noticeboard`
--
ALTER TABLE `noticeboard`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `offline_payment`
--
ALTER TABLE `offline_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `payout`
--
ALTER TABLE `payout`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `quiz_answers`
--
ALTER TABLE `quiz_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=558;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sample_videos`
--
ALTER TABLE `sample_videos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `support_category`
--
ALTER TABLE `support_category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `support_macro`
--
ALTER TABLE `support_macro`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ticket_description`
--
ALTER TABLE `ticket_description`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `warnings`
--
ALTER TABLE `warnings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `watch_histories`
--
ALTER TABLE `watch_histories`
  MODIFY `watch_history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
