

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;





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
(6, 'custom', 'y', '1'),
(7, 'store', 'y', '1');

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


