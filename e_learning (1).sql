-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2014 at 12:34 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e_learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `academicqualification`
--

CREATE TABLE IF NOT EXISTS `academicqualification` (
  `studentid` int(12) NOT NULL,
  `examtitleid` int(12) NOT NULL,
  `institutename` varchar(60) NOT NULL,
  `passingyear` int(4) NOT NULL,
  `result` float DEFAULT NULL,
  PRIMARY KEY (`studentid`,`examtitleid`),
  KEY `examtitleid` (`examtitleid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academicqualification`
--

INSERT INTO `academicqualification` (`studentid`, `examtitleid`, `institutename`, `passingyear`, `result`) VALUES
(24, 2, 'Khaiyachara High School', 2007, 4.25),
(24, 3, 'DIU', 2014, 4),
(31, 1, 'Institute', 2007, 4.88);

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `questionid` int(12) NOT NULL,
  `studentid` int(12) NOT NULL,
  `answer` varchar(40) NOT NULL,
  `marks` float DEFAULT NULL,
  PRIMARY KEY (`questionid`,`studentid`),
  KEY `studentid` (`studentid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`questionid`, `studentid`, `answer`, `marks`) VALUES
(17, 23, '', 2),
(17, 24, '1383900568298279.txt', 1),
(18, 24, '1384004492838226.txt', NULL),
(22, 24, '1383900806689758.txt', NULL),
(23, 28, '1384091438975341.txt', 2),
(24, 28, '1391520575360260.txt', 2),
(24, 31, '139015225895612.txt', 2),
(25, 24, '1383900972524536.txt', 2),
(26, 29, '1385737075387116.txt', 2),
(26, 30, '1385737478958831.txt', 3.6);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `description` varchar(40) NOT NULL,
  `teacherid` int(12) DEFAULT NULL,
  `studentid` int(12) DEFAULT NULL,
  `pdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `description`, `teacherid`, `studentid`, `pdate`) VALUES
(18, '1384098101110321.txt', 17, 0, '2013-11-10'),
(19, '1384102588938018.txt', 17, 0, '2013-11-10'),
(16, '1384097161277588.txt', 0, 24, '2013-11-10'),
(20, '1385736661333710.txt', 22, 0, '2013-11-29'),
(22, '1390151735295197.txt', 0, 31, '2014-01-19'),
(23, '1390671166771759.txt', 18, 0, '2014-01-25'),
(24, '1391527548694641.txt', 18, 0, '2014-02-04');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`) VALUES
(1, 'PHP & MySQL'),
(2, 'Introduction to Software Engineering'),
(3, 'OOP (Java)'),
(4, 'Java'),
(5, 'C Language');

-- --------------------------------------------------------

--
-- Table structure for table `courseteacher`
--

CREATE TABLE IF NOT EXISTS `courseteacher` (
  `teacherid` int(12) NOT NULL,
  `courseid` int(12) NOT NULL,
  PRIMARY KEY (`teacherid`,`courseid`),
  KEY `courseid` (`courseid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courseteacher`
--

INSERT INTO `courseteacher` (`teacherid`, `courseid`) VALUES
(17, 1),
(18, 2),
(22, 2),
(18, 3),
(20, 4),
(22, 5);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(1, 'Software Engineering'),
(2, 'CSE'),
(3, 'ETE'),
(5, 'English'),
(7, 'BBA');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE IF NOT EXISTS `designation` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `name`) VALUES
(1, 'Junior lecturer'),
(2, 'Lecturer'),
(3, 'Professor');

-- --------------------------------------------------------

--
-- Table structure for table `examtitle`
--

CREATE TABLE IF NOT EXISTS `examtitle` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `examtitle`
--

INSERT INTO `examtitle` (`id`, `name`) VALUES
(1, 'SSC/Dakhil'),
(2, 'HSC/Alim'),
(3, 'Honors'),
(4, 'Masters'),
(5, 'Ph.D');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `file` varchar(40) NOT NULL,
  `teacherid` int(12) NOT NULL,
  `courseid` int(12) NOT NULL,
  `fdate` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `teacherid` (`teacherid`),
  KEY `courseid` (`courseid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `name`, `file`, `teacherid`, `courseid`, `fdate`) VALUES
(17, 'Lecture One', '307138116914099637124893.pdf', 17, 1, '2013-10-07'),
(18, 'Lecture Two', '6001381169602enewspaper.pptx', 17, 1, '2013-10-07'),
(19, 'Lecture One', '1081381502632s-2013-2014.doc', 18, 2, '2013-10-11'),
(20, 'Lecture of AI', '6301381503559am members.pptx', 18, 2, '2013-10-11'),
(21, 'Lecture of Cyber Law', '7881381503620oop-01.docx', 18, 2, '2013-10-11'),
(22, 'Cyber Law 1.', '3511383942212user_manual.pdf', 17, 2, '2013-11-08'),
(23, 'PPT', '7021383982390hild-abuse.pptx', 17, 2, '2013-11-09'),
(24, 'New File', '7961390278322tionintern.docx', 18, 2, '2014-01-21'),
(25, 'This is pdf file', '62413909229336f7c6d01.pdf', 18, 2, '2014-01-28'),
(26, 'A new pdf file', '213915277855e1a1d01.pdf', 18, 3, '2014-02-04');

-- --------------------------------------------------------

--
-- Table structure for table `homepage`
--

CREATE TABLE IF NOT EXISTS `homepage` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) DEFAULT NULL,
  `description` varchar(40) DEFAULT NULL,
  `picture` varchar(40) NOT NULL,
  `location` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `homepage`
--

INSERT INTO `homepage` (`id`, `title`, `description`, `picture`, `location`) VALUES
(1, 'Our School Details', '1381220876748993.txt', '4871379489020da4-d4t4kxm.jpg', 'h'),
(2, 'Title', '1392274649554871.txt', '6941391451751tulips.jpg', 'h'),
(3, 'Info about admin', '1391505432452789.txt', 'lkjkjhhghjkl', 'a'),
(4, 'Information admin', '1391505410837280.txt', '4651391456274rysanthemum.jpg', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `management`
--

CREATE TABLE IF NOT EXISTS `management` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `email` varchar(60) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `management`
--

INSERT INTO `management` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `description` varchar(40) DEFAULT NULL,
  `ndate` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `name`, `description`, `ndate`) VALUES
(8, 'Our School Details', '1391540023512512.txt', '2013-10-04'),
(19, 'Daffodil Virtual Learning', '1391540138355377.txt', '2014-02-04'),
(13, 'This is notice file', '6191381162960for_website.doc', '2013-10-07'),
(14, 'This is notice file', '8631381167222for_website.doc', '2013-10-07'),
(15, 'These are notice files', '196138116785199637124893.pdf', '2013-10-07'),
(17, 'Routine', '9471383968263original.pdf', '2013-11-09');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `question` varchar(40) NOT NULL,
  `mark` float NOT NULL,
  `courseid` int(12) NOT NULL,
  `teacherid` int(12) NOT NULL,
  `fromdate` datetime NOT NULL,
  `todate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `courseid` (`courseid`),
  KEY `teacherid` (`teacherid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `question`, `mark`, `courseid`, `teacherid`, `fromdate`, `todate`) VALUES
(17, '1381168094987213.txt', 4, 1, 17, '2013-09-19 09:03:20', '2013-09-19 11:03:20'),
(18, '1379492180770630.txt', 4, 1, 17, '2013-09-18 02:07:55', '2013-09-18 04:07:55'),
(22, '1381168123654846.txt', 2, 1, 17, '2013-09-19 21:38:11', '2013-09-19 23:38:11'),
(23, '1391505904351013.txt', 4, 2, 18, '2013-10-09 00:00:00', '2013-10-09 02:00:37'),
(24, '1392275379424500.txt', 2, 2, 18, '2014-02-13 01:09:47', '2014-02-13 19:20:47'),
(25, '137960498430579.txt', 2, 1, 17, '2013-09-19 21:34:16', '2013-09-19 23:34:16'),
(26, '1385737457298218.txt', 4, 2, 22, '2013-11-29 20:52:38', '2013-11-29 21:06:38'),
(27, '1391517347584167.txt', 4, 3, 18, '2014-02-04 18:23:32', '2014-02-04 18:40:32'),
(28, '139153003363508.txt', 6, 2, 18, '2014-02-04 22:06:16', '2014-02-04 23:06:16');

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE IF NOT EXISTS `slideshow` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `images` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`id`, `images`) VALUES
(1, '4871378320419sc2.jpg'),
(2, '4131378320396sc1.jpg'),
(3, '4801381211844khfkjdhfjfh.jpg'),
(4, '9211378320352s1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `fathername` varchar(40) NOT NULL,
  `mothername` varchar(40) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `country` varchar(20) NOT NULL,
  `address` varchar(40) NOT NULL,
  `joindate` date DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `courseid` int(12) NOT NULL,
  `teacherid` int(12) NOT NULL,
  `picture` varchar(40) NOT NULL,
  `verification` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `courseid` (`courseid`),
  KEY `teacherid` (`teacherid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `email`, `password`, `fathername`, `mothername`, `gender`, `country`, `address`, `joindate`, `dob`, `courseid`, `teacherid`, `picture`, `verification`) VALUES
(23, 'Fakhrul Hasan', 'hasan@gmail.com', '12345678', 'MD. Alamgir Hossain', 'MT. Morjina Begum', 'M', 'b', '1379489653821869.txt', '2013-09-18', '1991-12-12', 1, 17, '391379489653ske-d4t4chv.jpg', '1'),
(24, 'Farhad Evan', 'evan@gmail.com', '1234567890', 'MD. Father', 'MT. Mother', 'M', 'b', '1384004523904083.txt', '2013-09-19', '1992-01-01', 1, 17, '', '1'),
(25, 'Mahdi', 'mahdi@gmail.com', '12345678', 'Father', 'Mother', 'M', 'b', '1381234424941772.txt', '2013-10-08', '1991-12-12', 2, 18, '3431381234424ske-d4t4chv.jpg', '1'),
(26, 'Hasan Mahmud', 'mahmud@gmail.com', '12345678', 'Father Name', 'Mother Name', 'M', 'b', '1383928665680206.txt', '2013-11-08', '1984-12-12', 1, 17, '', '1'),
(27, 'Evan Islam', 'eislam@gmail.com', '12345678', 'Father Name', 'Mother Name', 'M', 'b', '1383928902300812.txt', '2013-11-08', '1984-12-12', 2, 18, '', '1'),
(28, 'Rifat', 'rifat@gmail.com', '1234567890', 'Father Name', 'Mother Name', 'M', 'b', '1391537320686371.txt', '2013-11-10', '1984-12-12', 2, 18, '', '1'),
(29, 'Student', 'student@gmail.com', '12345678', 'Father', 'Mother', 'M', 'b', '1385737023933227.txt', '2013-11-29', '1992-12-12', 2, 22, '', '1'),
(30, 'Dhupan', 'dhupan@gmail.com', '12345678', 'MR. F', 'MT. M', 'M', 'b', '1385737420294068.txt', '2013-11-29', '1992-12-12', 2, 22, '', 'zvnLXcqhF@7x87G'),
(31, 'Md. Riaz', 'riaz@gmail.com', '12345678', 'Belayat Hossain', 'Kahinoor Begum', 'M', 'b', '1391972837118836.txt', '2014-01-19', '1991-12-12', 2, 18, '9961390150798templatepng.png', '1'),
(35, 'A New Student', 'rifat1@gmail.com', '12345678', 'dkfjdkfjdkjf', 'dkfjkdjfkdjf', 'M', 'b', '1391453302628906.txt', '2014-02-03', '2014-02-16', 5, 22, '', 'UB47I7JucGvsur1'),
(36, 'A New Student', 'rifat2@gmail.com', '12345678', 'dkfjdkfjdkjf', 'dkfjkdjfkdjf', 'M', 'b', '1391453519358551.txt', '2014-02-03', '2000-02-08', 5, 22, '', 'h3k!yzjz0I5cMl9');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `country` varchar(20) NOT NULL,
  `address` varchar(40) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `designationid` int(12) NOT NULL,
  `departmentid` int(12) NOT NULL,
  `picture` varchar(40) NOT NULL,
  `verification` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `designationid` (`designationid`),
  KEY `departmentid` (`departmentid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `email`, `password`, `country`, `address`, `gender`, `designationid`, `departmentid`, `picture`, `verification`) VALUES
(17, 'MD. Ziaur Rahman', 'zia@gmail.com', '12345678', 'b', '1384103809980163.txt', '0', 1, 1, '1351379489200238569607_n.jpg', '1'),
(18, 'Alinur Rahman', 'ali@gmail.com', '12345678', 'b', '1381506206824585.txt', 'M', 1, 1, '9213795769165.jpg', '1'),
(19, 'Mominul Hoque', 'momin@gmail.com', '12345678', 'b', '1381233857990692.txt', 'M', 1, 1, '5031381233857s2.jpg', '1'),
(20, 'MD. Yusuf', 'islam@gmail.com', '1234567890', 'b', '1383937923266999.txt', 'M', 3, 3, '', '1'),
(21, 'Sohel Rana', 'rana@gmail.com', '12345678', 'b', '139161419533082.txt', 'M', 1, 5, '', '1'),
(22, 'Teacher', 'teacher@gmail.com', '12345678', 'b', '1385736468425903.txt', 'M', 2, 2, '', '1'),
(23, 'MD. Teacher', 'teacher1@gmail.com', '12345678', 'b', '1391533624465363.txt', 'M', 1, 1, '', 'ajRCoefND4SBz@h');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  `video` varchar(40) NOT NULL,
  `teacherid` int(12) NOT NULL,
  `courseid` int(12) NOT NULL,
  `vdate` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `teacherid` (`teacherid`),
  KEY `courseid` (`courseid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `title`, `video`, `teacherid`, `courseid`, `vdate`) VALUES
(13, 'OOP', '561390676677or on vimeo.mp4', 18, 3, '2014-01-25'),
(11, 'What is software', '16113906750641.mp4', 18, 2, '2014-01-25'),
(12, 'Right', '9821390675087954485513_n.mp4', 18, 2, '2014-01-25');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `academicqualification`
--
ALTER TABLE `academicqualification`
  ADD CONSTRAINT `academicqualification_ibfk_1` FOREIGN KEY (`studentid`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `academicqualification_ibfk_2` FOREIGN KEY (`examtitleid`) REFERENCES `examtitle` (`id`);

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`questionid`) REFERENCES `question` (`id`),
  ADD CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`studentid`) REFERENCES `student` (`id`);

--
-- Constraints for table `courseteacher`
--
ALTER TABLE `courseteacher`
  ADD CONSTRAINT `courseteacher_ibfk_1` FOREIGN KEY (`teacherid`) REFERENCES `teacher` (`id`),
  ADD CONSTRAINT `courseteacher_ibfk_2` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `question_ibfk_2` FOREIGN KEY (`teacherid`) REFERENCES `teacher` (`id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`teacherid`) REFERENCES `teacher` (`id`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`designationid`) REFERENCES `designation` (`id`),
  ADD CONSTRAINT `teacher_ibfk_2` FOREIGN KEY (`departmentid`) REFERENCES `department` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
