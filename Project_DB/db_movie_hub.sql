-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2019 at 12:19 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_movie_hub`
--

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
(3, '2018_06_28_050611_create_admin_table', 1),
(4, '2018_08_27_110435_create_blog_table', 1),
(5, '2018_08_30_083535_create_comment_table', 1),
(6, '2019_02_03_025441_create_movie_table', 1);

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
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_label` tinyint(4) NOT NULL COMMENT 'super=1, manager=2',
  `activation_status` tinyint(4) NOT NULL COMMENT 'status=1 acive, status=0 inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `email_address`, `password`, `access_label`, `activation_status`, `created_at`, `updated_at`) VALUES
(1, 'Bruce Wayne', 'batman@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` int(10) UNSIGNED NOT NULL,
  `movie_id` int(11) NOT NULL,
  `comment_person_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_person_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_person_comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_created_at` timestamp NULL DEFAULT NULL,
  `comment_updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `movie_id`, `comment_person_name`, `comment_person_email`, `comment_person_comment`, `comment_created_at`, `comment_updated_at`) VALUES
(1, 1, 'olive', 'olive@gmail.com', 'this is test comment...', '2019-02-02 22:54:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_movie`
--

CREATE TABLE `tbl_movie` (
  `movie_id` int(10) UNSIGNED NOT NULL,
  `movie_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_long_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_release_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_rating` tinyint(4) NOT NULL COMMENT '1-5 rating values fixed',
  `movie_ticket_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_genre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0 = Inactive, 1 = Active',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_movie`
--

INSERT INTO `tbl_movie` (`movie_id`, `movie_title`, `movie_long_description`, `movie_release_date`, `movie_rating`, `movie_ticket_price`, `movie_country`, `movie_genre`, `movie_image`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Rio 2', '<p>A small river named Duden flows by their place and supplies it with the necessary.&nbsp;A small river named Duden flows by their place and supplies it with the necessary.&nbsp;A small river named Duden flows by their place and supplies it with the necessary.&nbsp;A small river named Duden flows by their place and supplies it with the necessary.&nbsp;A small river named Duden flows by their place and supplies it with the necessary.&nbsp;A small river named Duden flows by their place and supplies it with the necessary.&nbsp;A small river named Duden flows by their place and supplies it with the necessary.&nbsp;A small river named Duden flows by their place and supplies it with the necessary.</p>', '3 February, 2019', 3, '269', 'BD', 'animation', '2S7sewY4PpttyEiKWJaM.jpg', 1, 1, '2019-02-02 04:26:00', '2019-02-02 23:07:27'),
(2, 'X-men Apocalypse', '<p>A small river named Duden flows by their place and supplies it with the necessary.&nbsp;A small river named Duden flows by their place and supplies it with the necessary.&nbsp;A small river named Duden flows by their place and supplies it with the necessary.&nbsp;A small river named Duden flows by their place and supplies it with the necessary.&nbsp;A small river named Duden flows by their place and supplies it with the necessary.&nbsp;A small river named Duden flows by their place and supplies it with the necessary.&nbsp;A small river named Duden flows by their place and supplies it with the necessary.&nbsp;A small river named Duden flows by their place and supplies it with the necessary.</p>', '3 February, 2019', 3, '350', 'BD', 'action', 'cJCAVDxsqs4eQ8LJD2I8.jpg', 1, 1, '2019-02-02 20:52:05', '2019-02-02 23:05:45'),
(3, 'The Dark Knight Rises', '<p>A small river named Duden flows by their place and supplies it with the necessary.&nbsp;A small river named Duden flows by their place and supplies it with the necessary.&nbsp;A small river named Duden flows by their place and supplies it with the necessary.&nbsp;A small river named Duden flows by their place and supplies it with the necessary.&nbsp;A small river named Duden flows by their place and supplies it with the necessary.&nbsp;A small river named Duden flows by their place and supplies it with the necessary.&nbsp;A small river named Duden flows by their place and supplies it with the necessary.&nbsp;A small river named Duden flows by their place and supplies it with the necessary.</p>', '3 February, 2019', 5, '400', 'BD', 'action', 'aH1FCQzRWwA3W5W1qZrE.jpg', 1, 1, '2019-02-02 20:52:48', '2019-02-02 23:09:40'),
(4, 'The Revenant', '<p>A small river named Duden flows by their place and supplies it with the necessary.&nbsp;A small river named Duden flows by their place and supplies it with the necessary.&nbsp;A small river named Duden flows by their place and supplies it with the necessary.&nbsp;A small river named Duden flows by their place and supplies it with the necessary.&nbsp;A small river named Duden flows by their place and supplies it with the necessary.&nbsp;A small river named Duden flows by their place and supplies it with the necessary.&nbsp;A small river named Duden flows by their place and supplies it with the necessary.&nbsp;A small river named Duden flows by their place and supplies it with the necessary.</p>', '3 February, 2019', 5, '350', 'BD', 'Thriller', 'Tm12myLlCGgvURmXrKzo.jpg', 1, 1, '2019-02-02 20:55:00', '2019-02-02 23:12:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `tbl_admin_email_address_unique` (`email_address`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `tbl_movie`
--
ALTER TABLE `tbl_movie`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_movie`
--
ALTER TABLE `tbl_movie`
  MODIFY `movie_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
