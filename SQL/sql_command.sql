-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2021 at 01:38 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(5, 'mahir shahriar', 'mahirshahriar21', 'ac78663819e96227d7aa98580e83f168'),
(8, 'SMN SHuvo', 'SMN', 'ac78663819e96227d7aa98580e83f168'),
(9, 'auti', 'admin', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(31, 'Pizza', 'Food_Category_909.jpg', 'Yes', 'Yes'),
(32, 'Burger', 'Food_Category_574.jpg', 'Yes', 'Yes'),
(33, 'Momo', 'Food_Category_212.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(256) NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(7, 'Chicken Burger', 'Prepared with chicken patty & special sauce.', '160.00', 'Food_Name_258.jpg', 32, 'Yes', 'Yes'),
(12, 'Chicken Cheese Burger', 'Prepared with chicken patty, cheese & special sauce.', '180.00', 'Food_Name_70.jpg', 32, 'No', 'Yes'),
(13, 'Smoky BBQ Cheese Chicken Burger', 'Prepared with chicken patty cooked with bbq sauce.', '200.00', 'Food_Name_444.jpg', 32, 'No', 'Yes'),
(14, 'Chicken With Bacon Burger', 'Prepared with chicken patty & beef bacon.', '210.00', 'Food_Name_684.jpg', 32, 'No', 'Yes'),
(15, 'Chicken Signature Burger', 'Prepared with chicken patty, 2x cheese, beef pastarami & poached egg.', '330.00', 'Food_Name_424.jpg', 32, 'Yes', 'Yes'),
(16, 'Binge Chicken Burger', 'Our Biggest Creation. Prepared with 2x Giant chicken patty, smoked chicken, chicken ham & 3x cheese.', '620.00', 'Food_Name_506.jpg', 32, 'Yes', 'Yes'),
(17, 'BBQ Temptation', 'Prepared with spicy chicken marinated in BBQ sauce, onions, capsicum, tomatoes & green chilies', '292.80', 'Food_Name_950.jpg', 31, 'No', 'Yes'),
(18, 'Beef Lovers', 'Prepared with beef, onions, black olives & capsicum', '292.80', 'Food_Name_201.jpg', 31, 'No', 'Yes'),
(19, 'Chicken Hawaiian', 'Prepared with chicken & pineapple', '292.80', 'Food_Name_854.jpg', 31, 'No', 'Yes'),
(20, 'Beef Supremo', 'A beefy package of beef pepperoni,beef & mushrooms topped with loads of mozzarella cheese', '373.60', 'Food_Name_275.jpg', 31, 'No', 'Yes'),
(21, 'Beef Pepperoni', 'Arguably the most popular pizza in the world,slices of pepperoni smothered with extra cheese( our pepperoni is 100% halal beef)', '292.80', 'Food_Name_452.jpg', 31, 'No', 'Yes'),
(22, 'Tropical Chicken - Cheesy Bites', 'Spicy chicken, capsicum, onions, pineapple & green chilies', '827.20', 'Food_Name_497.jpg', 31, 'Yes', 'Yes'),
(23, 'Chicken Momo', '', '40.00', 'Food_Name_947.jpg', 33, 'No', 'Yes'),
(24, 'Fish Momo', '', '65.00', 'Food_Name_242.jpg', 33, 'No', 'Yes'),
(25, 'Mushroom Paneer Momo', '', '75.00', 'Food_Name_147.jpg', 33, 'No', 'Yes'),
(26, 'Beef Momo', '', '75.00', 'Food_Name_804.JPG', 33, 'No', 'Yes'),
(27, 'Prawn Momo', '', '100.00', 'Food_Name_433.jpg', 33, 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `quantity`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(2, 'BBQ Temptation', '292.80', 2, '585.60', '2021-01-28 10:51:23', 'Cancelled', 'Mahir Shahriar', '01793421368', 'mahirshahriar10@gmail.com', 'Boshpara, Jamalpur, Dhaka'),
(3, 'Fish Momo', '65.00', 2, '130.00', '2021-01-28 11:26:15', 'Deliverd', 'Tasnim Monisha', '017********', 'monisha@gmail.com', 'Purandhaka, Dhaka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
