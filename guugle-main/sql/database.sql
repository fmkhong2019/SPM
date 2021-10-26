-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 30, 2020 at 07:07 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `foodgramgram`
--
CREATE DATABASE IF NOT EXISTS `phriscoskitt` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `phriscoskitt`;

-- --------------------------------------------------------

--
-- Table structure for table `interviewers`
--

DROP TABLE IF EXISTS `interviewers`;
CREATE TABLE IF NOT EXISTS `interviewers` (
  `id` varchar(50) NOT NULL,
  `fname` varchar(2083) NOT NULL,
  `lname` varchar(2083) NOT NULL,
  `job` varchar(2083) NOT NULL,
  `company` varchar(2083) NOT NULL,
  `years` int(11) NOT NULL,
  `industry` varchar(2083) NOT NULL,
  `about` varchar(2083) NOT NULL,
  `email` varchar(2083) NOT NULL,
  `experience` varchar(2083) NOT NULL,
  `education` varchar(2083) NOT NULL,
  `img` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `interviewers` (`id`, `fname`, `lname`, `job`, `company`, `years`, `industry`, `about`,
`email`, `experience`, `education`, `img`) VALUES
(1, 'Phris', 'Coskitt','Assistant Professor of Information Systems', 'SMU', 7, 'Information Technology', 
'I am a faculty member in the School of Information Systems at Singapore Management University, where I am part of the Research Lab for Intelligent Software Engineering (RISE).', 
'cposkitt@smu.edu.sg', 
"{""experience"" : [""Assistant Professor of Information Systems (Education), School of Information Systems, SMU, Jan 2020 - Present"",
""Lecturer & Research Fellow, Singapore University of Technology and Design, Singapore, Jan 2018 - Jan 2020"",
""Research Fellow, Singapore University of Technology and Design, Singapore, Mar 2016 - Jan 2018"",
""Postdoctoral Research Scientist, ETH Zurich, Switzerland, Jan 2013 - Jan 2016""]}",
"{""education"" : [""PhD, University of York, 2014"",
""Bachelors of Science, University of York, 2009""]}",
'profile_img/chris.jpg');

INSERT INTO `interviewers` (`id`, `fname`, `lname`, `job`, `company`, `years`, `industry`, `about`,
`email`, `experience`, `education`, `img`) VALUES (2, 'Xin Wei', 'Wong','Cyber and Strategic Risk Intern', 'Deloitte', 0.5, 'Cybersecurity', 
'I am a penultimate student at Singapore Management University, pursing a Bachelor of Science (Information System) degree majoring in software development. My experience and interest lies in the area of information technology, full stack web application development, database management and project management.', 
'xinwei.wong.2018@smu.edu.sg', 
"{""experience"" : [""Teaching Assistant, School of Information Systems, SMU, Aug 2020 - Present"",
""Cyber and Strategic Risk Intern, Deloitte, Singapore, Jul 2020 - Present"",
""Product Management Intern, Shopee, Singapore, Jan 2020 - Jul 2020""]}",
"{""education"" : [""Bachelors of Science (Information Systems), Singapore Management University,Ongoing""]}",
'profile_img/XW.jpeg');

INSERT INTO interviewers (id, fname, lname, job, company, years, industry, about,
email, experience, education, img) VALUES 
(3, 'Hong Seng', 'Ong','Senior Instructor of Information Systems', 'SMU', 13, 'Information Technology', 
'I am a Senior Instructor of Information Systems. I have been in the field of Information Technology for 20 years.', 
'hsong@smu.edu.sg', 
"{""experience"" : [""Senior Instructor, School of Information Systems, SMU, Aug 2007 - Present"",
""IT Consultant, Thoughts Interactive Pte Ltd, Singapore, Jan 2003 - Jul 2013"",
""Senior Software Engineer, Techbubble Alliance, Singapore, Aug 2000 - Dec 2002""]}",
"{""education"" : [""Bachelors of Science (Computer Science), National University of Singapore, 1999""]}",
'profile_img/hsong.jpg');

INSERT INTO interviewers (id, fname, lname, job, company, years, industry, about,
email, experience, education, img) VALUES 
(4, 'Vera', 'Chua','Senior Manager (Operations)', 'Keppel', 6, 'Operations Management', 
'I am a level 2 manager at the operations department of Keppel Corp, where I am currently in the Future Initiatives for Business Ops program (FIBO)', 
'vchua@keppel.sg', 
"{""experience"" : [""Senior Operations Manager, Keppel Corporation, Singapore, Aug 2014 - Present"",
""Business Development Manager, AIA, Singapore, Jan 2010 - Jul 2014"",
""Business Strategy Intern, OCBC, Singapore, Jan 2009 - May 2010""]}",
"{""education"" : [""Bachelors of Arts (Business Administration), National University of Singapore, 2010""]}",
'profile_img/vera.jpg');

INSERT INTO interviewers (id, fname, lname, job, company, years, industry, about,
email, experience, education, img) VALUES 
(5, 'Danielle', 'Mann','Marketing Executive', 'TrueSight', 3.5, 'Marketing', 
'I head the marketing department at TrueSight, and I help my clients with firm branding.', 
'Dmann@Truesight.com', 
"{""experience"" : [""Marketing Executive, Truesight Consulting, Zurich, Mar 2017 - Present"",
""Senior Marketing Manager, Prudential, Singapore, Jan 2014 - Feb 2017"",
""Marketing Intern, DBS, Singapore, Jan 2013 - Jul 2013""]}",
"{""education"" : [""Bachelors of Arts (Psychology), National University of Singapore, 2012""]}",
'profile_img/danielle.jpg');

INSERT INTO interviewers (id, fname, lname, job, company, years, industry, about,
email, experience, education, img) VALUES 
(6, 'Sohan', 'Bahvyat','Audit Accountant', 'Ernst and Young', 5, 'Accounting', 
'Hello! I am a senior acountant at Ernst and Young. I am a middle manager for our tax audit department in Singapore.', 
'SohanB@ey.com.sg', 
"{""experience"" : [""Audit Accountant, Ernst and Young, Singapore, Aug 2015 - Present"",
""Junior Accountant, Ernst and Young, Singapore, Jan 2013 - Aug 2015"",
""Intern, Ernst and Young, Singapore, Jan 2012 - Jul 2012""]}",
"{""education"" : [""Bachelors of Arts (Accountancy), Nanyang Technological University, 2012""]}",
'profile_img/sohan.jpeg');

INSERT INTO interviewers (id, fname, lname, job, company, years, industry, about,
email, experience, education, img) VALUES 
(7, 'Nurul', 'Tanya','Communications Executive', 'Mckinsey and Co', 2, 'Communications', 
'Hi! I am Tanya, a communications specialist at Mckinsey. I help organisations optimise their image and relations.', 
'NTanya@Mckinsey.com', 
"{""experience"" : [""Communications Executive, Mckinsey and Co, New York, Aug 2018 - Present"",
""Management Consultant, Bain and Co., Massachusetts, Jun 2013 - Aug 2018""]}",
"{""education"" : [""Bachelors of Arts (Business Management), Harvard Business School, 2013""]}",
'profile_img/tanya.jpeg');

INSERT INTO interviewers (id, fname, lname, job, company, years, industry, about,
email, experience, education, img) VALUES 
(8, 'George', 'Servio','Vice Chairman', 'Royal Dutch Shell', 3, 'Strategic Management', 
'I have been in the RDS board of directors for 8 years, and aim to bring our energy industry into the future.', 
'georgeservio@shell.com', 
"{""experience"" : [""Vice Chairman, Royal Dutch Shell, London, Sep 2017 - Present"",
""Strategy Director, Royal Dutch Shell, London, Aug 2013 - Sep 2018"",
""Regional Manager, Royal Dutch Shell, Hamburg, Jan 2009 - Aug 2013""]}",
"{""education"" : [""Masters in Business Administration, Oxford Said Business School, 2009"",
""Bachelors of Arts (Business Management), TU Munich, 2007""]}",
'profile_img/george.jpeg');

INSERT INTO interviewers (id, fname, lname, job, company, years, industry, about,
email, experience, education, img) VALUES 
(9, 'Phris', 'of House Coskitt','Emperor', 'The Entire World', 50, 'Law', 
'Bow, you peasants.', 
'kingphris@anywhere.com', 
"{""experience"" : [""Emperor, The World, Earth, Jan 1970 - Present""]}",
"{""education"" : [""Nil""]}",
'profile_img/emperorchris.jpg');

INSERT INTO interviewers (id, fname, lname, job, company, years, industry, about,
email, experience, education, img) VALUES 
(10, 'Barack', 'Obama','President', 'United States of America', 12, 'Politics', 
'Twenty-second Amendment? Donald Trump? Never of them.', 
'obama@whitehouse.gov', 
"{""experience"" : [""President, United States, Washington DC, Jan 2009 - Present"",
""Congressman, United States, Illinos, Aug 2004 - Jul 2008"",
""Lawyer, Freelance, Illinos, Jan 1997 - Aug 2004""]}",
"{""education"" : [""Masters in Law, Harvard University, 1997"",
""Bachelors of Laws, University of Illinos, 1995""]}",
'profile_img/obama.jpg');

-- --------------------------------------------------------

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` varchar(50) NOT NULL,
  `dname` varchar(2083),
  `fname` varchar(2083),
  `lname` varchar(2083),
  `email` varchar(2083),
  `photoURL` varchar(2083),
  `job` varchar(2083),
  `company` varchar(2083),
  `industry` varchar(2083),
  `specialization` varchar(2083),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

DROP TABLE IF EXISTS `interviews`;
CREATE TABLE IF NOT EXISTS `interviews` (
  `user_id` varchar(50) NOT NULL,
  `interviewer_id` int(11) NOT NULL,
  `timeslots` varchar(50) NOT NULL,
  `interview_type` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`, `interviewer_id`, `timeslots`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

DROP TABLE IF EXISTS `interviewSlots`;
CREATE TABLE IF NOT EXISTS `interviewSlots` (
  `interviewer_id` int(11) NOT NULL,
  `timeslots` varchar(50) NOT NULL,
  PRIMARY KEY (`interviewer_id`, `timeslots`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `interviewSlots`
--

INSERT INTO interviewSlots (interviewer_id, timeslots) VALUES 
(1, "01/12/20, 4:00pm");
INSERT INTO interviewSlots (interviewer_id, timeslots) VALUES 
(1, "11/12/20, 9:00am");
INSERT INTO interviewSlots (interviewer_id, timeslots) VALUES 
(1, "20/12/20, 12:00pm");

INSERT INTO interviewSlots (interviewer_id, timeslots) VALUES 
(2, "02/12/20, 1:00pm");
INSERT INTO interviewSlots (interviewer_id, timeslots) VALUES 
(2, "12/12/20, 11:00am");
INSERT INTO interviewSlots (interviewer_id, timeslots) VALUES 
(2, "21/12/20, 12:00pm");
INSERT INTO interviewSlots (interviewer_id, timeslots) VALUES 
(2, "28/12/20, 4:00pm");

INSERT INTO interviewSlots (interviewer_id, timeslots) VALUES 
(3, "03/12/20, 12:00pm");
INSERT INTO interviewSlots (interviewer_id, timeslots) VALUES 
(3, "13/12/20, 12:00pm");
INSERT INTO interviewSlots (interviewer_id, timeslots) VALUES 
(3, "22/12/20, 12:00pm");

INSERT INTO interviewSlots (interviewer_id, timeslots) VALUES 
(4, "04/12/20, 10:00am");
INSERT INTO interviewSlots (interviewer_id, timeslots) VALUES 
(4, "14/12/20, 9:00am");
INSERT INTO interviewSlots (interviewer_id, timeslots) VALUES 
(4, "23/12/20, 11:00am");
INSERT INTO interviewSlots (interviewer_id, timeslots) VALUES 
(4, "29/12/20, 11:30am");

INSERT INTO interviewSlots (interviewer_id, timeslots) VALUES 
(5, "05/12/20, 9:00am");
INSERT INTO interviewSlots (interviewer_id, timeslots) VALUES 
(5, "15/12/20, 9:00am");
INSERT INTO interviewSlots (interviewer_id, timeslots) VALUES 
(5, "24/12/20, 11:00am");
INSERT INTO interviewSlots (interviewer_id, timeslots) VALUES 
(5, "30/12/20, 11:00am");

INSERT INTO interviewSlots (interviewer_id, timeslots) VALUES 
(6, "06/12/20, 8:00am");
INSERT INTO interviewSlots (interviewer_id, timeslots) VALUES 
(6, "16/12/20, 10:00am");

INSERT INTO interviewSlots (interviewer_id, timeslots) VALUES 
(7, "07/12/20, 12:00pm");
INSERT INTO interviewSlots (interviewer_id, timeslots) VALUES 
(7, "17/12/20, 12:00pm");
INSERT INTO interviewSlots (interviewer_id, timeslots) VALUES 
(7, "25/12/20, 1:30pm");

INSERT INTO interviewSlots (interviewer_id, timeslots) VALUES 
(8, "08/12/20, 2:00pm");
INSERT INTO interviewSlots (interviewer_id, timeslots) VALUES 
(8, "18/12/20, 2:00pm");
INSERT INTO interviewSlots (interviewer_id, timeslots) VALUES 
(8, "26/12/20, 2:00pm");
INSERT INTO interviewSlots (interviewer_id, timeslots) VALUES 
(8, "31/12/20, 2:00pm");

INSERT INTO interviewSlots (interviewer_id, timeslots) VALUES 
(9, "09/12/20, 2:00pm");

INSERT INTO interviewSlots (interviewer_id, timeslots) VALUES 
(10, "10/12/20, 1:00pm");
INSERT INTO interviewSlots (interviewer_id, timeslots) VALUES 
(10, "19/12/20, 3:00pm");
INSERT INTO interviewSlots (interviewer_id, timeslots) VALUES 
(10, "27/12/20, 3:00pm");
INSERT INTO interviewSlots (interviewer_id, timeslots) VALUES 
(10, "30/11/20, 3:00pm");
