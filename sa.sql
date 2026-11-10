-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2026 at 01:36 PM
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
-- Database: `sa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `uid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`uid`, `username`, `password`) VALUES
(1, 'admin', '$2y$12$.ILexKhbGwipHkXHDNDpTO7xsxK/jaOqTV.rY1ddo57Nr0eQqlNSW');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `main_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `description`, `main_image`) VALUES
(1, 'مدينة الرياض', 'تعتبر الرياض العاصمة الإدارية والاقتصادية للمملكة. تجمع المدينة بين الأبراج الحديثة والمراكز التجارية الكبرى وبين المعالم التاريخية العريقة مثل حي الطريف في الدرعية، وتقدم فعاليات ومواسم ترفيهية متنوعة طوال العام.', 'images/مدينة الرياضHEAD.jpg'),
(2, 'مدينة جدة', 'ثاني أكبر مدن المملكة العربية السعودية، وواحدةً من أهم مراكزها الاقتصادية والسياحية وثاني عواصمها التجارية. تقع في غرب المملكة على ساحل البحر الأحمر، وتلعب دوراً تاريخياً وحضارياً كبيراً كونها البوابة الرئيسية للحرمين الشريفين وقاصدي مكة المكرمة', 'images/مدينة جدةHEAD.jpg'),
(12, 'مدينة أبها', 'هي العاصمة الإدارية لمنطقة عسير جنوب غربي المملكة العربية السعودية، وهي مدينة جبلية تمثل أراضيها الجزء الأكثر ارتفاعا في المملكة، يطلق عليها عروس الجبل، وسيدة الضباب، وأبها البهية.', 'images/مدينة أبهاHEAD.jpg'),
(15, 'محافظة شقراء', 'شقراء هي عاصمة إقليم الوشم ومركز محافظة شقراء الإداري والتجاري، وتقع على بُعد نحو 185 كيلومتراً شمال غرب مدينة الرياض. تجمع المدينة بين الأصالة النجدية العريقة والتطور العصري، وتشتهر بهويتها العمرانية التاريخية وطبيعتها الهادئة.', 'images/محافظة شقراءHEAD.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `famous`
--

CREATE TABLE `famous` (
  `id` int(10) UNSIGNED NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `famous`
--

INSERT INTO `famous` (`id`, `city_id`, `name`) VALUES
(4, 2, 'نافورة الملك فهد'),
(5, 2, 'جدة التاريخية (البلد)'),
(6, 2, 'كورنيش جدة'),
(7, 2, 'مسجد الرحمة (المسجد العائم)'),
(39, 1, 'برج المملكة'),
(40, 1, 'الدرعية'),
(41, 1, 'المعيقلية'),
(45, 12, 'الجبل الأخضر'),
(46, 12, 'جبال السودة'),
(47, 12, 'قرية رجال ألمع التراثية'),
(60, 15, 'قصر السبيعي التاريخي'),
(61, 15, 'سوق حليوة التراثي'),
(62, 15, 'قرية أشيقر التراثية');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `image_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `city_id`, `image_path`) VALUES
(1, 1, 'images/مدينة الرياض/almuaqliah.png'),
(2, 1, 'images/مدينة الرياض/diryah.png'),
(3, 1, 'images/مدينة الرياض/Tower.jpg'),
(4, 2, 'images/مدينة جدة/alblad.jpg'),
(5, 2, 'images/مدينة جدة/cornicheJeddah.jpg'),
(6, 2, 'images/مدينة جدة/kingFN.jpg'),
(7, 2, 'images/مدينة جدة/rahmaM.jpg'),
(16, 12, 'images/مدينة أبها/ral.png.png'),
(17, 12, 'images/مدينة أبها/smoun.png.png'),
(18, 12, 'images/مدينة أبها/greenA.png.png'),
(22, 15, 'images/محافظة شقراء/sus.jpg.jpg'),
(23, 15, 'images/محافظة شقراء/sh.jpg.jpg'),
(24, 15, 'images/محافظة شقراء/ash.jpg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `general`
--

CREATE TABLE `general` (
  `id` int(10) UNSIGNED NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general`
--

INSERT INTO `general` (`id`, `city_id`, `info`) VALUES
(4, 2, 'بوابة الحرمين الشريفين'),
(5, 2, 'تلقب بعروس البحر الأحمر'),
(6, 2, 'تتميز بتاريخها العريق والحديث'),
(44, 1, 'مدينة سياحية'),
(45, 1, 'تحوي فعاليات عديدة'),
(46, 1, 'تتواجد بها معظم الشركات الكبرى'),
(50, 12, 'عاصمة السياحة الجبلية'),
(51, 12, 'سلسلة جبال السروات وطبيعتها الخضراء'),
(52, 12, 'أشجار الجاكراندا البنفسجية'),
(65, 15, 'العاصمة التاريخية للوشم'),
(66, 15, 'تشتهر بجودة انتاجها للتمور'),
(67, 15, 'تشتهر بانتاج فلفل شقراء');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `famous`
--
ALTER TABLE `famous`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_famous_city` (`city_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_gallery_city` (`city_id`);

--
-- Indexes for table `general`
--
ALTER TABLE `general`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_general_city` (`city_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `famous`
--
ALTER TABLE `famous`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `general`
--
ALTER TABLE `general`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `famous`
--
ALTER TABLE `famous`
  ADD CONSTRAINT `fk_famous_city` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `fk_gallery_city` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `general`
--
ALTER TABLE `general`
  ADD CONSTRAINT `fk_general_city` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
