-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2024 at 08:27 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `p_poll`
--

-- --------------------------------------------------------

--
-- Table structure for table `ans`
--

CREATE TABLE `ans` (
  `ans_id` int(11) NOT NULL,
  `ans_text` varchar(100) NOT NULL,
  `ask_id` int(11) NOT NULL,
  `poll_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ans`
--

INSERT INTO `ans` (`ans_id`, `ans_text`, `ask_id`, `poll_id`) VALUES
(37, 'ดีมาก', 14, 9),
(38, 'ดี', 14, 9),
(39, 'พอใช้', 14, 9),
(40, 'เเย่', 14, 9),
(41, 'ดีมา่ก', 15, 9),
(42, 'ดี', 15, 9),
(43, 'พอใช้', 15, 9),
(44, 'เเย่', 15, 9),
(45, 'มากที่สุด', 16, 10),
(46, 'มาก', 16, 10),
(47, 'น้อย', 16, 10),
(48, 'น้อยที่สุด', 16, 10);

-- --------------------------------------------------------

--
-- Table structure for table `ask`
--

CREATE TABLE `ask` (
  `ask_id` int(11) NOT NULL,
  `ask_name` varchar(100) NOT NULL,
  `poll_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ask`
--

INSERT INTO `ask` (`ask_id`, `ask_name`, `poll_id`) VALUES
(14, 'ความมีระเบียบของโต๊ะภายในห้อง', 9),
(15, 'ความสะอาดของห้องเรียน', 9),
(16, 'ผลกระทบจากศัตรูพืชมีความเสียหายมากหรือไม่', 10);

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE `poll` (
  `poll_id` int(11) NOT NULL,
  `poll_name` varchar(100) NOT NULL,
  `timeadd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `img` varchar(100) NOT NULL,
  `type_id` int(11) NOT NULL,
  `age` varchar(11) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `education` varchar(100) NOT NULL,
  `pro` varchar(100) NOT NULL,
  `orher` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poll`
--

INSERT INTO `poll` (`poll_id`, `poll_name`, `timeadd`, `img`, `type_id`, `age`, `sex`, `education`, `pro`, `orher`) VALUES
(9, 'ความสะอาดของห้อง', '2024-02-06 06:55:32', '../assets/img/65c1d7e41c20c.jpg', 9, 'ต่ำกว่า 18 ', 'ชาย', 'ม.3', 'ต่ำกว่า 10000 บาท ต่อเดือน', 'นักศึกษา'),
(10, 'รายได้ของชาวไร่ปี 67', '2024-02-06 06:56:54', '../assets/img/65c1d83607545.jpg', 10, 'ต่ำกว่า 18 ', 'ชาย', 'ม.3', 'ต่ำกว่า 10000 บาท ต่อเดือน', 'ช่างยนตร์');

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `re_id` int(11) NOT NULL,
  `poll_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time_s` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`re_id`, `poll_id`, `user_id`, `time_s`) VALUES
(8, 9, 3, '2024-02-06 07:00:11'),
(9, 9, 3, '2024-02-06 07:00:16'),
(10, 9, 3, '2024-02-06 07:00:20'),
(11, 9, 3, '2024-02-06 07:25:25'),
(12, 9, 3, '2024-02-06 07:25:32');

-- --------------------------------------------------------

--
-- Table structure for table `reserve_items`
--

CREATE TABLE `reserve_items` (
  `items_id` int(11) NOT NULL,
  `ans_id` int(11) NOT NULL,
  `ask_id` int(11) NOT NULL,
  `re_id` int(11) NOT NULL,
  `poll_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reserve_items`
--

INSERT INTO `reserve_items` (`items_id`, `ans_id`, `ask_id`, `re_id`, `poll_id`) VALUES
(18, 39, 14, 8, 9),
(19, 41, 15, 8, 9),
(20, 40, 14, 9, 9),
(21, 44, 15, 9, 9),
(22, 38, 14, 10, 9),
(23, 43, 15, 10, 9),
(24, 37, 14, 11, 9),
(25, 43, 15, 11, 9),
(26, 37, 14, 12, 9),
(27, 41, 15, 12, 9);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type_name`) VALUES
(9, 'ความสะอาด'),
(10, 'การดูเเลสิ่งเเวดล้อม');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `sex` enum('ชาย','หญิง','อื่นๆ') NOT NULL,
  `education` varchar(100) NOT NULL,
  `pro` varchar(100) NOT NULL,
  `usg_status` enum('user','admin') NOT NULL,
  `status` enum('0','1') NOT NULL,
  `profile` varchar(255) NOT NULL,
  `age` varchar(200) NOT NULL,
  `orher` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `email`, `password`, `sex`, `education`, `pro`, `usg_status`, `status`, `profile`, `age`, `orher`) VALUES
(1, 'นพรัตน์', 'อินมี1', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'ชาย', 'ปวช.', 'ช่างยนตร์', 'admin', '1', '../assets/img/65c1d02bd48b8.png', '30ปีถึง40ปี', ''),
(3, 'นพรัตน์', 'อินมี', 'user@gmail.com1', '202cb962ac59075b964b07152d234b70', 'ชาย', 'ป.เอก', '12000 บาท ต่อเดือน', 'user', '1', '../assets/img/65c1d0633ddd7.jpg', 'มากกว่า 60ปี', 'หมอ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ans`
--
ALTER TABLE `ans`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `ask`
--
ALTER TABLE `ask`
  ADD PRIMARY KEY (`ask_id`);

--
-- Indexes for table `poll`
--
ALTER TABLE `poll`
  ADD PRIMARY KEY (`poll_id`);

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`re_id`);

--
-- Indexes for table `reserve_items`
--
ALTER TABLE `reserve_items`
  ADD PRIMARY KEY (`items_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ans`
--
ALTER TABLE `ans`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `ask`
--
ALTER TABLE `ask`
  MODIFY `ask_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `poll`
--
ALTER TABLE `poll`
  MODIFY `poll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `re_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reserve_items`
--
ALTER TABLE `reserve_items`
  MODIFY `items_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
