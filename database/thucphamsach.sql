-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 27, 2023 lúc 04:10 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `thucphamsach`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `log_login` text DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `phone`, `log_login`, `class`, `address`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Thành Trung', 'admin@gmail.com', '$2y$10$7VLRCZIgkY4I3Vfg7edih.MEBBc..kbS3SM4B8l6mxJLOst5bcpK.', '0989275330', NULL, 'CDTH18', '525A Điên Biên Phủ, Phường 25 Bình Thạnh TP HCM', '2023-05-26__avatar5.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `a_name` varchar(255) NOT NULL,
  `a_slug` varchar(255) NOT NULL,
  `a_hot` tinyint(4) NOT NULL DEFAULT 0,
  `a_active` tinyint(4) NOT NULL DEFAULT 1,
  `a_menu_id` int(11) NOT NULL DEFAULT 0,
  `a_view` int(11) NOT NULL DEFAULT 0,
  `a_description` mediumtext DEFAULT NULL,
  `a_avatar` varchar(255) DEFAULT NULL,
  `a_content` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `a_position_2` tinyint(4) NOT NULL DEFAULT 0,
  `a_position_1` tinyint(4) NOT NULL DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `articles`
--

INSERT INTO `articles` (`id`, `a_name`, `a_slug`, `a_hot`, `a_active`, `a_menu_id`, `a_view`, `a_description`, `a_avatar`, `a_content`, `created_at`, `a_position_2`, `a_position_1`, `updated_at`) VALUES
(1, 'CÁCH LÀM CÁ BỐNG KHO THỊT BA CHỈ', 'cach-lam-ca-bong-kho-thit-ba-chi', 1, 1, 1, 0, 'Cá bống kho thịt ba chỉ là món ăn dân dã mang đậm bản sắc dân tộc Việt Nam. Từng con cá bống nhỏ nhắn nhưng chắc thịt được bao phủ bởi nước kho đậm đà màu cánh gián, vị cay the của ớt và tiêu hoà trộn vào nước kho rất bắt cơm, ăn bao nhiêu cũng không biết ngán.', '2020-11-21__1.jpg', '<h1>Nguy&ecirc;n liệu</h1>\r\n\r\n<ul>\r\n	<li>\r\n	<h4>C&aacute; bống m&uacute; Ph&uacute; Quốc - 500g</h4>\r\n	</li>\r\n	<li>\r\n	<h4>Thịt ba rọi hữu cơ 500g</h4>\r\n	</li>\r\n	<li>\r\n	<h4>Nước dừa organic đ&oacute;ng hộp Vietcoco</h4>\r\n	</li>\r\n	<li>\r\n	<h4>H&agrave;nh l&aacute; hữu cơ - 100g</h4>\r\n	</li>\r\n	<li>\r\n	<h4>H&agrave;nh T&iacute;m Hữu Cơ - 500g 500gram</h4>\r\n	</li>\r\n	<li>\r\n	<h4>Đường Củ Cải Hữu Cơ Naturata 500g</h4>\r\n	</li>\r\n	<li>\r\n	<h4>Hạt N&ecirc;m Hữu Cơ Rau Củ Alce Nero</h4>\r\n	</li>\r\n	<li>\r\n	<h4>Muối Iot Tự Nhi&ecirc;n Hain 737g</h4>\r\n	</li>\r\n	<li>\r\n	<h4>Ti&ecirc;u Sọ Hữu Cơ Farmer&#39;s Organic 50g</h4>\r\n	</li>\r\n	<li>\r\n	<h4>Nước mắm Ph&uacute; Quốc nh&atilde;n hiệu Quốc Hương loại 750ML</h4>\r\n	</li>\r\n	<li>\r\n	<h4>Ớt hiểm hữu cơ - 100g</h4>\r\n	</li>\r\n</ul>\r\n\r\n<h2>C&aacute;c bước thực hiện</h2>', '2020-11-20 16:44:50', 1, 1, '2020-11-21 04:13:55'),
(4, 'Bà Nội Mách 5 Cách Kho Cá Trắm Ngon Mềm “Bất Bại', 'ba-noi-mach-5-cach-kho-ca-tram-ngon-mem-bat-bai', 0, 1, 3, 0, 'KHO CA NGON', '2022-01-07__6.jpg', '<p>C&aacute; trắm kho riềng<br />\r\nC&aacute; trắm kho riềng l&agrave; m&oacute;n ăn đặc trưng của người miền Bắc. Riềng l&agrave; gia vị c&oacute; t&iacute;nh ấm n&oacute;ng, kh&ocirc;ng chỉ gi&uacute;p khử tanh c&aacute; m&agrave; c&ograve;n tốt cho hệ ti&ecirc;u h&oacute;a, gi&uacute;p điều trị c&aacute;c chứng kh&oacute; ti&ecirc;u. C&aacute;ch kho c&aacute; trắm với riềng cũng đơn giản như bao m&oacute;n c&aacute; kho kh&aacute;c. Sự kết hợp nguy&ecirc;n liệu đơn giản, kh&ocirc;ng cầu k&igrave; trong chế biến, ấy vậy m&agrave; hương vị hấp dẫn v&ocirc; c&ugrave;ng.</p>\r\n\r\n<p>c&aacute;ch l&agrave;m c&aacute; trắm kho riềng</p>\r\n\r\n<p>&nbsp;<br />\r\nNguy&ecirc;n liệu</p>\r\n\r\n<p>+ C&aacute; trắm đen: 1,5kg<br />\r\n+ Thịt ba chỉ: 500g<br />\r\n+ Riềng: 1 củ to<br />\r\n+ Sả: 3 c&acirc;y<br />\r\n+ H&agrave;nh t&iacute;m: 3 củ<br />\r\n+ Ớt: 3-4 quả t&ugrave;y khả năng ăn cay<br />\r\n+ Ti&ecirc;u xanh: v&agrave;i nh&aacute;nh<br />\r\n+ Nước mắm ngon: 2 th&igrave;a<br />\r\n+ Dầu h&agrave;o: 2 th&igrave;a<br />\r\n+ Nước tương: 2 th&igrave;a<br />\r\n+ Bột n&ecirc;m: 1 th&igrave;a<br />\r\n+ Bột canh: 1 th&igrave;a<br />\r\n+ Đường: 3 th&igrave;a</p>\r\n\r\n<p>nguy&ecirc;n liệu l&agrave;m c&aacute; trắm kho riềng</p>\r\n\r\n<p>&nbsp;<br />\r\nThực hiện</p>\r\n\r\n<p>Bước 1: Sơ chế nguy&ecirc;n liệu</p>\r\n\r\n<p>&ndash; C&aacute; trắm ngon nhất l&agrave; sử dụng c&aacute; trắm đen. C&aacute; trắm đen c&oacute; gi&aacute; th&agrave;nh cao hơn trắm cỏ hay trắm hoa nhưng thịt c&aacute; chắc, thơm ngọt v&agrave; nhiều dinh dưỡng hơn. Con c&aacute; trắm đen k&iacute;ch thước kh&aacute; lớn, c&oacute; thể l&ecirc;n đến 7-10kg/con. Bạn n&ecirc;n chọn mua kh&uacute;c c&aacute; giữa sẽ ngon v&agrave; vừa ăn hơn.</p>\r\n\r\n<p><img src=\"/ckfinder/userfiles/images/1.jpg\" style=\"height:680px; width:1020px\" /></p>\r\n\r\n<p>&ndash; C&aacute; đem rửa sạch với nước muối lo&atilde;ng, cạo sạch m&agrave;ng đen b&ecirc;n trong bởi n&oacute; l&agrave; nguy&ecirc;n nh&acirc;n g&acirc;y ra m&ugrave;i tanh. Sau đ&oacute; rửa lại cho sạch rồi để r&aacute;o nước.<br />\r\n&ndash; Thịt ba chỉ rửa sạch, để r&aacute;o nước rồi th&aacute;i th&agrave;nh miếng vu&ocirc;ng vừa ăn.<br />\r\n&ndash; Riềng cạo sạch vỏ, một nửa đem th&aacute;i l&aacute;t mỏng, một nửa cho v&agrave;o m&aacute;y xay nhỏ<br />\r\n&ndash; Sả đập dập rồi cắt kh&uacute;c<br />\r\n&ndash; Ớt để nguy&ecirc;n quả hoặc th&aacute;i l&aacute;t<br />\r\n&ndash; H&agrave;nh t&iacute;m th&aacute;i l&aacute;t</p>\r\n\r\n<p>Bước 2: Thắng nước h&agrave;ng</p>\r\n\r\n<p>Cho 3 th&igrave;a đường v&agrave; khoảng 3 th&igrave;a nước v&agrave;o chảo. Đun tr&ecirc;n lửa nhỏ cho đường tan chảy từ từ. Lưu &yacute; kh&ocirc;ng được d&ugrave;ng đũa khuấy sẽ l&agrave;m đường bị kết tinh lại. Chỉ lắc nhẹ chảo cho đường tan hết. Đến khi đường ch&aacute;y c&oacute; m&agrave;u n&acirc;u c&aacute;nh gi&aacute;n đẹp mắt th&igrave; th&ecirc;m 1 th&igrave;a nước v&agrave;o khuấy đều l&agrave; được.</p>\r\n\r\n<p>Bước 3: Kho c&aacute; trắm với riềng</p>\r\n\r\n<p>&ndash; Sử dụng nồi đất, nồi s&agrave;nh, nồi gang hoặc một c&aacute;i nồi inox đế d&agrave;y. Xếp riềng v&agrave; sả xuống dưới đ&aacute;y nồi.<br />\r\n&ndash; Xếp c&aacute; trắm v&agrave; thịt ba chỉ v&agrave;o xen kẽ nhau. Cho tất cả gia vị v&agrave; nguy&ecirc;n liệu c&ograve;n lại v&agrave;o</p>\r\n\r\n<p>ướp c&aacute; trắm kho riềng</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&ndash; Đổ nước lọc hoặc nước đun s&ocirc;i v&agrave;o, xăm xắp mặt c&aacute;. Đặt l&ecirc;n bếp đun s&ocirc;i th&igrave; hạ nhỏ lửa. Kho c&aacute; liu riu lửa &iacute;t nhất 60 ph&uacute;t<br />\r\n&ndash; C&aacute; kho ngon nhất l&agrave; kho 2 lửa. Tức l&agrave; kho lần 1 cho gần cạn hết nước th&igrave; tắt bếp, để nguội rồi kho tiếp lần 2. L&uacute;c n&agrave;y bạn c&oacute; thể điều chỉnh m&agrave;u c&aacute; kho đẹp như &yacute; bằng c&aacute;ch chế th&ecirc;m nước h&agrave;ng v&agrave;o nh&eacute;. Kho c&aacute; lần 2 th&ecirc;m 30 ph&uacute;t l&agrave; được.</p>\r\n\r\n<p>c&aacute; trắm đen kho riềng</p>\r\n\r\n<p>&nbsp;<br />\r\nC&aacute; trắm kho riềng th&agrave;nh phẩm c&oacute; m&agrave;u n&acirc;u &oacute;ng đẹp mắt. Miếng c&aacute; b&ecirc;n ngo&agrave;i nh&iacute;n b&oacute;ng, b&eacute;o đậm đ&agrave;. Thịt c&aacute; mềm nhừ, xương cũng được kho mềm rục, c&aacute; kh&ocirc;ng hề bị kh&ocirc;. Gắp một miếng c&aacute;, miếng thịt ba chỉ rồi ăn c&ugrave;ng cơm trắng th&igrave; đ&aacute;nh bay cả nồi cơm.</p>\r\n\r\n<p>C&aacute; trắm kho dưa<br />\r\nNguy&ecirc;n liệu</p>\r\n\r\n<p>+ C&aacute; trắm: 1,5kg<br />\r\n+ Thịt ba chỉ: 500g<br />\r\n+ Dưa cải chua: 500g<br />\r\n+ H&agrave;nh t&iacute;m: 5 củ<br />\r\n+ Sả: 4 c&acirc;y<br />\r\n+ Nước m&agrave;u: 3 th&igrave;a<br />\r\n+ Ớt cay: 3 quả<br />\r\n+ Gia vị: nước mắm, dầu h&agrave;o, nước tương, bột n&ecirc;m,&hellip;</p>\r\n\r\n<p>nguy&ecirc;n liệu l&agrave;m c&aacute; trắm kho dưa</p>\r\n\r\n<p>&nbsp;<br />\r\nThực hiện</p>\r\n\r\n<p>&ndash; C&aacute; trắm rửa sạch, cạo hết m&agrave;ng đen b&ecirc;n trong. Sau đ&oacute; cắt kh&uacute;c d&agrave;y vừa ăn rồi để r&aacute;o nước<br />\r\n&ndash; Thịt ba chỉ rửa sạch, th&aacute;i miếng vu&ocirc;ng khoảng bằng nửa bao di&ecirc;m<br />\r\n&ndash; Dưa cải rửa cho bớt vị mặn.<br />\r\n&ndash; H&agrave;nh t&iacute;m rửa sạch, bạn c&oacute; thể để cả vỏ h&agrave;nh kh&ocirc;, ch&uacute;ng vừa tạo m&agrave;u đẹp mắt cho c&aacute; vừa c&oacute; m&ugrave;i thơm đặc biệt<br />\r\n&ndash; Sả đập dập, cắt kh&uacute;c.<br />\r\n&ndash; Xếp sả v&agrave;o xuống đ&aacute;y nồi. Xếp tiếp một lượt c&aacute;, xen kẽ với thịt, đến một lượt dưa rồi lại tiếp lượt c&aacute;, lượt dưa. Cho nốt h&agrave;nh t&iacute;m, ớt cay l&ecirc;n tr&ecirc;n</p>\r\n\r\n<p>l&agrave;m c&aacute; trắm kho dưa</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&ndash; Cho 2 th&igrave;a dầu h&agrave;o, 3 th&igrave;a nước mắm ngon, 2 th&igrave;a nước tương, 1 th&igrave;a bột n&ecirc;m, 3 th&igrave;a nước m&agrave;u, 300ml nước v&agrave;o chảo đun s&ocirc;i. Khuấy nhẹ cho nguy&ecirc;n liệu tan hết. Sau đ&oacute; đổ nước kho n&agrave;y v&agrave;o nồi c&aacute;.<br />\r\n&ndash; Kho c&aacute; cho s&ocirc;i b&ugrave;ng khoảng 5 ph&uacute;t th&igrave; hạ nhỏ lửa liu riu. Kho &iacute;t nhất 2 giờ đến khi cạn nước, c&aacute; mềm rục l&agrave; được.</p>\r\n\r\n<p>c&aacute; trắm kho dưa</p>\r\n\r\n<p>&nbsp;<br />\r\nC&aacute; trắm kho tr&aacute;m<br />\r\nMột c&aacute;ch kho c&aacute; trắm ngon nổi tiếng của người v&ugrave;ng cao miền Bắc, đ&oacute; l&agrave; kho c&aacute; với quả tr&aacute;m. Quả tr&aacute;m c&oacute; 2 loại l&agrave; tr&aacute;m đen v&agrave; tr&aacute;m trắng. &Iacute;t ai nghĩ rằng, thứ quả nhọn nhọn, đen x&igrave; n&agrave;y lại được chị em nội trợ đua nhau mua nhiều đến vậy, mặc d&ugrave; gi&aacute; kh&aacute; cao. Thừng khi v&agrave;o m&ugrave;a, người ta mua cả v&agrave;i c&acirc;n tr&aacute;m về để d&agrave;nh ăn dần. Tr&aacute;m d&ugrave;ng kho thịt, kho c&aacute;, đồ x&ocirc;i, ng&acirc;m muối,&hellip;. đều rất ngon.</p>\r\n\r\n<p>quả tr&aacute;m</p>\r\n\r\n<p>&nbsp;<br />\r\nC&aacute; trắm kho tr&aacute;m c&oacute; một hương vị rất lạ m&agrave; ai từng nếm thử sẽ nhớ m&atilde;i kh&ocirc;ng qu&ecirc;n. Tr&aacute;m c&oacute; đủ c&aacute;c vị, hơi chua chua, ch&aacute;t ch&aacute;t, b&ugrave;i, ngậy quện v&agrave;o thịt c&aacute; v&agrave; thịt ba chỉ, mang đến m&oacute;n ăn hấp dẫn.</p>\r\n\r\n<p>Quả tr&aacute;m mua về sẽ được kh&iacute;a tr&ograve;n rồi ng&acirc;m v&agrave;o nước muối 20 ph&uacute;t cho ra bớt vị ch&aacute;t. Sau đ&oacute;, trần qua nước s&ocirc;i, tắt bếp, đậy vung om 20 ph&uacute;t để t&aacute;ch hạt ra dễ d&agrave;ng. D&ugrave;ng con dao nhọn, t&aacute;ch đ&ocirc;i quả tr&aacute;m, bỏ hạt.</p>\r\n\r\n<p>l&agrave;m c&aacute; trắm kho tr&aacute;m</p>\r\n\r\n<p>&nbsp;<br />\r\nC&aacute; trắm được sơ chế sạch, xếp v&agrave;o nồi c&ugrave;ng với tr&aacute;m. Dưới đ&aacute;y nồi xếp một lớp riềng th&aacute;i l&aacute;t v&agrave; v&agrave;i l&aacute; ch&egrave; xanh. C&aacute;, thịt ba chỉ v&agrave; tr&aacute;m xếp xen kẽ nhau. N&ecirc;m gia vị gồm nước mắm ngon, dầu h&agrave;o, nước m&agrave;u, bột n&ecirc;m, ớt tươi. Đổ ngập nước rồi kho nhỏ lửa cho đến khi mềm nhừ.</p>\r\n\r\n<p>c&aacute; trắm kho tr&aacute;m</p>\r\n\r\n<p>&nbsp;<br />\r\nC&aacute; trắm kho l&aacute; chanh th&aacute;i<br />\r\nBạn đ&atilde; bao giờ kho c&aacute; trắm với l&aacute; chanh th&aacute;i chưa? L&aacute; chanh Th&aacute;i hay c&ograve;n c&oacute; t&ecirc;n l&agrave; l&aacute; Kaffir lime, một loại c&acirc;y gia vị c&ugrave;ng họ với chanh rất nổi tiếng ở v&ugrave;ng Bảy N&uacute;i An Giang. L&aacute; chanh Th&aacute;i vị the như chanh ta nhưng thơm hơn, m&ugrave;i gắt hơn, nồng hơn. L&aacute; non được d&ugrave;ng cho c&aacute;c m&oacute;n salad, c&ograve;n l&aacute; b&aacute;nh tẻ v&agrave; l&aacute; gi&agrave; d&ugrave;ng chế biến c&aacute;c m&oacute;n c&aacute; hấp, c&aacute; kho, lẩu Th&aacute;i, sốt ướp thịt,&hellip; L&aacute; chanh Th&aacute;i kho c&aacute;, kh&ocirc;ng chỉ c&oacute; t&aacute;c dụng khử tanh hiệu quả m&agrave; n&oacute; mang đến một hương vị rất đặc biệt, kh&ocirc;ng thể diễn tả bằng lời. C&aacute; kho thơm nức, chỉ cần nh&igrave;n th&ocirc;i đ&atilde; muốn thưởng thức ngay lập tức.</p>\r\n\r\n<p>c&aacute; trắm kho l&aacute; chanh Th&aacute;i</p>\r\n\r\n<p>&nbsp;<br />\r\n(Tham khảo: FB Th&acirc;n Hồng Nam)</p>\r\n\r\n<p>Nguy&ecirc;n liệu chuẩn bị</p>\r\n\r\n<p>+ C&aacute; trắm đen: 2kg.<br />\r\n+ H&agrave;nh t&iacute;m: 5 củ<br />\r\n+ Sả: 10 c&acirc;y<br />\r\n+ Riềng: 1 củ<br />\r\n+ Gừng:1. củ nhỏ<br />\r\n+ Thịt ba chỉ: 400g<br />\r\n+ Ớt cay: 3 quả<br />\r\n+ Ớt bột: 1 th&igrave;a<br />\r\n+ Ti&ecirc;u xanh: 1 nắm hoặc sử dụng ti&ecirc;u đen nguy&ecirc;n hạt<br />\r\n+ Hạt dổi: 5 hạt (kh&ocirc;ng bắt buộc)<br />\r\n+ L&aacute; chanh Th&aacute;i: 10 l&aacute;<br />\r\n+ Tỏi: 5 t&eacute;p<br />\r\n+ Nước mắm độ đạm cao: 100g<br />\r\n+ Sốt Teriyaki: 1 th&igrave;a<br />\r\n+ Đường ph&egrave;n: 1 th&igrave;a<br />\r\n+ Nước h&agrave;ng: 3 th&igrave;a<br />\r\n+ Sa tế: 1 th&igrave;a<br />\r\n+ Nước cốt dừa: 4 th&igrave;a<br />\r\n+ Bột n&ecirc;m: 1 th&igrave;a<br />\r\n+ Bột canh: 1 th&igrave;a</p>\r\n\r\n<p>L&agrave;m c&aacute; trắm kho l&aacute; chanh Th&aacute;i</p>\r\n\r\n<p>Bước 1: Sơ chế nguy&ecirc;n liệu</p>\r\n\r\n<p>&ndash; C&aacute; trắm chọn mua kh&uacute;c giữa. Chọn c&aacute; trắm đen, con c&agrave;ng to th&igrave; c&agrave;ng ngon. Cắt c&aacute; th&agrave;nh từng khoanh d&agrave;y khoảng 3cm, nếu to c&oacute; thể chẻ đ&ocirc;i theo đường xương sống nh&eacute;. Rửa c&aacute; với nước muối lo&atilde;ng, cạo hết m&agrave;ng đen b&ecirc;n trong để khử m&ugrave;i tanh. Sau đ&oacute; để c&aacute; r&aacute;o nước.<br />\r\n&ndash; Thịt ba chỉ rửa với nước muối lo&atilde;ng để khử m&ugrave;i h&ocirc;i. Th&aacute;i thịt th&agrave;nh những miếng vu&ocirc;ng, to bằng nửa bao di&ecirc;m l&agrave; được.<br />\r\n&ndash; Sả đập dập, cắt kh&uacute;c<br />\r\n&ndash; Gừng th&aacute;i l&aacute;t. Riềng cạo sạch vỏ rồi c&ugrave;ng th&aacute;i l&aacute;t mỏng<br />\r\n&ndash; Tỏi băm nhỏ. H&agrave;nh t&iacute;m rửa sạch, để nguy&ecirc;n củ</p>\r\n\r\n<p>Bước 2: Nấu nước kho c&aacute;</p>\r\n\r\n<p>&ndash; Nước h&agrave;ng bạn c&oacute; thể mua lọ b&aacute;n sẵn. Nếu c&oacute; thời gian h&atilde;y tự nấu nước h&agrave;ng để c&oacute; m&agrave;u đẹp nhất. C&aacute;ch thắng nước h&agrave;ng cũng rất đơn giản. Cho 3 th&igrave;a đường v&agrave; 3 th&igrave;a nước v&agrave;o chảo rồi đặt tr&ecirc;n lửa nhỏ. Kh&ocirc;ng được d&ugrave;ng đũa khuấy, thi thoảng lắc nhẹ chảo để đường tan hết. Khi đường tan, bắt đầu ch&aacute;y th&agrave;nh caramel. Khi c&oacute; m&agrave;u c&aacute;nh gi&aacute;n đẹp mắt th&igrave; th&ecirc;m v&agrave;o nửa th&igrave;a nước đảo đều l&agrave; được.</p>\r\n\r\n<p>&ndash; Trong một nồi nhỏ, cho nước mắm, sốt Teriyaki, đường ph&egrave;n, nước h&agrave;ng, sa tế, bột n&ecirc;m, bột canh, nước cốt dừa v&agrave; nửa l&iacute;t nước khuấy đều. Đun tr&ecirc;n lửa đến khi hỗn hợp tan ho&agrave;n to&agrave;n, bắt đầu sủi tăm th&igrave; tắt bếp.</p>', '2022-01-07 15:08:27', 1, 0, '2022-01-07 15:09:56'),
(5, 'cách nấu canh chua', 'cach-nau-canh-chua', 0, 1, 4, 0, 'hướng dẫn nấu canh', '2022-01-08__6.jpg', '<p>nội dung hướng dẫn nấu canh</p>', '2022-01-08 08:55:25', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `atb_name` varchar(255) NOT NULL,
  `atb_slug` varchar(255) NOT NULL,
  `atb_type_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `attributes`
--

INSERT INTO `attributes` (`id`, `atb_name`, `atb_slug`, `atb_type_id`, `created_at`, `updated_at`) VALUES
(1, '500 gram', '500-gram', 1, '2020-11-20 16:45:10', '2020-11-20 16:45:10'),
(2, '1 Kg', '1-kg', 1, '2020-11-20 16:45:10', '2020-11-20 16:45:10'),
(3, '2 Kg', '2-kg', 1, '2020-11-20 16:45:10', '2020-11-20 16:45:10'),
(4, '250 gram', '250-gram', 1, '2020-11-20 16:45:10', '2020-11-20 16:45:10'),
(5, '300 gram', '300-gram', 1, '2020-11-20 16:45:10', '2020-11-20 16:45:10'),
(6, 'Gói', 'goi', 2, '2020-11-20 16:45:10', '2020-11-20 16:45:10'),
(7, 'Hộp', 'hop', 2, '2020-11-20 16:45:10', '2020-11-20 16:45:10'),
(8, 'Thùng', 'thung', 2, '2020-11-20 16:45:10', '2020-11-20 16:45:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_parent_id` int(11) NOT NULL DEFAULT 0,
  `c_slug` varchar(255) NOT NULL,
  `c_avatar` varchar(255) DEFAULT NULL,
  `c_banner` varchar(255) DEFAULT NULL,
  `c_description` varchar(255) DEFAULT NULL,
  `c_hot` tinyint(4) NOT NULL DEFAULT 0,
  `c_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `c_name`, `c_parent_id`, `c_slug`, `c_avatar`, `c_banner`, `c_description`, `c_hot`, `c_status`, `created_at`, `updated_at`) VALUES
(1, 'Rau củ quả', 0, 'rau-cu-qua', '2020-11-20__raucuqua.png', NULL, NULL, 1, 1, '2020-11-20 16:45:26', '2020-11-20 16:45:26'),
(2, 'Củ - Quả Hữu Cơ', 1, 'cu-qua-huu-co', NULL, NULL, NULL, 0, 1, '2020-11-20 16:45:26', '2020-11-20 16:45:26'),
(3, 'Nấm - Rau mầm', 1, 'nam-rau-mam', NULL, NULL, NULL, 0, 1, '2020-11-20 16:45:26', '2020-11-20 16:45:26'),
(4, 'Rau gia vị', 1, 'rau-gia-vi', NULL, NULL, NULL, 0, 1, '2020-11-20 16:45:26', '2021-09-03 14:00:31'),
(5, 'Rau hữu cơ', 1, 'rau-huu-co', NULL, NULL, NULL, 0, 1, '2020-11-20 16:45:26', '2020-11-20 16:45:26'),
(6, 'Trái Cây Hữu Cơ', 0, 'trai-cay-huu-co', '2020-11-20__traicayhuco.png', NULL, NULL, 0, 1, '2020-11-20 16:45:26', '2020-11-20 16:45:26'),
(7, 'Trái cây khô', 6, 'trai-cay-kho', NULL, NULL, NULL, 0, 1, '2020-11-20 16:45:26', '2020-11-20 16:45:26'),
(8, 'Trái cây nhập khẩu', 6, 'trai-cay-nhap-khau', NULL, NULL, NULL, 0, 1, '2020-11-20 16:45:26', '2020-11-20 16:45:26'),
(9, 'Trái cây Việt', 6, 'trai-cay-viet', NULL, NULL, NULL, 0, 1, '2020-11-20 16:45:26', '2020-11-20 16:45:26'),
(10, 'Đồ uống hữu cơ', 0, 'do-uong-huu-co', '2020-11-20__douong.png', NULL, NULL, 0, 1, '2020-11-20 16:45:26', '2020-11-20 16:45:26'),
(11, 'Kem hữu cơ', 10, 'kem-huu-co', NULL, NULL, NULL, 0, 1, '2020-11-20 16:45:26', '2020-11-20 16:45:26'),
(12, 'Cà phê & Trà hữu cơ', 10, 'ca-phe-tra-huu-co', NULL, NULL, NULL, 0, 1, '2020-11-20 16:45:26', '2020-11-20 16:45:26'),
(13, 'Mật ong và Detox', 10, 'mat-ong-va-detox', NULL, NULL, NULL, 0, 1, '2020-11-20 16:45:26', '2020-11-20 16:45:26'),
(14, 'Nước khoáng - Đồ uống có cồn', 10, 'nuoc-khoang-do-uong-co-con', NULL, NULL, NULL, 0, 1, '2020-11-20 16:45:26', '2020-11-20 16:45:26'),
(15, 'Nước trái cây hữu cơ', 10, 'nuoc-trai-cay-huu-co', NULL, NULL, NULL, 0, 1, '2020-11-20 16:45:26', '2020-11-20 16:45:26'),
(16, 'Thịt - Trứng', 0, 'thit-trung', '2020-11-20__thit.png', NULL, NULL, 0, 1, '2020-11-20 16:45:26', '2020-11-20 16:45:26'),
(17, 'Thủy - Hải sản', 0, 'thuy-hai-san', '2020-11-20__ca.png', NULL, NULL, 0, 1, '2020-11-20 16:45:26', '2020-11-20 16:45:26'),
(18, 'Đồ chế biến sẵn', 0, 'do-che-bien-san', '2020-11-20__wool.png', NULL, NULL, 0, 1, '2020-11-20 16:45:26', '2020-11-20 16:45:26'),
(23, 'Test', 0, 'test', NULL, NULL, NULL, 0, 1, '2023-05-26 15:52:54', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cmt_name` varchar(255) DEFAULT NULL,
  `cmt_email` varchar(255) DEFAULT NULL,
  `cmt_content` text DEFAULT NULL,
  `cmt_parent_id` int(11) NOT NULL DEFAULT 0,
  `cmt_product_id` int(11) NOT NULL DEFAULT 0,
  `cmt_admin_id` int(11) NOT NULL DEFAULT 0,
  `cmt_user_id` int(11) NOT NULL DEFAULT 0,
  `cmt_like` int(11) NOT NULL DEFAULT 0,
  `cmt_disk_like` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `cmt_name`, `cmt_email`, `cmt_content`, `cmt_parent_id`, `cmt_product_id`, `cmt_admin_id`, `cmt_user_id`, `cmt_like`, `cmt_disk_like`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Sản phẩm rất tuyệt vời', 0, 11, 0, 2, 0, 0, '2020-11-20 16:45:44', '2020-11-20 16:45:44'),
(2, NULL, NULL, '@Nguyen Quang Duc: cám ơn shop', 1, 11, 0, 2, 0, 0, '2020-11-20 16:45:44', '2020-11-20 16:45:44'),
(5, NULL, NULL, 'sản phẩm này còn hàng không ?', 0, 10, 0, 35, 0, 0, '2022-01-07 15:17:59', NULL),
(6, NULL, NULL, '@Minh Lan: còn ạ', 5, 10, 0, 35, 0, 0, '2022-01-07 15:18:28', NULL),
(8, NULL, NULL, 'OK', 0, 11, 0, 42, 0, 0, '2023-05-26 08:18:05', NULL),
(9, NULL, NULL, 'Ngon', 0, 5, 0, 43, 0, 0, '2023-05-26 08:41:43', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `c_title` varchar(255) DEFAULT NULL,
  `c_phone` char(11) DEFAULT NULL,
  `c_email` varchar(255) DEFAULT NULL,
  `c_content` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discount_code`
--

CREATE TABLE `discount_code` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `d_code` varchar(191) NOT NULL,
  `d_number_code` int(11) NOT NULL DEFAULT 0,
  `d_date_start` datetime DEFAULT NULL,
  `d_date_end` datetime DEFAULT NULL,
  `d_percentage` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `discount_code`
--

INSERT INTO `discount_code` (`id`, `d_code`, `d_number_code`, `d_date_start`, `d_date_end`, `d_percentage`, `created_at`, `updated_at`) VALUES
(2, 'abc', 10, '2023-05-27 22:49:00', '2023-05-31 22:50:00', 10, '2023-05-26 08:50:05', '2023-05-26 08:50:13'),
(3, 'abce', 10, '2023-06-01 05:54:00', '2023-06-30 05:54:00', 10, '2023-05-26 15:54:34', '2023-05-26 15:54:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `e_name` varchar(255) DEFAULT NULL,
  `e_banner` varchar(255) DEFAULT NULL,
  `e_link` varchar(255) DEFAULT NULL,
  `e_position_1` tinyint(4) NOT NULL DEFAULT 0,
  `e_position_2` tinyint(4) NOT NULL DEFAULT 0,
  `e_position_3` tinyint(4) NOT NULL DEFAULT 0,
  `e_position_4` tinyint(4) NOT NULL DEFAULT 0,
  `e_detail_1` tinyint(4) NOT NULL DEFAULT 0,
  `e_detail_2` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `events`
--

INSERT INTO `events` (`id`, `e_name`, `e_banner`, `e_link`, `e_position_1`, `e_position_2`, `e_position_3`, `e_position_4`, `e_detail_1`, `e_detail_2`, `created_at`, `updated_at`) VALUES
(1, 'sale 1', '2020-11-20__cua-hang-bach-hoa-xanh-tai-quang-son-ninh-son-2-1211x1713.jpg', '/', 1, 0, 0, 0, 0, 0, '2020-11-20 16:46:09', '2020-11-20 16:46:09'),
(2, 'sale 2', '2020-11-20__smart-food-banner.jpg', '/', 0, 1, 0, 0, 0, 0, '2020-11-20 16:46:09', '2020-11-20 16:46:09'),
(3, 'sale 3', '2020-11-20__11e93518327abdd246ba92c0d900162d.jpg', '/', 0, 0, 1, 0, 0, 0, '2020-11-20 16:46:09', '2020-11-20 16:46:09'),
(4, 'sale 4', '2020-11-21__cong-thuc-banner.jpg', '/', 0, 0, 0, 0, 1, 0, '2020-11-21 04:02:56', '2020-11-21 04:02:56'),
(5, 'sale 5', '2020-11-21__follow-nhan-uu-dai.jpg', '/', 0, 0, 0, 0, 0, 1, '2020-11-21 04:02:48', '2020-11-21 04:02:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `keywords`
--

CREATE TABLE `keywords` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `k_name` varchar(255) NOT NULL,
  `k_slug` varchar(255) NOT NULL,
  `k_description` varchar(255) DEFAULT NULL,
  `k_hot` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `keywords`
--

INSERT INTO `keywords` (`id`, `k_name`, `k_slug`, `k_description`, `k_hot`, `created_at`, `updated_at`) VALUES
(1, 'Thực phẩm sạch', 'thuc-pham-sach', NULL, 0, '2020-11-20 16:46:28', '2020-11-20 16:46:28'),
(2, 'Rau quả hữu cơ', 'rau-qua-huu-co', NULL, 0, '2020-11-20 16:46:28', '2020-11-20 16:46:28'),
(3, 'Thực phẩm sạch vietgap', 'thuc-pham-sach-vietgap', NULL, 0, '2020-11-20 16:46:28', '2020-11-20 16:46:28'),
(4, 'Thực phẩm vietfoods', 'thuc-pham-vietfoods', NULL, 0, '2020-11-20 16:46:28', '2020-11-20 16:46:28'),
(5, 'Organicfood', 'organicfood', NULL, 0, '2020-11-20 16:46:28', '2020-11-20 16:46:28'),
(6, 'Rau quả thực phẩm sạch chuẩn VietGrap', 'rau-qua-thuc-pham-sach-chuan-vietgrap', NULL, 0, '2020-11-20 16:46:28', '2020-11-20 16:46:28'),
(7, 'Nông sản sạch', 'nong-san-sach', NULL, 0, '2020-11-20 16:46:28', '2020-11-20 16:46:28'),
(8, 'Mì Ly Cao Cấp', 'mi-ly-cao-cap', 'mì nhập khẩu', 0, '2022-01-07 15:00:25', NULL),
(9, 'Mì chiên không dầu', 'mi-chien-khong-dau', 'mì nhập khẩu', 0, '2022-01-08 08:49:17', NULL),
(10, 'Test', 'test', 'aaaaaaa', 0, '2023-05-26 15:53:07', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mn_name` varchar(255) NOT NULL,
  `mn_slug` varchar(255) NOT NULL,
  `mn_avatar` varchar(255) DEFAULT NULL,
  `mn_banner` varchar(255) DEFAULT NULL,
  `mn_description` varchar(255) DEFAULT NULL,
  `mn_hot` tinyint(4) NOT NULL DEFAULT 0,
  `mn_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `mn_name`, `mn_slug`, `mn_avatar`, `mn_banner`, `mn_description`, `mn_hot`, `mn_status`, `created_at`, `updated_at`) VALUES
(1, 'Tin tức mới', 'tin-tuc-moi', NULL, NULL, NULL, 0, 1, '2020-11-20 16:46:44', '2020-11-20 16:46:44'),
(2, 'Sự Kiện', 'su-kien', NULL, NULL, NULL, 0, 1, '2020-11-20 16:46:44', '2020-11-20 16:46:44'),
(3, 'Tin nổi bậc', 'tin-noi-bac', NULL, NULL, NULL, 0, 1, '2022-01-07 15:06:11', NULL),
(4, 'Tin Xem Nhiều', 'tin-xem-nhieu', NULL, NULL, NULL, 0, 1, '2022-01-08 08:54:36', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2018_02_02_041429_create_categories_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_02_02_155318_create_keywords_table', 1),
(5, '2020_02_03_145303_create_products_table', 1),
(6, '2020_02_06_165057_create_attributes_table', 1),
(7, '2020_02_06_184708_create_products_attributes_table', 1),
(8, '2020_02_08_005029_add_multiple_column_attribute_in_table_products', 1),
(9, '2020_02_09_073958_create_transactions_table', 1),
(10, '2020_02_09_074025_create_orders_table', 1),
(11, '2020_02_09_133309_create_products_keywords_table', 1),
(12, '2020_02_09_155308_create_admins_table', 1),
(13, '2020_02_09_180519_create_menus_table', 1),
(14, '2020_02_09_180620_create_articles_table', 1),
(15, '2020_02_12_100000_create_password_resets_table', 1),
(16, '2020_02_13_154148_alter_column_pro_number_in_table_product', 1),
(17, '2020_02_13_171036_create_slides_table', 1),
(18, '2020_02_14_121248_alter_column_a_position_in_table_articles', 1),
(19, '2020_02_15_053225_create_user_favourite_table', 1),
(20, '2020_02_15_191555_create_ratings_table', 1),
(21, '2020_02_17_162605_create_events_table', 1),
(22, '2020_02_18_152103_create_product_images_table', 1),
(23, '2020_02_24_222836_create_social_accounts_table', 1),
(24, '2020_03_08_104810_create_statics_table', 1),
(25, '2020_03_08_213403_alter_column_pro_age_review_in_table_product', 1),
(26, '2020_03_12_205704_create_contacts_table', 1),
(27, '2020_03_17_183239_create_comments_table', 1),
(28, '2020_03_22_003200_alter_column_spam_comment_ratings_in_table_users', 1),
(29, '2020_03_23_223714_alter_column_admin_in_table_admin', 1),
(30, '2020_04_09_231820_create_producer_table', 1),
(31, '2020_04_11_010440_create_types_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `od_transaction_id` int(11) NOT NULL DEFAULT 0,
  `od_product_id` int(11) NOT NULL DEFAULT 0,
  `od_sale` int(11) NOT NULL DEFAULT 0,
  `od_qty` tinyint(4) NOT NULL DEFAULT 0,
  `od_price` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `od_transaction_id`, `od_product_id`, `od_sale`, `od_qty`, `od_price`, `created_at`, `updated_at`) VALUES
(8, 10, 11, 0, 1, 33000, NULL, NULL),
(9, 10, 9, 0, 1, 42000, NULL, NULL),
(10, 10, 8, 0, 1, 65000, NULL, NULL),
(11, 11, 11, 0, 1, 33000, NULL, NULL),
(12, 11, 8, 0, 1, 65000, NULL, NULL),
(13, 12, 9, 0, 3, 42000, NULL, NULL),
(14, 12, 10, 0, 2, 16000, NULL, NULL),
(15, 13, 10, 0, 4, 16000, NULL, NULL),
(16, 14, 7, 0, 1, 33000, NULL, NULL),
(17, 14, 9, 0, 1, 42000, NULL, NULL),
(18, 15, 11, 0, 3, 33000, NULL, NULL),
(19, 15, 7, 0, 2, 33000, NULL, NULL),
(20, 15, 10, 0, 1, 16000, NULL, NULL),
(21, 15, 9, 0, 1, 42000, NULL, NULL),
(22, 15, 5, 0, 1, 50000, NULL, NULL),
(23, 16, 10, 0, 2, 16000, NULL, NULL),
(24, 16, 9, 0, 1, 42000, NULL, NULL),
(25, 16, 8, 0, 1, 65000, NULL, NULL),
(26, 16, 11, 0, 1, 33000, NULL, NULL),
(27, 16, 7, 0, 1, 33000, NULL, NULL),
(28, 16, 3, 0, 1, 1700000, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('duocnvoit@gmail.com', '$2y$10$pbrzwKceNbJ/t6ay5uJODOz4bweHblK6bPysnuctlVyCFO58YkoSq', '2020-05-03 15:29:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_transaction_id` int(11) DEFAULT NULL,
  `p_user_id` int(11) DEFAULT NULL,
  `p_money` double(8,2) DEFAULT NULL COMMENT 'Số tiền thanh toán',
  `p_note` varchar(191) DEFAULT NULL COMMENT 'Nội dung thanh toán',
  `p_transaction_code` varchar(191) NOT NULL,
  `p_vnp_response_code` varchar(255) DEFAULT NULL COMMENT 'Mã phản hồi',
  `p_code_vnpay` varchar(255) DEFAULT NULL COMMENT 'Mã giao dịch vnpay',
  `p_code_bank` varchar(255) DEFAULT NULL COMMENT 'Mã ngân hàng',
  `p_time` datetime DEFAULT NULL COMMENT 'Thời gian chuyển khoản',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `producer`
--

CREATE TABLE `producer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pdr_name` varchar(255) NOT NULL,
  `pdr_slug` varchar(255) NOT NULL,
  `pdr_email` varchar(100) NOT NULL,
  `pdr_phone` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `producer`
--

INSERT INTO `producer` (`id`, `pdr_name`, `pdr_slug`, `pdr_email`, `pdr_phone`, `created_at`, `updated_at`) VALUES
(1, 'Nông sản nhật bản', 'nong-san-nhat-ban', 'nongsannhat@gmail.com', '19001907', '2020-11-20 16:47:15', '2020-11-20 16:47:15'),
(2, 'Hợ tác xã nông sản sạch', 'ho-tac-xa-nong-san-sach', 'hoptacnongsansach@gmail.com', '18008989', '2020-11-20 16:47:15', '2020-11-20 16:47:15'),
(3, 'Everyday Organic', 'everyday-organic', 'everydayorganic@gmail.com', '028 38 753 443', '2020-11-20 16:47:15', '2020-11-20 16:47:15'),
(4, 'Organicfood.vn', 'organicfoodvn', 'organicfood@gmail.com', '0928817228', '2020-11-20 16:47:15', '2020-11-20 16:47:15'),
(5, 'Thực phẩm sạch VietGrap', 'thuc-pham-sach-vietgrap', 'vietgap@fsi.org.vn', '02436341933', '2020-11-20 16:47:15', '2020-11-20 16:47:15'),
(6, 'Thực phẩm sạch vietfoods', 'thuc-pham-sach-vietfoods', 'vietfoods@gmail.com', '0243201075', '2020-11-20 16:47:15', '2020-11-20 16:47:15'),
(7, 'Acicook Mi hảo Hảo', 'acicook-mi-hao-hao', 'haohao@gmail.com', '03764641313', '2022-01-07 14:57:27', '2022-01-07 14:59:50'),
(8, 'Omachi', 'omachi', 'congtyomachi@gmail.com', '0333333333', '2022-01-08 08:48:57', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pro_name` varchar(255) DEFAULT NULL,
  `pro_slug` varchar(255) NOT NULL,
  `pro_price` int(11) NOT NULL DEFAULT 0,
  `pro_price_entry` int(11) NOT NULL DEFAULT 0 COMMENT 'giá nhập',
  `pro_category_id` int(11) NOT NULL DEFAULT 0,
  `pro_admin_id` int(11) NOT NULL DEFAULT 0,
  `pro_sale` tinyint(4) NOT NULL DEFAULT 0,
  `pro_avatar` varchar(255) DEFAULT NULL,
  `pro_view` int(11) NOT NULL DEFAULT 0,
  `pro_hot` tinyint(4) NOT NULL DEFAULT 0,
  `pro_active` tinyint(4) NOT NULL DEFAULT 1,
  `pro_pay` int(11) NOT NULL DEFAULT 0,
  `pro_description` mediumtext DEFAULT NULL,
  `pro_content` text DEFAULT NULL,
  `pro_review_total` int(11) NOT NULL DEFAULT 0,
  `pro_review_star` int(11) NOT NULL DEFAULT 0,
  `pro_age_review` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `pro_number` int(11) NOT NULL DEFAULT 0,
  `pro_country` tinyint(4) NOT NULL DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `pro_name`, `pro_slug`, `pro_price`, `pro_price_entry`, `pro_category_id`, `pro_admin_id`, `pro_sale`, `pro_avatar`, `pro_view`, `pro_hot`, `pro_active`, `pro_pay`, `pro_description`, `pro_content`, `pro_review_total`, `pro_review_star`, `pro_age_review`, `created_at`, `pro_number`, `pro_country`, `updated_at`) VALUES
(1, 'Tỏi Cô Đơn Hữu Cơ - 500g', 'toi-co-don-huu-co-500g', 950000, 0, 4, 0, 0, '2020-11-21__toi-co-don-ly-son-320x320.jpg', 10, 0, 1, 3, NULL, '<p>Trang trại rộng hơn 50ha, trồng măng t&acirc;y l&agrave; chủ yếu. Ở đ&acirc;y, 1 năm n&ocirc;ng d&acirc;n trồng măng t&acirc;y v&agrave; đan xen 2 vụ đậu phộng v&agrave; 1 vụ tỏi. Việc đan xen n&agrave;y cũng gi&uacute;p cho đất tốt hơn, đỡ bệnh cho c&acirc;y. Trang trại sử dụng năng lượng mặt trời to&agrave;n bộ cho hệ thống farm, đ&atilde; được chứng nhận hữu cơ theo ti&ecirc;u chuẩn USDA organic.<br />\r\n<br />\r\n&nbsp;</p>', 0, 0, 0, '2020-11-20 16:47:28', 150, 2, '2020-11-20 18:42:21'),
(2, 'Set Lẩu Nấm 250g (Bestchoice)', 'set-lau-nam-250g-bestchoice', 85000, 0, 3, 0, 0, '2020-11-21__set-lau-nam-the-green-kingdom-250g-320x320.jpg', 2, 1, 1, 0, NULL, '<p>Bao gồm: nấm đ&ugrave;i g&agrave;, kim ch&acirc;m trắng, kim ch&acirc;m n&acirc;u, nấm ti&ecirc;u yến, nấm mối đen, nấm tiểu yến (c&oacute; thể thay đổi theo m&ugrave;a).&nbsp;</p>\r\n\r\n<p>- THƠM NGON, ĐẠI BỔ,GI&Agrave;U DƯỠNG CHẤT.</p>\r\n\r\n<p>- ĐẶC BIỆT L&Agrave; RẤT ĂN TO&Agrave;N CHO GIA V&Igrave; ĐƯỢC TRỒNG TRONG M&Ocirc;I TRƯỜNG ĐƯỢC KIỂM SO&Aacute;T NGHI&Ecirc;M NGẶT.</p>\r\n\r\n<p>- KH&Ocirc;NG LO MẦM BỆNH.</p>\r\n\r\n<p>- NẤM SẠCH VƯỜN&nbsp; -</p>\r\n\r\n<p>TRỒNG AN TO&Agrave;N.</p>\r\n\r\n<p>- Quy tr&igrave;nh ho&agrave;n to&agrave;n kh&eacute;p k&iacute;n theo c&ocirc;ng nghệ cao từ l&uacute;c chuẩn bị đất cho đến l&uacute;c đ&oacute;ng g&oacute;i th&agrave;nh phẩm.<br />\r\n<br />\r\n&nbsp;</p>', 0, 0, 0, '2020-11-20 16:47:28', 150, 3, '2020-11-20 18:36:49'),
(3, 'Ngò Tây Lá Xoăn Hữu Cơ  250g', 'ngo-tay-la-xoan-huu-co-250g', 1700000, 0, 4, 0, 0, '2020-11-21__ngo-tay-huu-co-320x320.jpg', 3, 0, 1, 1, '<p>Gi&agrave;y Adidas Prophere All White DB2705 mang m&agrave;u trắng sang trọng.<br />\r\nThiết kế mang hơi hướng đường phố, c&aacute; t&iacute;nh, dễ d&agrave;ng phối đồ với nhiều kiểu trang phục.<br />\r\nChất liệu cao cấp tho&aacute;ng kh&iacute; v&agrave; &ecirc;m &aacute;i, mang lại sự thoải m&aacute;i trong mọi chuyển động.<br />\r\nFullbox chuẩn ch&iacute;nh h&atilde;ng Adidas.</p>', '<p>GIỚI THIỆU SẢN PHẨM</p>\r\n\r\n<p>Ng&ograve; t&acirc;y (parsley) được trồng tại trang trại hữu cơ Organica tại Đ&agrave; Lạt (L&acirc;m Đồng). Rau được trồng theo phương thức hữu cơ (kh&ocirc;ng sử dụng ph&acirc;n b&oacute;n h&oacute;a học, thuốc trừ s&acirc;u h&oacute;a học v&agrave; chất k&iacute;ch th&iacute;ch tăng trưởng). Thay v&agrave;o đ&oacute;, ch&uacute;ng t&ocirc;i sử dụng c&aacute;c loại ph&acirc;n b&oacute;n h&oacute;a học, thuốc bảo vệ thực vật sinh học th&acirc;n thiện với m&ocirc;i trường, an to&agrave;n cho người sử dụng. &nbsp;</p>\r\n\r\n<p>Parsley c&oacute; t&ecirc;n tiếng Việt l&agrave; ng&ograve; T&acirc;y chắc v&igrave; h&igrave;nh dạng giống rau ng&ograve; (m&ugrave;i) nhưng b&ecirc;n ngo&agrave;i m&agrave;u l&aacute; parsley đậm hơn v&agrave; l&aacute; cũng kh&ocirc;ng mỏng manh như rau ng&ograve; Việt Nam. Parsley l&agrave; một loại gia vị thảo dược rất gi&agrave;u dinh dưỡng v&igrave; c&oacute; rất nhiều chất sắt, natri v&agrave; vitamin C. &nbsp;</p>\r\n\r\n<p>Ghi ch&uacute;: organic process c&oacute; nghĩa l&agrave; sản phẩm được canh t&aacute;c theo quy tr&igrave;nh sản xuất hữu cơ đảm bảo kh&ocirc;ng sử dụng ph&acirc;n b&oacute;n h&oacute;a học, thuốc trừ s&acirc;u h&oacute;a học, h&oacute;a chất tăng trưởng v&agrave; bảo quản... Tuy nhi&ecirc;n, do điều kiện diện t&iacute;ch nhỏ v&agrave; chi ph&iacute; chứng nhận rất đắt đỏ n&ecirc;n ch&uacute;ng t&ocirc;i chưa lấy được c&aacute;c chứng nhận từ nước ngo&agrave;i. D&ugrave; vậy, sản phẩm organic process được ch&uacute;ng t&ocirc;i kiểm so&aacute;t chặt chẽ đảm bảo an to&agrave;n cho người sử dụng với chất lượng tương đương với sản phẩm c&oacute; chứng nhận.&nbsp;</p>\r\n\r\n<p>C&Aacute;CH SỬ DỤNG</p>\r\n\r\n<p>Ng&ograve; t&acirc;y thường được d&ugrave;ng rất nhiều trong c&aacute;c m&oacute;n ăn c&oacute; nhiều hương vị. Parsley c&oacute; thể được d&ugrave;ng trong c&aacute;c loại sốt, s&uacute;p, c&aacute;c m&oacute;n hầm. L&aacute; parsley cắt nhỏ thường được d&ugrave;ng để rắc l&ecirc;n c&aacute;c m&oacute;n ăn l&uacute;c vừa nấu xong.<br />\r\n<br />\r\n&nbsp;</p>', 0, 0, 0, '2020-11-20 16:47:28', 50, 2, '2020-11-20 18:40:02'),
(4, 'Măng Tây Xanh Hữu Cơ Loại 1', 'mang-tay-xanh-huu-co-loai-1', 70000, 0, 3, 0, 0, '2020-11-20__mang-tay-huu-co-320x320.jpg', 1, 1, 1, 0, NULL, '<p>Th&agrave;nh phần dinh dưỡng<br />\r\n&nbsp;</p>\r\n\r\n<p>Măng t&acirc;y được trồng để thu lấy chồi, phần chồi n&agrave;y c&oacute; h&agrave;m lượng dinh dưỡng cao. Trong 100g măng t&acirc;y xanh (tươi) chứa 2,2% đạm, 3,9% cacbohydrate, 2,1% xơ, 0,6% tro, 0,1% b&eacute;o v&agrave; c&aacute;c kho&aacute;ng chất (canxi, sắt, magi&ecirc;, mangan, phốt pho, kali, kẽm&hellip; chiếm 35%). Ngo&agrave;i ra, n&oacute; c&ograve;n chứa rất nhiều loại vitamin cần thiết như vitamin C, E, K, thiamine (vitamin B1), riboflavin (vitamin B2), niacin (vitamin B3), axit pantothenic (vitamin B5), pyridoxine (vitamin B6), folate (vitamin B9), &hellip; Hơn nữa, đọt măng t&acirc;y lại c&oacute; vị ngọt đặc trưng, c&oacute; thể d&ugrave;ng để chế biến th&agrave;nh nhiều m&oacute;n ăn ngon&nbsp;như salad măng t&acirc;y, măng t&acirc;y x&agrave;o.....<br />\r\n&nbsp;</p>', 0, 0, 0, '2020-11-20 16:47:28', 50, 6, '2020-11-20 16:51:55'),
(5, 'Nấm Linh Chi Trắng Hàn Quốc', 'nam-linh-chi-trang-han-quoc', 50000, 0, 3, 0, 0, '2020-11-20__nam-linh-chi-trang-han-quoc-320x320.jpg', 5, 0, 1, 1, NULL, '<p>Xuất xứ: H&agrave;n Quốc</p>\r\n\r\n<p>Th&agrave;nh phần: 100% nấm tươi H&agrave;n Quốc</p>\r\n\r\n<p>C&aacute;ch bảo quản: Bảo quản trong ngăn m&aacute;t tủ lạnh sẽ giữ được từ 3 - 4 ng&agrave;y</p>\r\n\r\n<p>Nấm linh chi c&ograve;n c&oacute; nhiều t&ecirc;n gọi mỹ miều kh&aacute;c như nấm thủy ti&ecirc;n trắng, nấm b&aacute;t ti&ecirc;n. Ch&uacute;ng c&oacute; nguồn gốc từ Đ&ocirc;ng &Aacute; v&agrave; chủ yếu l&agrave; ở Nhật Bản. Thế nhưng hiện nay ch&uacute;ng đ&atilde; được nu&ocirc;i trồng phổ biến hơn ở c&aacute;c nơi kh&aacute;c như ch&acirc;u &Acirc;u, Bắc Mỹ hay &Uacute;c. C&oacute; thể thấy họ nh&agrave; nấm thường kh&ocirc;ng c&oacute; vị r&otilde; r&agrave;ng, tuy nhi&ecirc;n với nấm linh chi trắng ch&uacute;ng lại c&oacute; m&ugrave;i thơm ng&agrave;o ngạt giống như sữa v&agrave; vị ngọt rất r&otilde;. Đ&acirc;y cũng ch&iacute;nh l&agrave; l&yacute; do khiến c&aacute;c b&agrave; mẹ Nhật lu&ocirc;n ưu ti&ecirc;n lựa chọn d&ograve;ng nấm n&agrave;y l&agrave;m thức ăn dặm cho b&eacute; cai sữa. Nhiều nh&agrave; khoa học giải th&iacute;ch rằng, do trong qu&aacute; tr&igrave;nh ủ nấm c&oacute; sử dụng nguy&ecirc;n liệu tinh bột như c&aacute;m gạo, l&otilde;i ng&ocirc;, tinh bột, khoai&hellip;N&ecirc;n l&uacute;c k&yacute; sinh, lượng glucose c&ograve;n s&oacute;t lại v&agrave; chuyển h&oacute;a th&agrave;nh m&ugrave;i vị ngọt thơm cho nấm linh chi trắng. Rất nhiều người vẫn ca ngợi c&ocirc;ng dụng thần kỳ của họ nh&agrave; nấm mang lại cho sức khỏe. V&agrave; nấm linh chi trắng cũng kh&ocirc;ng ngoại lệ. Ch&uacute;ng kh&ocirc;ng chỉ mang lại lợi &iacute;ch cho người trưởng th&agrave;nh m&agrave; c&ograve;n rất tốt cho sự ph&aacute;t triển của trẻ. D&ograve;ng nấm n&agrave;y rất gi&agrave;u c&aacute;c vitamin v&agrave; vi kho&aacute;ng chất như: vitamin nh&oacute;m B (axit folic, B2, thiamin, B9,&hellip;), vitamin D,...<br />\r\n&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div id=\"gtx-trans\" style=\"left:-69px; position:absolute; top:348px\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', 1, 4, 4, '2020-11-20 16:47:28', 100, 5, '2020-11-20 16:47:28'),
(6, 'Bắp Non Hữu Cơ', 'bap-non-huu-co', 45000, 0, 3, 0, 0, '2020-11-20__bap-non-huu-co-everyday-goi-250gram-320x320.jpg', 3, 1, 1, 0, NULL, '<p>Bắp non được trồng theo phương thức hữu cơ&nbsp;đảm bảo kh&ocirc;ng sử dụng ph&acirc;n b&oacute;n ho&aacute; học, thuốc trừ s&acirc;u, trừ cỏ độc hại, kh&ocirc;ng d&ugrave;ng chất k&iacute;ch th&iacute;ch tăng trưởng hay chất bảo quản, kh&ocirc;ng sử dụng giống hay th&agrave;nh phần biến đổi gene (GMO)&nbsp;n&ecirc;n giữ được hương vị đặc trưng. Bắp non kh&ocirc;ng chỉ l&agrave; một nguồn thực phẩm gi&agrave;u&nbsp;&nbsp;magi&ecirc;, sắt, vitamin B v&agrave; protein m&agrave; c&ograve;n gi&uacute;p bạn tr&aacute;nh nhiều bệnh tật như: - Ph&ograve;ng ngừa bệnh trĩ v&agrave; ung thư - ph&ograve;ng chống oxy ho&aacute; - Bảo vệ tim - Cải thiện t&igrave;nh trạng thiếu m&aacute;u - Giảm mức Cholesterol - Giảm đau khớp, xương - T&aacute;c dụng tốt cho bệnh nh&acirc;n Alzheimer</p>\r\n\r\n<div id=\"gtx-trans\" style=\"left:-73px; position:absolute; top:163.4px\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', 0, 0, 0, '2020-11-20 16:47:28', 120, 2, '2020-11-20 16:47:28'),
(7, 'Bông Cải Xanh Hữu Cơ - 300g', 'bong-cai-xanh-huu-co-300g', 33000, 0, 2, 0, 0, '2020-11-20__bong-cai-xanh-huu-co-320x320.jpg', 9, 1, 1, 5, '<p>B&ocirc;ng Cải Xanh được trồng đ&uacute;ng theo ti&ecirc;u chuẩn thực phẩm sạch đảm bảo cho sức khỏe&nbsp;</p>', '<p>GIỚI THIỆU SẢN PHẨM</p>\r\n\r\n<p>&bull; B&ocirc;ng cải xanh hoặc s&uacute;p lơ xanh, l&agrave; một loại c&acirc;y thuộc họ cải, c&oacute; hoa lớn ở đầu, thường được d&ugrave;ng như rau. B&ocirc;ng cải xanh thường được chế biến bằng c&aacute;ch luộc hoặc hấp, nhưng cũng c&oacute; thể được ăn sống như l&agrave; rau sống trong những đĩa đồ nguội khai vị. C&Aacute;CH SỬ DỤNG</p>\r\n\r\n<p>&bull;&nbsp;C&oacute; rất nhiều m&oacute;n ăn được chế biến từ b&ocirc;ng cải xanh chẳng hạn như pasta với b&ocirc;ng cải xanh, s&uacute;p b&ocirc;ng cải xanh, b&ocirc;ng cải xanh x&agrave;o t&ocirc;m...</p>\r\n\r\n<p>&bull;&nbsp;Ta c&oacute; b&ocirc;ng cải xanh trộn dầu h&agrave;u, một m&oacute;n ăn gi&agrave;u đạm v&agrave; rất ngon hay g&agrave; x&agrave;o b&ocirc;ng cải xanh m&oacute;n ăn &acirc;m dương kết hợp h&agrave;i h&ograve;a ....</p>\r\n\r\n<p>&bull;&nbsp;Ngo&agrave;i ra b&ocirc;ng cải xanh được d&ugrave;ng để l&agrave;m c&aacute;c m&oacute;n salad, x&agrave;o thịt, x&agrave;o hải sản, gi&uacute;p m&oacute;n ăn hạ bớt lượng nhiệt từ dầu mỡ, thịt, đảm bảo h&agrave;i h&ograve;a, c&acirc;n bằng cho bữa ăn... &nbsp;</p>\r\n\r\n<p>C&Aacute;CH BẢO QUẢN</p>\r\n\r\n<p>&bull;&nbsp;Kh&ocirc;ng n&ecirc;n để b&ocirc;ng cải xanh chung với c&aacute;c loại tr&aacute;i c&acirc;y v&igrave; đ&acirc;y l&agrave; loại rau rất nhạy cảm với kh&iacute; ethylen sinh ra từ một số loại tr&aacute;i c&acirc;y.<br />\r\n&nbsp;</p>\r\n\r\n<div id=\"gtx-trans\" style=\"left:-26px; position:absolute; top:364.4px\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', 0, 0, 0, '2020-11-20 16:47:28', 50, 2, '2023-05-26 15:53:13'),
(8, 'Bông Cải Trắng - 500g', 'bong-cai-trang-500g', 65000, 0, 2, 0, 0, '2020-11-20__bong-cai-trang-huu-co-320x320.jpg', 2, 0, 1, 3, NULL, '<p>GIỚI THIỆU SẢN PHẨM</p>\r\n\r\n<p>&bull; B&ocirc;ng cải trắng hay c&ograve;n gọi l&agrave; s&uacute;p lơ trắng l&agrave; loại c&acirc;y c&oacute; phần b&ocirc;ng trắng kh&iacute;t, xốp v&agrave; mềm, b&ecirc;n ngo&agrave;i c&oacute; l&aacute; bao bọc xung quanh, phiến l&aacute; d&agrave;y, cứng, phần b&ocirc;ng được d&ugrave;ng để ăn c&ograve;n phần l&aacute; d&agrave;nh cho gia s&uacute;c.</p>\r\n\r\n<p>C&Ocirc;NG DỤNG</p>\r\n\r\n<p>&bull; B&ocirc;ng cải trắng đ&atilde; được biết đến từ l&acirc;u l&agrave; mang lại gi&aacute; trị dinh dưỡng v&agrave; c&oacute; lợi cho sức khỏe. Với h&agrave;m lượng calo v&agrave; chất xơ &iacute;t (khoảng 25 calo v&agrave; 2g chất xơ), đ&acirc;y l&agrave; m&oacute;n ăn tuyệt vời cho người muốn giảm c&acirc;n. Một số hoạt chất trong cải đ&atilde; được chứng minh hoạt động rất hiệu quả tr&ecirc;n hệ miễn dịch, tăng cường kh&aacute;ng vi&ecirc;m, chống vi tr&ugrave;ng v&agrave; vi khuẩn v&agrave; điều trị chứng loạn sản cổ tử cung.</p>\r\n\r\n<p>&bull; B&ocirc;ng cải trắng cung cấp một lượng lớn vitamin C gi&uacute;p chống oxy h&oacute;a đ&atilde; được chứng minh gi&uacute;p chống lại c&aacute;c gốc tự do c&oacute; hại, tăng cường khả năng miễn dịch, ngăn ngừa c&aacute;c bệnh nhiễm tr&ugrave;ng v&agrave; ngừa ung thư. B&ocirc;ng cải trắng chứa nhiều kho&aacute;ng chất như mangan, đồng, sắt v&agrave; kali, c&aacute;c nguy&ecirc;n tố vi lượng n&agrave;y cũng l&agrave; th&agrave;nh phần kh&ocirc;ng thể thiếu cho hoạt động của c&aacute;c enzym trong cơ thể, g&oacute;p phần bảo vệ khung xương, hồng cầu v&agrave; điều h&ograve;a huyết &aacute;p. B&ocirc;ng cải trắng gi&uacute;p l&agrave;m bền c&aacute;c th&agrave;nh mạch m&aacute;u. Một số vitamin kh&aacute;c gi&uacute;p k&iacute;ch hoạt hoạt động chống vi&ecirc;m trong mao mạch v&agrave; ngăn ngừa tổn thương mạch m&aacute;u ...</p>\r\n\r\n<p>C&Aacute;CH SỬ DỤNG</p>\r\n\r\n<p>&bull;&nbsp;Từ b&ocirc;ng cải trắng, ta c&oacute; thể chế biến th&agrave;nh c&aacute;c m&oacute;n ăn như: s&uacute;p lơ muối chua, s&uacute;p lơ nướng, t&ocirc;m s&uacute;p lơ sốt nước cốt dừa .. &bull;&nbsp;V&agrave;o những ng&agrave;y trời lạnh m&oacute;n s&uacute;p b&ocirc;ng cải trắng gi&uacute;p ta th&ecirc;m phần ấm bụng, tạo bữa ăn ấm &aacute;p cho gia đ&igrave;nh</p>\r\n\r\n<p>&bull;&nbsp;Ngo&agrave;i ra, ta c&ograve;n c&oacute; thể chế biến b&ocirc;ng cải trắng th&agrave;nh nhiều m&oacute;n kh&aacute;c như: b&ocirc;ng cải xốt t&ocirc;m, canh b&ocirc;ng cải thịt b&ograve;, b&ocirc;ng cải trắng x&agrave;o tỏi, ......</p>\r\n\r\n<p>Lưu &yacute;: tốt nhất l&agrave; nấu b&ocirc;ng cải trắng cho vừa ch&iacute;n tới nếu kh&ocirc;ng b&ocirc;ng sẽ nhũn v&agrave; c&oacute; m&ugrave;i rất nồng. &nbsp;</p>\r\n\r\n<p>LƯỢNG D&Ugrave;NG</p>\r\n\r\n<p>&bull;&nbsp;D&ugrave;ng b&ocirc;ng cải trắng với một lượng ph&ugrave; hợp sẽ rất tốt cho sức khỏe. C&Aacute;CH BẢO QUẢN</p>\r\n\r\n<p>&bull;&nbsp;H&atilde;y chọn những b&ocirc;ng cải thật chắc, phần b&ocirc;ng m&agrave;u trắng s&aacute;ng v&agrave; l&aacute; xanh mướt. Tr&aacute;nh những b&ocirc;ng đ&atilde; ngả v&agrave;ng hoặc c&oacute; những đốm đen. Nếu bạn chưa ăn ngay th&igrave; kh&ocirc;ng rửa m&agrave; bọc b&ocirc;ng cải bằng nilon hoặc cho v&agrave;o t&uacute;i nilon cũng được, sau đ&oacute; cho v&agrave;o tủ lạnh (hộp nhựa ngăn chứa rau củ).<br />\r\n&nbsp;</p>\r\n\r\n<div id=\"gtx-trans\" style=\"left:-52px; position:absolute; top:658.2px\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', 0, 0, 0, '2020-11-20 16:47:28', 150, 2, '2020-11-20 16:47:28'),
(9, 'Cà chua - 500g', 'ca-chua-500g', 42000, 0, 2, 0, 0, '2020-11-20__ca-chua-organic-320x320.jpg', 11, 1, 1, 5, NULL, '<p>GIỚI THIỆU SẢN PHẨM</p>\r\n\r\n<p><br />\r\n&bull; C&agrave; chua l&agrave; một loại rau quả l&agrave;m thực phẩm. Quả ban đầu c&oacute; m&agrave;u xanh, ch&iacute;n ngả m&agrave;u từ v&agrave;ng đến đỏ. C&agrave; chua c&oacute; vị hơi chua v&agrave; l&agrave; một loại thực phẩm bổ dưỡng, gi&agrave;u vitamin C v&agrave; A, đặc biệt l&agrave; gi&agrave;u lycopeme tốt cho sức khỏe.</p>\r\n\r\n<p>C&Ocirc;NG DỤNG</p>\r\n\r\n<p><br />\r\n&bull; C&agrave; chua c&oacute; rất nhiều c&ocirc;ng dung cả về chữa bệnh v&agrave; l&agrave;m đẹp. c&ocirc;ng dụng l&agrave;m đẹp của c&agrave; chua như: chống l&atilde;o h&oacute;a, l&agrave;m da mịn m&agrave;ng tươi s&aacute;ng, bảo vệ bề mặt da ....</p>\r\n\r\n<p>&bull; C&ocirc;ng dụng chữa bệnh của c&agrave; chua rất nhiều, chẳng hạn như: ph&ograve;ng chống ung thư, chữa vi&ecirc;m gan m&atilde;n t&iacute;nh, hỗ trợ cho người bị vi&ecirc;m thận, chữa bệnh tim mach, chữa b&iacute; đại tiện, thiếu m&aacute;u, chữa m&uacute;n nhọt, b&otilde;ng lửa, chữa sốt cao k&egrave;m theo kh&aacute;t nước hay chữa tăng huyết &aacute;p, chảy m&aacute;u ch&acirc;n răng...<br />\r\nC&Aacute;CH SỬ DỤNG</p>\r\n\r\n<p>&bull;&nbsp;C&agrave; chua l&agrave; nguy&ecirc;n liệu ch&iacute;nh cho m&oacute;n sốt c&agrave; thơm ngon để ăn chung với c&aacute;c m&oacute;n kh&aacute;c như: đậu phụ sốt c&agrave; chua, c&aacute; chi&ecirc;n sốt c&agrave; chua, bắp chi&ecirc;n-ph&ocirc; mai sốt c&agrave; chua, .....</p>\r\n\r\n<p>&bull;&nbsp;C&agrave; chua d&ugrave;ng l&agrave;m m&oacute;n canh như: canh mẫn, canh chua, canh b&iacute; ng&ograve;i đạu phụ c&agrave; chua hay canh sường c&agrave; chua...</p>\r\n\r\n<p>&bull;&nbsp;C&agrave; chua c&oacute; thể được ăn sống với m&oacute;n salad, hay &eacute;p th&agrave;nh nước hoa quả bổ dưỡng... &nbsp; LƯỢNG D&Ugrave;NG</p>\r\n\r\n<p>&bull;&nbsp;Một đến hai quả c&agrave; chua mỗi ng&agrave;y d&ugrave;ng trong bữa ăn sẽ rất tốt cho sức khỏe của bạn.... C&Aacute;CH BẢO QUẢN</p>\r\n\r\n<p>&bull;&nbsp;C&agrave; chua thường ch&iacute;n rất nhanh khi để ở nhiệt độ ph&ograve;ng<br />\r\n&nbsp;</p>\r\n\r\n<div id=\"gtx-trans\" style=\"left:-33px; position:absolute; top:507.4px\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', 0, 0, 0, '2020-11-20 16:47:28', 50, 2, '2020-11-20 16:47:28'),
(10, 'Chanh giấy hữu cơ', 'chanh-giay-huu-co', 16000, 0, 2, 0, 0, '2020-11-20__chanh-giay-huu-co-500x500.jpg', 10, 0, 1, 4, NULL, '<h4>Đặc điểm:</h4>\r\n\r\n<h4>- B&ocirc;ng trắng nở theo ch&ugrave;m, m&ugrave;i thơm. C&acirc;y cho tr&aacute;i sau thời gian 12-15 th&aacute;ng trồng. C&acirc;y trưởng th&agrave;nh cao từ 1m, lớn nhất l&agrave; 3m. T&aacute;n trong v&ograve;ng 2m. C&acirc;y kh&ocirc;ng k&eacute;n đất, dễ trồng.</h4>\r\n\r\n<h4>- Tr&aacute;i nước nhiều, vị chua, vỏ mỏng. Khi c&acirc;y trưởng th&agrave;nh đủ sức sẽ<br />\r\n&nbsp;</h4>', 0, 0, 0, '2020-11-20 16:47:28', 50, 2, '2020-11-20 16:47:28'),
(11, 'Cà Rốt Hữu Cơ - 300g', 'ca-rot-huu-co-300g', 33000, 0, 2, 0, 0, '2020-11-20__ca-rot-huu-co-320x320.jpg', 14, 1, 1, 6, NULL, '<p>TI&Ecirc;U CHUẨN : USDA, EU&nbsp;</p>\r\n\r\n<p>GIỚI THIỆU SẢN PHẨM</p>\r\n\r\n<p>&bull; C&agrave; rốt l&agrave; loại c&acirc;y c&oacute; củ, củ to ở phần đầu v&agrave; nhọn ở phần đu&ocirc;i, củ c&agrave; rốt thường c&oacute; m&agrave;u cam hoặc đỏ, phẩn ăn được thường gọi l&agrave; củ nhưng thực chất đ&oacute; l&agrave; phần rễ của c&agrave; rốt.</p>\r\n\r\n<p>C&Aacute;CH SỬ DỤNG</p>\r\n\r\n<p>&bull;&nbsp;Ai cũng biết, c&agrave; rốt l&agrave; loại rau m&agrave; c&oacute; mặt hầu như trong mọi m&oacute;n ăn v&igrave; t&iacute;nh bổ dưỡng, dễ chế biến v&agrave; nhiều c&ocirc;ng dụng của n&oacute;. &bull;&nbsp;Nếu muốn c&oacute; một l&agrave;n da mịn m&agrave;n, tươi s&aacute;ng hay một đ&ocirc;i mắt long lanh khỏe mạnh ta chỉ cần &eacute;p c&agrave; rốt lấy nước v&agrave; d&ugrave;ng hằng ng&agrave;y. C&agrave; rốt được sấy nhuyễn d&ugrave;ng l&agrave;m m&oacute;n ăn dặm rất bổ dưỡng cho trẻ.</p>\r\n\r\n<p>&bull;&nbsp;Ta c&oacute; thể nấu v&ocirc; số m&oacute;n dinh dưỡng từ c&agrave; rốt v&iacute; dụ như: thịt b&ograve; nấu c&agrave; rốt, s&uacute;p kem c&agrave; rốt, m&igrave; rau củ x&agrave;o c&agrave; rốt, ch&aacute;o c&aacute; c&agrave; rốt, hay s&uacute;p c&agrave; rốt l&agrave;m m&oacute;n khai vị .... c&agrave; rốt c&oacute; mặt tr&ecirc;n mọi m&oacute;n ăn như b&uacute;n b&ograve; kho, hủ t&iacute;u, d&ugrave;ng l&agrave;m kim chi hay rất nhiều c&aacute;c m&oacute;n ăn kh&aacute;c g&oacute;p phần l&agrave;m cho m&oacute;n ăn th&ecirc;m đậm d&agrave;, thơm ngon v&agrave; bổ dưỡng... &nbsp;</p>\r\n\r\n<p>C&Aacute;CH BẢO QUẢN</p>\r\n\r\n<p>&bull;&nbsp;Trữ c&agrave; rốt trong tủ lạnh sau khi đ&atilde; cắt hết l&aacute;. Để trữ c&agrave; rốt được l&acirc;u, c&oacute; thể g&oacute;i c&agrave; rốt trong tấm vải v&agrave; cất trong ngăn m&aacute;t. Với c&aacute;ch n&agrave;y, bạn c&oacute; thể bảo quản được c&agrave; rốt đến hơn 2 tuần. Kh&ocirc;ng rửa hay cắt nhỏ c&agrave; rốt khi bảo quản. Chỉ n&ecirc;n rửa c&agrave; rốt ngay trước khi sử dụng.Kh&ocirc;ng n&ecirc;n để c&agrave; rốt trong t&uacute;i nhựa v&igrave; hơi ẩm của c&agrave; rốt sẽ tho&aacute;t ra khiến c&agrave; rốt dễ h&eacute;o. Tr&aacute;nh để c&agrave; rốt gần c&aacute;c tr&aacute;i c&acirc;y kh&aacute;c, n&oacute; sẽ l&agrave;m c&agrave; rốt mau chin. C&agrave; rốt sẽ bị mềm khi để ngo&agrave;i kh&ocirc;ng kh&iacute;. Nếu bị mềm, c&oacute; thể l&agrave;m cứng lại bằng c&aacute;ch ng&acirc;m v&agrave;o một t&ocirc; nước đ&aacute;. Khi mua c&agrave; rốt về, tốt nhất l&agrave; sử dụng ngay hoặc sử dụng trong v&ograve;ng 1 &ndash; 2 tuần, c&agrave; rốt sẽ giữ nguy&ecirc;n được những chất dinh dưỡng vốn c&oacute;.&nbsp;</p>', 1, 2, 2, '2020-11-20 16:47:28', 50, 4, '2022-01-07 14:53:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products_attributes`
--

CREATE TABLE `products_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pa_product_id` int(11) NOT NULL DEFAULT 0,
  `pa_attribute_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products_attributes`
--

INSERT INTO `products_attributes` (`id`, `pa_product_id`, `pa_attribute_id`) VALUES
(153, 11, 1),
(154, 11, 2),
(155, 11, 3),
(156, 10, 1),
(157, 9, 1),
(158, 9, 2),
(159, 9, 3),
(160, 8, 1),
(161, 8, 2),
(162, 6, 1),
(163, 6, 2),
(164, 6, 3),
(165, 6, 4),
(166, 6, 5),
(167, 5, 6),
(168, 5, 7),
(169, 4, 1),
(172, 2, 6),
(173, 3, 6),
(175, 1, 1),
(182, 7, 2),
(189, 12, 5),
(190, 12, 6),
(191, 13, 5),
(192, 13, 7),
(195, 14, 5),
(196, 14, 8),
(197, 15, 1),
(198, 15, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products_keywords`
--

CREATE TABLE `products_keywords` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pk_product_id` int(11) NOT NULL DEFAULT 0,
  `pk_keyword_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products_keywords`
--

INSERT INTO `products_keywords` (`id`, `pk_product_id`, `pk_keyword_id`) VALUES
(63, 11, 1),
(64, 11, 2),
(65, 11, 3),
(69, 10, 2),
(70, 10, 6),
(71, 10, 7),
(72, 9, 1),
(73, 9, 3),
(74, 9, 6),
(75, 8, 3),
(76, 8, 5),
(77, 8, 6),
(81, 6, 3),
(82, 5, 3),
(83, 5, 4),
(84, 5, 5),
(85, 4, 1),
(86, 4, 2),
(87, 4, 3),
(92, 2, 1),
(93, 2, 2),
(94, 3, 1),
(95, 3, 2),
(96, 3, 7),
(100, 1, 1),
(101, 1, 2),
(102, 1, 3),
(106, 7, 3),
(107, 7, 4),
(108, 7, 5),
(115, 12, 5),
(116, 12, 8),
(117, 13, 2),
(119, 14, 8),
(120, 15, 2),
(121, 15, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pi_name` varchar(255) DEFAULT NULL,
  `pi_slug` varchar(255) DEFAULT NULL,
  `pi_product_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `r_user_id` int(11) NOT NULL DEFAULT 0,
  `r_product_id` int(11) NOT NULL DEFAULT 0,
  `r_number` tinyint(4) NOT NULL DEFAULT 0,
  `r_status` tinyint(4) NOT NULL DEFAULT 0,
  `r_content` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ratings`
--

INSERT INTO `ratings` (`id`, `r_user_id`, `r_product_id`, `r_number`, `r_status`, `r_content`, `created_at`, `updated_at`) VALUES
(3, 37, 11, 2, 0, 'Sản phẩm rất tốt', '2022-01-07 14:53:54', '2022-01-07 14:53:54'),
(4, 38, 12, 5, 0, 'Sản phẩm rất tuyệt', '2022-01-07 14:53:54', '2022-01-07 14:53:54'),
(5, 39, 9, 3, 0, 'sản phẩm tốt nhất tôi từng mua!', '2022-01-07 14:53:54', '2022-01-07 14:53:54'),
(6, 36, 7, 5, 0, 'giá cả rất phải chăng!', '2022-01-07 14:53:54', '2022-01-07 14:53:54'),
(7, 35, 7, 4, 0, 'giao hàng rất nhanh, rất tốt !', '2022-01-07 14:53:54', '2022-01-07 14:53:54'),
(8, 41, 14, 5, 0, 'rất tốt đánh giá 5*', '2022-01-08 08:53:56', '2022-01-08 08:53:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sd_title` varchar(255) DEFAULT NULL,
  `sd_link` varchar(255) DEFAULT NULL,
  `sd_image` varchar(255) DEFAULT NULL,
  `sd_target` tinyint(4) NOT NULL DEFAULT 1,
  `sd_active` tinyint(4) NOT NULL DEFAULT 1,
  `sd_sort` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slides`
--

INSERT INTO `slides` (`id`, `sd_title`, `sd_link`, `sd_image`, `sd_target`, `sd_active`, `sd_sort`, `created_at`, `updated_at`) VALUES
(1, 'slide 1', '/', '2020-11-20__giai-phap-mo-cua-hang-thuc-pham-sach.jpg', 1, 1, 1, '2020-11-20 16:48:00', '2022-01-07 14:33:19'),
(2, 'slide 2', '/', '2020-11-20__vi-sao-mo-cua-hang-kinh-doanh-thuc-pham-sach-chua-hieu-qua-2-min.jpg', 1, 1, 0, '2020-11-20 16:48:00', '2020-11-20 16:48:00'),
(3, 'slide 5', '/', '2020-11-20__organic-food.jpg', 1, 1, 0, '2022-01-07 14:43:29', '2022-01-07 14:43:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `statics`
--

CREATE TABLE `statics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `s_title` varchar(255) DEFAULT NULL,
  `s_slug` varchar(255) DEFAULT NULL,
  `s_type` tinyint(4) NOT NULL DEFAULT 0,
  `s_md5` varchar(255) DEFAULT NULL,
  `s_content` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `statics`
--

INSERT INTO `statics` (`id`, `s_title`, `s_slug`, `s_type`, `s_md5`, `s_content`, `created_at`, `updated_at`) VALUES
(1, 'Hướng dẫn chi tiết mua hàng', NULL, 1, NULL, '<p>Khi mua h&agrave;ng bạn k&iacute;ch chọn size sản phẩm</p>\r\n\r\n<p>Tiếp theo đ&oacute; k&iacute;ch v&agrave;o mua ngay&nbsp;</p>', '2020-11-20 16:48:17', '2020-11-20 16:48:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tst_user_id` int(11) NOT NULL DEFAULT 0,
  `tst_total_money` int(11) NOT NULL DEFAULT 0,
  `tst_name` varchar(255) DEFAULT NULL,
  `tst_code` varchar(50) NOT NULL,
  `tst_email` varchar(255) DEFAULT NULL,
  `tst_phone` varchar(255) DEFAULT NULL,
  `tst_address` varchar(255) DEFAULT NULL,
  `tst_note` varchar(255) DEFAULT NULL,
  `tst_status` tinyint(4) NOT NULL DEFAULT 1,
  `tst_type` tinyint(4) NOT NULL DEFAULT 1 COMMENT ' 1 thanh toan thuong, 2 la thanh toan online',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `transactions`
--

INSERT INTO `transactions` (`id`, `tst_user_id`, `tst_total_money`, `tst_name`, `tst_code`, `tst_email`, `tst_phone`, `tst_address`, `tst_note`, `tst_status`, `tst_type`, `created_at`, `updated_at`) VALUES
(10, 4, 140000, 'Hiếu Programming Đẹp Giai', '69VJPuVSg6IFyKK', 'truongngoctanhieu2018@gmail.com', '0932023992', 'dsadsad', 'dadsd', 1, 1, '2021-09-04 12:31:52', NULL),
(11, 4, 98000, 'Hiếu Programming Đẹp Giai', 'w4tNV2D0Gj8kGqb', 'truongngoctanhieu2018@gmail.com', '0932023992', 'dsadsad', 'dasdasdas', 1, 1, '2021-09-04 12:34:07', NULL),
(12, 34, 158000, 'Minh Khanh', 'gID8cBMzfnh4Osi', 'minhkhanh@gmail.com', '037575713213', '123 Long an', NULL, 1, 1, '2022-01-07 14:01:39', NULL),
(13, 37, 64000, 'Minh Dương', 'MZxPjKlQLPmtaEW', 'minhduong@gmail.com', '9437284632', '3213', '321', 1, 1, '2022-01-07 14:51:43', NULL),
(14, 40, 75000, 'Khánh Minh', 'i835f9laIpEY4jf', 'minhkhanhchanel@gmail.com', '0354543135', '123 Gò Vấp', NULL, 3, 1, '2022-01-08 08:38:21', '2023-05-26 08:12:05'),
(15, 43, 273000, 'Nguyễn Thành Trung', 'Tl9uvvrbxTA81fH', 'thanhtrung@gmail.com', '0999999998', '55A Điện Biên Phủ TP Hồ Chí Minh', 'OK', 3, 1, '2023-05-26 08:42:26', '2023-05-26 08:50:54'),
(16, 44, 1905000, 'Nguyễn Tấn Bảo', 'U3aUCQ9AzFQTqyI', 'nguyentanbao@gmail.com', '0999999995', '55A Điện Biên Phủ TP Hồ Chí Minh', 'OK', 3, 1, '2023-05-26 15:51:39', '2023-05-26 15:55:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `t_name` varchar(255) DEFAULT NULL,
  `t_slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `types`
--

INSERT INTO `types` (`id`, `t_name`, `t_slug`, `created_at`, `updated_at`) VALUES
(1, 'Khối lượng', 'khoi-luong', '2020-11-20 16:48:39', '2020-11-20 16:48:39'),
(2, 'Đơn vị', 'don-vi', '2020-11-20 16:48:39', '2020-11-20 16:48:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `log_login` text DEFAULT NULL,
  `count_comment` tinyint(4) NOT NULL DEFAULT 0,
  `address` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `google_id` varchar(50) DEFAULT NULL,
  `facebook_id` varchar(50) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `log_login`, `count_comment`, `address`, `avatar`, `google_id`, `facebook_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(34, 'Minh Khanh', 'minhkhanh@gmail.com', NULL, '$2y$10$aA0To1xYapIqk4.bmSsAAe9p9n4iGAXtYnm6WAnQYKf2NkBSfNRKW', '037575713213', NULL, 0, NULL, NULL, NULL, NULL, NULL, '2022-01-07 14:00:35', NULL),
(36, 'Minh Thái', 'minhthai@gmail.com', NULL, '$2y$10$MA1dE0zHKmBh/559L4WQDOpiRabbG7.sLvxwSjAge2bWfIsjEIusi', '0375754147', NULL, 0, NULL, NULL, NULL, NULL, NULL, '2022-01-07 14:34:57', NULL),
(37, 'Minh Dương', 'minhduong@gmail.com', NULL, '$2y$10$wHqjnF1KZkiephAY77gXfebuXJrGh/MT5UkUy6UZAAX8sLb.Gxe0W', '9437284632', NULL, 0, NULL, NULL, NULL, NULL, NULL, '2022-01-07 14:35:40', NULL),
(38, 'Minh Châu', 'minhchau@gmail.com', NULL, '$2y$10$wHqjnF1KZkiephAY77gXfebuXJrGh/MT5UkUy6UZAAX8sLb.Gxe0W', '0364543134', NULL, 0, NULL, NULL, NULL, NULL, NULL, '2022-01-07 14:35:40', NULL),
(39, 'Minh Mạnh', 'minhmanh@gmail.com', NULL, '$2y$10$wHqjnF1KZkiephAY77gXfebuXJrGh/MT5UkUy6UZAAX8sLb.Gxe0W', '03765323323', NULL, 0, NULL, NULL, NULL, NULL, NULL, '2022-01-07 14:35:40', NULL),
(41, 'Khánh Minh', 'minhkhanhchanel@gmail.com', NULL, 'eyJpdiI6IjlobDg5SHRcL3kzbThiNENQT0g4eVp3PT0iLCJ2YWx1ZSI6InZBbnk2b3lnWE9MYU1GQlwvdGxPS3k0RFp0ckdXYmdkTmo5bjFvV3YzQ1lzPSIsIm1hYyI6ImQ0NTQ5NzI2ODM5YTkyMzMwN2YxMjU1ODQ5NzAzMzE0Mjc0ZTZlZDRlNmFjZjI5YTIyZjYyZDY4NGIzZGY2ZTEifQ==', '', NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-01-08 08:53:24', '2022-01-08 08:53:24'),
(42, 'Test', 'test@gmail.com', NULL, '$2y$10$BoPGELpUVlF.vuadQ00eIe181EqWxcp8XEGo6u/VB8cMtf9d7HU6i', '0999999999', NULL, 1, NULL, NULL, NULL, NULL, NULL, '2023-05-26 08:16:57', NULL),
(43, 'Nguyễn Thành Trung', 'thanhtrung@gmail.com', NULL, '$2y$10$Ssi9yBfL2BzusM5VbeQ1.OX02ytVcbhXMV93Ya3fDJmOBkNSpQBg2', '0999999998', NULL, 1, '225 Điện Biên Phủ Bình Thạnh HCM', NULL, NULL, NULL, NULL, '2023-05-26 08:40:47', '2023-05-26 08:44:35'),
(44, 'Nguyễn Tấn Bảo', 'nguyentanbao@gmail.com', NULL, '$2y$10$zs5hUTVABMQyaRLDQ6EXoOLQlCloJUI0hz11CSlBnpV3Auax2Sfmi', '0999999995', NULL, 0, '225 Điện Biên Phủ Bình Thạnh HCM', NULL, NULL, NULL, NULL, '2023-05-26 15:49:20', '2023-05-26 15:51:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_favourite`
--

CREATE TABLE `user_favourite` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uf_product_id` int(11) NOT NULL DEFAULT 0,
  `uf_user_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_favourite`
--

INSERT INTO `user_favourite` (`id`, `uf_product_id`, `uf_user_id`) VALUES
(4, 5, 44);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_phone_unique` (`phone`);

--
-- Chỉ mục cho bảng `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_a_slug_index` (`a_slug`),
  ADD KEY `articles_a_hot_index` (`a_hot`),
  ADD KEY `articles_a_active_index` (`a_active`),
  ADD KEY `articles_a_menu_id_index` (`a_menu_id`);

--
-- Chỉ mục cho bảng `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attributes_atb_name_unique` (`atb_name`),
  ADD KEY `attributes_atb_type_id_index` (`atb_type_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_c_slug_unique` (`c_slug`),
  ADD KEY `categories_c_parent_id_index` (`c_parent_id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_cmt_parent_id_index` (`cmt_parent_id`),
  ADD KEY `comments_cmt_product_id_index` (`cmt_product_id`),
  ADD KEY `comments_cmt_admin_id_index` (`cmt_admin_id`),
  ADD KEY `comments_cmt_user_id_index` (`cmt_user_id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `discount_code`
--
ALTER TABLE `discount_code`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `discount_code_d_code_unique` (`d_code`);

--
-- Chỉ mục cho bảng `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `keywords_k_slug_unique` (`k_slug`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_mn_slug_unique` (`mn_slug`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `producer`
--
ALTER TABLE `producer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `producer_pdr_slug_unique` (`pdr_slug`),
  ADD UNIQUE KEY `producer_pdr_email_unique` (`pdr_email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_pro_slug_unique` (`pro_slug`),
  ADD KEY `products_pro_hot_index` (`pro_hot`),
  ADD KEY `products_pro_active_index` (`pro_active`);

--
-- Chỉ mục cho bảng `products_attributes`
--
ALTER TABLE `products_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_attributes_pa_product_id_index` (`pa_product_id`),
  ADD KEY `products_attributes_pa_attribute_id_index` (`pa_attribute_id`);

--
-- Chỉ mục cho bảng `products_keywords`
--
ALTER TABLE `products_keywords`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_keywords_pk_product_id_index` (`pk_product_id`),
  ADD KEY `products_keywords_pk_keyword_id_index` (`pk_keyword_id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `statics`
--
ALTER TABLE `statics`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_tst_user_id_index` (`tst_user_id`);

--
-- Chỉ mục cho bảng `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `types_t_name_unique` (`t_name`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Chỉ mục cho bảng `user_favourite`
--
ALTER TABLE `user_favourite`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_favourite_uf_product_id_uf_user_id_unique` (`uf_product_id`,`uf_user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `discount_code`
--
ALTER TABLE `discount_code`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `keywords`
--
ALTER TABLE `keywords`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `producer`
--
ALTER TABLE `producer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `products_attributes`
--
ALTER TABLE `products_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT cho bảng `products_keywords`
--
ALTER TABLE `products_keywords`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `statics`
--
ALTER TABLE `statics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `user_favourite`
--
ALTER TABLE `user_favourite`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
