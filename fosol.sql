-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2024 at 11:24 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fosol`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `pw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`full_name`, `email`, `pw`) VALUES
('Asif Bhuiyan', 'asif.bhuiyan3330@gmail.com', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `img_src` varchar(255) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fav_prod`
--

CREATE TABLE `fav_prod` (
  `img_src` varchar(255) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fav_prod`
--

INSERT INTO `fav_prod` (`img_src`, `item_name`, `price`, `user_email`, `quantity`) VALUES
('http://nuriaenterprise.weebly.com/uploads/8/3/5/1/8351405/1361359050.jpg', 'গাজর', '200.00', 'asif.bhuiyan3330@gmail.com', 2),
('https://assets.telegraphindia.com/abp/2022/Oct/1666009025_new-project-2022-10-17t174645-846.jpg', 'আনারস', '110.00', 'asif.bhuiyan3330@gmail.com', 2),
('https://upload.wikimedia.org/wikipedia/commons/thumb/1/1d/Gozar.jpg/200px-Gozar.jpg', 'গজার', '250.00', 'asif.bhuiyan3330@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `naam` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `feedback` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`naam`, `email`, `feedback`) VALUES
('Asif', 'asif.bhuiyan3330@gmail.com', 'Good'),
('Asif', 'asif.bhuiyan3330@gmail.com', 'Good');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `serial` int(11) NOT NULL,
  `img_src` varchar(255) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`serial`, `img_src`, `item_name`, `price`, `user_email`, `quantity`) VALUES
(1, 'http://nuriaenterprise.weebly.com/uploads/8/3/5/1/8351405/1361309612.jpg', 'মিষ্টি কুমরা', '30000.00', 'asif.bhuiyan3330@gmail.com', 5),
(2, 'http://nuriaenterprise.weebly.com/uploads/8/3/5/1/8351405/1361359050.jpg', 'গাজর', '200.00', 'asif.bhuiyan3330@gmail.com', 2),
(3, 'https://assets.telegraphindia.com/abp/2022/Oct/1666009025_new-project-2022-10-17t174645-846.jpg', 'আনারস', '110.00', 'asif.bhuiyan3330@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `img_src` varchar(1000) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`img_src`, `item_name`, `price`) VALUES
('http://nuriaenterprise.weebly.com/uploads/8/3/5/1/8351405/1361311541.jpg', 'লাউ', '45.00'),
('http://nuriaenterprise.weebly.com/uploads/8/3/5/1/8351405/1361358856.jpg', 'লিচু', '350.00'),
('http://nuriaenterprise.weebly.com/uploads/8/3/5/1/8351405/1361358892.jpg', 'সাপোটা', '65.00'),
('http://nuriaenterprise.weebly.com/uploads/8/3/5/1/8351405/1361358981.jpg', 'বীট', '80.00'),
('http://nuriaenterprise.weebly.com/uploads/8/3/5/1/8351405/1361359109.jpg', 'দুধকোশী', '65.00'),
('http://nuriaenterprise.weebly.com/uploads/8/3/5/1/8351405/1361313551.jpg', 'বেগুন', '150.00'),
('http://nuriaenterprise.weebly.com/uploads/8/3/5/1/8351405/1361359138.png', 'বড় লাউ', '90.00'),
('http://nuriaenterprise.weebly.com/uploads/8/3/5/1/8351405/1361359158.jpg', 'বাঁধাকপি', '80.00'),
('http://nuriaenterprise.weebly.com/uploads/8/3/5/1/8351405/1361359225.jpg', 'চিচিঙ্গা', '80.00'),
('https://cosmosgroup.sgp1.digitaloceanspaces.com/news/7501061_mango%20varieties%20in%20Bangladesh.jpg', 'আম', '60.00'),
('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRiA26d8odLkA-ij6o-o-WC2KE2rJn4-y8LXQ&usqp=CAU', 'কাঁঠাল', '50.00'),
('https://i0.wp.com/www.satvai.com/wp-content/uploads/2019/04/51cEH4okBtL.jpg?fit=500%2C500&ssl=1', 'কালোজাম', '120.00'),
('https://assets.telegraphindia.com/abp/2022/Oct/1666009025_new-project-2022-10-17t174645-846.jpg', 'আনারস', '55.00'),
('https://www.ekushey-tv.com/media/imgAll/2019June/banana%20(1)20190626102347.jpg', 'কলা', '70.00'),
('https://images.news18.com/static-bengali/2023/06/Lychee.jpg', 'লিচু', '250.00'),
('https://www.kalerkantho.com/_next/image?url=http%3A%2F%2Fcdn.kalerkantho.com%2Fpublic%2Fnews_images%2F2023%2F02%2F25%2F1677269240-a7230d6c26bdb0b1f61afb938f9203f1.jpg&w=1920&q=100', 'লেবু', '40.00'),
('https://www.kalerkantho.com/_next/image?url=http%3A%2F%2Fcdn.kalerkantho.com%2Fpublic%2Fnews_images%2F2021%2F12%2F05%2F093551Goava-2009100932.jpg&w=1920&q=100', 'পেয়ারা', '65.00'),
('https://bengali.cdn.zeenews.com/bengali/sites/default/files/2020/09/13/274950-apple.jpg', 'আপেল', '300.00'),
('https://5.imimg.com/data5/KH/TH/NS/SELLER-90385072/delicios-kasmiri-apple-500x500.jpg', 'সোনালি আপেল', '350.00'),
('https://www.shajgoj.com/wp-content/uploads/2017/11/7f147f7c37848968e180fc0793055243.jpg', 'পেঁপে', '40.00'),
('https://www.kalerkantho.com/_next/image?url=http%3A%2F%2Fcdn.kalerkantho.com%2Fpublic%2Fnews_images%2F2022%2F04%2F04%2F222544p4-pp-2.jpg&w=1920&q=100', 'তরমুজ', '350.00'),
('https://cdn.kalerkantho.com/public/news_images/2021/09/21/103749Kazu-Inner20180414062515.jpg', 'কাজুবাদাম', '700.00'),
('https://swadeshbangla.shop/image/swadeshbangla.shop/cache/catalog/fruits/pomegranet-800x800.jpg', 'ডালিম', '650.00'),
('https://d2u0ktu8omkpf6.cloudfront.net/714d31564dd308a0df73c585ac08ade6400ac413e7d8f25a.png', 'বরই', '850.00'),
('https://m.media-amazon.com/images/I/61NSl9IAlYS._AC_UF1000,1000_QL80_.jpg', 'গোলাপ আপেল', '300.00'),
('https://cdn.kalerkantho.com/public/news_images/2020/04/26/224237kalerkantho-st-2.jpg', 'জলপাই', '750.00'),
('https://cdn.kalerkantho.com/public/news_images/2017/10/22/213149komla--.jpg', 'কমলা', '250.00'),
('https://upload.wikimedia.org/wikipedia/commons/thumb/7/7a/Sperata_aor.jpg/200px-Sperata_aor.jpg', 'আইড়', '600.00'),
('https://upload.wikimedia.org/wikipedia/commons/thumb/c/ce/Rasbora_elanga_Achilles_146.jpg/200px-Rasbora_elanga_Achilles_146.jpg', 'এলং', '800.00'),
('https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/Zebrafisch.jpg/200px-Zebrafisch.jpg', 'আনজু', '600.00'),
('https://upload.wikimedia.org/wikipedia/commons/thumb/7/7b/Bagarius_yarrelli.jpg/200px-Bagarius_yarrelli.jpg', 'বাগাইর/বাঘাইর', '600.00'),
('https://upload.wikimedia.org/wikipedia/commons/thumb/f/fc/Anguilla_bengalensis_bengalensis.jpg/200px-Anguilla_bengalensis_bengalensis.jpg', 'বানমাছ', '750.00'),
('https://upload.wikimedia.org/wikipedia/commons/thumb/a/aa/OphisternBengalensffish.asia.jpg/200px-OphisternBengalensffish.asia.jpg', 'বানমাছ পাঁকাল বামুশ', '350.00'),
('https://upload.wikimedia.org/wikipedia/commons/thumb/3/30/Baila-bele-fish.jpg/200px-Baila-bele-fish.jpg', 'বাইলা', '250.00'),
('https://upload.wikimedia.org/wikipedia/commons/thumb/1/10/Tire_Track_Eel.jpg/200px-Tire_Track_Eel.jpg', 'বাইম', '600.00'),
('https://upload.wikimedia.org/wikipedia/commons/thumb/7/7c/Barilius_barila_Fish_Borali_in_Bengali.jpg/200px-Barilius_barila_Fish_Borali_in_Bengali.jpg', 'বারালি', '600.00'),
('https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/Wallago_attu_1.jpg/200px-Wallago_attu_1.jpg', 'বোয়াল', '550.00'),
('https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/Chitala_chitala_Thomas.jpg/200px-Chitala_chitala_Thomas.jpg', 'চিতল', '350.00'),
('https://upload.wikimedia.org/wikipedia/commons/thumb/8/89/Colisasota_male.jpg/200px-Colisasota_male.jpg', 'চুনো', '250.00'),
('https://upload.wikimedia.org/wikipedia/commons/thumb/a/a8/Common_carp.jpg/200px-Common_carp.jpg', 'কমন কার্প', '200.00'),
('https://upload.wikimedia.org/wikipedia/commons/thumb/1/13/RasboraDanicorniusBeavan.png/200px-RasboraDanicorniusBeavan.png', 'গেছুয়া', '200.00'),
('https://upload.wikimedia.org/wikipedia/commons/thumb/1/1d/Gozar.jpg/200px-Gozar.jpg', 'গজার', '250.00'),
('https://upload.wikimedia.org/wikipedia/commons/thumb/e/ee/Grass-Carp1web.jpg/200px-Grass-Carp1web.jpg', 'গ্রাস কার্প', '250.00'),
('https://upload.wikimedia.org/wikipedia/commons/thumb/d/d7/LepidocephalichthysGuntea.png/200px-LepidocephalichthysGuntea.png', 'গুতুম', '250.00'),
('https://upload.wikimedia.org/wikipedia/commons/thumb/8/8d/Ilish.JPG/200px-Ilish.JPG', 'ইলিশ', '1500.00'),
('https://upload.wikimedia.org/wikipedia/commons/thumb/5/52/Xenentodon_cancila.jpg/200px-Xenentodon_cancila.jpg', 'কালিবাউস', '300.00'),
('https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Rosy_barb.jpg/200px-Rosy_barb.jpg', 'কাচোন পুঁটি', '200.00'),
('https://upload.wikimedia.org/wikipedia/commons/thumb/d/d1/Ompok_bimaculatus_Day.jpg/200px-Ompok_bimaculatus_Day.jpg', 'কানি পাবদা', '600.00'),
('https://upload.wikimedia.org/wikipedia/commons/thumb/e/e0/Catla_catla.JPG/200px-Catla_catla.JPG', 'কাতলা', '350.00'),
('https://upload.wikimedia.org/wikipedia/commons/thumb/3/31/CeylonAnabasDryTanks.jpg/200px-CeylonAnabasDryTanks.jpg', 'কৈ', '200.00'),
('https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Harpadon_nehereus_%28by_Hamid_Badar_Osmany%29.jpg/200px-Harpadon_nehereus_%28by_Hamid_Badar_Osmany%29.jpg', 'ল্যাটা', '600.00'),
('https://upload.wikimedia.org/wikipedia/commons/thumb/8/88/Amblypharyngodon_microlepis_Day_135.jpg/200px-Amblypharyngodon_microlepis_Day_135.jpg', 'মলা', '200.00'),
('https://upload.wikimedia.org/wikipedia/commons/thumb/6/6e/Pla_sawai89.jpg/200px-Pla_sawai89.jpg', 'পাঙ্গাস', '180.00'),
('https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/Mugil_cephalus_Minorca_%28cropped%29.jpg/200px-Mugil_cephalus_Minorca_%28cropped%29.jpg', 'পারশে', '600.00'),
('https://upload.wikimedia.org/wikipedia/commons/thumb/d/d1/Labeo_rohita.JPG/200px-Labeo_rohita.JPG', 'রুই', '450.00'),
('https://upload.wikimedia.org/wikipedia/commons/thumb/8/89/Puntius_sarana.jpg/200px-Puntius_sarana.jpg', 'সরপুঁটি', '350.00'),
('https://upload.wikimedia.org/wikipedia/commons/thumb/b/b1/Hypophthalmichthys_molitrix_adult.jpg/200px-Hypophthalmichthys_molitrix_adult.jpg', 'সিলভার কার্প', '350.00'),
('http://nuriaenterprise.weebly.com/uploads/8/3/5/1/8351405/1361358597.jpg', 'আলু', '450.00'),
('http://nuriaenterprise.weebly.com/uploads/8/3/5/1/8351405/1361358546.jpg', 'তারো', '450.00'),
('http://nuriaenterprise.weebly.com/uploads/8/3/5/1/8351405/1361358471.jpg', 'আম', '600.00'),
('http://nuriaenterprise.weebly.com/uploads/8/3/5/1/8351405/1361358572.jpg', 'লেবু', '400.00'),
('http://nuriaenterprise.weebly.com/uploads/8/3/5/1/8351405/1361358333.jpg', 'তেজ করলা', '650.00'),
('http://nuriaenterprise.weebly.com/uploads/8/3/5/1/8351405/1361358235.jpg', 'কলা', '50.00'),
('http://nuriaenterprise.weebly.com/uploads/8/3/5/1/8351405/1361358208.jpg', 'সবুজ মরিচ', '250.00'),
('http://nuriaenterprise.weebly.com/uploads/8/3/5/1/8351405/1361312530.jpg', 'সবুজ পেঁপে', '40.00'),
('http://nuriaenterprise.weebly.com/uploads/8/3/5/1/8351405/1361358650.jpg', 'লটকন', '85.00');

-- --------------------------------------------------------

--
-- Table structure for table `qr`
--

CREATE TABLE `qr` (
  `id` int(11) NOT NULL,
  `qr_details` varchar(255) DEFAULT NULL,
  `scan_count` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qr`
--

INSERT INTO `qr` (`id`, `qr_details`, `scan_count`) VALUES
(1, 'WIFI:T:WPA;P:sbabaawb;S:TP-Link;H:false;', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  `birth_date` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `pw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`first_name`, `last_name`, `mobile_number`, `sex`, `city`, `birth_date`, `email`, `pw`) VALUES
('Asif', 'Bhuiyan', '01632734014', 'male', 'Dhaka', '2023-10-09', 'asif.bhuiyan3330@gmail.com', 'asdfghjkl');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `qr`
--
ALTER TABLE `qr`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `qr_code` (`qr_details`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `qr`
--
ALTER TABLE `qr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
