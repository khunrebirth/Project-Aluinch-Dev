-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 15, 2019 at 11:01 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `desc` text NOT NULL,
  `image_cover` text NOT NULL,
  `group_product_id` int(11) NOT NULL,
  `file_catalog` text NOT NULL,
  `file_price` text NOT NULL,
  `file_cad` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_products`
--

INSERT INTO `category_products` (`id`, `title`, `desc`, `image_cover`, `group_product_id`, `file_catalog`, `file_price`, `file_cad`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'T-SERIES', 'ระบบอลูมิเนียมวงกบ ช่องแสงติดตาย ขนาด 100 x 20 mm.', '0121df.jpg', 1, '', '', '', '2019-08-14 10:29:14', NULL, NULL),
(2, 'F-SERIES', 'ระบบอลูมิเนียมวงกบ ช่องแสงติดตาย ขนาด 45 x 20 mm.', 'a24779.jpg', 1, '', '', '', '2019-08-14 10:29:14', NULL, NULL),
(3, 'V-SERIES', 'ระบบอลูมิเนียมวงกบ ช่องแสงติดตาย ปรับขนาดตามผนังตั้งแต่ 90 - 200 mm.', '471fcb.jpg', 1, '', '', '', '2019-08-14 10:29:46', NULL, NULL),
(4, 'D-SERIES', 'ระบบอลูมิเนียมประตูบานเปิด บานเลื่อนและบานสวิง หนา 35 mm.', 'ff80c3.jpg', 1, '', '', '', '2019-08-14 10:31:56', NULL, NULL),
(5, 'S-SERIES', 'ระบบอลูมิเนียมขัวเชิงผนัง แบบเรียบและสกรู ออน', '8ce542.jpg', 1, '', '', '', '2019-08-14 10:33:07', '2019-08-15 10:27:38', NULL),
(6, 'X-SERIES', 'ระบบอลูมิเนียมประตูบานเปิด บานเลื่อนและบานสวิง ขนาด 16 x 35 mm.', '45c20e.jpg', 1, '', '', '', '2019-08-14 10:33:07', NULL, NULL),
(7, 'M-SERIES', 'ระบบอลูมิเนียมประตู บานเลื่อนและบานสวิง ขนาด 9 x 35 mm.', '6b7b90.jpg', 1, '', '', '', '2019-08-14 10:34:09', NULL, NULL),
(8, 'E-SERIES', 'ระบบอลูมิเนียมบานเลื่อนประตูหน้าต่าง ( กันน้ำ )', 'de801d.jpg', 1, '', '', '', '2019-08-14 10:34:09', NULL, NULL),
(9, 'C-SERIES', 'ระบบอลูมิเนียมหน้าต่างบานกระทุ้ง ( กันน้ำ )', 'a7b71e.jpg', 1, '', '', '', '2019-08-14 10:35:17', NULL, NULL),
(10, 'B-SERIES', 'ระบบอลูมิเนียมบานเฟี้ยมประตูและหน้าต่าง ( กันน้ำ )', 'ae7132.jpg', 1, '', '', '', '2019-08-14 10:35:17', NULL, NULL),
(11, 'i-SERIES', 'ระบบอลูมิเนียมบานหน้าตู้ บานเลื่อนและบานเปิด', '91af97.jpg', 1, '', '', '', '2019-08-14 10:36:17', NULL, NULL),
(12, 'J-SERIES', 'ระบบอลูมิเนียมใช้ตกแต่งประตูหรือผนัง', 'b9c5bc.jpg', 1, '', '', '', '2019-08-14 10:36:17', NULL, NULL),
(13, 'L-SERIES', 'ระบบอลูมิเนียมบานเกร็ดสำหรับบังลมและรับลม', '780c33.jpg', 0, '', '', '', '2019-08-14 10:37:39', NULL, NULL),
(14, 'ACCESSORIES', 'ยางอัด ยางหุ้ม ยางปิดร่อง ยางสันบานประตูและขนสักหลาด', 'af734c.jpg', 1, '', '', '', '2019-08-14 10:37:39', NULL, NULL),
(15, 'Lever Handle', 'มือจับก้านโยกสำหรับประตูไม้และอลูมิเนียม', '6cab71.jpg', 2, '', '', '', '2019-08-14 10:40:08', NULL, NULL),
(16, 'Pull Handle with Lock', 'มือจับกระบองยาวมีล็อคในตัว', '71cd55.jpg', 2, '', '', '', '2019-08-14 10:40:08', NULL, NULL),
(17, 'Pull Handle', 'มือจับกระบองใช้สำหรับประตูทุกชนิด', '698931.jpg', 0, '', '', '', '2019-08-14 10:42:10', NULL, NULL),
(18, 'Pull Handle', 'มือจับกระบองใช้สำหรับประตูทุกชนิด', '698931.jpg', 2, '', '', '', '2019-08-14 10:45:11', NULL, NULL),
(19, 'Flush Handle', 'มือจับแบบฝังใช้กับประตูบานไม้และอลูมิเนียม', '4096f9.jpg', 2, '', '', '', '2019-08-14 10:46:28', NULL, NULL),
(20, 'Mortise Lock', 'เสื้อกุญแจสำหรับประตูบานไม้และอลูมิเนียม', '29bcf9.jpg', 2, '', '', '', '2019-08-14 10:46:28', NULL, NULL),
(21, 'Knob Cylinder', 'ไส้กุญแจสำหรับประตูทุกชนิด', '35deea.jpg', 2, '', '', '', '2019-08-14 10:47:25', NULL, NULL),
(22, 'Door Closer', 'โช้คอัพประตูใช้ได้กับประตูทุกชนิด', '92a66f.jpg', 2, '', '', '', '2019-08-14 10:47:25', NULL, NULL),
(23, 'Patch Fitting', 'อุปกรณ์สำหรับประตูกระจกบานเปลือย', 'ea2aab.jpg', 2, '', '', '', '2019-08-14 10:47:53', NULL, NULL),
(24, 'Rolling Set', 'รางเลื่อนและล้อเลื่อนใช้กับประตูทุกชนิด', 'ef0b60.jpg', 2, '', '', '', '2019-08-14 10:48:20', NULL, NULL),
(25, 'ANODIZED', 'สีชุบเน้นความสวยงามของเฟรม', '0acae9.jpg', 3, '', '', '', '2019-08-14 10:49:24', NULL, NULL),
(26, 'POWDER COATED', 'สีพ่น ทนการขีดข่วนสีคงทนตามการใช้งาน', '688945.jpg', 3, '', '', '', '2019-08-14 10:49:24', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_technologies`
--

CREATE TABLE `category_technologies` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_technologies`
--

INSERT INTO `category_technologies` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PRESENTATION VDO วีดีโอแนะนำการใช้งาน', '2019-08-15 02:39:51', NULL, NULL),
(2, 'TIPS AND TRICKS เกร็ดความรู้อลูมิเนียม', '2019-08-15 02:39:51', NULL, NULL),
(3, 'FAQ คำถามที่พบบอย', '2019-08-15 02:40:01', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faq_technologies`
--

CREATE TABLE `faq_technologies` (
  `id` int(11) NOT NULL,
  `ask` text NOT NULL,
  `ans` text NOT NULL,
  `category_technology_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group_products`
--

INSERT INTO `group_products` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ALUMINIUM อลูมิเนียมโปรไฟล์', '2019-08-14 10:23:28', NULL, NULL),
(2, 'HARDWARE อุปกรณ์ประตูหน้าต่าง', '2019-08-14 10:23:28', NULL, NULL),
(3, 'COLLOR CHART สีอลูมิเนียมของเรา', '2019-08-14 10:23:39', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `image_projects`
--

CREATE TABLE `image_projects` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `project_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'home', '2019-08-15 10:54:05', NULL, NULL),
(2, 'product', '2019-08-15 10:54:05', NULL, NULL),
(3, 'technology', '2019-08-15 10:54:18', NULL, NULL),
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `description_en` text NOT NULL,
  `description_th` text NOT NULL,
  `image` text NOT NULL,
  `product_group_id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description_en`, `description_th`, `image`, `product_group_id`, `product_category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ALUINCH T-20.01', 'HEADTRACK 20 mm.', 'กล่องเรียบ 20 มม.', '5875ebc1dfdd4.jpg', 1, 1, '2019-08-15 02:39:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `desc` text NOT NULL,
  `image_cover` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `desc`, `image_cover`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'OFFICE อลูมิเนียมภายใน', 'อลูมิเนียมสำหรับงานตกแต่งภายในสำนักงาน', 'e06485.jpg', '2019-08-15 02:41:29', NULL, NULL),
(2, 'HOME อลูมิเนียมภายในและภายนอก', 'อลูมิเนียมสำหรับงานภายใน และภายนอกบ้าน', '2d24b1.jpg', '2019-08-15 02:41:39', NULL, NULL),
(3, 'COMMERCIAL อลูมิเนียมภายใน', 'อลูมิเนียมสำหรับโรงแรม โรงพยาบาล หรือหน่วยงานต่างๆ', '6dd922.jpg', '2019-08-15 02:41:48', NULL, NULL),
(4, 'CONDOMINUM อลูมิเนียมภายใน', 'อลูมิเนียมสำหรับงานภายใน', '5a469d.jpg', '2019-08-15 02:42:01', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `technology_videos`
--

CREATE TABLE `technology_videos` (
  `id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `body` text NOT NULL,
  `src` text NOT NULL,
  `category_technology_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `category_technologies`
--
ALTER TABLE `category_technologies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `faq_technologies`
--
ALTER TABLE `faq_technologies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `group_products`
--
ALTER TABLE `group_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `technology_videos`
--
ALTER TABLE `technology_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
