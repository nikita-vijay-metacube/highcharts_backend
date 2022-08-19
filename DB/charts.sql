-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 19, 2022 at 11:59 AM
-- Server version: 8.0.29-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `charts`
--

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int NOT NULL,
  `student_id` int NOT NULL,
  `subject_id` int NOT NULL,
  `marks` int NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `student_id`, `subject_id`, `marks`, `created_at`) VALUES
(1, 1, 1, 60, '2022-08-18 16:16:02'),
(2, 1, 2, 85, '2022-08-10 16:16:52'),
(3, 1, 3, 90, '2022-08-18 16:16:02'),
(4, 2, 1, 97, '2022-08-18 16:16:02'),
(5, 2, 2, 50, '2022-08-10 16:16:52'),
(6, 2, 3, 98, '2022-08-18 16:16:02'),
(7, 3, 1, 90, '2022-08-18 16:16:02'),
(8, 3, 2, 85, '2022-08-10 16:16:52'),
(9, 3, 3, 20, '2022-08-18 16:16:02');

-- --------------------------------------------------------

--
-- Table structure for table `marks_tbl`
--

CREATE TABLE `marks_tbl` (
  `RollNum` int NOT NULL,
  `StudentName` varchar(60) NOT NULL,
  `English` int NOT NULL,
  `Hindi` int NOT NULL,
  `Maths` int NOT NULL,
  `Evs` int NOT NULL,
  `Sanskrit` int NOT NULL,
  `Science` int NOT NULL,
  `grandTotal` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `marks_tbl`
--

INSERT INTO `marks_tbl` (`RollNum`, `StudentName`, `English`, `Hindi`, `Maths`, `Evs`, `Sanskrit`, `Science`, `grandTotal`) VALUES
(1, 'RUBY', 61, 72, 71, 66, 49, 68, 387),
(2, 'EMILY', 20, 90, 44, 54, 59, 64, 331),
(3, 'GRACE', 80, 90, 82, 45, 33, 66, 396),
(4, 'JESSICA', 30, 80, 23, 32, 30, 30, 225),
(5, 'CHLOE', 60, 70, 32, 98, 60, 60, 380),
(6, 'SOPHIE', 40, 60, 67, 47, 40, 40, 294),
(7, 'LILY', 50, 60, 67, 75, 50, 50, 352),
(8, 'AMELIA', 45, 60, 56, 84, 45, 45, 335),
(9, 'EVIE', 40, 50, 77, 33, 40, 40, 280),
(10, 'MIA', 33, 50, 81, 65, 33, 33, 295),
(11, 'ELLA', 32, 50, 91, 43, 32, 32, 280),
(12, 'CHARLOTTE', 31, 45, 10, 10, 31, 31, 158),
(13, 'LUCY', 30, 40, 10, 10, 30, 30, 150),
(14, 'MEGAN', 29, 40, 10, 10, 29, 29, 147),
(15, 'ELLIE', 28, 40, 11, 11, 28, 28, 146),
(16, 'ISABELLE', 27, 40, 12, 12, 27, 27, 145),
(17, 'ISABELLA', 26, 33, 13, 13, 26, 26, 137),
(18, 'HANNAH', 25, 32, 14, 14, 25, 25, 135),
(19, 'KATIE', 24, 31, 15, 15, 24, 24, 133),
(20, 'AVA', 23, 30, 16, 16, 23, 23, 131),
(21, 'HOLLY', 22, 30, 17, 17, 22, 22, 130),
(22, 'SUMMER', 21, 30, 18, 18, 21, 21, 129),
(23, 'MILLIE', 20, 30, 19, 19, 20, 20, 128),
(24, 'DAISY', 19, 29, 20, 20, 19, 19, 126),
(25, 'PHOEBE', 18, 28, 20, 20, 18, 18, 122),
(26, 'FREYA', 17, 27, 20, 20, 17, 17, 118),
(27, 'ABIGAIL', 16, 26, 21, 21, 16, 16, 116),
(28, 'POPPY', 15, 20, 22, 22, 15, 15, 109),
(29, 'ERIN', 14, 25, 23, 23, 14, 14, 113),
(30, 'EMMA', 13, 24, 24, 24, 13, 13, 111),
(31, 'MOLLY', 12, 23, 25, 25, 12, 12, 109),
(32, 'IMOGEN', 11, 22, 25, 26, 11, 11, 106),
(33, 'AMY', 10, 21, 26, 27, 10, 10, 104),
(34, 'JASMINE', 9, 20, 27, 28, 71, 21, 176),
(35, 'ISLA', 8, 20, 28, 28, 22, 43, 149),
(36, 'SCARLETT', 7, 20, 29, 29, 64, 43, 192),
(37, 'SOPHIA', 6, 20, 30, 30, 32, 46, 164),
(38, 'ELIZABETH', 5, 19, 30, 30, 42, 65, 191),
(39, 'EVA', 4, 18, 30, 30, 75, 44, 201),
(40, 'BROOKE', 3, 17, 30, 30, 45, 66, 191),
(41, 'MATILDA', 2, 16, 31, 31, 75, 35, 190),
(42, 'CAITLIN', 1, 15, 32, 32, 56, 86, 222),
(43, 'KEIRA', 0, 14, 33, 33, 76, 56, 212),
(44, 'ALICE', 90, 13, 40, 40, 90, 90, 363),
(45, 'LOLA', 80, 12, 40, 40, 80, 80, 332),
(46, 'LILLY', 70, 11, 40, 40, 70, 70, 301),
(47, 'AMBER', 60, 10, 40, 40, 60, 60, 270),
(48, 'ISABEL', 50, 10, 45, 45, 50, 50, 250),
(49, 'LAUREN', 40, 10, 50, 50, 40, 40, 230),
(50, 'GEORGIA', 30, 34, 50, 50, 30, 30, 224),
(51, 'GRACIE', 20, 56, 50, 50, 20, 20, 216),
(52, 'ELEANOR', 10, 64, 60, 60, 10, 10, 214),
(53, 'BETHANY', 0, 22, 60, 60, 98, 43, 283),
(54, 'MADISON', 50, 77, 60, 60, 50, 50, 347),
(55, 'AMELIE', 40, 85, 70, 70, 40, 40, 345),
(56, 'ISOBEL', 30, 34, 80, 80, 30, 30, 284),
(57, 'PAIGE', 20, 35, 90, 90, 20, 20, 275),
(58, 'LACEY', 10, 76, 90, 90, 10, 10, 286),
(59, 'SIENNA', 90, 42, 47, 35, 90, 90, 394),
(60, 'LIBBY', 60, 87, 89, 75, 60, 60, 431);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `created_at`) VALUES
(1, 'Nikita', '2022-08-18 16:16:02'),
(2, 'Ronak', '2022-08-10 16:16:52'),
(3, 'Nitendra', '2022-08-18 16:16:02');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `created_at`) VALUES
(1, 'John', '2022-08-09 16:23:51'),
(2, 'Olivia', '2022-08-09 16:23:51'),
(3, 'Marcus', '2022-08-09 16:24:09'),
(4, 'Andrew', '2022-08-09 16:24:09');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `created_at`) VALUES
(1, 'Physics', '2022-08-09 16:24:32'),
(2, 'Biology', '2022-08-09 16:24:32'),
(3, 'Maths', '2022-08-09 16:24:44'),
(4, 'Computer Science', '2022-08-09 16:24:44'),
(5, 'Chemistry', '2022-08-09 16:25:14');

-- --------------------------------------------------------

--
-- Table structure for table `subject_mapping`
--

CREATE TABLE `subject_mapping` (
  `id` int NOT NULL,
  `student_id` int NOT NULL,
  `subject_id` int NOT NULL,
  `involvement` int NOT NULL DEFAULT '100',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subject_mapping`
--

INSERT INTO `subject_mapping` (`id`, `student_id`, `subject_id`, `involvement`, `created_at`) VALUES
(1, 1, 1, 70, '2022-08-09 16:25:52'),
(2, 1, 3, 90, '2022-08-09 16:25:52'),
(3, 1, 5, 30, '2022-08-09 16:25:52'),
(4, 2, 1, 80, '2022-08-09 16:26:32'),
(5, 2, 3, 100, '2022-08-09 16:26:32'),
(6, 2, 4, 100, '2022-08-09 16:26:32'),
(7, 2, 5, 40, '2022-08-09 16:26:32'),
(8, 3, 1, 60, '2022-08-09 16:26:55'),
(9, 3, 2, 100, '2022-08-09 16:26:55'),
(10, 3, 5, 100, '2022-08-09 16:26:55'),
(11, 4, 1, 80, '2022-08-09 16:27:21'),
(12, 4, 5, 80, '2022-08-09 16:27:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks_tbl`
--
ALTER TABLE `marks_tbl`
  ADD PRIMARY KEY (`RollNum`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_mapping`
--
ALTER TABLE `subject_mapping`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subject_mapping`
--
ALTER TABLE `subject_mapping`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
