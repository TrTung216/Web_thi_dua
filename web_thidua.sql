-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 13, 2024 lúc 06:05 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_thidua`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_users`
--

CREATE TABLE `db_users` (
  `id_lop` varchar(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `db_users`
--

INSERT INTO `db_users` (`id_lop`, `username`, `pass`, `role`) VALUES
('10A1', '10a1thpttienthinh', '12345678', 'users'),
('Admin', 'admin', '12345678', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thiduatuan`
--

CREATE TABLE `thiduatuan` (
  `ten_lop` varchar(11) NOT NULL,
  `gio_tot` int(11) NOT NULL,
  `gio_tb` int(11) NOT NULL,
  `gio_yeu` int(11) NOT NULL,
  `gio_kem` int(11) NOT NULL,
  `so_diem_gioi` int(11) NOT NULL,
  `so_diem_yeu_kem` int(11) NOT NULL,
  `loi_2diem` int(11) NOT NULL,
  `loi_5diem` int(11) NOT NULL,
  `loi_10diem` int(11) NOT NULL,
  `loi_20diem` int(11) NOT NULL,
  `diem_tong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `db_users`
--
ALTER TABLE `db_users`
  ADD PRIMARY KEY (`id_lop`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
