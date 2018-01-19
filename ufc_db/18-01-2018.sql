-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 19, 2018 at 09:17 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ufc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city`) VALUES
(1, 'Karachi'),
(2, 'Lahore'),
(3, 'Faisalabad'),
(4, 'Rawalpindi'),
(5, 'Multan'),
(6, 'Hyderabad'),
(7, 'Gujranwala'),
(8, 'Peshawar'),
(9, 'Islamabad'),
(10, 'Bahawalpur'),
(11, 'Sargodha'),
(12, 'Sialkot'),
(13, 'Quetta'),
(14, 'Sukkur'),
(15, 'Jhang'),
(16, 'Shekhupura'),
(17, 'Mardan'),
(18, 'Gujrat'),
(19, 'Larkana'),
(20, 'Kasur'),
(21, 'Rahim Yar Khan'),
(22, 'Sahiwal'),
(23, 'Okara'),
(24, 'Wah Cantonment'),
(25, 'Dera Ghazi Khan'),
(26, 'Mingora'),
(27, 'Mirpur Khas'),
(28, 'Chiniot'),
(29, 'Nawabshah'),
(30, 'K?moke'),
(31, 'Burewala'),
(32, 'Jhelum'),
(33, 'Sadiqabad'),
(34, 'Khanewal'),
(35, 'Hafizabad'),
(36, 'Kohat'),
(37, 'Jacobabad'),
(38, 'Shikarpur'),
(39, 'Muzaffargarh'),
(40, 'Khanpur'),
(41, 'Gojra'),
(42, 'Bahawalnagar'),
(43, 'Abbottabad'),
(44, 'Muridke'),
(45, 'Pakpattan'),
(46, 'Khuzdar'),
(47, 'Jaranwala'),
(48, 'Chishtian'),
(49, 'Daska'),
(50, 'Bhalwal'),
(51, 'Mandi Bahauddin'),
(52, 'Ahmadpur East'),
(53, 'Kamalia'),
(54, 'Tando Adam'),
(55, 'Khairpur'),
(56, 'Dera Ismail Khan'),
(57, 'Vehari'),
(58, 'Nowshera'),
(59, 'Dadu'),
(60, 'Wazirabad'),
(61, 'Khushab'),
(62, 'Charsada'),
(63, 'Swabi'),
(64, 'Chakwal'),
(65, 'Mianwali'),
(66, 'Tando Allahyar'),
(67, 'Kot Adu'),
(68, 'Turbat');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `expense` varchar(255) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `type`, `expense`, `amount`, `quantity`, `date`, `created_at`, `updated_at`) VALUES
(7, 'utility', 'K.Electric', 15000, NULL, '2018-01-11', '2017-12-11 19:55:01', '2017-12-11 19:55:01'),
(8, 'utility', 'PTCL', 3000, NULL, '2017-12-11', '2017-12-11 19:55:24', '2017-12-11 19:55:24'),
(9, 'utility', 'SSGC', 1000, NULL, '2017-12-11', '2017-12-11 19:55:38', '2017-12-11 19:55:38'),
(10, 'utility', 'Internet', 5000, NULL, '2017-12-11', '2017-12-11 19:55:47', '2017-12-11 19:55:47'),
(11, 'printing', 'Brochers', 10000, NULL, '2017-12-11', '2017-12-11 19:56:08', '2017-12-11 19:56:08'),
(12, 'printing', 'Pads', 20000, NULL, '2017-12-11', '2017-12-11 19:56:17', '2017-12-11 19:56:17'),
(13, 'printing', 'Bottles', 3000, NULL, '2017-12-11', '2017-12-11 19:56:26', '2017-12-11 19:56:26'),
(14, 'marketing', 'Print Media', 45000, NULL, '2017-12-11', '2017-12-11 19:56:46', '2017-12-11 19:56:46'),
(15, 'marketing', 'Social Media', 6000, NULL, '2017-12-11', '2017-12-11 19:56:55', '2017-12-11 19:56:55'),
(16, 'marketing', 'Advertisement Magazine', 5000, NULL, '2017-12-11', '2017-12-11 19:57:06', '2017-12-11 19:57:06'),
(17, 'marketing', 'Advertisement Magazine', 6000, NULL, '2017-12-11', '2017-12-11 19:57:15', '2017-12-11 19:57:15'),
(18, 'production', 'Herbal Water Green', 2500, 62, '2017-12-11', '2017-12-11 19:57:35', '2017-12-11 19:57:35'),
(19, 'production', 'T3 capsule', 6500, 65, '2017-12-09', '2017-12-11 19:57:51', '2017-12-11 19:57:51');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `monitor`
--

CREATE TABLE `monitor` (
  `id` int(11) NOT NULL,
  `present_weight` varchar(255) DEFAULT NULL,
  `result` varchar(55) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `full_payment` varchar(255) DEFAULT NULL,
  `payment_recieved` varchar(255) DEFAULT NULL,
  `balance` varchar(255) DEFAULT NULL,
  `products` varchar(255) DEFAULT NULL,
  `product_quantity` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `neck` int(11) DEFAULT NULL,
  `chest` int(11) DEFAULT NULL,
  `side_buns` int(11) DEFAULT NULL,
  `waist` int(11) DEFAULT NULL,
  `hips` int(11) DEFAULT NULL,
  `thighs` int(11) DEFAULT NULL,
  `arms` int(11) DEFAULT NULL,
  `lower_waist` int(11) DEFAULT NULL,
  `total_inches` int(11) DEFAULT NULL,
  `dov` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `package` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monitor`
--

INSERT INTO `monitor` (`id`, `present_weight`, `result`, `weight`, `full_payment`, `payment_recieved`, `balance`, `products`, `product_quantity`, `gender`, `neck`, `chest`, `side_buns`, `waist`, `hips`, `thighs`, `arms`, `lower_waist`, `total_inches`, `dov`, `user_id`, `created_at`, `updated_at`, `package`) VALUES
(16, '25', '26', 55, '10000', '5000', '5000', '1', '12', 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11-12-2017', 49, '2018-01-11 19:41:59', '2017-12-11 19:41:59', '1 month'),
(17, NULL, NULL, NULL, '10000', '8000', '2000', '1', '23', 'female', 12, 12, 12, 12, 12, 12, 12, 25, 109, '11-12-2017', 52, '2017-12-11 19:46:30', '2017-12-11 19:46:30', '6 month'),
(18, NULL, NULL, NULL, '', '', '', 'Select product', '', 'female', 11, 11, 11, 11, 11, 11, 11, 11, 88, '11-12-2017', 52, '2017-12-11 19:47:09', '2017-12-11 19:47:09', 'Continue'),
(19, NULL, NULL, NULL, '10000', '10000', '0', 'Select product', '', 'female', 1, 10, 12, 15, 5, 5, 15, 15, 78, '11-12-2017', 54, '2017-12-11 19:51:58', '2017-12-11 19:51:58', '3 month'),
(20, NULL, NULL, NULL, '', '', '', 'Select product', '', 'female', 12, 12, 12, 12, 12, 12, 1, 1, 74, '11-12-2017', 54, '2017-12-11 19:52:49', '2017-12-11 19:52:49', 'Continue');

-- --------------------------------------------------------

--
-- Table structure for table `next_visits`
--

CREATE TABLE `next_visits` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `notify` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `next_visits`
--

INSERT INTO `next_visits` (`id`, `user_id`, `date`, `notify`) VALUES
(1, 60, '01/19/2018', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `item_name`) VALUES
(1, 'T3 capsule'),
(2, 'Herbal Water Green'),
(3, 'T4'),
(4, 'herbel cream');

-- --------------------------------------------------------

--
-- Table structure for table `reception`
--

CREATE TABLE `reception` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `youtube_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `youtube_link`, `created_at`, `updated_at`) VALUES
(1, 'YimuIdEZSNY', '2017-11-25 02:05:04', '2017-11-25 14:05:04');

-- --------------------------------------------------------

--
-- Table structure for table `storekeeper`
--

CREATE TABLE `storekeeper` (
  `product_id` int(11) NOT NULL,
  `opening` varchar(255) NOT NULL,
  `recieving` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `used` varchar(255) NOT NULL,
  `closed` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `storekeeper`
--

INSERT INTO `storekeeper` (`product_id`, `opening`, `recieving`, `total`, `used`, `closed`, `created_at`, `updated_at`, `date`) VALUES
(1, '791', '0', '791', '536', '255', '2017-11-29 04:08:16', '2017-11-29 10:40:48', '28-11-2017'),
(2, '700', '0', '700', '255', '445', '2017-11-29 10:42:52', '2017-11-29 10:42:52', '28-11-2017'),
(1, '22', '22', '44', '22', '22', '2017-12-02 15:15:35', '2017-12-02 15:26:17', '02-12-2017'),
(2, '25', '55', '80', '15', '65', '2017-12-04 19:06:36', '2017-12-04 19:06:36', '04-12-2017'),
(1, '51', '23', '74', '20', '54', '2017-12-12 00:37:21', '2017-12-12 00:37:21', '11-12-2017'),
(4, '500', '200', '700', '23', '677', '2017-12-12 00:54:09', '2017-12-12 00:54:09', '11-12-2017');

-- --------------------------------------------------------

--
-- Table structure for table `tcs_delivery`
--

CREATE TABLE `tcs_delivery` (
  `id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `package` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tcs_delivery`
--

INSERT INTO `tcs_delivery` (`id`, `date`, `name`, `area`, `amount`, `status`, `package`, `created_at`, `updated_at`) VALUES
(5, '2017-12-23', 'test', 'test', '1000', 'Recieved', 'OLD/NEW', '2017-12-04 15:33:59', '2017-12-04 15:33:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `f_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `res_phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `office_phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `age` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'admin,receptionist,storekeeper,consultant',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `f_name`, `email`, `password`, `res_phone`, `office_phone`, `mobile`, `address`, `age`, `gender`, `remember_token`, `role`, `created_at`, `updated_at`, `location`, `type`) VALUES
(17, 'Ammar', NULL, 'ammarkhan94@outlook.com', '$2y$10$mPhCcuJvDH2/Kx/m330mcuxajn641AdFWSZq1wRXuT1meIkmT.J2a', NULL, NULL, '923313960846', NULL, '22', NULL, 'snqkSL3wRECAq8oWBeDoFzLxzjeSCZqROx7Mf32sfK2cMP6OwRxabHbSbFhT', 'admin', NULL, '2018-01-18 01:49:07', '', 0),
(46, 'Ammar', NULL, 'account@ufc.com', '$2y$10$dQaLpTXJMyBn6eHHxadTk.6Nl6DhPRmyHr.cp/f.8sZtr8LtlLDK2', NULL, NULL, NULL, NULL, NULL, NULL, 'IpwZzFMy2tBcmdXJse4CTwAmuf8Wk7FD3QtNSzVNgAzCFvyr1GhoFjno8LTg', 'account', '2017-12-04 12:54:54', '2017-12-04 14:47:14', NULL, NULL),
(48, 'store', NULL, 'storekeeper@ufc.com', '$2y$10$ekWlnZutkGXO1ijCDW9F8uslocHjeHGMQUDXS1BMJL1E8ozP010aC', NULL, NULL, NULL, NULL, NULL, NULL, '9nUbEDyC3hfjbIQdP40QfvotUyBDJTLDehulf1XoFbCjADN2MqH7QcwkQshM', 'storekeeper', '2017-12-04 14:01:10', '2017-12-04 14:10:16', NULL, NULL),
(49, 'Ammar', NULL, '', '$2y$10$UY/apjKIy2XELpJnQeNjku3VldVvd8HiFTvL6LSeHNqDoTZeGpbzG', '0212326568', '', '03313960846', NULL, '23', 'male', NULL, NULL, '2017-12-11 19:41:33', '2017-12-11 19:41:33', 'Karachi', 1),
(52, 'sara', NULL, '', '$2y$10$nyeAGpQ6UtfVYiEKaNerW.yBzHWd2BK58tsnZ3zgNx93OLukZf5he', '02156568', '0215554976', '03312554699', NULL, '20', 'female', NULL, NULL, '2017-12-11 19:44:42', '2017-12-11 19:44:42', 'Karachi', 1),
(53, 'wahaj', NULL, '', '$2y$10$d5T5V1sjlq8yTGWo4aJsoOJDyUwlSACY7URvptRSeAAF0wCbV0vQS', '0215565689', '021546598', '033659546896', NULL, '35', 'male', NULL, NULL, '2017-12-11 19:49:39', '2017-12-11 19:49:39', 'Lahore', 1),
(54, 'marium', NULL, '', '$2y$10$lP2KvektfIlHTYB/KVrP8uuQlXxolrII3.y2hCc3Y7uwtXsqqnT16', '021365649', '021546455', '03313656589', NULL, '23', 'female', NULL, NULL, '2017-12-11 19:50:59', '2017-12-11 19:50:59', 'Lahore', 1),
(55, 'Store', NULL, 'storekeeper@ufc.com', '$2y$10$ekWlnZutkGXO1ijCDW9F8uslocHjeHGMQUDXS1BMJL1E8ozP010aC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'storekeeper', NULL, NULL, NULL, NULL),
(58, 'Reception', NULL, 'reception@ufc.com', '$2y$10$NTWBhH2Ma3V8YKfQf.xG.Our1afCdhRABvUPh1nRva9xZUfRxZpaS', NULL, NULL, NULL, NULL, NULL, NULL, '9nUbEDyC3hfjbIQdP40QfvotUyBDJTLDehulf1XoFbCjADN2MqH7QcwkQshM', 'receptionist', '2017-12-04 14:01:10', '2017-12-04 14:10:16', NULL, NULL),
(60, 'Asif', '', 'asifexpert2@gmail.com', '$2y$10$/Mqvxtjr9Hi8yHXs./XXaeolZTX3XHQjDCYbVEkOD7QeNJFEkz0hO', '', '', '03122640061', '', '23', 'male', NULL, NULL, '2018-01-11 01:35:21', '2018-01-18 01:32:18', 'Karachi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_meta`
--

CREATE TABLE `user_meta` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `data` text,
  `history` text,
  `measurment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_meta`
--

INSERT INTO `user_meta` (`id`, `user_id`, `data`, `history`, `measurment`) VALUES
(19, 49, '{\"about_us\":\"facebook\",\"arrival_date\":\"11\\/12\\/2017\",\"arrival_time\":\"13:05\",\"next_visit\":\"12\\/19\\/2017\",\"height\":\"\",\"inch\":\"\",\"actual_weight\":\"\",\"after_bmr_test\":\"\",\"variation_weight\":\"\",\"ideal_weight\":\"\",\"consultant_openion\":\"\",\"loosing_Weight\":\"\"}', '{\"name\":\"\",\"age\":\"\",\"profession\":\"\",\"disease_status\":\"\",\"disease\":\"\",\"martial_status\":\"\",\"year\":\"\",\"childrens_numbers\":\"\",\"over_weight\":\"\",\"delivery_children_by\":\"\",\"dnc_miscarriage\":\"\",\"allergy\":\"\",\"surgery\":\"\",\"diabetic\":\"\",\"hyper_tension\":\"\",\"anemic\":\"\",\"smoke\":\"\",\"smoking\":\"\",\"alcoholic_drink\":\"\",\"extra_drugs\":\"\",\"medication\":\"\",\"menstrual_history\":\"\",\"Days\":\"\",\"frequency\":\"\",\"type\":\"\",\"color\":\"\",\"did_diet\":\"\",\"how_long_diet\":\"\",\"how_much_loose\":\"\",\"regain_weight\":\"\",\"physical_exercise\":\"\"}', '{\"neck\":\"\",\"chest\":\"\",\"side_buns\":\"\",\"after_bmr_test\":\"\",\"hips\":\"\",\"thies\":\"\",\"arms\":\"\"}'),
(21, 52, '{\"about_us\":\"Walk in\",\"arrival_date\":\"11\\/12\\/2017\",\"arrival_time\":\"03:15\",\"next_visit\":\"12\\/22\\/2017\",\"height\":\"5\",\"inch\":\"6\",\"actual_weight\":\"\",\"after_bmr_test\":\"\",\"variation_weight\":\"\",\"ideal_weight\":\"\",\"consultant_openion\":\"\",\"loosing_Weight\":\"\"}', '{\"name\":\"\",\"age\":\"\",\"profession\":\"\",\"disease_status\":\"\",\"disease\":\"\",\"martial_status\":\"\",\"year\":\"\",\"childrens_numbers\":\"\",\"over_weight\":\"\",\"delivery_children_by\":\"\",\"dnc_miscarriage\":\"\",\"allergy\":\"\",\"surgery\":\"\",\"diabetic\":\"\",\"hyper_tension\":\"\",\"anemic\":\"\",\"smoke\":\"\",\"smoking\":\"\",\"alcoholic_drink\":\"\",\"extra_drugs\":\"\",\"medication\":\"\",\"menstrual_history\":\"\",\"Days\":\"\",\"frequency\":\"\",\"type\":\"\",\"color\":\"\",\"did_diet\":\"\",\"how_long_diet\":\"\",\"how_much_loose\":\"\",\"regain_weight\":\"\",\"physical_exercise\":\"\"}', '{\"neck\":\"\",\"chest\":\"\",\"side_buns\":\"\",\"after_bmr_test\":\"\",\"hips\":\"\",\"thies\":\"\",\"arms\":\"\"}'),
(22, 53, '{\"about_us\":\"facebook\",\"arrival_date\":\"11\\/12\\/2017\",\"arrival_time\":\"01:05\",\"next_visit\":\"12\\/13\\/2017\",\"height\":\"5\",\"inch\":\"9\",\"actual_weight\":\"\",\"after_bmr_test\":\"\",\"variation_weight\":\"\",\"ideal_weight\":\"\",\"consultant_openion\":\"\",\"loosing_Weight\":\"\"}', '{\"name\":\"\",\"age\":\"\",\"profession\":\"\",\"disease_status\":\"\",\"disease\":\"\",\"martial_status\":\"\",\"year\":\"\",\"childrens_numbers\":\"\",\"over_weight\":\"\",\"delivery_children_by\":\"\",\"dnc_miscarriage\":\"\",\"allergy\":\"\",\"surgery\":\"\",\"diabetic\":\"\",\"hyper_tension\":\"\",\"anemic\":\"\",\"smoke\":\"\",\"smoking\":\"\",\"alcoholic_drink\":\"\",\"extra_drugs\":\"\",\"medication\":\"\",\"menstrual_history\":\"\",\"Days\":\"\",\"frequency\":\"\",\"type\":\"\",\"color\":\"\",\"did_diet\":\"\",\"how_long_diet\":\"\",\"how_much_loose\":\"\",\"regain_weight\":\"\",\"physical_exercise\":\"\"}', '{\"neck\":\"\",\"chest\":\"\",\"side_buns\":\"\",\"after_bmr_test\":\"\",\"hips\":\"\",\"thies\":\"\",\"arms\":\"\"}'),
(23, 54, '{\"about_us\":\"walkin\",\"arrival_date\":\"11\\/12\\/2017\",\"arrival_time\":\"13:00\",\"next_visit\":\"12\\/22\\/2017\",\"height\":\"5\",\"inch\":\"6\",\"actual_weight\":\"\",\"after_bmr_test\":\"\",\"variation_weight\":\"\",\"ideal_weight\":\"\",\"consultant_openion\":\"\",\"loosing_Weight\":\"\"}', '{\"name\":\"\",\"age\":\"\",\"profession\":\"\",\"disease_status\":\"\",\"disease\":\"\",\"martial_status\":\"\",\"year\":\"\",\"childrens_numbers\":\"\",\"over_weight\":\"\",\"delivery_children_by\":\"\",\"dnc_miscarriage\":\"\",\"allergy\":\"\",\"surgery\":\"\",\"diabetic\":\"\",\"hyper_tension\":\"\",\"anemic\":\"\",\"smoke\":\"\",\"smoking\":\"\",\"alcoholic_drink\":\"\",\"extra_drugs\":\"\",\"medication\":\"\",\"menstrual_history\":\"\",\"Days\":\"\",\"frequency\":\"\",\"type\":\"\",\"color\":\"\",\"did_diet\":\"\",\"how_long_diet\":\"\",\"how_much_loose\":\"\",\"regain_weight\":\"\",\"physical_exercise\":\"\"}', '{\"neck\":\"\",\"chest\":\"\",\"side_buns\":\"\",\"after_bmr_test\":\"\",\"hips\":\"\",\"thies\":\"\",\"arms\":\"\"}'),
(24, 56, '{\"about_us\":\"FB\",\"arrival_date\":\"19\\/12\\/2017\",\"arrival_time\":\"12:00\",\"next_visit\":\"\",\"height\":\"\",\"inch\":\"\",\"actual_weight\":\"\",\"after_bmr_test\":\"\",\"variation_weight\":\"\",\"ideal_weight\":\"\",\"consultant_openion\":\"\",\"loosing_Weight\":\"\"}', '{\"name\":\"\",\"age\":\"\",\"profession\":\"\",\"disease_status\":\"\",\"disease\":\"\",\"martial_status\":\"\",\"year\":\"\",\"childrens_numbers\":\"\",\"over_weight\":\"\",\"delivery_children_by\":\"\",\"dnc_miscarriage\":\"\",\"allergy\":\"\",\"surgery\":\"\",\"diabetic\":\"\",\"hyper_tension\":\"\",\"anemic\":\"\",\"smoke\":\"\",\"smoking\":\"\",\"alcoholic_drink\":\"\",\"extra_drugs\":\"\",\"medication\":\"\",\"menstrual_history\":\"\",\"Days\":\"\",\"frequency\":\"\",\"type\":\"\",\"color\":\"\",\"did_diet\":\"\",\"how_long_diet\":\"\",\"how_much_loose\":\"\",\"regain_weight\":\"\",\"physical_exercise\":\"\"}', '{\"neck\":\"\",\"chest\":\"\",\"side_buns\":\"\",\"after_bmr_test\":\"\",\"hips\":\"\",\"thies\":\"\",\"arms\":\"\"}'),
(26, 59, '{\"about_us\":\"FB\",\"arrival_date\":\"11\\/01\\/2018\",\"arrival_time\":\"12:00\",\"next_visit\":\"01\\/12\\/2018\",\"height\":\"\",\"inch\":\"\",\"actual_weight\":\"\",\"after_bmr_test\":\"\",\"variation_weight\":\"\",\"ideal_weight\":\"\",\"consultant_openion\":\"\",\"loosing_Weight\":\"\"}', '{\"name\":\"\",\"age\":\"\",\"profession\":\"\",\"disease_status\":\"\",\"disease\":\"\",\"martial_status\":\"\",\"year\":\"\",\"childrens_numbers\":\"\",\"over_weight\":\"\",\"delivery_children_by\":\"\",\"dnc_miscarriage\":\"\",\"allergy\":\"\",\"surgery\":\"\",\"diabetic\":\"\",\"hyper_tension\":\"\",\"anemic\":\"\",\"smoke\":\"\",\"smoking\":\"\",\"alcoholic_drink\":\"\",\"extra_drugs\":\"\",\"medication\":\"\",\"menstrual_history\":\"\",\"Days\":\"\",\"frequency\":\"\",\"type\":\"\",\"color\":\"\",\"did_diet\":\"\",\"how_long_diet\":\"\",\"how_much_loose\":\"\",\"regain_weight\":\"\",\"physical_exercise\":\"\"}', '{\"neck\":\"\",\"chest\":\"\",\"side_buns\":\"\",\"after_bmr_test\":\"\",\"hips\":\"\",\"thies\":\"\",\"arms\":\"\"}'),
(27, 60, '{\"about_us\":\"FB\",\"arrival_date\":\"11\\/01\\/2018\",\"arrival_time\":\"12:00\",\"next_visit\":\"01\\/19\\/2018\",\"height\":\"\",\"inch\":\"\",\"actual_weight\":\"\",\"after_bmr_test\":\"\",\"variation_weight\":\"\",\"ideal_weight\":\"\",\"consultant_openion\":\"\",\"loosing_Weight\":\"\"}', '{\"name\":\"\",\"age\":\"\",\"profession\":\"\",\"disease_status\":\"0\",\"disease\":\"\",\"martial_status\":\"\",\"childrens_numbers\":\"\",\"over_weight\":\"0\",\"delivery_children_by\":\"\",\"dnc_miscarriage\":\"0\",\"allergy\":\"0\",\"surgery\":\"0\",\"diabetic\":\"0\",\"hyper_tension\":\"0\",\"anemic\":\"0\",\"smoke\":\"0\",\"smoking\":\"\",\"alcoholic_drink\":\"0\",\"extra_drugs\":\"0\",\"medication\":\"0\",\"menstrual_history\":\"\",\"Days\":\"\",\"frequency\":\"\",\"type\":\"\",\"color\":\"\",\"did_diet\":\"0\",\"how_long_diet\":\"\",\"how_much_loose\":\"\",\"regain_weight\":\"0\",\"physical_exercise\":\"0\"}', '{\"neck\":\"\",\"chest\":\"\",\"side_buns\":\"\",\"after_bmr_test\":\"\",\"hips\":\"\",\"thies\":\"\",\"arms\":\"\"}');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `fb_msg` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `link_from` varchar(255) DEFAULT NULL,
  `gender` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `name`, `fb_msg`, `type`, `phone_number`, `date`, `status`, `source`, `area`, `link_from`, `gender`, `created_at`, `updated_at`) VALUES
(1, 'wahaj', '', 'Inquiry Calls', '0307659856', '25-11-2017', 'waiting', 'facebook', 'gulshan', '', 'male', '2017-12-04 00:49:26', '2017-12-04 12:49:26'),
(2, 'Ammar', '', 'Missed Called', '03313960846', '25-11-2017', 'started', 'facebook', 'gulshan', '', 'male', '2017-11-25 12:37:56', '2017-11-25 12:37:56'),
(3, 'faraz', 'I will contact soon', 'Facebook Messages', '300212451', '25-11-2017', 'active', 'fb', 'gulsjhan', '', 'male', '2017-11-25 12:43:08', '2017-11-25 12:43:08'),
(4, 'iqbal', '', 'Visitors Sheet', '032165698', '25-11-2017', 'active', 'walkin', 'gulshan', '', 'male', '2017-11-25 12:45:00', '2017-11-25 12:45:00'),
(5, 'shariq', '', 'Vcita Sheets', '0342646855', '25-11-2017', 'acitve', 'nothing', 'gulshan', '', 'male', '2017-11-25 12:47:45', '2017-11-25 12:47:45'),
(8, 'test', '', 'Missed Calleds', '121', '02-12-2017', 'tet', 'test', 'da', '', 'male', '2017-12-02 09:28:09', '2017-12-02 09:28:09'),
(9, 'test', '', 'Missed Calleds', '3041', '02-12-2017', 'test', 'test', 'tes', '', 'male', '2017-12-02 09:28:39', '2017-12-02 09:28:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monitor`
--
ALTER TABLE `monitor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `next_visits`
--
ALTER TABLE `next_visits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reception`
--
ALTER TABLE `reception`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tcs_delivery`
--
ALTER TABLE `tcs_delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_meta`
--
ALTER TABLE `user_meta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `monitor`
--
ALTER TABLE `monitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `next_visits`
--
ALTER TABLE `next_visits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reception`
--
ALTER TABLE `reception`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tcs_delivery`
--
ALTER TABLE `tcs_delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `user_meta`
--
ALTER TABLE `user_meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
