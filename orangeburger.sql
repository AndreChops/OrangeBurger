-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2021 at 02:01 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orangeburger`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `nama` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`nama`, `harga`, `deskripsi`, `gambar`, `kategori`) VALUES
('Black Burger', 32500, 'Perpaduan roti burger hitam dengan daging sapi, keju, mayonaise, acar dan potongan bawang.', 'burger-black.jpg', 'burger'),
('Cheeseburger', 28500, 'Perpaduan roti burger dengan daging sapi, keju, tomat, selada, acar, potongan bawang bombai dan mustard.', 'burger-cheese.jpg', 'burger'),
('Cheeseburger Deluxe', 33900, 'Perpaduan roti burger dengan daging sapi, keju, saus tomat, selada, acar, potongan bawang dan mustard.', 'burger-cheese-deluxe.jpg', 'burger'),
('Cola', 10900, 'Minuman berkarbonasi dengan rasa cola.', 'beverage-cola.jpg', 'beverages'),
('Double Beef Burger', 38900, 'Perpaduan roti burger dengan 2 lapisan daging sapi, keju, saus tomat, selada, acar, potongan bawang dan mustard.', 'burger-double-beef.jpg', 'burger'),
('Double Beef Burger Extra', 44900, 'Perpaduan roti burger dengan 2 lapisan daging sapi dengan tambahan daging bacon, 2 lapisan keju, acar dan mustard.', 'burger-double-beef-extra.jpg', 'burger'),
('French Fries BBQ', 22500, 'Kentang goreng dengan rasa barbeque yang lezat.', 'french-fries-bbq.jpg', 'french fries'),
('French Fries Cheddar', 22500, 'Kentang goreng dengan balutan keju cheddar yang lezat.', 'french-fries-cheddar.jpg', 'french fries'),
('French Fries Mozzarella', 24500, 'Kentang goreng yang renyah dan gurih dengan taburan keju mozzarella.', 'french-fries-mozzarella.jpg', 'french fries'),
('French Fries Original', 25500, 'Kentang goreng yang renyah dan gurih.', 'french-fries-original.jpg', 'french fries'),
('Iced Tea', 6000, 'Minuman teh yang dingin dan segar.', 'beverage-iced-tea.jpg', 'beverages'),
('Lemon Tea', 10900, 'Teh rasa buah lemon yang segar.', 'beverage-lemon-tea.jpg', 'beverages'),
('Milo', 15000, 'Susu coklat Milo yang segar dan bernutrisi.', 'beverage-milo.jpg', 'beverages'),
('Mineral Water', 5000, 'Air Mineral kemasan yang segar dan higienis.', 'beverage-mineral-water.jpg', 'beverages'),
('Orange Juice', 11900, 'Minuman rasa jeruk yang segar.', 'beverage-orange-juice.jpg', 'beverages');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `bdate` date NOT NULL,
  `gender` varchar(1) NOT NULL,
  `role` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`fname`, `lname`, `username`, `email`, `password`, `bdate`, `gender`, `role`) VALUES
('nick', 'name', 'admin', 'admin12345@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2001-01-01', 'M', 'admin'),
('depan', 'belakang', 'depanbelakang', 'depanbelakang@gmail.com', '7a81f7d6b476c00a9f8b3870b6c098f6', '0000-00-00', '', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`nama`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `username` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
