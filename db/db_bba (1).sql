-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 08, 2015 at 08:47 PM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: 'db_bba'
--

-- --------------------------------------------------------

--
-- Table structure for table 'tbl_company'
--

CREATE TABLE tbl_company (
  company_id tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  company_name varchar(40) NOT NULL,
  company_streetnumber varchar(10) NOT NULL,
  company_streetname varchar(60) NOT NULL,
  company_city varchar(40) NOT NULL,
  company_province varchar(30) NOT NULL,
  company_postalcode varchar(10) NOT NULL,
  company_phone varchar(20) NOT NULL,
  company_fax varchar(20) NOT NULL,
  company_email varchar(60) NOT NULL,
  PRIMARY KEY (company_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'tbl_company'
--

INSERT INTO tbl_company (company_id, company_name, company_streetnumber, company_streetname, company_city, company_province, company_postalcode, company_phone, company_fax, company_email) VALUES
(1, 'Barker Blagrave & Associates', '1', 'Meadowdown Drive', 'London', 'Ontario', 'N64 3V7', '(519) 433-4937', '(519) 433-4937', 'cbarker@rogers.com');

-- --------------------------------------------------------

--
-- Table structure for table 'tbl_links'
--

CREATE TABLE tbl_links (
  links_id smallint(3) unsigned NOT NULL AUTO_INCREMENT,
  links_text varchar(75) NOT NULL,
  links_url varchar(100) NOT NULL,
  PRIMARY KEY (links_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'tbl_pages'
--

CREATE TABLE tbl_pages (
  pages_id smallint(3) unsigned NOT NULL AUTO_INCREMENT,
  pages_slug varchar(50) NOT NULL,
  pages_title varchar(100) NOT NULL,
  pages_meta varchar(200) NOT NULL,
  pages_content text NOT NULL,
  pages_navlvl tinyint(1) NOT NULL DEFAULT '2',
  pages_haskids tinyint(1) NOT NULL DEFAULT '0',
  pages_navprnt varchar(50) DEFAULT NULL,
  pages_hascontroller tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (pages_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'tbl_pages'
--

INSERT INTO tbl_pages (pages_id, pages_slug, pages_title, pages_meta, pages_content, pages_navlvl, pages_haskids, pages_navprnt, pages_hascontroller) VALUES
(1, 'home', 'Home', '', '', 1, 0, NULL, 1),
(2, 'about', 'About', '', 'About - Coming Soon', 1, 0, NULL, 0),
(3, 'resources', 'Resources', '', 'Resources - Coming Soon', 1, 0, NULL, 0),
(4, 'orderform', 'Order Form', '', 'Order Form - Coming Soon', 1, 0, NULL, 0),
(5, 'mission-values', 'Mission and Values', '', 'Mission and Values - Coming Soon', 0, 0, NULL, 0),
(6, 'contact', 'Contact Us', '', 'Contact Us - Coming Soon', 1, 0, NULL, 0),
(7, 'job-openings', 'Job Openings', '', 'Job Openings - Coming Soon', 2, 0, 'contact', 0),
(8, 'staffcontact', 'Staff Contact Info', '', 'Staff Contact Info - Coming Soon', 2, 0, 'contact', 1),
(9, 'testimonials', 'Testimonials', '', '', 2, 0, 'about', 1),
(10, 'staff', 'Staff Bios', '', '', 2, 0, 'about', 1);

-- --------------------------------------------------------

--
-- Table structure for table 'tbl_staffbios'
--

CREATE TABLE tbl_staffbios (
  staffbios_id tinyint(2) unsigned NOT NULL AUTO_INCREMENT,
  staffbios_name varchar(100) NOT NULL,
  staffbios_degree varchar(20) NOT NULL,
  staffbios_designation varchar(20) NOT NULL,
  staffbios_photo varchar(75) NOT NULL DEFAULT 'nophoto.jpg',
  staffbios_bio text NOT NULL,
  staffbios_tagline text NOT NULL,
  staffbios_streetnumber varchar(10) NOT NULL,
  staffbios_streetname varchar(60) NOT NULL,
  staffbios_city varchar(30) NOT NULL,
  staffbios_province varchar(30) NOT NULL,
  staffbios_phone varchar(20) NOT NULL,
  staffbios_fax varchar(20) NOT NULL,
  staffbios_mobile varchar(20) NOT NULL,
  staffbios_email varchar(80) NOT NULL,
  staffbios_rr varchar(10) NOT NULL,
  staffbios_postalcode varchar(10) NOT NULL,
  PRIMARY KEY (staffbios_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'tbl_staffbios'
--

INSERT INTO tbl_staffbios (staffbios_id, staffbios_name, staffbios_degree, staffbios_designation, staffbios_photo, staffbios_bio, staffbios_tagline, staffbios_streetnumber, staffbios_streetname, staffbios_city, staffbios_province, staffbios_phone, staffbios_fax, staffbios_mobile, staffbios_email, staffbios_rr, staffbios_postalcode) VALUES
(1, 'Christine Barker', 'B.A.Sc.', 'RD', 'christine.jpg', 'During 10 years in a Long Term Care Home, Christine gained in-depth experience in both the clinical and administrative aspects of providing nutrition care and dietary services for residents. From 1997 to 2006, as the Dietitians of Canada Dietetic Consultant for LTC, she was actively involved in formulating and implementing DC’s LTC advocacy strategy. She continues her commitment to quality long term care as a presenter at workshops for Registered Dietitians, a mentor for dietetic interns and as Past-Chair of the DC LTC Action Group.', 'As a Director of BB&A, Christine manages the administrative and financial aspects of the corporation and is co-author of their many policy manuals and QA resources.', '1', 'Meadow Drive', 'London', 'Ontario', '(519) 433-4937', '(519) 433-4937', '', 'cbarker@rogers.com', '', 'N6A 3V7'),
(2, 'Paula Blagave', 'B.Sc.', 'RD, CDE', 'paula.jpg', 'After a 15 year career in acute care, Paula moved into the Long Term Care setting. She provides expertise from both a clinical and administrative perspective and consults on a regular basis to Long Term Care Homes and to dietitians interested in LTC. Her special interests include diabetes management, dysphagia, palliative care and total quality management and she is committed to a team approach to long term care. Paula is a Certified Diabetes Educator and a certified long term care administrator.', 'As a Director of BB&A, Paula takes the lead clinical role and \r\nco-authors their many policy manuals and QA resources.', '270', 'Victoria Avenue N.', 'Listowel', 'Ontario', '(519) 272-4758', '(519) 272-4758', '(519) 291-3156', 'blagrave@wightman.ca', '', 'N4W 1S8'),
(3, 'Julie Urbshott', 'B.Sc.', 'RD', 'julie.jpg', 'Julie brings a wide range of both clinical and administrative skills to her position with BB&A. For more than 8 years, Julie worked as an Administrative Dietitian in both acute and long term care hospital sites as well as working as a Consulting Dietitian in several LTC Homes. She is committed to continued quality improvement and a team approach, both in the provision of resident care and in the administration of BB&A.', 'As a Director of BB&A, Julie assists with the financial management and is responsible for conducting audits and pre-compliance reviews and completing QA and annual reports for all Homes.', '23814', 'Denfield Road', 'Denfield', 'Ontario', '(226) 927-7029', '(519) 666-2717', '', 'jaurbshott@urbgall.com', 'RR#1', 'N0M 1P0'),
(4, 'Sarah Faulds', '', 'RD', 'sarah.jpg', '', '', '47940', 'Mapleton Line', 'Aylmer', 'Ontario', '(519) 765-3350', '(519) 765-3350', '', 'sarah@faulds.ca', 'RR#7', 'N5H 2R6');

-- --------------------------------------------------------

--
-- Table structure for table 'tbl_testimonials'
--

CREATE TABLE tbl_testimonials (
  testimonials_id tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  testimonials_content text NOT NULL,
  testimonials_author varchar(75) NOT NULL,
  testimonials_position varchar(75) NOT NULL,
  testimonials_company varchar(75) NOT NULL,
  testimonials_location varchar(75) NOT NULL,
  PRIMARY KEY (testimonials_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'tbl_testimonials'
--

INSERT INTO tbl_testimonials (testimonials_id, testimonials_content, testimonials_author, testimonials_position, testimonials_company, testimonials_location) VALUES
(1, '<p>“Since our association with BB&A began [in 2003], we have been continually impressed by the quality of service and care provided both by their dietitians and by BB&A as a company. Regular clinical services are provided by skilled and knowledgeable dietitians……Our RD is a respected and valued member of the care team whose expertise is sought and feely given.”</p>', 'Kash Ramchandani', 'Administrator/Owner', 'Royal Terrace', 'Palmerson'),
(2, '<p>“I am always reassured that Barker, Blagrave & Associates’ resources reflect current best  practice and relevance to  MOHLTC regulations, in an easily understood, concise format which can be adapted for use in my LTC Homes. I don''t know how I would have managed over the past ~ 8 years without these resources.”</p>', 'Marilyn Jessome, RD', 'Consulting Dietitian', '', ''),
(3, '<p>“Fordwich Village Nursing Home has had the pleasure of using this Registered Dietitian Services firm for the past 6 years. Our onsite Dietitian not only completes Resident assessments….she also attends Care Conferences, PAC meetings and offers Inservice Programs. With all due respect and pleasure, I highly recommend this business for its quality of services and professionalism, and progressive approach to Seniors’ Nutritional Services.”</p>', 'Susan Jaunzemis', 'Administrator/Director of Care', 'Fordwich Village Nursing Home', ''),
(4, '<p>"The dietitians at BB&A provide invaluable support to our MScFN program. The Directors have led seminars with our interns to prepare them for practical training in long term care and home care. Our students have consistently found these seminars very useful, providing comments such as “eye – opening and informative” and “wonderful overview”. In addition, a number of our interns have completed placements with BB&A; the dietitians are excellent mentors and create a range of learning environments."</p>', 'Kayla Glynn MHSc, RD', 'Internship Coordinator/Faculty Lecturer', 'Division of Food & Nutritional Sciences', 'Brescia University College'),
(5, '<p>“We have had the pleasure to have our dietetic services provided by Barker Blagrave & Associates for 6 years. Both our Home RD and BB&A are able to interpret and reinforce the MOHOTC Regulations for Nutrition care and Hydration programs and are always involved in MOHLTC inspections. Referrals and consultations are always handled promptly. Resources from BB&A have been instrumental in policy development and review.”</p>', 'Nancy Tweddle', 'Administrator', 'Exeter Villa', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
