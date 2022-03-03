-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 03, 2022 at 04:33 PM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Noza`
--

-- --------------------------------------------------------

--
-- Table structure for table `Cart`
--

CREATE TABLE `Cart` (
  `customerId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `pQuantity` int(11) NOT NULL,
  `unitPrice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Cart`
--

INSERT INTO `Cart` (`customerId`, `productId`, `pQuantity`, `unitPrice`) VALUES
(2, 3, 3, 64),
(2, 2, 2, 290),
(3, 1, 4, 128),
(1, 1, 5, 128);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Id` int(11) NOT NULL,
  `userName` varchar(40) NOT NULL,
  `passWord` varchar(40) DEFAULT NULL,
  `age` int(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Id`, `userName`, `passWord`, `age`, `email`, `FirstName`, `LastName`) VALUES
(1, 'keketty', 'Keke1234', 23, 'keketty@163.com', '', ''),
(2, 'kekett', 'keke123', 8, 'keketty1@163.com', '', ''),
(3, 'Colonelu\'', 'Alin2002', 20, 'ccostache@gmail.com', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `Id` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `traceCode` varchar(20) NOT NULL,
  `totalPrice` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`Id`, `customerId`, `status`, `traceCode`, `totalPrice`) VALUES
(125088, 2, 'OrderReceived', '0', '99'),
(134411, 2, 'OrderReceived', '0', '128'),
(154478, 1, 'OrderReceived', '0', '614'),
(166347, 1, 'OrderReceived', 'isauda8287', '4985'),
(167008, 2, 'OrderReceived', '0', '374'),
(178776, 1, 'OrderReceived', '0', '256'),
(181694, 1, 'BeingShipped', 'sayud6ad7', '5119'),
(183591, 2, 'OrderReceived', '0', '256'),
(188791, 2, 'OrderReceived', '0', '502'),
(192139, 2, 'OrderReceived', '0', '128'),
(219335, 2, 'OrderReceived', '0', '106'),
(219838, 2, 'OrderReceived', '0', '128'),
(225889, 3, 'OrderReceived', '0', '128'),
(230065, 1, 'OrderReceived', '0', '1185'),
(242178, 2, 'OrderReceived', '0', '499'),
(247407, 2, 'OrderReceived', '0', '128'),
(256070, 2, 'OrderReceived', '0', '740'),
(256504, 2, 'OrderReceived', '0', '789'),
(286965, 2, 'OrderReceived', '0', '187'),
(305580, 2, 'OrderReceived', '0', '192'),
(324543, 2, 'OrderReceived', '0', '160'),
(325472, 2, 'BeingPacked', '0', '4922'),
(332144, 2, 'OrderReceived', '0', '40'),
(350947, 2, 'OrderReceived', '0', '448'),
(354216, 2, 'OrderReceived', '0', '145'),
(357588, 2, 'OrderReceived', '0', '40'),
(364714, 1, 'OrderReceived', '0', '418'),
(365084, 1, 'OrderReceived', '0', '106'),
(386176, 2, 'OrderReceived', '0', '297'),
(386584, 2, 'OrderReceived', '0', '700'),
(401768, 2, 'OrderReceived', '0', '700'),
(405757, 2, 'OrderReceived', '0', '681'),
(410258, 2, 'OrderReceived', '0', '40'),
(416914, 2, 'OrderReceived', '0', '231'),
(417672, 2, 'OrderReceived', '0', '512'),
(418855, 2, 'OrderReceived', '0', '128'),
(437386, 2, 'OrderReceived', '0', '143'),
(470311, 2, 'OrderReceived', '0', '64'),
(473798, 2, 'OrderReceived', '0', '192'),
(473809, 2, 'OrderReceived', '0', '40'),
(487275, 1, 'OrderReceived', '0', '1563'),
(505365, 1, 'BeingShipped', '92wd093tar', '5056'),
(512199, 2, 'OrderReceived', '0', '128'),
(524591, 1, 'OrderReceived', '0', '256'),
(528670, 1, 'BeingShipped', '12asd78ae', '5119'),
(529378, 2, 'OrderReceived', '0', '70'),
(556207, 2, 'OrderReceived', '0', '40'),
(564046, 1, 'OrderReceived', '0', '40'),
(587341, 1, 'BeingShipped', '1as2asd2ad2sada', '4670'),
(617515, 1, 'OrderReceived', '0', '80'),
(620008, 2, 'OrderReceived', '0', '192'),
(646363, 1, 'OrderReceived', '0', '700'),
(657891, 1, 'OrderReceived', '0', '128'),
(659100, 1, 'OrderReceived', '0', '40'),
(670893, 1, 'OrderReceived', '0', '63'),
(675191, 1, 'OrderReceived', '0', '40'),
(688103, 1, 'OrderReceived', '0', '200'),
(701738, 1, 'OrderReceived', '0', '209'),
(707141, 2, 'OrderReceived', '0', '145'),
(720253, 1, 'OrderReceived', '0', '40'),
(726948, 2, 'OrderReceived', '0', '40'),
(762148, 1, 'OrderReceived', '0', '40'),
(763950, 1, 'BeingPacked', '12', '4733'),
(768662, 1, 'BeingShipped', 'adasd82e8', '231'),
(772882, 1, 'OrderReceived', '0', '126'),
(777330, 1, 'OrderReceived', '0', '40'),
(785445, 1, 'OrderReceived', '12', '5119'),
(794390, 1, 'OrderReceived', '0', '40'),
(799264, 1, 'OrderReceived', '0', '2960'),
(799765, 2, 'OrderReceived', '0', '128'),
(802997, 1, 'OrderReceived', '0', '915'),
(808559, 1, 'OrderReceived', '0', '63'),
(812074, 1, 'OrderReceived', '0', '120'),
(821884, 1, 'OrderReceived', '0', '75'),
(825772, 1, 'OrderReceived', '0', '30'),
(839097, 3, 'OrderReceived', '0', '128'),
(839765, 1, 'OrderReceived', '0', '200'),
(841027, 1, 'OrderReceived', '0', '1819'),
(842383, 1, 'BeingPacked', '12', '4193'),
(853868, 1, 'OrderReceived', '0', '40'),
(856697, 2, 'OrderReceived', '0', '40'),
(869729, 1, 'OrderReceived', '0', '40'),
(874583, 1, 'BeingPacked', '12', '4670'),
(880856, 1, 'OrderReceived', '0', '126'),
(885515, 1, 'OrderReceived', '0', '930'),
(885725, 1, 'OrderReceived', '0', '1155'),
(910276, 1, 'OrderReceived', '0', '80'),
(911391, 1, 'OrderReceived', '0', '40'),
(917895, 1, 'OrderReceived', '0', '200'),
(919205, 1, 'BeingPacked', '12', '4670'),
(927437, 1, 'OrderReceived', '0', '63'),
(929180, 2, 'OrderReceived', '0', '40'),
(935248, 1, 'BeingShipped', '7sadaud89', '160'),
(945420, 1, 'BeingShipped', 'jsak812', '252'),
(951870, 1, 'BeingShipped', 'isauodiua38', '2100'),
(975217, 1, 'BeingShipped', 'sadasdj2', '60'),
(982212, 1, 'BeingShipped', '12asdad82e8', '4670'),
(993205, 1, 'OrderReceived', '0', '40');

-- --------------------------------------------------------

--
-- Table structure for table `orderPicker`
--

CREATE TABLE `orderPicker` (
  `pPass` varchar(16) NOT NULL,
  `pUser` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderPicker`
--

INSERT INTO `orderPicker` (`pPass`, `pUser`) VALUES
('kekeqweasd', 'keketty');

-- --------------------------------------------------------

--
-- Table structure for table `orderProduct`
--

CREATE TABLE `orderProduct` (
  `Id` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `unitPrice` decimal(12,2) NOT NULL DEFAULT '0.00',
  `quantity` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Id` int(11) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `unitPrice` decimal(12,2) DEFAULT '0.00',
  `description` varchar(1000) NOT NULL DEFAULT '0',
  `category` varchar(40) NOT NULL,
  `discountStartDate` date NOT NULL,
  `discountEndDate` date NOT NULL,
  `imgInfo` varchar(1000) NOT NULL,
  `pQuantity` int(11) NOT NULL,
  `AllowAge` tinyint(1) NOT NULL,
  `stock` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `realPrice` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Id`, `productName`, `unitPrice`, `description`, `category`, `discountStartDate`, `discountEndDate`, `imgInfo`, `pQuantity`, `AllowAge`, `stock`, `discount`, `realPrice`) VALUES
(1, 'Smart Watch', '128.00', 'This is a nice watch.', 'watch', '2022-05-05', '2022-09-12', 'img/product-image/5.png', 0, 18, 44, 25, '128.00'),
(2, 'PhoneEleven', '290.00', '[value-4]', 'phone', '2022-01-02', '2022-02-01', 'img/product-image/phone11.png', 0, 18, 0, 75, '290.00'),
(3, 'GreenHear', '64.60', 'asda', 'phone', '2022-09-02', '2022-09-08', 'img/product-image/2.png', 0, 26, 14, 25, '64.60'),
(4, 'GreyEarPhone', '81.25', 'Lorem ipsum dolor sit amet, consecte adipisicing\n        elit, sed do eiusmll tempor incididunt ut labore \n        et dolore magna aliqua. Ut enim ad mill veniam, \n        quis nostrud exercitation ullamco laboris nisi ut\n        aliquip exet commodo consequat. Duis aute \n        irure dolor.', 'computer', '2022-02-12', '2022-03-17', 'img/product-image/4.png', 0, 7, 0, 75, '325.00'),
(5, 'WhiteLamp', '60.00', '[value-4]', 'light', '2022-01-01', '2022-09-01', 'img/product-image/3.png', 0, 0, 1, 25, '80.00'),
(6, 'RobotCleaner', '187.00', 'Lorem ipsum dolor sit amet, consecte adipisicing\n        elit, sed do eiusmll tempor incididunt ut labore \n        et dolore magna aliqua. Ut enim ad mill veniam, \n        quis nostrud exercitation ullamco laboris nisi ut\n        aliquip exet commodo consequat. Duis aute \n        irure dolor.', 'robot', '0101-01-01', '0101-01-01', 'img/product-image/7.png', 0, 25, 20, 73, '187.00'),
(11, 'Orange IPhone', '106.40', 'Lorem ipsum dolor sit amet, consecte adipisicing\n        elit, sed do eiusmll tempor incididunt ut labore \n        et dolore magna aliqua. Ut enim ad mill veniam, \n        quis nostrud exercitation ullamco laboris nisi ut\n        aliquip exet commodo consequat. Duis aute \n        irure dolor.', 'computer', '2022-02-08', '2022-08-08', 'img/product-image/1.png', 0, 18, 4, 60, '266.00'),
(12, 'Sound Speaker', '99.00', 'The 500 watt RMS power turns every evening into a premiere and delivers overwhelming sound that lets you keep your home (and the whole neighborhood!) on its base vests can make shaking\r\nThese speakers meet the strict performance requirements set for THX approval; so you can rest assured that your entertainment will sound as it should be\r\nDigital decoding enables detailed surround sound in your soundtracks with Dolby Digital or DTS coding, from the bulder of a crowd to the footsteps right behind you\r\nMultiple inputs allow you to connect up to six components simultaneously: Connect your TV, Blu-Ray, DVD player, Xbox 360, PLAYSTATION3, Wii, iPod, PC, and more\r\nYou have the strings in hands with the control panel and the wireless remote control; select inputs and tune the surround sound and volume levels to your listening experience', 'otherProduct', '0101-01-01', '0101-01-01', 'img/product-image/SurroundSoundSpeaker.png', 0, 16, 93, 50, '99.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IndexOrderCustomerId` (`customerId`);

--
-- Indexes for table `orderProduct`
--
ALTER TABLE `orderProduct`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IndexOrderItemOrderId` (`orderId`),
  ADD KEY `IndexOrderItemProductId` (`productId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IndexProductName` (`productName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=993206;

--
-- AUTO_INCREMENT for table `orderProduct`
--
ALTER TABLE `orderProduct`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK_ORDER_REFERENCE_CUSTOMER` FOREIGN KEY (`customerId`) REFERENCES `customer` (`Id`);

--
-- Constraints for table `orderProduct`
--
ALTER TABLE `orderProduct`
  ADD CONSTRAINT `FK_ORDERITE_REFERENCE_ORDER` FOREIGN KEY (`orderId`) REFERENCES `order` (`Id`),
  ADD CONSTRAINT `FK_ORDERITE_REFERENCE_PRODUCT` FOREIGN KEY (`productId`) REFERENCES `product` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
