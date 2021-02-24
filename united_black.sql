-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2021 at 01:25 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `united_black`
--

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `attribute_id` int(11) NOT NULL,
  `attribute_name` varchar(100) NOT NULL,
  `display_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`attribute_id`, `attribute_name`, `display_name`) VALUES
(1, 'Phone Color', 'Color'),
(2, 'Phone Storage', 'Storage');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_value`
--

CREATE TABLE `attribute_value` (
  `attribute_value_id` int(11) NOT NULL,
  `attribute_id` varchar(100) NOT NULL,
  `attribute_value` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attribute_value`
--

INSERT INTO `attribute_value` (`attribute_value_id`, `attribute_id`, `attribute_value`) VALUES
(1, '2', '64 GB'),
(2, '2', '128 GB'),
(3, '2', '256 GB'),
(4, '1', 'Green'),
(5, '1', 'Yellow'),
(6, '1', 'Blue');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `cat_image` varchar(100) NOT NULL,
  `active` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `on_homescreen` tinyint(1) NOT NULL DEFAULT '0',
  `position` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `parent_id`, `name`, `description`, `slug`, `cat_image`, `active`, `on_homescreen`, `position`, `created_at`, `updated_at`) VALUES
(1, 0, 'Electronics', 'electronics', 'electronics', '1613807557Electronic-6212c.png', 1, 0, 0, '2021-02-20 13:22:37', '2021-02-20 13:22:37'),
(2, 0, 'Mobile phones', 'mobile phones description', 'mobile-phones', '161380778030x30mobile2.png', 1, 0, 0, '2021-02-20 13:26:20', '2021-02-20 13:26:20'),
(3, 2, 'Samsung', 'samsung description', 'samsung', '161381325430x30mobile2.png', 1, 0, 0, '2021-02-20 14:57:34', '2021-02-20 14:57:34'),
(4, 3, 'Samsung galaxy M1', 'samsung galaxy s1', 'samsung-galaxy-m1', '', 1, 0, 0, '2021-02-20 15:01:43', '2021-02-20 15:01:43'),
(5, 3, 'Samsung galaxy s11', 'samsung galgaxy s11 description', 'samsung-galaxy-s11', '', 1, 0, 0, '2021-02-20 15:09:22', '2021-02-20 15:09:22'),
(6, 2, 'Nokia', 'Nokia', 'nokia', '', 1, 0, 0, '2021-02-20 15:09:56', '2021-02-20 15:09:56'),
(7, 6, 'Nokia 111 dfdf', 'Nokia ffdfd', 'nokia-119-hjh', '1613819652Electronic-6212c.png', 1, 0, 0, '2021-02-20 15:10:11', '2021-02-20 15:10:11');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(64) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `name`) VALUES
(1, 'Germany'),
(2, 'Austria'),
(3, 'Belgium'),
(4, 'Canada'),
(5, 'China'),
(6, 'Spain'),
(7, 'Finland'),
(8, 'France'),
(9, 'Greece'),
(10, 'Italy'),
(11, 'Japan'),
(12, 'Luxemburg'),
(13, 'Netherlands'),
(14, 'Poland'),
(15, 'Portugal'),
(16, 'Czech Republic'),
(17, 'United Kingdom'),
(18, 'Sweden'),
(19, 'Switzerland'),
(20, 'Denmark'),
(21, 'United States'),
(22, 'HongKong'),
(23, 'Norway'),
(24, 'Australia'),
(25, 'Singapore'),
(26, 'Ireland'),
(27, 'New Zealand'),
(28, 'South Korea'),
(29, 'Israel'),
(30, 'South Africa'),
(31, 'Nigeria'),
(32, 'Ivory Coast'),
(33, 'Togo'),
(34, 'Bolivia'),
(35, 'Mauritius'),
(36, 'Romania'),
(37, 'Slovakia'),
(38, 'Algeria'),
(39, 'American Samoa'),
(40, 'Andorra'),
(41, 'Angola'),
(42, 'Anguilla'),
(43, 'Antigua and Barbuda'),
(44, 'Argentina'),
(45, 'Armenia'),
(46, 'Aruba'),
(47, 'Azerbaijan'),
(48, 'Bahamas'),
(49, 'Bahrain'),
(50, 'Bangladesh'),
(51, 'Barbados'),
(52, 'Belarus'),
(53, 'Belize'),
(54, 'Benin'),
(55, 'Bermuda'),
(56, 'Bhutan'),
(57, 'Botswana'),
(58, 'Brazil'),
(59, 'Brunei'),
(60, 'Burkina Faso'),
(61, 'Burma (Myanmar)'),
(62, 'Burundi'),
(63, 'Cambodia'),
(64, 'Cameroon'),
(65, 'Cape Verde'),
(66, 'Central African Republic'),
(67, 'Chad'),
(68, 'Chile'),
(69, 'Colombia'),
(70, 'Comoros'),
(71, 'Congo, Dem. Republic'),
(72, 'Congo, Republic'),
(73, 'Costa Rica'),
(74, 'Croatia'),
(75, 'Cuba'),
(76, 'Cyprus'),
(77, 'Djibouti'),
(78, 'Dominica'),
(79, 'Dominican Republic'),
(80, 'East Timor'),
(81, 'Ecuador'),
(82, 'Egypt'),
(83, 'El Salvador'),
(84, 'Equatorial Guinea'),
(85, 'Eritrea'),
(86, 'Estonia'),
(87, 'Ethiopia'),
(88, 'Falkland Islands'),
(89, 'Faroe Islands'),
(90, 'Fiji'),
(91, 'Gabon'),
(92, 'Gambia'),
(93, 'Georgia'),
(94, 'Ghana'),
(95, 'Grenada'),
(96, 'Greenland'),
(97, 'Gibraltar'),
(98, 'Guadeloupe'),
(99, 'Guam'),
(100, 'Guatemala'),
(101, 'Guernsey'),
(102, 'Guinea'),
(103, 'Guinea-Bissau'),
(104, 'Guyana'),
(105, 'Haiti'),
(106, 'Heard Island and McDonald Islands'),
(107, 'Vatican City State'),
(108, 'Honduras'),
(109, 'Iceland'),
(110, 'India'),
(111, 'Indonesia'),
(112, 'Iran'),
(113, 'Iraq'),
(114, 'Man Island'),
(115, 'Jamaica'),
(116, 'Jersey'),
(117, 'Jordan'),
(118, 'Kazakhstan'),
(119, 'Kenya'),
(120, 'Kiribati'),
(121, 'Korea, Dem. Republic of'),
(122, 'Kuwait'),
(123, 'Kyrgyzstan'),
(124, 'Laos'),
(125, 'Latvia'),
(126, 'Lebanon'),
(127, 'Lesotho'),
(128, 'Liberia'),
(129, 'Libya'),
(130, 'Liechtenstein'),
(131, 'Lithuania'),
(132, 'Macau'),
(133, 'Macedonia'),
(134, 'Madagascar'),
(135, 'Malawi'),
(136, 'Malaysia'),
(137, 'Maldives'),
(138, 'Mali'),
(139, 'Malta'),
(140, 'Marshall Islands'),
(141, 'Martinique'),
(142, 'Mauritania'),
(143, 'Hungary'),
(144, 'Mayotte'),
(145, 'Mexico'),
(146, 'Micronesia'),
(147, 'Moldova'),
(148, 'Monaco'),
(149, 'Mongolia'),
(150, 'Montenegro'),
(151, 'Montserrat'),
(152, 'Morocco'),
(153, 'Mozambique'),
(154, 'Namibia'),
(155, 'Nauru'),
(156, 'Nepal'),
(157, 'Netherlands Antilles'),
(158, 'New Caledonia'),
(159, 'Nicaragua'),
(160, 'Niger'),
(161, 'Niue'),
(162, 'Norfolk Island'),
(163, 'Northern Mariana Islands'),
(164, 'Oman'),
(165, 'Pakistan'),
(166, 'Palau'),
(167, 'Palestinian Territories'),
(168, 'Panama'),
(169, 'Papua New Guinea'),
(170, 'Paraguay'),
(171, 'Peru'),
(172, 'Philippines'),
(173, 'Pitcairn'),
(174, 'Puerto Rico'),
(175, 'Qatar'),
(176, 'Reunion Island'),
(177, 'Russian Federation'),
(178, 'Rwanda'),
(179, 'Saint Barthelemy'),
(180, 'Saint Kitts and Nevis'),
(181, 'Saint Lucia'),
(182, 'Saint Martin'),
(183, 'Saint Pierre and Miquelon'),
(184, 'Saint Vincent and the Grenadines'),
(185, 'Samoa'),
(186, 'San Marino'),
(187, 'São Tomé and Príncipe'),
(188, 'Saudi Arabia'),
(189, 'Senegal'),
(190, 'Serbia'),
(191, 'Seychelles'),
(192, 'Sierra Leone'),
(193, 'Slovenia'),
(194, 'Solomon Islands'),
(195, 'Somalia'),
(196, 'South Georgia and the South Sandwich Islands'),
(197, 'Sri Lanka'),
(198, 'Sudan'),
(199, 'Suriname'),
(200, 'Svalbard and Jan Mayen'),
(201, 'Swaziland'),
(202, 'Syria'),
(203, 'Taiwan'),
(204, 'Tajikistan'),
(205, 'Tanzania'),
(206, 'Thailand'),
(207, 'Tokelau'),
(208, 'Tonga'),
(209, 'Trinidad and Tobago'),
(210, 'Tunisia'),
(211, 'Turkey'),
(212, 'Turkmenistan'),
(213, 'Turks and Caicos Islands'),
(214, 'Tuvalu'),
(215, 'Uganda'),
(216, 'Ukraine'),
(217, 'United Arab Emirates'),
(218, 'Uruguay'),
(219, 'Uzbekistan'),
(220, 'Vanuatu'),
(221, 'Venezuela'),
(222, 'Vietnam'),
(223, 'Virgin Islands (British)'),
(224, 'Virgin Islands (U.S.)'),
(225, 'Wallis and Futuna'),
(226, 'Western Sahara'),
(227, 'Yemen'),
(228, 'Zambia'),
(229, 'Zimbabwe'),
(230, 'Albania'),
(231, 'Afghanistan'),
(232, 'Antarctica'),
(233, 'Bosnia and Herzegovina'),
(234, 'Bouvet Island'),
(235, 'British Indian Ocean Territory'),
(236, 'Bulgaria'),
(237, 'Cayman Islands'),
(238, 'Christmas Island'),
(239, 'Cocos (Keeling) Islands'),
(240, 'Cook Islands'),
(241, 'French Guiana'),
(242, 'French Polynesia'),
(243, 'French Southern Territories'),
(244, 'Åland Islands');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `gender` enum('male','female') NOT NULL DEFAULT 'male',
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(128) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `birthday` date DEFAULT NULL,
  `newsletter` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `newsletter_date_add` datetime DEFAULT NULL,
  `phone` varchar(20) NOT NULL DEFAULT '0',
  `wallet` decimal(20,2) NOT NULL DEFAULT '0.00',
  `referral_id` int(11) NOT NULL,
  `referral_token` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `long_description` text NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `default_category_id` int(11) NOT NULL,
  `on_sale` tinyint(1) NOT NULL DEFAULT '1',
  `quantity` int(11) NOT NULL,
  `regular_price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL,
  `product_type` tinyint(1) NOT NULL COMMENT '0:Simple Product 1: Variable Product',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `product_image` varchar(255) NOT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `slug` text NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_attribute`
--

CREATE TABLE `product_attribute` (
  `product_attribute_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL DEFAULT '0',
  `seller_id` int(11) NOT NULL,
  `default_on` tinytext NOT NULL,
  `quantity` int(11) NOT NULL,
  `regular_price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL,
  `image` varchar(200) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_attribute_combination`
--

CREATE TABLE `product_attribute_combination` (
  `attribute_id` int(10) UNSIGNED NOT NULL,
  `product_attribute_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `position` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_tags`
--

CREATE TABLE `product_tags` (
  `product_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(100) NOT NULL,
  `role_description` varchar(255) NOT NULL DEFAULT '',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `role_description`, `created_on`, `updated_on`) VALUES
(1, 'admin', 'admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'seller', 'seller', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `seller_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state_id` int(11) NOT NULL,
  `zipcode` varchar(20) NOT NULL,
  `country_id` int(11) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '1',
  `last_login_on` datetime NOT NULL,
  `cov_picture` varchar(100) NOT NULL DEFAULT 'sitelogo.png',
  `phone_no` varchar(15) NOT NULL DEFAULT '',
  `address` varchar(255) NOT NULL DEFAULT '',
  `gender` tinyint(1) NOT NULL DEFAULT '0',
  `business_reg_no` varchar(50) NOT NULL DEFAULT '',
  `vat_file` varchar(100) NOT NULL,
  `vat_registered` tinyint(1) NOT NULL DEFAULT '0',
  `seller_vat` varchar(50) NOT NULL DEFAULT '',
  `company_name` varchar(100) NOT NULL DEFAULT '',
  `bank_name` varchar(100) NOT NULL DEFAULT '',
  `bank_code` varchar(50) NOT NULL DEFAULT '',
  `account_name` varchar(100) NOT NULL DEFAULT '',
  `iban` varchar(50) NOT NULL DEFAULT '',
  `bank_info` varchar(255) NOT NULL DEFAULT '',
  `account_no` varchar(50) NOT NULL DEFAULT '',
  `bvn_number` varchar(50) NOT NULL DEFAULT '',
  `shop_name` varchar(100) NOT NULL DEFAULT '',
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`seller_id`, `username`, `email`, `password`, `fname`, `lname`, `city`, `state_id`, `zipcode`, `country_id`, `is_active`, `last_login_on`, `cov_picture`, `phone_no`, `address`, `gender`, `business_reg_no`, `vat_file`, `vat_registered`, `seller_vat`, `company_name`, `bank_name`, `bank_code`, `account_name`, `iban`, `bank_info`, `account_no`, `bvn_number`, `shop_name`, `created_on`, `updated_on`) VALUES
(1, 'rahul', 'rahul@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Rahul', 'Sharma', 'Jalandhar', 12, '123456', 21, '0', '0000-00-00 00:00:00', '1614063061logo.png', '1234567980', 'test', 0, 'sdf', 'wer', 1, 'sfd', 'wer', 'wer', 'sdf', 'wer', 'wer', 'wer', 'wer', 'wer', 'test shop', '2021-02-23 07:56:50', '2021-02-23 07:56:50');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) UNSIGNED NOT NULL,
  `country_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(64) CHARACTER SET utf8 NOT NULL,
  `iso_code` varchar(7) CHARACTER SET utf8 NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `country_id`, `name`, `iso_code`, `active`) VALUES
(1, 21, 'Alabama', 'AL', 1),
(2, 21, 'Alaska', 'AK', 1),
(3, 21, 'Arizona', 'AZ', 1),
(4, 21, 'Arkansas', 'AR', 1),
(5, 21, 'California', 'CA', 1),
(6, 21, 'Colorado', 'CO', 1),
(7, 21, 'Connecticut', 'CT', 1),
(8, 21, 'Delaware', 'DE', 1),
(9, 21, 'Florida', 'FL', 1),
(10, 21, 'Georgia', 'GA', 1),
(11, 21, 'Hawaii', 'HI', 1),
(12, 21, 'Idaho', 'ID', 1),
(13, 21, 'Illinois', 'IL', 1),
(14, 21, 'Indiana', 'IN', 1),
(15, 21, 'Iowa', 'IA', 1),
(16, 21, 'Kansas', 'KS', 1),
(17, 21, 'Kentucky', 'KY', 1),
(18, 21, 'Louisiana', 'LA', 1),
(19, 21, 'Maine', 'ME', 1),
(20, 21, 'Maryland', 'MD', 1),
(21, 21, 'Massachusetts', 'MA', 1),
(22, 21, 'Michigan', 'MI', 1),
(23, 21, 'Minnesota', 'MN', 1),
(24, 21, 'Mississippi', 'MS', 1),
(25, 21, 'Missouri', 'MO', 1),
(26, 21, 'Montana', 'MT', 1),
(27, 21, 'Nebraska', 'NE', 1),
(28, 21, 'Nevada', 'NV', 1),
(29, 21, 'New Hampshire', 'NH', 1),
(30, 21, 'New Jersey', 'NJ', 1),
(31, 21, 'New Mexico', 'NM', 1),
(32, 21, 'New York', 'NY', 1),
(33, 21, 'North Carolina', 'NC', 1),
(34, 21, 'North Dakota', 'ND', 1),
(35, 21, 'Ohio', 'OH', 1),
(36, 21, 'Oklahoma', 'OK', 1),
(37, 21, 'Oregon', 'OR', 1),
(38, 21, 'Pennsylvania', 'PA', 1),
(39, 21, 'Rhode Island', 'RI', 1),
(40, 21, 'South Carolina', 'SC', 1),
(41, 21, 'South Dakota', 'SD', 1),
(42, 21, 'Tennessee', 'TN', 1),
(43, 21, 'Texas', 'TX', 1),
(44, 21, 'Utah', 'UT', 1),
(45, 21, 'Vermont', 'VT', 1),
(46, 21, 'Virginia', 'VA', 1),
(47, 21, 'Washington', 'WA', 1),
(48, 21, 'West Virginia', 'WV', 1),
(49, 21, 'Wisconsin', 'WI', 1),
(50, 21, 'Wyoming', 'WY', 1),
(51, 21, 'Puerto Rico', 'PR', 1),
(52, 21, 'US Virgin Islands', 'VI', 1),
(53, 21, 'District of Columbia', 'DC', 1),
(54, 145, 'Aguascalientes', 'AGS', 1),
(55, 145, 'Baja California', 'BCN', 1),
(56, 145, 'Baja California Sur', 'BCS', 1),
(57, 145, 'Campeche', 'CAM', 1),
(58, 145, 'Chiapas', 'CHP', 1),
(59, 145, 'Chihuahua', 'CHH', 1),
(60, 145, 'Coahuila', 'COA', 1),
(61, 145, 'Colima', 'COL', 1),
(62, 145, 'Distrito Federal', 'DIF', 1),
(63, 145, 'Durango', 'DUR', 1),
(64, 145, 'Guanajuato', 'GUA', 1),
(65, 145, 'Guerrero', 'GRO', 1),
(66, 145, 'Hidalgo', 'HID', 1),
(67, 145, 'Jalisco', 'JAL', 1),
(68, 145, 'Estado de México', 'MEX', 1),
(69, 145, 'Michoacán', 'MIC', 1),
(70, 145, 'Morelos', 'MOR', 1),
(71, 145, 'Nayarit', 'NAY', 1),
(72, 145, 'Nuevo León', 'NLE', 1),
(73, 145, 'Oaxaca', 'OAX', 1),
(74, 145, 'Puebla', 'PUE', 1),
(75, 145, 'Querétaro', 'QUE', 1),
(76, 145, 'Quintana Roo', 'ROO', 1),
(77, 145, 'San Luis Potosí', 'SLP', 1),
(78, 145, 'Sinaloa', 'SIN', 1),
(79, 145, 'Sonora', 'SON', 1),
(80, 145, 'Tabasco', 'TAB', 1),
(81, 145, 'Tamaulipas', 'TAM', 1),
(82, 145, 'Tlaxcala', 'TLA', 1),
(83, 145, 'Veracruz', 'VER', 1),
(84, 145, 'Yucatán', 'YUC', 1),
(85, 145, 'Zacatecas', 'ZAC', 1),
(86, 4, 'Ontario', 'ON', 1),
(87, 4, 'Quebec', 'QC', 1),
(88, 4, 'British Columbia', 'BC', 1),
(89, 4, 'Alberta', 'AB', 1),
(90, 4, 'Manitoba', 'MB', 1),
(91, 4, 'Saskatchewan', 'SK', 1),
(92, 4, 'Nova Scotia', 'NS', 1),
(93, 4, 'New Brunswick', 'NB', 1),
(94, 4, 'Newfoundland and Labrador', 'NL', 1),
(95, 4, 'Prince Edward Island', 'PE', 1),
(96, 4, 'Northwest Territories', 'NT', 1),
(97, 4, 'Yukon', 'YT', 1),
(98, 4, 'Nunavut', 'NU', 1),
(99, 44, 'Buenos Aires', 'B', 1),
(100, 44, 'Catamarca', 'K', 1),
(101, 44, 'Chaco', 'H', 1),
(102, 44, 'Chubut', 'U', 1),
(103, 44, 'Ciudad de Buenos Aires', 'C', 1),
(104, 44, 'Córdoba', 'X', 1),
(105, 44, 'Corrientes', 'W', 1),
(106, 44, 'Entre Ríos', 'E', 1),
(107, 44, 'Formosa', 'P', 1),
(108, 44, 'Jujuy', 'Y', 1),
(109, 44, 'La Pampa', 'L', 1),
(110, 44, 'La Rioja', 'F', 1),
(111, 44, 'Mendoza', 'M', 1),
(112, 44, 'Misiones', 'N', 1),
(113, 44, 'Neuquén', 'Q', 1),
(114, 44, 'Río Negro', 'R', 1),
(115, 44, 'Salta', 'A', 1),
(116, 44, 'San Juan', 'J', 1),
(117, 44, 'San Luis', 'D', 1),
(118, 44, 'Santa Cruz', 'Z', 1),
(119, 44, 'Santa Fe', 'S', 1),
(120, 44, 'Santiago del Estero', 'G', 1),
(121, 44, 'Tierra del Fuego', 'V', 1),
(122, 44, 'Tucumán', 'T', 1),
(123, 10, 'Agrigento', 'AG', 1),
(124, 10, 'Alessandria', 'AL', 1),
(125, 10, 'Ancona', 'AN', 1),
(126, 10, 'Aosta', 'AO', 1),
(127, 10, 'Arezzo', 'AR', 1),
(128, 10, 'Ascoli Piceno', 'AP', 1),
(129, 10, 'Asti', 'AT', 1),
(130, 10, 'Avellino', 'AV', 1),
(131, 10, 'Bari', 'BA', 1),
(132, 10, 'Barletta-Andria-Trani', 'BT', 1),
(133, 10, 'Belluno', 'BL', 1),
(134, 10, 'Benevento', 'BN', 1),
(135, 10, 'Bergamo', 'BG', 1),
(136, 10, 'Biella', 'BI', 1),
(137, 10, 'Bologna', 'BO', 1),
(138, 10, 'Bolzano', 'BZ', 1),
(139, 10, 'Brescia', 'BS', 1),
(140, 10, 'Brindisi', 'BR', 1),
(141, 10, 'Cagliari', 'CA', 1),
(142, 10, 'Caltanissetta', 'CL', 1),
(143, 10, 'Campobasso', 'CB', 1),
(144, 10, 'Carbonia-Iglesias', 'CI', 1),
(145, 10, 'Caserta', 'CE', 1),
(146, 10, 'Catania', 'CT', 1),
(147, 10, 'Catanzaro', 'CZ', 1),
(148, 10, 'Chieti', 'CH', 1),
(149, 10, 'Como', 'CO', 1),
(150, 10, 'Cosenza', 'CS', 1),
(151, 10, 'Cremona', 'CR', 1),
(152, 10, 'Crotone', 'KR', 1),
(153, 10, 'Cuneo', 'CN', 1),
(154, 10, 'Enna', 'EN', 1),
(155, 10, 'Fermo', 'FM', 1),
(156, 10, 'Ferrara', 'FE', 1),
(157, 10, 'Firenze', 'FI', 1),
(158, 10, 'Foggia', 'FG', 1),
(159, 10, 'Forlì-Cesena', 'FC', 1),
(160, 10, 'Frosinone', 'FR', 1),
(161, 10, 'Genova', 'GE', 1),
(162, 10, 'Gorizia', 'GO', 1),
(163, 10, 'Grosseto', 'GR', 1),
(164, 10, 'Imperia', 'IM', 1),
(165, 10, 'Isernia', 'IS', 1),
(166, 10, 'L\'Aquila', 'AQ', 1),
(167, 10, 'La Spezia', 'SP', 1),
(168, 10, 'Latina', 'LT', 1),
(169, 10, 'Lecce', 'LE', 1),
(170, 10, 'Lecco', 'LC', 1),
(171, 10, 'Livorno', 'LI', 1),
(172, 10, 'Lodi', 'LO', 1),
(173, 10, 'Lucca', 'LU', 1),
(174, 10, 'Macerata', 'MC', 1),
(175, 10, 'Mantova', 'MN', 1),
(176, 10, 'Massa', 'MS', 1),
(177, 10, 'Matera', 'MT', 1),
(178, 10, 'Medio Campidano', 'VS', 1),
(179, 10, 'Messina', 'ME', 1),
(180, 10, 'Milano', 'MI', 1),
(181, 10, 'Modena', 'MO', 1),
(182, 10, 'Monza e della Brianza', 'MB', 1),
(183, 10, 'Napoli', 'NA', 1),
(184, 10, 'Novara', 'NO', 1),
(185, 10, 'Nuoro', 'NU', 1),
(186, 10, 'Ogliastra', 'OG', 1),
(187, 10, 'Olbia-Tempio', 'OT', 1),
(188, 10, 'Oristano', 'OR', 1),
(189, 10, 'Padova', 'PD', 1),
(190, 10, 'Palermo', 'PA', 1),
(191, 10, 'Parma', 'PR', 1),
(192, 10, 'Pavia', 'PV', 1),
(193, 10, 'Perugia', 'PG', 1),
(194, 10, 'Pesaro-Urbino', 'PU', 1),
(195, 10, 'Pescara', 'PE', 1),
(196, 10, 'Piacenza', 'PC', 1),
(197, 10, 'Pisa', 'PI', 1),
(198, 10, 'Pistoia', 'PT', 1),
(199, 10, 'Pordenone', 'PN', 1),
(200, 10, 'Potenza', 'PZ', 1),
(201, 10, 'Prato', 'PO', 1),
(202, 10, 'Ragusa', 'RG', 1),
(203, 10, 'Ravenna', 'RA', 1),
(204, 10, 'Reggio Calabria', 'RC', 1),
(205, 10, 'Reggio Emilia', 'RE', 1),
(206, 10, 'Rieti', 'RI', 1),
(207, 10, 'Rimini', 'RN', 1),
(208, 10, 'Roma', 'RM', 1),
(209, 10, 'Rovigo', 'RO', 1),
(210, 10, 'Salerno', 'SA', 1),
(211, 10, 'Sassari', 'SS', 1),
(212, 10, 'Savona', 'SV', 1),
(213, 10, 'Siena', 'SI', 1),
(214, 10, 'Siracusa', 'SR', 1),
(215, 10, 'Sondrio', 'SO', 1),
(216, 10, 'Taranto', 'TA', 1),
(217, 10, 'Teramo', 'TE', 1),
(218, 10, 'Terni', 'TR', 1),
(219, 10, 'Torino', 'TO', 1),
(220, 10, 'Trapani', 'TP', 1),
(221, 10, 'Trento', 'TN', 1),
(222, 10, 'Treviso', 'TV', 1),
(223, 10, 'Trieste', 'TS', 1),
(224, 10, 'Udine', 'UD', 1),
(225, 10, 'Varese', 'VA', 1),
(226, 10, 'Venezia', 'VE', 1),
(227, 10, 'Verbano-Cusio-Ossola', 'VB', 1),
(228, 10, 'Vercelli', 'VC', 1),
(229, 10, 'Verona', 'VR', 1),
(230, 10, 'Vibo Valentia', 'VV', 1),
(231, 10, 'Vicenza', 'VI', 1),
(232, 10, 'Viterbo', 'VT', 1),
(233, 111, 'Aceh', 'AC', 1),
(234, 111, 'Bali', 'BA', 1),
(235, 111, 'Bangka', 'BB', 1),
(236, 111, 'Banten', 'BT', 1),
(237, 111, 'Bengkulu', 'BE', 1),
(238, 111, 'Central Java', 'JT', 1),
(239, 111, 'Central Kalimantan', 'KT', 1),
(240, 111, 'Central Sulawesi', 'ST', 1),
(241, 111, 'Coat of arms of East Java', 'JI', 1),
(242, 111, 'East kalimantan', 'KI', 1),
(243, 111, 'East Nusa Tenggara', 'NT', 1),
(244, 111, 'Lambang propinsi', 'GO', 1),
(245, 111, 'Jakarta', 'JK', 1),
(246, 111, 'Jambi', 'JA', 1),
(247, 111, 'Lampung', 'LA', 1),
(248, 111, 'Maluku', 'MA', 1),
(249, 111, 'North Maluku', 'MU', 1),
(250, 111, 'North Sulawesi', 'SA', 1),
(251, 111, 'North Sumatra', 'SU', 1),
(252, 111, 'Papua', 'PA', 1),
(253, 111, 'Riau', 'RI', 1),
(254, 111, 'Lambang Riau', 'KR', 1),
(255, 111, 'Southeast Sulawesi', 'SG', 1),
(256, 111, 'South Kalimantan', 'KS', 1),
(257, 111, 'South Sulawesi', 'SN', 1),
(258, 111, 'South Sumatra', 'SS', 1),
(259, 111, 'West Java', 'JB', 1),
(260, 111, 'West Kalimantan', 'KB', 1),
(261, 111, 'West Nusa Tenggara', 'NB', 1),
(262, 111, 'Lambang Provinsi Papua Barat', 'PB', 1),
(263, 111, 'West Sulawesi', 'SR', 1),
(264, 111, 'West Sumatra', 'SB', 1),
(265, 111, 'Yogyakarta', 'YO', 1),
(266, 11, 'Aichi', '23', 1),
(267, 11, 'Akita', '05', 1),
(268, 11, 'Aomori', '02', 1),
(269, 11, 'Chiba', '12', 1),
(270, 11, 'Ehime', '38', 1),
(271, 11, 'Fukui', '18', 1),
(272, 11, 'Fukuoka', '40', 1),
(273, 11, 'Fukushima', '07', 1),
(274, 11, 'Gifu', '21', 1),
(275, 11, 'Gunma', '10', 1),
(276, 11, 'Hiroshima', '34', 1),
(277, 11, 'Hokkaido', '01', 1),
(278, 11, 'Hyogo', '28', 1),
(279, 11, 'Ibaraki', '08', 1),
(280, 11, 'Ishikawa', '17', 1),
(281, 11, 'Iwate', '03', 1),
(282, 11, 'Kagawa', '37', 1),
(283, 11, 'Kagoshima', '46', 1),
(284, 11, 'Kanagawa', '14', 1),
(285, 11, 'Kochi', '39', 1),
(286, 11, 'Kumamoto', '43', 1),
(287, 11, 'Kyoto', '26', 1),
(288, 11, 'Mie', '24', 1),
(289, 11, 'Miyagi', '04', 1),
(290, 11, 'Miyazaki', '45', 1),
(291, 11, 'Nagano', '20', 1),
(292, 11, 'Nagasaki', '42', 1),
(293, 11, 'Nara', '29', 1),
(294, 11, 'Niigata', '15', 1),
(295, 11, 'Oita', '44', 1),
(296, 11, 'Okayama', '33', 1),
(297, 11, 'Okinawa', '47', 1),
(298, 11, 'Osaka', '27', 1),
(299, 11, 'Saga', '41', 1),
(300, 11, 'Saitama', '11', 1),
(301, 11, 'Shiga', '25', 1),
(302, 11, 'Shimane', '32', 1),
(303, 11, 'Shizuoka', '22', 1),
(304, 11, 'Tochigi', '09', 1),
(305, 11, 'Tokushima', '36', 1),
(306, 11, 'Tokyo', '13', 1),
(307, 11, 'Tottori', '31', 1),
(308, 11, 'Toyama', '16', 1),
(309, 11, 'Wakayama', '30', 1),
(310, 11, 'Yamagata', '06', 1),
(311, 11, 'Yamaguchi', '35', 1),
(312, 11, 'Yamanashi', '19', 1),
(313, 110, 'Andhra Pradesh', 'AP', 1),
(314, 110, 'Arunāchal Pradesh', 'AR', 1),
(315, 110, 'Assam', 'AS', 1),
(316, 110, 'Bihār', 'BR', 1),
(317, 110, 'Chhattīsgarh', 'CT', 1),
(318, 110, 'Goa', 'GA', 1),
(319, 110, 'Gujarāt', 'GJ', 1),
(320, 110, 'Haryāna', 'HR', 1),
(321, 110, 'Himāchal Pradesh', 'HP', 1),
(322, 110, 'Jammu and Kashmīr', 'JK', 1),
(323, 110, 'Jharkhand', 'JH', 1),
(324, 110, 'Karnātaka', 'KA', 1),
(325, 110, 'Kerala', 'KL', 1),
(326, 110, 'Madhya Pradesh', 'MP', 1),
(327, 110, 'Mahārāshtra', 'MH', 1),
(328, 110, 'Manipur', 'MN', 1),
(329, 110, 'Meghālaya', 'ML', 1),
(330, 110, 'Mizoram', 'MZ', 1),
(331, 110, 'Nāgāland', 'NL', 1),
(332, 110, 'Orissa', 'OR', 1),
(333, 110, 'Punjab', 'PB', 1),
(334, 110, 'Rājasthān', 'RJ', 1),
(335, 110, 'Sikkim', 'SK', 1),
(336, 110, 'Tamil Nādu', 'TN', 1),
(337, 110, 'Tripura', 'TR', 1),
(338, 110, 'Uttaranchal', 'UL', 1),
(339, 110, 'Uttar Pradesh', 'UP', 1),
(340, 110, 'West Bengal', 'WB', 1),
(341, 110, 'Andaman and Nicobar Islands', 'AN', 1),
(342, 110, 'Chandīgarh', 'CH', 1),
(343, 110, 'Dādra and Nagar Haveli', 'DN', 1),
(344, 110, 'Damān and Diu', 'DD', 1),
(345, 110, 'Delhi', 'DL', 1),
(346, 110, 'Lakshadweep', 'LD', 1),
(347, 110, 'Pondicherry', 'PY', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`tag_id`, `tag_name`) VALUES
(1, 'Shoes'),
(2, 'T-Shirt'),
(3, 'Shirt');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(100) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0:inactive 1:active',
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `fname`, `lname`, `password`, `is_active`, `created_on`, `updated_on`) VALUES
(1, 'admin_user', 'admin@gmail.com', 'admin', 'user', 'e10adc3949ba59abbe56e057f20f883e', 1, '2021-02-19 16:50:34', '2021-02-19 16:50:34');

-- --------------------------------------------------------

--
-- Table structure for table `user_to_role`
--

CREATE TABLE `user_to_role` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_to_role`
--

INSERT INTO `user_to_role` (`user_id`, `role_id`) VALUES
(1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`attribute_id`);

--
-- Indexes for table `attribute_value`
--
ALTER TABLE `attribute_value`
  ADD PRIMARY KEY (`attribute_value_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `customer_email` (`email`),
  ADD KEY `customer_login` (`email`,`password`),
  ADD KEY `id_customer_passwd` (`customer_id`,`password`),
  ADD KEY `id_gender` (`gender`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_attribute`
--
ALTER TABLE `product_attribute`
  ADD PRIMARY KEY (`product_attribute_id`);

--
-- Indexes for table `product_attribute_combination`
--
ALTER TABLE `product_attribute_combination`
  ADD PRIMARY KEY (`attribute_id`,`product_attribute_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`category_id`,`product_id`);

--
-- Indexes for table `product_tags`
--
ALTER TABLE `product_tags`
  ADD PRIMARY KEY (`product_id`,`tag_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`seller_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_to_role`
--
ALTER TABLE `user_to_role`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `attribute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attribute_value`
--
ALTER TABLE `attribute_value`
  MODIFY `attribute_value_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_attribute`
--
ALTER TABLE `product_attribute`
  MODIFY `product_attribute_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=348;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
