-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2017 at 07:53 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlbh_phutung`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitiet_dathang`
--

CREATE TABLE `chitiet_dathang` (
  `MA_DATHANG` int(11) NOT NULL,
  `SOLUONG_DATHANG` int(11) DEFAULT NULL,
  `DONGIA_DATHANG` int(11) DEFAULT NULL,
  `THANHTIEN_DATHANG` decimal(16,6) DEFAULT NULL,
  `TRANGTHAI` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `chitiet_giaodich`
--

CREATE TABLE `chitiet_giaodich` (
  `MA_GIAODICH` int(11) NOT NULL,
  `MA_SANPHAM` int(11) NOT NULL,
  `SOLUONG` int(11) NOT NULL,
  `THANHTIEN` decimal(15,3) NOT NULL,
  `THANHTOAN` decimal(15,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `chitiet_khuyenmai`
--

CREATE TABLE `chitiet_khuyenmai` (
  `MA_KHUYENMAI` int(11) NOT NULL,
  `MA_SANPHAM` int(11) NOT NULL,
  `PHANTRAM_KM` int(11) DEFAULT NULL,
  `TANGPHAM` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chitiet_khuyenmai`
--

INSERT INTO `chitiet_khuyenmai` (`MA_KHUYENMAI`, `MA_SANPHAM`, `PHANTRAM_KM`, `TANGPHAM`) VALUES
(1, 1, 2, NULL),
(2, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chitiet_nhap`
--

CREATE TABLE `chitiet_nhap` (
  `MA_PHIEUNHAP` int(11) NOT NULL,
  `MA_SANPHAM` int(11) NOT NULL,
  `SOLUONGNHAP` int(11) NOT NULL,
  `DONGIA_NHAP` decimal(15,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `chucvu`
--

CREATE TABLE `chucvu` (
  `MA_CHUCVU` int(11) NOT NULL,
  `TEN_CHUCVU` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chucvu`
--

INSERT INTO `chucvu` (`MA_CHUCVU`, `TEN_CHUCVU`) VALUES
(1, 'Admin'),
(2, 'Giám đốc'),
(3, 'Trưởng phòng'),
(4, 'Nhân viên');

-- --------------------------------------------------------

--
-- Table structure for table `cungcap_loai_sp`
--

CREATE TABLE `cungcap_loai_sp` (
  `MA_LOAI_SANPHAM` int(11) NOT NULL,
  `MA_NHA_CUNGCAP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dacdiem_kythuat`
--

CREATE TABLE `dacdiem_kythuat` (
  `MA_KYTHUAT` int(11) NOT NULL,
  `MAU_SAC` varchar(100) DEFAULT NULL,
  `KHOILUONG` int(11) DEFAULT NULL,
  `KICH_THUOC` varchar(50) DEFAULT NULL,
  `CHATLIEU` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dacdiem_kythuat`
--

INSERT INTO `dacdiem_kythuat` (`MA_KYTHUAT`, `MAU_SAC`, `KHOILUONG`, `KICH_THUOC`, `CHATLIEU`) VALUES
(1, 'màu đen', 1, '12 * 21', 'inox'),
(2, 'màu nâu', 1, '21*21', 'thép không gỉ');

-- --------------------------------------------------------

--
-- Table structure for table `dathang`
--

CREATE TABLE `dathang` (
  `MA_DATHANG` int(11) NOT NULL,
  `NGAY_DATHANG` timestamp NULL DEFAULT NULL,
  `TONG_THANHTIEN` decimal(16,6) DEFAULT NULL,
  `TRANGTHAI` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `giaodich`
--

CREATE TABLE `giaodich` (
  `MA_GIAODICH` int(11) NOT NULL,
  `TONG_THANHTIEN` decimal(15,2) DEFAULT NULL,
  `TRANGTHAI` tinyint(4) DEFAULT NULL,
  `NGAY_GIAODICH` timestamp NULL DEFAULT NULL,
  `MA_KHACHHANG` int(11) NOT NULL,
  `MA_HINHTHUC` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hinhthuc`
--

CREATE TABLE `hinhthuc` (
  `MA_HINHTHUC` int(11) NOT NULL,
  `TEN_HINHTHUC` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `MA_HOADON` int(11) NOT NULL,
  `NGAYLAP_HOADON` timestamp NULL DEFAULT NULL,
  `MA_GIAODICH` int(11) NOT NULL,
  `MA_NHANVIEN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MA_KHACHHANG` int(11) NOT NULL,
  `HO` varchar(100) DEFAULT NULL,
  `TEN` varchar(45) DEFAULT NULL,
  `SDT` varchar(20) DEFAULT NULL,
  `NGAYSINH` date DEFAULT NULL,
  `HINHANH` varchar(45) DEFAULT NULL,
  `GIOITINH` tinyint(4) DEFAULT NULL,
  `EMAIL` varchar(45) DEFAULT NULL,
  `MATKHAU` varchar(45) DEFAULT NULL,
  `NGAY_TAO` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kho`
--

CREATE TABLE `kho` (
  `MA_KHO` int(11) NOT NULL,
  `TEN_KHO` varchar(100) DEFAULT NULL,
  `SOLUONG_TON` int(11) DEFAULT NULL,
  `MA_LOAI_SANPHAM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `MA_KHUYENMAI` int(11) NOT NULL,
  `TEN_KHUYENMAI` varchar(100) DEFAULT NULL,
  `NGAY_BATDAU` date DEFAULT NULL,
  `NGAY_KETTHUC` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khuyenmai`
--

INSERT INTO `khuyenmai` (`MA_KHUYENMAI`, `TEN_KHUYENMAI`, `NGAY_BATDAU`, `NGAY_KETTHUC`) VALUES
(1, 'Dịp ngày khai trường', '2017-07-01', '2017-07-31'),
(2, 'Dịp lễ vu lan', '2017-07-13', '2017-07-26'),
(3, 'Dịp mùa hè', '2017-05-01', '2017-05-18');

-- --------------------------------------------------------

--
-- Table structure for table `loai_sanpham`
--

CREATE TABLE `loai_sanpham` (
  `MA_LOAI_SANPHAM` int(11) NOT NULL,
  `TEN_LOAI_SANPHAM` varchar(50) DEFAULT NULL,
  `MA_NHOM_SANPHAM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loai_sanpham`
--

INSERT INTO `loai_sanpham` (`MA_LOAI_SANPHAM`, `TEN_LOAI_SANPHAM`, `MA_NHOM_SANPHAM`) VALUES
(1, 'CAMRY', 1),
(2, 'RANGER', 2),
(3, 'FOCUS', 2),
(4, 'CIVIC', 3),
(5, 'DMAX', 3),
(6, 'SPARK', 4),
(7, 'CERATO', 5),
(8, 'CARAMRY', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MA_NHANVIEN` int(11) NOT NULL,
  `HO` varchar(100) DEFAULT NULL,
  `TEN` varchar(45) DEFAULT NULL,
  `MATKHAU` varchar(45) DEFAULT NULL,
  `SDT` varchar(20) NOT NULL,
  `EMAIL` varchar(45) DEFAULT NULL,
  `DIACHI` text NOT NULL,
  `NGAYSINH` date DEFAULT NULL,
  `HINHANH` varchar(100) DEFAULT NULL,
  `GIOITINH` tinyint(4) DEFAULT NULL,
  `NGAY_TAO` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `MA_CHUCVU` int(11) NOT NULL,
  `TRANGTHAI` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MA_NHANVIEN`, `HO`, `TEN`, `MATKHAU`, `SDT`, `EMAIL`, `DIACHI`, `NGAYSINH`, `HINHANH`, `GIOITINH`, `NGAY_TAO`, `MA_CHUCVU`, `TRANGTHAI`) VALUES
(1, 'Lê Tiến ', 'Tài', 'c97c31cb186da13690c50fea2c07deb8', '0917077025', 'tientai@gmail.com', 'Bình Lãnh Thăng Bình Quảng Nam ', '2017-07-04', NULL, 0, '2017-08-03 16:48:11', 2, 0),
(3, 'Nguyễn Hoàng', 'CC', 'd9b1d7db4cd6e70935368a1efb10e377', '0165 696 3032', 'phongvan@gmail.com', 'Cần Giuộc', '2017-07-26', 'CodeIgnter_Struc.PNG', 0, '2017-07-30 01:03:16', 4, 0),
(4, 'Nguyễn Trần Khôi ', 'Nguyên', 'a4130ad461268d6e63580916a26107d6', '0123456789', 'khoinguyen@gmail.com', 'Cà Mau', '2017-07-31', 'CodeIgnter_Struc.PNG', 1, '2017-07-29 02:55:08', 3, 0),
(16, 'Lê Tiến ', 'Tài', 'd9b1d7db4cd6e70935368a1efb10e377', '12345678901', 'tientai206@gmail.com', '97 Man Thiện Phường Hiệp Phú Quận 9', '2017-07-27', 'avatar/portrait.png', 0, '2017-07-26 17:15:58', 3, 0),
(40, 'Nguyễn Duy', 'Trung', 'd9b1d7db4cd6e70935368a1efb10e377', '09165029205', 'trungdu@gmail.com', '93 Man Thiện', '2017-07-20', NULL, 0, '2017-07-29 02:54:49', 4, 0),
(43, 'Lê Hoàng', 'Liên An', 'd9b1d7db4cd6e70935368a1efb10e377', '1234567890', 'tientai20@gmail.com', '  97 Koinh  ', '2017-07-25', NULL, 0, '2017-07-29 01:14:40', 4, 0),
(44, 'Lê Thị', 'Thương', 'd9b1d7db4cd6e70935368a1efb10e377', '091653012052', 'lthuong@gmail.com', ' Quế Sơn Quảng Nam', '2017-07-12', 'avatar/guong chieu hau morning10.jpg', 1, '2017-07-29 02:27:34', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nha_cungcap`
--

CREATE TABLE `nha_cungcap` (
  `MA_NHA_CUNGCAP` int(11) NOT NULL,
  `TEN_NHA_CUNGCAP` varchar(100) DEFAULT NULL,
  `WEBSITE` varchar(255) NOT NULL,
  `DIACHI_NHA_CUNGCAP` text,
  `SDT` varchar(20) NOT NULL,
  `EMAIL` varchar(45) DEFAULT NULL,
  `TRANGTHAI` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nha_cungcap`
--

INSERT INTO `nha_cungcap` (`MA_NHA_CUNGCAP`, `TEN_NHA_CUNGCAP`, `WEBSITE`, `DIACHI_NHA_CUNGCAP`, `SDT`, `EMAIL`, `TRANGTHAI`) VALUES
(1, 'Công ty Đức Việt', 'www.ducviet.com', '21 Gò Vấp Thành phố Hồ Chí Minh', '0901020205', 'ducviet@gmail.com', 0),
(2, 'Cty Ưu Thịnh', 'www.uuthinh.com', '93 Quận Thanh Khê,TP Đà Nẵng', '0511239340', 'uuthinh@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nhom_sanpham`
--

CREATE TABLE `nhom_sanpham` (
  `MA_NHOM_SANPHAM` int(11) NOT NULL,
  `TEN_NHOM_SANPHAM` varchar(50) DEFAULT NULL,
  `LOGO` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhom_sanpham`
--

INSERT INTO `nhom_sanpham` (`MA_NHOM_SANPHAM`, `TEN_NHOM_SANPHAM`, `LOGO`) VALUES
(1, 'TOYOTA', 'logo/toyota.png'),
(2, 'FORD', 'logo/ford.png'),
(3, 'HONDA', 'logo/honda.png'),
(4, 'ISUZU', 'logo/isuzu.png'),
(5, 'HUYNDAI', 'logo/huyndai.png'),
(6, 'CHEVROLET', 'logo/chevrolet.png'),
(7, 'HINO', 'logo/hino.png'),
(8, 'KIA', 'logo/kia.png'),
(9, 'MAZDA', 'logo/mazda.png'),
(10, 'DEWOO', 'logo/dewoo.png');

-- --------------------------------------------------------

--
-- Table structure for table `phieunhap`
--

CREATE TABLE `phieunhap` (
  `MA_PHIEUNHAP` int(11) NOT NULL,
  `NGAYLAP_PHIEUNHAP` timestamp NULL DEFAULT NULL,
  `MA_NHANVIEN` int(11) NOT NULL,
  `MA_NHA_CUNGCAP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `MA_SANPHAM` int(11) NOT NULL,
  `TEN_SANPHAM` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DONGIA_BAN` decimal(15,3) DEFAULT '0.000',
  `HINH_DAIDIEN` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `DS_HINHANH` text CHARACTER SET utf8 NOT NULL,
  `BAOHANH` tinyint(4) DEFAULT NULL,
  `LOAI` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `DABAN` int(11) DEFAULT '0',
  `NGAY_CAPNHAT` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `MA_LOAI_SANPHAM` int(11) NOT NULL,
  `MA_XUATXU` int(11) NOT NULL,
  `MOTA` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `TRANGTHAI` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MA_SANPHAM`, `TEN_SANPHAM`, `DONGIA_BAN`, `HINH_DAIDIEN`, `DS_HINHANH`, `BAOHANH`, `LOAI`, `DABAN`, `NGAY_CAPNHAT`, `MA_LOAI_SANPHAM`, `MA_XUATXU`, `MOTA`, `TRANGTHAI`) VALUES
(1, 'Đèn pha', '24.000', 'toyota/kira_thumb2.png', '', 1, '1', 1, '2017-08-03 05:49:34', 3, 1, 'DK', 0),
(2, 'Túi khí vô lăng', '0.000', 'toyota/tuikhivolang3.JPG', '[]', 1, '2', 0, '2017-08-03 05:28:56', 1, 1, 'Giá rẻ', 0),
(3, 'Túi khí tập lo', '0.000', 'honda/tui_khi_tap_lo_civic.jpg', '[]', 1, '1', 0, '2017-08-03 05:30:49', 4, 1, '', 1),
(4, 'Tap', '0.000', 'ford/Táp1.jpg', '[]', 2, '1', 0, '2017-08-03 05:47:08', 2, 7, '', 0),
(5, 'Lồng', '0.000', 'ford/long-quat.jpg', '[]', 1, '1', 0, '2017-08-03 05:37:56', 2, 2, '', 1),
(6, 'Lọc khí lạnh', '0.000', 'ford/loc-khi-gian-lanh.jpg', '[]', 1, '2', 0, '2017-08-03 05:38:39', 3, 3, '', 1),
(7, 'Đèn pha', '0.000', 'ford/den-fa.jpg', '[]', 1, '2', 0, '2017-08-03 05:39:25', 3, 2, '', 1),
(8, 'Giá khung két nước', '0.000', 'ford/gia-khung-ket-nuoc.jpg', '[]', 1, '1', 0, '2017-08-03 05:40:32', 2, 1, '', 1),
(9, 'Giá lên kính', '0.000', 'ford/gia-len-kinh.jpg', '[]', 1, '2', 0, '2017-08-03 05:41:05', 3, 7, '', 1),
(10, 'Nắp ca bo', '0.000', 'ford/nap-ca-bo.jpg', '[]', 1, '2', 0, '2017-08-03 05:42:13', 2, 3, '', 1),
(11, 'Tay mở cửa ngoài', '0.000', 'toyota/tay-mo-cua-ngoai.jpg', '[]', 2, '1', 0, '2017-08-03 05:43:29', 8, 4, '', 1),
(12, 'Tay mở cửa trong', '0.000', 'ford/tay-mo-cua-trong.jpg', '[]', 1, '2', 0, '2017-08-03 05:44:27', 3, 6, '', 1),
(13, 'Day điều khiển gương chiếu hậu', '0.000', 'ford/day-dieu-khien-guongchieuhau.jpg', '[]', 1, '2', 0, '2017-08-03 05:46:16', 3, 3, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `xuatxu`
--

CREATE TABLE `xuatxu` (
  `MA_XUATXU` int(11) NOT NULL,
  `TEN_XUATXU` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `xuatxu`
--

INSERT INTO `xuatxu` (`MA_XUATXU`, `TEN_XUATXU`) VALUES
(1, 'Trung Quốc'),
(2, 'Viêt Nam'),
(3, 'Inđônêxia'),
(4, 'Thái Lan'),
(5, 'Lào'),
(6, 'Singapo'),
(7, 'Hồng Không'),
(8, 'Mỹ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitiet_dathang`
--
ALTER TABLE `chitiet_dathang`
  ADD PRIMARY KEY (`MA_DATHANG`);

--
-- Indexes for table `chitiet_giaodich`
--
ALTER TABLE `chitiet_giaodich`
  ADD KEY `fk_chitiet_giaodich_sanpham1_idx` (`MA_SANPHAM`),
  ADD KEY `fk_chitiet_giaodich_giaodich1_idx` (`MA_GIAODICH`);

--
-- Indexes for table `chitiet_khuyenmai`
--
ALTER TABLE `chitiet_khuyenmai`
  ADD PRIMARY KEY (`MA_KHUYENMAI`,`MA_SANPHAM`),
  ADD KEY `fk_chitiet_khuyenmai_khuyenmai1_idx` (`MA_KHUYENMAI`),
  ADD KEY `fk_chitiet_khuyenmai_sanpham1_idx` (`MA_SANPHAM`);

--
-- Indexes for table `chitiet_nhap`
--
ALTER TABLE `chitiet_nhap`
  ADD KEY `fk_chitiet_nhap_sanpham1_idx` (`MA_SANPHAM`),
  ADD KEY `MA_PHIEUNHAP` (`MA_PHIEUNHAP`),
  ADD KEY `MA_PHIEUNHAP_2` (`MA_PHIEUNHAP`,`MA_SANPHAM`) USING BTREE;

--
-- Indexes for table `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`MA_CHUCVU`);

--
-- Indexes for table `cungcap_loai_sp`
--
ALTER TABLE `cungcap_loai_sp`
  ADD PRIMARY KEY (`MA_LOAI_SANPHAM`,`MA_NHA_CUNGCAP`),
  ADD KEY `fk_loai_sanpham_has_nha_cungcap_nha_cungcap1_idx` (`MA_NHA_CUNGCAP`),
  ADD KEY `fk_loai_sanpham_has_nha_cungcap_loai_sanpham1_idx` (`MA_LOAI_SANPHAM`);

--
-- Indexes for table `dacdiem_kythuat`
--
ALTER TABLE `dacdiem_kythuat`
  ADD PRIMARY KEY (`MA_KYTHUAT`);

--
-- Indexes for table `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`MA_DATHANG`);

--
-- Indexes for table `giaodich`
--
ALTER TABLE `giaodich`
  ADD PRIMARY KEY (`MA_GIAODICH`) USING BTREE,
  ADD KEY `fk_giaodich_khachhang1_idx` (`MA_KHACHHANG`),
  ADD KEY `fk_giaodich_hinhthuc1_idx` (`MA_HINHTHUC`);

--
-- Indexes for table `hinhthuc`
--
ALTER TABLE `hinhthuc`
  ADD PRIMARY KEY (`MA_HINHTHUC`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MA_HOADON`) USING BTREE,
  ADD KEY `fk_hoadon_giaodich1_idx` (`MA_GIAODICH`),
  ADD KEY `fk_hoadon_nhanvien1_idx` (`MA_NHANVIEN`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MA_KHACHHANG`);

--
-- Indexes for table `kho`
--
ALTER TABLE `kho`
  ADD PRIMARY KEY (`MA_KHO`) USING BTREE,
  ADD KEY `fk_kho_loai_sanpham1_idx` (`MA_LOAI_SANPHAM`);

--
-- Indexes for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`MA_KHUYENMAI`);

--
-- Indexes for table `loai_sanpham`
--
ALTER TABLE `loai_sanpham`
  ADD PRIMARY KEY (`MA_LOAI_SANPHAM`) USING BTREE,
  ADD KEY `fk_loai_sanpham_nhom_sanpham1_idx` (`MA_NHOM_SANPHAM`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MA_NHANVIEN`) USING BTREE,
  ADD KEY `fk_nhanvien_chucvu1_idx` (`MA_CHUCVU`);

--
-- Indexes for table `nha_cungcap`
--
ALTER TABLE `nha_cungcap`
  ADD PRIMARY KEY (`MA_NHA_CUNGCAP`);

--
-- Indexes for table `nhom_sanpham`
--
ALTER TABLE `nhom_sanpham`
  ADD PRIMARY KEY (`MA_NHOM_SANPHAM`);

--
-- Indexes for table `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`MA_PHIEUNHAP`) USING BTREE,
  ADD KEY `fk_phieunhap_nhanvien1_idx` (`MA_NHANVIEN`),
  ADD KEY `fk_phieunhap_nha_cungcap1_idx` (`MA_NHA_CUNGCAP`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MA_SANPHAM`) USING BTREE,
  ADD KEY `fk_sanpham_loai_sanpham1_idx` (`MA_LOAI_SANPHAM`),
  ADD KEY `fk_sanpham_xuatxu1_idx` (`MA_XUATXU`);

--
-- Indexes for table `xuatxu`
--
ALTER TABLE `xuatxu`
  ADD PRIMARY KEY (`MA_XUATXU`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `MA_CHUCVU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `dacdiem_kythuat`
--
ALTER TABLE `dacdiem_kythuat`
  MODIFY `MA_KYTHUAT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dathang`
--
ALTER TABLE `dathang`
  MODIFY `MA_DATHANG` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `giaodich`
--
ALTER TABLE `giaodich`
  MODIFY `MA_GIAODICH` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hinhthuc`
--
ALTER TABLE `hinhthuc`
  MODIFY `MA_HINHTHUC` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MA_HOADON` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MA_KHACHHANG` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kho`
--
ALTER TABLE `kho`
  MODIFY `MA_KHO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `MA_KHUYENMAI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `loai_sanpham`
--
ALTER TABLE `loai_sanpham`
  MODIFY `MA_LOAI_SANPHAM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MA_NHANVIEN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `nha_cungcap`
--
ALTER TABLE `nha_cungcap`
  MODIFY `MA_NHA_CUNGCAP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `nhom_sanpham`
--
ALTER TABLE `nhom_sanpham`
  MODIFY `MA_NHOM_SANPHAM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MA_SANPHAM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `xuatxu`
--
ALTER TABLE `xuatxu`
  MODIFY `MA_XUATXU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitiet_dathang`
--
ALTER TABLE `chitiet_dathang`
  ADD CONSTRAINT `fk_chitiet_dathang_dathang` FOREIGN KEY (`MA_DATHANG`) REFERENCES `dathang` (`MA_DATHANG`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `chitiet_giaodich`
--
ALTER TABLE `chitiet_giaodich`
  ADD CONSTRAINT `fk_chitiet_giaodich_giaodich1` FOREIGN KEY (`MA_GIAODICH`) REFERENCES `giaodich` (`MA_GIAODICH`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_chitiet_giaodich_sanpham1` FOREIGN KEY (`MA_SANPHAM`) REFERENCES `sanpham` (`MA_SANPHAM`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chitiet_khuyenmai`
--
ALTER TABLE `chitiet_khuyenmai`
  ADD CONSTRAINT `fk_chitiet_khuyenmai_khuyenmai1` FOREIGN KEY (`MA_KHUYENMAI`) REFERENCES `khuyenmai` (`MA_KHUYENMAI`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_chitiet_khuyenmai_sanpham1` FOREIGN KEY (`MA_SANPHAM`) REFERENCES `sanpham` (`MA_SANPHAM`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `chitiet_nhap`
--
ALTER TABLE `chitiet_nhap`
  ADD CONSTRAINT `fk_chitiet_nhap_phieunhap1` FOREIGN KEY (`MA_PHIEUNHAP`) REFERENCES `phieunhap` (`MA_PHIEUNHAP`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_chitiet_nhap_sanpham1` FOREIGN KEY (`MA_SANPHAM`) REFERENCES `sanpham` (`MA_SANPHAM`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cungcap_loai_sp`
--
ALTER TABLE `cungcap_loai_sp`
  ADD CONSTRAINT `fk_loai_sanpham_has_nha_cungcap_loai_sanpham1` FOREIGN KEY (`MA_LOAI_SANPHAM`) REFERENCES `loai_sanpham` (`MA_LOAI_SANPHAM`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_loai_sanpham_has_nha_cungcap_nha_cungcap1` FOREIGN KEY (`MA_NHA_CUNGCAP`) REFERENCES `nha_cungcap` (`MA_NHA_CUNGCAP`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `giaodich`
--
ALTER TABLE `giaodich`
  ADD CONSTRAINT `fk_giaodich_hinhthuc1` FOREIGN KEY (`MA_HINHTHUC`) REFERENCES `hinhthuc` (`MA_HINHTHUC`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_giaodich_khachhang1` FOREIGN KEY (`MA_KHACHHANG`) REFERENCES `khachhang` (`MA_KHACHHANG`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `fk_hoadon_giaodich1` FOREIGN KEY (`MA_GIAODICH`) REFERENCES `giaodich` (`MA_GIAODICH`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hoadon_nhanvien1` FOREIGN KEY (`MA_NHANVIEN`) REFERENCES `nhanvien` (`MA_NHANVIEN`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `kho`
--
ALTER TABLE `kho`
  ADD CONSTRAINT `fk_kho_loai_sanpham1` FOREIGN KEY (`MA_LOAI_SANPHAM`) REFERENCES `loai_sanpham` (`MA_LOAI_SANPHAM`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `loai_sanpham`
--
ALTER TABLE `loai_sanpham`
  ADD CONSTRAINT `loai_sanpham_ibfk_1` FOREIGN KEY (`MA_LOAI_SANPHAM`) REFERENCES `nhom_sanpham` (`MA_NHOM_SANPHAM`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `fk_nhanvien_chucvu1` FOREIGN KEY (`MA_CHUCVU`) REFERENCES `chucvu` (`MA_CHUCVU`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `fk_phieunhap_nha_cungcap1` FOREIGN KEY (`MA_NHA_CUNGCAP`) REFERENCES `nha_cungcap` (`MA_NHA_CUNGCAP`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_phieunhap_nhanvien1` FOREIGN KEY (`MA_NHANVIEN`) REFERENCES `nhanvien` (`MA_NHANVIEN`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_sanpham_loai_sanpham1` FOREIGN KEY (`MA_LOAI_SANPHAM`) REFERENCES `loai_sanpham` (`MA_LOAI_SANPHAM`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sanpham_xuatxu1` FOREIGN KEY (`MA_XUATXU`) REFERENCES `xuatxu` (`MA_XUATXU`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
