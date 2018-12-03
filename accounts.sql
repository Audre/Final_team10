-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 03, 2018 at 04:32 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accounts`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `weight` double NOT NULL,
  `unitsInStorage` int(11) NOT NULL,
  `dimension` varchar(50) NOT NULL,
  `description` longtext NOT NULL,
  `imagePath` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `name`, `price`, `weight`, `unitsInStorage`, `dimension`, `description`, `imagePath`, `thumbnail`, `category`) VALUES
(1, 'Canon - EOS R Mirrorless Camera with RF 24-105 mm f/4L IS USM Lens', 5, 2, 0, '20', 'A full-frame 30.3 Megapixel sensor with impressive detail, ISO performance and Dual Pixel CMOS AF. Alongside the RF lenses, EOS R offers the ultimate shooting experience to take your storytelling further.\r\n', 'canon_camera.jpg', 'canon_camera_thumbnail.jpg', 'camera'),
(2, 'Targus - 67\" Monopod - Black\r\n', 2, 1, 2, '3', 'Steady your camera, GoPro or smartphone as you move around with this Targus monopod. It extends up to 67 inches and quickly folds to a compact 21 inches thanks to its quick-release leg locks. This Targus monopod has a rubber foot pad and ground spike for easier stabilization on a variety of surfaces.', 'targus_tripod.jpg', 'targus_tripod_thumbnail.jpg', 'tripod'),
(3, 'Canon - EF 24-70 mm f/2.8L III USM Standard Zoom Lens - Black', 3, 1, 5, '5 x 10', 'Built to handle the demands of professional use, this lens is durable as well as dust- and water-resistant. Fluorine coatings on the front and rear surfaces keep smudges and fingerprints to a minimum.', 'canon_lens.jpg', 'canon_lens_thumbnail.jpg', 'lens'),
(4, 'Hoya - EVO 82 mm Antistatic UV Lens Filter\r\n', 2, 1, 10, '10 x 2', 'With 16 layers of multicoating, including an antistatic top layer, this Hoya EVO XEVA-82UV 82mm lens filter delivers a durable design that resists dust, water, stains, scratches and smudges. The UV properties help you capture clear, haze-free images.', 'hoya_filter.jpg', 'hoya_filter_thumbnail.jpg', 'filter'),
(5, 'SanDisk - Extreme Pro 64 GB SDXC UHS-I Memory Card', 1, 1, 20, '5 x 10', 'This SanDisk Extreme Pro SDSDXP-064G-A46 64GB SDXC UHS-I memory card features Power Core technology to support real-time, full high-definition 3D video and continuous burst mode with more shots saved.', 'sandisk_memory_card.jpg', 'sandisk_memory_card_thumbnail.jpg', 'memory card'),
(6, 'Canon - EF 75-300mm f/4-5.6 III Telephoto Zoom Lens - Multi', 4, 1, 10, '5x10', 'Canon - EF 75-300mm f/4-5.6 III Telephoto Zoom Lens - Multi', 'lens3.jpg', 'lens3_thumbnail.pgj', 'lens'),
(7, 'Sunpak - 5555DLX 55\" Tripod - Black', 4, 1, 5, '3', 'Take professional-quality still photos with this Sunpak tripod. Its 55-inch height supports smartphones, cameras and GoPros, so you can take stable pictures in the field.', 'tripod3.jpg', 'tripod3_thumbnail.jpg', 'tripod'),
(8, 'Platinum - 58mm Circular Polarizer Lens Filter', 3, 1, 10, '4', 'Take stunning landscape shots with this Platinum PT-MCCP58 circular polarizer filter that features quality glass material to ensure efficient performance. The multicoated design minimizes internal lens flare and reflections, delivering enhanced contrast.\r\n\r\n', 'filter2.jpg', 'filter2_thumbnail.jpg', 'filter'),
(9, 'Samsung - EVO Plus 128GB microSDXC UHS-I Memory Card', 5, 1, 5, '1', 'Expand your device’s storage capacity with this Samsung 128GB Evo Plus MicroSDXC memory card. This efficient storage device writes data at up to 90MB/S, making it ideal for HD cameras and other demanding gadgets. Use the adapter included with this Samsung 128GB Evo Plus MicroSDXC memory card to sync data via a regular SD card slot.', 'memorycard2.jpg', 'memorycard2_thumbnail.jpg', 'memory card'),
(10, 'Sony - Alpha a6000 Mirrorless Camera with 16-50mm and 55-210mm Lenses - Black', 6, 1, 10, '15', 'With its 24.3-megapixel Exmor CMOS sensor and interchangeable lenses, this mirrorless camera allows you to capture sharp, realistic pictures for yourself or your clients. If you want to share stored photos, simply connect wireless devices to the camera\'s built-in Wi-Fi.', 'camera2.jpg', 'camera2_thumbnail.jpg', 'camera'),
(11, 'Canon - PowerShot SX730 HS 20.3-Megapixel Digital Camera - Black', 7, 1, 10, '3', 'Capture compelling images with this adaptable Canon PowerShot SX730 camera. Compact and powerful, this unit takes stellar macro shots and comes with a 40x zoom with integrated image stabilization technology for crisp long-distance photographs. Transfer images to your computer in seconds via WiFi or Bluetooth with this Canon PowerShot SX730 camera.\r\n\r\n', 'camera4.jpg', 'camera4_thumbnail.jpg', 'camera');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `giftcard_balance` int(11) NOT NULL DEFAULT '500',
  `active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `first_name`, `last_name`, `email`, `password`, `giftcard_balance`, `active`) VALUES
(1, 'Kierra', 'Johnson', 'kierrajk@aol.com', '019b111ec0c13ed923922715bfb1670a', 500, 0),
(2, 'Kierra', 'Johnson', 'kj', '019b111ec0c13ed923922715bfb1670a', 500, 0),
(3, 'K', 'J', 'kjk', '$2y$10$CV0hENw4ncaR6EvLcW.Dq.xXgChYUulMxh.4oXcVBgPY91QY/Xymi', 500, 0),
(4, 'Kie', 'John', 'k', '$2y$10$2EBVTdWYqNKs5k5b5meeX.7wSxOX1eI/gcbpuDNfL2fQACccvJEIy', 500, 0),
(5, 'Nash', 'Irwin', 'ni', '$2y$10$qY/FY5dyL6rIUDXPFg1xUeFW/RCnzK6hOBqHE0z1trjtshBGIcY9K', 500, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
