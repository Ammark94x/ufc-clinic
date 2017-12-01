-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2017 at 11:29 PM
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
(2, 'Herbal Water Green');

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
(1, '22', '22', '44', '22', '22', '2017-12-02 15:15:35', '2017-12-02 15:26:17', '02-12-2017');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `f_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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
(17, 'Ammar', NULL, 'ammarkhan94@outlook.com', '$2y$10$mPhCcuJvDH2/Kx/m330mcuxajn641AdFWSZq1wRXuT1meIkmT.J2a', NULL, NULL, '923313960846', NULL, '22', NULL, 'UY5sUWau1S5k7DrPU3tikQ6Y7Oe7NbZxlDUk6dmwS6M5ZHEmJRS8MedJ9BRs', 'admin', NULL, '2017-12-02 10:27:11', '', 0);

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
(1, 'wahaj', '', 'Inquiry Calls', '0307659856', '25-11-2017', 'waiting', 'facebook', 'gulshan', '', 'male', '2017-11-25 12:30:39', '2017-11-25 12:30:39'),
(2, 'Ammar', '', 'Missed Called', '03313960846', '25-11-2017', 'started', 'facebook', 'gulshan', '', 'male', '2017-11-25 12:37:56', '2017-11-25 12:37:56'),
(3, 'faraz', 'I will contact soon', 'Facebook Messages', '300212451', '25-11-2017', 'active', 'fb', 'gulsjhan', '', 'male', '2017-11-25 12:43:08', '2017-11-25 12:43:08'),
(4, 'iqbal', '', 'Visitors Sheet', '032165698', '25-11-2017', 'active', 'walkin', 'gulshan', '', 'male', '2017-11-25 12:45:00', '2017-11-25 12:45:00'),
(5, 'shariq', '', 'Vcita Sheets', '0342646855', '25-11-2017', 'acitve', 'nothing', 'gulshan', '', 'male', '2017-11-25 12:47:45', '2017-11-25 12:47:45'),
(6, 'moiz', '', 'Weber Sheets', '033136568', '25-11-2017', 'not intrested', 'facebook', 'none', '', 'male', '2017-11-25 12:49:17', '2017-11-25 12:49:17'),
(8, 'test', '', 'Missed Calleds', '121', '02-12-2017', 'tet', 'test', 'da', '', 'male', '2017-12-02 09:28:09', '2017-12-02 09:28:09'),
(9, 'test', '', 'Missed Calleds', '3041', '02-12-2017', 'test', 'test', 'tes', '', 'male', '2017-12-02 09:28:39', '2017-12-02 09:28:39');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `monitor`
--
ALTER TABLE `monitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `user_meta`
--
ALTER TABLE `user_meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
