-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 17, 2021 at 08:33 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tracnghiemonline`
--
CREATE DATABASE IF NOT EXISTS `tracnghiemonline` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tracnghiemonline`;

-- --------------------------------------------------------

--
-- Table structure for table `tbdethi`
--

DROP TABLE IF EXISTS `tbdethi`;
CREATE TABLE IF NOT EXISTS `tbdethi` (
  `maBD` int(11) NOT NULL AUTO_INCREMENT,
  `maMon` varchar(50) NOT NULL,
  `soCauHoi` int(11) NOT NULL,
  `thoiGianTest` int(11) NOT NULL,
  `kichHoat` varchar(255) NOT NULL,
  `maGV` int(11) NOT NULL,
  `maLop` int(11) NOT NULL,
  PRIMARY KEY (`maBD`),
  KEY `fk_tbdethi_maGV` (`maGV`),
  KEY `fk_tbdethi_maMon` (`maMon`),
  KEY `fk_tbdethi_maLop` (`maLop`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbdethi`
--

INSERT INTO `tbdethi` (`maBD`, `maMon`, `soCauHoi`, `thoiGianTest`, `kichHoat`, `maGV`, `maLop`) VALUES
(3, 'ChTr', 15, 20, '2021-11-15T07:05', 1, 5),
(4, 'PL', 10, 15, '2021-11-17T08:30', 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbgiaovien`
--

DROP TABLE IF EXISTS `tbgiaovien`;
CREATE TABLE IF NOT EXISTS `tbgiaovien` (
  `maGV` int(11) NOT NULL AUTO_INCREMENT,
  `tenGV` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `role` tinyint(4) NOT NULL,
  PRIMARY KEY (`maGV`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbgiaovien`
--

INSERT INTO `tbgiaovien` (`maGV`, `tenGV`, `user`, `password`, `role`) VALUES
(1, 'Đường Quang Thịnh', 'thinhdq', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(2, 'Đỗ Nguyệt Nga', 'ngadn', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(3, 'Đỗ Ðông Dương', 'gv003', '81dc9bdb52d04dc20036dbd8313ed055', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbhocky`
--

DROP TABLE IF EXISTS `tbhocky`;
CREATE TABLE IF NOT EXISTS `tbhocky` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hocKy` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbhocky`
--

INSERT INTO `tbhocky` (`id`, `hocKy`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbhocsinh`
--

DROP TABLE IF EXISTS `tbhocsinh`;
CREATE TABLE IF NOT EXISTS `tbhocsinh` (
  `maHS` varchar(15) NOT NULL,
  `tenHS` varchar(255) NOT NULL,
  `diaChi` text NOT NULL,
  `dienThoai` varchar(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `maLop` int(11) NOT NULL,
  PRIMARY KEY (`maHS`) USING BTREE,
  KEY `fk_tbhocsinh_maLop` (`maLop`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbhocsinh`
--

INSERT INTO `tbhocsinh` (`maHS`, `tenHS`, `diaChi`, `dienThoai`, `username`, `password`, `maLop`) VALUES
('HSCD20CT1-1', 'Điều Ðức Anh ', ' 82 Giai Phong St, Ward 14 , Tan Binh Dist, Ho Chi Minh City', '0123456789', 'HSCD20CT11', '792c890e37ede2a087be6e675f7bd316', 5),
('HSCD20CT1-10', 'Đầu Thành Sang ', 'Unit 297, Rex Hotel 141 Nguyen Hue Street, Ben Nghe Ward ', '0123456789', 'HSCD20CT110', 'd0f574194ab7faa31d195247fed63333', 5),
('HSCD20CT1-11', 'Đương An Cơ ', ' R23 Tan Son Nhi Living Quarter, Ward 14 ', '0123456789', 'HSCD20CT111', '8b1eb11879801721fbfccfad4d8c936f', 5),
('HSCD20CT1-12', 'Trưng Bảo Ðịnh ', '76 - 78 Tran Hung Dao ', '0123456789', 'HSCD20CT112', '5779c39bbe09ec6d8df8b3842757a0f7', 5),
('HSCD20CT1-13', 'Đặng Trí Dũng ', ' 139 Pham Hong Thai Street , Ward 2 ', '0123456789', 'HSCD20CT113', 'f06e135d465e59285a4b28ef86382a77', 5),
('HSCD20CT1-14', 'Huỳnh Hải Dương ', ' 54 Phung Van Cung Street, Ward 7 ', '0123456789', 'HSCD20CT114', '6d43fc3f8a1808021b37fd2236c164cd', 5),
('HSCD20CT1-15', 'Cầm Hải Dương ', '3rd Flr, 60 Truong Dinh, Dist.3 ', '0123456789', 'HSCD20CT115', 'a304cc883af87f6dd9ac8b8764297bd2', 5),
('HSCD20CT1-16', 'Đăng Đăng Khương ', '586 Lac Long Quan street , ward 5 , district 11 ', '0123456789', 'HSCD20CT116', 'ac61ae68a88194d07754052ace7eaac6', 5),
('HSCD20CT1-17', 'Đào Trung Kiên ', '264 Ham Tu St., Ward 5, Dist. 5 ', '0123456789', 'HSCD20CT117', 'f3708bc8d1957fba71e7ffb352e1423e', 5),
('HSCD20CT1-18', 'Tạ Nhật Hồng ', '14 Phao Dai Lang Street, Lang Thuong Ward ', '0123456789', 'HSCD20CT118', 'b3b9a266cf256dd790097f31bb6f4e1f', 5),
('HSCD20CT1-19', 'Lương Quốc Hùng ', '135/16 Nguyen Van Luong, Hochiminh ', '0123456789', 'HSCD20CT119', 'f5fcd13a4afa8ef26dfc9d90e815f30d', 5),
('HSCD20CT1-2', 'Hoa Hùng Dũng ', 'Quoc Bo Area, Thanh Tri District, Hanoi', '0123456789', 'HSCD20CT12', '01bd7b252bcdaece4cd28a7bd573b378', 5),
('HSCD20CT1-20', 'Vũ Xuân Ninh ', ' 8 Tong Van Tran, Ward 5, Dist.11 ', '0123456789', 'HSCD20CT120', '4a1155ebbcd4118f035885d61b39e98c', 5),
('HSCD20CT1-21', 'Đầu Thành Sang ', '29 St. 31, Binh Hung Hoa B Ward ', '0123456789', 'HSCD20CT121', 'b3f77977ee26bccfd9c2dc30867c239d', 5),
('HSCD20CT1-22', 'Tôn Minh Tiến ', '15 Hang Khay, Trang Tien Ward ', '0123456789', 'HSCD20CT122', 'fa17bf3682daf2b944430c245350816c', 5),
('HSCD20CT1-23', 'Lãnh Thành Trung ', ' 7 Le Dinh Duong Street, Binh Hien Ward, Hai Chau District ', '0123456789', 'HSCD20CT123', 'd77e0db3ea54be769b14b8b39821c62d', 5),
('HSCD20CT1-24', 'Liên Minh Thái ', 'Singapore Industrial Park, 48 Doc Lap Avenue ', '0123456789', 'HSCD20CT124', '7970c2ad22be08f99ee188fe57db4f02', 5),
('HSCD20CT1-25', 'Phan Ánh Mai ', ' Floor 8, The Landmark 5B Ton Duc Thang Street, Ben Nghe Ward ', '0123456789', 'HSCD20CT125', '2ce7c48bd84dd12a3f69ab227a02eb9e', 5),
('HSCD20CT1-26', 'Vưu Diệp Anh ', '80 Tran Phu StreetWard 4, Town ', '0123456789', 'HSCD20CT126', '521f487f6e71256033cf48af51f36604', 5),
('HSCD20CT1-27', 'Lô Gia Quỳnh ', '9 Tran Hung Dao Street, Ward 2 ', '0123456789', 'HSCD20CT127', '955f40244349b8cdb881979a7fac20b9', 5),
('HSCD20CT1-28', 'Lèng Hạnh My ', ' 27 Nguyen Trung Truc Street, Ben Thanh Ward, District 1 ', '0123456789', 'HSCD20CT128', '999951f7253e53cda76ebdec3f08d3ee', 5),
('HSCD20CT1-29', 'Lỗ Hoàng Mai ', '128 Nguyen Phong Sac Street ', '0123456789', 'HSCD20CT129', 'b67b3376f603588d0506834770d10ab0', 5),
('HSCD20CT1-3', 'Thang Duy Cường ', 'Gia Lam Dist, Hanoi', '0123456789', 'HSCD20CT13', 'ce69f9c678f50121ba457b2f592b59d8', 5),
('HSCD20CT1-30', 'Khoa Huyền Anh ', 'House 17T5, Trung Hoa- Nhan Chinh New Urban Area, Nhan Chinh Ward ', '0123456789', 'HSCD20CT130', '6c75019ed6d2177f71cc7fbefa1130a0', 5),
('HSCD20CT1-4', 'Ưng Nguyệt Anh ', 'Ba Dinh District, Hanoi', '0123456789', 'HSCD20CT14', '3920147d6eed52c8878e8cdd0964ce2e', 5),
('HSCD20CT1-5', 'Hề Đăng Khương ', '95 Nguyen Binh Khiem, Dakao Ward, Dist.1 , Ho Chi Minh City', '0123456789', 'HSCD20CT15', '5f4927baf8f5982d35de718b33f8d061', 5),
('HSCD20CT1-6', 'Cam Bích San ', 'Tam Hiep Ward,  Dong Nai', '0123456789', 'HSCD20CT16', '1c477f130bf3f179796df02b14332fd3', 5),
('HSCD20CT1-7', 'Đồng Khả Tú ', 'Phuoc Hung Commune,Ba Ria-Vung Tau', '0123456789', 'HSCD20CT17', 'eef11270da570f806fd2cde653476de2', 5),
('HSCD20CT1-8', 'Chiêm Ngọc Hân ', '125a Doi Cung St., Ward 11, District 11', '0123456789', 'HSCD20CT18', '5f2dbdf34fe17c509301969ee6c8d075', 5),
('HSCD20CT1-9', 'Ninh Huyền Trân ', ' 6 - 7 Nguyen Sinh Sac, Ward 2 ', '0123456789', 'HSCD20CT19', 'd7a4f1aa551c7bad1f7bc93e72d0bdd5', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbkehoachdayhoc`
--

DROP TABLE IF EXISTS `tbkehoachdayhoc`;
CREATE TABLE IF NOT EXISTS `tbkehoachdayhoc` (
  `maLop` int(11) NOT NULL,
  `maMon` varchar(50) NOT NULL,
  `maGV` int(11) NOT NULL,
  `idhocKy` int(11) NOT NULL,
  `idnamHoc` int(11) NOT NULL,
  PRIMARY KEY (`maLop`,`maMon`,`idhocKy`,`idnamHoc`) USING BTREE,
  KEY `fk_kehoachdayhoc_maGV` (`maGV`),
  KEY `fk_kehoachdayhoc_maMon` (`maMon`),
  KEY `fk_kehoachdayhoc_idhocky` (`idhocKy`),
  KEY `fk_kehoachdayhoc_idnamhoc` (`idnamHoc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbkehoachdayhoc`
--

INSERT INTO `tbkehoachdayhoc` (`maLop`, `maMon`, `maGV`, `idhocKy`, `idnamHoc`) VALUES
(5, 'ChTr', 1, 1, 1),
(5, 'PL', 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbketqua`
--

DROP TABLE IF EXISTS `tbketqua`;
CREATE TABLE IF NOT EXISTS `tbketqua` (
  `maLop` int(11) NOT NULL,
  `maMon` varchar(50) NOT NULL,
  `maBD` int(11) NOT NULL,
  `maGV` int(11) NOT NULL,
  `maHS` varchar(15) NOT NULL,
  `soCauDung` int(11) NOT NULL,
  `diem` float NOT NULL,
  PRIMARY KEY (`maLop`,`maMon`,`maBD`,`maGV`,`maHS`),
  KEY `fk_tbketqua_maMon` (`maMon`),
  KEY `fk_tbketqua_maBD` (`maBD`),
  KEY `fk_tbketqua_maGV` (`maGV`),
  KEY `fk_tbketqua_maHS` (`maHS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbketqua`
--

INSERT INTO `tbketqua` (`maLop`, `maMon`, `maBD`, `maGV`, `maHS`, `soCauDung`, `diem`) VALUES
(5, 'ChTr', 3, 1, 'HSCD20CT1-1', 11, 7.37),
(5, 'ChTr', 3, 1, 'HSCD20CT1-13', 1, 0.67),
(5, 'ChTr', 3, 1, 'HSCD20CT1-2', 10, 6.7),
(5, 'ChTr', 3, 1, 'HSCD20CT1-3', 9, 6.03),
(5, 'PL', 4, 2, 'HSCD20CT1-1', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tblop`
--

DROP TABLE IF EXISTS `tblop`;
CREATE TABLE IF NOT EXISTS `tblop` (
  `maLop` int(11) NOT NULL AUTO_INCREMENT,
  `tenLop` varchar(12) NOT NULL,
  `siSo` int(11) NOT NULL,
  PRIMARY KEY (`maLop`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblop`
--

INSERT INTO `tblop` (`maLop`, `tenLop`, `siSo`) VALUES
(5, 'CD20CT1', 30),
(6, 'CD20CT2', 30),
(7, 'CD20CT3', 30),
(8, 'CD20CT4', 30),
(9, 'CD20CT5', 30),
(10, 'CD20CT6', 30);

-- --------------------------------------------------------

--
-- Table structure for table `tbmon`
--

DROP TABLE IF EXISTS `tbmon`;
CREATE TABLE IF NOT EXISTS `tbmon` (
  `maMon` varchar(50) NOT NULL,
  `tenMon` text NOT NULL,
  PRIMARY KEY (`maMon`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbmon`
--

INSERT INTO `tbmon` (`maMon`, `tenMon`) VALUES
('ChTr', 'Chính Trị'),
('PL', 'Pháp Luật'),
('TCC1', 'Toán Cao Cấp 1'),
('TrH', 'Triết Học');

-- --------------------------------------------------------

--
-- Table structure for table `tbnamhoc`
--

DROP TABLE IF EXISTS `tbnamhoc`;
CREATE TABLE IF NOT EXISTS `tbnamhoc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namHoc` varchar(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbnamhoc`
--

INSERT INTO `tbnamhoc` (`id`, `namHoc`) VALUES
(1, '2021-2022'),
(2, '2022-2023');

-- --------------------------------------------------------

--
-- Table structure for table `tbnoidungbode`
--

DROP TABLE IF EXISTS `tbnoidungbode`;
CREATE TABLE IF NOT EXISTS `tbnoidungbode` (
  `maND` int(11) NOT NULL AUTO_INCREMENT,
  `noiDungCauHoi` text NOT NULL,
  `dapAn_A` text NOT NULL,
  `dapAn_B` text NOT NULL,
  `dapAn_C` text NOT NULL,
  `dapAn_D` text NOT NULL,
  `ketQua` varchar(2) NOT NULL,
  `diemMotCau` float NOT NULL,
  `maBD` int(11) NOT NULL,
  PRIMARY KEY (`maND`),
  KEY `fk_tbnoidungbode_maBD` (`maBD`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbnoidungbode`
--

INSERT INTO `tbnoidungbode` (`maND`, `noiDungCauHoi`, `dapAn_A`, `dapAn_B`, `dapAn_C`, `dapAn_D`, `ketQua`, `diemMotCau`, `maBD`) VALUES
(5, 'Kinh tế hàng hóa xuất hiện và hình thành dựa trên:', 'Phân công lao động cá biệt và chế độ tư hữu về tư liệu sản xuất.', 'Phân công lao động chung và chế độ sở hữu khác nhau về tư liệu sản xuất.', 'Phân công lao động xã hội và chế độ tư hữu hoặc những hình thức sở hữu khác nhau về tư liệu  sản xuất.', 'Phân công lao động và sự sách biệt về kinh tế giữa những người sản xuất.', 'C', 0.67, 3),
(6, 'Hàng hóa là:', 'Sản phẩm của lao động để thỏa mãn nhu cầu của con người.', 'Sản phẩm của lao động có thể thỏa mãn nhu cầu nào đó của con người thông qua mua bán.', 'Sản phẩm được mua bán trên thị trường.', 'Sản phẩm dùng để trao đổi với người khác.', 'B', 0.67, 3),
(7, 'Giá trị của hàng hóa được quyết định bởi: ', 'Sự khan hiếm của hàng hóa. ', 'Công dụng của hàng hóa. ', 'Sự hao phí sức lao động của con người. ', 'Lao động trừu tượng của người sản xuất hàng hóa kết tinh trong hàng hóa. ', 'D', 0.67, 3),
(8, 'Quy luật giá trị có tác dụng: ', 'Tất cả đều đúng ', 'Thúc đẩy cải tiến kỹ thuật, tăng năng suất lao động và phân hóa những người sản xuất hàng hóa. ', 'Điều tiết sản xuất, phân hóa giàu nghèo. ', 'Điều tiết sản xuất và lưu thông hàng hóa. ', 'A', 0.67, 3),
(9, 'Tư bản là: ', 'Tiền và máy móc thiết bị. ', 'Giá trị dôi ra ngoài sức lao động. ', 'Tiền có khả năng lại tăng lên. ', 'Giá trị mang lại giá trị thặng dư bằng cách bóc lột lao động làm thuê. ', 'D', 0.67, 3),
(10, 'Tiền lương tư bản chủ nghĩa là: ', 'Giá trị của lao động. ', 'Sự trả công lao động. ', 'Giá cả của sức lao động. ', 'Giá trị sức lao động. ', 'C', 0.67, 3),
(11, 'Lợi nhuận: ', 'Là tỷ lệ phần lãi trên tổng số tư bản đầu tư. ', 'Hình thức biến tướng của giá trị thặng dự. ', 'Là khoản tiền công mà doanh nhân tự trả cho mình. ', 'Hiệu số giữa giá trị hàng hóa và chi phí sản xuất. ', 'B', 0.67, 3),
(12, 'Mục tiêu công nghiệp hóa, hiện đại hóa ở nước ta cho đến năm 2020 là: ', 'Đưa nước ta về cơ bản trở thành một nước công nghiệp theo hướng hiện đại. ', 'Hoàn thành cơ bản việc xây dựng cơ sở vật chất kỹ thuật của chủ nghĩa xã hội dựa trên một nền khoa học và công nghệ tiên tiến, cơ cấu kinh tế hợp lý, đời sống vật chất và tinh thần cao, quốc phòng an ninh vững chắc. ', 'Đưa nước ta trở thành một nước công nghiệp hiện đại. ', 'Cả 3 đều đúng ', 'A', 0.67, 3),
(13, 'Tăng trưởng kinh tế, phát triển kinh tế và tiến bộ xã hội là: ', 'Đồng nghĩa. ', 'Không đồng nghĩa. ', 'Trái ngược nhau. ', 'Có liên hệ với nhau và làm điều kiện cho nhau.', 'D', 0.67, 3),
(14, 'Sản xuất hàng hóa tồn tại: ', 'Trong mọi thời đại. ', 'Dưới chế độ nô lệ, phong kiến và tư bản chủ nghĩa ', 'Chỉ trong chế độ tư bản chủ nghĩa. ', 'Trong các xã hội có phân công lao động xã hội và sự tách biệt về kinh tế giữa những người sản xuất. ', 'D', 0.67, 3),
(15, 'Phân phối theo lao động là: ', 'Lao động ngang nhau, trả công bằng nhau. ', 'Phân phối theo số lượng lao động và chất lượng lao động đã cống hiến cho xã hội. ', 'Phân phối theo sức lao động. ', 'Trả công lao động theo năng suất lao động. ', 'B', 0.67, 3),
(16, 'Chỉ số phát triển của con người (HDI) của các quốc gia được đánh giá dựa trên: ', 'Tuổi thọ, trình độ dân trí, mức sống (GDP trên đầu người, tính theo sức mua tương đương). ', 'Tuổi thọ, tỷ lệ tăng dân số, mức sống (GDP trên đầu người). ', 'Tuổi thọ, tỷ lệ thất nghiệp, mức sống (GDP trên đầu người). ', 'Tuổi thọ, tỷ lệ tử vong của trẻ sơ sinh, mức sống (GDP trên đầu người). ', 'A', 0.67, 3),
(17, 'Kinh tế chính trị là: ', 'Khoa học làm giàu. ', 'Khoa học nghiên cứu mối quan hệ giữa người với người trong quá trình sản xuất, phân phối, trao đổi, tiêu dùng của cải vật chất và các quy luật chi phối chúng ở các giai đoạn phát triển khác nhau của xã hội. ', 'Khoa học về sự lựa chọn những nguồn tài nguyên hiếm hoi có thể được sử dụng để sản xuất ra nhiều loại hàng hóa và phân phối cho tiêu dùng hiện nay và trong tương lai của những người và những nhóm người trong xã hội. ', 'Khoa học nghiên cứu nền sản xuất xã hội và các quy luật của nó. ', 'B', 0.67, 3),
(18, 'Quan hệ cung cầu thuộc khâu nào trong quá trình sản xuất xã hội? ', 'Sản xuất và tiêu dùng. ', 'Sản xuất ', 'Trao đổi. ', 'Tiêu dùng. ', 'C', 0.67, 3),
(19, 'Việc sản xuất và trao đổi hàng hóa phải được tiến hành dựa trên cơ sở: ', 'Hao phí thời gian lao động cần thiết. ', 'Hao phí thời gian lao động của người sản xuất hàng hóa. ', 'Hao phí thời gian lao động xã hội cần thiết. ', 'Hao phí lao động quá khứ và lao động sống của người sản xuất. ', 'C', 0.67, 3),
(20, 'Theo Hiến pháp Việt Nam 1992, Thủ tướng Chính phủ Nước CHXHCN Việt Nam:', 'Do nhân dân bầu', 'Do Quốc hội bầu theo sự giới thiệu của Chủ tịch nước', 'Do Chủ tịch nước giới thiệu', 'Do Chính phủ bầu', 'B', 1, 4),
(21, 'Văn bản nào có hiệu lực cao nhất trong hệ thống pháp luật Việt Nam:', 'Pháp lệnh', 'Luật', 'Hiến pháp', 'Nghị quyết', 'C', 1, 4),
(22, 'Lịch sử xã hội loài người đã và đang trải qua mấy kiểu pháp luật:', '2 kiểu pháp luật', '3 kiểu pháp luật', '4 kiểu pháp luật', '5 kiểu pháp luật', 'C', 1, 4),
(23, 'Đạo luật nào dưới đây quy định một cách cơ bản về chế độ chính trị, chế độ kinh tế, văn hóa, xã hội và tổ chức bộ máy nhà nước.', 'Luật tổ chức Quốc hội', 'Luật tổ chức Chính phủ', 'Luật tổ chức Hội đồng nhân dân và UBND', 'Hiến pháp', 'D', 1, 4),
(24, 'Quy phạm pháp luật là cách xử sự do nhà nước quy định để:', 'Áp dụng trong một hoàn cảnh cụ thể.', 'Cả A và B đều đúng', 'Áp dụng trong nhiều hoàn cảnh.', 'Cả A và B đều sai', 'B', 1, 4),
(25, 'Các quyết định ADPL được ban hành:', 'Luôn luôn phải theo một thủ tục chặt chẽ với đầy đủ các bước, các giai đoạn rõ ràng, cụ thể.', 'Thông thường là phải theo một thủ tục chặt chẽ với đầy đủ các bước, các giai đoạn rõ ràng, cụ thể, nhưng đôi khi cũng được ban hành chớp nhoáng không có đầy đủ các bước để giải quyết công việc khẩn cấp.', 'Một cách chớp nhoáng không có đầy đủ các bước, các giai đoạn và không theo một trình tự nhất định.', 'Cả A, B và C', 'A', 1, 4),
(26, 'Khẳng định nào sau đây là đúng:', 'SKPL là sự cụ thể hoá phần giả định của QPPL trong thực tiễn.', 'SKPL là sự cụ thể hoá phần quy định của QPPL trong thực tiễn.', 'SKPL là sự cụ thể hoá phần chế tài của QPPL trong thực tiễn.', 'Cả A, B và C đều sai', 'D', 1, 4),
(27, 'Tính quy phạm phổ biến (tính bắt buộc chung) là thuộc tính (đặc trưng) của:', 'QPPL', 'Quy phạm đạo đức', 'Quy phạm tập quán', 'Quy phạm tôn giáo', 'A', 1, 4),
(28, 'Quyền lực và hệ thống tổ chức quyền lực trong xã hội CXNT:', 'Mang tính bắt buộc và không mang tính cưỡng chế', 'Mang tính bắt buộc và mang tính cưỡng chế', 'Không mang tính bắt buộc và không mang tính cưỡng chế', 'Cả A, B và C đều sai', 'B', 1, 4),
(29, 'Các con đường hình thành nên pháp luật nói chung:', 'Tập quán pháp', 'Tiền lệ pháp', ' VBQPPL', 'Cả A, B và C đều đúng', 'D', 1, 4);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbdethi`
--
ALTER TABLE `tbdethi`
  ADD CONSTRAINT `fk_tbdethi_maGV` FOREIGN KEY (`maGV`) REFERENCES `tbgiaovien` (`maGV`),
  ADD CONSTRAINT `fk_tbdethi_maLop` FOREIGN KEY (`maLop`) REFERENCES `tblop` (`maLop`),
  ADD CONSTRAINT `fk_tbdethi_maMon` FOREIGN KEY (`maMon`) REFERENCES `tbmon` (`maMon`);

--
-- Constraints for table `tbhocsinh`
--
ALTER TABLE `tbhocsinh`
  ADD CONSTRAINT `fk_tbhocsinh_maLop` FOREIGN KEY (`maLop`) REFERENCES `tblop` (`maLop`);

--
-- Constraints for table `tbkehoachdayhoc`
--
ALTER TABLE `tbkehoachdayhoc`
  ADD CONSTRAINT `fk_kehoachdayhoc_idhocky` FOREIGN KEY (`idhocKy`) REFERENCES `tbhocky` (`id`),
  ADD CONSTRAINT `fk_kehoachdayhoc_idnamhoc` FOREIGN KEY (`idnamHoc`) REFERENCES `tbnamhoc` (`id`),
  ADD CONSTRAINT `fk_kehoachdayhoc_maGV` FOREIGN KEY (`maGV`) REFERENCES `tbgiaovien` (`maGV`),
  ADD CONSTRAINT `fk_kehoachdayhoc_maLop` FOREIGN KEY (`maLop`) REFERENCES `tblop` (`maLop`),
  ADD CONSTRAINT `fk_kehoachdayhoc_maMon` FOREIGN KEY (`maMon`) REFERENCES `tbmon` (`maMon`);

--
-- Constraints for table `tbketqua`
--
ALTER TABLE `tbketqua`
  ADD CONSTRAINT `fk_tbketqua_maBD` FOREIGN KEY (`maBD`) REFERENCES `tbdethi` (`maBD`),
  ADD CONSTRAINT `fk_tbketqua_maGV` FOREIGN KEY (`maGV`) REFERENCES `tbgiaovien` (`maGV`),
  ADD CONSTRAINT `fk_tbketqua_maHS` FOREIGN KEY (`maHS`) REFERENCES `tbhocsinh` (`maHS`),
  ADD CONSTRAINT `fk_tbketqua_maMon` FOREIGN KEY (`maMon`) REFERENCES `tbmon` (`maMon`);

--
-- Constraints for table `tbnoidungbode`
--
ALTER TABLE `tbnoidungbode`
  ADD CONSTRAINT `fk_tbnoidungbode_maBD` FOREIGN KEY (`maBD`) REFERENCES `tbdethi` (`maBD`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
