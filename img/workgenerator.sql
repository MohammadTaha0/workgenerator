-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2022 at 05:46 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `workgenerator`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `job_id` int(255) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Message` varchar(255) NOT NULL,
  `appResume` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL DEFAULT '0' COMMENT '0 = request, 1 = hired\r\n',
  `date_time` date NOT NULL DEFAULT current_timestamp(),
  `emp_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `job_id`, `User_ID`, `Message`, `appResume`, `Status`, `date_time`, `emp_id`) VALUES
(66, 43, 19, 'image', './upload/101487293-Guideline.pdf', '0', '2022-09-02', 11);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(111) NOT NULL,
  `cat_name` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Frontend Developer'),
(2, 'Backend Developer'),
(4, 'Data Engineer'),
(5, 'Software Developer'),
(6, 'Data Analytical'),
(7, 'Graphic Designer'),
(8, 'Search Engine Optimization (SEO)'),
(9, 'Video Editor'),
(10, 'Editing'),
(11, 'Digital Marketing'),
(12, 'Advertisement'),
(13, 'Programmar'),
(14, 'Youtuber'),
(15, 'Content Writing'),
(16, 'Full Stack Developer');

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `ID` int(11) NOT NULL,
  `EIN` int(11) NOT NULL,
  `emp_img` varchar(111) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Contact` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Company_Name` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Number_of_Employees` int(11) NOT NULL,
  `Type_of_Organization` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `role` int(1) NOT NULL DEFAULT 0 COMMENT 'employer = 0, seeker = 1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`ID`, `EIN`, `emp_img`, `Name`, `Email`, `Contact`, `Username`, `Password`, `Company_Name`, `Address`, `Number_of_Employees`, `Type_of_Organization`, `Status`, `role`) VALUES
(10, 949494, '', 'Employer1', 'employer1@gmail.com', '03432959411', 'emp1', 'emp1emp1', 'Venture Dive', 'Shahr-e-Faisal, Karchi, Pakistan ', 1300, 'Software Organization', 'inactive', 0),
(11, 424242, '', 'Emp2', 'Emp2@gmail.com', '456554213', 'emp2', 'emp2emp2', 'SoftTraders', 'Shahr-e-Faisal, Karchi, Pakistan ', 5, 'Project Organization', 'active', 0),
(12, 45444443, '', '', '', '', '', '', '', '', 0, '', 'inactive', 0),
(15, 2147483647, '', 'Taha', 'Tha@gmail.com', '897677665', 'emp55', 'emp55', 'jkhjkhjh', 'ghjghjg', 0, 'fgdfgdgf', 'inactive', 0),
(46, 66666, '', 'nwnme', 'newemail', '7897897', 'nuer', 'npass', 'ncompany', 'nddress', 0, 'norg', 'inactive', 0),
(47, 799856, '', 'your', 'taha@gmailkl', 'ghghj', 'emp56', '5555', '55555', '555', 55, '555', 'inactive', 0),
(48, 454545, '', 'taha', 'admin@,mnmn', '7865654132', 'tahaaa', 'aaa', 'aaaa', 'aaa', 11, 'aaa', 'inactive', 0),
(49, 424247, '', 'thistaha', 'taha@gmail.com', 'taha', 'emp556', 'ghjghg', 'gfghf', 'ghfgh', 44, 'ngnghb', 'inactive', 0),
(50, 2147483647, 'img/employer/ear-1-removebg-preview.png', 'Mohammad Taha emp', 'emp4@gmail.com', '034329594111', 'tahaahat', 'ahat', 'ahat', 'ahat', 67, 'ahat', 'inactive', 0),
(51, 4545451, 'img/employer/chair2-3.png', 'Seeker', 'emp22@gmail.com', '78656541321', 'taha1', '11111111', '1111111', '111', 11, '11', 'inactive', 0);

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `follow_id` int(11) NOT NULL,
  `sen_role` int(1) NOT NULL COMMENT 'employer = 0, seeker = 1',
  `follow_role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`id`, `user_id`, `follow_id`, `sen_role`, `follow_role`) VALUES
(154, 11, 19, 0, 1),
(155, 10, 11, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `Auto_generated_ID` int(255) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Location` varchar(120) NOT NULL,
  `min_sal` int(255) NOT NULL,
  `max_sal` int(255) NOT NULL,
  `Skills` varchar(255) NOT NULL,
  `Experience` varchar(255) NOT NULL,
  `Job_Role` int(11) NOT NULL COMMENT '0=part time, 1=full time',
  `Description` varchar(255) NOT NULL,
  `Date` datetime NOT NULL,
  `lastdate` date DEFAULT NULL,
  `emp_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`Auto_generated_ID`, `Title`, `Category`, `Location`, `min_sal`, `max_sal`, `Skills`, `Experience`, `Job_Role`, `Description`, `Date`, `lastdate`, `emp_id`) VALUES
(10, 'Job Title', 'Job Category', 'Islambad', 22000, 25000, 'Job Skill', '1 Year', 1, 'Job Description...', '2022-08-25 16:56:17', '2022-08-28', 10),
(43, 'my new job', 'cat', 'Pakistan', 33000, 45000, 'Wordpress,Jquery,JavaScript,CSS', '2 Year', 0, 'description', '2022-08-22 02:43:46', '2022-08-30', 11),
(45, 'job title 2', 'job category', 'Karachi', 12000, 15000, 'HTML,Java Script,Wordpress', '1 year', 0, 'description', '2022-08-22 16:58:40', '2022-08-31', 11);

-- --------------------------------------------------------

--
-- Table structure for table `job_seeker`
--

CREATE TABLE `job_seeker` (
  `User_ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Contact` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `role` int(1) NOT NULL DEFAULT 1 COMMENT 'employer = 0, seeker = 1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_seeker`
--

INSERT INTO `job_seeker` (`User_ID`, `Name`, `Email`, `Contact`, `Username`, `Password`, `role`) VALUES
(8, 'Khalid11223355', 'khalid@gmail.com', '58456978555', 'seeker1', 'seeker1', 1),
(19, 'Mohammad Taha', 'seek1@gmail.com', '03432959411', 'taha', 'tahataha', 1),
(21, 'seeker133', 'hjkhkj@hjkhjkgjk', 'kjgkgghg', 'ghjghjghj', 'ghjghjgjhg', 1),
(31, 'seeker133', 'new', 'nrw@gmail.com', '7812kj', 'kjghdf', 1),
(32, 'seeker133', 'new11', 'ttt', '7812kj1', 'ttt', 1),
(33, 'seeker133', 'husain@gmail.con', 'husian', 'husin', 'husin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `app_id` int(11) NOT NULL,
  `send_id` int(11) NOT NULL,
  `rec_id` int(11) NOT NULL,
  `sen_role` int(1) NOT NULL COMMENT 'employer = 0, seeker = 1',
  `rec_role` int(1) NOT NULL,
  `msg` varchar(111) NOT NULL,
  `seen` varchar(11) NOT NULL DEFAULT 'unseen',
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `app_id`, `send_id`, `rec_id`, `sen_role`, `rec_role`, `msg`, `seen`, `date`) VALUES
(54, 0, 11, 15, 0, 0, 'Emp2 Start Following You', 'unseen', '2022-09-01 15:06:09'),
(55, 0, 11, 8, 0, 1, 'Emp2 Start Following You', 'unseen', '2022-09-01 15:06:45'),
(60, 0, 11, 19, 0, 1, '<b>Emp2</b> Start Following You', 'seen', '2022-09-02 02:15:55'),
(61, 55, 11, 8, 0, 1, 'Congrats, You Hired By <b>SoftTraders Company </b> as a <b>job title 2</b>', 'unseen', '2022-09-02 02:18:02'),
(62, 58, 11, 19, 0, 1, 'Congrats, You Hired By <b>SoftTraders Company </b> as a <b>my new job</b>', 'seen', '2022-09-02 02:18:29'),
(63, 66, 19, 11, 1, 0, '<b>Mohammad Taha</b> Apply to your job <b>my new job</b>', 'seen', '2022-09-02 03:26:41'),
(64, 0, 10, 11, 0, 0, '<b>Employer1</b> Start Following You', 'seen', '2022-09-03 05:14:51');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `User_ID` int(11) NOT NULL,
  `Skills` varchar(255) NOT NULL,
  `Experience` varchar(255) NOT NULL,
  `Resume` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `seeker_profile`
--

CREATE TABLE `seeker_profile` (
  `seeker_pro_id` int(111) NOT NULL,
  `user_id` int(11) NOT NULL,
  `img` varchar(111) NOT NULL,
  `desig` varchar(111) NOT NULL,
  `expertise` varchar(222) NOT NULL,
  `address` varchar(111) NOT NULL,
  `prev comp` varchar(222) NOT NULL,
  `curr comp` varchar(222) NOT NULL,
  `mobile` varchar(111) NOT NULL,
  `category` int(111) NOT NULL,
  `skills` varchar(111) NOT NULL,
  `exper` varchar(111) NOT NULL,
  `git` varchar(222) NOT NULL,
  `linked` varchar(222) NOT NULL,
  `twitter` varchar(222) NOT NULL,
  `facebook` varchar(222) NOT NULL,
  `fiverr` varchar(222) NOT NULL,
  `upwork` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seeker_profile`
--

INSERT INTO `seeker_profile` (`seeker_pro_id`, `user_id`, `img`, `desig`, `expertise`, `address`, `prev comp`, `curr comp`, `mobile`, `category`, `skills`, `exper`, `git`, `linked`, `twitter`, `facebook`, `fiverr`, `upwork`) VALUES
(8, 8, 'img/Seeker Profile/user.png', 'Backend Developer', 'PHP', 'E-51,Block-03,Gulshan-e-Iqbal', 'Twitter', 'Google', '03432959411', 2, 'Laravel,JSON,Angular,XML', '2 Year', 'https://github.com/', 'https://www.linkedin.com', 'https://twitter.com', 'https://www.facebook.com', 'https://www.fiverr.com', 'https://www.upwork.com'),
(9, 19, 'img/Seeker Profile/user.png', 'Backend Developer', 'PHP', 'E-51,Block-03,Gulshan-e-Iqbal', 'Youtube', 'Google', '3432959411', 7, 'CSS,Java Script,Jquery,Wordpress', '1 Year', 'https://github.com', 'https://www.linkedin.com', 'https://twitter.com', 'https://www.facebook.com', 'https://www.fiverr.com', 'https://www.upwork.com');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `sk_id` int(111) NOT NULL,
  `skills` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`sk_id`, `skills`) VALUES
(1, 'HTML'),
(2, 'CSS'),
(3, 'Java Script'),
(4, 'Jquery'),
(5, 'Wordpress'),
(6, 'PHP'),
(7, 'ASP.Net'),
(8, 'Bootsrap 5'),
(9, 'React'),
(10, 'Angular'),
(11, 'Laravel'),
(12, 'Django'),
(13, 'Flutter'),
(14, 'Dart Programming'),
(15, 'Communication'),
(16, 'SQL DATABASE'),
(17, 'MYSQLDATABASE'),
(18, 'MS OFFICE'),
(19, 'MS WORD'),
(20, 'MS EXCEL'),
(21, 'MS POWER POINT'),
(22, 'MS OUTLOOK'),
(23, 'XML'),
(24, 'JSON');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`Auto_generated_ID`);

--
-- Indexes for table `job_seeker`
--
ALTER TABLE `job_seeker`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD UNIQUE KEY `User_ID` (`User_ID`);

--
-- Indexes for table `seeker_profile`
--
ALTER TABLE `seeker_profile`
  ADD PRIMARY KEY (`seeker_pro_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`sk_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `Auto_generated_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `job_seeker`
--
ALTER TABLE `job_seeker`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `seeker_profile`
--
ALTER TABLE `seeker_profile`
  MODIFY `seeker_pro_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `sk_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `job_seeker` (`User_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
