-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 18, 2019 lúc 01:28 PM
-- Phiên bản máy phục vụ: 10.1.32-MariaDB
-- Phiên bản PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlynghipheponline`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accepted_leaves`
--

CREATE TABLE `accepted_leaves` (
  `id` int(11) NOT NULL,
  `leave_id` bigint(20) NOT NULL,
  `staff_id` bigint(20) NOT NULL,
  `leave_type` varchar(250) NOT NULL,
  `num_days` int(11) NOT NULL,
  `date_accepted` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `accepted_leaves`
--

INSERT INTO `accepted_leaves` (`id`, `leave_id`, `staff_id`, `leave_type`, `num_days`, `date_accepted`) VALUES
(13, 171521752477, 8201914062337, 'annual', 300, '14-08-2019'),
(14, 201521664164, 8201914062414, 'maternity', 2, '14-08-2019'),
(15, 191521664208, 8201914062305, 'study', 1, '15-08-2019'),
(16, 201521664189, 8201914062305, 'paternity', 2, '15-08-2019'),
(17, 111521664139, 8201914062337, 'sick', 8, '16-08-2019'),
(18, 201521664164, 8201914062337, 'maternity', 2, '16-08-2019'),
(19, 191521664227, 8201914062337, 'emergency', 1, '16-08-2019'),
(20, 191521664208, 8201914062337, 'study', 1, '16-08-2019'),
(21, 201521664164, 8201914062337, 'maternity', 2, '16-08-2019'),
(22, 111521664139, 8201914062337, 'sick', 1, '16-08-2019'),
(23, 111521664139, 8201914062414, 'sick', 1, '16-08-2019'),
(24, 111521664139, 8201914062414, 'sick', 1, '16-08-2019'),
(25, 201521664164, 8201914062414, 'maternity', 1, '16-08-2019'),
(26, 191521664208, 8201914062414, 'study', 1, '16-08-2019'),
(27, 191521664227, 8201914062414, 'emergency', 2, '16-08-2019'),
(28, 191521664227, 8201914062337, 'emergency', 1, '18-08-2019'),
(29, 111521664139, 8201914062414, 'sick', 6, '18-08-2019'),
(30, 111521664139, 8201918111611, 'sick', 6, '18-08-2019'),
(31, 111521664139, 8201918111330, 'sick', 6, '18-08-2019'),
(32, 191521664208, 8201918111330, 'study', 7, '18-08-2019'),
(33, 1111, 8201914062305, 'sick', 1, '18-08-2019'),
(34, 3333, 8201914062305, 'study', 11, '18-08-2019'),
(35, 2222, 8201914062414, 'maternity', 1, '18-08-2019'),
(36, 3333, 8201914062414, 'study', 1, '18-08-2019'),
(37, 4444, 8201914062414, 'emergency', 1, '18-08-2019'),
(38, 2222, 8201914062305, 'maternity', 1, '18-08-2019');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_id` bigint(20) NOT NULL,
  `title` varchar(20) NOT NULL,
  `fname` varchar(150) NOT NULL,
  `lname` varchar(150) NOT NULL,
  `username` varchar(70) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` int(10) UNSIGNED NOT NULL,
  `date_registered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `admin_id`, `title`, `fname`, `lname`, `username`, `password`, `email`, `phone`, `date_registered`) VALUES
(1, 152122333134, 'Mr', 'Main', 'Administrator', 'admin', '$2y$10$p3d1dr/FuAkfqQ30EAuqlumWF7c9vy4b0kKkSpx2.janWhzBU5nu6', 'phucdang17798@gmail.com', 500000000, '2019-08-10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `staff_id` bigint(20) NOT NULL,
  `title` varchar(20) NOT NULL,
  `fname` varchar(150) NOT NULL,
  `lname` varchar(150) NOT NULL,
  `username` varchar(70) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(200) NOT NULL,
  `country_code` varchar(4) NOT NULL,
  `phone` int(10) UNSIGNED NOT NULL,
  `supervisor` varchar(200) DEFAULT NULL,
  `staff_level` enum('supervisor','non-supervisor') DEFAULT NULL,
  `date_registered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `employee`
--

INSERT INTO `employee` (`id`, `staff_id`, `title`, `fname`, `lname`, `username`, `password`, `email`, `country_code`, `phone`, `supervisor`, `staff_level`, `date_registered`) VALUES
(8, 8201914062305, 'Mr', 'Phúc', 'Đặng', 'phuc98', '$2y$10$1P8kzdgyovmjy7uBFt.RFu2oLlILMJAfJUwPoUXHun1d3JDXeGkFu', 'phuc@gmail.com', '+84', 1234567, 'N/A', 'non-supervisor', '2019-08-14'),
(9, 8201914062337, 'Mr', 'Đạo', 'Trường', 'dao98', '$2y$10$uq3X5wvp6vKfZ5XH6xpidOmCscgvuMw8M9FGxcJ3rKFcUPRNx/Hri', 'dao@gmail.com', '+84', 1245678, '', 'non-supervisor', '2019-08-14'),
(10, 8201914062414, 'Mr', 'Tiêu', 'Nghị', 'nghi98', '$2y$10$8CjiY8AHFTkisV6qATu6ZeJ.reOLB.BN3N.bKzItiW6.3FbkM1obK', 'nghi@gmail.com', '+84', 216549, '', 'non-supervisor', '2019-08-14'),
(12, 8201918111330, 'Mr', 'Phúc', 'Đặng', 'supervisor', '$2y$10$d9Dr7sS2pWyqekUn5V0JCeazOjtmpFqBqtC9/9Sc5JONfI/PwhU5G', 'phucdang17798@gmail.com', '+1', 12345678, 'N/A', 'supervisor', '2019-08-18'),
(13, 8201918111611, 'Mr', 'Đinh', 'Tài', 'tai98', '$2y$10$0w5utr2/MS90cfJjgFfVXeVJTesQof9fLmbWGfVAdN.BcAGzfTvJu', 'tai@gmail.com', '+1', 126546549, 'N/A', 'non-supervisor', '2019-08-18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_description`
--

CREATE TABLE `job_description` (
  `id` int(11) NOT NULL,
  `staff_id` bigint(20) NOT NULL,
  `staff_level` enum('supervisor','non-supervisor') NOT NULL,
  `salary_level` decimal(45,2) NOT NULL,
  `date_joined` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `job_description`
--

INSERT INTO `job_description` (`id`, `staff_id`, `staff_level`, `salary_level`, `date_joined`) VALUES
(1, 3201821131600, 'supervisor', '1500.00', '2017-10-30'),
(2, 4201804045945, 'non-supervisor', '5000.00', '2018-03-05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `leaves`
--

CREATE TABLE `leaves` (
  `id` int(11) NOT NULL,
  `leave_id` bigint(20) NOT NULL,
  `leave_type` text NOT NULL,
  `allowed_days` bigint(20) NOT NULL,
  `current_days` int(11) NOT NULL,
  `allowed_monthly_days` bigint(20) NOT NULL,
  `for_staff_level` varchar(200) NOT NULL,
  `auto_update` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `leaves`
--

INSERT INTO `leaves` (`id`, `leave_id`, `leave_type`, `allowed_days`, `current_days`, `allowed_monthly_days`, `for_staff_level`, `auto_update`) VALUES
(1, 1111, 'sick', 0, 0, 15, 'non-supervisor', 1524255729),
(2, 2222, 'maternity', 90, 90, 30, 'non-supervisor', 1524255754),
(3, 3333, 'study', 14, 14, 14, 'non-supervisor', 1524255798),
(4, 4444, 'emergency', 30, 30, 7, 'non-supervisor', 1524255817);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `leave_applications`
--

CREATE TABLE `leave_applications` (
  `id` int(11) NOT NULL,
  `leave_id` bigint(20) NOT NULL,
  `staff_id` bigint(20) NOT NULL,
  `leave_type` varchar(250) NOT NULL,
  `leave_start_date` varchar(25) NOT NULL,
  `leave_end_date` varchar(25) NOT NULL,
  `action` enum('accept','reject') DEFAULT NULL,
  `date_requested` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `leave_applications`
--

INSERT INTO `leave_applications` (`id`, `leave_id`, `staff_id`, `leave_type`, `leave_start_date`, `leave_end_date`, `action`, `date_requested`) VALUES
(36, 201521664164, 8201914062337, 'maternity', '2019-08-16', '2019-08-17', 'accept', '16-08-2019'),
(37, 191521664208, 8201914062337, 'study', '2019-08-16', '2019-08-17', 'accept', '16-08-2019'),
(38, 191521664227, 8201914062337, 'emergency', '2019-08-16', '2019-08-17', 'accept', '16-08-2019'),
(42, 191521664208, 8201918111330, 'study', '2019-08-18', '2019-08-25', 'accept', '18-08-2019'),
(43, 1111, 8201914062305, 'sick', '2019-08-18', '2019-08-19', 'accept', '18-08-2019'),
(44, 3333, 8201914062305, 'study', '2019-08-20', '2019-08-31', 'accept', '18-08-2019'),
(45, 2222, 8201914062414, 'maternity', '2019-08-18', '2019-08-19', 'accept', '18-08-2019'),
(46, 3333, 8201914062414, 'study', '2019-08-22', '2019-08-23', 'accept', '18-08-2019'),
(47, 4444, 8201914062414, 'emergency', '2019-08-30', '2019-08-31', 'accept', '18-08-2019'),
(48, 2222, 8201914062305, 'maternity', '2019-08-24', '2019-08-25', 'accept', '18-08-2019'),
(49, 4444, 8201914062305, 'emergency', '2019-08-22', '2019-08-31', NULL, '18-08-2019'),
(50, 1111, 8201914062337, 'sick', '2019-08-18', '2019-08-19', NULL, '18-08-2019');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_recovery_meta`
--

CREATE TABLE `password_recovery_meta` (
  `id` int(11) NOT NULL,
  `token` varchar(2000) NOT NULL,
  `expiry` bigint(20) DEFAULT NULL,
  `email` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `recommended_leaves`
--

CREATE TABLE `recommended_leaves` (
  `id` int(11) NOT NULL,
  `leave_id` bigint(20) NOT NULL,
  `leave_type` varchar(250) NOT NULL,
  `staff_id` bigint(20) NOT NULL,
  `recommended_by` varchar(250) NOT NULL,
  `num_days` int(11) NOT NULL,
  `why_recommend` varchar(1000) NOT NULL,
  `date_recommended` varchar(25) NOT NULL,
  `status` enum('accepted','rejected') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `recommended_leaves`
--

INSERT INTO `recommended_leaves` (`id`, `leave_id`, `leave_type`, `staff_id`, `recommended_by`, `num_days`, `why_recommend`, `date_recommended`, `status`) VALUES
(13, 171521752477, 'annual', 8201914062337, 'supervisor', 300, '', '14-08-2019', 'accepted'),
(14, 201521664164, 'maternity', 8201914062414, 'supervisor', 2, 'Duyệt', '14-08-2019', 'accepted'),
(15, 191521664208, 'study', 8201914062305, 'supervisor', 1, '', '15-08-2019', 'accepted'),
(16, 201521664189, 'paternity', 8201914062305, 'supervisor', 2, '', '15-08-2019', 'accepted'),
(17, 201521664164, 'maternity', 8201914062337, 'phuc98', 2, 'abc', '16-08-2019', 'accepted'),
(18, 111521664139, 'sick', 8201914062337, 'phuc98', 8, 'sad', '16-08-2019', 'accepted'),
(19, 191521664227, 'emergency', 8201914062337, 'phuc98', 1, 'asd', '16-08-2019', 'accepted'),
(20, 191521664208, 'study', 8201914062337, 'phuc98', 1, '', '16-08-2019', 'accepted'),
(21, 111521664139, 'sick', 8201914062414, 'phuc98', 1, '', '16-08-2019', 'accepted'),
(22, 111521664139, 'sick', 8201914062337, 'phuc98', 1, '', '16-08-2019', 'accepted'),
(23, 201521664164, 'maternity', 8201914062337, 'phuc98', 2, '', '16-08-2019', 'accepted'),
(24, 191521664227, 'emergency', 8201914062337, 'phuc98', 2, '', '16-08-2019', 'accepted'),
(25, 111521664139, 'sick', 8201914062337, 'phuc98', 1, '', '16-08-2019', 'accepted'),
(26, 201521664164, 'maternity', 8201914062337, 'phuc98', 1, '', '16-08-2019', 'accepted'),
(27, 191521664208, 'study', 8201914062337, 'phuc98', 1, '', '16-08-2019', 'accepted'),
(28, 191521664227, 'emergency', 8201914062337, 'phuc98', 1, '', '16-08-2019', 'accepted'),
(29, 111521664139, 'sick', 8201914062414, 'phuc98', 1, '', '16-08-2019', 'accepted'),
(30, 201521664164, 'maternity', 8201914062414, 'phuc98', 1, '', '16-08-2019', 'accepted'),
(31, 191521664208, 'study', 8201914062414, 'phuc98', 1, '', '16-08-2019', 'accepted'),
(32, 191521664227, 'emergency', 8201914062414, 'phuc98', 2, '', '16-08-2019', 'accepted'),
(33, 111521664139, 'sick', 8201914062337, 'phuc98', 1, '', '16-08-2019', 'accepted'),
(34, 201521664164, 'maternity', 8201914062337, 'phuc98', 1, '', '16-08-2019', 'accepted'),
(35, 191521664208, 'study', 8201914062337, 'phuc98', 1, '', '16-08-2019', 'accepted'),
(36, 191521664227, 'emergency', 8201914062337, 'phuc98', 1, '', '18-08-2019', 'accepted'),
(37, 111521664139, 'sick', 8201914062414, 'supervisor', 6, '', '18-08-2019', 'accepted'),
(38, 111521664139, 'sick', 8201918111611, 'supervisor', 6, '', '18-08-2019', 'accepted'),
(39, 111521664139, 'sick', 8201918111330, 'supervisor', 6, '', '18-08-2019', 'accepted'),
(40, 191521664208, 'study', 8201918111330, 'supervisor', 7, 'ads', '18-08-2019', 'accepted'),
(41, 1111, 'sick', 8201914062305, 'supervisor', 1, '', '18-08-2019', 'accepted'),
(42, 3333, 'study', 8201914062305, 'supervisor', 11, '', '18-08-2019', 'accepted'),
(43, 2222, 'maternity', 8201914062414, 'supervisor', 1, '', '18-08-2019', 'accepted'),
(44, 3333, 'study', 8201914062414, 'supervisor', 1, '', '18-08-2019', 'accepted'),
(45, 4444, 'emergency', 8201914062414, 'supervisor', 1, '', '18-08-2019', 'accepted'),
(46, 2222, 'maternity', 8201914062305, 'supervisor', 1, '', '18-08-2019', 'accepted');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rejected_leaves`
--

CREATE TABLE `rejected_leaves` (
  `id` int(11) NOT NULL,
  `leave_id` bigint(20) NOT NULL,
  `staff_id` bigint(20) NOT NULL,
  `leave_type` varchar(250) NOT NULL,
  `num_days` int(11) DEFAULT NULL,
  `date_rejected` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `rejected_leaves`
--

INSERT INTO `rejected_leaves` (`id`, `leave_id`, `staff_id`, `leave_type`, `num_days`, `date_rejected`) VALUES
(6, 201521664164, 3201821131600, 'maternity', NULL, '14-08-2019'),
(7, 161521664278, 4201804045945, 'special', NULL, '14-08-2019'),
(8, 111521833755, 3201821131600, 'sick', NULL, '14-08-2019');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_leave_metadata`
--

CREATE TABLE `user_leave_metadata` (
  `id` int(11) NOT NULL,
  `staff_level` varchar(200) NOT NULL,
  `total_yr_leave_count` bigint(20) NOT NULL,
  `total_month_leave_count` bigint(20) NOT NULL,
  `current_days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user_leave_metadata`
--

INSERT INTO `user_leave_metadata` (`id`, `staff_level`, `total_yr_leave_count`, `total_month_leave_count`, `current_days`) VALUES
(1, 'non-supervisor', 300, 25, 300),
(2, 'supervisor', 320, 30, 320);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `accepted_leaves`
--
ALTER TABLE `accepted_leaves`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_id` (`admin_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Chỉ mục cho bảng `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `staff_id` (`staff_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Chỉ mục cho bảng `job_description`
--
ALTER TABLE `job_description`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `leave_id` (`leave_id`);

--
-- Chỉ mục cho bảng `leave_applications`
--
ALTER TABLE `leave_applications`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_recovery_meta`
--
ALTER TABLE `password_recovery_meta`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `recommended_leaves`
--
ALTER TABLE `recommended_leaves`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rejected_leaves`
--
ALTER TABLE `rejected_leaves`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_leave_metadata`
--
ALTER TABLE `user_leave_metadata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `accepted_leaves`
--
ALTER TABLE `accepted_leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `job_description`
--
ALTER TABLE `job_description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `leave_applications`
--
ALTER TABLE `leave_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `password_recovery_meta`
--
ALTER TABLE `password_recovery_meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `recommended_leaves`
--
ALTER TABLE `recommended_leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `rejected_leaves`
--
ALTER TABLE `rejected_leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `user_leave_metadata`
--
ALTER TABLE `user_leave_metadata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
