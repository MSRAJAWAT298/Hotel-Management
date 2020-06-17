-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2020 at 08:46 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comment` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`user_id`, `name`, `email`, `comment`) VALUES
(2, 'Mayank singh kushwah', 'info.mayankcs@gmail.com', 'Testing comments\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_list`
--

CREATE TABLE `hotel_list` (
  `hotel_id` int(11) NOT NULL,
  `hotel_location_id` int(11) NOT NULL,
  `hotel_title` varchar(100) NOT NULL,
  `hotel_sort_desc` varchar(500) NOT NULL,
  `hotel_long_desc` varchar(1000) NOT NULL,
  `hotel_star` varchar(5) NOT NULL,
  `hotel_room` int(11) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `hotel_register_date` date NOT NULL,
  `hotel_small_pic` varchar(500) NOT NULL,
  `hotel_large_pic` varchar(500) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel_list`
--

INSERT INTO `hotel_list` (`hotel_id`, `hotel_location_id`, `hotel_title`, `hotel_sort_desc`, `hotel_long_desc`, `hotel_star`, `hotel_room`, `room_type`, `hotel_register_date`, `hotel_small_pic`, `hotel_large_pic`, `status`, `created_date`, `update_date`) VALUES
(1, 8, 'Oyo', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '5', 150, 'Single Room', '2020-02-20', 'images.jpg', 'download (2).jpg', '1', '2020-05-04 21:48:58', '2020-05-14 02:46:16'),
(3, 11, 'Oyo2', 'Hotels Summary:Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '3', 100, 'Deluxe Room', '2020-02-20', 'images (1).jpg', 'download.jpg', '1', '2020-05-04 22:47:23', '2020-05-14 02:46:23'),
(4, 13, 'Radisson Hotel', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '4', 200, 'Deluxe Room', '2020-05-05', 'g1.jpg', 'g5.jpg', '1', '2020-05-05 14:47:22', '2020-05-14 02:46:25');

-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

CREATE TABLE `industry` (
  `hotel_location_id` int(11) NOT NULL,
  `industry` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` set('0','1') NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_date` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `industry`
--

INSERT INTO `industry` (`hotel_location_id`, `industry`, `country`, `state`, `city`, `sort_order`, `status`, `created_date`, `modified_date`) VALUES
(5, 'Industry5', 'Country-1', 'Madhya Pradesh', 'Gwalior', 1, '0', '2020-05-04 17:58:45', '2020-05-13 18:25:27'),
(6, 'Industry6', 'Country-1', 'Madhya Pradesh', 'Gwalior', 1, '1', '2020-05-04 18:05:55', '2020-05-08 14:07:36'),
(7, 'Industry3', 'Country-3', 'Madhya Pradesh', 'Gwalior', 1, '1', '2020-05-04 18:07:57', '2020-05-08 14:07:42'),
(8, 'Industry7', 'India', 'Madhya Pradesh', 'Gwalior', 3, '1', '2020-05-04 18:19:36', '2020-05-04 18:19:36'),
(9, 'Industry', 'India', 'Madhya Pradesh', 'Gwalior', 2, '1', '2020-05-04 20:55:33', '2020-05-04 20:55:33'),
(10, 'Industry Updated', 'India', 'Madhya Pradesh', 'Gwalior', 1, '1', '2020-05-04 21:00:58', '2020-05-04 21:00:58'),
(11, 'New Industry', 'India', 'Madhya Pradesh', 'Indore', 1, '1', '2020-05-04 21:03:51', '2020-05-04 21:03:51'),
(12, 'Industry9', 'India', 'Gujrat', 'Ahemdhabhad', 2, '1', '2020-05-04 21:06:28', '2020-05-04 21:06:28'),
(13, 'Gwalior', 'India', 'Madhya Pradesh', 'Gwalior', 1, '1', '2020-05-05 14:45:20', '2020-05-05 14:45:20'),
(14, 'Myindusty', 'Country-1', 'Madhya Pradesh', 'Gwalior', 1, '1', '2020-05-10 17:20:22', '2020-05-10 17:20:22'),
(15, 'testingstatus1', 'testingstatus1', 'testingstatus1', 'testingstatus1', 2, '0', '2020-05-12 23:48:25', '2020-05-13 18:25:15'),
(16, 'testing status-1', 'India', 'Madhya Pradesh', 'Gwalior', 0, '1', '2020-05-12 23:52:13', '2020-05-12 23:52:13'),
(17, 'Industry-5', 'Country-1', 'Madhya Pradesh', 'Gwalior', 1, '1', '2020-05-12 23:53:49', '2020-05-12 23:53:49'),
(18, 'Testing-status-2', 'Country-1', 'Madhya Pradesh', 'Gwalior', 1, '1', '2020-05-12 23:54:38', '2020-05-12 23:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `pin_pages`
--

CREATE TABLE `pin_pages` (
  `id` int(11) NOT NULL,
  `page_link` varchar(500) NOT NULL,
  `page_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pin_pages`
--

INSERT INTO `pin_pages` (`id`, `page_link`, `page_name`) VALUES
(8, '/hotel_managment/admin/dasboard', 'dasboard'),
(12, '/hotel_managment/admin/add_hotels', 'add_hotels'),
(13, '/hotel_managment/admin/view_industry', 'view_industry'),
(14, '/hotel_managment/admin/add_industry', 'add_industry');

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `id` int(11) NOT NULL,
  `theme_type` varchar(50) NOT NULL,
  `sidebar` enum('Yes','No') NOT NULL,
  `navbar_link` enum('Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`id`, `theme_type`, `sidebar`, `navbar_link`) VALUES
(1, 'Standard', 'No', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `hotel_list`
--
ALTER TABLE `hotel_list`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `industry`
--
ALTER TABLE `industry`
  ADD PRIMARY KEY (`hotel_location_id`);

--
-- Indexes for table `pin_pages`
--
ALTER TABLE `pin_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hotel_list`
--
ALTER TABLE `hotel_list`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `industry`
--
ALTER TABLE `industry`
  MODIFY `hotel_location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pin_pages`
--
ALTER TABLE `pin_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
