-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 04, 2023 at 10:48 AM
-- Server version: 10.5.19-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u746845997_dilselaravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pagesuuid` char(36) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_slug` varchar(255) NOT NULL,
  `page_content` longtext NOT NULL,
  `page_meta_title` varchar(255) NOT NULL,
  `page_meta_description` longtext NOT NULL,
  `status` enum('none','active','inactive') NOT NULL DEFAULT 'none',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `pagesuuid`, `page_title`, `page_slug`, `page_content`, `page_meta_title`, `page_meta_description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'S04fLTsfIB', 'Dilse Foundation and Donation Testing', 'dilse-foundation-and-donation-testing', '<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"&nbsp;&nbsp;&nbsp;Testing&nbsp;Testing&nbsp;Testing&nbsp;Testing&nbsp;Testing</p><div><br></div><p></p><div style=\"margin: 0px 28.7847px 0px 14.3924px; padding: 0px; width: 436.788px; text-align: left; float: right; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"></div><p></p>', 'Dilse Foundation and Donation Testing', 'Dilse Foundation and Donation Testing', 'active', '2023-08-03 05:28:42', '2023-08-04 10:39:26', NULL),
(2, '979ojwTbqf', 'Privacy and Policy Test', 'privacy-and-policy-test', '<p>This Privacy Policy explains how Dilse (\"we\", \"our\", or \"us\") collects, uses, and protects your personal information when you use our website. By accessing or using our website, you agree to the practices described in this Privacy Policy.&nbsp;&nbsp;&nbsp;Test&nbsp;Test&nbsp;Test&nbsp;Test</p>\n\n    <h2>1. Information We Collect</h2>\n    <p>We may collect the following types of personal information from you:</p>\n    <ul>\n        <li>Your name, email address, and contact information when you create an account or place an order.</li>\n        <li>Information about your orders, including delivery addresses and payment details.</li>\n        <li>Information you provide when contacting our customer support.</li>\n        <li>Usage data, such as IP address, browser type, operating system, and pages visited, collected automatically when you use our website.</li>\n    </ul>\n\n    <h2>2. How We Use Your Information</h2>\n    <p>We use your personal information for the following purposes:</p>\n    <ul>\n        <li>To process and fulfill your food orders.</li>\n        <li>To communicate with you regarding your orders or other inquiries.</li>\n        <li>To improve and customize your experience on our website.</li>\n        <li>To send promotional offers, newsletters, or marketing communications if you opt-in to receive them.</li>\n        <li>To comply with legal obligations or protect our rights and interests.</li>\n    </ul>\n\n    <h2>3. Data Security</h2>\n    <p>We implement reasonable security measures to protect your personal information from unauthorized access, disclosure, or alteration. However, please understand that no data transmission over the internet or storage method can guarantee 100% security.</p>\n\n    <h2>4. Third-Party Services</h2>\n    <p>We may use third-party services to assist us in operating our website or provide certain features. These third-party services may have their own privacy policies governing the use of your information.</p>\n\n    <h2>5. Cookies and Tracking Technologies</h2>\n    <p>We use cookies and similar tracking technologies to enhance your experience on our website. Cookies are small data files that are stored on your device. You may modify your browser settings to reject cookies or notify you when they are being used.</p>\n\n    <h2>6. Children\'s Privacy</h2>\n    <p>Our website is not intended for children under 5. We do not knowingly collect personal information from children under this age. If you believe we have inadvertently collected personal information from a child, please contact us to have it removed.</p>\n\n    <h2>7. Changes to this Privacy Policy</h2>\n    <p>We reserve the right to modify or update this Privacy Policy at any time. Any changes will be effective upon posting on the website. Please review this Privacy Policy regularly to stay informed of any updates.</p>\n\n    <h2>8. Contact Us</h2>\n    <p>If you have any questions or concerns regarding this Privacy Policy, please contact us at:</p>\n    <p>Dilse</p>\n    <p>335 Roncesvalles AveToronto, ON M6R – 2M8</p>\n    <p>416-532-4141,416-534-6344</p>', 'Privacy Policy Test', 'Privacy Policy Test', 'active', '2023-08-03 05:28:59', '2023-08-04 10:46:14', NULL),
(3, 'fXuheNHnrJ', 'Term and Conditions', 'terms-and-conditions', '<h2>1. Introduction</h2>\r\n    <p>Welcome to Dil Se. These terms and conditions govern your use of our website and services. By accessing or using our website, you agree to be bound by these terms and our Privacy Policy. If you do not agree with any part of these terms, please refrain from using our website.</p>\r\n\r\n    <h2>2. Use of the Website</h2>\r\n    <ul>\r\n        <li>The website provides an online platform for users to order food from various restaurants and food providers.</li>\r\n        <li>You must be at least [age limit] years old to use our services. By using the website, you confirm that you meet this requirement.</li>\r\n        <li>You are responsible for maintaining the confidentiality of your account information and password. Any activity that occurs under your account is your responsibility.</li>\r\n        <li>You agree not to use the website for any unlawful purpose or in violation of these terms.</li>\r\n    </ul>\r\n\r\n    <h2>3. Ordering and Payment</h2>\r\n    <ul>\r\n        <li>By placing an order through our website, you agree to pay the total amount specified in the order, including applicable taxes and delivery fees.</li>\r\n        <li>We accept various payment methods, and you agree to provide accurate payment information for your orders.</li>\r\n        <li>Once an order is placed and confirmed, it cannot be canceled or modified without the consent of [Your Company Name].</li>\r\n    </ul>\r\n\r\n    <h2>4. Delivery and Refunds</h2>\r\n    <ul>\r\n        <li>Delivery times are estimated and may vary based on factors beyond our control. We will make reasonable efforts to deliver orders promptly.</li>\r\n        <li>In the event of any issues with your order, please contact our customer support within a reasonable time for assistance.</li>\r\n        <li>Refunds may be issued at our discretion, subject to our Refund Policy.</li>\r\n    </ul>\r\n\r\n    <h2>5. User Conduct</h2>\r\n    <ul>\r\n        <li>You agree not to use our website for any unlawful or abusive purposes, including but not limited to fraud, harassment, or unauthorized access.</li>\r\n        <li>You agree not to upload, post, or transmit any content that is offensive, defamatory, or violates any third-party rights.</li>\r\n    </ul>\r\n\r\n    <h2>6. Intellectual Property</h2>\r\n    <p>All content on our website, including text, graphics, logos, images, and software, is the property of [Your Company Name] or its licensors and is protected by intellectual property laws. You may not use, reproduce, or distribute any content from our website without our prior written permission.</p>\r\n\r\n    <h2>7. Disclaimer of Warranty</h2>\r\n    <p>We strive to provide accurate and up-to-date information on our website. However, we make no warranties or representations about the accuracy, reliability, or completeness of any information on the website. Your use of the website is at your own risk. We disclaim all warranties, express or implied, including but not limited to warranties of merchantability, fitness for a particular purpose, and non-infringement.</p>\r\n\r\n    <h2>8. Limitation of Liability</h2>\r\n    <p>[Your Company Name] shall not be liable for any indirect, incidental, consequential, or punitive damages arising out of your use of the website or any products or services obtained through the website.</p>\r\n\r\n    <h2>9. Changes to Terms</h2>\r\n    <p>We reserve the right to modify or update these terms at any time. Any changes will be effective upon posting on the website. Please review these terms regularly to stay informed of any updates.</p>\r\n\r\n    <h2>10. Governing Law and Jurisdiction</h2>\r\n    <p>These terms and your use of the website shall be governed by and construed in accordance with the laws of [Your Country/State/Region]. Any disputes arising from these terms or your use of the website shall be subject to the exclusive jurisdiction of the courts in [Your City/Region].</p>\r\n\r\n    <p>By using our website, you acknowledge that you have read, understood, and agreed to these terms and conditions.</p>\r\n\r\n    <p>Date of last update: 04-05-2021</p>\r\n\r\n    <p>Dilse</p>\r\n    <p>335 Roncesvalles AveToronto, ON M6R – 2M8</p>\r\n    <p>416-532-4141,416-534-6344</p>', 'Term and Condition', 'Term and Condition', 'active', '2023-08-03 05:29:38', '2023-08-04 06:53:00', NULL),
(4, 'To7iRMazLc', 'Testing', 'testing', '<p>testing<br></p>', 'testing', 'testing', 'active', '2023-08-04 10:23:41', '2023-08-04 10:27:33', '2023-08-04 10:27:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
