-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Host: fred.xenogamers.com
-- Generation Time: Dec 13, 2015 at 11:46 PM
-- Server version: 10.0.22-MariaDB-log
-- PHP Version: 7.0.0-pl0-gentoo

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `authorship`
--

CREATE TABLE IF NOT EXISTS `authorship` (
  `facultyId` int(11) NOT NULL,
  `paperId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authorship`
--

INSERT INTO `authorship` (`facultyId`, `paperId`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 5),
(2, 3),
(2, 4),
(3, 6),
(3, 7);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `id` int(11) NOT NULL,
  `fName` varchar(45) DEFAULT NULL,
  `lName` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `fName`, `lName`, `password`, `email`) VALUES
(1, 'Steve', 'Zilora', '5f47859188a602594556580532e814a3', 'sjz@it.rit.edu'),
(2, 'Dan', 'Bogaard', 'f4f6172eb26581952a70d7199bfd2ddb', 'dsb@it.rit.edu'),
(3, 'Bob', 'Jones', 'test', 'test@test.com');

-- --------------------------------------------------------

--
-- Table structure for table `papers`
--

CREATE TABLE IF NOT EXISTS `papers` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `abstract` text,
  `citation` varchar(255) DEFAULT NULL,
  `page_view` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `papers`
--

INSERT INTO `papers` (`id`, `title`, `abstract`, `citation`, `page_view`) VALUES
(1, 'TED', '', '', 0),
(2, 'Think Inside the Box! Optimizing Web Service Performance, Today', 'While Web Services Technology holds great promise for universal integration, several obstacles stand in the way of its acceptance. Work is being done to address these obstacles to allow adoption of web services technology in the future, but where do we stand today? In particular, what can be done today to combat the often cited problem of slow response times for web services? While XML hardware acceleration and SOAP compression schemes can improve the overall response, the authors have found that appropriate selection of client software, server software, and data structures can have a substantial impact. It is possible to have a profound impact on performance using tools that are routinely and dependably available to us now.', 'Zilora, Stephen, and Sai Sanjay Ketha. "Think Inside the Box! Optimizing Web Services Performance Today." IEEE Communications Magazine, 46.3 (2008): 112-117.', 0),
(3, 'Work in Progress - Bringing Sanity to the Course Assignment Process', 'The floor of the NY Stock Exchange, with its noise and chaos, is an apt depiction of the typical course selection meeting that many universities experience. Professors attempt to shout over their colleagues or broker deals with one another in small cabals in an attempt to garner the sections they hope to teach. When first choices fall by the wayside, quick recalculations of schedules are necessary in order to determine the next best scenario and sections to request. As inexperienced junior faculty members, the authors found this experience daunting. In response, they wrote a simple web application that allowed faculty to make their selections, and broker deals, in a calm manner over an extended time period. The application was originally written for one sub-group of about 20 faculty within the department, but its popularity quickly spread to the rest of the department and then on to other departments within the college. The course assignment and reservation system (CARS) has grown steadily over the past several years in number of users, functionality, and scope. Today, faculty can plan their teaching load, work with colleagues to find mutually beneficial schedules, and easily retrieve historical information in preparation for annual reviews, promotion, or tenure appointments. Department administrators can manage course information, prepare information for certification agencies, assign faculty to courses, and monitor faculty loads. Staff and students also benefit from interfaces permitting access to appropriate information to assist them in their planning activities. Utilizing Web 2.0 technologies, the application is enjoyable to use and gives all of the disparate users a satisfying experience.', 'Zilora, S.J, and D.S Bogaard. "Work in Progress - Bringing Sanity to the Course Assignment Process." Frontiers in Education Conference, 2008. FIE 2008. 38th Annual, (2008)', 0),
(4, 'How to cleanse the Population', 'This is an important task that must be completed. Otherwise... stuff. Like dead lamas', 'i did everything - elli ', 0),
(5, 'Informatics minor for non-computer students', 'The Rochester Institute of Technology''s School of Informatics has developed a minor in Applied Informatics that allows non-computing students from throughout the university to learn problem solving, data retrieval, and information processing and presentation skills so that they can be productive knowledge workers in the 21st century. The minor is strongly problem-oriented with students being taught how to apply deductive, inductive, and abductive reasoning, as well as fundamental information technology skills, to problems in their specific domains. It is the coursework''s relevance and applicability to the students'' majors that eases the acquisition of these skills.', 'Zilora, S.J. "Informatics minor for non-computer students" ACM SIGITE 2011 Conference (2011)', 0),
(6, 'New Paper', 'The newest and highest quality in paper from Johnson and Hedgeson.', '', 0),
(7, 'Add Paper', 'test123 bbb', 'test123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `paper_keywords`
--

CREATE TABLE IF NOT EXISTS `paper_keywords` (
  `id` int(11) NOT NULL,
  `keyword` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paper_keywords`
--

INSERT INTO `paper_keywords` (`id`, `keyword`) VALUES
(1, 'cognitive science'),
(1, 'data mining'),
(1, 'database'),
(1, 'human memory'),
(1, 'test'),
(2, 'C#'),
(2, 'IIS'),
(2, 'Java'),
(2, 'performance'),
(2, 'PHP'),
(2, 'SOAP'),
(2, 'Tomcat'),
(2, 'web services'),
(2, 'XML'),
(3, 'course assignment'),
(3, 'department management'),
(3, 'faculty'),
(3, 'tools'),
(3, 'Web 2.0'),
(4, '1993'),
(4, 'bitch'),
(4, 'bob'),
(4, 'elliiiiii'),
(4, 'fdsa'),
(4, 'fdsfadfsaadsf'),
(4, 'sagot'),
(4, 'test'),
(4, 'uuuhm'),
(5, 'abduction'),
(5, 'curriculum'),
(5, 'education'),
(5, 'FITness'),
(5, 'informatics'),
(5, 'IT fluency'),
(6, 'highest'),
(6, 'paper'),
(6, 'quality');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authorship`
--
ALTER TABLE `authorship`
  ADD PRIMARY KEY (`facultyId`,`paperId`),
  ADD KEY `fk_a_f` (`facultyId`),
  ADD KEY `fk_a_p` (`paperId`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `papers`
--
ALTER TABLE `papers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paper_keywords`
--
ALTER TABLE `paper_keywords`
  ADD PRIMARY KEY (`id`,`keyword`),
  ADD KEY `pk_p` (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authorship`
--
ALTER TABLE `authorship`
  ADD CONSTRAINT `fk_a_f` FOREIGN KEY (`facultyId`) REFERENCES `faculty` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_a_p` FOREIGN KEY (`paperId`) REFERENCES `papers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `paper_keywords`
--
ALTER TABLE `paper_keywords`
  ADD CONSTRAINT `pk_p` FOREIGN KEY (`id`) REFERENCES `papers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
