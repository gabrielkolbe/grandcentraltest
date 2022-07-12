-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2022 at 11:49 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `colours`
--

CREATE TABLE `colours` (
  `id` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `colour` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `colours`
--

INSERT INTO `colours` (`id`, `name`, `colour`) VALUES
(1, 'topbar', '#070707'),
(2, 'topbar_font', '#E8E7E7'),
(3, 'topbar_fonthover', '#E5E5E5'),
(4, 'topbar_fontselected', '#ffffff'),
(5, 'topbar_social', '#192e41'),
(6, 'logobar', '#FCFCFC'),
(7, 'logobar_teltime', '#343E49'),
(8, 'logobar_emaildays', '#6c8198'),
(9, 'logobar_iconcolours', '#2f7ddb'),
(10, 'buttons', '#2f7ddb'),
(11, 'buttons2', '#00c85d'),
(12, 'myservices', '#ffffff'),
(13, 'whyusbg', '#2f7ddb'),
(14, 'reviewbg', '#192e41'),
(15, 'about', '#f5f5f5'),
(16, 'hiringbg', '#2f7ddb'),
(17, 'projects', '#f5f5f5'),
(18, 'shop', '#ffffff'),
(19, 'faq', '#f5f5f5'),
(20, 'contactbg', '#070707'),
(21, 'bottombartext', '#CCCCCC'),
(22, 'bottombarbg', '#070707'),
(23, 'footerbg', '#192e41'),
(24, 'footertext', '#FFFFFF'),
(25, 'footerheadings', '#E6E4E4'),
(26, 'whyustext', '#F9F9F9'),
(27, 'reviewtext', '#f5e89b'),
(28, 'hiringtext', '#F7F7F7'),
(29, 'contacttext', '#f5e89b');

-- --------------------------------------------------------

--
-- Table structure for table `dashboard`
--

CREATE TABLE `dashboard` (
  `id` int(10) NOT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `title` varchar(50) NOT NULL,
  `layout` varchar(20) NOT NULL DEFAULT 'dashboard',
  `route` varchar(50) DEFAULT NULL,
  `page` varchar(20) DEFAULT NULL,
  `sidebar` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dashboard`
--

INSERT INTO `dashboard` (`id`, `slug`, `title`, `layout`, `route`, `page`, `sidebar`) VALUES
(1, 'index', 'Dashboard', 'dashboardnoheader', '', 'index', 'index'),
(3, 'business_settings', 'Business', 'dashboard', 'settings', 'business', 'setup'),
(4, 'social_settings', 'Social Settings', 'dashboard', 'settings', 'social', 'setup'),
(5, 'terms', 'Terms and Conditions', 'dashboard', 'settings', 'terms', 'setup'),
(6, 'privacy', 'Privacy Policy', 'dashboard', 'settings', 'privacy', 'setup'),
(9, 'section_edit', 'Edit Section', 'dashboard', 'sections', 'edit', 'content'),
(10, 'images', 'Image Library', 'dashboard', 'images', 'index', 'content'),
(11, 'images_add', 'Add an Image', 'dashboard', 'images', 'add', 'content'),
(12, 'edit_image', 'Edit an Image', 'dashboard', 'images', 'edit', 'content'),
(14, 'image_fullview', 'Image full view', 'dashboard', 'images', 'fullview', 'content'),
(15, 'icons', 'View Icons', 'dashboard', 'design', 'icons', 'design'),
(16, 'bootstrapicons', 'View Icons', 'dashboard', 'design', 'bootstrapicons', 'design'),
(18, 'edit_colour', 'Edit Colours', 'dashboard', 'ecom/colours', 'edit', 'ecom'),
(19, 'emails', 'Emails', 'dashboard', 'emails', 'index', 'communication'),
(20, 'view_email', 'View Email', 'dashboard', 'emails', 'view', 'communication'),
(21, 'contacts', 'Contacts', 'dashboard', 'contacts', 'index', 'communication'),
(22, 'mailinglists', 'Mailing Lists', 'dashboard', 'mailinglists', 'index', 'communication'),
(23, 'maintenance_tasks', 'Tasks', 'dashboard', 'maintenance', 'tasks', 'maintenance'),
(24, 'dbintegrity', 'DB Integrety', 'dashboard', 'maintenance', 'dbintegrity', 'maintenance'),
(25, 'dbshowstructure', 'DB Structure', 'dashboard', 'maintenance', 'dbshowstructure', 'maintenance'),
(50, 'sitecolours', 'Select Colours', 'dashboard', 'design', 'colours', 'design'),
(57, 'product_images', 'Product Images', 'dashboard', 'ecom/products', 'images', 'ecom'),
(58, 'sections', 'Sections', 'dashboard', 'sections', 'index', 'ecom'),
(59, 'pages', 'Pages', 'dashboard', 'pages', 'index', 'content'),
(60, 'edit_page', 'Edit Page', 'dashboard', 'pages', 'edit', 'content'),
(61, 'headerfooter', 'Select the header and footer', 'dashboard', 'pages', 'headerfooter', 'pages'),
(62, 'colours', 'Change the site colours', 'dashboard', 'design', 'colours', 'design'),
(63, 'settings', 'SEO Default Values', 'dashboard', 'settings', 'index', 'setup'),
(64, 'users', 'Users', 'dashboard', 'users', 'index', 'users');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `original` varchar(50) NOT NULL,
  `thumb` varchar(25) DEFAULT NULL,
  `alttags` varchar(50) DEFAULT NULL,
  `width` int(5) NOT NULL,
  `height` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `original`, `thumb`, `alttags`, `width`, `height`) VALUES
(2, '1657617892.png', 'Grand-Central-Website-Logo-v001-AG-uai-258x178.png', '160_1657617892.png', '', 258, 178),
(3, '1657619300.jpg', 'flowerfight.jpg', '160_1657619300.jpg', '', 479, 601);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `menu` varchar(50) DEFAULT NULL,
  `page` varchar(50) DEFAULT NULL,
  `displaymenu` varchar(5) DEFAULT 'yes',
  `rank` int(3) DEFAULT 0,
  `layout` varchar(20) NOT NULL DEFAULT 'base',
  `route` varchar(20) DEFAULT NULL,
  `cachepage` varchar(5) DEFAULT 'yes',
  `metadescrip` text DEFAULT NULL,
  `keywords` varchar(250) DEFAULT NULL,
  `source` varchar(5) DEFAULT 'templ',
  `showit` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `menu`, `page`, `displaymenu`, `rank`, `layout`, `route`, `cachepage`, `metadescrip`, `keywords`, `source`, `showit`) VALUES
(24, 'Home', 'home', 'Home', 'home', 'yes', 0, 'base', NULL, 'yes', 'this is a beautiful garage', 'home page', 'templ', 1),
(31, 'My Account', 'account', 'Account', 'account', 'no', NULL, 'single', NULL, 'yes', NULL, NULL, 'templ', 0),
(32, 'Login', 'login', 'login', 'login', 'yes', 1, 'single', 'access', 'yes', NULL, NULL, 'templ', 1),
(33, 'Register', 'register', 'register', 'register', 'no', NULL, 'single', 'access', 'yes', NULL, NULL, 'templ', 0),
(34, 'Reset Password', 'reset_password', 'reset_password', 'reset_password', 'no', NULL, 'single', 'access', 'no', NULL, NULL, 'templ', 0),
(35, 'Resend verification', 'resend_verify', 'resend_verify', 'resend_verify', 'no', NULL, 'single', 'access', 'yes', NULL, NULL, 'templ', 0),
(36, 'Reset Password', 'password', 'reset_password', 'password', 'no', NULL, 'single', 'access', 'yes', NULL, NULL, 'templ', 0),
(37, 'Verify Email', 'verify', 'verify', 'verify', 'no', NULL, 'single', 'access', 'yes', NULL, NULL, 'templ', 0),
(38, 'Logout', 'logout', 'logout', 'logout', 'no', 1, 'single', 'access', 'yes', NULL, NULL, 'templ', 0),
(43, 'Contact', 'contact', 'Contact', 'contact', 'no', 0, 'single', 'access', 'yes', NULL, NULL, 'templ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `page_features`
--

CREATE TABLE `page_features` (
  `id` int(10) NOT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `heading` varchar(50) DEFAULT NULL,
  `heading2` varchar(50) DEFAULT NULL,
  `strapline` text NOT NULL,
  `content` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `image_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `page_sections`
--

CREATE TABLE `page_sections` (
  `id` int(10) NOT NULL,
  `page` varchar(50) DEFAULT NULL,
  `section_name` varchar(50) DEFAULT NULL,
  `section_slug` varchar(50) DEFAULT NULL,
  `rank` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `page_sections`
--

INSERT INTO `page_sections` (`id`, `page`, `section_name`, `section_slug`, `rank`) VALUES
(22, 'home', 'About', 'about', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `menu` varchar(50) DEFAULT NULL,
  `displaymenu` varchar(5) DEFAULT 'no',
  `rank` int(2) DEFAULT 0,
  `role` varchar(10) DEFAULT 'section',
  `source` varchar(5) DEFAULT 'templ',
  `showit` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `slug`, `type`, `menu`, `displaymenu`, `rank`, `role`, `source`, `showit`) VALUES
(1, 'About', 'about', 'about', 'About', 'no', 2, 'section', 'templ', 1),
(2, 'Top Bar', 'topbar', 'topbar', 'Top Bar', '', 8, 'global', 'templ', 1),
(3, 'Bottom Bar', 'bottombar', 'bottombar', 'Bottom Bar', '', 7, 'global', 'templ', 1),
(4, 'Logo Bar', 'logobar', 'logobar', 'Logo Bar', '', 6, 'global', 'templ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `section_features`
--

CREATE TABLE `section_features` (
  `id` int(10) NOT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `heading` varchar(50) DEFAULT NULL,
  `heading2` varchar(50) DEFAULT NULL,
  `strapline` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image_id` int(10) DEFAULT NULL,
  `link` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section_features`
--

INSERT INTO `section_features` (`id`, `slug`, `heading`, `heading2`, `strapline`, `content`, `image_id`, `link`) VALUES
(4, 'about', 'About us', '', '', 'Grand Central Creative is a fully integrated, brand, shopper, and digital agency based in Guildford.\n\nFounded in May 2013 by Philip Scotcher and Andy Gregory, the pair first met at Brunel University reading Product Design and Engineering. Both began their careers in pure digital, designing and building websites, apps and mobile solutions for a variety of clients pre-2000. This evolved into wider roles within the world of integrated advertising and marketing, finally settling as a planner (Philip) and creative (Andy) across many of the large agency networks throughout London and Sydney.\n\n​​It was Andy’s return from Australia that prompted the duo to team up and form Grand Central Creativ​e. ​Initially, the agency specialised in Social Media solutions born off a planning philosophy called Journey Mapping. This allowed the profiling of an audience and the ability to identify the optimal time to engage; across media, channel and creative messaging.\n\nIn less than 1 month Grand Central Creative had picked up it’s first fully integrated brief leading to a unique partnership with Le Tour de France and activation across several European and South American Markets.\n\n9 years later and the agency is truly full service, delivering everything from small one-off design projects for Clipper Teas & Walkers crisps, digital coupons for The Guardian and Observer, corporate conferences for National Grid, sponsorship campaigns for The Newt in Somerset and directing global communications for Accolade Wines, to name just a few.\n\n​​The agency philosophy remains the same today as it was 9 years ago: “we will remain small, agile and focused on sound planning, brilliant creative and first-class client service. We are only as good as our last campaign which is why we will treat each brand as if it was our own.”\n\nWe look forward to working with you.', 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `section_parts`
--

CREATE TABLE `section_parts` (
  `id` int(10) NOT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `strapline` varchar(200) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image_id` int(10) DEFAULT NULL,
  `link` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `section_types`
--

CREATE TABLE `section_types` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section_types`
--

INSERT INTO `section_types` (`id`, `name`, `slug`) VALUES
(16, 'Gallery', 'gallery'),
(17, 'Projects', 'projects');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) NOT NULL,
  `owner` varchar(20) NOT NULL,
  `businessemail` varchar(100) NOT NULL,
  `businessname` varchar(100) DEFAULT NULL,
  `businesstelephone` varchar(20) DEFAULT NULL,
  `businessaddress` varchar(200) DEFAULT NULL,
  `emailpass` varchar(50) DEFAULT NULL,
  `paypalemail` varchar(40) DEFAULT NULL,
  `availablehours` varchar(100) DEFAULT NULL,
  `availabledays` varchar(100) DEFAULT NULL,
  `availability` varchar(100) DEFAULT NULL,
  `logo` varchar(20) DEFAULT NULL,
  `logoheight` int(5) DEFAULT NULL,
  `logoradius` varchar(5) DEFAULT NULL,
  `favicon` varchar(20) DEFAULT NULL,
  `googlemap` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `owner`, `businessemail`, `businessname`, `businesstelephone`, `businessaddress`, `emailpass`, `paypalemail`, `availablehours`, `availabledays`, `availability`, `logo`, `logoheight`, `logoradius`, `favicon`, `googlemap`) VALUES
(1, 'test', 'info@test', 'test', '123 123 123', '', '', '', '', '', '', '1657617892.png', 155, '0', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `socialmedia`
--

CREATE TABLE `socialmedia` (
  `id` int(10) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `link` varchar(50) DEFAULT NULL,
  `icon` varchar(20) DEFAULT NULL,
  `display` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `socialmedia`
--

INSERT INTO `socialmedia` (`id`, `name`, `link`, `icon`, `display`) VALUES
(1, 'Twitter', 'twitter link here1', 'bi bi-twitter', 0),
(2, 'Facebook', 'facebook link here', 'bi bi-facebook', 0),
(3, 'Instagram', 'instagram link here', 'bi bi-instagram', 0),
(4, 'Pinterest', '', 'bi bi-pinterest', 0),
(5, 'Linkedin', '', 'bi bi-linkedin', 0),
(6, 'Youtube', 'youtube link here', 'bi bi-youtube', 0),
(8, 'Vimeo', '', 'bi bi-vimeo', 0),
(11, 'Reddit', '', 'bi bi-reddit', 0),
(12, 'Snapchat', '', 'bi bi-snapchat', 0),
(13, 'WhatsApp', '', 'bi bi-whatsapp', 0),
(14, 'Quora', '', 'bi bi-quora', 0),
(15, 'TikTok', '', 'bi bi-tiktok', 0);

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE `theme` (
  `id` int(10) NOT NULL,
  `topsocialbuttons` varchar(5) DEFAULT NULL,
  `logobar_show_timeday` varchar(5) DEFAULT NULL,
  `logobar_show_telemail` varchar(5) DEFAULT NULL,
  `logobar_show_icons` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`id`, `topsocialbuttons`, `logobar_show_timeday`, `logobar_show_telemail`, `logobar_show_icons`) VALUES
(1, 'yes', 'no', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `encoded_id` varchar(10) CHARACTER SET utf8mb4 DEFAULT NULL,
  `firstname` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `lastname` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `email_verify_code` varchar(20) CHARACTER SET utf8mb4 DEFAULT NULL,
  `password_verify_code` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(10) CHARACTER SET utf8mb4 DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `encoded_id`, `firstname`, `lastname`, `email`, `email_verified_at`, `password`, `email_verify_code`, `password_verify_code`, `role`, `created`, `updated`) VALUES
(2, '7A==', 'Gabriel', 'Kolbe', 'gkolbe@gmail.com', '2022-03-29 12:33:02', '$2y$10$lYaQvj3LUjU4CwtY2st81.ExZ1GPud0Z9pcJFbxVOwWba/9xQv42C', '2qqmmcco', '', 'admin', '2022-03-29 13:26:17', '2022-03-29 13:26:17'),
(9, '123', 'Colin', 'MacDonald', 'colin@grandc.co.uk', '2022-05-24 21:25:31', '$2y$10$lYaQvj3LUjU4CwtY2st81.ExZ1GPud0Z9pcJFbxVOwWba/9xQv42C', '4rp0hm2e', '7tc4fow', 'admin', '2022-03-30 09:27:18', '2022-03-30 09:27:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `colours`
--
ALTER TABLE `colours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dashboard`
--
ALTER TABLE `dashboard`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `page_features`
--
ALTER TABLE `page_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_sections`
--
ALTER TABLE `page_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `section_features`
--
ALTER TABLE `section_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_parts`
--
ALTER TABLE `section_parts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_types`
--
ALTER TABLE `section_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socialmedia`
--
ALTER TABLE `socialmedia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theme`
--
ALTER TABLE `theme`
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
-- AUTO_INCREMENT for table `colours`
--
ALTER TABLE `colours`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `dashboard`
--
ALTER TABLE `dashboard`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `page_features`
--
ALTER TABLE `page_features`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `page_sections`
--
ALTER TABLE `page_sections`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `section_features`
--
ALTER TABLE `section_features`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `section_parts`
--
ALTER TABLE `section_parts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `section_types`
--
ALTER TABLE `section_types`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `socialmedia`
--
ALTER TABLE `socialmedia`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `theme`
--
ALTER TABLE `theme`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
