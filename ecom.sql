-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 08, 2021 at 09:15 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--
CREATE DATABASE IF NOT EXISTS `ecom` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ecom`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `admin_id` int(2) NOT NULL AUTO_INCREMENT,
  `admin_name` tinytext DEFAULT NULL,
  `admin_email` tinytext DEFAULT NULL,
  `admin_password` tinytext DEFAULT NULL,
  `admin_image` tinytext DEFAULT NULL,
  `admin_phone` int(11) DEFAULT NULL,
  `admin_job` tinytext DEFAULT NULL,
  `admin_about` text DEFAULT NULL,
  `admin_address` tinytext DEFAULT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `admin_email` (`admin_email`) USING HASH
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_image`, `admin_phone`, `admin_job`, `admin_about`, `admin_address`) VALUES
(1, 'Ismail hosen Raj', 'ismail@gmail.com', '12345', 'khihh.jpg', 1770964628, 'CEO', 'Nothing to say anything because every thing is fair in love', 'Rajshahi'),
(2, 'Hosen', 'hosen@gmail.com', '12345', 'my.jpg', 1841602207, 'Administrator', 'I am all in one', 'Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `p_id` int(5) DEFAULT NULL,
  `ip_address` tinytext DEFAULT NULL,
  `product_quantity` int(2) DEFAULT NULL,
  `product_color` tinytext DEFAULT NULL,
  KEY `p_id` (`p_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_address`, `product_quantity`, `product_color`) VALUES
(12, '127.0.0.1', 1, 'Cosmic Grey'),
(20, '127.0.0.1', 2, 'Frozen Blue'),
(22, '127.0.0.1', 1, 'Sweater Blue');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(5) NOT NULL AUTO_INCREMENT,
  `cat_title` tinytext DEFAULT NULL,
  `cat_description` tinytext DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_description`) VALUES
(1, 'SMART PHONE', 'Smartphone, also spelled smart phone, mobile telephone with a display screen (typically a liquid crystal display, or LCD), built-in personal information management programs (such as an electronic calendar and address book) .'),
(2, 'FEATURES PHONE', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel inventore, itaque, facere nobis veritatis officiis quae quos odio quam qui temporibus adipisci et doloremque dolor sunt ea omnis? Cumque, perferendis?\r\n'),
(3, 'PHONE ACCESSORIES', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel inventore, itaque, facere nobis veritatis officiis quae quos odio quam qui temporibus adipisci et doloremque dolor sunt ea omnis? Cumque, perferendis?\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(5) NOT NULL AUTO_INCREMENT,
  `customer_name` tinytext DEFAULT NULL,
  `customer_email` varchar(50) DEFAULT NULL,
  `customer_phone` int(11) DEFAULT NULL,
  `customer_username` varchar(50) DEFAULT NULL,
  `customer_password` varchar(50) DEFAULT NULL,
  `customer_division` varchar(30) DEFAULT NULL,
  `customer_district` varchar(40) DEFAULT NULL,
  `customer_thana` varchar(30) DEFAULT NULL,
  `customer_address` varchar(500) DEFAULT NULL,
  `customer_image` tinytext DEFAULT NULL,
  `customer_ip_address` tinytext DEFAULT NULL,
  `customer_shipping_address` text DEFAULT NULL,
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `customer_email` (`customer_email`,`customer_phone`,`customer_username`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_email`, `customer_phone`, `customer_username`, `customer_password`, `customer_division`, `customer_district`, `customer_thana`, `customer_address`, `customer_image`, `customer_ip_address`, `customer_shipping_address`) VALUES
(3, 'Md Ismail Hosen Siraji', 'ismail601@gmail.com', 1770964628, 'lose61', 'ismail', 'Rajshahi', 'Chapai NawabGonj', 'Shibgonj', 'Shobgonj Bazar,Shibgonj,Chapai NawabGonj', 'khihh.jpg', '127.0.0.1', NULL),
(7, 'Ismail Hosen Raj', 'lab@gmail.com', 1315898789, 'labu', 'ismail61', 'Rajshahi', 'Rajshahi', 'Rajshahi', 'Rajshahi,Shibgonj Bazar,Shibgonj,\r\nChapai NawabGonj,Rajshahi', 'large.png', '127.0.0.1', 'JalmachMary ,Shibgonj Bazar,Shibgonj,\r\nChapai NawabGonj,Rajshahi'),
(8, 'Ismail hosen Dipannita', 'l@gmail.com', 1744753977, 'dipannita61', 'dipannita', 'Rajshahi', 'Rajshahi', 'Rajshahi', 'Shobgonj Bazar,Shibgonj, Chapai NawabGonj Rajshahi', 'large - Copy.png', '127.0.0.1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

DROP TABLE IF EXISTS `customer_order`;
CREATE TABLE IF NOT EXISTS `customer_order` (
  `order_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(5) DEFAULT NULL,
  `due_amount` int(10) DEFAULT NULL,
  `invoice_number` int(10) DEFAULT NULL,
  `product_quantity` int(3) DEFAULT NULL,
  `product_color` tinytext DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` tinytext DEFAULT NULL,
  `p_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `customer_id` (`customer_id`),
  KEY `p_id` (`p_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`order_id`, `customer_id`, `due_amount`, `invoice_number`, `product_quantity`, `product_color`, `order_date`, `order_status`, `p_id`) VALUES
(15, 7, 139999, 893271949, 1, 'Space Gray', '2020-07-07 06:45:50', 'pending', 7);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(10) NOT NULL AUTO_INCREMENT,
  `invoice_number` int(10) DEFAULT NULL,
  `amount` int(8) DEFAULT NULL,
  `payment_mode` tinytext DEFAULT NULL,
  `transaction_id` int(20) DEFAULT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `customer_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `invoice_number` (`invoice_number`),
  KEY `customer_id` (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `invoice_number`, `amount`, `payment_mode`, `transaction_id`, `payment_date`, `customer_id`) VALUES
(1, 2064711450, 10990, 'Bkash', 12345678, '2020-07-13 18:00:00', 5),
(2, 1113732788, 10990, 'Bkash', 12222, '2020-06-24 18:00:00', 4),
(3, 971744779, 10990, 'Nogod', 12345678, '2020-06-25 18:00:00', 4),
(4, 146039366, 26990, 'Rocket', 12345678, '2020-06-25 18:00:00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pending_order`
--

DROP TABLE IF EXISTS `pending_order`;
CREATE TABLE IF NOT EXISTS `pending_order` (
  `pending_sl` int(5) NOT NULL AUTO_INCREMENT,
  `customer_id` int(5) DEFAULT NULL,
  `invoice_number` int(10) DEFAULT NULL,
  `p_id` int(5) DEFAULT NULL,
  `product_quantity` int(3) DEFAULT NULL,
  `product_color` tinytext DEFAULT NULL,
  `order_status` tinytext DEFAULT NULL,
  PRIMARY KEY (`pending_sl`),
  KEY `customer_id` (`customer_id`),
  KEY `p_id` (`p_id`),
  KEY `invoice_number` (`invoice_number`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_order`
--

INSERT INTO `pending_order` (`pending_sl`, `customer_id`, `invoice_number`, `p_id`, `product_quantity`, `product_color`, `order_status`) VALUES
(6, 4, 971744779, 20, 1, 'Frozen Blue', 'pending'),
(4, 3, 1978862981, 20, 1, 'Blazing Red', 'pending'),
(8, 4, 690784992, 19, 1, 'Green', 'pending'),
(9, 5, 1561931393, 20, 1, 'Frozen Blue', 'pending'),
(10, 7, 1267546629, 22, 1, 'Sweater Blue', 'pending'),
(11, 7, 742107085, 12, 2, ' Cloud Blue', 'pending'),
(12, 7, 893271949, 7, 1, 'Space Gray', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `phone_description`
--

DROP TABLE IF EXISTS `phone_description`;
CREATE TABLE IF NOT EXISTS `phone_description` (
  `description_id` int(5) NOT NULL AUTO_INCREMENT,
  `ph_l_announced` tinytext DEFAULT NULL,
  `ph_l_status` tinytext DEFAULT NULL,
  `ph_n_technology` tinytext DEFAULT NULL,
  `ph_n_2g_bands` tinytext DEFAULT NULL,
  `ph_n_3g_bands` tinytext DEFAULT NULL,
  `ph_n_4g_bands` text DEFAULT NULL,
  `ph_n_5g_bands` tinytext DEFAULT NULL,
  `ph_n_speed` tinytext DEFAULT NULL,
  `ph_n_gprs` int(1) DEFAULT NULL,
  `ph_n_edge` int(1) DEFAULT NULL,
  `ph_b_dimensions` tinytext DEFAULT NULL,
  `ph_b_weight` tinytext DEFAULT NULL,
  `ph_b_build` tinytext DEFAULT NULL,
  `ph_b_sim` tinytext DEFAULT NULL,
  `ph_d_type` tinytext DEFAULT NULL,
  `ph_d_size` tinytext DEFAULT NULL,
  `ph_d_resolution` tinytext DEFAULT NULL,
  `ph_d_multitouch` int(1) DEFAULT NULL,
  `ph_d_protection` tinytext DEFAULT NULL,
  `ph_p_os` tinytext DEFAULT NULL,
  `ph_p_chipset` tinytext DEFAULT NULL,
  `ph_p_cpu` tinytext DEFAULT NULL,
  `ph_p_gpu` tinytext DEFAULT NULL,
  `ph_m_card_slot` tinytext DEFAULT NULL,
  `ph_m_internal` tinytext DEFAULT NULL,
  `ph_m_ram` tinytext DEFAULT NULL,
  `ph_c_primary_cam` text DEFAULT NULL,
  `ph_c_secondary_cam` tinytext DEFAULT NULL,
  `ph_c_features` tinytext DEFAULT NULL,
  `ph_c_video` tinytext DEFAULT NULL,
  `ph_s_alert_types` tinytext DEFAULT NULL,
  `ph_s_loudspeaker` tinytext DEFAULT NULL,
  `ph_s_35mm_jak` int(1) DEFAULT NULL,
  `ph_c_wlan` tinytext DEFAULT NULL,
  `ph_c_bluetooth` tinytext DEFAULT NULL,
  `ph_c_gps` tinytext DEFAULT NULL,
  `ph_c_nfc` int(1) DEFAULT NULL,
  `ph_c_fm_radio` int(1) DEFAULT NULL,
  `ph_c_usb` tinytext DEFAULT NULL,
  `ph_c_infrared_port` int(1) DEFAULT NULL,
  `ph_f_sensors` tinytext DEFAULT NULL,
  `ph_f_messaging` tinytext DEFAULT NULL,
  `ph_f_browser` tinytext DEFAULT NULL,
  `ph_f_java` int(1) DEFAULT NULL,
  `ph_b_type` tinytext DEFAULT NULL,
  `ph_b_capacity` tinytext DEFAULT NULL,
  `ph_m_made_by` tinytext DEFAULT NULL,
  `ph_m_color` tinytext DEFAULT NULL,
  `ph_m_others_features` tinytext DEFAULT NULL,
  `p_title` tinytext DEFAULT NULL,
  PRIMARY KEY (`description_id`),
  KEY `p_title` (`p_title`(255))
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phone_description`
--

INSERT INTO `phone_description` (`description_id`, `ph_l_announced`, `ph_l_status`, `ph_n_technology`, `ph_n_2g_bands`, `ph_n_3g_bands`, `ph_n_4g_bands`, `ph_n_5g_bands`, `ph_n_speed`, `ph_n_gprs`, `ph_n_edge`, `ph_b_dimensions`, `ph_b_weight`, `ph_b_build`, `ph_b_sim`, `ph_d_type`, `ph_d_size`, `ph_d_resolution`, `ph_d_multitouch`, `ph_d_protection`, `ph_p_os`, `ph_p_chipset`, `ph_p_cpu`, `ph_p_gpu`, `ph_m_card_slot`, `ph_m_internal`, `ph_m_ram`, `ph_c_primary_cam`, `ph_c_secondary_cam`, `ph_c_features`, `ph_c_video`, `ph_s_alert_types`, `ph_s_loudspeaker`, `ph_s_35mm_jak`, `ph_c_wlan`, `ph_c_bluetooth`, `ph_c_gps`, `ph_c_nfc`, `ph_c_fm_radio`, `ph_c_usb`, `ph_c_infrared_port`, `ph_f_sensors`, `ph_f_messaging`, `ph_f_browser`, `ph_f_java`, `ph_b_type`, `ph_b_capacity`, `ph_m_made_by`, `ph_m_color`, `ph_m_others_features`, `p_title`) VALUES
(1, '2019, September', 'Available. Released 2019, September', 'GSM / CDMA / HSPA / EVDO / LTE', 'GSM 850 / 900 / 1800 / 1900 - SIM 1 & SIM 2 (dual-SIM) - for China<br>\r\nCDMA 800 / 1900', 'HSDPA 850 / 900 / 1700(AWS) / 1900 / 2100<br>\r\nCDMA2000 1xEV-DO', 'LTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 11(1500), 12(700), 13(700), 17(700), 18(800), 19(800), 20(800), 21(1500), 25(1900), 26(850), 28(700), 29(700), 30(2300), 32(1500), 34(2000), 38(2600), 39(1900), 40(2300), 41(2500), 42(3500), 46, 48, 66(1700/2100) - A2218<br>LTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 12(700), 13(700), 14(700), 17(700), 18(800), 19(800), 20(800), 25(1900), 26(850), 29(700), 30(2300), 34(2000), 38(2600), 39(1900), 40(2300), 41(2500), 42(3500), 46, 48, 66(1700/2100), 71(600) - A2161<br>LTE band 1(2100), 2(1900), 3(1800), 4(1700/2100), 5(850), 7(2600), 8(900), 12(700), 13(700), 14(700), 17(700), 18(800), 19(800), 20(800), 25(1900), 26(850), 29(700), 30(2300), 34(2000), 38(2600), 39(1900), 40(2300), 41(2500), 42(3500), 46, 48, 66(1700/2100), 71(600) - A2220', NULL, 'HSPA 42.2/5.76 Mbps, LTE-A 1.6 Gbps DL, EV-DO Rev.A 3.1 Mbps', 1, 1, '158 x 77.8 x 8.1 mm (6.22 x 3.06 x 0.32 in)', '226 g (7.97 oz)', 'Front/back glass, stainless steel frame', 'Single SIM (Nano-SIM and/or Electronic SIM card) or Dual SIM (Nano-SIM, dual stand-by) - for China\r\nIP68 dust/water resistant (up to 4m for 30 mins)', 'Super Retina XDR OLED capacitive touchscreen, 16M colors', '6.5 inches, 102.9 cm2 (~83.7% screen-to-body ratio)', '1242 x 2688 pixels, 19.5:9 ratio (~458 ppi density)', 1, 'Scratch-resistant glass, oleophobic coating<br>\r\n800 nits<br>\r\nDolby Vision<br>\r\nHDR10<br>\r\nWide color gamut<br>\r\nTrue-tone<br>\r\n120 Hz touch-sensing', 'iOS 13', 'Apple A13 Bionic (7 nm+)', 'Hexa-core (2x2.65 GHz Lightning + 4x1.8 GHz Thunder)', 'Apple GPU (4-core graphics)', 'No', '512/256/64 GB', '6 GB', '12 MP, f/1.8, 26mm (wide), 1/2.55\", 1.4µm, PDAF, OIS<br>\r\n12 MP, f/2.0, 52mm (telephoto), 1/3.4\", 1.0µm, PDAF, OIS, 2x optical zoom<br>\r\n12 MP, f/2.4, 13mm (ultrawide)', '12 MP, f/2.2<br>\r\nTOF 3D camera', 'Quad-LED dual-tone flash, HDR (photo/panorama)<br>\r\nHDR', '2160p@24/30/60fps, 1080p@30/60/120/240fps, HDR, stereo sound rec.<br>\r\n2160p@24/30/60fps, 1080p@30/60/120fps, gyro-EIS', 'Vibration, MP3, WAV ringtones', 'Yes', 2, 'Wi-Fi 802.11 a/b/g/n/ac/ax, dual-band, hotspot', '5.0, A2DP, LE', 'Yes, with A-GPS, GLONASS, GALILEO, QZSS', 1, 2, '2.0, proprietary reversible connector', 2, 'Face ID, accelerometer, gyro, proximity, compass, barometer<br>\r\nSiri natural language commands and dictation', 'iMessage, Email, Push Email, IM', 'HTML5', 2, 'Non-removable Li-Ion', '3969 mAH', 'US', 'Space Gray, Silver, Gold', 'Fast battery charging 18W: 50% in 30 min<br>\r\nUSB Power Delivery 2.0<br>\r\nQi wireless charging', 'Apple'),
(2, '2019, June', 'Available. Released 2019, June', 'GSM / HSPA / LTE', 'GSM 850 / 900 / 1800 / 1900 - SIM 1 & SIM 2', 'HSDPA 850 / 900 / 1900 / 2100', 'HSPA 42.2/5.76 Mbps, LTE-A (2CA) Cat6 400/50 Mbps', NULL, 'LTE band 1(2100), 3(1800), 5(850), 7(2600), 8(900), 34(2000), 38(2600), 39(1900), 40(2300), 41(2500)', 1, 1, '155.3 x 73.9 x 7.9 mm (6.11 x 2.91 x 0.31 in)', '168 g (5.93 oz)', 'Front glass, plastic body', 'Hybrid Dual SIM (Nano-SIM, dual stand-by)', 'PLS TFT capacitive touchscreen, 16M colors', '6.3 inches, 97.4 cm2 (~84.9% screen-to-body ratio)', '1080 x 2340 pixels, 19.5:9 ratio (~409 ppi density)', 1, 'Corning Gorilla Glass (unspecified)', 'Android 9.0 (Pie); One UI', 'Qualcomm SDM675 Snapdragon 675 (11 nm)\r\n', 'Octa-core (2x2.0 GHz Kryo 460 Gold & 6x1.7 GHz Kryo 460 Silver)\r\n', 'Adreno 612\r\n', 'microSD, up to 1 TB (dedicated slot)', '64/128 GB', '4/6 GB', '32 MP, f/1.7, 0.8µm, PDAF<br>\r\n8 MP, f/2.2, 12mm (ultrawide), 1.12µm, PDAF<br>\r\n5 MP, f/2.2, depth senso', '16 MP, f/2.0', 'LED flash, panorama, HDR<br>\r\nHDR', '2160p@30fps, 1080p@30fps<br>\r\n1080p@30fps', 'Vibration, MP3, WAV ringtones', 'Yes', 2, 'Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot', '5.0, A2DP, LE', 'Yes, with A-GPS, GLONASS, BDS', 1, 1, '2.0, Type-C 1.0 reversible connector', 2, 'Fingerprint (rear-mounted), accelerometer, gyro, proximity, compass', 'SMS(threaded view), MMS, Email, Push Email, IM', 'HTML5', 2, 'Non-removable Li-Po', '3500 mAh battery', 'Koria', 'Sweater Blue, Midnight Blue', 'Fast battery charging 15W', 'Samsung M40 '),
(3, '2019, September', 'Available. Released 2019, September 18', 'GSM / CDMA / HSPA / LTE', 'GSM 850 / 900 / 1800 / 1900 - SIM 1 & SIM 2', 'HSDPA 850 / 900 / 2100', 'LTE band 1(2100), 3(1800), 5(850), 7(2600), 8(900), 20(800), 28(700), 38(2600), 40(2300), 41(2500) LTE band 1(2100), 3(1800), 5(850), 8(900), 38(2600), 40(2300), 41(2500)', '', 'HSPA 42.2/5.76 Mbps, LTE-A (2CA) Cat6 400/50 Mbps', 1, 1, '163.6 x 75.4 x 9.1 mm (6.44 x 2.97 x 0.36 in)', '195 g (6.88 oz)', '', 'Dual SIM (Nano-SIM, dual stand-by)', 'IPS LCD capacitive touchscreen, 16M colors', '6.5 inches, 102.0 cm2 (~82.7% screen-to-body ratio)', '720 x 1600 pixels, 20:9 ratio (~270 ppi density)', 1, 'Corning Gorilla Glass 3+<br> 480 nits max brightness', 'Android 9.0 (Pie); ColorOS 6.1', 'Qualcomm SDM665 Snapdragon 665 (11 nm)', 'Octa-core (4x2.0 GHz Kryo 260 Gold & 4x1.8 GHz Kryo 260 Silver)', 'Adreno 610', 'microSD, up to 256 GB (dedicated slot)', '128/64 GB', '4/3 GB', '12 MP, f/1.8, (wide), 1/2.8\", 1.25Âµm, PDAF<br> 8 MP, 13mm, (ultrawide), 1/4\", 1.12Âµm 2 MP, f/2.4, 1/5\", 1.75Âµm 2 MP, f/2.4, 1/5\", 1.75Âµm, depth sensor', '8 MP, f/2.0', '', '2160p@30fps, 1080p@30fps, gyro-EIS<br> 1080p@30fps', 'Vibration, MP3, WAV ringtones', 'Yes, with stereo speakers', 1, 'Wi-Fi 802.11 b/g/n, Wi-Fi Direct, hotspot', '5.0, A2DP, LE', 'Yes, with A-GPS, GLONASS, GALILEO, BDS', 2, 1, '2.0, Type-C 1.0 reversible connector, USB On-The-Go', 1, 'Fingerprint (rear-mounted), accelerometer, gyro, proximity, compass', 'SMS(threaded view), MMS, Email, IM', 'HTML5', 2, 'Non-removable Li-Ion', '5000 mAh', 'China', 'Mirror Black, Dazzling White', 'Power bank/Reverse charging', 'Oppo a5 2020');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `p_id` int(5) NOT NULL AUTO_INCREMENT,
  `p_cat_id` int(5) DEFAULT NULL,
  `cat_id` int(5) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `p_title` tinytext DEFAULT NULL,
  `p_img1` tinytext DEFAULT NULL,
  `p_img2` tinytext DEFAULT NULL,
  `p_img3` tinytext DEFAULT NULL,
  `p_price` int(7) DEFAULT NULL,
  `p_description` tinytext DEFAULT NULL,
  `p_keyword` tinytext DEFAULT NULL,
  `p_color1` tinytext DEFAULT NULL,
  `p_color2` tinytext DEFAULT NULL,
  `p_color3` tinytext DEFAULT NULL,
  `p_total_count` int(3) DEFAULT NULL,
  `description_id` int(5) DEFAULT NULL,
  `p_edit_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`p_id`),
  KEY `p_cat_id` (`p_cat_id`),
  KEY `cat_id` (`cat_id`),
  KEY `description_id` (`description_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_cat_id`, `cat_id`, `date`, `p_title`, `p_img1`, `p_img2`, `p_img3`, `p_price`, `p_description`, `p_keyword`, `p_color1`, `p_color2`, `p_color3`, `p_total_count`, `description_id`, `p_edit_date`) VALUES
(12, 2, 1, '2020-07-06 14:19:59', 'SamSung S20 +', 's20_plus1.jpg', 's20_plus2.jpg', 's20_plus3.jpg', 99990, 'Brand : SAMSUNG', 'samsung', 'Cosmic Grey', ' Cloud Blue', 'Cosmic Black', 6, 4, '2020-07-06 14:19:59'),
(11, 2, 1, '2020-06-25 05:53:22', 'SamSung M40', 'm40-1.jpg', 'm40-2.jpg', 'm40-3.jpg', 19990, 'Brand : SAMSUNG', 'samsung', 'Seawater Blue', 'Midnight Blue', NULL, 1, 2, '0000-00-00 00:00:00'),
(9, 5, 1, '2020-07-04 17:14:20', 'Vivo Y19', 'y19_1.jpg', 'y19_2.jpg', 'y19_3.jpg', 19990, 'Brand : VIVO', 'vivo', 'Mystic Black', 'Spring White', NULL, 33, 8, '0000-00-00 00:00:00'),
(8, 2, 1, '2020-06-25 05:52:50', 'SamSung M40', 'm40_1.jpg', 'm40_2.jpg', 'm40_3.jpg', 19990, 'Brand : Sam Sung', 'samsung', 'Seawater Blue', 'Midnight Blue', NULL, 3, 2, '0000-00-00 00:00:00'),
(7, 1, 1, '2020-06-25 09:42:07', 'IPhone 11 Pro Max', 'apple11_1.jpg', 'apple11_2.jpg', 'apple11_3.jpg', 139999, 'Brand : Iphpone', 'iphone', 'Space Gray', 'Gold', 'Silver', 1, 1, '0000-00-00 00:00:00'),
(13, 5, 1, '2020-06-25 05:54:03', 'Vivo S1 Pro', 's1_pro_black1.jpg', 's1_pro_black2.jpg', 's1_pro_black3.jpg', 26990, 'Brand : VIVO', 'vivo', 'Mystic Black', 'Jazzy Blue', NULL, 100, 5, '0000-00-00 00:00:00'),
(14, 5, 1, '2020-06-25 05:54:07', 'Vivo S1 Pro', 's1_pro1.jpg', 's1_pro2.jpg', 's1_pro3.jpg', 26990, 'Brand : VIVO', 'vivo', 'Mystic Black', 'Jazzy Blue', NULL, 11, 5, '0000-00-00 00:00:00'),
(15, 3, 1, '2020-06-25 06:14:03', 'Huawei mate 30 pro', 'huawei-mate-30-pro_1.jpg', 'huawei-mate-30-pro_2.jpg', 'huawei-mate-30-pro_3.jpg', 99999, 'Brand : HUAWEI', 'huawei', 'Space Silver', 'Cosmic Purple', 'Emerald Green', NULL, 6, '0000-00-00 00:00:00'),
(17, 4, 1, '2020-07-04 17:14:02', 'OPPO A5 2020', 'oppo-a5_1.jpg', 'oppo-a5_2.jpg', 'oppo-a5_3.jpg', 17990, 'Brand : OPPO', 'oppo', 'Mirror Black', 'Dazzling White', NULL, 4, 3, '0000-00-00 00:00:00'),
(18, 4, 1, '2020-07-02 17:56:29', 'OPPO F15', 'oppo-f15_1.jpg', 'oppo-f15_2.jpg', 'oppo-f15_3.jpg', 26990, 'Brand : OPPO', 'oppo', 'Lightening Black', 'Unicorn White', NULL, 1, 9, '0000-00-00 00:00:00'),
(19, 10, 1, '2020-06-25 05:54:46', 'Realme 5i', 'realme_5i1.jpg', 'realme_5i2.jpg', 'realme_5i3.jpg', 12990, 'Brand : realme', 'realme', 'Green', 'Blue', NULL, NULL, 10, '0000-00-00 00:00:00'),
(20, 10, 1, '2020-06-25 05:54:49', 'Realme C3', 'realme-c3_1.jpg', 'realme-c3_2.jpg', 'realme-c3_3.jpg', 10990, 'Brand : Realme', 'realme', 'Frozen Blue', 'Blazing Red', NULL, 6, 11, '0000-00-00 00:00:00'),
(22, 2, 1, '2020-07-08 16:20:02', 'SamSung M40 Black', 'm40_black1.jpg', 'm40_black2.jpg', 'm40_black3.jpg', 21990, NULL, 'samsung m40', 'Sweater Blue', 'Midnight Blue', '', 10, 2, '2020-07-08 16:20:02'),
(23, 2, 2, '2020-07-08 17:22:39', 'Samsung Metro 350', 'minisamsung1.jpg', 'minisamsung2.jpg', 'minisamsung3.jpg', 2500, NULL, 'samsung', 'Black', 'Silver', '', 10, 3, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE IF NOT EXISTS `product_categories` (
  `p_cat_id` int(5) NOT NULL AUTO_INCREMENT,
  `p_cat_title` tinytext DEFAULT NULL,
  `p_cat_description` text DEFAULT NULL,
  PRIMARY KEY (`p_cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_description`) VALUES
(1, 'APPLE', 'The iPhone from Apple is arguably the most popular and recognisable Smartphone in the world. Since 2007, the iPhone changed the world of mobile phones forever and look to remain at the fore-front of Smartphone technology for years to come. Now is the best time to look for great iPhone 7 or iPhone 7 Plus, but past generations including the iPhone SE, iPhone 6s/6s Plus and iPhone 5s range are also available at great prices. Get loads of free calls, texts and 4G data on Vodafone, EE or Three!.This is an awesome phone'),
(2, 'SAMSUNG', 'Samsung have become one of the most popular Android smartphones of all time, with incredible camera’s and sleep designs such as the Samsung Galaxy Edge range on both the S6 and S7 generations! The Samsung Galaxy S8 hits the UK in Spring of 2017, but for now you can get a fantastic deal on the Samsung Galaxy S7 and S7 Plus from Mobile Phones Direct - with free next working day delivery!'),
(3, 'HUAWEI', 'Huawei UK is focused on providing customers with a seamless convergent telecommunications experience anytime, anywhere, through any terminal. They aim to bring the best in mobile phone technology whist remaining budget friendly for their customers understanding the importance of affordable top-end 4G Smartphones'),
(4, 'OPPO', 'Oppo are a Chinese phone manufacturer delivering technology aesthetics to consumers globally. They aim to bring the beauty of technology to people around the world, whilst becoming a healthier and more sustainable enterprise. Their phone portfolio is rapidly expanding as they increase in popularity. Their devices include popular features such as a built in beautifying feature for camera and 10x zoom!'),
(5, 'VIVO', 'Vivo is a Chinese Android smartphone manufacturer founded in 2009. Vivo is owned by Chinese Multinational company BBK Electronics which is also the owner of another popular Chinese brand Oppo. Vivo started to expand its market outside China since 2014 and currently, they are operating in over 100 countries.'),
(6, 'SONY', 'Sony are known globally for their wide range of consumer electronics including TVs, Playstation 3, PSP, tablets and more and when it comes to their mobile phone range they continue to break technological barriers. Most recently they have developed one of the toughest commercial phone screens in the world boasting the ability to withstand water, dust and scratches.'),
(7, 'XIAOMI', 'Xiaomi Corporation  is a Chinese electronics company founded in April 2010 and headquartered in Beijing. Xiaomi makes and invests in smartphones, mobile apps, laptops, bags, earphones, shoes, fitness bands, and many other products. Xiaomi is also the fourth company after Apple, Samsung and Huawei to have self-developed mobile phone chip capabilities.Xiaomi released its first smartphone in August 2011 and rapidly gained market share in China to become the countrys largest smartphone company in 2014. At the start of second quarter of 2018, Xiaomi was the worlds fourth-largest smartphone manufacturer, leading in both the largest market'),
(8, 'SYMPHONY', 'Symphony Mobile is a brand has been enjoying indisputable leading position in mobile phone industry.Symphony is a brand of Edison Group and was introduced at the end of 2008. Without any doubt, Symphony is the fastest growing mobile phone brand in Bangladesh. They are continuously working on bringing the newest features with an aggressive pricing strategy and demandable styling.'),
(9, 'WALTON', 'Walton is a Bangladeshi local electronic brand that offers TV, refrigerator, air conditioner, Motorbike, and smartphones. Smartphones are the most influential products that Walton has. Walton is the 3rdmost popular mobile brand in Bangladesh in terms of sales. Walton has produced lots of smartphone within very quick time, as a result, their quality breakdown. But in the recent year, Walton released some impressive smartphones within the lower price. Walton did well to get back on their way by producing some stunning smartphones in the year to year. '),
(10, 'REALME', 'Realme first appeared in China in 2010 (as Oppo Real) as a sub brand of Oppo, a subsidiary of BBK Electronics and was incorporated in 2018. On May 15, 2019, realme held its first conference in Beijing, China to officially enter the Chinese market, launching realme X, realme X Lite and realme X Master Edition.'),
(11, 'LAVA', 'Lava International Limited, is an Indian Smartphone Manufacturer company in the mobile handset industry. The company was founded in 2009 as an offshoot of a telecommunication venture.  The company started its Africa operations by launching its product in Egypt in 2016.'),
(12, 'ONEPLUS', 'The story of the OnePlus mobile company is extremely interesting. The company came into existence on 16 December 2013. It was founded by former OPPO vice-president Pete Lau and Carl Pei. The OnePlus has captured the market in a very short period of time.'),
(13, 'HTC', 'HTC joined Googles Open Handset Alliance and then developed and released the first device powered by Android in 2008, the HTC Dream. In November 2009 HTC released the HTC HD2, the first Windows Mobile device with a capacitive touchscreen. In 2010, HTC sold over 24.6 million handsets, up 111% over 2009.'),
(14, 'HONOR', 'Honor is a mobiles, tablets, and wearables brand of Chinese telecommunications giant Huawei. Established in 2013, the largely-online brand contributes a significant proportion f Huaweis total sales in its categories. Honors latest mobile launch is the 8S (2020). The smartphone was launched in 5th June 2020.'),
(15, 'NOKIA', 'In 1987, Nokia introduced its first mobile phone, the \"Mobira Cityman 900\" for NMT– 900 networks. ... In 1987, the Soviet leader Mikhail Gorbachev was seen using a Mobira Cityman in Helsinki. The phone developed the nickname, the \"Gorba\". In 1989, Nokia-Mobira Oy was renamed \"Nokia Mobile Phones\".'),
(16, 'MOTOROLA', 'In the year 1983, the world\'s first commercial hand-held cellular phone, the Motorola DynaTAC 8000X phone, got FCC\'s approval. In the year 1996, the company launched the successor to the DynaTAC. Dubbed StarTAC, it was the first ever clamshell/flip mobile phone'),
(17, 'MAXIMUS', 'Maximus Mobile is a Bangladeshi brand which may seem relatively new in the country. After that, they started to manufacture phones from the year 2009 under the name Maximus.');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE IF NOT EXISTS `rating` (
  `p_id` int(5) DEFAULT NULL,
  `rating_number` int(5) DEFAULT NULL,
  `total_rating_point` int(7) DEFAULT NULL,
  `created_rating` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_rating` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `p_id` (`p_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`p_id`, `rating_number`, `total_rating_point`, `created_rating`, `modified_rating`) VALUES
(11, 5, 21, '2020-06-26 19:22:58', '2020-06-26 19:25:28'),
(7, 7, 35, '2020-06-26 19:26:31', '2020-06-27 07:04:50'),
(12, 2, 9, '2020-06-26 19:28:53', '2020-07-09 06:29:30'),
(17, 2, 8, '2020-06-27 08:24:45', '2020-07-10 13:48:09'),
(18, 1, 3, '2020-06-27 08:31:00', '2020-06-27 08:31:00'),
(20, 1, 2, '2020-06-27 09:24:15', '2020-06-27 09:24:15'),
(23, 5, 14, '2020-07-09 07:08:20', '2020-07-09 07:15:01');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `slider_name` varchar(25) DEFAULT NULL,
  `slider_image` tinytext DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `slider_name`, `slider_image`) VALUES
(12, 'Slider Number 12', 'image_4.jpg'),
(10, 'Slider Number 10', 'image_3.jpg'),
(9, 'Slider Number 9', 'image_1.jpg'),
(11, 'Slider Number 11', 'image_2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_review`
--

DROP TABLE IF EXISTS `user_review`;
CREATE TABLE IF NOT EXISTS `user_review` (
  `review_id` int(5) NOT NULL AUTO_INCREMENT,
  `p_id` int(5) DEFAULT NULL,
  `ip_address` tinytext DEFAULT NULL,
  `review_user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `review_user_name` tinytext DEFAULT NULL,
  `review_user_email` tinytext DEFAULT NULL,
  `review_title` tinytext DEFAULT NULL,
  `review_message` text DEFAULT NULL,
  `rating_point` int(1) DEFAULT NULL,
  `replied` text DEFAULT NULL,
  `customer_id` int(5) DEFAULT NULL,
  `replied_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`review_id`),
  KEY `p_id` (`p_id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_review`
--

INSERT INTO `user_review` (`review_id`, `p_id`, `ip_address`, `review_user_date`, `review_user_name`, `review_user_email`, `review_title`, `review_message`, `rating_point`, `replied`, `customer_id`, `replied_date`) VALUES
(1, 17, '127.0.0.1', '2020-07-10 13:48:09', 'Ismail hosen Raj', 'ismail61@gmail.com', 'NIce', 'nice products', 5, 'Thanks Ismail Hosen', 3, '2020-07-10 18:49:08'),
(5, 23, '127.0.0.1', '2020-07-10 13:48:09', 'Ismail Hosen Raj', 'lab@gmail.com', 'NIce', 'valo', 3, 'thx dear', 8, '2020-07-10 18:51:45'),
(6, 17, '127.0.0.1', '2020-07-10 13:48:09', 'Ismail Hosen Raj', 'lab@gmail.com', 'Owesome Phone', 'stylist phone..i love it', 4, 'love u dear', 7, '2020-07-10 18:55:07');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `wishlist_id` int(10) NOT NULL AUTO_INCREMENT,
  `p_id` int(5) DEFAULT NULL,
  `customer_id` int(5) DEFAULT NULL,
  `product_quantity` int(3) DEFAULT NULL,
  `product_color` tinytext DEFAULT NULL,
  PRIMARY KEY (`wishlist_id`),
  KEY `customer_id` (`customer_id`),
  KEY `p_id` (`p_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlist_id`, `p_id`, `customer_id`, `product_quantity`, `product_color`) VALUES
(1, 23, 7, 1, 'Black'),
(2, 12, 7, 1, 'Cosmic Grey');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
