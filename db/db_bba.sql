-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2015 at 02:33 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

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
-- Table structure for table 'captcha'
--

CREATE TABLE IF NOT EXISTS captcha (
  captcha_id bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  captcha_time int(10) unsigned NOT NULL,
  ip_address varchar(16) NOT NULL DEFAULT '0',
  word varchar(20) NOT NULL,
  PRIMARY KEY (captcha_id),
  KEY word (word)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'captcha'
--

INSERT INTO captcha (captcha_id, captcha_time, ip_address, word) VALUES
(1, 1430435715, '174.93.32.237', 'zF3sGw2U'),
(2, 1430436230, '174.93.32.237', 'jgf1CM1i');

-- --------------------------------------------------------

--
-- Table structure for table 'ci_sessions'
--

CREATE TABLE IF NOT EXISTS ci_sessions (
  session_id varchar(40) NOT NULL DEFAULT '0',
  ip_address varchar(45) NOT NULL DEFAULT '0',
  user_agent varchar(120) NOT NULL,
  last_activity int(10) unsigned NOT NULL DEFAULT '0',
  user_data text NOT NULL,
  PRIMARY KEY (session_id),
  KEY last_activity_idx (last_activity)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'ci_sessions'
--

INSERT INTO ci_sessions (session_id, ip_address, user_agent, last_activity, user_data) VALUES
('09663e98a63f15a94ad368f4caee2d55', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', 1431045192, 'a:6:{s:9:"user_data";s:0:"";s:8:"username";s:10:"ryanmchale";s:4:"name";s:4:"Ryan";s:3:"sId";s:1:"1";s:5:"level";s:1:"1";s:12:"is_logged_in";b:1;}');

-- --------------------------------------------------------

--
-- Table structure for table 'tbl_admin'
--

CREATE TABLE IF NOT EXISTS tbl_admin (
  admin_id tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  admin_username varchar(75) NOT NULL,
  admin_password varchar(300) NOT NULL,
  admin_firstname varchar(75) NOT NULL,
  admin_lastname varchar(75) NOT NULL,
  admin_email varchar(75) NOT NULL,
  admin_level tinyint(1) NOT NULL,
  admin_lastlogin int(10) NOT NULL,
  admin_lastsession varchar(150) NOT NULL,
  PRIMARY KEY (admin_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'tbl_admin'
--

INSERT INTO tbl_admin (admin_id, admin_username, admin_password, admin_firstname, admin_lastname, admin_email, admin_level, admin_lastlogin, admin_lastsession) VALUES
(1, 'ryanmchale', 'd66fcc742cc640480ace083585445fd5cb3ea224', 'Ryan', 'McHale', 'r_mchale2@fanshaweonline.ca', 1, 1431035271, '7f09498be9457bfc15dfad2f3ccd4377');

-- --------------------------------------------------------

--
-- Table structure for table 'tbl_company'
--

CREATE TABLE IF NOT EXISTS tbl_company (
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
-- Table structure for table 'tbl_jobs'
--

CREATE TABLE IF NOT EXISTS tbl_jobs (
  jobs_id smallint(3) unsigned NOT NULL AUTO_INCREMENT,
  jobs_title varchar(40) NOT NULL,
  jobs_type varchar(60) NOT NULL,
  jobs_location varchar(60) NOT NULL,
  jobs_start date NOT NULL,
  jobs_desc text NOT NULL,
  jobs_reqs text NOT NULL,
  PRIMARY KEY (jobs_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'tbl_jobs'
--

INSERT INTO tbl_jobs (jobs_id, jobs_title, jobs_type, jobs_location, jobs_start, jobs_desc, jobs_reqs) VALUES
(1, 'Associate Dietitian', 'Contract', 'Newmarket Area', '2015-05-15', '<p>The incumbent(s) would work as Associate Dietitians under contract to BB&amp;A, with support and advice as needed, a comprehensive set of clinical and administrative policies, procedures &amp; documentation tools, vacation relief and regular team / education meetings.</p>\r\n<p><br /> The Directors of BB&amp;A, Paula Blagrave, Christine Barker, Julie Urbshott and Sarah Faulds work closely with their Associate Dietitians and have developed a strong team of professionals dedicated to the provision of high quality, comprehensive nutrition care services for LTC residents.</p>', '<ul>\r\n<li>Ability to work independently, with support from the BB&amp;A team</li>\r\n<li>Excellent communication (verbal &amp; written) and computer skills</li>\r\n<li>Demonstrated time management skills and organizational ability</li>\r\n<li>Registration with the College of Dietitians of Ontario</li>\r\n<li>Member of Dietitians of Canada and the the Gerontology Network</li>\r\n<li>Current Professional Liability Insurance</li>\r\n<li>Previous experience in Long Term Care</li>\r\n<li>Applicants must have their own vehicle and be prepared to travel</li>\r\n</ul>');

-- --------------------------------------------------------

--
-- Table structure for table 'tbl_links'
--

CREATE TABLE IF NOT EXISTS tbl_links (
  links_id smallint(3) unsigned NOT NULL AUTO_INCREMENT,
  links_text varchar(75) NOT NULL,
  links_url varchar(100) NOT NULL,
  PRIMARY KEY (links_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'tbl_pages'
--

CREATE TABLE IF NOT EXISTS tbl_pages (
  pages_id smallint(3) unsigned NOT NULL AUTO_INCREMENT,
  pages_slug varchar(50) NOT NULL,
  pages_title varchar(100) NOT NULL,
  pages_meta varchar(200) NOT NULL,
  pages_content text NOT NULL,
  pages_navlvl tinyint(1) NOT NULL DEFAULT '2',
  pages_haskids tinyint(1) NOT NULL DEFAULT '0',
  pages_navprnt varchar(50) DEFAULT NULL,
  pages_hascontroller tinyint(1) NOT NULL DEFAULT '0',
  pages_weight tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (pages_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'tbl_pages'
--

INSERT INTO tbl_pages (pages_id, pages_slug, pages_title, pages_meta, pages_content, pages_navlvl, pages_haskids, pages_navprnt, pages_hascontroller, pages_weight) VALUES
(1, 'home', 'Home', '', '', 1, 0, NULL, 1, 0),
(2, 'services', 'What We Do', '', '', 1, 0, NULL, 1, 0),
(3, 'resources', 'Resources', '', 'Resources - Coming Soon', 1, 0, NULL, 1, 0),
(4, 'orderform', 'Order Form', '', 'Order Form - Coming Soon', 1, 0, NULL, 1, 0),
(5, 'thankyou', 'Thank You', 'This is a meta description', '<p>Thank you for your interest in Barker, Blagrave & Associates. We will respond to your inquiry promptly. If this is an emergency, please contact the approprate member of our staff via the method of your choice listed on our <a href="<?php echo base_url() . index_page() ?>staffcontact">Staff Contact page</a>.</p>', 2, 0, 'null', 0, 0),
(6, 'contact', 'Contact Us', '', '', 1, 0, NULL, 1, 0),
(7, 'jobopenings', 'Job Openings', '', 'Job Openings - Coming Soon', 2, 0, 'contact', 1, 1),
(8, 'staffcontact', 'Staff Contact Info', '', 'Staff Contact Info - Coming Soon', 2, 0, 'contact', 1, 2),
(9, 'testimonials', 'Testimonials', '', '', 2, 0, 'services', 1, 0),
(10, 'structure', 'Who We Are', '', '', 2, 0, 'services', 1, 2),
(12, 'mission', 'How We Do It', '', '', 2, 0, 'services', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table 'tbl_presentation'
--

CREATE TABLE IF NOT EXISTS tbl_presentation (
  presentation_id smallint(3) unsigned NOT NULL AUTO_INCREMENT,
  presentation_name varchar(80) NOT NULL,
  resource_id smallint(3) NOT NULL,
  PRIMARY KEY (presentation_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'tbl_presentation'
--

INSERT INTO tbl_presentation (presentation_id, presentation_name, resource_id) VALUES
(1, 'Constipation', 3),
(2, 'Chronic Kidney Disease', 3),
(3, 'Diabetes &amp; Hypoglycemia', 3),
(4, 'Dysphagia &amp; Feeding - Diet Mod., Chewing, Swallowing', 3),
(5, 'Ileostomy &amp; Colostomy Care', 3),
(6, 'Hydration', 3),
(7, 'Managing Stroke in LTC', 3),
(8, 'Nutrition, Hydration &amp; Protein Update', 3),
(9, 'Nutrition &amp; Osteoporosis', 3),
(10, 'Nutritional Supplements', 3),
(11, 'Pressure Ulcers', 3),
(12, 'Therapeutic Nutrition', 3),
(13, 'Food &amp; Fluid Documentation', 3),
(14, 'Dysphagia &amp; Feeding - Assiting Residents at Meal Time', 3),
(15, 'Pleasurable Dining', 3),
(16, 'Restorative Feeding &amp; Dining', 3),
(17, 'Eating Well with CFG', 3),
(18, 'Food Safety &amp; Sanitation', 3),
(19, 'Menu Planning in LTC', 3),
(20, 'Ethical Nutrition Considerations', 3),
(21, 'Maintenance of Hypoglycemia', 6),
(22, 'Maintenance of Impaired Skin Integrity', 6),
(23, 'Assistance &amp; Maintenance of Hydration', 6),
(24, 'Enteral Feeding Protocol', 6),
(25, 'Delivery of Nutrition Care', 6);

-- --------------------------------------------------------

--
-- Table structure for table 'tbl_resource'
--

CREATE TABLE IF NOT EXISTS tbl_resource (
  resource_id smallint(3) unsigned NOT NULL AUTO_INCREMENT,
  resource_name varchar(80) NOT NULL,
  resource_slug varchar(50) NOT NULL,
  resource_checklist int(1) unsigned NOT NULL,
  resource_desc text NOT NULL,
  resource_cdprice varchar(10) NOT NULL,
  resource_emailprice varchar(10) NOT NULL,
  resource_comboprice varchar(10) NOT NULL,
  resource_manualprice varchar(10) NOT NULL,
  resource_individualprice varchar(10) NOT NULL,
  resource_discount varchar(10) NOT NULL,
  resource_discountreq smallint(3) NOT NULL,
  PRIMARY KEY (resource_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'tbl_resource'
--

INSERT INTO tbl_resource (resource_id, resource_name, resource_slug, resource_checklist, resource_desc, resource_cdprice, resource_emailprice, resource_comboprice, resource_manualprice, resource_individualprice, resource_discount, resource_discountreq) VALUES
(1, 'Quality Care Audits, 1st Edition, September 2014', 'qualitycareaudits', 0, '25 audits in the areas of Residents'' Dining, Food Production and Nutrition Care to support the Home''s Continuous Quality Improvement program', '75.00', '', '', '', '', '', 0),
(2, 'Diabetes Update P&amp;P', 'diabetesupdate', 0, 'Updated Policies and Procedures Based on the 2013 Clinical Practice Guidelines', '25.00', '25.00', '', '', '', '', 0),
(3, 'Education Essentials, 1st Edition', 'educationessentials', 1, 'PP Presentations and Participant Quizzes for Ensuring Quality Nutrition and Hydration in LTC', '', '', '100.00', '', '10.00', '5.00', 3),
(6, 'Algorithms, Protocols &amp; Tools', 'algorithms', 1, '', '', '', '', '', '7.50', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table 'tbl_settings'
--

CREATE TABLE IF NOT EXISTS tbl_settings (
  settings_id tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  settings_email varchar(80) NOT NULL,
  PRIMARY KEY (settings_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'tbl_settings'
--

INSERT INTO tbl_settings (settings_id, settings_email) VALUES
(1, 'sarah@faulds.ca'),
(2, 'ryan.mchale258@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table 'tbl_shipping'
--

CREATE TABLE IF NOT EXISTS tbl_shipping (
  shipping_id mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
  shipping_level varchar(20) NOT NULL,
  shipping_above varchar(12) NOT NULL,
  shipping_below varchar(20) NOT NULL,
  PRIMARY KEY (shipping_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'tbl_shipping'
--

INSERT INTO tbl_shipping (shipping_id, shipping_level, shipping_above, shipping_below) VALUES
(1, '40.00', '16.00', '8.00');

-- --------------------------------------------------------

--
-- Table structure for table 'tbl_staffbios'
--

CREATE TABLE IF NOT EXISTS tbl_staffbios (
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
(1, 'Christine Barker', 'B.A.Sc.', 'RD', 'christine.jpg', 'Christine’s career started as an outpatient dietitian at a hospital in Australia, then returned to Canada and began her 35 year career in long term care. As the Director of Food and Nutrition Services at a chronic care hospital and LTC home, she gained in-depth experience in both the clinical and administrative aspects of dietetics.  As the long standing volunteer Chair of the Dietitians of Canada LTC Action Group, Christine was actively involved in strategies to improve the nutrition care and food services provided for residents in LTC Homes.  She is committed to quality long term care and to building a skilled and dedicated team of <strong><i>BB&A</i></strong> Associate dietitians.', 'As a Director of BB&A, Christine manages the administrative and financial aspects of the corporation and is co-author of their many policy manuals and QA resources.', '1', 'Meadow Drive', 'London', 'Ontario', '(519) 433-4937', '(519) 433-4937', '', 'cbarker@rogers.com', '', 'N6A 3V7'),
(2, 'Paula Blagave', 'B.Sc.', 'RD', 'paula.jpg', '<p>After a 15 year career in acute care, Paula moved into the LTC setting. She provides expertise from both a clinical and administrative perspective and consults on a regular basis to LTC Homes and to dietitians interested in LTC. Her special interests include diabetes management, dysphagia, palliative care and total quality management and she is committed to a team approach to long term care. Paula is a certified long term care administrator.</p>', 'As a Director of BB&A, Paula takes the lead clinical role and co-authors their many policy manuals and QA resources.', '270', 'Victoria Avenue N.', 'Listowel', 'Ontario', '(519) 291-3156', '', '(519) 272-4758', 'blagrave@wightman.ca', '', 'N4W 1S8'),
(3, 'Julie Urbshott', 'B.Sc.', 'RD', 'julie.jpg', 'Julie brings a wide range of both clinical and administrative skills to her position with <strong><i>BB&A</i></strong>. Julie’s career began as a dietary aide while she studied to be a Nutrition Manager.  After working for 5 years as a Nutrition Manager, she returned to school to pursue a dream of becoming a Registered Dietitian.  For more than 8 years, Julie worked as an Administrative Dietitian in both acute and long term care hospital sites as well as working as a <strong><i>BB&A</i></strong> Associate Dietitian in several LTC Homes. She is a regular guest lecturer at Brescia University College and has a passion for educating and working with internship programs at Brescia and London Health Sciences Centre.  She believes in quality improvement and a team approach, both in the provision of resident care and in the administration of <strong><i>BB&A</i></strong>.', 'As a Director of BB&A, Julie assists with the financial management and is responsible for conducting audits and pre-compliance reviews and completing QA and annual reports for all Homes.', '23814', 'Denfield Road', 'Denfield', 'Ontario', '(226) 927-7029', '(519) 666-2717', '', 'jaurbshott@urbgall.com', 'RR#1', 'N0M 1P0'),
(4, 'Sarah Faulds', 'B.Sc.', 'RD', 'sarah.jpg', 'Sarah has a passion for Long Term Care spanning over the past 20 years.  She began her career in this sector working as a Dietary Aide, then a Foodservice Manager and finally for over the past 15 years as an Administrative and Consulting Clinical Dietitian.  Sarah is a strong advocate for resident centered approaches to nutrition care.  Through dealing with her own family’s health and nutrition challenges, Sarah brings a sense of compassion for the residents and families that she is helping. Outside of work, Sarah is a busy wife to Jamie and mom to Jack and Avery.  Sarah and her family reside in Elgin County.', '', '47940', 'Mapleton Line', 'Aylmer', 'Ontario', '(519) 765-3350', '(519) 765-3350', '', 'sarah@faulds.ca', 'RR#7', 'N5H 2R6');

-- --------------------------------------------------------

--
-- Table structure for table 'tbl_testimonials'
--

CREATE TABLE IF NOT EXISTS tbl_testimonials (
  testimonials_id tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  testimonials_content text NOT NULL,
  testimonials_shrt text NOT NULL,
  testimonials_author varchar(75) NOT NULL,
  testimonials_position varchar(75) NOT NULL,
  testimonials_company varchar(75) NOT NULL,
  testimonials_location varchar(75) NOT NULL,
  PRIMARY KEY (testimonials_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'tbl_testimonials'
--

INSERT INTO tbl_testimonials (testimonials_id, testimonials_content, testimonials_shrt, testimonials_author, testimonials_position, testimonials_company, testimonials_location) VALUES
(1, 'Since our association with BB&A began [in 2003], we have been continually impressed by the quality of service and care provided both by their dietitians and by BB&A as a company. Regular clinical services are provided by skilled and knowledgeable dietitians……Our RD is a respected and valued member of the care team whose expertise is sought and feely given.', 'We have been continually impressed by the quality of service and care', 'Kash Ramchandani', 'Administrator/Owner', 'Royal Terrace', 'Palmerson'),
(2, 'I am always reassured that Barker, Blagrave & Associates’ resources reflect current best  practice and relevance to  MOHLTC regulations, in an easily understood, concise format which can be adapted for use in my LTC Homes. I don''t know how I would have managed over the past ~ 8 years without these resources.', 'I don''t know how I would have managed over the past ~ 8 years without these resources', 'Marilyn Jessome, RD', 'Consulting Dietitian', '', ''),
(3, 'Fordwich Village Nursing Home has had the pleasure of using this Registered Dietitian Services firm for the past 6 years. Our onsite Dietitian not only completes Resident assessments….she also attends Care Conferences, PAC meetings and offers Inservice Programs. With all due respect and pleasure, I highly recommend this business for its quality of services and professionalism, and progressive approach to Seniors’ Nutritional Services.', 'I highly recommend [Barker, Blagrave & Associates] for its quality of services and professionalism, and progressive approach to Seniors’ Nutritional Services', 'Susan Jaunzemis', 'Administrator/Director of Care', 'Fordwich Village Nursing Home', ''),
(4, 'The dietitians at BB&A provide invaluable support to our MScFN program. The Directors have led seminars with our interns to prepare them for practical training in long term care and home care. Our students have consistently found these seminars very useful, providing comments such as “eye – opening and informative” and “wonderful overview”. In addition, a number of our interns have completed placements with BB&A; the dietitians are excellent mentors and create a range of learning environments.', 'BB&A''s dietitians are excellent mentors and create a range of learning environments', 'Kayla Glynn MHSc, RD', 'Internship Coordinator/Faculty Lecturer', 'Division of Food & Nutritional Sciences', 'Brescia University College'),
(5, 'We have had the pleasure to have our dietetic services provided by Barker Blagrave & Associates for 6 years. Both our Home RD and BB&A are able to interpret and reinforce the MOHOTC Regulations for Nutrition care and Hydration programs and are always involved in MOHLTC inspections. Referrals and consultations are always handled promptly. Resources from BB&A have been instrumental in policy development and review.', 'Resources from BB&A have been instrumental in [our] policy development and review', 'Nancy Tweddle', 'Administrator', 'Exeter Villa', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
