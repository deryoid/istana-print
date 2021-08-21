/*
 Navicat Premium Data Transfer

 Source Server         : Connection MySQL
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : project_istanaprint

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 21/08/2021 20:36:44
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for karyawan
-- ----------------------------
DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE `karyawan`  (
  `id_karyawan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_karyawan` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jk` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tempat_lahir` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_lahir` date NULL DEFAULT NULL,
  `agama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pendidikan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jurusan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `hp` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bidang` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jabatan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_karyawan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of karyawan
-- ----------------------------
INSERT INTO `karyawan` VALUES (1, 'Alfianoor', 'Laki-laki', 'Banjarmasin', '1990-12-31', 'Islam', 'S1', 'TI', 'Banjarmasin', '0979868756755', 'Design', 'ASDAFA');
INSERT INTO `karyawan` VALUES (2, 'Bana', 'Laki-laki', 'Banjarmasin', '1980-12-31', 'Islam', 'D3', 'MI', 'Banjarmasin', '09786543567867', 'Design', 'adfasf');
INSERT INTO `karyawan` VALUES (3, 'Gusti', 'Laki-laki', 'Berangas', '1996-04-14', 'Islam', 'S1', 'TI', 'Jl. Berangas Rt. 06 Rw. 02', '087815357404', 'Design', 'Staff');

-- ----------------------------
-- Table structure for katalog
-- ----------------------------
DROP TABLE IF EXISTS `katalog`;
CREATE TABLE `katalog`  (
  `id_katalog` int(11) NOT NULL AUTO_INCREMENT,
  `nama_katalog` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jenis_katalog` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `qty` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ukuran` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga_desain` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `total_harga` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `file` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_katalog`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of katalog
-- ----------------------------
INSERT INTO `katalog` VALUES (1, 'X Banner', 'X Banner', '15', '10 x 25 ', '90000', '20000', '110000', '18869.jpg');
INSERT INTO `katalog` VALUES (2, 'Spanduk', 'Spanduk', '6', '300 x 100', '90000', '20000', '11000', '9059.jpg');
INSERT INTO `katalog` VALUES (3, 'ID Card', 'ID Card', '2000', '50 x 40', '1500', '20000', '21500', '72706.jpg');
INSERT INTO `katalog` VALUES (4, 'Pamflet', 'Pamflet', '1000', '30 x 30', '5000', '20000', '25000', '89243.jpg');
INSERT INTO `katalog` VALUES (8, 'qwerty', 'asddasf', '12', 'dsafasf', '121212', '1212', '1212121', '93867.jpg');

-- ----------------------------
-- Table structure for pelanggan
-- ----------------------------
DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE `pelanggan`  (
  `id_pelanggan` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_pelanggan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jk` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `no_hp` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pelanggan
-- ----------------------------
INSERT INTO `pelanggan` VALUES ('PLG001', 'Fawazzz', 'Laki-laki', 'Banjarmasin', '769868596769');
INSERT INTO `pelanggan` VALUES ('PLG002', 'Dery', 'Laki-laki', 'Komplek Smanda 2 Banjarmasin', '092957459879');

-- ----------------------------
-- Table structure for pemesanan
-- ----------------------------
DROP TABLE IF EXISTS `pemesanan`;
CREATE TABLE `pemesanan`  (
  `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_pesan` date NULL DEFAULT NULL,
  `id_pelanggan` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_katalog` int(11) NULL DEFAULT NULL,
  `file` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tipe_pembayaran` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_bayar` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_pengerjaan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_pengambilan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_pemesanan`) USING BTREE,
  INDEX `id_katalog`(`id_katalog`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pemesanan
-- ----------------------------
INSERT INTO `pemesanan` VALUES (1, '2021-08-20', 'PLG001', 1, '96093.jpg', 'Transfer', 'Sudah Dibayar', 'Selesai', 'Belum Diambil');
INSERT INTO `pemesanan` VALUES (2, '2021-08-20', 'PLG002', 4, '95297.jpg', 'Cash', 'Sudah Dibayar', 'Selesai', 'Sudah Diambil');

-- ----------------------------
-- Table structure for produk_gagal
-- ----------------------------
DROP TABLE IF EXISTS `produk_gagal`;
CREATE TABLE `produk_gagal`  (
  `id_pg` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NULL DEFAULT NULL,
  `id_pemesanan` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id_pg`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of produk_gagal
-- ----------------------------
INSERT INTO `produk_gagal` VALUES (2, '2021-08-21', '1', 'hasil cetak rusak akan dicetak ulang');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Super Admin');

SET FOREIGN_KEY_CHECKS = 1;
