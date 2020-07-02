-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2020 at 02:14 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barang-ruangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu`
--

CREATE TABLE `sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `submenu_judul` varchar(191) NOT NULL,
  `submenu_link` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_menu`
--

INSERT INTO `sub_menu` (`id`, `menu_id`, `submenu_judul`, `submenu_link`) VALUES
(1, 2, 'Barang', 'Crudpinjambarang/kepinjambarang'),
(2, 2, 'Ruangan', 'Crudpinjamruangan/kepinjamruangan'),
(3, 5, 'Barang', 'Laporanbarang/kelaporan'),
(4, 5, 'Ruangan', 'Laporanruangan/kelaporan'),
(5, 10, 'Ya', 'Login/keluar'),
(6, 1, 'Prosedur Peminjaman', 'Admin/index'),
(7, 8, 'Barang', 'Crudbarang/kebarang'),
(8, 8, 'Ruangan', 'Crudruangan/keruangan');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu_user`
--

CREATE TABLE `sub_menu_user` (
  `id` int(11) NOT NULL,
  `menu_id` int(191) NOT NULL,
  `judul_submenu` varchar(191) NOT NULL,
  `link` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_menu_user`
--

INSERT INTO `sub_menu_user` (`id`, `menu_id`, `judul_submenu`, `link`) VALUES
(1, 1, 'Prosedur Peminjaman', 'Admin/index_user'),
(2, 2, 'Barang', 'Crudpinjambarang/kepinjambarang_user'),
(3, 2, 'Ruangan', 'Crudpinjamruangan/kepinjamruangan_user'),
(4, 3, 'Barang', 'Laporanbarang/kelaporan_user'),
(5, 3, 'Ruangan', 'Laporanruangan/kelaporan_user'),
(6, 4, 'Ya', 'Login/keluar');

-- --------------------------------------------------------

--
-- Table structure for table `sys_menu`
--

CREATE TABLE `sys_menu` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `link_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'uri',
  `page_id` int(11) NOT NULL DEFAULT 0,
  `module_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `uri` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dyn_group_id` int(11) NOT NULL DEFAULT 0,
  `position` int(5) NOT NULL DEFAULT 0,
  `target` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `is_parent` tinyint(1) NOT NULL DEFAULT 0,
  `show_menu` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `fa_icon` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sys_menu`
--

INSERT INTO `sys_menu` (`id`, `title`, `link_type`, `page_id`, `module_name`, `url`, `uri`, `dyn_group_id`, `position`, `target`, `parent_id`, `is_parent`, `show_menu`, `fa_icon`) VALUES
(1, 'Category 1', 'page', 1, '', 'http://www.category1.com&#8217;', '', 1, 0, '', 0, 1, '1', NULL),
(2, 'Category 1 – 1', 'page', 2, '', 'http://www.category11.com&#8217;', '', 1, 0, '', 1, 0, '1', NULL),
(3, 'Category 1 – 2', 'page', 3, '', 'http://www.category12.com&#8217;', '', 1, 0, '', 1, 1, '1', NULL),
(4, 'Category 2', 'page', 4, '', 'http://www.category2.com&#8217;', '', 1, 0, '', 0, 1, '1', NULL),
(5, 'Category 2 – 1', 'page', 5, '', 'http://www.category31.com&#8217;', '', 1, 0, '', 1, 0, '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_menu`
--

CREATE TABLE `tabel_menu` (
  `id` int(11) NOT NULL,
  `judul_menu` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_menu`
--

INSERT INTO `tabel_menu` (`id`, `judul_menu`, `link`, `icon`) VALUES
(1, 'Dashboard', 'Admin/index', 'menu-icon fa fa-dashboard'),
(2, 'Form Peminjaman', '#', 'menu-icon fa fa-book'),
(5, 'Laporan Peminjaman', '#', 'menu-icon fa fa-print'),
(8, 'Daftar', '#', 'menu-icon fa fa-tasks'),
(10, 'Logout', 'Login/keluar', 'menu-icon fa fa fa-sign-out');

-- --------------------------------------------------------

--
-- Table structure for table `table_menu_user`
--

CREATE TABLE `table_menu_user` (
  `id` int(11) NOT NULL,
  `judul_menu` varchar(191) NOT NULL,
  `link` varchar(191) NOT NULL,
  `icon` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_menu_user`
--

INSERT INTO `table_menu_user` (`id`, `judul_menu`, `link`, `icon`) VALUES
(1, 'Dashboard', 'Admin/index_user', 'menu-icon fa fa-dashboard'),
(2, 'Form Peminjaman', '#', 'menu-icon fa fa-book'),
(3, 'Laporan Peminjaman', '#', 'menu-icon fa fa-print'),
(4, 'Logout', 'Login/keluar', 'menu-icon fa fa fa-sign-out');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detailpb`
--

CREATE TABLE `tbl_detailpb` (
  `id` int(11) NOT NULL,
  `id_pb` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `unitb` int(11) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detailpb`
--

INSERT INTO `tbl_detailpb` (`id`, `id_pb`, `id_barang`, `unitb`, `keterangan`, `status`) VALUES
(98, 189, 9, 1, 'qw', ''),
(99, 189, 6, 1, '', ''),
(100, 190, 6, 1, '', ''),
(101, 190, 1, 1, '', ''),
(102, 195, 1, 2, '', ''),
(103, 195, 9, 2, '', ''),
(104, 196, 1, 3, '', ''),
(105, 196, 1, 2, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detailpr`
--

CREATE TABLE `tbl_detailpr` (
  `id` int(11) NOT NULL,
  `id_pr` int(11) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `ruangan` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detailpr`
--

INSERT INTO `tbl_detailpr` (`id`, `id_pr`, `id_ruangan`, `keterangan`, `ruangan`) VALUES
(88, 101, 2, '', 1),
(89, 102, 2, '', 1),
(90, 103, 2, '', 1),
(91, 106, 1, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(10) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `NIM` int(11) NOT NULL,
  `Jurusan` varchar(200) NOT NULL,
  `role_id` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `nama`, `NIM`, `Jurusan`, `role_id`, `username`, `password`) VALUES
(1, 'Admin', 0, '-', 1, 'admin', '123'),
(2, 'Melani NM', 1177050060, 'Informatika', 2, '1177050060', '1717'),
(3, 'Test', 0, 'Informatika', 2, 'test', '1717');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pinjambarang`
--

CREATE TABLE `tbl_pinjambarang` (
  `id_pb` int(11) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `no_pb` varchar(50) NOT NULL,
  `no_spt` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `nama1` varchar(30) NOT NULL,
  `nama2` varchar(30) NOT NULL,
  `tujuan` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `file_name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pinjambarang`
--

INSERT INTO `tbl_pinjambarang` (`id_pb`, `id_user`, `no_pb`, `no_spt`, `tanggal`, `tanggal_kembali`, `nama1`, `nama2`, `tujuan`, `status`, `file_name`) VALUES
(195, '2', '', '68', '2020-07-01', '2020-07-03', 'Admin Lab FISIP', 'ik', 'ik', 'Pending', 'd9ee80019e9b3adf00a497fbe03fc67b.docx'),
(196, '2', '', '70', '2020-07-06', '2020-07-14', 'Admin Lab FISIP', 'jkk', 'jkk', 'Pending', '4753a97482e4f9554afa78b6a255be07.docx');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pinjamruangan`
--

CREATE TABLE `tbl_pinjamruangan` (
  `id_pr` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `no_pr` varchar(50) NOT NULL,
  `no_spt` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `nama1` varchar(30) NOT NULL,
  `nama2` varchar(30) NOT NULL,
  `tujuan` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `file_name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pinjamruangan`
--

INSERT INTO `tbl_pinjamruangan` (`id_pr`, `id_user`, `no_pr`, `no_spt`, `tanggal`, `tanggal_kembali`, `nama1`, `nama2`, `tujuan`, `status`, `file_name`) VALUES
(103, 2, '', '60', '2020-06-30', '2020-07-03', 'Admin Lab FISIP', 'ty', 'ty', 'Pending', '82f5fe7f511e4e36ff0ecd5a97cc8efa.docx'),
(106, 1, '', '71', '2020-07-21', '2020-07-22', 'Admin Lab FISIP', 'yi', 'yi', 'Pending', 'd0a4206151243b58c0ba89c6b02d9e1a.docx');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(50) DEFAULT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `no_seri` varchar(50) DEFAULT NULL,
  `kondisi_barang` varchar(50) NOT NULL,
  `unit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `kode_barang`, `nama_barang`, `merk`, `no_seri`, `kondisi_barang`, `unit`) VALUES
(1, '1', 'Meja', 'Kayu', '1', 'Baik', 1029),
(6, 'B-01', 'Bendera', '-', '-', 'Baik', 2),
(8, 'k-01', 'kursi', 'napolly', '1', 'Baik', 4),
(9, 's-01', 'speaker', 'polytron', '2', 'Baik', 96),
(10, 'B-01', 'Test', 'test', '29292', 'Baik', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruangan`
--

CREATE TABLE `tb_ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `nama_ruangan` varchar(200) NOT NULL,
  `kode_ruangan` varchar(200) NOT NULL,
  `ruangan` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ruangan`
--

INSERT INTO `tb_ruangan` (`id_ruangan`, `nama_ruangan`, `kode_ruangan`, `ruangan`) VALUES
(1, 'Ruangan 3', 'R-03', 0),
(2, 'Ruangan 1', 'R-01', 1),
(3, 'Ruangan 2', 'R-02', 1),
(4, 'Ruangan 4', 'R-04', 0),
(6, 'Ruangan 5', 'R-05', 0),
(7, 'Ruangan 6', 'R-06', 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_barang`
-- (See below for the actual view)
--
CREATE TABLE `view_barang` (
`id_pb` int(11)
,`id_barang` int(11)
,`kode_barang` varchar(50)
,`nama_barang` varchar(50)
,`merk` varchar(50)
,`no_seri` varchar(50)
,`kondisi_barang` varchar(50)
,`unitb` int(11)
,`keterangan` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_ruangan`
-- (See below for the actual view)
--
CREATE TABLE `view_ruangan` (
`id_pr` int(11)
,`keterangan` varchar(30)
,`ruangan` int(11)
,`id_ruangan` int(11)
,`kode_ruangan` varchar(200)
,`nama_ruangan` varchar(200)
);

-- --------------------------------------------------------

--
-- Structure for view `view_barang`
--
DROP TABLE IF EXISTS `view_barang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_barang`  AS  select `a`.`id_pb` AS `id_pb`,`a`.`id_barang` AS `id_barang`,`b`.`kode_barang` AS `kode_barang`,`b`.`nama_barang` AS `nama_barang`,`b`.`merk` AS `merk`,`b`.`no_seri` AS `no_seri`,`b`.`kondisi_barang` AS `kondisi_barang`,`a`.`unitb` AS `unitb`,`a`.`keterangan` AS `keterangan` from (`tbl_detailpb` `a` join `tb_barang` `b`) where `a`.`id_barang` = `b`.`id_barang` ;

-- --------------------------------------------------------

--
-- Structure for view `view_ruangan`
--
DROP TABLE IF EXISTS `view_ruangan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_ruangan`  AS  select `a`.`id_pr` AS `id_pr`,`a`.`keterangan` AS `keterangan`,`a`.`ruangan` AS `ruangan`,`b`.`id_ruangan` AS `id_ruangan`,`b`.`kode_ruangan` AS `kode_ruangan`,`b`.`nama_ruangan` AS `nama_ruangan` from (`tbl_detailpr` `a` join `tb_ruangan` `b`) where `a`.`id_ruangan` = `b`.`id_ruangan` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_menu_user`
--
ALTER TABLE `sub_menu_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_menu`
--
ALTER TABLE `sys_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dyn_group_id – normal` (`dyn_group_id`);

--
-- Indexes for table `tabel_menu`
--
ALTER TABLE `tabel_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_menu_user`
--
ALTER TABLE `table_menu_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_detailpb`
--
ALTER TABLE `tbl_detailpb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `no_pb` (`id_pb`),
  ADD KEY `no_pb_2` (`id_pb`);

--
-- Indexes for table `tbl_detailpr`
--
ALTER TABLE `tbl_detailpr`
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pinjambarang`
--
ALTER TABLE `tbl_pinjambarang`
  ADD PRIMARY KEY (`id_pb`),
  ADD KEY `no_spt` (`no_spt`);

--
-- Indexes for table `tbl_pinjamruangan`
--
ALTER TABLE `tbl_pinjamruangan`
  ADD PRIMARY KEY (`id_pr`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sub_menu_user`
--
ALTER TABLE `sub_menu_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sys_menu`
--
ALTER TABLE `sys_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tabel_menu`
--
ALTER TABLE `tabel_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `table_menu_user`
--
ALTER TABLE `table_menu_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_detailpb`
--
ALTER TABLE `tbl_detailpb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `tbl_detailpr`
--
ALTER TABLE `tbl_detailpr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pinjambarang`
--
ALTER TABLE `tbl_pinjambarang`
  MODIFY `id_pb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `tbl_pinjamruangan`
--
ALTER TABLE `tbl_pinjamruangan`
  MODIFY `id_pr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
