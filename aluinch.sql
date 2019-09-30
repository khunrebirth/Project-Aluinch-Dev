-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2019 at 09:18 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aluinch`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_products`
--

CREATE TABLE `category_products` (
  `id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `slug` text NOT NULL,
  `description` text NOT NULL,
  `img_cover_home` text NOT NULL,
  `img_home_title_alt` text CHARACTER SET utf8mb4 NOT NULL,
  `img_cover` text NOT NULL,
  `img_title_alt` text NOT NULL,
  `group_product_id` int(11) NOT NULL,
  `file_catalog` text NOT NULL,
  `file_price` text NOT NULL,
  `file_cad` text NOT NULL,
  `meta_tag_title` text NOT NULL,
  `meta_tag_description` text NOT NULL,
  `meta_tag_keywords` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_products`
--

INSERT INTO `category_products` (`id`, `title`, `slug`, `description`, `img_cover_home`, `img_home_title_alt`, `img_cover`, `img_title_alt`, `group_product_id`, `file_catalog`, `file_price`, `file_cad`, `meta_tag_title`, `meta_tag_description`, `meta_tag_keywords`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'T-SERIES', 't-series', 'ระบบอลูมิเนียมวงกบ ช่องแสงติดตาย ขนาด 100 x 20 mm.', '02af9a.jpg', '', '0121df.jpg', '', 1, '', '', '', '', '', '', '2019-08-14 10:29:14', NULL, NULL),
(2, 'F-SERIES', 'f-series', 'ระบบอลูมิเนียมวงกบ ช่องแสงติดตาย ขนาด 45 x 20 mm.', '282986.jpg', '', 'a24779.jpg', '', 1, '', '', '', '', '', '', '2019-08-14 10:29:14', NULL, NULL),
(3, 'V-SERIES', 'v-series', 'ระบบอลูมิเนียมวงกบ ช่องแสงติดตาย ปรับขนาดตามผนังตั้งแต่ 90 - 200 mm.', 'c4093f.jpg', '', '471fcb.jpg', '', 1, '', '', '', '', '', '', '2019-08-14 10:29:46', NULL, NULL),
(4, 'D-SERIES', 'd-series', 'ระบบอลูมิเนียมประตูบานเปิด บานเลื่อนและบานสวิง หนา 35 mm.', '6d2aff.jpg', '', 'ff80c3.jpg', '', 1, '', '', '', '', '', '', '2019-08-14 10:31:56', NULL, NULL),
(5, 'S-SERIES', 's-series', 'ระบบอลูมิเนียมขัวเชิงผนัง แบบเรียบและสกรู ออน', '', '', '8ce542.jpg', '', 1, '', '', '', '', '', '', '2019-08-14 10:33:07', '2019-08-15 10:27:38', NULL),
(6, 'X-SERIES', 'x-series', 'ระบบอลูมิเนียมประตูบานเปิด บานเลื่อนและบานสวิง ขนาด 16 x 35 mm.', '', '', '45c20e.jpg', '', 1, '', '', '', '', '', '', '2019-08-14 10:33:07', NULL, NULL),
(7, 'M-SERIES', 'm-series', 'ระบบอลูมิเนียมประตู บานเลื่อนและบานสวิง ขนาด 9 x 35 mm.', '', '', '6b7b90.jpg', '', 1, '', '', '', '', '', '', '2019-08-14 10:34:09', NULL, NULL),
(8, 'E-SERIES', 'e-series', 'ระบบอลูมิเนียมบานเลื่อนประตูหน้าต่าง ( กันน้ำ )', '', '', 'de801d.jpg', '', 1, '', '', '', '', '', '', '2019-08-14 10:34:09', NULL, NULL),
(9, 'C-SERIES', 'c-series', 'ระบบอลูมิเนียมหน้าต่างบานกระทุ้ง ( กันน้ำ )', '', '', 'a7b71e.jpg', '', 1, '', '', '', '', '', '', '2019-08-14 10:35:17', NULL, NULL),
(10, 'B-SERIES', 'b-series', 'ระบบอลูมิเนียมบานเฟี้ยมประตูและหน้าต่าง ( กันน้ำ )', '', '', 'ae7132.jpg', '', 1, '', '', '', '', '', '', '2019-08-14 10:35:17', NULL, NULL),
(11, 'I-SERIES', 'i-series', 'ระบบอลูมิเนียมบานหน้าตู้ บานเลื่อนและบานเปิด', '', '', '91af97.jpg', '', 1, '', '', '', '', '', '', '2019-08-14 10:36:17', NULL, NULL),
(12, 'J-SERIES', 'j-series', 'ระบบอลูมิเนียมใช้ตกแต่งประตูหรือผนัง', '', '', 'b9c5bc.jpg', '', 1, '', '', '', '', '', '', '2019-08-14 10:36:17', NULL, NULL),
(13, 'L-SERIES', 'l-series', 'ระบบอลูมิเนียมบานเกร็ดสำหรับบังลมและรับลม', '', '', '780c33.jpg', '', 1, '', '', '', '', '', '', '2019-08-14 10:37:39', NULL, NULL),
(14, 'ACCESSORIES', 'accessories', 'ยางอัด ยางหุ้ม ยางปิดร่อง ยางสันบานประตูและขนสักหลาด', '', '', 'af734c.jpg', '', 1, '', '', '', '', '', '', '2019-08-14 10:37:39', NULL, NULL),
(15, 'Lever Handle', 'lever-handle', 'มือจับก้านโยกสำหรับประตูไม้และอลูมิเนียม', 'ce998a.jpg', '', '6cab71.jpg', '', 2, '', '', '', '', '', '', '2019-08-14 10:40:08', NULL, NULL),
(16, 'Pull Handle with Lock', 'pull-handle-with-lock', 'มือจับกระบองยาวมีล็อคในตัว', '949bfd.jpg', '', '71cd55.jpg', '', 2, '', '', '', '', '', '', '2019-08-14 10:40:08', NULL, NULL),
(18, 'Pull Handle', 'pull-handle', 'มือจับกระบองใช้สำหรับประตูทุกชนิด', '', '', '698931.jpg', '', 2, '', '', '', '', '', '', '2019-08-14 10:45:11', NULL, NULL),
(19, 'Flush Handle', 'flush-handle', 'มือจับแบบฝังใช้กับประตูบานไม้และอลูมิเนียม', 'ce265b.jpg', '', '4096f9.jpg', '', 2, '', '', '', '', '', '', '2019-08-14 10:46:28', NULL, NULL),
(20, 'Mortise Lock', 'mortise-lock', 'เสื้อกุญแจสำหรับประตูบานไม้และอลูมิเนียม', '', '', '29bcf9.jpg', '', 2, '', '', '', '', '', '', '2019-08-14 10:46:28', NULL, NULL),
(21, 'Knob Cylinder', 'knob-cylinder', 'ไส้กุญแจสำหรับประตูทุกชนิด', '', '', '35deea.jpg', '', 2, '', '', '', '', '', '', '2019-08-14 10:47:25', NULL, NULL),
(22, 'Door Closer', 'door-closer', 'โช้คอัพประตูใช้ได้กับประตูทุกชนิด', '', '', '92a66f.jpg', '', 2, '', '', '', '', '', '', '2019-08-14 10:47:25', NULL, NULL),
(23, 'Patch Fitting', 'patch-fitting', 'อุปกรณ์สำหรับประตูกระจกบานเปลือย', '', '', 'ea2aab.jpg', '', 2, '', '', '', '', '', '', '2019-08-14 10:47:53', NULL, NULL),
(24, 'Rolling Set', 'rolling-set', 'รางเลื่อนและล้อเลื่อนใช้กับประตูทุกชนิด', '', '', 'ef0b60.jpg', '', 2, '', '', '', '', '', '', '2019-08-14 10:48:20', NULL, NULL),
(25, 'ANODIZED', 'anodized', 'สีชุบเน้นความสวยงามของเฟรม', '', '', '0acae9.jpg', '', 3, '', '', '', '', '', '', '2019-08-14 10:49:24', NULL, NULL),
(26, 'POWDER COATED', 'powder-coated', 'สีพ่น ทนการขีดข่วนสีคงทนตามการใช้งาน', '', '', '688945.jpg', '', 3, '', '', '', '', '', '', '2019-08-14 10:49:24', NULL, NULL),
(28, 'test', '', 'test', 'a38ac25624f46b9de23a5dfcee1dcd46.jpg', 'test', 'd83cf92e78ac364aeabc2ee7e74e16d4.jpg', 'test', 1, '', '', '', '', '', '', '2019-09-27 06:10:05', '2019-09-27 06:10:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_technologies`
--

CREATE TABLE `category_technologies` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_technologies`
--

INSERT INTO `category_technologies` (`id`, `title`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PRESENTATION VDO วีดีโอแนะนำการใช้งาน', 'presentation-vdo-วีดีโอแนะนำการใช้งาน', '2019-08-15 02:39:51', NULL, NULL),
(2, 'TIPS AND TRICKS เกร็ดความรู้อลูมิเนียม', 'tips-and-tricks-เกร็ดความรู้อลูมิเนียม', '2019-08-15 02:39:51', NULL, NULL),
(3, 'FAQ คำถามที่พบบอย', 'faq-คำถามที่พบบอย', '2019-08-15 02:40:01', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(40) CHARACTER SET utf8 NOT NULL,
  `email` text CHARACTER SET utf8 NOT NULL,
  `phone` int(11) NOT NULL,
  `company` text CHARACTER SET utf8 NOT NULL,
  `message` text CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `company`, `message`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'นิลาวรรณ', 'nilawan_chd@hotmail.com', 222222222, 'abc', 'test', '2019-09-19 04:58:46', NULL, NULL),
(2, 'คชภัค', 'nilawan_pnch@hotmail.com', 222222222, 'abc', 'test', '2019-09-19 04:59:49', NULL, NULL),
(3, 'คชภัค', 'nilawan_pnch@hotmail.com', 222222222, 'abc', 'test', '2019-09-19 05:00:13', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_page`
--

CREATE TABLE `contact_page` (
  `id` int(11) NOT NULL,
  `address` text CHARACTER SET utf8 NOT NULL,
  `email` text CHARACTER SET utf8 NOT NULL,
  `tel` int(11) NOT NULL,
  `web` text CHARACTER SET utf8 NOT NULL,
  `meta_tag_title` text CHARACTER SET utf8 NOT NULL,
  `meta_tag_description` text CHARACTER SET utf8 NOT NULL,
  `meta_tag_keywords` text CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact_page`
--

INSERT INTO `contact_page` (`id`, `address`, `email`, `tel`, `web`, `meta_tag_title`, `meta_tag_description`, `meta_tag_keywords`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'abc', 'nilawan_chd@hotmail.com', 222222222, 'www.test.com', 'Test', 'Test', 'Test', '2019-09-26 07:54:28', '2019-09-27 07:15:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faq_technologies`
--

CREATE TABLE `faq_technologies` (
  `id` int(11) NOT NULL,
  `ask` text NOT NULL,
  `ans` text NOT NULL,
  `category_technology_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faq_technologies`
--

INSERT INTO `faq_technologies` (`id`, `ask`, `ans`, `category_technology_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ความแต่งต่างระหว่างอลูมิเนียมทั่วไปกับอลูมิเนียมจาก ALUINCH คือ', 'อลูมิเนียมทั่วไปตามท้องตลาดมีความหนาประมาณ 5 cm.เวลาติดตั้งเสร็จจะดูใหญ่และไม่สวยงามแต่อลูมิเนียมของ ALUINCH จะมีความหนาพียง 2 cm. เวลาติดตั้งเสร็จแล้วดูสวยงามลงตัวกับ design ของบ้านหรือ office', 3, '2019-08-15 02:40:27', NULL, NULL),
(2, 'อยากใช้อลูมิเนียม ALUINCH แต่ไม่รู้จะเริ่มตรงไหนดี', 'เรามี Team Sales Support คอยดูแลลูกค้า เพียงโทรหาเราหรือเข้ามาปรึกษาเรา เรายินดีให้คำแนะนำ เสนอราคา ถอดแบบ งานติดตั้งให้กับท่าน', 3, '2019-08-15 02:40:54', NULL, NULL),
(3, 'อลูมิเนียม ALUINCH ใช้ได้กับภายนอกหรือภายในอาคาร', 'อลูมิเนียมของ ALUINCH สามารถใช้ได้ทั้งภายในและภายนอกอาคาร บ้านเรือน แล้วแต่ลูกค้าต้องการ ไม่ว่าจะเป็น บานเลื่อน บานเปิด บานสวิง เป็นต้น', 3, '2019-08-15 02:41:07', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `group_products`
--

CREATE TABLE `group_products` (
  `id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `slug` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group_products`
--

INSERT INTO `group_products` (`id`, `title`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ALUMINIUM อลูมิเนียมโปรไฟล์', 'aluminium-อลูมิเนียมโปรไฟล์', '2019-08-14 10:23:28', '2019-09-27 04:39:09', NULL),
(2, 'HARDWARE อุปกรณ์ประตูหน้าต่าง', 'hardware-อุปกรณ์ประตูหน้าต่าง', '2019-08-14 10:23:28', NULL, NULL),
(3, 'COLLOR CHART สีอลูมิเนียมของเรา', 'collor-chart-สีอลูมิเนียมของเรา', '2019-08-14 10:23:39', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `image_products`
--

CREATE TABLE `image_products` (
  `id` int(11) NOT NULL,
  `images` text COLLATE utf8_unicode_ci NOT NULL,
  `products_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `image_products`
--

INSERT INTO `image_products` (`id`, `images`, `products_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '5875ebc1dfdd4.jpg', 1, '2019-09-20 09:04:29', NULL, NULL),
(2, '5875ebc1dfdd4.jpg', 1, '2019-09-20 09:04:51', NULL, NULL),
(3, 'b3f154.jpg', 2, '2019-09-20 09:04:51', NULL, NULL),
(4, '38ff6c.jpg', 3, '2019-09-20 09:04:51', NULL, NULL),
(5, '33a234.jpg', 4, '2019-09-20 09:04:51', NULL, NULL),
(6, '6fb176.jpg', 5, '2019-09-20 09:04:51', NULL, NULL),
(7, '106d27.jpg', 6, '2019-09-20 09:04:51', NULL, NULL),
(8, '433828.jpg', 7, '2019-09-20 09:04:51', NULL, NULL),
(9, 'd47562.jpg', 8, '2019-09-20 09:04:51', NULL, NULL),
(10, 'd55b26.jpg', 9, '2019-09-20 09:04:51', NULL, NULL),
(11, '4795f8.jpg', 10, '2019-09-20 09:04:51', NULL, NULL),
(12, '6ed14b.jpg', 11, '2019-09-20 09:04:51', NULL, NULL),
(13, 'd7d7b8.jpg', 12, '2019-09-20 09:04:51', NULL, NULL),
(14, 'b34757.jpg', 13, '2019-09-20 09:04:51', NULL, NULL),
(15, '27bc8e.jpg', 14, '2019-09-20 09:04:51', NULL, NULL),
(16, '715dc2.jpg', 15, '2019-09-20 09:04:51', NULL, NULL),
(17, '8ccb68.jpg', 16, '2019-09-20 09:04:51', NULL, NULL),
(18, 'c9c017.jpg', 17, '2019-09-20 09:04:51', NULL, NULL),
(19, '9eeb20.jpg', 18, '2019-09-20 09:04:51', NULL, NULL),
(20, 'de389b.jpg', 19, '2019-09-20 09:04:51', NULL, NULL),
(21, 'edac02.jpg', 20, '2019-09-20 09:04:51', NULL, NULL),
(22, '44b92c.jpg', 21, '2019-09-20 09:04:51', NULL, NULL),
(23, '79622f.jpg', 22, '2019-09-20 09:04:51', NULL, NULL),
(24, 'dc05df.jpg', 23, '2019-09-20 09:04:51', NULL, NULL),
(25, '4b8631.jpg', 24, '2019-09-20 09:04:51', NULL, NULL),
(26, '906e31.jpg', 25, '2019-09-20 09:04:51', NULL, NULL),
(27, '58ad6c.jpg', 26, '2019-09-20 09:04:51', NULL, NULL),
(28, '0eb773.jpg', 27, '2019-09-20 09:04:51', NULL, NULL),
(29, 'a4cbae.jpg', 28, '2019-09-20 09:04:51', NULL, NULL),
(30, '1ddc54.jpg', 29, '2019-09-20 09:04:51', NULL, NULL),
(31, 'f6ce3c.jpg', 30, '2019-09-20 09:04:51', NULL, NULL),
(32, '5adec0.jpg', 31, '2019-09-20 09:04:51', NULL, NULL),
(33, '4fa4a8.jpg', 32, '2019-09-20 09:04:51', NULL, NULL),
(34, 'c429c7.jpg', 33, '2019-09-20 09:04:51', NULL, NULL),
(35, '379fdf.jpg', 34, '2019-09-20 09:04:51', NULL, NULL),
(36, 'd228e6.jpg', 35, '2019-09-20 09:04:51', NULL, NULL),
(37, 'c50dcf.jpg', 36, '2019-09-20 09:04:51', NULL, NULL),
(38, '7bc506.jpg', 37, '2019-09-20 09:04:51', NULL, NULL),
(39, 'c0a2d2.jpg', 38, '2019-09-20 09:04:51', NULL, NULL),
(40, '060c35.jpg', 39, '2019-09-20 09:04:51', NULL, NULL),
(41, 'ab8d36.jpg', 40, '2019-09-20 09:04:51', NULL, NULL),
(42, 'e94c17.jpg', 41, '2019-09-20 09:04:51', NULL, NULL),
(43, '79d986.jpg', 42, '2019-09-20 09:04:51', NULL, NULL),
(44, '2ff6b8.jpg', 43, '2019-09-20 09:04:51', NULL, NULL),
(45, '64ec0d.jpg', 44, '2019-09-20 09:04:51', NULL, NULL),
(46, '29d5ac.jpg', 45, '2019-09-20 09:04:51', NULL, NULL),
(47, 'b633ac.jpg', 46, '2019-09-20 09:04:51', NULL, NULL),
(48, '7bdf50.jpg', 47, '2019-09-20 09:04:51', NULL, NULL),
(49, '6df70c.jpg', 48, '2019-09-20 09:04:51', NULL, NULL),
(50, '776569.jpg', 49, '2019-09-20 09:04:51', NULL, NULL),
(51, '34a74b.jpg', 50, '2019-09-20 09:04:51', NULL, NULL),
(52, 'b64600.jpg', 51, '2019-09-20 09:04:51', NULL, NULL),
(53, 'f8c0de.jpg', 52, '2019-09-20 09:04:51', NULL, NULL),
(54, '06ceb3.jpg', 53, '2019-09-20 09:04:51', NULL, NULL),
(55, 'da4aec.jpg', 54, '2019-09-20 09:04:51', NULL, NULL),
(56, 'b439d3.jpg', 55, '2019-09-20 09:04:51', NULL, NULL),
(57, '7f83d9.jpg', 56, '2019-09-20 09:04:51', NULL, NULL),
(58, 'e725af.jpg', 57, '2019-09-20 09:04:51', NULL, NULL),
(59, '207a3f.jpg', 58, '2019-09-20 09:04:51', NULL, NULL),
(60, '22bb7d.jpg', 59, '2019-09-20 09:04:51', NULL, NULL),
(61, '5b2b56.jpg', 60, '2019-09-20 09:04:51', NULL, NULL),
(62, '73dac0.jpg', 61, '2019-09-20 09:04:51', NULL, NULL),
(63, 'c464ff.jpg', 62, '2019-09-20 09:04:51', NULL, NULL),
(64, 'acc5ff.jpg', 63, '2019-09-20 09:04:51', NULL, NULL),
(65, 'd52589.jpg', 64, '2019-09-20 09:04:51', NULL, NULL),
(66, '56b213.jpg', 65, '2019-09-20 09:04:51', NULL, NULL),
(67, 'b71a26.jpg', 66, '2019-09-20 09:04:51', NULL, NULL),
(68, '7a57ac.jpg', 67, '2019-09-20 09:04:51', NULL, NULL),
(69, '2b3745.jpg', 68, '2019-09-20 09:04:51', NULL, NULL),
(70, 'b407fd.jpg', 69, '2019-09-20 09:04:51', NULL, NULL),
(71, '373181.jpg', 70, '2019-09-20 09:04:51', NULL, NULL),
(72, '2a4846.jpg', 71, '2019-09-20 09:04:51', NULL, NULL),
(73, '435b84.jpg', 72, '2019-09-20 09:04:51', NULL, NULL),
(74, '9024d6.jpg', 73, '2019-09-20 09:04:51', NULL, NULL),
(75, '58f512.jpg', 74, '2019-09-20 09:04:51', NULL, NULL),
(76, '5f6709.jpg', 75, '2019-09-20 09:04:51', NULL, NULL),
(77, 'c2f9b8.jpg', 76, '2019-09-20 09:04:51', NULL, NULL),
(78, '37de77.jpg', 77, '2019-09-20 09:04:51', NULL, NULL),
(79, '1bcd55.jpg', 78, '2019-09-20 09:04:51', NULL, NULL),
(80, '0391ef.jpg', 79, '2019-09-20 09:04:51', NULL, NULL),
(81, '313386.jpg', 80, '2019-09-20 09:04:51', NULL, NULL),
(82, '96712e.jpg', 81, '2019-09-20 09:04:51', NULL, NULL),
(83, 'aeed3f.jpg', 82, '2019-09-20 09:04:51', NULL, NULL),
(84, 'a06334.jpg', 83, '2019-09-20 09:04:51', NULL, NULL),
(85, 'a4050d.jpg', 84, '2019-09-20 09:04:51', NULL, NULL),
(86, '1b5adf.jpg', 85, '2019-09-20 09:04:51', NULL, NULL),
(87, '828bf6.jpg', 86, '2019-09-20 09:04:51', NULL, NULL),
(88, 'f2b7c4.jpg', 87, '2019-09-20 09:04:51', NULL, NULL),
(89, '9e7a88.jpg', 88, '2019-09-20 09:04:51', NULL, NULL),
(90, 'f064e0.jpg', 89, '2019-09-20 09:04:51', NULL, NULL),
(91, 'c9dfc4.jpg', 90, '2019-09-20 09:04:51', NULL, NULL),
(92, '2466a3.jpg', 91, '2019-09-20 09:04:51', NULL, NULL),
(93, '5fd270.jpg', 92, '2019-09-20 09:04:51', NULL, NULL),
(94, '2f5337.jpg', 93, '2019-09-20 09:04:51', NULL, NULL),
(95, 'efa9ad.jpg', 94, '2019-09-20 09:04:51', NULL, NULL),
(96, '7df92e.jpg', 95, '2019-09-20 09:04:51', NULL, NULL),
(97, '92a27a.jpg', 96, '2019-09-20 09:04:51', NULL, NULL),
(98, 'f8602b.jpg', 97, '2019-09-20 09:04:51', NULL, NULL),
(99, '7b1f4b.jpg', 98, '2019-09-20 09:04:51', NULL, NULL),
(100, '8dda38.jpg', 99, '2019-09-20 09:04:51', NULL, NULL),
(101, 'c53798.jpg', 100, '2019-09-20 09:04:51', NULL, NULL),
(102, '53443b.jpg', 101, '2019-09-20 09:04:51', NULL, NULL),
(103, 'd197b1.jpg', 102, '2019-09-20 09:04:51', NULL, NULL),
(104, '0ee3d9.jpg', 103, '2019-09-20 09:04:51', NULL, NULL),
(105, '0fd438.jpg', 104, '2019-09-20 09:04:51', NULL, NULL),
(106, '90b84b.jpg', 105, '2019-09-20 09:04:51', NULL, NULL),
(107, 'b2813e.jpg', 106, '2019-09-20 09:04:51', NULL, NULL),
(108, '2710e6.jpg', 107, '2019-09-20 09:04:51', NULL, NULL),
(109, 'aabc05.jpg', 108, '2019-09-20 09:04:51', NULL, NULL),
(110, 'ac08c6.jpg', 109, '2019-09-20 09:04:51', NULL, NULL),
(111, '6b4f7d.jpg', 110, '2019-09-20 09:04:51', NULL, NULL),
(112, '0d183a.jpg', 111, '2019-09-20 09:04:51', NULL, NULL),
(113, 'b19625.jpg', 112, '2019-09-20 09:04:51', NULL, NULL),
(114, '2f99a7.jpg', 113, '2019-09-20 09:04:51', NULL, NULL),
(115, '12c29b.jpg', 114, '2019-09-20 09:04:51', NULL, NULL),
(116, '70f9fe.jpg', 115, '2019-09-20 09:04:51', NULL, NULL),
(117, 'f9348c.jpg', 116, '2019-09-20 09:04:51', NULL, NULL),
(118, '58c68a.jpg', 117, '2019-09-20 09:04:51', NULL, NULL),
(119, '2d8b98.jpg', 118, '2019-09-20 09:04:51', NULL, NULL),
(120, 'd8eb8e.jpg', 119, '2019-09-20 09:04:51', NULL, NULL),
(121, '90f294.jpg', 120, '2019-09-20 09:04:51', NULL, NULL),
(122, '49f80c.jpg', 121, '2019-09-20 09:04:51', NULL, NULL),
(123, '709aff.jpg', 122, '2019-09-20 09:04:51', NULL, NULL),
(124, 'bf9f11.jpg', 123, '2019-09-20 09:04:51', NULL, NULL),
(125, '6304b1.jpg', 124, '2019-09-20 09:04:51', NULL, NULL),
(126, '50b95e.jpg', 125, '2019-09-20 09:04:51', NULL, NULL),
(127, 'f33b75.jpg', 126, '2019-09-20 09:04:51', NULL, NULL),
(128, '2c6312.jpg', 127, '2019-09-20 09:04:51', NULL, NULL),
(129, '8ab2d2.jpg', 128, '2019-09-20 09:04:51', NULL, NULL),
(130, 'b33cdc.jpg', 129, '2019-09-20 09:04:51', NULL, NULL),
(131, '3fc79d.jpg', 130, '2019-09-20 09:04:51', NULL, NULL),
(132, 'aca898.jpg', 131, '2019-09-20 09:04:51', NULL, NULL),
(133, '632f24.jpg', 132, '2019-09-20 09:04:51', NULL, NULL),
(134, '24cb82.jpg', 133, '2019-09-20 09:04:51', NULL, NULL),
(135, 'b1eb4f.jpg', 134, '2019-09-20 09:04:51', NULL, NULL),
(136, '2cab0d.jpg', 135, '2019-09-20 09:04:51', NULL, NULL),
(137, '72456c.jpg', 136, '2019-09-20 09:04:51', NULL, NULL),
(138, 'c11c7d.jpg', 137, '2019-09-20 09:04:51', NULL, NULL),
(139, '0df26f.jpg', 138, '2019-09-20 09:04:51', NULL, NULL),
(140, 'fca0ee.jpg', 139, '2019-09-20 09:04:51', NULL, NULL),
(141, '5d9932.jpg', 140, '2019-09-20 09:04:51', NULL, NULL),
(142, '217180.jpg', 141, '2019-09-20 09:04:51', NULL, NULL),
(143, '0b1f96.jpg', 142, '2019-09-20 09:04:51', NULL, NULL),
(144, 'b4f2d6.jpg', 143, '2019-09-20 09:04:51', NULL, NULL),
(145, '349b27.jpg', 144, '2019-09-20 09:04:51', NULL, NULL),
(146, '6b5361.jpg', 145, '2019-09-20 09:04:51', NULL, NULL),
(147, '5e0515.jpg', 146, '2019-09-20 09:04:51', NULL, NULL),
(148, 'a9dbce.jpg', 147, '2019-09-20 09:04:51', NULL, NULL),
(149, 'c919a6.jpg', 148, '2019-09-20 09:04:51', NULL, NULL),
(150, 'a3660c.jpg', 149, '2019-09-20 09:04:51', NULL, NULL),
(151, '28922d.jpg', 150, '2019-09-20 09:04:51', NULL, NULL),
(152, '45fb86.jpg', 151, '2019-09-20 09:04:51', NULL, NULL),
(153, 'a0a6a2.jpg', 152, '2019-09-20 09:04:51', NULL, NULL),
(154, 'ac56da.jpg', 153, '2019-09-20 09:04:51', NULL, NULL),
(155, '15e922.jpg', 154, '2019-09-20 09:04:51', NULL, NULL),
(156, '72e14c.jpg', 155, '2019-09-20 09:04:51', NULL, NULL),
(157, 'c73ab8.jpg', 156, '2019-09-20 09:04:51', NULL, NULL),
(158, '86f919.jpg', 157, '2019-09-20 09:04:51', NULL, NULL),
(159, '5cb764.jpg', 158, '2019-09-20 09:04:51', NULL, NULL),
(160, '7b3e31.jpg', 159, '2019-09-20 09:04:51', NULL, NULL),
(161, 'a10aea.jpg', 160, '2019-09-20 09:04:51', NULL, NULL),
(162, '9c05f0.jpg', 161, '2019-09-20 09:04:51', NULL, NULL),
(163, '90dd42.jpg', 162, '2019-09-20 09:04:51', NULL, NULL),
(164, 'bd593e.jpg', 163, '2019-09-20 09:04:51', NULL, NULL),
(165, '04e236.jpg', 164, '2019-09-20 09:04:51', NULL, NULL),
(166, 'b69f67.jpg', 165, '2019-09-20 09:04:51', NULL, NULL),
(167, '03574a.jpg', 166, '2019-09-20 09:04:51', NULL, NULL),
(168, '3f3f92.jpg', 167, '2019-09-20 09:04:51', NULL, NULL),
(169, 'c423d4.jpg', 168, '2019-09-20 09:04:51', NULL, NULL),
(170, '98cb78.jpg', 169, '2019-09-20 09:04:51', NULL, NULL),
(171, '4962a1.jpg', 170, '2019-09-20 09:04:51', NULL, NULL),
(172, '3ac686.jpg', 171, '2019-09-20 09:04:51', NULL, NULL),
(173, '5de234.jpg', 172, '2019-09-20 09:04:51', NULL, NULL),
(174, '3f675d.jpg', 173, '2019-09-20 09:04:51', NULL, NULL),
(175, '8f721a.jpg', 174, '2019-09-20 09:04:51', NULL, NULL),
(176, '31a51e.jpg', 175, '2019-09-20 09:04:51', NULL, NULL),
(177, '523656.jpg', 176, '2019-09-20 09:04:51', NULL, NULL),
(178, '79c677.jpg', 177, '2019-09-20 09:04:51', NULL, NULL),
(179, 'df73a1.jpg', 178, '2019-09-20 09:04:51', NULL, NULL),
(180, '16a9cb.jpg', 179, '2019-09-20 09:04:51', NULL, NULL),
(181, 'a5ef07.jpg', 180, '2019-09-20 09:04:51', NULL, NULL),
(182, '362c91.jpg', 181, '2019-09-20 09:04:51', NULL, NULL),
(183, '28c9e1.jpg', 182, '2019-09-20 09:04:51', NULL, NULL),
(184, '291fe9.jpg', 183, '2019-09-20 09:04:51', NULL, NULL),
(185, '5213fa.jpg', 184, '2019-09-20 09:04:51', NULL, NULL),
(186, '00dcfb.jpg', 185, '2019-09-20 09:04:51', NULL, NULL),
(187, '589e21.jpg', 186, '2019-09-20 09:04:51', NULL, NULL),
(188, '1e9b8a.jpg', 187, '2019-09-20 09:04:51', NULL, NULL),
(189, '8ea4b0.jpg', 188, '2019-09-20 09:04:51', NULL, NULL),
(190, '65fd5c.jpg', 189, '2019-09-20 09:04:51', NULL, NULL),
(191, '4b81f8.jpg', 190, '2019-09-20 09:04:51', NULL, NULL),
(192, '383c17.jpg', 191, '2019-09-20 09:04:51', NULL, NULL),
(193, '86d6cc.jpg', 192, '2019-09-20 09:04:51', NULL, NULL),
(194, 'e1cc81.jpg', 193, '2019-09-20 09:04:51', NULL, NULL),
(195, 'eb7ef8.jpg', 194, '2019-09-20 09:04:51', NULL, NULL),
(196, '85cc40.jpg', 195, '2019-09-20 09:04:51', NULL, NULL),
(197, '3b43f1.jpg', 196, '2019-09-20 09:04:51', NULL, NULL),
(198, '1ca043.jpg', 197, '2019-09-20 09:04:51', NULL, NULL),
(199, '9381fa.jpg', 198, '2019-09-20 09:04:51', NULL, NULL),
(200, '578c78.jpg', 199, '2019-09-20 09:04:51', NULL, NULL),
(201, '6916f8.jpg', 200, '2019-09-20 09:04:51', NULL, NULL),
(202, '695e50.jpg', 201, '2019-09-20 09:04:51', NULL, NULL),
(203, '513d4a.jpg', 202, '2019-09-20 09:04:51', NULL, NULL),
(204, 'eeb337.jpg', 203, '2019-09-20 09:04:51', NULL, NULL),
(205, '04222c.jpg', 204, '2019-09-20 09:04:51', NULL, NULL),
(206, '630b59.jpg', 205, '2019-09-20 09:04:51', NULL, NULL),
(207, '50b116.jpg', 206, '2019-09-20 09:04:51', NULL, NULL),
(208, '0aebfc.jpg', 207, '2019-09-20 09:04:51', NULL, NULL),
(209, '2c1be9.jpg', 208, '2019-09-20 09:04:51', NULL, NULL),
(210, '4e75d3.jpg', 209, '2019-09-20 09:04:51', NULL, NULL),
(211, 'cba7e4.jpg', 210, '2019-09-20 09:04:51', NULL, NULL),
(212, '7effd6.jpg', 211, '2019-09-20 09:04:51', NULL, NULL),
(213, '537dc1.jpg', 212, '2019-09-20 09:04:51', NULL, NULL),
(214, '3ad4b3.jpg', 213, '2019-09-20 09:04:51', NULL, NULL),
(215, '2010fb.jpg', 214, '2019-09-20 09:04:51', NULL, NULL),
(216, '8829d5.jpg', 215, '2019-09-20 09:04:51', NULL, NULL),
(217, '0ccd29.jpg', 216, '2019-09-20 09:04:51', NULL, NULL),
(218, 'e506b4.jpg', 217, '2019-09-20 09:04:51', NULL, NULL),
(219, '11e82f.jpg', 218, '2019-09-20 09:04:51', NULL, NULL),
(220, 'eb613f.jpg', 219, '2019-09-20 09:04:51', NULL, NULL),
(221, 'ab9fb5.jpg', 220, '2019-09-20 09:04:51', NULL, NULL),
(222, 'e9732e.jpg', 221, '2019-09-20 09:04:51', NULL, NULL),
(223, '0a6d3f.jpg', 222, '2019-09-20 09:04:51', NULL, NULL),
(224, '114fac.jpg', 223, '2019-09-20 09:04:51', NULL, NULL),
(225, '056cfc.jpg', 224, '2019-09-20 09:04:51', NULL, NULL),
(226, '7f0db8.jpg', 225, '2019-09-20 09:04:51', NULL, NULL),
(227, '73b754.jpg', 226, '2019-09-20 09:04:51', NULL, NULL),
(228, 'ddfb4b.jpg', 227, '2019-09-20 09:04:51', NULL, NULL),
(229, '84b510.jpg', 228, '2019-09-20 09:04:51', NULL, NULL),
(230, 'd4955a.jpg', 229, '2019-09-20 09:04:51', NULL, NULL),
(231, 'ef8875.jpg', 230, '2019-09-20 09:04:51', NULL, NULL),
(232, '8dcd80.jpg', 231, '2019-09-20 09:04:51', NULL, NULL),
(233, 'be8557.jpg', 232, '2019-09-20 09:04:51', NULL, NULL),
(234, '8f46fb.jpg', 233, '2019-09-20 09:04:51', NULL, NULL),
(235, '6ba84b.jpg', 234, '2019-09-20 09:04:51', NULL, NULL),
(236, 'ffb303.jpg', 235, '2019-09-20 09:04:51', NULL, NULL),
(237, '3b6c6d.jpg', 236, '2019-09-20 09:04:51', NULL, NULL),
(238, 'bffa5c.jpg', 237, '2019-09-20 09:04:51', NULL, NULL),
(239, 'eeafd9.jpg', 238, '2019-09-20 09:04:51', NULL, NULL),
(240, 'c0b55d.jpg', 239, '2019-09-20 09:04:51', NULL, NULL),
(241, 'ec0bc7.jpg', 240, '2019-09-20 09:04:51', NULL, NULL),
(242, 'f26443.jpg', 241, '2019-09-20 09:04:51', NULL, NULL),
(243, 'a35049.jpg', 242, '2019-09-20 09:04:51', NULL, NULL),
(244, 'c0d706.jpg', 243, '2019-09-20 09:04:51', NULL, NULL),
(245, 'd834ca.jpg', 244, '2019-09-20 09:04:51', NULL, NULL),
(246, '138d34.jpg', 245, '2019-09-20 09:04:51', NULL, NULL),
(247, '1346db.jpg', 246, '2019-09-20 09:04:51', NULL, NULL),
(248, 'a0acbb.jpg', 247, '2019-09-20 09:04:51', NULL, NULL),
(249, '12a9e6.jpg', 248, '2019-09-20 09:04:51', NULL, NULL),
(250, 'c573b6.jpg', 249, '2019-09-20 09:04:51', NULL, NULL),
(251, '5d4379.jpg', 250, '2019-09-20 09:04:51', NULL, NULL),
(252, 'dc0678.jpg', 251, '2019-09-20 09:04:51', NULL, NULL),
(253, '5c6eb2.jpg', 252, '2019-09-20 09:04:51', NULL, NULL),
(254, 'af2c09.jpg', 253, '2019-09-20 09:04:51', NULL, NULL),
(255, '4c9551.jpg', 254, '2019-09-20 09:04:51', NULL, NULL),
(256, '95951f.jpg', 255, '2019-09-20 09:04:51', NULL, NULL),
(257, 'c4f03e.jpg', 256, '2019-09-20 09:04:51', NULL, NULL),
(258, 'b59410.jpg', 257, '2019-09-20 09:04:51', NULL, NULL),
(259, 'c9db2a.jpg', 258, '2019-09-20 09:04:51', NULL, NULL),
(260, '0427ba.jpg', 259, '2019-09-20 09:04:51', NULL, NULL),
(261, 'a18b8f.jpg', 260, '2019-09-20 09:04:51', NULL, NULL),
(262, 'ee1775.jpg', 261, '2019-09-20 09:04:51', NULL, NULL),
(263, '8d9b2b.jpg', 262, '2019-09-20 09:04:51', NULL, NULL),
(264, 'c99878.jpg', 263, '2019-09-20 09:04:51', NULL, NULL),
(265, 'd4a659.jpg', 264, '2019-09-20 09:04:51', NULL, NULL),
(266, 'e878a4.jpg', 265, '2019-09-20 09:04:51', NULL, NULL),
(267, '58a999.jpg', 266, '2019-09-20 09:04:51', NULL, NULL),
(268, '85e78e.jpg', 267, '2019-09-20 09:04:51', NULL, NULL),
(269, '6139d0.jpg', 268, '2019-09-20 09:04:51', NULL, NULL),
(270, 'f9946d.jpg', 269, '2019-09-20 09:04:51', NULL, NULL),
(271, 'fe3409.jpg', 270, '2019-09-20 09:04:51', NULL, NULL),
(272, 'a4236b.jpg', 271, '2019-09-20 09:04:51', NULL, NULL),
(273, '70a526.jpg', 272, '2019-09-20 09:04:51', NULL, NULL),
(274, '68b560.jpg', 273, '2019-09-20 09:04:51', NULL, NULL),
(275, '74583c.jpg', 274, '2019-09-20 09:04:51', NULL, NULL),
(276, '11477a.jpg', 275, '2019-09-20 09:04:51', NULL, NULL),
(277, 'ad4853.jpg', 276, '2019-09-20 09:04:51', NULL, NULL),
(278, '0b89e8.jpg', 277, '2019-09-20 09:04:51', NULL, NULL),
(279, 'd6bc7d.jpg', 278, '2019-09-20 09:04:51', NULL, NULL),
(280, '5866f6.jpg', 279, '2019-09-20 09:04:51', NULL, NULL),
(281, 'eb6211.jpg', 280, '2019-09-20 09:04:51', NULL, NULL),
(282, 'afb3d4.jpg', 281, '2019-09-20 09:04:51', NULL, NULL),
(283, '571b253f42940.jpg', 205, '2019-09-20 09:35:43', NULL, NULL),
(284, '568f807814ec2.jpg', 214, '2019-09-20 09:37:41', NULL, NULL),
(285, '568f8251b43a5.jpg', 220, '2019-09-20 09:39:52', NULL, NULL),
(286, '568c78547c29a.jpg', 221, '2019-09-20 09:40:40', NULL, NULL),
(287, '568c78600d999.jpg', 222, '2019-09-20 09:41:11', NULL, NULL),
(288, '568f6fcbb8a3f.jpg', 255, '2019-09-20 09:53:27', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `image_projects`
--

CREATE TABLE `image_projects` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `project_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image_projects`
--

INSERT INTO `image_projects` (`id`, `title`, `project_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '567379f030b79.jpg', 1, '2019-08-15 02:43:46', NULL, NULL),
(2, '567379f11d868.jpg', 1, '2019-08-15 02:43:46', NULL, NULL),
(3, '567379f21db5a.jpg', 1, '2019-08-15 02:44:26', NULL, NULL),
(4, '567379f2c8361.jpg', 1, '2019-08-15 02:44:26', NULL, NULL),
(5, '567379f3bb4dd.jpg', 1, '2019-08-15 02:45:05', NULL, NULL),
(6, '567379f3d4dbb.jpg', 1, '2019-08-15 02:45:05', NULL, NULL),
(7, '567379e8117ef.jpg', 1, '2019-08-15 02:46:17', NULL, NULL),
(8, '567379ef8bb22.jpg', 1, '2019-08-15 02:46:17', NULL, NULL),
(9, '56737b29b4c2f.jpg', 2, '2019-08-15 02:49:47', NULL, NULL),
(10, '56737b2b65d41.jpg', 2, '2019-08-15 02:49:47', NULL, NULL),
(11, '56737b2d6d02a.jpg', 2, '2019-08-15 02:50:07', NULL, NULL),
(12, '56737b2f0d056.jpg', 2, '2019-08-15 02:50:07', NULL, NULL),
(13, '57590dcfa7cd0.jpg', 3, '2019-08-15 03:41:07', NULL, NULL),
(14, '57591349e21be.jpg', 3, '2019-08-15 03:41:07', NULL, NULL),
(15, '575913505a601.jpg', 3, '2019-08-15 03:41:37', NULL, NULL),
(16, '57591356df339.jpg', 3, '2019-08-15 03:41:37', NULL, NULL),
(17, '57590e1d66770.jpg', 3, '2019-08-15 03:42:10', NULL, NULL),
(18, '5759135d97eb0.jpg', 3, '2019-08-15 03:42:10', NULL, NULL),
(19, '575913655c5a7.jpg', 3, '2019-08-15 03:42:41', NULL, NULL),
(20, '57591374289de.jpg', 3, '2019-08-15 03:42:41', NULL, NULL),
(21, '57591379b639f.jpg', 3, '2019-08-15 03:43:10', NULL, NULL),
(22, '5759137eb255e.jpg', 3, '2019-08-15 03:43:10', NULL, NULL),
(23, '57591397f2ced.jpg', 3, '2019-08-15 03:43:42', NULL, NULL),
(24, '5759139cc4eb3.jpg', 3, '2019-08-15 03:43:42', NULL, NULL),
(25, '5759224837e41.jpg', 4, '2019-08-15 03:44:32', NULL, NULL),
(26, '575921fde0be8.jpg', 4, '2019-08-15 03:44:32', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'home', '2019-08-15 10:54:05', NULL, NULL),
(2, 'product', '2019-08-15 10:54:05', NULL, NULL),
(3, 'category_technology', '2019-08-15 10:54:18', NULL, NULL),
(4, 'project-references', '2019-08-15 10:54:18', NULL, NULL),
(5, 'contact', '2019-08-15 10:54:52', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page_meta_tags`
--

CREATE TABLE `page_meta_tags` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  `page_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `img_title_alt` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `img`, `img_title_alt`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'f3bdc0.jpg', '', '2019-08-22 09:13:06', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '77af11.jpg', '', '2019-08-22 09:13:06', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'e44907.jpg', '', '2019-08-22 09:13:23', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '5c4262.jpg', '', '2019-08-22 09:13:23', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `description_en` text NOT NULL,
  `description_th` text NOT NULL,
  `img_title_alt` text NOT NULL,
  `detail` text NOT NULL,
  `group_product_id` int(11) NOT NULL,
  `category_product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description_en`, `description_th`, `img_title_alt`, `detail`, `group_product_id`, `category_product_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ALUINCH T-20.01', 'HEADTRACK 20 mm.', 'กล่องเรียบ 20 มม.', '', '', 1, 1, '2019-08-15 02:39:00', NULL, NULL),
(2, 'ALUINCH T-20.02', 'MULLION 20 mm.', 'กล่องร่อง 20 มม.', '', '', 1, 1, '2019-08-15 02:39:00', NULL, NULL),
(3, 'ALUINCH T-20.03', 'SNAPING HEADTRACK', 'กล่องเรียบ 20 มม.', '', '', 1, 1, '2019-08-15 02:39:00', NULL, NULL),
(4, 'ALUINCH T-20.05', 'GLAZING BAR 20 mm.', 'กล่องเปิด 20 มม.', '', '', 1, 1, '2019-08-15 02:39:00', NULL, NULL),
(5, 'ALUINCH T-20.06', 'GLAZING BEAD 20 mm.', 'ฝาปิด 20 มม. ใช้คู่กับ T-20.05', '', '', 1, 1, '2019-08-15 02:39:00', NULL, NULL),
(6, 'ALUINCH T-25.03', 'MULLION 25 mm.', 'กล่องร่อง 25 มม.', '', '', 1, 1, '2019-08-15 02:39:00', NULL, NULL),
(7, 'ALUINCH T-25.04', 'SNAPING MULLION', 'ตบร่อง 25 มม. ใช้คู่กับ T-25.03', '', '', 1, 1, '2019-08-15 02:39:00', NULL, NULL),
(8, 'ALUINCH T-25.07', 'WIDE LINE TRANSOM FRAME', 'ซอยลูกฟัก 25 มม. แนวนอน', '', '', 1, 1, '2019-08-15 02:39:00', NULL, NULL),
(9, 'ALUINCH T-25.08', 'TRANSOM BEAD 25 mm.', 'ฝาปิดตัวซอย 25 มม. ใช้คู่กับ T-25.07', '', '', 1, 1, '2019-08-15 02:39:00', NULL, NULL),
(10, 'ALUINCH T-10', 'FLUSH STOP', 'ตบร่องเรียบ ร่องกระจก', '', '', 1, 1, '2019-08-15 02:39:00', NULL, NULL),
(11, 'ALUINCH T-35', '35 mm. DOOR STOP', 'บังใบสำหรับบาน 35 มม.', '', '', 1, 1, '2019-08-15 02:39:00', NULL, NULL),
(12, 'ALUINCH T- 45', '45 mm. DOOR STOP', 'บังใบสำหรับบาน 45 มม.', '', '', 1, 1, '2019-08-15 02:39:00', NULL, NULL),
(13, 'ALUINCH T-25.03P', 'MULLION 25 mm.', 'กล่องร่องมีปีกข้าง 25 มม.', '', '', 1, 1, '2019-08-15 02:39:00', NULL, NULL),
(14, 'ALUINCH T-20.09', 'FRONT LINE GAZING BAR', 'กล่องเปิดร่องข้าง 20 มม.', '', '', 1, 1, '2019-08-15 02:39:00', NULL, NULL),
(15, 'ALUINCH T-20.10', 'FRONT LINE 20 mm.', 'กล่องร่องข้าง 20 มม.', '', '', 1, 1, '2019-08-15 02:39:00', NULL, NULL),
(16, 'ALUINCH T-25.13', 'FRONT LINE 25 mm.', 'กล่องร่องข้าง 25 มม.', '', '', 1, 1, '2019-08-15 02:39:00', NULL, NULL),
(17, 'ALUINCH T-25.14', 'FRONT LINE SNAPING MULLION', 'ตบกล่องร่องข้าง 25 มม. ใช้คู่กับ T-25.13', '', '', 1, 1, '2019-08-15 02:39:00', NULL, NULL),
(18, 'ALUINCH T-25.17', 'FRONT LINE TRANSOM FRAME', 'ซอยลูกฟักร่องข้าง 25 มม.', '', '', 1, 1, '2019-08-15 02:39:00', NULL, NULL),
(19, 'ALUINCH T-01C', 'TRANGLE BACK-2-BACK 100 mm.', 'เสาเหลี่ยม 100 มม.', '', '', 1, 1, '2019-08-15 02:39:00', NULL, NULL),
(20, 'ALUINCH T-02C', 'CONNER DOME SHAPE', 'เสาโค้ง 100 มม. ใช้คู่กับ T-01C', '', '', 1, 1, '2019-08-15 02:39:00', NULL, NULL),
(21, 'ALUINCH P-03', 'T5 - ALU PENDANT', 'รางไฟ 100 มม. x 35 มม.', '', '', 1, 1, '2019-08-15 02:39:00', NULL, NULL),
(22, 'ALUINCH F-20.01', 'MINI SNAPING MULLION', 'ตบเรียบ รุ่นเล็ก 20 มม.', '', '', 1, 2, '2019-09-19 07:33:05', NULL, NULL),
(23, 'ALUINCH F-20.02', 'MINI MULLION 20 mm.', 'กล่องร่อง รุ่นเล็ก 20 มม.', '', '', 1, 2, '2019-09-19 07:33:05', NULL, NULL),
(24, 'ALUINCH F-25.03', 'MINI HEAD TRACK 25 mm.', 'กล่องร่อง รุ่นเล็ก 25 มม.', '', '', 1, 2, '2019-09-19 07:33:05', NULL, NULL),
(25, 'ALUINCH F-25.04', 'SNAPING MULLION 25 mm.', 'ตบร่อง รุ่นเล็ก 25 มม.', '', '', 1, 2, '2019-09-19 07:33:05', NULL, NULL),
(26, 'ALUINCH F-20.05', 'MINI GLAZING', 'กล่องเปิด รุ่นเล็ก 20 มม.', '', '', 1, 2, '2019-09-19 07:33:05', NULL, NULL),
(27, 'ALUINCH F-20.06', 'MINI GLAZING BEAD', 'ฝาเปิด รุ่นเล็ก 20 มม. ใช้คู่กับ F-20.05', '', '', 1, 2, '2019-09-19 07:33:05', NULL, NULL),
(28, 'ALUINCH F-25.07', 'TRANSOM FRAME 25 mm.', 'ซอยลูกฟักรุ่นเล็ก 25 มม.', '', '', 1, 2, '2019-09-19 07:33:05', NULL, NULL),
(29, 'ALUINCH F-25.08', 'TRANSOM BEAD 25 mm.', 'ฝาปิดซอยรุ่นเล็ก 25 มม. ใช้คู่กับ F-25.07', '', '', 1, 2, '2019-09-19 07:33:05', NULL, NULL),
(30, 'ALUINCH F-35', 'DOOR STOP 35 mm.', 'บังใบสำหรับบาน 35 มม.', '', '', 1, 2, '2019-09-19 07:33:05', NULL, NULL),
(31, 'ALUINCH F-45', 'DOOR STOP 45 mm.', 'บังใบสำหรับบาน 45 มม.', '', '', 1, 2, '2019-09-19 07:33:05', NULL, NULL),
(32, 'ALUINCH F-01C', 'MINI CONNER ALUMINIUM RAIL', 'เสาเหลี่ยม 45 มม.', '', '', 1, 2, '2019-09-19 07:33:05', NULL, NULL),
(33, 'ALUINCH F-02C', 'MINI CONNER DOME SHAPE', 'เสาโค้ง 45 มม.', '', '', 1, 2, '2019-09-19 07:33:05', NULL, NULL),
(34, 'ALUINCH V-01', 'INNER CASING', 'วงกบทับใน (100-125 มม.)', '', '', 1, 3, '2019-09-19 08:08:01', NULL, NULL),
(35, 'ALUINCH V-02', 'OUTER CASING', 'วงกบทับนอก', '', '', 1, 3, '2019-09-19 08:08:01', NULL, NULL),
(36, 'ALUINCH V-03', 'INNER CASING', 'วงกบทับใน (135-160 มม.)', '', '', 1, 3, '2019-09-19 08:08:01', NULL, NULL),
(37, 'ALUINCH V-04', 'OUTER CASING (MULLION)', 'กล่องร่องทับนอก (160-200 มม.)', '', '', 1, 3, '2019-09-19 08:08:01', NULL, NULL),
(38, 'ALUINCH V-35', 'DOOR STOP 35 mm.', 'บังใบสำหรับบาน 35 มม.', '', '', 1, 3, '2019-09-19 08:08:01', NULL, NULL),
(39, 'ALUINCH V-45', 'DOOR STOP 45 mm.', 'บังใบสำหรับบาน 45 มม.', '', '', 1, 3, '2019-09-19 08:08:01', NULL, NULL),
(40, 'ALUINCH D-100', 'VERTICAL DOOR 100 mm.', 'เสาประตู 100 มม.', '', '', 1, 4, '2019-09-19 08:25:42', NULL, NULL),
(41, 'ALUINCH D-60', 'VERTICAL DOOR 60 mm.', 'เสากุญแจ 60 มม.', '', '', 1, 4, '2019-09-19 08:25:42', NULL, NULL),
(42, 'ALUINCH D-60s', 'JOINT DOOR', 'เสาเกี่ยว 60 มม.', '', '', 1, 4, '2019-09-19 08:25:42', NULL, NULL),
(43, 'ALUINCH D-61', 'SNAPING TOP DOOR', 'ฝาปิดขวางประตู 35 มม. ใช้คู่กับ D-63', '', '', 1, 4, '2019-09-19 08:25:42', NULL, NULL),
(44, 'ALUINCH D-62', 'DOOR GLAZING BEAD', 'คิ้วประตู 35 มม. ใช้คู่กับ D-63', '', '', 1, 4, '2019-09-19 08:25:42', NULL, NULL),
(45, 'ALUINCH D-63', 'TOP DOOR', 'ขวางบนประตู', '', '', 1, 4, '2019-09-19 08:25:42', NULL, NULL),
(46, 'ALUINCH D63A', 'BOTTOM SWING DOOR', 'ขวางประตูประตูบานเปิด บานสวิง', '', '', 1, 4, '2019-09-19 08:25:42', NULL, NULL),
(47, 'ALUINCH D-64', 'BOTTOM DOOR', 'ขวางล่างประตู', '', '', 1, 4, '2019-09-19 08:25:42', NULL, NULL),
(48, 'ALUINCH D-65', 'HORIZONTAL SLIPING', 'คิ้วสักหลาด บานเลื่อน', '', '', 1, 4, '2019-09-19 08:25:42', NULL, NULL),
(49, 'ALUINCH D-66', 'HORIZONTAL SWING', 'คิ้วสักหลาด บานเปิดคู่', '', '', 1, 4, '2019-09-19 08:25:42', NULL, NULL),
(50, 'ALUINCH D-67', 'ALUMINIUM BOX', 'เสารับบานประตู 35-45 มม.', '', '', 1, 4, '2019-09-19 08:25:42', NULL, NULL),
(51, 'ALUINCH D-69', 'DOOR MID RAIL', 'ซอยลูกฟักประตู 25 มม.', '', '', 1, 4, '2019-09-19 08:25:42', NULL, NULL),
(52, 'ALUINCH D-25', 'ALU-DEC FOR WOOD DOOR', 'ปิดสันบานประตู 25 มม.', '', '', 1, 4, '2019-09-19 08:25:42', NULL, NULL),
(53, 'ALUINCH D-35', 'ALU-DEC FOR WOOD DOOR', 'ปิดสันบานประตู 35 มม.', '', '', 1, 4, '2019-09-19 08:25:42', NULL, NULL),
(54, 'ALUINCH D-45', 'ALU-DEC FOR WOOD DOOR', 'ปิดสันบานประตู 45 มม.', '', '', 1, 4, '2019-09-19 08:25:42', NULL, NULL),
(55, 'ALUINCH SK-50', 'SKIRTING 50 mm.', 'บัวเชิงผนัง 50 มม.', '', '', 1, 5, '2019-09-19 08:46:33', NULL, NULL),
(56, 'ALUINCH SK-100', 'SKIRTING 100 mm.', 'บัวเชิงผนัง 100 มม.', '', '', 1, 5, '2019-09-19 08:46:33', NULL, NULL),
(57, 'ALUINCH SK-150', 'SKIRTING 150 mm.', 'บัวเชิงผนัง 150 มม.', '', '', 1, 5, '2019-09-19 08:46:33', NULL, NULL),
(58, 'ALUINCH SKF-50', 'FLAT SKIRTING 50 mm.', 'บัวเรียบ 50 มม.', '', '', 1, 5, '2019-09-19 08:46:33', NULL, NULL),
(59, 'ALUINCH SKF-100', 'FLAT SKIRTING 100 mm.', 'บัวเรียบ 100 มม.', '', '', 1, 5, '2019-09-19 08:46:33', NULL, NULL),
(60, 'ALUINCH SKF-150', 'FLAT SKIRTING 150 mm.', 'บัวเรียบ 150 มม.', '', '', 1, 5, '2019-09-19 08:46:33', NULL, NULL),
(61, 'ALUINCH SKL-50', 'CONNER 50 mm.', 'เข้ามุม (ใน-นอก) 50 มม.', '', '', 1, 5, '2019-09-19 08:46:33', NULL, NULL),
(62, 'ALUINCH SKL-100', 'CONNER 100 mm.', 'เข้ามุม (ใน-นอก) 100 มม.', '', '', 1, 5, '2019-09-19 08:46:33', NULL, NULL),
(63, 'ALUINCH SKL-150', 'CONNER 150 mm.', 'เข้ามุม (ใน-นอก) 150 มม.', '', '', 1, 5, '2019-09-19 08:46:33', NULL, NULL),
(64, 'ALUINCH SKE-50', 'STOP END 50 mm.', 'จบข้าง (ซ้าย-ขวา) 50 มม.', '', '', 1, 5, '2019-09-19 08:46:33', NULL, NULL),
(65, 'ALUINCH SKE-100', 'STOP END 100 mm.', 'จบข้าง (ซ้าย-ขวา) 100 มม.', '', '', 1, 5, '2019-09-19 08:46:33', NULL, NULL),
(66, 'ALUINCH SKE-150', 'STOP END 150 mm.', 'จบข้าง (ซ้าย-ขวา) 150 มม.', '', '', 1, 5, '2019-09-19 08:46:33', NULL, NULL),
(67, 'ALUINCH SKC', 'ALUMINIUM COVER SKIRTING', 'อลูมิเนียมปิดร่องสกรู', '', '', 1, 5, '2019-09-19 08:46:33', NULL, NULL),
(68, 'ALUINCH SR', 'PVC COVER SKIRT', 'ยางปิดร่องสกรู บัวเชิงผนัง', '', '', 1, 5, '2019-09-19 08:46:33', NULL, NULL),
(69, 'ALUINCH X-01', 'VERTICAL FRAME', 'เสาประตู ขนาด 16 x 38 มม.', '', '', 1, 6, '2019-09-19 09:00:08', NULL, NULL),
(70, 'ALUINCH X-02', 'HORIZONTAL FRAME', 'ขวางประตู บานเปิด ขนาด 16 x 37 มม.', '', '', 1, 6, '2019-09-19 09:00:08', NULL, NULL),
(71, 'ALUINCH X-03', 'HORIZONTAL FRAME', 'ขวางประตู บานเเลื่อน ขนาด 25 x 37 มม.', '', '', 1, 6, '2019-09-19 09:00:08', NULL, NULL),
(72, 'ALUINCH X-04', 'DOOR MID RAIL FRAME', 'ซอยลูกฟักประตู ขนาด 16 x 37 มม.', '', '', 1, 6, '2019-09-19 09:00:08', NULL, NULL),
(73, 'ALUINCH X-05', 'DOOR FRAME', 'เสากุญแจประตู สำหรับล็อค ขนาด 38 x 62 มม.', '', '', 1, 6, '2019-09-19 09:00:08', NULL, NULL),
(74, 'ALUINCH XH-01', 'COVER FOR MORTISE LOCK', 'ฝาเสื้อกุญแจสำหรับประตูบานเปิด XH.01', '', '', 1, 6, '2019-09-19 09:00:08', NULL, NULL),
(75, 'ALUINCH XH-01', 'DCOVER FOR MORTISE LOCK', 'ฝาเสื้อกุญแจบานเปิดดัมมี่ XH.01D', '', '', 1, 6, '2019-09-19 09:00:08', NULL, NULL),
(76, 'ALUINCH XH-02', 'COVER FOR MORTISE LOCK', 'ฝาเสื้อกุญแจสำหรับประตูบานสวิง XH.02', '', '', 1, 6, '2019-09-19 09:00:08', NULL, NULL),
(77, 'ALUINCH XH-02A', 'COVER FOR MORTISE LOCK', 'ฝาเสื้อกุญแจสำหรับประตูบานสวิง XH.02A', '', '', 1, 6, '2019-09-19 09:00:08', NULL, NULL),
(78, 'ALUINCH XH-03', 'COVER FOR MORTISE LOCK', 'ฝาเสื้อกุญแจสำหรับประตูบานเลื่อน XH.03', '', '', 1, 6, '2019-09-19 09:00:08', NULL, NULL),
(79, 'ALUINCH XH-02AD', 'COVER DUMMY FOR MORTISE LOCK', 'ฝาเสื้อกุญแจดัมมี่สำหรับประตูบานสวิง XH.02AD', '', '', 1, 6, '2019-09-19 09:00:08', NULL, NULL),
(80, 'ALUINCH XH-03A', 'COVER FOR MORTISE LOCK', 'ฝาเสื้อกุญแจสำหรับประตูบานเลื่อน XH.03A', '', '', 1, 6, '2019-09-19 09:00:08', NULL, NULL),
(81, 'ALUINCH XH-03AD', 'COVER DUMMY FOR MORTISE LOCK', 'ฝาเสื้อกุญแจดัมมี่สำหรับประตูบานเลื่อน XH.03AD', '', '', 1, 6, '2019-09-19 09:00:08', NULL, NULL),
(82, 'ALUINCH XH-04D', 'COVER DUMMY FOR MORTISE NO LOCK', 'ฝาเสื้อกุญแจดัมมี่สำหรับบานเปิดไม่ล็อค XH.04D', '', '', 1, 6, '2019-09-19 09:00:08', NULL, NULL),
(83, 'ALUINCH XH-04', 'COVER FOR MORTISE NO LOCK', 'ฝาเสื้อกุญแจสำหรับบานเปิดไม่ล็อค XH.04', '', '', 1, 6, '2019-09-19 09:00:08', NULL, NULL),
(84, 'ALUINCH X-T', 'T-SHAPE FOR SLIDING DOOR', 'มือจับประตู ขนาด 22 x 38 มม.', '', '', 1, 6, '2019-09-19 09:00:08', NULL, NULL),
(85, 'ALUINCH X-J', 'J-SHAPE FOR SLIDING DOOR', 'มือจับประตู ขนาด 16 x 20 มม.', '', '', 1, 6, '2019-09-19 09:00:08', NULL, NULL),
(86, 'ALUINCH X-C', 'C-HANDLE DOOR', 'มือจับประตู แบบตัว C (ไม่รองรับระบบล็อค)', '', 'XC-150 C-HANDLE 150 mm. | มือจับตัว C ยาว 150 มม. XC-300 C-HANDLE 300 mm. | มือจับตัว C ยาว 300 มม. XC-600 C-HANDLE 600 mm. | มือจับตัว C ยาว 600 มม.', 1, 6, '2019-09-19 09:00:08', NULL, NULL),
(87, 'ALUINCH XF-01', 'X-SERIES FOLDING HINGED', 'บานพับบานเฟี้ยม x-series', '', '', 1, 6, '2019-09-19 09:00:08', NULL, NULL),
(88, 'ALUINCH XF-02', 'X-SERIES FOLDING HINGED WITH HANDLE', 'บานพับบานเฟี้ยม x-series แบบมีมือดึง', '', '', 1, 6, '2019-09-19 09:00:08', NULL, NULL),
(89, 'ALUINCH XF-03', 'X-SERIES FLUSHBOLT LOCK', 'กลอนล็อคพื้นบานเฟี้ยม x-series', '', '', 1, 6, '2019-09-19 09:00:08', NULL, NULL),
(90, 'ALUINCH XF-04', 'X-SERIES PIVOT SET', 'ชุดจุดหมุนสำหรับบานเฟี้ยม x-series', '', '', 1, 6, '2019-09-19 09:00:08', NULL, NULL),
(91, 'ALUINCH XF-05', 'PIVOT SET FOR WOOD DOORS', 'ชุดจุดหมุนบานเฟี้ยมสำหรับบานไม้', '', '', 1, 6, '2019-09-19 09:00:08', NULL, NULL),
(92, 'ALUINCH XG', 'GUILDING FOR SLIDING DOOR', 'ไกด์พื้นสำหรับประตูบานเลื่อน', '', '', 1, 6, '2019-09-19 09:00:08', NULL, NULL),
(93, 'ALUINCH XW-03', 'CONNECTOR FOR SLIDING DOOR', 'ตัวเกี่ยวสำหรับประตูบานเลื่อนจูง', '', '', 1, 6, '2019-09-19 09:00:08', NULL, NULL),
(94, 'ALUINCH XP-01', 'HINGED FOR ONE WAY PIVOT DOOR | ', 'บานพับสำหรับประตูเปิดทางเดียว 180 องศา', '', '', 1, 6, '2019-09-19 09:00:08', NULL, NULL),
(95, 'ALUINCH XP-02', 'PIVOT FOR SWING DOOR', 'เดือยจุดหมุนสำหรับประตูบานสวิง', '', '', 1, 6, '2019-09-19 09:00:08', NULL, NULL),
(96, 'ALUINCH PT-02', 'ACCESSORIES PATCH FITTING', 'เดือนตายสำหรับบานสวิงและกระจกบานเปลือย', '', '', 1, 6, '2019-09-19 09:00:08', NULL, NULL),
(97, 'ALUINCH M-01', 'SLIDING DOOR FRAME VERTICAL', 'เฟรมบานเลื่อนแนวตั้ง 9 x 38 มม.', '', '', 1, 7, '2019-09-20 03:11:43', NULL, NULL),
(98, 'ALUINCH M-02', 'SLIDING DOOR FRAME HORIZONTAL', 'เฟรมบานเลื่อนแนวนอน 19 x 38 มม.', '', '', 1, 7, '2019-09-20 03:11:43', NULL, NULL),
(99, 'ALUINCH M-03', 'SLIDING DOOR FRAME MULLION', 'ซอยกลางบานเลื่อน 12 x 37 มม.', '', '', 1, 7, '2019-09-20 03:11:43', NULL, NULL),
(100, 'ALUINCH MT', 'SLIDING TRACK FOR SLIDNG CABINET DOOR', 'รางล่างเกี่ยวบานเลื่อนหน้าตู้', '', '', 1, 7, '2019-09-20 03:11:43', NULL, NULL),
(101, 'ALUINCH M-A', 'CONNECTOR JOINT FOR CABINET SLIDING DOOR FRAME', 'ฉากยึดเฟรมบานเลื่อนตู้ 4 ชุด / บาน', '', '', 1, 7, '2019-09-20 03:11:43', NULL, NULL),
(102, 'ALUINCH MD.L/ MD.R', 'CONNECTOR JOINT FOR CABINET SLIDING DOOR FRAME', 'ไกด์เกี่ยวบานเลื่อนจูง ซ้าย-ขวา', '', '', 1, 7, '2019-09-20 03:11:43', NULL, NULL),
(103, 'ALUINCH MG', 'CABINET DOOR SET FOR SLIDING DOOR', 'ไกด์ล่างเกี่ยวบานเลื่อนหน้าตู้', '', '', 1, 7, '2019-09-20 03:11:43', NULL, NULL),
(104, 'ALUINCH E-01', 'TOP RAIL 3 TRACK', 'รางบน', '', '', 1, 8, '2019-09-20 03:37:10', NULL, NULL),
(105, 'ALUINCH E-01A', 'CLIP TOP RAIL', 'ฝาปิดรางบน', '', '', 1, 8, '2019-09-20 03:37:10', NULL, NULL),
(106, 'ALUINCH E-01F', 'FIX GLASS TOP RAIL', 'ตบร่องรางบน', '', '', 1, 8, '2019-09-20 03:37:10', NULL, NULL),
(107, 'ALUINCH E-02A', 'SLDING RAILS FOR SCREEN', 'รางข้างแบบใส่มุ้ง', '', '', 1, 8, '2019-09-20 03:37:10', NULL, NULL),
(108, 'ALUINCH E-02B', 'SLIDING RAILS CENTER SLIDING', 'รางข้างร่องกลาง', '', '', 1, 8, '2019-09-20 03:37:10', NULL, NULL),
(109, 'ALUINCH E-02C', 'SIDE RAILS FRONT SLIDING', 'รางข้างร่องริม', '', '', 1, 8, '2019-09-20 03:37:10', NULL, NULL),
(110, 'ALUINCH E-03', 'BOTTOM RAILS 3 TRACK', 'รางล่าง', '', '', 1, 8, '2019-09-20 03:37:10', NULL, NULL),
(111, 'ALUINCH E-03A', '', 'ฉากกันตก', '', '', 1, 8, '2019-09-20 03:37:10', NULL, NULL),
(112, 'ALUINCH E-03B', 'BOTTOM SUPPORT', 'ซัพพอร์ทพื้น', '', '', 1, 8, '2019-09-20 03:37:10', NULL, NULL),
(113, 'ALUINCH E-03C', 'STRIP OFF SCREEN TRACK', 'ฝาปิดรางมุ้ง', '', '', 1, 8, '2019-09-20 03:37:10', NULL, NULL),
(114, 'ALUINCH E-03D', 'END OF THE SILLS', 'ฝาตบธรณี', '', '', 1, 8, '2019-09-20 03:37:10', NULL, NULL),
(115, 'ALUINCH E-03E', 'BOTTON FIX GLASS', 'ตบรางล่างกล่องเปิด', '', '', 1, 8, '2019-09-20 03:37:10', NULL, NULL),
(116, 'ALUINCH E-03F', 'BOTTON FIX GLASS', 'ตบรางล่างกล่องปิด', '', '', 1, 8, '2019-09-20 03:37:10', NULL, NULL),
(117, 'ALUINCH E-04A', 'DOOR GRAME STILE 1', 'เสากุญแจ', '', '', 1, 8, '2019-09-20 03:37:10', NULL, NULL),
(118, 'ALUINCH E-04B', 'DOOR FRAME STILE 2', 'เสาเสียบ', '', '', 1, 8, '2019-09-20 03:37:10', NULL, NULL),
(119, 'ALUINCH E-04C', 'CONNER DOOR FRAME', 'เสากุญแจเข้ามุม', '', '', 1, 8, '2019-09-20 03:37:10', NULL, NULL),
(120, 'ALUINCH E-04G', 'DOOR FRAME FOR HIGHT SECURITY', 'เสากุญแจสำหรับเกียร์', '', '', 1, 8, '2019-09-20 03:37:10', NULL, NULL),
(121, 'ALUINCH E-04H', 'DOOR FRAME WITH HANDLE', 'เสากุญแจมีมือจับ', '', '', 1, 8, '2019-09-20 03:37:10', NULL, NULL),
(122, 'ALUINCH E-04HH', 'DOOR FRAME WTH 2 HANDLE', 'เสาเสียบมีมือจับสองทาง', '', '', 1, 8, '2019-09-20 03:37:10', NULL, NULL),
(123, 'ALUINCH E-04BH', 'DOOR FRAME WITH HANDLE', 'เสาเสียบมีมือจับ', '', '', 1, 8, '2019-09-20 03:37:10', NULL, NULL),
(124, 'EALUINCH -04GH', 'DOOR FRAME WITH HANDLE', 'เสากุญแจใส่เกียร์มีมือจับ', '', '', 1, 8, '2019-09-20 03:37:10', NULL, NULL),
(125, 'ALUINCH E-05', 'DRAG & DROP DOOR FRAME', 'เสาเกี่ยว', '', '', 1, 8, '2019-09-20 03:37:10', NULL, NULL),
(126, 'ALUINCH E-05H', 'DOOR FRAME WITH HANDLE', 'เสาเกี่ยวมีมือจับ', '', '', 1, 8, '2019-09-20 03:37:10', NULL, NULL),
(127, 'ALUINCH E-06', 'DOUBLE DRAG DOOR FRAME', 'เสาเกี่ยว 2 ทาง', '', '', 1, 8, '2019-09-20 03:37:10', NULL, NULL),
(128, 'ALUINCH E-07', 'TOP & BOTTOM DOOR FRAME 1', 'ขวางประตูเล็ก', '', '', 1, 8, '2019-09-20 03:37:10', NULL, NULL),
(129, 'ALUINCH E-07A', 'TOP & BOTTOM DOOR FRAME 2', 'ขวางประตูใหญ่', '', '', 1, 8, '2019-09-20 03:37:10', NULL, NULL),
(130, 'ALUINCH E-08', 'SCREEN TRIM', 'คิ้วมุ้ง', '', '', 1, 8, '2019-09-20 03:37:10', NULL, NULL),
(131, 'ALUINCH E-09', 'TRIM FRAME', 'คิ้วซอยหลอก', '', '', 1, 8, '2019-09-20 03:37:10', NULL, NULL),
(132, 'ALUINCH C-01', 'CASEMENT FIXED FRAME', 'บังใบบานกระทุ้ง 40 x 31.3 มม.', '', '', 1, 9, '2019-09-20 04:08:13', NULL, NULL),
(133, 'ALUINCH C-02', 'CASEMENT WINDOW FRAME', 'กรอบบานกระทุ้ง 40 x 49.9 มม.', '', '', 1, 9, '2019-09-20 04:08:13', NULL, NULL),
(134, 'ALUINCH C-03', 'CASEMENT WINDOW BEAD', 'คิ้วบานกระทุ้ง 13.2 x 23.5 มม.', '', '', 1, 9, '2019-09-20 04:08:13', NULL, NULL),
(135, 'ALUINCH C-04', 'CASEMENT TRANSOM FRAME', 'เสากลางบานคู่ 36.5 x 52.6 มม.', '', '', 1, 9, '2019-09-20 04:08:13', NULL, NULL),
(136, 'ALUINCH B-01', 'FOLDING TOP TRACK', 'รางบน บานเฟี้ยม 50 x 62 มม.', '', '', 1, 10, '2019-09-20 04:23:44', NULL, NULL),
(137, 'ALUINCH B-02', 'FOLDING BOTTOM TRACK', 'รางล่าง บานเฟี้ยม 40 x 60 มม.', '', '', 1, 10, '2019-09-20 04:23:44', NULL, NULL),
(138, 'ALUINCH B-03', 'FOLDING SIDE TRACK', 'รางข้างบานเฟี้ยม 40 x 62 มม.', '', '', 1, 10, '2019-09-20 04:23:44', NULL, NULL),
(139, 'ALUINCH B-04', 'FOLDING FRAME', 'กรอบบานเหี้ยม 64 x 50 มม.', '', '', 1, 10, '2019-09-20 04:23:44', NULL, NULL),
(140, 'ALUINCH B-05', 'FOLDING BEAD', 'คิ้วกระจกบานเฟี้ยม 13 x 32 มม.', '', '', 1, 10, '2019-09-20 04:23:44', NULL, NULL),
(141, 'ALUINCH B-06', 'FOLDING DOOR STOPPER', 'บังใบเปิดช่องประตู 12.3 x 30.4 มม.', '', '', 1, 10, '2019-09-20 04:23:44', NULL, NULL),
(142, 'ALUINCH B-07', 'FOLDING MIDDLE FRAME', 'เสากลางบานเฟี้ยม 59 x 50 มม.', '', '', 1, 10, '2019-09-20 04:23:44', NULL, NULL),
(143, 'ALUINCH i.01', 'CABINET DOOR FRAME VERTICAL', 'เฟรมบานเปิดตู้แนวตั้ง 10 x 38 มม.', '', '', 1, 11, '2019-09-20 04:32:47', NULL, NULL),
(144, 'ALUINCH i.02', 'CABINET DOOR FRAME HORIZONTAL', 'เฟรมบานเปิดตู้แนวนอน 13 x 46 มม.', '', '', 1, 11, '2019-09-20 04:32:47', NULL, NULL),
(145, 'ALUINCH i.03', 'CABINET DOOR SLIDING', 'เฟรมเสาสลับบานเลื่อนตู้ 13 x 22 มม.', '', '', 1, 11, '2019-09-20 04:32:47', NULL, NULL),
(146, 'ALUINCH i.04', 'CABINET DOOR SLIDING', 'เฟรมเสาสลับบานเลื่อนตู้ 13 x 22 มม.', '', '', 1, 11, '2019-09-20 04:32:47', NULL, NULL),
(147, 'ALUINCH i-25', 'CABINET FRAME HORIZONTAL', 'เฟรมใหญ่ บานตู้แนวนอน ยาว 6 มม.', '', '', 1, 11, '2019-09-20 04:32:47', NULL, NULL),
(148, 'ALUINCH i-26', 'CABINET SLIM FRAME', 'เฟรมเล็ก บานตู้ ยาว 6 ม.', '', '', 1, 11, '2019-09-20 04:32:47', NULL, NULL),
(149, 'ALUINCH i-27', 'CABINET MULLION FRAME', 'ซอยกลางบานตู้ ยาว 6 มม.', '', '', 1, 11, '2019-09-20 04:32:47', NULL, NULL),
(150, 'ALUINCH i-28', 'CABINET FRAME HANDLE', 'เฟรมใหญ่ บานตู้มีมือจับ ยาว 6 มม.', '', '', 1, 11, '2019-09-20 04:32:47', NULL, NULL),
(151, 'ALUINCH i-29', 'CABINET FRAME HANDLE', 'เฟรมใหญ่ บานตู้มีมือจับ ยาว 6 มม.', '', '', 1, 11, '2019-09-20 04:32:47', NULL, NULL),
(152, 'ALUINCH i-53', 'CABINET SLIM FRAME', 'เฟรมเล็ก บานตู้ ยาว 6 ม.', '', '', 1, 11, '2019-09-20 04:32:47', NULL, NULL),
(153, 'ALUINCH i-54', 'CABINET FRAME HANDLE', 'มือจับเฟรมบานเลื่อนตู้ ยาว 6 มม.', '', '', 1, 11, '2019-09-20 04:32:47', NULL, NULL),
(154, 'ALUINCH i-55', 'CABINET FRAME HORIZONTAL', 'เฟรมบานเลื่อนตู้แนวนอน ยาว 6 ม.', '', '', 1, 11, '2019-09-20 04:32:47', NULL, NULL),
(155, 'ALUINCH i-56', 'CABINET MULLION FRAME', 'ซอยกลางบานตู้ ยาว 6 ม.', '', '', 1, 11, '2019-09-20 04:32:47', NULL, NULL),
(156, 'ALUINCH i-57', 'CABINET FRAME VERTICAL', 'เฟรมบานเลื่อนตู้แนวตั้ง ยาว 3 ม.', '', '', 1, 11, '2019-09-20 04:32:47', NULL, NULL),
(157, 'ALUINCH i.SDW', 'DOUBLE SLIDING TRACK', 'รางอลูมิเนียม ร่องคู่ ยาว 6 ม.', '', '', 1, 11, '2019-09-20 04:32:47', NULL, NULL),
(158, 'ALUINCH i.SDL', 'BOTTOM SLIDING TRACK', 'รางอลูมิเนียม ร่องเดี่ยว ยาว 6 ม.', '', '', 1, 11, '2019-09-20 04:32:47', NULL, NULL),
(159, 'ALUINCH iF-20', 'ALUMINIUM HANDLE U-SHAPE', 'มือจับอลูมิเนียม ตัวยู ยาว 2.5 ม.', '', '', 1, 11, '2019-09-20 04:32:47', NULL, NULL),
(160, 'ALUINCH iF-21', 'ALUMINIUM HANDLE TRAPEZIUM-SHAPE', 'มือจับอลูมิเนียม สี่เหลี่ยมคางหมู ยาว 3.0 ม.', '', '', 1, 11, '2019-09-20 04:32:47', NULL, NULL),
(161, 'ALUINCH iF-22', 'ALUMINIUM HANDLE BIAS-SHAPE', 'มือจับอลูมิเนียม ทรงยาว 3.0 ม.', '', '', 1, 11, '2019-09-20 04:32:47', NULL, NULL),
(162, 'ALUINCH iF-23', 'ALUMINIUM HANDLE C-SHAPE', 'มือจับอลูมิเนียม ตัวซี ยาว 2.5 ม.', '', '', 1, 11, '2019-09-20 04:32:47', NULL, NULL),
(163, 'ALUINCH iF-24', 'ALUMINIUM HANDLE INCLINED U-SHAPE', 'มือจับอลูมิเนียม ตัวยู ยาว 3.0 ม.', '', '', 1, 11, '2019-09-20 04:32:47', NULL, NULL),
(164, 'ALUINCH iF-25', 'ALUMINIUM HANDLE L-SHAPE', 'มือจับอลูมิเนียม ตัวแอล ยาว 3.0 ม.', '', '', 1, 11, '2019-09-20 04:32:47', NULL, NULL),
(165, 'ALUINCH iH-01', 'HANDLE FOR CABINET DOOR', 'มือจับบานเปิดตู้ ยาว 174 mm.', '', '', 1, 11, '2019-09-20 04:32:47', NULL, NULL),
(166, 'ALUINCH i.A', 'CONNECTOR JOINT FOR CABINET FRAME', 'ฉากประกอบบานตู้', '', '', 1, 11, '2019-09-20 04:32:47', NULL, NULL),
(167, 'ALUINCH iH-02', 'HANDLE FOR CABINET DOOR', 'มือจับบานเปิดตู้ ยาว 160 mm.', '', '', 1, 11, '2019-09-20 04:32:47', NULL, NULL),
(168, 'ALUINCH iP.2', 'CABINET PIVOT HING', 'บานพับสำหรับบานเปิดในตู้', '', '', 1, 11, '2019-09-20 04:32:47', NULL, NULL),
(169, 'ALUINCH iP.1', 'CABINET PIVOT HING', 'บานพับสำหรับบานเปิดหน้าตู้', '', '', 1, 11, '2019-09-20 04:32:47', NULL, NULL),
(170, 'ALUINCH i.R', 'ROLLER SET FOR CABINET DOOR FRAME', 'ชุดลูกล้อบานเลื่อนตู้', '', '', 1, 11, '2019-09-20 04:32:47', NULL, NULL),
(171, 'ALUINCH i.M-01', 'DOOR MAGNET PIVOT DOOR', 'แม่เหล็กดูดบานตู้แบบใหญ่', '', '', 1, 11, '2019-09-20 04:32:47', NULL, NULL),
(172, 'ALUINCH i.M-02', 'DOOR MAGNET PIVOT DOOR', 'แม่เหล็กดูดบานตู้แบบเล็ก', '', '', 1, 11, '2019-09-20 04:32:47', NULL, NULL),
(173, 'ALUINCH i.M-03', 'DOOR MAGNET PIVOT DOOR', 'แม่เหล็กดูดบานตู้แบบฝัง', '', '', 1, 11, '2019-09-20 04:32:47', NULL, NULL),
(174, 'T-WALL 10 MM.', 'T-ALUMINIUM 10 mm.', 'ทีอลูมิเนียม 10 มม.', '', 'SIZE : 10 x 10 x 1 มม. ยาว 6 เมตร', 1, 12, '2019-09-20 06:14:20', NULL, NULL),
(175, 'T-WALL 2O MM.', 'T-ALUMINIUM 20 mm.', 'ทีอลูมิเนียม 20 มม.', '', 'SIZE : 20 x 10 x 1 มม. ยาว 6 เมตร', 1, 12, '2019-09-20 06:14:20', NULL, NULL),
(176, 'T-WALL 22 MM.', 'T-ALUMINIUM 22 mm.', 'ทีอลูมิเนียม 22 มม.', '', 'SIZE : 22 x 10 x 1 มม. ยาว 6 เมตร', 1, 12, '2019-09-20 06:14:20', NULL, NULL),
(177, 'UG-20 MM.GLAZING', 'U-CHANAL 20 MM.', 'ยูอลูมิเนียม', '', 'SIZE : 20 x 24 x 2 มม. ยาว 2.8 เมตร ยาว 6.4 เมตร', 1, 12, '2019-09-20 06:14:20', NULL, NULL),
(178, 'S.01SPIT', 'BATTLE FOR PANEL', 'ฉากแขวนรูปติดผนัง', '', 'SIZE : 30 x 5 x 2.5 มม. ยาว 6.4 เมตร', 1, 12, '2019-09-20 06:14:20', NULL, NULL),
(179, 'UA-5 MM.', 'U-CHANAL 5 MM.', 'ยูอลูมิเนียม', '', 'SIZE : 5 x 5 x 1 มม. ยาว 6 เมตร', 1, 12, '2019-09-20 06:14:20', NULL, NULL),
(180, 'UA 6x10 mm.', 'U-CHANAL 6x10 MM.', 'ยูอลูมิเนียม 6 x 10 มม.', '', 'SIZE : 6 x 10 x 1 มม. ยาว 6 เมตร', 1, 12, '2019-09-20 06:14:20', NULL, NULL),
(181, 'UA-10 MM.', 'U-CHANAL 10 MM.', 'ยูอลูมิเนียม', '', 'SIZE : 10 x 10 x 1.2 มม. ยาว 6 เมตร', 1, 12, '2019-09-20 06:14:20', NULL, NULL),
(182, 'UE-5 MM.', 'U-CHANAL WITH EDGE 5 MM.', 'ยูอลูมิเนียมมีปีก (แบบโค้ง)', '', 'SIZE : 5 x 5 x 1 มม. ยาว 6.4 เมตร', 1, 12, '2019-09-20 06:14:20', NULL, NULL),
(183, 'UE-10 MM.', 'U-CHANAL WITH EDGE 10 MM.', 'ยูอลูมิเนียมมีปีก (แบบโค้ง)', '', 'SIZE : 10 x 10 x 1 มม. ยาว 6.4 เมตร', 1, 12, '2019-09-20 06:14:20', NULL, NULL),
(184, 'UEA-5 MM.', 'U-CHANAL WITH EDGE 5 MM.', 'ยูอลูมิเนียมมีปีก (แบบเหลี่ยม)', '', 'SIZE : 5 x 5 x 1 มม. ยาว 6 เมตร', 1, 12, '2019-09-20 06:14:20', NULL, NULL),
(185, 'UEA-10 MM.', 'U-CHANAL WITH EDGE 10 MM.', 'ยูอลูมิเนียมมีปีก (แบบเหลี่ยม)', '', 'SIZE : 10 x 10 x 1 มม. ยาว 6.4 เมตร', 1, 12, '2019-09-20 06:14:20', NULL, NULL),
(186, 'U-AS', 'ALUMINIUM DOOR SEAL', 'อลูมิเนียมใส่สักหลาด', '', 'SIZE : 10 x 4 x 1.55 มม. ยาว 3 เมตร', 1, 12, '2019-09-20 06:14:20', NULL, NULL),
(187, 'L-WALL 6 MM.', 'L-CHANAL 6 MM.', 'แอลอลูมิเนียม', '', 'SIZE : 6 x 6 x 1 มม. ยาว 6.4 เมตร', 1, 12, '2019-09-20 06:14:20', NULL, NULL),
(188, 'L-WALL 10 MM.', 'L-CHANAL 10 MM.', 'แอลอลูมิเนียม', '', 'SIZE : 10 x 10 x 1 มม. ยาว 6 เมตร', 1, 12, '2019-09-20 06:14:20', NULL, NULL),
(189, 'L-01', 'LOUVER-01', 'ฐานรับเกร็ด รุ่น 01 ขนาด 25 x 8.13 มม.', '', '', 1, 13, '2019-09-20 06:29:01', NULL, NULL),
(190, 'L-02', 'LOUVER-02', 'เกร็ดช่องลม รุ่น 01 ขนาด 24.8 x 24 มม.', '', '', 1, 13, '2019-09-20 06:29:01', NULL, NULL),
(191, 'L-03', 'LOUVER-03', 'เกร็ดช่องลม รุ่น 03 ขนาด 24.8 x 24 มม.', '', '', 1, 13, '2019-09-20 06:29:01', NULL, NULL),
(192, 'L-V', 'LOUVER-V', 'เกร็ดช่องลม ขนาด 33 x 23 มม.', '', '', 1, 13, '2019-09-20 06:29:01', NULL, NULL),
(193, 'L-U', 'LOUVER-U', 'ขอบเกร็ดช่องลม ขนาด 35 x 7 มม.', '', '', 1, 13, '2019-09-20 06:29:01', NULL, NULL),
(194, 'L-3300', 'LOUVER-3300', 'ขอบเกร็ดช่องลม รุ่น 3300 ขนาด 49 x 20 มม.', '', '', 1, 13, '2019-09-20 06:29:01', NULL, NULL),
(195, 'L-4450', 'LOUVER-4450', 'เกร็ดช่องลม รุ่น 4450 ขนาด 32 x 25 มม.', '', '', 1, 13, '2019-09-20 06:29:01', NULL, NULL),
(196, 'L-4451', 'LOUVER-4451', 'ขอบเกร็ดช่องลม รุ่น 4451 ขนาด 32 x 6 มม.', '', '', 1, 13, '2019-09-20 06:29:01', NULL, NULL),
(197, 'L-4535', 'LOUVER-4535', 'เกร็ดช่องลม รุ่น 4535 ขนาด 44.5 x 32 มม.', '', '', 1, 13, '2019-09-20 06:29:01', NULL, NULL),
(198, 'L-3705', 'LOUVER-3705', 'เกร็ดช่องลม รุ่น 3705 ขนาด 75 x 12 มม.', '', '', 1, 13, '2019-09-20 06:29:01', NULL, NULL),
(199, 'L-4368', 'LOUVER-4638', 'เกร็ดช่องลม รุ่น 4638 ขนาด 47 x 10 มม.', '', '', 1, 13, '2019-09-20 06:29:01', NULL, NULL),
(200, 'L-4540', 'LOUVER-4540', 'ขอบเกร็ดช่องลม รุ่น 4540 ขนาด 47 x 40 มม.', '', '', 1, 13, '2019-09-20 06:29:01', NULL, NULL),
(201, 'L-3783', 'LOUVER-3783', 'ขอบเกร็ดช่องลม รุ่น 3783 ขนาด 49 x 10 มม.', '', '', 1, 13, '2019-09-20 06:29:01', NULL, NULL),
(202, 'L-4259', 'LOUVER-4259', 'ขอบเกร็ดช่องลม รุ่น 4259 ขนาด 101.6 x 25 มม.', '', '', 1, 13, '2019-09-20 06:29:01', NULL, NULL),
(203, 'L-4489', 'LOUVER-4489', 'เกร็ดช่องลม รุ่น 4489 ขนาด 101.6 x 32 มม.', '', '', 1, 13, '2019-09-20 06:29:01', NULL, NULL),
(204, 'ALUINCH RG 6 MM.', 'GLASS RUBBER FOR 6 mm. THK.', 'ยางอัดสำหรับกระจก 6 มม.', '', 'RGW 6 MM. GLASS RUBBER 6 mm. WHITE | ยางอัดสำหรับกระจก 6 มม. สีขาว RGG 6 MM. GLASS RUBBER 6 mm. GRAY | ยางอัดสำหรับกระจก 6 มม. สีเทา RGB 6 MM. GLASS RUBBER 6 mm. BLACK | ยางอัดสำหรับกระจก 6 มม. สีดำ 50 m. / ม้วน', 1, 14, '2019-09-20 06:51:57', NULL, NULL),
(205, 'ALUINCH RG 8 MM.', 'GLASS RUBBER FOR 8 mm. THK.', 'ยางอัดสำหรับกระจก 8 มม.', '', 'RGW 8 MM. GLASS RUBBER 8 mm. WHITE | ยางอัดสำหรับกระจก 8 มม. สีขาว RGG 8 MM. GLASS RUBBER 8 mm. GRAY | ยางอัดสำหรับกระจก 8 มม. สีเทา RGB 8 MM. GLASS RUBBER 8 mm. BLACK | ยางอัดสำหรับกระจก 8 มม. สีดำ 50 m. / ม้วน', 1, 14, '2019-09-20 06:51:57', NULL, NULL),
(206, 'ALUINCH RG 10 MM.', 'GLASS RUBBER FOR 10 mm. THK.', 'ยางอัดสำหรับกระจก 10 มม.', '', 'RGW 10 MM. GLASS RUBBER 10 mm. WHITE | ยางอัดสำหรับกระจก 10 มม. สีขาว RGG 10 MM. GLASS RUBBER 10 mm. GRAY | ยางอัดสำหรับกระจก 10 มม. สีเทา RGB 10 MM. GLASS RUBBER 10 mm. BLACK | ยางอัดสำหรับกระจก 10 มม. สีดำ 100 m. / ม้วน', 1, 14, '2019-09-20 06:51:57', NULL, NULL),
(207, 'ALUINCH RG 12 MM.', 'GlASS RUBBER FOR 12 mm. THK.', 'ยางอัดสำหรับกระจก 12 มม.', '', 'RGW 12 MM. GLASS RUBBER 12 mm. WHITE | ยางอัดสำหรับกระจก 12 มม. สีขาว RGG 12 MM. GLASS RUBBER 12 mm. GRAY | ยางอัดสำหรับกระจก 12 มม. สีเทา RGB 12 MM. GLASS RUBBER 12 mm. BLACK | ยางอัดสำหรับกระจก 12 มม. สีดำ 100 m. / ม้วน', 1, 14, '2019-09-20 06:51:57', NULL, NULL),
(208, 'ALUINCH RC', 'GLASS RUBBER FOR CASEMENT', 'ยางอัดสำหรับบานกระทุ้ง', '', 'RCW GLASS RUBBER CASEMENT, WHITE | ยางอัดบานกระทุ้ง สีขาว RCG GLASS RUBBER CASEMENT, GRAY | ยางอัดบานกระทุ้ง สีเทา RCB GLASS RUBBER CASEMENT, BLACK | ยางอัดบานกระทุ้ง สีดำ 50 m. / ม้วน', 1, 14, '2019-09-20 06:51:57', NULL, NULL),
(209, 'ALUINCH RB', 'GLASS RUBBER FOR FOLDING', 'ยางอัดสำหรับบานเฟี้ยม', '', '50 m. / ม้วน', 1, 14, '2019-09-20 06:51:57', NULL, NULL),
(210, 'ALUINCH RD', 'RUBBER EDGE FOR DOOR', 'ยางสันบานประตู', '', 'RDW RUBBER EDGE DOOR, WHITE | ยางสันบานประตู สีขาว RDG RUBBER EDGE DOOR, GRAY | ยางสันบานประตู สีเทา RDB RUBBER EDGE DOOR, BLACK | ยางสันบานประตู สีดำ 100 m. / ม้วน', 1, 14, '2019-09-20 06:51:57', NULL, NULL),
(211, 'ALUINCH RX', 'GLASS GASKET FOR x S e r i e s', 'พีวีซีร่องกระบาน x S e r i e s', '', 'AG 6 MM. PVC GUTTER 6 mm. | พีวีซีร่องกระจก 6 mm. AG 8 MM. PVC GUTTER 8 mm. | พีวีซีร่องกระจก 8 mm. 2 m. / เส้น', 1, 14, '2019-09-20 06:51:57', NULL, NULL),
(212, 'ALUINCH LV-01', 'LEVER HANDLE', 'มือจับก้านโยก แบบที่ 1', '', 'HANDLE FOR WOOD DOOR 35 - 60 mm. สำหรับบานประตูไม้ หนา 35 - 60 มม.', 2, 15, '2019-09-20 06:59:39', NULL, NULL),
(213, 'ALUINCH LV-02', 'LEVER HANDLE', 'มือจับก้านโยก แบบที่ 2', '', 'FOR WOOD DOOR 35 - 60 mm. สำหรับบานประตูไม้ หนา 35 - 60 มม.', 2, 15, '2019-09-20 06:59:39', NULL, NULL),
(214, 'ALUINCH LV-03', 'LEVER HANDLE', 'มือจับก้านโยก แบบที่ 3', '', 'FOR WOOD DOOR 35 - 60 mm. สำหรับบานประตูไม้ หนา 35 - 60 มม.', 2, 15, '2019-09-20 06:59:39', NULL, NULL),
(215, 'ALUINCH LV-04', 'LEVER HANDLE', 'มือจับก้านโยก แบบที่ 4', '', 'FOR WOOD DOOR 35 - 60 mm. สำหรับบานประตูไม้ หนา 35 - 60 มม.', 2, 15, '2019-09-20 06:59:39', NULL, NULL),
(216, 'ALUINCH LV-05', 'LEVER HANDLE', 'มือจับก้านโยก แบบที่ 5', '', 'FOR WOOD DOOR 35 - 60 mm. สำหรับบานประตูไม้ หนา 35 - 60 มม.', 2, 15, '2019-09-20 06:59:39', NULL, NULL),
(217, 'ALUINCH LV-06', 'LEVER HANDLE', 'มือจับก้านโยก แบบที่ 6', '', 'FOR WOOD DOOR 35 - 60 mm. สำหรับบานประตูไม้ หนา 35 - 60 มม.', 2, 15, '2019-09-20 06:59:39', NULL, NULL),
(218, 'ALUINCH LV-07', 'LEVER HANDLE', 'มือจับก้านโยก แบบที่ 7', '', 'FOR WOOD DOOR 35 - 60 mm. สำหรับบานประตูไม้ หนา 35 - 60 มม.', 2, 15, '2019-09-20 06:59:39', NULL, NULL),
(219, 'ALUINCH LV-08', 'LEVER HANDLE', 'มือจับก้านโยก แบบที่ 8', '', 'FOR WOOD DOOR 35 - 60 mm. สำหรับบานประตูไม้ หนา 35 - 60 มม.', 2, 15, '2019-09-20 06:59:39', NULL, NULL),
(220, 'ALUINCH LV-09', 'LEVER HANDLE', 'มือจับก้านโยก แบบที่ 9', '', 'FOR WOOD DOOR 35 - 60 mm. สำหรับบานประตูไม้ หนา 35 - 60 มม.', 2, 15, '2019-09-20 06:59:39', NULL, NULL),
(221, 'ALUINCH CP-01', 'CIRCLE PLATE CYLINDER', 'ฝาครอบกุญแจ ชนิดวงกลม', '', '', 2, 15, '2019-09-20 06:59:39', NULL, NULL),
(222, 'ALUINCH EP-01', 'ELLIPSE PLATE CYLINDER', 'ฝาครอบกุญแจ ชนิดวงรี', '', '', 2, 15, '2019-09-20 06:59:39', NULL, NULL),
(223, 'OF-H01', 'ROUND DESIGN : HANDLE LOCK 1,500 MM.', 'มือจับยาวทรงกลม พร้อมล็อคในตัว ขนาด 1,500 มม.', '', 'PULL HANDLE WITH LOCK มือจับก้านยาว แบบมีกุญแจล็อค OF H 01 : 1,500 MM., CTC 1,125 MM.', 2, 16, '2019-09-20 07:31:48', NULL, NULL),
(224, 'PH-01', 'SQUARE DESIGN 20 X 40 mm.', '', '', 'MATERIAL : STAINLESS STELL FINISH : MATT BRUSHED', 2, 18, '2019-09-20 07:32:29', NULL, NULL),
(225, 'PH-02', 'SQUARE DESIGN 40 X 20 mm.', '', '', 'MATERIAL : STAINLESS STELL FINISH : MATT BRUSHED', 2, 18, '2019-09-20 07:32:29', NULL, NULL),
(226, 'PH-03', 'SQUARE DESIGN 25 X 25 mm.', '', '', 'MATERIAL : STAINLESS STELL FINISH : MATT BRUSHED', 2, 18, '2019-09-20 07:32:29', NULL, NULL),
(227, 'PH-04', 'SQUARE DESIGN 25 X 25 mm.', '', '', 'MATERIAL : STAINLESS STELL FINISH : MATT BRUSHED', 2, 18, '2019-09-20 07:32:29', NULL, NULL),
(228, 'PH-05', 'SQUARE DESIGN 40 X 20 mm.', '', '', 'MATERIAL : STAINLESS STELL FINISH : MATT BRUSHED', 2, 18, '2019-09-20 07:32:29', NULL, NULL),
(229, 'PH-06', 'ROUND DESIGN Ø 32 mm.', '', '', 'MATERIAL : STAINLESS STELL FINISH : MATT BRUSHED', 2, 18, '2019-09-20 07:32:29', NULL, NULL),
(230, 'FV-01', 'ROUND DESIGN : 42 X 120 MM.', 'มือจับฝังขนาด 42 x 120 มม.', '', '', 2, 19, '2019-09-20 07:40:56', NULL, NULL),
(231, 'FV-02', 'SQUARE DESIGN', 'มือจับฝังสแตนเลส', '', 'FV-02/96 SQUARE DESIGN : 38 X 108 MM. | มือจับฝัง ขนาด 38 X 108 มม. FV-02/128 SQUARE DESIGN : 38 X 140 MM. | มือจับฝัง ขนาด 38 X 140 มม.', 2, 19, '2019-09-20 07:40:56', NULL, NULL),
(232, 'H-35', 'STAINLESS DOOR HINGED', 'บานพับประตูสแตนเลส 2\" x 4\"', '', '', 2, 19, '2019-09-20 07:40:56', NULL, NULL),
(233, 'ST-01', 'DOOR STOP : ROUND DESIGN', 'กันชนประตู ขนาด 40 x 44 มม.', '', '', 2, 19, '2019-09-20 07:40:56', NULL, NULL),
(234, 'ST-02', 'DOOR STOP : ROUND DESIGN', 'กันชนประตู ขนาด 30 x 35 มม.', '', '', 2, 19, '2019-09-20 07:40:56', NULL, NULL),
(235, 'ST-07', 'DOOR STOP : ROUND DESIGN', 'เบ้ารับประตู (ลูกปืนล็อค)', '', '', 2, 19, '2019-09-20 07:40:56', NULL, NULL),
(236, 'DP-002', 'DUST PROOF STRIKER', 'เบ้ารับกลอน กันฝุ่น ขนาด 19 x 39 มม.', '', '', 2, 19, '2019-09-20 07:40:56', NULL, NULL),
(237, 'FA-1050', 'FLUSH BOLT FOR ALUMINIUM DOOR', 'กลอนฝังสำหรับประตูอลูมิเนียม', '', '', 2, 19, '2019-09-20 07:40:56', NULL, NULL),
(238, 'FA-1030', 'FLUSH BOLT FOR ALUMINIUM DOOR', 'กลอนฝังสำหรับประตูอลูมิเนียม', '', 'FA-1030 / 8 8\" FLUSH BOLT FOR WOOD DOOR | กลอนฝังสำหรับบานไม้ ขนาด 8 นิ้ว FA-1030 / 12 12\" FLUSH BOLT FOR WOOD DOOR | กลอนฝังสำหรับบานไม้ ขนาด 12 นิ้ว', 2, 19, '2019-09-20 07:40:56', NULL, NULL),
(239, 'MA 01', 'MORTISE SASH LOCK', 'ตลับกุญแจสำหรับประตูบานเปิดทางเดียว', '', 'SPINDLE 8 MM. (3) รูแกนเหล็ก ขนาด ▢ 8 มม. FACE PLATE 23 X 245 MM. หน้าเพลทกว้าง 23 x 245 มม. STAINLESS STEEL (1) สแตนเลส ZINCALLOY LATCH ลิ้นกุญแจ ซิงค์อัลลอย BRASS BOLT สลักประตูทองเหลือง NICKEL PLATED, NON-HENDED เพลทสีนิทเกิ้ล BLACKSET 30 MM. ระยะกุญแจ 30 มม. โปรดเช็คระยะการเจาะอุปกรณ์จากชิ้นงานจริงจากทางบริษัทก่อนทุกครั้ง', 2, 20, '2019-09-20 07:46:20', NULL, NULL),
(240, 'MA 02', 'MORTISE DEAD LOCK', 'ตลับกุญแจสำหรับประตูบานเปิดสองทาง', '', 'FACE PLATE 22 X 158 MM. หน้าเพลทกว้าง 22 X 158 มม. STAINLESS STEEL (1) สแตนเลส ZINCALLOY LATCH ลิ้นกุญแจ ซิงค์อัลลอย BRASS BOLT สลักประตูทองเหลือง NICKEL PLATED, NON-HENDED เพลทสีนิทเกิ้ล BLACKSET 30 MM. ระยะกุญแจ 30 มม. โปรดเช็คระยะการเจาะอุปกรณ์จากชิ้นงานจริงจากทางบริษัทก่อนทุกครั้ง', 2, 20, '2019-09-20 07:46:20', NULL, NULL),
(241, 'MA 03', 'MORTISE LOCK FOR SLIDING DOOR', 'ตลับกุญแจสำหรับประตูบานเลื่อน', '', 'FACE PLATE 22 X 168 MM. หน้าเพลทกว้าง 22 x 168 มม. STAINLESS STEEL (1) สแตนเลส ZINCALLOY LATCH ลิ้นกุญแจ ซิงค์อัลลอย BRASS BOLT สลักประตูทองเหลือง NICKEL PLATED, NON-HENDED เพลทสีนิทเกิ้ล BLACKSET 30 MM. ระยะกุญแจ 30 มม. โปรดเช็คระยะการเจาะอุปกรณ์จากชิ้นงานจริงจากทางบริษัทก่อนทุกครั้ง', 2, 20, '2019-09-20 07:46:20', NULL, NULL),
(242, 'MW 01', 'MORTISE SASH LOCK', 'ตลับกุญแจสำหรับประตูบานเปิดทางเดียว', '', 'PC HOLE สำหรับใช้ร่วมกับไส้กุญแจระบบ PC SPINDLE 8 MM. (3) รูแกนเหล็ก ขนาด ▢ 8 มม. BACKSET 55 MM. (B) ระยะกุญแจ 55 มม. DISTANCE 72 MM. (D) ระยะของมือจับ 72 มม. SQUARE FACE PLATE 20 X 235 MM. หน้าเพลทกว้าง 20 x 235 มม. STAINLESS STEEL สแตนเลส (304) LATCH AND DEAD BOLT ลิ้นกุญแจ และลิ้นตาย โปรดเช็คระยะการเจาะอุปกรณ์จากชิ้นงานจริงจากทางบริษัทก่อนทุกครั้ง', 2, 20, '2019-09-20 07:46:20', NULL, NULL),
(243, 'MW 02', 'MORTISE DEAD LOCK', 'ตลับกุญแจสำหรับประตูบานเปิดสองทาง', '', 'PC HOLE สำหรับใช้ร่วมกับไส้กุญแจระบบ PC BACKSET 55 MM. (B) ระยะกุญแจ 55 มม. SQUARE FACE PLATE 20 X 235 MM. หน้าเพลทกว้าง 24 x 138 มม. STAINLESS STEEL สแตนเลส (304) LATCH AND DEAD BOLT ลิ้นกุญแจ และลิ้นตาย โปรดเช็คระยะการเจาะอุปกรณ์จากชิ้นงานจริงจากทางบริษัทก่อนทุกครั้ง', 2, 20, '2019-09-20 07:46:20', NULL, NULL),
(244, 'MW 03', 'MORTISE LOCK FOR SLIDING DOOR', 'ตลับกุญแจสำหรับประตูบานเลื่อนเลื่อน', '', 'PC HOLE สำหรับใช้ร่วมกับไส้กุญแจระบบ PC BACKSET 55 MM. (B) ระยะกุญแจ 50 มม. SQUARE FACE PLATE 20 X 235 MM. หน้าเพลทกว้าง 22 x 168 มม. STAINLESS STEEL สแตนเลส (304) LATCH AND DEAD BOLT ลิ้นกุญแจ และลิ้นตาย โปรดเช็คระยะการเจาะอุปกรณ์จากชิ้นงานจริงจากทางบริษัทก่อนทุกครั้ง', 2, 20, '2019-09-20 07:46:20', NULL, NULL),
(245, 'KV 35', 'KNOB CYLINDER FOR DOOR THK. 35 MM.', 'ไส้กุญแจสำหรับบานประตูหนา 35 มม.', '', 'KNOB CYLINDER : ROUND KNOB, 5 PINS, 30/30 MM. ไส้กุญแจ สำหรับประตูหนา 35 - 40 มม.', 2, 21, '2019-09-20 07:50:17', NULL, NULL),
(246, 'KV 45', 'KNOB CYLINDER FOR DOOR THK. 45 MM.', 'ไส้กุญแจสำหรับบานประตูหนา 45 มม.', '', 'KNOB CYLINDER : ROUND KNOB, 5 PINS, 35/35 MM. ไส้กุญแจ สำหรับประตูหนา 45 - 50 มม.', 2, 21, '2019-09-20 07:50:17', NULL, NULL),
(247, 'KV 35 D', 'KNOB CYLINDER FOR DOOR THK. 35 MM.', 'ไส้กุญแจสำหรับบานประตูหนา 35 มม.', '', 'DOUBLE CYLINDER : 5 PINS, 30/30 MM. ไส้กุญแจ 2 ทาง สำหรับประตูหนา 35 - 40 มม.', 2, 21, '2019-09-20 07:50:17', NULL, NULL),
(248, 'KV 45 D', 'KNOB CYLINDER FOR DOOR THK. 45 MM.', 'ไส้กุญแจสำหรับบานประตูหนา 45 มม.', '', 'DOUBLE CYLINDER : 5 PINS, 35/35 MM. ไส้กุญแจ 2 ทาง สำหรับประตูหนา 45 - 50 มม.', 2, 21, '2019-09-20 07:50:17', NULL, NULL),
(249, 'KV 35 E', 'KNOB CYLINDER FOR DOOR THK. 35 MM.', 'ไส้กุญแจสำหรับบานประตูหนา 35 มม.', '', 'PRIVACY CYLINDER : ROUND KNOB, 30/30 MM. ไส้กุญแจ พร้อมปุ่มฉุกเฉิน สำหรับประตูหนา 35 - 40 มม.', 2, 21, '2019-09-20 07:50:17', NULL, NULL),
(250, 'KV 45 E', 'KNOB CYLINDER FOR DOOR THK. 45 MM.', 'ไส้กุญแจสำหรับบานประตูหนา 45 มม.', '', 'PRIVACY CYLINDER : ROUND KNOB, 30/30 MM. ไส้กุญแจ พร้อมปุ่มฉุกเฉิน สำหรับประตูหนา 35 - 40 มม.', 2, 21, '2019-09-20 07:50:17', NULL, NULL),
(251, 'KV 35 S', 'KNOB CYLINDER FOR DOOR THK. 35 MM.', 'ไส้กุญแจสำหรับบานประตูหนา 35 มม.', '', 'HALF CYLINDER : 5 PINS, 30/10 MM. ไส้กุญแจทางเดียว สำหรับประตูหนา 35 - 40 มม.', 2, 21, '2019-09-20 07:50:17', NULL, NULL),
(252, 'KV 45 S', 'KNOB CYLINDER FOR DOOR THK. 45 MM.', 'ไส้กุญแจสำหรับบานประตูหนา 45 มม.', '', 'HALF CYLINDER : 5 PINS, 35/10 MM. ไส้กุญแจทางเดียว สำหรับประตูหนา 45 - 50 มม.', 2, 21, '2019-09-20 07:50:17', NULL, NULL),
(253, 'KV 35 N', 'KNOB CYLINDER FOR DOOR THK. 35 MM.', 'ไส้กุญแจสำหรับบานประตูหนา 35 มม.', '', 'HALF CYLINDER : ROUND KNOB, 5 PINS, 30/10 MM. ไส้กุญแจหางปลาทางเดียว สำหรับประตูหนา 35 - 40 มม.', 2, 21, '2019-09-20 07:50:17', NULL, NULL),
(254, 'KV 45 N', 'KNOB CYLINDER FOR DOOR THK. 45 MM.', 'ไส้กุญแจสำหรับบานประตูหนา 45 มม.', '', 'DOUBLE CYLINDER : ROUND KNOB, 5 PINS, 35/10 MM. ไส้กุญแจหางปลาทางเดียว สำหรับประตูหนา 45 - 50 มม.', 2, 21, '2019-09-20 07:50:17', NULL, NULL),
(255, 'DC 01 A', 'DOOR CLOSER WITH ARM (WITHOUT STANDARD ARM)', 'โช้คอัพติดลอย แบบเท้าแขน (ไม่ตั้งค้าง แบบไม่มีจังหวะ)', '', 'APPLICATION DOOR WIDTH UP TO 1 ,100 MM. สำหรับบานกว้างไม่เกิน 1,100 มม. SPRINGG STRENGTH SIZE EN 2/3/4 กำลังการเปิด EN 2/3/4 FOR TIMBER METAL & ALUMINIUM DOOR สามารถติดตั้งได้ทั้งบานไม้และบานอลูมิเนียม WITHOUT BACKCHECK & WITH STAND ARM รุ่นไม่ตั้งค้างแบบไม่มีจังหวะในการปิด โปรดเช็คระยะการเจาะอุปกรณ์จากชิ้นงานจริงจากทางบริษัทก่อนทุกครั้ง', 2, 22, '2019-09-20 07:57:30', NULL, NULL),
(256, 'DC 01 B', 'DOOR CLOSER WITH ARM (WITH HOLD-OPEN ARM)', 'โช้คอัพติดลอย แบบเท้าแขน (ตั้งค้าง แบบไม่มีจังหวะ)', '', 'APPLICATION DOOR WIDTH UP TO 1 ,100 MM. สำหรับบานกว้างไม่เกิน 1,100 มม. SPRINGG STRENGTH SIZE EN 2/3/4 กำลังการเปิด EN 2/3/4 FOR TIMBER METAL & ALUMINIUM DOOR สามารถติดตั้งได้ทั้งบานไม้และบานอลูมิเนียม WITHOUT BACKCHECK & WITH HOLD-OPEN ARM รุ่นตั้งค้างแบบไม่มีจังหวะในการปิด โปรดเช็คระยะการเจาะอุปกรณ์จากชิ้นงานจริงจากทางบริษัทก่อนทุกครั้ง', 2, 22, '2019-09-20 07:57:30', NULL, NULL),
(257, 'DC 02 A', 'DOOR CLOSER WITH SLIDE CHANNEL (WITH BACKCHECK & WITHOUT HOLD OPEN)', 'โช้คอัพติดลอย แบบแขนสไลด์ แบบไม่ตั้งค้าง', '', 'APPLICATION DOOR WIDTH UP TO 950 MM. สำหรับบานกว้างไม่เกิน 950 มม. SPRINGG STRENGTH SIZE EN 3/4 การปิด-เปิดด้วยมาตรฐาน EN 3/4 FOR TIMBER METAL & ALUMINIUM DOOR สามารถติดตั้งได้ทั้งบานไม้และบานอลูมิเนียม WITH BACKCHECK & WITHOUT HOLD-OPEN ARM รุ่นไม่ตั้งค้างแบบมีจังหวะในการปิด SLIDE CHANNEL ARM โปรดเช็คระยะการเจาะอุปกรณ์จากชิ้นงานจริงจากทางบริษัทก่อนทุกครั้ง', 2, 22, '2019-09-20 07:57:30', NULL, NULL),
(258, 'DC 02 B', 'DOOR CLOSER WITH SLIDE CHANNEL (WITH BACKCHECK & WITH HOLD OPEN)', 'โช้คอัพติดลอย แบบแขนสไลด์ แบบตั้งค้าง', '', 'APPLICATION DOOR WIDTH UP TO 950 MM. สำหรับบานกว้างไม่เกิน 950 มม. SPRINGG STRENGTH SIZE EN 3/4 กำลังการเปิด EN 3/4 FOR TIMBER METAL & ALUMINIUM DOOR สามารถติดตั้งได้ทั้งบานไม้และบานอลูมิเนียม WITH BACKCHECK & WITH HOLD-OPEN รุ่นตั้งค้างแบบมีจังหวะในการปิด SLIDE CHANNEL ARM โปรดเช็คระยะการเจาะอุปกรณ์จากชิ้นงานจริงจากทางบริษัทก่อนทุกครั้ง', 2, 22, '2019-09-20 07:57:30', NULL, NULL),
(259, 'DC 03 A', 'CONCEALED DOOR CLOSER (WITH MECHANIC HOLD-OPEN ARM)', 'โช้ค อัพฝังสันบาน แบบตั้งค้าง สำหรับบานกว้างไม่เกิน 950 มม.', '', 'SPRING STRENGTH SIZE EN 3 กำลังการเปิด EN 3 APPLICABLE DOOR WIDTH UP TO 950 MM. สำหรับบานกว้างไม่เกิน 950 มม. APPLICABLE DOOR THICKNESS UP TO 40 MM. สำหรับบานหนาไม่เกิน 40 มม. ADJUSTABLE CLOSING SPEED VIA VALUE สามารถปรับความเร็วได้ โปรดเช็คระยะการเจาะอุปกรณ์จากชิ้นงานจริงจากทางบริษัทก่อนทุกครั้ง', 2, 22, '2019-09-20 07:57:30', NULL, NULL),
(260, 'DC 04', 'DOOR CLOSER FOR X.SERIES', 'โช้คอัพมีระบบดูดบานเมื่อปิด ใช้กับระบบ X-SERIES เท่านั้น', '', 'SPRING STRENGTH SIZE EN 3 กำลังการเปิด EN 3 APPLICABLE DOOR WIDTH UP TO 950 MM. สำหรับบานกว้างไม่เกิน 950 มม. APPLICABLE DOOR THICKNESS UP TO 40 MM. สำหรับบานหนาไม่เกิน 40 มม. ADJUSTABLE CLOSING SPEED VIA VALUE สามารถปรับความเร็วได้ โปรดเช็คระยะการเจาะอุปกรณ์จากชิ้นงานจริงจากทางบริษัทก่อนทุกครั้ง', 2, 22, '2019-09-20 07:57:30', NULL, NULL),
(261, 'BF 100', 'FLOOR SPRING DOOR CLOSER', 'โช้คอัพฝังพื้น รับน้ำหนักไม่เกิน 100 กก.', '', 'SPRING STRENGTH SIZE EN 2-4 (EN 1154) กำลังการเปิด EN 2-4 (EN 1154) OPENING ANGLE ± 120° แขนเปิดกว้างได้ ประมาน 120 APPLICABLE DOOR WIDTH UP TO 950 MM. สำหรับบานกว้างไม่เกิน 950 มม. MAX. DOOR WEIGHT 100 KG. รับน้ำหนักประตูได้ไม่เกิน 100 กก. โปรดเช็คระยะการเจาะอุปกรณ์จากชิ้นงานจริงจากทางบริษัทก่อนทุกครั้ง', 2, 22, '2019-09-20 07:57:30', NULL, NULL),
(262, 'BF 120', 'FLOOR SPRING DOOR CLOSER', 'โช้คอัพฝังพื้น รับน้ำหนักไม่เกิน 120 กก.', '', 'SPRING STRENGTH SIZE EN 2-4 (EN 1154) กำลังการเปิด EN 2-4 (EN 1154) OPENING ANGLE ± 120° แขนเปิดกว้างได้ ประมาน 120 APPLICABLE DOOR WIDTH UP TO 950 MM. สำหรับบานกว้างไม่เกิน 950 มม. MAX. DOOR WEIGHT 120 KG. รับน้ำหนักประตูได้ไม่เกิน 120 กก. โปรดเช็คระยะการเจาะอุปกรณ์จากชิ้นงานจริงจากทางบริษัทก่อนทุกครั้ง', 2, 22, '2019-09-20 07:57:30', NULL, NULL),
(263, 'BF180', 'headtack 20mm.', 'กล่องเสียบ 20 มม.', '', 'Suas nihil persius qui ut, meis omnesque usu ea. Nec in prompta cons etetur, sed nonumy mandamus te. Te nam labitur eloquentiam', 2, 22, '2019-09-20 07:57:30', NULL, NULL),
(264, 'PT. 10', 'BOTTOM PATCH FITTING', 'ตัวหนีบกระจกล่าง', '', '', 2, 23, '2019-09-20 08:11:08', NULL, NULL),
(265, 'PT. 20', 'TOP PATCH FITTING', 'ตัวหนีบกระจกบน', '', '', 2, 23, '2019-09-20 08:11:08', NULL, NULL),
(266, 'PT. 30', 'OVER PANEL PATCH FITTING', 'ตัวหนีบกระจกช่องแสงบน', '', '', 2, 23, '2019-09-20 08:11:08', NULL, NULL),
(267, 'PT. 40', 'OVER - SIDE PATCHC FITTING', 'ตัวหนีบด้ามปืนสำหรับช่องแสงบนและข้าง', '', '', 2, 23, '2019-09-20 08:11:08', NULL, NULL),
(268, 'PT. 50', 'TRILATERAL OVER - SIDE PATCH FITTING', 'ตัวหนีบช่องแสงบนและข้างแบบมีครีม', '', '', 2, 23, '2019-09-20 08:11:08', NULL, NULL),
(269, 'US. 10', 'COVER LOCK PATCH FITTING', 'ชุดล็อคกระจกบานเปลือย ไม่รวมไส้กุญแจ', '', '', 2, 23, '2019-09-20 08:11:08', NULL, NULL),
(270, 'PT. 01', 'ACCESSORIES PATCH FITTING', 'เดือยเป็นสำหรับตัวหนีบกระจก', '', '', 2, 23, '2019-09-20 08:11:08', NULL, NULL),
(271, 'PT. 02', 'ACCESSORIES PATCH FITTING', 'เดือยตายสำหรับตัวหนีบกระจก', '', '', 2, 23, '2019-09-20 08:11:08', NULL, NULL),
(272, 'PTS', 'PATCH FITTING FOR SWING DOOR', 'ตัวหนีบกระจกมีโช้คในตัว (แบบไม่ต้องเจาะพื้น)', '', 'สำหรับกระจก 10-12 mm. รับน้ำหนักไม่เกิน 80 kg/บาน', 2, 23, '2019-09-20 08:11:08', NULL, NULL),
(273, 'SLR', 'TRACK FOR SLIDING GLASS DOOR WITH DOOR CLOSER', 'รางบานเลื่อนมีโช้คสำหรับประตูกระจกบานเลื่อน', '', 'โปรดเช็คระยะการเจาะอุปกรณ์จากชิ้นงานจริงจากทางบริษัทก่อนทุกครั้ง', 2, 24, '2019-09-20 08:17:11', NULL, NULL),
(274, 'SLG', 'SLIDING PLATE FOR GLASS DOOR 1 set', 'ตัวหนีบกระจก สำหรับประตูกระจกบานเลื่อน 1 set', '', 'โปรดเช็คระยะการเจาะอุปกรณ์จากชิ้นงานจริงจากทางบริษัทก่อนทุกครั้ง', 2, 24, '2019-09-20 08:17:11', NULL, NULL),
(275, 'SLC', 'SLIDING CAP', 'บังรางบานเลื่อน', '', 'SLC - 50 SLIDING CAP 50 mm. | บังรางบานเลื่อน 50 มม. ยาว 6 เมตร SLC - 80 SLIDING CAP 80 mm. | บังรางบานเลื่อน 80 มม. ยาว 6 เมตร โปรดเช็คระยะการเจาะอุปกรณ์จากชิ้นงานจริงจากทางบริษัทก่อนทุกครั้ง', 2, 24, '2019-09-20 08:17:11', NULL, NULL),
(276, 'SL 100', 'SLIDING TRACK', 'รางบานเลื่อน', '', 'ROLLER SET & SLIDING TRACK UP TO 100 KG. | รางและล้อบานเลื่อน รับน้ำหนักไม่เกิน 100 กก. SL-100 / 2 SLIDING TRACK 2 M. | รางบานเลื่อนยาว 2 เมตร SL-100 / 3 SLIDING TRACK 3 M. | รางบานเลื่อนยาว 3 เมตร SL-100 / 4 SLIDING TRACK 4 M. | รางบานเลื่อนยาว 4 เมตร SL-100 / 6 SLIDING TRACK 6 M. | รางบานเลื่อนยาว 6 เมตร โปรดเช็คระยะการเจาะอุปกรณ์จากชิ้นงานจริงจากทางบริษัทก่อนทุกครั้ง', 2, 24, '2019-09-20 08:17:11', NULL, NULL),
(277, 'SR100', 'ROLLER SET., UP TO 80 KG.', 'ล้อบานเลื่อน รับน้ำหนักไม่เกิน 80 กก.', '', 'โปรดเช็คระยะการเจาะอุปกรณ์จากชิ้นงานจริงจากทางบริษัทก่อนทุกครั้ง', 2, 24, '2019-09-20 08:17:11', NULL, NULL),
(278, 'SL 120', 'SlIDING TRACK', 'รางบานเลื่อน', '', 'ROLLER SET & SLIDING TRACK UP TO 120 KG. | รางและล้อบานเลื่อน รับน้ำหนักไม่เกิน 120 กก. SL-120 / 2 SLIDING TRACK 2 M. | รางบานเลื่อนยาว 2 เมตร SL-120 / 3 SLIDING TRACK 3 M. | รางบานเลื่อนยาว 3 เมตร SL-120 / 4 SLIDING TRACK 4 M. | รางบานเลื่อนยาว 4 เมตร SL-120 / 6 SLIDING TRACK 6 M. | รางบานเลื่อนยาว 6 เมตร โปรดเช็คระยะการเจาะอุปกรณ์จากชิ้นงานจริงจากทางบริษัทก่อนทุกครั้ง', 2, 24, '2019-09-20 08:17:11', NULL, NULL),
(279, 'SR 120', 'ROLLER SET., UP TO 120 KG.', 'ล้อบานเลื่อน รับน้ำหนักไม่เกิน 120 กก.', '', '', 2, 24, '2019-09-20 08:17:11', NULL, NULL),
(280, 'SL 150', 'SLIDING TRACK', 'รางบานเลื่อน', '', 'ROLLER SET & SLIDING TRACK UP TO 150 KG. | รางและล้อบานเลื่อน รับน้ำหนักไม่เกิน 150 กก. SL-150 / 2 SLIDING TRACK 2 M. | รางบานเลื่อนยาว 2 เมตร SL-150 / 3 SLIDING TRACK 3 M. | รางบานเลื่อนยาว 3 เมตร SL-150 / 4 SLIDING TRACK 4 M. | รางบานเลื่อนยาว 4 เมตร SL-150 / 6 SLIDING TRACK 6 M. | รางบานเลื่อนยาว 6 เมตร โปรดเช็คระยะการเจาะอุปกรณ์จากชิ้นงานจริงจากทางบริษัทก่อนทุกครั้ง', 2, 24, '2019-09-20 08:17:11', NULL, NULL),
(281, 'SR 150', 'ROLLER SET., UP TO 150 KG.', 'ล้อบานเลื่อน รับน้ำหนักไม่เกิน 150 กก.', '', 'โปรดเช็คระยะการเจาะอุปกรณ์จากชิ้นงานจริงจากทางบริษัทก่อนทุกครั้ง', 2, 24, '2019-09-20 08:17:11', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `img_cover` text NOT NULL,
  `img_title_alt` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `img_cover`, `img_title_alt`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'OFFICE อลูมิเนียมภายใน', 'อลูมิเนียมสำหรับงานตกแต่งภายในสำนักงาน', 'e06485.jpg', '', '2019-08-15 02:41:29', NULL, NULL),
(2, 'HOME อลูมิเนียมภายในและภายนอก', 'อลูมิเนียมสำหรับงานภายใน และภายนอกบ้าน', '2d24b1.jpg', '', '2019-08-15 02:41:39', NULL, NULL),
(3, 'COMMERCIAL อลูมิเนียมภายใน', 'อลูมิเนียมสำหรับโรงแรม โรงพยาบาล หรือหน่วยงานต่างๆ', '6dd922.jpg', '', '2019-08-15 02:41:48', NULL, NULL),
(4, 'CONDOMINUM อลูมิเนียมภายใน', 'อลูมิเนียมสำหรับงานภายใน', '5a469d.jpg', '', '2019-08-15 02:42:01', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `technology_videos`
--

CREATE TABLE `technology_videos` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `body` text NOT NULL,
  `description` text NOT NULL,
  `src` text NOT NULL,
  `short_src` text NOT NULL,
  `img_cover` text NOT NULL,
  `img_title_alt` text NOT NULL,
  `category_technology_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `technology_videos`
--

INSERT INTO `technology_videos` (`id`, `title`, `slug`, `body`, `description`, `src`, `short_src`, `img_cover`, `img_title_alt`, `category_technology_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ระบบอลูมิเนียมประตูหน้าต่าง B-SERIES', 'ระบบอลูมิเนียมประตูหน้าต่าง-b-series', '', 'ระบบอลูมิเนียมประตูหน้าต่างบานเฟี้ยม', '<iframe width=\"100%\" height=\"400\" src=\"https://www.youtube.com/embed/pZFeraPjm4s\" frameborder=\"0\" allowfullscreen></iframe>', 'pZFeraPjm4s', 'https://img.youtube.com/vi/pZFeraPjm4s/mqdefault.jpg', '', 1, '2019-08-21 08:40:26', NULL, NULL),
(2, 'เครื่องเร้าเตอร์รูกุญแจบานประตูอลูมิเนียม  Aluminium Profile Copy Router', 'เครื่องเร้าเตอร์รูกุญแจบานประตูอลูมิเนียม-aluminium-profile-copy-router', '<p>สามารถลดเวลาการทำงานเจาะรูกุญแกได้ 2 เท่า เพราะสามารถเร้าเตอร์ได้ทั้ง 2ฝั่งในเวลาเดียวกัน</p><p><br></p><p>Credit by&nbsp; :&nbsp; &nbsp;<span style=\\\"\\\\&quot;color:\\\" rgb(0,=\\\"\\\" 0,=\\\"\\\" 0);=\\\"\\\" font-family:=\\\"\\\" arial;=\\\"\\\" font-size:=\\\"\\\" 13px;=\\\"\\\" white-space:=\\\"\\\" pre-wrap;\\\\\\\"=\\\"\\\">&nbsp; </span><span style=\\\"\\\\&quot;color:\\\" rgb(0,=\\\"\\\" 102,=\\\"\\\" 33);=\\\"\\\" font-family:=\\\"\\\" arial,=\\\"\\\" sans-serif;=\\\"\\\" font-size:=\\\"\\\" 14px;=\\\"\\\" white-space:=\\\"\\\" nowrap;\\\\\\\"=\\\"\\\"><br></span>www.ozgencmachine.com<span style=\\\"\\\\&quot;color:\\\" rgb(0,=\\\"\\\" 102,=\\\"\\\" 33);=\\\"\\\" font-family:=\\\"\\\" arial,=\\\"\\\" sans-serif;=\\\"\\\" font-size:=\\\"\\\" 14px;=\\\"\\\" white-space:=\\\"\\\" nowrap;\\\\\\\"=\\\"\\\"><br></span></p>                        </p>', 'เทคโนโลยียุคใหม่ของการทำงานอลูมิเนียมให้เป็นเรื่องง่าย', '<iframe width=\"100%\" height=\"400\" src=\"https://www.youtube.com/embed/swT-nMNmmz4\" frameborder=\"0\" allowfullscreen></iframe>', 'swT-nMNmmz4', 'https://img.youtube.com/vi/swT-nMNmmz4/mqdefault.jpg', '', 2, '2019-08-21 08:41:34', NULL, NULL),
(3, 'ระบบอลูมิเนียมประตูหน้าต่าง  X-SERIES', 'ระบบอลูมิเนียมประตูหน้าต่าง-x-series', '', 'ระบบอลูมิเนียมประตู SLIM DESIGN', '', 'hd3MghzSIRs', 'https://img.youtube.com/vi/hd3MghzSIRs/mqdefault.jpg', '', 1, '2019-08-22 03:28:20', NULL, NULL),
(4, 'ระบบอลูมิเนียมประตูหน้าต่าง  E-SERIES', 'ระบบอลูมิเนียมประตูหน้าต่าง-e-series', '', 'ระบบอลูมิเนียมประตูหน้าต่างบานเลิ่อน', '', 'Qs4bW40XLwk', 'https://img.youtube.com/vi/Qs4bW40XLwk/mqdefault.jpg', '', 1, '2019-08-22 03:32:27', NULL, NULL),
(5, 'ระบบอลูมิเนียมประตูหน้าต่าง C-SERIES', 'ระบบอลูมิเนียมประตูหน้าต่าง-c-series', '', 'ระบบอลูมิเนียมประตูหน้าต่างบานกระทุ้ง', '', 'IqDe4FbX67w', 'https://img.youtube.com/vi/IqDe4FbX67w/mqdefault.jpg', '', 1, '2019-08-22 03:32:27', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', '1234', 0, '2019-08-14 08:23:55', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_products`
--
ALTER TABLE `category_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_technologies`
--
ALTER TABLE `category_technologies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_page`
--
ALTER TABLE `contact_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_technologies`
--
ALTER TABLE `faq_technologies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_products`
--
ALTER TABLE `group_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_products`
--
ALTER TABLE `image_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_projects`
--
ALTER TABLE `image_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_meta_tags`
--
ALTER TABLE `page_meta_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technology_videos`
--
ALTER TABLE `technology_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_products`
--
ALTER TABLE `category_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `category_technologies`
--
ALTER TABLE `category_technologies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_page`
--
ALTER TABLE `contact_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faq_technologies`
--
ALTER TABLE `faq_technologies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `group_products`
--
ALTER TABLE `group_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `image_products`
--
ALTER TABLE `image_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289;

--
-- AUTO_INCREMENT for table `image_projects`
--
ALTER TABLE `image_projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `page_meta_tags`
--
ALTER TABLE `page_meta_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=287;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `technology_videos`
--
ALTER TABLE `technology_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
