-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 18, 2018 lúc 12:04 PM
-- Phiên bản máy phục vụ: 10.1.22-MariaDB
-- Phiên bản PHP: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `t3h_do_an`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `is_view` bit(1) DEFAULT NULL,
  `is_update` bit(1) DEFAULT NULL,
  `is_created` bit(1) DEFAULT NULL,
  `is_delete` bit(1) DEFAULT NULL,
  `is_export` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`, `is_view`, `is_update`, `is_created`, `is_delete`, `is_export`) VALUES
('Admin', '1', 1533261697, NULL, NULL, NULL, NULL, NULL),
('Admin', '8', 1533658509, NULL, NULL, NULL, NULL, NULL),
('DMC', '11', 1535453003, NULL, NULL, NULL, NULL, NULL),
('DMC', '14', 1533261781, NULL, NULL, NULL, NULL, NULL),
('DMC', '2', 1536947724, NULL, NULL, NULL, NULL, NULL),
('DMC', '8', 1533658509, NULL, NULL, NULL, NULL, NULL),
('NV-CV', '11', 1535453003, NULL, NULL, NULL, NULL, NULL),
('NV-CV', '20', 1533261837, NULL, NULL, NULL, NULL, NULL),
('NV-CV', '8', 1533658509, NULL, NULL, NULL, NULL, NULL),
('NV-HSVB', '11', 1535453003, NULL, NULL, NULL, NULL, NULL),
('NV-HSVB', '21', 1533261843, NULL, NULL, NULL, NULL, NULL),
('NV-HSVB', '8', 1533658509, NULL, NULL, NULL, NULL, NULL),
('NV-KH', '11', 1535453004, NULL, NULL, NULL, NULL, NULL),
('NV-KH', '23', 1533261872, NULL, NULL, NULL, NULL, NULL),
('NV-KH', '8', 1533658509, NULL, NULL, NULL, NULL, NULL),
('NV-NS', '11', 1535453004, NULL, NULL, NULL, NULL, NULL),
('NV-NS', '2', 1536951020, NULL, NULL, NULL, NULL, NULL),
('NV-NS', '8', 1533268650, NULL, NULL, NULL, NULL, NULL),
('NV-VPP', '11', 1535453004, NULL, NULL, NULL, NULL, NULL),
('NV-VPP', '22', 1533261866, NULL, NULL, NULL, NULL, NULL),
('NV-VPP', '8', 1533658510, NULL, NULL, NULL, NULL, NULL),
('PP-CV', '11', 1535453004, NULL, NULL, NULL, NULL, NULL),
('PP-CV', '8', 1533658510, NULL, NULL, NULL, NULL, NULL),
('PP-HSVB', '11', 1535453004, NULL, NULL, NULL, NULL, NULL),
('PP-HSVB', '8', 1533658510, NULL, NULL, NULL, NULL, NULL),
('PP-KH', '11', 1535453004, NULL, NULL, NULL, NULL, NULL),
('PP-KH', '8', 1533658510, NULL, NULL, NULL, NULL, NULL),
('PP-NS', '11', 1535453004, NULL, NULL, NULL, NULL, NULL),
('PP-NS', '8', 1533658510, NULL, NULL, NULL, NULL, NULL),
('PP-VPP', '11', 1535453004, NULL, NULL, NULL, NULL, NULL),
('PP-VPP', '8', 1533658510, NULL, NULL, NULL, NULL, NULL),
('PVT', '11', 1535453004, NULL, NULL, NULL, NULL, NULL),
('PVT', '8', 1533658510, NULL, NULL, NULL, NULL, NULL),
('PVT-CV', '11', 1535453004, NULL, NULL, NULL, NULL, NULL),
('PVT-CV', '17', 1533261804, NULL, NULL, NULL, NULL, NULL),
('PVT-CV', '8', 1533658510, NULL, NULL, NULL, NULL, NULL),
('PVT-HSVB', '11', 1535453005, NULL, NULL, NULL, NULL, NULL),
('PVT-HSVB', '18', 1533261814, NULL, NULL, NULL, NULL, NULL),
('PVT-HSVB', '8', 1533658510, NULL, NULL, NULL, NULL, NULL),
('PVT-KH', '11', 1535453005, NULL, NULL, NULL, NULL, NULL),
('PVT-KH', '16', 1533261798, NULL, NULL, NULL, NULL, NULL),
('PVT-KH', '8', 1533658510, NULL, NULL, NULL, NULL, NULL),
('PVT-NS', '11', 1535453005, NULL, NULL, NULL, NULL, NULL),
('PVT-NS', '15', 1533261788, NULL, NULL, NULL, NULL, NULL),
('PVT-NS', '8', 1533658510, NULL, NULL, NULL, NULL, NULL),
('PVT-VPP', '11', 1535453005, NULL, NULL, NULL, NULL, NULL),
('PVT-VPP', '19', 1533261828, NULL, NULL, NULL, NULL, NULL),
('PVT-VPP', '25', 1533261888, NULL, NULL, NULL, NULL, NULL),
('PVT-VPP', '8', 1533658510, NULL, NULL, NULL, NULL, NULL),
('TP', '11', 1535453005, NULL, NULL, NULL, NULL, NULL),
('TP', '8', 1533658510, NULL, NULL, NULL, NULL, NULL),
('TP-CV', '11', 1535453005, NULL, NULL, NULL, NULL, NULL),
('TP-CV', '8', 1533658510, NULL, NULL, NULL, NULL, NULL),
('TP-HSVB', '11', 1535453005, NULL, NULL, NULL, NULL, NULL),
('TP-HSVB', '8', 1533658510, NULL, NULL, NULL, NULL, NULL),
('TP-VPP', '11', 1535453005, NULL, NULL, NULL, NULL, NULL),
('TP-VPP', '8', 1533658510, NULL, NULL, NULL, NULL, NULL),
('V-NS', '11', 1535453005, NULL, NULL, NULL, NULL, NULL),
('V-NS', '24', 1533283001, NULL, NULL, NULL, NULL, NULL),
('V-NS', '8', 1533658510, NULL, NULL, NULL, NULL, NULL),
('VT', '11', 1535453005, NULL, NULL, NULL, NULL, NULL),
('VT', '8', 1533658510, NULL, NULL, NULL, NULL, NULL),
('VT-CV', '11', 1535453005, NULL, NULL, NULL, NULL, NULL),
('VT-CV', '12', 1533261765, NULL, NULL, NULL, NULL, NULL),
('VT-CV', '8', 1533658510, NULL, NULL, NULL, NULL, NULL),
('VT-HSVB', '10', 1533261746, NULL, NULL, NULL, NULL, NULL),
('VT-HSVB', '11', 1535453005, NULL, NULL, NULL, NULL, NULL),
('VT-HSVB', '8', 1533658510, NULL, NULL, NULL, NULL, NULL),
('VT-KH', '11', 1533261754, NULL, NULL, NULL, NULL, NULL),
('VT-KH', '8', 1533658510, NULL, NULL, NULL, NULL, NULL),
('VT-NS', '11', 1535453005, NULL, NULL, NULL, NULL, NULL),
('VT-NS', '8', 1533658510, NULL, NULL, NULL, NULL, NULL),
('VT-NS', '9', 1533261714, NULL, NULL, NULL, NULL, NULL),
('VT-VPP', '11', 1535453005, NULL, NULL, NULL, NULL, NULL),
('VT-VPP', '13', 1533261775, NULL, NULL, NULL, NULL, NULL),
('VT-VPP', '8', 1533658510, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/*', 2, NULL, NULL, NULL, 1532422185, 1532422185),
('/bo-nhiem-can-bo/*', 2, NULL, NULL, NULL, 1525945743, 1525945743),
('/bo-nhiem-can-bo/bo-nhiem', 2, NULL, NULL, NULL, 1525945743, 1525945743),
('/bo-nhiem-can-bo/index', 2, NULL, NULL, NULL, 1525945743, 1525945743),
('/cap-phat-van-phong-pham/*', 2, NULL, NULL, NULL, 1525945743, 1525945743),
('/cap-phat-van-phong-pham/cap-phat-vpp-chi-tiet', 2, NULL, NULL, NULL, 1525945743, 1525945743),
('/cap-phat-van-phong-pham/chi-tiet-vpp', 2, NULL, NULL, NULL, 1525945743, 1525945743),
('/cap-phat-van-phong-pham/create', 2, NULL, NULL, NULL, 1525945743, 1525945743),
('/cap-phat-van-phong-pham/create-chi-tiet', 2, NULL, NULL, NULL, 1525945743, 1525945743),
('/cap-phat-van-phong-pham/delete', 2, NULL, NULL, NULL, 1525945743, 1525945743),
('/cap-phat-van-phong-pham/index', 2, NULL, NULL, NULL, 1525945743, 1525945743),
('/cap-phat-van-phong-pham/update', 2, NULL, NULL, NULL, 1525945743, 1525945743),
('/cap-phat-van-phong-pham/update-chi-tiet', 2, NULL, NULL, NULL, 1525945743, 1525945743),
('/cap-phat-van-phong-pham/view', 2, NULL, NULL, NULL, 1525945743, 1525945743),
('/chuc-vu/*', 2, NULL, NULL, NULL, 1525945743, 1525945743),
('/chuc-vu/create', 2, NULL, NULL, NULL, 1525945743, 1525945743),
('/chuc-vu/delete', 2, NULL, NULL, NULL, 1525945743, 1525945743),
('/chuc-vu/index', 2, NULL, NULL, NULL, 1525945743, 1525945743),
('/chuc-vu/update', 2, NULL, NULL, NULL, 1525945743, 1525945743),
('/chuc-vu/view', 2, NULL, NULL, NULL, 1525945743, 1525945743),
('/cong-viec/*', 2, NULL, NULL, NULL, 1532422179, 1532422179),
('/cong-viec/ban-giao-cong-viec', 2, NULL, NULL, NULL, 1532422179, 1532422179),
('/cong-viec/chua-giao', 2, NULL, NULL, NULL, 1532422178, 1532422178),
('/cong-viec/cong-viec-duoc-giao', 2, NULL, NULL, NULL, 1532422178, 1532422178),
('/cong-viec/da-hoan-thanh', 2, NULL, NULL, NULL, 1532422179, 1532422179),
('/cong-viec/danh-gia-tien-do', 2, NULL, NULL, NULL, 1532422179, 1532422179),
('/cong-viec/delete', 2, NULL, NULL, NULL, 1532422178, 1532422178),
('/cong-viec/dieu-chinh', 2, NULL, NULL, NULL, 1532422178, 1532422178),
('/cong-viec/hoan-thanh-cong-viec', 2, NULL, NULL, NULL, 1532422179, 1532422179),
('/cong-viec/quan-ly-cong-viec-giao', 2, NULL, NULL, NULL, 1532422178, 1532422178),
('/cong-viec/tai-tep-tin', 2, NULL, NULL, NULL, 1532422179, 1532422179),
('/cong-viec/tao-cong-viec', 2, NULL, NULL, NULL, 1532422178, 1532422178),
('/cong-viec/tien-do-cong-viec', 2, NULL, NULL, NULL, 1532422179, 1532422179),
('/cong-viec/tra-lai-cong-viec', 2, NULL, NULL, NULL, 1532422179, 1532422179),
('/cong-viec/view', 2, NULL, NULL, NULL, 1532422178, 1532422178),
('/cong-viec/xem-tien-do', 2, NULL, NULL, NULL, 1532422179, 1532422179),
('/cong-viec/xoa-tien-do', 2, NULL, NULL, NULL, 1532422179, 1532422179),
('/dan-toc/*', 2, NULL, NULL, NULL, 1525945743, 1525945743),
('/dan-toc/create', 2, NULL, NULL, NULL, 1525945743, 1525945743),
('/dan-toc/delete', 2, NULL, NULL, NULL, 1525945743, 1525945743),
('/dan-toc/index', 2, NULL, NULL, NULL, 1525945743, 1525945743),
('/dan-toc/update', 2, NULL, NULL, NULL, 1525945743, 1525945743),
('/dan-toc/view', 2, NULL, NULL, NULL, 1525945743, 1525945743),
('/danh-muc-chung/*', 2, NULL, NULL, NULL, 1532422182, 1532422182),
('/danh-muc-chung/chuc-vu', 2, NULL, NULL, NULL, 1532422180, 1532422180),
('/danh-muc-chung/dan-toc', 2, NULL, NULL, NULL, 1532422180, 1532422180),
('/danh-muc-chung/danh-sach-chuc-vu', 2, NULL, NULL, NULL, 1532422179, 1532422179),
('/danh-muc-chung/danh-sach-nhan-su', 2, NULL, NULL, NULL, 1532422179, 1532422179),
('/danh-muc-chung/danh-sach-quan-huyen', 2, NULL, NULL, NULL, 1532422179, 1532422179),
('/danh-muc-chung/danh-sach-so', 2, NULL, NULL, NULL, 1532422179, 1532422179),
('/danh-muc-chung/danh-sach-xa-phuong', 2, NULL, NULL, NULL, 1532422180, 1532422180),
('/danh-muc-chung/delete', 2, NULL, NULL, NULL, 1532422181, 1532422181),
('/danh-muc-chung/gia-dinh-chinh-sach', 2, NULL, NULL, NULL, 1532422181, 1532422181),
('/danh-muc-chung/index', 2, NULL, NULL, NULL, 1532422179, 1532422179),
('/danh-muc-chung/loai-hinh-nghi-phep', 2, NULL, NULL, NULL, 1532422181, 1532422181),
('/danh-muc-chung/loai-ho-so', 2, NULL, NULL, NULL, 1532422181, 1532422181),
('/danh-muc-chung/ly-luan-chinh-tri', 2, NULL, NULL, NULL, 1532422180, 1532422180),
('/danh-muc-chung/nhom-so', 2, NULL, NULL, NULL, 1532422181, 1532422181),
('/danh-muc-chung/phong-ban', 2, NULL, NULL, NULL, 1532422180, 1532422180),
('/danh-muc-chung/quan-he-gia-dinh', 2, NULL, NULL, NULL, 1532422181, 1532422181),
('/danh-muc-chung/quan-huyen', 2, NULL, NULL, NULL, 1532422179, 1532422179),
('/danh-muc-chung/quan-ly-nha-nuoc', 2, NULL, NULL, NULL, 1532422180, 1532422180),
('/danh-muc-chung/so', 2, NULL, NULL, NULL, 1532422181, 1532422181),
('/danh-muc-chung/sua-chuc-vu', 2, NULL, NULL, NULL, 1532422180, 1532422180),
('/danh-muc-chung/sua-dan-toc', 2, NULL, NULL, NULL, 1532422180, 1532422180),
('/danh-muc-chung/sua-gia-dinh-chinh-sach', 2, NULL, NULL, NULL, 1532422181, 1532422181),
('/danh-muc-chung/sua-loai-hinh-nghi-phep', 2, NULL, NULL, NULL, 1532422181, 1532422181),
('/danh-muc-chung/sua-loai-ho-so', 2, NULL, NULL, NULL, 1532422182, 1532422182),
('/danh-muc-chung/sua-ly-luan-chinh-tri', 2, NULL, NULL, NULL, 1532422180, 1532422180),
('/danh-muc-chung/sua-nhom-so', 2, NULL, NULL, NULL, 1532422181, 1532422181),
('/danh-muc-chung/sua-phong-ban', 2, NULL, NULL, NULL, 1532422180, 1532422180),
('/danh-muc-chung/sua-quan-he-gia-dinh', 2, NULL, NULL, NULL, 1532422181, 1532422181),
('/danh-muc-chung/sua-quan-huyen', 2, NULL, NULL, NULL, 1532422179, 1532422179),
('/danh-muc-chung/sua-quan-ly-nha-nuoc', 2, NULL, NULL, NULL, 1532422181, 1532422181),
('/danh-muc-chung/sua-so', 2, NULL, NULL, NULL, 1532422181, 1532422181),
('/danh-muc-chung/sua-tinh-thanh', 2, NULL, NULL, NULL, 1532422179, 1532422179),
('/danh-muc-chung/sua-ton-giao', 2, NULL, NULL, NULL, 1532422180, 1532422180),
('/danh-muc-chung/sua-trinh-do', 2, NULL, NULL, NULL, 1532422180, 1532422180),
('/danh-muc-chung/sua-xa-phuong', 2, NULL, NULL, NULL, 1532422180, 1532422180),
('/danh-muc-chung/them-chuc-vu', 2, NULL, NULL, NULL, 1532422180, 1532422180),
('/danh-muc-chung/them-dan-toc', 2, NULL, NULL, NULL, 1532422180, 1532422180),
('/danh-muc-chung/them-gia-dinh-chinh-sach', 2, NULL, NULL, NULL, 1532422181, 1532422181),
('/danh-muc-chung/them-loai-hinh-nghi-phep', 2, NULL, NULL, NULL, 1532422181, 1532422181),
('/danh-muc-chung/them-loai-ho-so', 2, NULL, NULL, NULL, 1532422181, 1532422181),
('/danh-muc-chung/them-ly-luan-chinh-tri', 2, NULL, NULL, NULL, 1532422180, 1532422180),
('/danh-muc-chung/them-nhom-so', 2, NULL, NULL, NULL, 1532422181, 1532422181),
('/danh-muc-chung/them-phong-ban', 2, NULL, NULL, NULL, 1532422180, 1532422180),
('/danh-muc-chung/them-quan-he-gia-dinh', 2, NULL, NULL, NULL, 1532422181, 1532422181),
('/danh-muc-chung/them-quan-huyen', 2, NULL, NULL, NULL, 1532422179, 1532422179),
('/danh-muc-chung/them-quan-ly-nha-nuoc', 2, NULL, NULL, NULL, 1532422181, 1532422181),
('/danh-muc-chung/them-so', 2, NULL, NULL, NULL, 1532422181, 1532422181),
('/danh-muc-chung/them-tinh-thanh', 2, NULL, NULL, NULL, 1532422179, 1532422179),
('/danh-muc-chung/them-ton-giao', 2, NULL, NULL, NULL, 1532422180, 1532422180),
('/danh-muc-chung/them-trinh-do', 2, NULL, NULL, NULL, 1532422180, 1532422180),
('/danh-muc-chung/them-xa-phuong', 2, NULL, NULL, NULL, 1532422179, 1532422179),
('/danh-muc-chung/tinh-thanh', 2, NULL, NULL, NULL, 1532422179, 1532422179),
('/danh-muc-chung/ton-giao', 2, NULL, NULL, NULL, 1532422180, 1532422180),
('/danh-muc-chung/trinh-do', 2, NULL, NULL, NULL, 1532422180, 1532422180),
('/danh-muc-chung/xa-phuong', 2, NULL, NULL, NULL, 1532422179, 1532422179),
('/danh-muc-chung/xem-chuc-vu', 2, NULL, NULL, NULL, 1532422180, 1532422180),
('/danh-muc-chung/xem-dan-toc', 2, NULL, NULL, NULL, 1532422180, 1532422180),
('/danh-muc-chung/xem-gia-dinh-chinh-sach', 2, NULL, NULL, NULL, 1532422181, 1532422181),
('/danh-muc-chung/xem-loai-hinh-nghi-phep', 2, NULL, NULL, NULL, 1532422181, 1532422181),
('/danh-muc-chung/xem-loai-ho-so', 2, NULL, NULL, NULL, 1532422181, 1532422181),
('/danh-muc-chung/xem-ly-luan-chinh-tri', 2, NULL, NULL, NULL, 1532422180, 1532422180),
('/danh-muc-chung/xem-nhom-so', 2, NULL, NULL, NULL, 1532422181, 1532422181),
('/danh-muc-chung/xem-phong-ban', 2, NULL, NULL, NULL, 1532422180, 1532422180),
('/danh-muc-chung/xem-quan-he-gia-dinh', 2, NULL, NULL, NULL, 1532422181, 1532422181),
('/danh-muc-chung/xem-quan-huyen', 2, NULL, NULL, NULL, 1532422179, 1532422179),
('/danh-muc-chung/xem-quan-ly-nha-nuoc', 2, NULL, NULL, NULL, 1532422181, 1532422181),
('/danh-muc-chung/xem-so', 2, NULL, NULL, NULL, 1532422181, 1532422181),
('/danh-muc-chung/xem-tinh-thanh', 2, NULL, NULL, NULL, 1532422179, 1532422179),
('/danh-muc-chung/xem-ton-giao', 2, NULL, NULL, NULL, 1532422180, 1532422180),
('/danh-muc-chung/xem-trinh-do', 2, NULL, NULL, NULL, 1532422180, 1532422180),
('/danh-muc-chung/xem-xa-phuong', 2, NULL, NULL, NULL, 1532422179, 1532422179),
('/danh-muc-chung/xoa-chuc-vu', 2, NULL, NULL, NULL, 1532422180, 1532422180),
('/danh-muc-chung/xoa-dan-toc', 2, NULL, NULL, NULL, 1532422180, 1532422180),
('/danh-muc-chung/xoa-gia-dinh-chinh-sach', 2, NULL, NULL, NULL, 1532422181, 1532422181),
('/danh-muc-chung/xoa-loai-hinh-nghi-phep', 2, NULL, NULL, NULL, 1532422181, 1532422181),
('/danh-muc-chung/xoa-loai-ho-so', 2, NULL, NULL, NULL, 1532422182, 1532422182),
('/danh-muc-chung/xoa-ly-luan-chinh-tri', 2, NULL, NULL, NULL, 1532422180, 1532422180),
('/danh-muc-chung/xoa-phong-ban', 2, NULL, NULL, NULL, 1532422180, 1532422180),
('/danh-muc-chung/xoa-quan-he-gia-dinh', 2, NULL, NULL, NULL, 1532422181, 1532422181),
('/danh-muc-chung/xoa-quan-huyen', 2, NULL, NULL, NULL, 1532422179, 1532422179),
('/danh-muc-chung/xoa-quan-ly-nha-nuoc', 2, NULL, NULL, NULL, 1532422181, 1532422181),
('/danh-muc-chung/xoa-so', 2, NULL, NULL, NULL, 1532422181, 1532422181),
('/danh-muc-chung/xoa-tinh-thanh', 2, NULL, NULL, NULL, 1532422179, 1532422179),
('/danh-muc-chung/xoa-ton-giao', 2, NULL, NULL, NULL, 1532422180, 1532422180),
('/danh-muc-chung/xoa-trinh-do', 2, NULL, NULL, NULL, 1532422180, 1532422180),
('/danh-muc-chung/xoa-xa-phuong', 2, NULL, NULL, NULL, 1532422180, 1532422180),
('/de-nghi-mua-vpp/*', 2, NULL, NULL, NULL, 1525945744, 1525945744),
('/de-nghi-mua-vpp/create', 2, NULL, NULL, NULL, 1525945743, 1525945743),
('/de-nghi-mua-vpp/delete', 2, NULL, NULL, NULL, 1525945744, 1525945744),
('/de-nghi-mua-vpp/index', 2, NULL, NULL, NULL, 1525945743, 1525945743),
('/de-nghi-mua-vpp/update', 2, NULL, NULL, NULL, 1525945743, 1525945743),
('/de-nghi-mua-vpp/view', 2, NULL, NULL, NULL, 1525945743, 1525945743),
('/elfinder/*', 2, NULL, NULL, NULL, 1532422182, 1532422182),
('/elfinder/ckeditor', 2, NULL, NULL, NULL, 1532422182, 1532422182),
('/elfinder/connector', 2, NULL, NULL, NULL, 1532422182, 1532422182),
('/elfinder/input', 2, NULL, NULL, NULL, 1532422182, 1532422182),
('/elfinder/tinymce', 2, NULL, NULL, NULL, 1532422182, 1532422182),
('/gia-dinh-chinh-sach/*', 2, NULL, NULL, NULL, 1525945767, 1525945767),
('/gia-dinh-chinh-sach/create', 2, NULL, NULL, NULL, 1525945767, 1525945767),
('/gia-dinh-chinh-sach/delete', 2, NULL, NULL, NULL, 1525945767, 1525945767),
('/gia-dinh-chinh-sach/index', 2, NULL, NULL, NULL, 1525945767, 1525945767),
('/gia-dinh-chinh-sach/update', 2, NULL, NULL, NULL, 1525945767, 1525945767),
('/gia-dinh-chinh-sach/view', 2, NULL, NULL, NULL, 1525945767, 1525945767),
('/ho-so-trinh-ky/*', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/ho-so-trinh-ky/chuyen-van-ban', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/ho-so-trinh-ky/create', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/ho-so-trinh-ky/delete', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/ho-so-trinh-ky/index', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/ho-so-trinh-ky/update', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/ho-so-trinh-ky/view', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/ho-so/*', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/ho-so/ban-giao-viec', 2, NULL, NULL, NULL, 1532422183, 1532422183),
('/ho-so/chua-xu-ly', 2, NULL, NULL, NULL, 1532422182, 1532422182),
('/ho-so/create', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/ho-so/danh-sach-ho-so-van-ban-den', 2, NULL, NULL, NULL, 1532422182, 1532422182),
('/ho-so/danh-sach-ho-so-van-ban-den-chua-xu-ly', 2, NULL, NULL, NULL, 1532422182, 1532422182),
('/ho-so/danh-sach-ho-so-van-ban-den-moi', 2, NULL, NULL, NULL, 1532422182, 1532422182),
('/ho-so/danh-sach-ho-so-van-ban-di', 2, NULL, NULL, NULL, 1532422182, 1532422182),
('/ho-so/danh-sach-ho-so-van-ban-di-chua-xu-ly', 2, NULL, NULL, NULL, 1532422182, 1532422182),
('/ho-so/danh-sach-ho-so-van-ban-di-moi', 2, NULL, NULL, NULL, 1532422182, 1532422182),
('/ho-so/danh-sach-so', 2, NULL, NULL, NULL, 1532422182, 1532422182),
('/ho-so/delete', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/ho-so/download', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/ho-so/duyet-ho-so', 2, NULL, NULL, NULL, 1532422182, 1532422182),
('/ho-so/giao-xu-ly', 2, NULL, NULL, NULL, 1532422182, 1532422182),
('/ho-so/ho-so-dang-xu-ly', 2, NULL, NULL, NULL, 1532422182, 1532422182),
('/ho-so/ho-so-van-ban-da-hoan-thanh', 2, NULL, NULL, NULL, 1532422182, 1532422182),
('/ho-so/ho-so-van-ban-den-da-hoan-thanh', 2, NULL, NULL, NULL, 1532422182, 1532422182),
('/ho-so/ho-so-van-ban-den-dang-xu-ly', 2, NULL, NULL, NULL, 1532422182, 1532422182),
('/ho-so/ho-so-van-ban-di-da-hoan-thanh', 2, NULL, NULL, NULL, 1532422182, 1532422182),
('/ho-so/ho-so-van-ban-di-dang-xu-ly', 2, NULL, NULL, NULL, 1532422182, 1532422182),
('/ho-so/ho-so-van-ban-trinh-lanh-dao-den', 2, NULL, NULL, NULL, 1532422182, 1532422182),
('/ho-so/ho-so-van-ban-trinh-lanh-dao-di', 2, NULL, NULL, NULL, 1532422182, 1532422182),
('/ho-so/index', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/ho-so/khong-duyet-ho-so', 2, NULL, NULL, NULL, 1532422182, 1532422182),
('/ho-so/khong-phe-duyet-hoan-thanh-ho-so-van-ban', 2, NULL, NULL, NULL, 1532422182, 1532422182),
('/ho-so/phe-duyet-ho-so-van-ban', 2, NULL, NULL, NULL, 1532422182, 1532422182),
('/ho-so/phe-duyet-hoan-thanh-ho-so-van-ban', 2, NULL, NULL, NULL, 1532422182, 1532422182),
('/ho-so/tra-lai-ho-so', 2, NULL, NULL, NULL, 1532422183, 1532422183),
('/ho-so/trinh-lanh-dao', 2, NULL, NULL, NULL, 1532422182, 1532422182),
('/ho-so/trinh-lanh-dao-van-ban-di', 2, NULL, NULL, NULL, 1532422182, 1532422182),
('/ho-so/trinh-phe-duyet', 2, NULL, NULL, NULL, 1532422182, 1532422182),
('/ho-so/trinh-phe-duyet-van-ban-di', 2, NULL, NULL, NULL, 1532422183, 1532422183),
('/ho-so/tu-xu-ly', 2, NULL, NULL, NULL, 1532422182, 1532422182),
('/ho-so/update', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/ho-so/update-lanh-dao', 2, NULL, NULL, NULL, 1532422182, 1532422182),
('/ho-so/view', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/ho-so/view-lanh-dao', 2, NULL, NULL, NULL, 1532422182, 1532422182),
('/ho-so/xem-ho-so-bi-tra-lai-chi-tiet', 2, NULL, NULL, NULL, 1532422182, 1532422182),
('/ho-so/xem-ho-so-chi-tiet', 2, NULL, NULL, NULL, 1532422182, 1532422182),
('/ho-so/xem-ho-so-dang-xu-ly-chi-tiet', 2, NULL, NULL, NULL, 1532422182, 1532422182),
('/ke-hoach/*', 2, NULL, NULL, NULL, 1532422183, 1532422183),
('/ke-hoach/chuyen-duyet-ke-hoach', 2, NULL, NULL, NULL, 1532422183, 1532422183),
('/ke-hoach/danh-muc-moi', 2, NULL, NULL, NULL, 1532422183, 1532422183),
('/ke-hoach/delete', 2, NULL, NULL, NULL, 1532422183, 1532422183),
('/ke-hoach/duyet-ke-hoach', 2, NULL, NULL, NULL, 1532422183, 1532422183),
('/ke-hoach/ke-hoach-chi-tiet', 2, NULL, NULL, NULL, 1532422183, 1532422183),
('/ke-hoach/ke-hoach-chua-duyet', 2, NULL, NULL, NULL, 1532422183, 1532422183),
('/ke-hoach/ke-hoach-da-duyet', 2, NULL, NULL, NULL, 1532422183, 1532422183),
('/ke-hoach/ke-hoach-khong-duyet', 2, NULL, NULL, NULL, 1532422183, 1532422183),
('/ke-hoach/khong-duyet-ke-hoach', 2, NULL, NULL, NULL, 1532422183, 1532422183),
('/ke-hoach/lap-ke-hoach', 2, NULL, NULL, NULL, 1532422183, 1532422183),
('/ke-hoach/sua-ke-hoach-chi-tiet', 2, NULL, NULL, NULL, 1532422183, 1532422183),
('/ke-hoach/tao-ke-hoach-chi-tiet', 2, NULL, NULL, NULL, 1532422183, 1532422183),
('/ke-hoach/update', 2, NULL, NULL, NULL, 1532422183, 1532422183),
('/loai-hinh-nghi-phep/*', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/loai-hinh-nghi-phep/create', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/loai-hinh-nghi-phep/delete', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/loai-hinh-nghi-phep/index', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/loai-hinh-nghi-phep/update', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/loai-hinh-nghi-phep/view', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/loai-ho-so/*', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/loai-ho-so/create', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/loai-ho-so/delete', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/loai-ho-so/index', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/loai-ho-so/update', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/loai-ho-so/view', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/luan-chuyen-can-bo/*', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/luan-chuyen-can-bo/create', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/luan-chuyen-can-bo/delete', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/luan-chuyen-can-bo/index', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/luan-chuyen-can-bo/luan-chuyen', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/luan-chuyen-can-bo/update', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/ly-luan-chinh-tri/*', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/ly-luan-chinh-tri/create', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/ly-luan-chinh-tri/delete', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/ly-luan-chinh-tri/index', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/ly-luan-chinh-tri/update', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/ly-luan-chinh-tri/view', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/moi-quan-he-gia-dinh/*', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/moi-quan-he-gia-dinh/create', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/moi-quan-he-gia-dinh/delete', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/moi-quan-he-gia-dinh/index', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/moi-quan-he-gia-dinh/update', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/moi-quan-he-gia-dinh/view', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/nhan-su/*', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/nhan-su/bo-nhiem', 2, NULL, NULL, NULL, 1532422184, 1532422184),
('/nhan-su/bo-nhiem-can-bo', 2, NULL, NULL, NULL, 1532422184, 1532422184),
('/nhan-su/create', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/nhan-su/da-nghi-viec', 2, NULL, NULL, NULL, 1532422184, 1532422184),
('/nhan-su/danh-muc-nghi-viec', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/nhan-su/delete', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/nhan-su/hoan-tac', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/nhan-su/index', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/nhan-su/luan-chuyen', 2, NULL, NULL, NULL, 1532422184, 1532422184),
('/nhan-su/luan-chuyen-can-bo', 2, NULL, NULL, NULL, 1532422184, 1532422184),
('/nhan-su/mien-nhiem', 2, NULL, NULL, NULL, 1532422184, 1532422184),
('/nhan-su/mien-nhiem-can-bo', 2, NULL, NULL, NULL, 1532422184, 1532422184),
('/nhan-su/nghi-viec', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/nhan-su/nghi-viec-view', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/nhan-su/qua-trinh-cong-tac', 2, NULL, NULL, NULL, 1532422183, 1532422183),
('/nhan-su/qua-trinh-dao-tao-boi-duong', 2, NULL, NULL, NULL, 1532422183, 1532422183),
('/nhan-su/qua-trinh-khen-thuong-ky-luat', 2, NULL, NULL, NULL, 1532422184, 1532422184),
('/nhan-su/qua-trinh-luong', 2, NULL, NULL, NULL, 1532422183, 1532422183),
('/nhan-su/qua-trinh-nghi-phep', 2, NULL, NULL, NULL, 1532422184, 1532422184),
('/nhan-su/quan-he-gia-dinh', 2, NULL, NULL, NULL, 1532422183, 1532422183),
('/nhan-su/sua-ban-than', 2, NULL, NULL, NULL, 1532422183, 1532422183),
('/nhan-su/sua-dao-tao-boi-duong', 2, NULL, NULL, NULL, 1532422183, 1532422183),
('/nhan-su/sua-khen-thuong', 2, NULL, NULL, NULL, 1532422184, 1532422184),
('/nhan-su/sua-ky-luat', 2, NULL, NULL, NULL, 1532422184, 1532422184),
('/nhan-su/sua-luan-chuyen', 2, NULL, NULL, NULL, 1532422184, 1532422184),
('/nhan-su/sua-luong', 2, NULL, NULL, NULL, 1532422183, 1532422183),
('/nhan-su/sua-nghi-phep', 2, NULL, NULL, NULL, 1532422184, 1532422184),
('/nhan-su/sua-phu-cap', 2, NULL, NULL, NULL, 1532422183, 1532422183),
('/nhan-su/sua-qua-trinh-cong-tac', 2, NULL, NULL, NULL, 1532422183, 1532422183),
('/nhan-su/sua-vo-chong', 2, NULL, NULL, NULL, 1532422183, 1532422183),
('/nhan-su/tao-tai-khoan', 2, NULL, NULL, NULL, 1532422184, 1532422184),
('/nhan-su/them-ban-than', 2, NULL, NULL, NULL, 1532422183, 1532422183),
('/nhan-su/them-khen-thuong', 2, NULL, NULL, NULL, 1532422184, 1532422184),
('/nhan-su/them-ky-luat', 2, NULL, NULL, NULL, 1532422184, 1532422184),
('/nhan-su/them-luan-chuyen', 2, NULL, NULL, NULL, 1532422184, 1532422184),
('/nhan-su/them-luong', 2, NULL, NULL, NULL, 1532422183, 1532422183),
('/nhan-su/them-moi-dao-tao-boi-duong', 2, NULL, NULL, NULL, 1532422183, 1532422183),
('/nhan-su/them-nghi-phep', 2, NULL, NULL, NULL, 1532422184, 1532422184),
('/nhan-su/them-phu-cap', 2, NULL, NULL, NULL, 1532422183, 1532422183),
('/nhan-su/them-qua-trinh-cong-tac', 2, NULL, NULL, NULL, 1532422183, 1532422183),
('/nhan-su/them-vo-chong', 2, NULL, NULL, NULL, 1532422183, 1532422183),
('/nhan-su/thong-ke-khen-thuong-ky-luat', 2, NULL, NULL, NULL, 1532422184, 1532422184),
('/nhan-su/thong-ke-khen-thuong-ky-luat-xem', 2, NULL, NULL, NULL, 1532422184, 1532422184),
('/nhan-su/thong-ke-nghi-che-do', 2, NULL, NULL, NULL, 1532422184, 1532422184),
('/nhan-su/thong-ke-nghi-che-do-xem', 2, NULL, NULL, NULL, 1532422184, 1532422184),
('/nhan-su/thong-ke-trinh-do', 2, NULL, NULL, NULL, 1532422184, 1532422184),
('/nhan-su/thong-ke-trinh-do-mot-phan', 2, NULL, NULL, NULL, 1532422184, 1532422184),
('/nhan-su/thong-ke-trinh-do-toan-bo', 2, NULL, NULL, NULL, 1532422184, 1532422184),
('/nhan-su/update', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/nhan-su/view', 2, NULL, NULL, NULL, 1525945768, 1525945768),
('/nhan-su/xem-nghi-viec', 2, NULL, NULL, NULL, 1532422184, 1532422184),
('/nhan-su/xoa-ban-than', 2, NULL, NULL, NULL, 1532422183, 1532422183),
('/nhan-su/xoa-dao-tao-boi-duong', 2, NULL, NULL, NULL, 1532422183, 1532422183),
('/nhan-su/xoa-khen-thuong', 2, NULL, NULL, NULL, 1532422184, 1532422184),
('/nhan-su/xoa-ky-luat', 2, NULL, NULL, NULL, 1532422184, 1532422184),
('/nhan-su/xoa-luan-chuyen', 2, NULL, NULL, NULL, 1532422184, 1532422184),
('/nhan-su/xoa-luong', 2, NULL, NULL, NULL, 1532422183, 1532422183),
('/nhan-su/xoa-nghi-phep', 2, NULL, NULL, NULL, 1532422184, 1532422184),
('/nhan-su/xoa-phu-cap', 2, NULL, NULL, NULL, 1532422184, 1532422184),
('/nhan-su/xoa-qua-trinh-cong-tac', 2, NULL, NULL, NULL, 1532422183, 1532422183),
('/nhan-su/xoa-vo-chong', 2, NULL, NULL, NULL, 1532422183, 1532422183),
('/phan-hoi/*', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/phan-hoi/index', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/phan-hoi/view', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/phong-ban/*', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/phong-ban/create', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/phong-ban/delete', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/phong-ban/index', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/phong-ban/update', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/phong-ban/view', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/phuong-xa/*', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/phuong-xa/create', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/phuong-xa/danh-sach', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/phuong-xa/delete', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/phuong-xa/index', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/phuong-xa/update', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/phuong-xa/view', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/qua-trinh-cong-tac/*', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/qua-trinh-cong-tac/create', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/qua-trinh-cong-tac/delete', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/qua-trinh-cong-tac/index', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/qua-trinh-cong-tac/update', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/qua-trinh-cong-tac/view', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/qua-trinh-dao-tao-boi-duong/*', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/qua-trinh-dao-tao-boi-duong/create', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/qua-trinh-dao-tao-boi-duong/delete', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/qua-trinh-dao-tao-boi-duong/index', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/qua-trinh-dao-tao-boi-duong/update', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/qua-trinh-dao-tao-boi-duong/view', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/qua-trinh-khen-thuong-ky-luat/*', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/qua-trinh-khen-thuong-ky-luat/create', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/qua-trinh-khen-thuong-ky-luat/create-ky-luat', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/qua-trinh-khen-thuong-ky-luat/delete', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/qua-trinh-khen-thuong-ky-luat/delete-ky-luat', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/qua-trinh-khen-thuong-ky-luat/index', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/qua-trinh-khen-thuong-ky-luat/update', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/qua-trinh-khen-thuong-ky-luat/update-ky-luat', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/qua-trinh-luong/*', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/qua-trinh-luong/create', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/qua-trinh-luong/create-phu-cap', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/qua-trinh-luong/delete', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/qua-trinh-luong/delete-phu-cap', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/qua-trinh-luong/index', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/qua-trinh-luong/update', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/qua-trinh-luong/update-phu-cap', 2, NULL, NULL, NULL, 1525945769, 1525945769),
('/qua-trinh-nghi-phep/*', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/qua-trinh-nghi-phep/create', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/qua-trinh-nghi-phep/delete', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/qua-trinh-nghi-phep/index', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/qua-trinh-nghi-phep/update', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/qua-trinh-nghi-phep/view', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/quan-he-gia-dinh/*', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/quan-he-gia-dinh/create-ban-than', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/quan-he-gia-dinh/create-vo-chong', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/quan-he-gia-dinh/delete-ban-than', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/quan-he-gia-dinh/delete-vo-chong', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/quan-he-gia-dinh/index', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/quan-he-gia-dinh/update-ban-than', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/quan-he-gia-dinh/update-vo-chong', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/quan-huyen/*', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/quan-huyen/create', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/quan-huyen/danh-sach', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/quan-huyen/delete', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/quan-huyen/index', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/quan-huyen/update', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/quan-huyen/view', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/quan-ly-nha-nuoc/*', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/quan-ly-nha-nuoc/create', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/quan-ly-nha-nuoc/delete', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/quan-ly-nha-nuoc/index', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/quan-ly-nha-nuoc/update', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/quan-ly-nha-nuoc/view', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/site/*', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/site/about', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/site/captcha', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/site/change-password', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/site/contact', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/site/error', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/site/index', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/site/login', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/site/logout', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/thong-ke-nhan-su/*', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/thong-ke-nhan-su/khen-thuong-ky-luat', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/thong-ke-nhan-su/khen-thuong-ky-luat-view', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/thong-ke-nhan-su/nghi-phep', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/thong-ke-nhan-su/nghi-phep-view', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/thong-ke-nhan-su/trinh-do', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/thong-ke-nhan-su/trinh-do-all', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/thong-ke-nhan-su/trinh-do-view', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/thong-ke-vpp/*', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/thong-ke-vpp/cap-phat', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/thong-ke-vpp/cap-phat-view', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/thong-ke-vpp/mua', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/thong-ke-vpp/mua-view', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/thong-ke-vpp/tong-hop', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/thong-ke-vpp/tong-hop-view', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/tinh-thanh/*', 2, NULL, NULL, NULL, 1525945771, 1525945771),
('/tinh-thanh/create', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/tinh-thanh/delete', 2, NULL, NULL, NULL, 1525945771, 1525945771),
('/tinh-thanh/index', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/tinh-thanh/update', 2, NULL, NULL, NULL, 1525945771, 1525945771),
('/tinh-thanh/view', 2, NULL, NULL, NULL, 1525945770, 1525945770),
('/ton-giao/*', 2, NULL, NULL, NULL, 1525945771, 1525945771),
('/ton-giao/create', 2, NULL, NULL, NULL, 1525945771, 1525945771),
('/ton-giao/delete', 2, NULL, NULL, NULL, 1525945771, 1525945771),
('/ton-giao/index', 2, NULL, NULL, NULL, 1525945771, 1525945771),
('/ton-giao/update', 2, NULL, NULL, NULL, 1525945771, 1525945771),
('/ton-giao/view', 2, NULL, NULL, NULL, 1525945771, 1525945771),
('/trinh-do-chuyen-mon/*', 2, NULL, NULL, NULL, 1525945771, 1525945771),
('/trinh-do-chuyen-mon/create', 2, NULL, NULL, NULL, 1525945771, 1525945771),
('/trinh-do-chuyen-mon/delete', 2, NULL, NULL, NULL, 1525945771, 1525945771),
('/trinh-do-chuyen-mon/index', 2, NULL, NULL, NULL, 1525945771, 1525945771),
('/trinh-do-chuyen-mon/update', 2, NULL, NULL, NULL, 1525945771, 1525945771),
('/trinh-do-chuyen-mon/view', 2, NULL, NULL, NULL, 1525945771, 1525945771),
('/user/*', 2, NULL, NULL, NULL, 1532422185, 1532422185),
('/user/create', 2, NULL, NULL, NULL, 1532422184, 1532422184),
('/user/delete', 2, NULL, NULL, NULL, 1532422184, 1532422184),
('/user/index', 2, NULL, NULL, NULL, 1532422184, 1532422184),
('/user/update', 2, NULL, NULL, NULL, 1532422184, 1532422184),
('/user/view', 2, NULL, NULL, NULL, 1532422184, 1532422184),
('/van-phong-pham/*', 2, NULL, NULL, NULL, 1525945771, 1525945771),
('/van-phong-pham/cap-phat', 2, NULL, NULL, NULL, 1532422185, 1532422185),
('/van-phong-pham/cap-phat-vpp-chi-tiet', 2, NULL, NULL, NULL, 1532422185, 1532422185),
('/van-phong-pham/chi-tiet-vpp', 2, NULL, NULL, NULL, 1532422185, 1532422185),
('/van-phong-pham/create', 2, NULL, NULL, NULL, 1525945771, 1525945771),
('/van-phong-pham/de-nghi-mua', 2, NULL, NULL, NULL, 1532422185, 1532422185),
('/van-phong-pham/delete', 2, NULL, NULL, NULL, 1525945771, 1525945771),
('/van-phong-pham/index', 2, NULL, NULL, NULL, 1525945771, 1525945771),
('/van-phong-pham/sua-cap-phat', 2, NULL, NULL, NULL, 1532422185, 1532422185),
('/van-phong-pham/sua-chi-tiet-cap-phat', 2, NULL, NULL, NULL, 1532422185, 1532422185),
('/van-phong-pham/sua-de-nghi-mua', 2, NULL, NULL, NULL, 1532422185, 1532422185),
('/van-phong-pham/them-cap-phat', 2, NULL, NULL, NULL, 1532422185, 1532422185),
('/van-phong-pham/them-chi-tiet-cap-phat', 2, NULL, NULL, NULL, 1532422185, 1532422185),
('/van-phong-pham/them-de-nghi-mua', 2, NULL, NULL, NULL, 1532422185, 1532422185),
('/van-phong-pham/thong-ke-cap-phat', 2, NULL, NULL, NULL, 1532422185, 1532422185),
('/van-phong-pham/thong-ke-mua', 2, NULL, NULL, NULL, 1532422185, 1532422185),
('/van-phong-pham/thong-ke-tong-hop', 2, NULL, NULL, NULL, 1532422185, 1532422185),
('/van-phong-pham/update', 2, NULL, NULL, NULL, 1525945771, 1525945771),
('/van-phong-pham/view', 2, NULL, NULL, NULL, 1525945771, 1525945771),
('/van-phong-pham/xem-de-nghi-mua', 2, NULL, NULL, NULL, 1532422185, 1532422185),
('/van-phong-pham/xem-thong-ke-cap-phat', 2, NULL, NULL, NULL, 1532422185, 1532422185),
('/van-phong-pham/xem-thong-ke-mua', 2, NULL, NULL, NULL, 1532422185, 1532422185),
('/van-phong-pham/xem-thong-ke-tong-hop', 2, NULL, NULL, NULL, 1532422185, 1532422185),
('/van-phong-pham/xoa-cap-phat', 2, NULL, NULL, NULL, 1532422185, 1532422185),
('/van-phong-pham/xoa-de-nghi-mua', 2, NULL, NULL, NULL, 1532422185, 1532422185),
('Admin', 1, 'Quyền admin', NULL, NULL, 1532916067, 1532916067),
('DMC', 1, 'Người quản  lý danh mục chung', NULL, NULL, 1532512479, 1532878513),
('NV-CV', 1, 'Nhân viên có quyền bên Công Việc', NULL, NULL, 1532513608, 1532970437),
('NV-HSVB', 1, 'Nhân viên có quyền bên hồ sơ văn bản', NULL, NULL, 1532513524, 1532878045),
('NV-KH', 1, 'Nhân viên có quyền bên Kế Hoạch', NULL, NULL, 1532513586, 1532878370),
('NV-NS', 1, 'Nhân viên có quyền phần quản lý nhân sự', NULL, NULL, 1532513489, 1532878379),
('NV-VPP', 1, 'Nhân viên có quyền bên văn phòng phẩm', NULL, NULL, 1532513556, 1532878392),
('PP-CV', 1, 'Phó phòng quyền công việc', NULL, NULL, 1532513774, 1532878401),
('PP-HSVB', 1, 'Phó Phòng quyền hồ sơ văn bản', NULL, NULL, 1532513738, 1532878419),
('PP-KH', 1, 'Phó phòng quyền kế hoạch', NULL, NULL, 1532513758, 1532878426),
('PP-NS', 1, 'Phó phòng quyền Nhân sự', NULL, NULL, 1532513720, 1532878432),
('PP-VPP', 1, 'Phó phòng quyền văn phòng phẩm', NULL, NULL, 1532513806, 1532878442),
('PVT', 1, 'Phó viện trưởng', NULL, NULL, 1533200896, 1533200896),
('PVT-CV', 1, 'Phó viện trường quyền công việc', NULL, NULL, 1532514088, 1532878451),
('PVT-HSVB', 1, 'Phó viện trưởng quyền hồ sơ văn bản', NULL, NULL, 1532514015, 1532878462),
('PVT-KH', 1, 'Phó viện trưởng quyền Kế hoạch', NULL, NULL, 1532514045, 1532878471),
('PVT-NS', 1, 'Phó viện trường quyền Nhân Sự', NULL, NULL, 1532513991, 1532878479),
('PVT-VPP', 1, 'Phó viện trưởng quyền Văn phòng phẩm', NULL, NULL, 1532514113, 1532878500),
('TP', 1, 'Trưởng phòng', NULL, NULL, 1533200919, 1533200919),
('TP-CV', 1, 'Trường phòng quyền Công Việc', NULL, NULL, 1532513932, 1532878528),
('TP-HSVB', 1, 'Trường phòng hồ sơ văn bản', NULL, NULL, 1532513851, 1532878522),
('TP-VPP', 1, 'Trường phòng quyền Văn Phòng Phẩm', NULL, NULL, 1532513957, 1532878549),
('V-NS', 1, 'Quyền nhân sự', NULL, NULL, 1533268959, 1533269895),
('VT', 1, 'Quyền viện trưởng', NULL, NULL, 1532417404, 1532878562),
('VT-CV', 1, 'Viện trưởng quyền Công Việc', NULL, NULL, 1532514231, 1532878567),
('VT-HSVB', 1, 'Viện trường quyền Hồ Sơ Văn Bản', NULL, NULL, 1532514158, 1532878579),
('VT-KH', 1, 'Viện trưởng quyền Kế Hoạch', NULL, NULL, 1532514212, 1532878587),
('VT-NS', 1, 'Viện trưởng quyền Nhân Sự', NULL, NULL, 1532514137, 1532878594),
('VT-VPP', 1, 'Viện trưởng quyền Văn Phòng Phẩm', NULL, NULL, 1532514185, 1532878602);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `phong_ban_id` int(11) DEFAULT NULL,
  `ten_chuc_nang` varchar(256) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`, `phong_ban_id`, `ten_chuc_nang`) VALUES
('DMC', '/danh-muc-chung/danh-sach-so', NULL, NULL),
('DMC', '/danh-muc-chung/danh-sach-xa-phuong', NULL, NULL),
('V-NS', 'NV-NS', NULL, NULL),
('V-NS', 'PP-NS', NULL, NULL),
('V-NS', 'PVT-NS', NULL, NULL),
('V-NS', 'VT-NS', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bien_che`
--

CREATE TABLE `bien_che` (
  `id` int(11) NOT NULL,
  `ten` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuc_vu`
--

CREATE TABLE `chuc_vu` (
  `id` int(11) NOT NULL,
  `ten_viet_tat` varchar(50) DEFAULT NULL,
  `ten_day_du` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chuc_vu`
--

INSERT INTO `chuc_vu` (`id`, `ten_viet_tat`, `ten_day_du`) VALUES
(1, 'truong-khoa', 'trưởng khoa'),
(2, 'VT', 'Viện trưởng'),
(3, 'NV', 'Nhân viên'),
(4, 'TP', 'Trưởng phòng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cong_viec`
--

CREATE TABLE `cong_viec` (
  `id` int(11) NOT NULL,
  `ten` varchar(400) DEFAULT NULL,
  `noi_dung` text,
  `nguoi_lap` int(11) DEFAULT NULL,
  `ngay_lap` datetime DEFAULT NULL,
  `ngay_bat_dau` datetime DEFAULT NULL,
  `ngay_ket_thuc` datetime DEFAULT NULL,
  `nguoi_thuc_hien` int(11) DEFAULT NULL,
  `trang_thai` int(11) DEFAULT NULL,
  `phong_ban_id` int(11) DEFAULT NULL,
  `ngay_hoan_thanh` datetime DEFAULT NULL,
  `ngay_xac_minh_hoan_thanh` datetime DEFAULT NULL,
  `yeu_cau_cong_viec` varchar(256) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `cong_viec`
--

INSERT INTO `cong_viec` (`id`, `ten`, `noi_dung`, `nguoi_lap`, `ngay_lap`, `ngay_bat_dau`, `ngay_ket_thuc`, `nguoi_thuc_hien`, `trang_thai`, `phong_ban_id`, `ngay_hoan_thanh`, `ngay_xac_minh_hoan_thanh`, `yeu_cau_cong_viec`) VALUES
(2, 'ádasd', '<p>&aacute;dasd</p>', 20, '2018-07-27 00:00:00', '2018-07-24 00:00:00', '2018-07-27 00:00:00', 8, 2, 14, NULL, NULL, '0'),
(3, 'Công việc B', '<p>sadasd</p>', 1, '2018-08-01 00:00:00', '2018-07-11 00:00:00', '2018-09-06 00:00:00', 8, 1, 14, NULL, NULL, '0'),
(4, 'Công việc A', '<p>sdas</p>', 8, '2018-08-26 00:00:00', '2018-08-13 00:00:00', '2018-08-16 00:00:00', 20, 1, 14, NULL, NULL, '0'),
(5, 'Công việc chưa giao', '<p>jnkk</p>', 8, '2018-08-27 00:00:00', '2018-07-01 00:00:00', '2018-08-22 00:00:00', 19, 1, 14, NULL, NULL, '0'),
(6, 'adasda', '<p>dasdasd&nbsp;</p>', 8, '2018-08-27 00:00:00', '2018-07-13 00:00:00', '2018-08-30 00:00:00', 12, 1, 14, NULL, NULL, '0'),
(7, 'aádasd', '<p>sadasdasd</p>', 8, '2018-08-28 00:00:00', '2018-07-11 00:00:00', '2018-07-26 00:00:00', 16, 1, NULL, NULL, NULL, '0'),
(8, 'sadasd', '<p>&aacute;dasdsad</p>', 8, '2018-08-28 00:00:00', '2018-01-07 00:00:00', '2018-02-23 00:00:00', NULL, 0, NULL, NULL, NULL, '0'),
(9, 'kiem tra', '<p>sdasd</p>', 8, '2018-08-28 00:00:00', '2018-07-17 00:00:00', '2018-07-18 00:00:00', 17, 1, NULL, NULL, NULL, '0'),
(10, ' đá asd ád', '<p>&aacute;dsadaa</p>', 8, '2018-08-28 00:00:00', '2018-07-11 00:00:00', '2018-07-18 00:00:00', NULL, 0, NULL, NULL, NULL, '1'),
(11, 'abc', '<p>&aacute;dsadasd</p>', 8, '2018-08-28 00:00:00', '2018-07-11 00:00:00', '2018-07-18 00:00:00', 9, 1, 14, NULL, NULL, '0'),
(12, 'ádasd', '<p>&aacute;dAdasd</p>', 8, '2018-08-28 00:00:00', '2018-07-11 00:00:00', '2018-07-18 00:00:00', 9, 1, 14, NULL, NULL, '0'),
(13, 'ádasd', '<p>&aacute;dasd</p>', 8, '2018-08-28 00:00:00', '2018-07-11 00:00:00', '2018-07-18 00:00:00', 12, 1, 14, NULL, NULL, '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cong_viec_danh_gia`
--

CREATE TABLE `cong_viec_danh_gia` (
  `id` int(11) NOT NULL,
  `noi_dung` text,
  `cong_viec_tien_do_id` int(11) DEFAULT NULL,
  `ngay_lap` datetime DEFAULT NULL,
  `nguoi_lap` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cong_viec_tien_do`
--

CREATE TABLE `cong_viec_tien_do` (
  `id` int(11) NOT NULL,
  `noi_dung` text,
  `nguoi_lap` int(11) DEFAULT NULL,
  `ngay_lap` datetime DEFAULT NULL,
  `tien_do` int(11) DEFAULT NULL,
  `tep_dinh_kem` varchar(256) DEFAULT NULL,
  `cong_viec_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `cong_viec_tien_do`
--

INSERT INTO `cong_viec_tien_do` (`id`, `noi_dung`, `nguoi_lap`, `ngay_lap`, `tien_do`, `tep_dinh_kem`, `cong_viec_id`) VALUES
(1, '', 8, '2018-08-08 00:00:00', 50, 'ifrad.vn.xlsx', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cong_viec_tra_lai`
--

CREATE TABLE `cong_viec_tra_lai` (
  `id` int(11) NOT NULL,
  `cong_viec_id` int(11) DEFAULT NULL,
  `ly_do_tra_lai` text,
  `ngay_lap` datetime DEFAULT NULL,
  `nguoi_lap` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dan_toc`
--

CREATE TABLE `dan_toc` (
  `id` int(11) NOT NULL,
  `ten` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `dan_toc`
--

INSERT INTO `dan_toc` (`id`, `ten`) VALUES
(1, 'Kinh'),
(2, 'Mường');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dien_bien_luong`
--

CREATE TABLE `dien_bien_luong` (
  `id` int(11) NOT NULL,
  `ngay_thang` datetime DEFAULT NULL,
  `ma_ngach` varchar(10) DEFAULT NULL,
  `he_so_luong` float DEFAULT NULL,
  `nhan_su_id` int(11) DEFAULT NULL,
  `ngach_cong_chu` varchar(50) DEFAULT NULL,
  `bac_luong` varchar(15) DEFAULT NULL,
  `muc_huong` varchar(4) DEFAULT NULL,
  `loai_nang_luong` varchar(256) DEFAULT NULL,
  `so_quyet_dinh` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `dien_bien_luong`
--

INSERT INTO `dien_bien_luong` (`id`, `ngay_thang`, `ma_ngach`, `he_so_luong`, `nhan_su_id`, `ngach_cong_chu`, `bac_luong`, `muc_huong`, `loai_nang_luong`, `so_quyet_dinh`) VALUES
(1, '2018-04-01 00:00:00', '03.101', 3.99, 1, 'Chuyên viên', '1/9', '100%', '', 'Quyết điịnh số 01/QĐ-TLNV'),
(2, '2018-04-20 00:00:00', '01.101', 4.23, 1, 'Chuyên viên chính', '1/6', '100%', 'Nâng lương trước thời hạn', 'Quyết điịnh số 04/2018/QĐ-TLNV'),
(3, '2017-03-01 00:00:00', 'mk', 3.4, 14, 'MK', '20000000', '', '', ''),
(4, '2017-03-01 00:00:00', 'ád', 4.3, 14, 'Đ', '20000000', '', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dien_bien_phu_cap`
--

CREATE TABLE `dien_bien_phu_cap` (
  `id` int(11) NOT NULL,
  `ten` varchar(256) DEFAULT NULL,
  `muc_huong` varchar(10) DEFAULT NULL,
  `tu_ngay` datetime DEFAULT NULL,
  `den_ngay` datetime DEFAULT NULL,
  `so_quyet_dinh` varchar(256) DEFAULT NULL,
  `nhan_su_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `dien_bien_phu_cap`
--

INSERT INTO `dien_bien_phu_cap` (`id`, `ten`, `muc_huong`, `tu_ngay`, `den_ngay`, `so_quyet_dinh`, `nhan_su_id`) VALUES
(1, 'Phụ cấp điện thoại', '100%', '2018-04-01 00:00:00', NULL, '', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giao_xu_ly`
--

CREATE TABLE `giao_xu_ly` (
  `id` int(6) NOT NULL,
  `chuc_vu_id` int(6) NOT NULL,
  `phong_ban_id` int(6) NOT NULL,
  `dien_giai` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ho_so_id` int(6) NOT NULL,
  `dinh_kem` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_bat_dau` date NOT NULL,
  `ngay_ket_thuc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ke_hoach`
--

CREATE TABLE `ke_hoach` (
  `id` int(11) NOT NULL,
  `so_hieu` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noi_dung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nguoi_tao` int(11) NOT NULL,
  `ngay_tao` date NOT NULL,
  `chuc_vu_id` int(11) DEFAULT NULL,
  `nguoi_ky` int(11) DEFAULT NULL,
  `loai_hinh` int(11) NOT NULL,
  `trang_thai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_hinh_nghi_phep`
--

CREATE TABLE `loai_hinh_nghi_phep` (
  `id` int(11) NOT NULL,
  `ten` varchar(256) DEFAULT NULL,
  `trang_thai` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loai_hinh_nghi_phep`
--

INSERT INTO `loai_hinh_nghi_phep` (`id`, `ten`, `trang_thai`) VALUES
(1, 'Nghỉ phép', 1),
(2, 'Nghỉ ốm', 1),
(3, 'Nghỉ thai sản', 1),
(5, 'Hộ khó khăn', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `luan_chuyen`
--

CREATE TABLE `luan_chuyen` (
  `id` int(11) NOT NULL,
  `nhan_su_id` int(11) DEFAULT NULL,
  `phong_ban_cu` int(11) DEFAULT NULL,
  `phong_ban_moi` int(11) DEFAULT NULL,
  `ngay_dieu_chinh` datetime DEFAULT NULL,
  `ngay_ap_dung` datetime DEFAULT NULL,
  `so_quyet_dinh` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `luan_chuyen`
--

INSERT INTO `luan_chuyen` (`id`, `nhan_su_id`, `phong_ban_cu`, `phong_ban_moi`, `ngay_dieu_chinh`, `ngay_ap_dung`, `so_quyet_dinh`) VALUES
(13, 1, 2, 1, '2018-04-20 00:00:00', '2018-04-01 00:00:00', ''),
(14, 39, 14, 15, '2018-09-10 00:00:00', '2018-09-11 00:00:00', 'as');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1523262185),
('m140506_102106_rbac_init', 1523262278),
('m140602_111327_create_menu_table', 1523262188),
('m160312_050000_create_user', 1523262189),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1523262278);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhan_su`
--

CREATE TABLE `nhan_su` (
  `id` int(11) NOT NULL,
  `ho_ten` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ten_khac` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngay_sinh` datetime DEFAULT NULL,
  `gioi_tinh` int(11) DEFAULT NULL,
  `que_quan_tinh_id` int(11) DEFAULT NULL,
  `que_quan_huyen_id` int(11) DEFAULT NULL,
  `que_quan_xa_id` int(11) DEFAULT NULL,
  `que_quan` varchar(300) DEFAULT NULL,
  `dan_toc_id` int(11) DEFAULT NULL,
  `ton_giao_id` int(11) DEFAULT NULL,
  `ho_khau_thuong_tru` varchar(500) DEFAULT NULL,
  `noi_o_hien_nay` varchar(500) DEFAULT NULL,
  `nghe_nghiep_khi_tuyen` varchar(500) DEFAULT NULL,
  `ngay_tuyen_dung` datetime DEFAULT NULL,
  `co_quan_tuyen_dung` varchar(500) DEFAULT NULL,
  `chuc_vu_id` int(11) DEFAULT NULL,
  `chuc_danh` varchar(255) DEFAULT NULL,
  `phong_ban_id` int(11) DEFAULT NULL,
  `cong_viec_chinh` varchar(300) DEFAULT NULL,
  `ngach_cong_chuc` varchar(256) DEFAULT NULL,
  `ma_ngach` varchar(35) DEFAULT NULL,
  `bac_luong` int(11) DEFAULT NULL,
  `he_so` float DEFAULT NULL,
  `ngay_huong` datetime DEFAULT NULL,
  `phu_cap_chuc_vu` float DEFAULT NULL,
  `phu_cap_khac` float DEFAULT NULL,
  `trinh_do_pho_thong` varchar(10) DEFAULT NULL,
  `trinh_do_chuyen_mon_id` int(11) DEFAULT NULL,
  `chuyen_nghanh` varchar(256) DEFAULT NULL,
  `ly_luan_chinh_tri_id` int(11) DEFAULT NULL,
  `quan_ly_nha_nuoc_id` int(11) DEFAULT NULL,
  `ngoai_ngu` varchar(256) DEFAULT NULL,
  `tin_hoc` varchar(256) DEFAULT NULL,
  `ngay_vao_dang` datetime DEFAULT NULL,
  `ngay_chinh_thuc` datetime DEFAULT NULL,
  `ngay_tham_gia_to_chuc_chinh_tri_xa_hoi` datetime DEFAULT NULL,
  `viec_lam_to_chuc_chinh_tri_xa_hoi` varchar(256) DEFAULT NULL,
  `ngay_nhap_ngu` datetime DEFAULT NULL,
  `ngay_xuat_ngu` datetime DEFAULT NULL,
  `quan_ham` varchar(50) DEFAULT NULL,
  `danh_hieu_phong_tang` varchar(256) DEFAULT NULL,
  `so_truong_cong_tac` varchar(500) DEFAULT NULL,
  `khen_thuong` varchar(256) DEFAULT NULL,
  `nam_khen_thuong` int(4) DEFAULT NULL,
  `ky_luat` varchar(256) DEFAULT NULL,
  `nam_ky_luat` int(4) DEFAULT NULL,
  `tinh_trang_suc_khoe` varchar(50) DEFAULT NULL,
  `chieu_cao` varchar(10) DEFAULT NULL,
  `can_nang` varchar(10) DEFAULT NULL,
  `nhom_mau` varchar(5) DEFAULT NULL,
  `hang_thuong_binh` varchar(10) DEFAULT NULL,
  `con_gia_dinh_chinh_sach_id` int(11) DEFAULT NULL,
  `so_chung_minh_nhan_dan` varchar(50) DEFAULT NULL,
  `ngay_cap` datetime DEFAULT NULL,
  `so_so_bhxh` varchar(50) DEFAULT NULL,
  `anh_nhan_vien` text,
  `khai_ro_bi_bat_bi_tu` text,
  `tham_gia_to_chuc_nuoc_ngoai` text,
  `than_nhan_o_nuoc_ngoai` text,
  `nghi_viec` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `phan_quyen` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhan_su`
--

INSERT INTO `nhan_su` (`id`, `ho_ten`, `ten_khac`, `ngay_sinh`, `gioi_tinh`, `que_quan_tinh_id`, `que_quan_huyen_id`, `que_quan_xa_id`, `que_quan`, `dan_toc_id`, `ton_giao_id`, `ho_khau_thuong_tru`, `noi_o_hien_nay`, `nghe_nghiep_khi_tuyen`, `ngay_tuyen_dung`, `co_quan_tuyen_dung`, `chuc_vu_id`, `chuc_danh`, `phong_ban_id`, `cong_viec_chinh`, `ngach_cong_chuc`, `ma_ngach`, `bac_luong`, `he_so`, `ngay_huong`, `phu_cap_chuc_vu`, `phu_cap_khac`, `trinh_do_pho_thong`, `trinh_do_chuyen_mon_id`, `chuyen_nghanh`, `ly_luan_chinh_tri_id`, `quan_ly_nha_nuoc_id`, `ngoai_ngu`, `tin_hoc`, `ngay_vao_dang`, `ngay_chinh_thuc`, `ngay_tham_gia_to_chuc_chinh_tri_xa_hoi`, `viec_lam_to_chuc_chinh_tri_xa_hoi`, `ngay_nhap_ngu`, `ngay_xuat_ngu`, `quan_ham`, `danh_hieu_phong_tang`, `so_truong_cong_tac`, `khen_thuong`, `nam_khen_thuong`, `ky_luat`, `nam_ky_luat`, `tinh_trang_suc_khoe`, `chieu_cao`, `can_nang`, `nhom_mau`, `hang_thuong_binh`, `con_gia_dinh_chinh_sach_id`, `so_chung_minh_nhan_dan`, `ngay_cap`, `so_so_bhxh`, `anh_nhan_vien`, `khai_ro_bi_bat_bi_tu`, `tham_gia_to_chuc_nuoc_ngoai`, `than_nhan_o_nuoc_ngoai`, `nghi_viec`, `user_id`, `phan_quyen`) VALUES
(39, 'Ngô Văn Điệp', 'DiepG', '1996-03-01 00:00:00', 1, 3, 42, 3, 'Phường Túc Duyên - Thành phố Cao Bằng - Tỉnh Cao Bằng', 1, 1, 'Lai xá - Kim chung - Hoài đức - Hà nội', 'Lai xá - Kim chung - Hoài đức - Hà nội', 'CNTT', '2018-09-01 00:00:00', 'Inno', 3, NULL, 15, NULL, NULL, NULL, 1000000, 3.4, '2018-06-08 00:00:00', 1000000, 1000000, '12/12', 4, 'CNTT', NULL, NULL, 'Toice', 'Tốt nghiệp ngành CNTT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '963258741', '2018-07-20 00:00:00', '', 'B612_20180819_091506_204.jpg', NULL, NULL, NULL, 1, NULL, NULL),
(40, 'Ngô Văn Điệp', 'DiepG', '1996-01-03 00:00:00', 1, 2, 31, 1, 'Phường Quán Triều - Thành phố Hà Giang - Tỉnh Hà Giang', 1, 1, 'Lai xá - Kim chung - Hoài đức - Hà nội', 'Lai xá - Kim chung - Hoài đức - Hà nội', 'CNTT', '2018-09-06 00:00:00', 'VIN', 3, NULL, 14, NULL, NULL, NULL, 1000000, 3.4, '2018-08-06 00:00:00', NULL, NULL, '12/12', 4, 'CNTT', NULL, NULL, 'Toice', 'Tốt nghiệp ngành CNTT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '96325874138', '2011-07-23 00:00:00', '123456789', 'B612_20180819_091506_204.jpg', NULL, NULL, NULL, 0, 2, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhan_xet_danh_gia`
--

CREATE TABLE `nhan_xet_danh_gia` (
  `id` int(11) NOT NULL,
  `ngay_danh_gia` datetime DEFAULT NULL,
  `noi_dung` text,
  `nhan_su_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong_ban`
--

CREATE TABLE `phong_ban` (
  `id` int(11) NOT NULL,
  `ten_viet_tat` varchar(50) DEFAULT NULL,
  `ten_day_du` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `phong_ban`
--

INSERT INTO `phong_ban` (`id`, `ten_viet_tat`, `ten_day_du`) VALUES
(14, 'NS', 'Phòng Nhân Sự'),
(15, 'KT', 'Phòng Kế Toán'),
(16, '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quan_huyen`
--

CREATE TABLE `quan_huyen` (
  `id` int(11) NOT NULL,
  `ma` varchar(50) DEFAULT NULL,
  `ten` varchar(256) DEFAULT NULL,
  `tinh_thanh_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `quan_huyen`
--

INSERT INTO `quan_huyen` (`id`, `ma`, `ten`, `tinh_thanh_id`) VALUES
(1, '001', 'Quận Ba Đình', 1),
(2, '002', 'Quận Hoàn Kiếm', 1),
(3, '003', 'Quận Tây Hồ', 1),
(4, '004', 'Quận Long Biên', 1),
(5, '005', 'Quận Cầu Giấy', 1),
(6, '006', 'Quận Đống Đa', 1),
(7, '007', 'Quận Hai Bà Trưng', 1),
(8, '008', 'Quận Hoàng Mai', 1),
(9, '009', 'Quận Thanh Xuân', 1),
(10, '016', 'Huyện Sóc Sơn', 1),
(11, '017', 'Huyện Đông Anh', 1),
(12, '018', 'Huyện Gia Lâm', 1),
(13, '019', 'Quận Nam Từ Liêm', 1),
(14, '020', 'Huyện Thanh Trì', 1),
(15, '021', 'Quận Bắc Từ Liêm', 1),
(16, '250', 'Huyện Mê Linh', 1),
(17, '268', 'Quận Hà Đông', 1),
(18, '269', 'Thị xã Sơn Tây', 1),
(19, '271', 'Huyện Ba Vì', 1),
(20, '272', 'Huyện Phúc Thọ', 1),
(21, '273', 'Huyện Đan Phượng', 1),
(22, '274', 'Huyện Hoài Đức', 1),
(23, '275', 'Huyện Quốc Oai', 1),
(24, '276', 'Huyện Thạch Thất', 1),
(25, '277', 'Huyện Chương Mỹ', 1),
(26, '278', 'Huyện Thanh Oai', 1),
(27, '279', 'Huyện Thường Tín', 1),
(28, '280', 'Huyện Phú Xuyên', 1),
(29, '281', 'Huyện Ứng Hòa', 1),
(30, '282', 'Huyện Mỹ Đức', 1),
(31, '024', 'Thành phố Hà Giang', 2),
(32, '026', 'Huyện Đồng Văn', 2),
(33, '027', 'Huyện Mèo Vạc', 2),
(34, '028', 'Huyện Yên Minh', 2),
(35, '029', 'Huyện Quản Bạ', 2),
(36, '030', 'Huyện Vị Xuyên', 2),
(37, '031', 'Huyện Bắc Mê', 2),
(38, '032', 'Huyện Hoàng Su Phì', 2),
(39, '033', 'Huyện Xín Mần', 2),
(40, '034', 'Huyện Bắc Quang', 2),
(41, '035', 'Huyện Quang Bình', 2),
(42, '040', 'Thành phố Cao Bằng', 3),
(43, '042', 'Huyện Bảo Lâm', 3),
(44, '043', 'Huyện Bảo Lạc', 3),
(45, '044', 'Huyện Thông Nông', 3),
(46, '045', 'Huyện Hà Quảng', 3),
(47, '046', 'Huyện Trà Lĩnh', 3),
(48, '047', 'Huyện Trùng Khánh', 3),
(49, '048', 'Huyện Hạ Lang', 3),
(50, '049', 'Huyện Quảng Uyên', 3),
(51, '050', 'Huyện Phục Hoà', 3),
(52, '051', 'Huyện Hoà An', 3),
(53, '052', 'Huyện Nguyên Bình', 3),
(54, '053', 'Huyện Thạch An', 3),
(55, '058', 'Thành Phố Bắc Kạn', 4),
(56, '060', 'Huyện Pác Nặm', 4),
(57, '061', 'Huyện Ba Bể', 4),
(58, '062', 'Huyện Ngân Sơn', 4),
(59, '063', 'Huyện Bạch Thông', 4),
(60, '064', 'Huyện Chợ Đồn', 4),
(61, '065', 'Huyện Chợ Mới', 4),
(62, '066', 'Huyện Na Rì', 4),
(63, '070', 'Thành phố Tuyên Quang', 5),
(64, '071', 'Huyện Lâm Bình', 5),
(65, '072', 'Huyện Nà Hang', 5),
(66, '073', 'Huyện Chiêm Hóa', 5),
(67, '074', 'Huyện Hàm Yên', 5),
(68, '075', 'Huyện Yên Sơn', 5),
(69, '076', 'Huyện Sơn Dương', 5),
(70, '080', 'Thành phố Lào Cai', 6),
(71, '082', 'Huyện Bát Xát', 6),
(72, '083', 'Huyện Mường Khương', 6),
(73, '084', 'Huyện Si Ma Cai', 6),
(74, '085', 'Huyện Bắc Hà', 6),
(75, '086', 'Huyện Bảo Thắng', 6),
(76, '087', 'Huyện Bảo Yên', 6),
(77, '088', 'Huyện Sa Pa', 6),
(78, '089', 'Huyện Văn Bàn', 6),
(79, '164', 'Thành phố Thái Nguyên', 12),
(80, '165', 'Thành phố Sông Công', 12),
(81, '167', 'Huyện Định Hóa', 12),
(82, '168', 'Huyện Phú Lương', 12),
(83, '169', 'Huyện Đồng Hỷ', 12),
(84, '170', 'Huyện Võ Nhai', 12),
(85, '171', 'Huyện Đại Từ', 12),
(86, '172', 'Thị xã Phổ Yên', 12),
(87, '173', 'Huyện Phú Bình', 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `qua_trinh_cong_tac`
--

CREATE TABLE `qua_trinh_cong_tac` (
  `id` int(11) NOT NULL,
  `nhan_su_id` int(11) DEFAULT NULL,
  `tu_ngay` datetime DEFAULT NULL,
  `den_ngay` datetime DEFAULT NULL,
  `qua_trinh_cong_tac` text,
  `bien_che` varchar(256) DEFAULT NULL,
  `chu_vu_id` int(11) DEFAULT NULL,
  `chuc_danh` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `qua_trinh_cong_tac`
--

INSERT INTO `qua_trinh_cong_tac` (`id`, `nhan_su_id`, `tu_ngay`, `den_ngay`, `qua_trinh_cong_tac`, `bien_che`, `chu_vu_id`, `chuc_danh`) VALUES
(1, 1, '2018-04-01 00:00:00', '2018-04-30 00:00:00', 'Kiểm tra, kiểm tra,Kiểm tra, kiểm tra, Kiểm tra, kiểm tra, Kiểm tra, kiểm tra, Kiểm tra, kiểm tra, Kiểm tra, kiểm tra, Kiểm tra, kiểm tra, Kiểm tra, kiểm tra', 'Viên chức', 2, 'Thành viên công đoàn'),
(2, 1, '2018-03-01 00:00:00', '2018-04-01 00:00:00', 'Kiểm tra, kiểm traKiểm tra, kiểm traKiểm tra, kiểm traKiểm tra, kiểm traKiểm tra, kiểm traKiểm tra, kiểm traKiểm tra, kiểm traKiểm tra, kiểm traKiểm tra, kiểm traKiểm tra, kiểm tra Kiểm tra, kiểm traKiểm tra, kiểm traKiểm tra, kiểm traKiểm tra, kiểm tra Kiểm tra, kiểm traKiểm tra, kiểm tra', 'Thử việc', 2, ''),
(3, 14, '2015-07-24 00:00:00', '2016-07-24 00:00:00', 'Công ty TNHH và giải pháp công nghệ INNO tech', '', 3, 'Nhân Viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `qua_trinh_dao_tao_boi_duong`
--

CREATE TABLE `qua_trinh_dao_tao_boi_duong` (
  `id` int(11) NOT NULL,
  `ten_truong` varchar(256) DEFAULT NULL,
  `chuyen_nganh` varchar(256) DEFAULT NULL,
  `tu_ngay` datetime DEFAULT NULL,
  `den_ngay` datetime DEFAULT NULL,
  `hinh_thuc_dao_tao` varchar(256) DEFAULT NULL,
  `van_bang` varchar(256) DEFAULT NULL,
  `nhan_su_id` int(11) DEFAULT NULL,
  `trinh_do_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `qua_trinh_dao_tao_boi_duong`
--

INSERT INTO `qua_trinh_dao_tao_boi_duong` (`id`, `ten_truong`, `chuyen_nganh`, `tu_ngay`, `den_ngay`, `hinh_thuc_dao_tao`, `van_bang`, `nhan_su_id`, `trinh_do_id`) VALUES
(1, 'Đại học Bách Khoa Hà Nội', 'Công nghệ thông tin', '2016-01-02 00:00:00', '2018-04-30 00:00:00', 'Tập trung', 'Đại học', 1, 3),
(32, 'Đại học Bách khoa', 'Quản trị doanh Nghiệp', '2015-03-01 00:00:00', '2017-09-05 00:00:00', 'Tâp trung', 'Thạc sỹ', 1, 2),
(33, 'Đại học Lâm nghiệp Việt Nam', 'Hệ thống thông tin', '2014-07-24 00:00:00', '2018-07-24 00:00:00', 'Tập trung', 'Chính quy', 14, 1),
(34, 'Đại học Lâm nghiệp Việt Nam', 'Hệ thống thông tin', '2018-08-26 00:00:00', '2018-08-28 00:00:00', 'Tập trung', 'Chính quy', 15, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `qua_trinh_nghi_phep`
--

CREATE TABLE `qua_trinh_nghi_phep` (
  `id` int(11) NOT NULL,
  `nhan_su_id` int(11) DEFAULT NULL,
  `loai_hinh_nghi_phep_id` int(11) DEFAULT NULL,
  `tu_ngay` datetime DEFAULT NULL,
  `den_ngay` datetime DEFAULT NULL,
  `ly_do` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `qua_trinh_nghi_phep`
--

INSERT INTO `qua_trinh_nghi_phep` (`id`, `nhan_su_id`, `loai_hinh_nghi_phep_id`, `tu_ngay`, `den_ngay`, `ly_do`) VALUES
(1, 1, 1, '2018-05-09 00:00:00', '2018-05-09 00:00:00', 'Nhà có việc riêng.\r\nNghỉ phép 01 ngày.'),
(2, 1, 1, '2018-04-01 00:00:00', '2018-04-03 00:00:00', 'Việc riêng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinh_thanh`
--

CREATE TABLE `tinh_thanh` (
  `id` int(11) NOT NULL,
  `ma` varchar(50) DEFAULT NULL,
  `ten` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tinh_thanh`
--

INSERT INTO `tinh_thanh` (`id`, `ma`, `ten`) VALUES
(2, '02', 'Tỉnh Hà Giang'),
(3, '04', 'Tỉnh Cao Bằng'),
(4, '06', 'Tỉnh Bắc Kạn'),
(5, '08', 'Tỉnh Tuyên Quang'),
(6, '10', 'Tỉnh Lào Cai'),
(7, '11', 'Tỉnh Điện Biên'),
(8, '12', 'Tỉnh Lai Châu'),
(9, '14', 'Tỉnh Sơn La'),
(10, '15', 'Tỉnh Yên Bái'),
(11, '17', 'Tỉnh Hoà Bình'),
(12, '19', 'Tỉnh Thái Nguyên'),
(13, '20', 'Tỉnh Lạng Sơn'),
(14, '22', 'Tỉnh Quảng Ninh'),
(15, '24', 'Tỉnh Bắc Giang'),
(16, '25', 'Tỉnh Phú Thọ'),
(17, '26', 'Tỉnh Vĩnh Phúc'),
(18, '27', 'Tỉnh Bắc Ninh'),
(19, '30', 'Tỉnh Hải Dương'),
(20, '31', 'Thành phố Hải Phòng'),
(21, '33', 'Tỉnh Hưng Yên'),
(22, '34', 'Tỉnh Thái Bình'),
(23, '35', 'Tỉnh Hà Nam'),
(24, '36', 'Tỉnh Nam Định'),
(25, '37', 'Tỉnh Ninh Bình'),
(26, '38', 'Tỉnh Thanh Hóa'),
(27, '40', 'Tỉnh Nghệ An'),
(28, '42', 'Tỉnh Hà Tĩnh'),
(29, '44', 'Tỉnh Quảng Bình'),
(30, '45', 'Tỉnh Quảng Trị'),
(31, '46', 'Tỉnh Thừa Thiên Huế'),
(32, '48', 'Thành phố Đà Nẵng'),
(33, '49', 'Tỉnh Quảng Nam'),
(34, '51', 'Tỉnh Quảng Ngãi'),
(35, '52', 'Tỉnh Bình Định'),
(36, '54', 'Tỉnh Phú Yên'),
(37, '56', 'Tỉnh Khánh Hòa'),
(38, '58', 'Tỉnh Ninh Thuận'),
(39, '60', 'Tỉnh Bình Thuận'),
(40, '62', 'Tỉnh Kon Tum'),
(41, '64', 'Tỉnh Gia Lai'),
(42, '66', 'Tỉnh Đắk Lắk'),
(43, '67', 'Tỉnh Đắk Nông'),
(44, '68', 'Tỉnh Lâm Đồng'),
(45, '70', 'Tỉnh Bình Phước'),
(46, '72', 'Tỉnh Tây Ninh'),
(47, '74', 'Tỉnh Bình Dương'),
(48, '75', 'Tỉnh Đồng Nai'),
(49, '77', 'Tỉnh Bà Rịa - Vũng Tàu'),
(50, '79', 'Thành phố Hồ Chí Minh'),
(51, '80', 'Tỉnh Long An'),
(52, '82', 'Tỉnh Tiền Giang'),
(53, '83', 'Tỉnh Bến Tre'),
(54, '84', 'Tỉnh Trà Vinh'),
(55, '86', 'Tỉnh Vĩnh Long'),
(56, '87', 'Tỉnh Đồng Tháp'),
(57, '89', 'Tỉnh An Giang'),
(58, '91', 'Tỉnh Kiên Giang'),
(59, '92', 'Thành phố Cần Thơ'),
(60, '93', 'Tỉnh Hậu Giang'),
(61, '94', 'Tỉnh Sóc Trăng'),
(62, '95', 'Tỉnh Bạc Liêu'),
(63, '96', 'Tỉnh Cà Mau'),
(64, '01', 'Thành phố Hà Nộid');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ton_giao`
--

CREATE TABLE `ton_giao` (
  `id` int(11) NOT NULL,
  `ten` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `ton_giao`
--

INSERT INTO `ton_giao` (`id`, `ten`) VALUES
(1, 'Không');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trinh_do_chuyen_mon`
--

CREATE TABLE `trinh_do_chuyen_mon` (
  `id` int(11) NOT NULL,
  `ten` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `trinh_do_chuyen_mon`
--

INSERT INTO `trinh_do_chuyen_mon` (`id`, `ten`) VALUES
(1, 'Tiến sỹ'),
(2, 'Thạc sỹ'),
(3, 'Đại học'),
(4, 'Cử nhân'),
(5, 'Kỹ sư'),
(6, 'Không học');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `fullname` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `phong_ban_id` int(11) DEFAULT NULL,
  `is_admin` int(11) DEFAULT NULL,
  `phan_quyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `fullname`, `phong_ban_id`, `is_admin`, `phan_quyen`) VALUES
(1, 'admin', 'SgnqOOsk6JF9ETCcrqxVhIwaT-jJKsgR', '$2y$13$foNPEIxRK4xy6nTmXhUXKOfd1kOK0doYvALI7OexOtwaaG1NUq24.', NULL, 'admin@localhost.com', 10, 1523262849, 1536946476, 'Administrator', 14, 1, 0),
(2, 'ngogiadiep', 'BUOobICoFebQ23HMQ6QpdIDS7HLjSWM7', '$2y$13$foNPEIxRK4xy6nTmXhUXKOfd1kOK0doYvALI7OexOtwaaG1NUq24.', NULL, 'ngogiadiep@gmail.com', 10, 1536947704, 1536947889, 'Ngô Văn Điệp', 14, NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xa_phuong`
--

CREATE TABLE `xa_phuong` (
  `id` int(11) NOT NULL,
  `ma` varchar(50) DEFAULT NULL,
  `ten` varchar(256) DEFAULT NULL,
  `quan_huyen_id` int(11) DEFAULT NULL,
  `tinh_thanh_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `xa_phuong`
--

INSERT INTO `xa_phuong` (`id`, `ma`, `ten`, `quan_huyen_id`, `tinh_thanh_id`) VALUES
(1, '05431', 'Phường Quán Triều', 79, 12),
(2, '05434', 'Phường Quang Vinh', 79, 12),
(3, '05437', 'Phường Túc Duyên', 79, 12),
(4, '05440', 'Phường Hoàng Văn Thụ', 79, 12),
(5, '05443', 'Phường Trưng Vương', 79, 12),
(6, '05446', 'Phường Quang Trung', 79, 12),
(7, '05449', 'Phường Phan Đình Phùng', 79, 12),
(8, '05452', 'Phường Tân Thịnh', 79, 12),
(9, '05455', 'Phường Thịnh Đán', 79, 12),
(10, '05458', 'Phường Đồng Quang', 79, 12),
(11, '05461', 'Phường Gia Sàng', 79, 12),
(12, '05464', 'Phường Tân Lập', 79, 12),
(13, '05467', 'Phường Cam Giá', 79, 12),
(14, '05470', 'Phường Phú Xá', 79, 12),
(15, '05473', 'Phường Hương Sơn', 79, 12),
(16, '05476', 'Phường Trung Thành', 79, 12),
(17, '05479', 'Phường Tân Thành', 79, 12),
(18, '05482', 'Phường Tân Long', 79, 12),
(19, '05485', 'Xã Phúc Hà', 79, 12),
(20, '05488', 'Xã Phúc Xuân', 79, 12),
(21, '05491', 'Xã Quyết Thắng', 79, 12),
(22, '05494', 'Xã Phúc Trìu', 79, 12),
(23, '05497', 'Xã Thịnh Đức', 79, 12),
(24, '05500', 'Phường Tích Lương', 79, 12),
(25, '05503', 'Xã Tân Cương', 79, 12),
(26, '05653', 'Xã Sơn Cẩm', 79, 12),
(27, '05659', 'Phường Chùa Hang', 79, 12),
(28, '05695', 'Xã Cao Ngạn', 79, 12),
(29, '05701', 'Xã Linh Sơn', 79, 12),
(30, '05710', 'Phường Đồng Bẩm', 79, 12),
(31, '05713', 'Xã Huống Thượng', 79, 12),
(32, '05914', 'Xã Đồng Liên', 79, 12),
(33, '05506', 'Phường Lương Sơn', 80, 12),
(34, '05509', 'Phường Lương Châu', 80, 12),
(35, '05512', 'Phường Mỏ Chè', 80, 12),
(36, '05515', 'Phường Cải Đan', 80, 12),
(37, '05518', 'Phường Thắng Lợi', 80, 12),
(38, '05521', 'Phường Phố Cò', 80, 12),
(39, '05524', 'Xã Vinh Sơn', 80, 12),
(40, '05527', 'Xã Tân Quang', 80, 12),
(41, '05528', 'Phường Bách Quang', 80, 12),
(42, '05530', 'Xã Bình Sơn', 80, 12),
(43, '05533', 'Xã Bá Xuyên', 80, 12),
(44, '05536', 'Thị trấn Chợ Chu', 81, 12),
(45, '05539', 'Xã Linh Thông', 81, 12),
(46, '05542', 'Xã Lam Vỹ', 81, 12),
(47, '05545', 'Xã Quy Kỳ', 81, 12),
(48, '05548', 'Xã Tân Thịnh', 81, 12),
(49, '05551', 'Xã Kim Phượng', 81, 12),
(50, '05554', 'Xã Bảo Linh', 81, 12),
(51, '05557', 'Xã Kim Sơn', 81, 12),
(52, '05560', 'Xã Phúc Chu', 81, 12),
(53, '05563', 'Xã Tân Dương', 81, 12),
(54, '05566', 'Xã Phượng Tiến', 81, 12),
(55, '05569', 'Xã Bảo Cường', 81, 12),
(56, '05572', 'Xã Đồng Thịnh', 81, 12),
(57, '05575', 'Xã Định Biên', 81, 12),
(58, '05578', 'Xã Thanh Định', 81, 12),
(59, '05581', 'Xã Trung Hội', 81, 12),
(60, '05584', 'Xã Trung Lương', 81, 12),
(61, '05587', 'Xã Bình Yên', 81, 12),
(62, '05590', 'Xã Điềm Mặc', 81, 12),
(63, '05593', 'Xã Phú Tiến', 81, 12),
(64, '05596', 'Xã Bộc Nhiêu', 81, 12),
(65, '05599', 'Xã Sơn Phú', 81, 12),
(66, '05602', 'Xã Phú Đình', 81, 12),
(67, '05605', 'Xã Bình Thành', 81, 12),
(68, '05608', 'Thị trấn Giang Tiên', 82, 12),
(69, '05611', 'Thị trấn Đu', 82, 12),
(70, '05614', 'Xã Yên Ninh', 82, 12),
(71, '05617', 'Xã Yên Trạch', 82, 12),
(72, '05620', 'Xã Yên Đổ', 82, 12),
(73, '05623', 'Xã Yên Lạc', 82, 12),
(74, '05626', 'Xã Ôn Lương', 82, 12),
(75, '05629', 'Xã Động Đạt', 82, 12),
(76, '05632', 'Xã Phủ Lý', 82, 12),
(77, '05635', 'Xã Phú Đô', 82, 12),
(78, '05638', 'Xã Hợp Thành', 82, 12),
(79, '05641', 'Xã Tức Tranh', 82, 12),
(80, '05644', 'Xã Phấn Mễ', 82, 12),
(81, '05647', 'Xã Vô Tranh', 82, 12),
(82, '05650', 'Xã Cổ Lũng', 82, 12),
(83, '05656', 'Thị trấn Sông Cầu', 83, 12),
(84, '05662', 'Thị trấn Trại Cau', 83, 12),
(85, '05665', 'Xã Văn Lăng', 83, 12),
(86, '05668', 'Xã Tân Long', 83, 12),
(87, '05671', 'Xã Hòa Bình', 83, 12),
(88, '05674', 'Xã Quang Sơn', 83, 12),
(89, '05677', 'Xã Minh Lập', 83, 12),
(90, '05680', 'Xã Văn Hán', 83, 12),
(91, '05683', 'Xã Hóa Trung', 83, 12),
(92, '05686', 'Xã Khe Mo', 83, 12),
(93, '05689', 'Xã Cây Thị', 83, 12),
(94, '05692', 'Xã Hóa Thượng', 83, 12),
(95, '05698', 'Xã Hợp Tiến', 83, 12),
(96, '05704', 'Xã Tân Lợi', 83, 12),
(97, '05707', 'Xã Nam Hòa', 83, 12),
(98, '05716', 'Thị trấn Đình Cả', 84, 12),
(99, '05719', 'Xã Sảng Mộc', 84, 12),
(100, '05722', 'Xã Nghinh Tường', 84, 12),
(101, '05725', 'Xã Thần Xa', 84, 12),
(102, '05728', 'Xã Vũ Chấn', 84, 12),
(103, '05731', 'Xã Thượng Nung', 84, 12),
(104, '05734', 'Xã Phú Thượng', 84, 12),
(105, '05737', 'Xã Cúc Đường', 84, 12),
(106, '05740', 'Xã La Hiên', 84, 12),
(107, '05743', 'Xã Lâu Thượng', 84, 12),
(108, '05746', 'Xã Tràng Xá', 84, 12),
(109, '05749', 'Xã Phương Giao', 84, 12),
(110, '05752', 'Xã Liên Minh', 84, 12),
(111, '05755', 'Xã Dân Tiến', 84, 12),
(112, '05758', 'Xã Bình Long', 84, 12),
(113, '05761', 'Thị trấn Hùng Sơn', 85, 12),
(114, '05764', 'Thị trấn Quân Chu', 85, 12),
(115, '05767', 'Xã Phúc Lương', 85, 12),
(116, '05770', 'Xã Minh Tiến', 85, 12),
(117, '05773', 'Xã Yên Lãng', 85, 12),
(118, '05776', 'Xã Đức Lương', 85, 12),
(119, '05779', 'Xã Phú Cường', 85, 12),
(120, '05782', 'Xã Na Mao', 85, 12),
(121, '05785', 'Xã Phú Lạc', 85, 12),
(122, '05788', 'Xã Tân Linh', 85, 12),
(123, '05791', 'Xã Phú Thịnh', 85, 12),
(124, '05794', 'Xã Phục Linh', 85, 12),
(125, '05797', 'Xã Phú Xuyên', 85, 12),
(126, '05800', 'Xã Bản Ngoại', 85, 12),
(127, '05803', 'Xã Tiên Hội', 85, 12),
(128, '05809', 'Xã Cù Vân', 85, 12),
(129, '05812', 'Xã Hà Thượng', 85, 12),
(130, '05815', 'Xã La Bằng', 85, 12),
(131, '05818', 'Xã Hoàng Nông', 85, 12),
(132, '05821', 'Xã Khôi Kỳ', 85, 12),
(133, '05824', 'Xã An Khánh', 85, 12),
(134, '05827', 'Xã Tân Thái', 85, 12),
(135, '05830', 'Xã Bình Thuận', 85, 12),
(136, '05833', 'Xã Lục Ba', 85, 12),
(137, '05836', 'Xã Mỹ Yên', 85, 12),
(138, '05839', 'Xã Vạn Thọ', 85, 12),
(139, '05842', 'Xã Văn Yên', 85, 12),
(140, '05845', 'Xã Ký Phú', 85, 12),
(141, '05848', 'Xã Cát Nê', 85, 12),
(142, '05851', 'Xã Quân Chu', 85, 12),
(143, '05854', 'Phường Bãi Bông', 86, 12),
(144, '05857', 'Phường Bắc Sơn', 86, 12),
(145, '05860', 'Phường Ba Hàng', 86, 12),
(146, '05863', 'Xã Phúc Tân', 86, 12),
(147, '05866', 'Xã Phúc Thuận', 86, 12),
(148, '05869', 'Xã Hồng Tiến', 86, 12),
(149, '05872', 'Xã Minh Đức', 86, 12),
(150, '05875', 'Xã Đắc Sơn', 86, 12),
(151, '05878', 'Phường Đồng Tiến', 86, 12),
(152, '05881', 'Xã Thành Công', 86, 12),
(153, '05884', 'Xã Tiên Phong', 86, 12),
(154, '05887', 'Xã Vạn Phái', 86, 12),
(155, '05890', 'Xã Nam Tiến', 86, 12),
(156, '05893', 'Xã Tân Hương', 86, 12),
(157, '05896', 'Xã Đông Cao', 86, 12),
(158, '05899', 'Xã Trung Thành', 86, 12),
(159, '05902', 'Xã Tân Phú', 86, 12),
(160, '05905', 'Xã Thuận Thành', 86, 12),
(161, '05908', 'Thị trấn Hương Sơn', 87, 12),
(162, '05911', 'Xã Bàn Đạt', 87, 12),
(163, '05917', 'Xã Tân Khánh', 87, 12),
(164, '05920', 'Xã Tân Kim', 87, 12),
(165, '05923', 'Xã Tân Thành', 87, 12),
(166, '05926', 'Xã Đào Xá', 87, 12),
(167, '05929', 'Xã Bảo Lý', 87, 12),
(168, '05932', 'Xã Thượng Đình', 87, 12),
(169, '05935', 'Xã Tân Hòa', 87, 12),
(170, '05938', 'Xã Nhã Lộng', 87, 12),
(171, '05941', 'Xã Điềm Thụy', 87, 12),
(172, '05944', 'Xã Xuân Phương', 87, 12),
(173, '05947', 'Xã Tân Đức', 87, 12),
(174, '05950', 'Xã Úc Kỳ', 87, 12),
(175, '05953', 'Xã Lương Phú', 87, 12),
(176, '05956', 'Xã Nga My', 87, 12),
(177, '05959', 'Xã Kha Sơn', 87, 12),
(178, '05962', 'Xã Thanh Ninh', 87, 12),
(179, '05965', 'Xã Dương Thành', 87, 12),
(180, '05968', 'Xã Hà Châu', 87, 12),
(181, '0511', 'Xã Quyết Thắng1', 79, 12),
(184, '0546', 'Xã BBB', 85, 12);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `auth_assignment_user_id_idx` (`user_id`);

--
-- Chỉ mục cho bảng `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Chỉ mục cho bảng `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Chỉ mục cho bảng `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Chỉ mục cho bảng `bien_che`
--
ALTER TABLE `bien_che`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chuc_vu`
--
ALTER TABLE `chuc_vu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cong_viec`
--
ALTER TABLE `cong_viec`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cong_viec_danh_gia`
--
ALTER TABLE `cong_viec_danh_gia`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cong_viec_tien_do`
--
ALTER TABLE `cong_viec_tien_do`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cong_viec_tra_lai`
--
ALTER TABLE `cong_viec_tra_lai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dan_toc`
--
ALTER TABLE `dan_toc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dien_bien_luong`
--
ALTER TABLE `dien_bien_luong`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dien_bien_phu_cap`
--
ALTER TABLE `dien_bien_phu_cap`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giao_xu_ly`
--
ALTER TABLE `giao_xu_ly`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ke_hoach`
--
ALTER TABLE `ke_hoach`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loai_hinh_nghi_phep`
--
ALTER TABLE `loai_hinh_nghi_phep`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `luan_chuyen`
--
ALTER TABLE `luan_chuyen`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Chỉ mục cho bảng `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Chỉ mục cho bảng `nhan_su`
--
ALTER TABLE `nhan_su`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhan_xet_danh_gia`
--
ALTER TABLE `nhan_xet_danh_gia`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phong_ban`
--
ALTER TABLE `phong_ban`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `quan_huyen`
--
ALTER TABLE `quan_huyen`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `qua_trinh_cong_tac`
--
ALTER TABLE `qua_trinh_cong_tac`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `qua_trinh_dao_tao_boi_duong`
--
ALTER TABLE `qua_trinh_dao_tao_boi_duong`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `qua_trinh_nghi_phep`
--
ALTER TABLE `qua_trinh_nghi_phep`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tinh_thanh`
--
ALTER TABLE `tinh_thanh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ton_giao`
--
ALTER TABLE `ton_giao`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `trinh_do_chuyen_mon`
--
ALTER TABLE `trinh_do_chuyen_mon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `xa_phuong`
--
ALTER TABLE `xa_phuong`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bien_che`
--
ALTER TABLE `bien_che`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `chuc_vu`
--
ALTER TABLE `chuc_vu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `cong_viec`
--
ALTER TABLE `cong_viec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT cho bảng `cong_viec_danh_gia`
--
ALTER TABLE `cong_viec_danh_gia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `cong_viec_tien_do`
--
ALTER TABLE `cong_viec_tien_do`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `cong_viec_tra_lai`
--
ALTER TABLE `cong_viec_tra_lai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `dan_toc`
--
ALTER TABLE `dan_toc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `dien_bien_luong`
--
ALTER TABLE `dien_bien_luong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `dien_bien_phu_cap`
--
ALTER TABLE `dien_bien_phu_cap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `giao_xu_ly`
--
ALTER TABLE `giao_xu_ly`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `ke_hoach`
--
ALTER TABLE `ke_hoach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `loai_hinh_nghi_phep`
--
ALTER TABLE `loai_hinh_nghi_phep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `luan_chuyen`
--
ALTER TABLE `luan_chuyen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `nhan_su`
--
ALTER TABLE `nhan_su`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT cho bảng `nhan_xet_danh_gia`
--
ALTER TABLE `nhan_xet_danh_gia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `phong_ban`
--
ALTER TABLE `phong_ban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT cho bảng `quan_huyen`
--
ALTER TABLE `quan_huyen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT cho bảng `qua_trinh_cong_tac`
--
ALTER TABLE `qua_trinh_cong_tac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `qua_trinh_dao_tao_boi_duong`
--
ALTER TABLE `qua_trinh_dao_tao_boi_duong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT cho bảng `qua_trinh_nghi_phep`
--
ALTER TABLE `qua_trinh_nghi_phep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `tinh_thanh`
--
ALTER TABLE `tinh_thanh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT cho bảng `ton_giao`
--
ALTER TABLE `ton_giao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `trinh_do_chuyen_mon`
--
ALTER TABLE `trinh_do_chuyen_mon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `xa_phuong`
--
ALTER TABLE `xa_phuong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
