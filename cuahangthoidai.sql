-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2022 at 10:50 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cuahangthoidai`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `name` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`name`, `id`) VALUES
('AALIYAH ', 5),
('CAMILA CABELLO ', 9),
('HIỀN NGUYỄN SOPRANO ', 11),
('JASON MRAZ ', 8),
('KENDRICK LAMAR ', 6),
('KHÓI ', 4),
('MADONNA ', 7),
('SILK SONIC ', 10);

-- --------------------------------------------------------

--
-- Table structure for table `disks`
--

CREATE TABLE `disks` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `img` varchar(200) NOT NULL,
  `page` int(11) NOT NULL,
  `author` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL CHECK (`rating` >= 0 and `rating` <= 5),
  `authorid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `disks`
--

INSERT INTO `disks` (`id`, `name`, `price`, `img`, `page`, `author`, `type`, `title`, `rating`, `authorid`) VALUES
(767, 'KHÓI - NOTE BUỒN TRÊN CÁT - ĐĨA CD', 280, 'https://product.hstatic.net/1000304920/product/khoi-note-buon-tren-cat-dia-cd_5a5b70e365fe44a0a37cebf02ad0d040_grande.jpg', 1, 'KHÓI ', ' ĐĨA CD', ' NOTE BUỒN TRÊN CÁT ', 0, 4),
(768, 'AALIYAH - ULTIMATE AALIYAH (VINYL 3LP) - ĐĨA THAN', 950, 'https://product.hstatic.net/1000304920/product/aaliyah-ultimate-aaliyah-vinyl-3lp-dia-than_6c071110ba944191ab5fffc201d2de4a_grande.jpg', 1, 'AALIYAH ', ' ĐĨA THAN', ' ULTIMATE AALIYAH (VINYL 3LP) ', 0, 5),
(769, 'AALIYAH - ONE IN A MILLION (VINYL 2LP) - ĐĨA THAN', 850, 'https://product.hstatic.net/1000304920/product/aaliyah-one-in-a-million-vinyl-2lp-dia-than_85ff30d15d8b4481bc743c9772235bc9_grande.png', 1, 'AALIYAH ', ' ĐĨA THAN', ' ONE IN A MILLION (VINYL 2LP) ', 0, 5),
(770, 'AALIYAH - I CARE 4 U (VINYL 2LP) - ĐĨA THAN', 850, 'https://product.hstatic.net/1000304920/product/aaliyah-i-care-4-u-vinyl-2lp-dia-than_b6baaa308e754edab15ecc8b0f990810_grande.jpeg', 1, 'AALIYAH ', ' ĐĨA THAN', ' I CARE 4 U (VINYL 2LP) ', 0, 5),
(771, 'KENDRICK LAMAR - MR. MORALE & THE BIG STEPPERS (VINYL 2LP) - ĐĨA THAN', 1, 'https://product.hstatic.net/1000304920/product/kendrick-lamar-mr-morale-the-big-steppers-vinyl-2lp-dia-than_fd769ad4e69e4b7ba33ab130fb5894ff_grande.png', 1, 'KENDRICK LAMAR ', ' ĐĨA THAN', ' MR. MORALE & THE BIG STEPPERS (VINYL 2LP) ', 0, 6),
(772, 'MADONNA - FINALLY ENOUGH LOVE (VINYL LP) - ĐĨA THAN', 1, 'https://product.hstatic.net/1000304920/product/madonna-finally-enough-love-vinyl-lp-dia-than_9d942f999d164c66bf7a3dd8a8efb8d2_grande.jpeg', 1, 'MADONNA ', ' ĐĨA THAN', ' FINALLY ENOUGH LOVE (VINYL LP) ', 0, 7),
(773, 'JASON MRAZ - MR. A-Z (VINYL 2LP) - ĐĨA THAN', 1, 'https://product.hstatic.net/1000304920/product/jason-mraz-mr-a-z-vinyl-2lp-dia-than_51fba96cd38d408f8185036db9e9941f_grande.jpg', 1, 'JASON MRAZ ', ' ĐĨA THAN', ' MR. A-Z (VINYL 2LP) ', 0, 8),
(774, 'CAMILA CABELLO - FAMILLIA (VINYL LP) - ĐĨA THAN', 750, 'https://product.hstatic.net/1000304920/product/camila-cabello-famillia-vinyl-lp-dia-than_87f216657ac0477bbcb952f09a6c4610_grande.jpg', 1, 'CAMILA CABELLO ', ' ĐĨA THAN', ' FAMILLIA (VINYL LP) ', 0, 9),
(775, 'SILK SONIC - AN EVENING WITH SILK SONIC (VINYL LP) - ĐĨA THAN', 850, 'https://product.hstatic.net/1000304920/product/silk-sonic-an-evening-with-silk-sonic-vinyl-lp-dia-than_baa016714b354b8cbb08c7c754941229_grande.jpg', 1, 'SILK SONIC ', ' ĐĨA THAN', ' AN EVENING WITH SILK SONIC (VINYL LP) ', 0, 10),
(776, 'HIỀN NGUYỄN SOPRANO - YÊU & MƠ - ĐĨA CD', 280, 'https://product.hstatic.net/1000304920/product/hien-nguyen-soprano-yeu-mo-dia-cd_a4271bff34c04919ae53589604fa0554_grande.jpeg', 1, 'HIỀN NGUYỄN SOPRANO ', ' ĐĨA CD', ' YÊU & MƠ ', 0, 11);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `createAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `createAt`) VALUES
(1, 'trivandeptrai', 'trivandeptrai', '2022-10-17 04:59:42'),
(6, 'triliemdeptrai', 'triliemdeptrai', '2022-10-17 05:07:44'),
(8, 'trivan', '$2y$12$m6UXbhXl7hKnI68Hp3LNlu5.RKsKnhA.jqMMPGKQmUecFG3E/TWbK', '2022-10-17 06:14:19'),
(9, 'triliem', '$2y$12$G18TXCax.duvrQCt.90HKuhMFJRmOSO7fOw5F6Ne9LlixTdN44mD6', '2022-10-17 13:58:41'),
(11, 'a', '$2y$12$1Vf/8ujpTODfAv.k./dhreK7qraru5ab9sTu/gClV/.Xod8HhgMhG', '2022-10-17 14:00:58'),
(29, 'ElliottMarilou', '$2y$12$X6eZ7ABLSBaZzmuBaCB.8eZ0Jw0Hh9OHmF7iLejttMKkEyJji1ywS', '2022-10-24 09:17:34'),
(30, 'DonavonTheodora', '$2y$12$PwyqXlbWAhJ0.pBTHlAIcOLVPo739SI4uu1/dmz83/3ynL6ij1GhW', '2022-10-24 09:18:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `disks`
--
ALTER TABLE `disks`
  ADD PRIMARY KEY (`id`,`author`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `disks`
--
ALTER TABLE `disks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=777;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
