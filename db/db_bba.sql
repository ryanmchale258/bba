-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 18, 2014 at 11:54 AM
-- Server version: 5.5.33
-- PHP Version: 5.2.17

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
  PRIMARY KEY (pages_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'tbl_pages'
--

INSERT INTO tbl_pages (pages_id, pages_slug, pages_title, pages_meta, pages_content) VALUES
(1, 'home', 'Home', '', '<p>Barker Blagrave & Associates Dietetics Professional Corporation (BB&A) is a team of qualified health care professionals who specialize in providing dietitian services to Long Term Care Homes. Currently, the Directors and Associates consult to 23 Long Term Care Homes in Central-West, Central-South and South-West Ontario.</p> \r\n\r\n<p>Our unique expertise and long term care (LTC) experience ensure the provision of high quality comprehensive dietetic services including resident clinical nutrition care, administrative support, quality management and audits, dietetic resource development and staff education. We are committed to excellence in dietetic practice and believe that Registered Dietitians are an essential component of the health care team.</p>\r\n\r\n<p>We provide dietetic services on both a long-term contract basis, for resident nutrition care in LTC Homes, and on a short term contract basis, for dietary services reviews/regulation compliance, nutrient analysis of residents’ menus, menu development, program audit and evaluation, and staff education sessions.</p>\r\n\r\n<p>All Directors and Associates of BB&A are Registered Dietitians and members of both the College of Dietitians of Ontario (the regulatory body for dietitians in Ontario) and the professional association, Dietitians of Canada. We are very familiar with the Ministry of Health and LTC Regulations for nutrition and hydration care and for dietary services, and with Accreditation processes through Accreditation Canada or CARF.</p>\r\n\r\n<p>The Directors of BB&A have extensive experience in resource development and in professional presentations for dietitians working in LTC. Our publications/resources include: Quality Management tools and resources for the interdisciplinary care team; Policies and Procedures for clinical nutrition and dietary services administrative; In-service Education power points; Documentation tools; and Information Brochures for residents and families on a range of pertinent topics.</p>');

-- --------------------------------------------------------

--
-- Table structure for table 'tbl_staffbios'
--

CREATE TABLE tbl_staffbios (
  staffbios_id tinyint(2) unsigned NOT NULL AUTO_INCREMENT,
  staffbios_name varchar(100) NOT NULL,
  staffbios_photo varchar(75) NOT NULL DEFAULT 'nophoto.jpg',
  staffbios_bio text NOT NULL,
  staffbios_tagline text NOT NULL,
  PRIMARY KEY (staffbios_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
         