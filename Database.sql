-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2021 at 08:52 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `group_9`
--

-- --------------------------------------------------------

--
-- Table structure for table `baskets`
--

CREATE TABLE `baskets` (
  `basket_id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `baskets`
--

INSERT INTO `baskets` (`basket_id`, `amount`) VALUES
(1, 4890),
(2, 2456),
(3, 4734),
(4, 1100),
(5, 550),
(6, 1878),
(7, 700),
(8, 978),
(9, 1467),
(10, 1378),
(11, 2200),
(12, 300),
(13, 4967),
(16, 1789),
(17, 1828),
(18, NULL),
(19, NULL),
(20, NULL),
(21, NULL),
(22, NULL),
(23, NULL),
(24, NULL),
(25, NULL),
(26, NULL),
(27, NULL),
(28, NULL),
(29, NULL),
(30, NULL),
(31, NULL),
(32, NULL),
(33, NULL),
(34, NULL),
(35, NULL),
(36, 9780),
(37, NULL),
(38, 3445),
(39, NULL),
(40, NULL),
(41, NULL),
(42, NULL),
(43, NULL),
(44, NULL),
(45, NULL),
(46, NULL),
(47, NULL),
(48, NULL),
(49, NULL),
(50, 689),
(51, 689),
(52, 1528),
(53, 4550),
(54, NULL),
(55, 500),
(56, 800),
(57, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comment_order`
--

CREATE TABLE `comment_order` (
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `comments` char(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment_order`
--

INSERT INTO `comment_order` (`product_id`, `customer_id`, `comments`, `rate`) VALUES
(1, 9, 'I will order one more for my sister.', 4),
(2, 2, 'You should order 1 or 2 smaller size', 3),
(2, 8, 'I like it packaged', 3),
(3, 10, 'I can wear it in my wedding tooooo', 4),
(4, 4, 'Its color is different from what I expected, but it is worth buying', 4),
(5, 5, 'I feel water in my boot :((', 2),
(5, 11, '50-50', 3),
(7, 3, 'It looks so cool on my girl.', 5),
(7, 12, 'You should order 1 or 2 smaller size', 3),
(9, 7, 'Love it !!', 5),
(9, 8, 'I like high heeeels', 2),
(10, 6, 'I waited 2 weeks to get my ship but I cant wait to wear it!!', 4);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `name` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` char(70) COLLATE utf8_unicode_ci NOT NULL,
  `basket_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `name`, `email`, `password`, `address`, `basket_id`) VALUES
(2, 'Müzeyyen Alkap', 'muzo.alkap@gmail.com', '9989', 'Cumhuriyet Mahallesi Onikişubat / Kahramanmaraş', 57),
(3, 'Ayşenur Çerçi', 'ays.cerci@gmail.com', '25101999', 'Cumhuriyet Mahallesi Efeler / Aydın', 53),
(4, 'Eda Türker', 'edos.trkr@gmail.com', '12345', 'Yeni Mahalle Safranbolu / Karabük', 18),
(5, 'Barış Altop', 'b.altop@gmail.com', '11111_duygu', 'Sabancı Üniversitesi Tuzla / İstanbul', 19),
(6, 'Duygu Altop', 'duygu_altop@gmail.com', '11111_baris', 'Sabancı Üniversitesi Tuzla / İstanbul', 20),
(7, 'Burcu Biricik', 'bbiricik@gmail.com', 'curcu__', 'Yenidogan Mahallesi Etiler / İstanbul', 21),
(8, 'Serenay Sarıkaya', 'ssarikaya@gmail.com', 'sarikaya!1991', 'Mavi Mahallesi Beykoz / İstanbul', 22),
(9, 'Ali Atay', 'atay@gmail.com', 'l&m5', 'Kireçburnu Sarıyer / İstanbul', 23),
(10, 'Emir Can İğrek', 'emir.can.igrek@gmail.com', '!+ECI+!', 'Çengelköy Mahallesi Üsküdar / İstanbul', 24),
(11, 'Merve Betül', 'm.betul@gmail.com', 'mertul_mertul', 'Renkli Mahallesi Efeler / Aydın', 25),
(12, 'Teoman', 'serseri_teo@gmail.com', 'artisteo', 'Gece Mahallesi Üsküdar / İstanbul', 26),
(13, 'Feyza Teker', 'fey.tek@gmail.com', '12345', 'Atatürk Mahallesi Merkez / Uşak', 1),
(14, 'zsdxfcgvh dfcgvhbn', 'cerciaysenur@gmail.com', 'fcgvhbj', 'Cumhuriyet ProvÄ±nce 1991 Street Number:11 Flat:5\r\nCumhuriyet Mahalles', 27),
(15, 'cfvb ds', 'ays.cerc@gmail.com', '25101999', 'dsf', 35);

-- --------------------------------------------------------

--
-- Table structure for table `includes`
--

CREATE TABLE `includes` (
  `basket_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `piece` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `includes`
--

INSERT INTO `includes` (`basket_id`, `product_id`, `piece`) VALUES
(1, 1, 10),
(2, 2, 4),
(2, 6, 1),
(3, 3, 6),
(3, 7, 2),
(4, 4, 2),
(5, 5, 1),
(6, 8, 5),
(6, 10, 2),
(7, 9, 1),
(8, 2, 2),
(9, 1, 3),
(10, 3, 2),
(11, 5, 4),
(12, 7, 1),
(13, 1, 3),
(13, 9, 5),
(16, 6, 2),
(16, 7, 1),
(16, 8, 1),
(16, 10, 1),
(17, 2, 2),
(17, 4, 1),
(17, 7, 1),
(36, 2, 20),
(38, 3, 5),
(50, 3, 1),
(51, 3, 1),
(52, 1, 2),
(52, 4, 1),
(53, 5, 5),
(53, 7, 6),
(55, 6, 1),
(56, 6, 1),
(56, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `manager_id` int(11) NOT NULL,
  `role` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` char(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`manager_id`, `role`, `name`, `password`, `email`) VALUES
(1, 'sales-manager', 'John', 'John123', 'crazyjohn@gmail.com'),
(2, 'sales-manager', 'Kamil', 'password', 'kamil_87@gmail.com'),
(3, 'sales-manager', 'Asude', 'demetakalinfan', 'asudedemet03@gmail.com'),
(4, 'sales-manager', 'Huseyin', 'fightclubhuseyin', 'huseyinyilmaz@gmail.com'),
(5, 'sales-manager', 'Melissa', 'WinxClubBloom', 'melissa@gmail.com'),
(6, 'product-manager', 'Elizabeth', 'Elizabethequeen', 'e_london@gmail.com'),
(7, 'product-manager', 'Selena', 'selenabieber', 'gomez@gmail.com'),
(8, 'product-manager', 'Ahmet', 'lolhahaha', 'ahmet.celik@gmail.com'),
(9, 'product-manager', 'Aylin', 'redvampire', 'aylinkontente@gmail.com'),
(10, 'product-manager', 'Harry', 'rosesarered', 'styles@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `basket_id` int(11) NOT NULL,
  `status` char(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `destination` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Recipient` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `basket_id`, `status`, `date`, `destination`, `Recipient`) VALUES
(1, 2, 2, 'Canceled', '2020-12-16', 'Cumhuriyet Mahallesi Onikişubat / Kahramanmaraş', 'Müzeyyen Alkap'),
(2, 3, 3, 'Pending', '2020-12-16', 'Cumhuriyet Mahallesi Efeler / Aydın', 'Ayşenur Çerçi'),
(3, 4, 4, 'Delivered', '2020-12-16', 'Yeni Mahalle Safranbolu / Karabük', 'Eda Türker'),
(4, 5, 5, 'Pending', '2020-12-16', 'Sabancı Üniversitesi Tuzla / İstanbul', 'Barış Altop'),
(5, 6, 6, 'Shipped', '2020-12-16', 'Sabancı Üniversitesi Tuzla / İstanbul', 'Duygu Altop'),
(6, 7, 7, 'Shipped', '2020-12-16', 'Yenidogan Mahallesi Etiler / İstanbul', 'Burcu Biricik'),
(7, 8, 8, 'Delivered', '2020-12-16', 'Mavi Mahallesi Beykoz / İstanbul', 'Serenay Sarıkaya'),
(8, 9, 9, 'Pending', '2020-12-16', 'Kireçburnu Sarıyer / İstanbul', 'Ali Atay'),
(9, 10, 10, 'Pending', '2020-12-16', 'Çengelköy Mahallesi Üsküdar / İstanbul', 'Emir Can İğrek'),
(10, 11, 11, 'Delivered', '2020-12-16', 'Renkli Mahallesi Efeler / Aydın', 'Merve Betül'),
(11, 12, 12, 'Pending', '2020-12-16', 'Gece Mahallesi Üsküdar / İstanbul', 'Teoman'),
(20, 3, 51, 'Shipped', '2021-01-10', 'Cumhuriyet Mahallesi Efeler / Aydın', 'Ayşenur Çerçi'),
(21, 3, 52, 'Canceled', '2021-01-10', 'ev', 'AyÅŸenur Ã‡erÃ§i'),
(22, 2, 16, 'Pending', '2021-01-13', 'ev', 'muzo'),
(23, 2, 55, 'Pending', '2021-01-13', 'kmaras', 'a'),
(24, 2, 56, 'Pending', '2021-01-13', 'kmaras', 'ben');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `category` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `description` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `color` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  `gender` char(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category`, `price`, `description`, `stock`, `color`, `size`, `gender`) VALUES
(1, 'Heels', 489, 'Stiletto', 100, 'purple', 39, 'Woman'),
(2, 'Heels', 489, 'Stiletto', 35, 'black', 39, 'Woman'),
(3, 'Boots', 689, 'Bootie', 22, 'red', 39, 'Woman'),
(4, 'Boots', 550, 'Leather-boots', 18, 'brown', 42, 'Man'),
(5, 'Boots', 550, 'Leather-boots', 20, 'black', 42, 'Man'),
(6, 'Sports', 500, 'Tennis-sneaker', 17, 'pink', 39, 'Woman'),
(7, 'Sports', 300, 'Child-sneaker', 49, 'blue', 32, 'Girl'),
(8, 'Sports', 300, 'Child-sneaker', 48, 'yellow', 33, 'Boy'),
(9, 'Boots', 700, 'Long-boots', 10, 'beige', 39, 'Woman'),
(10, 'Sandals', 189, 'Open-toe Sandal', 19, 'white', 39, 'Woman'),
(13, 'Heels', 450, 'Stiletto', 11, 'purple', 39, 'Woman'),
(14, 'Heels', 489, 'High', 10, 'white', 37, 'Woman'),
(15, 'Heels', 489, 'Platform', 20, 'black', 39, 'Woman'),
(16, 'Boots', 689, 'Platform', 10, 'red', 38, 'Woman'),
(17, 'Boots', 550, 'Pump', 10, 'brown', 39, 'Woman'),
(18, 'Casual', 550, 'Oxford', 20, 'black', 42, 'Man'),
(19, 'Boots', 500, 'Ankle-Boots', 20, 'pink', 39, 'Woman'),
(20, 'Heels', 249, 'High', 10, 'white', 38, 'Woman'),
(21, 'Heels', 379, 'Platform', 20, 'black', 39, 'Woman'),
(22, 'Boots', 349, 'Ankle-Boots', 10, 'red', 39, 'Woman'),
(23, 'Boots', 469, 'Pump', 10, 'brown', 39, 'Woman'),
(24, 'Casual', 340, 'Oxford', 20, 'grey', 41, 'Man'),
(25, 'Boots', 500, 'Ankle-Boots', 30, 'pink', 39, 'Woman');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baskets`
--
ALTER TABLE `baskets`
  ADD PRIMARY KEY (`basket_id`);

--
-- Indexes for table `comment_order`
--
ALTER TABLE `comment_order`
  ADD PRIMARY KEY (`product_id`,`customer_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `basket_id` (`basket_id`);

--
-- Indexes for table `includes`
--
ALTER TABLE `includes`
  ADD PRIMARY KEY (`basket_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`manager_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `basket_id` (`basket_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baskets`
--
ALTER TABLE `baskets`
  MODIFY `basket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `manager_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment_order`
--
ALTER TABLE `comment_order`
  ADD CONSTRAINT `comment_order_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `comment_order_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`basket_id`) REFERENCES `baskets` (`basket_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `includes`
--
ALTER TABLE `includes`
  ADD CONSTRAINT `includes_ibfk_1` FOREIGN KEY (`basket_id`) REFERENCES `baskets` (`basket_id`),
  ADD CONSTRAINT `includes_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`basket_id`) REFERENCES `baskets` (`basket_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
