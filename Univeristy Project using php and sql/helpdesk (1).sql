-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2024 at 03:26 PM
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
-- Database: `helpdesk`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_name`, `username`, `password`) VALUES
('', 'admin', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(255) NOT NULL,
  `app_msg` varchar(255) NOT NULL,
  `stud_id` int(255) NOT NULL,
  `staff_id` varchar(255) NOT NULL,
  `Department_id` int(11) NOT NULL,
  `staff_reply` varchar(255) NOT NULL,
  `reply_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `app_msg`, `stud_id`, `staff_id`, `Department_id`, `staff_reply`, `reply_date`) VALUES
(1, 'projector issues', 112233, '1', 1, 'Approved', '2019-05-10'),
(2, 'Moodle access ', 2327, '1', 1, 'Not Approved', '2024-04-07'),
(5, 'Assignment feedback', 2723, '2', 1, 'Not Approved', '2024-04-14'),
(6, 'moodle accces', 2723, '4', 1, '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `enq_id` int(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `enq_msg` varchar(255) NOT NULL,
  `staff_id` int(255) NOT NULL,
  `stud_id` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `com_date` date NOT NULL,
  `staff_reply` varchar(255) NOT NULL,
  `reply_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`enq_id`, `subject`, `enq_msg`, `staff_id`, `stud_id`, `dept`, `com_date`, `staff_reply`, `reply_date`) VALUES
(30, 'AC not working', 'AC is not working fine.', 1, '112233', '1', '2019-05-10', 'helloo', '2019-05-10'),
(31, 'Wifi', 'WIFI Slow', 0, '112233', '2', '2024-03-27', '', '0000-00-00'),
(35, 'academics', 'cannot access the assignment brief in the moodle', 5, '2723', '1', '2024-04-13', '', '0000-00-00'),
(37, 'feedback submission ', 'turnitin not showing plagiarism ', 5, '2723', '1', '2024-04-13', 'please upload in the new link', '2024-04-13');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Departmentid` int(11) NOT NULL,
  `Departmentname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Departmentid`, `Departmentname`) VALUES
(1, 'Computing'),
(2, 'Mechanical'),
(3, 'Electrical'),
(4, 'Business'),
(5, 'Civil');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `EventID` int(11) NOT NULL,
  `EventName` varchar(100) DEFAULT NULL,
  `Department` varchar(50) DEFAULT NULL,
  `Presenter` varchar(100) DEFAULT NULL,
  `Venue` varchar(100) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Time` time DEFAULT NULL,
  `SubmissionDate` date DEFAULT curdate(),
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`EventID`, `EventName`, `Department`, `Presenter`, `Venue`, `Date`, `Time`, `SubmissionDate`, `image`) VALUES
(3, 'cyber security', 'course1', 'Ms Renuka', 'Auditorium ', '2024-04-03', '17:00:00', '2024-04-12', 'imgs/about.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `ID` int(11) NOT NULL,
  `Departmentid` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`ID`, `Departmentid`, `fullname`, `designation`, `email`, `phone_number`, `profile`, `image`, `password`) VALUES
(2, 1, 'Ms Ibtisam Mogul', 'Lecturer', 'aass@gmail.com', 76567898, 'positive', 'img/about.jpg', '22222'),
(4, 1, 'Ms. Asmat', 'Junior Lecturer ', 'asma.10@gmail.com', 2147483647, 'positive', 'img/tutor2.webp', '2345'),
(5, 1, 'Ms Fathima Shemim', 'Lecturer ', 'aaas@gamil.com', 3457869, 'positive', '', '2222');

-- --------------------------------------------------------

--
-- Table structure for table `studentapplications`
--

CREATE TABLE `studentapplications` (
  `ApplicationID` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Nationality` varchar(50) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL,
  `ProgramOfInterest` varchar(100) DEFAULT NULL,
  `DesiredStartDate` date DEFAULT NULL,
  `ApplicationDate` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentapplications`
--

INSERT INTO `studentapplications` (`ApplicationID`, `FullName`, `DateOfBirth`, `Gender`, `Nationality`, `Address`, `Email`, `PhoneNumber`, `ProgramOfInterest`, `DesiredStartDate`, `ApplicationDate`) VALUES
(1, 'Gulbahar Asmat', '2024-04-04', 'female', 'Indian', 'rak uae', 'gulbahar.s2327@gmail.com', '0509330108', 'BSc Computing', '2024-05-07', '2024-04-14');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `StudentNo` int(11) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `RegistrationDate` date DEFAULT NULL,
  `StudentID` varchar(20) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Mobile` varchar(20) DEFAULT NULL,
  `ParentsName` varchar(100) DEFAULT NULL,
  `ParentsMobile` varchar(20) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `BloodGroup` varchar(10) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`StudentNo`, `FirstName`, `LastName`, `Email`, `RegistrationDate`, `StudentID`, `Password`, `Gender`, `Mobile`, `ParentsName`, `ParentsMobile`, `DateOfBirth`, `BloodGroup`, `Address`) VALUES
(4, 'Gulbahar', 'Asmat', 'gullu.s2327@gmail.com', '2024-04-08', '2723', '1232', 'female', '0509330108', 'asmat', 'rahman', '2003-08-23', 'O', 'Rak UAE'),
(5, 'Gulbahar', 'Asmat', 'gulbahar.s2327@gmail.com', '2024-04-03', '223227', '12341', 'female', '0509330108', 'asmat', '0509197677', '2003-08-23', 'O', 'Rak UAE'),
(6, 'Sajjad', 'Ghare', 'sajjad@gmail.com', '0000-00-00', '7223', '12342', 'male', '8657472327', 'yaseen', '0509197677', '2000-12-27', 'A', 'Uae, rak');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacherid` int(11) NOT NULL,
  `Departmentid` int(11) NOT NULL,
  `teachername` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacherid`, `Departmentid`, `teachername`) VALUES
(1, 1, 'Fatima Shemmim'),
(2, 1, 'Ibtisam Mogul'),
(3, 1, 'Abdurrahman Maihula'),
(4, 1, 'Abdi Hubsey'),
(5, 2, 'Yaqub Mogul'),
(6, 2, 'Shimna Shafeek'),
(7, 3, 'Poonam Mund'),
(8, 3, 'Vidya Ragesh'),
(9, 2, 'Ben Alex'),
(10, 3, 'Kelvin John'),
(11, 4, 'Asma '),
(12, 4, 'Abdi'),
(13, 4, 'Luvdeep kaur'),
(14, 4, 'Marie Zufta'),
(15, 5, 'Karthika'),
(16, 5, 'Muhhanaa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD UNIQUE KEY `app_no` (`id`);

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`enq_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Departmentid`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`EventID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `studentapplications`
--
ALTER TABLE `studentapplications`
  ADD PRIMARY KEY (`ApplicationID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`StudentNo`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacherid`),
  ADD KEY `Departmentid` (`Departmentid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `enq_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `Departmentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `EventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `studentapplications`
--
ALTER TABLE `studentapplications`
  MODIFY `ApplicationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `StudentNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacherid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `Departmentid` FOREIGN KEY (`Departmentid`) REFERENCES `department` (`Departmentid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
