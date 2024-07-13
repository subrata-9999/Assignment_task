-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2024 at 07:54 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-07-12-162913', 'App\\Database\\Migrations\\CreateUsersTable', 'default', 'App', 1720802422, 1),
(2, '2024-07-12-183003', 'App\\Database\\Migrations\\CreatePermissionTable', 'default', 'App', 1720813818, 2);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `role` varchar(100) NOT NULL,
  `permission` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`role`, `permission`) VALUES
('admin', 'Dashboard, Profile Update, User Access'),
('employee', 'Dashboard, Profile Update');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `userType` enum('admin','employee') NOT NULL DEFAULT 'employee',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `userType`, `status`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Mara Mckenzie', 'zadedasoxu@mailinator.com', 'employee', 'inactive', '$2y$10$QpyC8bqgtqVh/ZLekSUxZ.j1Wp6nYYLXVUTLrp5QHJnvs97cWYLdu', NULL, NULL),
(2, 'Laith Rose', 'admin@gmail.com', 'admin', 'active', '$2y$10$NEI3nSfm7WxCZbRnWLuNpOUO4NEx/spcS.J9uolUTwn6qinAZ5xpq', NULL, NULL),
(8, 'Mara Mckenzie', 'mara@mailinator.com', 'employee', 'active', '$2y$10$QpyC8bqgtqVh/ZLekSUxZ.j1Wp6nYYLXVUTLrp5QHJnvs97cWYLdu', '2024-07-13 06:17:21', '2024-07-13 06:17:21'),
(9, 'John Doe', 'john@mailinator.com', 'employee', 'inactive', '$2y$10$QpyC8bqgtqVh/ZLekSUxZ.j1Wp6nYYLXVUTLrp5QHJnvs97cWYLdu', '2024-07-13 06:17:21', '2024-07-13 06:17:21'),
(10, 'Alice Smith', 'alice@mailinator.com', 'employee', 'active', '$2y$10$QpyC8bqgtqVh/ZLekSUxZ.j1Wp6nYYLXVUTLrp5QHJnvs97cWYLdu', '2024-07-13 06:17:21', '2024-07-13 06:17:21'),
(11, 'Bob Johnson', 'bob@mailinator.com', 'employee', 'inactive', '$2y$10$QpyC8bqgtqVh/ZLekSUxZ.j1Wp6nYYLXVUTLrp5QHJnvs97cWYLdu', '2024-07-13 06:17:21', '2024-07-13 06:17:21'),
(12, 'Charlie Brown', 'charlie@mailinator.com', 'employee', 'active', '$2y$10$QpyC8bqgtqVh/ZLekSUxZ.j1Wp6nYYLXVUTLrp5QHJnvs97cWYLdu', '2024-07-13 06:17:21', '2024-07-13 06:17:21'),
(13, 'Daisy Ridley', 'daisy@mailinator.com', 'admin', 'active', '$2y$10$QpyC8bqgtqVh/ZLekSUxZ.j1Wp6nYYLXVUTLrp5QHJnvs97cWYLdu', '2024-07-13 06:17:21', '2024-07-13 06:17:21'),
(14, 'Ethan Hunt', 'ethan@mailinator.com', 'admin', 'inactive', '$2y$10$QpyC8bqgtqVh/ZLekSUxZ.j1Wp6nYYLXVUTLrp5QHJnvs97cWYLdu', '2024-07-13 06:17:21', '2024-07-13 06:17:21'),
(15, 'Fiona Gallagher', 'fiona@mailinator.com', 'employee', 'active', '$2y$10$QpyC8bqgtqVh/ZLekSUxZ.j1Wp6nYYLXVUTLrp5QHJnvs97cWYLdu', '2024-07-13 06:17:21', '2024-07-13 06:17:21'),
(16, 'George Lucas', 'george@mailinator.com', 'admin', 'active', '$2y$10$QpyC8bqgtqVh/ZLekSUxZ.j1Wp6nYYLXVUTLrp5QHJnvs97cWYLdu', '2024-07-13 06:17:21', '2024-07-13 06:17:21'),
(17, 'Hannah Montana', 'hannah@mailinator.com', 'employee', 'inactive', '$2y$10$QpyC8bqgtqVh/ZLekSUxZ.j1Wp6nYYLXVUTLrp5QHJnvs97cWYLdu', '2024-07-13 06:17:21', '2024-07-13 06:17:21'),
(18, 'Isabella Stone', 'isabella@mailinator.com', 'employee', 'active', '$2y$10$QpyC8bqgtqVh/ZLekSUxZ.j1Wp6nYYLXVUTLrp5QHJnvs97cWYLdu', '2024-07-13 06:17:21', '2024-07-13 06:17:21'),
(19, 'Jack Sparrow', 'jack@mailinator.com', 'admin', 'inactive', '$2y$10$QpyC8bqgtqVh/ZLekSUxZ.j1Wp6nYYLXVUTLrp5QHJnvs97cWYLdu', '2024-07-13 06:17:21', '2024-07-13 06:17:21'),
(20, 'Karen Johnson', 'karen@mailinator.com', 'employee', 'active', '$2y$10$QpyC8bqgtqVh/ZLekSUxZ.j1Wp6nYYLXVUTLrp5QHJnvs97cWYLdu', '2024-07-13 06:17:21', '2024-07-13 06:17:21'),
(21, 'Liam Neeson', 'liam@mailinator.com', 'admin', 'active', '$2y$10$QpyC8bqgtqVh/ZLekSUxZ.j1Wp6nYYLXVUTLrp5QHJnvs97cWYLdu', '2024-07-13 06:17:21', '2024-07-13 06:17:21'),
(22, 'Mia Wallace', 'mia@mailinator.com', 'employee', 'inactive', '$2y$10$QpyC8bqgtqVh/ZLekSUxZ.j1Wp6nYYLXVUTLrp5QHJnvs97cWYLdu', '2024-07-13 06:17:21', '2024-07-13 06:17:21'),
(23, 'Noah Centineo', 'noah@mailinator.com', 'employee', 'active', '$2y$10$QpyC8bqgtqVh/ZLekSUxZ.j1Wp6nYYLXVUTLrp5QHJnvs97cWYLdu', '2024-07-13 06:17:21', '2024-07-13 06:17:21'),
(24, 'Olivia Pope', 'olivia@mailinator.com', 'admin', 'inactive', '$2y$10$QpyC8bqgtqVh/ZLekSUxZ.j1Wp6nYYLXVUTLrp5QHJnvs97cWYLdu', '2024-07-13 06:17:21', '2024-07-13 06:17:21'),
(25, 'Peter Parker', 'peter@mailinator.com', 'employee', 'active', '$2y$10$QpyC8bqgtqVh/ZLekSUxZ.j1Wp6nYYLXVUTLrp5QHJnvs97cWYLdu', '2024-07-13 06:17:21', '2024-07-13 06:17:21'),
(26, 'Quinn Fabray', 'quinn@mailinator.com', 'employee', 'inactive', '$2y$10$QpyC8bqgtqVh/ZLekSUxZ.j1Wp6nYYLXVUTLrp5QHJnvs97cWYLdu', '2024-07-13 06:17:21', '2024-07-13 06:17:21'),
(27, 'Ricky Bobby', 'ricky@mailinator.com', 'admin', 'active', '$2y$10$QpyC8bqgtqVh/ZLekSUxZ.j1Wp6nYYLXVUTLrp5QHJnvs97cWYLdu', '2024-07-13 06:17:21', '2024-07-13 06:17:21'),
(28, 'Sophia Turner', 'sophia@mailinator.com', 'employee', 'inactive', '$2y$10$QpyC8bqgtqVh/ZLekSUxZ.j1Wp6nYYLXVUTLrp5QHJnvs97cWYLdu', '2024-07-13 06:17:21', '2024-07-13 06:17:21'),
(29, 'Subrata Pramanik', 'subrataapramanik46@gmail.com', 'admin', 'active', '$2y$10$055JILP7Ukx.xnQ85gCV2O32MTcHRufKf7akewdN4cEUi1To/oDIO', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`role`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
