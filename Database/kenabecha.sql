-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2020 at 02:08 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kenabecha`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_massage`
--

CREATE TABLE `admin_massage` (
  `m` int(11) NOT NULL,
  `m_user_name` varchar(255) DEFAULT NULL,
  `m_user_email` varchar(255) DEFAULT NULL,
  `m_user_cntct` varchar(255) NOT NULL,
  `massages` text NOT NULL,
  `msg_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_massage`
--

INSERT INTO `admin_massage` (`m`, `m_user_name`, `m_user_email`, `m_user_cntct`, `massages`, `msg_status`) VALUES
(13, 'sakib', 'sakibulislam285@gmail.com', '01987675643', 'I needd help', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL,
  `cat_logo` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_logo`) VALUES
(12, 'Property', 'investmentproperty.jpg'),
(11, 'Vehicle', '78796094_2397708760543715_3751316464590651392_n.jpg'),
(10, 'PC And Laptop', '67349548_2369154860026834_1247586891662884864_n.jpg'),
(9, 'Mobile', '79665917_967689066946076_2323345829873582080_n (1).png'),
(14, 'Pet and Animal', 'db15d425-0b13-11e2-87b9-0050568626ea.jpg'),
(15, 'Electronics', 'eagle electronics logo copy.png');

-- --------------------------------------------------------

--
-- Table structure for table `dashboard_user`
--

CREATE TABLE `dashboard_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_full_name` varchar(255) DEFAULT NULL,
  `user_fb` varchar(255) DEFAULT NULL,
  `user_twiter` varchar(255) DEFAULT NULL,
  `user_insta` varchar(255) DEFAULT NULL,
  `user_img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dashboard_user`
--

INSERT INTO `dashboard_user` (`user_id`, `user_name`, `user_role`, `user_password`, `user_full_name`, `user_fb`, `user_twiter`, `user_insta`, `user_img`) VALUES
(1, 'admin', 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'Sakibul Islam', 'sakib0075', 'sakib', 'sakib3437', 'IMG_20190527_150037.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `massage`
--

CREATE TABLE `massage` (
  `msg_id` int(11) NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `reciever_id` int(11) DEFAULT NULL,
  `massages` text NOT NULL,
  `msg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `msg_status` int(11) DEFAULT 0,
  `msg_type` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `massage`
--

INSERT INTO `massage` (`msg_id`, `sender_id`, `reciever_id`, `massages`, `msg_date`, `msg_status`, `msg_type`) VALUES
(180, 27, 28, 'Hlw', '2020-06-26 17:16:29', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ordr_id` int(11) NOT NULL,
  `ordr_post_id` int(11) NOT NULL,
  `seller_email` varchar(255) NOT NULL,
  `buyer_email` varchar(255) NOT NULL,
  `receiver_name` varchar(255) NOT NULL,
  `receiver_number` varchar(255) NOT NULL,
  `receiver_address` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `total_bill` varchar(50) DEFAULT NULL,
  `ordr_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ordr_status` int(11) NOT NULL DEFAULT 0,
  `confirm_status` int(11) NOT NULL DEFAULT 0,
  `order_deletion_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ordr_id`, `ordr_post_id`, `seller_email`, `buyer_email`, `receiver_name`, `receiver_number`, `receiver_address`, `payment_method`, `total_bill`, `ordr_date`, `ordr_status`, `confirm_status`, `order_deletion_status`) VALUES
(83, 102, 'mehedi@gmail.com', 'sakibulislam285@gmail.com', 'Sakib', '01914603437', 'Dhaka,Bangladesh', 'cash_on_delivery', '5,750', '2020-06-27 08:24:18', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_user_email` varchar(255) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_price` varchar(255) NOT NULL,
  `post_contact` varchar(255) NOT NULL,
  `post_condition` varchar(255) NOT NULL,
  `post_category_id` int(11) NOT NULL,
  `post_location` varchar(255) NOT NULL,
  `post_image` text NOT NULL,
  `post_details` text NOT NULL,
  `post_status` int(11) NOT NULL DEFAULT 0,
  `post_mark` int(11) NOT NULL DEFAULT 0,
  `selling_status` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_user_email`, `post_title`, `post_price`, `post_contact`, `post_condition`, `post_category_id`, `post_location`, `post_image`, `post_details`, `post_status`, `post_mark`, `selling_status`) VALUES
(91, 'sakibulislam285@gmail.com', 'OnePlus 8', '63,000.00', '01978564356', 'New', 9, 'Uttara,Dhaka', 'OnePlus-8-Gradient.jpg', 'OnePlus 8 smartphone comes with 6.55 inches, 103.6 cm2 (~88.7% screen-to-body ratio), Fluid AMOLED capacitive touchscreen, 16M colors display and resolution 1080 x 2400 pixels, 20:9 ratio (~402 ppi density). OnePlus 8 performing Octa-core (1×2.84 GHz Kryo 585 & 3×2.42 GHz Kryo 585 & 4×1.8 GHz Kryo 585), Qualcomm SM8250 Snapdragon 865 (7 nm+) processor. It has 8/12 GB of RAM and 128/256 GB internal storage, which can not be expanded to external storage.', 1, 0, 0),
(92, 'sakibulislam285@gmail.com', 'Samsung Galaxy S20 Ultra', '650000', '01978564356', 'Used', 9, 'Mirpur 6', 'Samsung-Galaxy-S20-Ultra-Cosmic-Grey.jpg', 'The dual-SIM device Samsung Galaxy S20 Ultra runs on Android 10 (One UI), and sports a 6.9 inches, 114.0 cm2 (~89.9% screen-to-body ratio), Dynamic AMOLED 2X  with a 19:9 aspect ratio. The device is powered by Exynos 990 (7 nm+) or Qualcomm SM8250 Snapdragon 865 (7 nm+), Octa-core (2×2.73 GHz Mongoose M5 & 2×2.60 GHz Cortex-A76 & 4×2.0 GHz Cortex-A55) or Octa-core (1×2.84 GHz Kryo 585 & 3×2.42 GHz Kryo 585 & 4×1.8 GHz Kryo 585) processor, coupled with 12GB of RAM and 128GB of inbuilt storage', 1, 0, 0),
(93, 'sakibulislam285@gmail.com', 'Realme X3', '30,000.00', '01914603437', 'New', 9, 'Mirpur 10', 'Realme-X3-SuperZoom-Glacier-Blue.jpg', ' Realme X3 smartphone comes with 6.6 inches, 105.2 cm2 (~84.7% screen-to-body ratio), IPS LCD capacitive touchscreen, 16M colors display, and resolution 1080 x 2400 pixels, 20:9 ratio (~399 ppi density). Realme X3 is equipped with Octa-core (1×2.96 GHz Kryo 485 & 3×2.42 GHz Kryo 485 & 4×1.78 GHz Kryo 485), both are seated on the Qualcomm SM8150 Snapdragon 855+ (7 nm) chipset.', 1, 0, 0),
(95, 'mehedi@gmail.com', 'Samsung Galaxy S20 5G', '40,000', '01978564356', 'Used', 9, 'Mirpur 6', 'Samsung-Galaxy-S20-Plus-Cloud-Blue.jpg', 'The dual-SIM device Samsung Galaxy S20 5G UW runs on Android 10 (One UI), and sports a 6.2 inches, 92.8 cm2 (~88.5% screen-to-body ratio), 1440 x 3200 pixels, 20:9 ratio (~556 ppi density), Dynamic AMOLED 2X capacitive touchscreen, 16M colors with a 20:9 aspect ratio. The device is powered by Qualcomm Snapdragon 865, Octa-core (1×2.84 GHz Kryo 585 & 3×2.42 GHz Kryo 585 & 4×1.8 GHz Kryo 585) processor, coupled with 8 GB of RAM and 128 GB of inbuilt storage', 1, 0, 0),
(96, 'mehedi@gmail.com', 'Xiaomi Redmi Note 9 Pro', '27,000.00', '01978564356', 'New', 9, 'Dhaka,Bangladesh', 'Xiaomi-Redmi-Note-9-Pro-Aurora-Blue.jpg', 'The price of the Xiaomi Redmi Note 9 Pro Max is 27,000. Xiaomi Redmi Note 9 Pro Max android/smartphone comes with 6.67 inches, 107.4 cm2 (~84.6% screen-to-body ratio), IPS LCD capacitive touchscreen, 16M colors display and resolution 1080 x 2400 pixels, 20:9 ratio (~395 PPI density). Redmi Note 9 Pro Max performing Octa-core (2×2.3 GHz Kryo 465 Gold & 6×1.8 GHz Kryo 465 Silver), Qualcomm SM7125 Snapdragon 720G (8 nm) processor.', 1, 0, 0),
(97, 'mehedi@gmail.com', 'Xiaomi Redmi Note 8 Pro', '24,999.00', '01983564356', 'New', 9, 'Dhanmondi,Dhaka', 'Xiaomi-Redmi-Note-8-Pro.jpg', ' Xiaomi Redmi Note 8 Pro is 24,999. Xiaomi Redmi Note 8 Pro best budget android / smartphone in 2020 comes with 6.53 inches, 104.7 cm2 (~84.9% screen-to-body ratio), IPS LCD capacitive touchscreen, 16M colors display and resolution 1080 x 2340 pixels, 19.5:9 ratio (~395 PPI density). ', 1, 0, 0),
(98, 'sakibulislam285@gmail.com', 'HP Prodesk 400 G4 MT 7th Gen Intel Core i5 7500 Brand PC', '43,500', '01978564356', 'New', 10, 'Mirpur 6', 'hp-prodesk-400-g4-mt-7th-gen-intel-core-i5-7500-31574919776.jpg', 'HP Prodesk 400 G4 MT 7th Gen Intel Core i5 7500 (3.40GHz-3.80GHz, Intel H270 Chipset, 4GB DDR4 2400MHz, 1TB HDD, DVD RW) Intel HD 630 Graphics, USB Keyboard & Mouse, Free DOS Brand PC #1XG57AV\r\n', 1, 0, 0),
(99, 'sakibulislam285@gmail.com', 'Dell Vostro 3670 MT 9th Gen Intel Core i3 9100 Brand PC', '34,000', '01983564356', 'New', 10, 'Dhaka,Bangladesh', 'dell-vostro-3670-mt-9th-gen-intel-core-i3-9100-41580803558.jpg', 'Dell Vostro 3670 MT 9th Gen Intel Core i3 9100 (3.60GHz-4.20GHz, Intel B360 Chipset, 4GB DDR4 2666MHz, 1TB HDD, DVD RW) Wifi, Bluetooth, USB Keyboard & Mouse, Free DOS, Mid Tower Brand PC #EGLMTCFLR2001204', 1, 0, 0),
(100, 'sakibulislam285@gmail.com', 'HP 22fw IPS Anti-Glare Full-HD 21.5 Inch Monitor', '10,900', '01914603437', 'New', 10, 'Dhanmondi,Dhaka', 'hp-22fw-ips-anti-glare-full-hd-215-inch-11550399463.jpg', 'HP 22fw IPS Anti-Glare Full-HD 21.5 Inch Monitor (1xVGA, 1xHDMI Port) (White Backside) #3KS60AA\r\n', 1, 0, 0),
(101, 'sakibulislam285@gmail.com', 'HP EliteDisplay E243 23.8 Inch Full HD Monitor (HDMI, DP, VGA, USB)', '19,300', '01978564356', 'New', 10, 'Mirpur', 'hp-elitedisplay-e243-238-inch-full-hd-monitor-11561292646.png', 'Model - HP EliteDisplay E243, Series - Business, Display Size (Inch) - 23.8 inch, Shape - Widescreen, Display Type - FHD LED Display, Display Resolution - 1920 x 1080, Brightness (cd/m2) - 250cd/m2, Contrast Ratio (TCR/DCR) - 1000:1 (Static), 10,000,000:1 (Dynamic), Response Time (ms) - 5ms, Refresh Rate (Hz) - 60Hz, VGA Port - 1, HDMI Port - 1, Display Port - 1, USB - 3 x USB3.0 (1 x upstream, 2 x downstream), Aspect Ratio - 16:9, Viewing Angle - 178 degree (H & V), Dimensions - 538.8 x 204.9 x 332.9mm (with Stand), 538.8 x 45.3 x 321.9mm (without Stand)', 1, 0, 0),
(102, 'mehedi@gmail.com', 'Dell E1916HV 18.5 Inch LED Monitor (VGA)', '5,750', '01998564356', 'New', 10, 'Mirpur', 'Dell E1916HV 18.5 Inch LED Monitor_11543117386.jpg', 'Dell E1916HV, Series - Business, Display Size (Inch) - 18.5 inch, Shape - Widescreen, Display Type - LED Display, Display Resolution - 1366 x 768, Brightness (cd/m2) - 200cd/m2, Contrast Ratio (TCR/DCR) - 600:1, Response Time (ms) - 5ms, Refresh Rate (Hz) - 60Hz, VGA Port - 1, Viewing Angle - 90 & 65 degree (H & V), Others - Panel Type: TN, Aspect Ratio: Widescreen - 16:9, Pixel Pitch: 0.3 mm, Color Support: 16.7 million colors, Screen Coating: Anti-glare, 3H Hard Coating, Backlight Technology: WLED, Controls & Adjustments: Brightness, contrast, H/V position, sharpness, input select, color temperature, phase, Color - Black, Specialty - 72% (CIE 1931) color gamut, 82% (CIE 1976) color gamut, LED edgelight system, adjustable LED power indicator, Energy Gauge, backlight dimming control, Screen performance, Plug and view, Mounting option, Tilt at will, Convenient controls, Eco-conscious and reliable, Warranty - 3 year', 1, 0, 1),
(103, 'sakibulislam285@gmail.com', 'Canon EOS 4000D Digital SLR Camera Body with EF-S 18-55mm 1:3.5-5.6 III Lens', '25,800', '01978564356', 'New', 15, 'Dhaka,Bangladesh', 'canon-eos-4000d-digital-slr-camera-body-with-ef-s-51583382929.jpg', 'Capture the moment just as you remember it with precise auto focus, 3.0 fps and DIGIC 4+. Easily frame your shots with the optical viewfinder and see results on a 6.8 cm LCD screen.', 1, 0, 0),
(104, 'sakibulislam285@gmail.com', 'Sony H300 Digital Camera', '16,500', '01978564356', 'New', 15, 'Mirpur 10', 'sony-h300-digital-11548063204.jpg', 'Model - Sony H300, Resolution (MP) - 20.1 Mega pixels, Sensor Type - 1/2.3\" Super HAD CCD Sensor, Display (Inch) - 3\" LCD Display, Optical Zoom (X) - 35x Optical Zoom, Digital Zoom (X) - 70x, Shutter Speed (sec) - 30-1/1500, Interface - USB 2.0, Multi (AV/USB), Face Detection - Yes, Red-Eye Reduction - Yes, Video (Res.) - 1,280 x 720, Memory Type - SD/SDHC/SDXC, Battery - AA Battery, Weight (gm) - 590g, Warranty - 1 year, Color - Black', 1, 0, 0),
(105, 'sakibulislam285@gmail.com', 'Cute baby cat', '3400', '01978564356', 'New', 14, 'Mirpur', 'merawat-si-manis-anggora.jpg', 'Blue eye cat', 1, 0, 0),
(106, 'sakibulislam285@gmail.com', 'Beautiful small dog', '2500', '01983564356', 'New', 14, 'Dhaka,Bangladesh', 'Dogs.jpg', 'cute baby dog', 1, 0, 0),
(107, 'sakibulislam285@gmail.com', 'A4 Tech Bloody G300 Gaming Black Head Phone', '2,000', '01978564356', 'New', 15, 'Mirpur', 'a4-tech-bloody-g300-gaming-black-head-11544269678.jpg', 'Model - A4 Tech Bloody G300, Type - Double Port Wired Gaming Headphone, Connectivity - Wired, Impedance (ohm) - 32ohm, Sensitivity (dB) - Headphones: 100dB (1kHz), Microphone: -58dB, Frequency Response (Hz - kHz) - Headphones: 20Hz-20kHz, Microphone: 50Hz-16kHz, Microphone - Yes, Cable Length (ft) - 2.2m, Warranty - 1 year, Others - Color: Black, Driver Unit: 40 mm Neodymium Magnets, special sound film laser trimming,, Specialty - Suspended Headband, Laser Trimmed Speakers Diaphragm, Isometric Dual-Chamber Design, Omni-Directional Noise-Canceling Mic, Ultra-Soft Large Ear Cups, Gold-Plated Plug Jacks, Country of Origin - Taiwan, Made in/ Assemble - China', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_photo` text NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_notf` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_name`, `user_phone`, `user_photo`, `user_pass`, `user_notf`) VALUES
(27, 'sakibulislam285@gmail.com', 'Sakib', '01914603437', '93015576_2564068100587259_1488005039040495616_o_1592702525.jpg', '$2y$12$2TB6GydjRKFWrGL6CagIOeDRcGca5dFQeHXjXXFDfAllJPwOyM44e', '4'),
(28, 'mehedi@gmail.com', 'Mehedi', '01756453245', 'mehedi_1585213497_1585411625.jpg', '$2y$12$k9K7438t7wfNhzLdvS8z/.uWDvyp.tCngDDRgmLqxDh0F1wKudVcW', '12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_massage`
--
ALTER TABLE `admin_massage`
  ADD PRIMARY KEY (`m`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `dashboard_user`
--
ALTER TABLE `dashboard_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `massage`
--
ALTER TABLE `massage`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ordr_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`,`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_massage`
--
ALTER TABLE `admin_massage`
  MODIFY `m` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `dashboard_user`
--
ALTER TABLE `dashboard_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `massage`
--
ALTER TABLE `massage`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ordr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
