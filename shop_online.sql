-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 27, 2015 at 07:44 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shop_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_username`, `password`, `email`, `fname`, `lname`, `address`, `phone`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@yahoo.com', 'first', '', 'dallu', '4289135'),
('ajjj', 'd41d8cd98f00b204e9800998ecf8427e', 'sd@c.m', 'ak', 'alkl', 'ds', '787'),
('oioi', '81dc9bdb52d04dc20036dbd8313ed055', 'meetmedixya@ymail.com', 'klk', 'klksskal', 'jhas', '8767'),
('poppo', '0e8bf94985c6c60c7b595de3590ba01d', 'meetmedixya@ymail.com', 'kjkj', 'lk', 'kjkjk', '90988'),
('sdd', 'd41d8cd98f00b204e9800998ecf8427e', '', 'dix', '', '', ''),
('sds', 'd41d8cd98f00b204e9800998ecf8427e', '', 'hdsjd', '', '', ''),
('tara', 'd41d8cd98f00b204e9800998ecf8427e', 'hxcg@jbcb.com', 'tara', 'mndr', 'cj', '7778');

-- --------------------------------------------------------

--
-- Table structure for table `associatedproduct`
--

CREATE TABLE IF NOT EXISTS `associatedproduct` (
  `aproduct_id` int(11) NOT NULL DEFAULT '0',
  `aproduct_name` varchar(255) NOT NULL,
  `aproduct_price` varchar(255) NOT NULL,
  `aproduct_qty` varchar(255) NOT NULL,
  `aproduct_brand` varchar(255) NOT NULL,
  `shopno` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `aproduct_image` varchar(255) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`aproduct_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `brand_name` varchar(255) NOT NULL,
  `brand_image` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`brand_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_name`, `brand_image`, `category`) VALUES
('Acer', '26085_7.png', ''),
('Apple', '5921_apple-macbook-air-notebook-400x400-imadwdzsg63whet6.jpeg', 'ELECTRONICS'),
('Asus', '17940_asus-notebook-400x400-imadrk99pfgfrykr.jpeg', 'ELECTRONICS'),
('Canon', '9067_9.png', ''),
('Dell', '16719_4.png', ''),
('Digi Flow', '7869_digiflip-pro-xt811-nxtonek.jpeg', 'ELECTRONICS'),
('DMG FULL', '12262_4-dmg-full-360-rotating-stand-cover-case-for-apple-ipad-2-3-4-with-matte-screen-stylus-wristband-400x400-imadq226hchj5enm.jpeg', 'ELECTRONICS'),
('Fujifilm', '20808_images.jpg', ''),
('Hitachi', '24805_Hitachi-Logo.gif', ''),
('HP', '4316_5.png', ''),
('HTC', '14266_images.jpg', 'ELECTRONICS'),
('Kodak', '7781_large_article_im4590_kodak_logo.jpg', ''),
('Leica', '26426_leica-camera-logo.jpg', ''),
('Lenovo', '16756_1.png', ''),
('LG', '4776_images (5).jpg', ''),
('Motorola', '27792_motorola-xt1022-400x400-imadvvfkshrfjcfj.jpeg', 'ELECTRONICS'),
('nike', '28181_970829_747018281999138_1599051657_n.png', ''),
('Nikon', '23388_images (1).jpg', ''),
('Nokia', '24264_11.png', ''),
('Onida', '15758_onida-leo24hbb-400x400-imadywy22kzn2gqc.jpeg', 'ELECTRONICS'),
('Pentax', '20459_Pentax-Company-Logo.jpg', ''),
('Real', '18825_images.jpg', 'FOODS & BEVERAGES'),
('Samsung', '28590_6.png', ''),
('Skull Candy', '29860_skullcandy-2xl-shakedown-100x100-imadb8gjvjgptzgh.jpeg', 'ELECTRONICS'),
('Sony', '22714_8.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cust_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `order_time` time NOT NULL,
  `order_date` date NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`order_time`),
  KEY `cust_id` (`cust_id`),
  KEY `product_id` (`product_id`),
  KEY `product_id_2` (`product_id`),
  KEY `product_id_3` (`product_id`),
  KEY `cust_id_2` (`cust_id`),
  KEY `cust_id_3` (`cust_id`),
  KEY `cust_id_4` (`cust_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `cat_desc` varchar(255) NOT NULL,
  `status` int(2) NOT NULL,
  `cat_image` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_desc`, `status`, `cat_image`, `parent`) VALUES
(7, 'ELECTRONICS', '<p>&nbsp;This is the description of tye electronics category.&nbsp;This is the description of tye electronics category.&nbsp;This is the description of tye electronics category.&nbsp;This is the description of tye electronics category.&nbsp;This is the de', 1, '18419_4.jpg', 0),
(9, 'ACCESSORIES', '', 1, '', 0),
(10, 'FOODS & BEVERAGES', '', 1, '', 0),
(11, 'ART &GIFT', '', 1, '31284_Array', 0),
(12, 'TOYS', '<p>&nbsp;This is toy.</p>', 1, '23730_Array', 0),
(13, 'FOOD', '<p>THis is food</p>', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `childpages`
--

CREATE TABLE IF NOT EXISTS `childpages` (
  `cpage_id` int(11) NOT NULL AUTO_INCREMENT,
  `cpage_title` varchar(255) NOT NULL,
  `cpage_slug` varchar(25) NOT NULL,
  `cpage_desc` varchar(255) NOT NULL,
  `cpage_image` varchar(255) NOT NULL,
  `status` int(2) NOT NULL,
  `page_id` int(11) NOT NULL,
  PRIMARY KEY (`cpage_id`),
  KEY `page_id` (`page_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `comment` text NOT NULL,
  `id_post` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `comment`, `id_post`, `date`) VALUES
(2, 'k', 'k@k.com', 'jjjjjjjjjjjjjjjjjjjjjj', 41, '2014-09-17 18:00:10'),
(3, 'lll', 'm', 'n', 41, '2014-09-17 18:55:18'),
(4, 'kll', 'm', 'mmmm', 41, '2014-09-17 19:05:49'),
(5, 'mm', 'm', 'm', 41, '2014-09-17 19:08:13'),
(6, 'mi', 'll', 'nn', 41, '2014-09-17 19:08:42'),
(7, 'gg', 'g', '', 41, '2014-09-17 19:10:41'),
(8, 'mmmm', '', '', 41, '2014-09-17 19:13:58'),
(9, 'n', '', '', 41, '2014-09-17 19:14:42'),
(10, 'j', 'k', 'jj', 48, '2014-09-18 02:09:04'),
(11, 'hh', 'mmm', 'nnn', 44, '2014-09-20 19:50:57'),
(12, 'iii', 'mm', 'nnn', 44, '2014-09-20 19:51:12'),
(13, 'ff', '', 'bbb', 44, '2014-09-20 19:53:52'),
(14, 'jj', 'b', 'jj', 44, '2014-09-20 19:57:31');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `fname`, `lname`, `email`, `msg`, `created_at`) VALUES
(1, 'jj', 'g', 'gg', 'gg', '2014-09-21 09:07:58'),
(2, 'jj', 'g', 'gg', 'gg', '2014-09-21 09:08:45'),
(3, 'Anita Shrestha', 'hh', 'GG', 'nn', '2014-09-21 09:09:00'),
(4, 'Anish Shrestha', 'k', 'a', 'kk', '2014-09-21 09:18:14');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `username` varchar(255) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `postal` varchar(255) NOT NULL,
  `cctype` varchar(255) NOT NULL,
  `ccnumber` int(11) NOT NULL,
  `ccexpiry` date NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`username`),
  KEY `cust_id` (`cust_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`username`, `cust_id`, `fname`, `lname`, `email`, `password`, `phone`, `country`, `address`, `gender`, `postal`, `cctype`, `ccnumber`, `ccexpiry`, `type`, `created_at`, `image`) VALUES
('ddixya', 0, 'ddixya', '', '', '8277e0910d750195b448797616e091ad', '', '', '', '', '', '', 0, '0000-00-00', '', '0000-00-00', ''),
('dixyaa', 0, 'dixyaa', '', '', '8277e0910d750195b448797616e091ad', '', '', '', 'female', '', '', 0, '0000-00-00', '', '0000-00-00', ''),
('DixyaLam', 0, '', '', '', '8277e0910d750195b448797616e091ad', '', '', '', 'female', '', '', 0, '0000-00-00', '', '0000-00-00', ''),
('RasnaMndhr', 0, '', '', '', '4b43b0aee35624cd95b910189b3dc231', '', '', '', 'female', '', '', 0, '0000-00-00', '', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qty` int(11) NOT NULL,
  `confirmation` varchar(30) NOT NULL,
  `total` varchar(100) NOT NULL,
  `note` varchar(500) NOT NULL,
  `username` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `order_time` time NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `shopno` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cust_id` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=156 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `qty`, `confirmation`, `total`, `note`, `username`, `order_date`, `order_time`, `product_name`, `shopno`, `status`) VALUES
(100, 759, '', '1518', 'jk', 'name', '0000-00-00', '00:00:00', 'Lenovo Y40', '0', 0),
(101, 759, '<br />\r\n<b>Notice</b>:  Undefi', '759', 'k', 'name', '0000-00-00', '00:00:00', 'Lenovo Y40', '0', 0),
(102, 759, '<br />\r\n<b>Notice</b>:  Undefi', '1518', 'l', 'name', '0000-00-00', '00:00:00', 'Lenovo Y40', '0', 0),
(103, 759, '<br />\r\n<b>Notice</b>:  Undefi', '     759.00 ', '', 'name', '0000-00-00', '00:00:00', 'Lenovo Y40', '0', 0),
(110, 5, '20557', '10000', 'bbn', 'name', '0000-00-00', '00:00:00', 'Dell', '0', 0),
(133, 1, '31312', '1000', '', '', '0000-00-00', '00:00:00', 'ddf', '0', 2),
(134, 4, '12743', '200000', '', '', '0000-00-00', '00:00:00', 'Apple', '0', 1),
(135, 1, '12743', '50000', '', '', '0000-00-00', '00:00:00', 'Apple', '2', 2),
(136, 1, '12743', '759', '', 'd', '0000-00-00', '00:00:00', 'Lenovo Y40', '0', 1),
(137, 4, '12743', '3036', '', 'd', '0000-00-00', '00:00:00', 'Lenovo Y40', '0', 0),
(138, 4, '12743', '8000', '', 'd', '0000-00-00', '00:00:00', 'Ipod', '0', 0),
(139, 1, '26595', '759', '', 'd', '0000-00-00', '00:00:00', 'Lenovo Y40', '0', 1),
(140, 2, '<br />\r\n<b>Notice</b>:  Undefi', '1518', '', 'd', '0000-00-00', '00:00:00', 'Lenovo Y40', '0', 0),
(141, 2, '32146', '100000', '', 'r', '0000-00-00', '00:00:00', 'Apple', '5', 0),
(142, 5, '32146', '25000', '', 'r', '0000-00-00', '00:00:00', 'Sony', '5', 0),
(143, 2, '16828', '1518', '', 'RasnaMndhr', '0000-00-00', '00:00:00', 'Lenovo Y40', '0', 0),
(144, 3, '16828', '270000', '', 'RasnaMndhr', '0000-00-00', '00:00:00', 'LG', '0', 0),
(145, 2, '6186', '1518', 'hjh', 'RasnaMndhr', '0000-00-00', '00:00:00', 'Lenovo Y40', '0', 0),
(146, 2, '21916', '4000', 'fdd', 'RasnaMndhr', '0000-00-00', '00:00:00', 'Motorola', '0', 0),
(147, 3, '21916', '15000', 'ds', 'RasnaMndhr', '0000-00-00', '00:00:00', 'Onida Tv', '0', 0),
(148, 4, '28033', '200000', 'jhjh', 'RasnaMndhr', '0000-00-00', '00:00:00', 'Apple', '0', 0),
(149, 4, '17336', '320000', 'kjk', 'RasnaMndhr', '0000-00-00', '00:00:00', 'Blackberry', '0', 0),
(151, 2, '1533', '1518', 'khkk', 'RasnaMndhr', '0000-00-00', '00:00:00', 'Lenovo Y40', '0', 0),
(152, 2, '11173', '1518', 'dsfdf', 'RasnaMndhr', '0000-00-00', '00:00:00', 'Lenovo Y40', '0', 0),
(153, 2, '21278', '1518', 'dsas', 'RasnaMndhr', '0000-00-00', '00:00:00', 'Lenovo Y40', '0', 0),
(154, 2, '28583', '1518', 'jhj', 'RasnaMndhr', '0000-00-00', '00:00:00', 'Lenovo Y40', '0', 0),
(155, 3, '10248', '7500', 'hjh', 'RasnaMndhr', '0000-00-00', '00:00:00', 'DMG', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_title` varchar(255) NOT NULL,
  `page_desc` varchar(255) NOT NULL,
  `page_image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `page_slug` varchar(255) NOT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `page_title`, `page_desc`, `page_image`, `status`, `page_slug`) VALUES
(1, 'Home', '<p>&nbsp;This is a homepage</p>', '14185_Excellent Resume Format 1.png', 1, 'home'),
(2, 'Products', '<p>&nbsp;this is home child page</p>', '14140_Panda-wallpaper-10156222.jpg', 1, 'product'),
(3, 'SERVICES', '<p>&nbsp;thnbj</p>', '1541_Hope-wallpaper-9344033.jpg', 0, 'services'),
(4, 'Register', '<p>&nbsp;nhbhhyyhtgttttttttttttt</p>', '32425_images.jpg', 1, 'signup'),
(5, 'Login', '<p>&nbsp;JJJJJ</p>', '18010_vlcsnap-2013-09-23-17h18m30s191.png', 1, 'login'),
(7, 'Contact Us', '<p>&nbsp;jhfhgf</p>', '13741_1.jpg', 1, 'contact'),
(8, 'Help', '<p>This is a help page.</p>', '6895_vgjhjpg.jpg', 1, 'help'),
(9, 'inquiry', 'jhh', '12199_', 0, 'visitus'),
(11, 'Help', '<p>&nbsp;This is ncvnhelp page,,,</p>', '', 0, 'help');

-- --------------------------------------------------------

--
-- Table structure for table `paymentm`
--

CREATE TABLE IF NOT EXISTS `paymentm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dmethodid` varchar(30) NOT NULL,
  `methodname` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `paymentm`
--

INSERT INTO `paymentm` (`id`, `dmethodid`, `methodname`) VALUES
(1, '1', 'Cash On Delivery'),
(2, '2', 'BDO'),
(3, '2', 'Metro Bank'),
(4, '2', 'Smart Padala'),
(5, '3', 'BDO'),
(6, '3', 'Metro Bank'),
(7, '3', 'Smart Padala');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `cart_no` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `product_top` varchar(255) NOT NULL,
  `product_front` varchar(255) NOT NULL,
  `product_left` varchar(255) NOT NULL,
  `product_right` varchar(255) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `configuration` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `status` int(2) NOT NULL,
  `username` varchar(255) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `shopno` int(11) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `subcat_id` (`subcat_id`),
  KEY `cart_no` (`cart_no`),
  KEY `username` (`username`),
  KEY `shopno` (`shopno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `subcat_id`, `cart_no`, `price`, `qty`, `product_top`, `product_front`, `product_left`, `product_right`, `product_desc`, `brand`, `model`, `configuration`, `created_at`, `status`, `username`, `rating`, `shopno`) VALUES
(41, 'Lenovo Y40', 9, 0, '     759.00 ', 0, '14972_Lenovo1.jpg', '24325_lenovo2.png', '11098_lenovo3.jpg', '4491_lenovo4.jpg', '<div class="galleria-thumbnails-container galleria-carousel">Cpea winterr brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd. <br />\r\n&nbsp;</div>', 'Lenovo Y40', 'Lenovo Y40', 'Lenovo Y40', '0000-00-00', 1, 'dixya', '', 0),
(43, 'Nike', 14, 0, '2000', 50, '17871_bag1.jpg', '31580_bag2.jpg', '15973_bag3.jpg', '', '', 'Nike', 'Nike', 'Nike', '0000-00-00', 1, 'dixya', '', 0),
(46, 'Camera', 12, 0, '50000', 50, '19604_12.jpg', '21409_9.jpg', '22982_14.jpg', '', '<div class="galleria-thumbnails-container galleria-carousel">Cpea winterr brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd. <br />\r\n&nbsp;</div>\r\n<p>&nbsp;</p>', 'Samsung', '55', '855', '0000-00-00', 1, 'dixya', '', 0),
(47, 'Necklace', 13, 0, '1000', 50, '14567_12.jpg', '2269_15.jpg', '19538_grid5.jpg', '', '<div class="galleria-thumbnails-container galleria-carousel">Cpea winterr brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd. <br />\r\n&nbsp;</div>\r\n<p>&nbsp;</p>', 'Nike', 'Glass', 'll', '0000-00-00', 1, 'dixya', '', 0),
(48, 'Dell', 9, 0, '2000', 0, '9894_4.jpg', '', '', '', '<div class="galleria-thumbnails-container galleria-carousel">Cpea winterr brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd. <br />\r\n&nbsp;</div>\r\n<p>&nbsp;</p>', '', '', '', '2014-08-13', 1, 'dixya', '', 0),
(49, 'Sony', 9, 0, '5000', 0, '23500_4.jpg', '25679_', '30684_', '16613_', '<div class="galleria-thumbnails-container galleria-carousel">Cpea winterr brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd. <br />\r\n&nbsp;</div>\r\n<p>&nbsp;</p>', '', '', '', '2014-08-16', 1, 'dixya', '', 0),
(50, 'ddf', 9, 0, '1000', 0, '5034_4.jpg', '', '', '', '<div class="galleria-thumbnails-container galleria-carousel">Cpea winterr brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd. <br />\r\n&nbsp;</div>\r\n<p>&nbsp;</p>', '', '', '', '2014-08-12', 1, 'dixya', '', 0),
(51, 'Apple', 9, 0, '50000', 0, '10993_kko.jpg', '26326_', '11607_', '68_', '<div class="galleria-thumbnails-container galleria-carousel">Cpea winterr brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd. <br />\r\n&nbsp;</div>\r\n<p>&nbsp;</p>', '', '', '', '0000-00-00', 1, 'dixya', '', 0),
(52, 'Samsung', 9, 0, '56000', 0, '17868_images7.jpg', '4117_', '28458_', '20763_', '<div class="galleria-thumbnails-container galleria-carousel">Cpea winterr brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd. <br />\r\n&nbsp;</div>\r\n<p>&nbsp;</p>', '', '', '', '0000-00-00', 1, 'dixya', '', 0),
(53, 'Blackberry', 9, 0, '80000', 0, '31313_index.jpg', '29366_', '31671_', '7972_', '<div class="galleria-thumbnails-container galleria-carousel">Cpea winterr brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd. <br />\r\n&nbsp;</div>\r\n<p>&nbsp;</p>', '', '', '', '0000-00-00', 1, 'dixya', '', 0),
(54, 'LG', 9, 0, '90000', 0, '3716_bh.jpg', '5741_', '29346_', '23347_', '<div class="galleria-thumbnails-container galleria-carousel">Cpea winterr brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd. <br />\r\n&nbsp;</div>\r\n<p>&nbsp;</p>', '', '', '', '0000-00-00', 1, 'dixya', '', 0),
(55, 'Samsung Y40', 10, 0, '20000', 5, '17829_Mobile-Phones-Wallpaper-hd.jpg', '7546_5.jpg', '26923_black-mp3-player.jpg', '', '<p>&nbsp;This is samsung mobile..</p>', 'Samsung', 'Samsung', '123', '2014-09-02', 1, 'dixya', '', 0),
(56, 'Acer laptop', 10, 0, '10000', 5, '9059_22.jpg', '27488_', '10265_', '24798_', '<p>&nbsp;This is laptop.</p>', 'Acer', '11', '12', '2014-09-02', 1, 'dixya', '', 0),
(57, 'HP', 9, 0, '3500', 8, '892_index1.jpg', '29701_22.jpg', '7258_6.jpg', '11915_images4.jpg', '<p>&nbsp;This is HP laptop.</p>', 'HP', 'HP', 'HP 123', '2014-09-02', 1, 'dixya', '', 0),
(58, 'Acer1', 9, 0, '', 0, '23400_index.jpg', '19329_index1.jpg', '9254_', '10343_', '', 'Acer', '', '', '0000-00-00', 1, 'dixya', '', 0),
(59, 'Acer2', 9, 0, '', 0, '874_bh.jpg', '28763_images4.jpg', '16632_', '27089_', '', 'Acer', '', '', '0000-00-00', 1, 'dixya', '', 0),
(60, 'Acer3', 9, 0, '', 0, '13963_imagues.jpg', '17256_index.jpg', '4993_', '19494_', '', 'Acer', '', '', '0000-00-00', 1, 'dixya', '', 0),
(61, 'Asus', 9, 0, '35000', 50, '23948_asus-notebook-400x400-imadrk99pfgfrykr.jpeg', '11477_asus-notebook-400x400-imadrk99ezcrsnfy.jpeg', '11498_asus-notebook-400x400-imadrk99vcqggycy.jpeg', '7131_lenovo-ideapad-notebook-100x100-imadr3sucggdkrw7.jpeg', '<p>&nbsp;&nbsp;This is asus.&nbsp;&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This i', 'Asus', 'Asus', 'Notebook', '2014-09-21', 1, 'shop1', '', 1),
(62, 'Apple Macbook', 9, 0, '35000', 60, '26301_apple-macbook-air-notebook-400x400-imadwdzswggdyva6.jpeg', '1202_apple-macbook-air-notebook-400x400-imadwdzsg63whet6.jpeg', '27651_apple-macbook-air-notebook-400x400-imadwdzsg5u7ahnq.jpeg', '6016_', '<p>&nbsp;&nbsp;&nbsp;This is Apple.&nbsp;&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp', 'Apple', 'Apple ios', 'HP 123', '2014-09-15', 1, 'shop1', '', 1),
(63, 'Head Phone', 11, 0, '1500', 40, '5958_skullcandy-2xl-shakedown-100x100-imadb6c5z7uzhgdk.jpeg', '27911_skullcandy-2xl-shakedown-100x100-imadb8gjvjgptzgh.jpeg', '15924_skullcandy-2xl-shakedown-100x100-imadb6c5z7uzhgdk.jpeg', '1117_skullcandy-2xl-shakedown-100x100-imadb8gjvjgptzgh.jpeg', '<p>&nbsp;&nbsp;&nbsp;This is Apple.&nbsp;&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp', 'Skull Candy', 'Skull 45', 'Skull HIOL', '2014-09-10', 1, 'shop1', '', 1),
(64, 'HP Notebook', 9, 0, '30000', 60, '12729_hp-notebook-15-r022tx-400x400-imadxsz9fgkskzma.jpeg', '14846_hp-notebook-15-r022tx-400x400-imadxsz9hjwmkcjb.jpeg', '17759_hp-notebook-15-r022tx-400x400-imadxsz93dqzya69.jpeg', '11180_hp-notebook-15-r022tx-400x400-imadxsz9ufv9ccgg.jpeg', '<p>This is HP Notebook.&nbsp;&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asu', 'HP', 'HP ICV', 'HP QUAD', '2014-09-16', 1, 'shop1', '', 1),
(65, 'DMG', 11, 0, '2500', 100, '18040_4-dmg-full-360-rotating-stand-cover-case-for-apple-ipad-2-3-4-with-matte-screen-stylus-wristband-400x400-imadq226hchj5enm.jpeg', '16721_4-dmg-full-360-rotating-stand-cover-case-for-apple-ipad-2-3-4-with-matte-screen-stylus-wristband-400x400-imadq225sjsfuu4h.jpeg', '11702_4-dmg-full-360-rotating-stand-cover-case-for-apple-ipad-2-3-4-with-matte-screen-stylus-wristband-400x400-imadq2255a8x2azx.jpeg', '6839_4-dmg-full-360-rotating-stand-cover-case-for-apple-ipad-2-3-4-with-matte-screen-stylus-wristband-400x400-imadq225d5chxjg7.jpeg', '<p>This is DMG.&nbsp;&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.</p>', 'DMG FULL', 'DMG 23', 'DMG NEW', '2014-09-10', 1, 'shop1', '', 1),
(66, 'Digiflip', 10, 0, '45000', 65, '21028_digiflip-pro-xt811-nxtonek.jpeg', '8589_digiflopproxt811.jpeg', '28482_digiflip-pro-xt811-next.jpeg', '11091_digiflip-pro-xt811-another.jpeg', '<p>This is Digiflip.&nbsp;&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.<', 'Digi Flow', 'Digiflip II', 'Digiflip INC', '2014-09-02', 1, 'shop1', '', 1),
(67, 'Motorola', 10, 0, '2000', 50, '25042_motorola-xt1022-400x400-imadvvfkshrfjcfj.jpeg', '21155_motorola-xt1022-400x400-imadvvfkrc.jpeg', '2464_motorola-xt1022-400x400-imadvvfknshcywk5.jpeg', '2393_motorola-xt1022-400x400-imadvvfknshcywk5.jpeg', '<p>This is Mototrola.&nbsp;&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.&nbsp;This is asus.', 'Motorola', 'Motorola23', 'Motorola ', '2014-09-02', 1, 'shop1', '', 1),
(68, 'Onida Tv', 12, 0, '5000', 50, '12405_onida-leo24hbb-400x400-imadywy3aguatyc9.jpeg', '30730_onida-leo24hbb-400x400-imadywy22kzn2gqc.jpeg', '22651_onida-leo24hbb-400x400-imadywy3ht8nq6sm.jpeg', '22168_onida-leo24hbb-400x400-imadywy2mwevtugw.jpeg', '<p>This is Onida Tv.&nbsp;</p>', 'Onida', 'Onida ', 'kl', '2014-09-02', 1, 'shop1', '', 1),
(70, 'orange juice', 22, 0, '', 0, '15049_2774_images (1).jpg', '30158_', '7407_', '21500_', '<p>&nbsp;dfdf</p>', 'Acer', '', '', '0000-00-00', 0, 'dixya', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` int(20) NOT NULL,
  `payable` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `confirmation` varchar(20) NOT NULL,
  `delivery` varchar(300) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time` varchar(100) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `delivery_type` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  PRIMARY KEY (`reservation_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `firstname`, `lastname`, `city`, `address`, `country`, `email`, `contact`, `payable`, `status`, `confirmation`, `delivery`, `date`, `time`, `payment`, `delivery_type`, `username`) VALUES
(32, 'Dixya', 'Manandhar', 'kathmandu', 'tokha,kathmandu', '', 'tmanandhar@ymail.com', 123, 1518, 'Pending', '17463', 'swoyambhu', '0000-00-00 00:00:00', '', '', '', ''),
(26, 'n', 'n', 'mk', 'e', '', 'a@a.com', 12, 104000, 'Pending', '16096', 'ktm', '0000-00-00 00:00:00', '', '', '', ''),
(27, 'ipod', 'f', 'kk', 'dd', '', 'a@a.com', 12, 10000, 'Pending', '13721', 'swoyambhu', '0000-00-00 00:00:00', '', '', '', ''),
(28, 'Dixya', 'Lamichhane', 'kathmandu', 'Swoyambhu', '', 'tmanandhar@ymail.com', 12345, 3795, 'Pending', '3382', 'tokha,kathmandu', '0000-00-00 00:00:00', '', '', '', ''),
(29, 'Dixya', 'Lamichhane', 'kathmandu', 'Swoyambhu', '', 'tmanandhar@ymail.com', 123456, 115795, 'Pending', '3382', 'tokha,kathmandu', '0000-00-00 00:00:00', '', '', '', ''),
(30, 'r', 'm', 'f', 's', '', 'a@a.com', 1, 4000, 'Pending', '8286', 'k', '0000-00-00 00:00:00', '', '', '', ''),
(31, 'Dixya', 'Manandhar', 'kathmandu', 'tokha,kathmandu', '', 'tmanandhar@ymail.com', 12345, 2000, 'Pending', '22547', 'swoyambhu', '0000-00-00 00:00:00', '', '', '', ''),
(24, 'easy', 'ea', 'kathmandu', 'f', '', 'a@a.com', 123, 10000, 'Pending', '25067', 'f', '0000-00-00 00:00:00', '', '', '', ''),
(25, 'easy', 'ea', 'kathmandu', 'f', '', 'a@a.com', 123, 10000, 'Pending', '25067', 'f', '0000-00-00 00:00:00', '', '', '', ''),
(23, 'easy', 'ea', 'kathmandu', 'f', '', 'a@a.com', 123, 10000, 'Pending', '25067', 'f', '0000-00-00 00:00:00', '', '', '', ''),
(19, 'r', 'm', 'kathmandu', '', '', 'a@a.com', 123, 0, 'Pending', '314', '', '0000-00-00 00:00:00', '', '', '', ''),
(20, 'r', 'm', 'kathmandu', '', '', 'a@a.com', 123, 0, 'Pending', '314', '', '0000-00-00 00:00:00', '', '', '', ''),
(21, 'r', 'm', 'kathmandu', '', '', 'a@a.com', 123, 0, 'Pending', '314', '', '0000-00-00 00:00:00', '', '', '', ''),
(22, 'r', 'm', 'kathmandu', '', '', 'a@a.com', 123, 0, 'Pending', '314', '', '0000-00-00 00:00:00', '', '', '', ''),
(33, 'Rasna', 'Manandhar', 'kathmandu', 'tokha,kathmandu', '', 'aforajaya', 123, 759, 'Pending', '26595', 'tokha,kathmandu', '0000-00-00 00:00:00', '', '', '', ''),
(34, 'Rasna', 'Manandhar', 'kathmandu', 'tokha,kathmandu', '', 'aforajaya', 123, 759, 'Pending', '26595', 'tokha,kathmandu', '0000-00-00 00:00:00', '', '', '', ''),
(35, 't', 'fg', 'xf', 'd', '', 'fg', 0, 0, 'Pending', '24910', 'dfsd', '0000-00-00 00:00:00', '', '', '', 'd'),
(36, 'w', 'f', 'ff', 'f', '', 'f', 0, 0, 'Pending', '24910', 'f', '0000-00-00 00:00:00', '', '', '', 'd'),
(37, 'nv', 'mv', 'cv', 'cvmnc', '', 'cxvn', 0, 0, 'Pending', '16828', 'mnvvm', '0000-00-00 00:00:00', '', '', '', 'RasnaMndhr'),
(38, 'Dixya', 'Lamichhane', 'ktm', 'jsjash', '', 'meetmedixya@ymail.com', 232, 0, 'Pending', '6186', 'jsjash', '0000-00-00 00:00:00', '', '', '', 'RasnaMndhr'),
(39, 'dixi', 'Lamichhane', 'ktm', 'fdd', '', 'dixyako@gmail.com', 232, 0, 'Pending', '21916', 'fdd', '0000-00-00 00:00:00', '', '', '', 'RasnaMndhr'),
(40, 'gita', 'lama', 'jhjh', 'jhjh', '', 'm@ymail.com', 5334, 0, 'Pending', '28033', 'jhjh', '0000-00-00 00:00:00', '', '', '', 'RasnaMndhr'),
(41, 'gh', 'fgf', 'ktm', 'jjhjh', '', 'm@ymail.com', 6565, 0, 'Pending', '17336', 'jjhjh', '0000-00-00 00:00:00', '', '', '', 'RasnaMndhr'),
(42, 'fg', 'dfd', 'jkj', 'kj', '', 'meetmedixya@ymail.com', 44, 0, 'Pending', '1533', 'kj', '0000-00-00 00:00:00', '', '', '', 'RasnaMndhr'),
(43, 'd', 'sd', 'fdfd', 'dfdf', '', 'meetmedixya@ymail.com', 23, 0, 'Pending', '21278', 'dfdf', '0000-00-00 00:00:00', '', '', '', 'RasnaMndhr'),
(44, 'd', 'd', 'fdfd', 'f', '', 'f', 0, 0, 'Pending', '28583', 'f', '0000-00-00 00:00:00', '', '', '', 'RasnaMndhr'),
(45, 'f', 'fsfe', 'ktm', 'frs', '', 'meetmedixya@ymail.com', 232, 0, 'Pending', '10248', 'frs', '0000-00-00 00:00:00', '', '', '', 'RasnaMndhr');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `product_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `sale_date` int(11) NOT NULL,
  `transactionid` int(11) NOT NULL,
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`sid`),
  KEY `product_id` (`product_id`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE IF NOT EXISTS `shops` (
  `shopno` int(11) NOT NULL,
  `description` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `rating` varchar(255) NOT NULL,
  PRIMARY KEY (`shopno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`shopno`, `description`, `address`, `phone`, `rating`) VALUES
(0, 'kjk', 'ktm', 98, '9'),
(1, 'Shop1', 'shop1', 0, ''),
(2, 'lastt', 'khai', 76, ''),
(5, 'first one', 'dallu', 65, '');

-- --------------------------------------------------------

--
-- Table structure for table `shopuser`
--

CREATE TABLE IF NOT EXISTS `shopuser` (
  `shopno` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `status` int(2) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  PRIMARY KEY (`username`),
  KEY `shopno` (`shopno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopuser`
--

INSERT INTO `shopuser` (`shopno`, `username`, `fname`, `lname`, `status`, `password`, `email`, `phone`) VALUES
(0, '', '', 'k', 0, 'd41d8cd98f00b204e9800998ecf8427e', '', ''),
(0, 'abc', 'aa', 'lamichhane', 0, '81dc9bdb52d04dc20036dbd8313ed055', 'ka@yahoo.com', '234'),
(0, 'anitt', 'anit', 'lama', 1, '202cb962ac59075b964b07152d234b70', 'my@hotmail.com', '8767'),
(0, 'dixya', 'kj', 'll', 1, '202cb962ac59075b964b07152d234b70', 'meetmedixya@ymail.com', '77777'),
(2, 'ram', 'kalu', 'll', 1, '987', 'meetmedixya@ymail.com', '766'),
(5, 'ravi', '', '', 1, '202cb962ac59075b964b07152d234b70', '', ''),
(1, 'shop1', 'shop1', 'shop1', 1, '12186fe8a7b1dd053d95e8d3379c7271', 'shop2@.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
  `cat_id` int(11) NOT NULL,
  `subcat_id` int(11) NOT NULL AUTO_INCREMENT,
  `subcat_name` varchar(255) NOT NULL,
  `subcat_image` varchar(255) NOT NULL,
  `subcat_desc` varchar(255) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`subcat_id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`cat_id`, `subcat_id`, `subcat_name`, `subcat_image`, `subcat_desc`, `status`) VALUES
(7, 9, 'Laptop', '17531_pc-banner.png', '<p>This &nbsp;is a laptop subcategory. This &nbsp;is a laptop subcategory. This &nbsp;is a laptop subcategory. This &nbsp;is a laptop subcategory. This &nbsp;is a laptop subcategory. This &nbsp;is a laptop subcategory. This &nbsp;is a laptop subcategory. ', 1),
(7, 10, 'Mobile phones', '18718_7b59ebe22d818d7ab0696461b7eff7626f2d243608c057c8461902d436d5b5fe.jpg', '', 1),
(7, 11, 'Audio Player', '21144_images-storefronts-electronics-mp3-page-banner.png', '', 1),
(7, 12, 'Television(TV)', '6100_adb13e7c764e91c7fff8886bcad9411fca22c7b246b48ec5971b1eb084f1713d.jpg', '', 1),
(9, 13, 'Jewellery', '21849_', '', 1),
(9, 14, 'Bag', '13621_', '', 1),
(7, 15, 'camera', '21005_nikon-d600-full-frame-camera-2.jpg', '', 1),
(7, 16, 'Video Player', '4051_cc80885bc547d22a77bee17f06a140403b04f559ab98007046dcb2ac01c1c0e7.jpg', '', 1),
(7, 17, 'Smart Phone', '5570_7b59ebe22d818d7ab0696461b7eff7626f2d243608c057c8461902d436d5b5fe.jpg', '', 1),
(13, 22, 'Dry fruits', '23248_2774_images (1).jpg', 'hygienic one', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wishist`
--

CREATE TABLE IF NOT EXISTS `wishist` (
  `wid` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  PRIMARY KEY (`wid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `wishist`
--

INSERT INTO `wishist` (`wid`, `product_id`, `username`) VALUES
(1, 41, 'd'),
(2, 41, 'd'),
(3, 41, 'd'),
(4, 49, 'd'),
(5, 41, 'd'),
(9, 41, 'r'),
(10, 41, 'RasnaMndhr');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `childpages`
--
ALTER TABLE `childpages`
  ADD CONSTRAINT `childpages_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `pages` (`page_id`) ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`subcat_id`) REFERENCES `subcategory` (`subcat_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`username`) REFERENCES `shopuser` (`username`) ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_4` FOREIGN KEY (`shopno`) REFERENCES `shopuser` (`shopno`) ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`username`) REFERENCES `customer` (`username`) ON UPDATE CASCADE;

--
-- Constraints for table `shopuser`
--
ALTER TABLE `shopuser`
  ADD CONSTRAINT `shopuser_ibfk_1` FOREIGN KEY (`shopno`) REFERENCES `shops` (`shopno`) ON UPDATE CASCADE;

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
