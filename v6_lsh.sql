-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2024 at 01:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `v6_lsh`
--

-- --------------------------------------------------------

--
-- Table structure for table `accommodations`
--

CREATE TABLE `accommodations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `accommodation_type_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` text DEFAULT NULL,
  `token` text DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `contact_number` text DEFAULT NULL,
  `contact_email` text DEFAULT NULL,
  `map` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accommodations`
--

INSERT INTO `accommodations` (`id`, `accommodation_type_id`, `name`, `password`, `token`, `photo`, `address`, `contact_number`, `contact_email`, `map`, `status`, `remark`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bayangan Hotel', '$2y$10$wrZnyR2zyyZk36M5bmPW7ewwuWcDg2Tng2ZgpNeXdUF4KrukPBhUm', '', '1718166286.jpg', 'Osukan, Zamboanga Del Norte, Philippines', '0977 829 8391', 'ilovebayangan2019@gmail.com', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11336.716057512067!2d122.5053524!3d8.0645048!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3253c98221b67083%3A0xb2ef693fa07a146e!2sBAYANGAN%20HOTEL%20AND%20BEACH%20RESORT!5e1!3m2!1sen!2sph!4v1712231798704!5m2!1sen!2sph\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'approved', 'active', '2024-04-03 01:14:59', '2024-07-31 14:13:59'),
(3, 3, 'Abetom Apartment', '$2y$10$5QC51cUEzI2bYB02Vl.qPuYj7gJC3PFIwoGh/231wNsu9Pp79yBha', NULL, '1712185727.jpg', 'Antonino, Labason, Zamboanga del Norte', '0945-347-9526', 'abetom_apartment09@gmail.com', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1450.5164855744738!2d122.51732479780912!3d8.066477018422786!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3253c908fffca009%3A0x8059d01c64128706!2sTmpla%20Cafe!5e1!3m2!1sen!2sph!4v1713174487084!5m2!1sen!2sph\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'approved', 'active', '2024-04-03 15:08:47', '2024-04-15 01:48:34'),
(4, 1, 'Casi Hotel', '$2y$10$5QC51cUEzI2bYB02Vl.qPuYj7gJC3PFIwoGh/231wNsu9Pp79yBha', NULL, '1713096503.jpg', 'Padre Zamora St., Gil Sanchez, Labason, Zamboanga Del Norte, Labason, Philippines', '0939 254 2305', 'casihotel.official@gmail.com', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11336.51477239691!2d122.5257506!3d8.0716814!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3253b74fbded0d71%3A0x4ccb873bb0b80a34!2sCASI%20Hotel!5e1!3m2!1sen!2sph!4v1712232319265!5m2!1sen!2sph\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'approved', 'active', '2024-04-04 04:05:30', '2024-08-09 05:53:50'),
(5, 2, 'Maravillas Boarding House', '$2y$10$5QC51cUEzI2bYB02Vl.qPuYj7gJC3PFIwoGh/231wNsu9Pp79yBha', NULL, '1717654585.jpg', 'Gil Sanchez, Labason, Zamboanga del Norte', '097588345678', 'maravillasbh@gmail.com', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11603.954149660089!2d122.52188072092449!3d8.072666771283341!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3253b7fea373cb35%3A0x505c8b5cfad8c559!2sGil%20Sanchez%2C%20Zamboanga%20del%20Norte!5e1!3m2!1sen!2sph!4v1717654570813!5m2!1sen!2sph\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'approved', 'active', '2024-06-05 22:16:25', '2024-06-05 22:16:25'),
(6, 2, 'Sample BH', '$2y$10$5QC51cUEzI2bYB02Vl.qPuYj7gJC3PFIwoGh/231wNsu9Pp79yBha', NULL, '1717997366.jpg', 'Sample address', '46579456461', 'samplebh@gmail.com', 'iugiuooyfvkjnjfgtuiujfd', 'approved', 'active', '2024-06-10 05:29:26', '2024-07-30 13:46:52'),
(7, 3, 'Sample Apartment', '$2y$10$fRww/15XzyI9syPyEN84F.bymeVuh.nar6KlygtkeioKQijLvd9pa', '683311f68ccd88398556fb6e96b00e257778fbd6e9ad3cc5a2e8909bf19992c7', '1718615888.png', 'Sample Address', '0987467885678536', 'apartment@gmail.com', 'ljkhnnsdfklhjgbkjasdcnfg', 'pending', 'active', '2024-06-17 09:06:50', '2024-06-17 09:18:08'),
(8, 1, 'Sample Hotel', '$2y$10$5GnaX8g4hMALbAF453X.CuqLRfNlsq6O.RFZlknrfSxYIOoUR0lXC', '', NULL, 'Sample address', '09123456789', 'sample2024@gmail.com', NULL, 'approved', 'active', '2024-09-03 12:10:31', '2024-09-03 12:15:58');

-- --------------------------------------------------------

--
-- Table structure for table `accommodation_rates`
--

CREATE TABLE `accommodation_rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `accommodation_id` bigint(20) UNSIGNED NOT NULL,
  `rate` int(11) NOT NULL,
  `review_heading` text NOT NULL,
  `review_description` text NOT NULL,
  `remark` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accommodation_rates`
--

INSERT INTO `accommodation_rates` (`id`, `customer_id`, `accommodation_id`, `rate`, `review_heading`, `review_description`, `remark`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 5, 'Excellent! Amazing! Awesome!', 'I absolutely love my stay at Bayangan Hotel. The staffs are friendly and amazing. The room is clean, cool and I am very comfortable. Highly recommended!', 'active', '2024-04-16 21:57:30', '2024-06-14 13:33:43'),
(5, 2, 4, 5, 'Exellent Accommodation!', 'I love my stay at Casi Hotel. The rooms were neat and clean. The staff were friendly and approachable. I feel relaxed and comfy.', 'active', '2024-04-19 01:46:28', '2024-04-19 01:46:28'),
(6, 2, 3, 5, 'Very affordable place to stay!', 'It has been a premium experience staying at Abetom Apartment. I have no regret in booking this accommodation. It\'s very comfy and the room is neat and clean. I have a peace of mind. Highly recommended to everyone!', 'active', '2024-05-13 23:55:44', '2024-05-13 23:55:44'),
(7, 3, 4, 5, 'I love Casi Hotel!', 'I love my stay at Casi Hotel. The room is neat and clean. Staffs are so friendly and approachable. I highly recommend this to anyone!', 'active', '2024-05-14 15:20:00', '2024-06-10 06:26:46'),
(8, 2, 1, 5, 'Heading!', 'Body of the review!', 'active', '2024-09-16 09:07:26', '2024-09-16 09:07:26'),
(9, 2, 1, 5, 'Heading!', 'Sample desc!', 'active', '2024-09-16 09:09:17', '2024-09-16 09:09:17');

-- --------------------------------------------------------

--
-- Table structure for table `accommodation_types`
--

CREATE TABLE `accommodation_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `photo` text NOT NULL,
  `remark` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accommodation_types`
--

INSERT INTO `accommodation_types` (`id`, `name`, `photo`, `remark`, `created_at`, `updated_at`) VALUES
(1, 'Hotel', '1712214129.jpg', 'active', '2024-04-02 20:41:39', '2024-04-26 01:41:22'),
(2, 'Boarding House', '1712214310.webp', 'active', '2024-04-02 20:42:12', '2024-04-03 23:05:10'),
(3, 'Apartment', '1717997244.jpg', 'active', '2024-04-02 20:42:45', '2024-06-10 05:27:24');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `photo`, `token`, `created_at`, `updated_at`) VALUES
(1, 'LSH Admin', 'admin@labason.space', '$2y$10$5QC51cUEzI2bYB02Vl.qPuYj7gJC3PFIwoGh/231wNsu9Pp79yBha', 'admin.svg', '', NULL, '2024-04-18 04:31:57');

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `remark` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `name`, `remark`, `created_at`, `updated_at`) VALUES
(1, 'Toiletries (e.g. Shampoo, lotion, etc.)', 'active', '2024-04-03 15:33:53', '2024-04-03 15:33:53'),
(2, 'Personal care (combs, shaving cream, razor, shower cap, hair dryer)', 'active', '2024-04-03 15:34:08', '2024-04-03 15:34:08'),
(3, 'Coffee Kit (maker, coffee and creamer)', 'active', '2024-04-03 15:34:17', '2024-04-03 15:34:17'),
(4, 'Tissue box', 'active', '2024-04-03 15:34:25', '2024-04-03 15:34:25'),
(5, 'Bathrobes and slippers', 'active', '2024-04-03 15:34:34', '2024-04-03 15:34:34'),
(6, 'Free breakfast', 'active', '2024-04-03 15:34:49', '2024-04-03 15:34:49'),
(7, 'Options for pillows', 'active', '2024-04-03 15:35:02', '2024-04-03 15:35:02'),
(8, 'Free WiFi internet access', 'active', '2024-04-03 15:35:14', '2024-04-03 15:35:14'),
(9, 'Free parking', 'active', '2024-04-03 15:35:25', '2024-04-03 15:35:25'),
(10, 'Premium coffee', 'active', '2024-04-03 15:35:36', '2024-04-03 15:35:36'),
(11, 'Gym or fitness center', 'active', '2024-04-03 15:35:47', '2024-04-03 15:35:47'),
(12, 'Kid Equipment', 'active', '2024-04-03 15:36:34', '2024-04-03 15:36:34'),
(13, 'House Car Service', 'active', '2024-04-03 15:36:58', '2024-04-03 15:36:58'),
(14, 'In-Room Cocktail Station', 'active', '2024-04-03 15:37:18', '2024-04-03 15:37:18'),
(15, 'Musical Instruments', 'active', '2024-04-03 15:37:39', '2024-04-03 15:37:39'),
(16, 'Secured parking garages/assigned parking', 'active', '2024-04-03 15:38:43', '2024-04-03 15:38:43'),
(17, 'Package rooms and package lockers', 'active', '2024-04-03 15:38:57', '2024-04-03 15:38:57'),
(18, 'Online rent payment and maintenance requests', 'active', '2024-04-03 15:39:06', '2024-06-10 05:14:51'),
(19, 'Dishwashers', 'active', '2024-04-03 15:40:15', '2024-04-03 15:40:15'),
(20, 'Communal kitchen', 'active', '2024-04-03 15:41:53', '2024-04-15 01:36:56'),
(21, 'Laundry Area', 'active', '2024-04-03 15:42:03', '2024-04-03 15:44:09'),
(22, 'Parking space', 'active', '2024-04-03 15:42:15', '2024-04-15 01:37:10'),
(24, 'Housekeeping', 'active', '2024-04-03 15:43:44', '2024-04-03 15:43:44'),
(25, 'Sample Amenity', 'deleted', '2024-06-10 05:16:24', '2024-06-10 05:16:34');

-- --------------------------------------------------------

--
-- Table structure for table `booked_rooms`
--

CREATE TABLE `booked_rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_date` text NOT NULL,
  `order_no` text NOT NULL,
  `room_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booked_rooms`
--

INSERT INTO `booked_rooms` (`id`, `booking_date`, `order_no`, `room_id`, `created_at`, `updated_at`) VALUES
(118, '25/06/2024', '1719208409', 1, '2024-06-24 05:53:29', '2024-06-24 05:53:29'),
(119, '26/06/2024', '1719208409', 1, '2024-06-24 05:53:29', '2024-06-24 05:53:29'),
(120, '27/06/2024', '1719208409', 1, '2024-06-24 05:53:29', '2024-06-24 05:53:29'),
(121, '28/06/2024', '1719208409', 1, '2024-06-24 05:53:29', '2024-06-24 05:53:29'),
(122, '25/06/2024', '1719209269', 2, '2024-06-24 06:07:49', '2024-06-24 06:07:49'),
(123, '26/06/2024', '1719209269', 2, '2024-06-24 06:07:49', '2024-06-24 06:07:49'),
(124, '27/06/2024', '1719209269', 2, '2024-06-24 06:07:49', '2024-06-24 06:07:49'),
(125, '28/06/2024', '1719209269', 2, '2024-06-24 06:07:49', '2024-06-24 06:07:49'),
(126, '19/08/2024', '1721994558', 1, '2024-07-26 11:49:18', '2024-07-26 11:49:18'),
(127, '20/08/2024', '1721994558', 1, '2024-07-26 11:49:18', '2024-07-26 11:49:18'),
(128, '21/08/2024', '1721994558', 1, '2024-07-26 11:49:18', '2024-07-26 11:49:18'),
(129, '22/08/2024', '1721994558', 1, '2024-07-26 11:49:18', '2024-07-26 11:49:18'),
(130, '23/08/2024', '1721994558', 1, '2024-07-26 11:49:18', '2024-07-26 11:49:18'),
(131, '18/09/2024', '1726660736', 2, '2024-09-18 11:58:56', '2024-09-18 11:58:56'),
(132, '19/09/2024', '1726660736', 2, '2024-09-18 11:58:56', '2024-09-18 11:58:56'),
(133, '20/09/2024', '1726660736', 2, '2024-09-18 11:58:56', '2024-09-18 11:58:56'),
(134, '21/09/2024', '1726660736', 2, '2024-09-18 11:58:56', '2024-09-18 11:58:56');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `id_type` text NOT NULL,
  `id_image` text NOT NULL,
  `selfie` text NOT NULL,
  `password` text NOT NULL,
  `phone` text DEFAULT NULL,
  `country` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `province` text DEFAULT NULL,
  `city` text DEFAULT NULL,
  `zip` text DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `token` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `remark` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `id_type`, `id_image`, `selfie`, `password`, `phone`, `country`, `address`, `province`, `city`, `zip`, `photo`, `token`, `status`, `remark`, `created_at`, `updated_at`) VALUES
(2, 'Momar Kiram', 'momar@gmail.com', '', '', '', '$2y$10$6PFkgZI0ZKyW9R51hhQXh.yJ9z8mBqFWDlt5V5XY7qKlzIzOHUWea', '09123456789', 'Philippines', 'Antonino', 'Zamboanga del Norte', 'Labason', '7117', '1713523556.jpg', 'edc252625cc64b8faca465ac422aff2bf2ed6982c359ba757597af6d3605f2d5', 1, 'active', '2024-04-06 02:11:39', '2024-05-10 17:15:25'),
(3, 'Jaspher Bagor', 'jaspherbagor0357@gmail.com', '', '', '', '$2y$10$uBgGJ2lBAJ9gCYBtNDqXN.myL/VrwrqVJeXunCZy8gtmpn5j83lgC', '09169675327', 'Philippines', 'Sector 6, Kipit', 'Zamboanga del Norte', 'Labason', '7117', '1715728183.png', '', 1, 'active', '2024-05-14 15:07:09', '2024-06-06 19:22:39'),
(4, 'John Doe', 'john@gmail.com', 'Driver\'s License', 'ID1726658103.jpg', 'Selfie1726658103.jpg', '$2y$10$jg9fyNSbyUqP4ZXYhU59WuapemkgY/8WjYqDNhF4JqmHFn8O/v7t.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '033e1030825b8756b2ac1e776fb6f535e9fdb946cdf472d4792632d1fface9d8', 1, NULL, '2024-09-18 11:15:03', '2024-09-18 12:24:53');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `remark` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `remark`, `created_at`, `updated_at`) VALUES
(1, 'What is your website all about?', 'Labason Safe Haven is a website that lets you book hotel rooms, boarding house or apartment in an effortless way.', 'active', '2024-04-10 04:10:34', '2024-06-10 07:02:53'),
(2, 'sample q', '<p>9uyioyutgh</p>', 'deleted', '2024-06-10 07:03:28', '2024-06-10 07:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` text NOT NULL,
  `heading` text NOT NULL,
  `text` text DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `icon`, `heading`, `text`, `remark`, `created_at`, `updated_at`) VALUES
(1, 'fa fa-bell', 'Personalized Hospitality', 'Elevate your comfort with our personalized service designed for your satisfaction', 'active', '2024-04-03 21:01:02', '2024-04-03 21:04:15'),
(2, 'fa fa-check', 'Instant Confirmation', 'Experience peace of mind with quick confirmations for your bookings', 'active', '2024-04-03 21:05:15', '2024-04-03 21:05:15'),
(3, 'fa fa-lock', 'Secure Payment', 'Ensure safe and stress-free stays with our secure payment system', 'active', '2024-04-03 21:06:33', '2024-04-03 21:06:33'),
(4, 'fa fa-tag', 'Best Price Guarantee', 'Book confidently knowing you\'ll always get the best deal with us', 'active', '2024-04-03 21:07:19', '2024-04-03 21:07:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_17_065004_create_admins_table', 1),
(6, '2024_03_20_023049_create_slides_table', 1),
(7, '2024_03_21_063400_create_features_table', 1),
(8, '2024_03_21_075233_create_testimonials_table', 1),
(9, '2024_03_21_113515_create_posts_table', 1),
(10, '2024_03_22_032923_create_photos_table', 1),
(11, '2024_03_22_052339_create_videos_table', 1),
(12, '2024_03_22_233242_create_faqs_table', 1),
(13, '2024_03_23_032217_create_pages_table', 1),
(14, '2024_03_25_030209_create_subscribers_table', 1),
(15, '2024_03_26_065528_create_amenities_table', 1),
(16, '2024_03_26_122137_create_room_photos_table', 1),
(17, '2024_03_27_093340_create_customers_table', 1),
(18, '2024_04_01_045228_create_settings_table', 1),
(19, '2024_04_02_230623_create_accommodation_types_table', 1),
(20, '2024_04_02_230351_create_accommodations_table', 2),
(21, '2024_03_26_115357_create_rooms_table', 3),
(22, '2024_03_30_011609_create_orders_table', 4),
(23, '2024_03_30_011652_create_order_details_table', 5),
(24, '2024_04_01_023404_create_booked_rooms_table', 6),
(25, '2024_04_11_131657_create_accommodation_rates_table', 7),
(26, '2024_05_13_074942_create_payments_table', 8),
(27, '2024_09_14_220744_create_room_rates_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_no` text NOT NULL,
  `transaction_id` text NOT NULL,
  `accommodation_id` int(11) NOT NULL,
  `payment_method` text NOT NULL,
  `card_last_digit` text DEFAULT NULL,
  `paid_amount` text NOT NULL,
  `booking_date` text NOT NULL,
  `status` text NOT NULL,
  `remark` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `order_no`, `transaction_id`, `accommodation_id`, `payment_method`, `card_last_digit`, `paid_amount`, `booking_date`, `status`, `remark`, `created_at`, `updated_at`) VALUES
(17, 2, '1719208409', '1234567890', 1, 'Gcash', '', '1350', '24/06/2024', 'Completed', 'active', '2024-06-24 05:53:29', '2024-06-24 06:06:23'),
(18, 2, '1719209269', '1234567890', 4, 'Maya', '', '1050', '24/06/2024', 'Completed', 'active', '2024-06-24 06:07:49', '2024-06-24 06:11:33'),
(19, 2, '1721994558', 'yittrokojiouihghnuy876096', 1, 'Gcash', '', '1800', '26/07/2024', 'Completed', 'active', '2024-07-26 11:49:18', '2024-07-26 11:49:18'),
(20, 4, '1726660736', '0-7y985876ytuyiuoi-[', 4, 'Maya', '', '1050', '18/09/2024', 'Pending', 'active', '2024-09-18 11:58:56', '2024-09-18 11:58:56');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `order_no` int(11) NOT NULL,
  `checkin_date` text NOT NULL,
  `checkout_date` text NOT NULL,
  `adult` text NOT NULL,
  `children` text NOT NULL,
  `subtotal` text NOT NULL,
  `remark` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `room_id`, `order_no`, `checkin_date`, `checkout_date`, `adult`, `children`, `subtotal`, `remark`, `created_at`, `updated_at`) VALUES
(18, 17, 1, 1719208409, '25/06/2024', '28/06/2024', '2', '0', '1350', 'active', '2024-06-24 05:53:29', '2024-06-24 05:53:29'),
(19, 18, 2, 1719209269, '25/06/2024', '28/06/2024', '2', '0', '1050', 'active', '2024-06-24 06:07:49', '2024-06-24 06:07:49'),
(20, 19, 1, 1721994558, '19/08/2024', '23/08/2024', '2', '0', '1800', 'active', '2024-07-26 11:49:18', '2024-07-26 11:49:18'),
(21, 20, 2, 1726660736, '18/09/2024', '21/09/2024', '2', '0', '1050', 'active', '2024-09-18 11:58:56', '2024-09-18 11:58:56');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about_heading` text NOT NULL,
  `about_content` text NOT NULL,
  `about_status` int(11) NOT NULL,
  `terms_heading` text NOT NULL,
  `terms_content` text NOT NULL,
  `terms_status` int(11) NOT NULL,
  `privacy_heading` text NOT NULL,
  `privacy_content` text NOT NULL,
  `privacy_status` int(11) NOT NULL,
  `contact_heading` text NOT NULL,
  `contact_map` text DEFAULT NULL,
  `contact_status` int(11) NOT NULL,
  `photo_gallery_heading` text NOT NULL,
  `photo_gallery_status` int(11) NOT NULL,
  `video_gallery_heading` text NOT NULL,
  `video_gallery_status` int(11) NOT NULL,
  `faq_heading` text NOT NULL,
  `faq_status` int(11) NOT NULL,
  `blog_heading` text NOT NULL,
  `blog_status` int(11) NOT NULL,
  `cart_heading` text NOT NULL,
  `cart_status` int(11) NOT NULL,
  `checkout_heading` text NOT NULL,
  `checkout_status` int(11) NOT NULL,
  `payment_heading` text NOT NULL,
  `signup_heading` text NOT NULL,
  `signup_status` int(11) NOT NULL,
  `signin_heading` text NOT NULL,
  `signin_status` int(11) NOT NULL,
  `room_heading` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `about_heading`, `about_content`, `about_status`, `terms_heading`, `terms_content`, `terms_status`, `privacy_heading`, `privacy_content`, `privacy_status`, `contact_heading`, `contact_map`, `contact_status`, `photo_gallery_heading`, `photo_gallery_status`, `video_gallery_heading`, `video_gallery_status`, `faq_heading`, `faq_status`, `blog_heading`, `blog_status`, `cart_heading`, `cart_status`, `checkout_heading`, `checkout_status`, `payment_heading`, `signup_heading`, `signup_status`, `signin_heading`, `signin_status`, `room_heading`, `created_at`, `updated_at`) VALUES
(1, 'About', 'Sample about content of the about page at Labason Safe Haven!', 1, 'Terms and Conditions', '<div>Welcome to <b>Labason Safe Haven</b>! These terms and conditions outline the rules and regulations for using our website and services.</div><div><br></div><div>By accessing our website, you agree to comply with the terms and conditions outlined on this page. Please read them carefully.</div><div><br></div><div><b>1. Use of Our Website</b></div><div><br></div><div>1.1. <b>User Responsibility</b>: By using our website, you acknowledge that you are responsible for ensuring the confidentiality of your account details and for all activities that occur under your account.</div><div><br></div><div>1.2. <b>Appropriate Conduct</b>: You agree to use our website and services responsibly and in compliance with applicable laws and regulations.</div><div><br></div><div>1.3. <b>Intellectual Property</b>: All content on our website, including text, graphics, logos, and software, is the property of Labason Safe Haven and is protected by copyright laws.</div><div><br></div><div><b>2. Booking Process</b></div><div><br></div><div>2.1. <b>Role of Labason Safe Haven</b>: We act as a booking platform, connecting travelers with accommodation providers. We do not own or operate any of the accommodations listed on our website.</div><div><br></div><div>2.2. <b>Direct Contract with Providers</b>: When you book an accommodation through our website, you enter into a direct contractual relationship with the provider. Any specific terms and conditions will be between you and the provider.</div><div><br></div><div>2.3. <b>Accuracy of Information</b>: While we strive to provide accurate information about accommodations, we cannot guarantee the accuracy of all details, such as pricing, availability, or amenities. Verify details directly with the provider before making a booking.</div><div><br></div><div><b>3. Payment and Cancellation</b></div><div><br></div><div>3.1. <b>Payment Process</b>: Payments may be processed through third-party payment processors. You agree to provide accurate payment information and authorize payments in accordance with our policies.</div><div><br></div><div>3.2. <b>Cancellation Policy</b>: Cancellation policies vary depending on the accommodation provider. Please review the cancellation policy specific to your booking before making a reservation.</div><div><br></div><div>3.3. <b>Refunds</b>: Refunds, if applicable, will be processed according to the provider\'s policy. We do not guarantee refunds unless specified by the provider.</div><div><br></div><div><b>4. User Obligations</b></div><div><br></div><div>4.1. <b>Account Security</b>: You are responsible for maintaining the confidentiality of your account credentials and for any activity under your account.</div><div><br></div><div>4.2. <b>Prohibited Activities</b>: You agree not to use our website for any illegal, fraudulent, or unauthorized purposes.</div><div><br></div><div>4.3. <b>Content Submission</b>: Any content you submit to our website must be original and free of copyright infringement. By submitting content, you grant us a non-exclusive license to use, modify, and display the content.</div><div><br></div><div><b>5. Third-Party Links</b></div><div><br></div><div>5.1. <b>External Links</b>: Our website may contain links to third-party websites. We are not responsible for the content or practices of these external sites.</div><div><br></div><div>5.2. <b>Use at Your Risk</b>: Accessing third-party websites through links on our site is at your own risk. We recommend reviewing the terms and conditions of external sites.</div><div><br></div><div><b>6. Limitation of Liability</b></div><div><br></div><div>6.1. <b>No Warranties</b>: We do not provide any warranties regarding the accuracy or completeness of information on our website.</div><div><br></div><div>6.2. <b>Liability Limitations</b>: We are not liable for any indirect, incidental, consequential, or punitive damages arising from your use of our website or services.</div><div><br></div><div>6.3. <b>Provider Responsibilities</b>: Accommodation providers are responsible for the safety, quality, and suitability of their accommodations. We are not liable for any issues related to your booking.</div><div><br></div><div><b>7. Privacy and Data Protection</b></div><div><br></div><div>7.1. <b>Privacy Policy</b>: Please refer to our Privacy Policy for information on how we collect, use, and protect your personal information.</div><div><br></div><div>7.2. <b>User Consent</b>: By using our website, you consent to our collection and use of your personal data in accordance with our Privacy Policy.</div><div><br></div><div><b>8. Governing Law</b></div><div><br></div><div>8.1. <b>Jurisdiction</b>: These terms and conditions are governed by and construed in accordance with the laws of the Philippines.</div><div><br></div><div>8.2. <b>Dispute Resolution</b>: Any disputes arising from these terms and conditions will be subject to the exclusive jurisdiction of the courts of the Philippines.</div><div><br></div><div><b>9. Changes to Terms and Conditions</b></div><div><br></div><div>9.1. <b>Right to Modify</b>: We reserve the right to update or modify these terms and conditions at any time without prior notice.</div><div><br></div><div>9.2. <b>Notification of Changes</b>: Changes will take effect immediately upon posting on our website. By continuing to use our website, you agree to be bound by the updated terms.</div><div><br></div><div><b>10. Contact Us</b></div><div><br></div><div>10.1. <b>Customer Support</b>: If you have any questions or concerns regarding these terms and conditions, please contact us at <b>contact@labason.space</b>.</div><div><br></div><div>Thank you for choosing Labason Safe Haven! By using our services, you agree to these terms and conditions, which are designed to ensure a safe and enjoyable experience for all our users.</div>', 1, 'Privacy Policy', '<div>Welcome to <b>Labason Safe Haven</b>! This privacy policy explains how we collect, use, and protect your personal information when you use our website and services. By using our website, you agree to the practices described in this policy.</div><div><br></div><div><b>1. Information We Collect</b></div><div><br></div><div>1.1. <b>Personal Information</b>: We collect personal information such as your name, email address, phone number, and payment details when you create an account, make a booking, or communicate with us.</div><div><br></div><div>1.2. <b>Usage Information</b>: We may collect non-personal information about your interaction with our website, including IP address, browser type, operating system, and browsing behavior. This information helps us improve your experience and our services.</div><div><br></div><div>1.3. <b>Cookies and Tracking Technologies</b>: Our website uses cookies and other tracking technologies to enhance your browsing experience and provide personalized services. You can manage your cookie preferences through your browser settings.</div><div><br></div><div><b>2. How We Use Your Information</b></div><div><br></div><div>2.1. <b>Provide and Manage Services</b>: We use your personal information to facilitate bookings, communicate with you about reservations, and provide customer support.</div><div><br></div><div>2.2. <b>Personalize Your Experience</b>: We may use your information to customize your experience on our website and recommend accommodations based on your preferences.</div><div><br></div><div>2.3. <b>Improve Our Services</b>: We analyze usage data to understand trends and improve our website and services.</div><div><br></div><div>2.4. <b>Marketing and Communications</b>: With your consent, we may use your information to send you promotional materials, updates, and special offers. You can opt out of marketing communications at any time.</div><div><br></div><div><b>3. How We Protect Your Information</b></div><div><br></div><div>3.1. <b>Data Security</b>: We use industry-standard security measures to protect your personal information from unauthorized access, disclosure, alteration, or destruction.</div><div><br></div><div>3.2. <b>Data Retention</b>: We retain your personal information only for as long as necessary to fulfill the purposes outlined in this policy, unless a longer retention period is required by law.</div><div><br></div><div><b>4. Sharing Your Information</b></div><div><br></div><div>4.1. <b>With Accommodation Providers</b>: We share your information with the accommodation providers you book through our website to facilitate your reservation.</div><div><br></div><div>4.2. <b>With Service Providers</b>: We may share your information with third-party service providers that assist us in operating our website, processing payments, or providing customer support.</div><div><br></div><div>4.3. <b>Legal Compliance</b>: We may disclose your information to comply with legal obligations, such as responding to court orders or regulatory inquiries.</div><div><br></div><div>4.4. <b>Business Transfers</b>: In the event of a merger, acquisition, or sale of assets, your information may be transferred as part of the transaction. We will notify you of any changes affecting your personal information.</div><div><br></div><div><b>5. Your Rights</b></div><div><br></div><div>5.1. <b>Access and Correction</b>: You have the right to access, update, and correct your personal information. You can do this by logging into your account or contacting us directly.</div><div><br></div><div>5.2. <b>Data Portability</b>: You may request a copy of your personal information in a commonly used, machine-readable format.</div><div><br></div><div>5.3. <b>Right to Erasure:</b> You may request the deletion of your personal information in certain circumstances, such as when it is no longer necessary for the purposes for which it was collected.</div><div><br></div><div>5.4. <b>Right to Withdraw Consent</b>: If we rely on your consent for processing your information, you can withdraw that consent at any time.</div><div><br></div><div>5.5. <b>Right to Object</b>: You have the right to object to the processing of your information for direct marketing purposes.</div><div><br></div><div>5.6. <b>Right to Complain</b>: If you believe your privacy rights have been violated, you can file a complaint with us or with a data protection authority.</div><div><br></div><div><b>6. Children\'s Privacy</b></div><div><br></div><div><b>Labason Safe Haven</b> is not intended for use by individuals under the age of 18. We do not knowingly collect personal information from children under 18. If you believe your child has provided us with personal information, please contact us immediately.</div><div><br></div><div><b>7. International Data Transfers</b></div><div><br></div><div>Your personal information may be transferred to and processed in countries other than the country in which you reside. These countries may have different data protection laws, but we ensure that appropriate safeguards are in place to protect your information.</div><div><br></div><div><b>8. Changes to This Privacy Policy</b></div><div><br></div><div>We reserve the right to update or modify this privacy policy at any time. Changes will be effective immediately upon posting on our website. We encourage you to review this policy periodically to stay informed about how we handle your personal information.</div><div><br></div><div><b>9. Contact Us</b></div><div><br></div><div>If you have any questions or concerns about this privacy policy or how we handle your personal information, please contact us at <b>contact@labason.space</b>.</div>', 1, 'Contact Us', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11336.594076201667!2d122.51473116792909!3d8.068854666791182!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3253c81d44ef583f%3A0xbc160eab2e77e43c!2sAntonino%20(Pob.)%2C%20Zamboanga%20del%20Norte!5e1!3m2!1sen!2sph!4v1712215884923!5m2!1sen!2sph\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 1, 'Photo Gallery', 1, 'Video Gallery', 1, 'Frequently Asked Questions (FAQ)', 1, 'Blogs', 1, 'Cart', 1, 'Checkout', 1, 'Payment', 'Register', 1, 'Login', 1, 'Rooms', NULL, '2024-05-14 15:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `accommodation_id` bigint(11) UNSIGNED NOT NULL,
  `gcash_qr` varchar(255) NOT NULL,
  `gcash_name` varchar(255) NOT NULL,
  `gcash_number` varchar(255) NOT NULL,
  `maya_qr` varchar(255) NOT NULL,
  `maya_name` varchar(255) NOT NULL,
  `maya_number` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `accommodation_id`, `gcash_qr`, `gcash_name`, `gcash_number`, `maya_qr`, `maya_name`, `maya_number`, `created_at`, `updated_at`) VALUES
(1, 0, '1715590306.png', 'Anselmo Lerios', '0936-684-0915', 'maya-qr.jpg', 'Momar Kiram', '0970-077-3326', NULL, '2024-05-13 00:51:46'),
(2, 1, '1718517245.png', 'Bayangan Gcash QR', '9868765573362', '1718517245.jpg', 'Bayangan Maya QR', '90857845345', '2024-06-16 05:42:22', '2024-07-26 13:04:39'),
(3, 4, '1721996949.jpg', 'Casi Hotel Gcash', '0912-123-1234', '1721996949.webp', 'Casi Hotel Maya', '0912-123-1234', '2024-06-16 06:36:15', '2024-07-26 12:29:09'),
(4, 8, 'default_gcash_qr.png', 'Input your gcash name', 'ex. 09123456789', 'default_maya_qr.png', 'Input your maya name', 'ex. 09123456789', '2024-09-03 12:17:10', '2024-09-03 12:17:10');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` text NOT NULL,
  `caption` text DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `photo`, `caption`, `remark`, `created_at`, `updated_at`) VALUES
(1, '1712314887.webp', 'Boarding House', 'active', '2024-04-05 03:01:27', '2024-04-05 03:01:27'),
(2, '1712314906.jpg', 'Apartment', 'active', '2024-04-05 03:01:46', '2024-04-05 03:01:46'),
(3, '1712314940.jpg', 'Bayangan Hotel', 'active', '2024-04-05 03:02:20', '2024-04-05 03:03:05'),
(4, '1712315028.jpg', 'Luxurious Room', 'active', '2024-04-05 03:03:48', '2024-04-05 03:03:48'),
(5, '1712316313.webp', 'Boarding House', 'active', '2024-04-05 03:25:13', '2024-04-05 03:25:13');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` text NOT NULL,
  `heading` text NOT NULL,
  `short_content` text NOT NULL,
  `content` text NOT NULL,
  `total_view` int(11) NOT NULL,
  `remark` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `photo`, `heading`, `short_content`, `content`, `total_view`, `remark`, `created_at`, `updated_at`) VALUES
(1, '1712208486.jpg', 'Essential Travel Packing Tips: Pack Smarter, Travel Lighter: Your Guide to Stress-Free Packing', 'Discover top tips and tricks to pack efficiently for your next adventure and travel stress-free.', '<p>Packing efficiently for a trip can be a daunting task, but with the right strategies, you can streamline the process and ensure you have everything you need while traveling light. In this article, we\'ll explore essential travel packing tips to help you pack smarter and travel lighter on your next adventure.</p><p><b>1. Make a Packing List:</b>\r\n<br class=\"Apple-interchange-newline\"></p><p>Before you start packing, make a list of essential items you\'ll need for your trip. This will help you stay organized and avoid forgetting important items. Divide your list into categories such as clothing, toiletries, electronics, and documents to ensure you don\'t overlook anything.</p><p><b>2. Choose Versatile Clothing:</b></p><p>When selecting clothing for your trip, opt for versatile pieces that can be mixed and matched to create multiple outfits. Choose neutral colors and fabrics that are lightweight, breathable, and wrinkle-resistant. Consider the climate and activities you\'ll be participating in to determine the appropriate clothing items to pack.</p><p><b>3. Roll Your Clothes:</b></p><p>Maximize space in your suitcase by rolling your clothes instead of folding them. Rolling your clothes not only saves space but also helps prevent wrinkles and creases. Start with heavier items like jeans and sweaters at the bottom of your suitcase and roll lighter items like t-shirts and underwear on top.</p><p><b>4. Use Packing Cubes:</b></p><p>Invest in packing cubes to keep your clothing and accessories organized and easy to find. Packing cubes come in various sizes and colors and are designed to fit neatly inside your suitcase. Use different cubes for different types of clothing or organize them by outfit to make unpacking a breeze.</p><p><b>5. Pack Light:</b></p><p>When it comes to packing, less is more. Try to pack only the essentials and leave behind items you can live without. Consider your destination and the amenities available, such as laundry facilities, to determine how many clothing items you\'ll need. Remember, you can always buy things you need while traveling.</p><p><b>6. Layer Your Clothing:</b></p><p>Layering is key to staying comfortable and adapting to changing weather conditions while traveling. Pack lightweight layers that can be easily added or removed as needed, such as t-shirts, sweaters, and jackets. Choose fabrics that are moisture-wicking and quick-drying for maximum versatility.</p><p><b>7. Pack Multi-Purpose Items:</b></p><p>Save space in your suitcase by packing multi-purpose items that serve multiple functions. For example, a sarong can double as a beach towel, a picnic blanket, or a scarf, while a lightweight scarf can be used as a wrap, a headscarf, or a makeshift bag.</p><p><b>8. Minimize Toiletries:</b></p><p>Pack travel-sized toiletries to save space in your luggage and comply with TSA regulations. Look for mini versions of your favorite products or invest in reusable travel containers to transfer your toiletries into. Consider purchasing toiletries like shampoo, conditioner, and sunscreen at your destination to save space and weight in your luggage.</p><p><b>9. Leave Room for Souvenirs:</b></p><p>Leave some empty space in your suitcase for souvenirs and gifts you may acquire during your trip. Consider packing a collapsible bag or duffel for extra storage or purchasing a lightweight suitcase with expandable compartments. Remember to check baggage allowances and weight restrictions for both outbound and return flights to avoid excess baggage fees.</p><p><b>10. Pack Essential Documents:</b></p><p>Finally, don\'t forget to pack essential documents such as your passport, visa, travel insurance, and itinerary. Keep these documents organized and easily accessible in a waterproof travel wallet or pouch. Consider making photocopies or digital scans of important documents and storing them securely online or in a separate location in case of loss or theft.</p><p>By following these packing tips, you can pack smarter, travel lighter, and enjoy a stress-free journey to your destination. Bon voyage!</p>', 21, 'active', '2024-04-03 21:28:06', '2024-08-11 07:08:36'),
(2, '1712215345.jpg', 'Top 10 Must-Have Travel Accessories: Essential Gear for Your Journey', 'Explore essential travel accessories that can make your journey more comfortable and enjoyable.', '<p>When preparing for a trip, having the right travel accessories can make all the difference in enhancing your travel experience. In this article, we\'ll explore the top 10 must-have travel accessories that you should consider packing for your next adventure.</p><p><b>1. Travel Pillow:</b></p><p>A comfortable travel pillow can provide much-needed support and help you get some rest during long flights or bus rides.</p><p><b>2. Portable Charger:</b></p><p>Keep your devices powered up on the go with a portable charger. This handy accessory ensures you never run out of battery while traveling.</p><p><b>3. Travel Adapter:</b></p><p>A universal travel adapter allows you to charge your devices in any country, making it essential for international travel.</p><p><b>4. Noise-Canceling Headphones:</b></p><p>Block out unwanted noise and enjoy your favorite music or podcasts with noise-canceling headphones. Perfect for long flights or noisy environments.</p><p><b>5. Travel Wallet:</b></p><p>Keep your passport, boarding passes, and important documents organized and secure with a dedicated travel wallet.</p><p><b>6. Reusable Water Bottle:</b></p><p>Stay hydrated while traveling with a reusable water bottle. Many airports and tourist attractions have water refill stations, allowing you to avoid single-use plastic bottles.</p><p><b>7. Packing Cubes:</b></p><p>Keep your clothing and accessories organized and easy to find with packing cubes. These handy organizers make packing and unpacking a breeze.</p><p><b>8. Lightweight Backpack:</b></p><p>A lightweight backpack is perfect for day trips and excursions, allowing you to carry your essentials comfortably while exploring.</p><p><b>9. Travel-Sized Toiletries:</b></p><p>Pack travel-sized toiletries to save space in your luggage and comply with TSA regulations. Look for mini versions of your favorite products or invest in reusable travel containers.</p><p><b>10. Luggage Locks:</b></p><p>Keep your belongings safe and secure with luggage locks. Choose TSA-approved locks for hassle-free security checks at airports.</p><p>By packing these essential travel accessories, you can ensure you\'re prepared for any adventure and make the most of your travel experience.</p>', 30, 'active', '2024-04-03 22:37:04', '2024-06-10 04:11:09'),
(3, '1712213126.jpg', 'Global Gastronomy: 5 Culinary Adventures for Solo Foodies: Savor the World\'s Flavors', 'Dive into a world of flavors with these 5 culinary adventures, perfect for solo travelers passionate about food.', '<p>For solo travelers who are passionate about exploring different cuisines and culinary traditions, the world is a treasure trove of gastronomic delights waiting to be discovered. In this article, we\'ll explore 5 culinary experiences that promise solo foodies unforgettable tastes and flavors from around the globe.</p><p><br></p><p><b>1. Street Food Safari:</b></p><p>Embarking on a street food safari is like diving headfirst into the heart of a destination\'s culinary culture. Wander through bustling street markets, where the air is thick with the aromas of sizzling meats, aromatic spices, and freshly baked goods. Sample a variety of dishes from local vendors and food stalls, from piping hot dumplings and crispy spring rolls to sweet treats like freshly made crepes and exotic fruit skewers. Street food markets are not only a feast for the senses but also a window into the daily lives of locals, where you can mingle with street vendors and fellow food enthusiasts alike.</p><p><br></p><p><b>2. Cooking Class Adventure:</b></p><p>A cooking class adventure offers solo travelers the opportunity to roll up their sleeves and get hands-on in the kitchen. Whether it\'s mastering the art of making handmade pasta in Italy, whipping up spicy curries in Thailand, or learning the secrets of sushi-making in Japan, cooking classes provide an immersive culinary experience like no other. Led by expert chefs and local cooks, these classes delve deep into the traditional techniques, ingredients, and flavors of a destination\'s cuisine. Not only do cooking classes offer solo travelers the chance to learn new skills and recipes, but they also provide a unique insight into the cultural heritage and culinary traditions of a region.</p><p><br></p><p><b>3. Market Exploration:</b></p><p>Exploring bustling markets is a sensory adventure that solo travelers won\'t want to miss. From sprawling outdoor bazaars to historic indoor markets, these vibrant hubs of activity are a treasure trove of fresh produce, spices, and artisanal products unique to each destination. Wander through stalls piled high with colorful fruits and vegetables, inhale the intoxicating scents of exotic spices and herbs, and browse handcrafted goods and souvenirs made by local artisans. Whether you\'re bargaining for the freshest seafood, sampling street snacks, or simply soaking up the bustling atmosphere, market exploration offers solo travelers an authentic taste of local life and culture.</p><p><br></p><p><b>4. Food Tour Feast:</b></p><p>Joining a food tour is the perfect way for solo travelers to discover the culinary secrets of a destination with the guidance of local experts. Led by knowledgeable guides, food tours take you on a gastronomic journey through the streets and neighborhoods of a city, where you\'ll sample an array of dishes from hidden gems and local eateries. From savory street food to sweet treats, each stop offers a tantalizing taste of the region\'s culinary scene, accompanied by fascinating stories and insights into the history and culture behind the food. Whether you\'re exploring bustling night markets, historic food districts, or off-the-beaten-path neighborhoods, a food tour feast promises solo travelers an unforgettable culinary adventure filled with flavors, aromas, and discoveries.</p><p><br></p><p><b>5. Dining Solo:</b></p><p>Dining solo is a liberating experience that allows solo travelers to indulge their culinary cravings on their own terms. Whether you\'re sampling street food from a bustling market stall, enjoying a leisurely meal at a cozy cafe, or dining at a fine-dining restaurant, solo dining offers the freedom to explore a destination\'s culinary scene at your own pace. Solo travelers can savor each bite, engage with locals and fellow diners, and soak up the ambiance of their surroundings without the pressure of keeping up with group dynamics. Whether you\'re a seasoned solo traveler or embarking on your first solo adventure, dining solo offers a chance to connect with the flavors of a destination and create memorable culinary experiences that will last a lifetime.</p><p><br></p><p>For solo travelers with a love for food and adventure, these 5 culinary experiences offer a tantalizing glimpse into the diverse flavors and cuisines of the world. From street food safaris to cooking class adventures, market explorations, food tour feasts, and dining solo, each experience promises unforgettable tastes and discoveries that will delight the senses and nourish the soul. Embark on a solo culinary journey and taste your way through the rich tapestry of global gastronomy, one delicious bite at a time.</p>', 22, 'active', '2024-04-03 22:45:26', '2024-06-06 19:26:05');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `accommodation_id` bigint(20) UNSIGNED NOT NULL,
  `room_name` text NOT NULL,
  `description` text NOT NULL,
  `price` text NOT NULL,
  `total_rooms` text NOT NULL,
  `amenities` text DEFAULT NULL,
  `size` text DEFAULT NULL,
  `total_beds` text DEFAULT NULL,
  `total_bathrooms` text DEFAULT NULL,
  `total_balconies` text DEFAULT NULL,
  `total_guests` text DEFAULT NULL,
  `featured_photo` text NOT NULL,
  `video_id` text DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `status` text NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `accommodation_id`, `room_name`, `description`, `price`, `total_rooms`, `amenities`, `size`, `total_beds`, `total_bathrooms`, `total_balconies`, `total_guests`, `featured_photo`, `video_id`, `remark`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Standard Room', '<p>This is a description for a standard room</p>', '450', '2', '1,2,3,4,5,6,7,8', '60', '1', '1', '1', '2', '1712264174.jpg', 'qemqQHaeCYo', 'active', 'published', '2024-04-04 12:56:14', '2024-08-09 05:41:17'),
(2, 4, 'Single Room', '<p>This is a description of a single room</p>', '350', '2', '1,2,3,4,5,8,9,16', '50 sq. meters', '1', '1', '0', '2', '1712659450.jpg', 's8vnc9l8sz4', 'active', 'published', '2024-04-09 02:44:10', '2024-08-09 05:53:50'),
(3, 3, 'Room 001', '<p>This is a sample description of a room 1 in Abetom Apartment</p>', '3600', '1', '4,5,7,8,9,19,21,22', '60 sq. meters', '1', '1', '0', '3', '1713173100.jpg', 'T3Oo7VaeW-E', 'active', 'pending', '2024-04-15 01:25:00', '2024-04-15 01:25:00'),
(4, 5, 'BH Room 1', '<p>This is a short description for the bh room 1</p>', '1500', '1', '2,7,18,20,21', '40 sq. meters', '2', '1', '0', '2', '1717654759.jpg', 'kljghjhf', 'active', 'pending', '2024-06-05 22:19:19', '2024-06-05 22:19:19'),
(5, 1, 'Deluxe Room', '<p>This is a sample description for the deluxe room</p>', '360', '3', '5,11,15', '60 sq. meters', '2', '1', '0', '2', '1718626723.jpg', 'MCxlipHR4mY', 'active', 'pending', '2024-06-17 10:48:23', '2024-06-17 12:18:43');

-- --------------------------------------------------------

--
-- Table structure for table `room_photos`
--

CREATE TABLE `room_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` int(11) NOT NULL,
  `photo` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_photos`
--

INSERT INTO `room_photos` (`id`, `room_id`, `photo`, `created_at`, `updated_at`) VALUES
(1, 1, '1712266825.jpg', '2024-04-04 13:40:25', '2024-04-04 13:40:25'),
(2, 1, '1712266832.jpg', '2024-04-04 13:40:32', '2024-04-04 13:40:32'),
(3, 1, '1712266844.jpg', '2024-04-04 13:40:44', '2024-04-04 13:40:44'),
(4, 3, '1713173132.jpg', '2024-04-15 01:25:32', '2024-04-15 01:25:32'),
(5, 3, '1713173145.jpg', '2024-04-15 01:25:45', '2024-04-15 01:25:45'),
(6, 3, '1713173157.jpg', '2024-04-15 01:25:57', '2024-04-15 01:25:57'),
(7, 3, '1713173178.jpg', '2024-04-15 01:26:18', '2024-04-15 01:26:18');

-- --------------------------------------------------------

--
-- Table structure for table `room_rates`
--

CREATE TABLE `room_rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rate` int(11) NOT NULL,
  `review_heading` text NOT NULL,
  `review_description` text NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_rates`
--

INSERT INTO `room_rates` (`id`, `rate`, `review_heading`, `review_description`, `customer_id`, `room_id`, `created_at`, `updated_at`) VALUES
(1, 5, 'Absolutely Recommended!', 'I love my stay at this room because it\'s very cool and comfy!!!', 2, 1, '2024-09-16 09:11:46', '2024-09-16 09:29:03');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` text NOT NULL,
  `favicon` text NOT NULL,
  `top_bar_phone` text DEFAULT NULL,
  `top_bar_email` text DEFAULT NULL,
  `home_feature_status` text NOT NULL,
  `home_room_total` text NOT NULL,
  `home_room_status` text NOT NULL,
  `home_testimonial_status` text NOT NULL,
  `home_latest_post_total` text NOT NULL,
  `home_latest_post_status` text NOT NULL,
  `footer_address` text DEFAULT NULL,
  `footer_phone` text DEFAULT NULL,
  `footer_email` text DEFAULT NULL,
  `copyright` text DEFAULT NULL,
  `facebook` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `linkedin` text DEFAULT NULL,
  `pinterest` text DEFAULT NULL,
  `theme_color_1` text NOT NULL,
  `theme_color_2` text NOT NULL,
  `analytic_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `favicon`, `top_bar_phone`, `top_bar_email`, `home_feature_status`, `home_room_total`, `home_room_status`, `home_testimonial_status`, `home_latest_post_total`, `home_latest_post_status`, `footer_address`, `footer_phone`, `footer_email`, `copyright`, `facebook`, `twitter`, `linkedin`, `pinterest`, `theme_color_1`, `theme_color_2`, `analytic_id`, `created_at`, `updated_at`) VALUES
(1, 'logo.png', 'lsh_favicon_front.svg', '0999-753-2024', 'contact@labason.space', 'Show', '4', 'Show', 'Show', '4', 'Show', 'Tandang Sora St., Antonino, Labason, Zamboanga del Norte', '0999-753-2024', 'contact@labason.space', 'Copyright 2024. Labason Safe Haven. All rights reserved.', NULL, NULL, NULL, NULL, '#deb887', '#f0f0f0', 'kgjdf', NULL, '2024-07-31 14:46:42');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` text NOT NULL,
  `heading` text DEFAULT NULL,
  `text` text DEFAULT NULL,
  `button_text` text DEFAULT NULL,
  `button_url` text DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `photo`, `heading`, `text`, `button_text`, `button_url`, `remark`, `created_at`, `updated_at`) VALUES
(1, '1713920659.webp', 'Your Perfect Stay in Labason', 'Find Comfort and Convenience with Our Wide Range of Accommodations', 'Explore Now', 'accommodation-types', 'active', '2024-04-03 20:38:32', '2024-04-23 17:04:19'),
(2, '1712206050.jpg', 'Indulge in Unparalleled Comfort', 'Discover Luxurious Accommodations Tailored to You', 'Find Yours', 'accommodation-types', 'active', '2024-04-03 20:47:30', '2024-04-03 20:55:21'),
(3, '1712230057.webp', 'Embrace Effortless Living', 'Discover Convenient Accommodations for Every Traveler', 'Book Your Ease', 'accommodation-types', 'active', '2024-04-03 20:54:19', '2024-06-10 06:39:58');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` text NOT NULL,
  `token` text NOT NULL,
  `status` int(11) NOT NULL,
  `remark` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `token`, `status`, `remark`, `created_at`, `updated_at`) VALUES
(1, 'jaspherbagor0357@gmail.com', '', 1, 'active', '2024-05-14 15:23:36', '2024-05-14 15:23:53');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` text NOT NULL,
  `name` text NOT NULL,
  `designation` text NOT NULL,
  `comment` text NOT NULL,
  `remark` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `photo`, `name`, `designation`, `comment`, `remark`, `created_at`, `updated_at`) VALUES
(1, '1712214783.jpg', 'Miguel Santos', 'Graphic Designer', 'Being a graphic designer, finding inspiration is crucial for my work. Labason Safe Haven provided me with the perfect retreat to recharge my creativity. The tranquil surroundings and exceptional service allowed me to focus on my projects without any interruptions. I\'m grateful for the amazing experience and can\'t wait to come back for another productive stay.', 'active', '2024-04-03 23:13:03', '2024-04-03 23:13:03'),
(2, '1712214949.jpg', 'Isabella Cruz', 'Travel Blogger', 'As a travel blogger, I\'ve had the chance to stay in many accommodations worldwide, and Labason Safe Haven is undoubtedly one of the best. The breathtaking views, spotless rooms, and warm hospitality made my stay unforgettable. I\'m grateful for the amazing experience and the wonderful memories I made here. Thank you for making my trip to Labason truly special!', 'active', '2024-04-03 23:15:49', '2024-04-03 23:15:49'),
(3, '1712215014.webp', 'Andy Reyes', 'Software Engineer', 'Labason Safe Haven went above and beyond my expectations. As a software engineer, I appreciate efficiency and attention to detail, and this hotel delivered on every aspect. From the seamless check-in process to the luxurious amenities, my stay was nothing short of perfect. I\'m thankful for the outstanding service and can\'t wait to recommend this gem to my friends.', 'active', '2024-04-03 23:16:54', '2024-06-10 06:52:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video_id` text NOT NULL,
  `caption` text DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `video_id`, `caption`, `remark`, `created_at`, `updated_at`) VALUES
(1, '4K6Sh1tsAW4', 'Cinematic Promo Video | Lisbon City Hotel', 'active', '2024-04-05 03:59:30', '2024-04-05 03:59:30'),
(2, 'FOCp9rMMcZU', 'The Seven Hotel (Promotional Video)', 'active', '2024-04-05 04:01:49', '2024-04-05 04:01:49'),
(3, 'OGVu0VYfKco', 'CONTINENTAL HOTEL Budapest promo video', 'active', '2024-04-05 04:02:18', '2024-04-05 04:02:18'),
(4, '_mKmoO3o1JU', 'BAYANGAN MURCIELAGOS ISLAND - LABASON ZAMBOANGA DEL NORTE', 'active', '2024-04-05 04:03:37', '2024-04-05 04:04:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accommodations`
--
ALTER TABLE `accommodations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accommodations_accommodation_type_id_foreign` (`accommodation_type_id`);

--
-- Indexes for table `accommodation_rates`
--
ALTER TABLE `accommodation_rates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accommodation_rates_customer_id_foreign` (`customer_id`),
  ADD KEY `accommodation_rates_accommodation_id_foreign` (`accommodation_id`);

--
-- Indexes for table `accommodation_types`
--
ALTER TABLE `accommodation_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booked_rooms`
--
ALTER TABLE `booked_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_accommodation_id_foreign` (`accommodation_id`);

--
-- Indexes for table `room_photos`
--
ALTER TABLE `room_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_rates`
--
ALTER TABLE `room_rates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_rates_customer_id_foreign` (`customer_id`),
  ADD KEY `room_rates_room_id_foreign` (`room_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accommodations`
--
ALTER TABLE `accommodations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `accommodation_rates`
--
ALTER TABLE `accommodation_rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `accommodation_types`
--
ALTER TABLE `accommodation_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `booked_rooms`
--
ALTER TABLE `booked_rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `room_photos`
--
ALTER TABLE `room_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `room_rates`
--
ALTER TABLE `room_rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accommodations`
--
ALTER TABLE `accommodations`
  ADD CONSTRAINT `accommodations_accommodation_type_id_foreign` FOREIGN KEY (`accommodation_type_id`) REFERENCES `accommodation_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `accommodation_rates`
--
ALTER TABLE `accommodation_rates`
  ADD CONSTRAINT `accommodation_rates_accommodation_id_foreign` FOREIGN KEY (`accommodation_id`) REFERENCES `accommodations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `accommodation_rates_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_accommodation_id_foreign` FOREIGN KEY (`accommodation_id`) REFERENCES `accommodations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `room_rates`
--
ALTER TABLE `room_rates`
  ADD CONSTRAINT `room_rates_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `room_rates_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
