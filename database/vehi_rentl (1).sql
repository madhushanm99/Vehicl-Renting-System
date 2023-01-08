-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2023 at 04:58 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehi_rentl`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2023-01-01 01:27:37');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `id` int(11) NOT NULL,
  `userEmail` varchar(100) DEFAULT NULL,
  `VehicleId` int(11) DEFAULT NULL,
  `Price` int(6) NOT NULL DEFAULT 0,
  `service_fee` int(11) NOT NULL DEFAULT 0,
  `FromDate` varchar(20) DEFAULT NULL,
  `ToDate` varchar(20) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`id`, `userEmail`, `VehicleId`, `Price`, `service_fee`, `FromDate`, `ToDate`, `message`, `Status`, `PostingDate`) VALUES
(16, 'abcdefg@gmail.com', 42, 4005, 3, '20/11/2021', '22/10/2022', 'Hii! I would Like to Rent this Vehicle.', 3, '2022-11-19 09:19:16'),
(17, 'abcdefg@gmail.com', 40, 8000, 3, '20/11/2021', '22/11/2021', 'Hii! I would Like to Rent this Vehicle.', 2, '2022-11-19 11:34:56'),
(18, 'abcdefg@gmail.com', 42, 4005, 3, '20/11/2021', '22/11/2021', 'Hii! I would Like to Rent this Vehicle.', 0, '2022-11-19 14:33:57'),
(19, 'Nishmi@gmail.com', 42, 4005, 3, '20/11/2021', '22/10/2022', 'Hii! I would Like to Rent this Vehicle.', 0, '2022-11-30 03:33:25'),
(20, 'Nishmi@gmail.com', 44, 4005, 3, '20/11/2021', '22/11/2021', 'Hii! I would Like to Rent this Vehicle.', 0, '2022-12-04 01:17:13'),
(21, 'Nishmi@gmail.com', 45, 4000, 3, '20/11/2021', '22/10/2022', 'Hii! I would Like to Rent this Vehicle.', 2, '2022-12-26 11:07:56'),
(29, 'Nishmi@gmail.com', 42, 4005, 3, '20/11/2021', '22/10/2022', 'Hii! I would Like to Rent this Vehicle.', 2, '2023-01-01 00:50:31'),
(30, 'Nishmi@gmail.com', 45, 4000, 3, '20/11/2021', '22/11/2021', 'Hii! I would Like to Rent this Vehicle.', 1, '2023-01-01 00:51:08'),
(31, 'Nishmi@gmail.com', 42, 4005, 3, '20/11/2021', '22/10/2022', 'Hii! I would Like to Rent this Vehicle.', 1, '2023-01-01 02:33:29'),
(32, 'Nishmi@gmail.com', 42, 4005, 3, '20/11/2021', '22/10/2022', 'Hii! I would Like to Rent this Vehicle.', 2, '2023-01-01 02:38:07'),
(33, 'Nishmi@gmail.com', 49, 5000, 3, '20/11/2021', '22/10/2022', 'Hii! I would Like to Rent this Vehicle.', 1, '2023-01-01 03:22:23'),
(34, 'Nishmi@gmail.com', 40, 8000, 3, '21/02/2023', '22/02/2023', 'Hii! I would Like to Rent this Vehicle.', 1, '2023-01-01 09:02:10'),
(35, 'Nishmi@gmail.com', 42, 4005, 3, '2023-01-04', '2023-01-12', 'Hii! I would Like to Rent this Vehicle.', 0, '2023-01-01 18:15:42'),
(36, 'Isruri@gmail.com', 42, 4005, 3, '2023-01-04', '2023-01-12', 'Hii! I would Like to Rent this Vehicle.', 0, '2023-01-01 18:15:42'),
(37, 'Isruri@gmail.com', 40, 8000, 3, '2023-01-07', '2023-01-08', 'Hii! I would Like to Rent this Vehicle.', 0, '2023-01-06 04:34:41'),
(38, 'Nishmi@gmail.com', 40, 8000, 3, '2023-01-08', '2023-01-10', 'Hii! I would Like to Rent this Vehicle.', 0, '2023-01-06 23:38:56');

-- --------------------------------------------------------

--
-- Table structure for table `tblbrands`
--

CREATE TABLE `tblbrands` (
  `id` int(11) NOT NULL,
  `BrandName` varchar(120) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbrands`
--

INSERT INTO `tblbrands` (`id`, `BrandName`, `CreationDate`, `UpdationDate`) VALUES
(1, 'BMW', '2017-06-18 16:24:50', '2022-11-19 05:49:38'),
(2, 'Audi', '2017-06-18 16:25:03', '2022-07-26 18:15:46'),
(3, 'Nissan', '2017-06-18 16:25:13', '2022-07-26 18:15:49'),
(4, 'Toyota', '2017-06-18 16:25:24', '2022-07-26 18:15:52'),
(9, 'Suzukii', '2022-07-26 18:37:47', '2022-09-08 07:35:05'),
(24, 'Bajaj', '2022-12-31 06:36:04', '2022-12-31 06:41:43');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactowner`
--

CREATE TABLE `tblcontactowner` (
  `id` int(11) NOT NULL,
  `emailId` varchar(120) NOT NULL,
  `message` longtext NOT NULL,
  `vehicleId` int(11) NOT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcontactowner`
--

INSERT INTO `tblcontactowner` (`id`, `emailId`, `message`, `vehicleId`, `postingDate`, `status`) VALUES
(1, 'Nishmi@gmail.com', 'How is the running condition of this car?', 45, '2022-12-28 04:47:18', 1),
(2, 'Nishmi@gmail.com', 'How is the running condition of this car?', 42, '2022-12-28 04:47:18', 1),
(3, 'Nishmi@gmail.com', 'How is the running condition of this car?', 40, '2022-12-28 04:47:18', 1),
(4, 'Nishmi@gmail.com', 'How is the running condition of this car?', 44, '2022-12-28 04:47:18', 1),
(5, 'Nishmi@gmail.com', 'How is the running condition of this car?', 45, '2022-12-29 04:05:21', 0),
(6, 'Nishmi@gmail.com', 'How is the running condition of this car?', 45, '2022-12-30 18:56:42', 0),
(7, 'Nishmi@gmail.com', 'How is the running condition of this car?', 45, '2022-12-30 19:09:01', 0),
(8, 'madhushanm99@gmail.coma', 'How is the running condition of this car?', 40, '2022-12-31 05:57:03', 0),
(9, 'Nishmi@gmail.com', 'How is the running condition of this car?', 45, '2023-01-01 01:23:10', 1),
(12, 'Nishmi@gmail.com', 'How is the running condition of this car?', 49, '2023-01-01 03:21:14', 0),
(13, 'Nishmi@gmail.com', 'How is the running condition of this car?', 49, '2023-01-01 03:35:24', 0),
(14, 'Nishmi@gmail.com', 'Test 01', 49, '2023-01-01 04:08:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusquery`
--

CREATE TABLE `tblcontactusquery` (
  `id` int(11) NOT NULL,
  `Fname` varchar(100) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `ContactNumber` char(11) DEFAULT NULL,
  `Message` longtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcontactusquery`
--

INSERT INTO `tblcontactusquery` (`id`, `Fname`, `EmailId`, `ContactNumber`, `Message`, `PostingDate`, `status`) VALUES
(1, 'Manura Madhushan', 'madhushanm99@gmail.com', '0713698026', 'How can I rent this car?', '2022-06-18 10:03:07', 1),
(8, 'M.A.Manura Madhushan Munasingha', 'madhushanm99@gmail.com', '0713698026', 'How can I rent this car?', '2022-11-29 02:56:27', 1),
(9, 'M.A.Manura Madhushan Munasingha', 'madhushanm99@gmail.com', '0713698026', 'How can I rent this car?', '2022-11-29 02:59:38', 1),
(10, 'M.A.Manura Madhushan Munasingha', 'madhushanm99@gmail.com', '0713698026', 'How can I rent this car?', '2022-11-29 02:59:52', 1),
(11, 'M.A.Manura Madhushan Munasingha', 'madhushanm99@gmail.com', '0713698026', 'How can I rent this car?', '2022-11-29 03:00:46', 0),
(12, 'M.A.Manura Madhushan Munasingha', 'madhushanm99@gmail.com', '0713698026', 'How can I rent this car?', '2022-11-29 03:02:29', 0),
(13, 'M.A.Manura Madhushan Munasingha', 'madhushanm99@gmail.com', '0713698026', 'How can I rent this car?', '2022-11-29 03:04:17', 0),
(14, 'M.A.Manura Madhushan Munasingha', 'madhushanm99@gmail.com', '0713698026', 'How can I rent this car?', '2022-11-29 03:09:23', 0),
(15, 'M.A.Manura Madhushan Munasingha', 'madhushanm99@gmail.com', '0713698026', 'How can I rent this car?', '2022-11-29 03:10:54', 0),
(16, 'M.A.Manura Madhushan Munasingha', 'madhushanm99@gmail.com', '0713698026', 'How can I rent this car?', '2022-11-29 03:11:13', 0),
(17, 'M.A.Manura Madhushan Munasingha', 'madhushanm99@gmail.com', '0713698026', 'How can I rent this car?', '2022-11-29 03:12:31', 0),
(18, 'M.A.Manura Madhushan Munasingha', 'madhushanm99@gmail.com', '0713698026', 'How can I rent this car?', '2022-12-30 19:10:49', 0),
(19, 'Manura Madhushan', 'madhushanm99@gmail.coma', '0713698026', 'How can I rent this car?', '2022-12-31 03:00:07', 1),
(20, 'Rashmi Nishmi', 'rash@gmail.com', '0712345678', 'How can I rent this car?', '2023-01-01 01:00:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblreview`
--

CREATE TABLE `tblreview` (
  `id` int(11) NOT NULL,
  `UserEmail` varchar(100) NOT NULL,
  `VehicleId` int(11) NOT NULL,
  `Rate` int(11) NOT NULL,
  `Feedback` mediumtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblreview`
--

INSERT INTO `tblreview` (`id`, `UserEmail`, `VehicleId`, `Rate`, `Feedback`, `PostingDate`, `status`) VALUES
(7, 'abcdefg@gmail.com', 42, 3, 'This was really awesome car. and This Provider is cool. ', '2022-11-19 10:51:08', 1),
(8, 'abcdefg@gmail.com', 42, 3, 'This was really awesome car. and This Provider is cool. ', '2022-11-19 10:52:55', 0),
(9, 'abcdefg@gmail.com', 42, 3, 'This was really awesome car. and This Provider is cool. ', '2022-11-19 11:03:47', 0),
(12, 'abcdefg@gmail.com', 40, 4, 'This was really awesome car. and This Provider is cool. ', '2022-11-19 11:35:05', 1),
(14, 'abcdefg@gmail.com', 40, 4, 'This was really awesome car. and This Provider is cool. ', '2022-11-19 11:47:05', 1),
(16, 'abcdefg@gmail.com', 45, 4, 'This was really awesome car. and This Provider is cool. ', '2022-11-19 11:47:30', 0),
(42, 'Nishmi@gmail.com', 45, 3, 'This was really awesome car. and This Provider is cool. ', '2022-12-26 11:08:03', 0),
(43, 'Nishmi@gmail.com', 45, 4, 'This was really awesome car. and This Provider is cool. ', '2022-12-29 04:05:48', 0),
(44, 'Nishmi@gmail.com', 45, 3, 'This was really awesome car. and This Provider is cool. ', '2022-12-30 18:56:02', 0),
(45, 'Nishmi@gmail.com', 45, 3, 'This was really awesome car. and This Provider is cool. ', '2022-12-30 19:01:41', 0),
(46, 'Nishmi@gmail.com', 45, 3, 'This was really awesome car. and This Provider is cool. ', '2022-12-30 19:03:41', 0),
(47, 'Nishmi@gmail.com', 45, 3, 'This was really awesome car. and This Provider is cool. ', '2022-12-30 19:03:58', 0),
(48, 'Nishmi@gmail.com', 45, 3, 'This was really awesome car. and This Provider is cool. ', '2022-12-30 19:08:26', 0),
(49, 'Nishmi@gmail.com', 45, 3, 'This was really awesome car. and This Provider is cool. ', '2022-12-30 19:08:33', 0),
(50, 'madhushanm99@gmail.coma', 40, 3, 'This was really awesome car. and This Provider is cool. ', '2022-12-31 05:56:18', 0),
(51, 'Nishmi@gmail.com', 45, 3, 'This was really awesome car. and This Provider is cool. ', '2023-01-01 00:54:10', 0),
(52, 'Nishmi@gmail.com', 45, 3, 'This was really awesome car. and This Provider is cool. ', '2023-01-01 00:55:28', 1),
(53, 'Nishmi@gmail.com', 49, 3, 'This was really awesome car. and This Provider is cool. ', '2023-01-01 03:22:34', 0),
(54, 'Nishmi@gmail.com', 49, 3, 'This was really awesome car. and This Provider is cool. ', '2023-01-01 03:24:03', 0),
(55, 'Nishmi@gmail.com', 42, 4, 'This was really awesome car. and This Provider is cool. ', '2023-01-01 18:13:11', 0),
(56, 'Nishmi@gmail.com', 42, 4, 'This was really awesome car. and This Provider is cool. ', '2023-01-01 18:14:19', 0),
(57, 'Nishmi@gmail.com', 40, 3, 'This was really awesome car. and This Provider is cool. ', '2023-01-05 05:48:18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(120) DEFAULT 'aaaa',
  `EmailId` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(100) DEFAULT 'Nugegoda',
  `Country` varchar(100) DEFAULT 'Sri Lanka',
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `UserType` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `EmailId`, `Password`, `ContactNo`, `dob`, `Address`, `City`, `Country`, `RegDate`, `UpdationDate`, `UserType`) VALUES
(0, 'Admin', 'admin@vehi.lk', '1234', NULL, '1234', NULL, 'Nugegoda', 'Sri Lanka', '2023-01-08 14:18:54', '2023-01-08 14:19:39', 0),
(10, 'Manura Madhushan', 'madhushanm99@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0713698025', '2000-01-01', 'No 123, abc road', 'Nugegoda', 'Sri Lanka', '2022-07-26 13:18:55', '2023-01-07 13:56:03', 0),
(11, 'Manura Madhushan Provider', 'madhushanm99@gmail.com2', 'e10adc3949ba59abbe56e057f20f883e', '0713698026', '2000-01-01', 'No 123, abc road', 'Nugegoda', 'Sri Lanka', '2022-07-26 17:29:32', '2023-01-07 13:56:16', 1),
(12, 'Eshan Perera', 'eshanperera@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0713698026', '2000-01-01', '150/7, Golden Grow , Kospelawinna,', 'Rathnapura', 'Sri Lanka', '2022-07-26 18:42:50', '2023-01-07 13:54:14', 1),
(14, 'Manura ', 'madhushanm99@gmail.com55', 'e10adc3949ba59abbe56e057f20f883e', '0713698026', '2000-01-01', 'No 123, abc road', 'Rathnapura', 'Sri Lanka', '2022-07-27 04:03:01', '2023-01-07 13:56:16', 0),
(15, 'Rashmi Nishmi', 'Nishmi@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '0729761336', '2000-01-01', 'No 123, abc road', 'Maharagama', 'Sri Lanka', '2022-09-08 04:03:10', '2023-01-08 10:11:33', 0),
(17, 'Nirmani Dinithi', 'Nirmani@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0717269374', '2000-01-01', 'No 123, abc road', 'Kagale', 'Sri Lanka', '2022-09-08 07:15:05', '2023-01-07 13:56:16', 0),
(18, 'Isuri Bashitha', 'Isruri@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0712345678', '2000-01-01', 'No 123, abc road', 'Kaluthara', 'Sri Lanka', '2022-09-24 04:55:03', '2023-01-07 13:56:16', 0),
(19, 'abcde Test', 'abcdefg@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0712233675', '2000-01-01', 'No 123, abc road', 'Nugegoda', 'Sri Lanka', '2022-09-24 05:11:54', '2023-01-07 13:56:16', 0),
(20, 'eshan perera', 'eshan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0719958599', '2000-01-01', 'No 123, abc road', 'Nugegoda', 'Sri Lanka', '2022-09-24 05:16:06', '2023-01-07 13:56:16', 1),
(21, 'Rashmi Nishmi', 'rash@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0112160472', '2000-01-01', 'No 123, abc road', 'Maharagama', 'Sri Lanka', '2022-09-24 05:53:58', '2023-01-07 13:56:16', 1),
(22, 'M.A.Manura Madhushan Munasingha', 'madhushanm99@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0713698026', '2000-01-01', 'No 123, abc road', 'Nugegoda', 'Sri Lanka', '2022-12-30 05:14:04', '2023-01-07 13:56:16', 0),
(23, 'M.A.Manura Madhushan Munasingha', 'madhushanm99@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0713698026', '2000-01-01', 'No 123, abc road', 'Kalaniya', 'Sri Lanka', '2022-12-30 05:15:46', '2023-01-07 13:56:16', 0),
(24, 'M.A.Manura Madhushan Munasingha', 'madhushanm99@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0713698026', '2000-01-01', 'No 123, abc road', 'Hanwalla', 'Sri Lanka', '2022-12-30 17:11:41', '2023-01-07 13:56:16', 0),
(25, 'Madhushan Manura', 'madhushanm99@gmail.coma', 'e10adc3949ba59abbe56e057f20f883e', '0713698026', '2000-01-01', 'No 123, road', 'Homagama', 'Sri Lanka', '2022-12-31 02:46:44', '2023-01-07 13:54:14', 0),
(26, 'Eshan Perera 02', 'eshanperera@gmail.coma', 'e10adc3949ba59abbe56e057f20f883e', '0712345678', '2000-01-01', 'No: 123 abc road ', 'Colombo', 'Sri Lanka', '2023-01-01 01:32:07', '2023-01-07 13:54:14', 1),
(27, 'M.A.Manura Madhushan Munasingha', 'gfcdyfyfyu@cffg.nn', '81dc9bdb52d04dc20036dbd8313ed055', '0713698026', NULL, NULL, 'Nugegoda', 'Sri Lanka', '2023-01-08 10:07:54', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblvehicles`
--

CREATE TABLE `tblvehicles` (
  `id` int(11) NOT NULL,
  `VehiclesTitle` varchar(150) DEFAULT NULL,
  `VehicleProviderid` int(11) DEFAULT 0,
  `VehiclesBrand` int(11) DEFAULT NULL,
  `VehiclesOverview` longtext DEFAULT NULL,
  `PricePerDay` int(11) DEFAULT NULL,
  `FuelType` varchar(100) DEFAULT NULL,
  `ModelYear` int(6) DEFAULT NULL,
  `SeatingCapacity` int(11) DEFAULT NULL,
  `Vimage1` varchar(120) DEFAULT NULL,
  `Vimage2` varchar(120) DEFAULT NULL,
  `Vimage3` varchar(120) DEFAULT NULL,
  `Vimage4` varchar(120) DEFAULT NULL,
  `Vimage5` varchar(120) DEFAULT NULL,
  `AirConditioner` int(11) DEFAULT NULL,
  `PowerDoorLocks` int(11) DEFAULT NULL,
  `AntiLockBrakingSystem` int(11) DEFAULT NULL,
  `BrakeAssist` int(11) DEFAULT NULL,
  `PowerSteering` int(11) DEFAULT NULL,
  `DriverAirbag` int(11) DEFAULT NULL,
  `PassengerAirbag` int(11) DEFAULT NULL,
  `PowerWindows` int(11) DEFAULT NULL,
  `CDPlayer` int(11) DEFAULT NULL,
  `CentralLocking` int(11) DEFAULT NULL,
  `CrashSensor` int(11) DEFAULT NULL,
  `LeatherSeats` int(11) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1,
  `service_fee` int(11) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblvehicles`
--

INSERT INTO `tblvehicles` (`id`, `VehiclesTitle`, `VehicleProviderid`, `VehiclesBrand`, `VehiclesOverview`, `PricePerDay`, `FuelType`, `ModelYear`, `SeatingCapacity`, `Vimage1`, `Vimage2`, `Vimage3`, `Vimage4`, `Vimage5`, `AirConditioner`, `PowerDoorLocks`, `AntiLockBrakingSystem`, `BrakeAssist`, `PowerSteering`, `DriverAirbag`, `PassengerAirbag`, `PowerWindows`, `CDPlayer`, `CentralLocking`, `CrashSensor`, `LeatherSeats`, `RegDate`, `UpdationDate`, `status`, `service_fee`) VALUES
(40, 'Corolla', 0, 4, 'Toyota Corolla', 8000, 'Petrol', 2016, 5, 'assets/vimg/356024172.jpg', 'assets/vimg/187100242.jpg', 'assets/vimg/161004512.jpg', 'assets/vimg/187100242.jpg', 'assets/vimg/356024172.jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2022-10-11 05:27:45', '2023-01-08 14:40:19', 1, 100),
(42, 'GTR', 12, 1, 'Nissan GTR', 4005, 'Petrol', 2017, 3, 'assets/vimg/582799967.jpg', 'assets/vimg/678052698.jpg', 'assets/vimg/999031330.jpg', 'assets/vimg/396556003.jpg', 'assets/vimg/652252801.jpg', 1, NULL, NULL, NULL, 1, NULL, 1, 1, 1, 1, 1, 1, '2022-10-11 05:30:13', '2023-01-01 02:33:07', 0, 3),
(44, 'GTR', 12, 1, 'Nissan GTR', 4005, 'Petrol', 2017, 3, 'assets/vimg/582799967.jpg', 'assets/vimg/678052698.jpg', 'assets/vimg/999031330.jpg', 'assets/vimg/396556003.jpg', 'assets/vimg/652252801.jpg', 1, NULL, NULL, NULL, 1, NULL, 1, 1, 1, 1, 1, 1, '2022-10-11 05:30:13', '2022-11-29 16:18:28', 1, 3),
(45, 'Corolla', 0, 4, 'Toyota Corolla', 4000, 'Diesel', 2016, 5, 'assets/vimg/991995052.jpg', 'assets/vimg/161004512.jpg', 'assets/vimg/991995052.jpg', 'assets/vimg/187100242.jpg', 'assets/vimg/493559966.jpg', 1, 1, 1, 1, 1, 1, 1, NULL, 1, 1, 1, NULL, '2022-10-11 05:27:45', '2023-01-08 14:40:15', 0, 100),
(48, 'WagonR', 0, 9, 'Suzuki Wagon R', 5000, 'Petrol', 2018, 5, 'assets/vimg/629200388.jpg', 'assets/vimg/473563670.jpg', 'assets/vimg/525803901.jpg', 'assets/vimg/205327993.jpg', 'assets/vimg/702005417.jpg', 1, NULL, 1, 1, 1, 1, NULL, 1, 1, 1, NULL, NULL, '2023-01-01 02:55:11', '2023-01-08 14:40:23', 1, 100),
(49, 'Premio', 12, 4, 'Honda Premio', 5000, 'Petrol', 2015, 5, 'assets/vimg/894687261.jpg', 'assets/vimg/126919070.jpg', 'assets/vimg/787146876.jpg', 'assets/vimg/290346347.jpg', 'assets/vimg/603473587.jpg', 1, 1, NULL, NULL, 1, 1, NULL, NULL, 1, 1, NULL, NULL, '2023-01-01 03:13:15', '2023-01-01 03:15:46', 1, 3),
(50, 'Civic', 12, 4, 'Honda hhhh Civic', 5000, 'Petrol', 2015, 3, 'assets/vimg/937649562.jpg', 'assets/vimg/379733558.jpg', 'assets/vimg/573050850.jpg', 'assets/vimg/928530714.jpg', 'assets/vimg/609099016.jpg', 1, 1, 1, NULL, 1, 1, NULL, NULL, 1, 1, NULL, NULL, '2023-01-01 03:19:08', '2023-01-01 03:54:06', 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbrands`
--
ALTER TABLE `tblbrands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `BrandName` (`BrandName`);

--
-- Indexes for table `tblcontactowner`
--
ALTER TABLE `tblcontactowner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblreview`
--
ALTER TABLE `tblreview`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
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
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tblbrands`
--
ALTER TABLE `tblbrands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tblcontactowner`
--
ALTER TABLE `tblcontactowner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tblreview`
--
ALTER TABLE `tblreview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
