-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2024 at 05:29 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `starbucks`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `no_hp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_membership`
--

CREATE TABLE `tbl_membership` (
  `id_membership` int(11) NOT NULL,
  `nama_member` varchar(50) NOT NULL,
  `email_member` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `status` varchar(70) NOT NULL,
  `poin` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_membership`
--

INSERT INTO `tbl_membership` (`id_membership`, `nama_member`, `email_member`, `password`, `no_hp`, `tgl_lahir`, `gender`, `status`, `poin`) VALUES
(20012, 'melani', 'melani30@gmail.com', '$2y$10$QaFlVynWePtMby0wUunvLeKzCly.mW3csHGnRWxaFZ4FUfj3INbwG', '', '2024-05-08', 'perempuan', 'Mahasiswa', 20),
(20013, 'sukma', 'sukma@gmail.com', '$2y$10$Od9IkqpeeRqlZsPCWMv/muujWNs3RMZVVCM/IbT/rPTdp/BQ2UjXm', '', '2024-05-08', 'laki-laki', 'Student', 55),
(20014, 'Silva Jen Retno', 'slvvaa@gmail.com', '$2y$10$VdR.C.474HHzC3sm8rtl5uvJeSbmhdAnKREJZNxhJdjuAH1ysC9ni', '082154057441', '2004-05-07', 'perempuan', 'Student', 50),
(20015, 'Fina Anriani', 'fina@gmail.com', '$2y$10$ko831w2CpYvvUt/Dts9TkeR/Z6E6D2AfFMYssVN0lHDtXKWzQYmqm', '082154689900', '2003-12-14', 'Perempuan', 'Student', 40),
(20016, '', '', '$2y$10$YtP7XYw.XXFBmcU.gnjeXul0aKxo3D6U7P2edV2H5sdhTljL0tO.O', '', '0000-00-00', 'Laki-laki', 'Student', 0),
(20017, 'nhs', 'intan@gmail.com', '$2y$10$KoMEVHXur4Vu.dcNSt9dhOsyUG.u3aKErUrcbIhEGxlsSEfXF8RQa', '08215468990', '2024-05-09', 'Laki-laki', 'Student', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `gambar_menu` varchar(100) NOT NULL,
  `deskripsi_menu` varchar(100) NOT NULL,
  `harga_normal` varchar(30) NOT NULL,
  `harga_diskon` varchar(30) NOT NULL,
  `jenis_menu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `nama_menu`, `gambar_menu`, `deskripsi_menu`, `harga_normal`, `harga_diskon`, `jenis_menu`) VALUES
(30001, 'Caramel Macchiato', 'CaramelMacchiato.jpg', 'Caramel macchiato espresso with vanilla syrup, milk, and caramel', 'Rp 35,000', 'Rp 30,000', 'Minuman'),
(30002, 'Green Tea Latte', 'MatchaGreenTeaLatte.avif', 'Smooth and creamy Matcha Green Tea Latte served with steamed milk', 'Rp 40,000', 'Rp 35,000', 'Minuman'),
(30003, 'Chicken Mushroom Pie', 'ChickenMushroomPie.png', 'Toast with eggs, cheese and BBQ sauce', 'Rp 25,000', 'Rp 20,000', 'Makanan'),
(30004, 'Classic Tuna Sandwich', 'TunaSandwich.png', 'Whole wheat bread with tuna salad', 'Rp 30,000', 'Rp 25,000', 'Makanan'),
(30012, 'Caffè Americano', 'CaffeAmericano.avif', 'A single shot of espresso added to a cup of hot water, creating a light layer of crema on top.', 'Rp 25,000', 'Rp 23,000', 'Minuman'),
(30014, 'Turkey & Basil Pesto Sandwich', 'Turkey & Basil Pesto Sandwich.avif', 'Sliced turkey breast with basil pesto and provolone cheese on focaccia bread.', 'Rp 45,000', 'Rp 41,500', 'Makanan'),
(30015, 'Pumpkin Spice Latte', 'Pumpkin Spice Latte.avif', 'Espresso and steamed milk with pumpkin, cinnamon, nutmeg, and clove flavors.', 'Rp 35,000', 'Rp 31,500', 'Minuman'),
(30016, 'Chocolate Chunk Muffin', 'Chocolate Chunk Muffin.png', ' A moist, chocolatey muffin filled with chocolate chunks.', 'Rp 35,000', 'Rp 31,000', 'Makanan'),
(30017, 'White Chocolate Mocha', 'White Chocolate Mocha.avif', 'Espresso with steamed milk and white chocolate sauce, topped with whipped cream.', 'Rp 45,000', 'Rp 43,500', 'Minuman'),
(30018, 'Turkey Bacon & White Cheddar Classic', 'TurkeyBaconSandwich.avif', 'Smoked turkey bacon, white cheddar, and egg on an English muffin.', 'Rp 55,000', 'Rp 53,500', 'Makanan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promo`
--

CREATE TABLE `tbl_promo` (
  `id_promo` int(11) NOT NULL,
  `nama_promo` varchar(50) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_berakhir` date NOT NULL,
  `sk_1` varchar(100) NOT NULL,
  `sk_2` varchar(100) NOT NULL,
  `sk_3` varchar(255) NOT NULL,
  `sk_4` varchar(255) NOT NULL,
  `jenis_promo` varchar(40) NOT NULL,
  `poin_promo` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_promo`
--

INSERT INTO `tbl_promo` (`id_promo`, `nama_promo`, `deskripsi`, `tgl_mulai`, `tgl_berakhir`, `sk_1`, `sk_2`, `sk_3`, `sk_4`, `jenis_promo`, `poin_promo`) VALUES
(1, 'Welcome Offer', 'Get a free tall drink with any purchase for new members!', '2024-05-10', '2024-05-20', 'Applicable for new sign-ups only', 'Valid for one-time use only', 'Valid for in-store purchases only', 'Not valid with other promotions', 'Membership', 10),
(2, 'Happy Hour Special', 'Enjoy 50% off on all handcrafted beverages!', '2024-05-15', '2024-05-25', 'Valid every weekday from 3 PM to 5 PM', 'Applicable for all members', 'Valid for in-store and drive-thru purchases', 'Not valid for bottled drinks', 'Membership', 20),
(3, 'Breakfast Combo', 'Start your day right with a breakfast sandwich and any tall hot beverage for only $5!', '2024-05-20', '2024-05-30', 'Valid for in-store purchases only', 'Available until 11 AM daily', 'Applicable for all members', 'Not valid with other food promotions', 'Membership', 30),
(4, 'Family Weekend Treat', 'Buy 1 Grande or Venti beverage and get 50% off on the second one for family members!', '2024-05-22', '2024-06-01', 'Valid for Grande or Venti size only', 'Applicable for all family members', 'Valid for in-store purchases only', 'Second beverage must be of equal or lesser value', 'Membership', 40),
(5, 'Loyalty Reward', 'Earn 5 bonus stars for every $25 spent!', '2024-05-25', '2024-06-05', 'Applicable for Gold tier members only', 'Stars will be credited within 24 hours', 'Valid for all purchases', 'Not valid for gift card purchases', 'Membership', 60),
(6, 'Weekday Brunch Combo', 'Get a breakfast sandwich and any tall iced coffee for only $7 on weekdays!', '2024-05-28', '2024-06-08', 'Valid from Monday to Friday until 11 AM', 'Applicable for all members', 'Valid for in-store purchases only', 'Not valid with other promotions', 'Membership', 50),
(7, 'Afternoon Delight', 'Enjoy any Grande Frappuccino for only $5 every afternoon!', '2024-06-01', '2024-06-10', 'Valid from 2 PM to 5 PM daily', 'Applicable for all members', 'Valid for in-store and drive-thru purchases', 'Not valid with other beverage promotions', 'Membership', 60),
(8, 'Double Stars Day', 'Earn double stars on all purchases for Gold tier members!', '2024-06-05', '2024-06-15', 'Applicable for Gold tier members only', 'Valid for one day only', 'Valid for all purchases', 'Stars will be credited within 48 hours', 'Membership', 70),
(9, 'Weekend Treat', 'Buy any handcrafted beverage and get 50% off on your next food item!', '2024-06-08', '2024-06-18', 'Valid for one-time use only', 'Applicable for all members', 'Valid for in-store purchases only', 'Next food item must be purchased within 7 days', 'Membership', 80),
(10, 'Birthday Special', 'Celebrate your birthday with a complimentary tall drink of your choice!', '2024-06-12', '2024-06-22', 'Valid on your birthday only', 'Applicable for all members', 'Valid for in-store purchases only', 'Must present valid ID with birthdate', 'Membership', 100),
(11, 'Weekend Buy One Get One', 'Buy one Grande or Venti drink and get the second one free!', '2024-06-15', '2024-06-30', 'Valid for Grande or Venti size only', 'Applicable for all customers', 'Valid for in-store purchases only', 'Second drink must be of equal or lesser value', 'Non-Membership', 0),
(40001, 'Buy 1 Get 1 Free', 'Beli satu minuman ukuran grande atau venti, dapatkan satu minuman ukuran yang sama secara gratis.', NULL, '2024-05-16', 'Berlaku untuk minuman ukuran grande atau venti.', 'Promo berlaku untuk jenis minuman tertentu, tidak termasuk seasonal dan promotional beverages.', 'Berlaku untuk pembelian langsung di gerai Starbucks.', 'Tidak dapat digabung dengan promo atau diskon lainnya.', 'Membership', 60),
(40002, 'Discount 50% for Members', 'Diskon 50% untuk semua minuman bagi member Starbucks Rewards.', NULL, '2024-05-23', 'Berlaku untuk semua minuman kecuali seasonal dan promotional beverages.', 'Promo hanya berlaku untuk pembelian menggunakan Starbucks Card.', 'Diskon akan otomatis diberikan saat transaksi.', 'Tidak berlaku untuk menu makanan.', 'Membership', 150),
(40003, 'Weekend Treats', 'Diskon 20% untuk semua menu makanan pada hari Sabtu dan Minggu.', NULL, '2024-05-11', 'Berlaku untuk semua menu makanan kecuali snack dan pastry.', 'Promo hanya berlaku di gerai tertentu.', 'Diskon tidak berlaku untuk menu minuman.', 'Tidak dapat digabung dengan promo atau diskon lainnya.', 'Non-Membership', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_struk`
--

CREATE TABLE `tbl_struk` (
  `id_struk` int(11) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `kode_struck` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_struk`
--

INSERT INTO `tbl_struk` (`id_struk`, `tanggal`, `kode_struck`) VALUES
(1, '2024-05-08', '909090'),
(17, '2024-05-09', 'hai'),
(18, '2024-05-09', 'hh'),
(19, '2024-05-09', 'ff'),
(20, '2024-05-09', '2345hj'),
(22, '2024-05-10', ''),
(23, '2024-05-10', '234'),
(24, '2024-05-10', '10004da'),
(25, '2024-05-10', '1000456'),
(26, '2024-05-10', 'sbtygf32'),
(27, '2024-05-10', 'sbfghj45'),
(28, '2024-05-10', 'sbERTY45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_membership`
--
ALTER TABLE `tbl_membership`
  ADD PRIMARY KEY (`id_membership`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tbl_promo`
--
ALTER TABLE `tbl_promo`
  ADD PRIMARY KEY (`id_promo`);

--
-- Indexes for table `tbl_struk`
--
ALTER TABLE `tbl_struk`
  ADD PRIMARY KEY (`id_struk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- AUTO_INCREMENT for table `tbl_membership`
--
ALTER TABLE `tbl_membership`
  MODIFY `id_membership` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20018;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30019;

--
-- AUTO_INCREMENT for table `tbl_promo`
--
ALTER TABLE `tbl_promo`
  MODIFY `id_promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40004;

--
-- AUTO_INCREMENT for table `tbl_struk`
--
ALTER TABLE `tbl_struk`
  MODIFY `id_struk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
