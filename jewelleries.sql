-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2025 at 09:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jewelleries`
--

-- --------------------------------------------------------

--
-- Table structure for table `jewellery-collection`
--

CREATE TABLE `jewellery-collection` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `karat` int(11) NOT NULL,
  `color` varchar(150) NOT NULL,
  `size` float NOT NULL,
  `price` float NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jewellery-collection`
--

INSERT INTO `jewellery-collection` (`id`, `name`, `karat`, `color`, `size`, `price`, `image`) VALUES
(1, 'Ring', 18, 'gold', 16, 16000, '1745329686images (14).jpeg'),
(3, 'Necklace', 18, 'gold', 16, 17000, '1745272016111404130295-1__71353.jpg'),
(4, 'Necklace', 21, 'gold', 23, 40000, '1745275389d5ff7f62-b09a-4db1-8cd5-79e1a396f81a-500x500-K0dr0jIORbH7BTea27AJIRFZqSzaBevIQ007cnbc.jpg'),
(8, 'set', 18, 'blue', 17, 180000, '1745337835images (10).jpeg'),
(9, 'bracelet', 21, 'colorful', 17, 36500, '1745347528images (31).jpeg'),
(32, 'Ring', 14, 'silver', 15, 5500, '1745738856images (41).jpeg'),
(41, 'earrings', 21, 'green', 18, 22000, '1745759738images (27).jpeg'),
(42, 'Necklace', 22, 'colorful', 25, 30000, '1745759836images (25).jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `jewellery-collection-pdo`
--

CREATE TABLE `jewellery-collection-pdo` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `karat` int(11) NOT NULL,
  `color` varchar(150) NOT NULL,
  `size` float NOT NULL,
  `price` float NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jewellery-collection-pdo`
--

INSERT INTO `jewellery-collection-pdo` (`id`, `name`, `karat`, `color`, `size`, `price`, `image`) VALUES
(1, 'full set', 18, 'gold', 17, 134000, '174534816420161009-1116.jpg'),
(2, 'earrings', 18, 'white gold', 15, 16000, '17453482232948996-1931988744.jpg'),
(3, 'ring', 21, 'Rose', 17, 44000, '1745348381277656.jpeg.webp'),
(4, 'Ring', 21, 'gold', 17, 22000, '1745348436images (42).jpeg'),
(5, 'bracelet', 18, 'gold', 18, 45000, '174534848037338.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `description`) VALUES
(1, 'Super-Admin'),
(2, 'Create-Only'),
(3, 'Update-Only'),
(4, 'Delete-Only'),
(5, 'Read-Only');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `age` int(11) NOT NULL,
  `country` varchar(200) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `age`, `country`, `role_id`) VALUES
(1, 'Yasmin Ibrahim', 'yasminibrahim1522003@gmail.com', '$2y$10$4zKueTIw3aRFUuSyPFzzg.QWMLEbBBq.E5kBZGM9WSDuxAvDRsMae', '010234567894', 22, 'Egypt', 1),
(2, 'Mohamed Hussien', 'mohamedhussien@gmail.com', '$2y$10$tbITFAMC2RwwajGDO21w9.T9y/ubborNrLLh/O2u/LSVDvT3UXafG', '01023456789', 22, 'Egypt', 2),
(3, 'Farah Ibrahim', 'farahibrahim@gmail.com', '$2y$10$xMpoPB7w2zAQlhKoZah9c.zqBXwAult/tGB7giZAOGU3j2phc5h2K', '01000456789', 21, 'Egypt', 3),
(4, 'abdo Hussien', 'abdohussien@gmail.com', '$2y$10$92zgs3Awkfjskr39veBAh.11RuMRhNj1fYYBUCqKtAcCZb9cEJeuu', '01023456789', 18, 'Egypt', 4),
(6, 'Marwa Mohamed', 'marwamohamed@gmail.com', '$2y$10$198UjhmVN5fmJbToEzlFi.4dJg09jEHHMXFU4LqJSf5uFe9VheiPm', '12345678456', 12, 'Egypt', 5),
(7, 'Mona Mohamed', 'monamohamed@gmail.com', '$2y$10$nPI7y38Hfs6C3fcSdlSCAe1eGoxBD60RetoTldDSHlVKDKik6hVrW', '01023456789', 10, 'Egypt', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jewellery-collection`
--
ALTER TABLE `jewellery-collection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jewellery-collection-pdo`
--
ALTER TABLE `jewellery-collection-pdo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jewellery-collection`
--
ALTER TABLE `jewellery-collection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `jewellery-collection-pdo`
--
ALTER TABLE `jewellery-collection-pdo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
