-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2018 at 08:31 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `beer`
--

CREATE TABLE `beer` (
  `Beer_id` int(10) NOT NULL,
  `Beer_name` varchar(100) NOT NULL,
  `Beer_volume` varchar(100) NOT NULL,
  `Beer_brand` varchar(100) NOT NULL,
  `Beer_category` varchar(100) NOT NULL,
  `Beer_country` varchar(100) NOT NULL,
  `Beer_details` varchar(1000) NOT NULL,
  `Beer_price` varchar(10) NOT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beer`
--

INSERT INTO `beer` (`Beer_id`, `Beer_name`, `Beer_volume`, `Beer_brand`, `Beer_category`, `Beer_country`, `Beer_details`, `Beer_price`, `image`) VALUES
(1, 'Arna Premium Bottle 650ML', '650 ML', 'Arna', 'Beer / Domestic Beer ', 'Nepal', 'Arna Premium Lager, the hallmark in beer brewing standards, is a pure, crisp & clean Himalayan classic beer.\r\n\r\nBrewed with the finest malted barley, European hops and pure Himalayan water.', 'Rs. 260', 'Arna Premium.png'),
(2, 'Tuborg Classic Premium Strong Bottle 650ML', '650ML', 'Tuborg', 'Beer / Domestic Beer', 'Nepal', 'Tuborg Classic with Scotch Malts is the perfect combination of strong and smooth. Made with Scotch malts, it gives you a rich taste that complements its strong flavor. Superior quality malts and hops make your drinking experience easy and smooth.\r\n\r\nTuborg Classic is a rich tasting strong beer that offers the new generation of beer lovers a distinctive premium product.', 'Rs. 310', 'Touborg.jpeg'),
(3, 'Tuborg Classic Premium Strong Bottle 650ML', '650ML', 'Tuborg', 'Beer / Domestic Beer', 'Nepal', 'Tuborg Classic with Scotch Malts is the perfect combination of strong and smooth. Made with Scotch malts, it gives you a rich taste that complements its strong flavor. Superior quality malts and hops make your drinking experience easy and smooth.\r\n\r\nTuborg Classic is a rich tasting strong beer that offers the new generation of beer lovers a distinctive premium product.', 'Rs. 310', 'Touborg.jpeg'),
(4, 'Heineken Can 500ML', '500ML', 'Heineken', 'Beer / Imported Beer', 'Neitherlands', 'Heineken is a pale lager beer with 5% alcohol by volume produced by the Dutch brewing company Heineken International. Heineken is well known for its signature green bottle and red star.', 'Rs. 360', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(15) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `units` int(5) NOT NULL,
  `total` int(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_code`, `product_name`, `product_desc`, `price`, `units`, `total`, `date`, `email`) VALUES
(22, 'Soft drinks', 'Diet coke', 'a soft drink which is suitable to have and share in all the occasion.', 100, 1, 100, '2018-01-25 12:43:42', 'hy@gmail.com'),
(21, 'Branded whisky', 'Blue label premium', 'a authentic soft taste and over 20 years stored whiskey ', 20000, 2, 40000, '2018-01-25 12:38:18', 'sujan.stha@gmail.com'),
(19, 'WINES', 'Big Master', 'a local home made perfect wine for your taste.', 500, 1, 500, '2018-01-16 19:44:29', 'admin@admin.com'),
(20, 'Rum', ' Khukri XXX Rum 750ML', '  This award winning rum stands as the classic rum of the Himalayas.  Smooth, full-bodied, with an elegant finish and a hint of oak, each bottle beckons the gifts of tradition, unchanging, and a character that never gets old.', 1300, 1, 1300, '2018-01-25 12:33:20', 's@gmail.com'),
(15, 'Soft drinks', 'Diet coke', 'a soft drink which is suitable to have and share in all the occasion.', 100, 3, 300, '2018-01-14 05:03:52', 'sujan.stha@gmail.com'),
(16, 'Branded whisky', 'Blue label premium', 'a authentic soft taste and over 20 years stored whiskey that will simply blend with you.', 20000, 1, 20000, '2018-01-14 05:03:52', 'sujan.stha@gmail.com'),
(17, 'Casburg', 'Beer', 'sfdkbkvhbdlf', 300, 1, 300, '2018-01-14 07:09:20', 'abc@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_code` varchar(60) NOT NULL,
  `product_name` varchar(1000) NOT NULL,
  `product_desc` longtext NOT NULL,
  `product_img_name` longtext NOT NULL,
  `qty` int(10) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_desc`, `product_img_name`, `qty`, `price`) VALUES
(1, 'WINES', 'Big Master', 'a local home made perfect wine for your taste.', 'm.jpg', 29, '500.00'),
(2, 'Branded whisky', 'Blue label premium', 'a authentic soft taste and over 20 years stored whiskey ', 'd.jpg', 17, '20000.00'),
(3, 'Soft drinks', 'Diet coke', 'a soft drink which is suitable to have and share in all the occasion.', 'e.jpg', 29, '100.00'),
(14, 'Beer', 'Arna Premium Bottle 650ML', 'Arna Premium Lager, the hallmark in beer brewing standards, is a pure, crisp & clean Himalayan classic beer.  Brewed with the finest malted barley, European hops and pure Himalayan water.', '1516161119-Arna Premium Bottle 650ML.png', 50, '260.00'),
(16, 'Beer', ' Heineken Can 500ML', 'Heineken is a pale lager beer with 5% alcohol by volume produced by the Dutch brewing company Heineken International. Heineken is well known for its signature green bottle and red star.', '1516783032- Heineken Can 500ML.png', 3000, '360.00'),
(17, 'Rum', 'Bacardi Gold 1L', '  Bacardi Gold is expertly crafted by Maestros de Ron Bacardi. Its rich flavors and golden complexion are developed in toasted oak barrels and its mellow character comes from being shaped through a secret blend of charcoals.  Bacardi Gold features rich va', '1516783164-Bacardi Gold 1L.png', 35000, '3350.00'),
(18, 'Rum', ' Khukri XXX Rum 750ML', '  This award winning rum stands as the classic rum of the Himalayas.  Smooth, full-bodied, with an elegant finish and a hint of oak, each bottle beckons the gifts of tradition, unchanging, and a character that never gets old.', '1516783213- Khukri XXX Rum 750ML.png', 24999, '1300.00'),
(19, 'Rum', 'Old Monk XXX 750ML', 'Old Monk Rum is one of the most iconic rum brands of the world. The Old Monk XXX Rum contains blends which are matured for over 7 Years at a historically old distillery which dates back to 1855. ', '1516783306-Old Monk XXX 750ML.png', 130000, '1300.00'),
(20, 'Vodka', 'Ruslan 750ML', 'Ruslan Vodka at 70 proof is clear in colour, clean and crisp. Matching up the connoisseurs of rich taste, Ruslan Vodka has few equals when it comes to enlivening moments.', '1516783393-Ruslan 750ML.png', 50000, '1250.00'),
(21, 'Vodka', 'Absolut Blue 1L', 'Absolut Vodka is a Swedish vodka made exclusively from natural ingredients, and unlike some other vodkas, it doesnâ€™t contain any added sugar. Rich, full-bodied and complex, yet smooth and mellow.', '1516783426-Absolut Blue 1L.png', 4000, '4600.00'),
(23, 'Wine', 'JP Chenet Sweet Red 750ML', '  Colour: Translucent, ruby red, of medium intensity.  Nose: Very fruity (red berries, blackcurrant, red currants), delicate with spicy notes.  Palate: Smooth, round and supple, very mellow.  Recommendations: This red wine is the perfect partner for spicy', '1516796153-JP Chenet Sweet Red 750ML.png', 2200, '1225.00'),
(24, 'Wine', 'Divine Wine Sweet Red 750ML', '  An irresistible wine whose elegance draws you subliminally its orbit. Intense in color, it is redolent of a profusion of aromas of tea leaves, spices and flowers. The abundance of fruit sensations is often complemented by warm alcohol and gripping tanni', '1516796329-Divine Wine Sweet Red 750ML.png', 55000, '410.00'),
(63, 'Tobacco', 'Surya Kings Red 10', 'A quality product from Surya Nepal Pvt. Ltd.', '1516994147-Surya Kings Red 10.png', 2000, '95.00'),
(64, 'Tobacco', 'Marlboro Red 20', 'Marlboro is one of the most popular tobacco brands at the US market.', '1516994235-Marlboro Red 20.png', 2000, '220.00'),
(65, 'Tobacco', 'Winston Regular 20', 'Winston is the No.1 tobacco brand in 12 markets. It is the global No.2 tobacco brand and sold over 118 markets around the world.', '1516994277-Winston Regular 20.png', 2000, '180.00'),
(66, 'Whiskey', 'Officers Choice Blue 750ML', 'Officerâ€™s Choice Blue is a premium variant of Officerâ€™s Choice brand. It is made from a fine blend of scotch malts and select Indian grain spirits. ', '1516994348-Officers Choice Blue 750ML.png', 6000, '1270.00'),
(67, 'Whiskey', 'Jack Daniels 1L', 'Officers Choice Blue is a premium variant of Officerâ€™s Choice brand. It is made from a fine blend of scotch malts and select Indian grain spirits.  An elegantly designed, well-shaped pack gives it a premium and scotch-like look and feel.  It has earned the distinction of being the first brand in the alcobev industry to introduce the innovative Twist-Lock and Tear-Off caps.', '1516994420-Jack Daniels 1L.png', 6000, '5370.00'),
(68, 'Whiskey', 'Chivas Regal 12yrs 1L', 'Chivas Regal is a blend of many different malt and grain Scotch whiskies, matured for at least 12 years. From the oldest operating distillery in the Scottish Highlands, Chivas Regal has been famous for its extraordinary selection of malt Whiskies.', '1516994570-Chivas Regal 12yrs 1L.png', 8000, '5970.00'),
(69, 'Vodka', 'Absolut Blue 1L', 'Absolut Vodka is a Swedish vodka made exclusively from natural ingredients, and unlike some other vodkas, it doesnâ€™t contain any added sugar. Rich, full-bodied and complex, yet smooth and mellow.', '1516994614-Absolut Blue 1L.png', 8000, '4600.00'),
(70, 'Beer', 'Tuborg Classic Premium Strong Bottle 650ML', 'Tuborg Classic with Scotch Malts is the perfect combination of strong and smooth. Made with Scotch malts, it gives you a rich taste that complements its strong flavor. Superior quality malts and hops make your drinking experience easy and smooth.', '1516994671-Tuborg Classic Premium Strong Bottle 650ML.png', 7000, '310.00'),
(71, 'Wine', 'Andre Rose Sparkling 750ML', 'Pleasing cranberry notes and a smooth finish.', '1516994756-Andre Rose Sparkling 750ML.png', 7100, '1755.00'),
(72, 'Vodka', 'kljkhgyftydfchgv', 'kljkhjgcfh', '1516994817-kljkhgyftydfchgv.jpg', 52, '562.00');

-- --------------------------------------------------------

--
-- Table structure for table `rum`
--

CREATE TABLE `rum` (
  `Rum_id` int(10) NOT NULL,
  `Rum_name` varchar(100) NOT NULL,
  `Rum_volume` varchar(100) NOT NULL,
  `Rum_brand` varchar(100) NOT NULL,
  `Rum_category` varchar(100) NOT NULL,
  `Rum_country` varchar(100) NOT NULL,
  `Rum_details` varchar(1000) NOT NULL,
  `Rum_price` varchar(10) NOT NULL,
  `Rum_pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rum`
--

INSERT INTO `rum` (`Rum_id`, `Rum_name`, `Rum_volume`, `Rum_brand`, `Rum_category`, `Rum_country`, `Rum_details`, `Rum_price`, `Rum_pic`) VALUES
(1, 'Khukri XXX Rum 750ML', '750 ML', 'Khukuri', 'Rum / Domestic Rum', 'Nepal', 'This award winning rum stands as the classic rum of the Himalayas.\r\n\r\nSmooth, full-bodied, with an elegant finish and a hint of oak, each bottle beckons the gifts of tradition, unchanging, and a character that never gets old.', 'Rs. 1,300', 'Khukuri.jpeg'),
(2, 'Khukri XXX Rum 750ML', '750 ML', 'Khukuri', 'Rum / Domestic Rum', 'Nepal', 'This award winning rum stands as the classic rum of the Himalayas.\r\n\r\nSmooth, full-bodied, with an elegant finish and a hint of oak, each bottle beckons the gifts of tradition, unchanging, and a character that never gets old.', 'Rs. 1,300', 'Khukuri.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `soft_drinks`
--

CREATE TABLE `soft_drinks` (
  `Soft_id` int(10) NOT NULL,
  `Soft_name` varchar(100) NOT NULL,
  `Soft_volume` varchar(100) NOT NULL,
  `Soft_brand` varchar(100) NOT NULL,
  `Soft_category` varchar(100) NOT NULL,
  `Soft_country` varchar(100) NOT NULL,
  `Soft_details` varchar(10000) NOT NULL,
  `Soft_price` varchar(20) NOT NULL,
  `Soft_pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soft_drinks`
--

INSERT INTO `soft_drinks` (`Soft_id`, `Soft_name`, `Soft_volume`, `Soft_brand`, `Soft_category`, `Soft_country`, `Soft_details`, `Soft_price`, `Soft_pic`) VALUES
(1, 'Red Bull 250ML', '250ML', 'Red Bull', 'Beverages / Energy Drink', 'Thailand', 'Red Bull, one the most popular energy drinks produced in Thailand, is solely imported and marketed by GB Marketing, a 100% subsidiary of Gorkha Brewery.\r\n\r\nToday Red Bull has become the most popular energy drink available in the market among the young adults.', 'Rs. 70', ''),
(2, 'Royal Club Soda Water 330ML', '330ML', 'Royal Club', 'Beverages / Soft Drinks', 'Netherlands', 'Royal Club Soda Water in an exquisite gasified water for enthusiasts. Gentle, delicious!', 'Rs. 85', ''),
(3, 'Real Juice Cranberry 1L', '1000ML', 'Real', 'Beverages / Fruit Juice', 'Nepal', 'Real Cranberry juice is the most popular and loved cranberry fruit beverage. It has been well accepted as the most preferred base for many delightful mocktails and cocktails and has in fact become the key to creating magic at parties! It is loved for its taste which leaves you wanting for more.', 'Rs. 220', '');

-- --------------------------------------------------------

--
-- Table structure for table `tobacco`
--

CREATE TABLE `tobacco` (
  `Tobacco_id` int(10) NOT NULL,
  `Tobacco_name` varchar(100) NOT NULL,
  `Tobacco_volume` varchar(100) NOT NULL,
  `Tobacco_brand` varchar(100) NOT NULL,
  `Tobacco_category` varchar(100) NOT NULL,
  `Tobacco_country` varchar(100) NOT NULL,
  `Tobacco_details` varchar(10000) NOT NULL,
  `Tobacco_price` varchar(20) NOT NULL,
  `Tobacco_pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tobacco`
--

INSERT INTO `tobacco` (`Tobacco_id`, `Tobacco_name`, `Tobacco_volume`, `Tobacco_brand`, `Tobacco_category`, `Tobacco_country`, `Tobacco_details`, `Tobacco_price`, `Tobacco_pic`) VALUES
(1, 'jkhjvg', 'ljkhvjkj', 'hljkvjhklh', 'lkhv', 'h;lkhvjh', 'jlhlkvjcgvhkhh', 'vhj', ''),
(2, 'jkhjghjkg', 'sydjkhkljkhcg', 'shgkjh', 'gdhfjgkhl', 'dfygu', 'dfjgkh', 'dhfjgkh', ''),
(3, 'nkfydfgk', 'uiglhkjfghg', 'tsrdyg', 'stdfjhkh', 'dfghvjbk', 'hgjbn', 'dfhgjkl', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pin` int(16) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(15) NOT NULL,
  `type` varchar(20) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `address`, `city`, `pin`, `email`, `password`, `type`) VALUES
(2, 'sujan', 'stha', 'narayantar', 'kathmandu', 101010, 'sujan.stha@gmail.com', 'sujan', 'admin'),
(5, 'suresh', 'tamagn', 'sadfg', 'kathmandu', 2569, 'suresh@gmail.com', 'suresh', 'admin'),
(6, 'Silver ', 'Boy', 'KTM', 'KTM', 44500, 'silverboy@gmail.com', 'boy', 'user'),
(7, 'Silver', 'Shrestha', 'Narayantar Jorpati', 'Kathmandu', 99040, 's@gmail.com', '123456', 'user'),
(9, 'hy', 'hello', 'agjkbhfjlv', 'kjbsdlvjk', 489416, 'hy@gmail.com', 'hy', 'admin'),
(10, 'silver', 'spike', 'ktm', 'Pokhara', 2147483647, 'silver@gmail.com', 'silver', 'admin'),
(11, 'no', 'no', 'no', 'no', 80, 'no@gmail.com', 'no', 'user'),
(13, ' nbvfgchgvjhbk', 'n bvhcgjhkb', 'n mbhgvjhkjb', 'n mbghkjbn,jvgghlj', 2147483647, '45@gmail.com', '45', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `vodka`
--

CREATE TABLE `vodka` (
  `Vodka_id` int(10) NOT NULL,
  `Vodka_name` varchar(100) NOT NULL,
  `Vodka_volume` varchar(100) NOT NULL,
  `Vodka_brand` varchar(100) NOT NULL,
  `Vodka_category` varchar(100) NOT NULL,
  `Vodka_country` varchar(100) NOT NULL,
  `Vodka_details` varchar(1000) NOT NULL,
  `Vodka_price` varchar(10) NOT NULL,
  `Image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vodka`
--

INSERT INTO `vodka` (`Vodka_id`, `Vodka_name`, `Vodka_volume`, `Vodka_brand`, `Vodka_category`, `Vodka_country`, `Vodka_details`, `Vodka_price`, `Image`) VALUES
(1, '', '750 ML', 'Ruslan', 'Vodka / Domestic Vodka', 'Nepal', 'Ruslan Vodka at 70 proof is clear in colour, clean and crisp. Matching up the connoisseurs of rich taste, Ruslan Vodka has few equals when it comes to enlivening moments.', 'Rs. 1,250', 'Ruslan.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `whiskey`
--

CREATE TABLE `whiskey` (
  `Whiskey_id` int(10) NOT NULL,
  `Whiskey_name` varchar(100) NOT NULL,
  `Whiskey_volume` varchar(100) NOT NULL,
  `Whiskey_brand` varchar(100) NOT NULL,
  `Whiskey_category` varchar(100) NOT NULL,
  `Whiskey_country` varchar(100) NOT NULL,
  `Whiskey_details` varchar(10000) NOT NULL,
  `Whiskey_price` varchar(20) NOT NULL,
  `Whiskey_picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `whiskey`
--

INSERT INTO `whiskey` (`Whiskey_id`, `Whiskey_name`, `Whiskey_volume`, `Whiskey_brand`, `Whiskey_category`, `Whiskey_country`, `Whiskey_details`, `Whiskey_price`, `Whiskey_picture`) VALUES
(1, ',jbkh', 'jkhvg', 'bljbv', 'gj', 'khvjhk', 'hhvjhk', 'hhv', ''),
(2, 'kljbkh', 'hvhi', 'vhh', 'ihvk', 'hivhj', 'huhuvjg', 'uhu', '');

-- --------------------------------------------------------

--
-- Table structure for table `wine`
--

CREATE TABLE `wine` (
  `Wine_id` int(10) NOT NULL,
  `Wine_name` varchar(100) NOT NULL,
  `Wine_volume` varchar(100) NOT NULL,
  `Wine_brand` varchar(100) NOT NULL,
  `Wine_category` varchar(100) NOT NULL,
  `Wine_country` varchar(100) NOT NULL,
  `Wine_details` varchar(1000) NOT NULL,
  `Wine_price` varchar(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wine`
--

INSERT INTO `wine` (`Wine_id`, `Wine_name`, `Wine_volume`, `Wine_brand`, `Wine_category`, `Wine_country`, `Wine_details`, `Wine_price`, `image`) VALUES
(1, 'Divine Wine Sweet Red 750ML', '750 ML', 'Divine', 'Wine / Domestic Wine', 'Nepal', 'An irresistible wine whose elegance draws you subliminally its orbit. Intense in color, it is redolent of a profusion of aromas of tea leaves, spices and flowers. The abundance of fruit sensations is often complemented by warm alcohol and gripping tannins. Matured up to 2 and half years, it can be stored in dark & places.\r\n\r\nRecommendations: Is a versatile food wine, great with poultry, meat and vegetable dishes.', 'Rs. 410', 'Divine Red Wine.jpeg'),
(2, 'Divine Wine White 750ML', '750 ML', 'Divine', 'Wine / Domestic Wine', 'Nepal', 'Golden in hue and a perfect blend of sweetness, wine made from grape have a concentrated, grape fruit flavor with good balancing acidity and hints of flowers. Light and elegant, its flavor is soft in the mouth. Matured up to 3 years, it can be stored in dark and cool places.\r\n\r\nRecommendations: Here is the wine that may be enjoyed as an aperitif. Great match for spicy pan-asian food.', 'Rs. 410', 'Divine Wine White.jpeg'),
(3, 'G.H. Mumm Champagne 3L', '3000ML', 'G.H. Mumm', 'Wine / Champagne', 'France', 'This champagne is a brightly sparkling, light golden yellow liquid with an abundance of fine and elegant.\r\n\r\nFRAGRANCE: The nose reveals initial aromas of ripe fresh fruit (white and yellow peaches, apricots), tropical notes (lychee and pineapple). It then opens up with the fragrance of vanilla before developing notes of milky caramel, breadcrumbs and yeast, culminating in aromas of dried fruit and honey.\r\n\r\nTASTE: An explosion of freshness in the mouth, followed by strong persistence. The complex aromas of fresh fruit and caramel perpetuate the intensity.', 'Rs. 27,500', 'G.H. Mumm Champagne 3L.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beer`
--
ALTER TABLE `beer`
  ADD PRIMARY KEY (`Beer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rum`
--
ALTER TABLE `rum`
  ADD PRIMARY KEY (`Rum_id`);

--
-- Indexes for table `soft_drinks`
--
ALTER TABLE `soft_drinks`
  ADD PRIMARY KEY (`Soft_id`);

--
-- Indexes for table `tobacco`
--
ALTER TABLE `tobacco`
  ADD PRIMARY KEY (`Tobacco_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vodka`
--
ALTER TABLE `vodka`
  ADD PRIMARY KEY (`Vodka_id`);

--
-- Indexes for table `whiskey`
--
ALTER TABLE `whiskey`
  ADD PRIMARY KEY (`Whiskey_id`);

--
-- Indexes for table `wine`
--
ALTER TABLE `wine`
  ADD PRIMARY KEY (`Wine_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beer`
--
ALTER TABLE `beer`
  MODIFY `Beer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `rum`
--
ALTER TABLE `rum`
  MODIFY `Rum_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `soft_drinks`
--
ALTER TABLE `soft_drinks`
  MODIFY `Soft_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tobacco`
--
ALTER TABLE `tobacco`
  MODIFY `Tobacco_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `vodka`
--
ALTER TABLE `vodka`
  MODIFY `Vodka_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `whiskey`
--
ALTER TABLE `whiskey`
  MODIFY `Whiskey_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wine`
--
ALTER TABLE `wine`
  MODIFY `Wine_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
