-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2024 at 06:27 PM
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
-- Database: `tutoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `username`, `password`, `role`) VALUES
(1, 'john_doe', ' Jd2024!', 'superadmin'),
(2, 'jane_smith', 'Js2024!', 'admin'),
(3, 'alice_jones', 'Aj2024!', 'admin'),
(4, 'bob_taylor', 'Bt2024!', 'moderator'),
(5, 'carol_brown', 'Cb2024!', 'moderator');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseID` varchar(30) NOT NULL,
  `courseName` varchar(100) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `schedule` varchar(100) NOT NULL,
  `field` varchar(1000) NOT NULL,
  `tutorID` varchar(30) NOT NULL,
  `image_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseID`, `courseName`, `description`, `schedule`, `field`, `tutorID`, `image_link`) VALUES
('ART001', 'Painting and Drawing', 'Learn foundational painting and drawing techniques, exploring color, form, and mixed media styles.', 'Flexible', 'Creative Art', 'T006', 'images\\course_image\\painting1.jpg'),
('ART002', 'Digital Art', 'Learn techniques for creating digital artwork, including character design, concept art, and illustration.', 'Flexible', 'Creative Art', 'T006', 'images\\course_image\\digitalArt.jpg'),
('ART003', 'Ceramics and Pottery', 'Learn pottery skills, from hand-building and wheel throwing to glazing and creating functional pieces.', 'Flexible', 'Creative Art', 'T006', 'images\\course_image\\ceramics.jpg'),
('ART004', '3D Art', 'Learn to create three-dimensional artworks using various materials and digital 3D modeling tools.', 'Flexible', 'Creative Art', 'T007', 'images\\course_image\\3D-art.jpg'),
('ART005', 'Photography', 'Master the art of photography, covering camera techniques, composition, and post-processing skills.', 'Flexible', 'Creative Art', 'T007', 'images\\course_image\\photography.png'),
('FIN001', 'Introduction to Finance', 'Covers fundamental principles like time value of money, financial statements, and essential investment concepts.', 'Flexible', 'Finance', 'T017', 'images\\course_image\\introToFinance.jpeg'),
('FIN002', 'Financial Accounting', 'Focuses on reporting financial information to external users, such as investors, creditors, and regulatory agencies.', 'Flexible', 'Finance', 'T018', 'images\\course_image\\FinancialAccounting.jpeg'),
('FIN003', 'Fintech and Financial Innovation', 'Study the impact of technology on financial services, including digital payments, and robo-advisors.', 'Flexible', 'Finance', 'T018', 'images\\course_image\\finTech.jpeg'),
('FIN004', 'International Finance', 'Study financial management in an international context, including exchange rates, foreign investment, and global markets.', 'Flexible', 'Finance', 'T019', 'images\\course_image\\international-finance.avif'),
('FIN005', 'Auditing', 'Involves the examination of financial statements and accounting records to ensure accuracy and compliance with accounting standards.', 'Flexible', 'Finance', 'T020', 'images\\course_image\\audit.jpeg'),
('IT001', 'Computer Science', 'Study algorithms, programming, data structures, and foundational principles of computing.', 'Flexible', 'IT', 'T001', 'images\\course_image\\computer-science.png'),
('IT002', 'Software Engineering', 'Learn software design, development, and management methodologies for creating reliable software products.', 'Flexible', 'IT', 'T010', 'images\\course_image\\software_engineering.jpg'),
('IT003', 'Cybersecurity', 'Study techniques to protect networks, systems, and data from cyber threats and attacks.', 'Flexible', 'IT', 'T013', 'images\\course_image\\cybersecurity.jpg'),
('IT004', 'Data Science', 'Explore data collection, analysis, and visualization to make data-driven decisions.', 'Flexible', 'IT', 'T013', 'images\\course_image\\dataScience.jpeg'),
('IT005', 'Artificial Intelligence', 'Study AI principles, from machine learning to natural language processing and robotics.', 'Flexible', 'IT', 'T012', 'images\\course_image\\AI.jpeg'),
('IT006', 'Cloud Computing', 'Learn cloud services, architecture, and deployment for scalable, on-demand computing.', 'Flexible', 'IT', 'T011', 'images\\course_image\\cloudComputing.png'),
('MGMT001', 'Project Management', 'Focus on planning, executing, and monitoring projects, utilizing methodologies like Agile, Scrum, and waterfall approaches.', 'Flexible', 'Management', 'T014', 'images\\course_image\\projectManagement.jpeg'),
('MGMT002', 'Operations Management', 'Optimize production, manage resources, and enhance efficiency within manufacturing or service processes.', 'Flexible', 'Management', 'T014', 'images\\course_image\\operationsManagement.jpeg'),
('MGMT003', 'Strategic Management', 'Develop strategies, analyze competition, and adapt to changing market dynamics for long-term business success.', 'Flexible', 'Management', 'T015', 'images\\course_image\\strategicManagement.jpeg'),
('MGMT004', 'Human Resource Management', 'Manage recruitment, training, and development to build a motivated, high-performing workforce.', 'Flexible', 'Management', 'T016', 'images\\course_image\\hr.jpeg'),
('MGMT005', 'Leadership and Organizational Behavior', 'Study leadership and organizational culture’s impact on employee motivation, satisfaction, and performance.', 'Flexible', 'Management', 'T016', 'images\\course_image\\Leadership.jpeg'),
('MKT001', 'Digital Marketing', 'Learn digital strategies, SEO, social media, and online advertising for effective digital marketing campaigns.', 'Flexible', 'Marketing', 'T001', 'images\\course_image\\digitalMarketing.jpeg'),
('MKT002', 'Content Marketing', 'Explore techniques to create and manage content that engages audiences and builds brand loyalty.', 'Flexible', 'Marketing', 'T002', 'images\\course_image\\contentMarketing.jpeg'),
('MKT003', 'Social Media Marketing', 'Master social media platforms and tools for building brand presence and connecting with audiences.', 'Flexible', 'Marketing', 'T003', 'images\\course_image\\socialMedia.png'),
('MKT004', 'Market Analysis', 'Learn techniques for gathering, analyzing, and interpreting data to inform strategic business decisions.', 'Flexible', 'Marketing', 'T004', 'images\\course_image\\marketAnalysis.jpeg'),
('MKT005', 'Brand Management', 'Understand brand positioning, equity, and strategies for building and maintaining a strong brand identity.', 'Flexible', 'Marketing', 'T005', 'images\\course_image\\Brand_Management.png');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackID` varchar(30) NOT NULL,
  `username` varchar(40) NOT NULL,
  `review` varchar(1000) NOT NULL,
  `rating` int(10) NOT NULL,
  `studentID` varchar(30) NOT NULL,
  `parentID` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `feedback`
--
DELIMITER $$
CREATE TRIGGER `trg_check_rating` BEFORE INSERT ON `feedback` FOR EACH ROW BEGIN
    IF NEW.rating > 5 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Invalid rating value. The rating must be less than or equal to 5.';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `parentID` varchar(30) NOT NULL,
  `fName` varchar(40) NOT NULL,
  `lName` varchar(40) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `relationship` varchar(100) NOT NULL,
  `studentID` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`parentID`, `fName`, `lName`, `username`, `password`, `occupation`, `relationship`, `studentID`) VALUES
('P001', 'Emily', 'Robinson', 'emilyr', 'password123', 'Engineer', 'Mother', 'S004'),
('P002', 'Sophia', 'Davis', 'sophiad', 'securepass456', 'Teacher', 'Mother', 'S005'),
('P003', 'David', 'Miller', 'davidm', 'mypassword789', 'Doctor', 'Father', 'S006'),
('P004', 'Linda', 'Smith', 'lindas', 'p@ssword234', 'Accountant', 'Mother', 'S007'),
('P005', 'James', 'Johnson', 'jamesj', 'passkey987', 'Lawyer', 'Father', 'S008');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `sessionID` varchar(30) NOT NULL,
  `topic` varchar(50) NOT NULL,
  `duration` time DEFAULT NULL,
  `startTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `status` varchar(50) NOT NULL,
  `studentID` varchar(30) NOT NULL,
  `courseID` varchar(30) NOT NULL,
  `tutorID` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`sessionID`, `topic`, `duration`, `startTime`, `EndTime`, `status`, `studentID`, `courseID`, `tutorID`) VALUES
('S001', 'Painting and Drawing', '01:00:00', '10:00:00', '11:00:00', 'Scheduled', 'S001', 'ART001', 'T006'),
('S002', 'Computer Science', '01:00:00', '10:00:00', '11:00:00', 'Scheduled', 'S002', 'IT001', 'T001'),
('S003', 'Financial Accounting', '01:00:00', '10:00:00', '11:00:00', 'Scheduled', 'S003', 'FIN002', 'T018'),
('S004', 'Strategic Management', '01:00:00', '10:00:00', '11:00:00', 'Scheduled', 'S004', 'MGMT003', 'T015'),
('S005', 'Digital Marketing', '01:00:00', '10:00:00', '11:00:00', 'Scheduled', 'S005', 'MKT001', 'T001');

--
-- Triggers `sessions`
--
DELIMITER $$
CREATE TRIGGER `before_insert_sessions` BEFORE INSERT ON `sessions` FOR EACH ROW BEGIN
    IF NEW.status NOT IN ('completed', 'scheduled', 'cancelled') THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Invalid status value. Allowed values are: completed, scheduled, cancelled.';
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `check_times_before_insert` BEFORE INSERT ON `sessions` FOR EACH ROW BEGIN
    IF NEW.endTime <= NEW.startTime THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error: endTime must be greater than startTime.';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentID` varchar(30) NOT NULL,
  `fName` varchar(40) NOT NULL,
  `lName` varchar(40) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pNum` int(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `fName`, `lName`, `username`, `pNum`, `password`, `email`) VALUES
('S001', 'John', 'Miller', 'johnm', 1234545, 'password1', 'john.miller@example.com'),
('S002', 'Sarah', 'Kim', 'sarahk', 4383647, 'password2', 'sarah.kim@example.com'),
('S003', 'Michael', 'Taylor', 'michaelt', 2147471, 'password3', 'michael.taylor@example.com'),
('S004', 'Sophia', 'Davis', 'sophiad', 2147483, 'password4', 'sophia.davis@example.com'),
('S005', 'Emily', 'Rodriguez', 'emilyr', 2183647, 'password5', 'emily.rodriguez@example.com'),
('S006', 'David', 'Garcia', 'davidg', 4836472, 'password6', 'david.garcia@example.com'),
('S007', 'Sarah', 'Kim', 'sarahk', 4303647, 'password7', 'sarah.kim@example.com'),
('S008', 'Michael', 'Taylor', 'michaelt', 2147001, 'password3', 'michael.taylor@example.com');

--
-- Triggers `student`
--
DELIMITER $$
CREATE TRIGGER `before_insert_student` BEFORE INSERT ON `student` FOR EACH ROW BEGIN
    IF NEW.email NOT LIKE '%@%' THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Invalid email format. Email must contain an @ symbol.';
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_pnum_student_insert` BEFORE INSERT ON `student` FOR EACH ROW BEGIN
    -- Check if PNum is not exactly 7 digits
    IF NEW.PNum NOT REGEXP '^[0-9]{7}$' THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Invalid PNum format. PNum must be exactly 7 digits.';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tutor`
--

CREATE TABLE `tutor` (
  `tutorID` varchar(30) NOT NULL,
  `lName` varchar(40) NOT NULL,
  `fName` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `pNum` int(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `address` varchar(100) NOT NULL,
  `specialisation` varchar(100) NOT NULL,
  `availability` varchar(30) DEFAULT NULL,
  `qualification` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutor`
--

INSERT INTO `tutor` (`tutorID`, `lName`, `fName`, `username`, `password`, `pNum`, `email`, `address`, `specialisation`, `availability`, `qualification`) VALUES
('T001', 'Smith', 'John', 'johns', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 1234567890, 'john.smith@example.com', '123 Main St, City', 'Creative Art', 'Flexible', 'MFA in Fine Arts'),
('T002', 'Johnson', 'Emily', 'emilyj', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 7836593, 'emily.johnson@example.com', '456 Elm St, City', 'Creative Art', 'Flexible', 'MFA in Digital Art'),
('T003', 'Williams', 'Michael', 'michaelw', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 6734792, 'michael.williams@example.com', '789 Oak St, City', 'Creative Art', 'Flexible', 'MFA in Ceramics'),
('T004', 'Jones', 'Sarah', 'sarahj', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 5724608, 'sarah.jones@example.com', '321 Pine St, City', 'Creative Art', 'Flexible', 'MFA in 3D Art'),
('T005', 'Brown', 'David', 'davidb', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 6835809, 'david.brown@example.com', '654 Maple St, City', 'Creative Art', 'Flexible', 'MFA in Photography'),
('T006', 'Davis', 'Laura', 'laurad', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 2660973, 'laura.davis@example.com', '987 Cedar St, City', 'Finance', 'Flexible', 'MSc Finance'),
('T007', 'Miller', 'James', 'jamesm', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 1683579, 'james.miller@example.com', '654 Birch St, City', 'Finance', 'Flexible', 'MSc Accounting'),
('T008', 'Wilson', 'Linda', 'lindaw', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 5942107, 'linda.wilson@example.com', '321 Oak St, City', 'Finance', 'Flexible', 'MSc Fintech'),
('T009', 'Moore', 'Robert', 'robertm', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 9825714, 'robert.moore@example.com', '234 Willow St, City', 'Finance', 'Flexible', 'MSc International Finance'),
('T010', 'Taylor', 'Jessica', 'jessicat', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 9461586, 'jessica.taylor@example.com', '567 Pine St, City', 'Finance', 'Flexible', 'MSc Auditing'),
('T011', 'Anderson', 'Thomas', 'thomasa', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 3871946, 'thomas.anderson@example.com', '876 Maple St, City', 'IT', 'Flexible', 'MSc Computer Science'),
('T012', 'Thomas', 'Patricia', 'patriciat', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 1236547, 'patricia.thomas@example.com', '543 Oak St, City', 'IT', 'Flexible', 'MSc Software Engineering'),
('T013', 'Jackson', 'Charles', 'charlesj', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 8603471, 'charles.jackson@example.com', '321 Cedar St, City', 'IT', 'Flexible', 'MSc Cybersecurity'),
('T014', 'White', 'Deborah', 'deborahw', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 8759346, 'deborah.white@example.com', '987 Elm St, City', 'IT', 'Flexible', 'MSc Data Science'),
('T015', 'Harris', 'Daniel', 'danielh', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 2984507, 'daniel.harris@example.com', '456 Birch St, City', 'IT', 'Flexible', 'MSc Artificial Intelligence'),
('T016', 'Martin', 'Sarah', 'sarahm', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 1265478, 'sarah.martin@example.com', '789 Maple St, City', 'IT', 'Flexible', 'MSc Cloud Computing'),
('T017', 'Thompson', 'Karen', 'karen.t', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 7483647, 'karen.thompson@example.com', '321 Pine St, City', 'Management', 'Flexible', 'MBA Project Management'),
('T018', 'Garcia', 'Paul', 'paulg', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 2147488, 'paul.garcia@example.com', '654 Oak St, City', 'Management', 'Flexible', 'MBA Operations Management'),
('T019', 'Martinez', 'Nancy', 'nancym', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 2143247, 'nancy.martinez@example.com', '987 Cedar St, City', '', 'Flexible', 'MBA Strategic Management'),
('T020', 'Robinson', 'Jason', 'jasonr', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 2147483647, 'jason.robinson@example.com', '321 Birch St, City', 'Management', 'Flexible', 'MBA Human Resource Management');

--
-- Triggers `tutor`
--
DELIMITER $$
CREATE TRIGGER `before_insert_email_tutor` BEFORE INSERT ON `tutor` FOR EACH ROW BEGIN
    IF NEW.email NOT LIKE '%@%' THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Invalid email format. Email must contain an @ symbol.';
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_insert_pnum_tutor` BEFORE INSERT ON `tutor` FOR EACH ROW BEGIN
    IF NEW.pnum NOT LIKE '-_' THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Invalid pnum format. pnum must match the pattern "-X".';
    END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseID`),
  ADD KEY `tutorID` (`tutorID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackID`),
  ADD KEY `parentID` (`parentID`),
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`parentID`),
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`sessionID`),
  ADD KEY `studentID` (`studentID`),
  ADD KEY `courseID` (`courseID`),
  ADD KEY `tutorID` (`tutorID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`),
  ADD UNIQUE KEY `unique_pnum` (`pNum`);

--
-- Indexes for table `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`tutorID`),
  ADD UNIQUE KEY `unique_pnum` (`pNum`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`tutorID`) REFERENCES `tutor` (`tutorID`);

--
-- Constraints for table `parent`
--
ALTER TABLE `parent`
  ADD CONSTRAINT `parent_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `student` (`studentID`);

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `student` (`studentID`),
  ADD CONSTRAINT `sessions_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseID`),
  ADD CONSTRAINT `sessions_ibfk_3` FOREIGN KEY (`tutorID`) REFERENCES `tutor` (`tutorID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
