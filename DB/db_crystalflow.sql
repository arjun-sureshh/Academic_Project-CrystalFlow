-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2023 at 10:13 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_crystalflow`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(35) NOT NULL,
  `admin_name` varchar(35) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_password` varchar(30) NOT NULL,
  `admin_contact` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_contact`) VALUES
(8, 'Arjun suresh', 'admin@gmail.com', 'admin123', '8606687433');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(45) NOT NULL,
  `booking_date` varchar(54) NOT NULL,
  `booking_status` varchar(456) NOT NULL DEFAULT '0',
  `booking_amount` varchar(45) NOT NULL,
  `shop_id` int(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `booking_date`, `booking_status`, `booking_amount`, `shop_id`) VALUES
(14, '2023-12-21', '2', '720.00', 14),
(15, '2023-12-21', '2', '760.00', 15),
(16, '2023-12-21', '0', '', 14);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `cart_quantity` int(1) NOT NULL DEFAULT 4,
  `product_id` int(11) NOT NULL,
  `cart_status` int(11) NOT NULL DEFAULT 0,
  `booking_id` int(11) NOT NULL,
  `cart_ddate` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `cart_quantity`, `product_id`, `cart_status`, `booking_id`, `cart_ddate`) VALUES
(6, 2, 36, 1, 4, ''),
(7, 2, 38, 1, 4, ''),
(8, 3, 33, 1, 5, ''),
(9, 2, 34, 1, 5, ''),
(10, 2, 33, 1, 6, ''),
(11, 2, 34, 1, 6, ''),
(12, 1, 33, 4, 7, ''),
(13, 1, 34, 4, 7, ''),
(14, 4, 33, 0, 8, ''),
(15, 12, 34, 0, 8, ''),
(16, 12, 35, 0, 8, ''),
(17, 4, 33, 4, 9, ''),
(18, 4, 34, 3, 9, ''),
(19, 4, 35, 1, 9, ''),
(20, 4, 37, 1, 10, ''),
(21, 4, 39, 1, 10, ''),
(22, 4, 36, 1, 10, ''),
(23, 8, 33, 3, 11, ''),
(24, 4, 37, 1, 11, ''),
(25, 4, 37, 1, 12, ''),
(26, 4, 39, 1, 12, ''),
(28, 4, 39, 4, 13, ''),
(29, 4, 38, 4, 14, '2023-12-21'),
(30, 4, 46, 4, 15, '2023-12-21'),
(31, 4, 37, 0, 16, ''),
(32, 4, 43, 0, 16, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(6, ' Mineral Water'),
(7, 'Soft Dinks'),
(10, 'Soda');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `company_id` int(35) NOT NULL,
  `company_name` varchar(45) NOT NULL,
  `company_address` varchar(45) NOT NULL,
  `company_email` varchar(45) NOT NULL,
  `company_contact` varchar(45) NOT NULL,
  `place_id` int(43) NOT NULL,
  `company_logo` varchar(300) NOT NULL,
  `company_proof` varchar(400) NOT NULL,
  `company_password` varchar(45) NOT NULL,
  `company_vstatus` varchar(450) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`company_id`, `company_name`, `company_address`, `company_email`, `company_contact`, `place_id`, `company_logo`, `company_proof`, `company_password`, `company_vstatus`) VALUES
(16, 'MYMOONS', 'MYMOONS INDUSTRIES\r\nAnchiri p.o,Thodupuzha-68', 'mymoonsdriking@gmail.com', '4862258633', 15, 'mymoonslogo.jpg', 'proof.jpg', 'mymoons6855', '1'),
(17, 'Golden Valley', 'Golden Valley Industries,\r\nmarampally ,ernaku', 'goldenvalley6831@gmail.com', '5672394015', 24, 'Screenshot (41).png', 'proof1.jpg', 'goldenvalley6831', '1'),
(18, 'Bisleri', 'Besleri ,\r\nkakkanad, Ernakkulam,\r\npin-682021', 'bisleriindustries@gmail.com', '9633329992', 25, 'bislerilogo.jpg', 'besleriproof.jpg', 'bisleri6820', '1'),
(19, 'Blu', 'Blu Industries,\r\nMudakuzha p.o,Akanad,kodanad', 'bluindusties123@gmail.com', '9400152755', 15, 'blulogo.jpg', 'licno.jpg', 'blu123', '1'),
(20, 'Star soda', 'Star Soda,\r\nNedungappra(p.o),perumbavoor,Erna', 'starsoda@gmail.com', '9495559448', 11, 'Screenshot (40).png', 'Screenshot (51).png', 'starsoda@6835', '2'),
(21, 'JOSHWA', 'Soorya industries,\r\nMannakad(p.o),Thodupuzha,', 'joshwaind@gmail.com', '3462748310', 20, 'joshwa.jpg', 'joshwaproof.jpg', 'joshwaind@g', '1'),
(23, 'Ria', 'blu industries\r\nMudakuzha p.o,Akanad,kodanad,', 'bluindusties@gmail.com', '0987654321', 15, 'blulogo.jpg', 'licno.jpg', 'blue', '2'),
(25, 'blues', 'kakkanad,Ernakulam', 'arjunsuresh410@gmail.com', '8606687344', 25, 'blulogo.jpg', 'goldenvalleyproof.jpg', 'arjun222', '1'),
(29, 'kija', 'jcbyubyjbcub', 'arjunsuresh311@gmail.com', '8606687344', 22, 'bislerilogo.jpg', 'besleriproof.jpg', 'arjun311', '2'),
(30, 'arjun', 'mjcbd hud hck  bkuvi;vygq', 'arjunsurezh333@gmail.com', '8606687344', 17, 'blu.jpg', 'bislericlubsoda.png', 'arjun666', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_companycomplaint`
--

CREATE TABLE `tbl_companycomplaint` (
  `ccomplaint_id` int(35) NOT NULL,
  `ccomplaint_title` varchar(56) NOT NULL,
  `ccomplaint_content` varchar(65) NOT NULL,
  `ccomplaint_date` varchar(45) NOT NULL,
  `ccomplaint_status` varchar(45) NOT NULL DEFAULT '0',
  `shop_id` int(56) NOT NULL,
  `company_id` int(44) NOT NULL,
  `ccomplaint_replay` varchar(78) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_companycomplaint`
--

INSERT INTO `tbl_companycomplaint` (`ccomplaint_id`, `ccomplaint_title`, `ccomplaint_content`, `ccomplaint_date`, `ccomplaint_status`, `shop_id`, `company_id`, `ccomplaint_replay`) VALUES
(4, 'payment', 'payment eoor', '2023-12-21', '0', 14, 18, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(20, 'Ernakulam'),
(21, 'Malappuram'),
(22, 'Kollam'),
(23, 'Idukki');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(30) NOT NULL,
  `place_name` varchar(30) NOT NULL,
  `district_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `district_id`) VALUES
(11, 'Perumbavoor', 20),
(12, 'Kochi', 20),
(13, 'Muvattupuzha', 20),
(14, 'Aluva', 20),
(15, 'Kodanad', 20),
(16, 'Manjeri', 21),
(17, 'Tirur', 21),
(18, 'Kondotty', 21),
(19, 'Nilambur', 21),
(20, ' Thodupuzha', 23),
(22, 'Chavara', 22),
(24, 'Marampally', 20),
(25, 'Kakkanad', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(35) NOT NULL,
  `product_name` varchar(35) NOT NULL,
  `product_price` varchar(35) NOT NULL,
  `product_details` varchar(55) NOT NULL,
  `company_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_qty` varchar(50) NOT NULL,
  `product_image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_price`, `product_details`, `company_id`, `category_id`, `product_qty`, `product_image`) VALUES
(33, 'Minneral water', '180', 'Golden Valley Driking Water 1L Bottle\r\n(pack of 16)', 17, 6, '1000 ML', 'goldenvalley.jpg'),
(34, 'NJUZE', '80', 'Njuze Guava \r\n(pack of 10)', 17, 7, '200 ML', 'goldenvalleyguva.jpg'),
(35, 'NJUZE', '50', 'Njuze Mango\r\n(Pack of 6)', 17, 7, '200 ML', 'goldenvalleyproduct.jpg'),
(36, 'CLUB SODA', '200', 'Golden Valley \r\nCLUB SODA (Pack of 20)', 17, 10, '600 ML', 'goldenvalleysoda.jpg'),
(37, 'Minneral water', '180', 'Bisleri Driking Water 2L Bottle\n(Pack of 9)', 18, 6, '2000 ML', 'Screenshot (67).png'),
(38, 'CLUB SODA', '180', 'Bisleri CLUB SODA\r\n(Pack of 16)', 18, 10, '750 ML', 'bislericlubsoda.png'),
(39, 'Minneral water', '180', 'Bisleri Driking Water \r\n(Pack of 12)', 18, 6, '1000 ML', 'Screenshot (69).png'),
(40, 'MYMOONS', '180', 'Mymoons Packaged Driking Water\r\n(Pack of 16)', 16, 6, '1000 ML', 'mymoonsminneral.jpg'),
(41, 'MYMOONS', '210', 'Mymoons , Mango Drinks', 16, 7, '500 ML', 'mymoons mango.jpg'),
(42, 'Blu', '150', 'Blu\r\nPackaged Drinking Water 500 ml Bottle\r\n(Pack of 20', 19, 6, '500', 'bluemini.jpg'),
(43, 'Blu', '180', 'Blu Industries\r\nPackaged Drinking Water 1L Bottle\r\n(Pac', 19, 6, '1000 ML', 'blu1l.jpg'),
(44, 'Blu CLUB SODA', '140', 'Blu CLUB SODA\r\n(Pack of 12)', 19, 10, '600 ML', 'blusoda.jpg'),
(45, 'JOSHWA CLUB SODA', '210', 'JOSHWA CLUB SODA 1.5 L Bottle\r\n(Pack of 9)', 21, 10, '1500 ML', 'joshwasoda.jpg'),
(46, 'POP', '190', 'Bisleri Product\nOrange Flavour(Pack of 24)', 18, 7, '160 ML', 'bisleriorange.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(11) NOT NULL,
  `review_datetime` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_review` varchar(100) NOT NULL,
  `user_rating` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`review_id`, `review_datetime`, `product_id`, `user_review`, `user_rating`, `user_name`) VALUES
(5, '2023-10-27 12:55:31', 33, 'I recently purchased the minneral water,softdrinksand from this  site. I am thrilled with the fact t', '4', 'Athul C V'),
(6, '2023-10-27 13:01:56', 34, 'It is a good product and very resonable price.i fully satisfied\n\n', '4', 'Athul C V'),
(7, '2023-10-27 13:02:06', 34, 'It is a good product and very resonable price.i fully satisfied\n\n', '4', 'Athul C V');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shop`
--

CREATE TABLE `tbl_shop` (
  `shop_id` int(35) NOT NULL,
  `shop_name` varchar(45) NOT NULL,
  `shop_contact` varchar(45) NOT NULL,
  `shop_address` varchar(50) NOT NULL,
  `shop_email` varchar(50) NOT NULL,
  `shop_password` varchar(50) NOT NULL,
  `shop_photo` varchar(400) NOT NULL,
  `shop_proof` varchar(400) NOT NULL,
  `shop_vstatus` varchar(350) NOT NULL DEFAULT '0',
  `place_id` int(34) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_shop`
--

INSERT INTO `tbl_shop` (`shop_id`, `shop_name`, `shop_contact`, `shop_address`, `shop_email`, `shop_password`, `shop_photo`, `shop_proof`, `shop_vstatus`, `place_id`) VALUES
(14, ' AL  Khaleej', '6785243169', 'AL Khaleej ,\r\nperumbavoor(p.o),Ernakulam\r\npin-6835', 'athulcv460@gmail.com', 'athul460', 'AL khaleej.png', 'proof.jpg', '1', 11),
(15, 'CITY BAKERS', '7065834926', 'CITY BAKERS,kurupampady,perumbavoor,\r\nErnakulam,PI', 'citybakers@gmail.com', 'citybakers', 'city.jpg', 'proof2.jpg', '1', 11),
(16, 'KP Stores', '8606687344', 'hhkjcion jbyuvkjkashy', 'arjunsuresh410@gmail.com', 'arjun', 'city.jpg', 'proof.jpg', '2', 16);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shopcomplaint`
--

CREATE TABLE `tbl_shopcomplaint` (
  `scomplaint_id` int(55) NOT NULL,
  `scomplaint_title` varchar(55) NOT NULL,
  `scomplaint_content` varchar(66) NOT NULL,
  `scomplaint_status` int(65) NOT NULL DEFAULT 0,
  `shop_id` int(40) NOT NULL,
  `company_id` int(40) NOT NULL,
  `scomplaint_date` varchar(56) NOT NULL,
  `scomplaint_reply` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `stock_id` int(35) NOT NULL,
  `stock_date` date NOT NULL,
  `stock_quantity` int(40) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`stock_id`, `stock_date`, `stock_quantity`, `product_id`) VALUES
(9, '2023-10-27', 20, 33),
(10, '2023-10-27', 25, 34),
(11, '2023-10-27', 15, 35),
(12, '2023-10-27', 25, 36),
(13, '2023-10-27', 15, 37),
(14, '2023-10-27', 20, 38),
(15, '2023-10-27', 25, 39),
(16, '2023-10-29', 30, 40),
(17, '2023-10-29', 40, 41),
(18, '2023-10-29', 35, 42),
(19, '2023-10-29', 45, 43),
(20, '2023-10-29', 25, 44),
(21, '2023-10-29', 30, 45),
(22, '2023-10-29', 30, 46),
(23, '2023-10-29', 20, 35);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `tbl_companycomplaint`
--
ALTER TABLE `tbl_companycomplaint`
  ADD PRIMARY KEY (`ccomplaint_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tbl_shop`
--
ALTER TABLE `tbl_shop`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `tbl_shopcomplaint`
--
ALTER TABLE `tbl_shopcomplaint`
  ADD PRIMARY KEY (`scomplaint_id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `company_id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_companycomplaint`
--
ALTER TABLE `tbl_companycomplaint`
  MODIFY `ccomplaint_id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_shop`
--
ALTER TABLE `tbl_shop`
  MODIFY `shop_id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_shopcomplaint`
--
ALTER TABLE `tbl_shopcomplaint`
  MODIFY `scomplaint_id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `stock_id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
