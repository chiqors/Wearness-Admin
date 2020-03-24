-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 25, 2020 at 02:59 AM
-- Server version: 10.0.38-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iotsmkco_academy`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_settings`
--

CREATE TABLE `app_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tagline` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_settings`
--

INSERT INTO `app_settings` (`id`, `name`, `logo`, `tagline`, `created_at`, `updated_at`) VALUES
(1, 'Wearness', 'image/asset/Iu4nVxWvAxm57MT65vNQ1HVMa6iMuFPBhV2ow8E9.png', 'IoT Education for Nation', NULL, '2019-11-14 00:40:01');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_feedback`
--

CREATE TABLE `category_feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_projects`
--

CREATE TABLE `category_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_projects`
--

INSERT INTO `category_projects` (`id`, `category`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'Web', 'Web', '2019-11-13 05:04:15', '2019-11-13 05:04:20'),
(2, 'Iot', 'Iot', '2019-11-13 05:04:25', '2019-11-13 05:04:25');

-- --------------------------------------------------------

--
-- Table structure for table `curiculums`
--

CREATE TABLE `curiculums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `curiculums`
--

INSERT INTO `curiculums` (`id`, `title`, `file`, `created_at`, `updated_at`) VALUES
(1, 'test', 'MshpOC1rhdSfzTiZV3eJMiUSEuUxmnO0kC0GSo0k.zip', NULL, '2019-11-14 00:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `premium` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `name`, `email`, `phone_number`, `religion`, `job`, `gender`, `address`, `institution`, `photo`, `birth_date`, `status`, `added`, `premium`, `created_at`, `updated_at`) VALUES
(2, 3, 'Muhammad Aldan', 'al_dan@Yahoo.com', '081394418158', 'null', 'Web Proggrammer', 'Male', 'No 7, Dusun, Cikalong Landeuh, RT.01/RW.01, Banyuasih, Tanjungkerta, Kabupaten Sumedang, Jawa Barat 45354', 'MakerIndo', '1109818549.jpg', '11/20/2019', 'On', 'register', 'false', '2019-11-13 05:03:44', '2019-11-13 05:03:44'),
(3, 4, 'Gg', 'ggzenshop@gmail.com', '085793337068', 'null', 'Penjual', 'Male', 'No 7, Dusun, Cikalong Landeuh, RT.01/RW.01, Banyuasih, Tanjungkerta, Kabupaten Sumedang, Jawa Barat 45354', 'ggzenshop', '236898326.jpg', '11/20/2019', 'On', 'register', 'false', '2019-11-13 05:08:01', '2019-11-13 05:08:01'),
(4, 7, 'An', 'muhammad.an12395@gmail.com', '08080880808', 'Islam', 's', 'Male', 's', '123', 'image/asset/customer/O2NtfoazI4SmDHzrfEbJ2x3z5Rgd6PW33upxZ51I.jpg', '2019-11-15', 'On', 'admin', 'false', '2019-11-13 22:23:36', '2019-11-13 22:23:36');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `device_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `version` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `user_id`, `device_name`, `serial_number`, `version`, `release_year`, `photo`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Iot kit', 'z536Q9goSL', '3', '2019', 'image/asset/device/0HVpowJw9OQzmLcO8dmIzapBkm2yeSfJkMLkOQS8a.png', '10000', 'On stock', '2019-11-13 04:42:08', '2019-11-13 04:42:08'),
(2, NULL, 'Iot kit', 'xmgyBhbSFZ', '3', '2019', 'image/asset/device/1HVpowJw9OQzmLcO8dmIzapBkm2yeSfJkMLkOQS8a.png', '10000', 'On stock', '2019-11-13 04:42:08', '2019-11-13 04:42:08'),
(3, NULL, 'Iot kit', 'HzdPO75E0a', '3', '2019', 'image/asset/device/2HVpowJw9OQzmLcO8dmIzapBkm2yeSfJkMLkOQS8a.png', '10000', 'On stock', '2019-11-13 04:42:08', '2019-11-13 04:42:08'),
(4, NULL, 'Iot kit', 'zFyDDk0zUc', '3', '2019', 'image/asset/device/3HVpowJw9OQzmLcO8dmIzapBkm2yeSfJkMLkOQS8a.png', '10000', 'Delete', '2019-11-13 04:42:09', '2019-11-13 04:59:00'),
(5, 3, 'Iot kit', 'Wb0bFob9I9', '3', '2019', 'image/asset/device/4HVpowJw9OQzmLcO8dmIzapBkm2yeSfJkMLkOQS8a.png', '10000', 'Active', '2019-11-13 04:42:09', '2019-11-13 05:03:44'),
(6, 4, 'Iot kit', 'DMvKM3LgXn', '3', '2019', 'image/asset/device/5HVpowJw9OQzmLcO8dmIzapBkm2yeSfJkMLkOQS8a.png', '10000', 'Active', '2019-11-13 04:42:09', '2019-11-13 05:08:01'),
(7, NULL, 'Iot kit', 'gcUbYkSMEu', '3', '2019', 'image/asset/device/6HVpowJw9OQzmLcO8dmIzapBkm2yeSfJkMLkOQS8a.png', '10000', 'On stock', '2019-11-13 04:42:09', '2019-11-13 04:42:09'),
(8, NULL, 'Iot kit', 'I8j6u0KaSH', '3', '2019', 'image/asset/device/7HVpowJw9OQzmLcO8dmIzapBkm2yeSfJkMLkOQS8a.png', '10000', 'On stock', '2019-11-13 04:42:09', '2019-11-13 04:42:09'),
(9, NULL, 'Iot kit', 'aDvGNZVT5N', '3', '2019', 'image/asset/device/8HVpowJw9OQzmLcO8dmIzapBkm2yeSfJkMLkOQS8a.png', '10000', 'On stock', '2019-11-13 04:42:09', '2019-11-13 04:42:09'),
(10, NULL, 'Iot kit', '0SxodDwUfq', '3', '2019', 'image/asset/device/9HVpowJw9OQzmLcO8dmIzapBkm2yeSfJkMLkOQS8a.png', '10000', 'On stock', '2019-11-13 04:42:09', '2019-11-13 04:42:09');

-- --------------------------------------------------------

--
-- Table structure for table `dev_tables`
--

CREATE TABLE `dev_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'http://url/',
  `url1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'http://url/',
  `url2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'http://url/',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dev_tables`
--

INSERT INTO `dev_tables` (`id`, `url`, `url1`, `url2`, `created_at`, `updated_at`) VALUES
(1, 'https://admin.iot-smk.com', 'http://iot-smk.com', 'http://127.0.0.1:8000', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '#3788d8',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `desc`, `end`, `start`, `color`, `created_at`, `updated_at`) VALUES
(1, 'sadsss', 'updated', '2019-12-02', '2019-11-30', '#00ff40', '2019-11-13 09:57:27', '2019-11-13 12:39:20'),
(3, 'test 2', 'test 2', '2019-11-04', '2019-11-01', '#3788d8', '2019-11-13 10:18:00', '2019-11-13 23:35:32'),
(4, 'Pink', '1', '2019-11-23', '2019-11-21', '#db3584', '2019-11-13 10:30:04', '2019-11-13 10:30:04');

-- --------------------------------------------------------

--
-- Table structure for table `event_instructors`
--

CREATE TABLE `event_instructors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `instructor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_instructors`
--

INSERT INTO `event_instructors` (`id`, `event_id`, `instructor_id`, `created_at`, `updated_at`) VALUES
(7, 4, 1, '2019-11-13 10:30:04', '2019-11-13 10:30:04'),
(16, 1, 1, '2019-11-13 12:39:21', '2019-11-13 12:39:21'),
(17, 1, 2, '2019-11-13 12:39:21', '2019-11-13 12:39:21'),
(18, 3, 1, '2019-11-13 23:35:32', '2019-11-13 23:35:32'),
(19, 3, 2, '2019-11-13 23:35:32', '2019-11-13 23:35:32'),
(20, 3, 4, '2019-11-13 23:35:32', '2019-11-13 23:35:32');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_feedback_id` bigint(20) UNSIGNED NOT NULL,
  `feedback` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `frontend_contacts`
--

CREATE TABLE `frontend_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frontend_contacts`
--

INSERT INTO `frontend_contacts` (`id`, `phone_number`, `email`, `location`, `created_at`, `updated_at`) VALUES
(1, '085793337068', 'makerindo@Mail.com', 'Komplek D amerta residence d7/12 dekete mesjid al fath  desa lengkong kecamatan bojongsoang kabupaten bandung 40287 085793337068', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `frontend_homes`
--

CREATE TABLE `frontend_homes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frontend_homes`
--

INSERT INTO `frontend_homes` (`id`, `title`, `sub`, `created_at`, `updated_at`) VALUES
(1, 'Learn From The Expert\r\n', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime ipsa nulla sed quis rerum amet natus quas necessitatibus.\r\n\r\n\r\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `frontend_programs`
--

CREATE TABLE `frontend_programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frontend_programs`
--

INSERT INTO `frontend_programs` (`id`, `title1`, `sub1`, `title2`, `sub2`, `title3`, `sub3`, `created_at`, `updated_at`) VALUES
(1, 'We Are Excellent In Education\r\n', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem maxime nam porro possimus fugiat quo molestiae illo.\r\n\r\n', 'Strive for Excellent\r\n', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem maxime nam porro possimus fugiat quo molestiae illo.\r\n\r\n', 'Education is life\r\n', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem maxime nam porro possimus fugiat quo molestiae illo.\r\n\r\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `frontend_teachers`
--

CREATE TABLE `frontend_teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expertise` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quote` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `information` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fromdate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `untildate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rekening_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_education` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `user_id`, `name`, `email`, `phone_number`, `photo`, `rekening_number`, `gender`, `religion`, `last_education`, `birth_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 'INstructor', 'instructor1@mail.com', '123123', 'image/asset/instructor/ZWFlmB1zEHziGGzs7p7mUnQZkAppz2WvJzkG7Kwd.jpg', '13', 'Male', 'Islam', '123', '2019-11-22', 'On', '2019-11-13 07:56:24', '2019-11-13 07:56:24'),
(2, 6, 'sad', 'sadinstructor@Mai.lcom', '13', 'image/asset/instructor/t3hq4GW88k4XvNJ2GLGrKNjn3xBGHM3Vo1mpHBT6.jpg', '13', 'Male', 'Islam', '31', '2019-12-07', 'On', '2019-11-13 07:56:46', '2019-11-13 07:56:46'),
(4, 9, 'Instructor 4', 'instructor@test.com', '123', 'image/asset/instructor/ZQ2rJvmO3pWcrv4Sf2kxC1qSWaQ7EBt9n4fKx7zM.jpg', '123', 'Male', 'Islam', '1', '2010-12-31', 'On', '2019-11-13 22:26:00', '2019-11-13 22:26:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2015_09_05_141237_create_verify_users_table', 1),
(4, '2019_08_27_080728_create_devices_table', 1),
(5, '2019_09_02_060211_create_instructors_table', 1),
(6, '2019_09_04_070407_create_customers_table', 1),
(7, '2019_09_09_020543_create_moduls_table', 1),
(8, '2019_09_09_031914_create_curiculums_table', 1),
(9, '2019_09_09_082423_create_silabuses_table', 1),
(10, '2019_09_09_090454_create_information_table', 1),
(11, '2019_09_13_092831_create_sales_table', 1),
(12, '2019_09_14_025712_create_category_projects_table', 1),
(13, '2019_09_17_053119_create_dev_tables_table', 1),
(14, '2019_09_17_105940_create_category_feedback_table', 1),
(15, '2019_09_17_122124_create_feedback_table', 1),
(16, '2019_11_06_123643_create_app_settings_table', 1),
(17, '2019_11_06_132409_create_blogs_table', 1),
(18, '2019_11_06_145855_create_frontend_homes_table', 1),
(19, '2019_11_07_105551_create_frontend_programs_table', 1),
(20, '2019_11_07_111038_create_frontend_teachers_table', 1),
(21, '2019_11_07_114010_create_frontend_contacts_table', 1),
(22, '2019_11_11_123611_create_projects_table', 1),
(23, '2019_11_13_124013_create_events_table', 2),
(24, '2019_11_13_161554_create_event_instructors_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `moduls`
--

CREATE TABLE `moduls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `premimum` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_project_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `user_id`, `category_project_id`, `title`, `url`, `desc`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Web project', 'https://www.youtube.com/embed/Glxr9mb619w', 'First project', '2019-11-13 05:04:49', '2019-11-13 05:05:34'),
(2, 3, 2, 'Second Iot', 'https://www.youtube.com/embed/Glxr9mb619w', 'Second project', '2019-11-13 05:05:59', '2019-11-13 05:05:59'),
(3, 4, 1, 'Test', 'https://www.youtube.com/embed/Id9Zlg833aI', 'sad', '2019-11-13 05:09:14', '2019-11-13 05:11:24'),
(4, 4, 1, 'TEst 2', 'https://www.youtube.com/embed/Id9Zlg833aI', 's', '2019-11-13 05:14:22', '2019-11-13 05:14:22');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buyer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `silabuses`
--

CREATE TABLE `silabuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '3',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `verified`, `email_verified_at`, `password`, `remember_token`, `level`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@makerindo.com', 0, NULL, '$2y$10$pQr.089NgsHgB5s5Ypxil.yS2KnrHG3ZVVXRUDLKe4FU8qvDF25Pq', NULL, '1', '2019-11-13 04:41:33', '2019-11-14 00:01:42'),
(3, 'Muhammad Aldan', 'al_dan@Yahoo.com', 1, NULL, '$2y$10$dvelww3bgzu3oyaSIec78ujOrrhyaMDBKFweEEsZL0jbOKGa4LUEC', NULL, '3', '2019-11-13 05:03:44', '2019-11-13 08:45:45'),
(4, 'Gg', 'ggzenshop@gmail.com', 1, NULL, '$2y$10$G2ht3bbssCmIArpjuBuj6uHsXELB8hCQdMN0ulbyk0Oq7sG.9QSky', NULL, '3', '2019-11-13 05:08:01', '2019-11-13 05:08:31'),
(5, 'INstructor', 'instructor1@mail.com', 2, NULL, '$2y$10$R5xeNFSRzNjcSvjgorINXudvo4GzvH3/qXEfZAkxmxS6O/8RKSXWK', NULL, '2', '2019-11-13 07:56:24', '2019-11-13 07:56:24'),
(6, 'sad', 'sadinstructor@Mai.lcom', 2, NULL, '$2y$10$dXJSXAvGiyySlepYyvfOkOfzGICBd3BGzAG1StqJNlJ8R/neT400e', NULL, '2', '2019-11-13 07:56:46', '2019-11-13 07:56:46'),
(7, 'An', 'muhammad.an12395@gmail.com', 1, NULL, '$2y$10$xLHqE7sAXS3aK5QqDcTdK.05JvyC9nNp2OSSZTUjLZeE7tylCnEP.', NULL, '3', '2019-11-13 22:23:26', '2019-11-13 22:23:26'),
(9, 'Instructor 4', 'instructor@test.com', 2, NULL, '$2y$10$vJmUvFx0yMHpdntl...zkOHiWUkri.f.D5TmHcO5j3ySSt04pYl0O', NULL, '2', '2019-11-13 22:26:00', '2019-11-13 22:26:00'),
(10, 'adminstaff', 'adminstaff@example.com', 0, NULL, '$2y$10$IG0KNfVC311JSXCzWMgDhOa7Lnefr6/EawbY2RqiZjK7ffurF8Qda', NULL, '1', '2019-11-25 16:00:00', '2019-11-25 16:00:00'),
(11, 'instructorstaff', 'instructorstaff@example.com', 2, NULL, '$2y$10$QvnDrMgLq1EbDzjIvCGyEurBTchJM1tSM8NA96h4U2CWJSCIGdl8W', NULL, '2', '2019-11-25 16:00:00', '2019-11-25 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `verify_users`
--

CREATE TABLE `verify_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `verify_users`
--

INSERT INTO `verify_users` (`id`, `user_id`, `token`, `created_at`, `updated_at`) VALUES
(2, 3, '2c115e13792aa75926ab1751819341143f1d5403', '2019-11-13 05:03:44', '2019-11-13 05:03:44'),
(3, 4, '135c3230d8c0d0daafea890cd55607996e592ba9', '2019-11-13 05:08:01', '2019-11-13 05:08:01'),
(4, 7, 'f9b8244dce0dfeb4249c239cdda1eccba6172c15', '2019-11-13 22:23:26', '2019-11-13 22:23:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_settings`
--
ALTER TABLE `app_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_user_id_foreign` (`user_id`);

--
-- Indexes for table `category_feedback`
--
ALTER TABLE `category_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_projects`
--
ALTER TABLE `category_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `curiculums`
--
ALTER TABLE `curiculums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_user_id_foreign` (`user_id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dev_tables`
--
ALTER TABLE `dev_tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_instructors`
--
ALTER TABLE `event_instructors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_instructors_event_id_foreign` (`event_id`),
  ADD KEY `event_instructors_instructor_id_foreign` (`instructor_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedback_category_feedback_id_foreign` (`category_feedback_id`),
  ADD KEY `feedback_user_id_foreign` (`user_id`);

--
-- Indexes for table `frontend_contacts`
--
ALTER TABLE `frontend_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frontend_homes`
--
ALTER TABLE `frontend_homes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frontend_programs`
--
ALTER TABLE `frontend_programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frontend_teachers`
--
ALTER TABLE `frontend_teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instructors_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moduls`
--
ALTER TABLE `moduls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_user_id_foreign` (`user_id`),
  ADD KEY `projects_category_project_id_foreign` (`category_project_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_device_id_foreign` (`device_id`);

--
-- Indexes for table `silabuses`
--
ALTER TABLE `silabuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `verify_users`
--
ALTER TABLE `verify_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `verify_users_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_settings`
--
ALTER TABLE `app_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_feedback`
--
ALTER TABLE `category_feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_projects`
--
ALTER TABLE `category_projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `curiculums`
--
ALTER TABLE `curiculums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dev_tables`
--
ALTER TABLE `dev_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event_instructors`
--
ALTER TABLE `event_instructors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `frontend_contacts`
--
ALTER TABLE `frontend_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `frontend_homes`
--
ALTER TABLE `frontend_homes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `frontend_programs`
--
ALTER TABLE `frontend_programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `frontend_teachers`
--
ALTER TABLE `frontend_teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `moduls`
--
ALTER TABLE `moduls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `silabuses`
--
ALTER TABLE `silabuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `verify_users`
--
ALTER TABLE `verify_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_instructors`
--
ALTER TABLE `event_instructors`
  ADD CONSTRAINT `event_instructors_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_instructors_instructor_id_foreign` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_category_feedback_id_foreign` FOREIGN KEY (`category_feedback_id`) REFERENCES `category_feedback` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `feedback_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `instructors`
--
ALTER TABLE `instructors`
  ADD CONSTRAINT `instructors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_category_project_id_foreign` FOREIGN KEY (`category_project_id`) REFERENCES `category_projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `projects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_device_id_foreign` FOREIGN KEY (`device_id`) REFERENCES `devices` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `verify_users`
--
ALTER TABLE `verify_users`
  ADD CONSTRAINT `verify_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
