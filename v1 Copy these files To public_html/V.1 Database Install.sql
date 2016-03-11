-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 20, 2015 at 12:32 PM
-- Server version: 5.5.42-cll-lve
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rybinstall`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `OLDpassword` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `paid` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;


--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` longtext NOT NULL,
  `photo` varchar(255) NOT NULL,
  `albumID` int(11) NOT NULL,
  `albumorder` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `album`
--
--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `photo` varchar(244) NOT NULL,
  `text` longtext NOT NULL,
  `short_text` longtext NOT NULL,
  `blogID` varchar(244) NOT NULL,
  `blogorder` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=88 ;



--
-- Table structure for table `blog_photos`
--

CREATE TABLE IF NOT EXISTS `blog_photos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) NOT NULL,
  `blogID` varchar(255) NOT NULL,
  `photoorder` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=65 ;



CREATE TABLE IF NOT EXISTS `calendar` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` longtext NOT NULL,
  `date` date NOT NULL,
  `photo` varchar(255) NOT NULL,
  `calendarID` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;


--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `page_type` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `text` longtext NOT NULL,
  `published` varchar(2) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `pageorder` int(11) NOT NULL,
  `subpage` varchar(255) NOT NULL,
  `urltext` varchar(255) NOT NULL,
  `page_style` varchar(255) NOT NULL,
  `adminID` varchar(255) NOT NULL,
  `background` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=456 ;

--
-- Table structure for table `page_box`
--

CREATE TABLE IF NOT EXISTS `page_box` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `box_type` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `box_style` varchar(255) NOT NULL,
  `adminID` varchar(255) NOT NULL,
  `columnset` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=333 ;

--
-- Table structure for table `page_box_types`
--

CREATE TABLE IF NOT EXISTS `page_box_types` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `active` varchar(2) NOT NULL,
  `styles` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `page_box_types`
--

INSERT INTO `page_box_types` (`ID`, `title`, `active`, `styles`) VALUES
(1, 'box', 'y', '1'),
(2, 'gallery', 'y', '1'),
(3, 'blog', 'y', '1'),
(4, 'video', 'y', '1'),
(5, 'calendar', 'y', '1'),
(6, 'custom_php', 'n', ''),
(7, 'store', 'y', '1'),
(8, 'staff', 'n', ''),
(9, 'class', 'n', ''),
(10, 'music', 'y', '1'),
(11, 'magazine', 'n', '4');

-- --------------------------------------------------------

--
-- Table structure for table `page_element`
--

CREATE TABLE IF NOT EXISTS `page_element` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `pageID` varchar(255) NOT NULL,
  `boxID` varchar(255) NOT NULL,
  `pagecontent` longtext NOT NULL,
  `file` varchar(255) NOT NULL,
  `elementlist` int(11) NOT NULL,
  `class` varchar(255) NOT NULL,
  `textalign` varchar(255) NOT NULL,
  `fontfamily` varchar(255) NOT NULL,
  `fontsize` varchar(255) NOT NULL,
  `fontweight` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `background` varchar(255) NOT NULL,
  `padding` varchar(255) NOT NULL,
  `margin` varchar(255) NOT NULL,
  `floaty` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `width` varchar(255) NOT NULL,
  `absw` varchar(255) NOT NULL,
  `opacity` varchar(255) NOT NULL,
  `radius` varchar(255) NOT NULL,
  `posx` varchar(255) NOT NULL,
  `posy` varchar(255) NOT NULL,
  `layer` varchar(255) NOT NULL,
  `lineheight` varchar(255) NOT NULL,
  `spacing` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1547 ;



--
-- Table structure for table `page_types`
--

CREATE TABLE IF NOT EXISTS `page_types` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `active` varchar(2) NOT NULL,
  `styles` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `page_types`
--

INSERT INTO `page_types` (`ID`, `title`, `active`, `styles`) VALUES
(1, 'page', 'y', '1'),
(2, 'gallery', 'n', '1'),
(3, 'blog', 'y', '4'),
(4, 'video', 'n', '4'),
(5, 'calendar', 'n', '1'),
(6, 'custom_php', 'n', ''),
(7, 'store', 'n', '4'),
(8, 'staff', 'n', ''),
(9, 'class', 'n', ''),
(10, 'music', 'n', '4'),
(11, 'magazine', 'n', '4');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` longtext NOT NULL,
  `photo` varchar(255) NOT NULL,
  `gallery` varchar(255) NOT NULL,
  `photoorder` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=254 ;


--
-- Table structure for table `song`
--

CREATE TABLE IF NOT EXISTS `song` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` longtext NOT NULL,
  `filename` varchar(255) NOT NULL,
  `songID` int(11) NOT NULL,
  `freedownload` varchar(255) NOT NULL,
  `songorder` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;



--
-- Table structure for table `store`
--

CREATE TABLE IF NOT EXISTS `store` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `mytext` longtext NOT NULL,
  `price` varchar(255) NOT NULL,
  `storeID` varchar(255) NOT NULL,
  `storeorder` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `inventory` int(255) NOT NULL,
  `buybutton` varchar(255) NOT NULL,
  `shipping` varchar(255) NOT NULL,
  `calltoaction` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Table structure for table `storecategory`
--

CREATE TABLE IF NOT EXISTS `storecategory` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `storecategoryID` int(11) NOT NULL,
  `storecategoryorder` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `storecategory`
--
-- --------------------------------------------------------

--
-- Table structure for table `store_photos`
--

CREATE TABLE IF NOT EXISTS `store_photos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) NOT NULL,
  `storeID` varchar(255) NOT NULL,
  `photoorder` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;


--
-- Table structure for table `stylesheet`
--

CREATE TABLE IF NOT EXISTS `stylesheet` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `user_css` longtext NOT NULL,
  `adminID` varchar(255) NOT NULL,
  `sitewidth` varchar(255) NOT NULL,
  `headerwidth` varchar(255) NOT NULL,
  `logoheight` varchar(255) NOT NULL,
  `headercolor` varchar(255) NOT NULL,
  `opacity` varchar(255) NOT NULL,
  `navposition` varchar(255) NOT NULL,
  `navbackground` varchar(255) NOT NULL,
  `linkcolor` varchar(255) NOT NULL,
  `linkbg` varchar(255) NOT NULL,
  `linksize` varchar(255) NOT NULL,
  `radius` varchar(255) NOT NULL,
  `hovercolor` varchar(255) NOT NULL,
  `hoverbg` varchar(244) NOT NULL,
  `selectedcolor` varchar(255) NOT NULL,
  `selectedbg` varchar(255) NOT NULL,
  `selectedhover` varchar(255) NOT NULL,
  `fontfamily` varchar(255) NOT NULL,
  `fontweight` varchar(255) NOT NULL,
  `linksbarradius` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;



--
--
INSERT INTO `stylesheet` (`ID`, `title`, `logo`, `user_css`, `adminID`, `sitewidth`, `headerwidth`, `logoheight`, `headercolor`, `opacity`, `navposition`, `navbackground`, `linkcolor`, `linkbg`, `linksize`, `radius`, `hovercolor`, `hoverbg`, `selectedcolor`, `selectedbg`, `selectedhover`, `fontfamily`, `fontweight`, `linksbarradius`) VALUES ('1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');


--
-- Table structure for table `sub_photos`
--

CREATE TABLE IF NOT EXISTS `sub_photos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `photoID` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `photoorder` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` longtext NOT NULL,
  `playlist` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `videoorder` int(11) NOT NULL,
  `youtubeID` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=79 ;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
