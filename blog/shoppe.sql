-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 28, 2021 lúc 04:07 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shoppe`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blog`
--

INSERT INTO `blog` (`id`, `title`, `image`, `description`, `content`, `created_at`, `updated_at`) VALUES
(1, 'iPhone 13 cháy hàng ngay khi Apple mở đặt cọc tại Việt Nam', 'IMG_6958.jpg', 'Sau khi mở đặt cọc, iPhone 13 Pro, iPhone 13 Pro Max phiên bản 128 GB cháy hàng ở nhiều đại lý.', '<p>0h ng&agrave;y 15/9, c&aacute;c đại l&yacute; ch&iacute;nh h&atilde;ng tại Việt Nam đồng loạt mở chương tr&igrave;nh đặt trước iPhone 13 series. Chương tr&igrave;nh đặt cọc k&eacute;o d&agrave;i trong v&ograve;ng 7 ng&agrave;y, theo dự kiến người d&ugrave;ng nhận m&aacute;y v&agrave;o 22/10. Tuy nhi&ecirc;n chỉ sau v&agrave;i giờ, nhiều phi&ecirc;n bản iPhone 13 đ&atilde; hết suất đặt trước tại nh&agrave; b&aacute;n lẻ.</p>\r\n\r\n<p>Ngo&agrave;i ra, d&ugrave; lượng đặt trước cao nhưng đại l&yacute; tỏ ra lo ngại v&igrave; lượng h&agrave;ng Apple cung cấp c&oacute; thể kh&ocirc;ng đủ đ&aacute;p ứng nhu cầu của người d&ugrave;ng trong nước. C&oacute; cửa h&agrave;ng phải hẹn giao m&aacute;y cho kh&aacute;ch v&agrave;o th&aacute;ng 12.</p>\r\n\r\n<h3>Nhu cầu thị trường vượt xa dự đo&aacute;n của nh&agrave; b&aacute;n lẻ</h3>\r\n\r\n<p>Tại Thế Giới Di Động, lượng đăng k&yacute; nhận th&ocirc;ng tin đạt khoảng 40.000, trong đ&oacute; c&oacute; 10.000 kh&aacute;ch cọc. Trước đ&oacute;, đại l&yacute; từng phải tạm dừng chương tr&igrave;nh đặt trước iPhone 13 theo thỏa thuận với ph&iacute;a Apple.</p>\r\n\r\n<p>&ldquo;Năm nay c&aacute;c đại l&yacute; l&agrave;m đ&uacute;ng theo thỏa thuận với Apple, kh&ocirc;ng nhận cọc sớm n&ecirc;n xảy ra hiện tượng qu&aacute; tải trong ng&agrave;y đầu mở đặt trước. Đổi lại, việc trả h&agrave;ng c&oacute; lịch cụ thể, kh&aacute;ch đ&atilde; cọc sẽ được nhận m&aacute;y sớm&rdquo;, &ocirc;ng Phạm Tuấn Anh, đại diện hệ thống ShopDunk chia sẻ.</p>\r\n\r\n<p>Trao đổi với&nbsp;<em>Zing</em>, b&agrave; Ho&agrave;ng T&acirc;m, đại diện Ho&agrave;ng H&agrave; Mobile cho biết lượng truy cập website đại l&yacute; tăng gấp 9 lần, số đặt trước đạt hơn 10.000 m&aacute;y chỉ sau v&agrave;i tiếng. Nhu cầu của kh&aacute;ch h&agrave;ng vượt xa dự đo&aacute;n của cửa h&agrave;ng.</p>\r\n\r\n<p>Đại l&yacute; ghi nhận lượng đặt cọc lớn cho d&ograve;ng iPhone 13.<img alt=\"\" src=\"/storage/blog/ckfinder/images/12421455.jpg\" style=\"height:284px; width:400px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\nTheo đại diện của chuỗi b&aacute;n lẻ CellphoneS, trong v&ograve;ng khoảng 12 giờ kể từ khi mở chương tr&igrave;nh, đại l&yacute; c&oacute; hơn 1.300 đơn đặt trước của kh&aacute;ch h&agrave;ng cho d&ograve;ng sản phẩm iPhone 13. Trang đăng k&yacute; th&ocirc;ng tin của hệ thống Di Động Việt cũng ghi nhận hơn 8.000 kh&aacute;ch đặt h&agrave;ng. Đại l&yacute; n&agrave;y cam kết sẽ đủ h&agrave;ng v&agrave; giao m&aacute;y đ&uacute;ng hạn cho kh&aacute;ch đặt trước.&ldquo;Hiện tại, iPhone 13 128 GB, iPhone 13 Pro/Pro Max 128 v&agrave; 256 GB đều đ&atilde; tạm thời hết suất đặt trước trong đợt mở b&aacute;n đầu ti&ecirc;n. Ch&uacute;ng t&ocirc;i hiện vẫn tiếp tục mở đặt h&agrave;ng cho kh&aacute;ch cho c&aacute;c đợt tiếp theo&rdquo;, b&agrave; Ho&agrave;ng T&acirc;m trả lời&nbsp;<em>Zing.</em></p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute; theo th&ocirc;ng tin tổng hợp từ nh&agrave; b&aacute;n lẻ, model iPhone 13 Pro Max tiếp tục được nhiều kh&aacute;ch h&agrave;ng lựa chọn với hơn 75% tổng số đặt trước. Phi&ecirc;n bản v&agrave;ng v&agrave; xanh l&agrave; c&aacute;c m&agrave;u sắc được người d&ugrave;ng ưa chuộng. Mẫu iPhone 13 mini d&ugrave; c&oacute; nhiều cải tiến nhưng kh&ocirc;ng nhận được sự quan t&acirc;m của kh&aacute;ch h&agrave;ng trong nước.</p>\r\n\r\n<h3>Lượng đặt cao nhưng c&oacute; nhiều lo ngại</h3>\r\n\r\n<p>Theo nguồn tin giấu t&ecirc;n, Apple giảm lượng m&aacute;y cung cấp cho khu vực Đ&ocirc;ng Nam &Aacute; 40%, ri&ecirc;ng Việt Nam khoảng 10%. B&ecirc;n cạnh đ&oacute;, lượng h&agrave;ng x&aacute;ch tay được nhập cũng chỉ bằng 10% c&aacute;c năm trước, kh&ocirc;ng đủ đ&aacute;p ứng nhu cầu của người d&ugrave;ng trong trong nước.</p>\r\n\r\n<p>&quot;Khan h&agrave;ng l&agrave; chuyện sẽ xảy ra. V&igrave; vậy, cửa h&agrave;ng ch&uacute;ng t&ocirc;i vẫn nhận th&ocirc;ng tin của kh&aacute;ch h&agrave;ng v&agrave; b&aacute;n theo thứ tự ưu ti&ecirc;n. Tuy nhi&ecirc;n, cửa h&agrave;ng kh&ocirc;ng nhận cọc để kh&aacute;ch c&oacute; trải nghiệm mua sắm tốt nhất. Bởi nếu nhận cọc, rủi ro thiếu h&agrave;ng sẽ khiến người d&ugrave;ng kh&oacute; chịu&quot;, Minh Tuấn, chủ chuỗi cửa h&agrave;ng Minh Tuấn Mobile cho biết.</p>\r\n\r\n<p>Nh&agrave; b&aacute;n lẻ lo ngại lượng h&agrave;ng iPhone 13 kh&ocirc;ng đủ cung cấp cho thị trường. Ảnh: Huy Nguyễn.</p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;, c&aacute;c đại l&yacute; phải thương lượng với kh&aacute;ch h&agrave;ng về thời gian nhận m&aacute;y v&igrave; nguồn h&agrave;ng đợt đầu kh&ocirc;ng đủ. &ldquo;Ch&uacute;ng t&ocirc;i cũng gặp t&igrave;nh trạng khan h&agrave;ng như c&aacute;c đại l&yacute; kh&aacute;c. Việc giao m&aacute;y đ&uacute;ng hạn sẽ được cố gắng thực hiện. Nhưng thời điểm giao h&agrave;ng c&oacute; thể k&eacute;o d&agrave;i, Ho&agrave;ng H&agrave; Mobile chỉ giữ đơn nếu kh&aacute;ch đồng &yacute; chờ&rdquo;, b&agrave; Ho&agrave;ng T&acirc;m cho biết.V&igrave; thiếu h&agrave;ng, n&ecirc;n c&oacute; thể xảy ra t&igrave;nh trạng đầu cơ, thu gom m&aacute;y số lượng lớn để b&aacute;n kiếm lời trong thời gian tới. Một số đại l&yacute; phải thắt chặt ch&iacute;nh s&aacute;ch, y&ecirc;u cầu kh&aacute;ch h&agrave;ng b&oacute;c hộp, k&iacute;ch hoạt bảo h&agrave;nh sau khi nhận m&aacute;y để hạn chế t&igrave;nh trạng n&agrave;y. Hiện tại, gi&aacute; m&aacute;y iPhone 13 tr&ecirc;n thị trường vẫn đang ch&ecirc;nh 4-10 triệu đồng so với gi&aacute; ni&ecirc;m yết ch&iacute;nh h&atilde;ng.</p>\r\n\r\n<p>&Ocirc;ng Phạm Tuấn Anh dự đo&aacute;n lượng m&aacute;y iPhone 13 sẽ kh&ocirc;ng thể đủ cung cấp cho thị trường trong thời gian đầu mở b&aacute;n. C&aacute;c mẫu iPhone 13 Pro/Pro Max 128 GB sẽ phải chờ sang th&aacute;ng 11.</p>\r\n\r\n<p>Theo c&ocirc;ng bố từ đại l&yacute;, iPhone 13 series ch&iacute;nh h&atilde;ng sẽ được mở b&aacute;n v&agrave;o ng&agrave;y 22/10. Tuy nhi&ecirc;n v&igrave; thiếu h&agrave;ng, một số nh&agrave; b&aacute;n lẻ hẹn giao m&aacute;y cho kh&aacute;ch đặt trước v&agrave;o đầu th&aacute;ng 12.</p>', '2021-10-15 06:25:46', '2021-10-15 06:25:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Nike', NULL, NULL),
(2, 'Adidas', NULL, NULL),
(3, 'Puma', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Mens', NULL, NULL),
(2, 'WOMENS', NULL, NULL),
(3, 'KIDS', NULL, NULL),
(4, 'BAGS', NULL, NULL),
(5, 'SHOES', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `blog_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `blog_id`, `parent_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 'demo 123', '2021-10-15 06:26:27', '2021-10-15 06:26:27'),
(2, 1, 1, 1, 'hi anh', '2021-10-18 05:13:32', '2021-10-18 05:13:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `country`
--

CREATE TABLE `country` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `country`
--

INSERT INTO `country` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Việt Nam', '2021-10-15 05:58:04', '2021-10-15 05:58:04'),
(2, 'Thailand', '2021-10-15 05:58:12', '2021-10-15 05:58:12'),
(3, 'Singapore', '2021-10-15 05:58:19', '2021-10-15 05:58:19'),
(4, 'Hong Kong', '2021-10-15 05:58:28', '2021-10-15 05:58:28'),
(5, 'Campuchia', '2021-10-15 05:58:48', '2021-10-15 05:58:48'),
(6, 'Laos', '2021-10-15 05:58:59', '2021-10-15 05:58:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_09_10_123548_create_demo_table', 1),
(5, '2021_09_10_125818_create_user_demo_table', 1),
(6, '2021_09_10_130407_update_user_id_table', 1),
(7, '2021_09_10_134814_update_demo_table', 1),
(8, '2021_09_13_125638_create_qlct_table', 1),
(9, '2021_09_21_141515_update_users', 1),
(10, '2021_09_24_083635_create_country_table', 1),
(11, '2021_09_24_143001_create_table_blog', 1),
(12, '2021_09_28_142617_update_table_users', 1),
(13, '2021_10_04_023119_create_table_rate', 1),
(14, '2021_10_05_141042_create_table_comment', 1),
(15, '2021_10_08_132137_create_table__category', 1),
(16, '2021_10_08_132351_create_table_brand', 1),
(17, '2021_10_08_140727_create_table_product', 1),
(18, '2021_10_11_090446_update_table_product', 1),
(19, '2021_10_27_120932_create_sessions_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `brand_id` bigint(20) NOT NULL,
  `new` int(11) NOT NULL,
  `sale` int(11) DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `user_id`, `category_id`, `brand_id`, `new`, `sale`, `company`, `image`, `detail`, `created_at`, `updated_at`) VALUES
(1, 'Huỳnh Quang Hào', 20000, 1, 1, 1, 1, 20, 'Demo', '[\"161545_26102021_244559286_403249011472605_1497506918140206109_n.jpg\",\"161545_26102021_243019934_402443674886472_8955743162402164263_n.jpg\"]', '123', '2021-10-15 06:15:19', '2021-10-26 09:15:45'),
(2, 'Áo balo', 20000, 1, 1, 1, 0, NULL, '2345', '[\"205217_25102021_12421455.jpg\",\"205217_25102021_242211658_1608173419575685_200993525535158452_n.jpg\",\"205217_25102021_2.jpg\"]', '123', '2021-10-15 06:38:37', '2021-10-25 13:52:18'),
(3, 'Quần tây', 15000, 1, 1, 1, 0, NULL, 'Demo', '[\"230550_27102021_244559286_403249011472605_1497506918140206109_n.jpg\",\"230747_27102021_243019934_402443674886472_8955743162402164263_n.jpg\"]', '123', '2021-10-15 08:55:51', '2021-10-27 16:07:47'),
(4, 'Áo khoác', 15000, 1, 2, 2, 1, 21, 'Demo', '[\"205125_25102021_244559286_403249011472605_1497506918140206109_n.jpg\",\"205125_25102021_243019934_402443674886472_8955743162402164263_n.jpg\",\"205125_25102021_IMG_20210601_091601 (1).jpg\"]', '123', '2021-10-15 08:56:24', '2021-10-25 13:51:27'),
(5, 'Áo mưa', 22000, 1, 4, 3, 1, 20, 'Demo123', '[\"205051_25102021_IMG_6958.jpg\",\"205051_25102021_teqq.jpg\",\"205051_25102021_244559286_403249011472605_1497506918140206109_n.jpg\"]', 'Demo', '2021-10-15 08:56:58', '2021-10-25 13:50:52'),
(10, 'Áo  Hoodie', 150000, 1, 1, 1, 0, NULL, '123', '[\"200651_25102021_2.jpg\",\"201551_25102021_242211658_1608173419575685_200993525535158452_n.jpg\"]', '123', '2021-10-25 13:06:52', '2021-10-25 13:38:14'),
(11, 'demo123', 20000, 2, 1, 1, 0, NULL, 'Demo', '[\"163526_26102021_teqq.jpg\",\"163526_26102021_243019934_402443674886472_8955743162402164263_n.jpg\",\"163732_26102021_unnamed.png\"]', '123', '2021-10-26 09:35:27', '2021-10-26 09:40:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rate`
--

CREATE TABLE `rate` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rate` int(11) NOT NULL,
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rate`
--

INSERT INTO `rate` (`id`, `rate`, `blog_id`, `user_id`, `created_at`, `updated_at`) VALUES
(15, 5, 1, 1, '2021-10-15 06:30:34', '2021-10-15 06:30:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1:admin 0:member',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `address`, `country`, `avatar`, `remember_token`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Huỳnh Quang Hào', 'huynhquanghao98@gmail.com', NULL, '$2y$10$jLRSEC4yYw2nfHdh6muQbuiCG9kL4uru55DVrwsYiziAHvPIbQzES', '(+84) 794981602', 'To 17, Thon Trung Chau', 1, '242211658_1608173419575685_200993525535158452_n.jpg', NULL, 0, '2021-10-15 05:55:50', '2021-10-15 05:59:15'),
(2, 'Trần Thị Bảo Nhi', 'baonhi123@gmail.com', NULL, '$2y$10$.q8schbH/jlIXfhhNaATqOdKHSNgx2kVWJxjKSpVqvRWSQX/835gu', NULL, NULL, NULL, NULL, NULL, 0, '2021-10-25 05:55:53', '2021-10-25 05:55:53');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rate_users_id_foreign` (`user_id`),
  ADD KEY `rate_blog_id_foreign` (`blog_id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `country`
--
ALTER TABLE `country`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `rate`
--
ALTER TABLE `rate`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `rate_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`),
  ADD CONSTRAINT `rate_users_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
