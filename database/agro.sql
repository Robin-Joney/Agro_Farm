-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 18, 2022 at 12:08 AM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `agro`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `aid` int(5) NOT NULL AUTO_INCREMENT,
  `aname` varchar(20) NOT NULL,
  `apass` varchar(20) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `aname`, `apass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE IF NOT EXISTS `buyer` (
  `bid` int(5) NOT NULL AUTO_INCREMENT,
  `busername` varchar(50) NOT NULL,
  `bpassword` varchar(50) NOT NULL,
  `date` varchar(10) NOT NULL,
  `mobileno` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `pinno` varchar(10) NOT NULL,
  `dist` varchar(50) NOT NULL,
  `productdetails` varchar(50) NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`bid`, `busername`, `bpassword`, `date`, `mobileno`, `address`, `pinno`, `dist`, `productdetails`) VALUES
(4, 'dharshini', 'dharshini', '18-05-2022', '9629444242', 'coimbatore', '641012', 'Coimbatore', '');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cid` int(5) NOT NULL AUTO_INCREMENT,
  `stid` int(5) NOT NULL,
  `pid` int(5) NOT NULL,
  `qty` int(5) NOT NULL,
  `date` varchar(20) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cid`, `stid`, `pid`, `qty`, `date`) VALUES
(5, 4, 10, 10, '2022-05-18');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `pname` longtext NOT NULL,
  `pdescp` longtext NOT NULL,
  `cat` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `pimage` varchar(200) NOT NULL,
  `sid` int(5) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `pname`, `pdescp`, `cat`, `price`, `qty`, `pimage`, `sid`) VALUES
(10, 'Pepper Seed', 'Organic Seed', 'Seed', 500, 100, 'black-pepper-seed-500x500.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE IF NOT EXISTS `seller` (
  `sid` int(5) NOT NULL AUTO_INCREMENT,
  `susername` varchar(50) NOT NULL,
  `spassword` varchar(50) NOT NULL,
  `date` varchar(10) NOT NULL,
  `mobileno` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `pinno` varchar(10) NOT NULL,
  `dist` varchar(50) NOT NULL,
  `productdetails` varchar(50) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`sid`, `susername`, `spassword`, `date`, `mobileno`, `address`, `pinno`, `dist`, `productdetails`) VALUES
(4, 'Arun', 'arun', '10-05-2022', '8956231470', 'Annur', '642120', 'Tirupur', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
